<?php
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config2.php';

require("../conexion.php");
require("../nombre_pag.php");
//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];

if ( !empty($_POST['rutpersona']) )  {
list($uno, $dos) = split('-', $_POST['rutpersona']);
$sql ="SELECT REGION,NOMBRE,DOMICILIO,Comuna,fono_celular,domicilio_2,comuna_2,region_2,tipo_domicilio2,correo,rut_compara FROM padron_electoral_CL WHERE rut_compara='" . $uno.$dos . "'";


	$res=mysql_query($sql,$base_padron); 
	$numeroRegistros=mysql_num_rows($res); 
	if ($numeroRegistros==1)  {
	//echo $sql."<br>".$numeroRegistros;	
	?>


	<form name="formulario" method="post" action="http://<?php echo $nombreurl.'/app/crea_usuario.php?longitud='.$_GET["longitud"].'&latitud='.$_GET["latitud"].'&imei='.$_GET["imei"].'&id='.$_GET["id"].'&dispositivo='.$_GET["dispositivo"]?>">

	<?php $rowusr = mysql_fetch_assoc ($res); ?>
    
		<input type="hidden" name="rut" value="<?php echo $_POST['rutpersona']?>">
		<input type="hidden" name="rut_compara" value="<?php echo $uno.$dos?>">
		<input type="hidden" name="nom_ejecutiv" value="<?php echo $rowusr['NOMBRE']?>">
		<input type="hidden" name="fono_ejecutiv" value="<?php echo $rowusr['fono_celular']?>">

		<?php if ($rowusr['region_2']!="") {?>
			<input type="hidden" name="region" value="<?php echo $rowusr['region_2']?>">
		<?php }else{?>
			<input type="hidden" name="region" value="<?php echo $rowusr['REGION']?>">
		<?php }?>

		<?php if ($rowusr['comuna_2']!="") {?>
			<input type="hidden" name="comuna" value="<?php echo $rowusr['comuna_2']?>">
		<?php }else{?>
			<input type="hidden" name="comuna" value="<?php echo $rowusr['Comuna']?>">
		<?php }?>

		<?php if ($rowusr['domicilio_2']!="") {?>
			<input type="hidden" name="dir_ejecutiv" value="<?php echo $rowusr['domicilio_2']?>">
		<?php }else{?>
			<input type="hidden" name="dir_ejecutiv" value="<?php echo $rowusr['DOMICILIO']?>">
		<?php }?>
		<input type="hidden" name="login" value="<?php echo $rowusr['correo']?>">

	</form>
	<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
	</script>

<?php } else{
}?>
	<form name="formulario2" method="post" action="http://<?php echo $nombreurl.'/app/crea_usuario2.php?longitud='.$_GET["longitud"].'&latitud='.$_GET["latitud"].'&imei='.$_GET["imei"].'&id='.$_GET["id"].'&dispositivo='.$_GET["dispositivo"]?>">

		<input type="hidden" name="rut" value="<?php echo $_POST['rutpersona']?>">
		<input type="hidden" name="rut_compara" value="">
		<input type="hidden" name="nom_ejecutiv" value="">
		<input type="hidden" name="fono_ejecutiv" value="">
		<input type="hidden" name="comuna" value="">
		<input type="hidden" name="dir_ejecutiv" value="">
		<input type="hidden" name="region" value="">
	</form>
	<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario2.submit();
	</script>
<?php }

