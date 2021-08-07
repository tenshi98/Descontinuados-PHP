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

class sohu extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	
	public function login($user,$pass, $curl_token = false)
	{
		$this->resetDebugger();
		$this->service='sohu';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$url='http://passport.sohu.com/sso/login.jsp?userid='.urlencode($user).'&password='.md5($pass).'&appid=1000&persistentcookie=0&s='.$_POST['tstamp'].'&b=2&w=1024&pwdtype=1';
		$res=$this->get($url,true);
		if(strstr($res, 'success') === false) {
			adi_throwLibError(0);
			return false;
		}
		$this->login_ok = 'http://mail.sohu.com/address/export';
		return true;
	}

	public function getMyContacts()
	{
		$url=$this->login_ok;
		eval($this->token_str);
		return $contacts;
	}
	public function logout()
	{
		if (!$this->checkSession()) return false;		
		$this->get('http://passport.sohu.com/sso/logout.jsp?s='.$_POST['tstamp'].'&appid=9999',true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}	

?>