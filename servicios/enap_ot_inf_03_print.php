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
//se cargan variables extras para las busquedas
$month=Fecha_mes_n($_GET['f_desde']);
$year=Fecha_año($_GET['f_desde']);

//Se traen las tareas hechas en el mes
$query = "SELECT 
date_format(empresas_ot_listado.f_Inicio,'%b') AS mes,
date_format(empresas_ot_listado.f_Inicio,'%c') AS n_mes,
empresas_item_cat.Nombre_cat AS cat,
empresas_item_cat.Nombre_Sub AS subcat,
empresas_item_list.Nombre AS job,
empresas_item_list.v_unitario AS vuni_job,
empresas_item_list.idItemlist AS id_job,
(SELECT SUM(cantidad) FROM empresas_ot_listado WHERE idItemlist = id_job AND f_Inicio BETWEEN '{$_GET['f_desde']}' AND '{$_GET['f_hasta']}' AND empresas_ot_listado.estado='9' ) AS cantidad,

empresas_ot_listado.idOt AS id,
(SELECT SUM(costo) FROM empresas_ot_costosrel WHERE idOt = id ) AS costos_rel

FROM `empresas_ot_listado`
INNER JOIN `empresas_item_list`       ON empresas_item_list.idItemlist    = empresas_ot_listado.idItemlist
INNER JOIN `empresas_item_cat`        ON empresas_item_cat.idItemcat      = empresas_item_list.idItemcat
LEFT JOIN `empresas_ot_tareas`        ON empresas_ot_tareas.idOt          = empresas_ot_listado.idOt
WHERE empresas_ot_listado.idEmpresa = '{$_GET['emp']}' AND empresas_ot_listado.f_Inicio BETWEEN '{$_GET['f_desde']}' AND '{$_GET['f_hasta']}' AND empresas_ot_listado.estado='9' AND empresas_item_list.cobro='3'
GROUP BY n_mes,job ";
$resultado = mysql_query ($query, $dbConn);
while ($row_tarea[] = mysql_fetch_assoc ($resultado));
mysql_free_result($resultado);
array_pop($row_tarea);
array_multisort($row_tarea, SORT_DESC);

//Traer las tareas y verificar las realizadas
$query = "SELECT 
empresas_item_sublist.Nombre AS nombre_tarea,
empresas_item_list.Nombre AS nombre_job,
empresas_item_sublist.idFrecuencia AS id_frecuencia,
(SELECT valor FROM empresas_ot_prog WHERE idFrecuencia = id_frecuencia AND month = {$month} AND year = {$year} ) AS valor_frec,
date_format(empresas_ot_tareas.f_Inicio,'%b') AS mes,
date_format(empresas_ot_tareas.f_Inicio,'%c') AS n_mes,
COUNT(empresas_ot_tareas.idSublist) AS cuenta,
empresas_item_list.v_unitario AS valor_job

FROM `empresas_item_sublist`
INNER JOIN `empresas_item_list`          ON empresas_item_list.idItemlist            = empresas_item_sublist.idItemlist
LEFT JOIN `empresas_ot_tareas`           ON empresas_ot_tareas.idSublist             = empresas_item_sublist.idSublist

WHERE empresas_item_list.idEmpresa = '{$_GET['emp']}' AND empresas_item_list.cobro='2' 
GROUP BY n_mes , nombre_job, nombre_tarea 
ORDER BY nombre_job, nombre_tarea";
$resultado = mysql_query ($query, $dbConn);
while ($row_subjob[] = mysql_fetch_assoc ($resultado));
mysql_free_result($resultado);
array_pop($row_subjob);


//TRAIGO TODOS LOS ITEMS DE CARGO FIJO EN EL MES
$arrTemp = array();
$query = "SELECT 
empresas_item_cat.Nombre_cat AS cat,
empresas_item_cat.Nombre_Sub AS subcat,
empresas_item_list.Nombre AS job,
empresas_item_list.v_unitario AS vuni_job,
empresas_listado.Nombre AS nombre_empresa,
valor_contrato.Valorizacion
FROM `empresas_item_list`
LEFT JOIN `empresas_item_cat`        ON empresas_item_cat.idItemcat           = empresas_item_list.idItemcat
LEFT JOIN `empresas_listado`         ON empresas_listado.idEmpresa            = empresas_item_list.idEmpresa
LEFT JOIN `valor_contrato`           ON valor_contrato.idEmpresa              = empresas_item_list.idEmpresa
WHERE empresas_item_list.idEmpresa = '{$_GET['emp']}' AND empresas_item_list.cobro ='1'  
ORDER BY cat, subcat, job";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push($arrTemp,$row );
}	
mysql_free_result($resultado);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informe Comparativo por mes</title>
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
<h1>Informe Comparativo por mes</h1>
<p><strong>Empresa :</strong><?php echo $arrTemp[0]['nombre_empresa']; ?></p>
<p><strong>Desde :</strong><?php echo Fecha_estandar($_GET['f_desde']) ?></p>
<p><strong>Hasta :</strong><?php echo Fecha_estandar($_GET['f_hasta']) ?></p>
</div>
</div>
<div class="clear"></div>


