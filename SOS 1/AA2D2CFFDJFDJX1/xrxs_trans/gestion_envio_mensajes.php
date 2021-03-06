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
	if ( !empty($_POST['Tipo']) )        $Tipo         = $_POST['Tipo'];
	if ( !empty($_POST['Titulo']) )      $Titulo       = $_POST['Titulo'];
	if ( !empty($_POST['Mensaje']) )     $Mensaje      = $_POST['Mensaje'];
	if ( !empty($_POST['idCliente']) )   $idCliente    = $_POST['idCliente'];	
	if ( !empty($_POST['Sexo']) )        $Sexo         = $_POST['Sexo'];
	if ( !empty($_POST['idCiudad']) )    $idCiudad     = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )    $idComuna     = $_POST['idComuna'];
	if ( !empty($_POST['Marca']) )       $Marca        = $_POST['Marca'];
	if ( !empty($_POST['Modelo']) )      $Modelo       = $_POST['Modelo'];
	if ( !empty($_POST['Tipo_v']) )      $Tipo_v       = $_POST['Tipo_v'];
	if ( !empty($_POST['Color_1']) )     $Color_1      = $_POST['Color_1'];
	if ( !empty($_POST['Color_2']) )     $Color_2      = $_POST['Color_2'];
	if ( !empty($_POST['Fecha']) )       $Fecha        = $_POST['Fecha'];
//===========================================================================================================	
	//Valida el ingreso del Tipo
	if ( empty($Tipo) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado el tipo de mensaje a enviar
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del Titulo
	if ( empty($Titulo) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado el titulo del mensaje
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del Mensaje
	if ( empty($Mensaje) )      $errors[3] 	  = '
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
$z="WHERE clientes_listado.idCliente>0";
if(isset($idCliente) && $idCliente != '')   { $z .= " AND clientes_listado.idCliente = '".$idCliente."'" ; }
if(isset($Sexo) && $Sexo != '')             { $z .= " AND clientes_listado.Sexo = '".$Sexo."'" ;           }
if(isset($idCiudad) && $idCiudad != '')     { $z .= " AND clientes_listado.idCiudad = '".$idCiudad."'" ;   }
if(isset($idComuna) && $idComuna != '')     { $z .= " AND clientes_listado.idComuna = '".$idComuna."'" ;   }
if(isset($Marca) && $Marca != '')           { $z .= " AND clientes_vehiculos.Marca = '".$Marca."'" ;       }
if(isset($Modelo) && $Modelo != '')         { $z .= " AND clientes_vehiculos.Modelo = '".$Modelo."'" ;     }
if(isset($Tipo_v) && $Tipo_v != '')         { $z .= " AND clientes_vehiculos.Tipo = '".$Tipo_v."'" ;       }
if(isset($Color_1) && $Color_1 != '')       { $z .= " AND clientes_vehiculos.Color_1 = '".$Color_1."'" ;   }
if(isset($Color_2) && $Color_2 != '')       { $z .= " AND clientes_vehiculos.Color_2 = '".$Color_2."'" ;   }
if(isset($Fecha) && $Fecha != '')           { $z .= " AND clientes_vehiculos.Fecha = '".$Fecha."'" ;       }
$z .= " AND clientes_listado.Gsm !=''" ;
//Realizo la consulta
$arrAviso = array();	
$query="SELECT 
clientes_listado.idCliente,
clientes_listado.Gsm 
FROM clientes_listado 
LEFT JOIN clientes_vehiculos ON clientes_vehiculos.idCliente = clientes_listado.idCliente
".$z;	  
$resultado2 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrAviso,$row );
}
$numero = mysql_num_rows($resultado2);
mysql_free_result($resultado2);
//===========================================================================================================
//filtros
$a = "'".$arrUsuario['idUsuario']."'" ;
$a .= ",'".$Tipo."'" ;
$a .= ",'".$Titulo."'" ;
$a .= ",'".$Mensaje."'" ;
$a .= ",'".fecha_actual()."'" ;
$a .= ",'".$numero."'" ;
// inserto los datos de registro en la db
$query  = "INSERT INTO `usuarios_msj_enviados` (idUsuario, Tipo, Titulo, Mensaje, Fecha, Cantidad_clientes) VALUES ({$a} )";
$result = mysql_query($query, $dbConn);
//recibo el ??ltimo id generado por mi sesion
$ultimo_id = mysql_insert_id($dbConn);
//===========================================================================================================
	//Se envian los mensajes a quienes estan cerca
	foreach ($arrAviso as $aviso) { 
		//Envio del mensaje
		$reg_id = $aviso['Gsm'];
		switch ($Tipo) {
			case 18:  $msgx = 'Informacion : '.$Titulo;   break;
			case 19:  $msgx = 'Mensaje : '.$Titulo;       break;
			case 20:  $msgx = 'Oferta : '.$Titulo;        break;	
		}
		$message = $msgx;
		gcmnoti(  $reg_id, $message );

		//Se registra el mensaje en la tabla de mensajes
		$a = "''" ;
		$a .= ",'".$aviso['idCliente']."'" ;
		$a .= ",'".$Tipo."'" ;
		$a .= ",'".fecha_actual()."'" ;
		$a .= ",'".$ultimo_id."'" ;
		$a .= ",'7'" ;

		$query  = "INSERT INTO `clientes_mensaje` (idRobo, idRecibidor, Tipo, Fecha, idMsj_enviado, Leida) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
	}
//===========================================================================================================
	
		//Reenvio a una nueva direccion
		header( 'Location: '.$location.'?send='.$numero );
		die;
}
?>