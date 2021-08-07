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
	if ( $arrUsuario = esCliente($usuario,md5($password),$dbConn) ) {
			//Verifico si el usuario esta activo o inactivo
			if($arrUsuario['Estado']==1){
				// definimos las sesiones
				$_SESSION['usuario'] 	= $arrUsuario['usuario'];
				$_SESSION['password']	= $arrUsuario['password'];
					
				//Almaceno la fecha del ingreso
				$fecha=fecha_actual();
				//Actualizo la tabla de los usuarios
				$sql = "UPDATE clientes_listado
				SET Ultimo_acceso='".$fecha."'
				WHERE usuario='".$usuario."'";
				$resultado = mysql_query($sql,$dbConn);
				//Inserto la fecha con el ingreso
				$query  = "INSERT INTO `clientes_accesos` (idCliente,Fecha) VALUES ({$arrUsuario['idCliente']},'{$fecha}' )";
				$result = mysql_query($query, $dbConn);
				
				// si todo esta bien te redirige hacia la pagina principal
				header( 'Location: '.$location.'?pagina=1' );
				die;
				
			} else {
				// si todo esta bien te redirige hacia la pagina principal
				header( 'Location: index.php?block=true' );
				die;
				
			}		

		//si no reconoce al usuario, envia un error	
		} else {
			$errors[1]		= '<span class="error_log">El nombre de usuario o la contraseña no son correctos</span>';
	}
} ?>