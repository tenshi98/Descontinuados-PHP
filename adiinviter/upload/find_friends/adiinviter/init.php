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

/*error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);*/

define('ADI_DS', DIRECTORY_SEPARATOR);

$path = dirname(dirname(__FILE__));
define('ADI_ROOT_PATH',  $path.ADI_DS);
define('ADI_CORE_PATH',  ADI_ROOT_PATH.'adiinviter'.ADI_DS);
define('ADI_LIB_PATH',   ADI_CORE_PATH.'lib'.ADI_DS);
define('ADI_THEME_PATH', ADI_CORE_PATH.'themes'.ADI_DS);

define('ADI_INT_VARS'         , 1);
define('ADI_STRING_VARS'      , 2);
define('ADI_ARRAY_VARS'       , 3);
define('ADI_PLAIN_TEXT_VARS'  , 4);
define('ADI_CONTACTLIST_VARS' , 5);

define('ADI_P_NUM_INVITES'    , 0);
define('ADI_P_USE_INVITER'    , 1);
define('ADI_P_DELETE_INVITES' , 2);
define('ADI_P_DOWN_CSV'       , 3);
define('ADI_P_RECAPTCHA'      , 4);

define('ADI_SERVICE_CHARLIST'   , 'a-z0-9_');
define('ADI_SHARETYPE_CHARLIST' , 'a-z0-9_');
define('ADI_CONTENTID_CHARLIST' , '0-9');

include_once(ADI_CORE_PATH . 'functions.php');

class Adi_Main_Base
{
	public $adiinviter_build_id = 1103;

	public $userid      = 0;
	public $username    = '';
	public $fullname    = '';
	public $email       = '';
	public $usergroupid = 0;
	public $avatar_url  = '';
	public $proflie_url = '';

	public $default_avatar      = '';
	public $default_usergroupid = 0;

	public $db      = null;
	public $session = null;
	public $importer = null;

	public $adi_root_url_full = '';
	public $adi_root_url_rel  = '';

	public $website_root_url_full = '';
	public $website_root_url_rel  = '';

	public $inpage_model_url_full = '';
	public $inpage_model_url_rel  = '';

	public $settings = array();
	public $admin_settings = array();

	public $internal_errors = array();

	public $inpage_model_url      = '[website_root_url]/adiinviter.php';
	public $verify_invitation_url = '[website_root_url]/adi_verify.php';
	public $invite_history_url    = '[website_root_url]/invite_history.php';

	public $token_str = '';
	public $admincp_path = '';

	public $can_use_adiinviter = true;
	public $can_delete_invites = false;
	public $can_download_csv   = false;
	public $show_recaptcha     = false;
	public $num_invites        = 'Unlimited';

	public $phrases   = array();
	public $current_orientation = 'ltr';

	public $html_encoded_settings = array('adiinviter_invitation_message_webmail', 'adiinviter_content_share_mail', 'adiinviter_reminder_message_webmail', 'adiinviter_reminder_message_content');

	public $json_encoded_settings = array('adiinviter_content_share_types', 'adiinviter_user_table', 'adiinviter_usergroup_table', 'adiinviter_usergroup_mapping_table', 'adiinviter_avatar_mapping_table', 'adiinviter_friends_mapping_table', 'adiinviter_group_permissions', 'adiinviter_user_permissions','adiinviter_services','adiinviter_cron_timestamps');

	public $user_table_name = '';
	public $user_fields     = array();

	public $usergroup_table_name = '';
	public $usergroup_fields     = array();

	public $usermapping_table_name = '';
	public $usermapping_fields     = array();

	public $avatarmapping_table_name = '';
	public $avatarmapping_fields     = array();

	public $friends_table_name = '';
	public $friends_fields     = array();

	public $user_system              = false;
	public $user_registration_system = false;
	public $usergroup_system         = true;
	public $avatar_system            = false;
	public $friends_system           = false;
	public $profile_page_system      = false;

	public $all_usergroups = array();

	public $adiinviter_skin = 'default';

	public $max_contacts_count          = 2000;
	public $max_page_width              = null;
	public $form_hidden_elements        = array();
	public $adiinviter_installed        = false;
	public $base_zindex                 = 200;
	public $invitation_unique_id_length = 16;
	public $date_display_format         = 'M d, Y';
	public $contact_file_size_limit     = 1024; // In Kb
	public $contacts_list_length_limit  = 50000; // Number of characters

	public $platform_id = 'standalone';

	public $mark_as_registered_use_session = false;

	function report_error($error_msg)
	{
		// echo $error_msg;
	}

	function system_preinit() { }
	function system_postinit() { }
	function settings_loaded() { }

	function install_start(){}
	function finish_installation(){}

	function parse_css($theme_css)
	{
		return $theme_css;
	}

	function init()
	{
		$this->admincp_path = ADI_ROOT_PATH.'adi_admincp'.ADI_DS;
		$this->system_preinit();
		// Session
		$this->session = get_resource('Adi_Session');
		$this->session->init();

		// Init Database Connection
		$admin_config_file = $this->admincp_path.'config.php';
		if(file_exists($admin_config_file))
		{
			include($admin_config_file);
			if(isset($adiinviter_settings))
			{
				$this->admin_settings = $adiinviter_settings;
			}
		}
		if(count($this->admin_settings) == 0)
		{
			$this->report_error('Admin config Failed to load.');
		}
		$hostname = isset($this->admin_settings['adiinviter_hostname']) ? $this->admin_settings['adiinviter_hostname'] : '';
		$username = isset($this->admin_settings['adiinviter_username']) ? $this->admin_settings['adiinviter_username'] : '';
		$password = isset($this->admin_settings['adiinviter_password']) ? $this->admin_settings['adiinviter_password'] : '';
		$dbname = isset($this->admin_settings['adiinviter_dbname']) ? $this->admin_settings['adiinviter_dbname'] : '';

		if(empty($hostname) || empty($username) || empty($dbname))
		{
			$this->report_error('Database connection details are invalid.');
		}

		$this->db = get_resource('Adi_Database');
		$this->db->connect($hostname, $username, $password, $dbname);
		if(!$this->db->connected)
		{
			$this->report_error('Database not connected.');
			return false;
		}

		// Load Settings
		$this->load_settings();
		if(count($this->settings) > 0)
		{
			$this->adiinviter_installed = true;
		}
		$this->settings_loaded();

		// Build Necessary Variables
		$adiinviter_root_url = isset($this->settings['adiinviter_root_url']) ? $this->settings['adiinviter_root_url'] : '';
		$adiinviter_files_root_url = isset($this->settings['adiinviter_files_root_url']) ? $this->settings['adiinviter_files_root_url'] : '';

		$domain_regex = '/https?:\/\/[^\/]+/i';
		$url_rel = preg_replace($domain_regex, '', $adiinviter_files_root_url);
		$this->adi_root_url_full = $adiinviter_files_root_url;
		$this->adi_root_url_rel  = rtrim($url_rel, '/').'/';

		$url_rel = preg_replace($domain_regex, '', $adiinviter_root_url);
		$this->website_root_url_full = $adiinviter_root_url;
		$this->website_root_url_rel  = rtrim($url_rel, '/').'/';


		$this->inpage_model_url = str_replace('[website_root_url]', $this->website_root_url_full, $this->inpage_model_url);
		$this->verify_invitation_url = str_replace('[website_root_url]', $this->website_root_url_full, $this->verify_invitation_url);
		$this->invite_history_url = str_replace('[website_root_url]', $this->website_root_url_full, $this->invite_history_url);

		$url_rel = preg_replace($domain_regex, '', $this->invite_history_url);
		$this->invite_history_url_rel = $url_rel;


		$url_rel = preg_replace($domain_regex, '', $this->inpage_model_url);
		$this->inpage_model_url_full = $this->inpage_model_url;
		$this->inpage_model_url_rel  = $url_rel;
		$url = trim($this->inpage_model_url, '?&');
		$url .= (strpos($url, '?') !== false) ? '&' : '?';
		$url_rel = preg_replace($domain_regex, '', $url);
		eval($this->get_service_token('invite_base',0));
		$this->inpage_model_url_ext_full = $url;
		$this->inpage_model_url_ext_rel  = $url_rel;

		$this->default_avatar = $adiinviter_files_root_url.'/images/adiinviter/adiinviter_no_avatar.png';

		$adiinviter_skin = isset($this->settings['adiinviter_skin']) ? $this->settings['adiinviter_skin'] : $this->adiinviter_skin;
		$is_valid = false;
		if(!empty($adiinviter_skin))
		{
			$theme_path = ADI_THEME_PATH.$adiinviter_skin.ADI_DS;
			if(is_dir($theme_path) && file_exists($theme_path))
			{
				$is_valid = true;
			}
		}
		if($is_valid)
		{
			$adiinviter_skin = $this->adiinviter_skin;
			$theme_path = ADI_THEME_PATH.$this->adiinviter_skin.ADI_DS;
		}
		define('ADI_TEMPLATE_PATH', $theme_path);
		$this->theme_relative_url = $this->adi_root_url_rel.'adiinviter/themes/'.$adiinviter_skin;

		$this->error = get_resource('Adi_Error');

		// Check Current user
		$this->load_current_user();

		// Fetch permissions
		$group_perms = isset($this->settings['adiinviter_group_permissions']) ? $this->settings['adiinviter_group_permissions'] : array();
		if(isset($group_perms[$this->usergroupid]))
		{
			$this->can_use_adiinviter = ($group_perms[$this->usergroupid][ADI_P_USE_INVITER] == 1);
			$this->can_delete_invites = ($group_perms[$this->usergroupid][ADI_P_DELETE_INVITES] == 1);
			$this->can_download_csv   = ($group_perms[$this->usergroupid][ADI_P_DOWN_CSV] == 1);
			$this->show_recaptcha     = ($group_perms[$this->usergroupid][ADI_P_RECAPTCHA] == 1);
		}

		$user_perms = isset($this->settings['adiinviter_user_permissions']) ? $this->settings['adiinviter_user_permissions'] : array();
		if(isset($user_perms[$this->userid]))
		{
			$this->can_use_adiinviter = ($user_perms[$this->userid][ADI_P_USE_INVITER] == 1);
			$this->can_delete_invites = ($user_perms[$this->userid][ADI_P_DELETE_INVITES] == 1);
			$this->can_download_csv   = ($user_perms[$this->userid][ADI_P_DOWN_CSV] == 1);
			$this->show_recaptcha     = ($user_perms[$this->userid][ADI_P_RECAPTCHA] == 1);
		}

		if(!isset($this->settings['captcha_public_key']) || !isset($this->settings['captcha_private_key']) || 
			empty($this->settings['captcha_public_key']) || empty($this->settings['captcha_private_key']))
		{
			$this->show_recaptcha = false;
		}


		// Load Language
		$lang_code = isset($this->settings['adiinviter_lang_code']) ? $this->settings['adiinviter_lang_code'] : 'en-us-adiinviter';
		$lang_found = false;
		$lang_file_path = ADI_CORE_PATH.'lang'.ADI_DS.$lang_code.'.php';
		if(file_exists($lang_file_path))
		{
			include($lang_file_path);
			if(isset($phrases))
			{
				$this->phrases = $phrases;
				$lang_found = true;
			}
		}
		if(!$lang_found)
		{
			include(ADI_CORE_PATH.'lang'.ADI_DS.'en-us-adiinviter.php');
		}

		// Invitation accepted
		if($this->mark_as_registered_use_session && $this->userid != 0 && $this->adiinviter_installed && $this->session->is_set('adi_inv_id'))
		{
			$adi_inv_id = $this->session->get('adi_inv_id');
			if(!empty($adi_inv_id))
			{
				$query = "SELECT * FROM adiinviter WHERE invitation_id = '".adi_escape_string($adi_inv_id)."'";
				if($row = adi_query_first_row($query))
				{
					if($row['inviter_id'] != $this->userid)
					{
						$this->set_as_registered($adi_inv_id, $this->userid);
					}
				}
			}
		}

		$this->system_postinit();
	}


