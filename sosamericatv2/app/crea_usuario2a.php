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
$location = "gracias_cel_01.php?id=".$_GET['id']."&latitud=".$_GET['latitud']."&longitud=".$_GET['longitud']."&imei=".$_GET['imei']."&dispositivo=".$_GET["dispositivo"];
//formulario para crear usuario
if ( !empty($_POST['submit']) )  {
	
	//se crean las variables
		if ( !empty($_POST['rut']) )			$rut					= $_POST['rut'];
	if ( !empty($_POST['rut_compara']) )		$rut_compara			= $_POST['rut_compara'];
	if ( !empty($_POST['nom_ejecutiv']) )       $nom_ejecutiv			= $_POST['nom_ejecutiv'];
	if ( !empty($_POST['fono_ejecutiv']) )      $fono_ejecutiv			= $_POST['fono_ejecutiv'];
	if ( !empty($_POST['comuna1']) )			$ciudad_ejecutiv		= $_POST['comuna1'];
		if ( !empty($_POST['region1']) )		$region					= $_POST['region1'];
	if ( !empty($_POST['dir_ejecutiv']) )		$dir_ejecutiv			= $_POST['dir_ejecutiv'];
	if ( !empty($_POST['login']) )              $login					= $_POST['login'];
	if ( !empty($_POST['re-login']) )           $re_login				= $_POST['re-login'];
	if ( !empty($_GET['dispositivo']) )		    $dispositivo			= $_GET['dispositivo'];
	if ( !empty($_POST['dia']) )				$dia					= $_POST['dia'];
	if ( !empty($_POST['mes']) )				$mes					= $_POST['mes'];
	if ( !empty($_POST['anio']) )				$anio					= $_POST['anio'];
	if ( !empty($_POST['sexo']) )				$sexo					= $_POST['sexo'];


	// se verifica si el correo ya existe
	$sql_login = mysql_query("SELECT login FROM ejecutivos WHERE login='".$login."'", $dbConn);
	// se verifica si el numero ya existe
	$sql_fono = mysql_query("SELECT fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='".$fono_ejecutiv."'", $dbConn);
		// se verifica si el Rut ya existe
	$sql_rut = mysql_query("SELECT rut FROM ejecutivos WHERE rut='".$_POST["rut"]."' ", $dbConn);
	// completamos la variable error si es necesario
	if(mysql_num_rows($sql_login) > 0)   $errors[1]  = '<div class="alert-error" >El email ya esta en uso</div>';
	if(mysql_num_rows($sql_fono) > 0)    $errors[2]  = '<div class="alert-error" >El numero telefonico ya esta en uso</div>';
	if ( $login != $re_login )           $errors[3]  = '<div class="alert-error" >Los correos ingresados no coinciden</div>';
	//if ( $pass != $re_pass )             $errors[4]  = '<div class="alert-error" >Las contraseñas no coinciden</div>';
	//valida si el fono es un numero y si tiene el largo requerido
	if(isset($fono_ejecutiv)){
		if (validarnumero($fono_ejecutiv)) {   
			$errors[5]	    = '<div class="alert-error" >Ingrese un numero telefonico valido</div>'; 
		}
		if (strlen($fono_ejecutiv) < 8) { 
   			$errors[6]	    = '<div class="alert-error" >El numero telefonico debe tener al menos 8 digitos</div>';
		}
		if (strlen($fono_ejecutiv) > 9) { 
   			$errors[7]	    = '<div class="alert-error" >El numero telefonico debe tener no mas de 9 digitos</div>';
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
	

if ($mes<10) {
	$mes_dis="0".$mes;
}
if ($dia<10) {
	$dia_dis="0".$dia;
}	


$fecha_nacimiento=$anio.$mes_dis.$dia_dis;


	if ( empty($nom_ejecutiv) )					$errors[10] 	  = '<div class="alert-error" >No ha ingresado su Nombre</div>';
	if ( empty($fono_ejecutiv) )				$errors[11] 	  = '<div class="alert-error" >No ha ingresado su telefono</div>';
	if ( empty($ciudad_ejecutiv) )				$errors[12] 	  = '<div class="alert-error" >No ha ingresado su Comuna</div>';
	if ( empty($login) )						$errors[13] 	  = '<div class="alert-error" >No ha ingresado el email de su cuenta</div>';
	if ( empty($re_login) )						$errors[14] 	  = '<div class="alert-error" >No ha re-ingresado el email de su cuenta</div>';
	if ( empty($dir_ejecutiv) )					$errors[15] 	  = '<div class="alert-error" >No ha ingresado su direccion</div>';	
	if(mysql_num_rows($sql_rut) > 0)			$errors[16]		  = '<div class="alert-error" >El numero de DNI ya existe</div>';
	if ( empty($sexo) )							$errors[17] 	  = '<div class="alert-error" >No ha ingresado su sexo</div>';	
	if ( $fecha_nacimiento=='19240101' )		$errors[18] 	  = '<div class="alert-error" >No ha ingresado su Fecha de Nacimiento</div>';


	if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3])  && !isset($errors[5]) && !isset($errors[6]) && !isset($errors[7]) && !isset($errors[8]) && !isset($errors[9]) && !isset($errors[10]) && !isset($errors[11]) && !isset($errors[12]) && !isset($errors[13]) && !isset($errors[14]) && !isset($errors[15]) && !isset($errors[16]) && !isset($errors[17]) && !isset($errors[18])) {
		
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
			$latitud=0;
		}
		
		if(isset($_GET['longitud'])){
			$longitud=$_GET['longitud'];	
		}else{
			$longitud=0;
		}
		if(isset($_GET['dispositivo'])){
			$dispositivo=$_GET['dispositivo'];	
		}else{
			$dispositivo="";
		}
		$telefono='09'.$fono_ejecutiv;
		//envio el sms al celular con el nuevo codigo
		$num_caracteres = "6"; //cantidad de caracteres de la clave
        $codigo_sms = substr(md5(rand()),0,$num_caracteres); //generador aleatorio de claves 
		list($uno, $dos) = split('-', $_POST['rut']);
		$juntos=$uno.$dos;		

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `ejecutivos` (nom_ejecutiv, fono_ejecutiv, ciudad_ejecutiv, login,pass, fecha_ingreso, mail_ejecutiv, grupo, radio, publicidad, estado_usr, codigo_sms,gcmcode,imei,lon,lat,dir_ejecutiv,rut,dispositivo,sexo,fecha_nac) VALUES ('{$nom_ejecutiv}','{$telefono}','{$ciudad_ejecutiv}','{$login}','1234',{$fecha_ing},'{$login}','{$grupo}', {$radio}, '{$publicidad}', '{$estado_usr}', '{$codigo_sms}', '{$gcmcode}', '{$imei}', {$longitud}, {$latitud}, '{$dir_ejecutiv}','{$juntos}','{$dispositivo}','{$sexo}','{$fecha_nacimiento}'  )";

		//echo $query ."<br>";
		$result = mysql_query($query, $dbConn);
