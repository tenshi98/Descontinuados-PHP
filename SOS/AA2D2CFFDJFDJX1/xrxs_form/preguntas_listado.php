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
	if ( !empty($_POST['idPregunta']) )    $idPregunta       = $_POST['idPregunta'];
	if ( !empty($_POST['idTipoCliente']) ) $idTipoCliente    = $_POST['idTipoCliente'];
	if ( !empty($_POST['idCategorias']) )  $idCategorias     = $_POST['idCategorias'];
	if ( !empty($_POST['idUsuario']) )     $idUsuario        = $_POST['idUsuario'];
	if ( !empty($_POST['Pregunta']) )      $Pregunta         = $_POST['Pregunta'];
	if ( !empty($_POST['Fecha']) )         $Fecha            = $_POST['Fecha'];
	if ( !empty($_POST['Estado']) )        $Estado           = $_POST['Estado'];
	
	
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
			case 'idPregunta':    if(empty($idPregunta)){     $error['idPregunta']      = 'error/No ha ingresado el id del sistema';}break;
			case 'idTipoCliente': if(empty($idTipoCliente)){  $error['idTipoCliente']   = 'error/No ha ingresado el idTipoCliente del sistema';}break;
			case 'idCategorias':  if(empty($idCategorias)){   $error['idCategorias']    = 'error/No ha ingresado la imagen';}break;
			case 'idUsuario':     if(empty($idUsuario)){      $error['idUsuario']       = 'error/No ha ingresado el email';}break;
			case 'Pregunta':      if(empty($Pregunta)){       $error['Pregunta']        = 'error/No ha ingresado la razon social';}break;
			case 'Fecha':         if(empty($Fecha)){          $error['Fecha']           = 'error/No ha ingresado el Fecha';}break;
			case 'Estado':        if(empty($Estado)){         $error['Estado']          = 'error/No ha ingresado la Estado';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                                 Reemplazos extras                                               */
/*******************************************************************************************************************/
	//reemplazo los saltos de pagina para evitar malos funcionamientos
	$Pregunta=str_replace("
","",$Pregunta);
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
				if(isset($idTipoCliente) && $idTipoCliente != ''){   $a = "'".$idTipoCliente."'" ;    }else{$a ="''";}
				if(isset($idCategorias) && $idCategorias != ''){     $a .= ",'".$idCategorias."'" ;   }else{$a .= ",''";}
				if(isset($idUsuario) && $idUsuario != ''){           $a .= ",'".$idUsuario."'" ;      }else{$a .= ",''";}
				if(isset($Pregunta) && $Pregunta != ''){             $a .= ",'".$Pregunta."'" ;       }else{$a .= ",''";}
				if(isset($Fecha) && $Fecha != ''){                   $a .= ",'".$Fecha."'" ;          }else{$a .= ",''";}
				if(isset($Estado) && $Estado != ''){                 $a .= ",'".$Estado."'" ;         }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `preguntas_listado` (idTipoCliente, idCategorias, idUsuario, Pregunta, Fecha, Estado) VALUES ({$a} )";
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
				$a = "idPregunta='".$idPregunta."'" ;
				if(isset($idTipoCliente) && $idTipoCliente != ''){   $a .= ",idTipoCliente='".$idTipoCliente."'" ;}
				if(isset($idCategorias) && $idCategorias != ''){     $a .= ",idCategorias='".$idCategorias."'" ;}
				if(isset($idUsuario) && $idUsuario != ''){           $a .= ",idUsuario='".$idUsuario."'" ;}
				if(isset($Pregunta) && $Pregunta != ''){             $a .= ",Pregunta='".$Pregunta."'" ;}
				if(isset($Fecha) && $Fecha != ''){                   $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Estado) && $Estado != ''){                 $a .= ",Estado='".$Estado."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `preguntas_listado` SET ".$a." WHERE idPregunta = '$idPregunta'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `preguntas_listado` WHERE idPregunta = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;	
/*******************************************************************************************************************/
		case 'new':	

			//Filtro para idTipoCliente
			if ( !empty($_GET['new']) )   $idUsuario      = $_GET['new'];

			//filtro de idUsuario 
			if(isset($idUsuario) && $idUsuario != ''){ 
				$a = "'".$idUsuario."'" ;
			}else{
				$a ="''";
			}		
			// inserto los datos de registro en la db
			$query  = "INSERT INTO `preguntas_listado` (idUsuario) VALUES ({$a} )";
			$result = mysql_query($query, $dbConn);
			$ultimo_id = mysql_insert_id($dbConn);
			
		
			header( 'Location: '.$location.'&id='.$ultimo_id );
			die;

		break;		
							
/*******************************************************************************************************************/
	}
?>