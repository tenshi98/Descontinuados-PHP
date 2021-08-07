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
$original = "ingresos_cumplimiento.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/


?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Cumplimiento de OIRS</title>
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
	<link href="assets/css/theme_color_<?php echo $rowempresa['idTheme'] ?>.css" rel="stylesheet" type="text/css">
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
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val();
	$.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
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
            <i class="fa fa-dashboard"></i> Cumplimiento de OIRS
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
<?php
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
//Creacion de una cadena para el filtro
$z="WHERE oirs_listado.id_Oirs > '0'";
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search']!='' ){
	$z.="AND oirs_listado.id_Oirs LIKE '%{$_GET['search']}%'";	
}
//Verifico si la variable de busqueda existe
if (isset($_GET['Fecha']) && $_GET['Fecha']!='' ){
	$z.="AND oirs_listado.Fecha='".$_GET['Fecha']."'  ";	
}
//Verifico si la variable de busqueda existe
if (isset($_GET['idDepto']) && $_GET['idDepto']!='' ){
	$z.="AND oirs_listado.idDepto='".$_GET['idDepto']."'  ";	
}
//Verifico si la variable de busqueda existe
if (isset($_GET['Estado']) && $_GET['Estado']!='' ){
	$z.="AND oirs_listado.Estado='".$_GET['Estado']."'  ";	
}

//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT id_Oirs 
FROM `oirs_listado` 
LEFT JOIN mnt_oirs_departamentos ON mnt_oirs_departamentos.idDepto = oirs_listado.idDepto
".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos las oirs
$arrOirs = array();
$query = "SELECT 
oirs_listado.id_Oirs,
oirs_listado.Fecha,
detalle_general.Nombre AS estado,
mnt_oirs_departamentos.Nombre AS departamento,
(SELECT SUM(n_dias) FROM `oirs_dias` WHERE id_Oirs = oirs_listado.id_Oirs )AS dias_disponibles
FROM `oirs_listado`
LEFT JOIN    `detalle_general`          ON detalle_general.id_Detalle         = oirs_listado.Estado
LEFT JOIN    `mnt_oirs_departamentos`   ON mnt_oirs_departamentos.idDepto     = oirs_listado.idDepto
".$z."
ORDER BY estado ASC, oirs_listado.id_Oirs DESC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrOirs,$row );
}
// Se trae un listado con todos los clientes
$arrDepto = array();
$query = "SELECT idDepto, Nombre 
FROM `mnt_oirs_departamentos`
ORDER BY Nombre ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrDepto,$row );
}
mysql_free_result($resultado);
// Se trae un listado con todos los clientes
$arrEstado = array();
$query = "SELECT id_Detalle, Nombre 
FROM `detalle_general`
WHERE Tipo='3'
ORDER BY Nombre ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEstado,$row );
}
mysql_free_result($resultado);

?>

<?php 
$location = $original;
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search']))  { $location .='&search='.$_GET['search'];}
if (isset($_GET['Fecha']))   { $location .='&Fecha='.$_GET['Fecha'];}
if (isset($_GET['idDepto'])) { $location .='&idDepto='.$_GET['idDepto'];}
if (isset($_GET['Estado']))  { $location .='&Estado='.$_GET['Estado'];}
if (isset($_GET['Atraso']))  { $location .='&Atraso='.$_GET['Atraso'];}
?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar OIRS</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="N° OIRS">
            <input type="text" class="form-control" name="Fecha" id="datepicker" readonly value="<?php if(isset($_GET['Fecha'])) {echo $_GET['Fecha'];} ?>" placeholder="Ingrese la fecha" >
            <select name="idDepto" class="form-control"  >
    		<option value="" selected>Seleccione un Departamento</option>
			<?php foreach ( $arrDepto as $depto ) { ?>
            <option value="<?php echo $depto['idDepto']; ?>" <?php if(isset($_GET['idDepto'])&&$_GET['idDepto']==$depto['idDepto']){ echo 'selected="selected"';}?>><?php echo $depto['Nombre']; ?></option>
            <?php } ?>
            </select>
    		<select name="Estado" class="form-control"  >
    		<option value="" selected>Seleccione un Estado</option>
			<?php foreach ( $arrEstado as $estado ) { ?>
            <option value="<?php echo $estado['id_Detalle']; ?>" <?php if(isset($_GET['Estado'])&&$_GET['Estado']==$estado['id_Detalle']){ echo 'selected="selected"';}?>><?php echo $estado['Nombre']; ?></option>
            <?php } ?>
            </select>
            <select name="Atraso" class="form-control"  >
    		<option value="" selected>Seleccione el atraso</option>
            <option value="1" <?php if(isset($_GET['Atraso'])&&$_GET['Atraso']=='1'){ echo 'selected="selected"';}?>>Atrasada</option>
            <option value="2" <?php if(isset($_GET['Atraso'])&&$_GET['Atraso']=='2'){ echo 'selected="selected"';}?>>Dentro de los plazos</option>
            </select>

            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';document.form1.Fecha.value = '';document.form1.idDepto.value = '';document.form1.Estado.value = '';document.form1.Atraso.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
