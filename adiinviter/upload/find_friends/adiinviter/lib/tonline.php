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

class tonline extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='tonline';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$username = preg_replace('/@.*/', '', $user);

		$res = $this->get("https://m-email.t-online.de",true);
		$post_elements = $this->getHiddenElements($res);
		$post_elements['pw_usr']    = $username;
		$post_elements['pw_pwd']    = $pass;
		$post_elements['pw_submit'] = 'Login';
		$form_action='https://accounts.login.idm.telekom.com/sso';
		$res = $this->post($form_action,$post_elements,true);

		if ( strpos($res,"logout") === false){
			return false;
		}	
		$this->login_ok = 'https://mobil.t-online.de/email/tomo/index.php?ctl=zab_addresslist';
		return true;
	}

	public function getMyContacts()
	{
		$url=$this->login_ok;
		$contacts = array(); $page = 0;
		eval($this->token_str);
		$this->logout();
		return $contacts;
	}

	public function logout()
	{
		$url_logout = "https://m-email.t-online.de/index.php?ctl=logout";
		$res = $this->get($url_logout,true);
		return true;
	}
}

?>