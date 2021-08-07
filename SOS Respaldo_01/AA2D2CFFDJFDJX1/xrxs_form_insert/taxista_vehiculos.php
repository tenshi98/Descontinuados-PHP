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
	
		
		//filtro de idPropietario
		if(isset($idPropietario) && $idPropietario != ''){ 
        	$a = "'".$idPropietario."'" ;
		}else{
			$a ="''";
        }
		//filtro de PPU
		if(isset($PPU) && $PPU != ''){ 
        	$a .= ",'".$PPU."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idMarca
		if(isset($idMarca) && $idMarca != ''){ 
        	$a .= ",'".$idMarca."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idModelo
		if(isset($idModelo) && $idModelo != ''){ 
        	$a .= ",'".$idModelo."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idTransmision
		if(isset($idTransmision) && $idTransmision != ''){ 
        	$a .= ",'".$idTransmision."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de fTransferencia
		if(isset($fTransferencia) && $fTransferencia != ''){ 
        	$a .= ",'".$fTransferencia."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idColorV_1
		if(isset($idColorV_1) && $idColorV_1 != ''){ 
        	$a .= ",'".$idColorV_1."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idColorV_2
		if(isset($idColorV_2) && $idColorV_2 != ''){ 
        	$a .= ",'".$idColorV_2."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de fFabricacion
		if(isset($fFabricacion) && $fFabricacion != ''){ 
        	$a .= ",'".$fFabricacion."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de N_Motor
		if(isset($N_Motor) && $N_Motor != ''){ 
        	$a .= ",'".$N_Motor."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de N_Chasis
		if(isset($N_Chasis) && $N_Chasis != ''){ 
        	$a .= ",'".$N_Chasis."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Obs
		if(isset($Obs) && $Obs != ''){ 
        	$a .= ",'".$Obs."'" ;
		}else{
			$a .= ",''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `taxista_vehiculos` (idPropietario, PPU, idMarca, idModelo, idTransmision, fTransferencia, idColorV_1, idColorV_2, fFabricacion, N_Motor, N_Chasis, Obs) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>