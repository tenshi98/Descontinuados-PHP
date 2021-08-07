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

class xing extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='xing';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$res=$this->get("https://www.xing.com/");
		
		$form_action="https://www.xing.com/app/user";
		$post_elements=array(
			'op'=>'login',
			'javascript' => '0',
			'dest'=>'/',
			'login_user_name'=>$user,
			'login_password'=>$pass,
		);
		$res=$this->post($form_action,$post_elements,true);
		if(strstr($res, 'logout') === false) {
			return false;
		}
		$url_adressbook="https://www.xing.com/app/contact?notags_filter=0;card_mode=0;search_filter=;tags_filter=;offset=0";
		$this->login_ok=$url_adressbook;
		return true;
	}
	public function getMyContacts()
	{
		$url=$this->login_ok;
		$res=$this->get($url,true);
		$contacts=array();
		do {
			$next_page="";
			$next_page = $this->getElementString($res,'<li class="next"><a href="','"');
			$doc=new DOMDocument();	libxml_use_internal_errors(true);	if (!empty($res)) $doc->loadHTML($res);	libxml_use_internal_errors(false); 
			$xpath=new DOMXPath($doc); $query="//li[@class='item medium-img more-actions']";	$data=$xpath->query($query);
			foreach ($data as $node)
			{
				$avatar = 'https://www.xing.com'.str_replace("_s2","",$node->getElementsByTagName('img')->item(0)->getAttribute('src'));
				$name = $node->getElementsByTagName('a')->item(1)->nodeValue;
				$id = str_replace('/app/message?op=private_message;introduced_user_id=','',$node->getElementsByTagName('a')->item(3)->getAttribute('href'));
				if(list($key, $value) = adi_parse_contact($name, $id, 0, $avatar))
				{
					$contacts[$key] = $value;
				}
			}
			if(!empty($next_page))
			{
				$res = $this->get("https://www.xing.com".$next_page,true);
			}
			else $res = false;
		} while ($res);
		return $contacts;
	}

	public function sendMessage($subject, $body, $contacts)
	{
		foreach($contacts as $id => $vars)
		{
			$temp_body = adi_replace_vars($body, $vars);
			$temp_subject = adi_replace_vars($subject, $vars);

			$res = $this->get('https://www.xing.com/app/message?op=private_message;sc_o=mymlb-write');

			$form_action = "https://www.xing.com/app/message";
			$post_elements = array(
				'op' => 'private_message.send',
				'sid' => $this->getElementString($res,'name="sid" value="','"'),
				'contact_confirmed' => '0',
				'recipient_id%5B%5D' => $id,
				"subject" => $temp_subject,
				"body" => $temp_body,
			);
			$res = $this->post($form_action, $post_elements);
			time_nanosleep(0, 1000000);
		}
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		$res=$this->get("https://www.xing.com/app/user?op=logout",true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}

?>