if ($conexion_padron==0) {
		$query_con="select id_ejecutiv from `ejecutivos` where rut='".$juntos."'";
		$result_id = mysql_query($query_con, $dbConn);
		while($fila=mysql_fetch_array($result_id)) { $result_id_dato=$fila["id_ejecutiv"]; 	}

		$query_2  = "INSERT INTO `ejecutivos_gral` (id_ejecutiv,nom_ejecutiv, fono_ejecutiv, ciudad_ejecutiv, login,pass, fecha_ingreso, mail_ejecutiv, grupo, radio, publicidad, estado_usr, codigo_sms,gcmcode,imei,lon,lat,dir_ejecutiv,rut,dispositivo,sexo,fecha_nac) VALUES ({$result_id_dato},'{$nom_ejecutiv}','{$telefono}','{$ciudad_ejecutiv}','{$login}','1234',{$fecha_ing},'{$login}','{$grupo}', {$radio}, '{$publicidad}', '{$estado_usr}', '{$codigo_sms}', '{$gcmcode}', '{$imei}', {$longitud}, {$latitud}, '{$dir_ejecutiv}','{$juntos}','{$dispositivo}','{$sexo}','{$fecha_nacimiento}'  )";
		$res=mysql_query($query_2,$base_padron); 
}
		
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
		

		header( 'Location: '.$location.'&create=true' );
		die;
		}

}else{
	/*if ( !empty($_POST['rut']) )				$rut         = $_POST['rut'];
	if ( !empty($_POST['rut_compara']) )		$rut_compara         = $_POST['rut_compara'];
	if ( !empty($_POST['nom_ejecutiv']) )       $nom_ejecutiv         = $_POST['nom_ejecutiv'];
	if ( !empty($_POST['fono_ejecutiv']) )      $fono_ejecutiv        = $_POST['fono_ejecutiv'];
	if ( !empty($_POST['ciudad_ejecutiv']) )    $ciudad_ejecutiv      = $_POST['ciudad_ejecutiv'];
	if ( !empty($_POST['dir_ejecutiv']) )		$dir_ejecutiv      = $_POST['dir_ejecutiv'];
	if ( !empty($_POST['login']) )              $login                = $_POST['login'];

*/
	if ( !empty($_POST['rut']) )			    $rut                    = $_POST['rut'];
	if ( !empty($_POST['rut_compara']) )		$rut_compara            = $_POST['rut_compara'];
	if ( !empty($_POST['nom_ejecutiv']) )       $nom_ejecutiv			= $_POST['nom_ejecutiv'];
	if ( !empty($_POST['fono_ejecutiv']) )      $fono_ejecutiv			= $_POST['fono_ejecutiv'];
	if ( !empty($_POST['comuna1']) )			$ciudad_ejecutiv		= $_POST['comuna1'];
	if ( !empty($_POST['region1']) )		    $region					= $_POST['region1'];
	if ( !empty($_POST['dir_ejecutiv']) )		$dir_ejecutiv			= $_POST['dir_ejecutiv'];
	if ( !empty($_POST['login']) )              $login					= $_POST['login'];
	if ( !empty($_POST['re-login']) )           $re_login				= $_POST['re-login'];
	if ( !empty($_GET['dispositivo']) )		    $dispositivo			= $_GET['dispositivo'];
	if ( !empty($_POST['dia']) )				$dia					= $_POST['dia'];
	if ( !empty($_POST['mes']) )				$mes					= $_POST['mes'];
	if ( !empty($_POST['anio']) )				$anio					= $_POST['anio'];
	if ( !empty($_POST['sexo']) )				$sexo					= $_POST['sexo'];

}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
$Fecha=getdate(); 
$numeroRegistros=0;
$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes<10) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia<10) {
	$diadis="0".$Dia;
}else{
$diadis=$Dia;
}

