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
empresas_item_list.idItemlist AS id_job,
(SELECT COUNT(cantidad) FROM empresas_ot_listado WHERE idItemlist = id_job AND f_Inicio BETWEEN '{$_GET['f_desde']}' AND '{$_GET['f_hasta']}' AND empresas_ot_listado.estado='9') AS cuenta_job,
(SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(t_usado))) FROM empresas_ot_listado WHERE idItemlist = id_job AND f_Inicio BETWEEN '{$_GET['f_desde']}' AND '{$_GET['f_hasta']}' AND empresas_ot_listado.estado='9') AS suma_horas,

(SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(t_usado))) FROM empresas_ot_listado WHERE idItemlist = id_job AND empresas_ot_listado.estado='9') AS total_horas,
(SELECT COUNT(cantidad) FROM empresas_ot_listado WHERE idItemlist = id_job AND empresas_ot_listado.estado='9' ) AS total_job

FROM `empresas_item_list`
LEFT JOIN `empresas_item_cat`        ON empresas_item_cat.idItemcat            = empresas_item_list.idItemcat

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
   echo '<td colspan="7" style="background-color: #EEE;"><strong>II.- INFORME GENERAL</strong></td>';
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
$vcostos='';
//calculo de meses entre el inicio del contrato y la fecha actual
$fechainicial = new DateTime($rowemp['Fecha_ini_con']);
$fechafinal = new DateTime($_GET['f_hasta']);
$diferencia = $fechainicial->diff($fechafinal);
$meses = ( $diferencia->y * 12 ) + $diferencia->m;

echo '<tr>';
   echo '<td colspan="3"></td>';
   echo '<td colspan="4" style="text-align:center">Mes seleccionado</td>';
   echo '<td colspan="4" style="text-align:center">Acumulado</td>';
echo '</tr>';
  
echo '<tr style="background-color: #DDD;"> ';
   echo '<td colspan="2">Descripcion</td>';
   echo '<td width="40">Un</td>';
   echo '<td width="40">Cant</td>';
   echo '<td width="40">Mant<br />Prog</td>';
   echo '<td width="40">Prom <br />Horas</td>';
   echo '<td width="40">%</td>';
   echo '<td width="60">Cant<br />(<?php echo $meses ?> meses)</td>';
   echo '<td width="40">Mant<br />Prog</td>';
   echo '<td width="40">Prom <br />Horas</td>';
   echo '<td width="40">%</td>'; 
echo '</tr>';

