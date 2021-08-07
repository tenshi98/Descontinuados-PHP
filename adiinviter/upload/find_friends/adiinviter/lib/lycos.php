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

class lycos extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	
	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='lycos';
		$this->service_user=$user;
		$this->service_password=$pass;
		$this->timeout=30;
		if (!$this->init()) return false;
		
		$res=$this->get("http://mail.lycos.com/lycos/mail/IntroMail.lycos",true);
		$post_elements=$this->getHiddenElements($res);$post_elements["m_U"]=$user;$post_elements["m_P"]=$pass;
		$post_elements['login']='Sign In';
		$url_login="https://registration.lycos.com/login.php";
		$res=$this->post($url_login,$post_elements,true);	
		
		$url_export="http://mail.lycos.com/lycos/addrbook/ExportAddr.lycos?ptype=act&fileType=OUTLOOK";
		
		$this->login_ok=$url_export;
		return true;
	}

	public function getMyContacts()
	{
		$url=$this->login_ok;
		$post_elements=array('ftype'=>'OUTLOOK');
		$res=$this->post($url,$post_elements);
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		return $this->parse_csv($res);
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		$res=$this->get("https://registration.lycos.com/logout.php",true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}	

?>