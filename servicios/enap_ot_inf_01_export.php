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
echo '</tr>';
//creacion de variables para sacar totales y subtotales
$vmes='';
$vsumatareas='';
$vcuentatareas='';
$vtotal='';
//Filtro la lista en un array multisort
filtrar($row_tarea, 'job'); 
foreach($row_tarea as $tipo=>$productos){ 
  echo '<tr>';
   //verifico el tipo de unidad de medida
   //Si la unidad de medida es mes
   if ($productos[0]['uml_job']=='mes'){
   	echo '<td colspan="5" style="background-color: #EEE;">'.$productos[0]['cat'].' - '.$productos[0]['subcat'].' - '.$tipo.'</td>';
    echo '<td width="130" style="background-color: #EEE;">';
	echo Valores_sd($productos[0]['vuni_job']).' x '.$productos[0]['uml_job'];
	//guardo temporalmente el valor del ves
	$vmes=$productos[0]['vuni_job'];
	echo '</td>';
    echo '<td width="90" style="background-color: #EEE;"></td>';
	//Si la unidad de medida es mes
   } elseif ($productos[0]['uml_job']=='Gl'){
   	echo '<td colspan="5" style="background-color: #EEE;">'.$productos[0]['cat'].' - '.$productos[0]['subcat'].' - '.$tipo.'</td>';
    echo '<td width="130" style="background-color: #EEE;">';
	echo Valores_sd($productos[0]['vuni_job']).' x '.$productos[0]['uml_job'];
	//guardo temporalmente el valor del ves
	$vmes=0;
	echo '</td>';
    echo '<td width="90" style="background-color: #EEE;"></td>';
   //excepcion de la unidad de medida
    } else {
    echo '<td colspan="2" style="background-color: #EEE;">'.$productos[0]['cat'].' - '.$productos[0]['subcat'].' - '.$tipo.'</td>';
    echo '<td style="background-color: #EEE;">'.$productos[0]['suma_job'].'</td>';
    echo '<td style="background-color: #EEE;">'.$productos[0]['total_job'].'/'.$_GET['periodos']*$productos[0]['vund_job'].'</td>';  
    echo '<td style="background-color: #EEE;">'.Valores_sd($productos[0]['vuni_job']).' x '.$productos[0]['uml_job'].'</td>';
    echo '<td style="background-color: #EEE;">'.Valores_sd($productos[0]['suma_job']*$productos[0]['vuni_job']).'</td>';
    echo '<td style="background-color: #EEE;"></td>';
   //guardo temporalmente el total
     $vmes=$productos[0]['suma_job']*$productos[0]['vuni_job'];
   //fin de la unidad de medida
    }
  echo '</tr>';
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
  		echo '<tr>'; 
  			echo '<td colspan="5">'.$costos['Texto'].'</td>';
   			echo '<td>'.Valores_sd($costos['costo']).'</td>';
   			echo '<td></td>';
 		echo '</tr>';
       //en cada ciclo sumamos el valor de los costos del mes al valoor del mes
			$vmes+=$costos['costo'];
 		} // fin del ciclo 	 
   } // fin de la condicion
   //segundo array, el que esta anidado
  foreach($productos as $producto) {  
  //se verifica si el trabajo no tiene tareas, si no es asi condicionar para que no imprima fila vacia
 if (!empty($producto['subjob'])) {
  echo '<tr> ';
   echo '<td colspan="3">';
   if ($producto['contar_subjob']!=0) {
    echo $producto['subjob']; 
   } else {
    echo $producto['subjob']; 
    }
   echo '</td>';
   echo '<td>'.$producto['frecuencia'].'</td>';
   echo '<td>'.$producto['contar_subjob'].'/'.$producto['valor_frec'].'</td>';
   echo '<td>';
   // se verifica que las tareas tengan algun valor de seguimiento
   if (!empty($producto['valor_frec'])) {  
   echo Cantidades_cd($producto['contar_subjob']/$producto['valor_frec']) ;
   //guardo temporalmente los valores de las tareas
    $vsumatareas+=$producto['contar_subjob']/$producto['valor_frec'];
	$vcuentatareas++;
    } else { 
    echo ' ---';
    }  
   echo '</td>';
   echo '<td></td>';
 echo '</tr>';
  } //cierre del if
 }//cierre del foreach
 echo '<tr>';
   echo '<td colspan="5" style="background-color: #DDD;"></td>';
  //si la unidad de medida es mes
   if ($vcuentatareas==0) {
	   echo '<td style="background-color: #DDD;">0</td>';
	   echo '<td style="background-color: #DDD;"><strong>'.Valores_sd($vmes).'</strong></td>';  
	   //sumo el valor al valor total
	   $vtotal+=$vmes;
   } else {
	   if ($productos[0]['uml_job']=='mes') {
	   	$promedio=$vsumatareas/$vcuentatareas;
		$totalmes=$vmes*$promedio;
	   	echo '<td style="background-color: #DDD;">'.Cantidades_cd($promedio).'</td>' ;
	   	echo '<td style="background-color: #DDD;"><strong>'.Valores_sd($totalmes).'</strong></td>';
		//sumo el valor al valor total
	   $vtotal+=$totalmes;
	   } else {
		 echo '<td style="background-color: #DDD;">0</td>';
	   echo '<td style="background-color: #DDD;"><strong>'.Valores_sd($vmes).'</strong></td>';  
	   //sumo el valor al valor total
	   $vtotal+=$vmes;  
	   }    
   } 
 echo '</tr>';
//reseteo de las variables utilizadas
$vmes='';
$vsumatareas='';
$vcuentatareas='';
  } //cierre del foreach 
echo '<tr>'; 
   echo '<td colspan="6" style="background-color: #CCC;">Total del mes</td>';
   echo '<td style="background-color: #CCC;"><strong>'.Valores_sd($vtotal).'</strong></td>';
echo '</tr>';

 
echo '</tbody> ';
echo '</table>';
?>