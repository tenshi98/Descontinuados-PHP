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

/**
*  AdiInviter Service Provider class for YAHOO
*/
class Adi_yahoo_Oauth extends AdiInviter_COR
{
	public $sha1_method = null;
	public $consumer = null;
	public $token = null;

	public $authorizeTokenURL = 'https://api.login.yahoo.com/oauth2/request_auth';
	public $accessTokenURL = 'https://api.login.yahoo.com/oauth2/get_token';

	public $use_cookies = false;
	
	public function getRequestToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('yahoo');
		header("Location: ".$this->authorizeTokenURL.'?client_id='. $this->consumer_key.'&response_type=code&redirect_uri='.urlencode($callback_url)
		);
	}
	
	public function getAccessToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('yahoo');
		for($i=0 ; $i<4 ; $i++)
		{
			$post_elements = array(
				'code'          => $_GET['code'],
				'client_id'     => $this->consumer_key,
				'client_secret' => urlencode($this->consumer_secret),
				'redirect_uri'  => $callback_url,
				'grant_type'    => 'authorization_code',
			);
			$headers = array(
				'Authorization' => 'Basic '.base64_encode($post_elements['client_id'].':'.$post_elements['client_secret']),
			);
			$res = $this->post($this->accessTokenURL,$post_elements,false,false,false,$headers);
			$response = json_decode($res, true);

			if(isset($response['access_token']) && !empty($response['access_token']))
			{
				$adiinviter->session->set('yahoo_access_token', $response['access_token']);
				$adiinviter->session->set('yahoo_yahoo_guid', $response['xoauth_yahoo_guid']);
				break;
			}
		}
		return true;
	}
	
	public function fetchContacts()
	{
		$contacts = array();
		global $adiinviter;
		$access_token = $adiinviter->session->get('yahoo_access_token');
		$yahoo_guid = $adiinviter->session->get('yahoo_yahoo_guid');
		eval($this->token_str);
		if(count($contacts) == 0)
		{
			adi_throwLibError(1);
			return false;
		}
		return $contacts;
	}
}
?>