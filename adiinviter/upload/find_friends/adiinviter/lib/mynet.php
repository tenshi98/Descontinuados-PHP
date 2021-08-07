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

class mynet extends AdiInviter_COR
{
	private $login_ok=false;
	public $showContacts=true;
	public $internalError=false;
	protected $timeout=30;

	public function login($user, $pass)
	{
		$this->resetDebugger();
		$this->service='mynet';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;	
		$res = $this->get("http://uyeler.mynet.com/login/?loginRequestingURL=http%3A%2F%2Feposta.mynet.com%2Findex%2Fmymail.html&formname=eposta");
		$form_action="https://uyeler.mynet.com/index/uyegiris.html";
		$post_elements=array('nameofservice'=>'epost',
							 'pageURL'=>'http://uyeler.mynet.com/login/login.asp?loginRequestingURL=http%3A%2F%2Feposta.mynet.com%2Findex%2Fmymail.html&formname=eposta',
							 'faultCoun'=>'',
							 'faultyUser'=>'',
							 'loginRequestingURL'=>'http://eposta.mynet.com/index/mymail.html',
							 'rememberstate'=>2,
							 'username'=>$user,
							 'password'=>$pass,
							 'x'=>rand(1,50),
							 'y'=>rand(1,20),
							 'rememberstatep'=>2
							);
		$res=$this->post($form_action,$post_elements,true);
		$res=$this->get("http://eposta.mynet.com/index/mymail.html",true);
		if(strstr($res, '/login/login.asp') !== false) {
			adi_throwLibError(0);
			return false;
		}
		$base_url="http://".$this->getElementString($res,"var mySrvName = '","'").".mynet.com";
		$url_file_contacts="http://adres.email.mynet.com/Exim/ExportFileDownload.aspx?format=microsoft_csv";
		$this->login_ok=$url_file_contacts;
		file_put_contents($this->getLogoutPath(),$base_url);		
		return true;
	} 

	public function getMyContacts()
	{
		$url=$this->login_ok;
		$res=$this->get($url);
		if(strstr($res, '@')===false){
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
			$url_logout=file_get_contents($this->getLogoutPath())."/webmail/src/signout.php";
			$res=$this->get($url_logout,true);
		}
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
	}
}
?>