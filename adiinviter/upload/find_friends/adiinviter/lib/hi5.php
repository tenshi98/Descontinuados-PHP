<?php
/*******************************************************************************************
 * AdiInviter Pro 1.1 Stable Release by AdiInviter, Inc.                                   *
 *-----------------------------------------------------------------------------------------*
 *                                                                                         *
 * https://www.adiinviter.com                                                              *
 *                                                                                         *
 * Copyright © 2008-2014, AdiInviter, Inc. All rights reserved.                            *
 * You may not redistribute this file or its derivatives without written permission.       *
 *                                                                                         *
 * Support Email: support@adiinviter.com                                                   *
 * Sales Email: sales@adiinviter.com                                                       * 
 *                                                                                         *
 *-------------------------------------LICENSE AGREEMENT-----------------------------------*
 * 1. You are allowed to use AdiInviter Pro software and its code only on domain(s) for    * 
 *    which you have purchased a valid and legal license from www.adiinviter.com.          *
 * 2. You ARE NOT allowed to REMOVE or MODIFY the copyright text within the .php files     *
 *    themselves.                                                                          *
 * 3. You ARE NOT allowed to DISTRIBUTE the contents of any of the included files.         *
 * 4. You ARE NOT allowed to COPY ANY PARTS of the code and/or use it for distribution.    *
 ******************************************************************************************/					
class hi5 extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 50;
	
	public function login($user,$pass, $curl_token = false)
	{
		$this->resetDebugger();
		$this->service='hi5';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$url="https://secure.hi5.com/secure_login.html?isHi5=t&amp;ver=2&amp;loc=en_US&amp;uri=http%3A%2F%2Fwww.hi5.com";
		$res = $this->get($url,false);

		$form_action = 'https://secure.hi5.com/secure_login.html?isHi5=t&ver=2&loc=en_US&uri=http%3A%2F%2Fwww.hi5.com';
		$post_elements = $this->getHiddenElements($res);
		$post_elements['username'] = $user;
		$post_elements['password'] = $pass;
		$headers = array(
			'Host' => 'secure.hi5.com',
			'Origin' => 'https://secure.hi5.com',
			'Content-Type' => 'application/x-www-form-urlencoded',
			'Referer' => 'https://secure.hi5.com/secure_login.html?isHi5=t&ver=2&loc=en_US&uri=http%3A%2F%2Fwww.hi5.com',
		);
		$res=$this->post($form_action,$post_elements,true,false,false,$headers);
		$res = $this->get('http://www.hi5.com/home.html?jli=1');
		if(strstr($res, "user_id") === false) {
			adi_throwLibError(0);
			return false;
		}
		$url_friends="http://www.hi5.com/friends.html";
		$this->login_ok=$url_friends;
		return true;
	}

	public function getMyContacts()
	{
		if (!$this->login_ok)
		{
			$this->debugRequest();
			$this->stopPlugin();
			return false;
		}
		else $url=$this->login_ok;
		$res=$this->get($url,true);
		$session_token = $this->getElementString($res, 'session_token":"','"');

		$user_id = $this->getElementString($res,'user_id":',',');
		$guid = $this->getElementString($res, 'tagged.guid = "', '"');

		$form_action = 'http://www.hi5.com/api/?application_id=user&format=json&session_token='.$session_token;
		$post_elements = array(
			'method' => 'tagged.friends.render',
			'page_offset' => '0',
			'num_pages' => '10',
			'user_id' => $user_id,
			'api_signature' => '',
			'track' => $guid,
			'tab' => 0,
		);
		$headers = array(
			'Host' => 'www.hi5.com',
			'Origin' => 'http://www.hi5.com',
			'Referer' => 'http://www.hi5.com/friends.html',
		);
		$res=$this->post($form_action,$post_elements,false,false,false,$headers);
		$res= json_decode($res, true);
		$pages = $res['results']['pages'];
		if(strstr($res['results']['pages'][0], 'user_img')===false){
			adi_throwLibError(1);
			return false;
		}
		foreach($pages as $res) 
		{
			$doc=new DOMDocument();
			libxml_use_internal_errors(true);
			if (!empty($res)){
				 $doc->loadHTML($res);
			}
			libxml_use_internal_errors(false);
			$xpath=new DOMXPath($doc);
			$query="//div[@class='user_img']";
			$data=$xpath->query($query);
			$id=false;
			foreach($data as $node)
			{
				$avatar = $node->getElementsByTagName('img')->item(0)->getAttribute('src');
				$id = $this->getElementString($node->getElementsByTagName('a')->item(0)->getAttribute('href').'"','uid=','"');
				$id = preg_replace('/[^0-9]/i','',$id);
				$id = preg_replace('/0$/i','',$id);
				$name = $node->getElementsByTagName('img')->item(0)->getAttribute('alt');
				if (!empty($id))
				{		
					if(list($key, $value) = adi_parse_contact($name, $id, 0, $avatar))
					{
						$contacts[$key] = $value;
					}
				}
			}
		}
		return $contacts;
	}

	public function sendMessage($subject, $body, $contacts)
	{
		foreach($contacts as $id => $vars)
		{
			$temp_body = adi_replace_vars($body, $vars);

			$res = $this->get('http://www.hi5.com/home.html');
			$session_token = $this->getElementString($res, 'session_token":"','"');
			$guid = $this->getElementString($res, 'tagged.guid = "', '"');
			
			$form_action = "http://www.hi5.com/api/?application_id=user&format=JSON&session_token={$session_token}";
			$post_elements = array(
				'method'        => 'tagged.im.send',
				'message'       => $temp_body,
				'uid'           => $id,
				'api_signature' => '',
				'source'        => '',
			);
			$headers = array(
				'Host' => 'www.hi5.com',
				'Origin' => 'http://www.hi5.com',
				'Referer' => 'http://www.hi5.com/messages.html?source=h',
			);
			$res = $this->post($form_action, $post_elements, true, false, false, $headers);
			time_nanosleep(0, 1000000);
		}
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		$res=$this->get("http://hi5.com/friend/logoff.do",true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}

?>