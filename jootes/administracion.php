<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
require_once('nombre_pag.php');
require_once('conexion.php');

if ($_SESSION['usuario']<>"") {
	
	$sql ="Select * from ejecutivos where id_ejecutiv='" . $_SESSION['usuario'] . "'";
	$qx = "id_ejecutiv=". $_SESSION['usuario'];

}else{

	$sql ="SELECT * FROM ejecutivos WHERE login='" . $_POST["login"] . "' AND pass='" . $_POST["password"] . "'";
	$qx = "login=".$_POST["login"]."&pass=".$_POST["password"];

}
//echo $sql;
$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {?>
		<script language="javascript">
			alert("Los datos ingresados son erroneos o su sesion expiro");
			window.location = "http://<?=$nombreurl?>";
		</SCRIPT>
<? } ?>
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
    <td align="center" valign="middle" ><table width="970" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_bca esquina_red">
      <tr>
        <td align="center" valign="middle">
        
        <!-- Contenido -->
        
 <table width="990" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_top">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="35%" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
              <td height="350" align="right" valign="middle"><img src="images/qr.jpg"  /></td>
            </tr>
        </table></td>
        <td width="65%" align="right" valign="top"><table width="693" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top"><table id="table28" border="0" cellpadding="0" cellspacing="0" width="600">
              <tbody>
                <tr>
                  <td height="200" colspan="3" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="arial_tit_gris" id="table29">
                    <tbody>
                      <tr>
                        <td height="100" align="left" valign="middle">Configura datos para que se efect&uacute;e el contacto con el perfil que deseas.</td>
                        </tr>
                      </tbody>
                  </table>                  
<iframe src="http://www.jootes.cl/administracion_perfil.php?<?php echo $qx; ?>" height="900px" width="700px" frameborder="0"  scrolling="no" >
  <p>Tu navegador no soporta iframes.</p>
</iframe>		
							
							
							</td>
                          </tr>
                        </tbody>
                    </table></td>
                </tr>
                </tbody>
            </table></td>
          </tr>
        </table></td>
      </tr>
  </table></td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle">&nbsp;</td>
  </tr>

</table>




        
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
