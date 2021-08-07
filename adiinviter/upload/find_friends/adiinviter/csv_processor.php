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


class Adi_VCFParser
{
	public $_map;
	function __construct(&$csv_contents)
	{
		$this->contacts = $csv_contents;
	}
	public function parse_vcards()
	{
		$contacts = array();
		if(is_string($this->contacts))
		{
			$this->contacts = explode("\n", $this->contacts);
		}
		while ($this->parse($this->contacts))
		{
			$name = ''; $email = '';
			if( array_key_exists('FN', $this->_map) )
			{
				$name = $this->_map['FN'][0]->value;
			}
			else if( array_key_exists('N',$this->_map) )
			{
				$name = $this->_map['N'][0]->value;
			}
			$name = trim(str_replace(';','',$name));
			if( array_key_exists('EMAIL',$this->_map) )
			{
				$emailArr = $this->_map['EMAIL'];
				foreach($emailArr as $ind => $vcObj)
				{
					if( strpos(strtolower($vcObj->name), 'email') !== false && strpos($vcObj->value, '@') !== false )
						$email = trim($vcObj->value);
				}
			}
			if($name != '' && $email != '')
			{
				// $contacts[adi_parseEmail($email)] = array('name' => UTF_to_Unicode($name));
				if(list($key,$value) = adi_parse_contact(UTF_to_Unicode($name), $email, 1))
				{
					$contacts[$key] = $value;
				}
			}
		 }
		 return $contacts;
	}
	function parse(&$lines)
	{
		$this->_map = null;
		$property = new VCardProperty();
		while ($property->parse($lines)) 
		{
			if (is_null($this->_map)) {
				 if ($property->name == 'BEGIN') {
					$this->_map = array();
				 }
			} else {
				 if ($property->name == 'END') {
					break;
				 } else {
					$this->_map[$property->name][] = $property;
				 }
			}
			$property = new VCardProperty();
		}
		return $this->_map != null;
	}
}



class VCardProperty
{
	 var $name;          // string
	 var $params;        // params[PARAM_NAME] => value[,value...]
	 var $value;         // string

	function parse(&$lines)
	{
		while (list(, $line) = each($lines)) 
		{
			$line = rtrim($line);
			$tmp = split_quoted_string(":", $line, 2);
			if (count($tmp) == 2) {
				 $this->value = $tmp[1];
				 $tmp = strtoupper($tmp[0]);
				 $tmp = split_quoted_string(";", $tmp);
				 $this->name = $tmp[0];
				 $this->params = array();
				 for ($i = 1; $i < count($tmp); $i++) {
						$this->_parseParam($tmp[$i]);
				 }
				 if(isset($this->params['ENCODING']))
				 if ($this->params['ENCODING'][0] == 'QUOTED-PRINTABLE') {
						$this->_decodeQuotedPrintable($lines);
				 }
				 if(isset($this->params['CHARSET']))
				 if ($this->params['CHARSET'][0] == 'UTF-8') {
						$this->value = utf8_decode($this->value);
				 }
				 return true;
			}
		}
		return false;
	}

	function _parseParam($param)
	{
		$tmp = split_quoted_string('=', $param, 2);
		if (count($tmp) == 1) {
			$value = $tmp[0];
			$name = $this->_paramName($value);
			$this->params[$name][] = $value;
		} else {
			$name = $tmp[0];
			$values = split_quoted_string(',', $tmp[1]);
			foreach ($values as $value) {
				 $this->params[$name][] = $value;
			}
		}
	}

