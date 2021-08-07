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

class Adi_Invitations_Wrapper
{
	public $config = array();
	public $service_key = array();

	public $contacts = array();
	public $contacts_count = 0;

	public $content_settings = array();
	public $cs_db_integration = false;

	public $adi = array();
	public $vars = array();
	public $initialized = false;
	public $invites_limit = 0;
	public $is_unlimited = false;
	public $sender_channel_initialized = false;

	public $content_handler = null;

	public $share_type = "";
	public $content_id = 0;

	public $subject = '';
	public $attached_note = '';
	public $body = '';

	public $guest_id = 0;

	function set_invitation_type($share_type = "", $content_id = 0)
	{
		$this->share_type = $share_type;
		$this->content_id = $content_id;
		$this->vars['content_id'] = $content_id;
	}

	function set_sender($sender_email, $sender_name)
	{
		if(!empty($sender_email))
		{
			$this->vars['sender_email'] = $sender_email;
			if(empty($sender_name))
			{
				$new_name = preg_replace('/@.*/i', '', $sender_email);
				$this->vars['sender_name'] = $new_name;
				$this->vars['sender_username'] = $new_name;
			}
			else
			{
				$this->vars['sender_name']  = $sender_name;
				$this->vars['sender_username'] = $sender_name;
			}
		}
	}

	function set_service_configuration($config)
	{
		if(!is_array($config) || count($config) == 0) {
			adi_report_error('invalid_service_configuration');
			return false;
		}
		else {
			$this->config =& $config;
			$this->service_key = $this->config['service_key'];
			return true;
		}
	}

	function set_contacts($contacts)
	{
		if(!is_array($contacts) || count($contacts) == 0) {
			adi_report_error('no_contacts_found');
			return false;
		}
		else {
			$this->contacts =& $contacts;
			$this->contacts_count = count($this->contacts);
			return true;
		}
	}
	final function set_params()
	{
		global $adiinviter;
		$this->adi =& $adiinviter;

		// Set invitation id length
		$this->identifier_length = $this->adi->invitation_unique_id_length;
		$this->identifier_length = (!is_numeric($this->identifier_length) || $this->identifier_length < 16) ? 16 : $this->identifier_length;

	}

	final function init($config, $contacts)
	{
		$this->set_params();

		$this->set_service_configuration($config);
		$this->set_contacts($contacts);

		if(!empty($this->share_type) && isset($this->adi->settings['adiinviter_content_share_types'][$this->share_type]))
		{
			$this->content_settings = $this->adi->settings['adiinviter_content_share_types'][$this->share_type];
			$this->init_content_settings();
		}

		if(!$this->check_for_permissions_default()) {
			return false;
		}

		if(!$this->check_for_limits()) {
			return false;
		}

		// $this->get_invitation_vars();
		$this->get_common_vars_default();

		// Load invitation subject and body
		$this->load_invitation_settings();

		$this->subject = $this->parse_conditional_bbcodes($this->subject);
		$this->subject = $this->parse_bbcodes($this->subject);

		$this->attached_note = trim($this->parse_bbcodes($this->attached_note));
		$this->vars['attached_note'] = $this->attached_note;

		$this->body = $this->parse_conditional_bbcodes($this->body);
		$this->body = $this->parse_bbcodes($this->body);

		$this->issued_date = $this->adi->adi_get_utc_timestamp();

		// Initialize channel according to message sending type.
		$this->init_sender_channel();

		// Initialize sender in channel object.
		$this->invite_sender->set_sender($this->vars['sender_name'], $this->vars['sender_email']);
	}

	function init_content_settings()
	{
		$cs_table_name = $this->content_settings['table_name'];
		$cs_id_field   = $this->content_settings['id_attr'];

		$this->vars['content_title'] = '';
		$this->vars['content_body']  = '';
		$this->vars['category_id']   = '';

		if(empty($cs_table_name) || empty($cs_id_field))
		{
			$this->cs_db_integration = false;
		}
		else 
		{
			$this->cs_db_integration = true;
			$this->get_content_details();
		}

		if(!empty($this->vars['content_url']))
		{
			$replace_vars = array(
				'website_root_url'    => $this->adi->settings['adiinviter_website_root_url'],
				'adiinviter_root_url' => $this->adi->settings['adiinviter_root_url'],
				'category_id'         => $this->vars['category_id'],
				'content_id'          => $this->vars['content_id'],
				'content_title'       => $this->vars['content_title'],
				'invite_sender_id'    => $this->adi->userid,
			);
			$this->vars['content_url'] = adi_replace_vars($this->vars['content_url'], $replace_vars);
		}
	}


