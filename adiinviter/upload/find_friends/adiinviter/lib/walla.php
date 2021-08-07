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

class walla extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service = 'walla';
		$this->service_user = $user;
		$this->service_password = $pass;
		if (!$this->init()) return false;

		$res = $this->get("http://friends.walla.co.il",true);
		$form_action   = "https://friends.walla.co.il/ts.cgi";
		$post_elements = array(
			'w' => '/@login.commit',
			'theme' => '',
			'ReturnURL' => 'http://newmail.walla.co.il',
			'srv' => '',
			'username' => $user,
			'password' => $pass,
		);
		$res = $this->post($form_action,$post_elements,true,true);
		if(strstr($res, 'logout') === false) {
			return false;
		}
		$url_adressbook = "http://newmail.walla.co.il/?w=/@ajax/11/ajax.users.xml";
		$this->login_ok = $url_adressbook;
		return true;
	}
	public function getMyContacts()
	{
		$url = $this->login_ok;
		$headers = array(
			'Accept-Charset' => 'utf-8;',
		);
		$res = $this->get($url,true,true,true,false,$headers);
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		preg_match_all('#<user.*email="([^"]*)" fname="([^"]*)" lname="([^"]*)".*>#isU', $res, $matches);
		foreach($matches[1] as $ind => $email)
		{
			$name = trim($matches[2][$ind]." ".$matches[3][$ind]);
			if(list($key, $value) = adi_parse_contact($name, $email))
			{
				$contacts[$key] = $value;
			}
		}
		$this->logout();
		return $contacts;
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		$res = $this->get("http://friends.walla.co.il/?w=/@logout", true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}

?>