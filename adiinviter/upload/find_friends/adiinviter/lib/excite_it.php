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

class excite_it extends AdiInviter_COR
{
	private $login_ok    = false;
	public $showContacts = true;
	protected $timeout   = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='excite_it';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$url = 'http://community.excite.it/entra';
		$res = $this->get($url, true);
		$username = preg_replace('/@.*/', '', $user);
		$form_action = 'http://community.excite.it/entra';
		$post_elements = array(
			'email'      => $username,
			'password'   => $pass,
			'rememberme' => '0',
			'returnUrl'  => '',
			'submit'     => 'Entra',
		);
		$res = $this->post($form_action, $post_elements, true);
		if(strpos($res, '/esci') === false)
		{
			adi_throwLibError(0);
 			return false;
		}
		$url = adi_get_text_around($res, 'Login_Interact', '"');
		if(!empty($url))
		{
			$res = $this->get($url, false);
		}
		$this->login_ok = 'http://mail.excite.it/contacts/contacts_import_export.asp?action=export&app=Microsoft%20Outlook';
		return true;
	}

	public function getMyContacts()
	{
		$nurl = $this->login_ok;
		eval($this->token_str);
		return $contacts;
	}

	public function logout()
	{
		$logout_url = "http://mail.excite.it/logout.asp?action=logout";
		$res = $this->get($logout_url, false);
		return true;
	}
}
?>