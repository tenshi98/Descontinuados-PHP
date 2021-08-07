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
class naver_com extends AdiInviter_COR
{
	private $login_ok=false;
	public $showContacts=true;
	protected $timeout=30;
	protected $userAgent='Mozilla/4.1 (compatible; MSIE 5.0; Symbian OS; Nokia 3650;424) Opera 6.10  [en]';
	public $debug_array=array(
			 'initial_get'=>'h_cell_r',
			 'url_mail'=>'password',
			 'post_login'=>'newmail;jsessionid',
			 'new_email'=>'interface',
			 'address_boock'=>'Privat'
	    	);
	
	public function getKeys($user,$pass)
	{
		$this->resetDebugger();
		$this->service='naver';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$res = $this->get("https://m.mail.naver.com",false);
		preg_match('/svctype=([0-9a-z]+)/i', $res, $matches);
		$svctype = $matches[1];
		preg_match('/url\s*=\s*[\'"]([^\'"]+)[\'"]/i', $res, $matches);
		$url = $matches[1];
		$res = $this->get($url, true);
		preg_match('/session_keys\s*=\s*[\'"]([^\'"]+)[\'"]/i', $res, $matches);
		$adikeys    = explode(',', $matches[1]);
		$sessionkey = $adikeys[0];
		$keyname    = $adikeys[1];
		$evalue     = $adikeys[2];
		$nvalue     = $adikeys[3];
		$str='evalue="'.$evalue.'"; nvalue="'.$nvalue.'"; sessionkey="'.$sessionkey.'";keyname="'.$keyname.'";svctype="'.$svctype.'";';
		return $str;
	}
	public function login($user, $pass)
	{
		$this->resetDebugger();
		$this->service = 'naver';
		$this->service_user = $user;
		$this->service_password = $pass;
		if (!$this->init()) return false;

		$adiaction="https://nid.naver.com/nidlogin.login?svctype=".$_POST['svctype'];
		$adipost=array(
			"enctp"       => "1",
			"encpw"       => $_POST['rsk'],
			"encnm"       => $_POST['keyname'],
			"svctype"     => $_POST['svctype'],
			"smart_level" => "-1",
			"url"         => "http://m.mail.naver.com/m/address/list?cDist=T&target=to&dist=20&to=&cc=&bcc=&servicetoken=&popup=&page=1&serviceID=",
			"nvlong"      => "m.contact.naver.com",
			"viewtype"    => "",
			"locale"      => "",
			"nolinkidsvc" => "",
			"pre_id"      => "",
			"resp"        => "",
			"exp"         => "",
			"ru"          => "",
			"logintp"     => "",
			"postDataKey" => "",
			"smart_level" => "",
			"id"          => "",
			"pw"          => "",
		);
		$res = $this->post($adiaction,$adipost,true);
		if(strstr($res, 'cross-domain.nhn') === false) 
		{
			adi_throwLibError(0);
			return false;
		}
		preg_match('/location.replace\([\'"]([^\'"]+)[\'"]/i', $res, $matches);
		$res = $this->get($matches[1], true);
		preg_match('/location.replace\([\'"]([^\'"]+)[\'"]/i', $res, $matches);
		$this->login_ok = $matches[1];
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
		if (!$this->checkSession()) return false;
		$res=$this->get("http://nid.naver.com/nidlogin.logout",true);		
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>