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

error_reporting(E_ALL);


session_start();
include('config.php');
$logged_in = false;

$do_action = isset($_GET['do']) ? $_GET['do'] : '';


if($do_action == 'logout') // Code to log-out.
{
	$time_hash = md5('s'.time());
	setcookie("adi_pro_key", $time_hash, time()+3600);
	$_SESSION['adi_pro_key'] = '';
}


if(isset($_COOKIE['adi_pro_key']) && isset($_SESSION['adi_pro_key']))  // Code to check session
{
	$proceed_key = $_COOKIE['adi_pro_key'];
	if($proceed_key == $_SESSION['adi_pro_key']) 
	{
		$logged_in = true;
		//header('Location: index.php');
	}
}

if($do_action == 'reset' && $logged_in)  // reset password after clicking on link from inside control panel.
{
	$adiinviter_settings['controlpanel_username']='';
	$adiinviter_settings['controlpanel_password']='';
}
else if($logged_in === true) {
	header('Location: index.php');
}


$has_password = true; // Code to check does we have username and password to authonticate.
if(empty($adiinviter_settings['controlpanel_username']) || empty($adiinviter_settings['controlpanel_password']))
{
	$has_password = false;
}


$change_pass_error = '';

if(isset($_POST['change_pass'])) // Code to set username and password
{
	if( !empty($_POST['new_username']) && !empty($_POST['new_password']) && !empty($_POST['new_password_confirm']) && 
		($_POST['new_password'] == $_POST['new_password_confirm']) )
	{
		$adiinviter_settings['controlpanel_username'] = $_POST['new_username'];
		$adiinviter_settings['controlpanel_password'] = $_POST['new_password'];
		$code = '<?php
$adiinviter_settings = '.var_export($adiinviter_settings, true).';
?>';
		@file_put_contents(dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php', $code);

		// Confirm Write Process
		$org_adiinviter_settings = $adiinviter_settings;
		unset($adiinviter_settings);
		include(dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php');
		if(!isset($adiinviter_settings) || !isset($adiinviter_settings['controlpanel_username']) || $adiinviter_settings['controlpanel_username'] !== $_POST['new_username'] || $adiinviter_settings['controlpanel_password'] !== $_POST['new_password'])
		{
			$change_pass_error = 'Please assign write permission(666) to ./config.php file.';
		}
		else
		{
			$has_password = true;
		}
	}
}



$login_success = false;
$login_failed = false;
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['login']))
{
	$login_failed = true;
	if(trim($_POST['username']) == $adiinviter_settings['controlpanel_username'] && 
		trim($_POST['password']) == $adiinviter_settings['controlpanel_password'] && $has_password)
	{
		$time_hash = md5('s'.time());
		setcookie("adi_pro_key", $time_hash, time()+3600);
		$_SESSION['adi_pro_key'] = $time_hash;
		header('Location: index.php');
		$login_success = true;
	}
}



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
	<title>AdiInviterPro Control Panel</title>

	<link type="text/css" href="./css/style.css" rel="stylesheet" />
	<link type="text/css" href="./css/login.css" rel="stylesheet" />
<script type="text/javascript">
function checkResetForm() 
{
	var new_password = document.getElementById('new_password');
	var new_password_confirm = document.getElementById('new_password_confirm');
	var reset_error = document.getElementById('reset_error');
	if(new_password.value != new_password_confirm.value) {
		reset_error.innerHTML = 'Confirm password does not match.';
		return false;
	}
	else {
		reset_error.innerHTML = '';
		return true;
	}
}
</script>
<meta charset="UTF-8"></head>
<body>
	<div id="background">
		<div id="container">
			<div id="logo">
				<img src="css/assets/adiinviter_logo.png" alt="Logo" />
			</div>
			<center>
			<?php if($login_success == true) : ?>
				<font color="#fff">Redirecting you to AdiInviter Control Panel..</font>
				<script type="text/javascript">
				 setTimeout(function(){
				 	window.location = 'index.php';
				 },2000);
				</script>
			<?php else : ?>
			<div id="box" class="fieldset" style="width:390px;">
				
				<?php if($has_password == true) : ?>
				<form action="login.php" method="POST">
					<table>
						<?php echo ($login_failed === true) ? '<tr><td colspan="2" style="color:#DD4B39;">The username or password you entered is incorrect.</td></tr>' : ''; ?>
						<tr><td colspan="2" style="height:15px;"></td></tr>
						<tr>
							<td style="padding:10px;" align="right"> Username : </td>
							<td><input name="username" class="field" AUTOCOMPLETE=OFF></td>
						</tr>
						<tr><td colspan="2" style="height:25px;"></td></tr>
						<tr>
							<td style="padding:10px;" align="right"> Password : </td>
							<td><input type="password" name="password" class="field" AUTOCOMPLETE=OFF></td>
						</tr>
						<tr><td colspan="2" style="height:15px;"></td></tr>
						<tr>
							<td colspan="2" align="right" style="padding-right:10px;padding-bottom:10px;"><input type="submit" value="Login" class="login" name="login" /></td>
						</tr>
					</table>
				</form>
				<?php else : ?>
				<form action="login.php" method="POST" onsubmit="return checkResetForm();">
					<table>
						<tr>
							<td colspan="2" style="color:#DD4B39;"><span id="reset_error"><?php echo $change_pass_error; ?></span></td>
						</tr>
						<tr><td colspan="2" style="height:15px;"></td></tr>
						<tr>
							<td style="padding:10px;" align="right"> Username : </td>
							<td><input name="new_username" class="field" AUTOCOMPLETE=OFF style="width: 183px;"></td>
						</tr>
						<tr><td colspan="2" style="height:15px;"></td></tr>
						<tr>
							<td style="padding:10px;" align="right"> Password : </td>
							<td><input type="password" name="new_password" id="new_password" class="field" AUTOCOMPLETE=OFF style="width: 183px;"></td>
						</tr>
						<tr><td colspan="2" style="height:15px;"></td></tr>
						<tr>
							<td style="padding:10px;" align="right"> Confirm Password : </td>
							<td><input type="password" name="new_password_confirm" id="new_password_confirm" class="field" AUTOCOMPLETE=OFF style="width: 183px;"></td>
						</tr>
						<tr><td colspan="2" style="height:15px;"></td></tr>
						<tr>
							<td colspan="2" align="right" style="padding-right:10px;padding-bottom:10px;">
								<input type="submit" value="Save" class="login" name="change_pass" /></td>
						</tr>
					</table>
				</form>
				<?php endif; ?>

		</div>
		<?php endif; ?>

		</center>
		</div>
	</div>
</body>
</html>