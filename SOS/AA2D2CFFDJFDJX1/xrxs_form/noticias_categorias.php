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
	if ( !empty($_POST['idNotCat']) )        $idNotCat        = $_POST['idNotCat'];
	if ( !empty($_POST['idTipoCliente']) )   $idTipoCliente   = $_POST['idTipoCliente'];
	if ( !empty($_POST['idNotGrupo']) )      $idNotGrupo      = $_POST['idNotGrupo'];
	if ( !empty($_POST['Nombre']) )          $Nombre          = $_POST['Nombre'];
	if ( !empty($_POST['imagen']) )          $imagen          = $_POST['imagen'];

	
	
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
			case 'idNotCat':       if(empty($idNotCat)){       $error['idNotCat']        = 'error/No ha ingresado el id del sistema';}break;
			case 'idTipoCliente':  if(empty($idTipoCliente)){  $error['idTipoCliente']   = 'error/No ha ingresado el idTipoCliente del sistema';}break;
			case 'idNotGrupo':     if(empty($idNotGrupo)){     $error['idNotGrupo']      = 'error/No ha ingresado la imagen';}break;
			case 'Nombre':         if(empty($Nombre)){         $error['Nombre']          = 'error/No ha ingresado el email';}break;
			case 'imagen':         if(empty($imagen)){         $error['imagen']          = 'error/No ha ingresado la razon social';}break;
			
		}
	}

	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			
			//Se verifica si el dato existe
			if(isset($Titulo)){
				$sql_nombre = mysql_query("SELECT Nombre FROM noticias_categorias WHERE Nombre='".$Nombre."' AND idNotGrupo='".$idNotGrupo."' AND idTipoCliente='".$idTipoCliente."' "); 
				$n1 = mysql_num_rows($sql_nombre);
			} else {$n1=0;}
			if($n1 > 0) {$error['Titulo'] = 'error/El nombre de la Categoria ya existe';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idTipoCliente) && $idTipoCliente != ''){   $a = "'".$idTipoCliente."'" ;   }else{$a ="''";}
				if(isset($idNotGrupo) && $idNotGrupo != ''){         $a .= ",'".$idNotGrupo."'" ;    }else{$a .= ",''";}
				if(isset($Nombre) && $Nombre != ''){                 $a .= ",'".$Nombre."'" ;        }else{$a .= ",''";}
				if(isset($imagen) && $imagen != ''){                 $a .= ",'".$imagen."'" ;        }else{$a .= ",''";}

				// inserto los datos de registro en la db
				$query  = "INSERT INTO `noticias_categorias` (idTipoCliente, idNotGrupo, Nombre, imagen) VALUES ({$a} )";
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
				$a = "idNotCat='".$idNotCat."'" ;
				if(isset($idTipoCliente) && $idTipoCliente != ''){  $a .= ",idTipoCliente='".$idTipoCliente."'" ;}
				if(isset($idNotGrupo) && $idNotGrupo != ''){        $a .= ",idNotGrupo='".$idNotGrupo."'" ;}
				if(isset($Nombre) && $Nombre != ''){                $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($imagen) && $imagen != ''){                $a .= ",imagen='".$imagen."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `noticias_categorias` SET ".$a." WHERE idNotCat = '$idNotCat'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `noticias_categorias` WHERE idNotCat = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>