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
// si no hay errores ejecuto el codigo	
if ( empty($errors[1])  ) { 
	//se establece conexion a la base
		$link = mysql_connect (DB_SERVER, DB_USER, DB_PASS);
        mysql_select_db(DB_NAME,$link);
		//se realiza una lectura a la base
		$arruser = array();
		$queEmp = "SELECT usuario, email FROM usuarios_listado WHERE email='$mail'";
		$resEmp = mysql_query($queEmp, $link) or die(mysql_error());
		$totEmp = mysql_num_rows($resEmp);
		//si el correo no existe
		if($totEmp == 0){
			$error['noExiste']="El mail ingresado no existe ";
		//si el correo si existe
		}else { 	
		$resultado = mysql_query ($queEmp, $link);
        while ( $row = mysql_fetch_assoc ($resultado)) {
	    array_push( $arruser,$row );
        }
		$num_caracteres = "10"; // asignamos el numero de caracteres que va a tener la nueva contrase?a 
        $nueva_clave = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contrase?a de forma aleatoria 
        $usuario_nombre = $row['usuario']; 
        $usuario_clave = $nueva_clave; // la nueva contrase?a que se enviara por correo al usuario 
        $usuario_clave2 = md5($usuario_clave); // encriptamos la nueva contrase?a para guardarla en la BD 
        $usuario_email = $row['email']; 
        // actualizamos los datos (contrase?a) del usuario que solicito su contrase?a 
        mysql_query("UPDATE usuarios_listado SET password='".$usuario_clave2."' WHERE usuario='".$usuario_nombre."'"); 
        // Enviamos por email la nueva contrase?a 
        $remite_nombre = "Simyl S.A."; // Tu nombre o el de tu pagina 
        $remite_email = ""; // tu correo 
        $asunto = "Recuperacion de contraseña"; // Asunto (se puede cambiar) 
        $msg =  "Se ha generado una nueva contrase?a para el usuario <strong>".$usuario_nombre."</strong>. La nueva contraseña es: <strong>".$usuario_clave."</strong>."; 
        $cabeceras = "From: ".$remite_nombre." <".$remite_email.">rn"; 
        $cabeceras = $cabeceras."Mime-Version: 1.0n"; 
        $cabeceras = $cabeceras."Content-Type: text/html"; 
        $enviar_email = mail($usuario_email,$asunto,$msg,$cabeceras); 
        if($enviar_email) { 
            $error['noExiste'] =  "La nueva contraseña ha sido enviada al email asociado al usuario ".$usuario_nombre."."; 
		 }}
}
?>