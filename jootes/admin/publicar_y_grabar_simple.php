<?php
session_start();
if ($_GET["cierro"]=="si") {
session_destroy();
?>
<SCRIPT LANGUAGE=javascript>
    window.location.reload(); 
</SCRIPT>
<?}

require_once('../nombre_pag.php');
require_once('../conexion.php');


$result = mysql_query("select * from parametros",$base);

while($row=mysql_fetch_array($result))
{
		  $ipe_in=$row['IP_interna'];
		  $ipe_out=$row['IP_externa'];
		  $directorio=$row['directorio'];
		  $datos=$row['multipunto'];
  		  $IP_interna1=$row['IP_interna'];
  		  $IP_externa1=$row['IP_externa'];
  		  $dondeloveo=$row['donde'];

		  //list($ip1_in, $ip2_in, $ip3_in, $ip4_in) =split( '[.]', $row['IP_interna']);
		  //list($ip1_out, $ip2_out, $ip3_out, $ip4_out) =split( '[.]', $row['IP_externa']);
		  list($ip1_in, $ip2_in, $ip3_in, $ip4_in) =split( '[.]', $row['tv_int']);
		  list($ip1_out, $ip2_out, $ip3_out, $ip4_out) =split( '[.]', $row['tv_out']);
		  
}	

$mi_ip = $_SERVER['REMOTE_ADDR']; 
list($ip1, $ip2, $ip3, $ip4) =split( '[.]', $mi_ip);
$inicio=$ip1_in.".".$ip2_in.".".$ip3_in.".";


if ($mi_ip == "200.119.246.138" or $mi_ip == "192.168.1.25" )
			{
				 $IPE=$ip1_in.".".$ip2_in.".".$ip3_in.".".$ip4_in;
			}
			  else
			{
	 			$IPE=$ip1_out.".".$ip2_out.".".$ip3_out.".".$ip4_out;
}


$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "i" , $tiempo ); 
$seg= date ( "i" , $tiempo ); 
$hora=$hora.$min.$seg;

$Fecha=getdate(); 
$numeroRegistros=0;
$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes<9) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia<9) {
	$diadis="0".$Dia;
}else{
$diadis=$Dia;
}
$fecha=$Anio.$mesdis.$diadis;

$prefijo = substr(md5(uniqid(rand())),0,4);
$nom_vid="152_"."Mail_".$fecha."_".$prefijo;


?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href="../estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
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
//-->
</script>
<link rel="stylesheet" type="text/css" href="../shadowbox/shadowbox.css">
<script type="text/javascript" src="../shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
    // let's skip the automatic setup because we don't have any
    // properly configured link elements on the page
    overlayOpacity: 0.8
});
</script>
<SCRIPT type=text/javascript>
<!--  
function openShadowbox(content, player, title) {  
Shadowbox.open({  
content: '<?=$dondeloveo?>'+content+".flv",  
player: player,  
title: title  
});  
}  
// -->
</SCRIPT> 
<SCRIPT type=text/javascript>
<!--  
function openShadowbox2(content, player, title) {  
Shadowbox.open({  
content: content,  
player: 'iframe',  
title: title  
});  
}  
// -->
</SCRIPT>

</head>
<body >
<center>
<table border="1" width="38%" id="table2" height="675">
	<tr>
		<td align="center">

 <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="600" height="600" >
<param name="allowScriptAccess" value="sameDomain" />

<param name='movie' value='publicar_y_grabar_simple.swf?mi_var=<?=$datos?>&IP_in=<?=$IPE?>&nombre_video=<?=$nom_vid?>'/>
<param name="quality" value="high" />
 <param name=wmode value=transparent>
<embed src='publicar_y_grabar_simple.swf?mi_var=<?=$datos?>&IP_in=<?=$IPE?>&nombre_video=<?=$nom_vid?>' quality='high' bgcolor='#000000' width='600' height='600' name='participante' align='left' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /> 


</embed>
			</object>

	<table border="0" width="38%" id="table3" height="48">
		<tr>
			<td align="center"><a onclick="window.close()" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('bot_cerrar_ventana','','../images/cerrar_ventana_up.png',1);">
			<img name="bot_cerrar_ventana" src="../images/cerrar_ventana.png" border="0" id="bot_cerrar_ventana" alt=""  /></a></td>
		</tr>
	</table>

			

		</td>
	</tr>
	</table>
</center>
</body>
</html>
