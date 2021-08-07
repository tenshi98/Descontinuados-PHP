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
$v = $_GET['v'];
header("Cache-Control: public");
header("Content-Description: File Transfer");

$fileName = array(
	"",
	"AdiInviter Sample TXT Comma Separated.txt",
	"AdiInviter Sample TXT Tab Delimited.txt",
	"AdiInviter Sample vCard.vcf",
	"AdiInviter Sample LDIF.ldif",
	"AdiInviter Sample Generic CSV.csv",
	"AdiInviter Sample CSV.csv",
	"AdiInviter Contacts.csv",
);
header("Content-Disposition: attachment; filename=".$fileName[$v]);
header("Content-Type: application/zip");
header("Content-Transfer-Encoding: binary");

switch($v) {
	case 1 :
		echo 'sales@adiinviter.com,support@adiinviter.com,name@domain.com';
		break;
	case 2 :
		echo 'Contact Name	 Email address
AdiInviter Support	support@adiinviter.com
AdiInviter Sales	sales@adiinviter.com
Your Name	name@domain.com
';
		break;
	case 3 :
		echo 'BEGIN:VCARD
VERSION:3.0
FN:AdiInviter Support
N:Support;AdiInviter;;;
EMAIL;TYPE=INTERNET;TYPE=HOME:support@adiinviter.com
END:VCARD

BEGIN:VCARD
VERSION:3.0
FN:AdiInviter Sales
N:Sales;AdiInviter;;;
EMAIL;TYPE=INTERNET;TYPE=HOME:sales@adiinviter.com
END:VCARD

BEGIN:VCARD
VERSION:3.0
FN:Your Name
N:Name;Your;;;
EMAIL;TYPE=INTERNET;TYPE=HOME:name@domain.com
END:VCARD';
		break;
	case 4 :
		echo 'dn: cn=AdiInviter Support,mail=support@adiinviter.com
objectclass: top
objectclass: person
objectclass: organizationalPerson
objectclass: inetOrgPerson
objectclass: mozillaAbPersonAlpha
givenName: AdiInviter
sn: Support
cn: AdiInviter Support
mail: support@adiinviter.com
modifytimestamp: 0Z

dn: cn=AdiInviter Sales,mail=sales@adiinviter.com
objectclass: top
objectclass: person
objectclass: organizationalPerson
objectclass: inetOrgPerson
objectclass: mozillaAbPersonAlpha
givenName: AdiInviter
sn: Sales
cn: AdiInviter Sales
mail: sales@adiinviter.com
modifytimestamp: 0Z

dn: cn=Your Name,mail=name@domain.com
objectclass: top
objectclass: person
objectclass: organizationalPerson
objectclass: inetOrgPerson
objectclass: mozillaAbPersonAlpha
givenName: Your
sn: Name
cn: Your Name
mail: name@domain.com
modifytimestamp: 0Z';
		break;
	case 5 :
		echo 'person Name,person Email
AdiInviter Support, support@adiinviter.com
AdiInviter Sales, sales@adiinviter.com
Your Name, name@domain.com';
		break;
	case 6 :
		echo 'alias,email_address,first_name,last_name,middle_name,home_address,home_city,home_state,home_zip,home_country,work_company,work_title,work_address,work_city,work_state,work_zip,work_country,home_phone,work_phone,pager,cell_phone,fax,other,alt_email_address,icq_uin,home_website,work_website,birthday,anniversary,comment,facebook_id,twitter_id,twitter_name,facebook_name
AdiInviter Support,support@adiinviter.com,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
AdiInviter Sales,sales@adiinviter.com,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
Your Name,name@domain.com,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,';
		break;
		case 7 :
		echo 'person Name,person Email
AdiInviter Support, support@adiinviter.com
AdiInviter Sales, sales@adiinviter.com
Your Name, name@domain.com';
		break;
}
 

?>