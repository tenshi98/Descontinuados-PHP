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
            <i class="fa fa-dashboard"></i> Mensajes Historicos
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





			<table width="100%" border="0" cellpadding="0" cellspacing="0"   align="center">
                  <tr>
                    <td align="center">
						<label for="text2" class="control-label ">Notificaciones<br />Visualizaci&oacute;n de Visitas por Mensaje Emitido</label><br><br>
					</td>
                  </tr>
                  <tr>
                    <td align="center">
						<label for="text2" class="control-label ">Men&uacute; de Opciones<br />&nbsp;</label><br><br>
					</td>
                  </tr>
			</table>




			<table width="100%" border="0" cellpadding="0" cellspacing="0"   align="center">
                      <tr>
                        <td>
						
				  
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
						    <form method="post" id="menu_form" action="mensajes_fecha.php">
							<input type="hidden" name="dedonde" value="menuppal">
                            <tr>
                              <td width="40%" height="60" align="left">
							    <div class="text-muted"><strong>Hist&oacute;ricos mensaje por Fecha</strong></br>
                                Vizualiza Los Mensajes de una fecha determinada</div></td>
                              <td width="50%">
									<select name="fecha" class="form-control"  id="fecha">
									<option value="0" SELECTED>Selecciona la Fecha</option>
						<?
						$SQL_lee4=" SELECT SUBSTR( fecha_hora, 7, 4 ) AS ano, SUBSTR( fecha_hora, 4, 2 ) AS mes, SUBSTR( fecha_hora, 1, 2 ) AS dia FROM mensajes GROUP BY SUBSTR( fecha_hora, 7, 4 ) , SUBSTR( fecha_hora, 4, 2 ) , SUBSTR( fecha_hora, 1, 2 ) ORDER BY SUBSTR( fecha_hora, 7, 4 ) DESC , SUBSTR( fecha_hora, 4, 2 ) DESC , SUBSTR( fecha_hora, 1, 2 ) DESC ";
						
						$res=mysql_query($SQL_lee4,$dbConn); 
						
						while($fila=mysql_fetch_array($res)) {
								$fecha = $fila["dia"]."/".$fila["mes"]."/".$fila["ano"];
								echo $fecha;
								?>
								
							<option value="<?=$fecha?>"><?=$fecha?></option>
							
						
						<? }?>
						</select>
									

                              </td>
                              <td width="10%"><input name="button5" type="submit" class="btn btn-primary fright margin_width" id="button5" value="Ver" /></td>
                            </tr></form>
                          </table>




                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <form method="post" id="menu_form" action="detalle_mensajes.php">
							<input type="hidden" name="dedonde" value="menuppal">
						    <tr>
                              <td width="40%" height="60" align="left">
							    <div class="text-muted"><strong>Hist&oacute;ricos por Mensaje</strong></br>
                                Vizualiza Las Visitas por Mensajes</div></td>
                              <td width="50%">
                                <select name="id_mensaje" class="form-control"  id="id_mensaje">
								<option value="0" SELECTED>Selecciona el Mensaje</option>

				<?
				$SQL_lee4="select id ,mensaje  from mensajes where id_alerta=0  order by id desc";
				$res=mysql_query($SQL_lee4,$dbConn); 
				
				while($fila=mysql_fetch_array($res)) {
						$mensaje = $fila["mensaje"];
						$id = $fila["id"];
				

						?>
						
					<option value="<?=$id?>"><?=$mensaje?></option>

				<?}?>
								</select>

                              </td>
                              <td width="10%"><input name="button15" type="submit" class="btn btn-primary fright margin_width" id="button15" value="Ver" /></td>
                            </tr>
							</form>
                          </table>
						  
	
					
					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <form method="post" id="menu_categoria" action="detalle_categoria.php">
							<input type="hidden" name="dedonde" value="menuppal">
						    <tr>
                              <td width="40%" height="60" align="left">
							    <div class="text-muted"><strong>Hist&oacute;ricos por Categorias</strong></br>
                                Vizualiza Las Visitas por Categorias</div></td>
                              <td width="50%">


     <select name="categoria" required="required" class="form-control" >
		<option value='0'>Todas las Categorias</option>
		<?php //consulta
		$SQL_categoria=" SELECT id_categoria,descripcion FROM preferencias_categorias ORDER BY descripcion ASC";

		$categoria=mysql_query($SQL_categoria,$dbConn_2); 
		while($fila_categoria=mysql_fetch_array($categoria)) {?>
		<option value="<?php echo $fila_categoria["id_categoria"]; ?>" ><?php echo $fila_categoria["descripcion"]; ?></option>
		<? } ?>
	</select>
								
<br>
     <select name="subcategoria" required="required" class="form-control" >
		<option value='0'>Todas las SubCategorias</option>
		<?php //consulta
		$SQL_categoria=" SELECT id_subcategoria,descripcion FROM preferencias_subcategoria ORDER BY descripcion ASC";
		$categoria=mysql_query($SQL_categoria,$dbConn_2); 
		while($fila_categoria=mysql_fetch_array($categoria)) {?>
		<option value="<?php echo $fila_categoria["id_subcategoria"]; ?>" ><?php echo $fila_categoria["descripcion"]; ?></option>
		<?php } ?>
	</select>
					
                              </td>
                              <td width="10%"><input name="button25" type="submit" class="btn btn-primary fright margin_width" id="button25" value="Ver" /></td>
                            </tr>
							</form>
                          </table>
						  

   <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <form method="post" id="menu_rut" action="detalle_rut.php">
							<input type="hidden" name="dedonde" value="menuppal">
						    <tr>
                              <td width="40%" height="60" align="left">
							    <div class="text-muted"><strong>Hist&oacute;ricos por Rut</strong></br>
                                Vizualiza Las Visitas por Rut</div></td>
                              <td width="50%">
                                
					<input name="rutpersona" type="text"  id="rutpersona" size="50" maxlength="20"  placeholder="Ej: 12345678-9" class="form-control" />
                              </td>
                              <td width="10%"><input name="button35" type="submit" class="btn btn-primary fright margin_width" id="button35" value="Ver" /></td>
                            </tr>
							</form>
                          </table>

						  </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
					
					</td>
  </tr>
</table>
					</td>
  </tr>
</table>


























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