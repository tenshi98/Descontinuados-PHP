<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/listado_errores.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                      Se traen los datos desde la base de datos                                                 */
/**********************************************************************************************************************************/
// Se traen todos los datos importantes de la empresa	
$query = "SELECT Nombre,N_contrato,Nombre_contrato, Fecha_ini_con, Fecha_term_con
FROM `empresas_listado`
WHERE idEmpresa = {$_GET['show']}";
$resultado = mysql_query ($query, $dbConn);
$rowemp = mysql_fetch_assoc ($resultado);
//se llaman a los itemizados asignados a la empresa
$query = "SELECT Nombre_cat, Nombre_Sub
FROM `empresas_item_cat`
WHERE idEmpresa = '{$_GET['show']}' ";
$resultado = mysql_query ($query, $dbConn);
while ( $row_ot[] = mysql_fetch_assoc ($resultado));
mysql_free_result($resultado);
array_pop($row_ot);
array_multisort($row_ot, SORT_ASC);
//se cargan variables extras para las busquedas
$month=Fecha_mes_n($_GET['f_desde']);
$year=Fecha_año($_GET['f_desde']);
//se llaman a los itemizados asignados a la empresa
$query = "SELECT 
empresas_item_cat.Nombre_cat AS cat,
empresas_item_cat.Nombre_Sub AS subcat,
empresas_item_list.Nombre AS job,
empresas_item_list.unidad AS uml_job,
empresas_item_list.valor_unidad AS vund_job,
empresas_item_list.v_unitario AS vuni_job,
empresas_item_list.idItemlist AS id_job,
(SELECT SUM(cantidad) FROM empresas_ot_listado WHERE idItemlist = id_job AND f_Inicio BETWEEN '{$_GET['f_desde']}' AND '{$_GET['f_hasta']}' AND empresas_ot_listado.estado='9') AS suma_job,
(SELECT SUM(cantidad) FROM empresas_ot_listado WHERE idItemlist = id_job AND empresas_ot_listado.estado='9' ) AS total_job,

empresas_item_sublist.Nombre AS subjob,
empresas_item_sublist.idSublist AS id_subjob,
(SELECT COUNT(idOt) FROM empresas_ot_tareas WHERE idSublist = id_subjob AND f_Inicio BETWEEN '{$_GET['f_desde']}' AND '{$_GET['f_hasta']}' ) AS contar_subjob,
detalle_general.Nombre AS frecuencia,

detalle_general.id_Detalle AS id_frecuencia,
(SELECT valor FROM empresas_ot_prog WHERE idFrecuencia = id_frecuencia AND month = {$month} AND year = {$year} ) AS valor_frec

FROM `empresas_item_list`
LEFT JOIN `empresas_item_cat`        ON empresas_item_cat.idItemcat            = empresas_item_list.idItemcat
LEFT JOIN `empresas_item_sublist`    ON empresas_item_sublist.idItemlist       = empresas_item_list.idItemlist
LEFT JOIN `detalle_general`          ON detalle_general.id_Detalle             = empresas_item_sublist.idFrecuencia

WHERE empresas_item_list.idEmpresa = '{$_GET['show']}' ";

$resultado = mysql_query ($query, $dbConn);
while ( $row_tarea[] = mysql_fetch_assoc ($resultado));
mysql_free_result($resultado);
array_pop($row_tarea);
array_multisort($row_tarea, SORT_ASC);?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Estado de Pago - Resumen</title>
<link href="css/print1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="body_temp">
<?php //DEFINICION DEL HEAD?>
<div class="logo">
<div class="imagen">
<img src="img/logoempresa.jpg"  alt="logo" />
</div>
<?php //DEFINICION DEL BLOQUE DE DATOS ?>
<div class="datos">
<h1>Estado de Pago - Resumen</h1>
<p><strong>Empresa :</strong><?php echo $rowemp['Nombre']; ?></p>
<p><strong>Desde :</strong><?php echo Fecha_estandar($_GET['f_desde']) ?></p>
<p><strong>Hasta :</strong><?php echo Fecha_estandar($_GET['f_hasta']) ?></p>
</div>
</div>
<div class="clear"></div>

