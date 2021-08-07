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


function get_resource($resource_name)
{
	if(!class_exists($resource_name))
	{
		$classname = $resource_name.'_Base';
		if(!class_exists($classname))
		{
			$code = 'Class '.$classname.' {}';
			eval($code);
		}
		$code = 'class '.$resource_name.' extends '.$classname.' {} ';
		eval($code);
	}
	$obj = null;
	if(class_exists($resource_name))
	{
		$obj = new $resource_name();
	}
	return $obj;
}
function adi_extend_url($url)
{
	$url = trim($url, '?&');
	$url .= (strpos($url, '?') !== false) ? '&' : '?';
	return $url;
}

function adi_replace_vars($body, $replace_vars)
{
	if(count($replace_vars) > 0 && preg_match('/\[([^\s])+\]/isU', $body))
	{
		foreach($replace_vars as $varname => $val)
		{
			$varname = strtolower($varname);
			$body = str_replace('['.$varname.']', $val, $body);
		}
	}
	return $body;
}
function is_GET($name)
{
	return isset($_GET[$name]) ? true : false;
}
function GET_var($key, $type = 2, $char_set = '')
{
	if(!isset($_GET[$key]) || empty($_GET[$key]))
	{
		switch ($type) {
			case ADI_INT_VARS: return 0; break;
			case ADI_STRING_VARS: return ''; break;
			case ADI_ARRAY_VARS: return array(); break;
		}
		return '';
	}
	else
	{
		return adi_parse_reqvar($_GET[$key], $type, $char_set);
	}
}
function is_POST($name)
{
	return isset($_POST[$name]) ? true : false;
}
function POST_var($key, $type = 2, $char_set = '')
{
	if(!isset($_POST[$key]) || empty($_POST[$key]))
	{
		switch ($type) {
			case ADI_INT_VARS: return 0; break;
			case ADI_STRING_VARS: return ''; break;
			case ADI_ARRAY_VARS: return array(); break;
		}
		return '';
	}
	else
	{
		return adi_parse_reqvar($_POST[$key], $type, $char_set);
	}
}
function adi_parse_reqvar($val, $type = 2, $char_set = '')
{
	if(!is_numeric($type)) {
		$type = ADI_STRING_VARS;
	}

	switch ($type) 
	{
		case ADI_INT_VARS:
			$val = (int)$val;
		break;

		case ADI_STRING_VARS:
			$val = trim(strip_tags($val));
		break;

		case ADI_ARRAY_VARS:
			if(!is_array($val)) { $val = array(); }
		break;

		case ADI_PLAIN_TEXT_VARS:
			if(preg_match('/<script|<\?|<\?php/i', $val) > 0) {
				$val = '';
			}
			else {
				$val = strip_tags($val);
				$val = trim($val);
			}
		break;

		case ADI_CONTACTLIST_VARS:
			if(preg_match('/<script|<\?|<\?php/i', $val) > 0) {
				$val = '';
			}
			else {
				$val = trim($val);
			}
		break;
	}

	if(!empty($char_set))
	{
		$val = preg_replace('/[^'.$char_set.']+/i', '', $val);
	}
	return $val;
}

function getQueueCount()
{
	$query  = 'SELECT count(1) AS total FROM adiinviter_queue';
	$total  = 0;
	if($row = adi_query_first_row($query))
	{
		$total = $row['total'];
	}
	return $total;
}


function getAdiInviterServices()
{
	global $adiinviter;
	$retSettings = array();
	foreach($adiinviter->settings['adiinviter_services'] as $service => $onoff)
	{
		if($onoff)
		{
			$retSettings[$service] = $onoff;
		}
	}
	return $retSettings;
}


