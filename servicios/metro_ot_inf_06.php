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
/*                                   Se define la variables vacias para evitar errores                                            */
/**********************************************************************************************************************************/
$errors[1]='';
$errors[2]='';
$errors[3]='';
$errors[4]='';
/**********************************************************************************************************************************/
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "metro_ot_inf_06.php";
//formulario para crear permiso
if ( !empty($_POST['submit']) )  {
	//se agrega una nueva ubicacion
    $location .= "?show=".$_GET['view'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_trans/ot_busqueda2.php';//se crean los datos
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Informe mensual de servicios</title>
<!-- InstanceEndEditable -->
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo2.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!-- InstanceBeginEditable name="head" -->
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<script language="javascript">
function msg(direccion){
if (confirm("¿Realmente deseas eliminar el registro?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
</script>
<!-- InstanceEndEditable -->
</head>
<body>
<table class="table" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" height="39px;">
<?php require_once 'AR2D2CFFDJFDJX1/xrxs_core/menu_nav.php'; ?>     
    </td>
  </tr>
  <tr>
    <td width="220px;" bgcolor="#eee">
<?php require_once 'AR2D2CFFDJFDJX1/xrxs_core/menu_lateral.php'; ?>  
    </td>
    <td height="100%">
    	<div class="body">
		<!-- InstanceBeginEditable name="content" -->
<div class="modulo widht_modulo_full">
<div class="title"><p>Informe mensual de servicios</p></div>
<div class="content">          
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['show']) ) { 
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
<div>  
<div class="fleft"><h1>Informe mensual de servicios</h1></div>
<div class="fright">
	<a href="<?php echo $location; ?>?view=<?php echo $_GET['show']?>" ><input name="" type="button" value="Volver &raquo;" /></a>
</div>    
<div class="fright">    
    <a target="_blank" href="<?php echo 'metro_ot_inf_06_print.php?show='.$_GET['show'].'&f_desde='.$_GET['f_desde'].'&f_hasta='.$_GET['f_hasta']?>" ><input name="" type="button" value="Version Imprimible &raquo;" /></a>
</div>
<div class="clear"></div></div>
<h1>I.- REFERENCIAS GENERALES</h1>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
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
</article>
		



<h1>II.- INFORME GENERAL</h1>
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
?>
<article class="module width_full">            
<div class="module_content">
<table class="tablesorter  fix_font" cellspacing="0"> 
 <thead> 
  <tr> 
   <th colspan="7"></th>
   <th colspan="4" style="text-align:center">Mes seleccionado</th>
   <th colspan="4" style="text-align:center">Acumulado</th>
  </tr> 
 </thead>
 <tbody>
  <tr style="background-color: #DDD;"> 
   <td colspan="6">Descripcion</td>
   <td width="40">Un</td>
   <td width="40">Cant</td>
   <td width="40">Mant<br />Prog</td>
   <td width="40">Prom <br />Horas</td>
   <td width="40">%</td>
   <td width="60">Cant<br />(<?php echo $meses ?> meses)</td>
   <td width="40">Mant<br />Prog</td>
   <td width="40">Prom <br />Horas</td>
   <td width="40">%</td> 
  </tr> 
 <?php 
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
}?>

	 
 </tbody> 
 </table>
</div>
</article>

<div>
<div class="fright">    
<a target="_blank" href="<?php echo 'metro_ot_inf_06_export.php?show='.$_GET['show'].'&f_desde='.$_GET['f_desde'].'&f_hasta='.$_GET['f_hasta']?>" ><input name="" type="button" value="Exportar &raquo;" /></a>
</div>
<div class="clear"></div></div>	


 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// SE TRAE UN LISTADO DE TODAS LAS CATEGORIAS DE PRODUCTOS
$arrEmbalaje = array();
$query = "SELECT idEmbalaje, Nombre
FROM `zint_embalaje`
WHERE idEmpresa = {$_GET['view']}
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEmbalaje,$row );
}
?>
<div>  
<div class="fleft"><h1>Generacion de informes</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Fecha desde</label></td>
        <td><input type="date" name="f_desde" required=""/><?php echo $errors[1] ?></td>
        <td><label>Fecha hasta</label></td>
        <td><input type="date" name="f_hasta" required=""/><?php echo $errors[2] ?></td>
    </tr>
    <tr>
		<td colspan="4"><div class="fright"> <input name="submit" type="submit" value="Buscar &raquo;" /> </div></td>
	</tr>
</form>
</table>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 	
 // SE TRAE UN LISTADO DE TODAS LAS EMPRESAS
$arrUsers = array();
$query = "SELECT 
empresas_listado.idEmpresa, 
empresas_listado.Nombre
FROM `empresas_listado`
INNER JOIN `usuarios_empresas`     ON usuarios_empresas.idEmpresa      = empresas_listado.idEmpresa
WHERE usuarios_empresas.idUsuario = ".$arrUsuario['idUsuario']."
ORDER BY empresas_listado.Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<div>  
<div class="fleft"><h1>Listado de Empresas</h1></div>
<div class="clear"></div></div> 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre de la Empresa</th> 
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrUsers as $usuarios) { ?>
  <tr> 
   <td><?php echo $usuarios['Nombre']; ?></td>
   <td>
	<a href="<?php echo $location; ?>?view=<?php echo $usuarios['idEmpresa']; ?>"><input type="image" src="img/icn_categories.png" title="Ver"></a>	   
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article> 

<?php } ?>			
</div>
</div>
		<!-- InstanceEndEditable --> 
    	</div>
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>