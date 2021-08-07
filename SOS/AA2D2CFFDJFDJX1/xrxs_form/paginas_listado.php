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
	if ( !empty($_POST['idPagListado']) )   $idPagListado    = $_POST['idPagListado'];
	if ( !empty($_POST['idTipoCliente']) )  $idTipoCliente   = $_POST['idTipoCliente'];
	if ( !empty($_POST['idPagGrupo']) )     $idPagGrupo      = $_POST['idPagGrupo'];
	if ( !empty($_POST['idPagCat']) )       $idPagCat        = $_POST['idPagCat'];
	if ( !empty($_POST['Titulo']) )         $Titulo          = $_POST['Titulo'];
	if ( !empty($_POST['Fecha']) )          $Fecha           = $_POST['Fecha'];
	if ( !empty($_POST['Resumen']) )        $Resumen         = $_POST['Resumen'];
	if ( !empty($_POST['Texto']) )          $Texto 	         = $_POST['Texto'];
	
	
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
			case 'idPagListado':   if(empty($idPagListado)){   $error['idPagListado']    = 'error/No ha ingresado el id del sistema';}break;
			case 'idTipoCliente':  if(empty($idTipoCliente)){  $error['idTipoCliente']   = 'error/No ha ingresado el idTipoCliente del sistema';}break;
			case 'idPagGrupo':     if(empty($idPagGrupo)){     $error['idPagGrupo']      = 'error/No ha ingresado la imagen';}break;
			case 'idPagCat':       if(empty($idPagCat)){       $error['idPagCat']        = 'error/No ha ingresado el email';}break;
			case 'Titulo':         if(empty($Titulo)){         $error['Titulo']          = 'error/No ha ingresado la razon social';}break;
			case 'Fecha':          if(empty($Fecha)){          $error['Fecha']           = 'error/No ha ingresado el Fecha';}break;
			case 'Resumen':        if(empty($Resumen)){        $error['Resumen']         = 'error/No ha ingresado la Resumen';}break;
			case 'Texto':          if(empty($Texto)){          $error['Texto']           = 'error/No ha ingresado el Texto';}break;
			
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
				$sql_usuario = mysql_query("SELECT Titulo FROM paginas_listado WHERE Titulo='".$Titulo."' AND idPagGrupo='".$idPagGrupo."' AND idPagCat='".$idPagCat."' AND idTipoCliente='".$idTipoCliente."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Titulo'] = 'error/La noticia ya existe';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idTipoCliente) && $idTipoCliente != ''){   $a = "'".$idTipoCliente."'" ;   }else{$a ="''";}
				if(isset($idPagGrupo) && $idPagGrupo != ''){         $a .= ",'".$idPagGrupo."'" ;    }else{$a .= ",''";}
				if(isset($idPagCat) && $idPagCat != ''){             $a .= ",'".$idPagCat."'" ;      }else{$a .= ",''";}
				if(isset($Titulo) && $Titulo != ''){                 $a .= ",'".$Titulo."'" ;        }else{$a .= ",''";}
				if(isset($Fecha) && $Fecha != ''){                   $a .= ",'".$Fecha."'" ;         }else{$a .= ",''";}
				if(isset($Resumen) && $Resumen != ''){               $a .= ",'".$Resumen."'" ;       }else{$a .= ",''";}
				if(isset($Texto) && $Texto != ''){                   $a .= ",'".$Texto."'" ;         }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `paginas_listado` (idTipoCliente, idPagGrupo, idPagCat, Titulo, Fecha, Resumen, Texto) VALUES ({$a} )";
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
				$a = "idPagListado='".$idPagListado."'" ;
				if(isset($idTipoCliente) && $idTipoCliente != ''){   $a .= ",idTipoCliente='".$idTipoCliente."'" ;}
				if(isset($idPagGrupo) && $idPagGrupo != ''){         $a .= ",idPagGrupo='".$idPagGrupo."'" ;}
				if(isset($idPagCat) && $idPagCat != ''){             $a .= ",idPagCat='".$idPagCat."'" ;}
				if(isset($Titulo) && $Titulo != ''){                 $a .= ",Titulo='".$Titulo."'" ;}
				if(isset($Fecha) && $Fecha != ''){                   $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Resumen) && $Resumen != ''){               $a .= ",Resumen='".$Resumen."'" ;}
				if(isset($Texto) && $Texto != ''){                   $a .= ",Texto='".$Texto."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `paginas_listado` SET ".$a." WHERE idPagListado = '$idPagListado'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `paginas_listado` WHERE idPagListado = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>