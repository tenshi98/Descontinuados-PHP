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
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
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
$original = "preguntas_listado.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear usuario
if ( ! empty($_GET['new']) ) { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/preguntas_listado.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_edit']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location .='&id='.$_GET['id'];
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/preguntas_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/preguntas_listado_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/preguntas_listado.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location.='&delete=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/preguntas_listado.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_resp']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location .='&id='.$_GET['id'];
	$location.='&addresp=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/preguntas_respuestas.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/preguntas_respuestas_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/preguntas_respuestas.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_edit_resp']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location .='&id='.$_GET['id'];
	$location.='&editresp=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/preguntas_respuestas.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/preguntas_respuestas_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/preguntas_respuestas.php';
}
//se borra un dato
if ( !empty($_GET['delresp']) )     {
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location .='&id='.$_GET['id'];
	$location.='&deleteresp=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/preguntas_respuestas.php';
}


?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title><?php echo $rowlevel['nombre_transaccion']; ?></title>
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
            <i class="fa fa-dashboard"></i> <?php echo $rowlevel['nombre_transaccion']; ?>
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
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php  if (isset($errors[3])) {echo $errors[3];}?>
<?php  if (isset($errors[4])) {echo $errors[4];}?>
<?php  if (isset($_GET['create'])) {?>
<div id="txf_03" class="alert_sucess">  
	Pregunta Creada correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Pregunta Modificada correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  
	Pregunta borrada correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['addresp'])) {?>
<div id="txf_03" class="alert_sucess">  
	Respuesta creada correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['editresp'])) {?>
<div id="txf_03" class="alert_sucess">  
	Respuesta editada correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['deleteresp'])) {?>
<div id="txf_03" class="alert_sucess">  
	Respuesta borrada correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['details']) ) { 
//Se inicializa el paginador de resultados
//tomo el numero de la pagina si es que este existe
if(isset($_GET["details"])){
	$num_pag = $_GET["details"];	
} else {
	$num_pag = 1;	
}
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//resto de variables
if (!$num_pag){
	$comienzo = 0 ;
	$num_pag = 1 ;
} else {
	$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
$z="WHERE clientes_votos.idPregunta = {$_GET['view']}";
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search'] != ''){
	$z .=" AND clientes_votos.idRespuesta={$_GET['search']}";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idVoto FROM `clientes_votos` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrRespondidas = array();
$query = "SELECT 
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
preguntas_respuestas.Respuesta
FROM `clientes_votos`
LEFT JOIN `clientes_listado`      ON clientes_listado.idCliente        = clientes_votos.idCliente
LEFT JOIN `preguntas_respuestas`  ON preguntas_respuestas.idRespuesta  = clientes_votos.idRespuesta
".$z."
ORDER BY clientes_listado.Apellido_Paterno ASC, clientes_listado.Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRespondidas,$row );
}
//Listado con las respuestas
$arrRespuestas = array();
$query = "SELECT  idRespuesta, Respuesta
FROM `preguntas_respuestas`
WHERE idPregunta = {$_GET['view']}
ORDER BY Respuesta ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRespuestas,$row );
}
?>
<?php 
$location .='?pagina='.$_GET['pagina'];
$location .='&view='.$_GET['view'];
$location .='&details='.$_GET['details'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Filtrar por respuesta</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
            <input type="hidden" name="view" value="<?php echo $_GET['view']; ?>" >
            <input type="hidden" name="details" value="<?php echo $_GET['details']; ?>" >        
            <select class="form-control" name="search" >
                <option value="" selected="selected">Seleccione una Respuesta</option>  
                <?php foreach ($arrRespuestas as $resp) { ?>
                <option value="<?php echo $resp['idRespuesta']; ?>" <?php if(isset($_GET['search'])&&$_GET['search']==$resp['idRespuesta']) {echo 'selected="selected"';} ?>><?php echo $resp['Respuesta']; ?></option>
                <?php } ?>         
			</select>
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onClick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Preguntas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Usuario</th>
        <th>Respuesta</th>
    </tr>
	</thead>                   
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrRespondidas as $respondidas) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $respondidas['Nombre'].' '.$respondidas['Apellido_Paterno']; ?></td>
            <td class="word_break"><?php echo cortar($respondidas['Respuesta'],120); ?></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<?php 