	// Permissions Chcker
	final function check_for_permissions_default()
	{
		if(! $this->adi->can_use_adiinviter)
		{
			adi_report_error('no_permission_to_use_adiinviter');
			return false;
		}

		if($this->share_type != "")
		{
			// restricted Content ids
			if(!empty($this->content_settings['restrict_ids']))
			{
				$restrict_ids = array_map("trim", explode(',', $this->content_settings['restrict_ids']));
				if(in_array($this->content_id, $restrict_ids))
				{
					adi_report_error('content_not_allowed_to_share');
					return false;
				}
			}

			$category_id = isset($this->vars['category_id']) ? $this->vars['category_id'] : '';
			$categ_ids = is_array($category_id) ? $category_id : array($category_id);
			if(count($categ_ids) > 0 && !empty($this->content_settings['restrict_pids']))
			{
				// Restricted Category ids
				$r_ids = array_map("trim", explode(',', $this->content_settings['restrict_pids']));
				$ids = array_intersect($categ_ids, $r_ids);
				if(count($ids) > 0)
				{
					adi_report_error('content_not_allowed_to_share');
					return false;
				}
			}
		}

		$response = $this->check_for_permissions();
		return ($response !== false) ? true : false;
	}

	function get_content_details()
	{
		$cs_table_name     = $this->content_settings['table_name'];
		$cs_id_field       = $this->content_settings['id_attr'];
		$cs_body_field     = $this->content_settings['content_attr'];
		$cs_title_field    = $this->content_settings['title_attr'];
		$category_id_field = $this->content_settings['pid_attr'];

		$query = "SELECT * FROM `".$cs_table_name."` WHERE `".$cs_id_field."` = ".$this->content_id;
		if($row = adi_query_first_row($query))
		{
			$this->vars['content_title'] = (isset($row[$cs_title_field]) ? $row[$cs_title_field] : '');
			$this->vars['content_body']  = (isset($row[$cs_body_field])  ? $row[$cs_body_field]  : '');
			$this->vars['category_id']   = (isset($row[$category_id_field]) ? $row[$category_id_field] : '');
		}

		$this->check_content_details();
		$this->crop_content_body_to_limit();
	}
	
	function check_content_details()
	{
		return true;
	}

	
	function crop_content_body_to_limit()
	{
		$body = $this->vars['content_body'];
		$word_limit = is_numeric($this->content_settings['limit']) ? $this->content_settings['limit'] : 100;
		$manipulator = new HtmlWordManipulator();
		$this->vars['content_body'] = $manipulator->restoreTags($manipulator->truncate($body, $word_limit));
	}


	function check_for_permissions()
	{
		return true;
	}

	final function check_for_limits()
	{
		if(strtolower($this->adi->num_invites) == 'unlimited')
		{
			$this->invites_limit = $this->contacts_count;
			$this->is_unlimited = true;
		}
		else if(is_numeric($this->adi->num_invites))
		{
			if($this->adi->num_invites >= $this->contacts_count)
			{
				$this->invites_limit = $this->contacts_count;
			}
			else 
			{
				$this->invites_limit = $this->adi->num_invites;
			}
		}
		if($this->invites_limit <= 0) 
		{
			$this->invites_limit = 0;
			adi_report_error('number_of_invitations_limit_reached');
		}
		return ($this->invites_limit > 0);
	}


