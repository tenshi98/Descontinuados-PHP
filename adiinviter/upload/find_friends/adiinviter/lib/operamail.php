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
class operamail extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='operamail';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;

		$res=$this->get("http://www.fastmail.fm/");

		$form_action=$this->getElementString($res,'action="','"');
		$post_elements=array('MLS'=>'=LN-*',
			'FLN-LoginMode'=>0,
			'FLN-UserName'=>$user,
			'FLN-Password'=>$pass,
			'MSignal_LN-AU*'=>'Login',
			'FLN-Security'=>0,
			'FLN-ScreenSize'=>3,
			'FLN-SessionTime'=>1800,
			'FLN-NoCache'=>'on',
			'MSS'=>''
		);
		$res=$this->post($form_action,$post_elements,TRUE);
		if(strstr($res, 'advancedlogin') !== false) {
			adi_throwLibError(0);
 			return false;
 		}
		if (strpos($res,'ChooseWeb-*')!==false)
		{
			$form_action=$this->getElementString($res,'post" action="','"');
			$post_elements=$this->getHiddenElements($res);$post_elements['FChooseWeb-WebInterface']=2;
			$res=$this->post($form_action,$post_elements,true);
		}
		else
		{
			$url_redirect=$this->getElementString($res,'href="','"');
			$res=$this->get($url_redirect,true);
		}

		$url_adress_book=$this->getElementDOM($res,"//a[@kbshortcut='b']",'href');
		$url_adress="http://www.fastmail.fm".$url_adress_book[0];
		file_put_contents($this->getLogoutPath(),$url_adress);
		$this->login_ok=$url_adress;
		return true;
	}


	public function getMyContacts()
	{
		$url=$this->login_ok;
		$res = $this->get($url,true);
		while(true)
		{
			preg_match_all('/contactName.*\n.*/i', $res, $matches);
			if(count($matches[0]) == 0){
				adi_throwLibError(3);
				return false;
			}
			foreach($matches[0] as $match)
			{
				if(strpos($res, 'contactEmail') !== false)  {
					preg_match('#contactName">(.*)<#iU',$match, $result);
					$name = $result[1];

					preg_match('#contactEmail[^>]*>(.*)</a>#iU',$match, $result);
					$email = $result[1];

					if(list($key, $value) = adi_parse_contact($name, $email))
					{
						$contacts[$key] = $value;
					}
				}
			}
			if(strpos($res, 'txtNext') === false) break;
			$url = 'https://www.fastmail.fm'.$this->getElementString($res,'Show</button> <a href="','"');
			$res = $this->get($url);
		}
		if(count($contacts) == 0){
			adi_throwLibError(1);
			return false;
		}
		return $contacts;
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