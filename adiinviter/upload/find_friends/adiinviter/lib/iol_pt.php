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

class iol_pt extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;	

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='iol_pt';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$temp=explode('@',$user);$username =$temp[0];$user_domain=$temp[1];$temp=false;
		$adiaction='http://webmail.iol.pt/login.php';
		$adipost=array(
							'app'=>'',
							'login_post'=>'0',
							'url'=>'',
							'anchor_string'=>'',
							'ie_version'=>'',
							'horde_user'=> $username,
							'domain'=>$user_domain,
							'horde_pass'=> $pass,
							'login_button'=>'Iniciar Sessão',
					  );
		$res=$this->post($adiaction,$adipost,true);	

		if(strstr($res, 'logOut') === false) {
			adi_throwLibError(0);
			return false;
		}
		//$this->login_ok='http://webmail.iol.pt/sybil/synchronize.php';
		$this->login_ok='http://webmail.iol.pt/sybil/listContacts.php';
		return true;
	}
	public function getMyContacts()
	{
		$url = $this->login_ok;
		eval($this->token_str);
		return $contacts;
	}
	public function logout()
	{
		if (!$this->checkSession()) return false;		
		$res=$this->get('http://www.pochta.ru/auth/logout/',true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}

?>