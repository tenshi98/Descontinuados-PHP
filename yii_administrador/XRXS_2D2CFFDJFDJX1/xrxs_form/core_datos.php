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
	if ( !empty($_POST['id_Datos']) )         $id_Datos          = $_POST['id_Datos'];
	if ( !empty($_POST['Nombre']) )           $Nombre            = $_POST['Nombre'];
	if ( !empty($_POST['email_principal']) )  $email_principal   = $_POST['email_principal'];
	if ( !empty($_POST['Rut']) )              $Rut               = $_POST['Rut'];
	if ( !empty($_POST['Direccion']) )        $Direccion         = $_POST['Direccion'];
	if ( !empty($_POST['Fono']) )             $Fono              = $_POST['Fono'];
	if ( !empty($_POST['Ciudad']) )           $Ciudad 	         = $_POST['Ciudad'];
	if ( !empty($_POST['Comuna']) )           $Comuna 	         = $_POST['Comuna'];
	
	
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
			case 'id_Datos':        if(empty($id_Datos)){        $error['id_Datos']         = 'error/No ha ingresado el id del sistema';}break;
			case 'Nombre':          if(empty($Nombre)){          $error['Nombre']           = 'error/No ha ingresado el nombre dela empresa';}break;
			case 'email_principal': if(empty($email_principal)){ $error['email_principal']  = 'error/No ha ingresado el email';}break;
			case 'Rut':             if(empty($Rut)){             $error['Rut']              = 'error/No ha ingresado el Rut';}break;
			case 'Direccion':       if(empty($Direccion)){       $error['Direccion']        = 'error/No ha ingresado la direccion';}break;
			case 'Fono':            if(empty($Fono)){            $error['Fono']             = 'error/No ha ingresado el fono';}break;
			case 'Ciudad':          if(empty($Ciudad)){          $error['Ciudad']           = 'error/No ha ingresado la ciudad';}break;
			case 'Comuna':          if(empty($Comuna)){          $error['Comuna']           = 'error/No ha ingresado la comuna';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($email)){if(validaremail($email)){ }else{   $error['email']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono)){if (validarnumero($Fono)) {         $error['Fono']	   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Rut)){if(RutValidate($Rut)==0){            $error['Rut']     = 'error/El Rut ingresado no es valido'; }}
	
	
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {

/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "id_Datos='".$id_Datos."'" ;
				if(isset($Nombre) && $Nombre != ''){                    $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($email_principal) && $email_principal != ''){  $a .= ",email_principal='".$email_principal."'" ;}
				if(isset($Rut) && $Rut != ''){                          $a .= ",Rut='".$Rut."'" ;}
				if(isset($Direccion) && $Direccion != ''){              $a .= ",Direccion='".$Direccion."'" ;}
				if(isset($Fono) && $Fono != ''){                        $a .= ",Fono='".$Fono."'" ;}
				if(isset($Ciudad) && $Ciudad != ''){                    $a .= ",Ciudad='".$Ciudad."'" ;}
				if(isset($Comuna) && $Comuna != ''){                    $a .= ",Comuna='".$Comuna."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `core_datos` SET ".$a." WHERE id_Datos = '$id_Datos'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'?edited=true' );
				die;
			}
		
	
		break;	
/*******************************************************************************************************************/		
		case 'img_add':			
		
		if ($_FILES["imgLogo"]["error"] > 0){	
			$error['img_add'] = 'error/Ha ocurrido un error';	
		} else {
		  //Se verifican las extensiones de los archivos
		  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
		  //Se verifica que el archivo subido no exceda los 100 kb
		  $limite_kb = 1000;
		  //Sufijo
		  $sufijo = 'logos_';
		  
		  if (in_array($_FILES['imgLogo']['type'], $permitidos) && $_FILES['imgLogo']['size'] <= $limite_kb * 1024){
			//Se especifica carpeta de destino
			$ruta = "img_upload/".$sufijo.$_FILES['imgLogo']['name'];
			//Se verifica que el archivo un archivo con el mismo nombre no existe
			if (!file_exists($ruta)){
			  //Se mueve el archivo a la carpeta previamente configurada
			  $resultado = @move_uploaded_file($_FILES["imgLogo"]["tmp_name"], $ruta);
			  if ($resultado){
				
				$a = "idSistema='".$idSistema."'" ;
				$a .= ",imgLogo='".$sufijo.$_FILES['imgLogo']['name']."'" ;
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `core_sistemas` SET ".$a." WHERE idSistema = '$idSistema'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&img_id='.$idSistema );
				die;
				
			  } else {
				$error['img_add'] = 'error/Ocurrio un error al mover el archivo';
			  }
			} else {
			  $error['img_add'] = 'error/El archivo '.$_FILES['imgLogo']['name'].' ya existe';
			}
		  } else {
			$error['img_add'] = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido';
		  }
		}


		break;			
				
/*******************************************************************************************************************/




	
	
	}
?>