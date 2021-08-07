<?php
session_start();
if ($_GET["cierro"]=="si") {
session_destroy();
}
require_once('nombre_pag.php');
require_once('conexion.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
</head>

<body>
<?php /////////////////////////////////////////
// Actualizacion de datos personales
// definimos las variables
	if ( !empty($_POST['nom_ejecutiv']) ) 	   $nom_ejecutiv 	 = $_POST['nom_ejecutiv'];
	if ( !empty($_POST['soy']) ) 	           $soy 	         = $_POST['soy'];
	if ( !empty($_POST['edad']) ) 	           $edad 	         = $_POST['edad'];
	if ( !empty($_POST['busco_a']) ) 	       $busco_a 	     = $_POST['busco_a'];
	if ( !empty($_POST['busco_b']) ) 	       $busco_b          = $_POST['busco_b'];
	if ( !empty($_POST['b_edad_a']) ) 	       $b_edad_a         = $_POST['b_edad_a'];
	if ( !empty($_POST['b_edad_b']) ) 	       $b_edad_b         = $_POST['b_edad_a'];
	if ( !empty($_POST['radio']) ) 	           $radio            = $_POST['radio'];
	if ( !empty($_POST['direccion_img']) ) 	   $direccion_img    = $_POST['direccion_img'];
	if ( !empty($_POST['publicidad']) ) 	   $publicidad 	     = $_POST['publicidad'];
	if ( !empty($_POST['login']) ) 	           $login 	         = $_POST['login'];
	if ( !empty($_POST['id_ejecutiv']) ) 	   $id_ejecutiv      = $_POST['id_ejecutiv'];
	if ( !empty($_POST['old_password']) ) 	   $old_password     = $_POST['old_password'];
	if ( !empty($_POST['password']) ) 	       $password         = $_POST['password'];
	if ( !empty($_POST['new_password1']) ) 	   $new_password1    = $_POST['new_password1'];
	if ( !empty($_POST['new_password2']) ) 	   $new_password2    = $_POST['new_password2'];
	
	// completamos la variable error si es necesario
	if ( empty($nom_ejecutiv) )    	$error['nom_ejecutiv'] 	  = '<p>No ha ingresado un nick</p>';
	//comparacion de contraseñas
	if ( !empty($password)&&$password!='' ) {
		// Creacion de variable a utilizar
		$x='';
		//verifico que la password ingresada corresponda a la almacenada en la base de datos
		if ( $password != $old_password ) {
			$error['password'] = '<p>La contrase&ntilde;a ingresada no corresponde</p>';
		}
		//verifico que las nuevas password sean iguales
		if ( $new_password1 != $new_password2 ) {
			$error['re-password_nueva'] = '<p>La contrase&ntilde;a nueva no coincide</p>';
		}
		//si todo esta ok se carga la sentencia para modificar contraseñas
		if ( $password==$old_password && $new_password1==$new_password2 ) {
			$x="pass = '$new_password1',";
		}
		
	}
	
	// si no hay errores registramos los datos
	if ( empty($error) ) {
		
		// inserto los datos de registro en la db
		$busqueda= $busco_a + $busco_b;
		$query  = "UPDATE ejecutivos SET 
		nom_ejecutiv    = '$nom_ejecutiv',
		".$x."
		soy             = '$soy',
		edad            = '$edad',
		busco           = '$busqueda',
		b_edad_a        = '$edad_desde',
		b_edad_b        = '$edad_hasta',
		radio           = '$radio',
		direccion_img   = '$direccion_img',
		publicidad      = '$publicidad'
		WHERE login     = '$login'";
		
		$result = mysql_query($query, $base);
		
	}
		
?>
    
<?php // manejador de errores ?>
<?php if (!empty($error)) { ?>
  <ul> 
   <?php foreach ($error as $mensaje) { ?>
		 <li class="alert_error" ><?php echo $mensaje ?></li>
   <?php } ?>
  </ul>
<?php } ?>
 
<p><span class="cuerpo_gris">Los datos fueron actualizados.</span></p>
<input name="button3" type="submit" class="google_bot_txt_bco esquina_red_3px padding_10" id="button3"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/administracion_perfil.php?id_ejecutiv=<?php echo $id_ejecutiv ?>';"  value="Volver a la Administraci&oacute;n" />

</body>
</html>