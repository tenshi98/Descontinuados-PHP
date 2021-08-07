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

class runbox extends AdiInviter_COR
{
	private $login_ok=false;
	public $showContacts=true;
	public $internalError=false;
	protected $timeout=30;	
	
	public $debug_array=array(
				'initial_get'=>'user',
				'login_post'=>'inbox',
				'url_export'=>',"',
				);

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='runbox';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;		
		$adiaction='http://www.runbox.com/LOGIN';		
		$adipost=array(
						'destination'=>'http://www.runbox.com/mail',
						'reason'=>'no_cookie',
						'destination'=>'http://www.runbox.com/mail',
						'credential_0'=>$user,
						'credential_1'=>$pass,
					  );
		$res=$this->post($adiaction,$adipost,true);	
		$res=$this->get('https://beta.runbox.com/mail/addresses',true);
		if(strstr($res, 'LOGOUT') === false) {
			return false;
		}
		$this->login_ok='https://beta.runbox.com/mail/addresses_export_csv?winst='.$this->getElementString($res,'name="winst" value="','"');
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
		$res=$this->get('https://beta.runbox.com/LOGOUT',true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}

?>