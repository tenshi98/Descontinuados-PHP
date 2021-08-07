<?php
session_start();
require_once('../nombre_pag.php');
require_once('../conexion.php');

if ($_SESSION['usuario']<>"") {
	
	$sql ="Select * from ejecutivos where id_ejecutiv='" . $_SESSION['usuario'] . "'";

}else{

	$sql ="SELECT * FROM ejecutivos WHERE login='" . $_POST["login"] . "' AND pass='" . $_POST["password"] . "'";

}

$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {

?>
		<script language="javascript">
			alert("Los datos ingresados son erroneos o su sesion expiro");
			window.location = "http://<?=$nombreurl?>";
		</SCRIPT>
<?
}else{
		while($fila=mysql_fetch_array($res))
		{
 		  list($paso12,$anexo) = split('-',$fila["numero_usuario"]);
		  $nombre=$fila['nom_ejecutiv'];
		  $correo_ejecutivo=$fila['mail_ejecutiv'];
		  $_SESSION['usuario']=$fila['id_ejecutiv'];
		  $correo=$fila['nom_ejecutiv'];
		  $foto=$fila["foto"];

				$sql2="select * from tipo_usuario where tipo='". $fila['tipo_usuario'] ."'";
				$res2=mysql_query($sql2,$base); 
					while($fila2=mysql_fetch_array($res2))
					{
						$descripcion=$fila2["descripcion"];
						$anexo_ip=$fila2["anexo_ip"];
						$click2call=$fila2["click2call"];
						$correos=$fila2["correos"];
						$existe=1;
					}

		}

}



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://<?=$nombreurl?>/scripts/jquery.js"></script>
<script type="text/javascript" src="http://<?=$nombreurl?>/scripts/jquery.clearfield.js"></script>
<!-- script type="text/javascript" src="slide/js/2jquery.js"></script -->
<script type="text/javascript" src="http://<?=$nombreurl?>/slide/js/2scripts.js"></script>

<script type="text/javascript">
<!--
$(document).ready(function() {
	$('.clearField').clearField();
});

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
</head>

<body>

<table background="http://<?=$nombreurl?>/images/body_body_int.png" align="center" width="1000" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="234" height="40" align="center" valign="bottom">
	<img src="http://<?=$nombreurl?>/images/top_logo_ch.png" width="234" height="40" /></td>
    <td background="http://<?=$nombreurl?>/images/linea_dot.png" width="1" rowspan="5" align="center" valign="bottom"></td>
    <td width="755" colspan="2">
    
    <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Imagen10','','images/home_bot_up.jpg',1)"></a>      
    
    <table width="755" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="755" align=right>

        <!-- CABECERA MENU --> 
        <?   
    require_once('foto_adm.php');  
?>

 <!-- CABECERA MENU -->  
         
          </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top">
	<img src="http://<?=$nombreurl?>/images/botton_logo_ch.png" width="234" height="85" /></td>
    <td width="581" rowspan="4" align="center" valign="top">
