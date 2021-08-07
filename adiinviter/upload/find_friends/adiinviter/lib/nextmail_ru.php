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

class nextmail_ru extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='nextmail_ru';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$user=trim($user);

		$res = $this->get('http://nextmail.ru/index.phtml',false);
		$username = preg_replace('/@.*/', '',$user);
		$domain = preg_replace('/.*@/', '', $user);

		//$form_action='http://nextmail.ru/au/authen.phtml?u=4ee1a465571f2&s=&i=0&a_cd=';
		$form_action='http://'.$domain.'/au/authen.phtml'.$this->getElementString($res, $domain.'/au/authen.phtml','"');
		$post_elements=array(
			'name' => $username,
			'domain' => $domain,
			'password'  => $pass,
			'todo' => 'authenticate',
			'entrance_type' => 'regular',
			'antibrute_code' => '',
			'remember_me' => '0',
		);
		$headers=array(
			'Host' => 'nextmail.ru',
			'Origin' => 'http://nextmail.ru',
			'Referer' => 'http://nextmail.ru/',
			'Content-Type' => 'application/x-www-form-urlencoded'
		);
		$res=$this->post($form_action,$post_elements,true,false,false,$headers);
		if ( strstr($res,"login_name") != ''){
			adi_throwLibError(0);
			return false;
		}
		$url_friends="http://nextmail.ru/addr/adlist.phtml?s=&maxaddr=1000&pattern=&sortby=0&sortdir=false&pages=personal:1:0&big=1";
		$this->login_ok=$url_friends;
		return true;
	}
	
	public function getMyContacts()
	{
		$url=$this->login_ok;
		$form_action='#Array\(\'([^\']*)\',\'([^\']*)\'#isU';
		eval($this->token_str);
		return $contacts;
	}

	public function logout()
	{		
		if (!$this->checkSession()) return false;		
		$res=$this->get("http://nextmail.ru/index.phtml?m=logout");
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
			
	}
}

?>