	// Get Replacement vars
	final function get_common_vars_default()
	{
		// Markup Codes that may contain another markup
		$this->vars['adiinviter_root_url']   = $this->adi->adi_root_url_full;
		$this->vars['verify_invitation_url'] = adi_extend_url($this->adi->verify_invitation_url);
		$this->vars['register_link']         = $this->adi->settings['adiinviter_register_link'];
		$this->vars['website_url']           = $this->adi->website_root_url_full;

		// Common Markup Codes
		$this->vars['service']               = $this->config['service'];
		$this->vars['website_name']          = $this->adi->settings['website_title'];
		$this->vars['website_logo']          = $this->adi->settings['adiinviter_website_logo'];
		$this->vars['my_website_logo']       = $this->adi->settings['adiinviter_website_logo'];
		$this->vars['attached_note']         = $this->attached_note;

		if($this->adi->userid != 0)
		{
			$this->vars['sender_name']     = $this->adi->fullname;
			$this->vars['sender_userid']   = $this->adi->userid;
			$this->vars['sender_username'] = $this->adi->username;
			$this->vars['sender_email']    = empty($this->adi->email) ? $this->adi->settings['adiinviter_email_address'] : $this->adi->email;
			$this->vars['sender_profile_url'] = $this->adi->proflie_url;
			$this->vars['sender_avatar_url']  = $this->adi->avatar_url;
		}
		else if(!isset($this->vars['sender_email']))
		{
			$this->vars['sender_name']     = $this->adi->settings['adiinviter_sender_name'];
			$this->vars['sender_userid']   = 0;
			$this->vars['sender_username'] = $this->adi->settings['adiinviter_sender_name'];
			$this->vars['sender_email']    = $this->adi->settings['adiinviter_email_address'];
		}
		
		$this->get_common_vars_list();
	}

	function get_common_vars_list()
	{

	}

	function get_extended_vars_for_user($receiver_id='', $receiver_name='', $isEmail = true)
	{

	}

	// Invitation Settings
	function load_invitation_settings()
	{
		$this->subject = $this->get_invitation_subject();
		$this->body    = $this->get_invitation_body();
	}

	function get_invitation_subject()
	{
		if($this->share_type == "")
		{
			return $this->adi->settings['adiinviter_invitation_subject'];
		}
		else
		{
			return $this->content_settings['invitation_subject'];
		}
	}
	function get_invitation_body()
	{
		if($this->share_type == "")
		{
			if($this->config['invitation'] == 'email')
			{
				return $this->adi->settings['adiinviter_invitation_message_webmail'];
			}
			else
			{
				$service_key = $this->config['service_key'];
				if($service_key == 'twitter')
				{
					$sname = 'adiinviter_twitter_message';
				}
				else
				{
					$sname = 'adiinviter_invitation_message_social';
				}
				return $this->adi->settings[$sname];
			}
		}
		else
		{
			if($this->config['invitation'] == 'email')
			{
				return $this->content_settings['invitation_body'];
			}
			else
			{
				$service_key = $this->config['service_key'];
				if($service_key == 'twitter')
				{
					return $this->content_settings['invitation_twitter_message_body'];
				}
				else
				{
					return $this->content_settings['invitation_social_message_body'];
				}
			}
		}
	}
	// Attached note settings and parsing. 
	function set_attached_note($attached_note = '')
	{
		$this->attached_note = $attached_note;
	}

	function parse_bbcodes($content, $vars = null)
	{
		if(is_null($vars) || !is_array($vars)) {
			$vars = $this->vars;
		}
		if(empty($content)) 
		{
			
		}
		else {
			return adi_replace_vars($content, $vars);
		}
		return $content;
	}

	function parse_conditional_bbcodes($body)
	{
		if(is_numeric($this->adi->userid) && $this->adi->userid != 0) // In user mode
		{
			$body = preg_replace('#\[guest_mode\].*\[/guest_mode\]#isU', '', $body);
			$body = preg_replace('#\[/?user_mode\]#isU', '', $body);
		}
		else // In guest mode
		{
			$body = preg_replace('#\[user_mode\].*\[/user_mode\]#isU', '', $body);
			$body = preg_replace('#\[/?guest_mode\]#isU', '', $body);
		}
		if($this->share_type == "")
		{
			if(empty($this->vars['attached_note']) || $this->adi->settings['adiinviter_attachment_onoff'] == 0)
			{
				$body = preg_replace('#\[attach_note_block\].*\[/attach_note_block\]#isU', '', $body);
			}
			else {
				$body = preg_replace('#\[/?attach_note_block\]#isU', '', $body);
			}
		}
		else
		{
			if(empty($this->vars['attached_note']) || $this->adi->settings['adiinviter_attachment_onoff'] == 0)
			{
				$body = preg_replace('#\[attach_note_block\].*\[/attach_note_block\]#isU', '', $body);
			}
			else {
				$body = preg_replace('#\[/?attach_note_block\]#isU', '', $body);
			}
		}
		return $this->parse_body($body);
	}

