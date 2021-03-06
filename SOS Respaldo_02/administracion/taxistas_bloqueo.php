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
$original = "taxistas_bloqueo.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['submit']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/taxista_facturacion_historico.php';		
}
//formulario para bloquear usuario
if ( !empty($_GET['block']) )  {
	//Se agregan nuevas direcciones
	$location .= '?bloqueo=true';
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/taxista_bloqueo.php';		
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
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.10.4.custom.css" />    
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script>
  $(document).ready(function() {
	$("#datepicker1").datepicker({ dateFormat: "yy-mm-dd" }).val();
	$("#datepicker2").datepicker({ dateFormat: "yy-mm-dd" }).val();
	$.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi??rcoles', 'Jueves', 'Viernes', 'S??bado'],
        dayNamesShort: ['Dom','Lun','Mar','Mi??','Juv','Vie','S??b'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S??'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
  });
</script>  
<script language="javascript">
function msg(direccion){
if (confirm("??Realmente deseas eliminar el registro?")) {
        //Env??a el formulario
        location=direccion;
    } else {
        //No env??a el formulario
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
<?php  if (isset($errors[5])) {echo $errors[5];}?>              
<?php  if (isset($_GET['bloqueo'])) {?>
<div id="txf_03" class="alert_sucess">  
	Taxista bloqueado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>            
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['view']) ) {

//Se crean las variables para las busquedas
$z="WHERE clientes_listado.idCliente={$_GET['view']} AND taxista_pagos.Semana = taxista_calendario.Semana ";	
$w="WHERE taxista_calendario.Semana>0 ";
$s="?filter=true&pagina=".$_GET['pagina'];
$x="";
//Verifico si la variable de busqueda existe
if (isset($_GET['PPU']) && $_GET['PPU'] != ''){
	$z .=" AND clientes_listado.PPU LIKE '%{$_GET['PPU']}%'";
	$x .= "&PPU=".$_GET['PPU'] ; 	
}
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  { 
	$z .= " AND clientes_listado.N_Motor LIKE '%{$_GET['N_Motor']}%' " ;
	$x .= "&N_Motor=".$_GET['N_Motor'] ; 
}
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  { 
	$z .= " AND clientes_listado.N_Chasis LIKE '%{$_GET['N_Chasis']}%' " ;
	$x .= "&N_Chasis=".$_GET['N_Chasis'] ; 
}
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$z .= " AND clientes_listado.fFabricacion BETWEEN '{$_GET['fechaInicio']}' AND '{$_GET['fechaTermino']}'" ;
	$x .= "&fechaInicio={$_GET['fechaInicio']}&fechaTermino={$_GET['fechaTermino']}" ;           
}
if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')  { 
	$z .= " AND clientes_listado.idConductor = '".$_GET['idConductor']."'" ;
	$x .= "&idConductor=".$_GET['idConductor'] ; 
}
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  { 
	$z .= " AND clientes_listado.idPropietario = '".$_GET['idPropietario']."'" ;
	$x .= "&idPropietario=".$_GET['idPropietario'] ; 
}
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  { 
	$z .= " AND clientes_listado.idRecorrido = '".$_GET['idRecorrido']."'" ;
	$x .= "&idRecorrido=".$_GET['idRecorrido'] ; 
}
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  { 
	$z .= " AND clientes_listado.idMarca = '".$_GET['idMarca']."'" ;
	$x .= "&idMarca=".$_GET['idMarca'] ; 
}
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  { 
	$z .= " AND clientes_listado.idModelo = '".$_GET['idModelo']."'" ;
	$x .= "&idModelo=".$_GET['idModelo'] ; 
}
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  { 
	$z .= " AND clientes_listado.idTransmision = '".$_GET['idTransmision']."'" ;
	$x .= "&idTransmision=".$_GET['idTransmision'] ; 
}
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  { 
	$z .= " AND clientes_listado.idColorV_1 = '".$_GET['idColorV_1']."'" ;
	$x .= "&idColorV_1=".$_GET['idColorV_1'] ; 
}
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  { 
	$z .= " AND clientes_listado.idColorV_2 = '".$_GET['idColorV_2']."'" ;
	$x .= "&idColorV_2=".$_GET['idColorV_2'] ; 
}
if(isset($_GET['Semana_inicio']) && $_GET['Semana_inicio'] != ''&&isset($_GET['Semana_termino']) && $_GET['Semana_termino'] != ''){ 
	$z .= " AND taxista_pagos.Semana BETWEEN '{$_GET['Semana_inicio']}' AND '{$_GET['Semana_termino']}'" ;
	$x .= "&Semana_inicio={$_GET['Semana_inicio']}&Semana_termino={$_GET['Semana_termino']}" ;           
}
if(isset($_GET['Ano']) && $_GET['Ano'] != '')  { 
	$z .= " AND taxista_pagos.Ano = '".$_GET['Ano']."'" ;
	$x .= "&Ano=".$_GET['Ano'] ;       
}
if(isset($_GET['Estado']) && $_GET['Estado'] != '')   { 
	$z .= " AND clientes_listado.Estado = '".$_GET['Estado']."'" ;
	$x .= "&Estado=".$_GET['Estado'] ;       
}
if(isset($_GET['estadopago']) && $_GET['estadopago'] != '')  { 
	$x .= "&estadopago=".$_GET['estadopago'] ;       
}
// Se trae un listado con todos los usuarios
$arrPagos = array();
$query = "SELECT
taxista_calendario.Semana,
taxista_calendario.Ano,
(SELECT idDocumento  FROM `taxista_pagos` LEFT JOIN clientes_listado ON clientes_listado.idCliente = taxista_pagos.idTaxista ".$z." ) AS idDocumento,
(SELECT Fecha        FROM `taxista_pagos` LEFT JOIN clientes_listado ON clientes_listado.idCliente = taxista_pagos.idTaxista ".$z." ) AS Fecha
FROM`taxista_calendario`
".$w;
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPagos,$row );
}

