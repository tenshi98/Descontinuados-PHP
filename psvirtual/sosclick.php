<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
require_once('nombre_pag.php');
require_once('conexion.php');


if ($_GET["id"]<>"") {
	
	$sql ="SELECT * FROM ejecutivos WHERE id_ejecutiv=" . $_GET["id"];

}else{

	$sql ="SELECT * FROM ejecutivos WHERE login='" . $_GET["login"] . "' AND pass='" . $_GET["pass"] . "'";
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
		
		  $nombre=$fila['nom_ejecutiv'];
		  $correo_ejecutivo=$fila['mail_ejecutiv'];
		  $id=$fila['id_ejecutiv'];
		  $_SESSION['usuario']=$fila['id_ejecutiv'];
		  $correo=$fila['nom_ejecutiv'];
		  $login=$fila['login'];
		  $foto=$fila["foto"];
		  $telefono=$fila["fono_ejecutiv"];
		  $sms1=$fila["sms1"];
		  $sms2=$fila["sms2"];
		  $sms3=$fila["sms3"];

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

$tiempo = time (); 
$hora1= date ( "H" , $tiempo ); 
$min= date ( "i" , $tiempo ); 
$seg= date ( "i" , $tiempo ); 
$hora=$hora1.$min.$seg;

$Fecha=getdate(); 

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
$fechahora=$diadis."/".$mesdis."/".$Anio."  ".$hora1.":".$min.":".$seg;


if ($_POST["elimina_dato"]=="eliminar") {
	$res22=mysql_query("update contenido_log set estado='0' where id_mensaje='". $_POST["id_msg"] ."'",$base); 
	$elimina_dato="";
}
	
if ($_POST["tucuenta"]=="si") {
	$nombre_viene=$nombre;

	if ($_SESSION["anterior"]<>$_POST["mensaje1"]) {
		if ($_POST["mensaje1"]<>"") {
			if (substr($_POST["mensaje1"],0,1)=="*") { 
				$sql_info =" insert into contenido_log (rubro,texto,fecha,nombre,hora,fechahora,estado,tipo,privado) values ('" . $_SESSION["usuario"] . "','" . $_POST["mensaje1"] . "','". $fecha ."','". $_SESSION["usuario"] ."','". $hora ."','". $fechahora ."','1','1','". $_POST["msg_privado"] . "')";
				$res22=mysql_query($sql_info,$base); 
			}else{ 				
				$sql_info = "insert into contenido_log (rubro,texto,fecha,nombre,hora,fechahora,estado,tipo,privado) values ('" . $_SESSION["usuario"] . "','" . $_POST["mensaje1"] . "','". $fecha ."','". $_SESSION["usuario"] ."','". $hora ."','". $fechahora ."','1','0','') ";
				$res22=mysql_query($sql_info,$base); 
			}	
		}
	}
	$_SESSION["anterior"]=$_POST["mensaje1"];	
}	



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--#include file="nombre_pag.asp"-->
<title>.:: <?=$pagina?> ::.</title>

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

<script src="AC_RunActiveContent.js" type="text/javascript"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script LANGUAGE="JavaScript" type="text/javascript">
<!--
function limita(elEvento,varelemento, maximoCaracteres) {
  var elemento = document.getElementById(varelemento);
  // Obtener la tecla pulsada 
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  // Permitir utilizar las teclas con flecha horizontal
  if(codigoCaracter == 37 || codigoCaracter == 39) {
    return true;
  }

  // Permitir borrar con la tecla Backspace y con la tecla Supr.
  if(codigoCaracter == 8 || codigoCaracter == 46) {
    return true;
  }
  else if(elemento.value.length >= maximoCaracteres ) {
    alert('Ha superado el tamaño máximo para escribir/n los Números de celulares tienen 9 dígitos, por favor borre uno al menos');
    return false;
  }
  else {
    return true;
  }
}
//-->


function JLower(Objeto){
    var a = "";
	if (Objeto.value != ""){
		a = Objeto.value;
		Objeto.value = a.toLowerCase();
	}
	return(Objeto);
}

function JUpper(Objeto){
    var a = "";
    if (Objeto.value != ""){
       a = Objeto.value;
	   Objeto.value = a.toUpperCase();
    }  
	return(Objeto);
}

function JValidaCaracter(Tipo, Adicional){
		var strNumeros ="0123456789";
		var Minusculas = "abcdefghijklmnñopqrstuvwxyz";
		var Mayusculas = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
		var strTexto = Minusculas + Mayusculas + " ";
		var strAlfanumerico = strTexto + strNumeros + "/-_,;";
		
		var strMail = Minusculas + Mayusculas + strNumeros + "@_-.";
		
		var TextoTotal = new String();
		TextoTotal = Adicional;
		
		switch(Tipo){
			case "Numerico":{
				TextoTotal += strNumeros;
			break;	
			}
			case "Texto":{
				TextoTotal += strTexto;
			break;	
			}
			case "Alfanumerico":{
				TextoTotal += strAlfanumerico;
			break;	
			}
			case "Email":{
				TextoTotal += strMail;
			break;	
			}
		}
				
		strCaracter = new String();
		if(window.event){
           keyPressed = window.event.keyCode; //for IE
        }else{
           keyPressed = e.which; // others
        }   
		// strCaracter = String.fromCharCode(window.event.keyCode);
		strCaracter = String.fromCharCode(keyPressed);
		var Pos = TextoTotal.indexOf (strCaracter);
		if(Pos > -1){
			return true;
		}else{
			window.event.keyCode = 0;
			return false;			
		}					
}

function JValidaCaracter2(Tipo, Adicional, Caracter){
		var strNumeros ="0123456789";
		var Minusculas = "abcdefghijklmnñopqrstuvwxyz";
		var Mayusculas = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
		var strTexto = Minusculas + Mayusculas + " ";
		var strAlfanumerico = strTexto + strNumeros + "/-_,;";
		
		var strMail = Minusculas + Mayusculas + strNumeros + "_-.";
		
		var TextoTotal = new String();
		TextoTotal = Adicional;
		
		switch(Tipo){
			case "Numerico":{
				TextoTotal += strNumeros;
			break;	
			}
			case "Texto":{
				TextoTotal += strTexto;
			break;	
			}
			case "Alfanumerico":{
				TextoTotal += strAlfanumerico;
			break;	
			}
			case "Email":{
				TextoTotal += strMail;
			break;
			}
		}
		strCaracter = new String();
		strCaracter = String.fromCharCode(Caracter);
		var Pos = TextoTotal.indexOf (strCaracter);
		if(Pos > -1){
			return true;
		}else{
			//window.event.keyCode = 0;
			return false;			
		}
}
	
function valiTexto(e) {
	key = "";
	key = e.which;
	tipo = e.id;
	if (	JValidaCaracter2('Texto','',key)  || key == 8) {
		return true;
	}else{
		return false;
	}
}

function valiNumero(e) {
	key = "";
	key = e.which;
	tipo = e.id;
	if (	JValidaCaracter2('Numerico','',key)  || key == 8) {
		return true;
	}else{
		return false;
	}
}

function valiDigito(e) {
	key = "";
	key = e.which;
	tipo = e.id;
	if (	JValidaCaracter2('Numerico','kK',key) || key == 8) {
		return true;
	}else{
		return false;
	}
}

function valiAlfanumerico(e) {
	key = "";
	key = e.which;
	tipo = e.id;
	if (	JValidaCaracter2('Alfanumerico','',key) || key == 8) {
		return true;
	}else{
		return false;
	}
}
 
function valiEmail(e) {
	key = "";
	key = e.which;
	tipo = e.id;
	if (	JValidaCaracter2('Email','',key) || key == 8) {
		return true;
	}else{
		return false;
	}
}

function Jsubstr(str,ini){
  var v='';
  for(i=ini;i<str.length;i++) v+=str.charAt(i);
  return v;
}

function Jsubstring(str,ini,fin){
  var v='';
  var bound=(fin>str.length) ? str.length : fin;
  for(i=ini;i<bound;i++) v+=str.charAt(i);
  return v;
}

function JTrim(str){
  var ini=0;
  var fin=str.length-1;
  while(ini<=fin && str.charAt(ini)==" ") ini++;
  if (ini<=fin){
    while(str.charAt(fin)==" ") fin--;
    if (fin<str.length-1) {
	fin++;
	return Jsubstring(str,ini,fin);
    } else return Jsubstr(str,ini);
  } else return '';
}

//función para chequear un correo válido
function isValidEmail(strEmail){
  validRegExp = /^[^@]+@[^@]+.[a-z]{2,}$/i;
  strEmail = mainFrame.correo.value;

   // busca en email.value si es una expresion regular válida para e-mail
    if (strEmail.search(validRegExp) == -1) 
   {
      alert('Se requiere una dirección de e-mail válida.\nPor favor corrija y reintente');
      return false;
    } 
    return true; 
}
function validarNum(evt) {
//asignamos el valor de la tecla a keynum
	if(window.event){// IE
		   keynum = evt.keyCode;
		}else{
		   keynum = evt.which;
	}
	if (keynum==9) return true; //Tecla de TAB
	//comprobamos si se encuentra en el rango
	if((keynum>45 && keynum<58) || keynum == 8 || keynum == 0){
		  return true;
		}else{
		  return false;
	}
} 
 
</script>
<script language="JavaScript">
function aceptar(){

	if (JTrim(mainFrame.ciudad.value)=='X' && JTrim(mainFrame.telefono.value)!='') {
		alert("Debes seleccionar el código de tu teléfono para ser llamado");
		mainFrame.ciudad.focus();
		return(false);
	}
	
return(true);
}	
</SCRIPT>

</head>

<body topmargin=0 leftmargin=0>
		<div align="center">
	<table border="0" width="98%" cellspacing="0" cellpadding="0" id="table5" height="25">
				<tr>
			<td align="center"  valign="middle" ><b><?=$nombre?></b></td>
			</tr>

	</table>
<table border="0" width="320" cellspacing="0" valign=top  cellpadding="0" id="table4" height="480" bordercolor="#000080" bordercolorlight="#0000FF" bordercolordark="#000080"  background="http://www.sosclick.cl/images/sos_fondo2_b.jpg">
	<tr>
	<td height="50" class="tres" align="left" valign=top >
<form  name="mainFrame0" id="mainFrame0" method="post" target="_self" action="http://www.sosclick.cl/sosclick_sms.php">
<input type="hidden" name="id" id="id" value="<?=$id?>">
	<table border="0" width="98%" cellspacing="0" cellpadding="0" id="table5" height="49">
				<tr>
			<td align="center" valign="bottom" colspan="3"><p align="center"><b><font color="#000080">Envia SMS de emergencia presionando Enviar</font></b>
			</td>
	</tr>
	<tr>
		<td width="28%" valign="bottom" align="center"><input type="image" src="http://www.click2call.cl/images/enviar_bot.jpg" name="Grabar" /></td>
	</tr>
		<tr>
		<td height="50" valign="bottom" align="center">&nbsp;</td>
	</tr>
	</table>
</form>

<form  name="mainFrame" id="mainFrame" method="post" target="_self" action="http://www.sosclick.cl/gracias_cel.php">
<input type="hidden" name="id" id="id" value="<?=$id?>">
	<table border="0" width="98%" cellspacing="0" cellpadding="0" id="table5" height="49">
				<tr>
			<td align=right valign="bottom" colspan="3"><p align="center"><b><font color="#000080">Realiza la llamada presionando enviar<br> o ingresa el numero.</font></b>
			</td>
	</tr>
			<tr>
			<td align=right valign="bottom" colspan="3" class="arial_10_66">
				<p align="center"><b><font face="Arial" size="1" color="#000080">Seleccione</font></b><font color="#FFFFFF" size="1">
				</font>
				<select name="ciudad">
					<option Selected Value="09" Class="uno">Celular</option>
					<option Value="2" Class="dos">Santiago</option>
					<option Value="09" Class="tres">Celular</option>
					</select>
			</td>
	</tr>
	<tr>
		<td align=right valign="bottom" width="33%" class="arial_10_66"><font face="Arial" color="#000080" size="2"><b>9xxxxxxx</b></font></td>
		<td width="38%" align=center valign="bottom">
		<input type="text" size="19" maxlength="11" name="telefono" id="telefono" onKeyPress="JValidaCaracter('Numerico','');" value="<?=$telefono?>" onblur="aceptar();"></td>
		<td width="28%" valign="bottom"><input type="image" src="http://www.click2call.cl/images/enviar_bot.jpg" name="Grabar" /></td>
	</tr>
	</table>
</form>
	</td>
	</tr>
</table>
</div>
	
<br>
</body>
</html>
