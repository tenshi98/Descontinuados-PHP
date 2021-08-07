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

//Se traen los datos de la OIRS
$query = "SELECT idCliente, idDepto
FROM `oirs_listado`
WHERE id_Oirs = '{$_GET['close']}'";
$resultado = mysql_query ($query, $dbConn);
$rowpOirs = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);




	//Valida el ingreso del cliente
	if ( $rowpOirs['idCliente']=='' or $rowpOirs['idCliente']=='0')        $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado un cliente, debe seleccionar uno para cerrar la OIRS
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso del departamento
	if (  $rowpOirs['idDepto']=='' or $rowpOirs['idDepto']=='0' )        $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha seleccionado un departamento responsable, debe seleccionar uno para cerrar la OIRS
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	

// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])  ) {

		
		// inserto los datos de registro en la db
		$query  = "UPDATE `oirs_listado` SET Estado='6' WHERE id_Oirs = {$_GET['close']}";
		$result = mysql_query($query, $dbConn);
		
		//Se guarda el dato de quien cerro la OIRS
			//Se crean las variables a utilizar
			date_default_timezone_set("Chile/Continental");
			$Hora           = date("H:i:s",time());
			$Fecha          = date("Y-m-d");
			$idUsuario      = $arrUsuario['idUsuario'];
			$id_Oirs        = $_GET['close'];
			//Se arma el texto a ingresar
			$Detalle        = 'Cierre de la OIRS';
			//Se guardan los datos
			$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
			VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle')";
			$result = mysql_query($query, $dbConn);
			
			
			
		
		
		header( 'Location: '.$location );
		die;
	}
	


	
	?>