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

class libero extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user, $pass)
	{
		$this->resetDebugger();
		$this->service='libero';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$res=$this->get("http://m.libero.it/mail",true);
		$form_action="https://login.libero.it/logincheck.php";
		$post_elements=array("SERVICE_ID"=>"m_mail",
			"RET_URL"     => "http://m.mailbeta.libero.it/m/wmm/auth/check",
			"LAYOUT"      => "m",
			"LOGINID"     => $user,
			"PASSWORD"    => $pass,
			"REMEMBERME"  => "S",
			"CAPTCHA_ID"  => "",
			"CAPTCHA_INP" => "",
			"login"       => "+Accedi+",
		);

		$res=$this->post($form_action,$post_elements,true);
		if(strpos($res,'logout') === false){
			adi_throwLibError(0);
			return false;
		}
		$this->login_ok="http://m.mailbeta.libero.it/m/wmm/contacts";
		return true;
	}


	public function getMyContacts()
	{
		$url=$this->login_ok;
		$contacts=array(); $adiConts=array(); $aConts=array();
		
		while($url!=false)
		{
			$res=$this->get($url,true);
			$doc=new DOMDocument();libxml_use_internal_errors(true);if (!empty($res)) $doc->loadHTML($res);libxml_use_internal_errors(false);
			$xpath=new DOMXPath($doc);$query="//img[@alt='>']";$data=$xpath->query($query);
			foreach($data as $node)
			{
				$nxtPage=$node->parentNode->getAttribute('href');
			}
			if(!empty($nxtPage)) $url='http://m.mailbeta.libero.it'.$nxtPage;
			else $url=false;
			if (preg_match_all("#send\/NEW\/(.+)\"#siU",$res,$matches))
				foreach($matches[1] as $key=>$email) $contacts[$email]=array('email_1'=>$email);
		}
		foreach ($contacts as $email=>$name) if (!$this->isEmail($email)) unset($contacts[$email]);
		$aConts=$this->returnContacts($contacts);
		foreach ($aConts as $email=>$name)
		{
			$adiName=explode('@', $name);
			if(list($key, $value) = adi_parse_contact($adiName[0], $email))
			{
				$adiConts[$key] = $value;
			}
		}
		return $adiConts;
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		$res=$this->get("http://m.mailbeta.libero.it/doLogout",true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
	}
}


?>