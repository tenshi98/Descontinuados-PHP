<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
require_once('../nombre_pag.php');
require_once('../conexion2.php');

// username and password sent from form
$myusernam=$_POST['myusername'];
$mypass=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusernam = stripslashes($myusernam);
$mypass = stripslashes($mypass);
$myusernam= mysql_real_escape_string($myusernam);
$mypass = mysql_real_escape_string($mypass);

$sql="SELECT * FROM atderivadores WHERE usuarlog='$myusernam' and usuarpas='$mypass' and valido='1'";
//echo $sql ."<br />";
$result=mysql_query($sql, $base);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
// $_SESSION['myusername2'] = $myusername;
// $_SESSION['mypassword2'] = $mypassword;
$myuser2 = $myusernam;
session_register("myusernam");
session_register("mypass");

header("location:login_success.php?us='".$myuser2."'");
}
else {
echo "Nombre de Usuario o Clave de acceso NO V&aacute;lida";
}
?>
</body>
</html>
