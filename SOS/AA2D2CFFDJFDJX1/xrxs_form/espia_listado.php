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
	if ( !empty($_POST['idEspiaListado']) )  $idEspiaListado  = $_POST['idEspiaListado'];
	if ( !empty($_POST['idEspiaCat']) )      $idEspiaCat      = $_POST['idEspiaCat'];
	if ( !empty($_POST['idCliente']) )       $idCliente       = $_POST['idCliente'];
	if ( !empty($_POST['Fecha']) )           $Fecha           = $_POST['Fecha'];
	if ( !empty($_POST['Texto']) )           $Texto           = $_POST['Texto'];
	if ( !empty($_POST['Nrecorrido']) )      $Nrecorrido      = $_POST['Nrecorrido'];
	if ( !empty($_POST['Nparada']) )         $Nparada         = $_POST['Nparada'];
	if ( !empty($_POST['idEstado']) )        $idEstado        = $_POST['idEstado'];

	
	
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
			case 'idEspiaListado':  if(empty($idEspiaListado)){  $error['idEspiaListado']   = 'error/No ha ingresado el id del sistema';}break;
			case 'idEspiaCat':      if(empty($idEspiaCat)){      $error['idEspiaCat']       = 'error/No ha ingresado la idCliente';}break;
			case 'idCliente':       if(empty($idCliente)){       $error['idCliente']        = 'error/No ha ingresado el email';}break;
			case 'Fecha':           if(empty($Fecha)){           $error['Fecha']            = 'error/No ha ingresado el email';}break;
			case 'Texto':           if(empty($Texto)){           $error['Texto']            = 'error/No ha ingresado el email';}break;
			case 'Nrecorrido':      if(empty($Nrecorrido)){      $error['Nrecorrido']       = 'error/No ha ingresado el email';}break;
			case 'Nparada':         if(empty($Nparada)){         $error['Nparada']          = 'error/No ha ingresado el email';}break;
			case 'idEstado':        if(empty($idEstado)){        $error['idEstado']         = 'error/No ha ingresado el email';}break;
			
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
				if(isset($idEspiaCat) && $idEspiaCat != ''){  $a = "'".$idEspiaCat."'" ;    }else{$a ="''";}
				if(isset($idCliente) && $idCliente != ''){    $a .= ",'".$idCliente."'" ;   }else{$a .= ",''";}
				if(isset($Fecha) && $Fecha != ''){            $a .= ",'".$Fecha."'" ;       }else{$a .= ",''";}
				if(isset($Texto) && $Texto != ''){            $a .= ",'".$Texto."'" ;       }else{$a .= ",''";}
				if(isset($Nrecorrido) && $Nrecorrido != ''){  $a .= ",'".$Nrecorrido."'" ;  }else{$a .= ",''";}
				if(isset($Nparada) && $Nparada != ''){        $a .= ",'".$Nparada."'" ;     }else{$a .= ",''";}
				if(isset($idEstado) && $idEstado != ''){      $a .= ",'".$idEstado."'" ;    }else{$a .= ",''";}

				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `espia_listado` (idEspiaCat, idCliente, Fecha, Texto, Nrecorrido, Nparada, idEstado) VALUES ({$a} )";
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
				$a = "idEspiaListado='".$idEspiaListado."'" ;
				if(isset($idEspiaCat) && $idEspiaCat != ''){    $a .= ",idEspiaCat='".$idEspiaCat."'" ;}
				if(isset($idCliente) && $idCliente != ''){      $a .= ",idCliente='".$idCliente."'" ;}
				if(isset($Fecha) && $Fecha != ''){              $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Texto) && $Texto != ''){              $a .= ",Texto='".$Texto."'" ;}
				if(isset($Nrecorrido) && $Nrecorrido != ''){    $a .= ",Nrecorrido='".$Nrecorrido."'" ;}
				if(isset($Nparada) && $Nparada != ''){          $a .= ",Nparada='".$Nparada."'" ;}
				if(isset($idEstado) && $idEstado != ''){        $a .= ",idEstado='".$idEstado."'" ;}
				if(isset($body_col) && $body_col != ''){        $a .= ",body_col='".$body_col."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `espia_listado` SET ".$a." WHERE idEspiaListado = '$idEspiaListado'";
				$result = mysql_query($query, $dbConn);

				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `espia_listado` WHERE idEspiaListado = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;
		
							
/*******************************************************************************************************************/
	}
?>