	function parse_body($body)
	{
		return $body;
	}
	
	// Unique identifiers for invitations
	final function get_invitation_ids($total = 1)
	{
		$invitation_ids = array();
		do {
			$limit = ($total < 100) ? $total : 100;
			for($i = 1; $i <= $total; $i++)
			{
				$inv_id = $this->get_unique_id();
				if(!in_array($inv_id, $invitation_ids))
				{
					$invitation_ids[] = $inv_id;
				}
			}

			$query = "SELECT * FROM adiinviter WHERE invitation_id IN ('".implode("','",$invitation_ids)."')";
			if($res = adi_query_read($query))
				while($row = adi_fetch_assoc($res))
				{
					if(in_array($row['invitation_id'], $invitation_ids))
					{
						$pos = array_search($row['invitation_id'], $invitation_ids);
						unset($invitation_ids[$pos]);
					}
				}
		}while(count($invitation_ids) < $total);
		return $invitation_ids;
	}
	final function get_invitation_id()
	{
		$inv_id = '';
		do {
			$if_exists = false;
			$inv_id = $this->get_unique_id();
			$query = "SELECT * FROM adiinviter WHERE invitation_id IN ('".$inv_id."')";
			if($row = adi_query_first_row($result))
			{
				if($inv_id == $row['invitation_id'])
				{
					$if_exists = true;
				}
			}
		}while($if_exists);
		return $inv_id;
	}
	final function get_unique_id($length = null)
	{
		$length = (is_numeric($length) && $length != $this->identifier_length) ? $length : $this->identifier_length;
		mt_srand();
		$possible = '0123456789'.'abcdefghjiklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$last_ind = strlen($possible) - 1;
		$hash = "";
		while(strlen($hash) < $length)
		{
			$hash .= substr($possible, mt_rand(0, $last_ind), 1);
		}
		return $hash;
	}

	function init_sender_channel()
	{
		if(!$this->sender_channel_initialized)
		{
			if($this->config['invitation'] == 'email')
			{
				// For invitation mails
				$this->invite_sender = get_resource('Adi_Send_Mail');
				$this->invite_sender->init();
			}
			else
			{
				// For invitation messages
				$this->invite_sender = get_resource('Adi_Send_Message');
				$this->invite_sender->init($this->config);
			}
			$this->sender_channel_initialized = false;
		}
	}