<div class="content-listado" >
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th colspan="6">Comparativo</th>
  </tr> 
 </thead>
 <tbody> 


<?php
//Variables vacias a utilizar
$subtotal_segun='';
$subtotal_fijos='';
$temp1='';
$temp2='';
$total_vertical='';
$total_horizontal='';
//traspaso las fechas ingresadas a valores 
$mes_inicio=Fecha_mes_n($_GET['f_desde']);
$mes_termino=Fecha_mes_n($_GET['f_hasta']);
//calculo la cantidad de meses a revisar
$cant_meses=$mes_termino-$mes_inicio;?>

<tr><td style="background-color: #EEE;">Meses</td>
<?php
for ($i = $mes_inicio; $i <= $mes_termino; $i++) {
	echo '<td style="background-color: #EEE; width: 90px; ">'.Numero_a_mes($i).'</td>'; 
} //fin bucle for
echo '<td style="background-color: #EEE; width: 90px; ">Acumulado</td>';
echo '</tr>';	



echo '<tr><td colspan="'.($cant_meses+3).'" style="background-color: #EEE;">Cobros Segun trabajos Realizados por Tarea</td></tr>';
for ($i = $mes_inicio; $i <= $mes_termino; $i++) {
// Se establecen variables en 0
$cuenta=0;
$cuenta_0=0;
$valor_trabajo=0;
$valor=0;
$new_array = array();
filtrar($row_subjob, 'nombre_tarea'); 
foreach($row_subjob as $tipo=>$productos){	
 foreach($productos as $producto) { 
 
 if(isset($new_array[$producto['nombre_job']])){
	 
		if ($producto['n_mes']==$i) {
	   		if ($producto['valor_frec']==0) {
				$cuenta_0+= 1;
	   		} else {
		 		$valor +=$producto['cuenta']/$producto['valor_frec']; 
	   		} //fin si
		} else {
			if ($producto['valor_frec']==0) {
				$cuenta_0+= 1;
	   		} 
			
   		} //fin si 
		$cuenta += 1 ;
		$valor_trabajo=$producto['valor_job'];
		$new_array[$producto['nombre_job']]= array('valor' => $valor, 'cuenta' => $cuenta, 'cuenta_0' => $cuenta_0, 'trabajo' => $valor_trabajo, 'n_mes' => $producto['n_mes']) ;
	}else{
		$valor=0;
	
		if ($producto['n_mes']==$i) {
	   		if ($producto['valor_frec']==0) {
	 			$cuenta_0=1;
	   		} else {
		 		$valor=$producto['cuenta']/$producto['valor_frec']; 
		
	   		} //fin si
			} else {
			if ($producto['valor_frec']==0) {
				$cuenta_0= 1;
	   		} 
   		} //fin si 
		$cuenta = 1 ;
		$valor_trabajo=0;
		$new_array[$producto['nombre_job']]= array('valor' => $valor, 'cuenta' => $cuenta, 'cuenta_0' => $cuenta_0, 'trabajo' => $valor_trabajo, 'n_mes' => $producto['n_mes']) ;
    }

  } //fin segundo foreach
} //fin primer foreach
foreach ($new_array as $area => $n) {
echo '<tr><td>'.$area.'</td>'; 	
for ($i = $mes_inicio; $i <= $mes_termino; $i++) {
   if ($producto['n_mes']==$i) {
	$proporcional=$n['trabajo']*($n['valor']/($n['cuenta']-$n['cuenta_0']));
	echo '<td>'.Valores_sd($proporcional).'</td>'; 
	//voy sumando el valor para luego imprimirlo mas tarde
	$total_vertical+=$proporcional;
   } else {
		 echo '<td></td>';  
   } //fin si
} //fin bucle for 
//imprimo el total vertical
echo '<td>'.Valores_sd($total_vertical).'</td>';
//reseteo la variable para volcer a sumar
$total_vertical=0;
    echo '</tr>';
	}//fin foreach


echo '<tr><td style="background-color: #EEE;">Subtotal segun trabajos realizados por Tarea</td>';
for ($i = $mes_inicio; $i <= $mes_termino; $i++) {
// Se resetea la variable a 0
$subtotal_tarea=0;
foreach ($new_array as $area => $n) {
   if ($producto['n_mes']==$i) {
	   $proporcional=$n['trabajo']*($n['valor']/($n['cuenta']-$n['cuenta_0']));
		 $subtotal_tarea+=$proporcional; 
		 //voy sumando el valor para luego imprimirlo mas tarde
		 $total_vertical+=$proporcional;   
   } //fin si  
  } //fin segundo foreach
echo '<td style="background-color: #EEE;">'.Valores_sd($subtotal_tarea).'</td>';	
 } //fin bucle for
 //imprimo el total vertical
echo '<td style="background-color: #EEE;">'.Valores_sd($total_vertical).'</td>';
//reseteo la variable para volcer a sumar
$total_vertical=0;
 echo '</tr>';
	
 } //fin bucle for


    

	
 ?>


