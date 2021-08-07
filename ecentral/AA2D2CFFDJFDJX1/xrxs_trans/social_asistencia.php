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
//Traspaso de valores input a variables
	if ( !empty($_GET['idCliente']) )          $idCliente          = $_GET['idCliente'];
	if ( !empty($_GET['idEvento']) )           $idEvento           = $_GET['idEvento'];
	if ( !empty($_GET['Fecha_inscripcion']) )  $Fecha_inscripcion  = $_GET['Fecha_inscripcion'];
	if ( !empty($_GET['Estado']) )      	   $Estado             = $_GET['Estado'];
	
	//Validacion
	if ( empty($idEvento) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado un evento
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';

// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2])   ) { 
	
	//filtro de idCliente
		if(isset($idCliente) && $idCliente != ''){ 
        	$a = "'".$idCliente."'" ;
		}else{
			$a ="''";
        }
		//filtro de idEvento
		if(isset($idEvento) && $idEvento != ''){ 
        	$a .= ",'".$idEvento."'" ;
		}else{
			$a .=",''";
        }
		//filtro de Fecha_inscripcion
		if(isset($Fecha_inscripcion) && $Fecha_inscripcion != ''){ 
        	$a .= ",'".$Fecha_inscripcion."'" ;
		}else{
			$a .=",''";
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",'".$Estado."'" ;
		}else{
			$a .=",''";
        }
	
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_asistencia_eventos` (idCliente, idEvento, Fecha_inscripcion, Estado) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
	
 
}
 ?>