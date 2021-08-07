<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['idTipoCuenta']) )  $idTipoCuenta    = $_POST['idTipoCuenta'];
	if ( !empty($_POST['Nombre']) )        $Nombre          = $_POST['Nombre'];
	
	
/*******************************************************************************************************************/
/*                                      Verificacion de los datos obligatorios                                     */
/*******************************************************************************************************************/

	//limpio y separo los datos de la cadena de comprobacion
	$form_obligatorios = str_replace(' ', '', $form_obligatorios);
	$piezas = explode(",", $form_obligatorios);
	//recorro los elementos
	foreach ($piezas as $valor) {
		//veo si existe el dato solicitado y genero el error
		switch ($valor) {
			case 'idTipoCuenta':  if(empty($idTipoCuenta)){  $error['idTipoCuenta']    = 'error/No ha ingresado el id';}break;
			case 'Nombre':        if(empty($Nombre)){        $error['Nombre']          = 'error/No ha ingresado el nombre';}break;
		}
	}
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {		
/*******************************************************************************************************************/		
		case 'insert':
			//Verifico otros datos
			
			//Se verifica si el usuario existe
			if(isset($Nombre)){
				$sql_usuario = mysql_query("SELECT Nombre FROM clientes_tipo_cuentas WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['usuario'] = 'error/El Nombre ya esta en uso';}
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Nombre) && $Nombre != ''){               $a = "'".$Nombre."'" ;            }else{$a ="''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_tipo_cuentas` (Nombre) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idTipoCuenta='".$idTipoCuenta."'" ;
				if(isset($Nombre) && $Nombre != ''){                  $a .= ",Nombre='".$Nombre."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `clientes_tipo_cuentas` SET ".$a." WHERE idTipoCuenta = '$idTipoCuenta'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;				
/*******************************************************************************************************************/
		case 'del':	
		
			//se borra al usuario
			$query  = "DELETE FROM `clientes_tipo_cuentas` WHERE idTipoCuenta = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	

						
			header( 'Location: '.$location.'&deleted=true' );
			die;
	
		break;		
/*******************************************************************************************************************/
	}
?>