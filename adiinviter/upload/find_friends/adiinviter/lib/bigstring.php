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

class bigstring extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	
	public function login($user, $pass)
	{
		$this->resetDebugger();
		$this->service          = 'bigstring';
		$this->service_user     = $user;
		$this->service_password = $pass;
		if (!$this->init()) return false;
		
		$res = $this->get("http://www.bigstring.com");
		$form_action='http://www.bigstring.com/mail/index.php';
		$post_elements=array('user'=>$user,'pass'=>$pass); 		
 		$res=$this->post($form_action,$post_elements,true);
 		$res=$this->get("http://www.bigstring.com/mail/mailbox.php",true);
 		if(strstr($res, 'logouttitle')===false)
 		{
			adi_throwLibError(0);
			return false;
		}
		$url_contacts="http://www.bigstring.com/mail/ajax/contacts/viewcontact.php";
		$this->login_ok=$url_contacts;
		return true;		
	} 

	public function getMyContacts()
	{
		$url=$this->login_ok;			
		$post_elements=array('user'=>$this->service_user."@bigstring.com",'pass'=>$this->service_password,"lang"=>"en");
		$res=$this->post($url,$post_elements);
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		$contacts=array();
		if (preg_match_all("#\(\'\'\,\'(.+)\'\,\'(.+)\'#U",$res,$matches))
		{
			foreach($matches[2] as $key=>$name)
				if (!empty($matches[1][$key])) $contacts[$matches[1][$key]]=array('email_1'=>$matches[1][$key],'first_name'=>$name);	
		}
		$adiConts=array(); $rawConts=array();
		$rawConts=$this->returnContacts($contacts);
		foreach ($rawConts as $email => $name)
		{
			if(list($key, $value) = adi_parse_contact($name, $email))
			{
				$adiConts[$key] = $value;
			}
		}
		return $adiConts;
	}

	
	public function logout()
	{
		if (!$this->checkSession()) return false;
		$res=$this->get("http://www.bigstring.com/email/logout.php",true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
	}
}
?>