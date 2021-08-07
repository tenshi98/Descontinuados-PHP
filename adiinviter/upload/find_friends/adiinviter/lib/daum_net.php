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

class daum_net extends AdiInviter_COR
{
	private $login_ok=false;
	public $showContacts=true;
	protected $timeout=30;
	public $debug_array=array(
				'initial_get'=>'submitForm',
				'login_post'=>'Log out',
				'get_contacts'=>'abCheck'
				);


	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='daum_net';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$headers = array(
			'Origin' => 'http://login.daum.net',
			'Host' =>'logins.daum.net',
			'Referer' => 'http://login.daum.net/accounts/loginform.do?daumauth=1&service=hanmail&url=http%3A%2F%2Fmail2.daum.net%2Fhanmailex%2Fmobile%2Fbasic%2FTop.daum'
		);
		$adiaction='https://logins.daum.net/accounts/login.do';
		$adipost=array( 'url'=>'http://mail2.daum.net/hanmailex/mobile/basic/Top.daum',
						'finaldest' => '',
						'reloginSeq' => '0',
						'relative' => '',
						'id'=>$user,
						'pw'=>$pass,
					  );
		$res=$this->post($adiaction,$adipost,true,false,false,$headers,false);
		if(strstr($res, 'document.location.replace') === false) {
 			return false;
 		}
		$this->login_ok = 'http://addrbook.daum.net/aplus/web/top.do#GoExport:type=toFile';
		return true;
	}

	public function getMyContacts()
	{
		$url=$this->login_ok;
		eval($this->token_str);
		return $contacts;
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;		
		$logout_url="https://logins.daum.net/accounts/logout.do?url=http%3a%2f%2fmail2%2edaum%2enet%2fhanmailex%2fmobile%2fbasic%2fTop%2edaum&t__nil_footer=logout";
		$res = $this->get($logout_url,true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>