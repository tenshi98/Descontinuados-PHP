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
$original = "taxistas_facturacion_historico.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['filtrar']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/taxista_facturacion_historico.php';		
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
<?php  if (isset($errors[5])) {echo $errors[5];}?>              
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['factura']) ) {
//Doy ubicaciones
$z="WHERE solicitud_taxi_listado.idDocumento={$_GET['factura']} AND solicitud_taxi_listado.EstadoPago=2";	
//Consulta 	
$query = "SELECT
taxista_calendario.Semana,
solicitud_taxi_listado.Fecha,
clientes_listado.idCliente,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
COUNT(solicitud_taxi_listado.idTaxista) AS cuenta_carreras,
taxista_pagos.Fecha AS fecha_doc,
usuarios_listado.Nombre AS NombreEncargado,
taxista_tipo_pago.Nombre AS tipoPago,
taxista_pagos.Ndoc,
taxista_pagos.Monto AS monto_pagado

FROM `taxista_calendario`
LEFT JOIN solicitud_taxi_listado   ON solicitud_taxi_listado.Semana    = taxista_calendario.Semana
LEFT JOIN clientes_listado         ON clientes_listado.idCliente       = solicitud_taxi_listado.idTaxista
LEFT JOIN detalle_general          ON detalle_general.id_Detalle       = solicitud_taxi_listado.Estado
LEFT JOIN taxista_pagos            ON taxista_pagos.idDocumento        = solicitud_taxi_listado.idDocumento
LEFT JOIN usuarios_listado         ON usuarios_listado.idUsuario       = taxista_pagos.idEncargado
LEFT JOIN taxista_tipo_pago        ON taxista_tipo_pago.idTipoPago     = taxista_pagos.idTipoPago
".$z."
GROUP BY taxista_calendario.Semana , solicitud_taxi_listado.Fecha  ";
$resultado = mysql_query ($query, $dbConn);
while ($Facturacion[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Facturacion);
array_multisort($Facturacion, SORT_ASC);
// Ubico los datos de la empresa
$query = "SELECT RazonSocial, email_principal, Direccion, Ciudad, Comuna, Fono, imgLogo                    
FROM `clientes_tipos`
WHERE idTipoCliente={$arrUsuario['idTipoCliente']} ";
$resultado = mysql_query ($query, $dbConn);
$numrows = mysql_num_rows ($resultado);
//Verifico que la empresa tenga datos
if($numrows==0){
	// Ubico los datos de la empresa de soporte
	$query = "SELECT Nombre AS RazonSocial, email_principal, Direccion, Ciudad, Comuna, Fono                  
	FROM `core_datos`
	WHERE id_Datos=1 ";
	$resultado = mysql_query ($query, $dbConn);
	$rowdata = mysql_fetch_assoc ($resultado);	
	$fact_numrows=0;
}else{
	$rowdata = mysql_fetch_assoc ($resultado);
	$fact_numrows=$arrUsuario['idTipoCliente'];	
}
//Obtengo los datos con los precios, etc.
$query = "SELECT ValorPlanBase, NumeroCarreras, ValorCarrera, nombre_impuesto, porcentaje_impuesto
FROM `taxista_sistema`
WHERE idSistema = '1'";
$result = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc($result);
// Se trae un listado con todos los bloqueos del taxista
$arrBloqueos = array();
$query = "SELECT Monto, EstadoPago, FechaBloqueo
FROM `taxista_bloqueos`
WHERE idDocumento = {$_GET['factura']}
ORDER BY FechaBloqueo ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBloqueos,$row );
}
?>
                                

<div class="col-lg-9 fcenter">

