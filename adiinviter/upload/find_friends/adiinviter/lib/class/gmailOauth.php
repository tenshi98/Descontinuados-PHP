<?php
/*******************************************************************************************
 * AdiInviter Pro 1.1 Stable Release by AdiInviter, Inc.                                   *
 *-----------------------------------------------------------------------------------------*
 *                                                                                         *
 * https://www.adiinviter.com                                                              *
 *                                                                                         *
 * Copyright ? 2008-2014, AdiInviter, Inc. All rights reserved.                            *
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

class Adi_gmail_Oauth extends AdiInviter_COR
{
	public $sha1_method = null;
	public $consumer = null;

	public $authorizeTokenURL = 'https://accounts.google.com/o/oauth2/auth';
	public $accessTokenURL = 'https://accounts.google.com/o/oauth2/token';

	public $use_cookies = false;

	public function getRequestToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('gmail');
		header("Location: ".$this->authorizeTokenURL.'?scope=https://www.googleapis.com/auth/contacts.readonly&client_id='. $this->consumer_key.'&hl=en-GB&from_login=1&pli=1&response_type=code&redirect_uri='.urlencode($callback_url)
		);
	}

	public function getAccessToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('gmail');
		$post_elements = array(
			'code'          => $_GET['code'],
			'client_id'     => $this->consumer_key,
			'client_secret' => urlencode($this->consumer_secret),
			'redirect_uri'  => $callback_url,
			'grant_type'    => 'authorization_code',
		);
		$headers = array('Host: accounts.google.com','Content-Type: application/atom+xml');
		$cnt=0;
		do {
			$res = $this->post($this->accessTokenURL,$post_elements,false,false,false,$headers);
			$response = json_decode($res, true);
			$cnt++;
			usleep(400000);
		}while(empty($response['access_token']) && $cnt <= 5);
		$adiinviter->session->set('gmail_access_token', $response['access_token']);
		return true;
	}

	public function fetchContacts()
	{
		global $adiinviter;
		$contacts=array();
		$access_token = $adiinviter->session->get('gmail_access_token');
		eval($this->token_str);
		return $contacts;
	}
}
?>