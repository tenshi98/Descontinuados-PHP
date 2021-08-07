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

class bol_com_br extends AdiInviter_COR
	{
	private $login_ok=false;
	public $showContacts=true;
	public $internalError=false;
	protected $timeout=30;
	
	public $debug_array=array(
				'initial_get'=>'pop3host',
				'login_post'=>'Location',
				'url_inbox'=>'parse',
				'contacts_file'=>'Email'
				
				);
	
	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='apropo';
		$this->service_user=$user;
		$this->service_password=$pass;

		if (!$this->init()) return false;


		$headers = array('Host'=>'visitante.acesso.uol.com.br');
		$res=$this->get('https://visitante.acesso.uol.com.br/login.html',false,true,true,false,$headers);
		
		$result = $this->getElementString($res,'UOL_VIS=A',';');
		$tmp = explode('|', $result);
		$ss = explode('.',$tmp[2]);
		$ss = (int)$ss[0];
		$cookie = 'UOL_VIS=B'.$result.($ss+3).'; ';
		$this->setCookie($cookie);
		$adiaction='https://visitante.acesso.uol.com.br/login.html';
		$headers = array('Host'=>'visitante.acesso.uol.com.br',
			'Referer'=>'https://visitante.acesso.uol.com.br/login.html',
			'Origin'=>'https://visitante.acesso.uol.com.br',
			'Content-Type'=>'application/x-www-form-urlencoded',
			'Accept-Charset'=>'ISO-8859-1,utf-8;q=0.7,*;q=0.3'
		);
		$adipost = array( 	'user'=>$user,
							'pass'=>$pass,
							'skin'=>'default',
							'dest'=>'',
							'url'=>'',
							'sc'=>'',
				   		);
		$res=$this->post($adiaction,$adipost,true,true,false,$headers);

		$url = $this->getElementString($res,'window.location.href="','"');
		$headers = array('Host'=>'bmail.uol.com.br');
		$res=$this->get($url,true,true,true,false,$headers);
		if(strstr($res, 'signout') === false) {
			return false;
 		}
		$this->login_ok = $this->getElementString($res,'email_token" type="hidden" value="','"');
		return true;
	}


	public function getMyContacts()
	{
		$token = $this->login_ok;
		$form_action='//a[@class="hnd"]';
		$action_method='#addressbookTooltipDialog_[^"]*"\\\\u003E[^=]*=#isU';
		eval($this->token_str);
		return $contacts;
	}


	public function logout()
		{
		if (!$this->checkSession()) return false;				
		$res=$this->get('http://login.apropo.ro/logout/8/?TB_iframe=true&width=400&height=400',true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;	
		}
	
	}	

?>