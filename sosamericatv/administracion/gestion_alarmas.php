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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario.php';
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
$original = "gestion_alarmas.php";
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

//se borra un dato
if ( !empty($_GET['id']) )     {
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	$location .='&delete=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_robo.php';
}

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Alarmas</title>
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


 <script src="../scripts/AC_RunActiveContent.js" type="text/javascript"></script>    
    <!-- InstanceEndEditable -->

<script type="text/javascript">
	function actualiza(){
    	$("#chatbox").load("alarma_refresh.php");
	}
	function Repetir() {
	setInterval( "actualiza()", 5000 ); //multiplicas la cantidad de segundos por mil
	}
</script>

  </head>
<body onLoad="Repetir()">
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
            <i class="fa fa-dashboard"></i> Alarmas
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

<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  
	Alarma silenciada correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }
if ($_POST["descativar"]=="si") {
	$res22=mysql_query("update activaciones set estado='0' where id_sms=". $_POST["apagar"],$dbConn); 
}
   ?>




   <div class="col-lg-12">
	<div class="box">
<?
	
$sql_0="SELECT * FROM activaciones where estado='1'";
$res=mysql_query($sql_0,$dbConn); 
$numeroRegistros=mysql_num_rows($res); 
if($numeroRegistros<=0) 
{ ?>
   	<div align='center'> 
   	<span class="arial_light_med">No se encontraron resultados</span>
   	</div> 
	
<? }else{ ?>



<div align="center"><!-- EMBED SRC="warning1.wav" AUTOSTART=TRUE WIDTH=144 HEIGHT=60></EMBED -->
<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0','width','62','height','28','src','player','quality','high','wmode','transparent','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','player' ); //end AC code
</script>
<noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="28">
  <param name="movie" value="player.swf" />
  <param name="quality" value="high" />
  <param name="wmode" value="transparent">
     <embed src="player.swf"
      quality="high"
      type="application/x-shockwave-flash"
      WMODE="transparent"
      width="62"
      height="28"
      pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
</noscript>
</div>
<?}?>
<div class="refresh" id="chatbox" >
<?

echo "<div align='left'>"; 
echo "<span class='arial_light_med'>&nbsp; &nbsp; Encontrados ".$numeroRegistros." resultados a las ".date('H:i:s')."<br>"; 
echo "</span></div>"; 
?>

<table width="98%" align="center" id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable"> 
<thead>
 <tr class="tbl_title">
        <th width="7%"  align="left" height="47" >Tipo<br>Activacion</th>
        <th    height="47">Mensaje del llamado</th>
        <th width="15%" align="left" height="47">Fecha y Hora</th>
        <th width="14%" align="left" height="47">Tel&eacute;fono</th>     
        <th width="14%" align="left" height="47">Destino</th>   		
        <th   height="47">Activador</th>    
		<th width="10%" align="left" height="47">Localizaci&oacute;n</th>    
		<th width="7%"  align="left" >Apagar</th>                           
</tr>
</thead>

<?
$sql2="SELECT * FROM activaciones where estado='1' and tipo_llamada='EMERGENCIA' ORDER BY id_sms ASC "; 
$gral=mysql_query($sql2,$dbConn);
while($registro=mysql_fetch_array($gral)) 
{ 
		$id=$registro["id_sms"];
		$remitente = $registro["remitente"];
		$tipo_llamada = $registro["tipo_llamada"];
		$mensaje=$registro["mensaje"];    
		$fecha_hora=$registro["fecha_hora"]; 
		$origen=$registro["origen"]; 
		$destino=$registro["destino"];
		$municipal=$registro["municipal"];
		$lat=str_replace(",",".",$registro["lat"]);
		$lon=str_replace(",",".",$registro["lon"]); 
$sql ="Select * from ejecutivos where id_ejecutiv=" . $registro["id_usuario"];
$res=mysql_query($sql,$dbConn); 
		while($fila=mysql_fetch_array($res))
		{
		  $nombre=$fila['nom_ejecutiv'];
		}

if ($municipal==0) {

	$estilo="arial_light_med_red";
}else{
	$estilo="arial_light_med";
}

?>
  <!-- tabla de resultados rel=shadowbox;width=700;height=500  --> 
 	<tbody role="alert" aria-live="polite" aria-relevant="all">
 <tr class="odd">
                <td width="7%"  align="left" class=" " height=15>
                <span class=" "><strong><?=$tipo_llamada?></strong></span></td>
                <td  class=" "><?=$mensaje?></td>
                <td width="15%"  align="left" class=" "><?=$fecha_hora?></td>
                <td width="14%"  align="left" class=" "><?=$origen?></td>  
				<td width="14%"  align="left" class=" "><?=$destino?></td>     
                <td   class=" "><?=$nombre?></td>
				<td width="10%"  align="left" class=" ">
				<a href="detalle_alarmas.php?lon=<?=$lon?>&lat=<?=$lat?>" target=_self  title="Ver Ubicacion" class="icon-ver info-tooltip">
				</a></td>   
				 
				<td width="7%"  align="left" class="arial_10_33">
<FORM language=javascript name="F<?=$id?>" id="<?=$id?>" action="gestion_alarmas.php" method="post" target="_self">
<input  type="hidden" name="descativar" value="si" size="28" >
<input type="hidden" name="apagar" value="<?=$id?>">
<a href="#" onclick="document.F<?=$id?>.submit(); return false"  title="Borrar Alarma" class="icon-borrar info-tooltip"></a>

</form>
</td>
         
</tr>
</tbody>
    
   <!-- fin tabla resultados --> 
<?	
}//fin while
?>

</table>    
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