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

class hushmail extends AdiInviter_COR
{
	private $login_ok    = false;
	public $showContacts = true;
	protected $timeout   = 30;

	public function login($user,$pass, $curl_token = false)
	{
		$this->resetDebugger();
		$this->service='hushmail';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		$res=$this->get("https://m.hush.com/",true);

		$form_action='https://m.hush.com/authentication/login?skin=mobile&next_webapp_name=hushmail5&next_webapp_url_name=m';
		$post_elements=$this->getHiddenElements($res);
		$post_elements['hush_username'] = $user;
		$post_elements['hush_passphrase'] = $pass;
		$post_elements['form_token']=$this->getElementString($res,'name="form_token" value="','"');
		$post_elements['__hushform_extra_fields']='';
		$post_elements['next_webapp_page']='';
		$post_elements['hush_customerid'] = '0000000000000000';
		$headers=array(
			'Host' => 'm.hush.com',
			'Origin' => 'https://m.hush.com',
			'Referer' => 'https://m.hush.com/authentication/?next_webapp_name=hushmail5&next_webapp_url_name=m&skin=mobile',
		);
		$res=$this->post($form_action,$post_elements,true,false,false,$headers);
		if(strstr($res, 'Sign out') === false) {
			adi_throwLibError(0);
			return false;
		}
		$url_compose="https://m.hush.com/contacts/".$user."/contacts";
		$this->login_ok=$url_compose;
		$this->logout_url = "https://m.hush.com/authentication/".$user."/logout?skin=mobile&next_webapp_name=contacts_webapp&next_webapp_url_name=contacts";
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
		else $url = $this->login_ok;
		$res=$this->get($url,true);
		if(strpos($res, '@') === FALSE) {
			adi_throwLibError(1);
			return false;
		}
		$contacts = array();
		$doc=new DOMDocument();
		libxml_use_internal_errors(true);
		if (!empty($res)) $doc->loadHTML($res);
		libxml_use_internal_errors(false);
		$xpath=new DOMXPath($doc);$query="//div[@class='listItem']";$data=$xpath->query($query);
		foreach($data as $node)
		{
			$name  = $node->getElementsByTagName('strong')->item(0)->nodeValue;
			$email = $node->getElementsByTagName('a')->item(0)->nodeValue;
			if($email != '')
			{
				if(list($key, $value) = adi_parse_contact($name, $email))
				{
					$contacts[$key] = $value;
				}
			}
		}
		return $contacts;
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;		
		$res = $this->get($this->logout_url,true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>