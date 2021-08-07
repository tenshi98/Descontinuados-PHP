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


class aol extends AdiInviter_COR
{
	private $login_ok=false;
	public $showContacts=true;
	public $internalError=false;
	protected $timeout=30;
	protected $userAgent='Mozilla/4.1 (compatible; MSIE 5.0; Symbian OS; Nokia 3650;424) Opera 6.10  [en]';
	
	public $debug_array=array(
			 'initial_get'=>'pwderr',
	    	 'login_post'=>'loginForm',
	    	 'url_redirect'=>'var gSuccessURL',
	    	 'inbox'=>'aol.wsl.afExternalRunAtLoad = []',
	    	 'print_contacts'=>'Email1'
	    	);	

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='aol';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		
		$user = (strpos($user,'@aol')!==false ? str_replace('@aol.com','',$user) : $user);
		$user = preg_replace('/@.*/','', $user);

		$res=$this->get("https://my.screenname.aol.com/_cqr/login/login.psp?sitedomain=sns.webmail.aol.com&lang=en&locale=us&authLev=0&uitype=mini&seamless=novl&loginId=&_sns_width_=174&_sns_height_=196&_sns_fg_color_=373737&_sns_err_color_=C81A1A&_sns_link_color_=0066CC&_sns_bg_color_=FFFFFF&redirType=js&xchk=false",true);
		$sed = 's'.rand(1333505387643,7254537576809).rand(0,9);
		$post_elements=$this->getHiddenElements($res);
		$url = 'https://s.sa.aol.com/b/ss/aolsnssignin/1/H.24.1/'.$sed.'?AQB=1&ndh=1&t=3%2F3%2F2012%2017%3A2%3A6%202%20-330&ns=aolllc&cl=63072000&pageName=sso%20%3A%20login&g=https%3A%2F%2Fmy.screenname.aol.com%2F_cqr%2Flogin%2Flogin.psp%3Fsitedomain%3Dsns.webmail.aol.com%26lang%3Den%26locale%3Dus%26authLev%3D0%26uitype%3Dmini%26seamless%3Dnovl%26loginId%3D%26_sns_width_%3D174%26_sns_height_%3D196%26_sns_fg_color_%3D373737%26_sns_err_color_%3DC81A1A%26_sns_link_color_%3D0066CC%26_sns_bg_&cc=USD&ch=us.snssignin&server=my.screenname.aol.com&events=event10%2Cevent12&c1=sso%20%3A%20ssologin&c2=sso%20%3A%20&c3=gmt_5&c10=external%20web%20browser&c12=%2FsnsUiDriver.jsp&c13=non-authenticated&c14=no%20referrer&c15=unavailable&c16=sns.webmail.aol.com&c17=mini&c18=0&c19=wa3&c20=en-us&c21=AOLPortal&c22=.aol.com&c24=uaid_na&c49=H.24.1-Jan2012%7Cmmx_1&s=1280x1024&c=32&j=1.6&v=Y&k=Y&bw=1280&bh=899&p=Shockwave%20Flash%3BRemoting%20Viewer%3BNative%20Client%3BChrome%20PDF%20Viewer%3BJava%20Deployment%20Toolkit%206.0.290.11%3BJava(TM)%20Platform%20SE%206%20U29%3BQuickTime%20Plug-in%207.7.1%3BGoogle%20Talk%20Plugin%3BGoogle%20Talk%20Plugin%20Video%20Accelerator%3BSilverlight%20Plug-In%3BSpoon%20Plugin%3BGoogle%20Update%3BWindows%20Activation%20Technologies%3BDefault%20Plug-in%3B&AQE=1';
		$res=$this->get($url,true);
		$post_elements['loginId']=$user;$post_elements['password']=$pass;
		$headers = array(
			'Host' => 'my.screenname.aol.com',
			'Origin' => 'https://my.screenname.aol.com',
			'Referer' => 'https://my.screenname.aol.com/_cqr/login/login.psp?sitedomain=sns.webmail.aol.com&lang=en&seamless=novl&offerId=newmail-en-us-v2&authLev=0&locale=us',
		);
		$res=$this->post("https://my.screenname.aol.com/_cqr/login/login.psp",$post_elements,false,true);
		$url_redirect='http://mail.aol.com/_cqr/LoginSuccess.aspx'.$this->getElementString($res,"http://mail.aol.com/_cqr/LoginSuccess.aspx","'");
		$res=$this->get($url_redirect,true,true);
		if(strpos($res, 'Logout') === false) {
			return false;
		}
		$this->user = $this->getElementString($res, 'name="user" value="','"');
		return true;	
	}
	
	public function getMyContacts()
	{
		$c_link = '/a href=[\'"]([^\'"]*)[\'"]/i';
		eval($this->token_str);
		return $contacts;
	}
	
	public function logout()
	{
		if (!$this->checkSession()) return false;
		if (file_exists($this->getLogoutPath()))
		{
			$url=file_get_contents($this->getLogoutPath());
			$res=$this->get($url,true);
			$url_logout=$this->getElementDOM($res,"//a[@class='signOutLink']",'href');
			if (!empty($url_logout)) $res=$this->get($url_logout[0]);			
		}
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
	$_pluginInfo=array(	'name'=>'AOL',	'version'=>'1.5.4',	'description'=>"Get the contacts from an AOL account",	'base_version'=>'1.9.0',	'type'=>'email',	'check_url'=>'http://webmail.aol.com',	'requirement'=>'email',	'allowed_domains'=>array('/(aol.com)/i'),	'imported_details'=>array('nickname','email_1','email_2','phone_mobile','phone_home','phone_work','pager','fax_work','last_name'),	);
?>