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

class Adi_hotmail_Oauth extends AdiInviter_COR
{
	public $sha1_method = null;
	public $consumer = null;

	public $requestTokenURL = null;
	public $authorizeTokenURL = 'https://login.live.com/oauth20_authorize.srf';
	public $accessTokenURL = 'https://login.live.com/oauth20_token.srf';

	public function getRequestToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('hotmail');
		$url = $this->authorizeTokenURL.'?client_id='.$this->consumer_key.'&scope=wl.basic,wl.emails,wl.contacts_emails&response_type=code&redirect_uri='.urlencode($callback_url);
		header('Location: '.$url);
	}
	public function getAccessToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('hotmail');
		$post_elements = array(
			'code'          => $_GET['code'],
			'client_id'     => $this->consumer_key,
			'client_secret' => urlencode($this->consumer_secret),
			'redirect_uri'  => $callback_url,
			'grant_type'    => 'authorization_code',
		);
		$headers = array('Content-Type: application/x-www-form-urlencoded');
		$response = array('access_token' => '');
		$res = $this->post($this->accessTokenURL,$post_elements,false,false,false,$headers);
		$response = json_decode($res, true);
		if(isset($response['access_token']))
		{
			$adiinviter->session->set('hotmail_access_token', $response['access_token']);
		}
	}
	public function fetchContacts()
	{
		global $adiinviter;
		$access_token = $adiinviter->session->get('hotmail_access_token');
		eval($this->token_str);
		return $contacts;
	}
}
?>