<div class="content-listado" >
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th colspan="6">I.- REFERENCIAS GENERALES</th>
  </tr> 
 </thead>
 <tbody> 
 <tr> 
   <td style="background-color: #EEE;">Planta</td>
   <td colspan="5"><?php echo $rowemp['Nombre']; ?></td>
 </tr>
  <tr> 
   <td style="background-color: #EEE;">Mes N°</td>
   <td><?php echo Fecha_mes_n($_GET['f_desde']); ?></td>
   <td style="background-color: #EEE;">Desde</td>
   <td><?php echo Fecha_completa($_GET['f_desde']); ?></td>
   <td style="background-color: #EEE;">Hasta</td>
   <td><?php echo Fecha_completa($_GET['f_hasta']); ?></td>
 </tr>
 <tr> 
   <td style="background-color: #EEE;">N° Contrato</td>
   <td colspan="5"><?php echo $rowemp['N_contrato']; ?></td>
 </tr>
 <tr> 
   <td style="background-color: #EEE;">Contrato</td>
   <td colspan="5"><?php echo $rowemp['Nombre_contrato']; ?></td>
 </tr>
  <tr> 
   <td colspan="2" style="background-color: #EEE;">Fecha inicio del contrato</td>
   <td><?php echo Fecha_mes_año($rowemp['Fecha_ini_con']); ?></td> 
   <td colspan="2" style="background-color: #EEE;">Fecha termino del contrato</td>
   <td><?php echo Fecha_mes_año($rowemp['Fecha_term_con']); ?></td>
 </tr>	 
 </tbody> 
 </table>
</div>

<div class="content-listado" >
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th colspan="6">II.- ALCANCE DE LOS SERVICIOS</th>
  </tr> 
 </thead>
 <tbody> 
 <?php 
//Filtro la lista en un array multisort
filtrar($row_ot, 'Nombre_cat'); 
foreach($row_ot as $tipo=>$productos){ ?>
  <tr><td style="background-color: #EEE;">
  <div class="fleft"><?php echo $tipo ?></div>
  </td></tr>
 <?php foreach($productos as $producto) { ?> 
  <tr> 
   <td><?php echo $producto['Nombre_Sub']; ?></td>
 </tr> 
 <?php } } ?>
 
 </tbody> 
 </table>
</div>

<div class="content-listado" >
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th colspan="12">III.- INFORME GENERAL</th>
  </tr> 
 </thead>
 <tbody> 
