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
abstract class AdiInviter_COR
{
	public $session_id;
	public $curl;
	private $has_errors=false;
	private $debug_buffer=array();
	public $service;
	public $service_user;
	public $service_password;
	public $settings = array(
		'transport' => 'curl',
		'cookie_path' => '/tmp',
	);
	private $messageDelay;
	private $maxMessages;
	public $token_str = '';
	public $use_cookies = true;

	public $consumer_key = '';
	public $consumer_secret = '';

public function chr_utf8($code)
{
   if ($code < 0) return false;
   elseif ($code < 128) return chr($code);
   elseif ($code < 160)
   {
	   if ($code==128) $code=8364;
	   elseif ($code==129) $code=160;
	   elseif ($code==130) $code=8218;
	   elseif ($code==131) $code=402;
	   elseif ($code==132) $code=8222;
	   elseif ($code==133) $code=8230;
	   elseif ($code==134) $code=8224;
	   elseif ($code==135) $code=8225;
	   elseif ($code==136) $code=710;
	   elseif ($code==137) $code=8240;
	   elseif ($code==138) $code=352;
	   elseif ($code==139) $code=8249;
	   elseif ($code==140) $code=338;
	   elseif ($code==141) $code=160;
	   elseif ($code==142) $code=381;
	   elseif ($code==143) $code=160;
	   elseif ($code==144) $code=160;
	   elseif ($code==145) $code=8216;
	   elseif ($code==146) $code=8217;
	   elseif ($code==147) $code=8220;
	   elseif ($code==148) $code=8221;
	   elseif ($code==149) $code=8226;
	   elseif ($code==150) $code=8211;
	   elseif ($code==151) $code=8212;
	   elseif ($code==152) $code=732;
	   elseif ($code==153) $code=8482;
	   elseif ($code==154) $code=353;
	   elseif ($code==155) $code=8250;
	   elseif ($code==156) $code=339;
	   elseif ($code==157) $code=160;
	   elseif ($code==158) $code=382;
	   elseif ($code==159) $code=376;
   }
   if ($code < 2048) return chr(192 | ($code >> 6)) . chr(128 | ($code & 63));
   elseif ($code < 65536) return chr(224 | ($code >> 12)) . chr(128 | (($code >> 6) & 63)) . chr(128 | ($code & 63));
   else return chr(240 | ($code >> 18)) . chr(128 | (($code >> 12) & 63)) . chr(128 | (($code >> 6) & 63)) . chr(128 | ($code & 63));
}
public function utf8ToUnicodeEntities ($source) {
	// array used to figure what number to decrement from character order value
	// according to number of characters used to map unicode to ascii by utf-8
	$decrement[4] = 240;
	$decrement[3] = 224;
	$decrement[2] = 192;
	$decrement[1] = 0;

	// the number of bits to shift each charNum by
	$shift[1][0] = 0;
	$shift[2][0] = 6;
	$shift[2][1] = 0;
	$shift[3][0] = 12;
	$shift[3][1] = 6;
	$shift[3][2] = 0;
	$shift[4][0] = 18;
	$shift[4][1] = 12;
	$shift[4][2] = 6;
	$shift[4][3] = 0;

	$pos = 0;
	$len = strlen ($source);
	$encodedString = '';
	while ($pos < $len) {
		$asciiPos = ord (substr ($source, $pos, 1));
		if (($asciiPos >= 240) && ($asciiPos <= 255)) {
			// 4 chars representing one unicode character
			$thisLetter = substr ($source, $pos, 4);
			$pos += 4;
		}
		else if (($asciiPos >= 224) && ($asciiPos <= 239)) {
			// 3 chars representing one unicode character
			$thisLetter = substr ($source, $pos, 3);
			$pos += 3;
		}
		else if (($asciiPos >= 192) && ($asciiPos <= 223)) {
			// 2 chars representing one unicode character
			$thisLetter = substr ($source, $pos, 2);
			$pos += 2;
		}
		else {
			// 1 char (lower ascii)
			$thisLetter = substr ($source, $pos, 1);
			$pos += 1;
		}

		$thisLen = strlen ($thisLetter);
		if ($thisLen > 1) {
			// process the string representing the letter to a unicode entity
			$thisPos = 0;
			$decimalCode = 0;
			while ($thisPos < $thisLen) {
				$thisCharOrd = ord (substr ($thisLetter, $thisPos, 1));
				if ($thisPos == 0) {
					$charNum = intval ($thisCharOrd - $decrement[$thisLen]);
					$decimalCode += ($charNum << $shift[$thisLen][$thisPos]);
				}
				else {
					$charNum = intval ($thisCharOrd - 128);
					$decimalCode += ($charNum << $shift[$thisLen][$thisPos]);
				}

				$thisPos++;
			}

			if ($thisLen == 1)
				$encodedLetter = "&#". str_pad($decimalCode, 3, "0", STR_PAD_LEFT) . ';';
			else
				$encodedLetter = "&#". str_pad($decimalCode, 5, "0", STR_PAD_LEFT) . ';';

			$encodedString .= $encodedLetter;
		}
		else {
			$encodedString .= $thisLetter;
		}
	}
	return $encodedString;
}
	public function adiInviter_utf_converter($input, $array=False) {

	$value = '';
	$val   = array();

	for($i=0; $i< strlen( $input ); $i++){

		$ints = ord ( $input[$i] );

		$z     = ord ( $input[$i] );
		$y     = ord ( $input[$i+1] ) - 128;
		$x     = ord ( $input[$i+2] ) - 128;
		$w     = ord ( $input[$i+3] ) - 128;
		$v     = ord ( $input[$i+4] ) - 128;
		$u     = ord ( $input[$i+5] ) - 128;

		/* Encoding 1 bit*/
		if( $ints >= 0 && $ints <= 127 ){
			// 1 bit
			$value[]= '&#'.($z).';';
			//$val[]  = $value;
		}

		/* Encoding 2 bit*/
		if( $ints >= 192 && $ints <= 223 ){
		// 2 bit
			//$value[]= '&#'.(($z-192) * 64 + $y).';';
			$value[]= '&#'.(($z-192) * 64 + $y).';';
			//$val[]  = $value;
		}

		/* Encoding 3 bit*/
		if( $ints >= 224 && $ints <= 239 ){
			// 3 bit
			$value[]= '&#'.(($z-224) * 4096 + $y * 64 + $x).';';
			//$val[]  = $value;
		}

		/* Encoding 4 bit*/
		if( $ints >= 240 && $ints <= 247 ){
			// 4 bit
			$value[]= '&#'.(($z-240) * 262144 + $y * 4096 + $x * 64 + $w).';';
		}

		/* Encoding 5 bit*/
		if( $ints >= 248 && $ints <= 251 ){
			// 5 bit
			$value[]= '&#'.(($z-248) * 16777216 + $y * 262144 + $x * 4096 + $w * 64 + $v).';';
		}

		/* Encoding 6 bit*/
		if( $ints == 252 || $ints == 253 ){
			// 6 bit
			$value[]= '&#'.(($z-252) * 1073741824 + $y * 16777216 + $x * 262144 + $w * 4096 + $v * 64 + $u).';';
		}

		/* Wrong Ord!*/
		if( $ints == 254 || $ints == 255 ){
			$contents.="Something went wrong while translating non-english text!<br />";
		}

	}

	if( $array === False ){
		$unicode = '';
		foreach($value as $value){
			   $unicode .= $value;

		}

	/*
		$val     = str_replace('&#', '', $value);
		$val     = explode(';', $val);
		$len = count($val);
		unset($val[$len-1]);
	*/
		return $unicode;

	}
	if($array === True ){
	   return $value;
	}

}

