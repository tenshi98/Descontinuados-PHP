<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_funciones/funciones.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Datos del Cliente</title>
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
    <!-- Estilo definido por mi -->
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
	<link href="assets/css/theme_color_<?php echo $arrUsuario['idTheme'] ?>.css" rel="stylesheet" type="text/css">
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
	<link rel="icon" type="image/png" href="src_img/mifavicon.png" />
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
              	<?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?>
					<img src="img_upload/<?php echo $arrUsuario['imgLogo']; ?>" alt="">
				<?php }else{?>
					<img src="src_img/logo_default.png" alt="">
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
            <i class="fa fa-dashboard"></i> Datos del Proveedor
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
// Se traen todos los datos de mi usuario
$query = "SELECT 
postulante.PostNombres, 
postulante.PostApellPapa, 
postulante.PostApellMama, 
postulante.PostFecNac,
postulante.PostFonoFijo,
postulante.PostFonoCel,
postulante.PostDireccion,
postulante.url_img,
postulante.vid_prof1,
postulante.vid_prof2,
postulante.vid_prof3,
postulante.alias, 
postulante.PostEmail,
postulante_roles.Nombre AS rol_pos,
ubicacion_pais.Nombre AS pais,
ubicacion_departamento.Nombre AS departamento,
ubicacion_provincia.Nombre AS provincia,
ubicacion_distrito.Nombre AS distrito,
profesion1.ProfDesc AS talento1,
profesion2.ProfDesc AS talento2,
profesion3.ProfDesc AS talento3,
produccion1.ProdDesc AS produccion1,
produccion2.ProdDesc AS produccion2,
produccion3.ProdDesc AS produccion3

FROM `postulante`
LEFT JOIN `postulante_roles`             ON postulante_roles.idRol                   = postulante.rol
LEFT JOIN `ubicacion_pais`               ON ubicacion_pais.idPais                    = postulante.idPais
LEFT JOIN `ubicacion_departamento`       ON ubicacion_departamento.idDepartamento    = postulante.idDepartamento
LEFT JOIN `ubicacion_provincia`          ON ubicacion_provincia.idProvincia          = postulante.idProvincia
LEFT JOIN `ubicacion_distrito`           ON ubicacion_distrito.idDistrito            = postulante.idDistrito
LEFT JOIN `profesion` profesion1         ON profesion1.ProfCod                       = postulante.PostProfesion1
LEFT JOIN `profesion` profesion2         ON profesion2.ProfCod                       = postulante.PostProfesion2
LEFT JOIN `profesion` profesion3         ON profesion3.ProfCod                       = postulante.PostProfesion3
LEFT JOIN `producciones` produccion1     ON produccion1.idProd                       = postulante.PostProduccion1
LEFT JOIN `producciones` produccion2     ON produccion2.idProd                       = postulante.PostProduccion2
LEFT JOIN `producciones` produccion3     ON produccion3.idProd                       = postulante.PostProduccion3

WHERE postulante.id_usuario = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);

?>

<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Datos del Postulante</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
		<tr role="row">
			<th width="50%">Datos</th>
			<th width="50%">Mapa</th>
		</tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="odd">
			<td>


				<p>
                <?php $direccion = $rowdata["PostDireccion"].', '.$rowdata["distrito"].', '.$rowdata["provincia"].', '.$rowdata["departamento"].', '.$rowdata["pais"];?>
                
				<strong>Nombre : </strong><?php echo $rowdata["PostNombres"].' '.$rowdata["PostApellPapa"].' '.$rowdata["PostApellMama"] ?><br/>
                <strong>Fecha de nacimiento : </strong><?php echo Fecha_completa($rowdata["PostFecNac"]) ?><br/>
				<strong>Direccion : </strong><?php echo $direccion ?><br/>
                <strong>Pais de procedencia : </strong><?php echo $rowdata["pais"] ?><br/>
                <strong>Telefono Fijo : </strong><?php echo $rowdata["PostFonoFijo"] ?><br/>
                <strong>Telefono Movil : </strong><?php echo $rowdata["PostFonoCel"] ?><br/>
				<strong>Email : </strong><?php echo $rowdata["PostEmail"] ?><br/>
                <strong>Rol del Postulante : </strong><?php echo $rowdata["rol_pos"] ?><br/>
                <strong>Alias : </strong><?php echo $rowdata["alias"] ?><br/>
                <?php 
				$talento = '';
				if(isset($rowdata["talento1"])&&$rowdata["talento1"]!=''){ $talento .= ' '.$rowdata["talento1"];}
				if(isset($rowdata["talento2"])&&$rowdata["talento2"]!=''){ $talento .= ', '.$rowdata["talento2"];}
				if(isset($rowdata["talento3"])&&$rowdata["talento3"]!=''){ $talento .= ', '.$rowdata["talento3"];}
				?>
                <strong>Talentos : </strong><?php echo $talento ?><br/>
                <?php 
				$produccion = '';
				if(isset($rowdata["produccion1"])&&$rowdata["produccion1"]!=''){ $produccion .= ' '.$rowdata["produccion1"];}
				if(isset($rowdata["produccion2"])&&$rowdata["produccion2"]!=''){ $produccion .= ', '.$rowdata["produccion2"];}
				if(isset($rowdata["produccion3"])&&$rowdata["produccion3"]!=''){ $produccion .= ', '.$rowdata["produccion3"];}
				?>
                <strong>Producciones de interes : </strong><?php echo $produccion ?><br/>
                <?php if(isset($rowdata["vid_prof1"])&&$rowdata["vid_prof1"]!=''){?>
                <strong>Video talento 1 : </strong><a href="<?php echo $arrUsuario['web_talento'].'?view='.$_GET['view'].'&columna=vid_aprob1'; ?>">Ver Video</a><br/>
                <?php }?>
                <?php if(isset($rowdata["vid_prof2"])&&$rowdata["vid_prof2"]!=''){?>
                <strong>Video talento 2 : </strong><a href="<?php echo $arrUsuario['web_talento'].'?view='.$_GET['view'].'&columna=vid_aprob2'; ?>">Ver Video</a><br/>
                <?php }?>
                <?php if(isset($rowdata["vid_prof3"])&&$rowdata["vid_prof3"]!=''){?>
                <strong>Video talento 3 : </strong><a href="<?php echo $arrUsuario['web_talento'].'?view='.$_GET['view'].'&columna=vid_aprob3'; ?>">Ver Video</a><br/>
                <?php }?>
				</p>
            </td>
			<td>
            <?php 
			
			echo mapa2($direccion) ?>
            </td>
		</tr>                  
	</tbody>
</table>
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
    <script src="assets/js/main.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>