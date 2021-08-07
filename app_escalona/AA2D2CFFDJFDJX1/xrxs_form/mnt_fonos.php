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
	if ( !empty($_POST['idFono']) )   $idFono   = $_POST['idFono'];
	if ( !empty($_POST['Nombre']) )   $Nombre   = $_POST['Nombre'];
	if ( !empty($_POST['Fono']) )     $Fono     = $_POST['Fono'];
	
	
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
			case 'idFono':  if(empty($idFono)){  $error['idFono']   = 'error/No ha ingresado el id del sistema';}break;
			case 'Nombre':  if(empty($Nombre)){  $error['Nombre']   = 'error/No ha ingresado el nombre del sistema';}break;
			case 'Fono':    if(empty($Fono)){    $error['Fono']     = 'error/No ha ingresado la imagen';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($Fono)){if (validarnumero($Fono)) {         $error['Fono']	   = 'error/Ingrese un numero telefonico valido'; }}

/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			//Verifico otros datos
			
			//Se verifica si el usuario existe
			if(isset($Nombre)){
				$sql_usuario = mysql_query("SELECT Nombre FROM mnt_fonos WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El sistema ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($Fono)){
				$sql_email = mysql_query("SELECT Fono FROM mnt_fonos WHERE Fono='".$Fono."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['Fono'] = 'error/El Fono ya esta en uso';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Nombre) && $Nombre != ''){ $a = "'".$Nombre."'" ;  }else{$a ="''";}
				if(isset($Fono) && $Fono != ''){     $a .= ",'".$Fono."'" ;  }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `mnt_fonos` (Nombre, Fono) VALUES ({$a} )";
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
				$a = "idFono='".$idFono."'" ;
				if(isset($Nombre) && $Nombre != ''){    $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Fono) && $Fono != ''){        $a .= ",Fono='".$Fono."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `mnt_fonos` SET ".$a." WHERE idFono = '$idFono'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `mnt_fonos` WHERE idFono = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>