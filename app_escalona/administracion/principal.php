<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
/**********************************************************************************************************************************/
/*                                          Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "principal.php";
$location = $original;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Principal</title>
    
    <!-- InstanceEndEditable -->
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">
    <!-- Metis Theme stylesheet -->
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/lib/fullcalendar/fullcalendar.css">
    <!-- Estilo definido por mi -->
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
	<script src="assets/js/personel.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
        <script src="assets/lib/respond/respond.min.js"></script>
        <![endif]-->
    <!--Modernizr 2.7.2-->
    <script src="assets/lib/modernizr/modernizr.min.js"></script>
	<!-- Icono de la pagina -->
	<link rel="icon" type="image/png" href="img/mifavicon.png" />
    <!-- InstanceBeginEditable name="head" -->

    <!-- InstanceEndEditable -->
  </head>
  <body>
    <div id="wrap">
      <div id="top">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
              </button>
              <a href="index.html" class="navbar-brand">
                <img src="img/logo_sm.png" alt="">
              </a> 
            </header>
            <?php require_once 'core/infobox.php';?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <?php require_once 'core/menu_top.php';?>
            </div>
          </div>
        </nav>
        <header class="head">
          <div class="main-bar">
            <h3>
            <!-- InstanceBeginEditable name="titulo" -->
            <i class="fa fa-dashboard"></i> Principal
			<!-- InstanceEndEditable --> </h3>
          </div>
        </header>
      </div>
      <div id="left">
       <?php require_once 'core/userbox.php';?> 
       <?php require_once 'core/menu.php';?> 
      </div>
      <div id="content">
        <div class="outer">
            <div class="inner">
			<!-- InstanceBeginEditable name="Bodytext" -->
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['view_votos']) ) { 
// Se traen los datos de la pregunta efectuada
$arrPregunta = array();
$query = "
SELECT
	preguntas_listado.Pregunta,
	preguntas_respuestas.Respuesta,
	SUM(clientes_votos.Cantidad) AS suma,
	clientes_listado.mesa
FROM
	`preguntas_listado`
LEFT JOIN `preguntas_respuestas` ON preguntas_respuestas.idPregunta = preguntas_listado.idPregunta
LEFT JOIN `clientes_votos` ON clientes_votos.idRespuesta = preguntas_respuestas.idRespuesta
LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
WHERE
	preguntas_listado.idPregunta = {$_GET['view_votos']}
GROUP BY
	preguntas_listado.idPregunta,
	preguntas_respuestas.idRespuesta,
	clientes_listado.mesa
ORDER BY
 clientes_listado.mesa ASC
";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPregunta,$row );
}
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
     var data = google.visualization.arrayToDataTable([
        ['bla',<?php 
		$comparacion='';
		foreach ($arrPregunta as $pregunta) { 
			if($comparacion!=$pregunta['mesa']){
				echo "'mesa ".$pregunta['mesa']."', ";
				$comparacion=$pregunta['mesa'];
			}
		} ?>{ role: 'annotation' } ]<?php 
		filtrar($arrPregunta, 'Respuesta'); 
		foreach($arrPregunta as $tipo=>$componentes){ 
			
			$totalVotos = 0;
			foreach ($componentes as $idcomp) { 
				$totalVotos = $totalVotos + $idcomp['suma'];
			}
			$postulante = $tipo.' ('.$totalVotos.' Votos)';
			
			
			echo ", 
			['".$postulante."',";
			foreach ($componentes as $idcomp) { 
				echo $idcomp['suma'].', ';
			}
			echo "'']";
		}
		
		?>

      ]);

      var options = {
        width: '100%',
        height: '100%',
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
		chartArea: { width: '50%' },
        isStacked: true
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(data, options);
  }
  </script>
  
  
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1"></form>
</div>
<div class="clearfix"></div> 

 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Informacion de las Votaciones</h5>
		</header>        
        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">           
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                <tr class="odd">
                    <td class=" ">
                        <div id="barchart_values" style="width: 100%; height: 900px;"></div>
                    </td>         
                </tr>                   
            </tbody>
        </table>
	</div>
</div> 
 
 
 
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location;?>?votos=true" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>  
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif(! empty($_GET['votos']))  { 
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="WHERE preguntas_listado.idTipoCliente>=0";	
}else{
	$z="WHERE preguntas_listado.idTipoCliente={$arrUsuario['idTipoCliente']}";	
}
$arrPreguntas = array();
$query = "SELECT 
preguntas_listado.idPregunta,
preguntas_listado.Pregunta AS pregunta,
preguntas_categorias.Nombre AS categoria,
preguntas_listado.Estado
FROM `preguntas_listado`
LEFT JOIN `preguntas_categorias` ON preguntas_categorias.idCategorias = preguntas_listado.idCategorias
".$z."
ORDER BY preguntas_categorias.Nombre ASC, preguntas_listado.idPregunta ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPreguntas,$row );
}


?>

<div class="form-group">
<form class="form-horizontal" ></form>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Listas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Categoria</th>
        <th>Lista</th>
        <th>Estado</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrPreguntas as $pregunta) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $pregunta['categoria']; ?></td>
            <td class="word_break"><?php echo cortar($pregunta['pregunta'],120); ?></td>
            <td class=" ">
            <?php 
			switch ($pregunta['Estado']) {
				case 0:
					echo "No asignado";
					break;
				case 1:
					echo "Abierta";
					break;
				case 2:
					echo "Publicada";
					break;
				case 3:
					echo "Cerrada";
					break;	
			}?>
            </td>
			<td class=" "><a href="<?php echo $location.'?view_votos='.$pregunta['idPregunta']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>  
</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location;?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 }elseif ( ! empty($_GET['info3']) ) { 
// Se traen los datos de la pregunta efectuada
$arrPregunta = array();
$query = "
SELECT
	preguntas_listado.Pregunta,
	preguntas_respuestas.Respuesta,
	SUM(clientes_votos.Cantidad) AS suma,
	clientes_listado.mesa
FROM
	`preguntas_listado`
LEFT JOIN `preguntas_respuestas` ON preguntas_respuestas.idPregunta = preguntas_listado.idPregunta
LEFT JOIN `clientes_votos` ON clientes_votos.idRespuesta = preguntas_respuestas.idRespuesta
LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
WHERE
	preguntas_listado.idPregunta = {$_GET['info2']}
	AND clientes_listado.idCiudad = {$_GET['info3']}
GROUP BY
	preguntas_listado.idPregunta,
	preguntas_respuestas.idRespuesta,
	clientes_listado.mesa
ORDER BY
 preguntas_respuestas.Respuesta ASC
";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPregunta,$row );
}	?>

<div class="form-group">
<form class="form-horizontal" ></form>
<a href="<?php echo 'print_inf_2.php?info2='.$_GET['info2'].'&info3='.$_GET['info3']; ?>" class="btn btn-default fright margin_width" >Exportar a Excel</a>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5><?php echo $arrPregunta[0]['Pregunta'];?></h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Candidatos</th>
		 <?php 
		filtrar($arrPregunta, 'Respuesta'); 
		$vuelta = 1;
		foreach($arrPregunta as $tipo=>$componentes){ 
			if($vuelta==1){
				foreach ($componentes as $idcomp) { 
					echo '<th>Mesa '.$idcomp['mesa'].'</th>';
				}
			$vuelta++;
			}
		}?>
		<th>Total</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php 
	foreach($arrPregunta as $tipo=>$componentes){ 
		echo '<tr class="odd">';
		echo '<td>'.$tipo.'</td>';
		$total = 0;
		foreach ($componentes as $idcomp) { 
			echo '<td>'.$idcomp['suma'].'</td>';
			$total = $total + $idcomp['suma'];
		}
		echo '<td>'.$total.'</td>';
		echo '</tr>';
	}?>
    	                   
	</tbody>
</table>  
</div>
</div> 
 
 
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location.'?info2='.$_GET['info2'];?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['info2']) ) { 
// Se traen los datos de la pregunta efectuada
$arrPregunta = array();
$query = "
 SELECT
	preguntas_listado.Pregunta,
	preguntas_respuestas.Respuesta,

(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 1 LIMIT 1 ) AS Region_1,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 2 LIMIT 1 ) AS Region_2,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 3 LIMIT 1 ) AS Region_3,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 4 LIMIT 1 ) AS Region_4,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 5 LIMIT 1 ) AS Region_5,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 6 LIMIT 1 ) AS Region_6,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 7 LIMIT 1 ) AS Region_7,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 8 LIMIT 1 ) AS Region_8,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 9 LIMIT 1 ) AS Region_9,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 10 LIMIT 1 ) AS Region_10,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 11 LIMIT 1 ) AS Region_11,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 12 LIMIT 1 ) AS Region_12,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 13 LIMIT 1 ) AS Region_13,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 14 LIMIT 1 ) AS Region_14,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 15 LIMIT 1 ) AS Region_15

FROM
	`preguntas_listado`
LEFT JOIN `preguntas_respuestas` ON preguntas_respuestas.idPregunta = preguntas_listado.idPregunta

WHERE
	preguntas_listado.idPregunta = {$_GET['info2']}
ORDER BY preguntas_respuestas.Respuesta ASC
";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPregunta,$row );
}
?>

<div class="form-group">
<form class="form-horizontal" ></form>
<a href="print_inf_1.php?info2=<?php echo $_GET['info2']; ?>" class="btn btn-default fright margin_width" >Exportar a Excel</a>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5><?php echo $arrPregunta[0]['Pregunta'];?></h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Candidatos</th>
        <th>1° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=1" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>2° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=2" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>3° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=3" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>4° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=4" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>5° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=5" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>6° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=6" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>7° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=7" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>8° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=8" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>9° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=9" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>10° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=10" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>11° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=11" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>12° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=12" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>13° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=13" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
		<th>14° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=14" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
        <th>15° Region<a href="<?php echo $location;?>?info2=<?php echo $_GET['info2']; ?>&info3=15" title="Ver Detalles" class="icon-ver info-tooltip" ></a></th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrPregunta as $pregunta) { ?>
    	<tr class="odd">
			<td><?php echo $pregunta['Respuesta']; ?></td>
			<td><?php echo $pregunta['Region_1']; ?></td>
			<td><?php echo $pregunta['Region_2']; ?></td>
			<td><?php echo $pregunta['Region_3']; ?></td>
			<td><?php echo $pregunta['Region_4']; ?></td>
			<td><?php echo $pregunta['Region_5']; ?></td>
			<td><?php echo $pregunta['Region_6']; ?></td>
			<td><?php echo $pregunta['Region_7']; ?></td>
			<td><?php echo $pregunta['Region_8']; ?></td>
			<td><?php echo $pregunta['Region_9']; ?></td>
			<td><?php echo $pregunta['Region_10']; ?></td>
			<td><?php echo $pregunta['Region_11']; ?></td>
			<td><?php echo $pregunta['Region_12']; ?></td>
			<td><?php echo $pregunta['Region_13']; ?></td>
			<td><?php echo $pregunta['Region_14']; ?></td>
			<td><?php echo $pregunta['Region_15']; ?></td>  
		</tr>
    <?php } ?>                    
	</tbody>
</table>  
</div>
</div> 
  

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location;?>?info1=true" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif(! empty($_GET['info1']))  { 
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="WHERE preguntas_listado.idTipoCliente>=0";	
}else{
	$z="WHERE preguntas_listado.idTipoCliente={$arrUsuario['idTipoCliente']}";	
}
$arrPreguntas = array();
$query = "SELECT 
preguntas_listado.idPregunta,
preguntas_listado.Pregunta AS pregunta,
preguntas_categorias.Nombre AS categoria,
preguntas_listado.Estado
FROM `preguntas_listado`
LEFT JOIN `preguntas_categorias` ON preguntas_categorias.idCategorias = preguntas_listado.idCategorias
".$z."
ORDER BY preguntas_categorias.Nombre ASC, preguntas_listado.idPregunta ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPreguntas,$row );
}


?>

<div class="form-group">
<form class="form-horizontal" ></form>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Listas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Categoria</th>
        <th>Lista</th>
        <th>Estado</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrPreguntas as $pregunta) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $pregunta['categoria']; ?></td>
            <td class="word_break"><?php echo cortar($pregunta['pregunta'],120); ?></td>
            <td class=" ">
            <?php 
			switch ($pregunta['Estado']) {
				case 0:
					echo "No asignado";
					break;
				case 1:
					echo "Abierta";
					break;
				case 2:
					echo "Publicada";
					break;
				case 3:
					echo "Cerrada";
					break;	
			}?>
            </td>
			<td class=" "><a href="<?php echo $location.'?info2='.$pregunta['idPregunta']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>  
</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location;?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 }else{ ?>               
<div class="col-lg-12">
	<div class="box">	
		<header>		
			<h5>Listado de opciones</h5>		
			<div class="toolbar"></div>	
		</header>
		<div class="body">
			<a href="<?php echo $location;?>?votos=true" class="btn btn-primary fleft" style="margin:5px;"  >Ver Resultados Votaciones</a>
			<a href="<?php echo $location;?>?info1=true" class="btn btn-primary fleft" style="margin:5px;"  >Ver informes Detallados</a>
   
			 
			<div class="clearfix"></div>
		</div>
	</div>
</div>            
        
<?php } ?>             
			<!-- InstanceEndEditable -->   
            </div>
        </div>
      </div> 
    </div>
    <?php require_once 'core/footer.php';?>
    <!--jQuery 2.1.0 -->
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <!--Bootstrap -->
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- Screenfull -->
    <script src="assets/lib/screenfull/screenfull.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script src="assets/lib/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/lib/jquery.tablesorter/jquery.tablesorter.min.js"></script>
    <script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/lib/flot/jquery.flot.js"></script>
    <script src="assets/lib/flot/jquery.flot.selection.js"></script>
    <script src="assets/lib/flot/jquery.flot.resize.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>