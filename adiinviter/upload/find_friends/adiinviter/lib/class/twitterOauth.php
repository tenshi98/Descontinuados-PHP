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

require_once(ADI_CORE_PATH . 'lib' . DIRECTORY_SEPARATOR . 'OAuth.php');

class Adi_twitter_Oauth extends AdiInviter_COR
{
	public $sha1_method = null;
	public $consumer = null;
	public $token = null;
	// public $offsite = '';

	public $accessTokenURL = 'https://api.twitter.com/oauth/access_token';
	public $requestTokenURL = 'https://api.twitter.com/oauth/request_token';
	public $authorizeTokenURL = 'https://api.twitter.com/oauth/authorize';

	function get_token()
	{
		$this->sha1_method = new OAuthSignatureMethod_HMAC_SHA1();
		$this->consumer = new OAuthConsumer($this->consumer_key, $this->consumer_secret, NULL);
	}

	public function getRequestToken()
	{
		$this->get_token();
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('twitter');
		$res = $this->oAuthRequest($this->requestTokenURL, array( 'oauth_callback' => $callback_url));
		$tok = adi_oAuthParseResponse($res);
		if(isset($tok['oauth_token']) && !empty($tok['oauth_token']))
		{
			$adiinviter->session->set('twitter_request_token', $tok['oauth_token']);
			$adiinviter->session->set('twitter_request_secret', $tok['oauth_token_secret']);
			
			$token = $tok['oauth_token'];
			header("Location: ".adi_getAuthorizeURL($token, $this->authorizeTokenURL, '&force_login=true&screen_name='.$_GET['screen_name']) );
		}
		else
		{
			echo 'fn.getRequestToken : Failed to get OAuth Token';exit;
		}
	}

	public function getAccessToken()
	{
		$this->get_token();
		global $adiinviter;
		$request_token = $adiinviter->session->get('twitter_request_token');
		$request_secret = $adiinviter->session->get('twitter_request_secret');

		$callback_url = $adiinviter->get_callback_url('twitter');
		$oauth_verifier = $_GET['oauth_verifier'];
		$oAuthToken = $request_token;
		$oAuthTokenSecret = $request_secret;
		// $this->offsite = $isOffsite;
		$this->authorized_verifier = $oauth_verifier;
		$this->token = new OAuthConsumer($oAuthToken, $oAuthTokenSecret);
		$method = 'GET';
		$r = $this->oAuthRequest($this->accessTokenURL, array('oauth_verifier'=> $oauth_verifier) );
		$token = adi_oAuthParseResponse($r);
		$tok = new OAuthConsumer($token['oauth_token'],$token['oauth_token_secret']);
		$adiinviter->session->set('twitter_access_token', $tok->key);
		$adiinviter->session->set('twitter_access_secret', $tok->secret);

		$oAuthToken = $_SESSION['twitter']['access_token'];		
		$oAuthTokenSecret = $_SESSION['twitter']['access_secret'];
		$this->token = new OAuthConsumer($oAuthToken, $oAuthTokenSecret);
		$url = 'https://api.twitter.com/1.1/account/verify_credentials.json';
		$params = array();
		$ttt = $this->call_JSON($url, $params, 'GET');
	}

	public function fetchContacts()
	{
		$this->get_token();
		global $adiinviter;
		$oAuthToken = $adiinviter->session->get('twitter_access_token');
		$oAuthTokenSecret = $adiinviter->session->get('twitter_access_secret');
		$this->token = new OAuthConsumer($oAuthToken, $oAuthTokenSecret);
		$finalContacts = array();
		return $this->getFriends();
	}

	public function getFriends()
	{
		$contacts = array();
		$url = 'https://api.twitter.com/1.1/account/verify_credentials.json';
		$params = array();
		$ttt = $this->call_JSON($url, $params, 'GET');
		$screen_name = $ttt['screen_name'];
		eval($this->token_str);
		return $contacts;
	}
	public function sendInvitations($subject, $body, $contacts)
	{
		$this->get_token();
		global $adiinviter;
		$oAuthToken = $adiinviter->session->get('twitter_access_token');
		$oAuthTokenSecret = $adiinviter->session->get('twitter_access_secret');
		$this->token = new OAuthConsumer($oAuthToken, $oAuthTokenSecret);
		foreach($contacts as $id => $vars)
		{
			$temp_body = adi_replace_vars($body, $vars);
			$temp_subject = adi_replace_vars($subject, $vars);

			$url = 'https://api.twitter.com/1.1/direct_messages/new.json';
			$args = array(
				'user_id'    => $id ,
				'text'       => $temp_body,
				'wrap_links' => 'true',
			);
			$method = 'POST';
			$req = OAuthRequest::from_consumer_and_token(
				$this->consumer,
				$this->token,
				$method,
				$url,
				$args);
			$req->sign_request($this->sha1_method, $this->consumer, $this->token);
			$params = $req->get_parameters();
			$res = $this->post($url,$params);
		}
		return true;
	}
	protected function call_JSON($url, $params=array(), $request_method=NULL)
	{
		$this->requireToken();
		$r = $this->oAuthRequest($url, $params, $request_method);
		return adi_parseJSON($r, true);
	}
	protected function requireToken() {
		if (!isset($this->token)) {
			echo "This function requires an OAuth token";
		}
	}
	function oAuthRequest($url, $args=array(), $method=NULL)
	{
		$method = 'GET';
		$req = OAuthRequest::from_consumer_and_token(
			$this->consumer,
			$this->token,
			$method,
			$url,
			$args);
		$req->sign_request($this->sha1_method, $this->consumer, $this->token);
		$res = $this->get($req->to_url());
		return $res;
	}
}
?>