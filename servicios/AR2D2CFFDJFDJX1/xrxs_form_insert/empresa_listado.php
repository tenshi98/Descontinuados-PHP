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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])  ) { 
	
		//Filtro para idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a = "'".$idEmpresa."'" ;
		}else{
			$a ="''";
        }
		//filtro de nombre
		if(isset($nombre) && $nombre != ''){ 
        	$b = "'".$nombre."'" ;
		}else{
			$b ="''";
        }
		//filtro de abreviatura
		if(isset($abreviatura) && $abreviatura != ''){ 
        	$c = "'".$abreviatura."'" ;
		}else{
			$c ="''";
        }
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$d = "'".$email."'" ;
		}else{
			$d ="''";
        }
		//filtro de rut
		if(isset($rut) && $rut != ''){ 
        	$e = "'".$rut."'" ;
		}else{
			$e ="''";
        }
		//filtro de direccion
		if(isset($direccion) && $direccion != ''){ 
        	$f = "'".$direccion."'" ;
		}else{
			$f ="''";
        }
		//filtro de web
		if(isset($web) && $web != ''){ 
        	$g = "'".$web."'" ;
		}else{
			$g ="''";
        }
		//filtro de nombre_contrato
		if(isset($nombre_contrato) && $nombre_contrato != ''){ 
        	$h = "'".$nombre_contrato."'" ;
		}else{
			$h ="''";
        }
		//filtro de n_contrato
		if(isset($n_contrato) && $n_contrato != ''){ 
        	$i = "'".$n_contrato."'" ;
		}else{
			$i ="''";
        }
		//filtro de fono
		if(isset($fono) && $fono != ''){ 
        	$j = "'".$fono."'" ;
		}else{
			$j ="''";
        }
		//filtro de n_contrato
		if(isset($contacto) && $contacto != ''){ 
        	$k = "'".$contacto."'" ;
		}else{
			$k ="''";
        }
		//filtro de pais
		if(isset($pais) && $pais != ''){ 
        	$l = "'".$pais."'" ;
		}else{
			$l ="''";
        }
		//filtro de ciudad
		if(isset($ciudad) && $ciudad != ''){ 
        	$m = "'".$ciudad."'" ;
		}else{
			$m ="''";
        }
		//filtro de comuna
		if(isset($comuna) && $comuna != ''){ 
        	$n = "'".$comuna."'" ;
		}else{
			$n ="''";
        }
		//filtro de fax
		if(isset($fax) && $fax != ''){ 
        	$o = "'".$fax."'" ;
		}else{
			$o ="''";
        }
		//filtro de rubro
		if(isset($rubro) && $rubro != ''){ 
        	$p = "'".$rubro."'" ;
		}else{
			$p ="''";
        }
		//filtro de Fecha_ini_con
		if(isset($Fecha_ini_con) && $Fecha_ini_con != ''){ 
        	$q = "'".$Fecha_ini_con."'" ;
		}else{
			$q ="''";
        }
		//filtro de Fecha_term_con
		if(isset($Fecha_term_con) && $Fecha_term_con != ''){ 
        	$r = "'".$Fecha_term_con."'" ;
		}else{
			$r ="''";
        }
		//filtro de duracion_contrato
		if(isset($duracion_contrato) && $duracion_contrato != ''){ 
        	$s = "'".$duracion_contrato."'" ;
		}else{
			$s ="''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `empresas_listado` (idEmpresa, Nombre, Abreviatura, email, Rut, Direccion,web, Nombre_contrato, N_contrato, Fono,Contacto, Pais,Ciudad,Comuna, Fax, Rubro) VALUES ({$a},{$b},{$c},{$d},{$e},{$f},{$g},{$h},{$i},{$j},{$k},{$l},{$m},{$n},{$o},{$p},{$q},{$r},{$s})";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>