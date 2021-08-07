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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])&& empty($errors[5])&& empty($errors[6])  ) { 
	
		//Filtro para idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a = "'".$idEmpresa."'" ;
		}else{
			$a ="''";
        }
		//filtro de idArticulo
		if(isset($idArticulo) && $idArticulo != ''){ 
        	$b = "'".$idArticulo."'" ;
		}else{
			$b ="''";
        }
		//filtro de Cantidad
		if(isset($Cantidad) && $Cantidad != ''){ 
        	$c = "'".$Cantidad."'" ;
		}else{
			$c ="''";
        }
		//filtro de Valor
		if(isset($Valor) && $Valor != ''){ 
        	$d = "'".$Valor."'" ;
		}else{
			$d ="''";
        }
		//filtro de operacion
		if(isset($operacion) && $operacion != ''){ 
        	$e = "'".$operacion."'" ;
		}else{
			$e ="'15'";
        }
		//filtro de contar_cero
		if(isset($contar_cero) && $contar_cero != ''){ 
        	$f = "'".$contar_cero."'" ;
		}else{
			$f ="'0'";
        }
		//filtro de Tipo_doc
		if(isset($Tipo_doc) && $Tipo_doc != ''){ 
        	$g = "'".$Tipo_doc."'" ;
		}else{
			$g ="''";
        }
		//filtro de N_doc
		if(isset($N_doc) && $N_doc != ''){ 
        	$h = "'".$N_doc."'" ;
		}else{
			$h ="''";
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$i = "'".$idUsuario."'" ;
		}else{
			$i ="''";
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$j = "'".$Estado."'" ;
		}else{
			$j ="'13'";
        }
		//filtro de Procedencia
		if(isset($Procedencia) && $Procedencia != ''){ 
        	$k = "'".$Procedencia."'" ;
		}else{
			$k ="''";
        }
		//filtro de Comentario
		if(isset($Comentario) && $Comentario != ''){ 
        	$l = "'".$Comentario."'" ;
		}else{
			$l ="''";
        }
		//filtro de idSolicitud
		if(isset($idSolicitud) && $idSolicitud != ''){ 
        	$m = "'".$idSolicitud."'" ;
		}else{
			$m ="''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `zint_bodega` (idEmpresa, idArticulo, Cantidad, Valor,operacion, contar_cero, Tipo_doc, N_doc, idUsuario,Estado, Procedencia, Comentario, idSolicitud) VALUES ({$a},{$b},{$c},{$d},{$e},{$f},{$g},{$h},{$i},{$j},{$k},{$l},{$m} )";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>