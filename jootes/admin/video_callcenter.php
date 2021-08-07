<?php

require_once('../nombre_pag.php');
require_once('../conexion.php');


$result = mysql_query("select * from parametros",$base);
	while($row=mysql_fetch_array($result))
	{
		  $ipe_in=$row['tv_int'];
		  $ipe_out=$row['tv_out'];
		  $envivo=$row['envivo'];
		  $directorio=$row['directorio'];
		  $datos=$row['multipunto'];
		  $datos_vm=$row['videomail'];
		  $programas=$row['programas'];
$empresa=$row['empresa'];
		  $posicion_vc=$row['posicion_vc'];
		  list($ip1_in, $ip2_in, $ip3_in, $ip4_in) =split( '[.]', $ipe_in);
		  list($ip1_out, $ip2_out, $ip3_out, $ip4_out) =split( '[.]', $ipe_out);
		  
	}	
	$mi_ip = $_SERVER['REMOTE_ADDR']; 
	list($ip1, $ip2, $ip3, $ip4) =split( '[.]', $mi_ip);
	$inicio=$ip1_in.".".$ip2_in.".".$ip3_in.".";
	if ($mi_ip == "200.119.246.138")
			{
				 $IPE=$ip1_in.".".$ip2_in.".".$ip3_in.".".$ip4_in;
			} else {
	 			$IPE=$ip1_out.".".$ip2_out.".".$ip3_out.".".$ip4_out;
			}





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>..:: <?=$pagina?> ::..</title>
<link rel="icon" href="./favicon.ico" type="image/x-icon">
<link href="../estilo.css" rel="stylesheet" type="text/css" />
<link href="../estilo_bot.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
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
//-->
</script>
<script src="http://<?=$nombreurl?>/AC_RunActiveContent.js" type="text/javascript"></script>
<script type='text/javascript' src='http://<?=$nombreurl?>/jw/jwplayer.js'></script>
<link rel="stylesheet" type="text/css" href="http://<?=$nombreurl?>/shadowbox/shadowbox.css">
<script type="text/javascript" src="http://<?=$nombreurl?>/shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
    // let's skip the automatic setup because we don't have any
    // properly configured link elements on the page
    overlayOpacity: 0.8
});
</script>
</head>

<body>


<table align="center" width="990" border="0" cellspacing="0" cellpadding="0" background="http://<?=$nombreurl?>/images/body_body.png">
  <tr>
    <td align="center" valign="top" >
	
<?  require_once('../inc/cabecera_admin.incl'); ?>  
</td>
                </tr>

  <tr>
    <td align="center" valign="top"  height=10>
<?  require_once('../inc/bot_admin.incl'); ?>  

</td>
</tr>
<tr>
<td align="center" valign="top" height=600>
<!-- CONTENIDO -->	

<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="550" height="450" id="CallCenter" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name='movie' value='CallCenter.swf?mi_var=<?=$posicion_vc?>&IP_in=<?=$IPE?>&id=<?=$empresa?>&quienes=<?=$empresa?>'  />

<param name="quality" value="high" />
<param name=wmode value=transparent>
<embed src='CallCenter.swf?mi_var=<?=$posicion_vc?>&IP_in=<?=$IPE?>&id=<?=$empresa?>&quienes=<?=$empresa?>' wmode='transparent' quality='high' width='550' height='450' name='CallCenter' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' />
</object>



<!-- CONTENIDO -->
</td>
</tr>

</table>
<!--Pie -->			
			
			
		<?  require_once('../inc/pie.incl'); ?>  	
			
			
			
<!-- Pie -->
</body>
</html>