//Filtro la lista en un array multisort
filtrar($row_tarea, 'id_job'); 
foreach($row_tarea as $tipo=>$productos){ ?>
  
   <?php
   //Imprimo las categorias
   if ($cat_anterior!=$productos[0]['cat']) {
	echo '<tr style="background-color: #EEE;"><td colspan="11" style=" font-size:18px; font-weight:bolder">'.$productos[0]['cat'].'</td></tr>';   
	 $cat_anterior=$productos[0]['cat'];
   } else {
	   $cat_anterior=$productos[0]['cat'];  
	   }
	//imprimo las subcategorias
 if ($subcat_anterior!=$productos[0]['subcat']) {
	echo '<tr style="background-color: #EEE;"><td colspan="11">'.$productos[0]['subcat'].'</td></tr>';   
	 $subcat_anterior=$productos[0]['subcat'];
   } else {
	   $subcat_anterior=$productos[0]['subcat'];  
	   }
	echo '<tr>';
    //se imprime el trabajo
    echo '<td colspan="2">'.$productos[0]['job'].'</td>';
	//se imprime la unidad de medida del trabajo
    echo '<td style="text-align:center">'.$productos[0]['uml_job'].'</td>';
	//se imprime la cantidad de veces que se realizo el trabajo
    echo '<td style="text-align:center">'.$productos[0]['cuenta_job'].'</td>';
	
	//se imprimen las cantidades de mantenciones programadas
	if ($productos[0]['cat']=='Mantenimiento Preventivo') {
	echo '<td style="text-align:center">'.$productos[0]['vund_job'].'</td>';	
	} else {
	echo '<td style="text-align:center" style="background-color: #EEE;"></td>';	
	}
	//se imprimen las horas invertidas en el mantenimiento correctivo
	if ($productos[0]['cat']=='Mantenimiento Correctivo') {
	  //condiciono para que la division no me de error
      if ($productos[0]['cuenta_job']==0) {
	    $minutos = 0;
      } else {
	    $horaInicio = $productos[0]['suma_horas']; 
	    $registros = $productos[0]['cuenta_job'];
	    $minutos = divHoras($horaInicio,$registros);
	  }
	echo '<td style="text-align:center">'.minutos2horas($minutos).'</td>';	
	} else {
	echo '<td style="text-align:center" style="background-color: #EEE;"></td>';	
	}
	
	
	
	//se imprimen los porcentajes dependiendo del tipo de mantenimiento
    if ($productos[0]['cat']=='Mantenimiento Preventivo') {
	echo '<td style="text-align:center">'.porcentaje($productos[0]['cuenta_job']/$productos[0]['vund_job']).'</td>';
	} elseif ($productos[0]['cat']=='Mantenimiento Correctivo') {
	  if ($productos[0]['subcat']=='Bombeo') {
		  if ($minutos==0){
			 $valor=0;
		  }else {
			 $valor=(180/$minutos);
		  }
	  echo '<td style="text-align:center">'.porcentaje($valor).'</td>';	
	  } else {
		  if ($minutos==0){
			 $valor=0;
		  }else {
			 $valor=(300/$minutos);
		  }
	  echo '<td style="text-align:center">'.porcentaje($valor).'</td>';	
	  }
	} else {
	echo '<td style="text-align:center" style="background-color: #EEE;"></td>';	
	}
	
	//se imprime la cantidad de veces que se realizo el trabajo
    echo '<td style="text-align:center">'.$productos[0]['total_job'].'</td>';
	
	//se imprimen las cantidades de mantenciones programadas
	if ($productos[0]['cat']=='Mantenimiento Preventivo') {
	echo '<td style="text-align:center">'.$productos[0]['vund_job']*$meses.'</td>';	
	} else {
	echo '<td style="text-align:center" style="background-color: #EEE;"></td>';	
	}
	
	//se imprimen las horas invertidas en el mantenimiento correctivo
	if ($productos[0]['cat']=='Mantenimiento Correctivo') {
	  //condiciono para que la division no me de error
      if ($productos[0]['cuenta_job']==0) {
	    $minutos = 0;
      } else {
	    $horaInicio = $productos[0]['total_horas']; 
	    $registros = $productos[0]['total_job'];
	    $minutos = divHoras($horaInicio,$registros);
	  }
	echo '<td style="text-align:center">'.minutos2horas($minutos).'</td>';	
	} else {
	echo '<td style="text-align:center" style="background-color: #EEE;"></td>';	
	}
	
	//se imprimen los porcentajes dependiendo del tipo de mantenimiento
    if ($productos[0]['cat']=='Mantenimiento Preventivo') {
	echo '<td style="text-align:center">'.porcentaje($productos[0]['total_job']/($productos[0]['vund_job']*$meses)).'</td>';
	} elseif ($productos[0]['cat']=='Mantenimiento Correctivo') {
	  if ($productos[0]['subcat']=='Bombeo') {
		  if ($minutos==0){
			 $valor=0;
		  }else {
			 $valor=(180/$minutos);
		  }
	  echo '<td style="text-align:center">'.porcentaje($valor).'</td>';	
	  } else {
		  if ($minutos==0){
			 $valor=0;
		  }else {
			 $valor=(300/$minutos);
		  }
	  echo '<td style="text-align:center">'.porcentaje($valor).'</td>';	
	  }
	} else {
	echo '<td style="text-align:center" style="background-color: #EEE;"></td>';	
	}

echo '</tr>';
}
    
echo '</tbody> ';
echo '</table>';
?>