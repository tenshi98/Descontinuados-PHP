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
class yeah extends AdiInviter_COR
	{
	private $login_ok=false;
	public $showContacts=true;
	protected $timeout=30;
	public $debug_array=array(
			 'initial_get'=>'h_cell_r',
			 'url_mail'=>'password',
			 'post_login'=>'newmail;jsessionid',
			 'new_email'=>'interface',
			 'address_boock'=>'Privat'
	    	);
	

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='yeah';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		
		$res=$this->get("http://m.mail.126.com/auth/login.s",true);
		$adipost=$this->getHiddenElements($res);
		$user_array = explode('@', $user);
		$form_action="http://m.mail.163.com/auth/login.s";	
		$adipost["username"]=$user_array[0];
		$adipost["domain"]=$user_array[1];
		$adipost["password"]=$pass;
		$res=$this->post($form_action,$adipost,true);
		if(strstr($res, 'logout') === false) {
			return false;
		}
		$url = explode('?', $this->last_url);
		$url = str_replace('/xm/welcome.do','',$url[0]);
		$this->base_url = $url;
		$this->login_ok = $url.'/xm/contact.do?'.$this->getElementString($res,'/xm/contact.do?','"');
		$this->login_ok = str_replace('&amp;', '&', $this->login_ok);
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
		$res=$this->get("https://mm.web.de/logout",true);		
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>