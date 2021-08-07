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
$original = "taxistas_facturacion_historico.php";
$location = $original;
//Se agregan ubicaciones
$location .='?filter=true';
if(isset($_GET['pagina']) && $_GET['pagina'] != ''){                 $location .= "&pagina=".$_GET['pagina'] ; 	}
if(isset($_GET['PPU']) && $_GET['PPU'] != ''){                       $location .= "&PPU=".$_GET['PPU'] ; }
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != ''){               $location .= "&N_Motor=".$_GET['N_Motor'] ; }
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != ''){             $location .= "&N_Chasis=".$_GET['N_Chasis'] ; }
if(isset($_GET['idConductor']) && $_GET['idConductor'] != ''){       $location .= "&idConductor=".$_GET['idConductor'] ; }
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != ''){   $location .= "&idPropietario=".$_GET['idPropietario'] ; }
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != ''){       $location .= "&idRecorrido=".$_GET['idRecorrido'] ; }
if(isset($_GET['idMarca']) && $_GET['idMarca'] != ''){               $location .= "&idMarca=".$_GET['idMarca'] ; }
if(isset($_GET['idModelo']) && $_GET['idModelo'] != ''){             $location .= "&idModelo=".$_GET['idModelo'] ; }
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != ''){   $location .= "&idTransmision=".$_GET['idTransmision'] ; }
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != ''){         $location .= "&idColorV_1=".$_GET['idColorV_1'] ; }
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != ''){         $location .= "&idColorV_2=".$_GET['idColorV_2'] ; }
if(isset($_GET['Ano']) && $_GET['Ano'] != ''){                       $location .= "&Ano=".$_GET['Ano'] ; }
if(isset($_GET['Estado']) && $_GET['Estado'] != ''){                 $location .= "&Estado=".$_GET['Estado'] ; }
if(isset($_GET['estadopago']) && $_GET['estadopago'] != ''){         $location .= "&estadopago=".$_GET['estadopago'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != ''){             $location .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != ''){             $location .= "&idComuna=".$_GET['idComuna'] ; }
if(isset($_GET['idTipoPago']) && $_GET['idTipoPago'] != ''){         $location .= "&idTipoPago=".$_GET['idTipoPago'] ; }
if(isset($_GET['NDoc']) && $_GET['NDoc'] != ''){                     $location .= "&NDoc=".$_GET['NDoc'] ; }
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$location .= "&fechaInicio={$_GET['fechaInicio']}&fechaTermino={$_GET['fechaTermino']}" ; 
}
if(isset($_GET['Semana_inicio']) && $_GET['Semana_inicio'] != ''&&isset($_GET['Semana_termino']) && $_GET['Semana_termino'] != ''){ 
	$location .= "&Semana_inicio={$_GET['Semana_inicio']}&Semana_termino={$_GET['Semana_termino']}" ; 
}