	function send_invitations()
	{
		//se buscan los datos de la empresa
		/*$query = "INSERT INTO test (Nombre)VALUES ('{$_SESSION['idkey']}') ";
		adi_query_write($query);*/
		
		/*$query = "SELECT BD_Direccion, BD_Puerto, BD_Nombre, BD_Usuario, BD_Pass FROM EmpresasListado WHERE idKey = '".$_SESSION['idkey']."'";
		$result = adi_query_read($query);
		$row_data = adi_fetch_assoc($result);

		//creo las variables de entorno
		define ("DB_HOST", $row_data['BD_Direccion']);
		define ("DB_POST", $row_data['BD_Puerto']);
		define ("DB_USER", $row_data['BD_Usuario']);
		define ("DB_PASSWORD", $row_data['BD_Pass']);
		define ("DB_NAME", $row_data['BD_Nombre']);
		
		//elimino los datos de conexion
		unset($row_data);
		
		//Funcion para conectar con la base de datos
		function conectar () {
			//Conexion sin puerto definido
			$db_con = mysql_pconnect (DB_HOST, DB_USER, DB_PASSWORD);
			//Conexion con un puerto definido
			//$db_con = mysql_connect (DB_HOST.":".DB_POST, DB_USER, DB_PASSWORD);
			if (!$db_con) return false; 
			if (!mysql_select_db (DB_NAME, $db_con)) return false;
			if (!mysql_query("SET NAMES 'utf8'")) return false;
			return $db_con; 
		}

		// obtengo puntero de conexion con la db
		$dbConn = conectar();*/




		$inv_count = 0; $invitation_id = '';
		$inv_ids = $this->get_invitation_ids($this->contacts_count);

		$this->guest_id = 0;
		if($this->adi->userid == 0 && $this->contacts_count > 0 && $this->adi->settings['adiinviter_store_guest_user_info'] == 1)
		{
			$sender_email = $this->vars['sender_email'];
			$sender_name  = $this->vars['sender_name'];

			$guest_exists = false;
			$query = "SELECT * FROM adiinviter_guest WHERE email = '".$sender_email."'";
			if($result = adi_query_read($query))
			{
				if($row = adi_fetch_assoc($result))
				{
					$this->guest_id = $row['guest_id'];
					$guest_exists = true;
				}
			}

			if(!$guest_exists)
			{
				$this->guest_id = 1; // guest_id for first guest inviter.
				$query = "SELECT MAX(guest_id) as mx FROM adiinviter_guest";
				if($guest_row = adi_query_first_row($query))
				{
					$this->guest_id = $guest_row['mx'] + 1;
				}

				$query = "INSERT INTO adiinviter_guest VALUES (".$this->guest_id.", '".$sender_email."', '".$this->vars['sender_name']."')";
				adi_query_write($query);
			}
		}


		// Enviar invitaciones a través de correos electrónicos
		if($this->config['invitation'] == 'email')
		{
			//Inicio la cadeha para insertar datos
			//$insertSQL = "INSERT INTO postulante_correos (id_usuario, correo) VALUES ";
			
			 		
			//Recorro los datos entregados		
			foreach($this->contacts as $id => $name){
					
			
					
					
				//Verifico que el usuario existe
				/*$query = "SELECT idPosCorreo FROM `postulante_correos` WHERE id_usuario=".$_SESSION['idUsuario']." AND correo='".$id."' ";
				$registros = mysql_query ($query, $dbConn);
				$cuenta_registros = mysql_num_rows($registros);
					
				//Si el usuario existe guarda los datos
				if ($cuenta_registros==0)  {
					$insertSQL .= sprintf("('%s','%s'),", $_SESSION['idUsuario'], $receiver_id);	
				}*/
					
					
					
					if($inv_count < $this->invites_limit)
					{
						$invitation_id = null;
						if(is_array($inv_ids))
						{
							$invitation_id = array_shift($inv_ids);
						}
						if(is_null($invitation_id))
						{
							$invitation_id = $this->get_invitation_id();
						}

						$receiver_name = $name;
						$receiver_id = $id;
						$new_vars = array(
							'invitation_id'  => $invitation_id,
							'receiver_name'  => $receiver_name,
							'receiver_email' => $id,
						);

						$vars = $this->get_extended_vars_for_user($receiver_id, $receiver_name, true);
						if(is_array($vars))
						{
							$new_vars = array_merge($new_vars, $vars);
						}

						$subject = $this->parse_bbcodes($this->subject, $new_vars);
						$body = $this->parse_bbcodes($this->body, $new_vars);

						$this->add_to_db($invitation_id, $receiver_id, $receiver_name);
						$inv_count++;
					}else{
						break
					};
			}
			
			//Inserto todos los datos en la base de datos
			//$result = mysql_query($insertSQL, $dbConn);
			
			
		}
		else // Enviar invitación a través de mensajes personales (PM)
		{
			$receivers_data = array();
			foreach($this->contacts as $id => $name)
			{
				if($inv_count < $this->invites_limit) 
				{
					$invitation_id = null;
					if(is_array($inv_ids))
					{
						$invitation_id = array_shift($inv_ids);
					}
					if(is_null($invitation_id))
					{
						$invitation_id = $this->get_invitation_id();
					}

					$receiver_name = $name;
					$receiver_id = $id;
					$new_vars = array(
						'invitation_id' => $invitation_id,
						'receiver_name' => $receiver_name,
					);

					$vars = $this->get_extended_vars_for_user($receiver_id, $receiver_name, false);
					if(is_array($vars))
					{
						$new_vars = array_merge($new_vars, $vars);
					}
					$receivers_data[$receiver_id] = $new_vars;

					$this->add_to_db($invitation_id, $receiver_id, $receiver_name);
					$inv_count++;
				}
				else break;
			}
			if(count($receivers_data) > 0)
			{
				$this->invite_sender->send($this->subject, $this->body, $receivers_data);
			}
		}

		if(!$this->is_unlimited && $this->adi->userid != 0)
		{
			$this->reduce_invites_limit($this->invites_limit);
		}
		
		return $inv_count;
	}

