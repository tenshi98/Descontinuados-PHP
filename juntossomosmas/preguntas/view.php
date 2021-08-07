<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once 'AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once 'AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                                 Se realiza la consulta                                                         */
/**********************************************************************************************************************************/
$query = "SELECT
preguntas.Pregunta,
preguntas.Opcion1,
preguntas.Opcion2,
preguntas.Opcion3,
preguntas.Opcion4,
preguntas.Opcion5,
preguntas.Estado,
(SELECT COUNT(Respuesta) FROM preguntas_resp WHERE idPregunta = preguntas.idPregunta AND Respuesta = '1') AS resp_opcion1,
(SELECT COUNT(Respuesta) FROM preguntas_resp WHERE idPregunta = preguntas.idPregunta AND Respuesta = '2') AS resp_opcion2,
(SELECT COUNT(Respuesta) FROM preguntas_resp WHERE idPregunta = preguntas.idPregunta AND Respuesta = '3') AS resp_opcion3,
(SELECT COUNT(Respuesta) FROM preguntas_resp WHERE idPregunta = preguntas.idPregunta AND Respuesta = '4') AS resp_opcion4,
(SELECT COUNT(Respuesta) FROM preguntas_resp WHERE idPregunta = preguntas.idPregunta AND Respuesta = '5') AS resp_opcion5
FROM preguntas
WHERE idPregunta = '{$_GET['view']}' ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
//Se generan los datos
$var_total = $row_data['resp_opcion1']+ $row_data['resp_opcion2']+ $row_data['resp_opcion3']+ $row_data['resp_opcion4']+ $row_data['resp_opcion5'];
$por_opcion1 = ($row_data['resp_opcion1']/$var_total)*100;
$por_opcion2 = ($row_data['resp_opcion2']/$var_total)*100;
$por_opcion3 = ($row_data['resp_opcion3']/$var_total)*100;
$por_opcion4 = ($row_data['resp_opcion4']/$var_total)*100;
$por_opcion5 = ($row_data['resp_opcion5']/$var_total)*100;
//Verifico si existe la respuesta
if(isset($row_data['Opcion1'])&&$row_data['Opcion1']!=''){ $resp_1 = 1;}else{$resp_1 = 0;};
if(isset($row_data['Opcion2'])&&$row_data['Opcion2']!=''){ $resp_2 = 1;}else{$resp_2 = 0;};
if(isset($row_data['Opcion3'])&&$row_data['Opcion3']!=''){ $resp_3 = 1;}else{$resp_3 = 0;};
if(isset($row_data['Opcion4'])&&$row_data['Opcion4']!=''){ $resp_4 = 1;}else{$resp_4 = 0;};
if(isset($row_data['Opcion5'])&&$row_data['Opcion5']!=''){ $resp_5 = 1;}else{$resp_5 = 0;};
$total_respuestas = $resp_1 + $resp_2 + $resp_3 + $resp_4 + $resp_5;
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
		['Opcion', 'Porcentaje']
          <?php if($resp_1!=0){ ?>,['<?php echo $row_data['Opcion1'] ?>', <?php echo Cantidades_sd($por_opcion1) ?>]<?php }?>
		  <?php if($resp_2!=0){ ?>,['<?php echo $row_data['Opcion2'] ?>', <?php echo Cantidades_sd($por_opcion2) ?>]<?php }?>
		  <?php if($resp_3!=0){ ?>,['<?php echo $row_data['Opcion3'] ?>', <?php echo Cantidades_sd($por_opcion3) ?>]<?php }?>
		  <?php if($resp_4!=0){ ?>,['<?php echo $row_data['Opcion4'] ?>', <?php echo Cantidades_sd($por_opcion4) ?>]<?php }?>
		  <?php if($resp_5!=0){ ?>,['<?php echo $row_data['Opcion5'] ?>', <?php echo Cantidades_sd($por_opcion5) ?>]<?php }?>
        ]);

        var options = {
          title: '<?php echo $row_data['Pregunta'] ?>',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
	<link href="css/estilo.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
<div style="width: 900px; height: 500px;">
<table class="bordered">
    <thead>
    	<tr>
        	<th>Respuestas</th>
            <th width="120">Cantidad</th>
            <th width="120">Porcentaje</th>
        </tr>
    </thead>
    <tbody>
		<?php if($resp_1!=0){ ?>
		<tr>
			<td><?php echo $row_data['Opcion1'] ?></td>
			<td><?php echo Cantidades_sd($row_data['resp_opcion1']) ?></td>
			<td><?php echo porcentaje_cd($por_opcion1) ?></td>
		</tr>
		<?php }?>
        <?php if($resp_2!=0){ ?>
		<tr>
			<td><?php echo $row_data['Opcion2'] ?></td>
			<td><?php echo Cantidades_sd($row_data['resp_opcion2']) ?></td>
			<td><?php echo porcentaje_cd($por_opcion2) ?></td>
		</tr>
		<?php }?>
        <?php if($resp_3!=0){ ?>
		<tr>
			<td><?php echo $row_data['Opcion3'] ?></td>
			<td><?php echo Cantidades_sd($row_data['resp_opcion3']) ?></td>
			<td><?php echo porcentaje_cd($por_opcion3) ?></td>
		</tr>
		<?php }?>
        <?php if($resp_4!=0){ ?>
		<tr>
			<td><?php echo $row_data['Opcion4'] ?></td>
			<td><?php echo Cantidades_sd($row_data['resp_opcion4']) ?></td>
			<td><?php echo porcentaje_cd($por_opcion4) ?></td>
		</tr>
		<?php }?>
        <?php if($resp_5!=0){ ?>
		<tr>
			<td><?php echo $row_data['Opcion5'] ?></td>
			<td><?php echo Cantidades_sd($row_data['resp_opcion5']) ?></td>
			<td><?php echo porcentaje_cd($por_opcion5) ?></td>
		</tr>
		<?php }?>
          
  
    	<tr class="subtitle">
        	<td>Total respuestas</td>
            <td><?php echo $var_total ?></td>
            <td>100%</td>
        </tr>
        
        
        

    </tbody>
</table>
</div>
    
  </body>
</html>