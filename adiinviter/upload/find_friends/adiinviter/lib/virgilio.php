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
class virgilio extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	
	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='virgilio';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		$temp=explode('@',$user); $user_id=$temp[0]; $user_domain=$temp[1]; $temp=false;
		$form_action="http://mobimail.virgilio.it/cp/ps/Main/login/WrapLogin";
		$post_elements=array('p'=>false,'login_type'=>'virgilio','NGUserID'=>'null','u'=>$user_id,'password'=>$pass,'d'=>$user_domain);
		$res=$this->post($form_action,$post_elements,true);
		if(strstr($res, 'Logout?d=virgilio.it')===false){
			adi_throwLibError(0);
			return false;
		}
		$vergilioT=$this->getElementString($res,'&t=','&');
		$this->sessionVer=$vergilioT;		
		$this->login_ok="http://mobimail.virgilio.it/cp/ps/PSPab/Contacts?d=virgilio.it&u=".$user_id."&t=".$vergilioT."&reset=true&startAt=1&l=it";
		return true;
	}
	

	public function getMyContacts()
	{
		$url=$this->login_ok;
		$res=$this->get($url,true);
		$contacts=array();
		$nrFriends=(int)$this->getElementString($res,"Hai "," contatti");
		$exit=0;$page=1;
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		while(true)
		{
			$doc=new DOMDocument();libxml_use_internal_errors(true);if (!empty($res)) $doc->loadHTML($res);libxml_use_internal_errors(false);
			$xpath=new DOMXPath($doc);$query="//a";$data=$xpath->query($query);
			foreach($data as $node)
				if (strpos($node->getAttribute('href'),'PABreturnURL=Contacts')!==false) 
				{ 
					$name  = $node->childNodes->item(0)->nodeValue;
					$email = $node->childNodes->item(2)->nodeValue;
					if(list($key, $value) = adi_parse_contact($name, $email))
					{
						$contacts[$key] = $value;
					}
				}
			$page++;
			if(strstr($res, 'SUCCESSIVO') === false) break;
			else
				$res=$this->get("http://mobimail.virgilio.it/cp/ps/PSPab/Contacts?d=virgilio.it&u=".$this->service_user."&t=".$this->sessionVer."&reset=true&startAt=".$page."&l=it",true);		
		}
		$vergilioT=$this->getElementString($res,'&t=','&');
		$url ='http://mobimail.virgilio.it/cp/ps/Main/login/Logout?d=virgilio.it&u=adiinviter123&t='.$vergilioT.'&style=null&l=it';
		$res=$this->get($url,true);
		return $contacts;
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
				
}
?>