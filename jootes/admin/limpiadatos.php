<?php

require_once('../nombre_pag.php');
require_once('conexion_chica.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href="../estilo.css" rel="stylesheet" type="text/css"/>


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


</head>

<body topmargin=10>



 <?


$veri_sql=mysql_query("select * from sip where id='" . $_POST["anexo"] . "'",$base_cdr); 
$numeroRegistros1=mysql_num_rows($veri_sql); 

if ($numeroRegistros1>0)  {
	$sql ="delete from sip where id='" . $_POST["anexo"] . "'";
	$res2=mysql_query($sql,$base_cdr); 
}

//*******************

$veri_sql = mysql_query("select * from users where extension='" . $_POST["anexo"] . "'",$base_cdr);
$numeroRegistros2=mysql_num_rows($veri_sql); 

if ($numeroRegistros2>0)  {
	$sql2 = "delete from users where extension='" . $_POST["anexo"] . "'";
		$res2=mysql_query($sql2,$base_cdr); 
}

//*******************
$veri_sql = mysql_query("select * from devices where id='" . $_POST["anexo"] . "'",$base_cdr);
$numeroRegistros3=mysql_num_rows($veri_sql); 

if ($numeroRegistros3>0)  {
	$sql3 = "delete from devices where id='" . $_POST["anexo"] . "'";
		$res2=mysql_query($sql3,$base_cdr); 
}

//*******************
$veri_sql = mysql_query("select *  from sip_anexos where name='" . $_POST["anexo"] . "'",$base_valida);
$numeroRegistros4=mysql_num_rows($veri_sql); 

if ($numeroRegistros4>0)  {
	$sql3 = "delete from sip_anexos where name='" . $_POST["anexo"] . "'";
		$res2=mysql_query($sql3,$base_cdr); 
}
//*******************

$veri_sql = mysql_query("select * from voicemail_users where customer_id='" . $_POST["anexo"] . "'",$base_valida);
$numeroRegistros5=mysql_num_rows($veri_sql); 

if ($numeroRegistros5>0)  {
	$sql3 = "delete from voicemail_users where customer_id='" . $_POST["anexo"] . "'";
		$res2=mysql_query($sql3,$base_cdr); 
}
//*******************


$veri_sql=mysql_query("select *  from ejecutivos where numero_usuario like '%-" . $_POST["anexo"] . "'",$base);
$numeroRegistros6=mysql_num_rows($veri_sql); 

if ($numeroRegistros6>0)  {
	$sql="delete from ejecutivos where substring(numero_usuario,10,6)='" . $_POST["anexo"] . "'";
	$res2=mysql_query($sql,$base); 
	
}	
//*******************


?>
  
        
        
        
        
               <blockquote>
              <p><span class="arial_24_blue">Los datos fueron eliminados.</span></p>
            </blockquote>   



<p><a href="limpia_usuarios.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Imagen19','','../../images/entrar_up.png',1)">
		<img src="../images/volver.png" name="Imagen20"  border="0"></a>




    

</body>
</html>