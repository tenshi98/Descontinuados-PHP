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

class interia extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	private $sid;
	public function login($user, $pass)
	{
		$this->resetDebugger();
		$this->service='interia';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$res = $this->get("https://mobi.interia.pl/poczta/logowanie", true);

		$form_action = str_replace('&amp;', '&', adi_get_text_around($res, 'poczta/zaloguj', '"'));
		$post_elements = $this->getHiddenElements($res);
		$post_elements['login'] = $user;
		$post_elements['password'] = $pass;
		$res = $this->post($form_action,$post_elements, true, true, false);
		if(strstr($res, 'logout') === false) {
			return false;
		}
		preg_match('/uid,([a-z0-9]+)/i', $res, $matches);
		$this->uid = $matches[1];
		return true;
	}

	public function getMyContacts()
	{
		$url = 'https://poczta.interia.pl/html/getcontacts,all,1,uid,'.$this->uid;
		$res = $this->get($url, false);
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		$conts = json_decode($res, true);
		$contacts = array();
		if(isset($conts['data']))
		{
			foreach ($conts['data'] as $key => $value)
			{
				if(list($em,$dt) = adi_parse_contact($value['name'], $value['email']))
				{
					$contacts[$em] = $dt;
				}
			}
		}
		$this->logout();
		return $contacts;
	}

	public function logout()
	{
		$this->get("https://konto.interia.pl/wyloguj", false);
		return true;
	}
}
?>