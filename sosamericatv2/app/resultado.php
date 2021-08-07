<?php
session_start();
require("../nombre_pag.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="../scripts/FuncJScript.js"></script>

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script src="../scripts/jquery.alerts.js" type="text/javascript"></script>
    <link href="../scripts/jquery.alerts.css" rel="stylesheet" type="text/css" />   
	<script src="//http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  

<link href="css/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body >

<div class="height100 widht100">
    <div class="widht80 fcenter perfil">

<?php 

$nombre=str_replace("0j0"," ",$_GET["nombre"]);
$ciudad=str_replace("0j0"," ",$_GET["ciudad"]);
$ciudad=str_replace("0coma0",",",$ciudad);

$longitud=str_replace("0coma0",",",$_GET["longitud"]);
$longitud=str_replace(" ","",$longitud);

$latitud=str_replace("0coma0",",",$_GET["latitud"]);
$latitud=str_replace(" ","",$latitud);

$imei=str_replace(" ","",$_GET["imei"]);
$id=str_replace(" ","",$_GET["id"]);
$dispositivo=str_replace(" ","",$_GET["dispositivo"]);

			$_SESSION['uid'] = $_GET["uid"];	
			$_SESSION['name'] = $nombre;
		
			$_SESSION['email'] = $_GET["email"];
			if ( $_GET["gender"]="male" ) {
				$_SESSION['gender'] = "Masculino";
			}else{
				$_SESSION['gender'] = "Femenino";
			}
			$_SESSION['birthday'] = $_GET["birthday"];
			$_SESSION['location'] = $ciudad;



	?>
	

    <?php echo '<img src="https://graph.facebook.com/'.$_SESSION['uid'].'/picture" width="60" height="60"/>'; ?>

	<form name="formulario" method="post" action="http://<?=$nombreurl?>/app/crea_fb.php?longitud=<?=$longitud?>&latitud=<?=$latitud?>&imei=<?=$imei?>&id=<?=$id?>&dispositivo=<?=$dispositivo?>">

	<table width="100%" border="0" height="80%" cellspacing="0" cellpadding="0"  valign="middle"  class="table_msg">
  <tr>
    <td width="64%" height="49%"  align="center" >
                      <table border="0" cellspacing="0" cellpadding="0" >
                    <tr>
                      <td height="25"  class="Arial4">Es necesario que complete sus datos para el buen funcionamiento del sistema.</td>
                      </tr>
                    <tr><td width="20">&nbsp;</td></tr>
                    <tr><td><label>Nombre</label></td> </tr>
					<tr>
                      <td height="25">
						<input name="idfb" type="hidden"  id="idfb"  value="<?php echo $_SESSION['uid']; ?>" />
					  <input name="nombre" type="text"  id="nombre" style="float:left; width:220px !important;" value="<?php echo $_SESSION['name']; ?>" />
					  </td>
                    </tr>
                    <tr><td width="20">&nbsp;</td></tr>
<?if ($_SESSION['email']=='undefined' or $_SESSION['email']=='') {?>
                    <tr><td><label><div style="float:left; color:red;">Correo</div></label></td> </tr>
					<tr>
                      <td height="25">
					  <input name="correo" type="text"  id="correo" style="float:left; width:220px !important;" />
					  </td>
                    </tr>
<?}else{?>
                    <tr><td><label>Correo</label></td> </tr>
					<tr>
                      <td height="25">
					  <input name="correo" type="text"  id="correo" style="float:left; width:220px !important;" value="<?php echo $_SESSION['email']; ?>" />
					  </td>
                    </tr>
<?}?>
					<tr><td width="20">&nbsp;</td></tr>
                    <tr><td><label><div style="float:left; color:red;">Numero de celular</div></label></td> </tr>
					<tr>
                      <td height="25">
					<input name="fono" type="text"  id="fono" style="float:left; width:220px !important;" placeholder="Ej: 91234567" />
					  </td>
                    </tr>

					<tr><td width="20">&nbsp;</td></tr>
<?if ($_SESSION['location']=='undefined' or $_SESSION['location']=='') {?>
                    <tr><td><label><div style="float:left; color:red;">Ciudad, Pa&iacute;s</div></label></td> </tr>
					<tr>
                      <td height="25">
					  <input name="ciudad" type="text"  id="ciudad" style="float:left; width:220px !important;" placeholder="Ej: Ciudad, Pa&iacute;s" />
					  </td>
                    </tr>
<?}else{?>
                    <tr><td><label>Ciudad, Pa&iacute;s</label></td> </tr>
					<tr>
                      <td height="25">
					<input name="ciudad" type="text"  id="ciudad" style="float:left; width:220px !important;" value="<?php echo $_SESSION['location']; ?>" />
					  </td>
                    </tr>
<?}?>

                      <tr><td width="20">&nbsp;</td></tr>
                      <tr><td width="20">&nbsp;</td></tr>
                       <tr><td><input name="submit" type="submit" value="Continuar" id="post_button" /></td></tr>

                  </table>
</td></tr>

                  </table>
</form>
</DIV>
</DIV>
</body>
</html>