$fecha=$Anio."-".$mesdis."-".$diadis;
$menos100=$Anio-90;
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
        <h1>Crear usuario</h1>

<form method="post" name="form1">
<input type="hidden" name="rut_compara" <?php  if (isset($rut_compara)) {echo 'value="'.$rut_compara.'"';}?> >
<table class="table_msg">

<tr><td><label>DNI</label></td></tr>
<tr><td><input type="text" name="rut"   <?php  if (isset($rut)) {echo 'value="'.$rut.'"';}?> readonly ></td></tr>

<tr><td><label>Nombre</label></td></tr>
<tr><td><input type="text" name="nom_ejecutiv"  placeholder="Nombre"  autocomplete="off" <?php  if (isset($nom_ejecutiv)) {echo 'value="'.$nom_ejecutiv.'"';}?> ></td></tr>

<tr><td><label>Sexo</label></td></tr>
<tr><td><INPUT type="radio" name="sexo" value="M" <?php  if ($sexo=='M') {echo 'checked ';}?> > Masculino&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<INPUT type="radio" name="sexo" value="F" <?php  if ($sexo=='F') {echo 'checked ';}?> > Femenino</td></tr>

<tr><td><label>Fecha de Nacimiento:</label></td></tr>
<tr><td>
Día: <select name=dia class="fecha_nac">
<option <?php  if (isset($dia)) {echo "value='".$dia."'"; }else{echo "value='dia'"; }?> > <?php  if (isset($dia)) {echo $dia; }else{echo "dia"; }?> </option>
      <?
      for($i=1; $i<=31; $i++) {?>
        <option <?php  echo $i; ?> > <?php  echo $i; ?> </option>
    <?  }
      ?>
   </select> 
   Mes: <select name=mes class="fecha_nac">
   <option <?php  if (isset($mes)) {echo "value='".$mes."'"; }else{echo "value='mes'"; }?> > <?php  if (isset($mes)) {echo $mes; }else{echo "mes"; }?> </option>

      <?
      for($i=1; $i<=12; $i++) {?>
                 <option <?php  echo $i; ?> > <?php  echo $i; ?> </option>
    <?  }
      ?>
   </select>
   Año: <select name=anio class="fecha_nac">
      <option <?php  if (isset($anio)) {echo "value='".$anio."'"; }else{echo "value='Ano'"; }?> > <?php  if (isset($anio)) {echo $anio; }else{echo "A&ntilde;o"; }?> </option>

      <?
      for($i=$menos100; $i<=$Anio; $i++) {?>
                 <option <?php  echo $i; ?> > <?php  echo $i; ?> </option>
     <? }
      ?>
   </select>
</td></tr>

  

<tr><td><label>Tel&eacute;fono Movil</label></td></tr>
<tr><td>09 - <input type="tel" name="fono_ejecutiv" placeholder="Tel&eacute;fono Movil" autocomplete="off" <?php if(isset($fono_ejecutiv)) {echo 'value="'.$fono_ejecutiv.'"';}?>></td></tr> 

<tr><td><label>Direcci&oacute;n</label></td></tr>
<tr><td><input type="text" name="dir_ejecutiv"  placeholder="Direcci&oacute;n"  autocomplete="off" <?php  if (isset($dir_ejecutiv)) {echo 'value="'.$dir_ejecutiv.'"';}?> ></td></tr>