	function _paramName($value)
	{
		static $types = array (
		'DOM', 'INTL', 'POSTAL', 'PARCEL','HOME', 'WORK',
		'PREF', 'VOICE', 'FAX', 'MSG', 'CELL', 'PAGER',
		'BBS', 'MODEM', 'CAR', 'ISDN', 'VIDEO',
		'AOL', 'APPLELINK', 'ATTMAIL', 'CIS', 'EWORLD',
		'INTERNET', 'IBMMAIL', 'MCIMAIL',
		'POWERSHARE', 'PRODIGY', 'TLX', 'X400',
		'GIF', 'CGM', 'WMF', 'BMP', 'MET', 'PMB', 'DIB',
		'PICT', 'TIFF', 'PDF', 'PS', 'JPEG', 'QTIME',
		'MPEG', 'MPEG2', 'AVI',
		'WAVE', 'AIFF', 'PCM',
		'X509', 'PGP');
		static $values = array( 'INLINE', 'URL', 'CID');
		static $encodings = array( '7BIT', 'QUOTED-PRINTABLE', 'BASE64');
		$name = 'UNKNOWN';
		if (in_array($value, $types)) {
			$name = 'TYPE';
		} elseif (in_array($value, $values)) {
			$name = 'VALUE';
		} elseif (in_array($value, $encodings)) {
			$name = 'ENCODING';
		}
		return $name;
	 }

	 function _decodeQuotedPrintable(&$lines)
	 {
			$value = &$this->value;
			while ($value[strlen($value) - 1] == "=") {
				$value = substr($value, 0, strlen($value) - 1);
				if (!(list(, $line) = each($lines))) {
					 break;
				}
				$value .= rtrim($line);
			}
			$value = quoted_printable_decode($value);
	 }
}

function split_quoted_string($d, $s, $n = 0)
{
	 $quote = false;
	 $len = strlen($s);
	 for ($i = 0; $i < $len && ($n == 0 || $n > 1); $i++) {
			$c = $s{$i};
			if ($c == '"') {
				$quote = !$quote;
			} else if (!$quote && $c == $d) {
				$s{$i} = "\x00";
				if ($n > 0) {
					 $n--;
				}
			}
	 }
	 return explode("\x00", $s);
}

class LdifRecord  {
	var $map = array();

	function add($field, $value) {
		$field = strtolower($field);
		if (!array_key_exists($field,$this->map))
			$this->map[$field] = array();
		$vals =& $this->map[$field];
		$vals[] = $value;
	}
	function get($field) {
		$field = strtolower($field);
		if (!array_key_exists($field,$this->map)) return null;
		else return $this->map[$field];
	}
	function getFirst($field) {
		$vals = $this->get($field);
		if (empty($vals)) return null;
		return $vals[0];
	}
	function clear() {
		$this->map = array();
	}
	function remove($field) {
		$field = strtolower($field);
		unset($this->map[$field]);
	}
	function getFields() {
		return array_keys($this->map);
	}
}
class LdifParser {
	var $_lines;
	var $_idx;
	var $_count;
	function LdifParser($ldif) {
		$this->_lines = preg_split("/\r?\n/", $ldif);
		$this->_idx = 0;
		$this->_count = count($this->_lines);
	}
	function unescape($str) {
		return $str;
	}
	function next()  {
		$r = new LdifRecord;

		$previousKey = null;
		$previousValue = "";
		while ($this->_idx < $this->_count)
		{
			$s = & $this->_lines[$this->_idx++];

			if (empty($s))
			{
				if ($previousKey != null)
					break;
			}
			else
			{
				$c = $s[0];
				if ($c == '#') { }
				else if ($c == ' ' || $c == '\t')
				{
					$previousValue.=substr($s,1);
				}
				else
				{
					if ($previousKey != null)
					{
						$r->add($previousKey, $this->unescape($previousValue));
						$previousKey = null;
						$previousValue = "";
					}
					$i = strpos($s,':');
					if ($i>0) {
						if ($i+1 < strlen($s) && $s[$i+1]==':') {
							$previousKey = trim(substr($s,0,$i));
							$previousValue = ltrim(substr($s,$i+2));
							//It's now in utf8...leave it
							$previousValue = base64_decode($previousValue);
						}
						else {
							$previousKey = trim(substr($s,0,$i));
							$previousValue = ltrim(substr($s,$i+1));
						}
					}
				}
			}
		}
		if ($previousKey != null) {
			$r->add($previousKey, $this->unescape($previousValue));
			return $r;
		} else {
			return null;
		}
	}
}

