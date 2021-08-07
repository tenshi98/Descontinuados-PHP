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
		//filtro de Fono
		if(isset($Fono) && $Fono != ''){ 
        	$a .= ",'".$Fono."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Email
		if(isset($Email) && $Email != ''){ 
        	$a .= ",'".$Email."'" ;
		}else{
			$a .= ",''";
        }
		
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_contacto_empresas` (idCliente, Nombre, Fono, Email) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>