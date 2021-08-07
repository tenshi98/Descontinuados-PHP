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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])&& empty($errors[5])&& empty($errors[6])&& empty($errors[7])  ) { 
	
		//Filtro para idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a = "'".$idEmpresa."'" ;
		}else{
			$a ="''";
        }
		//filtro de Nombre_art
		if(isset($Nombre_art) && $Nombre_art != ''){ 
        	$b = "'".$Nombre_art."'" ;
		}else{
			$b ="''";
        }
		//filtro de idTipo_prod
		if(isset($idTipo_prod) && $idTipo_prod != ''){ 
        	$c = "'".$idTipo_prod."'" ;
		}else{
			$c ="''";
        }
		//filtro de idCat_prod
		if(isset($idCat_prod) && $idCat_prod != ''){ 
        	$d = "'".$idCat_prod."'" ;
		}else{
			$d ="''";
        }
		//filtro de idUml
		if(isset($idUml) && $idUml != ''){ 
        	$e = "'".$idUml."'" ;
		}else{
			$e ="''";
        }
		//filtro de Cap_grad_min
		if(isset($Cap_grad_min) && $Cap_grad_min != ''){ 
        	$f = "'".$Cap_grad_min."'" ;
		}else{
			$f ="''";
        }
		//filtro de idEmbalaje
		if(isset($idEmbalaje) && $idEmbalaje != ''){ 
        	$g = "'".$idEmbalaje."'" ;
		}else{
			$g ="''";
        }
		//filtro de Marca
		if(isset($Marca) && $Marca != ''){ 
        	$h = "'".$Marca."'" ;
		}else{
			$h ="''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `zint_articulo` (idEmpresa,Nombre_art,idTipo_prod,idCat_prod,idUml,Cap_grad_min,idEmbalaje,Marca) VALUES ({$a},{$b},{$c},{$d},{$e},{$f},{$g},{$h})";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>