class CsvReader
{
	var $pos = 0;
	var $csv;
	var $n;
	var $delim = ',';
	function CsvReader ($csv,$delim=',') {
		$this->csv = $csv;
		$this->n = strlen($csv);
		$this->delim = $delim;
	}
	function nextRow($case = false) {
		$cells = array();
		$addCount = 0;
		$n = strlen($this->csv);
		$i = $this->pos;
		while (true) {
			$sb = '';
			$inQuote = false;
			$eol = false;
			$quoteAllowed = true;
			$lastChar = '';
			$hasData = false;
			while (true) {
				if ($i>=$n) {$eol = true;break;}
				$c = $this->csv[$i++];
				$hasData = true;
				if ($lastChar === '"' && $c !== '"' && $inQuote)
				{
					$inQuote = false;
				}
				if ($c === $this->delim)
				{
					if ($inQuote)
					{
						if ($lastChar === '"') break;
						else $sb.=$c;
					} else {
						$lastChar = $c;
						break;
					}
				}
				else if ($c === '"')
				{
					if ($inQuote) {
						if ($lastChar === '"') {
							$sb.=$c;
							$c = '';
						}
					} else {
						if ($quoteAllowed) {
							$inQuote = true;
							$c = '';
						} else {
							$sb.=$c;
						}
					}
				}
				else if ($c === "\r")
				{
					if ($inQuote) $sb.=$c;
				}
				else if ($c === "\n")
				{
					if ($inQuote) {
						$sb.=$c;
					} else {
						$eol = true;
						break;
					}
				}
				else
				{
					$sb.=$c;
					$quoteAllowed = false;
				}
				$lastChar = $c;
			}
			$this->pos = $i;
			if (!$hasData) return null;
			$cells[] = ($case) ? strtolower(trim($sb,' "')) : trim($sb,' "');
			if ($eol) return $cells;
		}
	}
}

class Adi_CSVParser extends CsvReader
{
	var $nameIndices = array();
	var $emailIndices = array();
	var $nameCollection = array("name" =>1, "first name" => 1, "middle name" => 1, "last name" => 1, "first" => 1, "middle" => 1, "last" => 1, "maidenname" => 1, 'nazwa' => 1, 'alias' =>1 , 'firstname' => 1, 'middlename' => 1, 'lastname' => 1, 'nom complet' =>1, 'vorname' => 1, 'nachname' => 1, 'contact name' => 1, "given name" => 2, 'prénom' =>2, "nickname" => 3, "additional name" => 3, );
	var $emailCollection = array("e-mail address" => 1, "e-mail 1 - value" => 1, "email" => 1, "e-mail" => 1,'podstawowy e-mail' => 1, 'e-mail-adresse' => 1, 'email' => 1, 'email_address' => 1, 'adresse de messagerie' =>1, 'email address' =>1, "e-mail 2 address" => 2, "e-mail 2 - value" => 2, "alternate email 1" => 2, "section 1 - email" => 2, 'altemail' =>2, 'email2' =>2 , "e-mail 3 address" => 3, "e-mail 3 - value" => 3, "alternate email 2" => 3,	"section 2 - email" => 3, 'email3' =>3 , "Section 3 - Email" => 4, );
	var $internalError = '';

	function __construct(&$csv_contents) {
		parent::__construct($csv_contents);
	}
	public function checkError() {
		if( !empty($this->internalError) )
			return true;
		else
			return false;
	}
	public function getErrorMessage() {
		if($this->internalError != '')
			AdiError($this->internalError);
	}
	public function setDelimiter($delimiter = ',') {
		$this->delim = $delimiter;
	}
	public function extractContactsFromCSV()
	{
		$cells = $this->nextRow(true);
		$this->getIndices($cells);
		$contacts=array();
		if(count($cells) == 2)
		{
			$this->nameIndices = array( 1 => array(0));
			$this->emailIndices = array( 1 => array(1));
		}
		$cnt = 0;
		if(count($this->nameIndices)==0 || count($this->emailIndices)==0)
			return false;
		while(true)
		{
			$cells = $this->nextRow();
			if ($cells==false) break;
			foreach($this->nameIndices as $priorityGroup)
			{
				$curPriorityName = '';
				foreach($priorityGroup as $fieldIndex)
				{
					if($cells[$fieldIndex] != '') $curPriorityName .= ' '.$cells[$fieldIndex];
				}
				if(trim($curPriorityName) != '') break;
			}
			foreach($this->emailIndices as $priorityGroup)
			{
				$curPriorityEmail = '';
				foreach($priorityGroup as $fieldIndex)
				{
					if($cells[$fieldIndex] != '')
					{
						if(strstr($cells[$fieldIndex], '@') !== false)
							$curPriorityEmail = trim($cells[$fieldIndex]);
						if($curPriorityEmail != '') break;
					}
				}
				if($curPriorityEmail != '') break;
			}
			if($curPriorityEmail != '')
			{
				if(trim($curPriorityName) == '')
				{
					$curPriorityName = preg_replace('/@.*/', '', $curPriorityEmail);
				}
				// $contacts[adi_parseEmail($curPriorityEmail)] = array('name' => adi_parseName($curPriorityName));
				if(list($key,$value) = adi_parse_contact($curPriorityName, $curPriorityEmail, 1))
				{
					$contacts[$key] = $value;
					if(++$cnt == 2000) break;
				}
			}
		}
		return $contacts;
	}

