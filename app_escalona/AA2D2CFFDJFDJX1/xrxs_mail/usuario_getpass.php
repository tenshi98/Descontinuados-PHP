<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
//traigo los datos almacenados
$query = "SELECT 
usuarios_listado.email,
clientes_tipos.RazonSocial,
clientes_tipos.email_principal	
FROM `usuarios_listado` 
LEFT JOIN `clientes_tipos` ON clientes_tipos.idTipoCliente = usuarios_listado.idTipoCliente
WHERE usuarios_listado.email='".$email."' AND mode='".neomode."' ";	
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);
//verifico si los datos ingresados son iguales a los almacenados
if(isset($email)){
	if($rowusr['email']!=$email){  
		$errors[2] 	  = '
		<div id="txf_01" class="alert_error">  
				El email ingresado no existe
				<a class="closed_a" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>';
	}	
}
	
// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2])   ) {
 
		//Generacion de nueva clave
		$num_caracteres = "10"; //cantidad de caracteres de la clave
        $clave = substr(md5(rand()),0,$num_caracteres); //generador aleatorio de claves 
		$nueva_clave = md5($clave);//se codifica la clave 
		
		//Actualizacion de la clave en la base de datos
		$query  = "UPDATE `usuarios_listado` SET password='".$nueva_clave."' WHERE email='".$email."' AND mode='".neomode."' ";
		$result = mysql_query($query, $dbConn);
		
		//envio de correo de con la clave nueva
		$mail             = new PHPMailer();
		$mail->IsHTML(true);
		$mail->SMTPAuth   = true;
		$mail->Host       = "localhost";
		//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		//====== DE QUIEN ES ========
		$mail->From=$rowusr['email_principal'];
		$mail->FromName=$rowusr['RazonSocial'];
		$mail->Sender=$rowusr['email_principal'];
		$mail->AddReplyTo("".$rowusr['email_principal']."", "Responde a este mail");
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
		
		header( 'Location: index.php?recover=true' );
		die;
		
}
?>