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
	if ( !empty($_GET['view']) )     $idRobo         = $_GET['view'];		
	if ( !empty($_GET['longitud']) ) $Longitud       = $_GET['longitud'];
	if ( !empty($_GET['latitud']) )  $Latitud        = $_GET['latitud'];
	$idCliente      = $arrCliente['idCliente'];
	$Fecha          = fecha_actual();
	$Hora           = hora_actual();
	$vista          = '0';
//===========================================================================================================	
	//Valida el ingreso del idRobo
	if ( empty($idRobo) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado el tipo de mensaje a enviar
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso de la Longitud
	if ( empty($Longitud) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado el titulo del mensaje
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso de la Latitud
	if ( empty($Latitud) )      $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado el mensaje
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';


//===========================================================================================================
// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4])    ) { 
//Se aplica el filtro
$z="WHERE idRobo='".$idRobo."'";
//$z .= " AND clientes_listado.Gsm !=''" ;
//Realizo la consulta	
$query="SELECT Gsm
FROM clientes_robos 
".$z;	  
$resultado2 = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado2);
$row_number = mysql_num_rows ($resultado2);
mysql_free_result($resultado2);
//===========================================================================================================
//filtros
$a = "'".$idRobo."'" ;
$a .= ",'".$idCliente."'" ;
$a .= ",'".$Fecha."'" ;
$a .= ",'".$Hora."'" ;
$a .= ",'".$Longitud."'" ;
$a .= ",'".$Latitud."'" ;
$a .= ",'".$vista."'" ;
// inserto los datos de registro en la db
$query  = "INSERT INTO `clientes_robos_avistado` (idRobo, idCliente, Fecha, Hora, Longitud, Latitud, vista) VALUES ({$a} )";
$result = mysql_query($query, $dbConn);
//recibo el último id generado por mi sesion
//$ultimo_id = mysql_insert_id($dbConn);
//===========================================================================================================
//Se envia el mensaje a quien genero la alerta
		//Envio del mensaje
		if($row_number!=0){
		$reg_id = $row_data['Gsm'];
		$message = $arrCliente['Nombre'].' ha visto tu vehiculo';
		gcmnoti(  $reg_id, $message );
		}
//===========================================================================================================
		//Reenvio a una nueva direccion
		header( 'Location: '.$location.'&view='.$_GET['view'].'&msg='.$_GET['msg'].'&listo=true' );
		die;
}
?>