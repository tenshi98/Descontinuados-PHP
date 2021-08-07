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
/*
Last modified by Aditya Hajare @ Le Meredian Bar 6:11
*/

class rediff extends AdiInviter_COR
{
	private $login_ok    = false;
	public $showContacts = true;
	private $sess_id, $username, $siteAddr;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='rediff';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$post_elements = array(
			"login" => $user,
			"passwd" => $pass,
			"FormName"=>"existing",
			"proceed"=>"GO"
		);
		$res = html_entity_decode($this->post("http://mail.rediff.com/cgi-bin/login.cgi",$post_elements,true));
		if(strstr($res, 'login failed') !== false)
		{
			adi_throwLibError(0);
			return false;
		}
		$url = $this->getElementString($res, 'window.location.replace("', '");');
		$res = ($this->get($url, true));
		$url_contact="http://f6mail.rediff.com/ajaxprism/showaddrbook?output=json&all=1&groups=1&alldetails=0";
		$this->login_ok = $url_contact;
		$logout_url = "http://login.rediff.com/bn/logout.cgi?formname=general&login={$this->username}&session_id={$this->sess_id}&function_name=logout";
		file_put_contents($this->getLogoutPath(),$logout_url);
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

		$contacts = array();
		$res = str_replace("'", '"',$res);
		$conts = @json_decode($res, true);
		if(count($conts) > 0)
		{
			foreach($conts['rmail']['contact'] as $details)
			{
				$name = trim(trim($details['firstname']).' '.$details['lastname']);
				if(empty($name)) { $name = $details['nickname']; }
				$email = $details['email'];
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
			 $url_logout=file_get_contents($this->getLogoutPath());
			if (!empty($url_logout)) $res=$this->get($url_logout);
		}
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
	}
}
?>