<?php session_start();

//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];

/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config2.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
$location = "gracias_cel_01.php?id=".$_GET['id']."&latitud=".$_GET['latitud']."&longitud=".$_GET['longitud']."&imei=".$_GET['imei'];
//formulario para crear usuario
if ( !empty($_POST['submit']) )  {
	
	//se crean las variables
	if ( !empty($_POST['nom_ejecutiv']) )       $nom_ejecutiv			= $_POST['nom_ejecutiv'];
	if ( !empty($_POST['fono_ejecutiv']) )      $fono_ejecutiv			= $_POST['fono_ejecutiv'];
	if ( !empty($_POST['comuna1']) )				$comuna					= $_POST['comuna1'];
	if ( !empty($_POST['region1']) )				$region					= $_POST['region1'];
	if ( !empty($_POST['dir_ejecutiv']) )		$dir_ejecutiv			= $_POST['dir_ejecutiv'];
	if ( !empty($_POST['login']) )              $login					= $_POST['login'];
	if ( !empty($_POST['re-login']) )           $re_login				= $_POST['re-login'];
	if ( !empty($_POST['rut']) )				$rut					= $_POST['rut'];
	if ( !empty($_POST['rut_compara']) )		$rut_compara			= $_POST['rut_compara'];
	if ( !empty($_GET['dispositivo']) )		    $dispositivo			= $_GET['dispositivo'];

	// se verifica si el correo ya existe
	$sql_login = mysql_query("SELECT login FROM ejecutivos WHERE login='".$login."'", $dbConn);
	// se verifica si el numero ya existe
	$sql_fono = mysql_query("SELECT fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='".$fono_ejecutiv."'", $dbConn);
	// se verifica si el Rut ya existe
	$sql_rut = mysql_query("SELECT rut FROM ejecutivos WHERE rut='".$rut_compara."' or rut='".$rut."'", $dbConn);
	// completamos la variable error si es necesario
	if(mysql_num_rows($sql_login) > 0)   $errors[1]  = '<div class="alert-error" >El email ya esta en uso</div>';
	if(mysql_num_rows($sql_fono) > 0)    $errors[2]  = '<div class="alert-error" >El numero telefonico ya esta en uso</div>';
	if ( $login != $re_login )           $errors[3]  = '<div class="alert-error" >Los correos ingresados no coinciden</div>';
	if(isset($fono_ejecutiv)){
		if (validarnumero($fono_ejecutiv)) {   
			$errors[5]	    = '<div class="alert-error" >Ingrese un numero telefonico valido</div>'; 
		}
		if (strlen($fono_ejecutiv) < 8) { 
   			$errors[6]	    = '<div class="alert-error" >El numero telefonico debe tener al menos 8 digitos</div>';
		}
		if (strlen($fono_ejecutiv) > 8) { 
   			$errors[7]	    = '<div class="alert-error" >El numero telefonico debe tener no mas de 8 digitos</div>';
		}  
	}
	//Verifica si la fecha ingresada tiene el formato fecha
	if(isset($login)){
		if(validaremail($login)){ }else{ 
   			$errors[8]	    = '<div class="alert-error" >Ingrese un correo valido</div>'; 
		}
	}
	//Verifica si la fecha ingresada tiene el formato fecha
	if(isset($re_login)){
		if(validaremail($re_login)){ }else{ 
   			$errors[9]	    = '<div class="alert-error" >Ingrese un correo valido</div>'; 
		}
	}
	
	if ( empty($nom_ejecutiv) )       $errors[10] 	  = '<div class="alert-error" >No ha ingresado su Nombre</div>';
	if ( empty($fono_ejecutiv) )      $errors[11] 	  = '<div class="alert-error" >No ha ingresado su telefono</div>';
	if ( empty($comuna) )			  $errors[12] 	  = '<div class="alert-error" >No ha ingresado su Comuna</div>';
	if ( empty($login) )              $errors[13] 	  = '<div class="alert-error" >No ha ingresado el email de su cuenta</div>';
	if ( empty($re_login) )           $errors[14] 	  = '<div class="alert-error" >No ha re-ingresado el email de su cuenta</div>';
	if ( empty($dir_ejecutiv) )       $errors[15] 	  = '<div class="alert-error" >No ha ingresado su direccion</div>';	
	if(mysql_num_rows($sql_rut) > 0)    $errors[16]  = '<div class="alert-error" >El numero de Rut ya existe</div>';

	
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6]) && !isset($errors[7]) && !isset($errors[8]) && !isset($errors[9]) && !isset($errors[10]) && !isset($errors[11]) && !isset($errors[12]) && !isset($errors[13]) && !isset($errors[14]) && !isset($errors[15]) && !isset($errors[16])) {
		
		//se toma la fecha de ingreso
		$datestamp    = $stime=date("Ymd");
		$fecha_ing=$datestamp;
		//defino el grupo
		$grupo="sosclick";
		//Otros datos
		$radio="1";
		$publicidad="Si";
		$estado_usr='1';
		if(isset($_GET['id'])){
			$gcmcode=$_GET['id'];	
		}else{
			$gcmcode='';
		}

		if(isset($_GET['imei'])){
			$imei=$_GET['imei'];	
		}else{
			$imei='';
		}

		if(isset($_GET['latitud'])){
			$latitud=$_GET['latitud'];	
		}else{
			$latitud="''";
		}
		
		if(isset($_GET['longitud'])){
			$longitud=$_GET['longitud'];	
		}else{
			$longitud="''";
		}
		if(isset($_GET['dispositivo'])){
			$dispositivo=$_GET['dispositivo'];	
		}else{
			$dispositivo="''";
		}
		$telefono='09'.$fono_ejecutiv;
		//envio el sms al celular con el nuevo codigo
		$num_caracteres = "6"; //cantidad de caracteres de la clave
        $codigo_sms = substr(md5(rand()),0,$num_caracteres); //generador aleatorio de claves 

list($uno, $dos) = split('-', $rut);
$juntos=$uno.$dos;			

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `ejecutivos` (nom_ejecutiv, fono_ejecutiv, ciudad_ejecutiv, login,pass, fecha_ingreso, mail_ejecutiv, grupo, radio, publicidad, estado_usr, codigo_sms,gcmcode,imei,lon,lat,dir_ejecutiv,rut,region,dispositivo) VALUES ('{$nom_ejecutiv}','{$telefono}','{$comuna}','{$login}','1234',{$fecha_ing},'{$login}','{$grupo}', {$radio}, '{$publicidad}', '{$estado_usr}', '{$codigo_sms}', '{$gcmcode}', '{$imei}', {$longitud}, {$latitud}, '{$dir_ejecutiv}','{$juntos}','{$region}','{$dispositivo}'  )";

//echo $query ."<br>";
	

		$result = mysql_query($query, $dbConn);
		

		$sql ="update padron_electoral_CL set domicilio_2='{$dir_ejecutiv}', comuna_2='{$comuna}', tipo_domicilio2='RES',correo='{$login}',fono_celular='{$fono_ejecutiv}',region_2='{$region}'  WHERE rut_compara='" . $juntos . "'";

//echo $sql ."<br>";	
		$res=mysql_query($sql,$base_padron); 
$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "i" , $tiempo ); 
$seg= date ( "i" , $tiempo ); 
$hora_muestra=$hora.":".$min.":".$seg;

