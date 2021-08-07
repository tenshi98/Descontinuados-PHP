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
class india extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='india';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;	
		$res=$this->get("http://mail.india.com/login");		
		$form_action = 'http://mail.india.com/authenticate';
		$post_elements = array(
			'forgotten-title' => 'Retrieve forgotten Password',
			'utf8' => '✓',
			'authenticity_token' => $this->getElementString($res,'authenticity_token" type="hidden" value="','"'),
			'user[email]' => $user,
			'user[password]' => $pass,
			'Submit' => '',
		);
		$res=$this->post($form_action,$post_elements,true);
		if(strstr($res, 'logout') === false) {
			adi_throwLibError(0);
			return false;
		}
		$this->login_ok = 'http://mail.india.com/address_book/groups/all/contacts.csv';
		return true;
	}

	public function getMyContacts()
	{
		$url=$this->login_ok;
		$res=$this->get($url);
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		return $this->parse_csv($res);
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		if (file_exists($this->getLogoutPath()))
		{
			$sid=file_get_contents($this->getLogoutPath());
			$url_logout="http://moje.azet.sk/odhlasenie.phtml?$sid'";
			$res=$this->get($url_logout,true);
		}		
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}

?>