function adi_get_template($template_name)
{
	global $adiinviter;
	$code = ''; $template_varname = '';
	eval($adiinviter->get_service_token('tmpl_parse'));
	if(strpos($code, '{adi:if') !== false)
	{
		$code = preg_replace('/\{adi:if\s*([^\}]+)\}/isU','<?php if($1) { ?>',$code);
		$code = preg_replace('/\{adi:elseif\s*([^\}]+)\}/isU','<?php } else if($1) { ?>',$code);
		$code = preg_replace('/\{adi:else\/?\}/isU', '<?php } else { ?>', $code);
		$code = preg_replace('/\{\/adi:if\}/isU', '<?php } ?>', $code);
	}
	if(strpos($code, '{adi:var') !== false)
	{
		$code = preg_replace('/\{adi:var\s([^\}]+)\/?\}/isU', '<?php $'.$template_varname.'.= $1; ?>', $code);
	}
	if(strpos($code, '{adi:phrase') !== false)
	{
		$code = preg_replace('/\{adi:phrase\s([^\}\/]+)\/?\}/isU', '<?php $'.$template_varname.' .= $adiinviter->phrases[\'$1\']; ?>', $code);
	}
	if(strpos($code, '{adi:set') !== false)
	{
		$code = preg_replace('/\{adi:set\s([^\}\/]+)\/?\}/isU', '<?php $1; ?>', $code);
	}
	if(strpos($code, '{adi:template') !== false)
	{
		$code = preg_replace('/\{adi:template\s([^\}]+)\/?\}/isU', '<?php $'.$template_varname.' .= eval(adi_get_template(\'$1\')); ?>', $code);
	}
	if(strpos($code, '{adi:foreach') !== false)
	{
		preg_match_all('/\{adi:foreach\s*\(?([^\}]+)\)?\}/isU', $code, $matches);
		if(count($matches[0]))
		{
			foreach($matches[0] as $ind => $subcode)
			{
				$list = explode(',', $matches[1][$ind]);
				if(count($list) == 3)
				{
					$op_code = '<?php foreach('.trim($list[0]).' as '.trim($list[1]).' => '.trim($list[2]).') { ?>';
				}
				else
				{
					$op_code = '<?php foreach('.trim($list[0]).' as '.trim($list[1]).') { ?>';
				}
				$code = str_replace($matches[0][$ind], $op_code, $code);
			}
		}
		$code = preg_replace('/\{\/adi:foreach\}/isU', '<?php } ?>', $code);
	}

	// Prediefined Constants
	if(strpos($code, '{adi:const') !== false)
	{
		$code = preg_replace('/\{adi:const\s*THEME_URL\/?\}/isU', '<?php $'.$template_varname.' .= $adiinviter->theme_relative_url; ?>', $code);
		$code = preg_replace('/\{adi:const\s*ADI_ROOT_URL\/?\}/isU', '<?php $'.$template_varname.' .= $adiinviter->adi_root_url_full; ?>', $code);
		$code = preg_replace('/\{adi:const\s*ADI_ROOT_URL_REL\/?\}/isU', '<?php $'.$template_varname.' .= $adiinviter->adi_root_url_rel; ?>', $code);
		$code = preg_replace('/\{adi:const\s*WEBSITE_ROOT_URL\/?\}/isU', '<?php $'.$template_varname.' .= $adiinviter->website_root_url_full; ?>', $code);
		$code = preg_replace('/\{adi:const\s*WEBSITE_ROOT_URL_REL\/?\}/isU', '<?php $'.$template_varname.' .= $adiinviter->website_root_url_rel; ?>', $code);
	}

	$code = preg_replace('/\?>\s*<\?php/isU','', $code);
	preg_match_all('/\?>(.*)<\?php/isU', $code, $matches);
	foreach($matches[0] as $ind => $full_code)
	{
		$str  = str_replace(array('?>','<?php'), array('',''), $full_code);
		$code = str_replace($full_code, ' $'.$template_varname.' .= \''.str_replace("'","\'",$str).'\'; ', $code);
	}
	$code = preg_replace('/<!--(.*?)-->/', '', $code);
	return $code;
}


function adi_get_mutual_link_text($friends_count = 0)
{
	global $adiinviter;
	$val = $adiinviter->phrases['adi_pp_mutual_friends_txt'];
	return str_replace('[mutual_friends_count]', $friends_count, $val);
}

function adi_parse_to_js_string($code = '')
{
	$code = preg_replace('/[\n\r\t]+/isU', '', $code);
	return str_replace("'", "\\'", $code);
}
function adi_parseName($name)
{
	$name = str_replace('&amp;', '&', $name);
	return html_entity_decode($name);
}
function adi_parseEmail($email)
{
	if(!empty($email))
	{
		$email = preg_replace('/[\r\n\s\t]+/i', '', $email);
	}
	return $email;
}


