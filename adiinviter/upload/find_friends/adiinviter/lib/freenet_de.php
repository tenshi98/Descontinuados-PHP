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
class freenet_de extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	protected $userAgent  = 'Mozilla/4.1 (compatible; MSIE 5.0; Symbian OS; Nokia 3650;424) Opera 6.10  [en]';
	
	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service          = 'freenet_de';
		$this->service_user     = $user;
		$this->service_password = $pass;
		if (!$this->init()) return false;

		$form_action='https://auth.mobil.freenet.de/mobil/login.php';
		$post_elements = array(
			'username'    => $user,							
			'password'    => $pass,	
			'login'       => 'action',
			'world'       => 'bml_DE',
			'callback'    => 'http://email.mobil.freenet.de/login/index.html',
			'tpl_version' => '',
			'returnto'    => '',
		);		
		$res=$this->post($form_action,$post_elements,true);
		$res=$this->get('http://email.mobil.freenet.de/login/index.html',true);
		if(strpos($res, 'logoff.html') === false) {
			adi_throwLibError(0);
			return false;	
		}
		return true;
	}

	public function getMyContacts()
	{
		$contacts = array();
		$form_location='#pager=([0-9]+)\&#isU';
		eval($this->token_str);
		return $contacts;
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;		
		$res=$this->get('http://email.mobil.freenet.de/login/logoff.html?code=1011',true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>