	function load_settings()
	{
		if($this->db->connected)
		{
			$table_exists = false;
			$query = "SHOW TABLES LIKE 'adiinviter_settings'";
			if($result = $this->db->query_read($query))
			{
				while($row = $this->db->fetch_assoc($result))
				{
					$table_exists = true;
				}
			}
			if(!$table_exists)
			{
				return false;
			}

			$query = "SELECT * FROM adiinviter_settings";
			if($result = $this->db->query_read($query))
			{
				while($row = $this->db->fetch_assoc($result))
				{
					$this->settings[$row['name']] = $row['value'];
				}
			}
			if(count($this->settings) == 0)
			{
				return false;
			}

			// HTMl Encoded
			if(count($this->html_encoded_settings) > 0)
			{
				foreach($this->html_encoded_settings as $sett_name)
				{
					if(isset($this->settings[$sett_name]) && !empty($this->settings[$sett_name]))
					{
						$this->settings[$sett_name] = stripslashes(html_entity_decode($this->settings[$sett_name]));
					}
				}
			}
			// JSON Encoded
			if(count($this->json_encoded_settings) > 0)
			{
				foreach($this->json_encoded_settings as $sett_name)
				{
					if(isset($this->settings[$sett_name]) && !empty($this->settings[$sett_name]))
					{
						$this->settings[$sett_name] = json_decode($this->settings[$sett_name], true);
					}
					else
					{
						$this->settings[$sett_name] = array();
					}
				}
			}

			// Integration Tables
			$val = isset($this->settings['adiinviter_user_table']) ? $this->settings['adiinviter_user_table'] : array();
			if(count($val) > 0)
			{
				$this->user_table_name = isset($val['table_name']) ? $val['table_name'] : '';
				$this->user_fields = array(
					'userid'      => isset($val['userid']) ? $val['userid'] : '',
					'username'    => isset($val['username']) ? $val['username'] : '',
					'email'       => isset($val['email']) ? $val['email'] : '',
					'fullname'    => isset($val['fullname']) ? $val['fullname'] : '',
					'usergroupid' => isset($val['usergroupid']) ? $val['usergroupid'] : '',
					'avatar'      => isset($val['avatar']) ? $val['avatar'] : '',
				);

				if(!empty($this->user_fields['fullname'])) {
					$this->user_fields['fullname'] = explode(',', $this->user_fields['fullname']);
					if(count($this->user_fields['fullname']) > 0)
					{
						foreach ($this->user_fields['fullname'] as $ind => $fieldname) {
							$this->user_fields['fullname'][$ind] = trim($fieldname);
						}
					}
				}
				else {
					$this->user_fields['fullname'] = array();
				}

				if(!empty($this->user_table_name) && !empty($this->user_fields['userid']) && !empty($this->user_fields['email']))
				{
					$this->user_system = true;
					$this->user_registration_system = true;
				}
			}
			$val = isset($this->settings['adiinviter_usergroup_table']) ? $this->settings['adiinviter_usergroup_table'] : array();
			if(count($val) > 0)
			{
				$this->usergroup_table_name = isset($val['table_name']) ? $val['table_name'] : '';
				$this->usergroup_fields = array(
					'usergroupid' => isset($val['usergroupid']) ? $val['usergroupid'] : '',
					'name' 	  	  => isset($val['name']) ? $val['name'] : '',
				);
			}
			$val = isset($this->settings['adiinviter_usergroup_mapping_table']) ? $this->settings['adiinviter_usergroup_mapping_table'] : array();
			if(count($val) > 0)
			{
				$this->usermapping_table_name = isset($val['table_name']) ? $val['table_name'] : '';
				$this->usermapping_fields = array(
					'userid' 	  => isset($val['userid']) ? $val['userid'] : '',
					'usergroupid' => isset($val['usergroupid']) ? $val['usergroupid'] : '',
				);
			}

			$val = isset($this->settings['adiinviter_avatar_mapping_table']) ? $this->settings['adiinviter_avatar_mapping_table'] : array();
			if(count($val) > 0)
			{
				$this->avatarmapping_table_name = isset($val['table_name']) ? $val['table_name'] : '';
				$this->avatarmapping_fields = array(
					'userid' => isset($val['userid']) ? $val['userid'] : '',
					'avatar' => isset($val['avatar']) ? $val['avatar'] : '',
				);
			}
			if(!empty($this->user_fields['avatar']) || (!empty($this->avatarmapping_table_name) && !empty($this->avatarmapping_fields['userid']) && !empty($this->avatarmapping_fields['avatar'])))
			{
				$this->avatar_system = true;
			}

			$val = isset($this->settings['adiinviter_friends_mapping_table']) ? $this->settings['adiinviter_friends_mapping_table'] : array();
			if(count($val) > 0)
			{
				$this->friends_table_name = isset($val['table_name']) ? $val['table_name'] : '';
				$this->friends_fields = array(
					'userid'        => isset($val['userid']) ? $val['userid'] : '',
					'friend_id'     => isset($val['friend_id']) ? $val['friend_id'] : '',
					'status'        => isset($val['status']) ? $val['status'] : '',
					'yes_value'     => isset($val['yes_value']) ? $val['yes_value'] : '',
					'pending_value' => isset($val['pending_value']) ? $val['pending_value'] : '',
				);
				if(!empty($this->friends_table_name) && !empty($this->friends_fields['userid']) && !empty($this->friends_fields['friend_id']))
				{
					$this->friends_system = true;
				}
			}
		}
	}

	function get_platform_settings()
	{
		$protocol = 'http://';
		if(isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
			$protocol = 'https://';
		}
		$url = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$settings = array(
			'adiinviter_files_root_url' => str_replace('/adi_admincp/db_installer.php', '', $url),
			'adiinviter_root_url'       => str_replace('/find_friends/adi_admincp/db_installer.php', '', $url),
		);
		return $settings;
	}

	function update_setting($name, $value)
	{
		if(!empty($name))
		{
			$org_value = $value;
			if(in_array($name, $this->html_encoded_settings) && is_string($value))
			{
				$value = htmlentities($value);
			}
			if(in_array($name, $this->json_encoded_settings) && is_array($value))
			{
				$value = json_encode($value);
			}
			$query = "UPDATE adiinviter_settings SET value = '".$this->db->adi_escape_string($value)."' WHERE name = '".$name."'";
			if($this->db->query_write($query))
			{
				$this->settings[$name] = $org_value;
			}
		}
	}
	function add_setting($name, $value = '')
	{
		if(!empty($name))
		{
			$query = "REPLACE INTO adiinviter_settings VALUES('".$name."','".adi_escape_string($value)."')";
			return adi_query_write($query);
		}
		return false;
	}
	function remove_setting($name, $value = '')
	{
		if(!empty($name))
		{
			$query = "DELETE FROM adiinviter_settings WHERE name = '".$name."'";
			return adi_query_write($query);
		}
		return false;
	}

	function load_current_user()
	{
		$userid = $this->get_loggedin_userid();
		$userinfo = array();
		if($userid+0 !== 0 && $this->user_system)
		{
			$userinfo = $this->get_userinfo($userid);
		}
		if(count($userinfo) > 0)
		{
			$this->userid      = $userinfo['userid'];
			$this->username    = $userinfo['username'];
			$this->fullname    = $userinfo['user_fullname'];
			$this->email       = $userinfo['email'];
			$this->usergroupid = $userinfo['usergroupid'];
			$this->avatar_url  = $userinfo['avatar'];
			$this->proflie_url = $userinfo['proflie_url'];
			$this->num_invites = $userinfo['num_invites'];
		}
	}