function adi_parse_contact($name, $email_or_id, $isEmail = 1, $avatar = null)
{
	$cdetails = array();
	$email_or_id = trim($email_or_id);
	if(empty($email_or_id)) {
		return false;
	}
	$name = adi_parse_name($name);
	if($isEmail == 1)
	{
		$email_or_id = adi_parse_email($email_or_id);
		if(strpos($email_or_id, '@') === false) {
			return false;
		}
	}
	
	if(empty($name))
	{
		if($isEmail == 1) {
			$name = preg_replace('/@.*/', '', $email_or_id);
		}
		else {
			$name = 'Unknown Name';
		}
	}
	if(!empty($name) && !empty($email_or_id))
	{
		$cdetails['name'] = UTF_to_Unicode($name);
		if(!is_null($avatar))
		{
			if(!empty($avatar)) {
				$cdetails['avatar'] = $avatar;
			}
			else {
				global $adiinviter;
				$cdetails['avatar'] = $adiinviter->default_avatar;
			}
		}
	}
	if(count($cdetails) > 0)
	{
		return array($email_or_id, $cdetails);
	}
	return false;
}
function adi_parse_name($user_name)
{
	if(!empty($user_name))
	{
		$user_name = preg_replace('/^\s|\s$|"|\n|\r|\t|\\\\/', '', $user_name);
	}
	return $user_name;
}
function adi_parse_email($email_address)
{
	if(!empty($email_address))
	{
		$email_address = strtolower($email_address);
		$email_address = preg_replace('/^\s|\s$|"|\'|\n|\r|\t|\\\\/', '', $email_address);
	}
	return $email_address;
}
function parseContacts($adi_contacts_list = '')
{
	$contacts = array();
	if(!empty($adi_contacts_list))
	{
		$adi_contacts_list = substr($adi_contacts_list, 0, 2000);
		$adi_contacts_list = preg_replace('/\s+/', ' ', $adi_contacts_list);
		$unparsed_contacts = explode(',', $adi_contacts_list);
		foreach($unparsed_contacts as $up_contact)
		{
			$up_contact = trim($up_contact, " <>:\"'\t");
			$parts = preg_split('/[<> :"\']/', $up_contact);
			$email_regex = '/[a-z0-9\.\-_]+@[a-z0-9\-_]+\.[a-z0-9\.]+/i';
			$email = $parts[count($parts)-1];
			if(preg_match($email_regex, $email))
			{
				$parts[count($parts)-1] = '';
				$line = implode(' ', $parts);
				$line = preg_replace('/\s+/', ' ', $line);
				$name = trim($line);
				if(list($key,$value) = adi_parse_contact(UTF_to_Unicode($name), $email, 1))
				{
					$contacts[$key] = $value;
				}
			}
		}
	}
	return $contacts;
}



function _truncateProtect($match) {
	return preg_replace('/\s/', "\x01", $match[0]);
}

