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

class zoho_com extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='zoho_com';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;

		$res = $this->get('https://m.zoho.com/auth?js=false',false);
		$username = preg_replace('/@.*/', '', $user);
		$form_action='https://m.zoho.com/auth';
		$post_elements=array(
				'uname' => $username,
				'pass'  => $pass,
				'serviceurl' => '/home',
			);
		$headers=array(
			'Host' => 'm.zoho.com',
			'Origin' => 'https://m.zoho.com',
			'Referer' => 'https://m.zoho.com/auth?js=false',
			'Content-Type' => 'application/x-www-form-urlencoded'
		);
		$res=$this->post($form_action,$post_elements,true,false,false,$headers);
		if ( strstr($res,"Login") != ''){
			adi_throwLibError(0);
			return false;
		}
		$url_friends="https://mobile.zoho.com/mail/ip/aj?action=get_contacts";		
		$this->login_ok=$url_friends;
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
		$res=$this->get("https://mobile.zoho.com/logout");
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
			
	}
}
	$_pluginInfo=array(	'name'=>'Zoho.com', 'version'=>'1.0.6', 'description'=>"Get the contacts from a Flickr account",	'base_version'=>'1.8.0', 'type'=>'social', 'check_url'=>'http://www.zoho.com', 'requirement'=>'email', 'allowed_domains'=>false, );
?>