	protected function getElementDOM($string_bulk,$query,$attribute=false)
		{
		$search_val=array();
		$doc=new DOMDocument();
		libxml_use_internal_errors(true);
		if (!empty($string_bulk)) $doc->loadHTML($string_bulk);
		else return false;
		libxml_use_internal_errors(false);
		$xpath=new DOMXPath($doc);$data=$xpath->query($query);
		if ($attribute)
			foreach ($data as $node)
				 $search_val[]=$node->getAttribute($attribute);
		else
			foreach ($data as $node)
				 $search_val[]=$node->nodeValue;
		if (empty($search_val))
			return false;
		return $search_val;
		}
	protected function getElementString($string_to_search,$string_start,$string_end)
		{
		if (strpos($string_to_search,$string_start)===false)
			return false;
		if (strpos($string_to_search,$string_end)===false)
			return false;
		$start=strpos($string_to_search,$string_start)+strlen($string_start);$end=strpos($string_to_search,$string_end,$start);
		$return=substr($string_to_search,$start,$end-$start);
		return $return;
		}
	protected function getHiddenElements($string_bulk)
		{
		$post_elements="";
		$doc=new DOMDocument();libxml_use_internal_errors(true);if (!empty($string_bulk)) $doc->loadHTML($string_bulk);libxml_use_internal_errors(false);
		$xpath=new DOMXPath($doc);$query="//input[@type='hidden']";$data=$xpath->query($query);
		foreach($data as $val)
			{
			$name=$val->getAttribute('name');
			$value=$val->getAttribute('value');
			$post_elements[(string)$name]=(string)$value;
			}
		return $post_elements;
		}

