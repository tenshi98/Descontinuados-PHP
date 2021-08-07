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
	if ( !empty($_POST['idBloqueo']) )     $idBloqueo      = $_POST['idBloqueo'];
	if ( !empty($_POST['idEncargado']) )   $idEncargado    = $_POST['idEncargado'];
	if ( !empty($_POST['idTaxista']) )     $idTaxista      = $_POST['idTaxista'];
	if ( !empty($_POST['Semana']) )        $Semana         = $_POST['Semana'];
	if ( !empty($_POST['Ano']) )           $Ano            = $_POST['Ano'];
	if ( !empty($_POST['FechaPago']) )     $FechaPago      = $_POST['FechaPago'];
	if ( !empty($_POST['idTipoPago']) )    $idTipoPago     = $_POST['idTipoPago'];
	if ( !empty($_POST['NDoc']) )          $NDoc 	       = $_POST['NDoc'];
	if ( !empty($_POST['Monto']) )         $Monto          = $_POST['Monto'];
	if ( !empty($_POST['EstadoPago']) )    $EstadoPago     = $_POST['EstadoPago'];
	if ( !empty($_POST['FechaBloqueo']) )  $FechaBloqueo   = $_POST['FechaBloqueo'];
	if ( !empty($_POST['idDocumento']) )   $idDocumento    = $_POST['idDocumento'];
	
	
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
			case 'idBloqueo':    if(empty($idBloqueo)){     $error['idBloqueo']      = 'error/No ha ingresado el id del sistema';}break;
			case 'idEncargado':  if(empty($idEncargado)){   $error['idEncargado']    = 'error/No ha ingresado el idEncargado del sistema';}break;
			case 'idTaxista':    if(empty($idTaxista)){     $error['idTaxista']      = 'error/No ha ingresado la imagen';}break;
			case 'Semana':       if(empty($Semana)){        $error['Semana']         = 'error/No ha ingresado el email';}break;
			case 'Ano':          if(empty($Ano)){           $error['Ano']            = 'error/No ha ingresado la razon social';}break;
			case 'FechaPago':    if(empty($FechaPago)){     $error['FechaPago']      = 'error/No ha ingresado el FechaPago';}break;
			case 'idTipoPago':   if(empty($idTipoPago)){    $error['idTipoPago']     = 'error/No ha ingresado la idTipoPago';}break;
			case 'NDoc':         if(empty($NDoc)){          $error['NDoc']           = 'error/No ha ingresado el NDoc';}break;
			case 'Monto':        if(empty($Monto)){         $error['Monto']          = 'error/No ha ingresado el Monto';}break;
			case 'EstadoPago':   if(empty($EstadoPago)){    $error['EstadoPago']     = 'error/No ha ingresado la EstadoPago';}break;
			case 'FechaBloqueo': if(empty($FechaBloqueo)){  $error['FechaBloqueo']   = 'error/No ha ingresado el FechaBloqueo';}break;	
			case 'idDocumento':  if(empty($idDocumento)){   $error['idDocumento']    = 'error/No ha ingresado la carpeta de imagenes';}break;
			
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
				if(isset($idEncargado) && $idEncargado != ''){      $a = "'".$idEncargado."'" ;       }else{$a ="''";}
				if(isset($idTaxista) && $idTaxista != ''){          $a .= ",'".$idTaxista."'" ;       }else{$a .= ",''";}
				if(isset($Semana) && $Semana != ''){                $a .= ",'".$Semana."'" ;          }else{$a .= ",''";}
				if(isset($Ano) && $Ano != ''){                      $a .= ",'".$Ano."'" ;             }else{$a .= ",''";}
				if(isset($FechaPago) && $FechaPago != ''){          $a .= ",'".$FechaPago."'" ;       }else{$a .= ",''";}
				if(isset($idTipoPago) && $idTipoPago != ''){        $a .= ",'".$idTipoPago."'" ;      }else{$a .= ",''";}
				if(isset($NDoc) && $NDoc != ''){                    $a .= ",'".$NDoc."'" ;            }else{$a .= ",''";}
				if(isset($Monto) && $Monto != ''){                  $a .= ",'".$Monto."'" ;           }else{$a .= ",''";}
				if(isset($EstadoPago) && $EstadoPago != ''){        $a .= ",'".$EstadoPago."'" ;      }else{$a .= ",''";}
				if(isset($FechaBloqueo) && $FechaBloqueo != ''){    $a .= ",'".$FechaBloqueo."'" ;    }else{$a .= ",''";}
				if(isset($idDocumento) && $idDocumento != ''){      $a .= ",'".$idDocumento."'" ;     }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `taxista_bloqueos` (idEncargado, idTaxista, Semana, Ano, FechaPago, idTipoPago, NDoc, Monto, EstadoPago, FechaBloqueo, idDocumento) VALUES ({$a} )";
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
				$a = "idBloqueo='".$idBloqueo."'" ;
				if(isset($idEncargado) && $idEncargado != ''){    $a .= ",idEncargado='".$idEncargado."'" ;}
				if(isset($idTaxista) && $idTaxista != ''){        $a .= ",idTaxista='".$idTaxista."'" ;}
				if(isset($Semana) && $Semana != ''){              $a .= ",Semana='".$Semana."'" ;}
				if(isset($Ano) && $Ano != ''){                    $a .= ",Ano='".$Ano."'" ;}
				if(isset($FechaPago) && $FechaPago != ''){        $a .= ",FechaPago='".$FechaPago."'" ;}
				if(isset($idTipoPago) && $idTipoPago != ''){      $a .= ",idTipoPago='".$idTipoPago."'" ;}
				if(isset($NDoc) && $NDoc != ''){                  $a .= ",NDoc='".$NDoc."'" ;}
				if(isset($Monto) && $Monto != ''){                $a .= ",Monto='".$Monto."'" ;}
				if(isset($EstadoPago) && $EstadoPago != ''){      $a .= ",EstadoPago='".$EstadoPago."'" ;}
				if(isset($FechaBloqueo) && $FechaBloqueo != ''){  $a .= ",FechaBloqueo='".$FechaBloqueo."'" ;}
				if(isset($idDocumento) && $idDocumento != ''){    $a .= ",idDocumento='".$idDocumento."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `taxista_bloqueos` SET ".$a." WHERE idBloqueo = '$idBloqueo'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `taxista_bloqueos` WHERE idBloqueo = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>