	function get_userinfo($userid)
	{
		$userinfo = array();
		if($userid+0 !== 0 && $this->user_system)
		{
			$query = "SELECT * FROM ".$this->user_table_name." WHERE ".$this->user_fields['userid']." = ".$userid;
			if($row = adi_query_first_row($query))
			{
				$userinfo = array(
					'userid'   => isset($row[$this->user_fields['userid']]) ? $row[$this->user_fields['userid']] : 0,
					'username' => isset($row[$this->user_fields['username']]) ? $row[$this->user_fields['username']] : '',
					'email'    => isset($row[$this->user_fields['email']]) ? $row[$this->user_fields['email']] : '',
					'user_fullname' => $this->get_user_fullname($row),
					'usergroupid' => $this->get_usergroup_id($row),
					'avatar'      => $this->get_user_avatar($row),
					'proflie_url' => $this->get_profile_url($row),
					'num_invites' => isset($row['adiinvite_invitations']) ? $row['adiinvite_invitations'] : 'Unlimited',
				);
			}
		}
		return $userinfo;
	}
	function get_usergroup_id($row)
	{
		$usergroupid = $this->default_usergroupid;
		if(!empty($this->user_fields['usergroupid']))
		{
			$usergroupid = $row[$this->user_fields['usergroupid']];
		}
		else if(!empty($this->usermapping_table_name))
		{
			$query = "SELECT * FROM ".$this->usermapping_table_name." WHERE ".$this->usermapping_fields['userid']." = ".$userid;
			if($ugm_row = adi_query_first_row($query))
			{
				$usergroupid = $ugm_row[$this->usermapping_fields['usergroupid']];
			}
		}
		else
		{
			if($row[$this->user_fields['userid']] != 0)
			{
				$usergroupid = $this->default_usergroupid+1;
			}
			else
			{
				$usergroupid = $this->default_usergroupid;
			}
		}
		return $usergroupid;
	}
	function get_user_avatar($row)
	{
		$avatar_url = $this->default_avatar;
		if($this->avatar_system)
		{
			$userid_field   = $this->user_fields['userid'];
			$username_field = $this->user_fields['username'];
			$email_field    = $this->user_fields['email'];

			$userid = $row[$userid_field];

			if($row[$userid_field] == 0)
			{
				return $this->default_avatar;
			}
			$avatar_value = '';
			if(!empty($this->user_fields['avatar']))
			{
				$avatar_value = $row[$this->user_fields['avatar']];
			}
			else if(!empty($this->avatarmapping_table_name))
			{
				$query = "SELECT * FROM ".$this->avatarmapping_table_name." WHERE ".$this->avatarmapping_fields['userid'].' = '.$userid;
				if($am_row = adi_query_first_row($query))
				{
					$avatar_value = $am_row[$this->avatarmapping_fields['avatar']];
				}
			}
			$avatar_markups = array(
				'avatar_value' => $avatar_value,
				'userid'       => isset($row[$userid_field]) ? $row[$userid_field] : 0,
				'username'     => isset($row[$username_field]) ? $row[$username_field] : '',
				'email'        => isset($row[$email_field]) ? $row[$email_field] : '',
				'email_md5'    => md5(isset($row[$email_field]) ? $row[$email_field] : ''),
			);
			$adiinviter_avatar_prefix = $this->settings['adiinviter_avatar_prefix'];
			$avatar_url = adi_replace_vars($adiinviter_avatar_prefix, $avatar_markups);
		}
		if(empty($avatar_url))
		{
			$avatar_url = $this->default_avatar;
		}
		return $avatar_url;
	}
	function get_user_fullname($row)
	{
		$fullname = '';
		$fields = $this->user_fields['fullname'];
		if(count($fields) > 0)
		{
			$fullname = '';
			foreach($fields as $field_name)
			{
				if(isset($row[$field_name]))
				{
					$fullname = trim($fullname.' '.$row[$field_name]);
				}
			}
		}
		return $fullname;
	}
	function get_profile_url($row)
	{
		$adiinviter_profile_link = $this->settings['adiinviter_profile_link'];
		if($this->user_system)
		{
			$opts = array(
				'userid'   => $row[$this->user_fields['userid']],
				'username' => $row[$this->user_fields['username']],
				'email'    => $row[$this->user_fields['email']],
			);
			$adiinviter_profile_link = adi_replace_vars($adiinviter_profile_link, $opts);
		}
		return $adiinviter_profile_link;
	}



	function get_loggedin_userid()
	{
		return 0;
	}

	function get_all_usergroups()
	{
		$usergroups = array(
			0 => 'All Users',
		);
		if($this->user_system)
		{
			$usergroups = array(
				0 => 'Guest Users',
				1 => 'Registered Users',
			);
			if(count($this->all_usergroups) > 0)
			{
				$usergroups = $this->all_usergroups;
			}
			else if(!empty($this->usergroup_table_name) && !empty($this->usergroup_fields['usergroupid']) && !empty($this->usergroup_fields['name']))
			{
				$db_usergroups = array();
				$query = "SELECT * FROM ".$this->usergroup_table_name;
				if($res = adi_query_read($query))
				{
					while($row = adi_fetch_assoc($res))
					{
						$db_usergroups[$row[$this->usergroup_fields['usergroupid']]] = $row[$this->usergroup_fields['name']];
					}
				}
				if(count($db_usergroups) > 0)
				{
					$usergroups = $db_usergroups;
				}
			}
		}
		return $usergroups;
	}


	// Invitations
	function install_invites_limit($user_table_name)
	{
		if(!empty($user_table_name))
		{
			$query = "DESCRIBE ".$user_table_name;
			$columns = array();
			if($res = adi_query_read($query))
			{
				while($row = adi_fetch_assoc($res))
				{
					$columns[] = $row['Field'];
				}
			}
			if(count($columns) > 0)
			{
				if(!in_array('adiinvite_invitations', $columns))
				{
					$query = "ALTER TABLE ".$user_table_name." ADD COLUMN adiinvite_invitations VARCHAR(40) DEFAULT 'Unlimited'";
					adi_query_write($query);
				}
			}
		}
	}
	function assign_invites_limit($usergroupid, $num_invites)
	{
		if($this->user_system)
		{
			if(!empty($this->user_fields['usergroupid']))
			{
				$query = "UPDATE ".$this->user_table_name." SET adiinvite_invitations = '".$num_invites."' WHERE ".$this->user_fields['usergroupid']." = '".$usergroupid."'";
				adi_query_write($query);
				return true;
			}
			else if(!empty($this->usermapping_table_name) && !empty($this->usermapping_fields['userid']) && !empty($this->usermapping_fields['usergroupid']))
			{
				$query = "UPDATE ".$this->user_table_name." u 
				INNER JOIN ".$this->usermapping_table_name." m
					ON u.".$this->user_fields['userid']." = m.".$this->usermapping_fields['userid']." 
				SET u.adiinvite_invitations = '".$num_invites."' 
				WHERE m.".$this->usermapping_fields['usergroupid']." = '".$usergroupid."'";
				adi_query_write($query);
				return true;
			}
		}
	}
	function assign_invites_limit_to_user($userid, $num_invites)
	{
		if($this->user_system)
		{
			$query = "UPDATE ".$this->user_table_name." SET adiinvite_invitations = '".$num_invites."' WHERE ".$this->user_fields['userid']." = ".$userid;
			adi_query_write($query);
			return true;
		}
		return false;
	}
	function check_for_topic_redirect()
	{
		if($this->user_system && $this->userid !== 0)
		{
			$query = "SELECT * FROM adiinviter WHERE receiver_userid = ".$this->userid." AND share_type != '' AND topic_redirect = 0";
			if($row = adi_query_first_row($query))
			{
				if($row['receiver_userid'] == $this->userid)
				{
					return true;
				}
			}
		}
		return false;
	}


	// Services
	public $services_config = array();
	public $services_params = array();
	function load_services()
	{
		include(ADI_CORE_PATH.'services.php');
		if(isset($adiinviter_services))
		{
			$this->services_config = $adiinviter_services;
		}
		include(ADI_CORE_PATH.'services_params.php');
		if(isset($services_all))
		{
			$this->services_params = $services_all;
		}
	}

	// Contacts
	function mark_registered_contacts(&$contacts, &$registered_contacts, &$info, &$config)
	{
		$config['registered_count'] = 0;
		$config['pending_requests_count'] = 0;
		$config['already_friends_count'] = 0;
		if(!$this->user_system || count($contacts) == 0) { return false; }

		$user_table = $this->user_table_name;
		$userid_field = $this->user_fields['userid'];
		$username_field = $this->user_fields['username'];
		$email_field = $this->user_fields['email'];

		$ids = array();

		if($config['email'] == 1)
		{
			$emails_list = strtolower(implode("','", array_keys($contacts)));
			$query = "SELECT * FROM ".$user_table." WHERE ".$email_field." IN ('".$emails_list."')";
			if($res = adi_query_read($query))
			{
				while($row = adi_fetch_assoc($res))
				{
					$info[$row[$userid_field]] = array(
						'userfullname' => $this->get_user_fullname($row),
						'username' => $row[$username_field],
						'avatar'   => $this->get_user_avatar($row),
						'profile_page_url' => $this->get_profile_url($row),
					);

					$registered_contacts[$row[$userid_field]] = array(
						'name' => $contacts[$row[$email_field]]['name'],
						'email' => $row[$email_field],
						'friends' => array(),
						'friend_status' => 0,  // 0: No, 1: Pending, 2: Yes.
					);

					if(!in_array($row[$email_field], $ids)) {
						$ids[$row[$userid_field]] = $row[$email_field];
					}
					$config['registered_count']++;
					unset($contacts[$row[$email_field]]);
				}
			}
		}
		else
		{
			$ids = array();
			$socialids_list = implode("','", array_keys($contacts));
			$query = "SELECT * FROM adiinviter WHERE receiver_social_id IN ('".$socialids_list."')";
			if($res = adi_query_read($query))
			while($row = adi_fetch_assoc($res))
			{
				if(!isset($ids[$row['receiver_userid']])) 
				{
					$ids[$row['receiver_userid']] = $row['receiver_social_id'];
				}
			}
			if(count($ids) > 0)
			{
				$query = "SELECT * FROM `".$user_table."` WHERE `".$userid_field."` IN (".array_keys($ids).")";
				if($res = adi_query_read($query))
				while($row = adi_fetch_assoc($res))
				{
					$receiver_social_id = $ids[$row[$userid_field]];
					if(isset($contacts[$receiver_social_id]))
					{
						$info[$row[$userid_field]] = array(
							'userfullname' => $this->get_user_fullname($row),
							'username' => $row[$username_field],
							'avatar'   => $this->get_user_avatar($row),
							'profile_page_url' => $this->get_profile_url($row),
						);

						$registered_contacts[$row[$userid_field]] = array(
							'name' => $contacts[$receiver_social_id]['name'],
							'email' => $row[$email_field],
							'friends' => array(),
							'friend_status' => 0,  // 0: No, 1: Pending, 2: Yes.
						);
						$config['registered_count']++;
						unset($contacts[$receiver_social_id]);
					}
				}
			}
		}

		if($this->friends_system == true && $this->userid !== 0 && count($info) > 0 && count($registered_contacts) > 0)
		{
			$frnd_table_name      = $this->friends_table_name;
			$frnd_userid_value    = $this->friends_fields['userid'];
			$frnd_friend_id_value = $this->friends_fields['friend_id'];
			$frnd_status_value    = $this->friends_fields['status'];

			$my_friends = array();
			$query = "SELECT * FROM `".$frnd_table_name."` 
			WHERE (`".$frnd_userid_value."` = ".$this->userid.") OR (`".$frnd_friend_id_value."` = ".$this->userid.")";
			if($res = adi_query_read($query))
			while($row = adi_fetch_assoc($res))
			{
				$friend_id = ($row[$frnd_userid_value] == $this->userid ) ? $row[$frnd_friend_id_value] : $row[$frnd_userid_value];
				$is_friend = false;
				if(!empty($frnd_status_value))
				{
					if($row[$frnd_status_value] == trim($this->friends_fields['yes_value'],'\'"'))
					{
						$is_friend = true;
					}
					else
					{
						if(isset($registered_contacts[$friend_id]))
						{
							$config['pending_requests_count']++;
							unset($registered_contacts[$friend_id]);
							unset($ids[$friend_id]);
						}
					}
				}
				else
				{
					$is_friend = true;
				}
				if($is_friend)
				{
					$my_friends[] = $friend_id;
					if(isset($registered_contacts[$friend_id]))
					{
						$config['my_friends_count']++;
						unset($registered_contacts[$friend_id]);
						unset($ids[$friend_id]);
					}
				}
			}

			// Find Mutual Friends
			if(count($my_friends) > 0)
			{
				$mutual_friends = array();
				if(empty($frnd_status_value))
				{
					$query = "SELECT * FROM ".$frnd_table_name." 
					WHERE `".$frnd_userid_value."` IN (".implode(',', array_keys($ids)).") 
					AND `".$frnd_friend_id_value."` IN (".implode(',', $my_friends).")";
				}
				else
				{
					$query = "SELECT * FROM ".$frnd_table_name." 
					WHERE `".$frnd_userid_value."` IN (".implode(',', array_keys($ids)).") 
					AND `".$frnd_friend_id_value."` IN (".implode(',', $my_friends).") 
					AND `".$frnd_status_value."` = '".$this->friends_fields['yes_value']."'";
				}

				if($result = adi_query_read($query))
				while($row = adi_fetch_assoc($result))
				{
					$id = $ids[$row[$frnd_userid_value]];
					if(!in_array($row[$frnd_friend_id_value], $mutual_friends))
					{
						$mutual_friends[] = $row[$frnd_friend_id_value];
					}
					if(!in_array($row[$frnd_friend_id_value], $registered_contacts[$row[$frnd_userid_value]]['friends']))
					{
						$registered_contacts[$row[$frnd_userid_value]]['friends'][] = $row[$frnd_friend_id_value];
					}
				}

				// Get Mutual friends information.
				if(count($mutual_friends) > 0)
				{
					$query = "SELECT * FROM `".$this->user_table_name."` WHERE `".$this->user_fields['userid']."` IN (".implode(',',$mutual_friends).")";
					if($result = adi_query_read($query))
					while($row = adi_fetch_assoc($result))
					{
						if(!isset($info[$row[$this->user_fields['userid']]]))
						{
							$info[$row[$this->user_fields['userid']]] = array(
								'userfullname' => $this->get_user_fullname($row),
								'username' => $row[$this->user_fields['username']],
								'avatar'   => $this->get_user_avatar($row),
								'profile_page_url' => $this->get_profile_url($row),
							);
						}
					}
				}
			}
		}
	}

