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
$query = "select email from usuarios_listado where email='".$email."' ";
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
		$query  = "UPDATE `usuarios_listado` SET password='".$nueva_clave."' WHERE email='".$email."' ";
		$result = mysql_query($query, $dbConn);
		
		//envio de correo de con la clave nueva
		$mail             = new PHPMailer();
		$mail->IsHTML(true);
		$mail->SMTPAuth   = true;
		$mail->Host       = "localhost";
		//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		//====== DE QUIEN ES ========
		$mail->From=$rowempresa['email_principal'];
		$mail->FromName=$rowempresa['Nombre'];
		$mail->Sender=$rowempresa['email_principal'];
		$mail->AddReplyTo("".$rowempresa['email_principal']."", "Responde a este mail");
		//====== PARA QUIEN =========
		$mail->Subject = "Cambio de password" ;
		$mail->AddAddress($email);    
		//====== MENSAJE =========
		$strBody = "<p>Se ha generado una nueva contrase??a para el usuario ".$email.", su nueva contrase??a es: ".$nueva_clave."</p>";
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