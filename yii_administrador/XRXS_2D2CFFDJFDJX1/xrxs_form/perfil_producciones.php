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
	if ( !empty($_POST['idProd']) )         $idProd         = $_POST['idProd'];
	if ( !empty($_POST['ProdDesc']) )       $ProdDesc       = $_POST['ProdDesc'];
	
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
			case 'idProd':   if(empty($idProd)){    $error['idProd']    = 'error/No ha ingresado el id de la produccion';}break;
			case 'ProdDesc': if(empty($ProdDesc)){  $error['ProdDesc']  = 'error/No ha ingresado el nombre de la produccion';}break;
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
			if(isset($ProdDesc)){
				$sql_usuario = mysql_query("SELECT ProdDesc FROM producciones WHERE ProdDesc='".$ProdDesc."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['ProdDesc'] = 'error/El Nombre ya esta en uso';}
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($ProdDesc) && $ProdDesc != ''){               $a = "'".$ProdDesc."'" ;            }else{$a ="''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `producciones` (ProdDesc) VALUES ({$a} )";
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
				$a = "idProd='".$idProd."'" ;
				if(isset($ProdDesc) && $ProdDesc != ''){                $a .= ",ProdDesc='".$ProdDesc."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `producciones` SET ".$a." WHERE idProd = '$idProd'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
		break;			
/*******************************************************************************************************************/
		case 'del':	
			//se borra al usuario
			$query  = "DELETE FROM `producciones` WHERE idProd = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
			
			header( 'Location: '.$location.'&deleted=true' );
			die;
		
		break;			
/*******************************************************************************************************************/
		
	
	}
?>