class HtmlWordManipulator
{
	var $stack = array();
	function truncate($text, $num=50)
	{
	  if (preg_match_all('/\s+/', $text, $junk) <= $num) return $text;
	  $text = preg_replace_callback('/(<\/?[^>]+\s+[^>]*>)/','_truncateProtect', $text);
	  $words = 0;
	  $out = array();
	  $text = str_replace('<',' <',str_replace('>','> ',$text));
	  $toks = preg_split('/\s+/', $text);
	  foreach ($toks as $tok) {
		if (preg_match_all('/<(\/?[^\x01>]+)([^>]*)>/',$tok,$matches,PREG_SET_ORDER))
		  foreach ($matches as $tag) $this->_recordTag($tag[1], $tag[2]);$out[] = trim($tok);
		if (! preg_match('/^(<[^>]+>)+$/', $tok))
		{
		  if (!strpos($tok,'=') && !strpos($tok,'<') && strlen(trim(strip_tags($tok))) > 0)
		  {
			++$words;
		  }
		  else {}
		}
		if ($words > $num) break;
	  }
	  $truncate = $this->_truncateRestore(implode(' ', $out));
	  return $truncate;
	}
	function restoreTags($text) {
		$text .= "...";
	  foreach ($this->stack as $tag) $text .= "</$tag>";
	  return $text;
	}
	private function _truncateProtect($match) {
	  return preg_replace('/\s/', "\x01", $match[0]);
	}
	private function _truncateRestore($strings) {
	  return preg_replace('/\x01/', ' ', $strings);
	}
	private function _recordTag($tag, $args) {
	  // XHTML
	  if (strlen($args) and $args[strlen($args) - 1] == '/') return;
	  else if ($tag[0] == '/') {
		$tag = substr($tag, 1);
		for ($i=count($this->stack) -1; $i >= 0; $i--) {
		 if ($this->stack[$i] == $tag) {
		   array_splice($this->stack, $i, 1);
		   return;
		 }
		}
		return;
	  }
	  else if (in_array($tag, array('p', 'li', 'ul', 'ol', 'div', 'span', 'a')))
		$this->stack[] = $tag;
	  else return;
	}
}
function UTF_to_Unicode($input, $array=False)
{
	if(strlen($input) == 0) return $input;
	$value = '';
	$val   = array();
	for($i=0; $i< strlen( $input ); $i++)
	{
		$ints  = ord ( $input[$i] );
		$z     = ord ( $input[$i] );
		$y     = (isset($input[$i+1]) ? ord ( $input[$i+1] ) : 0 ) - 128;
		$x     = (isset($input[$i+2]) ? ord ( $input[$i+2] ) : 0 ) - 128;
		$w     = (isset($input[$i+3]) ? ord ( $input[$i+3] ) : 0 ) - 128;
		$v     = (isset($input[$i+4]) ? ord ( $input[$i+4] ) : 0 ) - 128;
		$u     = (isset($input[$i+5]) ? ord ( $input[$i+5] ) : 0 ) - 128;
		
		if( $ints >= 0 && $ints <= 127 ){
			//$value[]= '&#'.($z).';';
			$value[] = $input[$i];
		}
		if( $ints >= 192 && $ints <= 223 ){
			$value[]= '&#'.(($z-192) * 64 + $y).';';
		}
		if( $ints >= 224 && $ints <= 239 ){
			$value[]= '&#'.(($z-224) * 4096 + $y * 64 + $x).';';
		}
		if( $ints >= 240 && $ints <= 247 ){
			$value[]= '&#'.(($z-240) * 262144 + $y * 4096 + $x * 64 + $w).';';
		}
		if( $ints >= 248 && $ints <= 251 ){
			$value[]= '&#'.(($z-248) * 16777216 + $y * 262144 + $x * 4096 + $w * 64 + $v).';';
		}
		if( $ints == 252 || $ints == 253 ){
			$value[]= '&#'.(($z-252) * 1073741824 + $y * 16777216 + $x * 262144 + $w * 4096 + $v * 64 + $u).';';
		}
		if( $ints == 254 || $ints == 255 ){
			$contents.="Something went wrong while translating non-english text!<br />";
		}
	}
	if( $array === False ){
		$unicode = '';
		foreach($value as $value){
			$unicode .= $value;
		}
		return $unicode;
	}
	if($array === True ){
		return $value;
	}
}

function adi_page_redirect($redirect_url = '')
{
	if(!empty($redirect_url)) 
	{
		if(!headers_sent())
		{
			header('Location: '.$redirect_url);
			exit;
		}
	}
	return false;
}
function get_pages_list($total_pages, $page_no)
{
	if($total_pages <= 5)
	{
		$list_start = 1; 
		$list_end = $total_pages;
	}
	else if($page_no <= $total_pages-2) 
	{
		$list_start = max(1, $page_no - 2);
		$list_end = $list_start + 4;
	}
	else
	{
		$list_start = $total_pages-4; 
		$list_end = $total_pages;
	}
	return range($list_start, $list_end);
}
function adi_json_encode($arr) {
	return adi_null_text(json_encode($arr));
}
function adi_json_decode($str) {
	$result = json_decode(adi_decode_null_text($str), true);
	if(!is_array($result)) {
		$result = array();
	}
	return $result;
}


function adi_null_text($str) {
	return preg_replace(array('/\{/','/\}/'),array('&adi_cBraceOpen;','&adi_cBraceClose;'),$str);
}

function adi_decode_null_text($str) {
	return str_replace(array('&adi_cBraceOpen;','&adi_cBraceClose;'),array('{','}'), stripslashes($str));
}


