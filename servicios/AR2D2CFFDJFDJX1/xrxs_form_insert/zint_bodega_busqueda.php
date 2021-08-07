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
if ( empty($errors[1]) && empty($errors[2])   ) { 
	
		//Filtro para idEmpresa
		$idEmpresa = $_GET['view'];
		 $q = 'view='.$idEmpresa.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'';
		//filtro de cliente_interno
		if(isset($cliente_interno) && $cliente_interno != ''){ 
          $q .= '&cint='.$cliente_interno.'' ; 
        }
		//filtro de cliente_externo
		if(isset($cliente_externo) && $cliente_externo != ''){ 
          $q .= '&cext='.$cliente_externo.'' ; 
        }
		//filtro de responsable
		if(isset($responsable) && $responsable != ''){ 
          $q .= '&responsable='.$responsable.'' ; 
        }
        //filtro de estado
		if(isset($estado) && $estado != ''){ 
          $q .= '&estado='.$estado.'' ; 
        }
		//filtro de n_solicitud
		if(isset($n_solicitud) && $n_solicitud != ''){ 
          $q .= '&n_solicitud='.$n_solicitud.'' ; 
        }
		
		header( 'Location: '.$location.'?'.$q.'&pagina=1' );
		die;
		}
?>