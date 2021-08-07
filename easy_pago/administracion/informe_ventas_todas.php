<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
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
$original = "informe_ventas_todas.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'filtro_fecha';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/z_filtros.php';
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
    <link rel="stylesheet" href="assets/css/theme_color_<?php echo $arrUsuario['idTheme'] ?>.css">
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
              <a href="principal.php" class="navbar-brand">
                <?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?>
					<img src="upload/<?php echo $arrUsuario['imgLogo']; ?>" alt="">
				<?php }else{?>
					<img src="img/logo_default.png" alt="">
				<?php } ?>
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
            <?php echo '<i class="'.$rowlevel['IconoCategoria'].'"></i> '.$rowlevel['nombre_transaccion']; ?>		
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
//Listado de errores no manejables
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Usuario creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Usuario editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Usuario borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo notifications_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['view']) ) { 

// Se traen todos los datos de mi usuario
$arrUsers = array();
$query = "SELECT
usuarios_listado.Nombre AS NombreVendedor,
clientes_recargas.Monto AS Ventas,
clientes_recargas.MontoReal AS VentasReal,
clientes_recargas.Fecha AS Fecha,
clientes_listado.Nombre AS NombreCliente,
core_meses.Nombre AS Mes
FROM `clientes_recargas`
LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_recargas.idCliente
LEFT JOIN `usuarios_listado` ON usuarios_listado.idUsuario = clientes_recargas.idUsuario
LEFT JOIN `core_meses`       ON core_meses.idMes           = clientes_recargas.idMes
WHERE usuarios_listado.idUsuario = '{$_GET['view']}'
AND clientes_recargas.Ano = '{$_GET['Año']}'
AND clientes_recargas.idMes = '{$_GET['idMes']}'
ORDER BY clientes_recargas.Fecha ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}	



?>
 
 
 
 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div>
			<h5>Resumen de ventas de <?php echo $arrUsers[0]['NombreVendedor'].' del mes de '.$arrUsers[0]['Mes'].' del '.$_GET['Año']?></h5>
		</header>
        
             
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
			<thead>
				<tr role="row">
					<th>Bodega</th>
					<th>Venta Real</th>
					<th>Venta Ofrecido</th>
				</tr>
			</thead>
							  
			<tbody role="alert" aria-live="polite" aria-relevant="all"> 
			<?php
			filtrar($arrUsers, 'NombreCliente');  
			foreach($arrUsers as $categoria=>$ejecutivos){ 
				echo '<tr class="odd" ><td colspan="3"  style="background-color:#DDD">'.$categoria.'</td></tr>';
				foreach ($ejecutivos as $subcategorias) { ?>
					<tr class="odd"> 
						<td><?php echo $subcategorias['Fecha']; ?></td>
						<td width="120"><?php echo Valores_sd($subcategorias['VentasReal']); ?></td>
						<td width="120"><?php echo Valores_sd($subcategorias['Ventas']); ?></td>
						  
					</tr> 
			<?php } 
			}?>

			</tbody>
		</table>
	</div>
