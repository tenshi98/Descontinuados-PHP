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
	
		
		//filtro de idCliente
		if(isset($idCliente) && $idCliente != ''){ 
        	$a = "'".$idCliente."'" ;
		}else{
			$a ="''";
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",'".$Nombre."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Rut
		if(isset($Rut) && $Rut != ''){ 
        	$a .= ",'".$Rut."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Parentesco
		if(isset($Parentesco) && $Parentesco != ''){ 
        	$a .= ",'".$Parentesco."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Condicion
		if(isset($Condicion) && $Condicion != ''){ 
        	$a .= ",'".$Condicion."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de fNacimiento
		if(isset($fNacimiento) && $fNacimiento != ''){ 
        	$a .= ",'".$fNacimiento."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Ingreso
		if(isset($Ingreso) && $Ingreso != ''){ 
        	$a .= ",'".$Ingreso."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Actividad
		if(isset($Actividad) && $Actividad != ''){ 
        	$a .= ",'".$Actividad."'" ;
		}else{
			$a .= ",''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_grupo_familiar` (idCliente, Nombre, Rut, Parentesco, Condicion, fNacimiento, Ingreso, Actividad) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>