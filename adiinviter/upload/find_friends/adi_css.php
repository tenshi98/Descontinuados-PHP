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

header("Content-type: text/css; charset: UTF-8"); 
header("Cache-Control: must-revalidate");

include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'adi_platform_init.php');
$base_path = dirname(__FILE__);
include_once($base_path . DIRECTORY_SEPARATOR . 'adiinviter' . DIRECTORY_SEPARATOR . 'init.php');

if(!headers_sent())
{
	header("Content-type: text/css; charset: UTF-8"); 
	header("Cache-Control: must-revalidate");
}

if($adiinviter->adiinviter_installed !== true)
{
	echo '/* AdiInviter Pro is not installed yet. */';
	exit;
}

$lang_direction = strtolower($adiinviter->current_orientation);

$vars = array(
	'orientation' => $lang_direction,
	'theme_url' => $adiinviter->theme_relative_url,
);
if($lang_direction == 'rtl')
{
	$vars['left'] = 'right';
	$vars['right'] = 'left';
}
else
{
	$vars['left'] = 'left';
	$vars['right'] = 'right';
}

$theme_css = '';
$css_file = ADI_TEMPLATE_PATH.'theme.css';
if(file_exists($css_file))
{
	$theme_css = file_get_contents($css_file);
}

// Services
$on_services = getAdiInviterServices();
foreach($on_services as $service_key => $on_off)
{
	$theme_css .= '.'.$service_key.'_si {background-image:url('.$adiinviter->adi_root_url_rel.'adi_services/'.$service_key.'.png);}';
}


foreach($vars as $varname => $val)
{
	$theme_css = str_replace('{adi_var:'.$varname.'}', $val, $theme_css);
}
$theme_css = $adiinviter->parse_css($theme_css);

$theme_css = str_replace(array("\n", "\t", "  "), array('',''," "), $theme_css);
$theme_css = preg_replace('/ ?\{ ?/', '{', $theme_css)."\n";

echo $theme_css;

?>