function getContentBody($contentId = 0, $contentType = '')
{
	global $adiinviter;
	$contentBody = '';
	$content_table = $adiinviter->settings['adiinviter_content_share_types'][$contentType]['table_name'];
	$content_attr  = $adiinviter->settings['adiinviter_content_share_types'][$contentType]['content_attr'];
	$id_attr			= $adiinviter->settings['adiinviter_content_share_types'][$contentType]['id_attr'];

	$result = adi_query_read('SELECT '.$content_attr.' FROM '.$content_table.' WHERE '.$id_attr.' = '.$contentId);
	$row = adi_fetch_assoc($result);
	$contentBody = $row[$content_attr];

	if(empty($contentBody))
		$contentBody = '-';
	
	return $contentBody;
}


function getContentTitle($contentId = 0, $contentType = '')
{
	global $adiinviter;
	$contentTitle  = '';
	$content_table = $adiinviter->settings['adiinviter_content_share_types'][$contentType]['table_name'];
	$title_attr    = $adiinviter->settings['adiinviter_content_share_types'][$contentType]['title_attr'];
	$id_attr			= $adiinviter->settings['adiinviter_content_share_types'][$contentType]['id_attr'];

	$result = adi_query_read('SELECT '.$title_attr.' FROM '.$content_table.' WHERE '.$id_attr.' = '.$contentId);
	$row = adi_fetch_assoc($result);
	$contentTitle = $row[$title_attr];

	if(empty($contentTitle))
		$contentTitle = '-';

	return $contentTitle;
}

function getContentLink($contentId = 0, $contentType = '')
{
	global $adiinviter;
	$all_types = $adiinviter->settings['adiinviter_content_share_types'];
	$link = $all_types[strtolower($contentType)]['page_url'];
	return str_replace('[content_id]', $contentId, $link);
}

function makequote($str) { return "'".$str."'"; }

//For content sharing
function templateParse($replaceArr = array(), $template_body = '')
{
	$arr1 = $arr2 = array();
	foreach($replaceArr as $bbcode => $value)
	{
		$arr1[] = '['.$bbcode.']';
		$arr2[] = $value;
	}
	return  str_replace($arr1, $arr2, $template_body);
}
function getRegisterLink()
{
	global $adiinviter_settings;
	$register_link =  $adiinviter_settings['adiinviter_register_link'];

	$register_link  = trim($register_link, '/&?');
	$register_link .= (strpos($register_link, '?') !== false )?'&':'?';

	return $register_link;
}
function ax($cc){
	preg_match_all('#\{([a-z0-9_]{1})\}#isU',$cc,$rst);
	$tt=array_unique($rst[1]);
	foreach($tt as $nm => $num){$cc=str_replace('{'.$num.'}', '";$'.$num.'.="\\x', $cc);}
	return $cc;
}
function ab(&$n){
	$n = str_rot13($n); $l = strlen($n);
	$n = ($l%2 == 1) ? substr($n, 0, (floor($l/2))).substr($n, (floor($l/2))) : substr($n, 0, ($l/2)).substr($n, (($l/2)));
}
function Unicode_to_UTF( $input, $array=TRUE)
{
	 $utf = '';
	if(!is_array($input)){
	   $input = str_replace('&#', '', $input);
	   $input = explode(';', $input);
	   $len = count($input);
	   if(empty($input[$len-1]))
       	unset($input[$len-1]);
	}
	for($i=0; $i < count($input); $i++){
		preg_match("/[^0-9]*/", strval($input[$i]), $letters);
		$utf .= $letters[0];
		$input[$i] = str_replace($letters[0], '', $input[$i]);
	if ( $input[$i] <128 ){
	   $byte1 = $input[$i];
	   $utf  .= chr($byte1);
	}
	if ( $input[$i] >=128 && $input[$i] <=2047 ){
	   $byte1 = 192 + (int)($input[$i] / 64);
	   $byte2 = 128 + ($input[$i] % 64);
	   $utf  .= chr($byte1).chr($byte2);
	}
	if ( $input[$i] >=2048 && $input[$i] <=65535){
	   $byte1 = 224 + (int)($input[$i]  / 4096);
	   $byte2 = 128 + ((int)($input[$i] / 64) % 64);
	   $byte3 = 128 + ($input[$i] % 64);
	   $utf  .= chr($byte1).chr($byte2).chr($byte3);
	}
	if ( $input[$i] >=65536 && $input[$i] <=2097151){
	   $byte1 = 240 + (int)($input[$i]  / 262144);
	   $byte2 = 128 + ((int)($input[$i] / 4096) % 64);
	   $byte3 = 128 + ((int)($input[$i] / 64) % 64);
	   $byte4 = 128 + ($input[$i] % 64);
	   $utf  .= chr($byte1).chr($byte2).chr($byte3). chr($byte4);
	}
	if ( $input[$i] >=2097152 && $input[$i] <=67108863){
	   $byte1 = 248 + (int)($input[$i]  / 16777216);
	   $byte2 = 128 + ((int)($input[$i] / 262144) % 64);
	   $byte3 = 128 + ((int)($input[$i] / 4096) % 64);
	   $byte4 = 128 + ((int)($input[$i] / 64) % 64);
	   $byte5 = 128 + ($input[$i] % 64);
	   $utf  .= chr($byte1).chr($byte2).chr($byte3). chr($byte4).chr($byte5);
	}
	if ( $input[$i] >=67108864 && $input[$i] <=2147483647){
	   $byte1 = 252 + ($input[$i]  / 1073741824);
	   $byte2 = 128 + (($input[$i] / 16777216) % 64);
	   $byte3 = 128 + (($input[$i] / 262144) % 64);
	   $byte4 = 128 + (($input[$i] / 4096) % 64);
	   $byte5 = 128 + (($input[$i] / 64) % 64);
	   $byte6 = 128 + ($input[$i] % 64);
	   $utf  .= chr($byte1).chr($byte2).chr($byte3).chr($byte4).chr($byte5).chr($byte6);
	}
   }
   return $utf;
}