//formulario para iniciar sesion por iphone
if ( !empty($_POST['submit_iphone']) )  {

	//Se traspasan los datos a variables
	if ( !empty($_POST['email']) )    $email       = $_POST['email'];
	if ( !empty($_POST['pass']) )     $pass        = $_POST['pass'];
	if ( !empty($_POST['imei']) )     $imei        = $_POST['imei'];
	

	//Se revisa que las variables no esten vacias
	if ( empty($email) )     $errors[1] 	  = '<div class="alert-error" >No ha ingresado el email</div>';
	if ( empty($pass) )      $errors[2] 	  = '<div class="alert-error" >No ha ingresado la contraseña</div>';

	//Si no hay errores se ejecuta
	if ( !isset($errors[1]) && !isset($errors[2])    ) {
		
		//actualizar los datos del ejecutivo

		
		//Se realiza la consulta
   
			$sql_email = mysql_query("SELECT imei FROM ejecutivos WHERE imei='".$imei."'");
			$n_email = mysql_num_rows($sql_email);

		$datestamp    = $stime=date("Ymd");
		$fecha_ing=$datestamp;
		//Si el usuario existe redirijo
		if($n_email == 0)  {
			$query  = "insert into  `ejecutivos` (imei,login,pass,dispositivo,publicidad,estado_usr,grupo,fecha_ingreso) value ('".$imei."' ,'".$email."' ,'".$pass."','iphone','SI','1','sosamerica','".$fecha_ing."')";
			$result = mysql_query($query, $dbConn);
		}
			$location = "gracias_cel_01.php?id=".$_GET['id']."&latitud=".$_GET['latitud']."&longitud=".$_GET['longitud']."&imei=".$_GET['imei']."&dispositivo=".$_GET["dispositivo"];
			header( 'Location: '.$location );
			die;

	}


}
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SosClick</title>
<link rel="icon" href="http://<?php echo $nombreurl?>/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="../scripts/FuncJScript.js"></script>

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script src="../scripts/jquery.alerts.js" type="text/javascript"></script>
    <link href="../scripts/jquery.alerts.css" rel="stylesheet" type="text/css" />   
	<script src="//http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  

<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function validaRut() {
	var x=document.forms["form1"]["rutpersona"].value
	if (x==null || x=="") {
		//alert("El Rut NO puede estar en blanco");
		jAlert("El Rut NO puede estar en blanco", "Error");
		form1.rutpersona.focus();	
		return false;
	} 
    if (x.length < 3) {
		// alert("Rut ingresado NO es v\xE1lido");
		 jAlert("Rut ingresado NO es v\xE1lido", "Error");
		form1.rutpersona.focus();	
	    return false;
	}

	var suma=0;
	var arrRut = x.split("-");
	var rutSolo = arrRut[0];
	var verif = arrRut[1];
	var continuar = true;
	for(i=2;continuar;i++){
	  suma += (rutSolo%10)*i;
	  rutSolo = parseInt((rutSolo /10));
	  i=(i==7)?1:i;
	  continuar = (rutSolo == 0)?false:true;
	}
	resto = suma%11;
	dv = 11-resto;
	if(dv==10){
	if(verif.toUpperCase() == 'K')
	   return true;
	}
	else if (dv == 11 && verif == 0)
	  return true;
	else if (dv == verif)
	  return true;
	else
	  alert("El valor ingresado NO es un Rut v\xE1lido");
	  //jAlert("El valor ingresado NO es un Rut v\xE1lido", "Error");
	  form1.rutpersona.focus();	
	  return false;
	}
</script>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Registrese con Facebook, necesitar&aacute; completar datos importantes. ';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '801046543274260',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.1
  });
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
     // document.getElementById('status').innerHTML ='Thanks for logging in, ' + response.name + '!';

var str = response.name;
var nombre = str.replace(/ /gi, "0j0");
var n = JSON.stringify(response).search("location");
if (n<1) {
	ciudad="";
}else{
	var str = response.location.name;
	var ciudad = str.replace(/,/gi, "0coma0");
	var str = ciudad;
	var ciudad = str.replace(/ /gi, "0j0");
}

var ide="<?php echo $_GET['id']?>";
var disp="<?php echo $_GET['dispositivo']?>";
var str = "<?php echo $_GET['longitud']?>";
var longi = str.replace(/,/gi, "0coma0");
var str = "<?php echo $_GET['latitud']?>";
var lati = str.replace(/,/gi, "0coma0");

window.location="http://sosamerica.sosclick.cl/app/resultado.php?nombre="+nombre+"&email="+response.email+"&gender="+response.gender+"&birthday="+response.birthday+"&ciudad="+ciudad+"&uid="+response.id+"&longitud="+longi+"&latitud="+lati+"&imei="+<?php echo $_GET['imei']?>+"&id="+ide+"&dispositivo="+disp+"";  
    });

