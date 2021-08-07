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

class yandex extends AdiInviter_COR
{
	private $login_ok    = false;
	public $showContacts = true;
	protected $timeout   = 30;

	public function login($user, $pass)
	{
		$this->resetDebugger();
		$this->service='yandex';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		$res = $this->get('https://passport.yandex.ru/passport?mode=auth',true);
		$post_elements=$this->getHiddenElements($res);

		$tst = number_format(microtime(true)*1000,0,'.','');
		$form_action="https://passport.yandex.ru/passport?mode=auth";
		$post_elements["login"] = $user;
		$post_elements["passwd"] = $pass;
		$post_elements['timestamp'] = $tst;
		$headers=array(
			'Host' => 'passport.yandex.ru',
			'Origin' => 'http://mail.yandex.ru',
			'Referer' => 'http://mail.yandex.ru/',
		);
		$res=$this->post($form_action, $post_elements,true,false, true, $headers);
		if(strstr($res, 'logout') === false) {
			adi_throwLibError(0);
			return false;
		}
		$linkToAddressBook="https://mail.yandex.ru/neo2/handlers/abook-export.jsx?tp=0&lang=en";
		$this->login_ok=$linkToAddressBook;
		return true;
	}

	public function getMyContacts()
	{
		if (!$this->login_ok) {
			$this->debugRequest();
			$this->stopPlugin();
			return false;
		}
		else $url = $this->login_ok;
		$contacts=array();
		$res=$this->get($this->login_ok,false);
		if(strstr($res, '@')===false) {
			adi_throwLibError(1);
			return false;
		}
		return $this->parse_csv($res);
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		$res=$this->get(urldecode("http://passport.yandex.ru/passport?mode=logout"));
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
	}
}
?>