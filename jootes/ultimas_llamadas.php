<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
require_once('nombre_pag.php');
require_once('conexion.php');

if ($_SESSION['usuario']<>"") {
	
	$sql ="Select * from ejecutivos where id_ejecutiv='" . $_SESSION['usuario'] . "'";

}else{

	$sql ="SELECT * FROM ejecutivos WHERE login='" . $_POST["login"] . "' AND pass='" . $_POST["password"] . "'";

}
//echo $sql;
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
		while($perfil=mysql_fetch_array($res))
		{

		  $nombre=$perfil['nom_ejecutiv'];
		  $login=$perfil['login'];
		  $pass=$perfil['pass'];
		  $correo_ejecutivo=$perfil['mail_ejecutiv'];
		  $_SESSION['usuario']=$perfil['id_ejecutiv'];
		  $correo=$perfil['nom_ejecutiv'];
		  $telefono=$perfil["fono_ejecutiv"];

				$sql2="select * from filtros where id_usuario=". $_SESSION['usuario'];
				$res2=mysql_query($sql2,$base); 
					while($perfil2=mysql_fetch_array($res2))
					{
						$soy=$perfil2["soy"];
						$micondicion=$perfil2["micondicion"];
						$busco=$perfil2["busco"];
						$tucondicion=$perfil2["tucondicion"];
					}
		}
}


$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "i" , $tiempo ); 
$seg= date ( "i" , $tiempo ); 
$hora=$hora.$min.$seg;

$Fecha=getdate(); 

$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes < 10) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia < 10) {
	$diadis="0".$Dia;
}else{
$diadis=$Dia;
}
$fecha=$Anio."-".$mesdis;

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
    <td align="center" valign="middle" ><table width="970" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_bca esquina_red">
      <tr>
        <td align="center" valign="middle">
        
        <!-- Contenido -->
        
 		  
     <table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><span class="cuerpo_gris">Reporte de Llamadas <?=$fecha?></span></td>
        </tr>
      <tr>
	        <tr>
        <td>&nbsp;</td>
        </tr>

    </table>
<?


		
$sql_0="SELECT * FROM cdr where clid like'%".$telefono."%' and disposition='ANSWERED' and calldate like '".$fecha."%'";
$res=mysql_query($sql_0,$control_cdr); 
$numeroRegistros=mysql_num_rows($res); 
if($numeroRegistros<=0) 
{ ?>
   	<div align='center' > 
   	<span class="cuerpo_gris">No se encontraron resultados</sanp> 
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
echo "<span class='cuerpo_gris'>encontrados ".$numeroRegistros." resultados<br>"; 
echo "</font></div>"; 
echo "<hr noshade style='color:CC6666;height:1px'>";
?>
<table width="500">  
 <tr>
                <td width="50%"  align="left" class="arial_light_med" height="47" > Destino </td>
                <td width="50%"  align="left" class="arial_light_med" height="47"><p>Fecha y Hora
          del llamado</p></td>
                              
           
</tr>
<tr>
                <td width="50%"  align="left" class="arial_light_med" height="25" >&nbsp;</td>
                <td width="50%"  align="left" class="arial_light_med" height="25">&nbsp;</td>
                                
                           
</tr>
<?
$sql2="SELECT * FROM  cdr where clid like'%".$telefono."%' and disposition='ANSWERED' and dst<>'s' and calldate like '".$fecha."%' ORDER BY calldate DESC LIMIT ".$limitInf.",".$tamPag; 
$gral=mysql_query($sql2,$control_cdr);
while($registro=mysql_fetch_array($gral)) 
{ 
		$dst = $registro["dst"];

if (substr($dst,0,7)=="628874#") {
			list($paso12,$dst) = split('#',$dst);
}

$dst = str_replace("628874#", "", $dst);
$dst = str_replace("909", "", $dst);

$sql_dst ="SELECT * FROM ejecutivos WHERE fono_ejecutiv='" . $dst . "'";
$res_dst=mysql_query($sql_dst,$base); 
while($perfil_dst=mysql_fetch_array($res_dst))
		{

		  $nombre_dst=$perfil_dst['nom_ejecutiv'];
		}

		$calldate = $registro["calldate"];
		$duration=$registro["billsec"];    
		$valor_llamada=$registro["valor_llamada"]; 
		$valor_minuto=$registro["valor_minuto"]; 

?>
  <!-- tabla de resultados --> 
   
 <tr>
                <td width="50%"  align="left" class="tabla_reportes" height=15>
                <span class="arial_light_med"><?=$nombre_dst?></span></td>
                <td width="50%"  align="left" class="arial_light_med"><?=$calldate?></td>
                             
         
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
