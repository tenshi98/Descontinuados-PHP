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

class eventbrite extends AdiInviter_COR
{
	private $login_ok=false;
	public $showContacts=true;
	protected $timeout=30;
	public $debug_array=array(
			'initial_get'=>'submitForm',
			'login_post'=>'Log out',
			'get_contacts'=>'abCheck'
			);

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='eventbrite';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$res = $this->get('https://www.eventbrite.com/login');
		$form_action='https://www.eventbrite.com/login';
		$post_elements=array(
			'submitted'=>'1',
			'referrer'=>'',
			'email'=>$user,
			'passwd'=>$pass,
		);
		$headers = array(
			'Host' => 'www.eventbrite.com',
			'Origin' => 'https://www.eventbrite.com',
			'Referer' => 'https://www.eventbrite.com/login',
		);
		$res = $this->post($form_action, $post_elements, false,true,false, $headers);
		if(strpos($res, 'loginForm') !== false) {
			return false;
		}
		$url = $this->getElementString($res, 'Location: ',PHP_EOL);
		$res = $this->get($url,false,true,true,false,$headers);
		$this->login_ok = 'http://www.eventbrite.com/mycontacts';
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
		$logout_url="http://user.excite.it/logout?targeturl=http%3A%2F%2Fwww.excite.it%2F";
		$res = $this->get($logout_url,true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>