<tr><td colspan="<?php echo  $cant_meses+3 ?>" style="background-color: #EEE;">Cobros Segun trabajos Realizados por Solicitud</td></tr>
<?php 
//Filtro la lista en un array multisort
filtrar($row_tarea, 'job'); 
foreach($row_tarea as $tipo=>$productos){
//titulo de la matriz 
echo '<tr><td>'.$productos[0]['cat'].' - '.$productos[0]['subcat'].' - '.$tipo.'</td>';
//Imprimo el contenido del primer multisort
 foreach($productos as $producto) { 
 //condiciono el inicio de i al mes de inicio y el fin del mismo al mes de termino
for ($i = $mes_inicio; $i <= $mes_termino; $i++) {
  //verifico si lo que imprimo corresponde al mes
   if ($producto['n_mes']==$i) {
	   
	   //si la categoria corresponde a los montos no considerados, trae otro valor que proviene de otra tabla
	   if ($producto['cat'] == 'Cat D: Montos no considerados') {
		   //guardo el job actual, para mas tarde compararlo
	   $temp1=$tipo;
		 echo '<td>'.Valores_sd($producto['costos_rel']).'</td>';
		 //voy sumando el valor para luego imprimirlo mas tarde
		 $total_vertical+=$producto['costos_rel'];
	   } else {
		   
		 echo '<td>'.Valores_sd($producto['vuni_job']*$producto['cantidad']).'</td>';
		 //voy sumando el valor para luego imprimirlo mas tarde
		 $total_vertical+=$producto['vuni_job']*$producto['cantidad'];   
	   }
	// si el mes no corresponde
   } else {
	   //verifico si el job es el mismo, si es uno distinto improme la celda, esto evita el descuadre de la matriz
	   if ($temp1!=$tipo){
		 echo '<td></td>';  
	   }   
   } //fin si
} //fin bucle for
} //fin segundo foreach
//imprimo el total vertical
echo '<td>'.Valores_sd($total_vertical).'</td>';
//reseteo la variable para volcer a sumar
$total_vertical=0;
echo '</tr>';
} //fin primer foreach ?>



<?php
echo '<tr><td style="background-color: #EEE;">Subtotal segun trabajos realizados por Solicitud</td>';
for ($i = $mes_inicio; $i <= $mes_termino; $i++) {
// Se resetea la variable a 0
$subtotal_segun=0;
foreach($row_tarea as $tipo=>$productos){	
 foreach($productos as $producto) { 
   if ($producto['n_mes']==$i) {
	   if ($producto['cat'] == 'Cat D: Montos no considerados') {
		 $subtotal_segun+=$producto['costos_rel'];
		 //voy sumando el valor para luego imprimirlo mas tarde
		 $total_vertical+=$producto['costos_rel'];  
	   } else {
		 $subtotal_segun+=$producto['vuni_job']*$producto['cantidad']; 
		 //voy sumando el valor para luego imprimirlo mas tarde
		 $total_vertical+=$producto['vuni_job']*$producto['cantidad'];   
	   } //fin si
   } //fin si  
  } //fin segundo foreach
} //fin primer foreach
echo '<td style="background-color: #EEE;">'.Valores_sd($subtotal_segun).'</td>';	
 } //fin bucle for
 //imprimo el total vertical
echo '<td style="background-color: #EEE;">'.Valores_sd($total_vertical).'</td>';
//reseteo la variable para volcer a sumar
$total_vertical=0;
 echo '</tr>'; ?>
 
 


