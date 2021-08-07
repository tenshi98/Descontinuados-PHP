<?php
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
/**********************************************************************************************************************************/
/*                                        Se filtran las entradas para evitar ataques                                             */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                 Realizo la validacion del equipo con el cual se ingresa                                        */
/**********************************************************************************************************************************/
 $root = $_SERVER['PHP_SELF'] ;  
 $root = str_replace("/", "",  $root);
 $nombre_programa = str_replace(".php", "",  $root);	


 if(isset($_COOKIE['sess_demo'])){ 

//VALIDACION
    $sql = "SELECT * FROM Postulante WHERE user_atv = '".$_COOKIE['sess_demo_correo']."'"; 

    $result =mysql_query($sql,$dbCasting);
	$numeroRegistros=mysql_num_rows($result); 
	if ($numeroRegistros==0)  {
	//header( 'Location: index.php' );
	//die;
		//echo "<br>".$sql."<br>NUMERO DE REGISTROS".$numeroRegistros;	
	}

//VALIDACION
	$row_usuario = mysql_fetch_assoc ($result); 
	$nombre_usu=$row_usuario["PostNombres"]." ".$row_usuario["PostApellPapa"]." ".$row_usuario["PostApellMama"];
	$foto= $row_usuario['PostFoto1'];

	
  $fecha = date("d/m/Y");
  $anhio= date("Y");
  $edad=$anhio-substr($row_usuario["PostFecNac"],0,4);
 }
  ?>
<!doctype html>
 <!--[if lt IE 7] <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]--><!--[if IE 7] <html class="no-js lt-ie9 lt-ie8"> <![endif]--><!--[if IE 8] <html class="no-js lt-ie9"> <![endif]--><!--[if gt IE 8]><!-->
<html class="no-js" lang="es"><!--<![endif]-->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>.:: <?=$pagina?> ::.</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/mediaquerie.css" rel="stylesheet" type="text/css">
<link href="css/normalize.css" rel="stylesheet" type="text/css">
<link href="css/style_barra.css" rel="stylesheet" type="text/css">
<link href="css/nph.css" rel="stylesheet" type="text/css">
<?php if(isset($_COOKIE['sess_demo'])){ ?>
<link href="css/smq1ndp.css" rel="stylesheet" type="text/css">
<?}?>
<script type="text/javascript" src="js/modernizr-1.7.min.js"></script>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<script type="text/javascript" src="/scripts/jquery.js"></script>

<!--  PLUGIN PERUID  -->
<script type="text/javascript" src="http://peruid.pe/f/scripts/peruid-1.1.js"></script>
<script type="text/javascript" src="/scripts/peruid.pid-2.0.js"></script>
<script type="text/javascript">
var tag_last = 0;

var site;
(document).ready(function(){
    /*------------PUGLIN PERUID----------*/
    site = new Site({
        ecoid_path:{
        base:'http://peruid.pe/',
        receiver:'http://pruebas.naturalphone.cl/receiver.php',
        portal:'9702824bf1059d44f8a879e070b5b57c',
        proxy:'http://pruebas.naturalphone.cl/proxy_peruid.html'
        }
    });
    /*-------FIN PUGLIN PERUID-----------*/
});

</script>
<link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css">
<script type="text/javascript" src="shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
    // let's skip the automatic setup because we don't have any
    // properly configured link elements on the page
    overlayOpacity: 0.8
});
</script>
</head>