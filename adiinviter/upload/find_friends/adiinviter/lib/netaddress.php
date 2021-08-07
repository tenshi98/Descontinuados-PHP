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
class netaddress extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	
	public function login($user, $pass, $curl_token = false)
	{
		$this->resetDebugger();
		$this->service='netaddress';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		
		$res=$this->get("https://www.netaddress.com/");
		$form_action='https://www.netaddress.com/tpl/Door/LoginPost';
		$post_elements=array('UserID'=>$user,
							 'passwd'=>$pass,
							 'LoginState'=>2,
							 'SuccessfulLogin'=>'/tpl',
							 'NewServerName'=>'www.netaddress.com',
							 'JavaScript'=>'JavaScript1.2',
							 'DomainID'=>$this->getElementString($res,'"DomainID" value="','"'),
							 'Domain'=>$this->getElementString($res,'"Domain" value="','"')
							);
		$res=$this->post($form_action,$post_elements,true);
		if(strstr($res, 'Welcome') === false) {
			return false;
		}
		$session_id=$this->getElementString($res,'/Door/','/');
		$this->login_ok=$session_id;	
		return true;
	}

	public function getMyContacts()
	{
		$id = $this->login_ok;
		$url_export = "http://www.netaddress.com/icalphp/exportcontact.php?sid={$id}";
		$res = $this->get($url_export);
		$form_action = 'http://www.netaddress.com/icalphp/exportcontact.php';
		$post_elements = array('sid'=>$id, 'fileformat'=>'csv1', 'csv1charset'=>'UTF-8');
		$res = $this->post($form_action,$post_elements);

		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		return $this->parse_csv($res);
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		$res=$this->get('http://mail.in.com/logout',true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();	
	}
}

?>