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
	if ( !empty($_POST['idNotListado']) )   $idNotListado    = $_POST['idNotListado'];
	if ( !empty($_POST['idTipoCliente']) )  $idTipoCliente   = $_POST['idTipoCliente'];
	if ( !empty($_POST['idNotGrupo']) )     $idNotGrupo      = $_POST['idNotGrupo'];
	if ( !empty($_POST['idNotCat']) )       $idNotCat        = $_POST['idNotCat'];
	if ( !empty($_POST['Titulo']) )         $Titulo          = $_POST['Titulo'];
	if ( !empty($_POST['Fecha']) )          $Fecha           = $_POST['Fecha'];
	if ( !empty($_POST['Resumen']) )        $Resumen         = $_POST['Resumen'];
	if ( !empty($_POST['Texto']) )          $Texto 	         = $_POST['Texto'];
	if ( !empty($_POST['Comentarios']) )    $Comentarios     = $_POST['Comentarios'];
	if ( !empty($_POST['Aprobar']) )        $Aprobar         = $_POST['Aprobar'];

	
	
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
			case 'idNotListado':   if(empty($idNotListado)){   $error['idNotListado']   = 'error/No ha ingresado el id del sistema';}break;
			case 'idTipoCliente':  if(empty($idTipoCliente)){  $error['idTipoCliente']  = 'error/No ha ingresado el idTipoCliente del sistema';}break;
			case 'idNotGrupo':     if(empty($idNotGrupo)){     $error['idNotGrupo']     = 'error/No ha ingresado la imagen';}break;
			case 'idNotCat':       if(empty($idNotCat)){       $error['idNotCat']       = 'error/No ha ingresado el email';}break;
			case 'Titulo':         if(empty($Titulo)){         $error['Titulo']         = 'error/No ha ingresado la razon social';}break;
			case 'Fecha':          if(empty($Fecha)){          $error['Fecha']          = 'error/No ha ingresado el Fecha';}break;
			case 'Resumen':        if(empty($Resumen)){        $error['Resumen']        = 'error/No ha ingresado la Resumen';}break;
			case 'Texto':          if(empty($Texto)){          $error['Texto']          = 'error/No ha ingresado el Texto';}break;
			case 'Comentarios':    if(empty($Comentarios)){    $error['Comentarios']    = 'error/No ha ingresado el Comentarios';}break;
			case 'Aprobar':        if(empty($Aprobar)){        $error['Aprobar']        = 'error/No ha ingresado la Aprobar';}break;
			
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
				$sql_nombre = mysql_query("SELECT Titulo FROM noticias_listado WHERE Titulo='".$Titulo."' AND idNotGrupo='".$idNotGrupo."' AND idNotCat='".$idNotCat."'  AND idTipoCliente='".$idTipoCliente."' "); 
				$n1 = mysql_num_rows($sql_nombre);
			} else {$n1=0;}
			if($n1 > 0) {$error['Titulo'] = 'error/El Nombre ya esta en uso';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idTipoCliente) && $idTipoCliente != ''){   $a = "'".$idTipoCliente."'" ;   }else{$a ="''";}
				if(isset($idNotGrupo) && $idNotGrupo != ''){         $a .= ",'".$idNotGrupo."'" ;    }else{$a .= ",''";}
				if(isset($idNotCat) && $idNotCat != ''){             $a .= ",'".$idNotCat."'" ;      }else{$a .= ",''";}
				if(isset($Titulo) && $Titulo != ''){                 $a .= ",'".$Titulo."'" ;        }else{$a .= ",''";}
				if(isset($Fecha) && $Fecha != ''){                   $a .= ",'".$Fecha."'" ;         }else{$a .= ",''";}
				if(isset($Resumen) && $Resumen != ''){               $a .= ",'".$Resumen."'" ;       }else{$a .= ",''";}
				if(isset($Texto) && $Texto != ''){                   $a .= ",'".$Texto."'" ;         }else{$a .= ",''";}
				if(isset($Comentarios) && $Comentarios != ''){       $a .= ",'".$Comentarios."'" ;   }else{$a .= ",''";}
				if(isset($Aprobar) && $Aprobar != ''){               $a .= ",'".$Aprobar."'" ;       }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `noticias_listado` (idTipoCliente, idNotGrupo, idNotCat, Titulo, Fecha, Resumen, Texto, Comentarios, Aprobar) VALUES ({$a} )";
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
				$a = "idNotListado='".$idNotListado."'" ;
				if(isset($idTipoCliente) && $idTipoCliente != ''){   $a .= ",idTipoCliente='".$idTipoCliente."'" ;}
				if(isset($idNotGrupo) && $idNotGrupo != ''){         $a .= ",idNotGrupo='".$idNotGrupo."'" ;}
				if(isset($idNotCat) && $idNotCat != ''){             $a .= ",idNotCat='".$idNotCat."'" ;}
				if(isset($Titulo) && $Titulo != ''){                 $a .= ",Titulo='".$Titulo."'" ;}
				if(isset($Fecha) && $Fecha != ''){                   $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Resumen) && $Resumen != ''){               $a .= ",Resumen='".$Resumen."'" ;}
				if(isset($Texto) && $Texto != ''){                   $a .= ",Texto='".$Texto."'" ;}
				if(isset($Comentarios) && $Comentarios != ''){       $a .= ",Comentarios='".$Comentarios."'" ;}
				if(isset($Aprobar) && $Aprobar != ''){               $a .= ",Aprobar='".$Aprobar."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `noticias_listado` SET ".$a." WHERE idNotListado = '$idNotListado'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `noticias_listado` WHERE idNotListado = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
							
/*******************************************************************************************************************/
	}
?>