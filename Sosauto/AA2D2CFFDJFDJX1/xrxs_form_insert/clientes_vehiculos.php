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
		//filtro de PPU
		if(isset($PPU) && $PPU != ''){ 
        	$a .= ",'".$PPU."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Marca
		if(isset($Marca) && $Marca != ''){ 
        	$a .= ",'".$Marca."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Modelo
		if(isset($Modelo) && $Modelo != ''){ 
        	$a .= ",'".$Modelo."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Tipo
		if(isset($Tipo) && $Tipo != ''){ 
        	$a .= ",'".$Tipo."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de ftransferencia
		if(isset($ftransferencia) && $ftransferencia != ''){ 
        	$a .= ",'".$ftransferencia."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Color_1
		if(isset($Color_1) && $Color_1 != ''){ 
        	$a .= ",'".$Color_1."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Color_2
		if(isset($Color_2) && $Color_2 != ''){ 
        	$a .= ",'".$Color_2."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",'".$Fecha."'" ;
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
		$query  = "INSERT INTO `clientes_vehiculos` (idCliente, PPU, Marca, Modelo, Tipo, ftransferencia, Color_1, Color_2, Fecha, N_Motor, N_Chasis, Obs) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>