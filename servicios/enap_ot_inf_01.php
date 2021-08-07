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
$location = "enap_ot_inf_01.php";
//formulario para crear permiso
if ( !empty($_POST['submit']) )  {
	//se agrega una nueva ubicacion
    $location .= "?show=".$_GET['view'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_trans/ot_busqueda.php';//se crean los datos
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Estado de Pago - Detalles</title>
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
<div class="title"><p>Estado de Pago - Detalles</p></div>
<div class="content">          
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['trabajos']) ) { 
// se trae un listado con todos los trabajos realizados
$arrTrabajos = array();
$query = "SELECT idOt,n_Doc,f_Termino
FROM `empresas_ot_listado` 
WHERE idItemlist={$_GET['trabajos']} AND Estado = '9' ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTrabajos,$row );
}
mysql_free_result($resultado);
 ?>
<div>  
<div class="fleft"><h1>Detalles de </h1></div>
<div class="fright"><a href="<?php echo $location.'?show='.$_GET['show'].'&f_desde='.$_GET['f_desde'].'&f_hasta='.$_GET['f_hasta'].'&periodos='.$_GET['periodos']; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div> 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter fix_font" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>N° Orden de Trabajo</th>
   <th>Fecha</th>
   <th>N° Documento asociado</th>
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrTrabajos as $trabajos) { ?>
  <tr>	
    <td><a target="_blank" href="ver_ot.php?idot=<?php echo $trabajos['idOt']; ?>" ><?php echo n_doc($trabajos['idOt']); ?></a></td>
    <td><?php echo Fecha_estandar($trabajos['f_Termino']); ?></td>
    <td><?php echo n_doc($trabajos['n_Doc']); ?></td>  
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>

	 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['id_job']) ) {
// se trae un listado con los trabajos divididos por las tareas
$arrTareas = array();
$query = "SELECT 
empresas_item_sublist.Nombre AS tarea,
empresas_niveles_nombres.Nombre AS ubicacion,
COUNT(empresas_niveles_nombres.Nombre) AS count_ubicacion
FROM `empresas_ot_tareas`
INNER JOIN `empresas_item_sublist`      ON empresas_item_sublist.idSublist      = empresas_ot_tareas.idSublist
INNER JOIN `empresas_niveles_nombres`   ON empresas_niveles_nombres.idNombre    = empresas_ot_tareas.idNombre
WHERE empresas_ot_tareas.idSublist = {$_GET['id_job']} AND empresas_ot_tareas.f_Inicio BETWEEN '{$_GET['f_desde']}' AND '{$_GET['f_hasta']}'
GROUP BY ubicacion ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTareas,$row );
}
mysql_free_result($resultado); 
 ?>	
