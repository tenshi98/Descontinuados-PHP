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
		
		//Creo las variables
		//filtro de idEncargado
		if(isset($_GET["idEncargado"]) && $_GET["idEncargado"] != ''){ 
        	$a = "'".$_GET["idEncargado"]."'" ;
		}else{
			$a ="''";
        }
		//filtro de idTaxista
		if(isset($_GET["idTaxista"]) && $_GET["idTaxista"] != ''){ 
        	$a .= ",'".$_GET["idTaxista"]."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Monto 
		if(isset($_GET["Monto"]) && $_GET["Monto"] != ''){ 
        	$a .= ",'".$_GET["Monto"]."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de EstadoPago 
		if(isset($_GET["EstadoPago"]) && $_GET["EstadoPago"] != ''){ 
        	$a .= ",'".$_GET["EstadoPago"]."'" ;
		}else{
			$a .= ",''";
        }
		
		//filtro de FechaBloqueo 
		if(isset($_GET["FechaBloqueo"]) && $_GET["FechaBloqueo"] != ''){ 
        	$a .= ",'".$_GET["FechaBloqueo"]."'" ;
		}else{
			$a .= ",''";
        }
		
		// Inserto los datos en la tabla de bloqueo
		$query  = "INSERT INTO `taxista_bloqueos` (idEncargado, idTaxista, Monto, EstadoPago, FechaBloqueo) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
		//Cambio el estado del usuario bloqueado
		//Filtro para idCliente
        $a = "idCliente='".$_GET["idTaxista"]."'" ;
		$a .= ",Estado=21" ;
      
		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '{$_GET['idTaxista']}'";
		$result = mysql_query($query, $dbConn);
	
		header( 'Location: '.$location );
		die;



?>