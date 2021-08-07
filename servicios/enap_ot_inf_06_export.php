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
while ( $row_tarea0[] = mysql_fetch_assoc ($resultado));
mysql_free_result($resultado);
$row_tarea=$row_tarea0;
array_pop($row_tarea);
array_multisort($row_tarea, SORT_ASC);
header('Pragma: public'); 
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past    
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
header('Cache-Control: no-store, no-cache, must-revalidate'); // HTTP/1.1 
header('Cache-Control: pre-check=0, post-check=0, max-age=0'); // HTTP/1.1 
header('Pragma: no-cache'); 
header('Expires: 0'); 
header('Content-Transfer-Encoding: none'); 
header('Content-Type: application/vnd.ms-excel'); // This should work for IE & Opera 
header('Content-type: application/x-msexcel'); // This should work for the rest 
header('Content-Disposition: attachment; filename="'.$rowemp['Nombre'].'- Mes de '.Fecha_mes($_GET['f_desde']).'.xls"');
 
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
 
echo '<table xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">';

echo '<tbody>'; 

echo '<tr>';
   echo '<td colspan="4" style="background-color: #EEE;"><strong>I.- REFERENCIAS GENERALES</strong></td>';
echo '</tr>';
echo '<tr>';
   echo '<td><strong>Planta : </strong>'.$rowemp['Nombre'].'</td>';
echo '</tr>';
echo '<tr>';
   echo '<td><strong>Mes N°: </strong>'.Fecha_mes_n($_GET['f_desde']).'</td>';
   echo '<td><strong>Desde : </strong>'.Fecha_completa($_GET['f_desde']).'</td>';
   echo '<td><strong>Hasta : </strong>'.Fecha_completa($_GET['f_hasta']).'</td>';
echo '</tr>';
echo '<tr>'; 
   echo '<td><strong>N° Contrato : </strong>'.$rowemp['N_contrato'].'</td>';
echo '</tr>';
echo '<tr>'; 
   echo '<td colspan="4"><strong>Contrato : </strong>'.$rowemp['Nombre_contrato'].'</td>';
echo '</tr>';
echo '<tr>';
   echo '<td>Fecha inicio del contrato '.Fecha_mes_año($rowemp['Fecha_ini_con']).'</td>';
   echo '<td>Fecha termino del contrato '.Fecha_mes_año($rowemp['Fecha_term_con']).'</td>';
echo '</tr>';
echo '<tr><td colspan="4"></td></tr>'; 
echo '<tr><td colspan="4"></td></tr>';

echo '<tr>';
   echo '<td colspan="4" style="background-color: #EEE;"><strong>II.- ALCANCE DE LOS SERVICIOS</strong></td>';
echo '</tr>';
//Filtro la lista en un array multisort
filtrar($row_ot, 'Nombre_cat'); 
foreach($row_ot as $tipo=>$productos){  
echo '<tr><td colspan="4"><strong>'.$tipo.'</strong></td></tr>';
  foreach($productos as $producto) {   
echo '<tr><td colspan="4">'.$producto['Nombre_Sub'].'</td></tr>';
   } }  
echo '<tr><td colspan="4"></td></tr>'; 
echo '<tr><td colspan="4"></td></tr>';



echo '<tr>';
   echo '<td colspan="7" style="background-color: #EEE;"><strong>III.- INFORME GENERAL</strong></td>';
echo '</tr>';?>
<?php //creacion de variables para sacar totales y subtotales
$vmes='';
$vsumatareas='';
$vcuentatareas='';
$vtotal='';
$cat_anterior='';
$subcat_anterior='';
$vacumulado='';
$vcontrato='';
$duracion_cont=$_GET['periodos'];
$vcostos='';
//calculo de meses entre el inicio del contrato y la fecha actual
$fechainicial = new DateTime($rowemp['Fecha_ini_con']);
$fechafinal = new DateTime($_GET['f_hasta']);
$diferencia = $fechainicial->diff($fechafinal);
$meses = ( $diferencia->y * 12 ) + $diferencia->m;

