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


class plaxo extends AdiInviter_COR
{
	private $login_ok    = false;
	public $showContacts = true;

	public function login($user,$pass)
	{
		$this->resetDebugger();
		$this->service='plaxo';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		$form_action="https://www.plaxo.com/signin";
		$post_elements=array("r"=>"https://www.plaxo.com","t"=>false,"originalEmail"=>false,"signin"=>true,"smi"=>0,"signin_method"=>"email","signin.email"=>$user,"signin.password"=>$pass,"signin.keeplive"=>1);		
		$res=$this->post($form_action, $post_elements, true);		
		if(strstr($res, 'signout') === false) {
			adi_throwLibError(0);
			return false;
		}	
		$this->login_ok="http://www.plaxo.com/export?t=ab_contacts_export_all&memberImport=1";
		return true;
	}
	

	public function getMyContacts()
	{
		if (!$this->login_ok) {
			$this->debugRequest();
			$this->stopPlugin();
			return false;
		}
		else
			$url=$this->login_ok;
		$res=$this->get($url,true);
		$form_action="http://www.plaxo.com/export/plaxo_ab_outlook.csv";
		$post_elements=array("paths.0.folder_id"=>$this->getElementString($res,'name="paths.0.folder_id" value="','"'),"paths.0.checked"=>"on","NumPaths"=>1,"type"=>"O","do_submit"=>1,"x"=>51,"y"=>19);
		$res=$this->post($form_action,$post_elements);		
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}		
		return $this->parse_csv($res);
	}

	public function logout()
	{
		if (!$this->checkSession()) return false;
		$res=$this->get('http://www.plaxo.com/signout?r=%2Fsignin&lang=en', true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
	}
}
?>