	function reduce_invites_limit($invites_limit)
	{
		if(!$this->is_unlimited && $this->adi->userid != 0 && $this->adi->user_system)
		{
			$user_table  = $this->adi->user_table_name;
			$user_fields = $this->adi->user_fields;
			$query = "UPDATE `".$user_table."` SET adiinvite_invitations = adiinvite_invitations - '".$invites_limit."' WHERE `".$user_fields['userid']."` = ".$this->adi->userid;
			return adi_query_write($query);
		}
	}

	function add_to_db($invitation_id, $receiver_id, $receiver_name)
	{
		$inviter_id = $this->adi->userid;
		if($this->config['email'] == 1)
		{
			$receiver_email = $receiver_id;
			$receiver_social_id='';
		}
		else
		{
			$receiver_email = '';
			$receiver_social_id = $receiver_id;
		}

		$status = 'invitation_sent';
		if($this->config['invitation'] == 'email')
		{
			if($this->invite_sender->added_to_queue)
			{
				$status = 'waiting';
			}
		}

		$service_type   = $this->config['service_type'];
		$service_key    = $this->config['service_key'];
		$share_type     = $this->share_type;
		$content_id     = $this->content_id;
		$topic_redirect = (empty($share_type) ? '0' : '1');
		$visited        = 0;

		if($this->adi->userid != 0)
		{
			// Remove from DB
			$query = "DELETE FROM adiinviter 
			WHERE 
				inviter_id = ".$this->adi->userid."";
			if($share_type != "")
			{
				$query .= " AND share_type = '".$share_type."' AND content_id = '".$content_id."'";
			}
			if($this->config['email'] == 0)
			{
				$query .= " AND service_used = '".$service_key."'";
			}
			$query .= " AND receiver_email = '".$receiver_email."' AND receiver_social_id = '".$receiver_social_id."'";
			adi_query_write($query);

			$query = "INSERT INTO adiinviter VALUES ('".$invitation_id."', ".$this->adi->userid.", 0, 0, '', '".adi_escape_string($receiver_name)."', '".$receiver_social_id."', '".$receiver_email."', '".$status."', '".$this->config['service_key']."', ".$this->issued_date.", '".$service_type."', '".$share_type."', '".$content_id."', ".$topic_redirect.", ".$visited.")";
			adi_query_write($query);

		}
		else if($this->adi->userid == 0)
		{
			$query = "INSERT INTO adiinviter VALUES ('".$invitation_id."', ".$this->adi->userid.", ".$this->guest_id.", 0, '', '".adi_escape_string($receiver_name)."', '".$receiver_social_id."', '".$receiver_email."', '".$status."', '".$this->config['service_key']."', ".$this->issued_date.", '".$service_type."', '".$share_type."', '".$content_id."', ".$topic_redirect.", ".$visited.")";
			adi_query_write($query);

		}

		return true;
	}
}



class Adi_Send_Mail_Base 
{
	public $sender_name   = '';
	public $sender_email  = '';
	public $receiver      = '';
	public $headers       = '';
	public $subject       = '';
	public $body          = '';
	public $invitation_id = '';
	public $mails_count   = 0;
	public $mails_limit   = 0;

	public $send_multipart_email = true;

	// Flags
	public $cron_method    = false;
	public $added_to_queue = false;
	public $adi;
	function init()
	{
		global $adiinviter;
		$this->adi =& $adiinviter;

		$this->cron_method = ($this->adi->settings['adiinviter_mail_method'] == "cron");
		$this->mails_count = $this->adi->settings['adiinviter_cron_mails_count'];
		$this->mails_limit = $this->adi->settings['adiinviter_cron_hour_limit'];
	}
	function set_sender($sender_name, $sender_email)
	{
		$this->sender_name  = $sender_name;
		$this->sender_email = $sender_email;
	}

