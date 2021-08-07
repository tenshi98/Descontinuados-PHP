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

class pochta extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='qip';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		$res=$this->get('http://mail.qip.ru',true);
		$userBulk=explode('@',$user);$username=$userBulk[0];$domain=$userBulk[1];
		$adiaction='http://mail.qip.ru/auth/logon';
		$adipost=array(
						"user"=>$username,
						"dom"=>"pochta.ru",
						"domain"=>"qip.ru",
						"reason"=>"login",
						"pass"=>$pass,
					  );
		$res=$this->post($adiaction,$adipost,true);	
		$this->login_ok = 'http://mail.qip.ru/adb/export/?export_action=export&export_type=bat_csv';
		if(strstr($res, 'logout') === false) {
			adi_throwLibError(0);
			return false;
		}
		return true;
	}


	public function getMyContacts()
	{
		$url = $this->login_ok;
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
		$res=$this->get('http://www.pochta.ru/auth/logout/',true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}	

?>