<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if ($_GET["cierro"]=="si") {
session_destroy();
}
require_once('nombre_pag.php');
require_once('conexion.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
    <script src="js/login.js"></script>
    
    <link rel="stylesheet" type="text/css" href="js/jquery.slider.css" />
  <!--[if IE 6]>
  <link rel="stylesheet" type="text/css" href="javascript/slider/themes/default/jquery.slider.ie6.css" />
  <![endif]-->

<script type="text/javascript" src="http://<?=$nombreurl?>/js/jquery.min.js"></script>
<script type="text/javascript" src="http://<?=$nombreurl?>/js/jquery.slider.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".slider").slideshow({
        width      : 920,
        height     : 260,
        pauseOnHover : true,
        transition : ['slideLeft', 'slideRight', 'slideTop', 'slideBottom']
      });
      
      $(".caption").fadeIn(500);

      // playing with events:
      
      $(".slider").bind("sliderChange", function(event, curSlide) {
        $(curSlide).children(".caption").hide();
      });
      
      $(".slider").bind("sliderTransitionFinishes", function(event, curSlide) {
        $(curSlide).children(".caption").fadeIn(500);
      });
    });
  </script>
    <script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body onload="MM_preloadImages('http://<?=$nombreurl?>/images/face_bot_up.png','images/twit_bot_up.png')">
	<?   
    // BOTON FLOTANTE --->
       // require_once('inc/boton_flotante.incl');         
     // BOTON FLOTANTE --->

?>
<div id="nonFooter" width="100%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#000000">
	
	<?   
     // Cabecera --->
        require_once('inc/cabecera_int.incl');         
     // Cabecera --->
?>

    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="patt_slider"><table width="970" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_bca esquina_red">
      <tr>
        <td align="center" valign="middle">
        
        <!-- Contenido -->
        
 
 
<?php /////////////////////////////////////////
// Actualizacion de datos personales
// definimos las variables
	if ( !empty($_POST['nom_ejecutiv']) ) 	   $nom_ejecutiv 	 = $_POST['nom_ejecutiv'];
	if ( !empty($_POST['soy']) ) 	           $soy 	         = $_POST['soy'];
	if ( !empty($_POST['edad']) ) 	           $edad 	         = $_POST['edad'];
	if ( !empty($_POST['busco_a']) ) 	       $busco_a 	     = $_POST['busco_a'];
	if ( !empty($_POST['busco_b']) ) 	       $busco_b          = $_POST['busco_b'];
	if ( !empty($_POST['b_edad_a']) ) 	       $b_edad_a         = $_POST['b_edad_a'];
	if ( !empty($_POST['b_edad_b']) ) 	       $b_edad_b         = $_POST['b_edad_a'];
	if ( !empty($_POST['radio']) ) 	           $radio            = $_POST['radio'];
	if ( !empty($_POST['direccion_img']) ) 	   $direccion_img    = $_POST['direccion_img'];
	if ( !empty($_POST['publicidad']) ) 	   $publicidad 	     = $_POST['publicidad'];
	if ( !empty($_POST['login']) ) 	           $login 	         = $_POST['login'];
	
	// completamos la variable error si es necesario
	if ( empty($nom_ejecutiv) )    	$error['nom_ejecutiv'] 	  = '<p>No ha ingresado un nick</p>';
	
	// si no hay errores registramos los datos
	if ( empty($error) ) {
		
		// inserto los datos de registro en la db
		$busqueda= $busco_a + $busco_b;
		$query  = "UPDATE ejecutivos SET 
		nom_ejecutiv    = '$nom_ejecutiv',
		soy             = '$soy',
		edad            = '$edad',
		busco           = '$busqueda',
		b_edad_a        = '$edad_desde',
		b_edad_b        = '$edad_hasta',
		radio           = '$radio',
		direccion_img   = '$direccion_img',
		publicidad      = '$publicidad'
		WHERE login     = '$login'";
		
		//$result = mysql_query($query, $base);
		
	}
	echo $query;
		
/*		
$sql="update ejecutivos set  
nom_ejecutiv    ='".$_POST["nombre"]."',
pass            ='".$_POST["password"]."',
direccion_img   ='".$_POST["direccion_img"]."'	


where id_ejecutiv=" . $_SESSION['usuario'];

$actualiza=mysql_query($sql,$base); 

$sql000="update filtros 
set soy      ='".$_POST["soy"]."',
micondicion  ='".$_POST["micondicion"]."',
busco        ='".$_POST["busco"]."',
tucondicion  ='".$_POST["tucondicion"]."',
radio        ='".$_POST["radio"]."'

 where id_usuario=".$_SESSION['usuario'];
$res000=mysql_query($sql000,$base);

*/
		
?>
    
<p><span class="cuerpo_gris">Los datos fueron actualizados.</span></p>
<input name="button3" type="submit" class="google_bot_txt_bco esquina_red_3px padding_10" id="button3"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/administracion_perfil.php';"  value="Volver a la Administraci&oacute;n" />

    



        
        <!--Contenido -->
        
        
        </td>
      </tr>
  </table>
  </td>
  </tr>
</table>

<!--Tabla de margen frente al footer -->

<table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="80"></td>
  </tr>
</table>

<!--Fin de la Tabla de margen frente al footer -->

</div> 
<!-- Footer, debe estar dentro del Div-->

<?  require_once('./inc/footer.incl');  ?> 

</body>
</html>