	public $tags_search = array(
		"/\r/",
		"/[\n\t]+/",
		'/<head[^>]*>.*?<\/head>/i',
		'/<script[^>]*>.*?<\/script>/i',
		'/<style[^>]*>.*?<\/style>/i',
		'/<p[^>]*>/i',
		'/<br[^>]*>/i',
		'/<i[^>]*>(.*?)<\/i>/i',
		'/<em[^>]*>(.*?)<\/em>/i',
		'/(<ul[^>]*>|<\/ul>)/i',
		'/(<ol[^>]*>|<\/ol>)/i',
		'/(<dl[^>]*>|<\/dl>)/i',
		'/<li[^>]*>(.*?)<\/li>/i',
		'/<dd[^>]*>(.*?)<\/dd>/i',
		'/<dt[^>]*>(.*?)<\/dt>/i',
		'/<li[^>]*>/i',
		'/<hr[^>]*>/i',
		'/<div[^>]*>/i',
		'/(<table[^>]*>|<\/table>)/i',
		'/(<tr[^>]*>|<\/tr>)/i',
		'/<td[^>]*>(.*?)<\/td>/i',
		'/<img[^>]*>/i',
		'/<span class="_html2text_ignore">.+?<\/span>/i'
	);
	public $tags_replace = array(
		'',
		' ',
		'',
		'',
		'',
		"\n\n",
		"\n",
		'_\\1_',
		'_\\1_',
		"\n\n",
		"\n\n",
		"\n\n",
		"\t* \\1\n",
		" \\1\n",
		"\t* \\1",
		"\n\t* ",
		"\n-------------------------\n",
		"<div>\n",
		"\n\n",
		"\n",
		"\t\t\\1\n",
		"",
		""
	);
	public $tags_search_callback = array(
		'/<(a) [^>]*href=("|\')([^"\']+)\2([^>]*)>(.*?)<\/a>/i',
		'/<(h)[123456]( [^>]*)?>(.*?)<\/h[123456]>/i',
		'/<(b)( [^>]*)?>(.*?)<\/b>/i',
		'/<(strong)( [^>]*)?>(.*?)<\/strong>/i',
		'/<(th)( [^>]*)?>(.*?)<\/th>/i',
	);
	function _preg_callback($matches)
	{
		switch (strtolower($matches[1]))
		{
			case 'b':
			case 'strong':
				return strtoupper($matches[3]);
			case 'th':
				return strtoupper("\t\t". $matches[3] ."\n");
			case 'h':
				return strtoupper("\n\n". $matches[3] ."\n\n");
			case 'a':
				$anchor_text = trim($matches[5]);
				if(!empty($anchor_text))
				{
					return $anchor_text.'('.$matches[3].')';
				}
				return '';
		}
	}
	public function generate_plain_text($html_code)
	{
		$plain_text = preg_replace($this->tags_search, $this->tags_replace, $html_code);
		$plain_text = preg_replace_callback($this->tags_search_callback, array($this, '_preg_callback'), $plain_text);
		$plain_text = strip_tags($plain_text);

		$plain_text = preg_replace('/\n[ \t]+/', "\n", $plain_text);
		$plain_text = preg_replace('/[\n]{2,}/', "\n\n", $plain_text);
		return $plain_text;
	}

