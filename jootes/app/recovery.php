<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once 'url.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
$location = "login.php".$w;
//formulario para crear usuario
if ( !empty($_POST['submit']) )  {
	
	//se crean las variables
	if ( !empty($_POST['email']) )        $email          = $_POST['email'];
	
	// se realizan las verificaciones
	//traigo los datos almacenados
	$query = "select login from ejecutivos where login='".$email."'";
	$resultado = mysql_query ($query, $dbConn);
	$rowusr = mysql_fetch_assoc ($resultado);
	
	//verifico si los datos ingresados son iguales a los almacenados
	if(isset($email)){
		if($rowusr['login']!=$email){
			$errors[1] 	  = '<div class="alert-error" >El email ingresado no existe</div>';
		}	
	}	
	if ( empty($email) )        $errors[2] 	  = '<div class="alert-error" >No ha ingresado un email</div>';

	//si no hay errores ejecuto la consulta
	if ( !isset($errors[1]) && !isset($errors[2])   ) {
		
		//Generacion de nueva clave
		$num_caracteres = "10"; //cantidad de caracteres de la clave
        $nueva_clave = substr(md5(rand()),0,$num_caracteres); //generador aleatorio de claves 
		
		//Actualizacion de la clave en la base de datos
		$query  = "UPDATE `ejecutivos` SET pass='".$nueva_clave."' WHERE login='".$email."'";
		$result = mysql_query($query, $dbConn);
		
		//envio de correo de con la clave nueva
		require_once("../PHPMailer_v5.1/class.phpmailer.php");
		$mail             = new PHPMailer();
		$mail->IsHTML(true);
		$mail->SMTPAuth   = true;
		$mail->Host       = "localhost";
		//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		//====== DE QUIEN ES ========
		$mail->From="informacion@jootes.cl";
		$mail->FromName="JOOTES";
		$mail->Sender="informacion@jootes.cl";
		$mail->AddReplyTo("informacion@jootes.cl", "Responde a este mail");
		//====== PARA QUIEN =========
		$mail->Subject = "Cambio de password" ;
		$mail->AddAddress($email);    
		//====== MENSAJE =========
		$strBody = "<p>Se ha generado una nueva contraseña para el usuario ".$email.", su nueva contraseña es: ".$nueva_clave."</p>";
		$mail->MsgHTML($strBody);
		if(!$mail->Send()){
			$mail->ClearAddresses();
		}else{
			$mail->ClearAddresses();
		}
		
		header( 'Location: '.$location.'&recover=true' );
		die;
		
	}

}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crear usuario</title>
<link href="css/reset.css"  rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="height100 widht100">
    <div class="widht80 fcenter perfil">
		<?php  if (isset($errors[1])) {echo $errors[1];}?>
        <?php  if (isset($errors[2])) {echo $errors[2];}?>

           
        <h1>Recuperar contraseña</h1>
        <form method="post">
<table class="table_msg">
        
<tr><td><label>Ingresa tu email</label></td></tr>
<tr><td><input type="text" name="email"  placeholder="Ingresa tu email"  autocomplete="off" <?php  if (isset($email)) {echo 'value="'.$email.'"';}?> ></td></tr>
          
</table>
<input name="submit" type="submit" value="Recuperar" id="post_button" />
<a href="<?php echo $location; ?>"><input type="button" value="Volver" id="post_button" /></a>
</form>
    </div>
</div>
</body>
</html>