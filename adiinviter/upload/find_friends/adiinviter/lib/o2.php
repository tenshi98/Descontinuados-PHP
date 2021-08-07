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

class o2 extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='o2';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$form_action = "https://poczta.o2.pl/login.html";
		$post_elements = array(
			'username' => $user,
			'password' => $pass,
		);
		$res = $this->post($form_action,$post_elements,false,true);				
		if(strstr($res, 'login') !== false)
		{
			adi_throwLibError(0);
			return false;
		}
		$sesid = $this->getElementString($res,'ssid=',";");
		$url_export = "http://poczta.o2.pl/v1/abook/export?fmt=outlook&xsrf-cookie={$sesid}";
		$this->login_ok = $url_export;
		return true;
	}

	public function getMyContacts()
	{
		$url = $this->login_ok;
		$headers = array( 'Host' => 'poczta.o2.pl' );
		$res = $this->get($url,false,false,true,false,$headers);		
		if(strstr($res, '@') === false) {
			adi_throwLibError(1);
			return false;
		}
		$this->logout();
		return $this->parse_csv($res);
	}

	public function logout()
	{
		$url = 'http://poczta.o2.pl/wylogowano';
		$res = $this->get($url, false);
		return true;
	}
}	
?>