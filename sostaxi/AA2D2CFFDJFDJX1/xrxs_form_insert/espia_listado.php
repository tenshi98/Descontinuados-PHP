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
	
		
		//filtro 
		if(isset($idEspiaCat) && $idEspiaCat != ''){    $a = "'".$idEspiaCat."'" ;    }else{ $a ="''"; }
		if(isset($idCliente) && $idCliente != ''){      $a .= ",'".$idCliente."'" ;   }else{ $a .= ",''"; }
		if(isset($Fecha) && $Fecha != ''){              $a .= ",'".$Fecha."'" ;       }else{ $a .= ",''"; }
		if(isset($Texto) && $Texto != ''){              $a .= ",'".$Texto."'" ;       }else{ $a .= ",''"; }
		if(isset($Nrecorrido) && $Nrecorrido != ''){    $a .= ",'".$Nrecorrido."'" ;  }else{ $a .= ",''"; }
		if(isset($Nparada) && $Nparada != ''){          $a .= ",'".$Nparada."'" ;     }else{ $a .= ",''"; }
		if(isset($idEstado) && $idEstado != ''){        $a .= ",'".$idEstado."'" ;    }else{ $a .= ",''"; }

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `espia_listado` (idEspiaCat, idCliente, Fecha, Texto, Nrecorrido, Nparada, idEstado) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>