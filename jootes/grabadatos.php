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
        require_once('inc/cabecera_ext.incl');         
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
        
 
<?


$res=mysql_query("SELECT * from ejecutivos where login='" . $_POST["correo"] . "'",$base); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {

$mailbox= $_POST["correo"];
$invita= $nombre_corto;
$Context= "mmundos";
$Name= $_POST["nombre"];
$voicemail= "default";
/*$numeros=0;
$res2=mysql_query("select orden from sip_anexos where orden>=1000 and orden<50000 order by orden desc LIMIT 0 , 1",$base_valida); 
		while($fila2=mysql_fetch_array($res2))
		{
			$numeros = $fila2["orden"];
			$numeros= $numeros + 1;
			echo $numeros;
		}



$Ext= $numeros;

$Secret= substr(md5(uniqid(rand())),0,8);

$numero_usuario=$Secret ."-". $numeros;


$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','record_out','Adhoc')",$base_cdr); 
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','record_in','Adhoc')",$base_cdr); 
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','callerid','device <".$Ext.">')",$base_cdr); 
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','account','".$Ext."')",$base_cdr); 
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','mailbox','".$Ext."@device')",$base_cdr); 
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','accountcode','')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values   ('".$Ext."','dial','SIP/".$Ext."')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','allow','all')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','disallow','')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','pickupgroup','')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','callgroup','')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','qualify','yes')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','port','5060')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','nat','yes')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values   ('".$Ext."','type','friend')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','host','dynamic')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','context','".$Context."')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values   ('".$Ext."','canreinvite','no')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','dtmfmode','rfc2833')",$base_cdr);
$res2=mysql_query("insert into sip (id,keyword,data) values  ('".$Ext."','secret','".$Secret."')",$base_cdr);
//$sql="insert into users (indice,extension,password,name,voicemail,ringtimer,noanswer,recording,outboundcid,directdid,didalert,faxexten,faxemail,answer,wait,privacyman,mohclass,sipname,monto_user,ultima_llamada,anfitrion) values ('".$Ext."','".$Ext."','".$Secret."','".$Name."','".$voicemail."',0,'','out=Adhoc|in=Adhoc','','','','default','',0,0,0,'acc_1','',50,'','".$invita."')";
$sql="insert into users (indice,extension,password,name,voicemail,ringtimer,noanswer,recording,outboundcid,sipname,monto_user,ultima_llamada,anfitrion) values ('".$Ext."','".$Ext."','".$Secret."','".$Name."','default',0,'','out=Adhoc|in=Adhoc','','',370,'','SOSCLICK')";
echo $sql;
$res2=mysql_query($sql,$base_cdr);
$res2=mysql_query("insert into devices (id,tech,dial,devicetype,user,description,emergency_cid) values ('".$Ext."','sip','SIP/".$Ext."','fixed','".$Ext."','".$Name."','')",$base_cdr);

$res2=mysql_query("INSERT INTO sip_anexos (name, callerid, secret,orden) VALUES ('".$Ext."', '".$Name."', '".$Secret."',".$numeros.")",$base_valida);
$res2=mysql_query("INSERT INTO voicemail_users (customer_id,mailbox,password,fullname,email) VALUES ('".$Ext."','".$Ext."', '1234','".$Name."', '".$_POST["correo"]."')",$base_valida);
*/

$nacio=$_POST["ano"].$_POST["mes"].$_POST["dia"];
$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "i" , $tiempo ); 
$seg= date ( "i" , $tiempo ); 
$hora=$hora.$min.$seg;

$fecha    = $stime=date("Ymd");
//defino el grupo
$grupo="'roulette'";
//Otros datos
$soy="'H'";
$busco='2';
$radio='1';
$edad='18';
$b_edad_a='18';
$b_edad_b='75';
$publicidad="'Si'";
	
