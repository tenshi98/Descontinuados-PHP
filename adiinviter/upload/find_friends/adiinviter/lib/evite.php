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
class evite extends AdiInviter_COR
{
	private $login_ok     = false;
	private $adiAuth      = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	
	public function getKeys($user,$pass)
	{
		$this->resetDebugger();
		$this->service='evite';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		return true;
	}
	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='evite';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$res = explode(':', $_POST['eo']);

		$sessionid=$res[3];
		$this->setCookie('x-evite-session='.$sessionid.'; ');
		$post_elements = '{}';
		$this->headers = array(
			'Content-Type' => 'application/json;charset=UTF-8',
			'Host' => 'new.evite.com',
			'Origin'  => 'http://new.evite.com',
			'Referer' => 'http://new.evite.com/',
			'X-Requested-With' => 'XMLHttpRequest',
			'x-evite-auth'     => $res[0].':'.$res[1].':'.$res[2],
			'x-evite-request'  => $sessionid.'-'.$res[4],
			'x-evite-version'  => '1.2',
		);
		$res=$this->post("http://new.evite.com/services/users/auth/",$post_elements,false,false,false,$this->headers,true);
		$result = json_decode($res, true);
		if ( isset($result['code'])) {
			return false;
		}
		$this->login_ok='http://new.evite.com/services/users/contacts?_=';	
		return true;
	}

	public function getMyContacts()
	{
		$url = $this->login_ok;
		$tst = number_format(microtime(true)*1000,0,'.','');
		$url = $url.$tst;

		$res=$this->get($url,false,false,true,false,$this->headers);
		if(strpos($res, '@') === false){
			adi_throwLibError(1);
			return false;
		}
		$result=json_decode($res,true); $contacts=array();
		foreach($result as $contact)
		{
			if($this->isEmail($contact['email']))
			{
				$name = trim( trim($contact['firstname']).' '. trim($contact['lastname']));
				$email = $contact['email'];
				if(list($key, $value) = adi_parse_contact($name, $email))
				{	
					$contacts[$key] = $value;
				}
			}
		}		
		return $contacts;		
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		if (file_exists($this->getLogoutPath()))
			{
			$urlLogout="http://web.mail.com/".file_get_contents($this->getLogoutPath())."/common/Logout.aspx";
			$res=$this->get($urlLogout,true);			
			}
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
	
	}	

?>