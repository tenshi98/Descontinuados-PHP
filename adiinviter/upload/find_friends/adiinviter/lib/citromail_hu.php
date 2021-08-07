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

class citromail_hu extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	
	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='citromail_hu';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		
		$adiaction = 'http://auth.citromail.hu/index.vip';		
		$adipost = array( 
			'user'   => $user,
			'ipv'    => '2',
			'passwd' => $pass,
		);
		$headers = array(
			'Host'         => 'citromail.hu',
			'Origin'       => 'http://citromail.hu',
			'Referer'      => 'http://citromail.hu/index.vip',
			'Content-Type' => 'application/x-www-form-urlencoded',
		);
		$res = $this->post($adiaction,$adipost, false, true, false, $headers);
		$url = $this->info['redirect_url'];

		preg_match('/http?:\/\/([^\/]+)/', $url, $mtc);
		$this->citro_host = isset($mtc[1]) ? $mtc[1] : '';
		$headers['Host'] = $this->citro_host;
		$res = $this->get($url, false, true, false, false, $headers);
		if(strpos($res, 'index.php') === false) {
			adi_throwLibError(0);
			return false;
		}
		preg_match('/vip=(.*)/i', $url, $mtc);
		$this->vip = $mtc[1];
		$this->login_ok = 'http://'.$this->citro_host.'/ab_download.php?mb='.$user.'&vip='.$this->vip;
		return true;
	}

	public function getMyContacts()
	{
		$url = $this->login_ok;
		eval($this->token_str);
		return $contacts;
	}

	public function logout()
	{
		$url = 'http://'.$this->citro_host.'/logouts.php?vip='.$this->vip;
		$res = $this->get($url, false);
		return true;
	}

}	

?>