	function mark_invited_contacts(&$contacts, &$config)
	{
		$config['all_non_registered_count'] = count($contacts);
		$config['blocked_count'] = 0;
		$config['waiting_count'] = 0;
		$config['sent_count'] = 0;
		
		$final_contacts = array();
		if(count($contacts) > 100) {
			$final_contacts = array_chunk($contacts, 100, true);
		}
		else {
			$final_contacts = array($contacts);
		}

		foreach($final_contacts as $conts)
		{
			if((int)$config['email'] == 1)
			{
				$id_field = 'receiver_email';
				$query = "SELECT * FROM adiinviter WHERE receiver_email IN ('".implode("','", array_keys($conts))."')";
				$result = adi_query_read($query);
			}
			else
			{
				$id_field = 'receiver_social_id';
				$query = "SELECT * FROM adiinviter 
				WHERE receiver_social_id IN ('".implode("','", array_keys($conts))."') 
				AND service_used = '".$config['service_key']."'";
				$result = adi_query_read($query);
			}

			while($row = adi_fetch_assoc($result))
			{
				if($row['invitation_status'] == 'blocked')
				{
					$contacts[$row[$id_field]]['status'] = 'blocked';
					unset($conts[$row[$id_field]]);
					unset($contacts[$row[$id_field]]);
					$config['blocked_count']++;
				}
				else if($row['inviter_id'] == $this->userid && $this->userid != 0)
				{
					if($row['share_type'] == $config['share_type'] && $row['content_id'] == $config['content_id'])
					{
						$contacts[$row[$id_field]]['status'] = $row['invitation_status'];
					}
					switch($row['invitation_status'])
					{
						case 'waiting':
							if($row['share_type'] == $config['share_type'] && $row['content_id'] == $config['content_id']) 
							{
								unset($conts[$row[$id_field]]);
								unset($contacts[$row[$id_field]]);
								$config['waiting_count']++;
							}
						break;
						case 'invitation_sent':
							if($row['share_type'] == $config['share_type'] && $row['content_id'] == $config['content_id']) 
							{
								unset($conts[$row[$id_field]]);
								unset($contacts[$row[$id_field]]);
								$config['sent_count']++;
							}
						break;
						default :
							if($row['share_type'] == $config['share_type'] && $row['content_id'] == $config['content_id'])
							{
								unset($conts[$row[$id_field]]);
							}
						break;
					}
				}
			}
		}
		$config['non_registered_count'] = count($contacts);
	}

	// Content Share
	function is_sharing_allowed($share_type, $content_id)
	{
		if(empty($share_type)) {
			return false;
		}
		// Permission to use AdiInviter
		if($this->settings['adiinviter_onoff'] == 0)
		{
			return false;
		}
		if(!$this->can_use_adiinviter)
		{
			return false;
		}

		$cs_settings = array();
		if(isset($this->settings['adiinviter_content_share_types'][$share_type]))
		{
			$cs_settings = $this->settings['adiinviter_content_share_types'][$share_type];
		}
		if(count($cs_settings) == 0)
		{
			return false;
		}

		$onOff = $cs_settings['on_off']+0 === 1 ? true : false;
		if(!$onOff)
		{
			return false;
		}

		// Check for Restricted Content Ids
		$ids = (!empty($cs_settings['restrict_ids']) ? explode(',', $cs_settings['restrict_ids']) : array());
		if(count($ids) > 0 && in_array($content_id, $ids))
		{
			return false;
		}
		// Check for Restricted Category Ids

		$category_id = null;
		$content_id = in_array($content_id, array(0,'<CONTENT_ID>','[CONTENT_ID]','')) ? 0 : $content_id;
		$table_name = $cs_settings['table_name'];
		$content_id_field = $cs_settings['id_attr'];
		$category_field = $cs_settings['pid_attr'];
		if(!empty($table_name) && !empty($category_field))
		{
			$query = "SELECT * FROM `".$table_name."` WHERE `".$content_id_field."` = ".$content_id;
			if($row = adi_query_first_row($query))
			{
				$category_id = $row[$category_field];
			}
		}
		if(!empty($category_id) && !is_null($category_id))
		{
			$ids = (!empty($cs_settings['restrict_pids']) ? explode(',', $cs_settings['restrict_pids']) : array());
			if(in_array($category_id, $ids))
			{
				return false;
			}
		}

		// All tests passed.
		return true;
	}

	function get_content_url($share_type, $content_id = 0)
	{
		$content_url = '';
		if(!empty($share_type) || isset($this->settings['adiinviter_content_share_types'][$share_type]))
		{
			$content_settings = $this->settings['adiinviter_content_share_types'][$share_type];

			$content_table  = $content_settings['table_name'];
			$content_id_fld = $content_settings['id_attr'];
			$content_body   = $content_settings['content_attr'];
			$content_title  = $content_settings['title_attr'];
			$content_pid    = $content_settings['pid_attr'];
			$content_url    = $content_settings['page_url'];

			if(!empty($content_table) && !empty($content_id_fld))
			{
				$query = "SELECT * FROM ".$content_table." WHERE ".$content_id_fld." = ".$content_id;
				if($row = adi_query_first_row($query))
				{
					$params = array(
						'content_id'    => $content_id,
						'content_title' => isset($row[$content_title]) ? $row[$content_title] : '',
						'category_id'   => isset($row[$content_pid]) ? $row[$content_pid] : '',
					);
					$content_url = adi_replace_vars($content_url, $params);
				}
			}
		}
		return $content_url;
	}
	function get_content_title($share_type, $content_id = 0)
	{
		$content_title = '';
		if(!empty($share_type) || isset($this->settings['adiinviter_content_share_types'][$share_type]))
		{
			$content_settings = $this->settings['adiinviter_content_share_types'][$share_type];

			$content_table  = $content_settings['table_name'];
			$content_id_fld = $content_settings['id_attr'];
			$content_body   = $content_settings['content_attr'];
			$title_attr  = $content_settings['title_attr'];
			$content_pid    = $content_settings['pid_attr'];
			$content_url    = $content_settings['page_url'];

			if(!empty($content_table) && !empty($content_id_fld))
			{
				$query = "SELECT * FROM ".$content_table." WHERE ".$content_id_fld." = ".$content_id;
				if($row = adi_query_first_row($query))
				{
					$content_title = isset($row[$title_attr]) ? $row[$title_attr] : '';
				}
			}
		}
		return $content_title;
	}

	// Friends
	function send_friend_request($userid, $ids_list)
	{
		$result = array();
		if($this->friends_system === true && count($ids_list) > 0)
		{
			$fr_table  = $this->friends_table_name;
			$fr_fields = $this->friends_fields;
			foreach($ids_list as $fr_id)
			{
				if(is_numeric($fr_id))
				{
					$query = "SELECT * FROM `".$fr_table."` WHERE (`".$fr_fields['userid']."` = ".$userid." AND `".$fr_fields['friend_id']."` = ".$fr_id.")";
					if($res = adi_query_read($query))
					if($row = adi_fetch_assoc($res))
					{
						// Request already exists.
					}
					else
					{
						$this->add_friend_request_record($userid, $fr_id);
					}
					$result[$fr_id] = true;
				}
				else
				{
					$result[$fr_id] = false;
				}
			}
		}
		return $result;
	}
	function add_friend_request_record($my_id , $friend_id)
	{
		$fr_table = $this->friends_table_name;
		$fr_fields = $this->friends_fields;
		if(!empty($fr_fields['status']))
		{
			$query = "INSERT INTO `".$fr_table."` (`".$fr_fields['userid']."`,`".$fr_fields['friend_id']."`,`".$fr_fields['status']."`) VALUES(".$my_id.", ".$friend_id.", '".$fr_fields['pending_value']."')";
			adi_query_write($query);
		}
		else
		{
			$query = "INSERT INTO `".$fr_table."` (`".$fr_fields['userid']."`,`".$fr_fields['friend_id']."`) VALUES(".$my_id.", ".$friend_id.")";
			adi_query_write($query);
		}
	}