<?php 
// Se trae un listado de todos los departamentos
$arrDepartamento = array();
$query = "SELECT  idDepartamento, Nombre
FROM `ubicacion_departamento`
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrDepartamento,$row );
}
// Se trae un listado de todas las provincias
$query = "SELECT  idProvincia, idDepartamento, Nombre
FROM `ubicacion_provincia` ";
$resultado = mysql_query ($query, $dbConn);
while ($Provincia[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Provincia);
array_multisort($Provincia, SORT_ASC);
// Se trae un listado de todos los distritos
$query = "SELECT  idDistrito, idProvincia, Nombre
FROM `ubicacion_distrito` ";
$resultado = mysql_query ($query, $dbConn);
while ($Distrito[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Distrito);
array_multisort($Distrito, SORT_ASC);
?>





<tr><td><label>Departamento</label></td></tr>
<tr>
    <td>
    <select class="ciudad_ejecutiv" name="idDepartamento" onChange="cambia_departamento()" >
    <option value="" selected="selected">Seleccione una comuna</option>
    <?php foreach ($arrDepartamento as $dep) { ?>
    <option value="<?php echo $dep['idDepartamento']; ?>" <?php if(isset($idDepartamento)&&$idDepartamento==$dep['idDepartamento']) {echo 'selected="selected"';}?>>
		<?php echo $dep['Nombre']; ?>
    </option>
    <?php } ?>                               
    </select>   
    </td>
</tr>

<tr><td><label>Provincia</label></td></tr>
<tr>
    <td>
    <select class="ciudad_ejecutiv" name="idProvincia" onChange="cambia_provincia()" >
    <option value="" selected="selected">Seleccione una comuna</option>                               
    </select>   
    </td>
</tr>

<script>
<?php
//se imprime la id de la tarea
filtrar($Provincia, 'idDepartamento'); 
foreach($Provincia as $tipo=>$componentes){ 
echo'var id_provincia_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idProvincia'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Provincia as $tipo=>$componentes){ 
echo'var provincia_'.$tipo.'=new Array("Seleccione una Provincia"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_departamento(){
	var Componente
	Componente = document.form1.idDepartamento[document.form1.idDepartamento.selectedIndex].value
	try {
	if (Componente != '') {
		id_provincia=eval("id_provincia_" + Componente)
		provincia=eval("provincia_" + Componente)
		num_int = id_provincia.length
		document.form1.idProvincia.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idProvincia.options[i].value=id_provincia[i]
		   document.form1.idProvincia.options[i].text=provincia[i]
		}	
	}else{
		document.form1.idProvincia.length = 1
		document.form1.idProvincia.options[0].value = ""
	    document.form1.idProvincia.options[0].text = "Seleccione una Provincia"
	}
	} catch (e) {
    alert("El departamento seleccionado no posee provincias");
}
	document.form1.idProvincia.options[0].selected = true
}
</script>


<tr><td><label>Distrito</label></td></tr>
<tr>
    <td>
    <select class="ciudad_ejecutiv" name="idDistrito"  >
    <option value="" selected="selected">Seleccione una comuna</option>                               
    </select>   
    </td>
</tr>

<script>
<?php
//se imprime la id de la tarea
filtrar($Distrito, 'idProvincia'); 
foreach($Distrito as $tipo=>$componentes){ 
echo'var id_distrito_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idDistrito'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Distrito as $tipo=>$componentes){ 
echo'var distrito_'.$tipo.'=new Array("Seleccione un Distrito"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_provincia(){
	var Componente
	Componente = document.form1.idProvincia[document.form1.idProvincia.selectedIndex].value
	try {
	if (Componente != '') {
		id_distrito=eval("id_distrito_" + Componente)
		distrito=eval("distrito_" + Componente)
		num_int = id_distrito.length
		document.form1.idDistrito.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idDistrito.options[i].value=id_distrito[i]
		   document.form1.idDistrito.options[i].text=distrito[i]
		}	
	}else{
		document.form1.idDistrito.length = 1
		document.form1.idDistrito.options[0].value = ""
	    document.form1.idDistrito.options[0].text = "Seleccione un Distrito"
	}
	} catch (e) {
    alert("La provincia seleccionada no posee distritos");
}
	document.form1.idDistrito.options[0].selected = true
}
</script>










          
<tr><td><label>Correo electr&oacute;nico</label></td></tr>
<tr><td><input type="text" name="login"  placeholder="Correo electr&oacute;nico" autocomplete="off" <?php  if (isset($login)) {echo 'value="'.$login.'"';}?> ></td></tr>
          
<tr><td><label>Repite Correo electr&oacute;nico</label></td></tr>
<tr><td><input type="text" name="re-login"  placeholder="Repite Correo electr&oacute;nico" autocomplete="off" <?php  if (isset($re_login)) {echo 'value="'.$re_login.'"';}?> ></td></tr>

          
</table>
<input name="submit" type="submit" value="Crear" id="post_button" />
</form>
    </div>
</div>
</body>
</html>