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

class bsnl_in extends AdiInviter_COR
{
	private $login_ok=false;
	protected $timeout=30;
	public $showContacts=true;
	public $debug_array=array(
				'initial_get'=>'loginName',
				'login_post'=>'oi_sda_firstname',
				'get_contacts'=>'composeMe',
				);

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='bsnl_in';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;

		$res = $this->get('http://mail.bsnl.in/do/login');

		$form_action='http://mail.bsnl.in/do/dologin';
		$post_elements = $this->getHiddenElements($res);
		$post_elements = array(
			'account' => $user,
			'password' => $pass);
		$res=$this->post($form_action,$post_elements,true);	
		if(strpos($res, 'Logout') === false) {
			return false;	
		}
		$this->login_ok = 'http://mail.bsnl.in/do/addresses/export/submit';
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
		$logout_url="http://techemail.mail.everyone.net/email/scripts/logout.pl";
		$res = $this->get($logout_url,true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>