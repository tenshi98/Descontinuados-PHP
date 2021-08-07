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
class rambler extends AdiInviter_COR
	{
	private $login_ok=false;
	public $showContacts=true;
	public $internalError=false;
	protected $timeout=30;
	public $debug_array=array(
				'initial_get'=>'login',
				'login_post'=>'ramac_add_handler',
				'url_contacts'=>'email'
				);

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='rambler';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		$res=$this->get("http://www.rambler.ru/",true);
		$post_elements=$this->getHiddenElements($res);
		$post_elements['login']=$user;
		$post_elements['passw']=$pass; 
		unset($post_elements[0]);
		$res=$this->post("http://id.rambler.ru/script/auth.cgi",$post_elements,true);
		$this->rkey= $this->getElementString($res, '_request_key = "','"');
		if ( strpos($res,"login") !== false) {
			return false;
		}
		$this->login_ok = 'http://mail.rambler.ru/m/contacts/ac';
		return true;
	}

	public function getMyContacts()
	{
		$url=$this->login_ok;
		if($this->rkey == ''){
			adi_throwLibError(1);
			return false;
		}
		$post_elements = array('rkey' => $this->rkey );
		$res = $this->post($url,$post_elements,false,false,false,$headers);
		$adiConts = json_decode($res, true);
		$contacts = array();
		foreach($adiConts as $det) {
			if($this->isEmail($det[1]))
				$contacts[$det[1]] = array('name' => $det[0]);
		}
		return $contacts;
	}

	public function logout()
	{
		if(!$this->checkSession()) 
			return false;
		if(file_exists($this->getLogoutPath())) {
			$url_logout="https://id.rambler.ru/script/auth.cgi?mode=logout";
			$res=$this->get($url_logout,true);
		}
		$this->debugRequest();			
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}	
?>