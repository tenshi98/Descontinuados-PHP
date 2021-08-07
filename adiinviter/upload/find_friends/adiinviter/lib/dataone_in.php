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

class dataone_in extends AdiInviter_COR
{
	private $login_ok=false;
	protected $timeout=30;
	public $showContacts=true;
	public $debug_array=array(
				'initial_get'=>'loginName',
				'login_post'=>'oi_sda_firstname',
				'get_contacts'=>'composeMe',
				);

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='dataone_in';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$form_action='http://www.dataone.in/login.msc';
		$post_elements=array('user'=>$user,'password'=>$pass);
		$res=$this->post($form_action,$post_elements,true);	

		$tmp = explode('?', $this->last_url); 
		$url = 'http://www.dataone.in/ldap.msc?'.$tmp[1].'&ldapurl=pab&filter=cmd%3DPAB_CMD_GET_PABS|';
		$res = $this->get($url,true,true);
		if(strpos($res, 'Session timeout') !== false) {
			return false;	
		}
		preg_match("#addressbook([a-z0-9]*)'#isU", $res, $arr);
		$addressCode = trim($arr[0]," '");
		$this->login_ok = 'http://www.dataone.in/ldap.msc?'.$tmp[1].'&ldapurl=pab&filter=cmd%3DPAB_CMD_EDIT|pab%3D'.$addressCode.'|from%3D0|len%3D999|&security=false&popupLevel=undefined';
		return true;
	}
		
	public function getMyContacts()
	{
		$url = $this->login_ok;
		$form_action="#new P\([^']*'([^']*)'[^\(]*\('([^']*)'#isU";
		eval($this->token_str);
		return $contacts;
	}
		
	
	public function logout()
		{
		if (!$this->checkSession()) return false;
		$logout_url="http://techemail.mail.everyone.net/email/scripts/logout.pl";
		$res = $this->get($logout_url,true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
		}
}
?>