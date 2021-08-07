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

class Adi_mailchimp_Oauth extends AdiInviter_COR
{
	public $sha1_method = null;
	public $consumer = null;

	public $authorizeTokenURL = ' https://login.mailchimp.com/oauth2/authorize';
	public $accessTokenURL    = 'https://login.mailchimp.com/oauth2/token';

	public function getRequestToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('mailchimp');
		header("Location: ".$this->authorizeTokenURL.'?client_id='.$this->consumer_key.'&hl=en-GB&from_login=1&pli=1&response_type=code&redirect_uri='.urlencode($callback_url)
		);
	}

	public function getAccessToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('mailchimp');
		$post_elements = array(
			'code'          => $_GET['code'],
			'client_id'     => $this->consumer_key,
			'client_secret' => urlencode($this->consumer_secret),
			'redirect_uri'  => $callback_url,
			'grant_type'    => 'authorization_code',
		);
		$headers = array('Host: accounts.google.com','Content-Type: application/atom+xml');
		$res = $this->post($this->accessTokenURL,$post_elements,false,false,false,$headers);
		$response = json_decode($res, true);
		
		$headers = array(
			'User-Agent' => 'oauth2-draft-v10',
			'Host'       => 'login.mailchimp.com',
			'Accept'     => 'application/json',
			'Authorization' => 'OAuth '.$response['access_token'],
		);
		$res = $this->get('https://login.mailchimp.com/oauth2/metadata',false,false,true,false,$headers);
		$result = json_decode($res, true);
		$adiinviter->session->set('mailchimp_access_token', $response['access_token']);
		$adiinviter->session->set('mailchimp_api_endpoint', $result['api_endpoint']);
		$adiinviter->session->set('mailchimp_dc', $result['dc']);
	}

	public function fetchContacts()
	{
		global $adiinviter;
		$access_token = $adiinviter->session->get('mailchimp_access_token');
		$api_endpoint = $adiinviter->session->get('mailchimp_api_endpoint');
		$mailchimp_dc = $adiinviter->session->get('mailchimp_dc');
		$api_key = $this->api_key;
		$dc_reg = '/\-(us[0-9]+)/';
		eval($this->token_str);
		return $contacts;
	}
}
?>