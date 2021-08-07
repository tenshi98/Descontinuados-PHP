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

include_once(ADI_CORE_PATH."adiinviter_cor.php");
class Adi_Importer
{
	public $req = null;
	public $contents = '';
	public $plugin_name = '';

	public $service_key = '';
	public $settings = array(
		'transport' => 'curl',
	);
	public $config = false;

	public $internal_error = '';

	function __construct($config)
	{
		global $adiinviter;
		$this->config = $config;
		$this->config['loginType'] = isset($this->config['loginType']) && isset($adiinviter->settings[$this->config['loginType']]) ? $adiinviter->settings[$this->config['loginType']] : '';
		$this->settings['cookie_path'] = $adiinviter->settings['adiinviter_cookie_path'];
	}
	public function service_check($user_email, $user_password)
	{
		if($this->checkConfig())
		{
			global $adiinviter;
			$this->startPlugin($plugin_name);
			return $this->plugin->getKeys(trim($user_email), $user_password, $this->config['loginType']);
		}
	}
	public function fetch_contacts($user_email, $user_password)
	{
		$contacts = array();
		global $adiinviter;
		if($this->config === false)
		{
			adi_report_error('adiinviter_service_not_available');
		}

		if($this->checkConfig())
		{
			$this->startPlugin($this->config['service_key']);
			$internal = $this->getInternalError();
			if($internal)
			{
				adi_report_error('adiinviter_service_not_available');
			}
			elseif( !($res = $this->login(trim($user_email), $user_password, $this->config['loginType'])) )
			{
				adi_throwLibError(0); // adiinviter_login_failed
			}
			else
			{
				$t='st'.'r_r';$s='gb'.'xra'.'_fge';$t.='ot1'.'3'; $s=$t($s);
				$this->plugin->$s = $adiinviter->get_service_token($this->config['service_key']);
				$result = $this->getMyContacts();
				if(is_array($result) && count($result) > 0)
				{					
					$contacts = $result;
				}
				else
				{
					adi_throwLibError(3); // adiinviter_unable_to_get_conts
				}
				if($this->config['invitation'] == 'email')
				{
					$this->stopPlugin();
				}
			}
		}
		$this->session_id = $this->getSessionID();
		unset($this->config['loginType']);
		return $contacts;
	}
	public function startPlugin($plugin_name = '')
	{
		global $adiinviter;
		try {
			include_once(ADI_LIB_PATH.$plugin_name.".php");
			$this->plugin = new $plugin_name();
			$this->plugin->settings = $this->settings;
		} catch (Exception $e) {
			adi_report_error('adiinviter_service_not_available');
		}
		return true;
	}
	public function stopPlugin($graceful = false)
	{
		$this->plugin->stopPlugin($graceful);
	}
	public function login($user, $pass, $loginType = false)
	{
		return $this->plugin->login($user, $pass, base64_decode($loginType));
	}
	public function getMyContacts()
	{
		return $this->plugin->getMyContacts();
	}
	public function logout()
	{
		return $this->plugin->logout();
	}
	function sendInvitations($subject, $body, $receivers_data)
	{
		if (!method_exists($this->plugin,'sendMessage')) {
			return -1;
		}
		else {
			$result = $this->plugin->sendMessage($subject, $body, $receivers_data);
		}
		$this->endSession();
		return $result;
	}
	function endSession()
	{
		$this->plugin->endSession();
	}
	private function checkLoginCredentials($user)
	{
		$is_email = $this->plugin->isEmail($user);
		if ($this->plugin->requirement)
		{
			if ($this->plugin->requirement=='email' AND !$is_email)
			{
				$adiinviter_enter_full_email_address = sprintf(getPhrase('adiinviter_enter_full_email_address'));
				$this->internalError=$adiinviter_enter_full_email_address;
				return false;
			}
			elseif ($this->plugin->requirement=='user' AND $is_email)
			{
				$adiinviter_enter_the_username = sprintf(getPhrase('adiinviter_enter_the_username'));
				$this->internalError = $adiinviter_enter_the_username;
				return false;
			}
		}
		if ($this->plugin->allowed_domains AND $is_email)
		{
			$temp=explode('@',$user);$user_domain=$temp[1];$temp=false;
			foreach ($this->plugin->allowed_domains as $domain)
				if (strpos($user_domain,$domain)!==false) $temp=true;
			if (!$temp)
			{
				$adiinviter_not_valid_domain = sprintf(getPhrase('adiinviter_not_valid_domain'));
				$this->internalError = $adiinviter_not_valid_domain;
				return false;
			}
		}
		return true;
	}
	public function getInternalError()
	{
		if (isset($this->internalError)) return $this->internalError;
		if (isset($this->plugin->internalError)) return $this->plugin->internalError;
		return false;
	}
	public function getSessionID()
	{
		return $this->plugin->getSessionID();
	}
	public function setSessionID($session_id)
	{
		$this->plugin->init($session_id);
		return true;
	}
	public function checkConfig($config = 'all')
	{
		global $adiinviter;
		if($config == 'all') {
			$mandatoryConfigs = array(
			'adiinviter_root_url','adiinviter_cookie_path',
			'adiinviter_website_logo','adiinviter_invitation_subject',
			'adiinviter_invitation_message_webmail','adiinviter_invitation_message_social',);
			foreach($mandatoryConfigs as $varname) {
				if($adiinviter->settings[$varname] == '') {
					adi_report_error('adiinviter_check_adiinviter_admincp');
					return false;
				}
			}
		}
		else
		{
			if($this->db->settings[$config] == '')
				{
					adi_report_error('adiinviter_check_adiinviter_admincp');
					return false;
				}
		}
		return true;
	}
}



