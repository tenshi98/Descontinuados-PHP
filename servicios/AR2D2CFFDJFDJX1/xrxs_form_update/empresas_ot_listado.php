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

			
		//Filtro para idOt
        $a = "idOt='".$idOt."'" ;
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a .= ",idEmpresa='".$idEmpresa."'" ;
        }
		//filtro de f_Inicio
		if(isset($f_Inicio) && $f_Inicio != ''){ 
        	$a .= ",f_Inicio='".$f_Inicio."'" ;
        }
		//filtro de f_Termino
		if(isset($f_Termino) && $f_Termino != ''){ 
        	$a .= ",f_Termino='".$f_Termino."'" ;
        }
		//filtro de h_Inicio
		if(isset($h_Inicio) && $h_Inicio != ''){ 
        	$a .= ",h_Inicio='".$h_Inicio."'" ;
        }
		//filtro de h_Termino
		if(isset($h_Termino) && $h_Termino != ''){ 
        	$a .= ",h_Termino='".$h_Termino."'" ;
        }
		//filtro de idItemlist
		if(isset($idItemlist) && $idItemlist != ''){ 
        	$a .= ",idItemlist='".$idItemlist."'" ;
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",Estado='".$Estado."'" ;
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= ",idUsuario='".$idUsuario."'" ;
        }
		//filtro de t_usado
		if(isset($t_usado) && $t_usado != ''){ 
        	$a .= ",t_usado='".$t_usado."'" ;
        }
		//filtro de n_Doc
		if(isset($n_Doc) && $n_Doc != ''){ 
        	$a .= ",n_Doc='".$n_Doc."'" ;
        }
		//filtro de cantidad
		if(isset($cantidad) && $cantidad != ''){ 
        	$a .= ",cantidad='".$cantidad."'" ;
        }
		//filtro de idUbicacion
		if(isset($idUbicacion) && $idUbicacion != ''){ 
        	$a .= ",idUbicacion='".$idUbicacion."'" ;
        }
		
		// inserto los datos de registro en la db
		$query  = "UPDATE `empresas_ot_listado` SET ".$a." WHERE idOt = '$idOt'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>