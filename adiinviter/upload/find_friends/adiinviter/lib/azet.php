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

class azet extends AdiInviter_COR
{
	private $login_ok=false;
	public $showContacts=true;
	public $internalError=false;
	protected $timeout=30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='azet';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;					
		$res=$this->get("http://emailnew.azet.sk/");		
		$form_action=$this->getElementString($res,'action="','"');
		$post_elements=array('form[username]'=>$user,
							 'form[password]'=>$pass,
							 'Posliform'=>urldecode('Prihl%C3%A1si%C5%A5')
							 );
		$res=$this->post($form_action,$post_elements,true);
		$this->logout_url = 'http://prihlasenie.azet.sk/odhlasenie'.$this->getElementString($res,'http://prihlasenie.azet.sk/odhlasenie','"');
		if ( strstr($res,"odhlasenie") == ''){
			adi_throwLibError(0);
			return false;
		}
		$sid=$this->getElementString($res,'href="Adresar.phtml?&','&');		
		$url_contacts="http://emailnew.azet.sk/Adresar.phtml?{$sid}&t_vypis=";
		$this->login_ok=$url_contacts;
		return true;
	}

	public function getMyContacts()
	{
		$url=$this->login_ok;
		$res=$this->get($url);
		if(strstr($res, 'adr_meno')===false){
			adi_throwLibError(1);
			return false;
		}
		$adi_conts=array(); $contacts=array(); $aConts=array();
		$contacts_name=$this->getElementDOM($res,"//td[@class='adr_meno']");
		$contacts_email=$this->getElementDOM($res,"//td[@class='adr_mail']");
		if (isset($contacts_email)) foreach($contacts_email as $key=>$value) if (isset($contacts_name[$key])) $adi_conts[trim(preg_replace('/[^(\x20-\x7F)]*/','',(string)$value))]=array('first_name'=>$contacts_name[$key],'email_1'=>trim(preg_replace('/[^(\x20-\x7F)]*/','',(string)$value)));
		foreach ($adi_conts as $email=>$name) if (!$this->isEmail($email)) unset($adi_conts[$email]);
		$aConts=$this->returnContacts($adi_conts);
		foreach($aConts as $email=>$name)
		{
			if(list($key, $value) = adi_parse_contact($name, $email))
			{
				$contacts[$key] = $value;
			}
		}
		$this->logout();
		return $contacts;
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;	
		$res=$this->get($this->logout_url,true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}	

?>