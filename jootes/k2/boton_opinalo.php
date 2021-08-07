<?php
session_start();
require_once('../nombre_pag.php');
require_once('../conexion_as.php');
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




</head>


<body >
<div align="center">

<table border="0" width="250" id="table1"  height="350" cellspacing="0" cellpadding="0">
	<tr>
		<td width="250" height="350">

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
		"width", "220",
		"height", "275",
		"align", "top",
		"id", "boton_opinalo",
		"wmode", "transparent",		
		"quality", "high",
		"name", "boton_opinalo",
		"allowScriptAccess","sameDomain",
		"type", "application/x-shockwave-flash",
		"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
} else if (hasRequestedVersion) {
	// if we've detected an acceptable version
	// embed the Flash Content SWF when all tests are passed
	AC_FL_RunContent(
			"src", "boton_opinalo",
			"width", "220",
			"height", "275",
			"align", "middle",
			"id", "boton_opinalo",
			"wmode", "transparent",
			"quality", "high",
			"name", "boton_opinalo",
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
			id="red5phone" width="220" height="275"
			codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
			<param name="movie" value="boton_opinalo.swf" />
			<param name="quality" value="high" />
			<param name="allowScriptAccess" value="sameDomain" />
			<param name=wmode value=transparent />
			<embed src="boton_opinalo.swf" quality="high" width="220" height="275" name="boton_opinalo" align="middle"
				play="true"
				loop="false"
				quality="high"
				allowScriptAccess="sameDomain"
				type="application/x-shockwave-flash"
				pluginspage="http://www.adobe.com/go/getflashplayer">
			</embed>
	</object>
</noscript>
		    
<a href="#" onclick="window.parent.Shadowbox.close();" ><IMG alt="Cerrar Pagina" src="http://<?=$nombreurl?>/images/cerrar_ventana.png" border=0></a>
</center>		    <!--CLICK2CALL-->


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