<? if ($numeroRegistros<>0) { ?>   
 <!--contenido-->


     <table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><span class="titulo_rojo_ppal_gd">Reporte de Llamadas</span></td>
        </tr>
      <tr>
	        <tr>
        <td>&nbsp;</td>
        </tr>

    </table>
<?
   if (!($tarificacion=mysql_connect("190.196.70.162","root","eLaStIx.2oo7","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("tarificador",$tarificacion)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }		
$sql_0="SELECT * FROM registro_cdr where src='".$anexo."' and duration>0";
$res=mysql_query($sql_0,$tarificacion); 
$numeroRegistros=mysql_num_rows($res); 
if($numeroRegistros<=0) 
{ ?>
   	<div align='center'> 
   	<font face='verdana' size='-2'>No se encontraron resultados</font> 
   	</div> 
	
<?}else{ 

   	//////////calculo de elementos necesarios para paginacion 
   	//tamaño de la pagina 
   	$tamPag=25; 

   	//pagina actual si no esta definida y limites 
   	if(!isset($_GET["pagina_reporte"])) 
   	{ 
      	 $pagina_reporte=1; 
      	 $inicio=1; 
      	 $final=$tamPag; 
   	}else{ 
      	 $pagina_reporte = $_GET["pagina_reporte"]; 
   	} 
   	//calculo del limite inferior 
   	$limitInf=($pagina_reporte-1)*$tamPag; 

   	//calculo del numero de paginas 
   	$numPags=ceil($numeroRegistros/$tamPag); 
   	if(!isset($pagina_reporte)) 
   	{ 
      	 $pagina_reporte=1; 
      	 $inicio=1; 
      	 $final=$tamPag; 
   	}else{ 
      	 $seccionActual=intval(($pagina_reporte-1)/$tamPag); 
      	 $inicio=($seccionActual*$tamPag)+1; 

      	 if($pagina_reporte<$numPags) 
      	 { 
         	 $final=$inicio+$tamPag-1; 
      	 }else{ 
         	 $final=$numPags; 
      	 } 

       if ($final>$numPags){ 
          $final=$numPags; 
      	 } 
   	} 

//////////fin de dicho calculo 

//////////creacion de la consulta con limites 
 

//////////fin consulta con limites 
echo "<div align='left'>"; 
echo "<font face='verdana' size='-2'>encontrados ".$numeroRegistros." resultados<br>"; 
echo "</font></div>"; 
echo "<hr noshade style='color:CC6666;height:1px'>";
?>
<table>  
 <tr>
                <td width="20%"  align="left" class="tabla_reportes" height="47" ><span class="arial_tit_gris2"> Destino </span></td>
                <td width="25%"  align="left" class="arial_tit_gris2" height="47"><p>Fecha y Hora
          del llamado</p></td>
                <td width="23%"  align="left" class="arial_tit_gris2" height="47">Duraci&oacute;n
          de la <br>llamada (segundos)</td>
                <td width="14%"  align="left" class="arial_tit_gris2" height="47">
				Costo de la llamada</td>                                
                <td width="18%"  align="left" class="arial_tit_gris2" height="47">
				Costo Minuto (pesos)</td>                                
           
</tr>
<tr>
                <td width="20%"  align="left" class="tabla_reportes" height="47" >&nbsp;</td>
                <td width="25%"  align="left" class="arial_tit_gris2" height="47">&nbsp;</td>
                <td width="23%"  align="left" class="arial_tit_gris2" height="47">&nbsp;</td>
                <td width="14%"  align="left" class="arial_tit_gris2" height="47">&nbsp;</td>                                
                <td width="18%"  align="left" class="arial_tit_gris2" height="47">&nbsp;</td>                                
                           
</tr>
<?
$sql2="SELECT * FROM registro_cdr where src='".$anexo."' and duration>0 ORDER BY calldate DESC LIMIT ".$limitInf.",".$tamPag; 
$gral=mysql_query($sql2,$tarificacion);
while($registro=mysql_fetch_array($gral)) 
{ 
		$dst = $registro["dst"];

if (substr($dst,0,7)=="628874#") {
			list($paso12,$dst) = split('#',$dst);
}

		$calldate = $registro["calldate"];
		$duration=$registro["billsec"];    
		$valor_llamada=$registro["valor_llamada"]; 
		$valor_minuto=$registro["valor_minuto"]; 

?>
  <!-- tabla de resultados --> 
   
 <tr>
                <td width="20%"  align="left" class="tabla_reportes" height=15>
                <span class="arial_tit_gris2"><?=$dst?></span></td>
                <td width="25%"  align="left" class="arial_tit_gris2"><?=$calldate?></td>
                <td width="23%"  align="left" class="arial_tit_gris2"><?=$duration?></td>
                <td width="14%"  align="left" class="arial_tit_gris2"><?=$valor_llamada?></td>                                   
                <td width="18%"  align="left" class="arial_tit_gris2"><?=$valor_minuto?></td>                                   
         
</tr>

    
   <!-- fin tabla resultados --> 
<?	
}//fin while ?>
 </table>
<?if ($contador_gral<$tamPag and $contador<>0) {
	echo "</tr> </table>";
}
//echo "</table>"; 
}//fin if 
//////////a partir de aqui viene la paginacion 
?> 
   	<br> 
   	<table border="0" cellspacing="0" cellpadding="0" align="center"> 
   	<tr><td align="center" valign="top"> 
<? 
   	if($pagina_reporte>1) 
   	{ 
      	 echo "<a class='fondo_red' href='".$_SERVER["PHP_SELF"]."?pagina_reporte=".($pagina_reporte-1)."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
      	 echo "<font face='verdana' size='-2'>anterior</font>"; 
      	 echo "</a> "; 
   	} 

   	for($i=$inicio;$i<=$final;$i++) 
   	{ 
      	 if($i==$pagina_reporte) 
      	 { 
         	 echo "<font face='verdana' size='-2'><b>".$i."</b> </font>"; 
      	 }else{ 
         	 echo "<a class='fondo_red' href='".$_SERVER["PHP_SELF"]."?pagina_reporte=".$i."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
         	 echo "<font face='verdana' size='-2'>".$i."</font></a> "; 
      	 } 
   	} 
   	if($pagina_reporte<$numPags) 
   { 
      	echo " <a class='fondo_red' href='".$_SERVER["PHP_SELF"]."?pagina_reporte=".($pagina_reporte+1)."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
      	echo "<font face='verdana' size='-2'>siguiente</font></a>"; 
   } 
//////////fin de la paginacion 
?> 
   	</td></tr> 
   	</table> 
<hr noshade style="color:CC6666;height:1px">   
    
    
    
    
    
    
    
    <!--contenido-->   
<?}else{?>

<br><br><br>
			<span class="celda_titulo_cat"> Su Sesión ha Expirado </span><br><br><br>

			<a href="http://<?=$nombreurl?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Imagen15','','../images/reingrese_up.png',1)">
		<img src="http://<?=$nombreurl?>/images/reingrese.png" name="Imagen15"  border="0"></a>
<?}?>        
    </td>
    <td width="160" rowspan="4" align="center" valign="top">
	        <?   
    require_once('columna_derecha.php');  
?>

    
    
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" class="fondo_celda">&nbsp;</td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td align="center" valign="top" class="fondo_celda">
    	        <?   
    require_once('tabla_menu.php');  
?>

    
    </p></td>
  </tr>
</table>

 <!-- PIE  -->
 	        <?   
    require_once('../inc/pie_int.incl');  
?>
  
 <!-- PIE  -->
</body>
<SCRIPT LANGUAGE=javascript>
function Mfoto(paso)
{

	var url="muestrafoto.asp?foto=.."+paso;
	var winstyle="dialogWidth:900px;dialogHeight:650px";
				
	cSearchValue=showModalDialog(url,0,winstyle);
}

function confirma(pasodoble) {
   if(confirm('Seguro que desea bloquearlo?')) {
   var url='acepta_unirte.php?id='+pasodoble+'&accion=bloquea';
   var ventana="dialogheight:400px;dialogwidth:400px;help:no;status:no;";
	window.showModalDialog(url,"", ventana);	
   }	
}
function confirma2(pasodoble) {
   if(confirm('&iquest;Seguro que desea bloquearlo?')) {
   var url='acepta_unirte.php?id='+pasodoble+'&accion=bloquea';
   var ventana="dialogheight:400px;dialogwidth:400px;help:no;status:no;";
	window.showModalDialog(url,"", ventana);	
   }	
}
function elimina(pasodoble) {
   if(confirm('&iquest;Seguro que desea eliminar el mensaje?')) {
   var url='elimina_msg.php?id_msg='+pasodoble;
   var ventana="dialogheight:400px;dialogwidth:400px;help:no;status:no;";
	window.showModalDialog(url,"", ventana);	
   }	
}
function agrega(pasodoble) {
   if(confirm('&iquest;Seguro que desea agregar a sus contactos favoritos?')) {
   var url='g_favoritos.php?id_favoritos='+pasodoble;
   var ventana="dialogheight:400px;dialogwidth:400px;help:no;status:no;";
	window.showModalDialog(url,"", ventana);	
   }	
}
function sendpost(msg) {
	var fecha='<?=$fecha?>';
	var hora='<?=$hora?>';
	var hoy='<?=$hoy?>';
	var us='<?=$_SESSION['usuario']?>';
	var url22='<?=$nombreurl?>';
	var url='<?=$nombreurl?>';
   var url3='http://<?=$redes_s?>/index.php?mensaje='+msg+'&fecha='+fecha+'&hora='+hora+'&hoy='+hoy+'&us='+us+'&url22='+url22+'&url='+url;
	window.open(url3,"_self");	
}
function refresh() 
{ 
    window.location.reload(); 
} 
 
</SCRIPT>
</html>