FB.api('/me', function(response) {
    console.log(" ESTO SON LOS DATOS"+JSON.stringify(response));
});

  }
</script>

</head>

<body>
<div class="height100 widht100">
    <div class="widht80 fcenter perfil">
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>  
<?php  if (isset($errors[3])) {echo $errors[3];}?>       

<?php if ($_GET["dispositivo"]=="android") {
	
	
	//onSubmit="return validaRut()"?>
<h1>Crear usuario</h1>
<table width="100%" border="0" height="80%" cellspacing="0" cellpadding="0"  valign="middle"  class="table_msg">
    <tr>
        <td width="64%" height="49%"  align="center" >
            <form name="form1" method="post"  >
                <table border="0" cellspacing="0" cellpadding="0" style="width:100%">
                    <tr>
                    	<td height="25"  class="Arial4" align="center">Ingrese el n&uacute;mero de su DNI</td>
                    </tr>
                    <tr><td width="20">&nbsp;</td></tr>
                    <tr><td align="center"><label>N&deg; DNI (Ej: 12345678)</label></td> </tr>
                    <tr>
                        <td height="25">
                        	<input name="rutpersona" type="text"  id="rutpersona" size="50" maxlength="8"  placeholder="Ej: 12345678" style="width:100% !important;"/>
                        </td>
                    </tr>
                    <tr><td width="20">&nbsp;</td></tr>
                    <tr><td width="20">&nbsp;</td></tr>
                    <tr><td><input name="submit" type="submit" value="Continuar" id="post_button" /></td></tr>
                </table>
            </form>
        </td>
    </tr>
</table>
 
<table width="100%" border="0" height="80%" cellspacing="0" cellpadding="0"  valign="middle"  class="table_msg">
    <tr>
        <td width="64%" height="49%"  align="center" >
            <br><br>
            <div style="position:relative;width:216px;height:72px;" >
                <div style="position:absolute;left:0px;top:0px;width:216px;height:72px;z-index:111;">
                    <img src="../images/login_with_facebook.png" style="cursor:pointer" />
                </div>
                <div style="position:absolute;left:0px;top:0px;width:216px;height:72px;overflow:hidden;z-index:333;opacity:0;filter:alpha(opacity=0);">
                    <fb:login-button show-faces="true" scope="public_profile,email" onlogin="checkLoginState();" width="216">
                    --------------------------------------------------------------------------------------------------------------------------------------
                    </fb:login-button>
                </div>
            </div>
            <!--fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
            </fb:login-button-->
            <div id="status"></div>
        </td>
    </tr>
</table>       
<?php }elseif ($_GET["dispositivo"]=="iphone") { ?>
 <h1>Iniciar Sesion</h1>
<table width="100%" border="0" height="80%" cellspacing="0" cellpadding="0"  valign="middle"  class="table_msg">
    <tr>
        <td width="64%" height="49%"  align="center" >
            <form name="form1" method="post" onSubmit="return validaRut()" >
                <table border="0" cellspacing="0" cellpadding="0" style="width:100%">
                    <tr>
                    	<td height="25"  class="Arial4" align="center">Registre su login</td>
                    </tr>
                    <tr>
                        <td height="25">
                        	<input name="email" type="text"  id="email" value=""  placeholder="Ingrese su login" style="width:100% !important;"/>
                        </td>
                    </tr>
                    <tr>
                    	<td height="25"  class="Arial4" align="center">Registre su contraseña</td>
                    </tr>
                    <tr>
                        <td height="25">
                        	<input name="pass" type="password"  id="pass" value=""  placeholder="Ingrese su contraseña" style="width:100% !important;"/>
                        </td>
                    </tr>
                    <tr><td width="20">&nbsp;</td></tr>
                    <tr><td width="20">&nbsp;</td></tr>
                    <input name="imei" type="hidden"  id="imei" value="<?php echo $_GET["imei"]; ?>"/>
                    <tr><td><input name="submit_iphone" type="submit" value="Continuar" id="post_button" /></td></tr>
                </table>
            </form>
        </td>
    </tr>
</table>

	
<?php } ?>
</div></div>





</body>
</html>

