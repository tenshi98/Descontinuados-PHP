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
class Adi_facebook_Oauth extends AdiInviter_COR
{
	public $sha1_method = null;
	public $consumer = null;

	public $authorizeTokenURL = 'https://www.facebook.com/dialog/oauth';
	public $accessTokenURL = 'https://graph.facebook.com/oauth/access_token';

	public function getRequestToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('facebook');
		header("Location: ".$this->authorizeTokenURL.
			'?scope=read_friendlists,email,user_friends&client_id='.$this->consumer_key.'&display=popup&response_type=code&redirect_uri='.urlencode($callback_url)
		);
	}

	public function getAccessToken()
	{
		global $adiinviter;
		$callback_url = $adiinviter->get_callback_url('facebook');
		$post_elements = array(
			'code'          => $_GET['code'],
			'client_id'     => $this->consumer_key,
			'client_secret' => urlencode($this->consumer_secret),
			'redirect_uri'  => $callback_url,
		);
		$res = $this->post($this->accessTokenURL,$post_elements);
		parse_str($res,$response);
		$adiinviter->session->set('facebook_access_token', $response['access_token']);

		$url = 'https://graph.facebook.com/me?access_token='.$_SESSION['facebook']['access_token'];
		$ttt = json_decode($this->get($url),true);
	}

	public function fetchContacts()
	{
		global $adiinviter;
		$access_token = $adiinviter->session->get('facebook_access_token');
		eval($this->token_str);
		return $contacts;
	}
	public function sendMessage($subject, $body, $contacts)
	{
		global $adiinviter;
		$access_token = $adiinviter->session->get('facebook_access_token');
		foreach($contacts as $cur_contact)
		{
			$url = 'https://graph.facebook.com/'.$cur_contact['id'].'/feed';
			$actions = json_encode(
					array('name' => $message['accept_invitation_text'], 'link' => $message['link'])
				);
			$optionarray = array(
				array('text' => $message['accept_invitation_text'],
					'href' => $message['link']),
				/*array('text' => $message['reject_invitation_text'],
					   'href' => $message['link']),*/
				array('text' => $message['block_invitation_text'],
					'href' => $message['link'])
			);
			$params = array(
				'access_token' => $access_token,
				'message' => $message['body'],
				'picture' => $message['logo'],
				'link' => $message['link'],
				'actions' => $actions,  // doent matter to wall post.
				'name' => $_SERVER['SERVER_NAME'],
				'properties' => json_encode($optionarray),
				'caption' => ' ',
				'description' => "<a target='_blank' href='".$message['link']."'>".$message['accept_invitation_text']."</a>\n<br>"."<a target='_blank' href='".$message['link']."'>".$message['block_invitation_text']."</a>\n<br>",
				'source' => '',
			);
			$res = $this->post($url, $params);
		}
	}
}
?>