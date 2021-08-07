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
class email_it extends AdiInviter_COR
	{
	private $login_ok=false;
	public $showContacts=true;
	public $internalError=false;
	protected $timeout=30;
	protected $userAgent='Mozilla/4.1 (compatible; MSIE 5.0; Symbian OS; Nokia 3650;424) Opera 6.10  [en]';
	
	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='email_it';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$username = preg_replace('/@.*/', '', $user);
		$this->setCookie('rbapcpmp=1; ');
		$res=$this->get('http://www.email.it/mail.php', false, false);
		$form_action='http://www.email.it/mail.php';
		$headers = array(
			'Host' => 'www.email.it',
			'Origin' => 'http://www.email.it',
			'Referer' => 'http://www.email.it/mail.php',
			'Content-Type'=>'application/x-www-form-urlencoded',
		);
		$tst = number_format(microtime(true)*1000,0,'.','');
		$post_elements = array( 
			'xjxfun'=>'checkUser',
			'xjxr'=>$tst,
			'xjxargs[]'=>'S'.$user,
			'xjxargs[]'=>'S'.$pass,
		);
		$res=$this->post($form_action,$post_elements,true,true,false,$headers);
		$form_action = $this->getElementString($res,'action = "','"');
		$post_elements = array( 'f_user' => $username, 
								'f_pass' => $pass,
								'home'   => '',
								'it.infocamere.webmail.logoutUrl' => 'https://legal.email.it/',
								'it.infocamere.webmail.errorUrl'  => 'https://legal.email.it/legal_wm.php',
								'user'  => $username,
								'pswd'  => $pass,
								'username' => $username,
								'password' => $pass,
								'LOGIN'  => $username,
								'PASSWD' => $pass,
								'tempomemo'=>'duesett',
								'language'=>'it_IT.utf-8',
 							  );
 		$headers['Host'] = 'wm.email.it'; 
		$res=$this->post($form_action,$post_elements,false,true,false,$headers);
		$subdomain = $this->getElementString($res,'http://','.email.it');
		$headers['Host'] = $subdomain.'.email.it'; unset($headers['Origin']);
		$url = $this->getElementString($res,'Location: ','&folder=&pag=1&sdrs=0').'&folder=&pag=1&sdrs=0';
		$res = $this->get($url,false,false,true,false,$headers);
		$us  = $this->getElementString($this->last_url,'?us=','&');
		$sid = $this->getElementString($this->last_url,'&sid=','&');
		if ( strpos($res,"menu.php?") === false){
			return false;
		}
		$this->headers=array(
			'Referer'=>'http://'.$subdomain.'.email.it/webmail/wm_5/addressbook?startp=1&us='.$us.'&sid='.$sid.'&folde=&prem=undefined',
			'Host'=>$subdomain.'.email.it',
		);
		$this->login_ok='http://'.$subdomain.'.email.it/webmail/wm_5/addressbook_export.php?us='.$us.'&sid='.$sid.'&tid=1&lid=0&prem=0';
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
		$res=$this->get($this->logout_url,true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
		}
				
	}
?>