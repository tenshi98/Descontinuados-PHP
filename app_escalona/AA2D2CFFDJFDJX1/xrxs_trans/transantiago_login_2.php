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
if ( !isset($errors[1])   ) { 
	//ubico la id del conductor
	$query = "SELECT  idConductor
	FROM `transantiago_conductores`
	WHERE  Rut = '{$Rut}'";
	$resultado1 = mysql_query ($query, $dbConn);
	$rowdata = mysql_fetch_assoc ($resultado1);
	$numrows = mysql_num_rows ($resultado1);

	// Se verifica si el usuario existe en la base de datos propia
	if ($numrows!=0 ) {
			$sql = "UPDATE clientes_listado SET 
					idConductor   = '{$rowdata['idConductor']}',
					idRuta   = '1'
					WHERE idCliente='{$arrCliente['idCliente']}'";
					$resultado = mysql_query($sql,$dbConn);

			header( 'Location: '.$location.'&nav=1' );
			die;	

		//Se el usuario no existe en nuestra base de datos va a la otra y lo registra en la nuestra
		} else {
			//si el usuario no existe se le recomienda inscribirse
			header( 'Location: '.$location.'&inex=true' );
			die;
	}
} ?>