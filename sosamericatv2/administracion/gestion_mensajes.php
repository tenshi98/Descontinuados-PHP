<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_4.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "gestion_mensajes.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['filtrar']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/gestion_mensajes.php';		
}
//formulario para envio de mensaje
if ( !empty($_POST['mms']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/gestion_envio_mensajes.php';		
}
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Enviar mensajes</title>
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
            <i class="fa fa-dashboard"></i> Enviar Mensajes
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
<?php  if (isset($errors[6])) {echo $errors[6];}?>
<?php  if (isset($errors[7])) {echo $errors[7];}
	$sql = "select id from mensajes order by id desc limit 1";
	$result = mysql_query($sql,$dbConn);
	$data=mysql_fetch_array($result);
	$ultimo_id=$data["id"]+1;

?> 
		<div id="div-1" class="body">
<form method="POST" action="envia_mensajes.php">
                        <input type="hidden" name=tag value="sendmessage">
						
						<table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                          <tr>
                            <td width="50%" height="40" align="left" valign="middle"><label for="text2" class="control-label col-lg-4">Mensaje</label>                            
                            <div class="col-lg-8">Redacta aquí tu mensaje.</div></td>
                            <td width="50%">
							
							<input name="message" type="text" class="form-control"  id="message" />
							
							</td>
                          </tr>
                        </table>

                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td width="50%" height="40" align="left" valign="middle"><label for="text2" class="control-label col-lg-4">Grupo
                                </label><div class="col-lg-8">Nombre del grupo al que enviarás el mensaje</div></td>
                              <td width="50%">
							  
							  <input name="username" type="text" class="form-control"  id="username" />
							  
							  </td>
                            </tr>
                          </table>

                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td height="40" align="left"><label for="text2" class="control-label col-lg-4">Id del Mensaje</label><div class="col-lg-8">Número de registro del mensaje enviado</div></td>
                              <td width="50%">
							  <input name="collapsekey" type="text" class="form-control"  id="collapsekey" value=<?=$ultimo_id?> readonly/>
							  
							  </td>
                            </tr>
                          </table>

						  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td height="40" align="left"><label for="text2" class="control-label col-lg-4">Link de Conexi&oacute;n</label><div class="col-lg-8">Enlace a una Web que conecta el mensaje</div></td>
                              <td width="50%">

							  <input name="link" type="text" class="form-control"  id="link" />
							  
							  </td>
                            </tr>
                          </table>

						  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td height="40" align="left"><label for="text2" class="control-label col-lg-4">Categoria</label><div class="col-lg-8">Categoria del  el mensaje</div></td>
                              <td width="50%">
     <select name="categoria" required="required" class="form-control" >
		<option value='0'>Elija una Categoria</option>
		<?php //consulta
		$SQL_categoria=" SELECT id_categoria,descripcion FROM preferencias_categorias ORDER BY descripcion ASC";
		$categoria=mysql_query($SQL_categoria,$dbConn_2); 
		while($fila_categoria=mysql_fetch_array($categoria)) {?>
		<option value="<?php echo $fila_categoria["id_categoria"]; ?>" ><?php echo $fila_categoria["descripcion"]; ?></option>
		<?php } ?>
	</select>
							  
							  </td>
                            </tr>
                          </table>

						  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td height="40" align="left"><label for="text2" class="control-label col-lg-4">SubCategoria</label><div class="col-lg-8">SubCategoria del  el mensaje</div></td>
                              <td width="50%">
     <select name="subcategoria" required="required" class="form-control" >
		<option value='0'>Elija una SubCategoria</option>
		<?php //consulta
		$SQL_categoria=" SELECT id_subcategoria,descripcion FROM preferencias_subcategoria ORDER BY descripcion ASC";
		$categoria=mysql_query($SQL_categoria,$dbConn_2); 
		while($fila_categoria=mysql_fetch_array($categoria)) {?>
		<option value="<?php echo $fila_categoria["id_subcategoria"]; ?>" ><?php echo $fila_categoria["descripcion"]; ?></option>
		<?php } ?>
	</select>
							  
							  </td>
                            </tr>
                          </table>

                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td height="40" align="left"><input name="button5" type="submit" class="btn btn-primary fright margin_width" id="button5" value="Enviar Mensaje" /></td>
                              </tr>
                          </table>


					</form>


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