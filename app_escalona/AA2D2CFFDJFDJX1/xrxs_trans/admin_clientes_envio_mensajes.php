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
//Traspaso de valores input a variables
	if ( !empty($_POST['Titulo']) )      $Titulo       = $_POST['Titulo'];
	if ( !empty($_POST['Mensaje']) )     $Mensaje      = $_POST['Mensaje'];
	if ( !empty($_POST['idCliente']) )   $idCliente    = $_POST['idCliente'];	
//===========================================================================================================	
	//Valida el ingreso del Titulo
	if ( empty($Titulo) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha ingresado el titulo del mensaje
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del Mensaje
	if ( empty($Mensaje) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado el mensaje
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';

//===========================================================================================================
// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4])    ) { 

//Busco los datos del cliente		
$query="SELECT email
FROM clientes_listado 
WHERE idCliente = '".$idCliente."' AND email!=''  ";	  
$resultado2 = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado2);
mysql_free_result($resultado2);
//===========================================================================================================
	if(isset($row_data['email'])&&$row_data['email']!=''){	
		//envio de correo de con la clave nueva
		$mail             = new PHPMailer();
		$mail->IsHTML(true);
		$mail->SMTPAuth   = true;
		$mail->Host       = "localhost";
		//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		//====== DE QUIEN ES ========
		$mail->From=$arrUsuario['email'];
		$mail->FromName=$arrUsuario['Nombre'];
		$mail->Sender=$arrUsuario['email'];
		$mail->AddReplyTo("".$arrUsuario['email']."", "Responde a este mail");
		//====== PARA QUIEN =========
		$mail->Subject = $Titulo ;
		$mail->AddAddress($row_data['email']);    
		//====== MENSAJE =========
		$strBody = $Mensaje;
		$mail->MsgHTML($strBody);
		if(!$mail->Send()){
			$mail->ClearAddresses();
		}else{
			$mail->ClearAddresses();
		}
	}
//===========================================================================================================
	
		//Reenvio a una nueva direccion
		header( 'Location: '.$location );
		die;
}
?>