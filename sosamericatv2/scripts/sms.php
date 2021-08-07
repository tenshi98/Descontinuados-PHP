<?
/*
'.---------------------------------------------------------------------------.
'|  Software: 	HTTP API - Send SMS Example: Simple Text SMS				 |
'|  Version: 	3.07														 |
'|  Email: 		soporte@dror.cl			                					 |
'|  Info: 			http://www.dror.cl               						 |
'|  Phone:			+562 581 9340										     |
'| ------------------------------------------------------------------------- |
'| Copyright (c) 1999-2010, Dror Tecnologia LTDA. All Rights Reserved.       |
'| ------------------------------------------------------------------------- |
'| LICENSE:																	 |
'| Distributed under the General Public License v3 (GPLv3)			         |
'| http://www.gnu.org/licenses/gpl-3.0.html									 |
'| This program is distributed AS IS and in the hope that it will be useful  |
'| WITHOUT ANY WARRANTY; without even the implied warranty of				 |
'| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.                      |
'| ------------------------------------------------------------------------- |
'| SERVICES:																 |
'| We offer a number of paid services at http//www.dror.cl:                  |
'| - Bulk SMS / MMS / Premium SMS Services	/ HLR Lookup Service			 |
'| ------------------------------------------------------------------------- |
'| HELP:																	 |
'| - This class requires a valid HTTP API Account. Please email to			 |
'| sales@solutions4mobiles.com to get one									 |
''---------------------------------------------------------------------------'

/**
* SMS Simple Message Example
* @copyright 1999 - 2010 Dror Tecnologia LTDA.
* 
*/

class sms{
	
	//---------------------------------
	// PROPERTIES
	//---------------------------------
	
	/**
   	* The HTTP API username that is supplied to your account 
   	* (most of the times it is your email)
   	* String
   	*/
	public $username=	'username';
	
	/**
   	* The HTTP API password of your account
   	* String
   	*/
	public $password=	'password';
	
	/**
   	* The HTTP API provider of your account
   	* String
   	*/
	public $provider=	'dror.cl';
	
	/**
   	* The HTTP request URL used for account balance information.
   	* (Use it to get the remaining credits to your account)
   	* String
   	*/
	public $balance_url=	'http://newsmslogin.dror.cl/bulksms/submitsms_BALANCE.go';	

	/**
   	* The HTTP request URL used for messaging
   	* (Use it to send SMS)
   	* String
   	*/
	public $send_url=	'http://newsmslogin.dror.cl/bulksms/submitsms.go'; 			
	
	/**
   	* The HTTP request URL used for delivery reports
   	* (Use it to get a Delivery Report (DLR))
   	* String
   	*/
	public $dlr_url=	'http://newsmslogin.dror.cl/bulksms/submitsms_DLR.go';
	
	/**
   	* The SMS charset
   	* Int [OPTIONAL] -> Default is 0.
   	*/
	public $charset=	0;
	
	/**
   	* The SMS message text
   	* String
   	*/
	public $msgtext=	"Hello World";
	
	/**
   	* The originator of your message (11 alphanumeric or 14 numeric values).
   	* Valid Chars are: A-z,0-9 (no Spaces or other chars like $-+!).
   	* String
   	*/
	public $originator=	'TestAccount';
	
	/**
   	* The full International mobile number of the recipient excluding
   	* To send to multiple recipients, separate each number with a comma 
   	* (e.g. 569xxx).
   	* Please note that no blanks can be used.
   	* String
   	*/
	public $phone=	'recipient';
	
	/**
   	* Request Delivery Report.
   	* If set to 1 a unique id for requesting delivery report of this sms 
   	* is returned with the OK return value upon sending.
   	* Int [OPTIONAL] -> Default is 0 (No DLR).
   	*/
	public $showDLR=	0;
	
	/**
   	* The SMS message type.
   	* If set to F the sms is sent as Flash.
   	* String [OPTIONAL] -> Default is empty (GSM text message).
   	*/
	public $msgtype=	'';
	
	/**
   	* Adjust Delivery date to UTC time. (acceptable values: …-11…+11).
   	* Int [OPTIONAL] -> Default is 0 (UTC 0).
   	*/
	public $utc=	0;
	
	//---------------------------------
	// METHODS
	//---------------------------------
	
	/**
	* This method sends out one SMS message or multiple (for multiple recipients).
	* Parameters:
	* 	none. (NOTE: sms object must be correctly initialized in order for this method to work.)
	* Returns:
	* 	OK				Successfully Sent
	* 	ERROR100	Temporary Internal Server Error. Try again later
	*		ERROR101	Authentication Error (Not valid login Information)
	*		ERROR102	No credits available
	*		ERROR103	MSIDSN (phone parameter) is invalid or prefix is not supported
	*		ERROR104	Tariff Error
	*		ERROR105	You are not allowed to send to that destination/country
	*		ERROR106	Not Valid Route number or you are not allowed to use this route
	*		ERROR107	No proper Authentication (IP restriction is activated)
	*		ERROR108	You have no permission to send messages through HTTP API
	*		ERROR109	Not Valid Originator
	*		ERROR999	Invalid HTTP Request
	* 	if showDLR is set to 1 a unique id for the delivery report of this sms is returned with the OK return value.
	*/
	
	function send(){
		$fieldcnt=8;
		$fieldstring = "username=$this->username&password=$this->password&charset=$this->charset&msgtext=$this->msgtext&originator=$this->originator&phone=$this->phone&provider=$this->provider&showDLR=$this->showDLR&msgtype=$this->msgtype";
		
		$ch = curl_init();  
		curl_setopt($ch,CURLOPT_URL,$this->send_url);  
		curl_setopt($ch,CURLOPT_POST,$fieldcnt);  
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fieldstring);  
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
		$res = curl_exec($ch);   
		curl_close($ch);  
		return $res;  
	}
	
	/**
	* This method gets the balance of a HTTP API account.
	* Parameters:
	* 	none. (NOTE: sms object must be correctly initialized in order for this method to work.)
	* Returns:
	* 	Account balance in EUROS
	*/
	
	function getBalance(){
		$fieldcnt=2;
		$fieldstring = "username=$this->username&password=$this->password&provider=$this->provider";
		
		$ch = curl_init();  
		curl_setopt($ch,CURLOPT_URL,$this->balance_url);  
		curl_setopt($ch,CURLOPT_POST,$fieldcnt);  
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fieldstring);  
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
		$res = curl_exec($ch);   
		curl_close($ch);  
		return $res;  
	}
	
	/**
	* This method returns the Delivery Report (DLR) of SMS message.
	* Parameters:
	* 	phone: 		String - The recipient's number
	* 	dlr_id: 	String - The SMS message unique id provided to you by method send().
	* Returns:
	* 	0					No Status yet received
	*		1					SMS Delivered
	*		2					Failed Delivery (Erroneous Number)
	*		3					Delivery Failed (Message Expired in SMSC)
	*		4					Pending Delivery
	*		5					Expired
	* 	ERROR100	Temporary Internal Server Error. Try again later
	*		ERROR101	Not valid parameters in request
	*		ERROR102	Error combination of phone & id or invalid id
	*/
	
	function getDLR($phone,$dlr_id){
		$fieldcnt=3;
		$fieldstring = "id=$dlr_id&phone=$phone&utc=$this->utc&provider=$this->provider";
		
		$ch = curl_init();  
		curl_setopt($ch,CURLOPT_URL,$this->dlr_url);  
		curl_setopt($ch,CURLOPT_POST,$fieldcnt);  
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fieldstring);  
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
		$res = curl_exec($ch);   
		curl_close($ch);  
		return $res;
	}
}?>