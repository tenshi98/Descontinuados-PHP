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

class aussiemail extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	
	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='aussiemail';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		$adiaction="http://freemail.aussiemail.com.au/email/scripts/loginuser.pl";
		$res=$this->get($adiaction,true);
		$adiaction="http://freemail.aussiemail.com.au/email/scripts/".$this->getElementString($res,'action="','"');
		$adipost = array(
			"loginName"=>$user,
			"user_pwd"=>$pass,
			"login"=>"Login",
		);
		$res=$this->post($adiaction,$adipost);
		$adia=str_replace('&amp;','&',$this->getElementString($res,'HREF="','"'));
		$res=$this->get($adia);
		$adib='http://aussiemailcom.mail.everyone.net'.str_replace('&amp;','&',$this->getElementString($res,'HREF="','"'));
		$res=$this->get($adib,true);
		$ev=$this->getElementString($adib.'"','EV1=','"');
		$this->login_ok = 'http://aussiemailcom.mail.everyone.net/email/scripts/contacts.pl?EV1='.$ev;
		return true;
	}

	public function getMyContacts()
	{
		$contacts = array();
		$url = $this->login_ok;
		$res = $this->get($url,true);
		preg_match_all("#composeMe\('([^']*)'#isU", $res, $arr);
		if(strstr($res, '@') === false) {
			return false;
		}
		foreach($arr[1] as $cnt)
		{
			$cnt = html_entity_decode($cnt);
			if(strstr($cnt, '<') === false){
				$name = 'Unknown Name';
				$email = $cnt;
			}
			else {
				$tmp = explode('<', $cnt);
				$name = trim($tmp[0],' "');
				$email = trim($tmp[1],' >');
			}
			if(list($key, $value) = adi_parse_contact($name, $email))
			{
				$contacts[$key] = $value;
			}
		}
		return $contacts;
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;		
		$res=$this->get('http://freemail.aussiemail.com.au/email/scripts/logout.pl',true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}

?>