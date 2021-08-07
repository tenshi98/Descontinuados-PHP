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

class nz11 extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	
	public function login($user, $pass)
	{
		$this->resetDebugger();
		$this->service='nz11';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$username=preg_replace('/@.*/', '', $user);
		$res=$this->get("http://nz11.mail.everyone.net/email/scripts/loginuser.pl");
		$form_action='http://nz11.mail.everyone.net/email/scripts/loginuser.pl?'.$this->getElementString($res,' name="myForm" method="post" action="loginuser.pl?','"');
		$post_elements=array('loginName'=>$username,'user_pwd'=>$pass,'login'=>'Login');
		$headers=array(
			'Host' => 'nz11.mail.everyone.net',
			'Origin' => 'http://nz11.mail.everyone.net',
			'Referer' => 'http://nz11.mail.everyone.net/email/scripts/loginuser.pl',
			);
		$res=$this->post($form_action,$post_elements,true,false,false,$headers);
		$this->login_ok='http://nz11.mail.everyone.net/email/scripts/contacts.pl';	
		return true;
	}

	public function getMyContacts()
	{
		$url=$this->login_ok;
		$res=$this->get($url);
		$form_action='http://nz11.mail.everyone.net/email/scripts/contacts.pl';
		$post_elements=$this->getHiddenElements($res);$post_elements['entriesPerPage2']='All';
		$res=$this->post($form_action,$post_elements);

		if(strstr($res, 'checkedContacts')===false){
			adi_throwLibError(1);
			return false;
		}
		$contacts = array();
		$doc=new DOMDocument();
		libxml_use_internal_errors(true);
		if (!empty($res)) {
			$doc->loadHTML($res);
		}
		libxml_use_internal_errors(false);
		$xpath=new DOMXPath($doc);		
		$query="//input[@name='checkedContacts']";
		$data=$xpath->query($query);
		foreach($data as $node)
		{
			$email =explode('~', $node->getAttribute('value'));
			$email = $email[1];
			$nn = $node->parentNode->parentNode;
			$name = $nn->childNodes->item(1)->nodeValue.' '.$nn->childNodes->item(2)->nodeValue;
			$name = trim(str_replace('&nbsp', '', $name));
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
		$res=$this->get('http://nz11.mail.everyone.net/email/scripts/logout.pl');
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();	
	}
}
?>