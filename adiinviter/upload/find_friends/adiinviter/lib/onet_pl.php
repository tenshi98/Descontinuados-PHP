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
class onet_pl extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	
	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='onet_pl';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$res=$this->get('http://lajt.poczta.onet.pl',true);
		$adipost=$this->getHiddenElements($res);
		$adipost['login']=$user;
		$adipost['haslo']=$pass;
		$adipost['perm']='1';
		$form_action="http://lajt.poczta.onet.pl/login.rd";
		$res=$this->post($form_action,$adipost,true);	
		if(strstr($res, 'Zalogowano jako') === false) {
			adi_throwLibError(0);
			return false;
		}
		return true;
	}

	public function getMyContacts()
	{
		$res=$this->get('http://lajt.poczta.onet.pl/abook.html',true);
		$form_action='#contact.html\"\>[^<]*<[^=]*=#isU';
		eval($this->token_str);
		return $contacts;
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;		
		$res=$this->get("http://poczta.onet.pl/logout.html",true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>