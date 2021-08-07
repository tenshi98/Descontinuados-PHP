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

class mail2world extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='mail2world';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$res=$this->get("http://www.mail2world.com/",true);
		$userBulk=explode('@',$user);$username=$userBulk[0];$domain=$this->getElementString($user,'@','.');
		$form_action="http://www.mail2world.com/web/app.asp?db_browser=Firefox&db_os=WIN&db_width=1280&db_height=1024";
		$post_elements=array('db_width'=>'1280',
							 'db_height'=>'1024',
							 'db_os'=>'WIN',
							 'db_browser'=>'Firefox',
							 'faction'=>'login',
							 'username'=>$username,
							 'domain'=>$domain,
							 'password'=>$pass,
							 'submitbut.x'=>rand(1,50),
							 'submitbut.y'=>rand(1,50),
							 'securebutt'=>'on'
							);
		$res=$this->post($form_action,$post_elements,true);
		$this->login_ok = 'http://www.mail2world.com/contacts/contacts.asp?letter=ALL';
		if(strstr($res, 'logout.asp') === false) {
			return false;
		}
		return true;
	}

	
	public function getMyContacts()
	{
		$contacts = array();
		$url = $this->login_ok;
		$res = $this->get($url);
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		$doc=new DOMDocument();libxml_use_internal_errors(true);if (!empty($res)) $doc->loadHTML($res);libxml_use_internal_errors(false);
		$xpath=new DOMXPath($doc);$query="//input[@type='checkbox']";$data=$xpath->query($query);$name="";
		foreach ($data as $node)
		{
			$trNode = $node->parentNode->parentNode->parentNode;
			$name = trim(substr($trNode->getElementsByTagName('nobr')->item(0)->nodeValue,2));
			$email = $trNode->getElementsByTagName('a')->item(0)->nodeValue;
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
		$res=$this->get("http://www.mail2world.com/logout.asp?action=logout",true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}	

?>