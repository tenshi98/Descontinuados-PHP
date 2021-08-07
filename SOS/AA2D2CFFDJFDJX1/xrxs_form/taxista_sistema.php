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
	if ( !empty($_POST['idSistema']) )             $idSistema              = $_POST['idSistema'];
	if ( !empty($_POST['ValorPlanBase']) )         $ValorPlanBase          = $_POST['ValorPlanBase'];
	if ( !empty($_POST['NumeroCarreras']) )        $NumeroCarreras         = $_POST['NumeroCarreras'];
	if ( !empty($_POST['ValorCarrera']) )          $ValorCarrera           = $_POST['ValorCarrera'];
	if ( !empty($_POST['Terminos']) )              $Terminos               = $_POST['Terminos'];
	if ( !empty($_POST['nombre_impuesto']) )       $nombre_impuesto        = $_POST['nombre_impuesto'];
	if ( !empty($_POST['porcentaje_impuesto']) )   $porcentaje_impuesto    = $_POST['porcentaje_impuesto'];
	if ( !empty($_POST['bloqueo_taxista']) )       $bloqueo_taxista 	   = $_POST['bloqueo_taxista'];
	

	if ( !empty($_POST['idClient']) )         $idClient          = $_POST['idClient'];
	if ( !empty($_POST['table']) )            $table             = $_POST['table'];
	
	
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
			case 'idSistema':            if(empty($idSistema)){             $error['idSistema']            = 'error/No ha ingresado el id del sistema';}break;
			case 'ValorPlanBase':        if(empty($ValorPlanBase)){         $error['ValorPlanBase']        = 'error/No ha ingresado el ValorPlanBase del sistema';}break;
			case 'NumeroCarreras':       if(empty($NumeroCarreras)){        $error['NumeroCarreras']       = 'error/No ha ingresado la imagen';}break;
			case 'ValorCarrera':         if(empty($ValorCarrera)){          $error['ValorCarrera']         = 'error/No ha ingresado el email';}break;
			case 'Terminos':             if(empty($Terminos)){              $error['Terminos']             = 'error/No ha ingresado la razon social';}break;
			case 'nombre_impuesto':      if(empty($nombre_impuesto)){       $error['nombre_impuesto']      = 'error/No ha ingresado el nombre_impuesto';}break;
			case 'porcentaje_impuesto':  if(empty($porcentaje_impuesto)){   $error['porcentaje_impuesto']  = 'error/No ha ingresado la porcentaje_impuesto';}break;
			case 'bloqueo_taxista':      if(empty($bloqueo_taxista)){       $error['bloqueo_taxista']      = 'error/No ha ingresado el bloqueo_taxista';}break;
			case 'idClient':             if(empty($idClient)){              $error['idClient']             = 'error/No ha ingresado un valor';}break;
			case 'table':                if(empty($table)){                 $error['table']                = 'error/No ha ingresado un valor';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if (validarnumero($idClient)&&$table!='Terminos'&&$table!='nombre_impuesto') {
		$error['email']   = 'error/El dato ingresado no es un numero';
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
				if(isset($ValorPlanBase) && $ValorPlanBase != ''){               $a = "'".$ValorPlanBase."'" ;          }else{$a ="''";}
				if(isset($NumeroCarreras) && $NumeroCarreras != ''){             $a .= ",'".$NumeroCarreras."'" ;       }else{$a .= ",''";}
				if(isset($ValorCarrera) && $ValorCarrera != ''){                 $a .= ",'".$ValorCarrera."'" ;         }else{$a .= ",''";}
				if(isset($Terminos) && $Terminos != ''){                         $a .= ",'".$Terminos."'" ;             }else{$a .= ",''";}
				if(isset($nombre_impuesto) && $nombre_impuesto != ''){           $a .= ",'".$nombre_impuesto."'" ;      }else{$a .= ",''";}
				if(isset($porcentaje_impuesto) && $porcentaje_impuesto != ''){   $a .= ",'".$porcentaje_impuesto."'" ;  }else{$a .= ",''";}
				if(isset($bloqueo_taxista) && $bloqueo_taxista != ''){           $a .= ",'".$bloqueo_taxista."'" ;      }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `taxista_sistema` (ValorPlanBase, NumeroCarreras, ValorCarrera, Terminos, nombre_impuesto, porcentaje_impuesto, bloqueo_taxista) VALUES ({$a} )";
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
				$a = "idSistema='".$idSistema."'" ;
				if(isset($ValorPlanBase) && $ValorPlanBase != ''){               $a .= ",ValorPlanBase='".$ValorPlanBase."'" ;}
				if(isset($NumeroCarreras) && $NumeroCarreras != ''){             $a .= ",NumeroCarreras='".$NumeroCarreras."'" ;}
				if(isset($ValorCarrera) && $ValorCarrera != ''){                 $a .= ",ValorCarrera='".$ValorCarrera."'" ;}
				if(isset($Terminos) && $Terminos != ''){                         $a .= ",Terminos='".$Terminos."'" ;}
				if(isset($nombre_impuesto) && $nombre_impuesto != ''){           $a .= ",nombre_impuesto='".$nombre_impuesto."'" ;}
				if(isset($porcentaje_impuesto) && $porcentaje_impuesto != ''){   $a .= ",porcentaje_impuesto='".$porcentaje_impuesto."'" ;}
				if(isset($bloqueo_taxista) && $bloqueo_taxista != ''){           $a .= ",bloqueo_taxista='".$bloqueo_taxista."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `taxista_sistema` SET ".$a." WHERE idSistema = '$idSistema'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
/*******************************************************************************************************************/		
		case 'update_data':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				
				$query  = "UPDATE `taxista_sistema` SET {$table} = '{$idClient}' WHERE idSistema = {$idSistema} ";
				$result = mysql_query($query, $dbConn);

				header( 'Location: '.$location.'?edited=true' );
				die;
			}
		
	
		break;							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `taxista_sistema` WHERE idSistema = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>