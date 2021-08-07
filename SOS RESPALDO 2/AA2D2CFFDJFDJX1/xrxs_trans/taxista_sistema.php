<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/;

		//Traspaso de valores input a variables
		if ( !empty($_POST['idSistema']) )        $idSistema         = $_POST['idSistema'];
		if ( !empty($_POST['idClient']) )         $idClient          = $_POST['idClient'];
		if ( !empty($_POST['table']) )            $table             = $_POST['table'];

		//Se verifica la seleccion
		if ( empty($idClient) )      $errors[1] 	  = '
		<div id="txf_01" class="alert_error">  
			No ha ingresado un valor
			<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
				<i class="fa fa-times"></i>
			</a>
		</div>';
		//se valida que el dato ingresado sea un numero
		if (validarnumero($idClient)) {   $errors[2]	    = '
	<div id="txf_02" class="alert_error">  
			El dato ingresado no es un numero
			<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
				<i class="fa fa-times"></i>
			</a>
		</div>'; 
		}
	
	
	
	// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])  ) {

		// inserto los datos de registro en la db
		$query  = "UPDATE `taxista_sistema` SET {$table} = '{$idClient}' WHERE idSistema = {$idSistema} ";
		$result = mysql_query($query, $dbConn);
		header( 'Location: '.$location );
		die;
	}
?>