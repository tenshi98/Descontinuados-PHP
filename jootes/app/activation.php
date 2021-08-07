<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once 'url.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
$location = "login.php".$w;
$location2 = "mensajes.php".$w;
//formulario para crear usuario
if ( !empty($_POST['submit']) )  {
	
	//se crean las variables
	if ( !empty($_POST['codigo_sms']) )        $codigo_sms          = $_POST['codigo_sms'];
	
	// se realizan las verificaciones
	//traigo los datos almacenados
	$query = "select codigo_sms from ejecutivos where login='".$_GET['login']."'";
	$resultado = mysql_query ($query, $dbConn);
	$rowusr = mysql_fetch_assoc ($resultado);
	
	//Verificaciones generales
	if(!isset($_GET['login'])&&$_GET['login']==''){
		header( 'Location: '.$location.'&login=true' );
		die;	
	}
	if(isset($codigo_sms)){
		if($rowusr['codigo_sms']!=$codigo_sms){
			$errors[1] 	  = '<div class="alert-error" >El codigo SMS ingresado no coincide con el SMS enviado</div>';
		}	
	}	
	if ( empty($codigo_sms) )        $errors[2] 	  = '<div class="alert-error" >No ha ingresado el codigo SMS</div>';

	//si no hay errores ejecuto la consulta
	if ( !isset($errors[1]) && !isset($errors[2])   ) {

		//actualizo la identificacion del celu en la tabla de ejecutivos
		$sql = "UPDATE ejecutivos
		SET estado_usr='1'
		WHERE login='".$_GET['login']."'";
		$resultado2 = mysql_query($sql,$dbConn);
		
		header( 'Location: '.$location2 );
		die;
		}

}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crear usuario</title>
<link href="css/reset.css"  rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="height100 widht100">
    <div class="widht80 fcenter perfil">
		<?php  if (isset($errors[1])) {echo $errors[1];}?>
        <?php  if (isset($errors[2])) {echo $errors[2];}?>
           
        <h1>Activar usuario</h1>
        <form method="post">
<table class="table_msg">
        
<tr><td><label>Ingrese el codigo recibido por el SMS</label></td></tr>
<tr><td><input type="text" name="codigo_sms"  placeholder="Codigo SMS"  autocomplete="off" <?php  if (isset($codigo_sms)) {echo 'value="'.$codigo_sms.'"';}?> ></td></tr>
          
</table>
<input name="submit" type="submit" value="Activar Usuario" id="post_button" />
<a href="<?php echo $location; ?>"><input type="button" value="Volver" id="post_button" /></a>
</form>
    </div>
</div>
</body>
</html>