<div id="page-wrap">
    <div id="header">FACTURACION</div>
    <div id="identity">
        <div id="address">
        	<?php echo $rowdata['RazonSocial'].'<br/>'; ?>
            <?php echo $rowdata['email_principal'].'<br/>'; ?>
            <?php echo $rowdata['Direccion'].' '.$rowdata['Ciudad'].' '.$rowdata['Comuna'].'<br/>'; ?>
            <?php echo 'Fono '.$rowdata['Fono']; ?> 
        </div>
        <div id="logo">     
            <img id="image" src="img/<?php if(isset($rowdata['imgLogo'])&&$rowdata['imgLogo']!=''){echo $rowdata['imgLogo'];}else{echo 'logo_default.png';} ?>" alt="logo">
        </div>
    </div>
    
    <div style="clear:both"></div>
    
    <div id="customer">
        <div id="customer-title"><?php echo 'Trabajador : '.$Facturacion[0]['Nombre'].' '.$Facturacion[0]['Apellido_Paterno'] ?></div>
        <table id="meta">
            <tbody>
                <tr>
                    <td class="meta-head">Documento N°</td>
                    <td><?php echo n_doc($_GET['factura']) ?></td>
                </tr>
                <tr>
                    <td class="meta-head">Fecha</td>
                    <td><?php echo Fecha_estandar($Facturacion[0]['fecha_doc']) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <table id="items">
        <tbody>
            <tr>
                <th>Semana</th>
                <th>Fecha</th>
                <th width="120">Minimo carreras</th>
                <th width="120">Carreras hechas</th>
                <th width="120">Valor por carrera</th>
                <th width="120">Total carrera</th>
            </tr>		  
            
            
            <?php 
			$semana = 0;
			$total = 0;
			//se imprime la id de la tarea
			filtrar($Facturacion, 'Semana'); 
			foreach($Facturacion as $tipo=>$componentes){ 
				echo '<tr class="item-row fact_tittle"><td colspan="6">Semana '.$tipo.'</td></tr>';
				foreach ($componentes as $idcomp) { 
					echo'<tr class="item-row">';
						echo'<td class="item-name"></td>';
						echo'<td>'.$idcomp['Fecha'].'</td>';
						echo'<td>'.$row_data['NumeroCarreras'].'</td>';
						echo'<td>'.$idcomp['cuenta_carreras'].'</td>';
						echo'<td>'.Valores_sd($row_data['ValorCarrera']).'</td>';
						//Calculo carreras
						$carreras = $idcomp['cuenta_carreras']*$row_data['ValorCarrera'];
						echo'<td>'.Valores_sd($carreras).'</td>';
						
						$semana = $semana+$carreras;
						
						
					echo'</tr>';
				}
				//Se calcula el total semanal
				if($semana<$row_data['ValorPlanBase']){
				echo '<tr class="item-row fact_total"><td colspan="3"></td><td colspan="2">Plan Base (meta no alcanzada)</td><td >'.Valores_sd($row_data['ValorPlanBase']).'</td></tr>';
				$total = $total+$row_data['ValorPlanBase'];
				}else{
				echo '<tr class="item-row fact_total"><td colspan="4"></td><td>Total Semanal</td><td >'.Valores_sd($semana).'</td></tr>';
				$total = $total+$semana;
				}
				$semana=0;	
			}?>  
            
   <tr class="item-row fact_tittle"><td colspan="6">Atrasos</td></tr>         
  <?php foreach ($arrBloqueos as $bloqueos) { ?>
  <tr class="item-row">
	<td class="item-name"></td>
	<td></td>
	<td colspan="3"><?php echo 'Bloqueado el '.Fecha_estandar($bloqueos['FechaBloqueo']) ?></td>
	<td><?php echo Valores_sd($bloqueos['Monto']) ?></td>
	<?php $total = $total+$bloqueos['Monto'];?>			
	</tr>       
    <?php } ?>  
           

            
            <tr id="hiderow">
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" class="blank"> </td>
                <td colspan="2" class="total-line">Subtotal</td>
                <td class="total-value"><div id="subtotal"><?php echo Valores_sd($total) ?></div></td>
            </tr>
            <tr>
                <td colspan="3" class="blank"> </td>
                <td colspan="2" class="total-line"><?php echo $row_data['nombre_impuesto'].' ('.$row_data['porcentaje_impuesto'].'%)' ?></td>
                <?php //Calculo impuesto
				$impuesto = ($total*$row_data['porcentaje_impuesto'])/100;
				?>
                <td class="total-value"><div id="total"><?php echo Valores_sd($impuesto) ?></div></td>
            </tr>
            <tr>
                <td colspan="3" class="blank"><p>Firma Trabajador</p></td>
                <td colspan="2" class="total-line balance">Total</td>
                <td class="total-value balance"><div class="due"><?php echo Valores_sd($total+$impuesto) ?></div></td>
            </tr>
        </tbody>
    </table>
    
   <div id="terms">
   <?php if($arrUsuario['tipo']=='SuperAdmin' or $arrUsuario['tipo']=='Administrador'){ ?>
    <h5>Detalles de la facturacion</h5>
    </div> 
     <table id="meta">
            <tbody>
                <tr>
                    <td class="meta-head">Encargado</td>
                    <td><?php echo $componentes[0]['NombreEncargado'] ?></td>
                </tr>
                <tr>
                    <td class="meta-head">Pago</td>
                    <td><?php echo $componentes[0]['tipoPago'].' N Doc. '.$componentes[0]['Ndoc']; ?></td>
                </tr>
                <tr>
                    <td class="meta-head">Monto Pagado</td>
                    <td><?php echo Valores_sd($componentes[0]['monto_pagado']); ?></td>
                </tr>   
            </tbody>
    </table>
     <div class="clearfix"></div>   
	<div id="terms">
    <h5></h5>
    <?php } ?>
    </div>
    
    
    