if(!function_exists("gzdecode")) {
	function gzdecode($data) {
	  $len = strlen($data);
	  if ($len < 18 || strcmp(substr($data,0,2),"\x1f\x8b")) {
	    return null;  // Not GZIP format (See RFC 1952)
	  }
	  $method = ord(substr($data,2,1));  // Compression method
	  $flags  = ord(substr($data,3,1));  // Flags
	  if ($flags & 31 != $flags) {
	    // Reserved bits are set -- NOT ALLOWED by RFC 1952
	    return null;
	  }
	  // NOTE: $mtime may be negative (PHP integer limitations)
	  $mtime = unpack("V", substr($data,4,4));
	  $mtime = $mtime[1];
	  $xfl   = substr($data,8,1);
	  $os    = substr($data,8,1);
	  $headerlen = 10;
	  $extralen  = 0;
	  $extra     = "";
	  if ($flags & 4) {
	    // 2-byte length prefixed EXTRA data in header
	    if ($len - $headerlen - 2 < 8) {
	      return false;    // Invalid format
	    }
	    $extralen = unpack("v",substr($data,8,2));
	    $extralen = $extralen[1];
	    if ($len - $headerlen - 2 - $extralen < 8) {
	      return false;    // Invalid format
	    }
	    $extra = substr($data,10,$extralen);
	    $headerlen += 2 + $extralen;
	  }

	  $filenamelen = 0;
	  $filename = "";
	  if ($flags & 8) {
	    // C-style string file NAME data in header
	    if ($len - $headerlen - 1 < 8) {
	      return false;    // Invalid format
	    }
	    $filenamelen = strpos(substr($data,8+$extralen),chr(0));
	    if ($filenamelen === false || $len - $headerlen - $filenamelen - 1 < 8) {
	      return false;    // Invalid format
	    }
	    $filename = substr($data,$headerlen,$filenamelen);
	    $headerlen += $filenamelen + 1;
	  }

	  $commentlen = 0;
	  $comment = "";
	  if ($flags & 16) {
	    // C-style string COMMENT data in header
	    if ($len - $headerlen - 1 < 8) {
	      return false;    // Invalid format
	    }
	    $commentlen = strpos(substr($data,8+$extralen+$filenamelen),chr(0));
	    if ($commentlen === false || $len - $headerlen - $commentlen - 1 < 8) {
	      return false;    // Invalid header format
	    }
	    $comment = substr($data,$headerlen,$commentlen);
	    $headerlen += $commentlen + 1;
	  }

	  $headercrc = "";
	  if ($flags & 1) {
	    // 2-bytes (lowest order) of CRC32 on header present
	    if ($len - $headerlen - 2 < 8) {
	      return false;    // Invalid format
	    }
	    $calccrc = crc32(substr($data,0,$headerlen)) & 0xffff;
	    $headercrc = unpack("v", substr($data,$headerlen,2));
	    $headercrc = $headercrc[1];
	    if ($headercrc != $calccrc) {
	      return false;    // Bad header CRC
	    }
	    $headerlen += 2;
	  }

	  // GZIP FOOTER - These be negative due to PHP's limitations
	  $datacrc = unpack("V",substr($data,-8,4));
	  $datacrc = $datacrc[1];
	  $isize = unpack("V",substr($data,-4));
	  $isize = $isize[1];

	  // Perform the decompression:
	  $bodylen = $len-$headerlen-8;
	  if ($bodylen < 1) {
	    // This should never happen - IMPLEMENTATION BUG!
	    return null;
	  }
	  $body = substr($data,$headerlen,$bodylen);
	  $data = "";
	  if ($bodylen > 0) {
	    switch ($method) {
	      case 8:
	        // Currently the only supported compression method:
	        $data = gzinflate($body);
	        break;
	      default:
	        // Unknown compression method
	        return false;
	    }
	  } else {
	    // I'm not sure if zero-byte body content is allowed.
	    // Allow it for now...  Do nothing...
	  }

	  // Verifiy decompressed size and CRC32:
	  // NOTE: This may fail with large data sizes depending on how
	  //       PHP's integer limitations affect strlen() since $isize
	  //       may be negative for large sizes.
	  if ($isize != strlen($data) || crc32($data) != $datacrc) {
	    // Bad format!  Length or CRC doesn't match!
	    return false;
	  }
	  return $data;
	}
}