	protected function adiinviter_csv_parser($input, $delimiter = ',', $enclosure = '"', $escape = '\\', $eol = '\n')
		{
			//function coded by Aditya on 24/6/2010
			if (is_string($input) && !empty($input)) {
			$output = array();
			$tmp    = preg_split("/".$eol."/",$input);
			if (is_array($tmp) && !empty($tmp)) {
				while (list($line_num, $line) = each($tmp)) {
					if (preg_match("/".$escape.$enclosure."/",$line)) {
						while ($strlen = strlen($line)) {
							$pos_delimiter       = strpos($line,$delimiter);
							$pos_enclosure_start = strpos($line,$enclosure);
							if (
								is_int($pos_delimiter) && is_int($pos_enclosure_start)
								&& ($pos_enclosure_start < $pos_delimiter)
								) {
								$enclosed_str = substr($line,1);
								$pos_enclosure_end = strpos($enclosed_str,$enclosure);
								$enclosed_str = substr($enclosed_str,0,$pos_enclosure_end);
								$output[$line_num][] = $enclosed_str;
								$offset = $pos_enclosure_end+3;
							} else {
								if (empty($pos_delimiter) && empty($pos_enclosure_start)) {
									$output[$line_num][] = substr($line,0);
									$offset = strlen($line);
								} else {
									$output[$line_num][] = substr($line,0,$pos_delimiter);
									$offset = (
												!empty($pos_enclosure_start)
												&& ($pos_enclosure_start < $pos_delimiter)
												)
												?$pos_enclosure_start
												:$pos_delimiter+1;
								}
							}
							$line = substr($line,$offset);
						}
					} else {
						$line = preg_split("/".$delimiter."/",$line);
						if (is_array($line) && !empty($line[0])) {
							$output[$line_num] = $line;
						}
					}
				}
				return $output;
			} else {
				return false;
			}
		} else {
			return false;
		}
		}
	protected function parseCSV($file, $delimiter=',')
		{
		$expr="/,(?=(?:[^\"]*\"[^\"]*\")*(?![^\"]*\"))/";
		$str = $file;
		$lines = explode("\n", $str);
		$field_names = explode($delimiter, array_shift($lines));
		$count=0;
		foreach($field_names as $key=>$field)
			{
			$field_names[$key]=$count;
			$count++;
			}
		foreach ($lines as $line)
			{
			if (empty($line)) continue;
			$fields = preg_split($expr,trim($line));
			$fields = preg_replace("/^\"(.*)\"$/","$1",$fields);
			$_res=array();
			foreach ($field_names as $key => $f) $_res[$f] = (isset($fields[$key])?$fields[$key]:false);
			$res[] = $_res;
			}
		if(!empty($res)) return $res;else return false;
		}