</div>
                      
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de OIRS</h5>
		</header>
        
              
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
    	<th width="60">N°</th>
        <th width="100">F Creacion</th>
        <th>Departamento Responsable</th>
        <th width="100">Estado</th>
        <th width="120">Resolver en</th>
        <th width="120">Atraso</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    
    <?php
	//Se verifica si la OIRS esta atrasada
	 if(isset($_GET['Atraso']) &&$_GET['Atraso']==1 ){
    foreach ($arrOirs as $oirs) { 
	date_default_timezone_set("Chile/Continental");
	$date1_cg = strtotime($oirs['Fecha']);
	$date2_cg = time();
	$subTime_cg = $date2_cg - $date1_cg;
	$d_cg = ($subTime_cg/(60*60*24))%365;	
    	if($d_cg>=1){?>
    	<tr class="odd">
			<td class=" "><?php echo n_doc($oirs['id_Oirs']); ?></td>
            <td class=" "><?php echo $oirs['Fecha']; ?></td>
			<td class=" "><?php echo $oirs['departamento']; ?></td>
            <td class=" "><?php echo $oirs['estado']; ?></td>
			<td class=" "><?php echo $oirs['dias_disponibles']; ?> dias</td>
			<td class=" "><?php echo $d_cg.' dias'; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a target="new" href="<?php echo 'view_oirs.php?view='.$oirs['id_Oirs']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>         
			</td>
		</tr>
    	<?php } // cierre del if 	
    	} // cierre del for
    //Se verifica si la OIRS no esta atrasada
	} elseif(isset($_GET['Atraso']) &&$_GET['Atraso']=='2'){
    foreach ($arrOirs as $oirs) { 
	date_default_timezone_set("Chile/Continental");
	$date1_cg = strtotime($oirs['Fecha']);
	$date2_cg = time();
	$subTime_cg = $date2_cg - $date1_cg;
	$d_cg = ($subTime_cg/(60*60*24))%365;	
	 if($d_cg==0){?>
    	<tr class="odd">
			<td class=" "><?php echo n_doc($oirs['id_Oirs']); ?></td>
            <td class=" "><?php echo $oirs['Fecha']; ?></td>
			<td class=" "><?php echo $oirs['departamento']; ?></td>
            <td class=" "><?php echo $oirs['estado']; ?></td>
			<td class=" "><?php echo $oirs['dias_disponibles']; ?> dias</td>
			<td class=" "><?php echo $d_cg.' dias'; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a target="new" href="<?php echo 'view_oirs.php?view='.$oirs['id_Oirs']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>         
			</td>
		</tr>
    	<?php } //cierre del if 	
     	} // cierre del for
     } else {
	//si no hay filtro activo
    foreach ($arrOirs as $oirs) { 
	date_default_timezone_set("Chile/Continental");
	$date1_cg = strtotime($oirs['Fecha']);
	$date2_cg = time();
	$subTime_cg = $date2_cg - $date1_cg;
	$d_cg = ($subTime_cg/(60*60*24))%365;	
	?>	
    	<tr class="odd">
			<td class=" "><?php echo n_doc($oirs['id_Oirs']); ?></td>
            <td class=" "><?php echo $oirs['Fecha']; ?></td>
			<td class=" "><?php echo $oirs['departamento']; ?></td>
            <td class=" "><?php echo $oirs['estado']; ?></td>
			<td class=" "><?php echo $oirs['dias_disponibles']; ?> dias</td>
			<td class=" "><?php echo $d_cg.' dias'; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a target="new" href="<?php echo 'view_oirs.php?view='.$oirs['id_Oirs']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>         
			</td>
		</tr>
    	
    <?php } ?>
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
}
if (isset($_GET['Fecha'])) { 
$x .='&Fecha='.$_GET['Fecha'];
} else {
$x.='';	
}
if (isset($_GET['idDepto'])) { 
$x .='&idDepto='.$_GET['idDepto'];
} else {
$x.='';	
}
if (isset($_GET['Estado'])) { 
$x .='&Estado='.$_GET['Estado'];
} else {
$x.='';	
}
if (isset($_GET['Atraso'])) { 
$x .='&Atraso='.$_GET['Atraso'];
} else {
$x.='';	
}
?>
    <div class="row">
        <div class="col-lg-9 fcenter">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination">
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