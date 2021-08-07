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
	if ( $arrCliente = esCliente($usuario,md5($password),$dbConn) ) {
			//Verifico si el usuario esta activo o inactivo
			if($arrCliente['Estado']==1){
				// definimos las sesiones
				$_SESSION['usuario'] 	= $arrCliente['usuario'];
				$_SESSION['password']	= $arrCliente['password'];
					
				//Almaceno la fecha del ingreso
				$fecha=date("Y-m-d");
				//Actualizo la tabla de los usuarios
				$sql = "UPDATE clientes_listado
				SET Ultimo_acceso='".$fecha."'
				WHERE usuario='".$usuario."'";
				$resultado = mysql_query($sql,$dbConn);
				//Inserto la fecha con el ingreso
				$query  = "INSERT INTO `clientes_accesos` (idCliente,Fecha) VALUES ({$arrCliente['idCliente']},'{$fecha}' )";
				$result = mysql_query($query, $dbConn);
				
				// si todo esta bien te redirige hacia la pagina principal
				header( 'Location: principal_news.php'.$w );
				die;
				
			} else {
				// Si el usuario esta bloqueado lo redirige a la pagina de mensajes
				header( 'Location: ingresar.php?block=true' );
				die;
				
			}		

		//si no reconoce al usuario, envia un error	
		} else {
			$errors[1]		= '<div class="alert alert-danger" ><strong>Error</strong> usuario o contraseña no coinciden </div>';
	}
} ?>