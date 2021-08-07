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
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])&& !isset($errors[4])&& !isset($errors[5])&& !isset($errors[6]) && !isset($errors[7]) && !isset($errors[8]) && !isset($errors[9]) && !isset($errors[10]) && !isset($errors[11])  ) {

			
		//Filtro para idGrupo
        $a = "idGrupo='".$idGrupo."'" ;
		//filtro de idCliente
		if(isset($idCliente) && $idCliente != ''){ 
        	$a .= ",idCliente='".$idCliente."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de Rut
		if(isset($Rut) && $Rut != ''){ 
        	$a .= ",Rut='".$Rut."'" ;
        }
		//filtro de Parentesco
		if(isset($Parentesco) && $Parentesco != ''){ 
        	$a .= ",Parentesco='".$Parentesco."'" ;
        }
		//filtro de Condicion
		if(isset($Condicion) && $Condicion != ''){ 
        	$a .= ",Condicion='".$Condicion."'" ;
        }
		//filtro de fNacimiento
		if(isset($fNacimiento) && $fNacimiento != ''){ 
        	$a .= ",fNacimiento='".$fNacimiento."'" ;
        }
		//filtro de Ingreso
		if(isset($Ingreso) && $Ingreso != ''){ 
        	$a .= ",Ingreso='".$Ingreso."'" ;
        }
		//filtro de Actividad
		if(isset($Actividad) && $Actividad != ''){ 
        	$a .= ",Actividad='".$Actividad."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_grupo_familiar` SET ".$a." WHERE idGrupo = '$idGrupo'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>