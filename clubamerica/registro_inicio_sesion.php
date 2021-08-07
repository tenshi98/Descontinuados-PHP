
<?php
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
/**********************************************************************************************************************************/
/*                                        Se filtran las entradas para evitar ataques                                             */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                 Realizo la validacion del equipo con el cual se ingresa                                        */
/**********************************************************************************************************************************/


if($_POST['INGRESAR']){

	$url = "http://peruid.pe/index.php/service/connect_rest/session";
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$params = array('portal'=>'9702824bf1059d44f8a879e070b5b57c','usuario'=>$usuario,'password'=>$password, 'format'=>'json');
		
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
	$response = curl_exec($ch);
	curl_close ($ch);

	$result = json_decode($response,true);
        if($result['session'] == 1){
            setcookie("sess_demo", serialize($result['user']), time() + 10200, '/');
            setcookie("sess_demo_name", $result['user']['nombres'], time() + 7200, '/');
			setcookie("sess_demo_correo", $result['user']['correo'], time() + 7200, '/');
			setcookie("sess_demo_apellidos", $result['user']['apellidos'], time() + 7200, '/');
			setcookie("sess_demo_avatar", $result['user']['avatar'], time() + 7200, '/');
			setcookie("sess_demo_nickname", $result['user']['nickname'], time() + 7200, '/');
			setcookie("sess_demo_pais", $result['user']['pais'], time() + 7200, '/');
            setcookie("pid_token", $result['token'], time() + 7200, '/');
        }else{
            setcookie("sess_demo", '', time() - 10200, '/');
           echo "usuario invalido"; 
        }

		header( 'Location: '.$_GET["contacto"].'.php' );
		die;
	

}else{

	if(isset($_COOKIE['pid_token'])){
		$url = "http://peruid.pe/index.php/service/auth_rest/token";
		$params = array('key'=>$_COOKIE['pid_token'], 'portal'=>'9702824bf1059d44f8a879e070b5b57c', 'format'=>'json');
			
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                
		$response = curl_exec($ch);
		curl_close ($ch);

		$result = json_decode($response,true);
                setcookie("pid_token", $result['token'], time() + 7200, '/');
		//print_r($result);
	}

	

}



/* script pra ejecutar logout*/

if($_GET['logout']== true){
		$url = "http://peruid.pe/index.php/service/logout_rest/close";
		$params = array('key'=>$_COOKIE['pid_token'], 'portal'=>'9702824bf1059d44f8a879e070b5b57c', 'format'=>'json');
			
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                
		$response = curl_exec($ch);
		curl_close ($ch);

		$result = json_decode($response, true);
                
                setcookie("sess_demo", '', time() - 10200, '/');
                setcookie("sess_demo_name", '', time() - 10200, '/');
                setcookie("pid_token", '', time() - 10200, '/');
		print_r($result);

header( 'Location: index.php' );
		die;

	}


?>

<!doctype html>
<!--[if lt IE 7] <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]--><!--[if IE 7] <html class="no-js lt-ie9 lt-ie8"> <![endif]--><!--[if IE 8] <html class="no-js lt-ie9"> <![endif]--><!--[if gt IE 8]><!-->
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="es">
<!--<![endif]-->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Club America</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/mediaquerie.css" rel="stylesheet" type="text/css">
<link href="css/normalize.css" rel="stylesheet" type="text/css">
<link href="css/registro.css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="js/modernizr-1.7.min.js"></script>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--  PLUGIN PERUID  -->
<script type="text/javascript" src="http://peruid.pe/f/scripts/peruid-1.1.js"></script>
<script type="text/javascript" src="/scripts/peruid.pid-2.0.js"></script>
<script type="text/javascript">
var tag_last = 0;

var site;
(document).ready(function(){
    /*------------PUGLIN PERUID----------*/
    site = new Site({
        ecoid_path:{
        base:'http://peruid.pe/',
        receiver:'http://pruebas.naturalphone.cl/receiver.php',
        portal:'9702824bf1059d44f8a879e070b5b57c',
        proxy:'http://pruebas.naturalphone.cl/proxy_peruid.html'
        }
    });
    /*-------FIN PUGLIN PERUID-----------*/
});

</script>
</head>

<body>

<section class="wrapper row-fluid">
  <div class="cont_wrapper">
  		<div class="cont_registro">
        	<div class="header_registro">
            	<a href=""><img src="img/logo_ca.png"/></a>
            </div>
            <div class="body_registro">
            		<div class="suscrib">
                    	<h3>Suscríbete utilizando tu cuenta de:</h3>
                        <ul>
                        	<li><a href=""></a></li>
                        	<li class="tw_r"><a href=""></a></li>
                        	<li class="gplus_r marg_r0"><a href=""></a></li>
                        </ul>
                       <h3>o con tu dirección de e-mail</h3>
                       <form  method="POST">
                       		<div class="cont_form">
                            	<div class="item_form">
                                	<input name="usuario" type="text" placeholder="Usuario o correo electrónico" id="usuario">
                                   
                                </div>
                               
                              <div class="item_form">
                                	<input name="password" type="password" placeholder="Contraseña" id="password">
                                </div>
                               
                               
                                <div class="cont_btn_r">
                                	<input name="INGRESAR" type="submit" value="INGRESAR" id="INGRESAR">
                                </div>   
                                <div class="mensaje_club ">
                               	¿Aún no eres parte del club? <a href="">Regístrate</a>
                                <h4><a href="">Olvidé mi contraseña</a></h4>
                                </div>           
                                          
                        
                        	<div class="term_cond">
                               	Al registrarte, aceptarás sus <a href="#">Términos y Condiciones</a> y la <a href="#">Política de Privacidad</a></div>                      
                        
                         </div>
                       </form> 
                    </div>
            </div>
        </div>
  </div>
</section>
</body>
</html>