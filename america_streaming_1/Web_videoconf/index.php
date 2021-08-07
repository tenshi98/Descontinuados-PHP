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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "main.php";
$location2 = "index.php";
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                               Se cargan los formularios                                                        */
/**********************************************************************************************************************************/
//formulario para iniciar sesion
if ( !empty($_POST['submit_login']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_login.php';
}
//formulario para recuperar contraseña
if ( !empty($_POST['submit_pass']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_mail/clientes_getpass.php';
}
//formulario para registrar usuario
if ( !empty($_POST['submit_register']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_3.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_listado.php';
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Registro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>
		<div class="register-container container">
            <div class="row">
                <div class="iphone span5">
                    <img src="assets/img/iphone.png" alt="">
                </div>
                <div class="register span6">
<?php if (!empty($_GET['block'])) {?>
                    <h2>Mensaje</h2>
                    <p>Lo sentimos, pero tu usuario actualmente se encuentra bloqueado, contacta con el administrador para mas informacion</p>
                    <a class="boton" href="index.php">Volver</a>
                    <div class="clearfix"></div>

<?php }elseif (!empty($_GET['recover'])) {?>
                    <h2>Mensaje</h2>
                    <p>La nueva contraseña ha sido enviada a tu correo</p>
                    <a class="boton" href="index.php">Volver</a>
                    <div class="clearfix"></div>
              
<?php }elseif (!empty($_GET['login'])) {?>
		
                    <form action="" method="post">
                        <h2>Iniciar Sesion</h2>
                        
                        <label for="username">Nombre de usuario<?php  if (isset($errors[1])) {echo $errors[1];}?></label>
                        <input type="text" id="usuario" name="usuario" placeholder="Ingrese su nombre de usuario">
                        
                        
                        <label for="password">Password<?php  if (isset($errors[2])) {echo $errors[2];}?></label>
                        <input type="password" id="password" name="password" placeholder="Ingrese su password">
                        
                        <input type="submit" value="Ingresar" name="submit_login" >
                        <a class="boton" href="index.php">Volver</a>
                        <div class="clearfix"></div>
                    </form>
                
<?php }elseif(!empty($_GET['pass'])){?> 

                    <form action="" method="post">
                        <h2>Ingresa tu correo</h2>
                        
                        <label for="email">Email<?php  if (isset($errors[1])) {echo $errors[1];}?></label>
                        <input type="text" id="email" name="email" placeholder="Ingrese su email">
                        
                        <input type="submit" value="Recuperar" name="submit_pass" >
                        <a class="boton" href="index.php">Volver</a>
                        <div class="clearfix"></div>
                    </form>
                
<?php }else{ ?>  
                    <form method="post">
                        <h2>Registrate o <span class="red"><strong><a href="index.php?login=true">Accede Aqui</a></strong></span></h2>
                        <label for="firstname">Nombres<?php  if (isset($errors[1])) {echo $errors[1];}?></label>
                        <input type="text" id="Nombres" name="Nombres" placeholder="Ingrese sus nombres">
                        
                        <label for="lastname">Apellidos<?php  if (isset($errors[2])) {echo $errors[2];}?></label>
                        <input type="text" id="Apellidos" name="Apellidos" placeholder="Ingrese sus apellidos">
                        
                        <label for="email">Email<?php  if (isset($errors[3])) {echo $errors[3];}?></label>
                        <input type="text" id="email" name="email" placeholder="Ingrese su email">
                        
                        <label for="username">Nombre de usuario<?php  if (isset($errors[4])) {echo $errors[4];}?></label>
                        <input type="text" id="usuario" name="usuario" placeholder="Ingrese su nombre de usuario">
                        
                        
                        <label for="password">Password<?php  if (isset($errors[5])) {echo $errors[5];}?></label>
                        <input type="password" id="password" name="password" placeholder="Ingrese su password">
                        
                        <input type="hidden" value="1" name="Estado">
                        <input type="hidden" value="1" name="Tipo">
                        <input type="hidden" name="fcreacion" value="<?php echo date("Y-m-d"); ?>">
                        <input type="submit" value="Registrarse" name="submit_register" >
                        <a class="boton" href="index.php?pass=true">Recuperar password</a>
                        <div class="clearfix"></div>
                    </form>
                
<?php } ?> 
				</div>
            </div>
        </div>  

        

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>