//Verifico si hay mas de una pagina, sino coulto el paginador
if($total_paginas>1){
//Cargamos la ubicacion original
$location = $original;
$location .='?pagina='.$_GET['pagina'];
$location .='&view='.$_GET['view'];
$location .='&details=';
if (isset($_GET['search'])) { 
$x ='&search='.$_GET['search'];
} else {
$x='';	
}?>
    <div class="row">
        <div class="contaux">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination menucent">
                	<?php if(($num_pag - 1) > 0) { ?>
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">← Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">← Anterior</a></li>
                    <?php } ?>
                    
                    <?php if ($total_paginas>10){
						if(0>$num_pag-5){
							for ($i = 1; $i <= 10; $i++) { ?>
							<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
							<?php }
						}elseif($total_paginas<$num_pag+5){
							for ($i = $num_pag-5; $i <= $total_paginas; $i++) { ?>
							<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
							<?php }	
						}else{
							for ($i = $num_pag-4; $i <= $num_pag+5; $i++) { ?>
							<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
							<?php }	
						}		
					}else{
						for ($i = 1; $i <= $total_paginas; $i++) { ?>
                   		<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
                        <?php }
						}?>
                    <?php if(($num_pag + 1)<=$total_paginas) { ?>
                    <li class="next"><a href="<?php echo $location.($num_pag+1).$x ?>">Siguiente → </a></li>
                    <?php } else {?>
                    <li class="next disabled"><a href="">Siguiente → </a></li>
                    <?php } ?>
                </ul>
            </div> 
        </div>
    </div>
<?php }?>   
</div>
</div> 
 
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<?php //Agrego las ubicaciones
//Cargamos la ubicacion original
$location = $original;
$location .='?pagina='.$_GET['pagina'];
$location .='&view='.$_GET['view'];?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 }elseif ( ! empty($_GET['view']) ) { 
// Se traen los datos de la pregunta efectuada
$arrPregunta = array();
$query = "SELECT
preguntas_listado.Pregunta,
preguntas_respuestas.Respuesta,
COUNT(clientes_votos.idRespuesta) AS conteo
FROM `preguntas_listado`
LEFT JOIN `preguntas_respuestas` ON preguntas_respuestas.idPregunta = preguntas_listado.idPregunta
LEFT JOIN `clientes_votos` ON clientes_votos.idRespuesta = preguntas_respuestas.idRespuesta
WHERE preguntas_listado.idPregunta = {$_GET['view']}
GROUP BY preguntas_listado.idPregunta, preguntas_respuestas.idRespuesta ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPregunta,$row );
}
//Verifico si existe la variable de busqueda y pagina
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Respuestas', 'Votos']
			<?php foreach ($arrPregunta as $pregunta) { ?>
				,['<?php echo $pregunta['Respuesta']; ?>',     <?php echo $pregunta['conteo']; ?>]
			<?php } ?>
        ]);

        var options = {
          title: '<?php echo $arrPregunta[0]['Pregunta']; ?>',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1"></form>
<?php if ($rowlevel['level']>=1){?>
<?php $sub='&view='.$_GET['view'];?>
	<a href="<?php echo $location.$sub; ?>&details=1" class="btn btn-default fright margin_width" >Ver detalles de los votos</a>
<?php } ?>
</div>
<div class="clearfix"></div> 

 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Informacion de la Pregunta</h5>
		</header>        
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
                  
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="odd">
			<td class=" ">
				<div id="piechart_3d" style="width: 100%; height: 500px;"></div>

            </td>         
		</tr>                   
	</tbody>
</table>
 
</div>
</div> 
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 }elseif ( ! empty($_GET['idrresp']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT  Respuesta
FROM `preguntas_respuestas`
WHERE idRespuesta = {$_GET['idrresp']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion de la Respuesta</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Respuesta</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Respuesta" class="form-control" value="<?php if(isset($Respuesta)) {echo $Respuesta;} else {echo $rowdata['Respuesta'];}?>"  name="Respuesta" required>
				</div>
			</div>
 
			<div class="form-group">
            	<input type="hidden" value="<?php echo $_GET['idrresp']; ?>" name="idRespuesta">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit_resp"> 
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				$location .='?pagina='.$_GET['pagina'];
				if (isset($_GET['search'])) { 
				$location .='&search='.$_GET['search'];
				}
				$location .='&id='.$_GET['id'];?>
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>




<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['id']) ) { 
// Se traen los datos de las categorias
$query = "SELECT idCategorias, Pregunta, Estado, idTipoCliente
FROM `preguntas_listado`
WHERE idPregunta = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// se traen todas las categorias
$arrCategorias = array();
$query = "SELECT idCategorias, Nombre
FROM `preguntas_categorias`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
// se tren todas las respuesta de la pregunta
$arrRespuestas = array();
$query = "SELECT idRespuesta, Respuesta
FROM `preguntas_respuestas`
WHERE idPregunta = {$_GET['id']}
ORDER BY Respuesta ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRespuestas,$row );
} ?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Pregunta</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Categorias</label>
				<div class="col-lg-8">
                    <select name="idCategorias" class="form-control" required >
                    <option value="" selected="selected">Seleccione una categoria</option>
                    <?php foreach ($arrCategorias as $cat) { ?>
                    <option value="<?php echo $cat['idCategorias']; ?>" <?php if(isset($idCategorias)&&$idCategorias==$cat['idCategorias']) {echo 'selected="selected"';}elseif($cat['idCategorias']==$rowdata['idCategorias']){echo 'selected="selected"'; }?>><?php echo $cat['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Estado</label>
				<div class="col-lg-8">
                    <select name="Estado" class="form-control" required >
                    <option value="" selected="selected">Seleccione un Estado</option>
                    <option value="1" <?php if(isset($Estado)&&$Estado==1){echo 'selected="selected"';}elseif($rowdata['Estado']==1){echo 'selected="selected"'; }?>>Abierta</option>
                    <option value="2" <?php if(isset($Estado)&&$Estado==2){echo 'selected="selected"';}elseif($rowdata['Estado']==2){echo 'selected="selected"'; }?>>Publicada</option>
                    <option value="3" <?php if(isset($Estado)&&$Estado==3){echo 'selected="selected"';}elseif($rowdata['Estado']==3){echo 'selected="selected"'; }?>>Cerrada</option>
             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Pregunta</label>
                <div class="col-lg-8">
                    <textarea name="Pregunta" id="autosize" class="form-control" style="overflow: auto; word-wrap: break-word; resize: horizontal; height: 160px;" ><?php if(isset($Pregunta)) {echo $Pregunta;}else{echo $rowdata['Pregunta'];}?></textarea>
                </div>
            </div>

<?php //Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
// Se trae un listado con todos los usuarios
$arrTipoCliente = array();
$query = "SELECT idTipoCliente,Nombre
FROM `clientes_tipos`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipoCliente,$row );
}?>
<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Sistema</label>
	<div class="col-lg-8">
		<select name="idTipoCliente" class="form-control" required >
			<option value="" selected="selected">Seleccione el Sistema Relacionado</option>
			<?php foreach ($arrTipoCliente as $tipo) { ?>
			<option value="<?php echo $tipo['idTipoCliente']; ?>" <?php if(isset($idTipoCliente)&&$idTipoCliente==$tipo['idTipoCliente']) {echo 'selected="selected"';}elseif($tipo['idTipoCliente']==$rowdata['idTipoCliente']){echo 'selected="selected"'; } ?>><?php echo $tipo['Nombre']; ?></option>
			<?php } ?>             
		</select>
	</div>