<?php //creacion de variables para sacar totales y subtotales
$vmes='';
$vsumatareas='';
$vcuentatareas='';
$vtotal='';
$cat_anterior='';
$subcat_anterior='';
//Filtro la lista en un array multisort
filtrar($row_tarea, 'job'); 
foreach($row_tarea as $tipo=>$productos){ ?>
  <tr>
   <?php
   if ($cat_anterior!=$productos[0]['cat']) {
	echo '<tr style="background-color: #EEE;"><td colspan="12" style=" font-size:18px; font-weight:bolder">'.$productos[0]['cat'].'</td></tr>';   
	 $cat_anterior=$productos[0]['cat'];
   } else {
	   $cat_anterior=$productos[0]['cat'];  
	   }
 if ($subcat_anterior!=$productos[0]['subcat']) {
	echo '<tr style="background-color: #EEE;"><td colspan="12">'.$productos[0]['subcat'].'</td></tr>';   
	 $subcat_anterior=$productos[0]['subcat'];
   } else {
	   $subcat_anterior=$productos[0]['subcat'];  
	   }
    //verifico el tipo de unidad de medida
   //Si la unidad de medida es mes
   if ($productos[0]['uml_job']=='mes'){?>
   	<td colspan="8"><?php echo $tipo ?>	</td>
    <td><?php echo $productos[0]['uml_job'];$vmes=$productos[0]['vuni_job'].'</td>';
   } elseif ($productos[0]['uml_job']=='Gl'){?>
   	<td colspan="8"><?php echo $tipo ?>	</td>
    <td><?php echo $productos[0]['uml_job'];$vmes=0;?></td>
   <?php //excepcion de la unidad de medida
    } else {?>
    <td colspan="8"><?php echo $tipo ?></td>
    <td><?php echo $productos[0]['uml_job']?></td>
   <?php //guardo temporalmente el total
     $vmes=$productos[0]['suma_job']*$productos[0]['vuni_job'];
   //fin de la unidad de medida
    }
	// si el tip de titulo corresponde a los montos no considerados se realiza busqueda aparte
  if ($tipo=='D1.1 - Montos no considerados'){
	// Se trae el listado con los costos
	$arrCostosRel = array();
	$query = "SELECT  Texto, costo
	FROM `empresas_ot_costosrel`
	WHERE f_Inicio BETWEEN '{$_GET['f_desde']}' AND '{$_GET['f_hasta']}' AND idEmpresa = '{$_GET['show']}'";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrCostosRel,$row );
	}
	mysql_free_result($resultado); 
	//inicio el ciclo de la busqueda aparte
	foreach ($arrCostosRel as $costos) {  
 			//en cada ciclo sumamos el valor de los costos del mes al valoor del mes
			$vmes+=$costos['costo'];
 		} // fin del ciclo 	 
   } // fin de la condicion
   //segundo array, el que esta anidado
  foreach($productos as $producto) {  
  //se verifica si el trabajo no tiene tareas, si no es asi condicionar para que no imprima fila vacia
 if (!empty($producto['subjob'])) { ?> 

   <?php // se verifica que las tareas tengan algun valor de seguimiento
   if (!empty($producto['valor_frec'])) {  
   
   //guardo temporalmente los valores de las tareas
    $vsumatareas+=$producto['contar_subjob']/$producto['valor_frec'];
	$vcuentatareas++; 
   }    
   } //cierre del if
 }//cierre del foreach 
  //si la unidad de medida es mes
   if ($vcuentatareas==0) {
	   //echo '<td>1111</td>';
	   if ($productos[0]['suma_job']!=0) {
		echo '<td>'.$productos[0]['suma_job'].'</td>' ;   
	   } else {
		if ($productos[0]['uml_job']=='mes') { 
		echo '<td>1</td>' ;
		} elseif ($productos[0]['uml_job']=='Gl') {
		echo '<td>'.Cantidades_cd($vmes/$productos[0]['vuni_job']).'</td>' ;	
		} else {
		echo '<td>0</td>' ;	
		}}
	   echo '<td>'.Valores_sd($productos[0]['vuni_job']).'</td>' ;
	   echo '<td>'.Valores_sd($vmes).'</td>';  
	   //sumo el valor al valor total
	   $vtotal+=$vmes;
   } else {
	   if ($productos[0]['uml_job']=='mes') {
	   	$promedio=$vsumatareas/$vcuentatareas;
		$totalmes=$vmes*$promedio;

	   	echo '<td>'.Cantidades_cd($promedio).'</td>' ;
		echo '<td>'.Valores_sd($productos[0]['vuni_job']).'</td>' ;
	   	echo '<td>'.Valores_sd($totalmes).'</td>';
		//sumo el valor al valor total
	   $vtotal+=$totalmes;
	   } else {
	   echo '<td>'.$productos[0]['suma_job'].'</td>' ; 
	   echo '<td>'.Valores_sd($productos[0]['vuni_job']).'</td>';
       echo '<td>'.Valores_sd($productos[0]['suma_job']*$productos[0]['vuni_job']).'</td>';
	   //sumo el valor al valor total
	   $vtotal+=$vmes;  
	   }    
   } 
      ?>
 </tr>
 <?php //reseteo de las variables utilizadas
 $vmes='';
$vsumatareas='';
$vcuentatareas='';
 } //cierre del foreach ?>
<tr style="background-color: #CCC;"> 
   <td colspan="11">Total del mes</td>
   <td><?php echo Valores_sd($vtotal) ?></td>
</tr>
 </tbody> 
 </table>
</div>

<div class="firma">
<div class="fleft"><p>Jefe Planta Enap</p></div>
<div class="fleft center"><p>Administrador Contrato Simyl</p></div>
<div class="fright"><p>Jefe Mantenimiento Enap</p></div>
<div class="clear"></div>
</div>

</div>
</body>
</html>