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

class techemail extends AdiInviter_COR
{
	private $login_ok    = false;
	protected $timeout   = 30;
	public $showContacts = true;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='techemail';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		$res=$this->get("http://techemail.mail.everyone.net/email/scripts/loginuser.pl",true);
		$form_action="http://techemail.mail.everyone.net/email/scripts/loginuser.pl?EV1=".$this->getElementString($res,"loginuser.pl?EV1=",'"');
		$post_elements=array('loginName'=>$user,'user_pwd'=>$pass,'login'=>'Login');
		$res=$this->post($form_action,$post_elements,true);	
		if(strstr($res, 'loginName') !== false) {
			adi_throwLibError(0);
			return false;
		}
		$url_contacts="http://techemail.mail.everyone.net/email/scripts/contacts.pl?EV1=";
		$this->login_ok=$url_contacts;
		return true;
	}
		
	public function getMyContacts()
	{
		if (!$this->login_ok)
			{
			$this->debugRequest();
			$this->stopPlugin();
			return false;
			}
		else $url = $this->login_ok;
		$res=$this->get($url,true);	
		if(strpos($res, '@') === FALSE) {
			adi_throwLibError(1);
			return false;
		}
		$contacts=array();
		$doc=new DOMDocument();libxml_use_internal_errors(true);if (!empty($res)) $doc->loadHTML($res);libxml_use_internal_errors(false);
		$xpath=new DOMXPath($doc);$query="//a";$data=$xpath->query($query);
		foreach($data as $node)
		{
			$nameBulk=$node->getAttribute('href');
			if (strpos($nameBulk,'javascript:composeMe')!==false)
				{
				$name=$this->getElementString($nameBulk,'"','"');$email=$node->nodeValue;
				if (!empty($email)) $contacts[$email]=array('first_name'=>(!empty($name)?$name:false),'email_1'=>$email);
				}
		}
		foreach ($contacts as $email=>$name) if (!$this->isEmail($email)) unset($contacts[$email]);
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
		$logout_url="http://techemail.mail.everyone.net/email/scripts/logout.pl";
		$res = $this->get($logout_url,true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>