$Fecha=getdate(); 

$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes < 10) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia < 10) {
	$diadis="0".$Dia;
}else{
	$diadis=$Dia;
}
$fecha=$diadis."/".$mesdis."/".$Anio."  ".$hora_muestra;
		
		$sql_pref ="insert into preferencias (rut_compara,item,categoria,subcategoria,fecha) values ('{$rut_compara}','{$grupo}',1,17,'{$fecha}')";
	
		$res_pref=mysql_query($sql_pref,$base_padron);

		//crear las rutinas para el envio de mensajes
		
		

		header( 'Location: '.$location.'&create=true' );
		die;
		}

}else{
	if ( !empty($_POST['rut']) )				$rut					= $_POST['rut'];
	if ( !empty($_POST['rut_compara']) )		$rut_compara			= $_POST['rut_compara'];
	if ( !empty($_POST['nom_ejecutiv']) )       $nom_ejecutiv			= $_POST['nom_ejecutiv'];
	if ( !empty($_POST['fono_ejecutiv']) )      $fono_ejecutiv			= $_POST['fono_ejecutiv'];
	if ( !empty($_POST['comuna']) )				$comuna					= $_POST['comuna'];
	if ( !empty($_POST['dir_ejecutiv']) )		$dir_ejecutiv			= $_POST['dir_ejecutiv'];
	if ( !empty($_POST['region']) )				$region					= $_POST['region'];
	if ( !empty($_POST['login']) )              $login					= $_POST['login'];
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
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	cargar_regiones();
	$("#region").change(function(){dependencia_comunas();});
	$("#comuna").change(function(){dependencia_lineas();});
	$("#comuna").attr("disabled",true);
	$("#linea").attr("disabled",true);
});

