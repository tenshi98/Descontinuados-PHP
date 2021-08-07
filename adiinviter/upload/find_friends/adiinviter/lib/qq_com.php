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
class qq_com extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;

	public function getKeys($user,$pass)
	{
		$this->resetDebugger();
		$this->service='QQ';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		$res=$this->get("https://mail.qq.com/cgi-bin/loginpage",true);	
		$post_elements=$this->getHiddenElements($res);

		$headers= array(
			'Host' => 'ssl.ptlogin2.qq.com',
			'Referer' => 'https://mail.qq.com/cgi-bin/loginpage',
		);
		$url = "https://ssl.ptlogin2.qq.com/check?uin=".$user."&appid=".$post_elements['aid']."&ptlang=2052&r=".$_POST['mrand'];
		$res = $this->get($url,true,true,true,false,$headers);
		$ptvfsession = $this->getElementString($res, 'ptvfsession=', ';');
		preg_match('/,[\'"](\![a-zA-Z0-9]{3})[\'"]/', $res, $result);	
		$str = 'vc="'.$result[1].'"; aid='.$post_elements['aid'].'; pts="'.$ptvfsession.'";';
		if($result[1] != '')
			$str .= ' ens=" ";';
		else 
			$str .= ' ens=undefined;';
		return $str;
	}

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='QQ';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;	
		$username = preg_replace('/@.*/', '', $user);
		$domain =  preg_replace('/.*@/', '', $user);
		$ckie = ' ptvfsession='.$_POST['pts'].';';
		$this->setCookie($ckie);
		$form_action='https://ssl.ptlogin2.qq.com/login?ptlang=2052&'.'uin='.$username.'&u_domain=@'.$domain.'&u='.$user.'&p='.$_POST['pp'].'&verifycode='.$_POST['vc'].'&aid='.$_POST['aid'].'&u1='.urlencode('https://mail.qq.com/cgi-bin/login?vt=passport&vm=wpt&ft=ptlogin&validcnt=0&clientaddr='.$user).'&remember=&ss=1&from_ui=1'.'&ptredirect=1'.'&h=1'.'&wording=%E5%BF%AB%E9%80%9F%E7%99%BB%E5%BD%95'.'&mibao_css=m_ptmail'.'&fp=loginerroralert'.'&action=2-23-213834&dummy='; 
		$headers = array(
			'Host' => 'ssl.ptlogin2.qq.com',
			'Referer' => 'https://mail.qq.com/cgi-bin/loginpage',
		);
		$res=$this->get($form_action,false,false,true,false,$headers);
		$url = 'https://mail.qq.com/cgi-bin/login'.$this->getElementString($res,'https://mail.qq.com/cgi-bin/login',"'");
		$res=$this->get($url,false,false,true,false,$headers);
		$url=$this->getElementString($res,'urlHead="','"')."frame_html".$this->getElementString($res, 'frame_html','"').'&r='.$this->getElementString($res,'"&r=','"');
		$res=$this->get($url,false,false,true,false,$headers);
		$this->login_ok='http://mail.qq.com/cgi-bin/addr_export?sid='.$this->getElementString($res,'?sid=','"');	
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
		$url_logout="http://mail.qq.com/cgi-bin/logout?sid=".$this->sid;
		$res=$this->get($url_logout,true);		
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
	}
}	




?>