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

class sapo extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	
	public function login($user,$pass, $curl_token = false)
	{
		$this->resetDebugger();
		$this->service='sapo';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		
		$form_action="https://mail.sapo.pt/imp/redirect.php";
		$post_elements=array('imapuser'=>$user,
		'pass'=>$pass,
		'formSubmit'=>'Enviar');	
		$res=$this->post($form_action,$post_elements,true);
		if(strstr($res, 'logout') === false) {
			return false;
		}
		$this->login_ok = "http://mail.sapo.pt/turba/browse.php?key=&url=http://mail.sapo.pt/turba/index.php&page=*&show=all";	
		return true;
	}

	public function getMyContacts()
	{
		if (!$this->login_ok) {
			$this->debugRequest();
			$this->stopPlugin();
			return false;
		}
		else $url=$this->login_ok;
		$post_elements = array('actionID' => 'export', 'exportID' => '104', 'source' => 'localsql' ); 
		$res = $this->post('http://mail.sapo.pt/turba/data.php',$post_elements);
		if(strpos($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		return $this->parse_csv($res);
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		$res=$this->get("http://mail.sapo.pt/dimp/imp.php/LogOut",true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}	

?>