?>

<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Pagos realizados</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>A??o</th>
        <th>Semana</th>
        <th>Fecha Pagada</th>
    </tr>
	</thead>                     
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrPagos as $pagos) { ?>
		<?php //Se muestran los datos de acuerdo a la busqueda
        if(isset($_GET['estadopago'])&&$_GET['estadopago']==2&&$pagos['idDocumento']==''){ ?>
            <tr class="odd">
                <td class=" "><?php echo 'A??o '.$pagos['Ano']; ?></td>
                <td class=" "><?php echo 'Semana '.$pagos['Semana']; ?></td>
                <td class=" "><?php if($pagos['Fecha']!=''&&$pagos['Fecha']!=0){echo Fecha_estandar($pagos['Fecha']);}else{echo 'No Pagado';} ?></td>
            </tr>
        <?php }  ?>
    <?php } ?>                    
	</tbody>
</table>
  
</div>      
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location.$s.$x; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<?php 
//Consulto por el monto del bloqueo
$query = "SELECT bloqueo_taxista
FROM `taxista_sistema`
WHERE idSistema=1";
$resultado = mysql_query ($query, $dbConn);
$rowbloqueo = mysql_fetch_assoc ($resultado);
//datos para bloquear datos 
$t ='&block=true';
$t.='&idEncargado='.$arrUsuario['idUsuario'];
$t.='&idTaxista='.$_GET['view'];
$t.='&Monto='.$rowbloqueo['bloqueo_taxista'];
$t.='&EstadoPago=1';
$t.='&FechaBloqueo='.fecha_actual();