<div>  
<div class="fleft"><h1>Detalles de <?php echo $arrTareas[0]['tarea'] ?></h1></div>
<div class="fright"><a href="<?php echo $location.'?show='.$_GET['show'].'&f_desde='.$_GET['f_desde'].'&f_hasta='.$_GET['f_hasta'].'&periodos='.$_GET['periodos']; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre de la Tarea</th> 
   <th width="80">Cantidad</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrTareas as $tareas) { ?>
  <tr> 
   <td><?php echo $tareas['ubicacion']; ?></td>
   <td><?php echo $tareas['count_ubicacion']; ?></td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>

 
 <?php ////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['show']) ) { 
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
?>         
<div>  
<div class="fleft"><h1>Informe mensual de servicios</h1></div>
<div class="fright">
	<a href="<?php echo $location; ?>?view=<?php echo $_GET['show']?>" ><input name="" type="button" value="Volver &raquo;" /></a>
</div>    
<div class="fright">    
    <a target="_blank" href="<?php echo 'enap_ot_inf_01_print.php?show='.$_GET['show'].'&f_desde='.$_GET['f_desde'].'&f_hasta='.$_GET['f_hasta'].'&periodos='.$_GET['periodos']?>" ><input name="" type="button" value="Version Imprimible &raquo;" /></a>
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
		
<h1>II.- ALCANCE DE LOS SERVICIOS</h1>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre</th>
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
</article>


<h1>III.- INFORME GENERAL</h1>
<?php //creacion de variables para sacar totales y subtotales
$vmes='';
$vsumatareas='';
$vcuentatareas='';
$vtotal='';
?>
<article class="module width_full">            
<div class="module_content">
<table class="tablesorter  fix_font" cellspacing="0"> 
 <thead> 
  <tr> 
   <th colspan="7">Nombre</th>
  </tr> 
 </thead>
 <tbody> 
 <?php 
//Filtro la lista en un array multisort
filtrar($row_tarea, 'job'); 
foreach($row_tarea as $tipo=>$productos){ ?>
  <tr style="background-color: #EEE;">
   <?php //verifico el tipo de unidad de medida
   //Si la unidad de medida es mes
   if ($productos[0]['uml_job']=='mes'){?>
   	<td colspan="5">
	<a target="_blank" href="<?php echo $location.'?show='.$_GET['show'].'&f_desde='.$_GET['f_desde'].'&f_hasta='.$_GET['f_hasta'].'&periodos='.$_GET['periodos'].'&trabajos='.$productos[0]['id_job']; ?>" ><?php echo $productos[0]['cat'].' - '.$productos[0]['subcat'].' - '.$tipo ?></a>	
	</td>
    <td width="100">
	<?php echo Valores_sd($productos[0]['vuni_job']).' x '.$productos[0]['uml_job'];
	//guardo temporalmente el valor del ves	
	$vmes=$productos[0]['vuni_job'];
	?>
    </td><td width="90"></td>
    <?php //verifico el tipo de unidad de medida
   //Si la unidad de medida es Gl
   } elseif ($productos[0]['uml_job']=='Gl'){?>
   	<td colspan="5">
	<a target="_blank" href="<?php echo $location.'?show='.$_GET['show'].'&f_desde='.$_GET['f_desde'].'&f_hasta='.$_GET['f_hasta'].'&periodos='.$_GET['periodos'].'&trabajos='.$productos[0]['id_job']; ?>" ><?php echo $productos[0]['cat'].' - '.$productos[0]['subcat'].' - '.$tipo ?></a>	
	</td>
    <td width="100">
	<?php echo Valores_sd($productos[0]['vuni_job']).' x '.$productos[0]['uml_job'];
	//guardo temporalmente el valor del ves	
	$vmes=0;
	?>
    </td>
    <td width="90"></td>
   <?php //excepcion de la unidad de medida
    } else {?>
    <td colspan="2">
    <a target="_blank" href="<?php echo $location.'?show='.$_GET['show'].'&f_desde='.$_GET['f_desde'].'&f_hasta='.$_GET['f_hasta'].'&periodos='.$_GET['periodos'].'&trabajos='.$productos[0]['id_job']; ?>" ><?php echo $productos[0]['cat'].' - '.$productos[0]['subcat'].' - '.$tipo ?></a>
    </td>
    <td><?php echo $productos[0]['suma_job']?></td>
    <td><?php echo $productos[0]['total_job'].'/'.$_GET['periodos']*$productos[0]['vund_job']?></td>  
    <td><?php echo Valores_sd($productos[0]['vuni_job']).' x '.$productos[0]['uml_job']?></td>
    <td><?php echo Valores_sd($productos[0]['suma_job']*$productos[0]['vuni_job'])?></td>
    <td></td>
   <?php //guardo temporalmente el total
     $vmes=$productos[0]['suma_job']*$productos[0]['vuni_job'];
   //fin de la unidad de medida
    }?>
  </tr>
  <?php // si el tip de titulo corresponde a los montos no considerados se realiza busqueda aparte
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
	foreach ($arrCostosRel as $costos) { ?>    
  		<tr> 
  			 <td colspan="5"><?php echo $costos['Texto']; ?></td>
   			<td><?php echo Valores_sd($costos['costo']); ?></td>
   			<td></td>
 		</tr>
 <?php 
 			//en cada ciclo sumamos el valor de los costos del mes al valoor del mes
			$vmes+=$costos['costo'];
 		} // fin del ciclo 	 
   } // fin de la condicion
   //segundo array, el que esta anidado
  foreach($productos as $producto) {  
  //se verifica si el trabajo no tiene tareas, si no es asi condicionar para que no imprima fila vacia
 if (!empty($producto['subjob'])) { ?> 
  <tr> 
   <td colspan="3">
   <?php if ($producto['contar_subjob']!=0) {?>
   <a target="_blank" href="<?php echo $location.'?show='.$_GET['show'].'&f_desde='.$_GET['f_desde'].'&f_hasta='.$_GET['f_hasta'].'&periodos='.$_GET['periodos'].'&id_job='.$producto['id_subjob']; ?>" ><?php echo $producto['subjob']; ?></a>
  <?php } else {
    echo $producto['subjob'];
   }?>
   </td>
   <td><?php echo $producto['frecuencia']; ?></td>
   <td><?php echo $producto['contar_subjob'].'/'.$producto['valor_frec']; ?></td>
   <td>
   <?php // se verifica que las tareas tengan algun valor de seguimiento
   if (!empty($producto['valor_frec'])) {  
   echo Cantidades_cd($producto['contar_subjob']/$producto['valor_frec']) ;
   //guardo temporalmente los valores de las tareas
    $vsumatareas+=$producto['contar_subjob']/$producto['valor_frec'];
	$vcuentatareas++;
    } else { 
    echo '---';
    }  ?>
   </td>
   <td></td>
 </tr> 
 <?php } //cierre del if
 }//cierre del foreach
 ?>
 <tr style="background-color: #DDD;"> 
   <td colspan="5"></td>
  <?php 
  //si la unidad de medida es mes
   if ($vcuentatareas==0) {
	   echo '<td>0</td>';
	   echo '<td>'.Valores_sd($vmes).'</td>';  
	   //sumo el valor al valor total
	   $vtotal+=$vmes;
   } else {
	   if ($productos[0]['uml_job']=='mes') {
	   	$promedio=$vsumatareas/$vcuentatareas;
		$totalmes=$vmes*$promedio;
	   	echo '<td>'.Cantidades_cd($promedio).'</td>' ;
	   	echo '<td>'.Valores_sd($totalmes).'</td>';
		//sumo el valor al valor total
	   $vtotal+=$totalmes;
	   } else {
		 echo '<td>0</td>';
	   echo '<td>'.Valores_sd($vmes).'</td>';  
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
   <td colspan="6">Total del mes</td>
   <td><?php echo Valores_sd($vtotal) ?></td>
</tr>   
	 
 </tbody> 
 </table>
</div>
</article>

<div>
<div class="fright">    
<a target="_blank" href="<?php echo 'enap_ot_inf_01_export.php?show='.$_GET['show'].'&f_desde='.$_GET['f_desde'].'&f_hasta='.$_GET['f_hasta'].'&periodos='.$_GET['periodos']?>" ><input name="" type="button" value="Exportar &raquo;" /></a>
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
    	<td><label>Periodos</label></td>
        <td><select name="periodos" required="">
        	<option value="">Seleccione un periodo</option>
        	<option value="1">1 Año</option>
            <option value="2">2 Años</option>
            <option value="3">3 Años</option>  
        </select><?php echo $errors[3] ?></td>
        <td></td>
        <td></td>
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