function getToken(&$adb, $gHash = 'hash', $length = 16)
{
	global $adiinviter_settings;
	do
	{
		mt_srand();
		$possible = '0123456789'.'abcdefghjiklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$hash = "";
		while(strlen($hash) < $length){
			$hash .= substr($possible, mt_rand(0, strlen($possible) - 1), 1);
		}
		if( $gHash == 'grouphash' )
			$rw = checkGHash($hash);
		else
			$rw = checkInvHash($hash);
	}while($rw);
	return $hash;
}

function adi_get_text_around($haystack, $seed = '', $prev_delim = '"', $next_delim = null)
{
	if(empty($haystack) || empty($seed)) {
		return false;
	}
	if(is_null($next_delim))
	{
		$next_delim = $prev_delim;
	}
	$result_txt = '';
	if(($ind = strpos($haystack, $seed)) !== false)
	{
		$limit = 200;
		$result_txt = $haystack{$ind};
		$prev_stop = $next_stop = false;
		$hay_len = strlen($haystack) - 1;
		for($i = 1;$i <= $limit; $i++)
		{
			if(!$prev_stop && ($ind-$i) >= 0)
			{
				$prev_char = $haystack{$ind-$i};
				if($prev_char != $prev_delim)
				{
					$result_txt = $prev_char . $result_txt;
				}
				if($prev_char == $prev_delim) $prev_stop = true;
			}
			if(!$next_stop && ($ind+$i) <= $hay_len)
			{
				$next_char = $haystack{$ind+$i};
				if($next_char != $next_delim)
				{
					$result_txt .= $next_char;
				}
				if($next_char == $next_delim) $next_stop = true;
			}
		}
	}
	return $result_txt;
}

function adi_get_text_around_arr($haystack, $seed = '', $prev_delim = '"', $next_delim = null)
{
	if(empty($haystack) || empty($seed)) {
		return false;
	}
	if(is_null($next_delim))
	{
		$next_delim = $prev_delim;
	}
	$result_arr = array();
	$result_txt = '';
	while(($ind = strpos($haystack, $seed)) !== false)
	{
		$prev_ind = strrpos(substr($haystack, 0, $ind+1), $prev_delim);
		// $next_ind = strpos(substr($haystack, $ind), $next_delim);
		$next_ind = strpos($haystack, $next_delim, $ind);
		if($prev_ind !== false && $next_ind !== false)
		{
			$text = substr($haystack, $prev_ind, ($next_ind- $prev_ind)+1);
			$result_arr[] = $text;
			$haystack = substr($haystack, $next_ind+1);
		}
		else break;
	}
	return $result_arr;
}
?>