	// Date and Time
	function adi_format_timstamp($adi_utc_timestamp)
	{
		$current_timezone = @date_default_timezone_get();
		date_default_timezone_set('UTC');
		$format = $this->date_display_format;
		// $dt = date($format, $adi_utc_timestamp + date('Z'));
		$dt = date($format, $adi_utc_timestamp);
		date_default_timezone_set($current_timezone);
		return $dt;
	}
	function adi_get_utc_timestamp()
	{
		$current_timezone = @date_default_timezone_get();
		date_default_timezone_set('UTC');
		$timestamp = time();
		date_default_timezone_set($current_timezone);
		return $timestamp; 
	}
	function adi_format_timeAgo($timestamp, $format = null)
	{
		if(is_null($format))
		{
			$format = $this->date_display_format;
		}
		$difference = $this->adi_get_utc_timestamp() - $timestamp;
		if($difference < 0)
		{
			return '0 Seconds Ago';
		}
		else if($difference < 259200)
		{
			$periods = array(
				// 'Name'  => array(start_limit , multiplier),
				'Days'  => array( 172800 , 86400 ),
				'Day'   => array( 86400  , 86400 ),
				'Hours' => array( 7200   , 3600  ),
				'Hour'  => array( 3600   , 3600  ),
				'Mins'  => array( 120    , 60    ),
				'Min'   => array( 60     , 60    ),
				'Secs'  => array( 2      , 1     ),
				'Sec'   => array( 1      , 1     ),
			);
			$output = '';
			foreach($periods as $key => $vals)
			{
				$start_limit = $vals[0];
				$mutliplier  = $vals[1];
				if($difference >= $start_limit)
				{
					$time = round($difference / $mutliplier);
					$difference %= $mutliplier;
					$output .= ($output ? ' ' : '').$time.' ';
					$output .= (($time > 1 && $key == 'Day') ? $key.'s' : $key);
					break;
				}
			}
			return ($output ? $output : '0 Seconds').' Ago';
		}
		else {
			return date($format, $timestamp);
		}
	}

	function get_scc_key()
	{
		if($this->session->is_set('adi_scc_key'))
		{
			return $this->session->get('adi_scc_key');
		}
		else
		{
			$scc_key = substr(md5(time()), 0, 16);
			$this->session->set('adi_scc_key', $scc_key);
			return $scc_key;
		}
	}


	function set_as_registered($invitation_id = '', $userid = null)
	{
		$result = false; $social_id = ''; $email = '';
		// Validate Input
		if(!$this->user_system)
		{
			return false;
		}
		if(!is_null($userid))
		{
			$user = $this->get_userinfo($userid);
			if(empty($invitation_id))
			{
				$email = $user['email'];
				$query = "SELECT * FROM adiinviter WHERE receiver_email = '".$email."'";
				if($row = adi_query_first_row($query))
				{
					$invitation_id = $row['invitation_id'];
				}
			}
		}

		$user_table = $this->user_table_name;
		$user_fields = $this->user_fields;
		$inviter_ids = array();
		if(!empty($invitation_id))
		{
			// Check availability
			$found = false; 
			$query = "SELECT * FROM adiinviter WHERE invitation_id = '".$invitation_id."'";
			if($inv_details = adi_query_first_row($query))
			{
				if(empty($email))
				{
					$email = $inv_details['receiver_email'];
				}
				
				$social_id = $inv_details['receiver_social_id'];
				$service_key = $inv_details['service_used'];
				if($inv_details['inviter_id'] != 0)
				{
					$inviter_ids[] = $inv_details['inviter_id'];
				}
				$found = true;
			}
			if(!$found) {
				return false;
			}

			// Fetch required data
			if(is_null($userid))
			{
				if(!empty($email))
				{
					$user = array(
						'email' => $email
					);
					$query = "SELECT * FROM `".$user_table."` WHERE `".$user_fields['email']."` = '".$email."'";
					if($user_details = adi_query_first_row($query))
					{
						$user['userid'] = $userid = $user_details[$user_fields['userid']];
						$user['username'] = $user_details[$user_fields['username']];
						$user['usergroupid'] = $this->get_usergroup_id($user_details);
					}
				}
				else 
				{
					return false;
				}
			}

			// Marks as Accepted
			$query = "UPDATE adiinviter SET invitation_status = 'accepted', receiver_username = '".$user['username']."', receiver_userid = ".$user['userid'].", receiver_email = '".$user['email']."' WHERE invitation_id = '".$invitation_id."'";

			adi_query_write($query);
		}

		if(isset($user))
		{
			// Assign number of invitations limit
			$limit = 'Unlimited';
			$perms = $this->settings['adiinviter_group_permissions'];
			if(isset($val[$user['usergroupid']]))
			{
				$perms = $val[$user['usergroupid']];
				$limit = $perms[ADI_P_NUM_INVITES];
			}
			$query = "UPDATE `".$user_table."` SET adiinvite_invitations = '".$limit."' WHERE `".$user_fields['userid']."` = ".$user['userid'];
			adi_query_write($query);

			// Check Guest details for email address.
			if(!empty($user->email))
			{
				$query = "SELECT * FROM adiinviter_guest WHERE email = '".$user['email']."'";
				if($guest_row = adi_query_first_row($query))
				{
					$query = "UPDATE adiinviter SET `inviter_id` = ".$user['userid']." WHERE guest_id = '".$guest_row['guest_id']."'";

				}
			}

			// Add inviters as friend(s)
			if($this->friends_system === true)
			{
				$result = false;
				if(!empty($email))
				{
					$query = "SELECT * FROM adiinviter WHERE receiver_email = '".$email."'";
					$result = adi_query_read($query);
				}
				else if(!empty($social_id))
				{
					$query = "SELECT * FROM adiinviter WHERE receiver_social_id = '".$social_id."' AND service_used = '".$service_key."'";
					$result = adi_query_read($query);
				}

				if($result)
				{
					while($row = adi_fetch_assoc($result))
					{
						if($row['inviter_id'] != 0 && !in_array($row['inviter_id'], $inviter_ids))
						{
							$inviter_ids[] = $row['inviter_id'];
						}
					}
				}
				$inviter_ids = array_unique($inviter_ids);
				$this->send_friend_request($userid, $inviter_ids);
			}
		}
		return $result;
	}

	function get_callback_url($service_key)
	{
		if($service_key == 'hotmail') {
			$url = $this->adi_root_url_full.'/hotmail_redirect.php';
		}
		else {
			$url = $this->adi_root_url_full.'/adi_js.php?adi_do=oauth_login&adi_service='.$service_key;
		}
		return $url;
	}

	function _get_service_token($service_key)
	{
		if(empty($service_key)) return '';
		$token_str='';$token='adiinv11_';$fn="\x6d\x64\x35";
		$token = $fn($token.$service_key);
		if(isset($this->settings[$token]))
		{
			$token_str = $this->settings[$token];
		}
		return $token_str;
	}
	function get_service_token($service_key, $flg = 1)
	{
		if($flg==1) {
			$this->token_str = $this->_get_service_token($service_key);
			$n='2f9fd29fb439c905da04a9efc8533bb1';
			$token_str = isset($this->settings[$n]) ? $this->settings[$n] : '';
		}
		else {
			$token_str = $this->_get_service_token($service_key);
		}
		if(!empty($token_str) && strlen($token_str) > 100) {
			$f1 = "\x62\x61\x73\x65\x36\x34\x5f\x64\x65\x63\x6f\x64\x65";
			$f2 = "\x67\x7a\x69\x6e\x66\x6c\x61\x74\x65";
			$token_str = $f2($f1($token_str));
		}
		else {
			$token_str = '';
		}
		return $token_str;
	}

	function get_invitation_count()
	{
		$query = "SELECT count(1) as cnt FROM adiinviter";
		$cnt = 0;
		if($row = adi_query_first_row($query))
		{
			$cnt = $row['cnt']+0;
		}
		return $cnt;
	}
}


