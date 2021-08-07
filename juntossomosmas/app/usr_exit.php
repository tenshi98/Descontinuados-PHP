<?php session_start();
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
//capturo la identificacion del equipo
if(isset($_GET['id']))  		$id_gcm = $_GET['id'];
$sql_id = "select login,direccion_img from ejecutivos where gcmcode='".$id_gcm."'";
$result_id = mysql_query($sql_id, $dbConn);
//se verifica que el equipo sea el mismo que con el que se ingreso la ultima vez
$revision = mysql_num_rows($result_id);
if($revision == 0){
	header( "Location: login.php?id=".$_GET['id']."&longitud=".$_GET['longitud']."&latitud=".$_GET['latitud'] );
	die;
} else {
	while($registro_id=mysql_fetch_array($result_id)) { 
	$login=$registro_id["login"];
	$img=$registro_id["direccion_img"];
	}
}
/**********************************************************************************************************************************/
/*                                                 Ejecucion del formulario                                                       */
/**********************************************************************************************************************************/
// Se elimina el id de la base de datos
if ( !empty($_POST['submit_exit']) ) {
	
	// definimos las variables
	if ( !empty($_POST['login']) ) 	  $login 	        = $_POST['login'];
	
	// completamos la variable error si es necesario
	if ( empty($login) )    	$error['login'] 	  = '<p>El login va vacio</p>';
	
	// si no hay errores registramos los datos
	if ( empty($error) ) {
		
		// inserto los datos de registro en la db
		$busqueda= $busco_a + $busco_b;
		$query  = "UPDATE ejecutivos SET 
		gcmcode             = '0'
		WHERE login     = '$login'";
		$result = mysql_query($query, $dbConn);
		
		header( "Location: login.php?id=".$_GET['id'] );
		die;
		
	}
		
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Salida del usuario</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="roulette_box">
    <div class="llamada_txt">
    	<p>Desea Cerrar Sesion.</p>
    </div>
    <div class="perfil_img_box">
    <?php if($img!=""){?>
        <img src="<?php echo $img; ?>"  />
    <?php }else{?>
         <img src="images/usr.png" />
    <?php }?>
    </div>
    <div>
    <form method="POST" >
        <input type="hidden" name="login"  value="<?php echo $login; ?>" />
        <input type="submit" name="submit_exit" value="Salir" id="post_button"/>
	</form>
    </div>
</div>
</body>
</html>