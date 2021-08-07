<?php
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/app_functions.php';
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
// obtengo puntero de conexion con la db
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                                        Aplicacion                                                              */
/**********************************************************************************************************************************/ 
// variable de error activa
$response = array("error" => TRUE);

//Compruebo si recibi los datos
if (isset($_POST['email'])) {
	
    // Recibo los datos a traves de post
    $email     = $_POST['email'];
	
	//traigo los datos almacenados
	$query = "SELECT 
	usuarios_listado.email,
	core_sistemas.RazonSocial,
	core_sistemas.email_principal	
	FROM `usuarios_listado` 
	LEFT JOIN `core_sistemas` ON core_sistemas.idSistema = usuarios_listado.idSistema
	WHERE usuarios_listado.email='".$email."'  ";	
	$resultado = mysql_query ($query, $dbConn);
	$rowusr = mysql_fetch_assoc ($resultado);
	
	//Si el correo no existe
    if ($rowusr['email']!=$email) {
        $response["error"] = TRUE;
        $response["error_msg"] = 'El correo ingresado no existe';
        echo json_encode($response);
    
    //Si el correo existe se crea la clave, se actualiza el usuario y se envia la clave por correo
    } else {
		
		//Generacion de nueva clave
		$num_caracteres = "10"; //cantidad de caracteres de la clave
		$clave = substr(md5(rand()),0,$num_caracteres); //generador aleatorio de claves 
		$nueva_clave = md5($clave);//se codifica la clave 
					
		//Actualizacion de la clave en la base de datos
		$query  = "UPDATE `usuarios_listado` SET password='".$nueva_clave."' WHERE email='".$email."'  ";
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
		
		$response["error"] = FALSE;
		echo json_encode($response); 
		
	}	
			
			
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Datos requeridos (email) inexistentes";
    echo json_encode($response);

}


    
?>
