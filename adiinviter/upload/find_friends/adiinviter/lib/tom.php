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
class tom extends AdiInviter_COR
{
	private $login_ok    = false;
	public $showContacts = true;
	protected $timeout   = 30;	

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='tom';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$temp=explode('@',$user);$username =$temp[0];$user_domain=$temp[1];$temp=false;
		$adiaction="http://login.mail.tom.com/cgi/login";
		$adipost=array(
			"type"         => "0",
			"user"         => $username,
			"in_username"  => $user,
			"pass"         => $pass,
			"style"        => "10",
			"verifycookie" => "y",
		);
		$res=$this->post($adiaction,$adipost,true);
		$this->login_ok = 'http://bjapp6.mail.tom.com/cgi/ldvcapp?funcid=xportadd&sid='.$this->getElementString($res,'sid=','&').'&ifirstv=&showlist=all';
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
		$res=$this->get("https://mm.web.de/logout",true);		
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>