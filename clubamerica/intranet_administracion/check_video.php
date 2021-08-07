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
require_once '../AR2D2CFFDJFDJX1/xrxs_configuracion/config3.php';
require_once '../AR2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AR2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AR2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AR2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                      Se filtran las entradas para evitar ataques                                               */
/**********************************************************************************************************************************/
require_once '../AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "check_video.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AR2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/


?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Principal</title>
    
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
	<link rel="stylesheet" type="text/css" href="../shadowbox/shadowbox.css">
<script type="text/javascript" src="../shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
    // let's skip the automatic setup because we don't have any
    // properly configured link elements on the page
    overlayOpacity: 0.8
});
</script>
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
            <i class="fa fa-dashboard"></i> Ceck_video
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

if ( !empty($_GET['id']) )  { 
require("../PHPMailer_v5.1/class.phpmailer.php"); 
$mail = new PHPMailer(); 
$mail->Host = "localhost";
$mail->SMTPAuth = true;
$correo=$_GET["correo"];
$mail->From=$correopagina;
$mail->FromName="CLUB AMERICA";
$mail->Sender=$correopagina;
$mail->AddReplyTo($correopagina, "Responde a este mail");
$mail->Subject = "CLUB AMERICA Valido tu Video: ".$_GET["talento"];
$mail->IsHTML(true);
$mail->AddAddress($correo);
$body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
$body .= "<html xmlns='http://www.w3.org/1999/xhtml'><head>";
$body .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
$body .= "<title>Video Saludo - Club America</title><link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>";
$body .= "<style type='text/css'>";
$body .= ".fuente_google {	font-family: Tahoma, Geneva, sans-serif;	color: #FFFFFF;	font-weight: 400;	font-size: 16px;}";
$body .= ".fuente_google2 {	font-family: Tahoma, Geneva, sans-serif;	font-size: 15px;	color: #FFFFFF;	font-weight: 700;}";
$body .= "a:link {	color: #FFF;	text-decoration: none;}";
$body .= "a:visited {	text-decoration: none;}";
$body .= "a:hover {	text-decoration: none;}";
$body .= "a:active {	text-decoration: none;}";
$body .= "</style>";
$body .= "</head><body>";
$body .= "<table width='399' border='0' align='center' cellpadding='0' cellspacing='0'>  ";


	if ( $_GET['cual']==1 )  { 
		$aprobar="update Postulante set estadovideo1=1 where id_usuario=".$_GET['id'];
		$aprobado = mysql_query ($aprobar, $dbConn);
		$body .= "<tr><td height='50' align='center' bgcolor='#A141BF' class='fuente_google'>CLUB AMERICA Valido tu Video de: ".$_GET["talento"]."</td></tr> ";
	}
	if ( $_GET['cual']==2 )  { 
		$aprobar="update Postulante set estadovideo2=1 where id_usuario=".$_GET['id'];
		$aprobado = mysql_query ($aprobar, $dbConn);
		$body .= "<tr><td height='50' align='center' bgcolor='#A141BF' class='fuente_google'>CLUB AMERICA Valido tu Video de: ".$_GET["talento"]."</td></tr> ";
	}
		if ( $_GET['cual']==3 )  { 
		$aprobar="update Postulante set estadovideo3=1 where id_usuario=".$_GET['id'];
		$aprobado = mysql_query ($aprobar, $dbConn);
		$body .= "<tr><td height='50' align='center' bgcolor='#A141BF' class='fuente_google'>CLUB AMERICA Valido tu Video de: ".$_GET["talento"]."</td></tr> ";
	}

$body .= "</table></body></html>";
			$mail->MsgHTML($body);
			if(!$mail->Send())
			{
				$mail->ClearAddresses();
			}else
			{
  			 $mail->ClearAddresses();
			}

}
if ( !empty($_GET['del']) )  { 
require("../PHPMailer_v5.1/class.phpmailer.php"); 
$mail = new PHPMailer(); 
$mail->Host = "localhost";
$mail->SMTPAuth = true;
$correo=$_GET["correo"];
$mail->From=$correopagina;
$mail->FromName="CLUB AMERICA";
$mail->Sender=$correopagina;
$mail->AddReplyTo($correopagina, "Responde a este mail");
$mail->Subject = "CLUB AMERICA Rechazo tu Video: ".$_GET["talento"];
$mail->IsHTML(true);
$mail->AddAddress($correo);
$body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
$body .= "<html xmlns='http://www.w3.org/1999/xhtml'><head>";
$body .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
$body .= "<title>Video Saludo - Club America</title><link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>";
$body .= "<style type='text/css'>";
$body .= ".fuente_google {	font-family: Tahoma, Geneva, sans-serif;	color: #FFFFFF;	font-weight: 400;	font-size: 16px;}";
$body .= ".fuente_google2 {	font-family: Tahoma, Geneva, sans-serif;	font-size: 15px;	color: #FFFFFF;	font-weight: 700;}";
$body .= "a:link {	color: #FFF;	text-decoration: none;}";
$body .= "a:visited {	text-decoration: none;}";
$body .= "a:hover {	text-decoration: none;}";
$body .= "a:active {	text-decoration: none;}";
$body .= "</style>";
$body .= "</head><body>";
$body .= "<table width='399' border='0' align='center' cellpadding='0' cellspacing='0'>  ";
	if ( $_GET['cual']==1 )  { 
		$aprobar="update Postulante set estadovideo1=9 where id_usuario=".$_GET['del'];
		$aprobado = mysql_query ($aprobar, $dbConn);
		$body .= "<tr><td height='50' align='center' bgcolor='#A141BF' class='fuente_google'>CLUB AMERICA Rechaz&oacute; tu Video de: ".$_GET["talento"]."</td></tr> ";
	}
	if ( $_GET['cual']==2 )  { 
		$aprobar="update Postulante set estadovideo2=9 where id_usuario=".$_GET['del'];
		$aprobado = mysql_query ($aprobar, $dbConn);
		$body .= "<tr><td height='50' align='center' bgcolor='#A141BF' class='fuente_google'>CLUB AMERICA Rechaz&oacute; tu Video de: ".$_GET["talento"]."</td></tr> ";
	}
		if ( $_GET['cual']==3 )  { 
		$aprobar="update Postulante set estadovideo3=9 where id_usuario=".$_GET['del'];
		$aprobado = mysql_query ($aprobar, $dbConn);
		$body .= "<tr><td height='50' align='center' bgcolor='#A141BF' class='fuente_google'>CLUB AMERICA Rechaz&oacute; tu Video de: ".$_GET["talento"]."</td></tr> ";
	}
$body .= "</table></body></html>";
			$mail->MsgHTML($body);
			if(!$mail->Send())
			{
				$mail->ClearAddresses();
			}else
			{
  			 $mail->ClearAddresses();
			}


}




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
//Variable con la ubicacion
	$z="WHERE chats_listado.idChat!='0'";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z.="AND chats_listado.Nombre LIKE '%{$_GET['search']}%' ";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT PostFoto1,PostFoto2,PostFoto3,PostNombres,PostApellPapa,PostEmail,PostProfesion1,PostProfesion2,PostProfesion3 FROM Postulante where (estadovideo1=0 or estadovideo2=0 or estadovideo3=0) and (PostFoto1<>'' or PostFoto2<>'' or PostFoto3<>'')";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrRooms = array();
