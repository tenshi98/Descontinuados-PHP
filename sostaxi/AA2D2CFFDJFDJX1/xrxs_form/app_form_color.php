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
	if ( !empty($_POST['idFormColor']) )    $idFormColor  = $_POST['idFormColor'];
	if ( !empty($_POST['Nombre']) )         $Nombre       = $_POST['Nombre'];
	if ( !empty($_POST['Codigo']) )         $Codigo       = $_POST['Codigo'];
	if ( !empty($_POST['CSS']) )            $CSS          = $_POST['CSS'];
	
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
			case 'idFormColor':   if(empty($idFormColor)){  $error['idFormColor']   = 'error/No ha ingresado el id del sistema';}break;
			case 'Nombre':        if(empty($Nombre)){       $error['Nombre']        = 'error/No ha ingresado el Nombre del sistema';}break;
			case 'Codigo':        if(empty($Codigo)){       $error['Codigo']        = 'error/No ha ingresado la imagen';}break;
			case 'CSS':           if(empty($CSS)){          $error['CSS']           = 'error/No ha ingresado el email';}break;
	
		}
	}
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			//Verifico otros datos
			
			//Se verifica si el dato existe
			if(isset($Nombre)){
				$sql_nombre = mysql_query("SELECT Nombre FROM app_form_color WHERE Nombre='".$Nombre."'  "); 
				$n1 = mysql_num_rows($sql_nombre);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El nombre del color ya existe';}
			
			//Se verifica si el dato existe
			if(isset($Codigo)){
				$sql_codigo = mysql_query("SELECT Codigo FROM app_form_color WHERE Codigo='".$Codigo."'  ");
				$n1 = mysql_num_rows($sql_codigo);
			} else {$n1=0;}
			if($n1 > 0) {$error['Codigo'] = 'error/El codigo del color ya existe';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Nombre) && $Nombre != ''){   $a = "'".$Nombre."'" ;    }else{$a ="''";}
				if(isset($Codigo) && $Codigo != ''){   $a .= ",'".$Codigo."'" ;  }else{$a .= ",''";}
				if(isset($CSS) && $CSS != ''){         $a .= ",'".$CSS."'" ;     }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `app_form_color` (Nombre, Codigo, CSS) VALUES ({$a} )";
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
				$a = "idFormColor='".$idFormColor."'" ;
				if(isset($Nombre) && $Nombre != ''){     $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Codigo) && $Codigo != ''){     $a .= ",Codigo='".$Codigo."'" ;}
				if(isset($CSS) && $CSS != ''){           $a .= ",CSS='".$CSS."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `app_form_color` SET ".$a." WHERE idFormColor = '$idFormColor'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `app_form_color` WHERE idFormColor = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
							
/*******************************************************************************************************************/
	}
?>