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

class gmx_net extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	
	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service = 'gmx_net';
		$this->service_user=$user;
		$this->service_password=$pass;

		$ss=explode('@', $user);$domain=$ss[1]; $this->gmx_net=false;
		if(!in_array($domain, array('gmx.com','gmx.us'))) $this->gmx_net = true;

		if($this->gmx_net) 
		{
			$this->userAgent='Mozilla/4.1 (compatible; MSIE 5.0; Symbian OS; Nokia 3650;424) Opera 6.10  [en]';
			if (!$this->init()) return false;
			$tst = number_format(microtime(true)*1000,0,'.','');
			$this->setCookie('loginTime='.$tst.'; ');
			$form_action = 'https://service.gmx.net/de/cgi/login';
			$headers = array(
				'Content-Type'    => 'application/x-www-form-urlencoded',
				'Host'            => 'service.gmx.net',
				'Origin'          => 'http://www.gmx.net',
				'Referer'         => 'http://www.gmx.net/',
				'Accept'          => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
				'Accept-Charset'  => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
				'Accept-Encoding' => 'gzip,deflate,sdch',
				'Accept-Language' => 'en-US,en;q=0.8',
			);
			$post_elements = array(
				'AREA'=>'1',
				'EXT'=>'redirect',
				'EXT2'=>'',
				'dlevel'=>'c',
				'id'=>$user,
				'p'=>$pass,
				'uinguserid'=>'__uuid__',
			);
			$res = $this->post($form_action, $post_elements, false, true, false, $headers);
			$url = str_replace( array('&amp;','http:'), array('&','https:'),$this->getElementString($res, 'href="','"'));
			$res = gzdecode($this->get($url,false,false,true,false,$headers));

			if ( strpos($res,'/logout/') === false){
				return false;
			}
			$this->login_ok = 'https://service.gmx.net/de/cgi/g.fcgi/addressbook'.$this->getElementString($res,'https://service.gmx.net/de/cgi/g.fcgi/addressbook','"');
		}
		else 
		{
			if (!$this->init()) return false;
			$res = $this->get("http://www.gmx.com", true);
			$post_elements = $this->getHiddenElements($res);

			$form_action = 'https://login.gmx.com/login';
			$post_elements['btnLogin'] = 'Log in';
			$post_elements['username'] = $user;
			$post_elements['password'] = $pass;
			$res = $this->post($form_action, $post_elements, true);

			if(strstr($res, 'sid=') === false) 
			{
				adi_throwLibError(0);
				return false;
			}
			preg_match('/sid=([^&"\']+)/i', $res, $sid);
			$this->sid = '';
			if(count($sid) > 0)
			{
				$this->sid = $sid[1];
			}
		}
		return true;
	}

	public function getMyContacts()
	{
		$contacts = array();
		$url=$this->login_ok;
		$s_link='/sessionId = ["\']([^"\']*)["\']/i';
		$c_names='/personId=[0-9]*">([^<]*)</i';
		$c_mails='/newmail\?to=([^"]*)"/i';
		$cn_link='/contacts[^"]*nextLink/i';
		eval($this->token_str);
		return $contacts;
	}

	public function logout()
	{
		if($this->gmx_net)
		{
			$url = file_get_contents($this->getLogoutPath());
			$res = $this->get($url,true);
			$logout_url = "https://service.gmx.net/de/cgi/nph-logout?CUSTOMERNO=".$this->getElementString($res,"https://service.gmx.net/de/cgi/nph-logout?CUSTOMERNO=",'"');
			$res = $this->get($logout_url,true);
		}
		else
		{
			$sid = isset($this->sid) ? $this->sid : '';
			$this->get('https://navigator-lxa.gmx.com/logout?sid='.$sid);
		}
		return true;	
	}
	
}	

?>