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
	if ( !empty($_POST['ProfCod']) )      $ProfCod        = $_POST['ProfCod'];
	if ( !empty($_POST['ProfDesc']) )     $ProfDesc       = $_POST['ProfDesc'];
	
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
			case 'ProfCod':     if(empty($ProfCod)){    $error['ProfCod']    = 'error/No ha ingresado el id de la profesion';}break;
			case 'ProfDesc':    if(empty($ProfDesc)){   $error['ProfDesc']   = 'error/No ha ingresado el nombre de la profesion';}break;
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
			if(isset($ProfDesc)){
				$sql_usuario = mysql_query("SELECT ProfDesc FROM profesion WHERE ProfDesc='".$ProfDesc."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['ProfDesc'] = 'error/El Nombre ya esta en uso';}
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($ProfDesc) && $ProfDesc != ''){               $a = "'".$ProfDesc."'" ;            }else{$a ="''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `profesion` (ProfDesc) VALUES ({$a} )";
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
				$a = "ProfCod='".$ProfCod."'" ;
				if(isset($ProfDesc) && $ProfDesc != ''){                $a .= ",ProfDesc='".$ProfDesc."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `profesion` SET ".$a." WHERE ProfCod = '$ProfCod'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
		break;			
/*******************************************************************************************************************/
		case 'del':	
			//se borra al usuario
			$query  = "DELETE FROM `profesion` WHERE ProfCod = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;
		
		break;			
/*******************************************************************************************************************/
		
	
	}
?>