?>
<a href="<?php echo $location.$s.$x.$t; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Bloquear Usuario</a>
<div class="clearfix"></div>
</div>	
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif(! empty($_GET["filter"]))  { 
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
//Se crean las variables para las busquedas
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="WHERE clientes_listado.idTipoCliente>=0 ";	
}else{
	$z="WHERE clientes_listado.idTipoCliente={$arrUsuario['idTipoCliente']} ";	
}
$s="?filter=true&pagina=".$_GET['pagina'];
$x="";
//Verifico si la variable de busqueda existe
if (isset($_GET['PPU']) && $_GET['PPU'] != ''){
	$z .=" AND clientes_listado.PPU LIKE '%{$_GET['PPU']}%'";
	$x .= "&PPU=".$_GET['PPU'] ; 	
}
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  { 
	$z .= " AND clientes_listado.N_Motor LIKE '%{$_GET['N_Motor']}%' " ;
	$x .= "&N_Motor=".$_GET['N_Motor'] ; 
}
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  { 
	$z .= " AND clientes_listado.N_Chasis LIKE '%{$_GET['N_Chasis']}%' " ;
	$x .= "&N_Chasis=".$_GET['N_Chasis'] ; 
}
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$z .= " AND clientes_listado.fFabricacion BETWEEN '{$_GET['fechaInicio']}' AND '{$_GET['fechaTermino']}'" ;
	$x .= "&fechaInicio={$_GET['fechaInicio']}&fechaTermino={$_GET['fechaTermino']}" ;           
}
if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')  { 
	$z .= " AND clientes_listado.idConductor = '".$_GET['idConductor']."'" ;
	$x .= "&idConductor=".$_GET['idConductor'] ; 
}
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  { 
	$z .= " AND clientes_listado.idPropietario = '".$_GET['idPropietario']."'" ;
	$x .= "&idPropietario=".$_GET['idPropietario'] ; 
}
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  { 
	$z .= " AND clientes_listado.idRecorrido = '".$_GET['idRecorrido']."'" ;
	$x .= "&idRecorrido=".$_GET['idRecorrido'] ; 
}
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  { 
	$z .= " AND clientes_listado.idMarca = '".$_GET['idMarca']."'" ;
	$x .= "&idMarca=".$_GET['idMarca'] ; 
}
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  { 
	$z .= " AND clientes_listado.idModelo = '".$_GET['idModelo']."'" ;
	$x .= "&idModelo=".$_GET['idModelo'] ; 
}
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  { 
	$z .= " AND clientes_listado.idTransmision = '".$_GET['idTransmision']."'" ;
	$x .= "&idTransmision=".$_GET['idTransmision'] ; 
}
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  { 
	$z .= " AND clientes_listado.idColorV_1 = '".$_GET['idColorV_1']."'" ;
	$x .= "&idColorV_1=".$_GET['idColorV_1'] ; 
}
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  { 
	$z .= " AND clientes_listado.idColorV_2 = '".$_GET['idColorV_2']."'" ;
	$x .= "&idColorV_2=".$_GET['idColorV_2'] ; 
}
if(isset($_GET['Semana_inicio']) && $_GET['Semana_inicio'] != ''&&isset($_GET['Semana_termino']) && $_GET['Semana_termino'] != ''){ 
	$z .= " AND taxista_pagos.Semana BETWEEN '{$_GET['Semana_inicio']}' AND '{$_GET['Semana_termino']}'" ;
	$x .= "&Semana_inicio={$_GET['Semana_inicio']}&Semana_termino={$_GET['Semana_termino']}" ;           
}
if(isset($_GET['Ano']) && $_GET['Ano'] != '')  { 
	$z .= " AND taxista_pagos.Ano = '".$_GET['Ano']."'" ;
	$x .= "&Ano=".$_GET['Ano'] ;       
}
if(isset($_GET['Estado']) && $_GET['Estado'] != '')   { 
	$z .= " AND clientes_listado.Estado = '".$_GET['Estado']."'" ;
	$x .= "&Estado=".$_GET['Estado'] ;       
}
if(isset($_GET['estadopago']) && $_GET['estadopago'] != '')  { 
	$x .= "&estadopago=".$_GET['estadopago'] ;       
}
 
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT 
clientes_listado.idCliente
FROM `clientes_listado` 
LEFT JOIN taxista_pagos    ON taxista_pagos.idTaxista     = clientes_listado.idCliente
".$z."
GROUP BY clientes_listado.idCliente";
$registrosx = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registrosx);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrSolicitudes = array();
$query = "SELECT 
COUNT(taxista_pagos.idDocumento) AS cuenta,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
taxista_pagos.idTaxista
FROM `clientes_listado` 
LEFT JOIN taxista_pagos ON taxista_pagos.idTaxista  = clientes_listado.idCliente
RIGHT JOIN taxista_calendario ON taxista_calendario.Semana = taxista_pagos.Semana 
".$z."
GROUP BY clientes_listado.idCliente
ORDER BY cuenta DESC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrSolicitudes,$row );
}?>
                                
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Taxistas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre</th>
        <th width="180">Semanas adeudadas</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>                     
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrSolicitudes as $solicitudes) { ?>
    	<tr class="odd">
            <td class=" "><?php echo $solicitudes['Nombre'].' '.$solicitudes['Apellido_Paterno']; ?></td>
            <td class=" "><?php echo (($_GET['Semana_termino']-$_GET['Semana_inicio']))-$solicitudes['cuenta'].' Semana'; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.$s.$x.'&view='.$solicitudes['idTaxista']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
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
$location .='?filter=true&pagina=';
?>
    <div class="row">
        <div class="contaux">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination menucent">
                	<?php if(($num_pag - 1) > 0) { ?>
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">??? Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">??? Anterior</a></li>
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
                    <li class="next"><a href="<?php echo $location.($num_pag+1).$x ?>">Siguiente ??? </a></li>
                    <?php } else {?>
                    <li class="next disabled"><a href="">Siguiente ??? </a></li>
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
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
// Se trae un listado de todas las marcas
$arrMarca = array();
$query = "SELECT  idMarca, Nombre
FROM `vehiculos_marcas`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrMarca,$row );
} 
// Se trae un listado de todos los modelos
$query = "SELECT  idModelo, idMarca, Nombre
FROM `vehiculos_modelos` ";
$resultado = mysql_query ($query, $dbConn);
while ($Modelo[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Modelo);
array_multisort($Modelo, SORT_ASC);
// Se trae un listado con todos los tipos de transmision
$arrTransmision = array();
$query = "SELECT idTransmision,Nombre
FROM `vehiculos_transmision`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTransmision,$row );
}
// Se trae un listado con todos los colores
$arrColorV = array();
$query = "SELECT idColorV,Nombre
FROM `vehiculos_colores`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColorV,$row );
}
// Se trae un listado con todos los taxistas
$arrConductor = array();
$query = "SELECT idConductor,Nombre, Apellido_Paterno, Apellido_Materno
FROM `taxista_conductores`
ORDER BY Apellido_Paterno ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrConductor,$row );
}
// Se trae un listado con todos los propietarios
$arrPropietario = array();
$query = "SELECT idPropietario,Nombre,Apellido_Paterno,Apellido_Materno
FROM `taxista_propietarios`
ORDER BY Apellido_Paterno ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPropietario,$row );
}
// Se trae un listado con todos los recorridos
$arrRecorrido = array();
$query = "SELECT idRecorrido,Nombre
FROM `taxista_recorridos`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRecorrido,$row );
}
?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Bloqueo</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post"  name="form1">
			

            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Conductor</label>
				<div class="col-lg-8">
                    <select name="idConductor" class="form-control" >
                    <option value="" selected="selected">Seleccione un Conductor</option>
                    <?php foreach ($arrConductor as $conductor) { ?>
                    <option value="<?php echo $conductor['idConductor']; ?>" ><?php echo $conductor['Nombre'].' '.$conductor['Apellido_Paterno'].' '.$conductor['Apellido_Materno']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Propietario</label>
				<div class="col-lg-8">
                    <select name="idPropietario" class="form-control" >
                    <option value="" selected="selected">Seleccione un Propietario</option>
                    <?php foreach ($arrPropietario as $propietario) { ?>
                    <option value="<?php echo $propietario['idPropietario']; ?>"><?php echo $propietario['Nombre'].' '.$propietario['Apellido_Paterno'].' '.$propietario['Apellido_Materno']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Recorrido</label>
				<div class="col-lg-8">
                    <select name="idRecorrido" class="form-control" >
                    <option value="" selected="selected">Seleccione un Recorrido</option>
                    <?php foreach ($arrRecorrido as $recorrido) { ?>
                    <option value="<?php echo $recorrido['idRecorrido']; ?>" ><?php echo $recorrido['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Patente</label>
				<div class="col-lg-8">
					<input type="text" placeholder="Patente" class="form-control"  name="PPU"  >
				</div>
			</div>
                        
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Marca</label>
				<div class="col-lg-8">
                    <select name="idMarca" class="form-control"  onChange="cambia_marca()">
                    <option value="" selected="selected">Seleccione una Marca</option>
                    <?php foreach ($arrMarca as $marca) { ?>
                    <option value="<?php echo $marca['idMarca']; ?>" ><?php echo $marca['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Modelo</label>
				<div class="col-lg-8">
                    <select name="idModelo" class="form-control">
                    <option value="" selected="selected">Seleccione un Modelo</option>           
                    </select>
				</div>
			</div>
            
<script>
<?php
//se imprime la id de la tarea
filtrar($Modelo, 'idMarca'); 
foreach($Modelo as $tipo=>$componentes){ 
echo'var id_modelo_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idModelo'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Modelo as $tipo=>$componentes){ 
echo'var modelo_'.$tipo.'=new Array("Seleccione un Modelo"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_marca(){
	var Componente
	Componente = document.form1.idMarca[document.form1.idMarca.selectedIndex].value
	try {
	if (Componente != '') {
		id_modelo=eval("id_modelo_" + Componente)
		modelo=eval("modelo_" + Componente)
		num_int = id_modelo.length
		document.form1.idModelo.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idModelo.options[i].value=id_modelo[i]
		   document.form1.idModelo.options[i].text=modelo[i]
		}	
	}else{
		document.form1.idModelo.length = 1
		document.form1.idModelo.options[0].value = ""
	    document.form1.idModelo.options[0].text = "Seleccione un Modelo"
	}
	} catch (e) {
    alert("La Marca seleccionada no posee Modelos");
}
	document.form1.idModelo.options[0].selected = true
}
</script>            
            
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Tipo de Transmision</label>
				<div class="col-lg-8">
                    <select name="idTransmision" class="form-control">
                    <option value="" selected="selected">Seleccione un tipo de Transmision</option>
                    <?php foreach ($arrTransmision as $transmision) { ?>
                    <option value="<?php echo $transmision['idTransmision']; ?>" ><?php echo $transmision['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Color Base</label>
				<div class="col-lg-8">
                    <select name="idColorV_1" class="form-control">
                    <option value="" selected="selected">Seleccione un Color Base</option>
                    <?php foreach ($arrColorV as $color) { ?>
                    <option value="<?php echo $color['idColorV']; ?>" ><?php echo $color['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Color Complementario</label>
				<div class="col-lg-8">
                    <select name="idColorV_2" class="form-control" >
                    <option value="" selected="selected">Seleccione un Color Complementario</option>
                    <?php foreach ($arrColorV as $color) { ?>
                    <option value="<?php echo $color['idColorV']; ?>" ><?php echo $color['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label class="control-label col-lg-4">F Fabricacion Inicio</label>
				<div class="col-lg-8">
					<div class="input-group bootstrap-timepicker">
						<input placeholder="Fecha de Transferencia" class="form-control timepicker-default" type="text" name="fechaInicio" id="datepicker1"  >
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
					</div>
				</div>
			</div>
            
            <div class="form-group">
				<label class="control-label col-lg-4">F Fabricacion Fin</label>
				<div class="col-lg-8">
					<div class="input-group bootstrap-timepicker">
						<input placeholder="Fecha de Fabricacion" class="form-control timepicker-default" type="text" name="fechaTermino" id="datepicker2" >
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
					</div>
				</div>
			</div>
            
            
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Numero de Motor</label>
				<div class="col-lg-8">
					<input type="text"  placeholder="Numero de Motor" class="form-control"  name="N_Motor"  >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Numero de Chasis</label>
				<div class="col-lg-8">
					<input type="text"  placeholder="Numero de Chasis" class="form-control"  name="N_Chasis"  >
				</div>
			</div>
            
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">A??o</label>
                <div class="col-lg-8">
                <select name="Ano" class="form-control" required >
                    <option value="" selected>Seleccione un A??o</option>
                    <?php //Escribo el numero de a??o
					for ($i = 2015; $i <= 2020; $i++) {
						echo '<option value="'.$i.'" >'.$i.'</option>';
					}
					?>
                </select>
                </div>
            </div>
            

			<div class="form-group">
            	<input type="hidden" name="Semana_inicio" value="1" >
                <input type="hidden" name="Semana_termino" value="<?php echo semana_actual() ?>" >
                <input type="hidden" name="Estado" value="1" >
                <input type="hidden" name="estadopago" value="2" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Filtrar" name="submit">
			</div>
                      
			</form> 
                    
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