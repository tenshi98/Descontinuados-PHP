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

class wpl extends AdiInviter_COR
{
	private $login_ok     = false;
	public $showContacts  = true;
	public $internalError = false;
	protected $timeout    = 30;		
	
	public function login($user, $pass)
	{
		$this->resetDebugger();
		$this->service='wp';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		$form_action="http://m.poczta.wp.pl/index.html";
		$post_elements=array(
			'login'    => $user,
			'password' => $pass,
			'pocztaN'  => 'chnp2',
			'plg'      => 'wpnd',
			'zaloguj'  => 'zaloguj',
		); 
		$res=$this->post($form_action,$post_elements);
		if(strstr($res, 'logoutTitle')===false){
   			adi_throwLibError(0);
   			return false;
   		}
		$url_adress='http://ksiazka-adresowa.wp.pl/csv.html';
		$this->login_ok=$url_adress;
		return true;		
	} 

	public function getMyContacts()
	{
		if (!$this->login_ok) {
			$this->debugRequest();
			$this->stopPlugin();
			return false;
		}
		else $url=$this->login_ok;
		$post_elements = array('gr_id' => '0', 'program' => 'bt', );
		$res=$this->post($url, $post_elements);
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		return $this->parse_csv($res);
	}
	public function logout()
	{
		if (!$this->checkSession()) return false;
		$res=$this->get('http://wap.poczta.wp.pl/');
		$url_logout='http://wap.poczta.wp.pl/index.html?logout=1&ticaid='.$this->getElementString($res,'index.html?logout=1&ticaid=','"');
		$res=$this->get($url_logout);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
	}
}
?>