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
	if ( !empty($_POST['idZona']) )      $idZona       = $_POST['idZona'];
	if ( !empty($_POST['idSistema']) )   $idSistema    = $_POST['idSistema'];
	if ( !empty($_POST['Nombre']) )      $Nombre       = $_POST['Nombre'];
	if ( !empty($_POST['ColorCode']) )   $ColorCode    = $_POST['ColorCode'];

	
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
			case 'idZona':         if(empty($idZona)){          $error['idZona']         = 'error/No ha ingresado el id';}break;
			case 'idSistema':      if(empty($idSistema)){       $error['idSistema']      = 'error/No ha seleccionado el sistema';}break;
			case 'Nombre':         if(empty($Nombre)){          $error['Nombre']         = 'error/No ha ingresado el nombre';}break;
			case 'ColorCode':      if(empty($ColorCode)){       $error['ColorCode']      = 'error/No ha seleccionado el color';}break;
			
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
			if(isset($Nombre)){
				$sql_usuario = mysql_query("SELECT Nombre FROM seguridad_zonas_listado WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/La nombre ya existe en el sistema';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idSistema) && $idSistema != ''){     $a = "'".$idSistema."'" ;    }else{$a ="''";}
				if(isset($Nombre) && $Nombre != ''){           $a .= ",'".$Nombre."'" ;     }else{$a .= ",''";}
				if(isset($ColorCode) && $ColorCode != ''){     $a .= ",'".$ColorCode."'" ;   }else{$a .= ",''";}

				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `seguridad_zonas_listado` (idSistema, Nombre, ColorCode) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'?created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idZona='".$idZona."'" ;
				if(isset($idSistema) && $idSistema != ''){   $a .= ",idSistema='".$idSistema."'" ;}
				if(isset($Nombre) && $Nombre != ''){         $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($ColorCode) && $ColorCode != ''){   $a .= ",ColorCode='".$ColorCode."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `seguridad_zonas_listado` SET ".$a." WHERE idZona = '$idZona'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'?edited=true' );
				die;
			}
		
	
		break;	
							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `seguridad_zonas_listado` WHERE idZona = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'?deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>
