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

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informe mensual de servicios</title>
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
<h1>Informe mensual de servicios</h1>
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
   <th colspan="15">II.- INFORME GENERAL</th>
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
$vacumulado='';
$vcontrato='';
$vcostos='';
//calculo de meses entre el inicio del contrato y la fecha actual
$fechainicial = new DateTime($rowemp['Fecha_ini_con']);
$fechafinal = new DateTime($_GET['f_hasta']);
$diferencia = $fechainicial->diff($fechafinal);
$meses = ( $diferencia->y * 12 ) + $diferencia->m;

echo '<tr>';
   echo '<td colspan="7"></td>';
   echo '<td colspan="4" style="text-align:center">Mes seleccionado</td>';
   echo '<td colspan="4" style="text-align:center">Acumulado</td>';
echo '</tr>';
  
echo '<tr style="background-color: #DDD;"> ';
   echo '<td colspan="6">Descripcion</td>';
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
	echo '<tr style="background-color: #EEE;"><td colspan="15" style=" font-size:18px; font-weight:bolder">'.$productos[0]['cat'].'</td></tr>';   
	 $cat_anterior=$productos[0]['cat'];
   } else {
	   $cat_anterior=$productos[0]['cat'];  
	   }
	//imprimo las subcategorias
 if ($subcat_anterior!=$productos[0]['subcat']) {
	echo '<tr style="background-color: #EEE;"><td colspan="15">'.$productos[0]['subcat'].'</td></tr>';   
	 $subcat_anterior=$productos[0]['subcat'];
   } else {
	   $subcat_anterior=$productos[0]['subcat'];  
	   }
	echo '<tr>';
    //se imprime el trabajo
    echo '<td colspan="6">'.$productos[0]['job'].'</td>';
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
} ?>


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