	function set_headers()
	{
		$delimiter = "\r\n";
		$this->boundary = '--'.str_shuffle('np5364b94522749').uniqid('', true).'--';

		$this->headers  = 'MIME-Version: 1.0' . $delimiter;
		$this->headers .= 'Date: ' . date('r', time()) . $delimiter;
		$this->headers .= 'From: '.$this->sender_name . ' <' . $this->sender_email . '>' . $delimiter;
		$this->headers .= 'Reply-To: '.$this->sender_email . $delimiter;
		$this->headers .= 'Return-Path: '.$this->sender_email . $delimiter;
		$this->headers .= 'Sender: '.$this->sender_email . $delimiter;

		if( !empty($this->adi->settings['adiinviter_website_name']) )
		{
			$this->headers .= "X-Mailer: ".$this->adi->settings['adiinviter_website_name']." Mail".$delimiter;
		}
		$this->headers .= "Importance: High" . $delimiter;

		if($this->send_multipart_email === true)
		{
			$this->headers .= 'Content-Type: multipart/alternative; boundary='.$this->boundary . $delimiter;
			// $this->headers .= 'Content-Transfer-Encoding: quoted-printable' . $delimiter;
		}
		else
		{
			$this->headers .= 'Content-Type: text/html; charset=UTF-8' . $delimiter;
			$this->headers .= 'Content-transfer-encoding: 8bit' . $delimiter;
		}
	}
	function send($receiver_email, $subject, $body, $invitation_id = '')
	{
		$this->receiver = $receiver_email;
		$this->subject  = $subject;
		$this->body     = $body;
		$this->invitation_id = $invitation_id;
		$this->set_headers();

		// Add HTML tag to html emails body.
		$html_body = $this->body;
		if(strpos($this->body, '<body>') === false)
		{
			$html_body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="UTF-8">
	<title>'.$this->subject.'</title>
</head>
<body>
'.$this->body.'
</body>
</html>';
		}

		$delimiter = "\r\n";
		if($this->send_multipart_email === true)
		{
			$plain_text = $this->generate_plain_text($this->body);
			$message = $delimiter . $delimiter . "--" . $this->boundary . $delimiter;
			$message .= "Content-type: text/plain;charset=utf-8" . $delimiter . $delimiter;
			$message .= $plain_text;

			$message .= $delimiter . $delimiter . "--" . $this->boundary . $delimiter;
			$message .= "Content-type: text/html;charset=utf-8" . $delimiter . $delimiter;
			$message .= $html_body;

			$message .= $delimiter . $delimiter . "--" . $this->boundary . "--";

			$this->body = $message;
		}
		else
		{
			$this->body = $html_body;
		}


		if($this->cron_method)
		{
			if($this->mails_count < $this->mails_limit)
			{
				$this->mails_count++;
				$this->adi->update_setting('adiinviter_cron_mails_count', $this->mails_count);
				// adi_saveSetting('Adi_Plugin_Sendmail', 'adiinviter_cron_mails_count', $this->mails_count);

				return $this->send_mail();
			}
			else
			{
				$this->added_to_queue = true;
				return $this->add_to_queue();
			}
		}
		else
		{
			return $this->send_mail();
		}
	}
	function send_mail()
	{
		ini_set('sendmail_from', $this->sender_email);
		return mail($this->receiver, $this->subject, $this->body, $this->headers);
	}
	
	function add_to_queue()
	{
		$sender_info = array(
			'name'  => $this->sender_name,
			'email' => $this->sender_email
		);
		$sender_info_json = adi_json_encode($sender_info);
		$query = "INSERT INTO adiinviter_queue VALUES(0,'".$this->invitation_id."', '".adi_escape_string($this->receiver)."', '".adi_escape_string($this->subject)."', '".adi_escape_string($this->body)."', '".adi_escape_string($sender_info_json)."')";
		return adi_query_write($query);

	}
}



class Adi_Send_Message_Base 
{
	public $sender_name   = '';
	public $sender_email  = '';

	public $adi;
	public $importer = null;
	function init($config = array())
	{
		global $adiinviter;
		$this->adi =& $adiinviter;
		$this->config = $config;

		if(isset($this->config['service_key']))
		{
			$service_key = $this->config['service_key'];

			$this->adi->load_services();
			$services_params =& $this->adi->services_params;

			include_once(ADI_CORE_PATH.'importer.php');

			if(isset($services_params[$service_key]))
			{
				if($services_params[$service_key][0][2] == 1)
				{
					// For OAuth request
					$this->importer = new Adi_OAuth_Importer();
					$this->importer->init($service_key);
				}
				else
				{
					// For Curl request
					$adi_sid = POST_var('adi_csid', ADI_STRING_VARS, '0-9');
					include_once(ADI_CORE_PATH.'importer.php');
					$this->importer = new Adi_Importer($this->config);
					$this->importer->startPlugin($this->config['service_key']);
					$this->importer->setSessionID($adi_sid);
				}
			}
		}
	}

	function set_sender($sender_name, $sender_email)
	{
		$this->sender_name  = $sender_name;
		$this->sender_email = $sender_email;
	}
	
	function send($subject, $body, $receivers_data)
	{
		$this->importer->sendInvitations($subject, $body, $receivers_data);
	}
}


class Adi_Invitations_Base extends Adi_Invitations_Wrapper
{}

class Adi_Content_Share_Base extends Adi_Invitations_Wrapper
{}


?>