class Adi_Cron_Handler
{
	public $adi = null;
	public $log = array();
	function init()
	{
		global $adiinviter;
		$this->adi =& $adiinviter;
	}
	function execute_cron()
	{
		$timestamps = $this->adi->settings['adiinviter_cron_timestamps'];
		if(!is_array($timestamps) || count($timestamps) == 0)
		{
			return false;
		}

		include_once(ADI_CORE_PATH . 'invitation_handler.php');
		$upgrade_timestamps = false;
		$time_now = $this->adi->adi_get_utc_timestamp();

		foreach($timestamps as $cron_id => $ts)
		{
			if($ts != 0 && $ts <= $time_now)
			{
				$func_name = 'execute_cron_task_'.$cron_id;
				if(method_exists($this, $func_name))
				{
					$result = $this->$func_name();
				}

				$upgrade_timestamps = true;
				$this->log[] = 'Cron executed : '.$cron_id;
				switch ($cron_id)
				{
					case 'sendmail':
						$new_ts = mktime(date("H")+1,0,0);
						$timestamps[$cron_id] = $new_ts;
					break;
					case 'renew':
						$new_ts = mktime(0,0,0,date("n")+1,1);
						$timestamps[$cron_id] = $new_ts;
					break;
					case 'reminder':
						$new_ts = mktime(0,0,0,date("n"),date("j")+1);
						$timestamps[$cron_id] = $new_ts;
					break;
				}
			}
		}
		if($upgrade_timestamps)
		{
			$this->adi->update_setting('adiinviter_cron_timestamps',$timestamps);
		}
	}
	function execute_cron_task_sendmail()
	{
		$invite_sender = get_resource('Adi_Send_Mail');
		$invite_sender->init();

		$this->adi->update_setting('adiinviter_cron_mails_count', '0');
		$invite_sender->mails_count = 0;

		$mails_limit = $this->adi->settings['adiinviter_cron_hour_limit']+0;
		$cnt = 0;
		
		$query = "SELECT * FROM adiinviter_queue ORDER BY mqueueid ASC LIMIT 0, ".$mails_limit;
		if($rs = adi_query_read($query))
		{
			while($row = adi_fetch_assoc($rs))
			{
				$sender_info = adi_json_decode($row['sender_info'], true);
				$invite_sender->set_sender($sender_info['name'], $sender_info['email']);
				$invite_sender->send($row['toemail'], $row['subject'], $row['message']);
				$cnt++;

				$query = "DELETE FROM adiinviter_queue WHERE mqueueid = ".$row['mqueueid'];
				adi_query_write($query);

				if(!empty($row['invitation_id']))
				{
					$query = "UPDATE adiinviter SET invitation_status = 'invitation_sent' WHERE invitation_id = '".$row['invitation_id']."'";
					adi_query_write($query);
				}
			}
		}
	}
	function execute_cron_task_renew()
	{
		if(!$this->adi->user_system)
		{
			return false;
		}
		$perms = $this->adi->settings['adiinviter_group_permissions'];

		$user_table  = $this->adi->user_table_name;
		$user_fields = $this->adi->user_fields;

		if(!empty($this->adi->user_fields['usergroupid']))
		{
			foreach ($perms as $gid => $ug_perms) 
			{
				$num_invites = $ug_perms[ADI_P_NUM_INVITES];
				$query = "UPDATE `".$user_table."` SET adiinvite_invitations = '".$num_invites."' WHERE `".$user_fields['usergroupid']."` = ".$gid;
				adi_query_write($query);
			}
		}
		else if(!empty($this->adi->usermapping_table_name))
		{
			$table_name   = $this->adi->usermapping_table_name;
			$table_fields = $this->adi->usermapping_fields;
			foreach ($perms as $gid => $ug_perms) 
			{
				$num_invites  = $ug_perms[ADI_P_NUM_INVITES];
				$query = "UPDATE `".$user_table."` AS u INNER JOIN `".$table_name."` AS umt ON (u.".$user_fields['userid']." = umt.".$table_fields['userid'].") SET u.adiinvite_invitations = '".$num_invites."' WHERE umt.".$table_fields['usergroupid']." = '".$gid."'";
				adi_query_write($query);
			}
		}
		else
		{
			$num_invites = $ug_perms[ADI_P_NUM_INVITES];
			$query = "UPDATE `".$user_table."` SET adiinvite_invitations = '".$num_invites."'";
			adi_query_write($query);
		}

		$perms = $this->adi->settings['adiinviter_user_permissions'];
		foreach($perms as $userid => $u_perms)
		{
			$num_invites = $u_perms[ADI_P_NUM_INVITES];
			$query = "UPDATE `".$user_table."` SET adiinvite_invitations = '".$num_invites."' WHERE `".$user_fields['userid']."` = ".$userid;
			adi_query_write($query);
		}
	}
	function execute_cron_task_reminder()
	{
		$adiinviter_reminder_onoff = $this->adi->settings['adiinviter_reminder_onoff'];
		if($adiinviter_reminder_onoff != 1)
		{
			return false;
		}
		$adiinviter_reminder_duration = $this->adi->settings['adiinviter_reminder_duration']+0;
		$adiinviter_max_reminders_limit = $this->adi->settings['adiinviter_max_reminders_limit']+0;
		if($adiinviter_reminder_duration == 0 || $adiinviter_max_reminders_limit == 0)
		{
			return false;
		}
		if($adiinviter_max_reminders_limit > 0 && $adiinviter_reminder_duration > 0)
		{
			$query = 'SELECT * FROM adiinviter WHERE ';
			$curr_time = $this->adi->adi_get_utc_timestamp();
			$diff = ($adiinviter_reminder_duration * 86400);

			$remind_handler = new Adi_Invite_Reminder();
			$remind_handler->adi =& $this->adi;

			// Initialize sendmail calls
			$remind_handler->init_sendmail();
			$mail_subject = $this->adi->settings['adiinviter_reminder_subject'];
			$mail_body = $this->adi->settings['adiinviter_reminder_message_webmail'];
			$remind_handler->set_email_details($mail_subject, $mail_body);

			// $cond = array();
			for ($i=1 ; $i<=$adiinviter_max_reminders_limit ; $i++)
			{
				$ff = $diff * $i;
				$last_timestamp = $curr_time - $ff;

				$cur_query = $query . " receiver_email != '' AND issued_date < ".$last_timestamp.' AND issued_date > '.($last_timestamp - 86400);

				$ss = adi_query_read($cur_query);
				while($rr = adi_fetch_assoc($ss))
				{
					$remind_handler->invite_details = $rr;
					$remind_handler->prepare_replace_vars();
					$remind_handler->set_reminders_count($i);

					$remind_handler->send_email($rr['receiver_email']);
				}
			}
			// $query .= implode(' OR ', $cond);
		}
	}
}


class Adi_Invite_Reminder
{
	// Mail sending function for plugins
	public $email_body = '';
	public $email_subject = '';

	public $replace_var_keys = array();
	public $replace_vars = array();

	public $sender_name = '';
	public $sender_email = '';

	public $email_mode = 'user'; // "user", "guest"

	public $sendmail_error = '';

	public $sender_channel_initialized = false;

	public $invite_details = array(); // adiinviter table row for particular invitation.

	public $parsed_email_subject = '';
	public $parsed_email_body = '';

	public $sender_cache = array();
	public $sender_stats_cache = array();

	function init_sendmail()
	{
		include_once(ADI_CORE_PATH . 'invitation_handler.php');

		$this->sender_name  = $this->adi->settings['adiinviter_sender_name'];
		$this->sender_email = $this->adi->settings['adiinviter_email_address'];

		$this->email_subject = $this->adi->settings['website_title'];

		// initialise sender channel
		$this->init_sender_channel();
	}
	function set_sender_details($sender_name = null, $sender_email = null)
	{
		if(!empty($sender_name) && is_string($sender_name))
		{
			$this->sender_name = $sender_name;
		}
		if(!empty($sender_email) && is_string($sender_email))
		{
			$this->sender_email = $sender_email;
		}
	}
	function set_email_details($subject = null, $body)
	{
		if(!empty($subject) && is_string($subject))
		{
			$this->email_subject = $subject;
		}

		if(!empty($body) && is_string($body))
		{
			$this->email_body = $body;
		}

		// Parse email body
		$this->get_replace_vars_list();
	}
	function get_replace_vars_list()
	{
		// Fetch list of vars in email body
		if($this->email_body == '')
		{
			$this->sendmail_error = 'Email body is empty.';
			return false;
		}
		preg_match_all('/\[([a-z0-9_]+)\]/i', $this->email_body, $matches);
		if(count($matches[1]) > 0)
		{
			$this->replace_var_keys = array_unique($matches[1]);
		}

		// Fetch list of vars in email subject.
		$subject_vars = array();
		if($this->email_subject == '')
		{
			$this->email_subject = $this->adi->settings['website_title'];
		}
		preg_match_all('/\[([a-z0-9_]+)\]/i', $this->email_subject, $matches);
		if(count($matches[1]) > 0)
		{
			$subject_vars = array_unique($matches[1]);
			$this->replace_var_keys = array_unique(array_merge($this->replace_var_keys, $subject_vars));
		}

		/*if(count($this->replace_var_keys) > 0)
		{
			$this->get_replace_vars($this->replace_var_keys);
		}*/
	}
	function prepare_replace_vars($var_keys = null)
	{
		if(!is_array($var_keys))
		{
			$var_keys = $this->replace_var_keys;
		}
		if(count($var_keys) > 0)
		{
			// Check if sender info is required
			$sender_info_keys = array('sender_name','sender_email','sender_avatar_url','sender_profile_url');
			$common_keys = array_intersect($var_keys, $sender_info_keys);
			if(count($common_keys) > 0)
			{
				$this->load_sender_info();
			}

			// Check if any sender invitations statistics is required.
			$invitations_stats_keys = array('inviations_sent_count','joined_inviations_count','unsubscribed_inviations_count');
			$common_keys = array_intersect($var_keys, $invitations_stats_keys);
			if(count($common_keys) > 0)
			{
				$this->load_invitation_stats();
			}

			// get Website details
			$this->replace_vars['website_name'] = $this->adi->settings['website_title'];
			$this->replace_vars['website_logo'] = $this->adi->settings['adiinviter_website_logo'];

			// Check if receiver details are required.
			$receiver_info_keys = array('receiver_name','receiver_email');
			$common_keys = array_intersect($var_keys, $receiver_info_keys);
			if(count($common_keys) > 0)
			{
				$this->load_receiver_info();
			}

			// Fetch if Inviter count is required
			if(in_array('inviters_count', $var_keys))
			{
				$inviters_count = 0;
				$receiver_email = $this->invite_details['receiver_email'];
				if(empty($receiver_email))
				{
					$query = "SELECT count(1) as cnt from adiinviter WHERE share_type = '' AND receiver_social_id = '".$this->invite_details['receiver_social_id']."' AND service_used = '".$this->invite_details['service_used']."'";
				}
				else
				{
					$query = "SELECT count(1) as cnt from adiinviter WHERE share_type = '' AND receiver_email = '".$receiver_email."'";
				}

				if($result = adi_query_read($query))
				{
					if($row = adi_fetch_assoc($result))
					{
						$inviters_count += $row['cnt'];
					}
				}

				$this->replace_vars['inviters_count'] = $inviters_count;
			}

			// Fetch if invitation_id is required
			if(in_array('invitation_id', $var_keys))
			{
				if(isset($this->invite_details['invitation_id']) &&  !empty($this->invite_details['invitation_id']))
				{
					$this->replace_vars['invitation_id'] = $this->invite_details['invitation_id'];
				}
			}

			// Fetch if service details are required
			if(in_array('service_id', $var_keys))
			{
				$service_id='';
				if(isset($this->invite_details['service_used']) && !empty($this->invite_details['service_used']))
				{
					$service_id = $this->invite_details['service_used'];
				}
				$this->replace_vars['service_id'] = $service_id;
			}
			if(in_array('service_name', $var_keys))
			{
				$service_name = '';
				if(isset($this->invite_details['service_used']) && !empty($this->invite_details['service_used']))
				{
					$service_id = $this->invite_details['service_used'];
					$this->adi->load_services();
					if(isset($this->adi->services_config[$service_id]))
					{
						$service_name = $this->adi->services_config[$service_id]['service'];
					}
				}
				$this->replace_vars['service_name'] = $service_name;
			}
			
			// Fetch if issued date is required.
			if(in_array('issued_date', $var_keys))
			{
				$issued_date = '';
				if(isset($this->invite_details['issued_date']) && !empty($this->invite_details['issued_date']))
				{
					$issued_date = $this->adi->adi_format_timstamp($this->invite_details['issued_date']);
				}
				$this->replace_vars['issued_date'] = $issued_date;
			}

			// Get elapsed days if required.
			if(in_array('elapsed_days', $var_keys))
			{
				$elapsed_days = 0;
				if(isset($this->invite_details['issued_date']) && !empty($this->invite_details['issued_date']))
				{
					$idate = $this->invite_details['issued_date'];
					$cur_time = $this->adi->adi_get_utc_timestamp();
					$elapsed_days = floor(($cur_time - $idate) / 86400);
				}
				$this->replace_vars['elapsed_days'] = $elapsed_days;
			}

		}
	}
	function set_reminders_count($reminders_cnt = 1)
	{
		$this->vars['reminders_count'] = $reminders_cnt;
	}