$sql="INSERT INTO ejecutivos (fecha_ingreso,login, pass, nombre_real,ciudad_ejecutiv, fono_ejecutiv, mail_ejecutiv, fecha_nacimiento, grupo, soy, busco, radio, edad, b_edad_a, b_edad_b, publicidad) VALUES ('" . $fecha . "','" . $_POST["correo"] . "', '" . $_POST["password"] . "', '" . $Name . "','" . $_POST["ciudad"] . "','" . $_POST["fono"] . "', '" . $_POST["correo"] . "','" . $nacio . "',{$grupo},{$soy},{$busco},{$radio},{$edad},{$b_edad_a}, {$b_edad_b},{$publicidad})";
//echo $sql;
$res2=mysql_query($sql,$base);

//$resid=mysql_query("SELECT * from ejecutivos where login='" . $_POST["correo"] . "'",$base); 
//while($filaid2=mysql_fetch_array($resid))
//{
// $id=$filaid2["id_ejecutiv"];
//}

//$sql000="insert into filtros (id_usuario,soy,micondicion,busco,tucondicion) values ( ".$id .",'M','E','F','E')";
//$res000=mysql_query($sql000,$base);


require("./PHPMailer_v5.1/class.phpmailer.php"); 
$mail = new PHPMailer(); 
$mail->Host = "localhost";
$mail->SMTPAuth = true;
$strMensaje = "http://".$nombreurl;
$mail->From=$correopagina;
	$mail->FromName="Atentamente , " . $nombreurl .".";
	$mail->Sender=$correopagina;
	$mail->AddReplyTo($correopagina, "Responde a este mail");
	$mail->Subject = "Tus datos ya estan activos en " . $nombreurl;
	$mail->IsHTML(true);
	$mail->AddAddress($_POST["correo"]);



$strBody = "<div align='center'>";
$strBody .= "<table border='0' width='90%' id='table1' height='279'>";
$strBody .= "<tr>";
$strBody .= "<td><b>Estimado ".$_POST["nombre"].":</b></td>";
$strBody .= "</tr>";
$strBody .= "<tr>";
$strBody .= "<td height='32'>Ya tienes acceso al Love Roulette de ". $nombreurl . ".</td>";
$strBody .= "</tr>";
$strBody .= "<tr>";
$strBody .= "<td height='32'><span style='font-size:12px;' >Tus datos para ingresar son: <br><br> Login :'" . $_POST["correo"] . "'<br> Password :'" . $_POST["password"] . "'</span><br><br></td>";
$strBody .= "</tr>";
$strBody .= "<tr>";
$strBody .= "<td height='32'>Deberas bajar e instalar nuestra aplicaci&oacute;n en tu SmartPhone (Android) ingresar los datos que se solicitaran y comenzar a disfrutar.";
$strBody .= "La direccion de tu aplicacion se encuentra en http://".$nombreurl."/roulette.apk.<br><br>";
$strBody .= "<a href='".$strMensaje."' target=_blank> Ingresa desde Aqu&iacute; y comienza a utilizar este servicio.</a></td>";
$strBody .= "</tr>";
$strBody .= "<tr>";
$strBody .= "<td>.nbsp;</td>";
$strBody .= "</tr>";
$strBody .= "<tr>";
$strBody .= "<td height='32' align=right>".$nombre."</td>";
$strBody .= "</tr>";
$strBody .= "</table>";
$strBody .= "</div>";

$mail->MsgHTML($strBody);
			if(!$mail->Send())
			{

				$mail->ClearAddresses();
			}
			else
			{

  			 $mail->ClearAddresses();
			}
}

?>
  
        
        
        
        
        
    
    
    <? if ($numeroRegistros==0)  {?>
            <blockquote>
              <p><span class="arial_24_blue">Los datos del nuevo usuarios fueron creados.</span></p>
            </blockquote><br><br>
            <TABLE align=center valign=middle>
<TR>
	<TD align=center valign=middle height=100>
	<img src="http://<?=$nombreurl?>/images/qr_img.jpg"   border="0" /></TD>
</TR>
<TR>
	<TD align=center valign=middle height=100>INstala desde aqu&iacute; nuestra aplicaci&oacute;n<br>
	</TD>
</TR>
</TABLE>


<? }else{?>
            <blockquote>
              <p><span class="arial_24_red">El usuario ya existe.</span></p>
            </blockquote>
<? }?>




        
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
