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

class mail_in extends AdiInviter_COR
	{
	private $login_ok=false;
	public $showContacts=true;
	public $internalError=false;
	protected $timeout=30;
	
	public $debug_array=array('initial_get'=>'frmloginverify',
							  'post_login'=>'inboxmailshide',
							  'contacts_page'=>'displaycontacts',
							 );
	

	public function login($user, $pass)
	{
		$this->resetDebugger();
		$this->service='mail_in';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		
		$res=$this->get("http://mail.in.com/");
		$form_action='http://mail.in.com'.$this->getElementString($res,'name="frmloginverify" method="POST" action="','"');
		$post_elements=array('f_sourceret'=>'http://mail.in.com/mails/mailstartup','f_id'=>$user,'f_pwd'=>$pass);
		$res=$this->post($form_action,$post_elements,true);
		if(strstr($res, 'userid')===false){
   			adi_throwLibError(0);
   			return false;
   		}
		$url_contacts='http://mail.in.com/mails/getcontacts.php';
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
		else $url=$this->login_ok;
		$res=$this->get($url);
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		$headers = array('Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3;');
		$contacts=array();
		$doc=new DOMDocument();libxml_use_internal_errors(true);if (!empty($res)) $doc->loadHTML($res);
		libxml_use_internal_errors(false);
		$xpath=new DOMXPath($doc);$query="//td";$data=$xpath->query($query);
		foreach($data as $node) 
		{
			if (strpos($node->getAttribute('onclick'),'displaycontacts')!==false)
			{
				$name=$node->nodeValue;
				$email_array=explode("'",(string)$node->getAttribute('onclick'));
				if (!empty($email_array[1])) 
					$contacts[$email_array[1]]= array('name' => $name);
			}
		}
		return $contacts;
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