	public function extractContactsFromTXT() {
		//$this->delim = "\t";
		//return $this->extractContactsFromCSV();

		$nlCnt = substr_count($this->csv, "\n");
		$delimCnt = substr_count($this->csv, ",");
		$tabCnt = substr_count($this->csv, "\t");
		if($nlCnt >= ($tabCnt-1) && $tabCnt > 0)
		{
			$manual_emails = explode("\n" , $this->csv);
		}
		else $manual_emails = explode("," , $this->csv);

		foreach($manual_emails as $contact)
		{
			$contact = trim($contact," \n\t");
			$result = preg_split('/[<:\t]/',$contact);
			$cnt = count($result);
			if($cnt >= 2)
			{
				$email = trim($result[$cnt-1],"\"\t \n>");
				unset($result[$cnt-1]);
				$name = trim(implode(' ', $result),"\"\n \t");
			}
			else {
				//if(strpos($result[0], '@') === false) continue;
				$email = trim($result[0],"\"\t \n>");
				$name = preg_replace('/@.*/','',$email);
			}
			/*if(strpos($email, '@') !== false)
				$contacts[adi_parseEmail($email)] = array('name' => $name);*/
			if(list($key,$value) = adi_parse_contact($name, $email, 1))
			{
				$contacts[$key] = $value;
			}
		}
		return $contacts;
	}

	function extractContactsFromLDIF() {
		$contacts = array();
		$ldp = new LdifParser($this->csv);
		while (true)
		{
			$r = $ldp->next();
			if ($r == null)
				break;
			$name = $r->getFirst("cn");
			$email = $r->getFirst("mail");
			if ($email != null)
				$email = trim($email);
			if(!empty($email))
			{
				if ($name != null)
					$name = trim($name);
				if (empty($name))
					$name = $email;
				// $contacts[adi_parseEmail($email)] = array('name' => $name);
				if(list($key,$value) = adi_parse_contact($name, $email, 1))
				{
					$contacts[$key] = $value;
				}
			}
		}
		return $contacts;
	}
	private function getIndices(&$cells)
	{
		global $adiinviter;
		$adiinviter_name_field_not_detected  = sprintf($adiinviter->phrases['adiinviter_name_field_not_detected']);
		$adiinviter_email_field_not_detected = sprintf($adiinviter->phrases['adiinviter_email_field_not_detected']);
		$tt=array();
		if(count($cells) > 0) foreach($cells as $cname) $tt[]=strtolower($cname);
		$cells=$tt;
		$commonNameFields = array_intersect($cells,array_keys($this->nameCollection));
		if( count($commonNameFields) > 0)
		{
			foreach($commonNameFields as $index => $field)
			{
				$this->nameIndices[$this->nameCollection[$field]][] = $index;
			}
		}
		else
			$this->internalError = $adiinviter_name_field_not_detected;

		$commonEmailFields = array_intersect($cells,array_keys($this->emailCollection));
		if( count($commonEmailFields) > 0)
		{
			foreach($commonEmailFields as $index => $field)
			{
				$this->emailIndices[$this->emailCollection[$field]][] = $index;
			}
		}
		else
			$this->internalError = $adiinviter_email_field_not_detected;

	}
}
?>