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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])&& empty($errors[5])  ) { 
	
		
		//filtro de idUsuario
		if(isset($usuario) && $usuario != ''){ 
        	$a = "'".$usuario."'" ;
		}else{
			$a ="''";
        }
		//filtro de nombre
		if(isset($nombre) && $nombre != ''){ 
        	$b = "'".$nombre."'" ;
		}else{
			$b ="''";
        }
		//filtro de password
		if(isset($password) && $password != ''){ 
        	$c = "'".md5($password)."'" ;
		}else{
			$c ="''";
        }
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$d = "'".$email."'" ;
		}else{
			$d ="''";
        }
		//filtro de tipo
		if(isset($tipo) && $tipo != ''){ 
        	$e = "'".$tipo."'" ;
		}else{
			$e ="''";
        }
		//filtro de estado
		if(isset($estado) && $estado != ''){ 
        	$f = "'".$estado."'" ;
		}else{
			$f ="''";
        }
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `usuarios_listado` (usuario, Nombre, password, email, tipo, Estado) VALUES ({$a},{$b},{$c},{$d},{$e},{$f})";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>