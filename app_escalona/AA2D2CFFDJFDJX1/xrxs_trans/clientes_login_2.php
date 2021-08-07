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
if ( !isset($errors[1]) && !isset($errors[2])  ) { 
	// Se verifica si el usuario existe en la base de datos propia
	if ( $arrCliente = esCliente($Rut,$dbConn) ) {
			//Verifico si el usuario esta activo o inactivo
			switch ($arrCliente['Estado']) {
				
				case 1:
					// definimos las sesiones
					$_SESSION['Rut']    = $arrCliente['Rut'];
					//$_SESSION['password']	= $arrCliente['password'];
						
					//Almaceno la fecha del ingreso
					$fecha=fecha_actual();
					//Actualizo la tabla de los usuarios
					$sql = "UPDATE clientes_listado SET 
					Ultimo_acceso   = '".$fecha."',
					Imei            = ".$imei.",
					Latitud         = '".$lat."',
					Longitud        = '".$lon."'
					WHERE Rut='".$Rut."'";
					$resultado = mysql_query($sql,$dbConn);
					// si todo esta bien te redirige hacia la pagina principal
					header( 'Location: '.$new_location );
					die;
					break;
				case 2:
					//Se el usuario esta bloqueado envia a la pantalla de bloqueo
					header( 'Location: '.$location.'&block=true' );
					die;
					break;
				case 3:
					//Se el usuario esta inactivo se envia a la pantalla de activacion
					header( 'Location: '.$location.'&activate=true' );
					die;
					break;
			}		

		//Se el usuario no existe en nuestra base de datos va a la otra y lo registra en la nuestra
		} else {
			//si el usuario no existe se le recomienda inscribirse
			header( 'Location: '.$location.'&inex=true' );
			die;
	}
} ?>