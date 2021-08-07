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

class web_de extends AdiInviter_COR
{
	private $login_ok    = false;
	public $showContacts = true;
	protected $timeout   = 30;
	protected $userAgent = 'Mozilla/4.1 (compatible; MSIE 5.0; Symbian OS; Nokia 3650;424) Opera 6.10  [en]';
	
	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='web_de';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		$res = $this->get('https://mm.web.de/login', true);
		$form_action = 'https://uas.web.de/centrallogin-3.1/login';
		$post_elements = array(
			'id2_hf_0'  => '',
			'serviceID' => 'mobile.web.mail.webde.live',
			'username'  => $user,
			'password'  => $pass,
		);
		$res = $this->post($form_action, $post_elements, true, false, false);	
		if ( strpos($res,'logout') === false) {
			return false;
		}
		$this->login_ok = 'https://mm.web.de/contacts';
		return true;
	}
	
	public function getMyContacts()
	{
		$url=$this->login_ok;
		$nextLink = $url;
		$res = $this->get($nextLink, true, true);
		if(strstr($res, "personId") === false){
			adi_throwLibError(1);
			return false;
		}
		$contacts = array();
		do{
			preg_match_all('#personId=[0-9]*">(.*)<\/a>#isU', $res, $names);
			preg_match_all('/mail\/new\?to=([^"]*)"/i', $res, $emails);
			foreach($names[1] as $ind => $name) {
				if($emails[1][$ind] != '')
				{
					$name = trim(strip_tags(str_replace(', ', ' ', $name))," \n\t\r");
					$email = $emails[1][$ind];
					if(list($key, $value) = adi_parse_contact($name, $email))
					{
						$contacts[$key] = $value;
					}
				}
			}
			if(strpos($res, 'nextLink') !== false)
			{
				if(preg_match('/contacts[^"]*nextLink/i', $res, $matches)) 
				{
					$nextLink = 'https://mm.web.de/'.$matches[0];
					$res = $this->get($nextLink, true, true);
				}
				else { $nextLink = false; }
			}
			else { $nextLink = false; }
		}while($nextLink !== false);
		return $contacts;
	}

	public function logout()
	{
		if(!$this->checkSession()) return false;
		$res=$this->get("https://mm.web.de/logout",true);		
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>