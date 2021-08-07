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

class sina_com extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;
	private $sid;
	public function login($user, $pass)
	{
		$this->resetDebugger();
		$this->service='sina_com';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;
		$at = strpos($user, '@');
		$domain = substr($user, $at+1, strlen($user)-$at);

		$form_action="http://mail.sina.com.cn/cgi-bin/login.php";
		$post_elements=array('u'=>$user,
							'psw'=>$pass,
							'logintype' => 'uid',
							'product' => 'mail',
							'登录' => '登 录'
							 );

		$res=$this->post($form_action,$post_elements, true);
		if(strstr($res, 'logout') === false) {
			return false;
		}
		$this->login_ok = 'http://m0.mail.sina.com.cn/basic/addrbook.php?gid=-1';
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
			$headers = array(
				'Host'=>'m0.mail.sina.com.cn',
				'Referer'=>'http://m0.mail.sina.com.cn/classic/index.php'
			);
			$res = $this->get("http://m0.mail.sina.com.cn/classic/logout.php?from=mail", true,true,true,false,$headers);
			$new_url=trim($this->getElementString($result,"location: ",PHP_EOL));
			$this->get($new_url,true,true,true,false,$headers);
			$this->debugRequest();
			$this->resetDebugger();
			$this->stopPlugin();
			return true;
		}
	}
?>