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

	// verificamos que los datos ingresados correspondan a un usuario
	if ( $arrUsuario = esUsuario($usuario,md5($password),$dbConn) ) {
			//Verifico si el usuario esta activo o inactivo
			if($arrUsuario['Estado']==1){
				// definimos las sesiones
				$_SESSION['usuario'] 	= $arrUsuario['usuario'];
				$_SESSION['password']	= $arrUsuario['password'];
					
				//Almaceno la fecha y la hora del ingreso
				$fecha=fecha_actual();
				$hora=hora_actual();
				//Actualizo la tabla de los usuarios
				$sql = "UPDATE usuarios_listado
				SET Ultimo_acceso = '".$fecha."',
				videochat         = 2
				WHERE idUsuario='".$arrUsuario['idUsuario']."' ";
				$resultado = mysql_query($sql,$dbConn);
				//Inserto la fecha con el ingreso
				$query  = "INSERT INTO `usuarios_accesos` (idUsuario,Fecha, Hora) VALUES ({$arrUsuario['idUsuario']},'{$fecha}','{$hora}' )";
				$result = mysql_query($query, $dbConn);
				
				// si todo esta bien te redirige hacia la pagina principal
				header( 'Location: '.$location.'');
				die;
				
			} else {
				// si el usuario esta inactivo reenvia a una pagina
				$errors[1]		= '
				<div id="txf_01" class="alert_error">  
					Su usuario esta desactivado, Contactese con el administrador
					<a class="closed_a" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
						<i class="fa fa-times"></i>
					</a>
				</div>';
				
			}		

		//si no reconoce al usuario, envia un error	
		} else {
			$errors[1]		= '
			<div id="txf_01" class="alert_error">  
				El nombre de usuario o contraseña no coinciden
				<a class="closed_a" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>';
	}
} ?>