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

class mail_ru extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public $userAgent = 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_2_1 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8C148 Safari/6533.18.5';

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='mail_ru';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		
		$res=$this->get("https://m.mail.ru/login",true);
		$array_user=explode("@",$user);
		$username=strtolower($array_user[0]);
		$domain=strtolower($array_user[1]);

		preg_match('/action="([^"]+)"/i', $res, $matches);
		$form_action = isset($matches[1]) ? $matches[1] : '';
		$post_elements = $this->getHiddenElements($res);
		$post_elements['Login'] = $username;
		$post_elements['Domain'] = $domain;
		$post_elements['Password'] = $pass;
		
		$res=$this->post($form_action,$post_elements,true);
		if(strpos($res, 'messages/inbox') === false) {
			adi_throwLibError(0);
			return false;
		}
		$res = $this->get('https://m.mail.ru/messages/inbox/?back=1',true);
		$this->login_ok="https://m.mail.ru/cgi-bin/addressbook";
		return true;
	}

	public function getMyContacts()
	{
		$res = $this->get($this->login_ok,false);
		preg_match_all('/addressbook\-list__item__link(.+)"author">([^<]+)<\/span><br\s?\/?>([^<]+)<\/a>/', $res, $matches);
		$contacts = array();
		if(count($matches[0]) > 0)
		{
			foreach($matches[2] as $ind => $name)
			{
				$email = isset($matches[3][$ind]) ? $matches[3][$ind] : '';
				if(list($key, $value) = adi_parse_contact($name, $email))
				{
					$contacts[$key] = $value;
				}
			}
		}
		else
		{
			adi_throwLibError(1);
			return false;
		}
		return $contacts;
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		$res=$this->get("http://win.mail.ru/cgi-bin/logout",true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}	

?>