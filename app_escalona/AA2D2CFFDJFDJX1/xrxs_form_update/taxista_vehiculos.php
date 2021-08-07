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
		//filtro de idPropietario
		if(isset($idPropietario) && $idPropietario != ''){ 
        	$a .= ",idPropietario='".$idPropietario."'" ;
        }
		//filtro de PPU
		if(isset($PPU) && $PPU != ''){ 
        	$a .= ",PPU='".$PPU."'" ;
        }
		//filtro de idMarca
		if(isset($idMarca) && $idMarca != ''){ 
        	$a .= ",idMarca='".$idMarca."'" ;
        }
		//filtro de idModelo
		if(isset($idModelo) && $idModelo != ''){ 
        	$a .= ",idModelo='".$idModelo."'" ;
        }
		//filtro de idTransmision
		if(isset($idTransmision) && $idTransmision != ''){ 
        	$a .= ",idTransmision='".$idTransmision."'" ;
        }
		//filtro de fTransferencia
		if(isset($fTransferencia) && $fTransferencia != ''){ 
        	$a .= ",fTransferencia='".$fTransferencia."'" ;
        }
		//filtro de idColorV_1
		if(isset($idColorV_1) && $idColorV_1 != ''){ 
        	$a .= ",idColorV_1='".$idColorV_1."'" ;
        }
		//filtro de idColorV_2
		if(isset($idColorV_2) && $idColorV_2 != ''){ 
        	$a .= ",idColorV_2='".$idColorV_2."'" ;
        }
		//filtro de fFabricacion
		if(isset($fFabricacion) && $fFabricacion != ''){ 
        	$a .= ",fFabricacion='".$fFabricacion."'" ;
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
		$query  = "UPDATE `taxista_vehiculos` SET ".$a." WHERE idVehiculo = '$idVehiculo'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>