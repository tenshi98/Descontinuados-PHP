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
	
		
		// Obtengo el rut comparador
		$Nuevo_Rut = str_replace("-","",$Rut);
		
		//filtro de rut_compara
			$b = "rut_compara='".$Nuevo_Rut."'" ;
		//filtro de  domicilio_2
		if(isset($Direccion) && $Direccion != ''){ 
			$b .= ",domicilio_2='".$Direccion."'" ;	
		}
		//filtro de comuna_2
		if(isset($Comuna) && $Comuna != ''){ 
			$query = "SELECT   Nombre
			FROM `mnt_ubicacion_comunas`
			WHERE idComuna= '{$Comuna}'";
			$resultado1 = mysql_query ($query, $dbConn);
			$row_comuna = mysql_fetch_assoc ($resultado1);
        	$b .=",comuna_2='".$row_comuna['Nombre']."'" ;
		}
		//filtro de  tipo_domicilio2
			$b .=",tipo_domicilio2='RES'";
		//filtro de correo
		if(isset($email) && $email != ''){ 
        	$b .= ",correo='".$email."'" ;
        }				
		//Se actualizan los datos del padron
		$query  = "UPDATE `padron_electoral_CL` SET ".$b." WHERE rut_compara = '$Nuevo_Rut'";
		$result = mysql_query($query, $dbConn_2);

}
?>