</div>	
<?php }else{?>
<input type="hidden" name="idTipoCliente"   value="<?php echo $arrUsuario['idTipoCliente'] ?>">		
<?php }?>

			<div class="form-group">
            	<input type="hidden" name="idPregunta" value="<?php echo $_GET['id']; ?>">
                <input type="hidden" name="Fecha" value="<?php echo fecha_actual(); ?>">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Pregunta" name="submit_edit"> 
			</div>       
			</form>         
		</div>
	</div>
</div>
<?php 
//Solo mostrar la creacion de respuestas si la pregunta aun no ha sido publicada
if($rowdata['Estado']==1){?>     
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-exchange"></i></div>
			<h5>Crear Respuestas</h5>
		</header>
		<div class="body">
			<form class="form-inline" method="post">
				<div class="form-group col-lg-10">
					<input type="text" class="form-control width100"  placeholder="Respuesta" name="Respuesta">
				</div>
				<div class="form-group  col-lg-2">
                	<input type="hidden" name="idPregunta" value="<?php echo $_GET['id']; ?>">
                    <input type="submit"  class="btn btn-primary fright margin_width" value="Guardar Respuesta" name="submit_resp">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>
</div>
<?php }?>              
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Respuestas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Respuestas</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrRespuestas as $respuestas) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $respuestas['Respuesta']; ?></td>
			
            <td class=" "> 
<?php //Verifico si existe la variable de busqueda y pagina
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}
$location .='&id='.$_GET['id']?>  

