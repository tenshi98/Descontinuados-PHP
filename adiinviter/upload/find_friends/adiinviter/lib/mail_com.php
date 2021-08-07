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

class mail_com extends AdiInviter_COR
{
	private $login_ok     = false;
	private $adiAuth      = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='mail_com';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		
		$res = $this->get("http://www.mail.com", true);
		$post_elements = $this->getHiddenElements($res);

		$form_action = 'https://login.mail.com/login';
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
		return true;
	}

	public function getMyContacts()
	{
		$contacts = array();
		$cont_cnt = 0;
		$sid = isset($this->sid) ? $this->sid : '';
		if(empty($sid))
		{
			$this->logout();
			adi_throwLibError(1);
			return false;
		}
		$page_nr = 1;
		do {
			$hasNext = false;
			$url = 'https://home.navigator-lxa.mail.com/servicecontact/contactlist?sid='.$this->sid.'&page_nr='.$page_nr;
			$res = $this->get($url, false);
			$result = @json_decode($res, true);

			if(isset($result['info']) && isset($result['info']['hasNext']))
			{
				$hasNext = $result['info']['hasNext'];
			}
			if(is_array($result) && count($result) > 0 && isset($result['data']))
			{
				foreach($result['data'] as $cont)
				{
					$name = isset($cont['name']) ? $cont['name'] : '';
					$email = isset($cont['mail']) ? $cont['mail'] : '';
					if(list($key, $value) = adi_parse_contact($name, $email))
					{
						$contacts[$key] = $value;
						$cont_cnt++;
						if($cont_cnt >= 2000){break;}
					}
				}
			}
			if($cont_cnt >= 2000){break;}
			$page_nr++;
			if($page_nr >= 10){break;}
		}while($hasNext);
		$this->logout();
		return $contacts;		
	}

	public function logout()
	{
		$sid = isset($this->sid) ? $this->sid : '';
		$this->get('https://navigator-lxa.mail.com/logout?sid='.$sid);
		return true;
	}
}	
?>