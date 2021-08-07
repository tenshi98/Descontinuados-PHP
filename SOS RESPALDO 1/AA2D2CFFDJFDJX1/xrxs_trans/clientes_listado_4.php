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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])  ) { 
	
		
		//filtro de NOMBRE
		if(isset($Nombre) && $Nombre != ''){ 
        	$a = "'".$Nombre."'" ;
		}else{
			$a ="''";
        }
		// Dividir rut
		list($numero, $divisor) = explode(":", $Rut);
		//filtro de CIDENTIDAD
        	$a .= ",'".$numero."'" ;
		//filtro de DV_CEDID	
			$a .= ",'".$divisor."'" ;
		//filtro de SEX
		if($Sexo=='M'){
			$a .= ",'VAR'" ;	
		}elseif($Sexo=='F'){
			$a .= ",'MUJ'" ;	
		}else{
			$a .= ",'VAR'" ;	
		}
		//filtro de DOMICILIO
		if(isset($Direccion) && $Direccion != ''){ 
        	$a .= ",'".$Direccion."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de fono_fijo
		if(isset($Fono1) && $Fono1 != ''){ 
        	$a .= ",'".$Fono1."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de fono_celular
		if(isset($Fono2) && $Fono2 != ''){ 
        	$a .= ",'".$Fono2."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de GLOSA_REGION
		if(isset($idCiudad) && $idCiudad != ''){ 
        	$query = "SELECT   Nombre
			FROM `mnt_ubicacion_ciudad`
			WHERE idCiudad= '{$idCiudad}'";
			$resultado1 = mysql_query ($query, $dbConn);
			$row_ciudad = mysql_fetch_assoc ($resultado1);
        	$a .= ",'".$row_ciudad['Nombre']."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de domicilio_2
		if(isset($Direccion) && $Direccion != ''){ 
        	$a .= ",'".$Direccion."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de comuna_2
		if(isset($idComuna) && $idComuna != ''){ 
			$query = "SELECT   Nombre
			FROM `mnt_ubicacion_comunas`
			WHERE idComuna= '{$idComuna}'";
			$resultado1 = mysql_query ($query, $dbConn);
			$row_comuna = mysql_fetch_assoc ($resultado1);
        	$a .= ",'".$row_comuna['Nombre']."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de tipo_domicilio2
			$a .= ",'RES'";
		//filtro de correo
		if(isset($email) && $email != ''){ 
        	$a .= ",'".$email."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de rut_compara
		if(isset($Rut) && $Rut != ''){ 
        	$a .= ",'".$numero.$divisor."'" ;
		}else{
			$a .= ",''";
        }
			
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `padron_electoral_CL` ( NOMBRE, CIDENTIDAD, DV_CEDID, SEX, DOMICILIO, fono_fijo, fono_celular, GLOSA_REGION, domicilio_2, comuna_2, tipo_domicilio2, correo, rut_compara) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn_2);

}
?>