//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_trabajo= 'filtro_fac_historicos';
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
              <a href="index.html" class="navbar-brand">
                <?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?><img src="upload/<?php echo $arrUsuario['imgLogo']; ?>" alt=""><?php }else{?><img src="img/logo_default.png" alt=""><?php } ?>
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
<a href="<?php echo $location.'&view='.$_GET['view'].'&nm='.$_GET['nm'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<a target="new" href="<?php echo 'taxistas_facturacion_imprimir.php?factura='.$_GET['factura'].'&fact_numrows='.$fact_numrows; ?>" class="btn btn-primary fright margin_width" data-original-title="" title="">Guardar PDF</a>
<div class="clearfix"></div>
</div>	


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['view']) ) {

//Se crean las variables para las busquedas
$z="WHERE clientes_listado.idCliente={$_GET['view']} AND taxista_pagos.Semana = taxista_calendario.Semana ";	
$w="WHERE taxista_calendario.Semana>0 ";

//Se actualizan los filtros

if(isset($_GET['Sexo']) && $_GET['Sexo'] != '') {               $z .= " AND clientes_listado.Sexo = '".$_GET['Sexo']."'" ;         }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '') {       $z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ;     }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '') {       $z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ;     }
if(isset($_GET['Estado']) && $_GET['Estado'] != '') {           $z .= " AND clientes_listado.Estado = '".$_GET['Estado']."'" ;   }
if(isset($_GET['idTipoPago']) && $_GET['idTipoPago'] != '') {   $z .= " AND taxista_pagos.idTipoPago = '".$_GET['idTipoPago']."'" ;  }
if(isset($_GET['NDoc']) && $_GET['NDoc'] != '')  {              $z .= " AND taxista_pagos.NDoc = '".$_GET['NDoc']."'" ;    }
if(isset($_GET['Ano']) && $_GET['Ano'] != '') {                 $w .= " AND taxista_calendario.Ano = '".$_GET['Ano']."'" ;    }
//Filtro externo
if(isset($_GET['Semana_inicio']) && $_GET['Semana_inicio'] != ''&&isset($_GET['Semana_termino']) && $_GET['Semana_termino'] != ''){ 
	$w .= " AND taxista_calendario.Semana BETWEEN '{$_GET['Semana_inicio']}' AND '{$_GET['Semana_termino']}'" ;          
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
                <td><?php echo 'Año '.$pagos['Ano']; ?></td>
                <td><?php echo 'Semana '.$pagos['Semana']; ?></td>
                <td><?php if($pagos['Fecha']!=''&&$pagos['Fecha']!=0){echo Fecha_estandar($pagos['Fecha']);}else{echo 'No Pagado';} ?></td>
                <td>
					<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$_GET['view'].'&nm='.$_GET['nm'].'&factura='.$pagos['idDocumento']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
                </td>
            </tr>
        <?php }elseif(isset($_GET['estadopago'])&&$_GET['estadopago']==2&&$pagos['idDocumento']==''){ ?>
            <tr class="odd">
                <td><?php echo 'Año '.$pagos['Ano']; ?></td>
                <td><?php echo 'Semana '.$pagos['Semana']; ?></td>
                <td><?php if($pagos['Fecha']!=''&&$pagos['Fecha']!=0){echo Fecha_estandar($pagos['Fecha']);}else{echo 'No Pagado';} ?></td>
                <td></td>
            </tr>
        <?php } elseif(!isset($_GET['estadopago'])){ ?>
        	<tr class="odd">
                <td><?php echo 'Año '.$pagos['Ano']; ?></td>
                <td><?php echo 'Semana '.$pagos['Semana']; ?></td>
                <td><?php if($pagos['Fecha']!=''&&$pagos['Fecha']!=0){echo Fecha_estandar($pagos['Fecha']);}else{echo 'No Pagado';} ?></td>
                <td>
    <?php if ($rowlevel['level']>=1&&$pagos['idDocumento']!=''){?><a href="<?php echo $location.'&view='.$_GET['view'].'&nm='.$_GET['nm'].'&factura='.$pagos['idDocumento']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
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
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
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

//Se actualizan los filtros
if(isset($_GET['idCliente']) && $_GET['idCliente'] != '')  {    $z .= " AND taxista_pagos.idTaxista = '".$_GET['idCliente']."'" ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '') {               $z .= " AND clientes_listado.Sexo = '".$_GET['Sexo']."'" ;        }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '') {       $z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ;     }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '') {       $z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ;      }
if(isset($_GET['Ano']) && $_GET['Ano'] != '')  {                $z .= " AND taxista_pagos.Ano = '".$_GET['Ano']."'" ;     }
if(isset($_GET['Estado']) && $_GET['Estado'] != '') {           $z .= " AND clientes_listado.Estado = '".$_GET['Estado']."'" ;     }
if(isset($_GET['idTipoPago']) && $_GET['idTipoPago'] != '') {   $z .= " AND taxista_pagos.idTipoPago = '".$_GET['idTipoPago']."'" ;      }
if(isset($_GET['NDoc']) && $_GET['NDoc'] != '')  {              $z .= " AND taxista_pagos.NDoc = '".$_GET['NDoc']."'" ;     }
if(isset($_GET['Semana_inicio']) && $_GET['Semana_inicio'] != ''&&isset($_GET['Semana_termino']) && $_GET['Semana_termino'] != ''){ 
	$z .= " AND taxista_pagos.Semana BETWEEN '{$_GET['Semana_inicio']}' AND '{$_GET['Semana_termino']}'" ;          
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
clientes_listado.PPU
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
        <th>Vehiculo</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>                     
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrSolicitudes as $solicitudes) { ?>
    	<tr class="odd">
            <td><?php echo 'Patente '.$solicitudes['PPU']; ?></td>
			<td>
				<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$solicitudes['idCliente'].'&nm='.$solicitudes['PPU']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<?php 
if (isset($_GET['search'])) {  $search ='&search='.$_GET['search']; } else { $search='';}
echo paginador_1($total_paginas, $original, $search, $num_pag ) ?>   
</div>      
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $original; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {?>

<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Historico Facturacion</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($idConductor)) {    $x1  = $idConductor;     }else{$x1  = '';}
			if(isset($idPropietario)) {  $x2  = $idPropietario;   }else{$x2  = '';}
			if(isset($idRecorrido)) {    $x3  = $idRecorrido;     }else{$x3  = '';}
			if(isset($PPU)) {            $x4  = $PPU;             }else{$x4  = '';}
			if(isset($idMarca)) {        $x5  = $idMarca;         }else{$x5  = '';}
			if(isset($idModelo)) {       $x6  = $idModelo;        }else{$x6  = '';}
			if(isset($idTransmision)) {  $x7  = $idTransmision;   }else{$x7  = '';}
			if(isset($idColorV_1)) {     $x8  = $idColorV_1;      }else{$x8  = '';}
			if(isset($idColorV_2)) {     $x9  = $idColorV_2;      }else{$x9  = '';}
			if(isset($fechaInicio)) {    $x10 = $fechaInicio;     }else{$x10 = '';}
			if(isset($fechaTermino)) {   $x11 = $fechaTermino;    }else{$x11 = '';}
			if(isset($N_Motor)) {        $x12 = $N_Motor;         }else{$x12 = '';}
			if(isset($N_Chasis)) {       $x13 = $N_Chasis;        }else{$x13 = '';}
			if(isset($Estado)) {         $x14 = $Estado;          }else{$x14 = '';}
			if(isset($idCiudad)) {       $x15 = $idCiudad;        }else{$x15 = '';}
			if(isset($idComuna)) {       $x16 = $idComuna;        }else{$x16 = '';}
			if(isset($Semana_inicio)) {  $x17 = $Semana_inicio;   }else{$x17 = '';}
			if(isset($Semana_termino)) { $x18 = $Semana_termino;  }else{$x18 = '';}
			if(isset($Ano)) {            $x19 = $Ano;             }else{$x19 = '';}
			if(isset($idTipoPago)) {     $x20 = $idTipoPago;      }else{$x20 = '';}
			if(isset($NDoc)) {           $x21 = $NDoc;            }else{$x21 = '';}
			if(isset($estadopago)) {     $x22 = $estadopago;      }else{$x22 = '';}

			//se dibujan los inputs
			echo form_select_filter('Conductor','idConductor', $x1, 1, 'idConductor', 'Nombre,Apellido_Paterno', 'taxista_conductores', 0, $dbConn);
			echo form_select('Propietario','idPropietario', $x2, 1, 'idPropietario', 'Nombre,Apellido_Paterno', 'taxista_propietarios', 0, $dbConn);
			echo form_select('Recorrido','idRecorrido', $x3, 1, 'idRecorrido', 'Nombre', 'taxista_recorridos', 0, $dbConn);
			echo form_input('text', 'Patente', 'PPU', $x4, 1);
			echo form_select_depend1('Marca','idMarca', $x5, 1, 'idMarca', 'Nombre', 'vehiculos_marcas', 0,
									'Modelo','idModelo', $x6, 1, 'idModelo', 'idMarca', 'Nombre', 'vehiculos_modelos', 0, 
									 $dbConn);
			echo form_select('Tipo de Transmision','idTransmision', $x7, 1, 'idTransmision', 'Nombre', 'vehiculos_transmision', 0, $dbConn);
			echo form_select('Color Base','idColorV_1', $x8, 1, 'idColorV', 'Nombre', 'vehiculos_colores', 0, $dbConn);
			echo form_select('Color Complementario','idColorV_2', $x9, 1, 'idColorV', 'Nombre', 'vehiculos_colores', 0, $dbConn);			
			echo form_date('F Fabricacion Inicio','fechaInicio', $x10, 1);
			echo form_date('F Fabricacion Fin','fechaTermino', $x11, 1);			
			echo form_input('text', 'Numero de Motor', 'N_Motor', $x12, 1);
			echo form_input('text', 'Numero de Chasis', 'N_Chasis', $x13, 1);
			echo form_select('Estado Taxista','Estado', $x14, 1, 'id_Detalle', 'Nombre', 'detalle_general', 'Tipo=1', $dbConn);
			echo form_select_depend1('Ciudad','idCiudad', $x15, 1, 'idCiudad', 'Nombre', 'mnt_ubicacion_ciudad', 0,
									'Comuna','idComuna', $x16, 1, 'idComuna', 'idCiudad', 'Nombre', 'mnt_ubicacion_comunas', 0, 
									 $dbConn);
			echo form_select_n_auto('Semana Inicio','Semana_inicio', $x17, 1, 1, 52);
			echo form_select_n_auto('Semana Termino','Semana_termino', $x18, 1, 1, 52);
			echo form_select_n_auto('Año','Ano', $x19, 1, 2015, 2020);
			echo form_select('Tipo de Documento','idTipoPago', $x20, 1, 'idTipoPago', 'Nombre', 'taxista_tipo_pago', 0, $dbConn);
			echo form_input('text', 'Numero del Documento', 'NDoc', $x21, 1);
			echo form_select('Estado Pago Bloqueo','estadopago', $x22, 1, 'idEstadoBloqueo', 'Nombre', 'taxista_estado_bloqueo', 0, $dbConn);
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