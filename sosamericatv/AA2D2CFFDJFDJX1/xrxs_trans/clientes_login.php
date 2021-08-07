<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2])  ) { 

	// Se verifica si el usuario existe en la base de datos propia
	if ( $arrCliente = esCliente($Rut_limpio,md5($password),$dbConn) ) {
			//Verifico si el usuario esta activo o inactivo
			if($arrCliente['Estado']==1){
				// definimos las sesiones
				$_SESSION['Rut'] 	    = $arrCliente['Rut'];
				$_SESSION['password']	= $arrCliente['password'];
					
				//Almaceno la fecha del ingreso
				$fecha=fecha_actual();
				//Actualizo la tabla de los usuarios
				$sql = "UPDATE clientes_listado SET 
				Ultimo_acceso   = '".$fecha."', 
				Imei            = ".$imei.",
				Gsm             = '".$gsm."',
				Latitud         = '".$lat."',
				Longitud        = '".$lon."' 
				WHERE Rut='".$Rut_limpio."'";
				$resultado = mysql_query($sql,$dbConn);
				// si todo esta bien te redirige hacia la pagina principal
				header( 'Location: principal.php'.$w );
				die;
				
			} else {
				//Se el usuario no esta activado envia a la pantalla de bloqueo
				header( 'Location: usr_block.php'.$w );
				die;	
			}		

		//Se el usuario no existe en nuestra base de datos va a la otra y lo registra en la nuestra
		} else {
			//Creo nueva variable a partir de la variable rut para poder hacer la comparacion
			$Nuevo_Rut = str_replace("-","",$Rut_limpio);
			// busqueda de los datos de usuarios para crear.
			$query = "SELECT NOMBRE, CIDENTIDAD, DV_CEDID, SEX, DOMICILIO, fono_fijo, fono_celular, domicilio_2
			FROM `padron_electoral_CL` WHERE rut_compara = '$Nuevo_Rut'";
			$resultado = mysql_query ($query,$dbConn_2);
			$rowdata = mysql_fetch_assoc ($resultado);
			$número_filas = mysql_num_rows($resultado);
			if($número_filas==1){
				//obtengo la fecha actual
				$fecha=fecha_actual();
				//filtro de fcreacion
				$a = "'".$fecha."'" ;
				//filtro de password
				$a .= ",'".md5($rowdata['CIDENTIDAD'].'-'.$rowdata['DV_CEDID'])."'" ;
				//filtro de Estado
				$a .= ",'1'" ;
				//filtro de email
				$a .= ",''" ;
				//filtro de Nombre
				$a .= ",'".$rowdata['NOMBRE']."'" ;
				//filtro de Rut
				$a .= ",'".$rowdata['CIDENTIDAD'].'-'.$rowdata['DV_CEDID']."'" ;
				//filtro de Sexo
				if($rowdata['SEX']=='VAR'){
				$a .= ",'M'" ;	
				}elseif($rowdata['SEX']=='MUJ'){
				$a .= ",'F'" ;	
				}else{
				$a .= ",'M'" ;	
				}
				//filtro de fNacimiento
				$a .= ",''" ;
				//filtro de Direccion
				if($rowdata['domicilio_2']!=''){
				$a .= ",'".$rowdata['domicilio_2']."'" ;	
				}else{
				$a .= ",'".$rowdata['DOMICILIO']."'" ;	
				}
				//filtro de Fono1
				$a .= ",'".$rowdata['fono_fijo']."'" ;
				//filtro de Fono2
				$a .= ",'".$rowdata['fono_celular']."'" ;
				//filtro de Pais
				$a .= ",'Chile'" ;
				//filtro de primer_ingreso
				$a .= ",'1'" ;
				//filtro de IMEI
				if(isset($_GET['IMEI']))     {
				$a .=",'".$_GET['IMEI']."'";
				}else{
				$a .=",''";
				}
				//filtro de GSM
				if(isset($_GET['GSM']))      {
				$a .=",'".$_GET['GSM']."'";
				}else{
				$a .=",''";
				}
				//filtro de Latitud
				if(isset($_GET['latitud']))  {
				$a .=",'".$_GET['latitud']."'";
				}else{
				$a .=",''";
				}
				//filtro de Longitud
				if(isset($_GET['longitud'])) {
				$a .=",'".$_GET['longitud']."'";
				}else{
				$a .=",''";
				}
				//filtro de  Radio
				$a .=",'1'";
				//filtro de  Alarma
				$a .=",'Si'";
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_listado` (fcreacion, password, Estado, email, Nombre, Rut, Sexo, fNacimiento, Direccion, Fono1, Fono2, Pais, primer_ingreso, Imei, Gsm, Latitud, Longitud, Radio, Alarma) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
				//recibo el último id generado por mi sesion
    			$ultimo_id = mysql_insert_id($dbConn);
				
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//Actualizamos los datos del padron
				//filtro de rut_compara
				$b = "rut_compara='".$Nuevo_Rut."'" ;
				//filtro de  domicilio_2
				if($rowdata['domicilio_2']!=''){
				$b .= ",domicilio_2='".$rowdata['domicilio_2']."'" ;	
				}else{
				$b .= ",domicilio_2='".$rowdata['DOMICILIO']."'" ;	
				}
				//filtro de  comuna_2
				$b .=",comuna_2=''";
				//filtro de  tipo_domicilio2
				$b .=",tipo_domicilio2='RES'";
				//filtro de  correo
				$b .=",correo=''";				
				//Se actualizan los datos del padron
				$query  = "UPDATE `padron_electoral_CL` SET ".$b." WHERE rut_compara = '$Nuevo_Rut'";
				$result = mysql_query($query, $dbConn_2);
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//Creo al usuario dentro de la tabla de preferencias 
				$query ="INSERT INTO preferencias (rut_compara,item,categoria,subcategoria) values ('$Nuevo_Rut','sosauto',1,17)";
				$result=mysql_query($query,$dbConn_2);

				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//Verifico si la persona tiene algun vehiculo dentro de la base de datos
				// Se trae un listado con todos los vehiculos de los usuarios
				$arrVehiculos = array();
				$query = "SELECT PPU, MARCA, MODELO, TIPO, FEC_ULT_TRANS, COLOR, COLOR_2, ANO, NRO_MOTOR, NRO_CHASIS
				FROM `parque_automotriz`
				WHERE rut_comparador='$Nuevo_Rut' ";
				$resultado = mysql_query ($query, $dbConn_2);
				while ( $row = mysql_fetch_assoc ($resultado)) {
				array_push( $arrVehiculos,$row );
				}
				//Recorro el array anterior y guardo los vehiculos en caso de ser necesario
				foreach ($arrVehiculos as $vehiculos) { 
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_vehiculos` (idCliente, PPU, Marca, Modelo, Tipo, ftransferencia, Color_1, Color_2, Fecha, N_Motor, N_Chasis) VALUES (
				'{$ultimo_id}',
				'{$vehiculos['PPU']}',
				'{$vehiculos['MARCA']}',
				'{$vehiculos['MODELO']}',
				'{$vehiculos['TIPO']}',
				'{$vehiculos['FEC_ULT_TRANS']}',
				'{$vehiculos['COLOR']}',
				'{$vehiculos['COLOR_2']}',
				'{$vehiculos['ANO']}',
				'{$vehiculos['NRO_MOTOR']}',
				'{$vehiculos['NRO_CHASIS']}'
				 )";
				$result = mysql_query($query, $dbConn);

				}
				// si todo esta bien te redirige hacia la pagina principal
				header( 'Location: principal.php'.$w );
				die;
				
			}else{
				// Si no encuentra a la persona en la base secundaria reenvia a la pagina de registro
				header( 'Location: usr_register.php'.$w );
				die;
				
			}
	}
} ?>