<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridClientead                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['idCliente']) )        $idCliente          = $_POST['idCliente'];
	if ( !empty($_POST['idSistema']) )        $idSistema          = $_POST['idSistema'];
	if ( !empty($_POST['idEstado']) )         $idEstado           = $_POST['idEstado'];
	if ( !empty($_POST['idTipo']) )           $idTipo             = $_POST['idTipo'];
	if ( !empty($_POST['email']) )            $email              = $_POST['email'];
	if ( !empty($_POST['Nombre']) )           $Nombre 	          = $_POST['Nombre'];
	if ( !empty($_POST['Rut']) )              $Rut 	              = $_POST['Rut'];
	if ( !empty($_POST['fNacimiento']) )      $fNacimiento 	      = $_POST['fNacimiento'];
	if ( !empty($_POST['Direccion']) )        $Direccion 	      = $_POST['Direccion'];
	if ( !empty($_POST['Fono1']) )            $Fono1 	          = $_POST['Fono1'];
	if ( !empty($_POST['Fono2']) )            $Fono2 	          = $_POST['Fono2'];
	if ( !empty($_POST['idCiudad']) )         $idCiudad           = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )         $idComuna           = $_POST['idComuna'];
	if ( !empty($_POST['unique_id']) )        $unique_id          = $_POST['unique_id'];
	if ( !empty($_POST['password']) )         $password           = $_POST['password'];
	if ( !empty($_POST['fcreacion']) )        $fcreacion          = $_POST['fcreacion'];
	if ( !empty($_POST['factualizacion']) )   $factualizacion     = $_POST['factualizacion'];
	if ( !empty($_POST['IMEI']) )             $IMEI               = $_POST['IMEI'];
	if ( !empty($_POST['GSM']) )              $GSM                = $_POST['GSM'];
	if ( !empty($_POST['Latitud']) )          $Latitud            = $_POST['Latitud'];
	if ( !empty($_POST['Longitud']) )         $Longitud           = $_POST['Longitud'];


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
			case 'idCliente':         if(empty($idCliente)){         $error['idCliente']          = 'error/No ha ingresado el id';}break;
			case 'idSistema':         if(empty($idSistema)){         $error['idSistema']          = 'error/No ha seleccionado el sistema';}break;
			case 'idEstado':          if(empty($idEstado)){          $error['idEstado']           = 'error/No ha seleccionado el Estado';}break;
			case 'idTipo':            if(empty($idTipo)){            $error['idTipo']             = 'error/No ha seleccionado el tipo de cliente';}break;
			case 'email':             if(empty($email)){             $error['email']              = 'error/No ha ingresado el email';}break;
			case 'Nombre':            if(empty($Nombre)){            $error['Nombre']             = 'error/No ha ingresado el Nombre';}break;
			case 'Rut':               if(empty($Rut)){               $error['Rut']                = 'error/No ha ingresado el Rut';}break;	
			case 'fNacimiento':       if(empty($fNacimiento)){       $error['fNacimiento']        = 'error/No ha ingresado la fecha de nacimiento';}break;
			case 'Direccion':         if(empty($Direccion)){         $error['Direccion']          = 'error/No ha ingresado la cdireccion';}break;
			case 'Fono1':             if(empty($Fono1)){             $error['Fono1']              = 'error/No ha ingresado el telefono';}break;
			case 'Fono2':             if(empty($Fono2)){             $error['Fono2']              = 'error/No ha ingresado el telefono';}break;
			case 'idCiudad':          if(empty($idCiudad)){          $error['idCiudad']           = 'error/No ha seleccionado la ciudad';}break;
			case 'idComuna':          if(empty($idComuna)){          $error['idComuna']           = 'error/No ha seleccionado la comuna';}break;
			case 'unique_id':         if(empty($unique_id)){         $error['unique_id']          = 'error/No ha ingresado un id unico';}break;
			case 'password':          if(empty($password)){          $error['password']           = 'error/No ha ingresado una contraseña';}break;
			case 'fcreacion':         if(empty($fcreacion)){         $error['fcreacion']          = 'error/No ha ingresado la fecha de creacion';}break;
			case 'factualizacion':    if(empty($factualizacion)){    $error['factualizacion']     = 'error/No ha ingresado la fecha de actualizacion';}break;
			case 'IMEI':              if(empty($IMEI)){              $error['IMEI']               = 'error/No ha ingresado el imei';}break;
			case 'GSM':               if(empty($GSM)){               $error['GSM']                = 'error/No ha ingresado el gsm';}break;
			case 'Latitud':           if(empty($Latitud)){           $error['Latitud']            = 'error/No ha ingresado la latitud';}break;
			case 'Longitud':          if(empty($Longitud)){          $error['Longitud']           = 'error/No ha ingresado la longitud';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($email)){if(validaremail($email)){ }else{   $error['email']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono1)){if(validarnumero($Fono1)) {        $error['Fono1']   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Fono2)){if(validarnumero($Fono2)) {        $error['Fono2']   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Rut)){if(RutValidate($Rut)==0){            $error['Rut']     = 'error/El Rut ingresado no es valido'; }}
	
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
				$sql_usuario = mysql_query("SELECT Nombre FROM clientes_listado WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/La nombre de la persona ya existe en el sistema';}
			
			// se verifica si el rut ya existe
			if(isset($Rut)){
				$sql_email = mysql_query("SELECT Rut FROM clientes_listado WHERE Rut='".$Rut."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['Rut'] = 'error/El Rut ya existe en el sistema';}
			
			// se verifica si el correo ya existe
			if(isset($email)){
				$sql_email = mysql_query("SELECT email FROM clientes_listado WHERE email='".$email."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['email'] = 'error/El correo de ingresado ya existe en el sistema';}
			
			
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idSistema) && $idSistema != ''){                 $a  = "'".$idSistema."'" ;          }else{$a ="''";}
				if(isset($idEstado) && $idEstado != ''){                   $a .= ",'".$idEstado."'" ;          }else{$a .= ",''";}
				if(isset($idTipo) && $idTipo != ''){                       $a .= ",'".$idTipo."'" ;            }else{$a .= ",''";}
				if(isset($email) && $email != ''){                         $a .= ",'".$email."'" ;             }else{$a .= ",''";}
				if(isset($Nombre) && $Nombre != ''){                       $a .= ",'".$Nombre."'" ;            }else{$a .= ",''";}
				if(isset($Rut) && $Rut != ''){                             $a .= ",'".$Rut."'" ;               }else{$a .= ",''";}
				if(isset($fNacimiento) && $fNacimiento != ''){             $a .= ",'".$fNacimiento."'" ;       }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){                 $a .= ",'".$Direccion."'" ;         }else{$a .= ",''";}
				if(isset($Fono1) && $Fono1 != ''){                         $a .= ",'".$Fono1."'" ;             }else{$a .= ",''";}
				if(isset($Fono2) && $Fono2 != ''){                         $a .= ",'".$Fono2."'" ;             }else{$a .= ",''";}
				if(isset($idCiudad) && $idCiudad != ''){                   $a .= ",'".$idCiudad."'" ;          }else{$a .= ",''";}
				if(isset($idComuna) && $idComuna != ''){                   $a .= ",'".$idComuna."'" ;          }else{$a .= ",''";}
				if(isset($unique_id) && $unique_id != ''){                 $a .= ",'".$unique_id."'" ;         }else{$a .= ",''";}
				if(isset($password) && $password != ''){                   $a .= ",'".$password."'" ;          }else{$a .= ",''";}
				if(isset($fcreacion) && $fcreacion != ''){                 $a .= ",'".$fcreacion."'" ;         }else{$a .= ",''";}
				if(isset($factualizacion) && $factualizacion != ''){       $a .= ",'".$factualizacion."'" ;    }else{$a .= ",''";}
				if(isset($IMEI) && $IMEI != ''){                           $a .= ",'".$IMEI."'" ;              }else{$a .= ",''";}
				if(isset($GSM) && $GSM != ''){                             $a .= ",'".$GSM."'" ;               }else{$a .= ",''";}
				if(isset($Latitud) && $Latitud != ''){                     $a .= ",'".$Latitud."'" ;           }else{$a .= ",''";}
				if(isset($Longitud) && $Longitud != ''){                   $a .= ",'".$Longitud."'" ;          }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_listado` (idSistema, idEstado, idTipo, email, Nombre,Rut, fNacimiento, Direccion, Fono1, 
				Fono2, idCiudad, idComuna, unique_id, password, fcreacion, factualizacion, IMEI, GSM, Latitud, Longitud) VALUES ({$a} )";
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
				$a = "idCliente='".$idCliente."'" ;
				if(isset($idSistema) && $idSistema != ''){                 $a .= ",idSistema='".$idSistema."'" ;}
				if(isset($idEstado) && $idEstado != ''){                   $a .= ",idEstado='".$idEstado."'" ;}
				if(isset($idTipo) && $idTipo != ''){                       $a .= ",idTipo='".$idTipo."'" ;}
				if(isset($email) && $email != ''){                         $a .= ",email='".$email."'" ;}
				if(isset($Nombre) && $Nombre != ''){                       $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Rut) && $Rut != ''){                             $a .= ",Rut='".$Rut."'" ;}
				if(isset($fNacimiento) && $fNacimiento != ''){             $a .= ",fNacimiento='".$fNacimiento."'" ;}
				if(isset($Direccion) && $Direccion != ''){                 $a .= ",Direccion='".$Direccion."'" ;}
				if(isset($Fono1) && $Fono1 != ''){                         $a .= ",Fono1='".$Fono1."'" ;}
				if(isset($Fono2) && $Fono2 != ''){                         $a .= ",Fono2='".$Fono2."'" ;}
				if(isset($idCiudad) && $idCiudad!= ''){                    $a .= ",idCiudad='".$idCiudad."'" ;}
				if(isset($idComuna) && $idComuna!= ''){                    $a .= ",idComuna='".$idComuna."'" ;}
				if(isset($unique_id) && $unique_id!= ''){                  $a .= ",unique_id='".$unique_id."'" ;}
				if(isset($password) && $password!= ''){                    $a .= ",password='".$password."'" ;}
				if(isset($fcreacion) && $fcreacion!= ''){                  $a .= ",fcreacion='".$fcreacion."'" ;}
				if(isset($factualizacion) && $factualizacion!= ''){        $a .= ",factualizacion='".$factualizacion."'" ;}
				if(isset($IMEI) && $IMEI!= ''){                            $a .= ",IMEI='".$IMEI."'" ;}
				if(isset($GSM) && $GSM!= ''){                              $a .= ",GSM='".$GSM."'" ;}
				if(isset($Latitud) && $Latitud!= ''){                      $a .= ",Latitud='".$Latitud."'" ;}
				if(isset($Longitud) && $Longitud!= ''){                    $a .= ",Longitud='".$Longitud."'" ;}

				
				// inserto los datos de registro en la db
				$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '$idCliente'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	

						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `clientes_listado` WHERE idCliente = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
/*******************************************************************************************************************/
		case 'estado':	
		
			$idCliente  = $_GET['id'];
			$estado     = $_GET['estado'];
			$query  = "UPDATE clientes_listado SET idEstado = '$estado'	
			WHERE idCliente    = '$idCliente'";
			$result = mysql_query($query, $dbConn);

			header( 'Location: '.$location.'&edited=true' );
			die; 


		break;				
/*******************************************************************************************************************/
	}
?>
