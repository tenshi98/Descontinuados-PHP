<?php
session_start();
require_once('../nombre_pag.php');
require_once('../conexion.php');
$Codigo=$_SESSION['usuario'];
$existe=0;

$resultado2=mysql_query("Select * from ejecutivos where id_ejecutiv='" . $Codigo . "'",$base); 
while($fila_vm2=@mysql_fetch_array($resultado2)) {
			$estado_fono =$fila_vm2["estado_fono"];
			$estado_id =$fila_vm2["id_ejecutiv"];
			$activar_vm =$fila_vm2["activar_vm"];
			$txtCode_Value55 = $fila_vm2["numero_usuario"];
			list($paso12,$paso22) = split('-',$txtCode_Value55);
			$fono_desde_ejecutiv= $fila_vm2["fono_desde_ejecutiv"];
			$fono_hasta_ejecutiv= $fila_vm2["fono_hasta_ejecutiv"];
			$cod_fono= $fila_vm2["cod_fono"];
			$fono_ejecutiv= $fila_vm2["fono_ejecutiv"];
			$celu_desde_ejecutiv= $fila_vm2["celu_desde_ejecutiv"];
			$celu_hasta_ejecutiv= $fila_vm2["celu_hasta_ejecutiv"];
			$posicion_vc= $fila_vm2["posicion_vc"];
			$estado_vc= $fila_vm2["estado_vc"];
			$login= $fila_vm2["login"];
			$existe=1;
}

$existe2=0;
$sql="select * from users where extension='".$paso22."'";

$resul3=mysql_query($sql,$base_cdr);
while($fila_vm3=mysql_fetch_array($resul3)) {

$saldo= (int)$fila_vm3["monto_user"];

}
$numproc=$txtCode_Value1;



?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link href="../estilo.css" rel="stylesheet" type="text/css">
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

<script src="../AC_RunActiveContent.js" type="text/javascript"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--  BEGIN Browser History required section -->
<link rel="stylesheet" type="text/css" href="history.css" />
<!--  END Browser History required section -->

<title></title>
<script src="AC_OETags.js" language="javascript"></script>

<!--  BEGIN Browser History required section -->
<script src="history.js" language="javascript"></script>
<!--  END Browser History required section -->


<script language="JavaScript" type="text/javascript">
<!--
// -----------------------------------------------------------------------------
// Globals
// Major version of Flash required
var requiredMajorVersion = 9;
// Minor version of Flash required
var requiredMinorVersion = 0;
// Minor version of Flash required
var requiredRevision = 28;
// -----------------------------------------------------------------------------
// -->
</script>

<script type="text/javascript">

function red5phone_getConfig() {

	var username = getPageParameter('username', '<?=$paso12?>-<?=$paso22?>- -<?=$saldo?>');
	var password = getPageParameter('password', '<?=$txtCode_Value4?>');
	var mailbox = getPageParameter('mailbox', '');

	return {

		username: username,
		password: password,
		mailbox:  mailbox,
		autologin: true
	};
}


function getParameter(string, parm, delim) {

     if (string.length == 0) {
     	return '';
     }

	 var sPos = string.indexOf(parm + "=");

     if (sPos == -1) {return '';}

     sPos = sPos + parm.length + 1;
     var ePos = string.indexOf(delim, sPos);

     if (ePos == -1) {
     	ePos = string.length;
     }

     return unescape(string.substring(sPos, ePos));
}

function getPageParameter(parameterName, defaultValue) {

	var s = self.location.search;

	if ((s == null) || (s.length < 1)) {
		return defaultValue;
	}

	s = getParameter(s, parameterName, '&');

	if ((s == null) || (s.length < 1)) {
		s = defaultValue;
	}

	return s;
}
</script>


<script>
function bye(){
	c = confirm('Te vas?');
	if(c == true){
		window.location='cerrar.php?cierro=<?=login?>';
	
	}else{
		return false;
	}
}
</script>

</head>


<body onunload="bye()">
<div align="center">

<table border="0" width="250" id="table1"  height="350" cellspacing="0" cellpadding="0">
	<tr>
		<td width="250" height="350">
		<? if ($existe==1) {
$resultado22=mysql_query("update ejecutivos set estado_fono='1' where login='" . $login . "'",$base); 

		
		

		//'if cdbl(conte.fields("monto_user"))>30 	{
		
		?>
<!--CLICK2CALL-->
<center>
<script language="JavaScript" type="text/javascript">
<!--
// Version check for the Flash Player that has the ability to start Player Product Install (6.0r65)
var hasProductInstall = DetectFlashVer(6, 0, 65);

// Version check based upon the values defined in globals
var hasRequestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);

if ( hasProductInstall && !hasRequestedVersion ) {
	// DO NOT MODIFY THE FOLLOWING FOUR LINES
	// Location visited after installation is complete if installation is required
	var MMPlayerType = (isIE == true) ? "ActiveX" : "PlugIn";
	var MMredirectURL = window.location;
    document.title = document.title.slice(0, 47) + " - Flash Player Installation";
    var MMdoctitle = document.title;

	AC_FL_RunContent(
		"src", "playerProductInstall",
		"FlashVars", "MMredirectURL="+MMredirectURL+'&MMplayerType='+MMPlayerType+'&MMdoctitle='+MMdoctitle+"",
		"width", "250",
		"height", "350",
		"align", "top",
		"id", "telefono",
		"wmode", "transparent",		
		"quality", "high",
		"name", "telefono",
		"allowScriptAccess","sameDomain",
		"type", "application/x-shockwave-flash",
		"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
} else if (hasRequestedVersion) {
	// if we've detected an acceptable version
	// embed the Flash Content SWF when all tests are passed
	AC_FL_RunContent(
			"src", "telefono",
			"width", "250",
			"height", "350",
			"align", "middle",
			"id", "telefono",
			"wmode", "transparent",
			"quality", "high",
			"name", "telefono",
			"allowScriptAccess","sameDomain",
			"type", "application/x-shockwave-flash",
			"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
  } else {  // flash is too old or we can't detect the plugin
    var alternateContent = 'Alternate HTML content should be placed here. '
  	+ 'This content requires the Adobe Flash Player. '
   	+ '<a href=http://www.adobe.com/go/getflash/>Get Flash</a>';
    document.write(alternateContent);  // insert non-flash content
  }
// -->
</script>
<noscript>
  	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
			id="red5phone" width="250" height="350"
			codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
			<param name="movie" value="telefono.swf" />
			<param name="quality" value="high" />
			<param name="allowScriptAccess" value="sameDomain" />
			<param name=wmode value=transparent />
			<embed src="telefono.swf" quality="high" width="250" height="350" name="telefono" align="middle"
				play="true"
				loop="false"
				quality="high"
				allowScriptAccess="sameDomain"
				type="application/x-shockwave-flash"
				pluginspage="http://www.adobe.com/go/getflashplayer">
			</embed>
	</object>
</noscript>
		    
<a href="#" onClick="javascript:window.location='cerrar.php?cierro=<?=$login?>';" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Imagen15','','../images/cerrar_up.png',1)">
		<img src="../images/cerrar.png" name="Imagen15"  border="0"></a>
</center>		    <!--CLICK2CALL-->

<?}else{?>
<br><br><br>
			<span class="arial_24_red"> Su Sesión ha Expirado </span><br><br><br>

			<a href="#" onClick="javascript:window.close();" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Imagen15','','../images/reingrese_up.png',1)">
		<img src="../images/reingrese.png" name="Imagen15"  border="0"></a>
<?}?>
</td>
	</tr>
	<tr>
		<td>

		</td>
	</tr>
</table>

</div>

</body>

</html>

