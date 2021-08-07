<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
// obtengo puntero de conexion con la db
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                      Se filtran las entradas para evitar ataques                                               */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                          Se cargan los datos basicos de la empresa desde la base de datos                                      */
/**********************************************************************************************************************************/
// Se traen todos los datos de la empresa
$query = "SELECT Nombre, Nombre_sist, Nombre_slogan, Nombre_sist_slogan, Fono, Fono_anexo, Fono_password, Estado_chat, email_principal
FROM `core_datos`
WHERE id_Datos = '1'";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
// Se cuentan la cantidad de ejecutivos con la sesion activa
$arrUsers = array();
$query = "SELECT idUsuario
FROM `usuarios_listado`
WHERE videochat=1 AND idvideochat!=''";
$resultado = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($resultado);
/**********************************************************************************************************************************/
/*                                               Se cargan los formularios                                                        */
/**********************************************************************************************************************************/
//formulario para recuperar contraseña
if ( !empty($_POST['submit']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/boton_c2c.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/boton_c2c.php';
	//require_once '../AA2D2CFFDJFDJX1/xrxs_mail/boton_c2c.php';
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $rowdata['Nombre_sist']; ?></title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/AC_RunActiveContent.js" type="text/javascript"></script>

<script language="JavaScript" type="text/javascript">
// Verificacion de la version de flash
// Major version of Flash required
var requiredMajorVersion = 9;
// Minor version of Flash required
var requiredMinorVersion = 0;
// Minor version of Flash required
var requiredRevision = 28;
</script>


<script type="text/javascript">
function red5phone_getConfig() {
	var username = getPageParameter('username', '<?php echo $rowdata['Fono_anexo']."-".$rowdata['Fono']; ?>');
	var password = getPageParameter('password', '<?php echo $rowdata['Fono_password']; ?>');
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

function refresh() { 
    window.location.reload(); 
} 

function corta(){
	/*
	var segundos='';
	var numproc='';
	var estado1 = ''; 
	var url="http:///inter/gracias.php?estado=" +  estado1 + "&numproc=" + numproc;
	var winstyle="_self";
	window.open(url,winstyle);
	*/
}
</script>

</head>

<body>
<div class="content">
	<div class="head">
        <div class="fleft widht40">
            <p class="left_text"><?php echo $rowdata['Nombre_sist']; ?><br />
            	<span><?php if ($rowdata['Nombre_sist_slogan']!=''){echo $rowdata['Nombre_sist_slogan'];} else{ echo 'Incrementa tus ventas!';} ?></span>
            </p>
        </div>
        <div class="fright widht40">
            <p class="right_text"><?php echo $rowdata['Nombre']; ?><br />
                <span><?php if ($rowdata['Nombre_slogan']!=''){echo $rowdata['Nombre_slogan'];} else{ echo 'Módulo de Atención';} ?></span>
            </p>
        </div>
        <div class="clear"></div>
    </div>
    <div class="body">
    <table>
  <tr>
    <td colspan="2">
        <div class="llamadas">
        
        	<div class="redphone">
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
		"width", "370",
		"height", "200",
		"align", "middle",
		"id", "red5phone",
		"wmode", "transparent",		
		"quality", "high",
		"name", "red5phone",
		"allowScriptAccess","sameDomain",
		"type", "application/x-shockwave-flash",
		"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
} else { if (hasRequestedVersion) {
	// if we've detected an acceptable version
	// embed the Flash Content SWF when all tests are passed
	AC_FL_RunContent(
			"src", "red5phone",
			"width", "370",
			"height", "200",
			"align", "middle",
			"id", "red5phone",
			"wmode", "transparent",
			"quality", "high",
			"name", "red5phone",
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
}
// -->
</script>
<noscript>
  	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
			id="red5phone" width="370" height="200"
			codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
			<param name="movie" value="red5phone.swf" />
			<param name="quality" value="high" />
			<param name="allowScriptAccess" value="sameDomain" />
			<param name=wmode value=transparent />
			<embed src="red5phone.swf" quality="high" width="370" height="200" name="red5phone" align="middle"
				play="true"
				loop="false"
				quality="high"
				allowScriptAccess="sameDomain"
				type="application/x-shockwave-flash"
				pluginspage="http://www.adobe.com/go/getflashplayer">
			</embed>
	</object>
</noscript>
			</div>
        </div>
    </td>
  </tr>
  <?php if($rowdata['Estado_chat']==1&&$cuenta_registros!=0){?>
  
  <?php } else {?>
  <tr>
    <td colspan="2">
    	<p class="video_tittle_off">Video Conferencia Inactiva<br /><span>Déjenos un mensaje por escrito y le contactaremos</span></p><br /><br />
        <?php  if (isset($errors[1])) {echo $errors[1];}?>
		<?php  if (isset($errors[2])) {echo $errors[2];}?>
        <?php  if (isset($errors[3])) {echo $errors[3];}?>
        <?php  if (isset($errors[4])) {echo $errors[4];}?>
<?php  if (isset($_GET['send'])) {?>
<div id="txf_05" class="alert_sucess">  
	Mensaje enviado correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
		x
	</a>
</div>   
<?php }?>        
    </td>
  </tr>
  <form method="post">
  <tr>
    <td><input name="nombre" placeholder="Nombre" type="text" /></td>
    <td rowspan="4"><textarea  name="mensaje" placeholder="Mensaje" ></textarea></td>
  </tr>
  <tr>
    <td><input name="mail" placeholder="Correo" type="text" /></td>
  </tr>
  <tr>
    <td><input name="telefono" type="text" placeholder="Tel&eacute;fono (Opcional)" /></td>
  </tr>
  <tr>
    <td><input name="asunto" type="text" placeholder="Asunto"  /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
        <div class="fright">
            <input name="button2" type="submit"  id="button2" value="Limpiar" />
            <input name="submit" type="submit"  id="button" value="Enviar" />
        </div>
    </td>
  </tr>
  </form>
  <?php }?>
</table>


    </div>
</div>
</body>
</html>