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

class atlas extends AdiInviter_COR
	{
	private $login_ok=false;
	public $showContacts=true;
	public $internalError=false;
	protected $timeout=30;

	public $debug_array=array(
				'initial_get'=>'name',
				'login_post'=>'password',
				'redirect_post'=>'href="',
				'logged'=>'addressbook',
				'url_contacts'=>'rm',
				);

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='atlas';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$form_action='https://auser.centrum.cz/';
		$post_elements=array('url'=>'http://amail.centrum.cz/',
		'ego_user'=>$user,'ego_domain'=>'atlas.cz','ego_secret'=>$pass,'ego_expires'=>'1209600');

		$res=$this->post($form_action,$post_elements,true);
		if ( strstr($res,"Connection: close") != ''){
			adi_throwLibError(0);
			return false;
		}		
		$this->login_ok='http://amail.centrum.cz/index.php?m=myabook&op=contact_list&u='.$user;
		return true;
	}

	public function getMyContacts()
	{
		$contacts = array();
		$url=$this->login_ok;
		$res=$this->get($url);
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		$result = json_decode($res,true);
		foreach($result as $ind => $cont)
		{
			if($ind == 'paging') continue;
			$name = trim($cont['firstName'].' '.$cont['surname']);
			$email = $cont['email'];
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
		$res=$this->get('http://www.atlas.cz/r/?ump',true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}

?>