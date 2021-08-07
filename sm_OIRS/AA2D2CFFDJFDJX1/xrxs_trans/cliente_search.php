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
	if ( !empty($_POST['Rut']) )    $Rut      = $_POST['Rut'];

	//Mensaje de error
	if ( empty($Rut) )      $errors[1] 	  = '<h4 class="alert_error">No ha ingresado un rut</h4>';
	
	//si no hay errores
	if ( !isset($errors[1])   ) { 

		// busco los datos de registro en la db
		$query  = "SELECT idCliente FROM clientes_listado WHERE Rut LIKE '%".$Rut."%'";
		//cuento los resultados
		$result1 = mysql_query($query, $dbConn);
		$result2 = mysql_num_rows($result1);

		// Se verifica si existen datos
		if ( $result2 != 0 ) {
			header( 'Location: '.$location.'?search='.$Rut );
			die;
		} elseif ( $result2 == 0 ) {	
			header( 'Location: '.$location.'?error=true' );
			die;
		} else {
			$errors[1]		= '<h4 class="alert_error">Error inesperado</h4>';
		}
	
		
	}
?>

