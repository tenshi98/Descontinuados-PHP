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
class kincafe extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='kincafe';
		$this->service_user=$user;
		$this->service_password=$pass;
	
		if (!$this->init()) return false;

		$res = $this->get('http://www.kincafe.com/signin.fam',true);
		$post_elements = $this->getHiddenElements($res);
		$post_elements['loginForm:username']=$user;
		$post_elements['loginForm:pwd']=$pass;
		$post_elements['loginForm:bottomSignInBtn']='+Sign+In+';
		$res = $this->post("http://www.kincafe.com/signin.fam",$post_elements,true);		
		if(strstr($res, 'logout.fam') === false) {
			adi_throwLibError(0);
			return false;
		}
		$this->login_ok = "http://www.kincafe.com/fammemlist.fam";
		return true;
	}

	public function getMyContacts()
	{
		$url=$this->login_ok;		
		$res = $this->get($url,true);
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		$contacts=array();
		$doc=new DOMDocument();libxml_use_internal_errors(true);if (!empty($res)) $doc->loadHTML($res);libxml_use_internal_errors(false);
		$xpath=new DOMXPath($doc);$query="//tr[@style='background-color:#fbfbfb']";$data=$xpath->query($query);
		foreach($data as $node)
		{
			$td=$node->childNodes;
			$name = $td->item(2)->nodeValue;
			$email = $td->item(6)->nodeValue;
			$contacts[$email]=array('first_name'=>(!empty($name)?$name:false),'email_1'=>$email);
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
		$res=$this->get("http://www.kincafe.com/logout.fam");
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}

?>