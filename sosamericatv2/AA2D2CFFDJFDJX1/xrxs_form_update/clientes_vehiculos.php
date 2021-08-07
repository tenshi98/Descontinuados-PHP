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

			
		//Filtro para idVehiculo
        $a = "idVehiculo='".$idVehiculo."'" ;
		//filtro de idCliente
		if(isset($idCliente) && $idCliente != ''){ 
        	$a .= ",idCliente='".$idCliente."'" ;
        }
		//filtro de PPU
		if(isset($PPU) && $PPU != ''){ 
        	$a .= ",PPU='".$PPU."'" ;
        }
		//filtro de Marca
		if(isset($Marca) && $Marca != ''){ 
        	$a .= ",Marca='".$Marca."'" ;
        }
		//filtro de Modelo
		if(isset($Modelo) && $Modelo != ''){ 
        	$a .= ",Modelo='".$Modelo."'" ;
        }
		//filtro de Tipo
		if(isset($Tipo) && $Tipo != ''){ 
        	$a .= ",Tipo='".$Tipo."'" ;
        }
		//filtro de ftransferencia
		if(isset($ftransferencia) && $ftransferencia != ''){ 
        	$a .= ",ftransferencia='".$ftransferencia."'" ;
        }
		//filtro de Color_1
		if(isset($Color_1) && $Color_1 != ''){ 
        	$a .= ",Color_1='".$Color_1."'" ;
        }
		//filtro de Color_2
		if(isset($Color_2) && $Color_2 != ''){ 
        	$a .= ",Color_2='".$Color_2."'" ;
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",Fecha='".$Fecha."'" ;
        }
		//filtro de N_Motor
		if(isset($N_Motor) && $N_Motor != ''){ 
        	$a .= ",N_Motor='".$N_Motor."'" ;
        }
		//filtro de N_Chasis
		if(isset($N_Chasis) && $N_Chasis != ''){ 
        	$a .= ",N_Chasis='".$N_Chasis."'" ;
        }
		//filtro de Obs
		if(isset($Obs) && $Obs != ''){ 
        	$a .= ",Obs='".$Obs."'" ;
        }
		

		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_vehiculos` SET ".$a." WHERE idVehiculo = '$idVehiculo'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>