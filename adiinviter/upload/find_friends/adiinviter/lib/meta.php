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


class meta extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='meta';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;					
		$form_action="http://passport.meta.ua/";
		$post_elements=array('login'=>$user,'password'=>$pass,'mode'=>'login','from'=>'mail','lifetime'=>'alltime','subm'=>'Enter');
		$res=$this->post($form_action,$post_elements,true);
		
		if(strpos($res, 'logout') === false) {
			return false;
		}
		$this->login_ok="http://webmail.meta.ua/adress_table.php";
		return true;
	}


	public function getMyContacts()
	{
		$url=$this->login_ok;
		$res=$this->get($url,true);
		

		if(strpos($res, '@') === FALSE) {
			adi_throwLibError(1);
			return false;
		}
		$contacts = array();
		$doc=new DOMDocument();
		libxml_use_internal_errors(true);
		if (!empty($res)) $doc->loadHTML($res);
		libxml_use_internal_errors(false);
		$xpath=new DOMXPath($doc);
		$query="//tr[@onmouseout='row_out(this)']";
		$data=$xpath->query($query); $name="";
		foreach($data as $node) 
		{
			$email = $node->getElementsByTagName('a')->item(1)->nodeValue;
			$name = $node->getElementsByTagName('a')->item(0)->nodeValue;
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
		$res=$this->get('http://webmail.meta.ua/logout.php',true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
		}
	
	}	

?>