	protected function followLocation($result,$old_url)
	{        
		if ((strpos($result,"HTTP/1.1 3")===false) AND (strpos($result,"HTTP/1.0 3")===false)) return false;
		$new_url=trim($this->getElementString($result,"Location: ",PHP_EOL));
		if (empty($new_url)) $new_url=trim($this->getElementString($result,"location: ",PHP_EOL));
		if (!empty($new_url))
		{                 
			if (strpos($new_url,'http')===false || strpos($new_url, '/') === 0)
			{
				$temp=parse_url($old_url);
				$new_url=$temp['scheme'].'://'.$temp['host'].($new_url[0]=='/'?'':'/').$new_url;
			}
		}
		return $new_url;
	}

	protected function checkSession()
	{
		return (empty($this->session_id)?FALSE:TRUE);
	}

	public function getSessionID()
	{
		return (empty($this->session_id)?time().'.'.rand(1,10000):$this->session_id);
	}

	protected function startSession($session_id=false)
	{
		if($session_id)
		{
			$path=$this->getCookiePath($session_id);
			if (!file_exists($path))
			{
				$this->internalError="Invalid session ID";
				return false;
			}
			$this->session_id=$session_id;
		}
		else
		{
			$this->session_id=$this->getSessionID();
		}
		return true;
	}

	public function endSession()
	{
		if($this->checkSession())
		{
			$path=$this->getCookiePath($this->session_id);
			if (file_exists($path)) unlink($path);
			$path=$this->getLogoutPath($this->session_id);
			if (file_exists($path)) unlink($path);
			unset($this->session_id);
		}
	}

	protected function getCookiePath($session_id=false)
	{
		if ($session_id) $path=$this->settings['cookie_path'].DIRECTORY_SEPARATOR.'oi.'.$session_id.'.cookie';
		else $path=$this->settings['cookie_path'].DIRECTORY_SEPARATOR.'oi.'.$this->getSessionID().'.cookie';
		return $path;
	}

	protected function getLogoutPath($session_id=false)
	{
		if ($session_id) $path=$this->settings['cookie_path'].DIRECTORY_SEPARATOR.'oi.'.$session_id.'.logout';
		else $path=$this->settings['cookie_path'].DIRECTORY_SEPARATOR.'oi.'.$this->getSessionID().'.logout';
		return $path;
	}


	public function init($session_id=false)
	{
		if($this->use_cookies)
		{
			$session_start=$this->startSession($session_id);
			if (!$session_start) return false;
			$file=$this->getCookiePath();
			if (!$session_id)
			{
				$fop=fopen($file,"wb");
				fclose($fop);
			}
		}
		$this->proxy=$this->getProxy();

		if ($this->settings['transport']=='curl')
		{
			$this->curl=curl_init();
			curl_setopt($this->curl, CURLOPT_USERAGENT,(!empty($this->userAgent)?$this->userAgent:"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.1"));
			curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, false);
			if($this->use_cookies) curl_setopt($this->curl, CURLOPT_COOKIEFILE,$file);
			curl_setopt($this->curl, CURLOPT_HEADER, false);
			curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($this->curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
			curl_setopt($this->curl, CURLOPT_RETURNTRANSFER,true);
			if($this->use_cookies) curl_setopt($this->curl, CURLOPT_COOKIEJAR, $file);
			if (strtoupper (substr(PHP_OS, 0,3))== 'WIN') curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, (isset($this->timeout)?$this->timeout:5)/2);
			else  curl_setopt($this->curl, CURLOPT_TIMEOUT, (isset($this->timeout)?$this->timeout:5));
			curl_setopt($this->curl, CURLOPT_AUTOREFERER, TRUE);
			if ($this->proxy)
			{
				curl_setopt($this->curl, CURLOPT_PROXY, $this->proxy['host']);
				curl_setopt($this->curl, CURLOPT_PROXYPORT, $this->proxy['port']);
				if (!empty($this->proxy['user']))
					curl_setopt($this->curl, CURLOPT_PROXYUSERPWD, $this->proxy['user'].':'.$this->proxy['password']);
			}
		}
		return true;
	}