<?php 
//Solo mostrar la creacion de respuestas si la pregunta aun no ha sido publicada
if($rowdata['Estado']==1){?>           
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&idrresp='.$respuestas['idRespuesta']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&delresp='.$respuestas['idRespuesta'];?>
				<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php }?>
<?php } ?>              
			</td>
            
		</tr>
    <?php } ?>                    
	</tbody>
</table>   
</div>
</div>              


<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<?php //Verifico si existe la variable de busqueda y pagina
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Se inicializa el paginador de resultados
//tomo el numero de la pagina si es que este existe
if(isset($_GET["pagina"])){
	$num_pag = $_GET["pagina"];	
} else {
	$num_pag = 1;	
}
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//resto de variables
if (!$num_pag){
	$comienzo = 0 ;
	$num_pag = 1 ;
} else {
	$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
$x='';
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="WHERE preguntas_listado.idTipoCliente>=0";	
}else{
	$z="WHERE preguntas_listado.idTipoCliente={$arrUsuario['idTipoCliente']}";	
}
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search'] != ''){
	$z .=" AND preguntas_listado.Pregunta LIKE '%{$_GET['search']}%'";	
}

//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idPregunta FROM `preguntas_listado` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrPreguntas = array();
$query = "SELECT 
preguntas_listado.idPregunta,
preguntas_listado.Pregunta AS pregunta,
preguntas_categorias.Nombre AS categoria,
preguntas_listado.Estado
FROM `preguntas_listado`
LEFT JOIN `preguntas_categorias` ON preguntas_categorias.idCategorias = preguntas_listado.idCategorias
".$z."
ORDER BY preguntas_categorias.Nombre ASC, preguntas_listado.idPregunta ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPreguntas,$row );
}
//verifico si existe una pregunta no asignada ya abierta
$query = "SELECT idPregunta
FROM `preguntas_listado`
WHERE idUsuario={$arrUsuario['idUsuario']} AND idTipoCliente=0 AND idCategorias=0 AND Estado=0";
$resultado = mysql_query ($query, $dbConn);
$rowpregunta = mysql_num_rows ($resultado);

?>
<?php 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Pregunta</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onClick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){
//No crera mas preguntas si ya existe una pendiente	
	if ($rowpregunta>0){?>
        <a href="#" class="btn btn-default disabled fright margin_width" >Crear Nueva Pregunta</a>
    <?php }else{?>
        <a href="<?php echo $location; ?>&new=<?php echo $arrUsuario['idUsuario'] ?>" class="btn btn-default fright margin_width" >Crear Nueva Pregunta</a>
    <?php }?>

<?php } ?>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Preguntas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Categoria</th>
        <th>Pregunta</th>
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
			<td class=" ">
<?php 
//Solo mostrar la creacion de respuestas si la pregunta aun no ha sido publicada
if($pregunta['Estado']==1){?>             
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$pregunta['idPregunta']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$pregunta['idPregunta'];?>
			<a onClick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php } ?> 
<?php }else{?>  
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$pregunta['idPregunta']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php }?>
<?php }?>         

			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<?php 
//Verifico si hay mas de una pagina, sino coulto el paginador
if($total_paginas>1){
//Cargamos la ubicacion original
$location = $original;
$location .='?pagina=';
if (isset($_GET['search'])) { 
$x ='&search='.$_GET['search'];
} else {
$x='';	
}?>
    <div class="row">
        <div class="contaux">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination menucent">
                	<?php if(($num_pag - 1) > 0) { ?>
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">← Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">← Anterior</a></li>
                    <?php } ?>
                    
                    <?php if ($total_paginas>10){
						if(0>$num_pag-5){
							for ($i = 1; $i <= 10; $i++) { ?>
							<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
							<?php }
						}elseif($total_paginas<$num_pag+5){
							for ($i = $num_pag-5; $i <= $total_paginas; $i++) { ?>
							<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
							<?php }	
						}else{
							for ($i = $num_pag-4; $i <= $num_pag+5; $i++) { ?>
							<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
							<?php }	
						}		
					}else{
						for ($i = 1; $i <= $total_paginas; $i++) { ?>
                   		<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
                        <?php }
						}?>
                    <?php if(($num_pag + 1)<=$total_paginas) { ?>
                    <li class="next"><a href="<?php echo $location.($num_pag+1).$x ?>">Siguiente → </a></li>
                    <?php } else {?>
                    <li class="next disabled"><a href="">Siguiente → </a></li>
                    <?php } ?>
                </ul>
            </div> 
        </div>
    </div>
<?php }?>   
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