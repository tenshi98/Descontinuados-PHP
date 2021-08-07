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

define('ADI_ADMIN_AREA', 1);
session_start();

$proceed_key = isset($_COOKIE['adi_pro_key']) ? $_COOKIE['adi_pro_key'] : '';
if( !isset($_COOKIE['adi_pro_key']) || !isset($_SESSION['adi_pro_key']) || $proceed_key != $_SESSION['adi_pro_key'] || empty($_COOKIE['adi_pro_key']) || empty($_SESSION['adi_pro_key']))
{
	header('Location: login.php');
}
else
{
	setcookie("adi_pro_key", $_COOKIE['adi_pro_key'], time()+3600);
}

$path = dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'find_friends'.DIRECTORY_SEPARATOR.'adiinviter'.DIRECTORY_SEPARATOR.'init.php';
include_once($path);


?>