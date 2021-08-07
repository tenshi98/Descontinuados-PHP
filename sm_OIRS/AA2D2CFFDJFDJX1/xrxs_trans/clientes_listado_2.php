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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])&& !isset($errors[14])&& !isset($errors[15])  ) { 

		
		//Se crean las variables para crear al usuario
		$num_caracteres = "30"; 
        $auto = substr(md5(rand()),0,$num_caracteres); 
		$Codigo_activacion = md5($auto);

		//filtro de fcreacion
		if(isset($fcreacion) && $fcreacion != ''){ 
        	$a = "'".$fcreacion."'" ;
		}else{
			$a ="''";
        }
		//filtro de password
		if(isset($password) && $password != ''){ 
        	$a .= ",'".md5($password)."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",'".$Estado."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$a .= ",'".$email."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Nombres
		if(isset($Nombres) && $Nombres != ''){ 
        	$a .= ",'".$Nombres."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de ApellidoPat
		if(isset($ApellidoPat) && $ApellidoPat != ''){ 
        	$a .= ",'".$ApellidoPat."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de ApellidoMat
		if(isset($ApellidoMat) && $ApellidoMat != ''){ 
        	$a .= ",'".$ApellidoMat."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Rut
		if(isset($Rut) && $Rut != ''){ 
        	$a .= ",'".$Rut."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Sexo
		if(isset($Sexo) && $Sexo != ''){ 
        	$a .= ",'".$Sexo."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de fNacimiento
		if(isset($fNacimiento) && $fNacimiento != ''){ 
        	$a .= ",'".$fNacimiento."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Pais
		if(isset($Pais) && $Pais != ''){ 
        	$a .= ",'".$Pais."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idCiudad
		if(isset($idCiudad) && $idCiudad != ''){ 
        	$a .= ",'".$idCiudad."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idComuna
		if(isset($idComuna) && $idComuna != ''){ 
        	$a .= ",'".$idComuna."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idVilla
		if(isset($idVilla) && $idVilla != ''){ 
        	$a .= ",'".$idVilla."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idCalle
		if(isset($idCalle) && $idCalle != ''){ 
        	$a .= ",'".$idCalle."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de n_calle
		if(isset($n_calle) && $n_calle != ''){ 
        	$a .= ",'".$n_calle."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Fono1
		if(isset($Fono1) && $Fono1 != ''){ 
        	$a .= ",'".$Fono1."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Fono2
		if(isset($Fono2) && $Fono2 != ''){ 
        	$a .= ",'".$Fono2."'" ;
		}else{
			$a .= ",''";
        }
		
		//Codigo de Activacion
	 	$a .= ",'".$Codigo_activacion."'" ;
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_listado` (fcreacion, password, Estado, email, Nombres, ApellidoPat, ApellidoMat, Rut, Sexo, fNacimiento, Pais, idCiudad, idComuna, idVilla, idCalle, n_calle, Fono1, Fono2, Codigo_activacion) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);

		//envio de correo
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
		$mail->Subject = "Creacion de perfil" ;
		$mail->AddAddress($email);//cliente  
		//====== MENSAJE =========
		$strBody  = "<h2>Creacion de perfil</h2>";
		$strBody .= "<p>Solicitante : ".$Nombres.' '.$ApellidoPat.' '.$ApellidoMat."   <br/>";
		$strBody .= "<p>Su perfil ha sido creado exitosamente, sin embargo debe acceder al siguiente enlace para activarlo : </p>";
		$strBody .= "<a href='".$rowempresa['url_principal']."registrarse.php?activation=".$Codigo_activacion."'></a>";

	
		$mail->MsgHTML($strBody);
		if(!$mail->Send()){
			$mail->ClearAddresses();
		}else{
			$mail->ClearAddresses();
		}
		
		//redirigo a la nueva pagina
		header( 'Location: '.$location );
		die;

}?>