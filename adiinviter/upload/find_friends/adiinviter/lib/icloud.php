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

class icloud extends AdiInviter_COR
{
	private $login_ok    = false;
	public $showContacts = true;
	protected $timeout   = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='icloud';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$res = $this->get('https://www.icloud.com');

		$form_action="https://setup.icloud.com/setup/ws/1/login";
		$post_elements = '{"apple_id":"'.$user.'","password":"'.$pass.'","extended_login":false}';
		$headers = array('Origin' => 'https://www.icloud.com','Host' =>'setup.icloud.com','Referer' => 'https://www.icloud.com/');
		$res=$this->post($form_action,$post_elements,false,false,false,$headers,true);
		$result = json_decode($res,true);
		if($result['error'] == '1') {
			return false;
		}
		$this->login_ok = 'https://p03-contactsws.icloud.com/co/startup?order=first,last&locale=en_US';
		return true;
	}

	public function getMyContacts()
	{
		$url = $this->login_ok;
		eval($this->token_str);
		return $contacts;
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;		
		$logout_url="http://www.evite.com/logout?linkTagger=header";
		$res = $this->get($logout_url,true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>