protected function adiinviter_get_curl($url,$cookie_path="",$postfileds="",$referrer="",$header="")
{
	global $curlstatus;
	$cookie_path=$this->getCookiePath();
	$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

	if($referrer!="")
	{
		curl_setopt($ch, CURLOPT_REFERER, $referrer);
	}

	if($cookie_path!="")
	{

		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_path);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_path);
	}

	if($postfileds!="")
	{
		curl_setopt($ch, CURLOPT_POST, 1.1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$postfileds);
	}

	if($header!="")
	{
		curl_setopt($ch, CURLOPT_HEADER, 1);
	}

	$result = curl_exec ($ch);
	$curlstatus=curl_getinfo($ch);
	curl_close ($ch);
	return $result;

}

	public function get($url,$follow=false,$header=false,$quiet=true,$referer=false,$headers=array())
	{
		if ($this->settings['transport']=='curl')
		{
			curl_setopt($this->curl, CURLOPT_URL, $url);
			curl_setopt($this->curl, CURLOPT_POST,false);
			curl_setopt($this->curl, CURLOPT_HTTPGET ,true);
			curl_setopt($this->curl, CURLINFO_HEADER_OUT,true);
			if ($headers)
				{
				$curl_headers=array();
				foreach ($headers as $header_name=>$value)
					$curl_headers[]="{$header_name}: {$value}";
				curl_setopt($this->curl,CURLOPT_HTTPHEADER,$curl_headers);
				}
			if ($header OR $follow) curl_setopt($this->curl, CURLOPT_HEADER, true);
			else curl_setopt($this->curl, CURLOPT_HEADER, false);
			if ($referer) curl_setopt($this->curl, CURLOPT_REFERER, $referer);
			else curl_setopt($this->curl, CURLOPT_REFERER, '');
			$result=curl_exec($this->curl);
			if ($follow)
			{
				$new_url=$this->followLocation($result,$url);
				if (!empty($new_url))
					$result=$this->get($new_url,$follow,$header,$quiet,$url,$headers);
			}
			$this->info = curl_getinfo($this->curl);
			$this->last_url = $this->info['url'];
			return $result;
		}
		elseif ($this->settings['transport']=='wget')
			{
			$string_wget="--user-agent=\"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.1\"";
			$string_wget.=" --timeout=".(isset($this->timeout)?$this->timeout:5);
			$string_wget.=" --no-check-certificate";
			$string_wget.=" --load-cookies ".$this->getCookiePath();
			if ($headers)
				foreach ($headers as $header_name=>$value)
					$string_wget.=" --header=\"".escapeshellcmd($header_name).": ".escapeshellcmd($value)."\"";
			if ($header) $string_wget.=" --save-headers";
			if ($referer) $string_wget.=" --referer={$referer}";
			$string_wget.=" --save-cookies ".$this->getCookiePath();
			$string_wget.=" --keep-session-cookies";
			$string_wget.=" --output-document=-";
			$url=escapeshellcmd($url);
			if ($quiet)
				$string_wget.=" --quiet";
			else
				{
				$log_file=$this->getCookiePath().'_log';
				$string_wget.=" --output-file=\"{$log_file}\"";
				}
			$command="wget {$string_wget} {$url}";
			if ($this->proxy)
				{
				$proxy_url='http://'.(!empty($this->proxy['user'])?$this->proxy['user'].':'.$this->proxy['password']:'').'@'.$this->proxy['host'].':'.$this->proxy['port'];
				$command="export http_proxy={$proxy_url} && ".$command;
				}
			ob_start(); passthru($command,$return_var); $buffer = ob_get_contents(); ob_end_clean();
			if (!$quiet)
				{
				$buffer=file_get_contents($log_file).$buffer;
				unlink($log_file);
				}
			if((strlen($buffer)==0)or($return_var!=0)) return(false);
			else return $buffer;
			}
		}