</div>
	 
	 
<?php
$location.='?filter=true';
$location.='&Año='.$_GET['Año'];
$location.='&idMes='.$_GET['idMes'];
?>	 
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>	 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 }elseif ( ! empty($_GET['filter']) ) { 
// Se traen todos los movimientos
$arrUsers = array();
$query = "SELECT 
usuarios_listado.Nombre AS NombreAdministrador,
usuarios_listado.Comision AS ComisionAdmin,

vendedores.idUsuario AS idVendedor,
vendedores.Nombre AS NombreVendedor,
vendedores.Comision,
SUM(clientes_recargas.Monto) AS Ventas,
SUM(clientes_recargas.MontoReal) AS VentasReal,
core_meses.Nombre AS Mes

FROM `usuarios_listado`
LEFT JOIN `usuarios_listado`  vendedores ON vendedores.idCreador         = usuarios_listado.idUsuario
LEFT JOIN `clientes_recargas`            ON clientes_recargas.idUsuario  = vendedores.idUsuario
LEFT JOIN `core_meses`                   ON core_meses.idMes             = clientes_recargas.idMes

WHERE usuarios_listado.tipo = 'Supervisor'
AND clientes_recargas.Ano = '{$_GET['Año']}'
AND clientes_recargas.idMes = '{$_GET['idMes']}'
GROUP BY vendedores.idUsuario";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}	
// Se traen todos los gerentes de ventas
$arrGerentes = array();
$query = "SELECT Nombre, Comision
FROM `usuarios_listado`
WHERE tipo = 'Gerente Ventas'
";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGerentes,$row );
}
?>
 
 
 
 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Resumen de ventas del mes de <?php echo $arrUsers[0]['Mes'].' del '.$_GET['Año']?></h5>
		</header>
        
             
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
			
							  
			<tbody role="alert" aria-live="polite" aria-relevant="all"> 
			<?php
			$location.='?filter=true';
			$location.='&Año='.$_GET['Año'];
			$location.='&idMes='.$_GET['idMes'];
			
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			echo '<tr class="odd">	
						<td colspan="5"  style="background-color:#CCC">Ventas Vendedores</td>
				  </tr>';
			echo '<tr class="odd">	
						<td></td>
						<td width="120">% Comision</td>
						<td width="120">Comision</td>
						<td width="120">Monto Real</td>
						<td width="120">Monto Ofrecido</td>
				  </tr>';	
			filtrar($arrUsers, 'NombreAdministrador');
			//Variables
			$totalcomision = 0;
			$totalmreal = 0;
			$totalmofrecido = 0;
				  
			foreach($arrUsers as $categoria=>$ejecutivos){ 
				//Variables
				$comision = 0;
				$mreal = 0;
				$mofrecido = 0;
				
				echo '<tr class="odd">	
						<td colspan="5"  style="background-color:#DDD"><strong>Supervisor</strong> : '.$categoria.'</td>
					  </tr>';
				foreach ($ejecutivos as $subcategorias) { 
					$calccom = ($subcategorias['Ventas']/100)*$subcategorias['Comision'];
					
					$comision = $comision+$calccom;
					$mreal = $mreal+$subcategorias['VentasReal'];
					$mofrecido = $mofrecido+$subcategorias['Ventas'];
					
					$totalcomision = $totalcomision + $comision;
					$totalmreal = $totalmreal + $mreal;
					$totalmofrecido = $totalmofrecido + $mofrecido;
					
					echo '<tr class="odd"> 
						<td>
							<a href="'.$location.'&view='.$subcategorias['idVendedor'].'" title="Ver Detalles" class="icon-ver info-tooltip"></a>
							<strong>Vendedor</strong> : '.$subcategorias['NombreVendedor'].'
						</td>
						<td width="120">'.$subcategorias['Comision'].' %</td>
						<td width="120">'.Valores_sd($calccom).'</td>
						<td width="120">'.Valores_sd($subcategorias['VentasReal']).'</td>
						<td width="120">'.Valores_sd($subcategorias['Ventas']).'</td>
						  
					</tr>';
				} 
				echo '<tr class="odd">	
						<td colspan="2"  style="background-color:#FCFCFC">Subtotal</td>
						<td style="background-color:#DDD">'.Valores_sd($comision).'</td>
						<td style="background-color:#DDD">'.Valores_sd($mreal).'</td>
						<td style="background-color:#DDD">'.Valores_sd($mofrecido).'</td>
					  </tr>';
				
			}
			echo '<tr class="odd">	
					<td colspan="2"  style="background-color:#FCFCFC"><strong>TOTAL</strong></td>
					<td style="background-color:#DDD"><strong>'.Valores_sd($totalcomision).'</strong></td>
					<td style="background-color:#DDD"><strong>'.Valores_sd($totalmreal).'</strong></td>
					<td style="background-color:#DDD"><strong>'.Valores_sd($totalmofrecido).'</strong></td>
				  </tr>';
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			echo '<tr class="odd"><td colspan="5"  style="background-color:#FFF"></td></tr>
				  <tr class="odd"><td colspan="5"  style="background-color:#CCC">Comision Supervisores</td></tr>';
			echo '<tr class="odd">	
						<td colspan="3"></td>
						<td width="120">% Comision</td>
						<td width="120">Comision</td>
				  </tr>';
			$comisionSuper = 0;	  	
			foreach($arrUsers as $categoria=>$ejecutivos){ 
				//Variables
				$mofrecido = 0;
				foreach ($ejecutivos as $subcategorias) { 
					$mofrecido = $mofrecido+$subcategorias['Ventas'];
				} 
				$Comision = ($mofrecido/100)*$ejecutivos[0]['ComisionAdmin'];
				$comisionSuper = $comisionSuper + $Comision;
				echo '<tr class="odd">	
						<td colspan="3" >'.$categoria.'</td>
						<td>'.$ejecutivos[0]['ComisionAdmin'].' %</td>
						<td>'.Valores_sd($Comision).'</td>
					  </tr>';
			}
			echo '<tr class="odd">	
					<td colspan="4"  style="background-color:#FCFCFC"><strong>TOTAL</strong></td>
					<td style="background-color:#DDD"><strong>'.Valores_sd($comisionSuper).'</strong></td>
				  </tr>';	  
				  
				  
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
			echo '<tr class="odd"><td colspan="5"  style="background-color:#FFF"></td></tr>
				  <tr class="odd"><td colspan="5"  style="background-color:#CCC">Comision Gerente Ventas</td></tr>';	  
			$totalGerentes = 0;
			foreach ($arrGerentes as $gerentes) {
				$Comision = ($totalmofrecido/100)*$gerentes['Comision'];
				$totalGerentes = $totalGerentes + $Comision;
				echo '<tr class="odd">	
						<td colspan="3" >'.$gerentes['Nombre'].'</td>
						<td>'.$gerentes['Comision'].' %</td>
						<td>'.Valores_sd($Comision).'</td>
					  </tr>';
			}
			echo '<tr class="odd">	
					<td colspan="4"  style="background-color:#FCFCFC"><strong>TOTAL</strong></td>
					<td style="background-color:#DDD"><strong>'.Valores_sd($totalGerentes).'</strong></td>
				  </tr>';
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
			echo '<tr class="odd"><td colspan="5"  style="background-color:#FFF"></td></tr>
				  <tr class="odd"><td colspan="5"  style="background-color:#CCC">Resumen estado</td></tr>';
			$Bodegas = ($totalmofrecido/100)*20;
			
			echo '<tr class="odd"><td colspan="4" >Total Ventas</td>                 <td>'.Valores_sd($totalmofrecido).'</td></tr>';
			echo '<tr class="odd"><td colspan="4" >Descuento % Comision Bodegas</td> <td>'.Valores_sd($Bodegas).'</td></tr>';
			echo '<tr class="odd"><td colspan="4" >Descuento % Vendedores</td>       <td>'.Valores_sd($totalcomision).'</td></tr>';
			echo '<tr class="odd"><td colspan="4" >Descuento % Supervisores</td>     <td>'.Valores_sd($comisionSuper).'</td></tr>';
			echo '<tr class="odd"><td colspan="4" >Descuento % Gerentes</td>         <td>'.Valores_sd($totalGerentes).'</td></tr>';
			
			$ingresoReal = $totalmofrecido - ($Bodegas+$totalcomision+$comisionSuper+$totalGerentes);
			echo '<tr class="odd"><td colspan="4" ><strong>Total ingreso Real</strong></td> <td><strong>'.Valores_sd($ingresoReal).'</strong></td></tr>';
			
			?>

			</tbody>
		</table>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $original; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { ?>

<div class="col-lg-6 fcenter"><div class="box dark">	
 <header>		
 <div class="icons"><i class="fa fa-edit"></i></div>		
	<h5>Filtro</h5>	
	</header>	
	<div id="div-1" class="body">	
		<form class="form-horizontal" method="post">
        	
			<?php 
			//Se verifican si existen los datos
			if(isset($Año)) {    $x1  = $Año;    }else{$x1  = '';}
			if(isset($idMes)) {  $x2  = $idMes;  }else{$x2  = '';}
			

			//se dibujan los inputs
			echo form_select_n_auto('Año','Año', $x1, 2, 2015, 2020);
			echo form_select('Mes','idMes', $x2, 2, 'idMes', 'Nombre', 'core_meses', 0, $dbConn);
			?>
			          		
			<div class="form-group">	
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