<tr><td colspan="<?php echo  $cant_meses+3 ?>" style="background-color: #EEE;">Cobros fijos</td></tr>
 <?php foreach($arrTemp as $producto) { ?> 
  <tr> 
   <td><?php echo $producto['cat'].' - '.$producto['subcat'].' - '.$producto['job']; ?></td>
   <?php // agrego un for para repetir los mismos valores los meses necesarios
   for ($i = $mes_inicio; $i <= $mes_termino; $i++) {
	  echo '<td>'.Valores_sd($producto['vuni_job']).'</td>';
	  //voy sumando el valor para luego imprimirlo mas tarde
	  $total_vertical+=$producto['vuni_job'];
	} //fin bucle for
	//guardo los valores en una variable
	$subtotal_fijos+=$producto['vuni_job'];
	//imprimo el total vertical
echo '<td>'.Valores_sd($total_vertical).'</td>';
//reseteo la variable para volcer a sumar
$total_vertical=0;?>
 </tr> 
<?php } ?>
 
 
<tr>
	<td colspan="1" style="background-color: #EEE;">Subtotal Fijos</td>
     <?php for ($i = $mes_inicio; $i <= $mes_termino; $i++) {
	  echo '<td style="background-color: #EEE;">'.Valores_sd($subtotal_fijos).'</td>'; 
	  //voy sumando el valor para luego imprimirlo mas tarde
	  $total_vertical+=$subtotal_fijos;
	} //fin bucle for 
	//imprimo el total vertical
echo '<td style="background-color: #EEE;">'.Valores_sd($total_vertical).'</td>';
//reseteo la variable para volcer a sumar
$total_vertical=0;?>
</tr> 


 
<?php
echo '<tr><td style="background-color: #EEE;">Total General</td>';
for ($i = $mes_inicio; $i <= $mes_termino; $i++) {
// Se resetea la variable a 0
$subtotal_segun=0;
foreach($row_tarea as $tipo=>$productos){	
 foreach($productos as $producto) { 
   if ($producto['n_mes']==$i) {
	   if ($producto['cat'] == 'Cat D: Montos no considerados') {
		 $subtotal_segun+=$producto['costos_rel'];  
	   } else {
		 $subtotal_segun+=$producto['vuni_job']*$producto['cantidad'];    
	   } //fin si
   } //fin si  
  } //fin segundo foreach
} //fin primer foreach
echo '<td style="background-color: #EEE;">'.Valores_sd($subtotal_segun+$subtotal_fijos+$subtotal_tarea).'</td>';
//voy sumando el valor para luego imprimirlo mas tarde
	  $total_vertical+=$subtotal_segun+$subtotal_fijos+$subtotal_tarea;	
 } //fin bucle for
 //imprimo el total vertical
echo '<td style="background-color: #EEE;">'.Valores_sd($total_vertical).'</td>';
//reseteo la variable para volcer a sumar
$total_vertical=0;
 echo '</tr>'; ?>
 
<tr><td style="background-color: #EEE;">Presupuesto de la empresa</td>
<?php
$subtotal_presupuesto='';
for ($i = $mes_inicio; $i <= $mes_termino; $i++) {
	echo '<td style="background-color: #EEE;">'.Valores_sd($arrTemp[0]['Valorizacion']).'</td>';
	$subtotal_presupuesto+=$arrTemp[0]['Valorizacion'];
} //fin bucle for
echo '<td style="background-color: #EEE;">'.Valores_sd($subtotal_presupuesto).'</td>';
echo '</tr>'; ?>

 </tbody> 
 </table>
</div>



<?php
//declaro variables vacias
$total_costos='';
$alto_grafico=200;//valores del alto del grafico
$separacion_grafico=100;//valores del alto del grafico
$porcentaje='';
$n_mes2=1;
echo '<div class="clear"></div>';
echo '<h2>Grafico Informe de costos por mes</h1>';
echo '<ul class="barGraph" style=" height:'.($alto_grafico+100).'px">';
for ($i = $mes_inicio; $i <= $mes_termino; $i++) {
// Se resetea la variable a 0
$subtotal_segun=0;
foreach($row_tarea as $tipo=>$productos){	
 foreach($productos as $producto) { 
   if ($producto['n_mes']==$i) {
	   if ($producto['cat'] == 'Cat D: Montos no considerados') {
		 $subtotal_segun+=$producto['costos_rel'];  
	   } else {
		 $subtotal_segun+=$producto['vuni_job']*$producto['cantidad'];    
	   } //fin si
   } //fin si  
  } //fin segundo foreach
} //fin primer foreach
$total_costos=$subtotal_segun+$subtotal_fijos+$subtotal_tarea;
$porcentaje=($total_costos/$arrTemp[0]['Valorizacion'])*$alto_grafico;
echo '<li class="p1" style="height: '.$alto_grafico.'px; left: '.($separacion_grafico*$n_mes2).'px;"></br>'.Valores_sd($arrTemp[0]['Valorizacion']).'</li>';
echo '<li class="p2" style="height: '.$porcentaje.'px; left: '.($separacion_grafico*$n_mes2).'px;"></br>'.Numero_a_mes($i).'</br>'.Valores_sd($total_costos).'</li>';
//sumo 1 al mes para correr el grafico
$n_mes2++;
 } //fin bucle for
echo '</ul>'; ?>
 

</div>

</div>
</body>
</html>