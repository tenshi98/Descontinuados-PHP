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
//formulario para crear usuario
if ( !empty($_POST['submit']) )  {
	
	//se crean las variables
	if ( !empty($_POST['nom_ejecutiv']) )       $nom_ejecutiv         = $_POST['nom_ejecutiv'];
	if ( !empty($_POST['fono_ejecutiv']) )      $fono_ejecutiv        = $_POST['fono_ejecutiv'];
	if ( !empty($_POST['ciudad_ejecutiv']) )    $ciudad_ejecutiv      = $_POST['ciudad_ejecutiv'];
	if ( !empty($_POST['fnac_dia']) )           $fnac_dia             = $_POST['fnac_dia'];
	if ( !empty($_POST['fnac_mes']) )           $fnac_mes             = $_POST['fnac_mes'];
	if ( !empty($_POST['fnac_ano']) )           $fnac_ano             = $_POST['fnac_ano'];
	if ( !empty($_POST['login']) )              $login                = $_POST['login'];
	if ( !empty($_POST['re-login']) )           $re_login             = $_POST['re-login'];
	if ( !empty($_POST['pass']) )               $pass                 = $_POST['pass'];
	if ( !empty($_POST['re-pass']) )            $re_pass              = $_POST['re-pass'];
	if ( !empty($_POST['soy']) ) 	            $soy 	              = $_POST['soy'];
		
	// se verifica si el usuario ya existe
	$sql_usuario = mysql_query("SELECT nom_ejecutiv FROM ejecutivos WHERE nom_ejecutiv='".$nom_ejecutiv."'", $dbConn); 
	// se verifica si el correo ya existe
	$sql_login = mysql_query("SELECT login FROM ejecutivos WHERE login='".$login."'", $dbConn);
	// se verifica si el numero ya existe
	$sql_fono = mysql_query("SELECT fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='".$fono_ejecutiv."'", $dbConn);
	// completamos la variable error si es necesario
	if(mysql_num_rows($sql_usuario) > 0) $errors[1]  = '<div class="alert-error" >Ya existe un usuario con el mismo nick</div>';
	if(mysql_num_rows($sql_login) > 0)   $errors[2]  = '<div class="alert-error" >El email ya esta en uso</div>';
	if(mysql_num_rows($sql_fono) > 0)    $errors[3]  = '<div class="alert-error" >El numero telefonico ya esta en uso</div>';
	if ( $login != $re_login )           $errors[4]  = '<div class="alert-error" >Los correos ingresados no coinciden</div>';
	if ( $pass != $re_pass )             $errors[5]  = '<div class="alert-error" >Las contraseñas no coinciden</div>';
	//valida si el fono es un numero y si tiene el largo requerido
	if(isset($fono_ejecutiv)){
		if (validarnumero($fono_ejecutiv)) {   
			$errors[6]	    = '<div class="alert-error" >Ingrese un numero telefonico valido</div>'; 
		}
		if (strlen($fono_ejecutiv) < 8) { 
   			$errors[7]	    = '<div class="alert-error" >El numero telefonico debe tener al menos 8 digitos</div>';
		}
		if (strlen($fono_ejecutiv) > 8) { 
   			$errors[8]	    = '<div class="alert-error" >El numero telefonico debe tener no mas de 8 digitos</div>';
		}  
	}
	//Verifica si la fecha ingresada tiene el formato fecha
	if(isset($login)){
		if(validaremail($login)){ }else{ 
   			$errors[9]	    = '<div class="alert-error" >Ingrese un correo valido</div>'; 
		}
	}
	//Verifica si la fecha ingresada tiene el formato fecha
	if(isset($re_login)){
		if(validaremail($re_login)){ }else{ 
   			$errors[10]	    = '<div class="alert-error" >Ingrese un correo valido</div>'; 
		}
	}

	if ( empty($nom_ejecutiv) )       $errors[11] 	  = '<div class="alert-error" >No ha ingresado su nick</div>';
	if ( empty($soy) )            	  $errors[12] 	  = '<div class="alert-error" >No ha seleccionado un sexo</div>';
	if ( empty($fono_ejecutiv) )      $errors[13] 	  = '<div class="alert-error" >No ha ingresado su telefono</div>';
	if ( empty($ciudad_ejecutiv) )    $errors[14] 	  = '<div class="alert-error" >No ha ingresado su Comuna</div>';	
	if ( empty($fnac_dia) )           $errors[15] 	  = '<div class="alert-error" >No ha seleccionado el dia de la fecha de nacimiento</div>';
	if ( empty($fnac_mes) )           $errors[16] 	  = '<div class="alert-error" >No ha seleccionado el mes de la fecha de nacimiento</div>';
	if ( empty($fnac_ano) )           $errors[17] 	  = '<div class="alert-error" >No ha seleccionado el año de la fecha de nacimiento</div>';
	if ( empty($login) )              $errors[18] 	  = '<div class="alert-error" >No ha ingresado el email de su cuenta</div>';
	if ( empty($re_login) )           $errors[19] 	  = '<div class="alert-error" >No ha re-ingresado el email de su cuenta</div>';
	if ( empty($pass) )               $errors[20] 	  = '<div class="alert-error" >No ha ingresado su clave </div>';
	if ( empty($re_pass) )            $errors[21] 	  = '<div class="alert-error" >No ha re-ingresado  su clave</div>';
	
	

	
	if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6]) && !isset($errors[7]) && !isset($errors[8]) && !isset($errors[9]) && !isset($errors[10]) && !isset($errors[11]) && !isset($errors[12]) && !isset($errors[13]) && !isset($errors[14]) && !isset($errors[15]) && !isset($errors[16]) && !isset($errors[17]) && !isset($errors[18]) && !isset($errors[19]) && !isset($errors[20]) && !isset($errors[21])   ) {
		
		//Creacion de las variables para insertar los datos
		//Validacion de nom_ejecutiv   
		
		if(isset($nom_ejecutiv)&&$nom_ejecutiv!=''){
			$a = "'".$nom_ejecutiv."'";	
		} else {
			$a = '';	
		}
		//Validacion de fono_ejecutiv
		if(isset($fono_ejecutiv)&&$fono_ejecutiv!=''){
			$a .= ",'".$fono_ejecutiv."'";	
		} else {
			$a .= ",''";	
		}
		//Validacion de ciudad_ejecutiv
		if(isset($ciudad_ejecutiv)&&$ciudad_ejecutiv!=''){
			$a .= ",'".$ciudad_ejecutiv."'";	
		} else {
			$a .= ",''";	
		}
		//Validacion de fecha_nacimiento
		$a .= ",'".$fnac_ano.'-'.$fnac_mes.'-'.$fnac_dia."'";	
		//Validacion de login
		if(isset($login)&&$login!=''){
			$a .= ",'".$login."'";	
		} else {
			$a .= ",''";	
		}
		//Validacion de pass
		if(isset($pass)&&$pass!=''){
			$a .= ",'".$pass."'";	
		} else {
			$a .= ",''";	
		}
		//Validacion de fecha_ingreso
		$datestamp    = $stime=date("Ymd");
		$a .= ",'".$datestamp."'";
		//Validacion de mail_ejecutiv
		if(isset($login)&&$login!=''){
			$a .= ",'".$login."'";	
		} else {
			$a .= ",''";	
		}
		//Validacion de grupo
			$a .= ",'roulette'";	
		//Validacion de soy
		if(isset($soy)&&$soy!=''){
			$a .= ",'".$soy."'";	
		} else {
			$a .= ",''";	
		}
		//Validacion de busco
		if(isset($soy)&&$soy!=''){
			if($soy=="H"){
				$a .= ",'2'";	
			} else {	
				$a .= ",'1'";
			}	
		} else {
			$a .= ",'2'";	
		}
		//Validacion de radio
		$a .= ",'1'";
		//Validacion de edad
		$a .= ",'18'";
		//Validacion de b_edad_a
		$a .= ",'18'";
		//Validacion de b_edad_b
		$a .= ",'75'";
		//Validacion de publicidad
		$a .=",'Si'";
		//Validacion de estado_usr
		$a .= ",'0'";
		//Validacion de codigo_sms
		$num_caracteres = "10"; //cantidad de caracteres de la clave
        $codigo_sms = substr(md5(rand()),0,$num_caracteres); //generador aleatorio de claves 
		$a .= ",'".$codigo_sms."'";
		//Validacion de gcmcode
		if(isset($_GET['id'])&&$_GET['id']!=''){
			$a .= ",'".$_GET['id']."'";	
		} else {
			$a .= ",''";	
		}
		//Validacion de gcmcode
		if(isset($_GET['IMEI'])&&$_GET['IMEI']!=''){
			$a .= ",'".$_GET['IMEI']."'";	
		} else {
			$a .= ",''";	
		}
		

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `ejecutivos` 
		(nom_ejecutiv, fono_ejecutiv, ciudad_ejecutiv, fecha_nacimiento, login,pass, fecha_ingreso, mail_ejecutiv, grupo, soy, busco, radio, edad, b_edad_a, b_edad_b, publicidad, estado_usr, codigo_sms,gcmcode,IMEI) VALUES ({$a})";
		$result = mysql_query($query, $dbConn);
		
		
		
		//crear las rutinas para el envio de mensajes
		//envio de correo de validacion
		require_once("../PHPMailer_v5.1/class.phpmailer.php");
		$mail             = new PHPMailer();
		$mail->IsHTML(true);
		$mail->SMTPAuth   = true;
		$mail->Host       = "localhost";
		//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		//====== DE QUIEN ES ========
		$mail->From="informacion@jootes.cl";
		$mail->FromName="JOOTES";
		$mail->Sender="informacion@jootes.cl";
		$mail->AddReplyTo("informacion@jootes.cl", "Responde a este mail");
		//====== PARA QUIEN =========
		$mail->Subject = "Activacion de la cuenta" ;
		$mail->AddAddress($login);    
		//====== MENSAJE =========
		$strBody = "<p>Tu cuenta ya ha sido creada,sin embargo debes activarla con el codigo enviado a traves de un SMS<br/> Tu codigo de activacion es : ".$codigo_sms."</p>";
		$mail->MsgHTML($strBody);
		if(!$mail->Send()){
			$mail->ClearAddresses();
		}else{
			$mail->ClearAddresses();
		}

		header( 'Location: '.$location.'&create=true' );
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
        <?php  if (isset($errors[3])) {echo $errors[3];}?>
        <?php  if (isset($errors[4])) {echo $errors[4];}?>
        <?php  if (isset($errors[5])) {echo $errors[5];}?>
        <?php  if (isset($errors[6])) {echo $errors[6];}?>
        <?php  if (isset($errors[7])) {echo $errors[7];}?>
        <?php  if (isset($errors[8])) {echo $errors[8];}?>
        <?php  if (isset($errors[9])) {echo $errors[9];}?> 
        <?php  if (isset($errors[10])) {echo $errors[10];}?>
        <?php  if (isset($errors[11])) {echo $errors[11];}?>
        <?php  if (isset($errors[12])) {echo $errors[12];}?>
        <?php  if (isset($errors[13])) {echo $errors[13];}?>
        <?php  if (isset($errors[14])) {echo $errors[14];}?> 
        <?php  if (isset($errors[15])) {echo $errors[15];}?>
        <?php  if (isset($errors[16])) {echo $errors[16];}?> 
        <?php  if (isset($errors[17])) {echo $errors[17];}?>
        <?php  if (isset($errors[18])) {echo $errors[18];}?>
        <?php  if (isset($errors[19])) {echo $errors[19];}?>
        <?php  if (isset($errors[20])) {echo $errors[20];}?>
        <?php  if (isset($errors[21])) {echo $errors[21];}?>
        <h1>Crear usuario</h1>
        <form method="post">
<table class="table_msg">
        
<tr><td><label>Nick</label></td></tr>
<tr><td><input type="text" name="nom_ejecutiv"  placeholder="Nick"  autocomplete="off" <?php  if (isset($nom_ejecutiv)) {echo 'value="'.$nom_ejecutiv.'"';}?> ></td></tr>

<tr><td><label>Sexo</label></td></tr>
<tr>
    <td>
    	<select name="soy" required="required" class="ciudad_ejecutiv">
			<option value="">Sexo</option>
            <option value="H" <?php  if (isset($soy)&& $soy=='H') {echo 'selected';}?>>Hombre</option>
            <option value="M" <?php  if (isset($soy)&& $soy=='M') {echo 'selected';}?>>Mujer</option>
		</select>
    </td>
</tr>
         
<tr><td><label>Telefono Movil</label></td></tr>
<tr><td>09 - <input type="tel" name="fono_ejecutiv" placeholder="Telefono Movil" autocomplete="off" <?php if(isset($fono_ejecutiv)) {echo 'value="'.$fono_ejecutiv.'"';}?>></td></tr> 

<tr><td><label>Comuna</label></td></tr>
<tr>
<td>
     <select name="ciudad_ejecutiv" required="required" class="ciudad_ejecutiv">
		<option value='0'>Elija una comuna</option>
		<?php //consulta
		$SQL_comuna=" SELECT comunas FROM comuna where reg='13' ORDER BY comunas ASC";
		$comuna=mysql_query($SQL_comuna,$dbConn); 
		while($fila_comuna=mysql_fetch_array($comuna)) {?>
		<option value="<?php echo $fila_comuna["comunas"]; ?>" <?php if(isset($ciudad_ejecutiv)&&$fila_comuna["comunas"]==$ciudad_ejecutiv) {echo 'selected="selected"';}?>><?php echo $fila_comuna["comunas"]; ?></option>
		<?php } ?>
	</select>
</td>
</tr>
          
<tr><td><label>Fecha de nacimiento</label></td></tr>
<tr>
<td>
<select name="fnac_dia" required="required" class="ciudad_ejecutiv fnac_20">
		<option value='' selected="selected">Dia</option>
        <?php for ($i = 1; $i <= 31; $i++) {?>
		<option value='<?php echo $i ?>' <?php if(isset($fnac_dia)&&$fnac_dia==$i) {echo 'selected="selected"';}?>><?php echo $i ?></option>	
        <?php } ?>		
</select>
<select name="fnac_mes" required="required" class="ciudad_ejecutiv fnac_20">
		<option value='' selected="selected">Mes</option>
        <?php for ($i = 1; $i <= 12; $i++) {?>
		<option value='<?php echo $i ?>' <?php if(isset($fnac_mes)&&$fnac_mes==$i) {echo 'selected="selected"';}?>><?php echo $i ?></option>	
        <?php } ?>		
</select>
<select name="fnac_ano" required="required" class="ciudad_ejecutiv fnac_50">
		<option value='' selected="selected">Año</option>
        <?php for ($i = 1975; $i <= 2014; $i++) {?>
		<option value='<?php echo $i ?>' <?php if(isset($fnac_ano)&&$fnac_ano==$i) {echo 'selected="selected"';}?>><?php echo $i ?></option>	
        <?php } ?>		
</select>    
    	
  </td>
</tr>
          
<tr><td><label>Correo electronico (Usuario)</label></td></tr>
<tr><td><input type="text" name="login"  placeholder="Correo electronico (Usuario)" autocomplete="off" <?php  if (isset($login)) {echo 'value="'.$login.'"';}?> ></td></tr>
          
<tr><td><label>Repite Correo electronico</label></td></tr>
<tr><td><input type="text" name="re-login"  placeholder="Repite Correo electronico" autocomplete="off" <?php  if (isset($re_login)) {echo 'value="'.$re_login.'"';}?> ></td></tr>
          
<tr><td><label>Contraseña</label></td></tr>
<tr><td><input type="password" name="pass"  placeholder="contraseña" autocomplete="off" <?php  if (isset($pass)) {echo 'value="'.$pass.'"';}?> ></td></tr>
          
<tr><td><label>Repite Contraseña</label></td></tr>
<tr><td><input type="password" name="re-pass"  placeholder="Repite Contraseña" autocomplete="off" <?php  if (isset($re_pass)) {echo 'value="'.$re_pass.'"';}?> ></td></tr>
          
</table>
<input name="submit" type="submit" value="Crear" id="post_button" />
<a href="<?php echo $location; ?>"><input type="button" value="Volver" id="post_button" /></a>
</form>
    </div>
</div>
</body>
</html>