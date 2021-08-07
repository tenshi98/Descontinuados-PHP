<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

require_once('../nombre_pag.php');
require_once('../conexion.php');

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="mapestilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?=$nombreurl?>/scripts/gmaps.js"></script>
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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

<body onload="MM_preloadImages('../images/logo_footer_up2.png')">
<div id="nonFooter">
<?  require_once('menu.incl'); ?>
<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="581" rowspan="4" align="center" valign="middle">
	    <span class="arial_light_med">&nbsp;<br /></span>
        <span class="google_fjalla_gde">&Uacute;ltima Alarma Emitida(<?=$fecha_hoy?>)</span>
	</td></tr>
</table> 

<br>
<?php echo("<script language='JavaScript' type='text/JavaScript'>") ?>
var map;
    $(document).ready(function(){
      map = new GMaps({
        div: '#map',
        lat: -33.427287,
        lng: -70.611219,
        zoom: 8
      });
	 $('#geocoding_form').submit(function(e){
        e.preventDefault();
        GMaps.geocode({
          address: $('#address').val().trim(),
          callback: function(results, status){
            if(status=='OK'){
              var latlng = results[0].geometry.location;
              map.setCenter(latlng.lat(), latlng.lng());
              map.addMarker({
			    icon: '../images/emergency2.png',
                lat: latlng.lat(),
                lng: latlng.lng(),
				title: $('#address').val().trim()
              });
            }
          }
        });
     });     

<?

$sql2="SELECT LEFT( fecha_hora, 10 ) as fecha FROM activaciones order by id_sms desc LIMIT 0, 1"; 
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) 
{ 
		$fecha_hoy=$registro["fecha"];
}
$i=0;
$sql2="SELECT * FROM activaciones where LEFT( fecha_hora, 10 )='".$fecha_hoy."' group by id_usuario";
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) 
{ 
$usuario[$i] = $registro["id_usuario"];
$i=$i+1;
}
 for($i1=0; $i1<$i; $i1++)
   {
//$sql2="SELECT * FROM activaciones where  id_usuario=400 and LEFT( fecha_hora, 10 )='".$fecha_hoy."' order by fecha_hora desc "; 
$sql2="SELECT * FROM activaciones where  id_usuario='".$usuario[$i1]."' and LEFT( fecha_hora, 10 )='".$fecha_hoy."' order by fecha_hora desc  LIMIT 0, 1"; 
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) 
{ 

		$fecha_hora=$registro["fecha_hora"];
		$lat=str_replace(",",".",$registro["lat"]);
		$lon=str_replace(",",".",$registro["lon"]); 
		$sql3="SELECT * FROM ejecutivos where  id_ejecutiv=".$registro["id_usuario"]; 
		$gral3=mysql_query($sql3,$base);
		while($registro2=mysql_fetch_array($gral3)) 
		{ 
	

	?>

	
	map.addMarker({
        lat: <?=$lat?>,
        lng: <?=$lon?>,
        title: '<?=$registro2["nom_ejecutiv"]?> - <?=$fecha_hora?> ',

		icon: '../images/gota_alarma.gif',
		optimized: false,
	// LINK PARA VER EL DETALLE DE LA UBICACION
     infoWindow: {
          content: "<p><b><u><?=$registro2["nom_ejecutiv"]?></u></b></p><p><?=$registro2["cod_fono"]?>-<?=$registro2["fono_ejecutiv"]?></p>"+
		           "<p><a href='http://<?=$nombreurl?>/monitor/detalle.php?lon=<?=$lon?>&lat=<?=$lat?>&nom=<?=$registro2["nom_ejecutiv"]?>&fono=<?=$registro2["cod_fono"]?>-<?=$registro2["fono_ejecutiv"]?>'>Ver Ubicaci&oacute;n</a>.</p><p><a href='http://<?=$nombreurl?>/monitor/historico_usuario.php?usuario=<?=$registro["id_usuario"]?>&nom=<?=$registro2["nom_ejecutiv"]?>&fono=<?=$registro2["cod_fono"]?>-<?=$registro2["fono_ejecutiv"]?>'>Ver Hist&oacute;rico </a>.</p>"
        }
	// LINK PARA VER EL DETALLE DE LA UBICACION
      });
	       

   
<?}
}
   }?>
 });

	<?php echo("</script>") ?>

 <br>
     <table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
      <form method="post" id="geocoding_form">
	  <tr>
	    <div class="input">
        <td width="72" align="right"><span class="arial_cuerpo_gris">Direcci&oacute;n: &nbsp;</span></td>
		<td height="34" width="418">      
            <input type="text" id="address" name="address" size="80" class="arial_light_cuadro"/>     
        </td><td width="240" align="left"><input type="submit" class="bot_sombra" value="Buscar en el Plano" />&nbsp; &nbsp;<input type="reset" class="bot_sombra" value="Limpiar direcci&oacute;n" />
		</td></div>
      </tr></form>
      <tr>
        <td colspan="3"><span class="arial_light_med">&nbsp;</span></td>
      </tr>
     </table>	
<div align="center">
<div id="map" style="width: 900px; height: 600px" ></div>
</div>
<!--Tabla de margen frente al footer -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr><td height="70">&nbsp;</td></tr>
</table>
<!--Fin de la Tabla de margen frente al footer -->

</div> 

<!-- Footer, debe estar dentro del Div-->
<div id="Footer">
<?  require_once('../inc/pie2.incl');  ?> 
</div>

<!-- Fin del Footer-->
</body>
</html>
