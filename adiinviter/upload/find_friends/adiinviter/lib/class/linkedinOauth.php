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
class Adi_linkedin_Oauth extends AdiInviter_COR
{
	public $sha1_method = null;
	public $consumer = null;

	public $authorizeTokenURL = 'https://www.linkedin.com/uas/oauth2/authorization';
	public $accessTokenURL    = 'https://www.linkedin.com/uas/oauth2/accessToken';

	public function getRequestToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('linkedin');
		header("Location: ".$this->authorizeTokenURL.'?response_type=code&client_id='.$this->consumer_key.'&scope='.urlencode('r_basicprofile r_network w_messages').'&state=findfriends&redirect_uri='.urlencode($callback_url)
		);
	}

	public function getAccessToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('linkedin');
		$post_elements = array(
			'code'          => $_GET['code'],
			'client_id'     => $this->consumer_key,
			'client_secret' => urlencode($this->consumer_secret),
			'redirect_uri'  => $callback_url,
			'grant_type'    => 'authorization_code',
		);
		$res = $this->post($this->accessTokenURL,$post_elements,false,false,false);
		$response = json_decode($res, true);
		if(isset($response['access_token']))
		{
			$adiinviter->session->set('linkedin_access_token', $response['access_token']);
		}
	}

	public function fetchContacts()
	{
		global $adiinviter;
		$access_token = $adiinviter->session->get('linkedin_access_token');
		$finalContacts = array();
		eval($this->token_str);
		return $finalContacts;
	}
	public function sendInvitations($subject, $body, $contacts)
	{
		global $adiinviter;
		$access_token = $adiinviter->session->get('linkedin_access_token');
		foreach($contacts as $id => $vars)
		{
			$temp_body = adi_replace_vars($body, $vars);
			$temp_subject = adi_replace_vars($subject, $vars);
			
			$url = 'https://api.linkedin.com/v1/people/~/mailbox?oauth2_access_token='.$access_token;
			$headers = array( 'Content-Type' => 'application/json' );
			$post_elements = array(
				'recipients' => array(
					'values' => array(
						array('person' => array("_path" => '/people/'.$id)),
					),
				),
				'subject' => $temp_subject,
				'body'    => $temp_body,
			);
			$res = $this->post($url,json_encode($post_elements),true,false,false,$headers,true);
		}
		return true;
	}
}
?>