function cargar_regiones()
{
	$.get("scripts/cargar-regiones.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#region').append(resultado);			
		}
	});	
}
function dependencia_comunas()
{
	var code = $("#region").val();
	$.get("scripts/dependencia-comunas.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#comuna").attr("disabled",false);
				document.getElementById("comuna").options.length=1;
				$('#comuna').append(resultado);			
			}
		}

	);
}

function dependencia_lineas()
{
	var code = $("#region").val();
	$.get("scripts/dependencia-lineas.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#linea").attr("disabled",false);
			document.getElementById("linea").options.length=1;
			$('#linea').append(resultado);			
		}
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
        <h1>Crear usuario</h1>

<form method="post">
<input type="hidden" name="rut_compara" <?php  if (isset($rut_compara)) {echo 'value="'.$rut_compara.'"';}?> >
<table class="table_msg">
        
<tr><td><label>Rut</label></td></tr>
<tr><td><input type="text" name="rut"   <?php  if (isset($rut)) {echo 'value="'.$rut.'"';}?> readonly ></td></tr>

<tr><td><label>Nombre</label></td></tr>
<tr><td><input type="text" name="nom_ejecutiv"  placeholder="Nombre"  autocomplete="off" <?php  if (isset($nom_ejecutiv)) {echo 'value="'.$nom_ejecutiv.'"';}?> ></td></tr>

<tr><td><label>Tel&eacute;fono Movil</label></td></tr>
<tr><td>09 - <input type="tel" name="fono_ejecutiv" placeholder="Tel&eacute;fono Movil" autocomplete="off" <?php if(isset($fono_ejecutiv)) {echo 'value="'.$fono_ejecutiv.'"';}?>></td></tr> 

<tr><td><label>Direcci&oacute;n</label></td></tr>
<tr><td><input type="text" name="dir_ejecutiv"  placeholder="Direcci&oacute;n"  autocomplete="off" <?php  if (isset($dir_ejecutiv)) {echo 'value="'.$dir_ejecutiv.'"';}?> ></td></tr>

 
<tr>
<td>

	<dd>Region</dd>
    <dd>
        <select id="region1" name="region1" class="ciudad_ejecutiv">
		
		<option value="13"  SELECTED>Metropolitana</option>
<?$sql01="SELECT * FROM regiones  order by  descripcion asc";
		$res=mysql_query($sql01,$dbConn); 
	while($registro=mysql_fetch_array($res)) 
		{ 
		$codigo=$registro["codigo"];
		$descripcion=$registro["descripcion"];

?>
			<option value='<?=$codigo?>'><?echo $descripcion?></option>

<?}?>
            
        </select>
    </dd>

	<dd>Comuna:</dd>
    <dd>
        <select id="comuna1" name="comuna1" class="ciudad_ejecutiv">
            <option value="La Florida" SELECTED>La Florida</option>
<?$sql01="SELECT * FROM comuna  order by  comunas asc";
		$res=mysql_query($sql01,$dbConn); 
	while($registro=mysql_fetch_array($res)) 
		{ 
		$descripcion=$registro["comunas"];

?>
			<option value='<?=$descripcion?>'><?echo $descripcion?></option>

<?}?>

        </select>
    </dd>

</td>
</tr>

<tr><td><label>Correo electr&oacute;nico (Usuario)</label></td></tr>
<tr><td><input type="text" name="login"  placeholder="Correo electronico (Usuario)" autocomplete="off" <?php  if (isset($login)) {echo 'value="'.$login.'"';}?> ></td></tr>
          
<tr><td><label>Repite Correo electr&oacute;nico</label></td></tr>
<tr><td><input type="text" name="re-login"  placeholder="Repite Correo electr&oacute;nico" autocomplete="off" <?php  if (isset($re_login)) {echo 'value="'.$re_login.'"';}?> ></td></tr>
          
        
</table>
<input name="submit" type="submit" value="Crear" id="post_button" />

</form>
    </div>
</div>
</body>
</html>