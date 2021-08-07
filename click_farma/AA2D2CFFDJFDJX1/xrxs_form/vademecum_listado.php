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
	if ( !empty($_POST['idVademecum']) )   $idVademecum    = $_POST['idVademecum'];
	if ( !empty($_POST['idCategoria']) )  $idCategoria   = $_POST['idCategoria'];
	if ( !empty($_POST['Titulo']) )       $Titulo        = $_POST['Titulo'];
	if ( !empty($_POST['Descripcion']) )  $Descripcion   = $_POST['Descripcion'];	
	
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
			case 'idVademecum':   if(empty($idVademecum)){   $error['idVademecum']   = 'error/No ha ingresado el id';}break;
			case 'idCategoria':  if(empty($idCategoria)){  $error['idCategoria']  = 'error/No ha seleccionado la categoria';}break;
			case 'Titulo':       if(empty($Titulo)){       $error['Titulo']       = 'error/No ha ingresado el titulo';}break;
			case 'Descripcion':  if(empty($Descripcion)){  $error['Descripcion']  = 'error/No ha ingresado la descripcion';}break;
		}
	}
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':

			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idCategoria) && $idCategoria != ''){     $a  = "'".$idCategoria."'" ;        }else{$a  ="''";}
				if(isset($Titulo) && $Titulo != ''){               $a .= ",'".$Titulo."'" ;            }else{$a .=",''";}
				if(isset($Descripcion) && $Descripcion != ''){     $a .= ",'".$Descripcion."'" ;       }else{$a .=",''";}

				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `vademecum_listado` (idCategoria, Titulo, Descripcion) VALUES ({$a} )";
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
				$a = "idVademecum='".$idVademecum."'" ;
				if(isset($idCategoria) && $idCategoria != ''){       $a .= ",idCategoria='".$idCategoria."'" ;}
				if(isset($Titulo) && $Titulo != ''){                 $a .= ",Titulo='".$Titulo."'" ;}
				if(isset($Descripcion) && $Descripcion != ''){       $a .= ",Descripcion='".$Descripcion."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `vademecum_listado` SET ".$a." WHERE idVademecum = '$idVademecum'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `vademecum_listado` WHERE idVademecum = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>
