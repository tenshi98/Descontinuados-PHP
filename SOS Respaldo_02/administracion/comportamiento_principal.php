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
$original = "comportamiento_principal.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para agregar permisos de acceso a las transacciones
if ( !empty($_GET['table']) ) {
	//agrego una ubicacion nueva
	$location .='?pagina='.$_GET['pagina'];
	$location .='&view='.$_GET['view'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/app_comportamiento.php';
}
//formulario para editar el alcance de las alarmas
if ( !empty($_POST['submit_alcance']) )  {
	//agrego una ubicacion nueva
	$location .='?pagina='.$_GET['pagina'];
	$location .='&view='.$_GET['view']; 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/alcance_alarmas.php';
}
//formulario para editar el alcance de las alarmas
if ( !empty($_POST['submit_alcance_taxi_1']) )  { 
	//agrego una ubicacion nueva
	$location .='?pagina='.$_GET['pagina'];
	$location .='&view='.$_GET['view'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/alcance_taxi_1.php';
}
//formulario para editar el alcance de las alarmas
if ( !empty($_POST['submit_alcance_taxi_2']) )  { 
	//agrego una ubicacion nueva
	$location .='?pagina='.$_GET['pagina'];
	$location .='&view='.$_GET['view'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/alcance_taxi_2.php';
}
//formulario para editar el alcance de las alarmas
if ( !empty($_POST['submit_espera']) )  { 
	//agrego una ubicacion nueva
	$location .='?pagina='.$_GET['pagina'];
	$location .='&view='.$_GET['view'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/segundos_espera.php';
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
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Comportamiento Modificado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['view']) ) { ?> 
<?php // Se traen todos los datos de la empresa
$query = "SELECT  comport_register, comport_recover, comport_autoactivate, comport_client, comport_alcance, comport_busq_taxi_1, comport_busq_taxi_2, comport_espera
FROM `clientes_tipos`
WHERE idTipoCliente = '{$_GET['view']}'";
$result = mysql_query ($query, $dbConn);
$config_app = mysql_fetch_assoc($result);
?>

 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Comportamiento</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Usuario</th> 
        <th width="160"></th>
        <th width="100">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">

<tr> 
    <td>Permitir registrarse en la aplicacion</td> 
    <td></td>
    <td>
    <?php if ($rowlevel['level']>=2){?>
        <ul class="interruptor">   
        <?php if ( $config_app['comport_register']=='1' ) {?>   
        <li class="primer_int"><a href="<?php echo $location.'?table=comport_register&val=2&app_conf='.$_GET['view']; ?>">OFF</a></li>
        <li class="ultimo_int on"><a href="#">ON</a></li>
        <?php } else {?>
        <li class="primer_int on"><a href="#">OFF</a></li>
        <li class="ultimo_int"><a href="<?php echo $location.'?table=comport_register&val=1&app_conf='.$_GET['view']; ?>">ON</a></li>
        <?php }?>    
        </ul>
    <?php }?>    
    </td>
</tr>
<tr> 
    <td>Permitir recuperar contraseña</td> 
    <td></td>
    <td>
    <?php if ($rowlevel['level']>=2){?>
        <ul class="interruptor">   
        <?php if ( $config_app['comport_recover']=='1' ) {?>   
        <li class="primer_int"><a href="<?php echo $location.'?table=comport_recover&val=2&app_conf='.$_GET['view']; ?>">OFF</a></li>
        <li class="ultimo_int on"><a href="#">ON</a></li>
        <?php } else {?>
        <li class="primer_int on"><a href="#">OFF</a></li>
        <li class="ultimo_int"><a href="<?php echo $location,'?table=comport_recover&val=1&app_conf='.$_GET['view']; ?>">ON</a></li>
        <?php }?>    
        </ul>
    <?php }?>    
    </td>
</tr>
<tr> 
    <td>Permitir autoactivacion despues del registro de usuario nuevo</td> 
    <td></td>
    <td>
    <?php if ($rowlevel['level']>=2){?>
        <ul class="interruptor">   
        <?php if ( $config_app['comport_autoactivate']=='1' ) {?>   
        <li class="primer_int"><a href="<?php echo $location.'?table=comport_autoactivate&val=2&app_conf='.$_GET['view']; ?>">OFF</a></li>
        <li class="ultimo_int on"><a href="#">ON</a></li>
        <?php } else {?>
        <li class="primer_int on"><a href="#">OFF</a></li>
        <li class="ultimo_int"><a href="<?php echo $location.'?table=comport_autoactivate&val=1&app_conf='.$_GET['view']; ?>">ON</a></li>
        <?php }?>    
        </ul>
    <?php }?>    
    </td>
</tr>
<tr> 
    <td>Enviar notificaciones solo al mismo tipo de clientes</td> 
    <td></td>
    <td>
    <?php if ($rowlevel['level']>=2){?>
        <ul class="interruptor">   
        <?php if ( $config_app['comport_client']=='1' ) {?>   
        <li class="primer_int"><a href="<?php echo $location.'?table=comport_client&val=2&app_conf='.$_GET['view']; ?>">OFF</a></li>
        <li class="ultimo_int on"><a href="#">ON</a></li>
        <?php } else {?>
        <li class="primer_int on"><a href="#">OFF</a></li>
        <li class="ultimo_int"><a href="<?php echo $location.'?table=comport_client&val=1&app_conf='.$_GET['view']; ?>">ON</a></li>
        <?php }?>    
        </ul>
    <?php }?>    
    </td>
</tr> 


<tr> 
    <td>Modificar alcance de alertas, actualmente es : <?php echo $config_app['comport_alcance'] ?> kilometros</td>           
    <form class="form-horizontal" method="post">
    <td>
        <input type="text" id="text2" placeholder="N° Kilometros" class="form-control"  name="comport_alcance" required>
        <input type="hidden" name="id" value="<?php echo $_GET['view'] ?>" >
    </td>
    <td>
    	<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar" name="submit_alcance"> 
    </td>
    </form>   
</tr>

<tr> 
    <td>Modificar alcance de la primera busqueda de taxi, actualmente es : <?php echo $config_app['comport_busq_taxi_1'] ?> kilometros</td>          
    <form class="form-horizontal" method="post">
    <td>
        <input type="text" id="text2" placeholder="N° Kilometros" class="form-control"  name="comport_busq_taxi_1" required>
        <input type="hidden" name="id" value="<?php echo $_GET['view'] ?>" >
    </td>
    <td>
    	<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar" name="submit_alcance_taxi_1">
    </td> 
    </form> 
</tr>

<tr> 
    <td>Modificar alcance de la segunda busqueda de taxi, actualmente es : <?php echo $config_app['comport_busq_taxi_2'] ?> kilometros</td>       
    <form class="form-horizontal" method="post">
    <td>
        <input type="text" id="text2" placeholder="N° Kilometros" class="form-control"  name="comport_busq_taxi_2" required>
        <input type="hidden" name="id" value="<?php echo $_GET['view'] ?>" >
    </td>
    <td>
    	<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar" name="submit_alcance_taxi_2"> 
    </td> 
    </form> 
</tr>

<tr> 
    <td>Modificar el tiempo de espera al llamar al taxi antes de cancelar, actualmente es : <?php echo $config_app['comport_espera'] ?> segundos</td>       
    <form class="form-horizontal" method="post">
    <td>
        <input type="text" id="text2" placeholder="Segundos" class="form-control"  name="comport_espera" required>
        <input type="hidden" name="id" value="<?php echo $_GET['view'] ?>" >
    </td>
    <td>
    	<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar" name="submit_espera"> 
    </td> 
    </form> 
</tr>  
                    
	</tbody>
</table>
   
</div>
</div>


<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location.'?pagina='.$_GET['pagina'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
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
//Creo la variable con la ubicacion
	$z="WHERE idTipoCliente!=0 ";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z .=" AND Nombre LIKE '%{$_GET['search']}%' ";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idTipoCliente FROM `clientes_tipos` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrTipoCliente = array();
$query = "SELECT idTipoCliente,Nombre
FROM `clientes_tipos`
".$z."
ORDER BY Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipoCliente,$row );
}?>
<?php 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Sistema</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Sistemas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="60">ID</th>
        <th>Nombre</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrTipoCliente as $tipo) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $tipo['idTipoCliente']; ?></td>
			<td class=" "><?php echo $tipo['Nombre']; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&view='.$tipo['idTipoCliente']; ?>" title="Editar Informacion" class=" icon-ver info-tooltip"></a><?php } ?>
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