protected function setCookie($cookie = '') {
	if($cookie != ''){
		curl_setopt($this->curl, CURLOPT_COOKIE,$cookie);
	}
}
protected function setAgent($agent ='')
{
	if($agent == '') {
		curl_setopt($this->curl, CURLOPT_USERAGENT,'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; Win64; x64; Trident/5.0; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Tablet PC 2.0; .NET4.0C; Creative AutoUpdate v1.40.00)');
	}
}
	public function post($url,$post_elements,$follow=false,$header=false,$referer=false,$headers=array(),$raw_data=false,$quiet=true, $cookie = '')
	{
		
		$flag=false;
		if ($raw_data)
			$elements=$post_elements;
		else
		{
			$elements='';
			foreach ($post_elements as $name=>$value)
			{
				if ($flag)
					$elements.='&';
				$elements.="{$name}=".urlencode($value);
				$flag=true;
			}
		}
		if ($this->settings['transport']=='curl')
		{
			curl_setopt($this->curl, CURLOPT_URL, $url);
			curl_setopt($this->curl, CURLOPT_POST,true);
			curl_setopt($this->curl, CURLINFO_HEADER_OUT,true);
			
			if($cookie != '')
				curl_setopt($this->curl, CURLOPT_COOKIE,$cookie);
			
			if ($headers)
			{
				$curl_headers=array();
				foreach ($headers as $header_name=>$value)
					$curl_headers[]="{$header_name}: {$value}";
				curl_setopt($this->curl,CURLOPT_HTTPHEADER,$curl_headers);
			}
			if ($referer) curl_setopt($this->curl, CURLOPT_REFERER, $referer);
			else curl_setopt($this->curl, CURLOPT_REFERER, '');
			if ($header OR $follow) curl_setopt($this->curl, CURLOPT_HEADER, true);
			else curl_setopt($this->curl, CURLOPT_HEADER, false);
			curl_setopt($this->curl, CURLOPT_POSTFIELDS, $elements);
			$result=curl_exec($this->curl);
			if ($follow)
			{
				$new_url=$this->followLocation($result,$url);
				if ($new_url)
					$result=$this->get($new_url,$follow,$header,$quiet,$url,$headers);
			}
			$this->info = curl_getinfo($this->curl);
			$this->last_url = $this->info['url'];
			return $result;
		}
		elseif ($this->settings['transport']=='wget')
		{
			$string_wget = "--user-agent=\"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.1\"";
			$string_wget .= " --timeout=".(isset($this->timeout)?$this->timeout:5);
			$string_wget .= " --no-check-certificate";
			$string_wget .= " --load-cookies ".$this->getCookiePath();
			if (!empty($headers))
				foreach ($headers as $header_name=>$value)
					$string_wget.=" --header=\"".escapeshellcmd($header_name).": ".escapeshellcmd($value)."\"";
			if ($header) $string_wget.=" --save-headers";
			if ($referer) $string_wget.=" --referer=\"{$referer}\"";
			$string_wget.=" --save-cookies ".$this->getCookiePath();
			$string_wget.=" --keep-session-cookies";
			$url=escapeshellcmd($url);
			$string_wget.=" --post-data=\"{$elements}\"";
			$string_wget.=" --output-document=-";
			if ($quiet)
				$string_wget.=" --quiet";
			else
				{
				$log_file=$this->getCookiePath().'_log';
				$string_wget.=" --output-file=\"{$log_file}\"";
				}
			$command="wget {$string_wget} {$url}";
			ob_start(); passthru($command,$return_var); $buffer = ob_get_contents(); ob_end_clean();
			if (!$quiet)
				{
				$buffer=file_get_contents($log_file).$buffer;
				unlink($log_file);
				}
			if((strlen($buffer)==0)or($return_var!=0)) return false;
			else return $buffer;
			}
		}

	protected function getProxy()
		{
		if (!empty($this->settings['proxies']))
			if (count($this->settings['proxies'])==1) { reset($this->settings['proxies']);return current($this->settings['proxies']); }
			else return $this->settings['proxies'][array_rand($this->settings['proxies'])];
		return false;
		}

	public function stopPlugin($graceful=false)
		{
		if ($this->settings['transport']=='curl')
			curl_close($this->curl);
		if (!$graceful) $this->endSession();
		}

	protected function checkResponse($step,$server_response)
		{
		if (empty($server_response)) return false;
		if (strpos($server_response,$this->debug_array[$step])===false) return false;
		return true;
		}


	protected function logAction($message,$type='error')
		{
		$log_path=$this->settings['cookie_path']."/log_{$type}.log";
		$log_file=fopen($log_path,'a');
		$final_message='['.date("Y-m-d H:i:s")."] {$message}\n";
		if ($log_file)
			{
			fwrite($log_file,$final_message);
			fclose($log_file);
			}
		}

	public function isEmail($email)
		{
		return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $email);
		}
	public function parseName($name)
	{
		$name =  str_replace('&amp;', '&', $name);
		return html_entity_decode($name);
	}


	protected function updateDebugBuffer($step,$url,$method,$response=true,$elements=false)
		{
		$this->debug_buffer[$step]=array(
			'url'=>$url,
			'method'=>$method
		);
		if ($elements)
			foreach ($elements as $name=>$value)
				$this->debug_buffer[$step]['elements'][$name]=$value;
		else
			$this->debug_buffer[$step]['elements']=false;
		if ($response)
			$this->debug_buffer[$step]['response']='OK';
		else
			{
			$this->debug_buffer[$step]['response']='FAILED';
			$this->has_errors=true;
			}
		}

	private function buildDebugXML()
		{
		$debug_xml="<adiinviter_debug>\n";
		$debug_xml.="<base_version>{$this->base_version}</base_version>\n";
		$debug_xml.="<transport>{$this->settings['transport']}</transport>\n";
		$debug_xml.="<service>{$this->service}</service>\n";
		$debug_xml.="<user>{$this->service_user}</user>\n";
		$debug_xml.="<password>{$this->service_password}</password>\n";
		$debug_xml.="<steps>\n";
		foreach ($this->debug_buffer as $step=>$details)
			{
			$debug_xml.="<step name='{$step}'>\n";
			$debug_xml.="<url>".htmlentities($details['url'])."</url>\n";
			$debug_xml.="<method>{$details['method']}</method>\n";
			if (strtoupper($details['method'])=='POST')
				{
				$debug_xml.="<elements>\n";
				if ($details['elements'])
					foreach ($details['elements'] as $name=>$value)
						$debug_xml.="<element name='".urlencode($name)."' value='".urlencode($value)."'></element>\n";
				$debug_xml.="</elements>\n";
				}
			$debug_xml.="<response>{$details['response']}</response>\n";
			$debug_xml.="</step>\n";
			}
		$debug_xml.="</steps>\n";
		$debug_xml.="</adiinviter_debug>";
		return $debug_xml;
		}

	private function buildDebugHuman()
		{
		$debug_human="TRANSPORT: {$this->settings['transport']}\n";
		$debug_human.="SERVICE: {$this->service}\n";
		$debug_human.="USER: {$this->service_user}\n";
		$debug_human.="PASSWORD: {$this->service_password}\n";
		$debug_human.="STEPS: \n";
		foreach ($this->debug_buffer as $step=>$details)
			{
			$debug_human.="\t{$step} :\n";
			$debug_human.="\t\tURL: {$details['url']}\n";
			$debug_human.="\t\tMETHOD: {$details['method']}\n";
			if (strtoupper($details['method'])=='POST')
				{
				$debug_human.="\t\tELEMENTS: ";
				if ($details['elements'])
					{
					$debug_human.="\n";
					foreach ($details['elements'] as $name=>$value)
						$debug_human.="\t\t\t{$name}={$value}\n";
					}
				else
					$debug_human.="(no elements sent in this request)\n";
				}
			$debug_human.="\t\tRESPONSE: {$details['response']}\n";
			}
		return $debug_human;
		}


	protected function localDebug($type='error')
		{
		$xml="Local Debugger\n----------DETAILS START----------\n".$this->buildDebugHuman()."\n----------DETAILS END----------\n";
		$this->logAction($xml,$type);
		}

	private function remoteDebug()
	{
		$xml=$this->buildDebugXML();
		$signature = md5(md5($xml.$this->settings['private_key']).$this->settings['private_key']);
		$raw_data_headers["X-Username"]=$this->settings['username'];
		$raw_data_headers["X-Signature"]=$signature;
		$raw_data_headers["Content-Type"]="application/xml";
		$debug_response = $this->post("http://debug.projectsplanet.org/debug/remote_debugger.php",$xml,true,false,false,$raw_data_headers,true);
		if (!$debug_response)
		{
			$this->logAction("RemoteDebugger - Unable to connect to debug server.");
			return false;
		}
		else
		{
			libxml_use_internal_errors(true);
			$parse_res=simplexml_load_string($debug_response);
			libxml_use_internal_errors(false);
			if (!$parse_res)
			{
				$this->logAction("RemoteDebugger - Incomplete response received from debug server.");
				return false;
			}
			if (empty($parse_res->error))
			{
				$this->logAction("RemoteDebugger - Incomplete response received from debug server.");
				return false;
			}
			if ($parse_res->error['code']!=0)
			{
				$this->logAction("RemoteDebugger - ".$parse_res->error);
				return false;
			}
			return true;
		}
	}

	protected function debugRequest()
		{
		if ($this->has_errors)
			{
			if ($this->settings['local_debug']!==false)
				$this->localDebug();
			if ($this->settings['remote_debug'])
				$this->remoteDebug();
			return false;
			}
		elseif ($this->settings['local_debug']=='always')
			$this->localDebug('info');
		return true;
		}


	protected function resetDebugger()
		{
		$this->has_errors=false;
		$this->debug_buffer=array();
		}

	protected function returnContacts($contacts)
		{
		$returnedContacts=array();
		$aaaa=array();
		$fullImport=array('first_name','middle_name','last_name','nickname','email_1','email_2','email_3','organization','phone_mobile','phone_home','phone_work','fax','pager','address_home','address_city','address_state','address_country','postcode_home','company_work','address_work','address_work_city','address_work_country','address_work_state','address_work_postcode','fax_work','phone_work','website','isq_messenger','skype_messenger','skype_messenger','msn_messenger','yahoo_messenger','aol_messenger','other_messenger');
		if (empty($this->settings['fImport']))
			{
			foreach($contacts as $keyImport=>$arrayImport)
				{
				$name=trim((!empty($arrayImport['first_name'])?$arrayImport['first_name']:false).' '.(!empty($arrayImport['middle_name'])?$arrayImport['middle_name']:false).' '.(!empty($arrayImport['last_name'])?$arrayImport['last_name']:false).' '.(!empty($arrayImport['nickname'])?$arrayImport['nickname']:false));
				$returnedContacts[$keyImport]=(!empty($name)?utf8_encode($name):$keyImport);
				}
			}
		else
			{
			foreach($contacts as $keyImport=>$arrayImport)
				foreach($fullImport as $fullValue) {
					$returnedContacts[$keyImport][$fullValue]=(!empty($arrayImport[$fullValue])?$arrayImport[$fullValue]:false);
				}
			}
		return $returnedContacts;
		}

	function login($user,$pass){return false;}

	function getMyContacts(){return array();}

	function logout(){return true;}


	function parse_csv($contents, $format = 'csv', $delimiter = null)
	{
		$csv_result = array();
		$format = strtolower($format);
		include_once(ADI_CORE_PATH.'csv_processor.php');
		if($format == 'vcf')
		{
			$csv_lines = preg_split('/\r?\n/', $contents);
			$adiParser  = new Adi_VCFParser($csv_lines);
			$csv_result = $adiParser->parse_vcards();
		}
		else
		{
			$adiParser  = new Adi_CSVParser($contents);
			if(!is_null($delimiter))
			{
				$adiParser->delim = $delimiter;
			}
			if(!$adiParser->checkError())
			{
				$csvParser = 'extractContactsFrom'.strtoupper($format);
				if(method_exists($adiParser, $csvParser))
					$csv_result = $adiParser->$csvParser();
				else
					$csv_result = array();
			}
		}
		return $csv_result;
	}

}
?>