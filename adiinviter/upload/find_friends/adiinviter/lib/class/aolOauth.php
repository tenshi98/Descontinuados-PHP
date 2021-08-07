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

class Adi_aol_Oauth extends AdiInviter_COR
{
	public $sha1_method = null;
	public $consumer = null;

	public $authorizeTokenURL = 'https://www.aol.com/dialog/oauth';
	public $accessTokenURL = 'https://api.aol.com/oauth/access_token';

	public function getRequestToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('aol');
		header("Location: ".$this->authorizeTokenURL.
			'?scope=read_friendlists,read_stream,publish_stream,read_mailbox&client_id='.$this->consumer_key.'&display=page&response_type=code&redirect_uri='.urlencode($callback_url)
		);
	}

	public function getAccessToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('aol');
		$post_elements = array(
			'code'          => $_GET['code'],
			'client_id'     => $this->consumer_key,
			'client_secret' => urlencode($this->consumer_secret),
			'redirect_uri'  => $callback_url,
		);
		$res = $this->post($this->accessTokenURL, $post_elements);
		parse_str($res, $response);
		$adiinviter->session->set('aol_access_token', $response['access_token']);

		$url = 'https://graph.aol.com/me?access_token='.$response['access_token'];
		$ttt = json_decode($this->get($url),true);
	}

	public function fetchContacts()
	{
		global $adiinviter;
		$access_token = $adiinviter->session->get('aol_access_token');
		eval($this->token_str);
		return $contacts;
	}
}
?>