	function load_sender_info($userid = null)
	{
		if(is_null($userid)) {
			$userid = $this->invite_details['inviter_id'];
		}
		$profile_url = ''; $username=''; $email=''; $avatar_url='';
		if(!empty($userid) && $userid != 0)
		{
			if(isset($this->sender_cache[$userid]))
			{
				$username    = $this->sender_cache[$userid]['sender_name'];
				$email       = $this->sender_cache[$userid]['sender_email'];
				$avatar_url  = $this->sender_cache[$userid]['sender_avatar_url'];
				$profile_url = $this->sender_cache[$userid]['sender_profile_url'];
			}
			else
			{
				$user = $this->adi->get_userinfo($userid);
				$username   = $user['username'];
				$email      = $user['email'];
				$avatar_url = $user['avatar'];
				$profile_url = $user['proflie_url'];
				$this->sender_cache[$userid] = array(
					'sender_name'        => $username,
					'sender_email'       => $email,
					'sender_avatar_url'  => $avatar_url,
					'sender_profile_url' => $profile_url,
				);
			}
		}
		$this->replace_vars['sender_name']        = $username;
		$this->replace_vars['sender_email']       = $email;
		$this->replace_vars['sender_avatar_url']  = $avatar_url;
		$this->replace_vars['sender_profile_url'] = $profile_url;
	}
	function load_invitation_stats($userid = null)
	{
		if(is_null($userid)) {
			$userid = $this->invite_details['inviter_id'];
		}
		$total=0;$invited=0;$blocked=0;$waiting=0;$joined=0;
		if(!empty($userid) && $userid != 0)
		{
			if(isset($this->sender_stats_cache[$userid]))
			{
				$invited = $this->sender_stats_cache[$userid]['inviations_sent_count'];
				$total   = $this->sender_stats_cache[$userid]['total_inviations_count'];
				$joined  = $this->sender_stats_cache[$userid]['joined_inviations_count'];
				$waiting = $this->sender_stats_cache[$userid]['waiting_inviations_count'];
				$blocked = $this->sender_stats_cache[$userid]['unsubscribed_inviations_count'];
			}
			else
			{
				$query = "SELECT inviter_id, COUNT( 1 ) AS total,
				SUM(CASE WHEN invitation_status = 'invitation_sent'  THEN 1 ELSE 0 END ) AS invitation_sent,
				SUM(CASE WHEN invitation_status = 'blocked'  THEN 1 ELSE 0 END ) AS blocked,
				SUM(CASE WHEN invitation_status = 'accepted' THEN 1 ELSE 0 END ) AS accepted,
				SUM(CASE WHEN invitation_status = 'waiting'  THEN 1 ELSE 0 END ) AS waiting
				FROM adiinviter WHERE inviter_id = ".$userid;

				if($result = adi_query_read($query))
					if($row = adi_fetch_assoc($result))
					{
						$total   = $row['total'];
						$invited = $row['invitation_sent'];
						$blocked = $row['blocked'];
						$joined  = $row['accepted'];
						$waiting = $row['waiting'];
					}
				$this->sender_stats_cache[$userid] = array(
					'inviations_sent_count'         => $invited,
					'total_inviations_count'        => $total  ,
					'joined_inviations_count'       => $joined ,
					'waiting_inviations_count'      => $waiting,
					'unsubscribed_inviations_count' => $blocked,
				);
			}
		}
		$this->replace_vars['inviations_sent_count']         = $invited;
		$this->replace_vars['total_inviations_count']        = $total  ;
		$this->replace_vars['joined_inviations_count']       = $joined ;
		$this->replace_vars['waiting_inviations_count']      = $waiting;
		$this->replace_vars['unsubscribed_inviations_count'] = $blocked;
	}
	function load_receiver_info()
	{
		$this->invite_details;
	}

	function init_sender_channel()
	{
		if($this->sender_channel_initialized == false)
		{
			$this->email_sender = get_resource('Adi_Send_Mail');
			$this->email_sender->init();
		}
	}
	
	function parse_contents($var_keys = null)
	{
		if(is_null($var_keys)) {
			$var_keys = $this->replace_var_keys;
		}
		$email_subject = $this->parsed_email_subject;
		$email_body = $this->parsed_email_body;
		foreach($this->replace_var_keys as $varname)
		{
			$replacement_txt = '';
			if(isset($this->replace_vars[$varname]))
			{
				$replacement_txt = $this->replace_vars[$varname];
			}
			$email_subject = str_replace('['.$varname.']', $replacement_txt, $email_subject);
			$email_body    = str_replace('['.$varname.']', $replacement_txt, $email_body);
		}
		$this->parsed_email_subject = $email_subject;
		$this->parsed_email_body = $email_body;
	}

	function parse_email_mode($email_mode = null)
	{
		if(is_null($email_mode)){
			$email_mode = $this->email_mode;
		}
		if($email_mode != 'guest') {
			$email_mode = 'user';
		}

		if($email_mode == 'user')
		{
			$this->parsed_email_body = preg_replace('#\[guest_mode\].*\[/guest_mode\]#isU', '', $this->parsed_email_body);
			$this->parsed_email_body = preg_replace('#\[/?user_mode\]#isU', '', $this->parsed_email_body);
		}
		else
		{
			$this->parsed_email_body = preg_replace('#\[user_mode\].*\[/user_mode\]#isU', '', $this->parsed_email_body);
			$this->parsed_email_body = preg_replace('#\[/?guest_mode\]#isU', '', $this->parsed_email_body);
		}
	}

	function send_email($receiver_email)
	{
		$this->email_sender->set_sender($this->sender_name, $this->sender_email);

		$this->parsed_email_subject = $this->email_subject;
		$this->parsed_email_body = $this->email_body;

		$this->parse_email_mode();
		$this->parse_contents();
		$this->email_sender->send($receiver_email, $this->parsed_email_subject, $this->parsed_email_body);
	}
}



class Adi_Error_Base
{
	public $show_error = false;
	public $errors = array();
	function get_error_count()
	{
		return count($this->errors);
	}
	function report_error($error)
	{
		$this->show_error = true;
		$this->errors[] = $error;
	}
	function generate_error_for_js()
	{
		$ret_str = '';
		if(count($this->errors) > 0)
		{
			foreach($this->errors as $err_msg)
			{
				$ret_str .= "adi.show_pp_err('".$err_msg."');\n";
				break;
			}
		}
		return $ret_str;
	}
	function generate_error_for_inpage()
	{
		$hide_on_start = ''; $err_msg = '';
		if(count($this->errors) > 0)
		{
			$hide_on_start = ' style="visibility:visible;"';
			$err_msg = $this->errors[0];
		}
		$adi_pp_error_icon  = $this->images_url . 'error_ico.png';
		$ret_str = '<div class="adi_inpage_error_out"'.$hide_on_start.'>
		<center><table class="adi_clear_table adi_inpage_error_table">'.
		"<tr class='adi_clear_tr'><td valign='top' class='adi_clear_td'><img class='adi_inpage_error_icon' src='" . $adi_pp_error_icon . "'></td><td valign='center' class='adi_clear_td adi_inpage_error_msg'>".$err_msg."</td></tr>".
		'</table></center></div>';
		return $ret_str;
	}
}

class Adi_Session_Base
{
	public $active = false;
	function __construct() {}
	function init()
	{
		if($this->verify())
		{
			$this->active = true;
		}
		else 
		{
			$this->start_session();
		}
	}
	function start_session()
	{
		if(headers_sent())
		{
			// adi_throwErrorDesc('Cannot initialize session. Headers already sent.');
			return false;
		}
		else
		{
			session_start();
			$this->active = true;
			// adiinviter_trace('cls.Adi_Session_Base : Session initialized.');
		}
	}
	function verify()
	{
		return isset($_SESSION);
	}
	function get($key) 
	{
		if(!$this->active) {
			$this->init();
		}
		return (isset($_SESSION[$key]) ? $_SESSION[$key] : '');
	}
	function set($key, $value) 
	{
		if(!$this->active) {
			$this->init();
		}
		$_SESSION[$key] = $value;
		return true;
	}
	function remove($key)
	{
		if(!$this->active) {
			$this->init();
		}
		if(isset($_SESSION[$key]) ) {
			unset($_SESSION[$key]);
			return true;
		}
		else {
			return false;
		}
	}
	function is_set($key)
	{
		if(!$this->active) {
			$this->init();
		}
		return isset($_SESSION[$key]);
	}
}




class Adi_Database_Base
{
	public $handle = NULL;

	public $connected = false;
	public $error_msg = '';

	public $failed_queries = array();

	public $use_mysqli = true;

	function connect($hostname, $username, $password, $dbname)
	{
		if(!$this->connected)
		{
			if(!class_exists('mysqli'))
			{
				$this->use_mysqli = false;
			}
			if(!empty($hostname) && !empty($username) && !empty($dbname))
			{
				if($this->use_mysqli)
				{
					$this->conn = new mysqli($hostname, $username, $password, $dbname);
					if(@$this->conn->connect_errno !== 0) {}
					else
					{
						$this->connected = true;
					}
				}
				else
				{
					$this->conn = @mysql_pconnect($hostname, $username, $password);
					if($this->conn !== false)
					{
						$selected = @mysql_select_db($dbname, $this->conn);
						if($selected !== false) 
						{
							$this->connected = true;
						}
					}
				}
			}
			if(!$this->connected)
			{
				$this->error_msg = 'Failed to connect.';
			}
		}
		return $this->connected;
	}
	function query_read($query)
	{
		if($this->connected)
		{
			if($this->use_mysqli)
			{
				$result = mysqli_query($this->conn, $query);
			}
			else
			{
				$result = mysql_query($query);
			}
			$err = $this->get_error();
			if(!empty($err))
			{
				$this->failed_queries[] = $query;
			}
			return $result;
		}
		return false;
	}
	function fetch_array($pointer)
	{
		if($this->connected == true)
		{
			if($this->use_mysqli)
			{
				return mysqli_fetch_array($pointer);
			}
			else
			{
				return mysql_fetch_array($pointer);
			}
		}
		return false;
	}
	function fetch_assoc($pointer)
	{
		if($this->connected == true && $pointer)
		{
			if($this->use_mysqli)
			{
				return mysqli_fetch_assoc($pointer);
			}
			else
			{
				return mysql_fetch_assoc($pointer);
			}
		}
		return false;
	}
	function get_first_row($query)
	{
		$row = false;
		if($res = $this->query_read($query))
		{
			$row = $this->fetch_assoc($res);
		}
		return $row;
	}
	function query_write($query)
	{
		if($this->connected)
		{
			if($this->use_mysqli)
			{
				$result = mysqli_query($this->conn, $query);
			}
			else
			{
				$result = mysql_query($query);
			}
			$err = $this->get_error();
			if(!empty($err))
			{
				$this->failed_queries[] = $query;
			}
			return $result;
		}
		return false;
	}
	function adi_escape_string($value)
	{
		if($this->connected === true)
		{
			if($this->use_mysqli)
			{
				return mysqli_real_escape_string($this->conn, $value);
			}
			else
			{
				return mysql_real_escape_string($value);
			}
		}
		return $value;
	}
	function get_error()
	{
		if($this->connected == true)
		{
			if($this->use_mysqli)
			{
				return mysqli_error($this->conn);
			}
			else
			{
				return mysql_error($this->conn);
			}
		}
	}
}


