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
class abv extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	protected $userAgent  = 'Mozilla/4.1 (compatible; MSIE 5.0; Symbian OS; Nokia 3650;424) Opera 6.10 [en]';

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='abv';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$res = $this->get('http://m.abv.bg/',true);
		$form_action = 'https://passport.abv.bg/acct/passport/login';
		$post_elements = array(
				'service' => 'mobile',
				'username' => $user,
				'password' => $pass,
			);
		$res=$this->post($form_action,$post_elements);	
		$res=$this->get($this->getElementString($res,'location.replace("','"'),true);
		if(strstr($res, 'logout') === false) {
			adi_throwLibError(0);
			return false;
		}
		$this->login_ok = 'http://m.abv.bg/j/contacts.jsp'.$this->getElementString($res,'contacts.jsp','"');
		return true;
	}
	
	public function getMyContacts()
	{
		$contacts = array();
		$url=$this->login_ok;
		$pres = $this->get($url,true);
		do 
		{
			$url = '';
			preg_match_all('#contact_preview[^"]*"#isU', $pres, $arr);
			foreach($arr[0] as $link) 
			{
				$link = str_replace('&amp;','&',trim($link,' "'));
				$res = $this->get('http://m.abv.bg/j/'.$link);
				$name = $this->getElementString($res,'<div class="left">','</div>');
				$email = $this->getElementString($res,'to=','"');
				if(list($key, $value) = adi_parse_contact($name, $email))
				{
					$contacts[$key] = $value;
				}
			}
			$url = $this->getElementString($pres,'class="next" href="..','"');
			if(! empty($url)) {
				$pres = $this->get('http://m.abv.bg'.$url,true);
			}
			else {
				break;
			}
		}while(true);
		return $contacts;		
	}

	public function logout()
	{
		if(!$this->checkSession()) return false;
		if(file_exists($this->getLogoutPath()))
		{
			$url_base=file_get_contents($this->getLogoutPath());
			$res=$this->get($url_base.'/app/j/logout.jsp',true);
		}
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}	

?>