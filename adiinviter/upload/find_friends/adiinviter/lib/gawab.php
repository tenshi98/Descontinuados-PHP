<?php
/*
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
|             AdiInviter Pro v1.0 Contacts Invite               |
+---------------------------------------------------------------+
|    Copyright ©2005-2012 AdiInviter. All Rights Reserved.      |
+  This file is protected by software copyright Legislations.   +
|------------ADIINVITER PRO IS NOT A FREE SOFTWARE--------------|
+                Aditya Hajare | Vinay Jeurkar                  +
|         sales@adiinviter.com | support@adiinviter.com         |
+---------------------------------------------------------------+
|      c0ding is a heart and soul of descipline my friend.      |
+---------------------------------------------------------------+
|    http://www.adiinviter.com | Supported By Projects Planet   |
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
*/
class gawab extends AdiInviter_COR
	{
	private $login_ok=false;
	public $showContacts=true;
	public $internalError=false;
	protected $timeout=30;
	
	public function login($user,$pass,$login=false)
	{
		$this->resetDebugger();
		$this->service='gawab';
		$this->service_user=$user;
		$this->service_password=$pass;
		if (!$this->init()) return false;
		$login_array=explode("@",$user);
		$form_action="http://mail.gawab.com/login";
		$post_elements=array('service'=>'webmail',
							 'username'=>$login_array[0],
							 'domain'=>$login_array[1],
							 'password'=>$pass
							 );
		$res=$this->post($form_action,$post_elements,true);		
		$host=$this->getElementString($res,'&_host=',"'");
		if(empty($host)){
			adi_throwLibError(0);
			return false;
		}		
		$url_file_contacts="http://mail.gawab.com/".$host."/gwebmail?_module=contact&_action=export&format=outlook&_address=".$user;
		$this->login_ok=$url_file_contacts;
		return true;
		}

	public function getMyContacts()
		{
	    $url=$this->login_ok;
		$res=$this->get($url);
		if(strstr($res, '@')===false){
			adi_throwLibError(1);
			return false;
		}
		include_once('adiinviter/csv_processor.php');
		$adiParser  = new Adi_CSVParser($res);
		return $adiParser->extractContactsFromCSV();		
		}
	

	public function logout()
		{
		if (!$this->checkSession()) return false;
		$res=$this->get("http://www.gawab.com/",true);
		$this->debugRequest();
		$this->resetDebugger();
		$this->stopPlugin();
		return true;
		}
	
	}	
?>