$query = "SELECT id_usuario,PostFoto1,PostFoto2,PostFoto3,PostNombres,PostApellPapa,PostEmail,PostProfesion1,PostProfesion2,PostProfesion3,estadovideo1,estadovideo2,estadovideo3 FROM Postulante where (estadovideo1=0 or estadovideo2=0 or estadovideo3=0) and (PostFoto1<>'' or PostFoto2<>'' or PostFoto3<>'') ORDER BY PostNombres ASC LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRooms,$row );
}

?>
<?php 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<div class="form-group">

                      
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Videos en Aprobaci&oacute;n</h5>
		</header>
                
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre Usuario creador</th>
        <th>Talento Video</th>
        <th width="130">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrRooms as $habitaciones) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $habitaciones['PostNombres']; ?> <?php echo $habitaciones['PostApellPapa']; ?> (<?php echo $habitaciones['PostEmail']; ?>)</td>
            <td class=" ">
			<table>
			<? 
			if ($habitaciones['estadovideo1']==0) {?>
				<tr class="odd"  height=30>
			<td class=" "><a href="../ver_video.php?correo=<?=$habitaciones['PostFoto1']?>" rel="shadowbox;width=640;height=360"><?echo $habitaciones['PostProfesion1'];?></a></td></tr>
			<?}
			if ($habitaciones['estadovideo2']==0) {?>
				<tr class="odd" height=30>
			<td class=" "><a href="../ver_video.php?correo=<?=$habitaciones['PostFoto2']?>" rel="shadowbox;width=640;height=360"><?echo $habitaciones['PostProfesion2'];?></a></td></tr>
			<?}
			if ($habitaciones['estadovideo3']==0) {?>
				<tr class="odd" height=30>
			<td class=" "><a href="../ver_video.php?correo=<?=$habitaciones['PostFoto3']?>" rel="shadowbox;width=640;height=360"><?echo $habitaciones['PostProfesion3'];?></a></td></tr>

			<?}?>
			</table>
			</td>
			<td class=" ">
			<table>
			<?if ($habitaciones['estadovideo1']==0) {?>
			<tr class="odd" height=30>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="../ver_video.php?correo=<?=$habitaciones['PostFoto1']?>" rel="shadowbox;width=640;height=360" title="Ver Video" class="icon-ver info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&talento='.$habitaciones['PostProfesion1'].'&correo='.$habitaciones['PostEmail'].'&cual=1&id='.$habitaciones['id_usuario']; ?>" title="Aprobar Video" class="icon-editar info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&talento='.$habitaciones['PostProfesion1'].'&correo='.$habitaciones['PostEmail'].'&cual=1&del='.$habitaciones['id_usuario'];?>
				<a  href="<?php echo $ubicacion ?>" title="Eliminar Video" class="icon-borrar info-tooltip"></a><?php } ?>
			</td></tr><?}?>
			<?if ($habitaciones['estadovideo2']==0) {?>
			<tr class="odd" height=30>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="../ver_video.php?correo=<?=$habitaciones['PostFoto2']?>" rel="shadowbox;width=640;height=360" title="Ver Video" class="icon-ver info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&talento='.$habitaciones['PostProfesion2'].'&correo='.$habitaciones['PostEmail'].'&cual=2&id='.$habitaciones['id_usuario']; ?>" title="Aprobar Video" class="icon-editar info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&talento='.$habitaciones['PostProfesion2'].'&correo='.$habitaciones['PostEmail'].'&cual=2&del='.$habitaciones['id_usuario'];?>
				<a href="<?php echo $ubicacion ?>" title="Eliminar Video" class="icon-borrar info-tooltip"></a><?php } ?>
			</td></tr><?}?>
			<?if ($habitaciones['estadovideo3']==0) {?>
			<tr class="odd" height=30>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="../ver_video.php?correo=<?=$habitaciones['PostFoto2']?>" rel="shadowbox;width=640;height=360" title="Ver Video" class="icon-ver info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&talento='.$habitaciones['PostProfesion3'].'&correo='.$habitaciones['PostEmail'].'&cual=3&id='.$habitaciones['id_usuario']; ?>" title="Aprobar Video" class="icon-editar info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&talento='.$habitaciones['PostProfesion3'].'&correo='.$habitaciones['PostEmail'].'&cual=3&del='.$habitaciones['id_usuario'];?>
				<a href="<?php echo $ubicacion ?>" title="Eliminar Video" class="icon-borrar info-tooltip"></a><?php } ?>
			</td></tr><?}?>
			</table>
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
        <div class="col-lg-9 fcenter">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination">
                	<?php if(($num_pag - 1) > 0) { ?>
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">? Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">? Anterior</a></li>
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
                    <li class="next"><a href="<?php echo $location.($num_pag+1).$x ?>">Siguiente ? </a></li>
                    <?php } else {?>
                    <li class="next disabled"><a href="">Siguiente ? </a></li>
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