//Filtro la lista en un array multisort
filtrar($row_tarea, 'job'); 
foreach($row_tarea as $tipo=>$productos){ ?>
  <tr>
   <?php
   if ($cat_anterior!=$productos[0]['cat']) {
	echo '<tr><td colspan="11" style="background-color: #EEE; font-size:18px; font-weight:bolder">'.$productos[0]['cat'].'</td></tr>';   
	 $cat_anterior=$productos[0]['cat'];
   } else {
	   $cat_anterior=$productos[0]['cat'];  
	   }
 if ($subcat_anterior!=$productos[0]['subcat']) {
	echo '<tr><td style="background-color: #EEE;" colspan="11">'.$productos[0]['subcat'].'</td></tr>';   
	 $subcat_anterior=$productos[0]['subcat'];
   } else {
	   $subcat_anterior=$productos[0]['subcat'];  
	   }
    //verifico el tipo de unidad de medida
   //Si la unidad de medida es mes
   if ($productos[0]['uml_job']=='mes'){?>
   	<td colspan="4" ><?php echo $tipo ?></td>
    <td><?php echo $productos[0]['uml_job'];$vmes=$productos[0]['vuni_job'];?></td>
   <?php } elseif ($productos[0]['uml_job']=='Gl'){?>
   	<td colspan="4"><?php echo $tipo ?></td>
    <td><?php echo $productos[0]['uml_job'];$vmes=0;?></td>
  <?php } else {?>
    <td colspan="4"><?php echo $tipo ?></td>
    <td><?php echo $productos[0]['uml_job']?></td>
   <?php //guardo temporalmente el total
     $vmes=$productos[0]['suma_job']*$productos[0]['vuni_job'];
   //fin de la unidad de medida
    }
	// si el tip de titulo corresponde a los montos no considerados se realiza busqueda aparte
  if ($tipo=='D1.1 - Montos no considerados'){
	// Se trae el listado con los costos
	$arrCostosRel = array();
	$query = "SELECT f_Inicio, costo
	FROM `empresas_ot_costosrel`
	WHERE idEmpresa = '{$_GET['show']}'";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrCostosRel,$row );
	}
	mysql_free_result($resultado); 
	//inicio el ciclo de la busqueda aparte
	foreach ($arrCostosRel as $costos) {  
 			//en cada ciclo sumamos el valor de los costos del mes al valoor del mes
			if ($costos['f_Inicio']>$_GET['f_desde'] && $costos['f_Inicio']<$_GET['f_hasta']){
			$vmes+=$costos['costo'];	
			}
			$vcostos+=$costos['costo'];
 		} // fin del ciclo 	 
   } // fin de la condicion
   //segundo array, el que esta anidado
  foreach($productos as $producto) {  
  //se verifica si el trabajo no tiene tareas, si no es asi condicionar para que no imprima fila vacia
 if (!empty($producto['subjob'])) { 
 // se verifica que las tareas tengan algun valor de seguimiento
   if (!empty($producto['valor_frec'])) {  
   //guardo temporalmente los valores de las tareas
    $vsumatareas+=$producto['contar_subjob']/$producto['valor_frec'];
	$vcuentatareas++; 
     }    
   } //cierre del if
 }//cierre del foreach 
  //si la unidad de medida es mes
   if ($vcuentatareas==0) {
	   if ($productos[0]['suma_job']!=0) {
		if ($productos[0]['uml_job']=='mes') {
		echo '<td width="40">'.$productos[0]['suma_job'].'</td>' ; 
		echo '<td width="90">'.Valores_sd($productos[0]['vuni_job']).'</td>' ;
	    echo '<td width="90">'.Valores_sd($vmes).'</td>';
		$acumulado=$meses*$productos[0]['vuni_job'];
		$total_contrato=$duracion_cont*$productos[0]['vuni_job']; 
	    echo '<td width="90">'.Valores_sd($acumulado).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato-$acumulado).'</td>';
		//sumo los valores a los totales
	    $vtotal+=$vmes;
		$vacumulado+=$acumulado;
		$vcontrato+=$total_contrato;
		} elseif ($productos[0]['uml_job']=='Gl') {
		echo '<td width="40">'.Cantidades_cd($vmes/$productos[0]['vuni_job']).'</td>' ;
		echo '<td width="90">'.Valores_sd($productos[0]['vuni_job']).'</td>' ;
	    echo '<td width="90">'.Valores_sd($vmes).'</td>'; 
	    echo '<td width="90">CALCULAR</td>';	
		} else {
		echo '<td width="40">'.$productos[0]['suma_job'].'</td>' ; 
		echo '<td width="90">'.Valores_sd($productos[0]['vuni_job']).'</td>' ;
	    echo '<td width="90">'.Valores_sd($vmes).'</td>'; 
		$acumulado=$productos[0]['total_job']*$productos[0]['vuni_job'];
		$total_contrato=$duracion_cont*(($productos[0]['vund_job']*$productos[0]['vuni_job'])/12);
	    echo '<td width="90">'.Valores_sd($acumulado).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato-$acumulado).'</td>';	
		//sumo los valores a los totales
	    $vtotal+=$vmes;
		$vacumulado+=$acumulado;
		$vcontrato+=$total_contrato;
		}  
	   } else {
		if ($productos[0]['uml_job']=='mes') { 
		echo '<td width="40">1</td>' ;
		echo '<td width="90">'.Valores_sd($productos[0]['vuni_job']).'</td>' ;
	    echo '<td width="90">'.Valores_sd($vmes).'</td>'; 
		$acumulado=$meses*$productos[0]['vuni_job'];
		$total_contrato=$duracion_cont*$productos[0]['vuni_job']; 
	    echo '<td width="90">'.Valores_sd($acumulado).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato-$acumulado).'</td>';
		//sumo los valores a los totales
	    $vtotal+=$vmes;
		$vacumulado+=$acumulado;
		$vcontrato+=$total_contrato;
		} elseif ($productos[0]['uml_job']=='Gl') {
		echo '<td width="40">'.Cantidades_cd($vmes/$productos[0]['vuni_job']).'</td>' ;
		echo '<td width="90">'.Valores_sd($productos[0]['vuni_job']).'</td>' ;
	    echo '<td width="90">'.Valores_sd($vmes).'</td>'; 
		$acumulado=$vcostos;
		$total_contrato=$duracion_cont*$productos[0]['vuni_job'];
	    echo '<td width="90">'.Valores_sd($acumulado).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato-$acumulado).'</td>';	
		//sumo los valores a los totales
	    $vtotal+=$vmes;
		$vacumulado+=$acumulado;
		$vcontrato+=$total_contrato;
		} else {
		echo '<td width="40">0</td>' ;	
		echo '<td width="90">'.Valores_sd($productos[0]['vuni_job']).'</td>' ;
	    echo '<td width="90">'.Valores_sd($vmes).'</td>'; 
		$acumulado=$productos[0]['total_job']*$productos[0]['vuni_job'];
		$total_contrato=$duracion_cont*(($productos[0]['vund_job']*$productos[0]['vuni_job'])/12);
	    echo '<td width="90">'.Valores_sd($acumulado).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato-$acumulado).'</td>';
		//sumo los valores a los totales
	    $vtotal+=$vmes;
		$vacumulado+=$acumulado;
		$vcontrato+=$total_contrato;
		}} 
	   
   } else {
	   if ($productos[0]['uml_job']=='mes') {
	   	$promedio=$vsumatareas/$vcuentatareas;
		$totalmes=$vmes*$promedio;
	   	echo '<td width="40">1</td>' ;
		echo '<td width="90">'.Valores_sd($productos[0]['vuni_job']).'</td>' ;
	   	echo '<td width="90">'.Valores_sd($productos[0]['vuni_job']).'</td>';
		$acumulado=$meses*$productos[0]['vuni_job'];
		$total_contrato=$duracion_cont*$productos[0]['vuni_job']; 
	    echo '<td width="90">'.Valores_sd($acumulado).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato-$acumulado).'</td>';
		//sumo el valor al valor total
	    $vtotal+=$productos[0]['vuni_job'];
		$vacumulado+=$acumulado;
		$vcontrato+=$total_contrato;
	   } else {
	   echo '<td width="40">'.$productos[0]['suma_job'].'</td>' ; 
	   echo '<td width="90">'.Valores_sd($productos[0]['vuni_job']).'</td>';
       echo '<td width="90">'.Valores_sd($productos[0]['suma_job']*$productos[0]['vuni_job']).'</td>';
	   $acumulado=$productos[0]['total_job']*$productos[0]['vuni_job'];
		$total_contrato=$duracion_cont*(($productos[0]['vund_job']*$productos[0]['vuni_job'])/12);
	    echo '<td width="90">'.Valores_sd($acumulado).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato).'</td>';
		echo '<td width="90">'.Valores_sd($total_contrato-$acumulado).'</td>';	
	   //sumo los valores a los totales
	    $vtotal+=$vmes;
		$vacumulado+=$acumulado;
		$vcontrato+=$total_contrato; 
	   }    
   } 
 echo '</tr>';
//reseteo de las variables utilizadas
$vmes='';
$vsumatareas='';
$vcuentatareas='';
 } //cierre del foreach ?>
<tr> 
   <td style="background-color: #CCC;" colspan="7">Totales</td>
   <td style="background-color: #CCC;"><?php echo Valores_sd($vtotal) ?></td>
   <td style="background-color: #CCC;"><?php echo Valores_sd($vacumulado) ?></td>
   <td style="background-color: #CCC;"><?php echo Valores_sd($vcontrato) ?></td>
   <td style="background-color: #CCC;"><?php echo Valores_sd($vcontrato-$vacumulado) ?></td>
</tr>

 <?php
echo '</tbody> ';
echo '</table>';
?>