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


class freemail extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='freemail';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
					
		// $res = $this->get("http://freemail.hu/mail/login.fm");
		$userStriped = str_replace("@freemail.hu", "", $user);
		$form_action = "http://belepes.t-online.hu/auth.html?lang=hu_utf8";
		$post_elements=array(
			'.formId'           => 'commands.PlusAuth',
			'backurl'           => 'http://freemail.hu/mail/index.fm?checkuser=1',
			'cmd'               => 'plusauth',
			'remoteform'        => 1,
			'user'              => $user,
			'userwithoutdomain' => $userStriped,
			'pass'              => $pass,
		);
		$res = $this->post($form_action,$post_elements,true);
		if(strstr($res, 'remoteerror') !== false) {
			adi_throwLibError(0);
			return false;
		}
		preg_match('/url=([^\'"]+)/i', $res, $mtc);
		$url = isset($mtc[1]) ? $mtc[1] : '';
		if(!empty($url))
		{
			$parts = parse_url($url);
			parse_str($parts['query'], $params);
			$this->params = $params;
		}
		$url = 'http://freemail.hu/mail/fm/xmldata?logcmd=getpab&logtid='.$this->params['tid'].'&logulid='.$this->params['email'];
		$this->login_ok = $url;
		return true;
	}

	public function getMyContacts()
	{
		$form_action = $this->login_ok;
		$post_elements = array(
			'cmd'  => 'getpab',
			'tid'  => $this->params['tid'],
			'ulid' => $this->params['email'],
		);
		$res = $this->post($form_action, $post_elements, false);
		if(strpos($res, '@') === false)
		{
			adi_throwLibError(1);
			return false;
		}
		$arr = @json_decode($res, true);
		if(isset($arr['entries']) && count($arr['entries']) > 0)
		{
			foreach($arr['entries'] as $cont)
			{
				if(list($key,$val) = adi_parse_contact($cont['name'], $cont['mail']))
				{
					$contacts[$key] = $val;
				}
			}
		}
		return $contacts;
	}

	public function logout()
	{
		$res=$this->get('http://freemail.hu/index.fm?page=logout',true);
		return true;	
	}
}

?>