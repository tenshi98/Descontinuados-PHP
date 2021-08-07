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

class clix_pt extends AdiInviter_COR
	{
	private $login_ok=false;
	public $showContacts=true;
	public $internalError=false;
	protected $timeout=30;
	
	public $debug_array=array(
				'initial_get'=>'login.yahoo',
				'login_post'=>'window.location.replace(',
				'redirect_cookie'=>'magic_cookie',
				'frinds_page'=>'Who',
				'send_message_url'=>'magic_cookie',
				);

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='clix_pt';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;

		$res = $this->get('http://auth.clix.pt/login/?request_uri=http%3A%2F%2Fwebmail.clix.pt',false);

		$username = preg_replace('/@.*/', '',$user);
		$domain = preg_replace('/.*@/', '', $user);

		$form_action='http://auth.clix.pt/login/?request_uri=http%3A%2F%2Fwebmail.clix.pt';
		$post_elements=array(
				'login'  => $username,
				'domain' => $domain,
				'pass'   => $pass,
				'mask'   => 'Password',
				'registar.x' => '49',
				'registar.y' => '13',
			);
		$headers=array(
			'Host' => 'auth.clix.pt',
			'Origin' => 'http://auth.clix.pt',
			'Referer' => 'http://auth.clix.pt/login/?request_uri=http%3A%2F%2Fwebmail.clix.pt',
			'Content-Type' => 'application/x-www-form-urlencoded'
		);
		$res=$this->post($form_action,$post_elements,true,false,false,$headers);
		$res = $this->get('http://webmail.clix.pt/mail/',false);
		if ( strstr($res,"Login") != '') {
			adi_throwLibError(0);
			return false;
		}
		$url_friends="http://webmail.clix.pt/mail/abook.pl?func=open&sort=UserEmail&type=&order=&current=";		
		$this->login_ok=$url_friends;
		return true;
	}
	
	public function getMyContacts()
	{
		$url=$this->login_ok;
		$form_action='#opencompose\(\'([^\']*)\'.*class="sw"\>([^<]*)<#isU';
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
	$_pluginInfo=array(	'name'=>'clix.pt', 'version'=>'1.0.6', 'description'=>"Get the contacts from a Flickr account",	'base_version'=>'1.8.0', 'type'=>'social', 'check_url'=>'http://www.clix.pt', 'requirement'=>'email', 'allowed_domains'=>false, );
?>