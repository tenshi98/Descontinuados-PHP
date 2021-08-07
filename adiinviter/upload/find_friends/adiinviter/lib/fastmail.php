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
class fastmail extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public $userAgent = 'Mozilla/5.0 (Linux; Android 4.2.1; en-us; Nexus 4 Build/JOP40D) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Mobile Safari/535.19';

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='fastmail';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$res = $this->get("https://www.fastmail.fm");

		$form_action = "https://www.fastmail.fm";
		$post_elements = $this->getHiddenElements($res);
		$post_elements=array(
			'username'     => $user,
			'password'     => $pass,
			'screenSize'   => 'mobile',
			'hasPushState' => 1,
			'dologin'      => 1,
			'sessionKey'   => $post_elements['sessionKey'],
			'interface'    => 'ajax',
		);
		$res=$this->post($form_action,$post_elements,TRUE);
		if(strpos($res, 'dologin') !== false)
		{
			adi_throwLibError(0);
			return false;
		}
		preg_match('/u=([a-z0-9]+)/i', $this->last_url, $matches);
		$uid = isset($matches[1]) ? $matches[1] : '';
		$this->login_ok1='https://www.fastmail.fm/authenticate/?u='.$uid;
		$this->login_ok2='https://www.fastmail.fm/export/contacts/?format=OL&download=1&u='.$uid;
		return true;
	}

	public function getMyContacts()
	{
		$form_action=$this->login_ok1;
		$res=$this->post($form_action,'{"action":"getSession"}',false,false,false,array(
			'X-TrustedClient' => 'Yes',
		),true);
		$response = @json_decode($res, true);

		$url=$this->login_ok2;
		$res = $this->get($url,false);

		if(strstr($res, '@')===false)
		{
			adi_throwLibError(1);
			return false;
		}
		return $this->parse_csv($res);
	}


	public function logout()
	{
		if (!$this->checkSession()) return false;
		if (file_exists($this->getLogoutPath()))
			{
			$url=file_get_contents($this->getLogoutPath());
			$res=$this->get($url,true);
			$form_action=$this->getElementString($res,'action="','"');
			$post_elements=$this->getHiddenElements($res);
			$post_elements['MSignal_AD-LGO*C-1.N-1']='Logout';
			$res=$this->post($form_action,$post_elements,true);
			}
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>