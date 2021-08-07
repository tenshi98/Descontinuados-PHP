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
class arcor extends AdiInviter_COR
{
	private $login_ok=false;
	public $showContacts=true;
	public $internalError=false;
	protected $timeout=30;
	
	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='arcor';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;		
		$form_action='https://www.arcor.de/login/login.jsp';
		$post_elements=array('user_name'=>$user,
							'info'=>$pass,
							'password'=>$pass,							
							 );		
		$res=$this->post($form_action,$post_elements,true);	
		if(strstr($res, 'logout.jsp')===false){
			adi_throwLibError(0);
			return false;
		}
		$this->login_ok='http://www.arcor.de/office/ab/adr_export.jsp';
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
		$res=$this->get("http://www.arcor.de/login/logout.jsp?s=pia",true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>