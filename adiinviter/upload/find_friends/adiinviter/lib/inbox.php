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
class inbox extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service          = 'inbox';
		$this->service_user     = $user;
		$this->service_password = $pass;
		if (!$this->init()) return false;
		
		$res=$this->get("https://www.inbox.com/xm/login.aspx");
		
		$form_action="https://www.inbox.com/xm/login.aspx";
		$post_elements=array(
			'ACT'    => 'LGN',
			'login'  => $user,
			'pwd'    => $pass,
			'cmdLgn' => 'Sign In'
		);
		$res=$this->post($form_action,$post_elements,false,true,false,array(),false,false);
		
		return false;	
		$base_url="http://".$this->getElementString($this->getElementString($res,"Location: ",PHP_EOL),"http://",'?ACT');
		$url_redirect=trim(str_replace(" [following]","",$this->getElementString($res,"Location: ",PHP_EOL)));
		$res=$this->get($url_redirect,true);
		
		if(strstr($res, 'Sign Out') === false) {
			adi_throwLibError(0);
			return false;
		}
		$url_contacts_array=$this->getElementDOM($res,"//a[@accesskey='8']",'href');
		$url_contacts=array();$url_contacts=array($base_url,$url_contacts_array[0]);
		$this->login_ok=$url_contacts;
		file_put_contents($this->getLogoutPath(),$url_redirect);	
		return true;
	}

	public function getMyContacts()
	{
		if (!$this->login_ok)
		{
			$this->debugRequest();
			$this->stopPlugin();
			return false;
		}
		else $url=$this->login_ok;
		$res=$this->get($url[0].$url[1],true);
		$form_action=$url[0]."default.aspx";$post_elements=$this->getHiddenElements($res);$post_elements['cmdADDR']="To: Addr";
		$res=$this->post($form_action,$post_elements,true);
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		$contacts=array();$page=1;
		
		while(true)
		{
			preg_match_all('#name="ADDR[0-9]{1,2}" value="([^"]*)"#isU', $res, $matches);
			foreach($matches[1] as $contact)
			{
				$val = explode('<', $contact);
				$name = str_replace('&quot;','',trim($val[0],' "'));
				$email = trim($val[1],' >');
				if(list($key, $value) = adi_parse_contact($name, $email))
				{
					$contacts[$key] = $value;
				}
			}
			preg_match('#PG=([0-9]*)">Next#isU', $res, $matches);
			if(count($matches) == 0) break;
			else {
				$res=$this->get($form_action."?ACT=CPAB&AF=1&CID=-1&PG=".$matches[1]);
			}
		}
		return $contacts;
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		if (file_exists($this->getLogoutPath()))
			{
			$url=file_get_contents($this->getLogoutPath());
			$url_logout=str_replace('?ACT=INIT','default.aspx?ACT=LGO',$url);
			$res=$this->get($url_logout,true);
			}
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}
?>