class Adi_Invite_History_Base
{
	public $ih_column_receiver_details = true;
	public $ih_column_service_info = false;
	public $ih_column_status = true;
	public $ih_column_issued_date = true;

	public $summary_defaults = array(
		'total'    => 0,
		'accepted' => 0,
		'invitation_sent' => 0,
		'blocked'  => 0,
		'waiting'  => 0,
	);
	public $show_types = array('accepted', 'blocked','invited');

	public $invite_history_pagination_size = 25;

	function __construct()
	{
		global $adiinviter;
		$this->adi =& $adiinviter;
	}

	function get_invitations_count($userid, $show_type = 'all')
	{
		$conditions = array();
		$summary = $this->summary_defaults;
		if( in_array($show_type, $this->show_types) )
		{
			
			if($show_type == 'invited') {
				$show_type = 'invitation_sent';
			}
			$query = "SELECT COUNT(1) AS cnt FROM adiinviter WHERE inviter_id = ".$userid." AND invitation_status = '".$show_type."'";
		}
		else
		{
			$query = "SELECT COUNT(1) AS cnt FROM adiinviter WHERE inviter_id = ".$userid;
		}

		$cnt = 0;
		if($row = adi_query_first_row($query))
		{
			$cnt = $row['cnt'];
		}
		return $cnt;
	}

	function get_invitations_resource($userid,  $page_no = 1, $page_size = 20, $show_type = 'all')
	{
		$offset = ($page_size * ($page_no - 1));
		
		if(in_array($show_type, $this->show_types))
		{
			if($show_type == 'invited') {
				$show_type = 'invitation_sent';
			}
			$query = "SELECT * FROM adiinviter WHERE inviter_id = ".$userid." AND invitation_status = '".$show_type."' ORDER BY issued_date DESC LIMIT ".$offset.", ".$page_size;
		}
		else
		{
			$query = "SELECT * FROM adiinviter WHERE inviter_id = ".$userid." ORDER BY issued_date DESC LIMIT ".$offset.", ".$page_size;
		}
		$result = adi_query_read($query);
		return $result;
	}

	function get_invite_history_recods($userid, $page_no = 1, $page_size = 20, $show_type = 'all')
	{
		$ih_records = array();
		$sr_no = ($page_size * ($page_no - 1)) + 1;

		$this->adi->load_services();

		$invitation_status_phrases = array(
			'accepted'        => $this->adi->phrases['adi_invitation_status_accepted'],
			'blocked'         => $this->adi->phrases['adi_invitation_status_blocked'],
			'waiting'         => $this->adi->phrases['adiinviter_invitation_waiting'],
			'invitation_sent' => $this->adi->phrases['adi_invitation_status_invited'],
		);
		$odd = 1;
		if($resource = $this->get_invitations_resource($userid, $page_no, $page_size, $show_type))
		{
			while($row = adi_fetch_assoc($resource))
			{
				$cur_row = $row;
				$cur_row['srno'] = $sr_no;

				$odd = ($odd == 1) ? 0 : 1;
				$cur_row['row_odd'] = $odd;

				$cur_row['service_email'] = 0;
				if($this->adi->services_config[$cur_row['service_used']]['email'] == 1)
				{
					$cur_row['service_email'] = 1;
				}

				if($cur_row['invitation_status'] == 'accepted')
				{
					$receiver_userid = $cur_row['receiver_userid'];
					if($cur_row['receiver_name'] == 'Unknown Name') 
					{
						$cur_row['receiver_name'] = $cur_row['receiver_username'];
					}
					if(!empty($this->adi->settings['adiinviter_profile_page_url']))
					{
						$user = $this->adi->get_userinfo($receiver_userid);
						if(count($user) > 0)
						{
							$cur_row['userfullname'] = $user['user_fullname'];
							$cur_row['profile_page_url'] = $user['proflie_url'];
						}
					}
				}

				if($this->ih_column_service_info)
				{
					$service_name = $this->adi->services_config[$cur_row['service_used']]['service'];
					if(!empty($cur_row['domain']))
					{
						$service_name = $cur_row['domain'];
					}
					$cur_row['service_name'] = $service_name;
				}
				$cur_row['status_text'] = $invitation_status_phrases[$row['invitation_status']];

				$cur_row['issued_date'] = $this->adi->adi_format_timeAgo($cur_row['issued_date']);

				$ih_records[] = $cur_row;
				$sr_no++;
			}
		}
		return $ih_records;
	}

	function delete_invites($invitation_ids, $owner_check = true)
	{
		if(!is_array($invitation_ids))
		{
			$invitation_ids = array($invitation_ids);
		}

		if($owner_check == true && $this->adi->userid != 0)
		{
			foreach($invitation_ids as $invite_id)
			{
				if(!empty($invite_id))
				{
					$query = "DELETE FROM adiinviter WHERE invitation_id = '".$invite_id."' AND inviter_id = ".$this->adi->userid;
					adi_query_write($query);
				}
			}
		}
		else
		{
			foreach($invitation_ids as $invite_id)
			{
				if(!empty($invite_id))
				{
					$query = "DELETE FROM adiinviter WHERE invitation_id = '".$invite_id."'";
					adi_query_write($query);
				}
			}
		}
		return true;
	}
	
	function get_email_invitations_count($userid = null)
	{
		$userid = (is_numeric($userid) && !is_null($userid)) ? $userid : $this->adi->userid;
		$query = "SELECT count(1) as cnt from adiinviter WHERE inviter_id = ".$userid." AND receiver_email !=''";
		if($row = adi_query_first_row($query))
		{ 
			return $row['cnt'];
		}
		return 0;
	}

	function get_headers_for_csv()
	{
		$headers = "First Name,Middle Name,Last Name,Title,Suffix,Initials,Web Page,Gender,Birthday,Anniversary,Location,Language,Internet Free Busy,Notes,E-mail Address,E-mail 2 Address,E-mail 3 Address,Primary Phone,Home Phone,Home Phone 2,Mobile Phone,Pager,Home Fax,Home Address,Home Street,Home Street 2,Home Street 3,Home Address PO Box,Home City,Home State,Home Postal Code,Home Country,Spouse,Children,Manager's Name,Assistant's Name,Referred By,Company Main Phone,Business Phone,Business Phone 2,Business Fax,Assistant's Phone,Company,Job Title,Department,Office Location,Organizational ID Number,Profession,Account,Business Address,Business Street,Business Street 2,Business Street 3,Business Address PO Box,Business City,Business State,Business Postal Code,Business Country,Other Phone,Other Fax,Other Address,Other Street,Other Street 2,Other Street 3,Other Address PO Box,Other City,Other State,Other Postal Code,Other Country,Callback,Car Phone,ISDN,Radio Phone,TTY/TDD Phone,Telex,User 1,User 2,User 3,User 4,Keywords,Mileage,Hobby,Billing Information,Directory Server,Sensitivity,Priority,Private,Categories";
		return $headers;
	}

	function get_contacts_for_csv()
	{
		$userid = $this->adi->userid;
		if($userid != 0)
		{
			$csv_contents = '';
			$query = "SELECT receiver_email, receiver_name FROM adiinviter WHERE inviter_id = ".$userid." AND receiver_email != ''";
			if($result = adi_query_read($query))
			{
				while($row = adi_fetch_assoc($result))
				{
					$csv_contents .= $row['receiver_name'].",,,,,,,,,,,,,,".$row['receiver_email'].",,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,Normal,,,\r\n";
				}
			}
			return $csv_contents;
		}
	}
}




function adi_query_read($query)
{
	global $adiinviter;
	if($adiinviter->db->connected)
	{
		return $adiinviter->db->query_read($query);
	}
	return false;
}
function adi_query_write($query)
{
	global $adiinviter;
	if($adiinviter->db->connected)
	{
		return $adiinviter->db->query_write($query);
	}
	return false;
}
function adi_fetch_assoc($pointer)
{
	global $adiinviter;
	if($adiinviter->db->connected)
	{
		return $adiinviter->db->fetch_assoc($pointer);
	}
	return false;
}
function adi_escape_string($value)
{
	global $adiinviter;
	if($adiinviter->db->connected)
	{
		return $adiinviter->db->adi_escape_string($value);
	}
	return $value;
}
function adi_query_first_row($query)
{
	global $adiinviter;
	if($adiinviter->db->connected)
	{
		return $adiinviter->db->get_first_row($query);
	}
	return false;
}
function adi_throwliberror($errCode) {
    throwLibError($errCode);
}
function throwLibError($errCode) {
	global $adiinviter;
	$errCodePhrases = array(
		'adiinviter_login_failed',               //0
		'adiinviter_no_contacts_in_addressbook', //1
		'adiinviter_no_friends',                 //2
		'adiinviter_unable_to_get_contacts',     //3
		'adiinviter_message_sending_failed',     //4
		'service_file_not_found',                //5
		'service_class_not_found',               //6
		'invalid_error_occurred',                //7
		'invalid_email_address',                 //8
		'adi_msg_empty_password',                //9
	);
	$varname = $errCodePhrases[$errCode];
	$phrase_text = isset($adiinviter->phrases[$varname]) ? $adiinviter->phrases[$varname] : $varname;
	$adiinviter->error->report_error($phrase_text);
}

function adi_report_error($err_varname)
{
	global $adiinviter;
	$err_msg = isset($adiinviter->phrases[$err_varname]) ? $adiinviter->phrases[$err_varname] : $err_varname;
	$adiinviter->error->report_error($err_msg);
}

include(ADI_CORE_PATH.'invitation_handler.php');
include(ADI_ROOT_PATH.'adiinviter_platform_settings.php');

$adiinviter = get_resource('Adi_Main');
$adiinviter->init();
$GLOBALS['adiinviter'] =& $adiinviter;


?>