</div>


</div>




<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<?php 
//Se crean las variables para las busquedas
$s="?filter=true&pagina=".$_GET['pagina'];
$x="";
//Se actualizan los filtros
if(isset($_GET['idCliente']) && $_GET['idCliente'] != '')           { $x .= "&idCliente=".$_GET['idCliente']; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')                     { $x .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')             { $x .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')             { $x .= "&idComuna=".$_GET['idComuna'] ; }
if(isset($_GET['Semana_inicio']) && $_GET['Semana_inicio'] != '')   { $x .= "&Semana_inicio=".$_GET['Semana_inicio'] ; }
if(isset($_GET['Semana_termino']) && $_GET['Semana_termino'] != '') { $x .= "&Semana_termino=".$_GET['Semana_termino'] ; }
if(isset($_GET['Ano']) && $_GET['Ano'] != '')                       { $x .= "&Ano=".$_GET['Ano'] ; }
if(isset($_GET['Estado']) && $_GET['Estado'] != '')                 { $x .= "&Estado=".$_GET['Estado'] ; }
if(isset($_GET['idTipoPago']) && $_GET['idTipoPago'] != '')         { $x .= "&idTipoPago=".$_GET['idTipoPago'] ; }
if(isset($_GET['NDoc']) && $_GET['NDoc'] != '')                     { $x .= "&NDoc=".$_GET['NDoc'] ; }
if(isset($_GET['estadopago']) && $_GET['estadopago'] != '')         { $x .= "&estadopago=".$_GET['estadopago'] ; }
if(isset($_GET['view']) && $_GET['view'] != '')                     { $x .= "&view=".$_GET['view'] ; }
?>
<a href="<?php echo $location.$s.$x ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<a target="new" href="<?php echo 'taxistas_facturacion_imprimir.php?factura='.$_GET['factura'].'&fact_numrows='.$fact_numrows; ?>" class="btn btn-primary fright margin_width" data-original-title="" title="">Guardar PDF</a>
<div class="clearfix"></div>
</div>	


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['view']) ) {

//Se crean las variables para las busquedas
$z="WHERE clientes_listado.idCliente={$_GET['view']} AND taxista_pagos.Semana = taxista_calendario.Semana ";	
$w="WHERE taxista_calendario.Semana>0 ";
$s="?filter=true&pagina=".$_GET['pagina'];
$x="";
//Se actualizan los filtros
if(isset($_GET['idCliente']) && $_GET['idCliente'] != '')  { 
	$x .= "&idCliente=".$_GET['idCliente']; 
}
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')            { 
	$z .= " AND clientes_listado.Sexo = '".$_GET['Sexo']."'" ;
	$x .= "&Sexo=".$_GET['Sexo'] ;           
}
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')        { 
	$z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ;
	$x .= "&idCiudad=".$_GET['idCiudad'] ;       
}
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')        { 
	$z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ;
	$x .= "&idComuna=".$_GET['idComuna'] ;       
}
if(isset($_GET['Estado']) && $_GET['Estado'] != '')        { 
	$z .= " AND clientes_listado.Estado = '".$_GET['Estado']."'" ;
	$x .= "&Estado=".$_GET['Estado'] ;       
}
if(isset($_GET['idTipoPago']) && $_GET['idTipoPago'] != '')   { 
	$z .= " AND taxista_pagos.idTipoPago = '".$_GET['idTipoPago']."'" ;
	$x .= "&idTipoPago=".$_GET['idTipoPago'] ;       
}
if(isset($_GET['NDoc']) && $_GET['NDoc'] != '')  { 
	$z .= " AND taxista_pagos.NDoc = '".$_GET['NDoc']."'" ;
	$x .= "&NDoc=".$_GET['NDoc'] ;       
}
//Filtro externo
if(isset($_GET['Semana_inicio']) && $_GET['Semana_inicio'] != ''&&isset($_GET['Semana_termino']) && $_GET['Semana_termino'] != ''){ 
	$w .= " AND taxista_calendario.Semana BETWEEN '{$_GET['Semana_inicio']}' AND '{$_GET['Semana_termino']}'" ;
	$x .= "&Semana_inicio={$_GET['Semana_inicio']}&Semana_termino={$_GET['Semana_termino']}" ;           
}
if(isset($_GET['Ano']) && $_GET['Ano'] != '')        { 
	$w .= " AND taxista_calendario.Ano = '".$_GET['Ano']."'" ;
	$x .= "&Ano=".$_GET['Ano'] ;       
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
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Pagos realizados de <?php echo $_GET['nm'] ?></h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Año</th>
        <th>Semana</th>
        <th>Fecha Pagada</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>                     
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrPagos as $pagos) { ?>
		<?php //Se muestran los datos de acuerdo a la busqueda
        if(isset($_GET['estadopago'])&&$_GET['estadopago']==1&&$pagos['idDocumento']!=''){ ?>
            <tr class="odd">
                <td class=" "><?php echo 'Año '.$pagos['Ano']; ?></td>
                <td class=" "><?php echo 'Semana '.$pagos['Semana']; ?></td>
                <td class=" "><?php if($pagos['Fecha']!=''&&$pagos['Fecha']!=0){echo Fecha_estandar($pagos['Fecha']);}else{echo 'No Pagado';} ?></td>
                <td class=" ">
    <?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.$s.$x.'&view='.$_GET['view'].'&factura='.$pagos['idDocumento']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
                </td>
            </tr>
        <?php }elseif(isset($_GET['estadopago'])&&$_GET['estadopago']==2&&$pagos['idDocumento']==''){ ?>
            <tr class="odd">
                <td class=" "><?php echo 'Año '.$pagos['Ano']; ?></td>
                <td class=" "><?php echo 'Semana '.$pagos['Semana']; ?></td>
                <td class=" "><?php if($pagos['Fecha']!=''&&$pagos['Fecha']!=0){echo Fecha_estandar($pagos['Fecha']);}else{echo 'No Pagado';} ?></td>
                <td class=" "></td>
            </tr>
        <?php } elseif(!isset($_GET['estadopago'])){ ?>
        	<tr class="odd">
                <td class=" "><?php echo 'Año '.$pagos['Ano']; ?></td>
                <td class=" "><?php echo 'Semana '.$pagos['Semana']; ?></td>
                <td class=" "><?php if($pagos['Fecha']!=''&&$pagos['Fecha']!=0){echo Fecha_estandar($pagos['Fecha']);}else{echo 'No Pagado';} ?></td>
                <td class=" ">
    <?php if ($rowlevel['level']>=1&&$pagos['idDocumento']!=''){?><a href="<?php echo $location.$s.$x.'&view='.$_GET['view'].'&factura='.$pagos['idDocumento']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
                </td>
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
//Se actualizan los filtros
if(isset($_GET['idCliente']) && $_GET['idCliente'] != '')  { 
	$z .= " AND taxista_pagos.idTaxista = '".$_GET['idCliente']."'" ;
	$x .= "&idCliente=".$_GET['idCliente']; 
}
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')            { 
	$z .= " AND clientes_listado.Sexo = '".$_GET['Sexo']."'" ;
	$x .= "&Sexo=".$_GET['Sexo'] ;           
}
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')        { 
	$z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ;
	$x .= "&idCiudad=".$_GET['idCiudad'] ;       
}
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')        { 
	$z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ;
	$x .= "&idComuna=".$_GET['idComuna'] ;       
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
if(isset($_GET['idTipoPago']) && $_GET['idTipoPago'] != '')   { 
	$z .= " AND taxista_pagos.idTipoPago = '".$_GET['idTipoPago']."'" ;
	$x .= "&idTipoPago=".$_GET['idTipoPago'] ;       
}
if(isset($_GET['NDoc']) && $_GET['NDoc'] != '')  { 
	$z .= " AND taxista_pagos.NDoc = '".$_GET['NDoc']."'" ;
	$x .= "&NDoc=".$_GET['NDoc'] ;       
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
clientes_listado.idCliente,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno
FROM `clientes_listado`
LEFT JOIN taxista_pagos    ON taxista_pagos.idTaxista     = clientes_listado.idCliente
".$z."
GROUP BY clientes_listado.idCliente
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
        <th width="120">Acciones</th>
    </tr>
	</thead>                     
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrSolicitudes as $solicitudes) { ?>
    	<tr class="odd">
            <td class=" "><?php echo $solicitudes['Nombre'].' '.$solicitudes['Apellido_Paterno']; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.$s.$x.'&view='.$solicitudes['idCliente'].'&nm='.$solicitudes['Nombre'].' '.$solicitudes['Apellido_Paterno']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
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
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z=" AND clientes_listado.idTipoCliente>=0";	
}else{
	$z=" AND clientes_listado.idTipoCliente={$arrUsuario['idTipoCliente']}";	
}
//Listado de usuarios
$arrUsers = array();
$query = "SELECT idCliente,Nombre, Apellido_Paterno, Apellido_Materno
FROM `clientes_listado`
WHERE clientes_listado.Estado = 1 ".$z."
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}
mysql_free_result($resultado);
// Se trae un listado de todas las ciudades
$arrCiudad = array();
$query = "SELECT  idCiudad, Nombre
FROM `mnt_ubicacion_ciudad`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrCiudad,$row );
} 
// Se trae un listado de todas las comunas
$query = "SELECT  idComuna, idCiudad, Nombre
FROM `mnt_ubicacion_comunas` ";
$resultado = mysql_query ($query, $dbConn);
while ($Comuna[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Comuna);
array_multisort($Comuna, SORT_ASC);
// Se trae un listado de todos los estados
$arrEstados = array();
$query = "SELECT  id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo=1
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrEstados,$row );
}
// Se trae un listado con todos los usuarios
$arrTipoPago = array();
$query = "SELECT idTipoPago,Nombre
FROM `taxista_tipo_pago`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipoPago,$row );
}
?>
<script type="text/javascript" SRC="js/filterlist.js"></script>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Historico Facturacion</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Filtro Taxista</label>
				<div class="col-lg-8">
				<input type="text" id="text1" placeholder="Filtro" class="form-control filter" name="regexp" value="" onKeyUp="myfilter.set(this.value)">               
				</div>
			</div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Taxista</label>
                <div class="col-lg-8">
                <select name="idCliente" class="form-control" >
                <option value="" selected>Seleccione un Taxista</option>
                <?php foreach ( $arrUsers as $usuario ) { ?>
                <option value="<?php echo $usuario['idCliente']; ?>" ><?php echo $usuario['Nombre'].' '.$usuario['Apellido_Paterno'].' '.$usuario['Apellido_Materno']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
<script type="text/javascript">
	<!--
	var myfilter = new filterlist(document.form1.idCliente);
	//-->
</script>            
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Sexo</label>
                <div class="col-lg-8">
                <select name="Sexo" class="form-control" >
                    <option value="" selected>Seleccione un Sexo</option>
                    <option value="M" >Masculino</option>
                    <option value="F" >Femenino</option>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Regiones</label>
                <div class="col-lg-8">
                <select name="idCiudad" class="form-control" onChange="cambia_ciudad()">
                <option value="" selected>Seleccione una Region</option>
                <?php foreach ( $arrCiudad as $ciudad ) { ?>
                <option value="<?php echo $ciudad['idCiudad']; ?>" ><?php echo $ciudad['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Comunas</label>
                <div class="col-lg-8">
                <select name="idComuna" class="form-control" >
                <option value="" selected>Seleccione una Comuna</option>
                </select>
                </div>
            </div>
            
<script>
<?php
//se imprime la id de la tarea
filtrar($Comuna, 'idCiudad'); 
foreach($Comuna as $tipo=>$componentes){ 
echo'var id_comuna_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idComuna'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Comuna as $tipo=>$componentes){ 
echo'var comuna_'.$tipo.'=new Array("Seleccione una Comuna"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_ciudad(){
	var Componente
	Componente = document.form1.idCiudad[document.form1.idCiudad.selectedIndex].value
	try {
	if (Componente != '') {
		id_comuna=eval("id_comuna_" + Componente)
		comuna=eval("comuna_" + Componente)
		num_int = id_comuna.length
		document.form1.idComuna.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idComuna.options[i].value=id_comuna[i]
		   document.form1.idComuna.options[i].text=comuna[i]
		}	
	}else{
		document.form1.idComuna.length = 1
		document.form1.idComuna.options[0].value = ""
	    document.form1.idComuna.options[0].text = "Seleccione una Comuna"
	}
	} catch (e) {
    alert("La Region seleccionada no posee comunas asignadas");
}
	document.form1.idComuna.options[0].selected = true
}
</script>
            
           <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Semana Inicio</label>
                <div class="col-lg-8">
                <select name="Semana_inicio" class="form-control" >
                    <option value="" selected>Seleccione una Semana</option>
                    <?php //Escribo el numero de semana
					for ($i = 1; $i <= 52; $i++) {
						echo '<option value="'.$i.'" >'.$i.'</option>';
					}
					?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Semana Termino</label>
                <div class="col-lg-8">
                <select name="Semana_termino" class="form-control" >
                    <option value="" selected>Seleccione una Semana</option>
                    <?php //Escribo el numero de semana
					for ($i = 1; $i <= 52; $i++) {
						echo '<option value="'.$i.'" >'.$i.'</option>';
					}
					?>
                </select>
                </div>
            </div> 
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Año</label>
                <div class="col-lg-8">
                <select name="Ano" class="form-control" required >
                    <option value="" selected>Seleccione un Año</option>
                    <?php //Escribo el numero de año
					for ($i = 2015; $i <= 2020; $i++) {
						echo '<option value="'.$i.'" >'.$i.'</option>';
					}
					?>
                </select>
                </div>
            </div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Estado Taxista</label>
				<div class="col-lg-8">
                    <select name="Estado" class="form-control" >
                    <option value="" selected="selected">Seleccione un Estado</option>
                    <?php foreach ($arrEstados as $estado) { ?>
                    <option value="<?php echo $estado['id_Detalle']; ?>" ><?php echo $estado['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Tipo de Documento</label>
				<div class="col-lg-8">
                    <select name="idTipoPago" class="form-control" >
                    <option value="" selected="selected">Seleccione un tipo de documento</option>
                    <?php foreach ($arrTipoPago as $tipos) { ?>
                    <option value="<?php echo $tipos['idTipoPago']; ?>" ><?php echo $tipos['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Numero del Documento</label>
				<div class="col-lg-8">
					<input type="text"  placeholder="Numero del Documento" class="form-control"  name="NDoc" >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Estado de los Pagos</label>
				<div class="col-lg-8">
                    <select name="estadopago" class="form-control" >
                    <option value="" selected="selected">Seleccione un estado</option>
                    <option value="1">Pagado</option>
                    <option value="2">No Pagado</option>               
                    </select>
				</div>
			</div>
          
  
            
            
            
            
                         
            
      
            
			<div class="form-group">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Filtrar" name="filtrar">
				
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