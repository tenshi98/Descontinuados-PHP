<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php

// rut enviado desde el form
$rutpers=$_POST['rutpersona'];
// Buscar rut en las Bases CAS
    include("conectar_bd.php"); 
    conectar_bd();
    include("conectar_np.php"); 
header("Location: http://".$g_residencia."/mostrardatos.php?r=".$rutpers."&donde=0" );

?>
</body>
</html>