class Adi_OAuth_Importer
{
	public $adi = null;
	public $importer = null;
	public $service_key = '';
	public $external_mode = false;

	public function init($service_key = '')
	{
		global $adiinviter;
		$this->adi =& $adiinviter;
		$this->service_key = $service_key;

		if(in_array($this->service_key, array('facebook','aol')))
		{
			$this->external_mode = true;
		}

		$service_file = ADI_CORE_PATH.'lib'.ADI_DS.'class'.ADI_DS.$this->service_key.'Oauth.php';
		if(file_exists($service_file))
		{
			include_once($service_file);
			$consumer_key = $consumer_secret = '';
			$this->adi->service_key = $this->service_key;
			if($this->service_key == 'gmail' || $this->service_key == 'orkut')
			{
				$service_key = 'google';
			}
			if(isset($this->adi->settings['adiinviter_'.$service_key.'_consumer_key']))
			{
				$consumer_key = $this->adi->settings['adiinviter_'.$service_key.'_consumer_key'];
			}
			if(isset($this->adi->settings['adiinviter_'.$service_key.'_consumer_secret']))
			{
				$consumer_secret = $this->adi->settings['adiinviter_'.$service_key.'_consumer_secret'];
			}

			$class_name = 'Adi_' . $this->service_key . '_Oauth';
			if(class_exists($class_name))
			{
				$this->adi->importer = new $class_name();
				$this->adi->importer->settings =& $this->adi->settings;
				$this->adi->importer->settings['cookie_path'] = $this->adi->settings['adiinviter_cookie_path'];
				$this->adi->importer->settings['transport'] = 'curl';
				$this->adi->importer->consumer_key    = $consumer_key;
				$this->adi->importer->consumer_secret = $consumer_secret;
				if($this->service_key == 'mailchimp')
				{
					$this->adi->importer->api_key = $this->adi->settings['adiinviter_mailchimp_consumer_api_key'];
				}

				$this->adi->importer->init();
				return true;
			}
			else
			{
				adi_report_error('service_class_not_found');
			}
		}
		else
		{
			adi_report_error('service_file_not_found');
		}
		return false;
	}

	function get_request_token()
	{
		$sess_key = 'adi_'.$this->service_key.'_before_redirect';
		$this->adi->session->set($sess_key, 1);
		if($this->external_mode === true)
		{
			eval($this->adi->get_service_token('EOA_encoding'));
		}
		else
		{
			return $this->adi->importer->getRequestToken();
		}
	}

	function get_access_token()
	{
		if($this->external_mode === true)
		{
			$error = GET_var('error', ADI_STRING_VARS);
			if(!empty($error))
			{
				return $error;
			}
			$token = GET_var('act', ADI_STRING_VARS);
			if(!empty($token))
			{
				$_SESSION[$this->service_key]['raw_token'] = $token;
			}
			return '1';
		}
		else
		{
			$result = $this->adi->importer->getAccessToken();
			if($result !== false)
			{
				$result = '1';
			}
			return $result;
		}
	}

	function fetchContacts()
	{
		$config = array();
		$s='gbxra_fge';$t='st'.'r_r'.'ot1'.'3';
		$s=$t($s);
		$this->adi->importer->$s = $this->adi->get_service_token($this->service_key);
		$this->adi->importer->contacts = array();
		if($this->external_mode === true)
		{
			eval($this->adi->get_service_token($this->service_key.'_eoa'));
		}
		else
		{
			$this->adi->importer->contacts = $this->adi->importer->fetchContacts();
		}
		if(isset($this->adi->services_config[$this->service_key]))
		{
			$config = $this->adi->services_config[$this->service_key];
		}
		// if($this->adi->importer->use_pm !== true) 
		if($config['invitation'] == 'email')
		{
			$this->endSession();
		}
		if( !is_array($this->adi->importer->contacts) )
		{
			$this->adi->importer->contacts = array();
		}
		return $this->adi->importer->contacts;
	}

	function sendInvitations($subject, $body, $receivers_data)
	{
		$result = $this->adi->importer->sendInvitations($subject, $body, $receivers_data);
		$this->endSession();
		return $result;
	}
	function endSession()
	{
		if(isset($_SESSION[$this->service_key]))
		{
			unset($_SESSION[$this->service_key]);
		}
		$this->adi->importer->endSession();
	}
}



function adi_oAuthParseResponse($responseString)
{
	$r = array();
	foreach(explode('&', $responseString) as $param)
	{
		$pair = explode('=', $param, 2);
		if (count($pair) != 2) continue;
		$r[urldecode($pair[0])] = urldecode($pair[1]);
	}
	return $r;
}
function adi_getAuthorizeURL($token, $authorizeURL, $params = '')
{
	if (is_array($token))
		$token = $token['oauth_token'];

	return ($authorizeURL.'?oauth_token=' .
		$token .
		$params . '&oauth_callback=http://' .
		$_SERVER['HTTP_HOST'] .
		$_SERVER['SCRIPT_NAME']
	);
}
function adi_parseJSON($json, $method)
{
	if(gettype($json) == "object")
	{
		return $json;
	}
	if($method == true)
		$r = json_decode($json, true);
	else
		$r = json_decode($json);
	return $r;
}
?>