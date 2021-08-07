<?php session_start();
//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
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
if(isset($_GET['imei']))  		$id_gcm = $_GET['imei'];
$sql_id = "select login from ejecutivos where imei='".$id_gcm."'";
$result_id = mysql_query($sql_id, $dbConn);
//se verifica que el equipo sea el mismo que con el que se ingreso la ultima vez
$revision = mysql_num_rows($result_id);
if($revision == 0){
	header( "Location: login.php?id=".$_GET['id']."&longitud=".$_GET['longitud']."&latitud=".$_GET['latitud'].'&imei='.$_GET['imei'] );
	die;
} else {
	while($registro_id=mysql_fetch_array($result_id)) { 
	$login=$registro_id["login"];
	}
}
/**********************************************************************************************************************************/
/*                                                   Actualizo los registroa                                                      */
/**********************************************************************************************************************************/
// Se edita el area en la base de datos
if ( !empty($_POST['submit_edit']) ) {
	
	// definimos las variables
	if ( !empty($_POST['slider-2']) ) 	          $radio 	        = $_POST['slider-2'];
	if ( !empty($_POST['text-basic']) ) 	      $nombre 	        = $_POST['text-basic'];
	if ( !empty($_POST['text-basic2']) ) 	      $fono 	        = '09'.$_POST['text-basic2'];
	if ( !empty($_POST['id_usr']) ) 	          $id_usr 	        = $_POST['id_usr'];
	if ( !empty($_POST['publicidad']) ) 	      $publicidad 	    = $_POST['publicidad'];
	if ( !empty($_POST['dir_ejecutiv']) ) 		  $dir_ejecutiv 	= $_POST['dir_ejecutiv'];
	if ( !empty($_POST['idDepartamento']) ) 			$idDepartamento 	= $_POST['idDepartamento'];
	if ( !empty($_POST['idDistrito']) ) 	  $ciudad_ejecutiv 	= $_POST['idDistrito'];
	if ( !empty($_POST['idProvincia']) ) 			  $region 	= $_POST['idProvincia'];
	if ( !empty($_POST['alarma']) ) 			  $alarma 			= $_POST['alarma'];
	
	// completamos la variable error si es necesario
	if ( empty($nombre) )    	$errors[1] 	  = '<div class="alert-error" >No ha ingresado un nombre</div>';
	
	// si no hay errores registramos los datos
	if ( empty($error) ) {
		
		// inserto los datos de registro en la db
		$busqueda= $busco_a + $busco_b;
		$query  = "UPDATE ejecutivos SET radio= '$radio',nom_ejecutiv= '$nombre',fono_ejecutiv= '$fono',publicidad= '$publicidad',dir_ejecutiv='$dir_ejecutiv',fono_alarma= '$alarma',departamento='$idDepartamento',region= '$region',ciudad_ejecutiv = '$ciudad_ejecutiv'		WHERE imei=".$_GET['imei'];
		

		$result = mysql_query($query, $dbConn);
		


		header( 'Location: usr_perfil.php?id='.$_GET['id'].'&imei='.$_GET['imei'].'&latitud='.$_GET['latitud'].'&longitud='.$_GET['longitud'].'&dispositivo='.$_GET['dispositivo'] );
		die;
		
	}
		
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Perfil</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
</head>
<body topmargin=0 leftmargin=0>

<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 //SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
ejecutivos.nom_ejecutiv AS nom_ejecutiv,
ejecutivos.radio AS radio,
ejecutivos.publicidad AS publicidad,
ejecutivos.fono_ejecutiv AS fono,

ejecutivos.departamento AS idDepartamento,
ejecutivos.ciudad_ejecutiv AS idDistrito,
ejecutivos.region AS idProvincia,

ejecutivos.fono_alarma AS fono_alarma,
ejecutivos.rut AS rut,
ejecutivos.dir_ejecutiv AS direccion
FROM `ejecutivos`
WHERE ejecutivos.login = '".$login."'";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado); 


// Se trae un listado de todos los departamentos
$arrDepartamento = array();
$query_busca = "SELECT  idDepartamento, Nombre FROM `ubicacion_departamento` ORDER BY Nombre ASC";
$resultado_busca = mysql_query ($query_busca, $dbConn);
while ( $row_busca = mysql_fetch_assoc ($resultado_busca)) {
array_push( $arrDepartamento,$row_busca );
}
// Se trae un listado con todas las comunas
 if ($rowusr['idDepartamento']!=0&&$rowusr['idDepartamento']!=''){
	 $arrProvincia = array();
	 $query = "SELECT idProvincia,Nombre
	 FROM `ubicacion_provincia`
	 WHERE idDepartamento = ".$rowusr['idDepartamento']." 
	 ORDER BY Nombre ASC ";
	 $resultado = mysql_query ($query, $dbConn);
	 while ( $row = mysql_fetch_assoc ($resultado)) {
		 array_push( $arrProvincia,$row );
	}
} 
// Se trae un listado de todas las provincias
$query_busca2 = "SELECT  idProvincia, idDepartamento, Nombre FROM `ubicacion_provincia` ";
$resultado_busca2 = mysql_query ($query_busca2, $dbConn);
while ($Provincia[] = mysql_fetch_assoc ($resultado_busca2)); 
mysql_free_result($resultado_busca2);
array_pop($Provincia);
array_multisort($Provincia, SORT_ASC);
// Se trae un listado con todas las comunas
 if ($rowusr['idProvincia']!=0&&$rowusr['idProvincia']!=''){
	 $arrDistrito = array();
	 $query = "SELECT idDistrito,Nombre
	 FROM `ubicacion_distrito`
	 WHERE idProvincia = ".$rowusr['idProvincia']." 
	 ORDER BY Nombre ASC ";
	 $resultado = mysql_query ($query, $dbConn);
	 while ( $row = mysql_fetch_assoc ($resultado)) {
		 array_push( $arrDistrito,$row );
	}
} 
// Se trae un listado de todos los distritos
$query_busca3 = "SELECT  idDistrito, idProvincia, Nombre FROM `ubicacion_distrito` ";
$resultado_busca3 = mysql_query ($query_busca3, $dbConn);
while ($Distrito[] = mysql_fetch_assoc ($resultado_busca3)); 
mysql_free_result($resultado_busca3);
array_pop($Distrito);
array_multisort($Distrito, SORT_ASC);
//Se verifican errores
 if (isset($errors[1])) {echo $errors[1];}?>

<form method="post"  data-ajax="false"  name="form1" > 
            <input type="hidden" name="rut_compara" value="<?=$rowusr['rut']?>">


<table class="fondo_gris2" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" > <p class="america_bco">Mi Perfil</p>
      <table class="fondo_bco" width="90%" border="0" cellspacing="0" cellpadding="0" align=center>


   <tr>
    <td colspan="2" >
	
	<table class="fondo_bco" width="80%" border="0" cellspacing="0" cellpadding="0" align=center>

   <tr>
    <td colspan="2" class="america_14_gris">&nbsp;
	</td>
  </tr>
   <tr>
    <td colspan="2" class="america_14_gris">
	Nombre</td>
  </tr>
   <tr>
    <td colspan="2">
    <input type="text" name="text-basic" id="text-basic" value="<?php echo $rowusr['nom_ejecutiv'];?>" >
    </td>
  </tr>
  <tr>
    <td colspan="2" class="america_14_gris">Fono</td>
  </tr>
   <tr>
    <td colspan="2">
    <input type="text" name="text-basic2" id="text-basic2" value="<?php echo substr($rowusr['fono'],2);?>" >
    </td>
  </tr>

 <tr>
    <td colspan="2" class="america_14_gris">Mi Direccion</td>
  </tr>
   <tr>
    <td colspan="2">
    <input type="text" name="dir_ejecutiv" id="dir_ejecutiv" value="<?php echo $rowusr['direccion'];?>" >
    </td>
  </tr>
 





<tr><td class="america_14_gris"><label>Departamento</label></td></tr>
<tr>
    <td>
    <select class="ciudad_ejecutiv" name="idDepartamento" onChange="cambia_departamento()" >
    <option value="" selected="selected">Seleccione una Opcion</option>
    <?php foreach ($arrDepartamento as $dep) { ?>
    <option value="<?php echo $dep['idDepartamento']; ?>" <?php if(isset($idDepartamento)&&$idDepartamento==$dep['idDepartamento']) {echo 'selected="selected"';}elseif($dep['idDepartamento']==$rowusr['idDepartamento']){echo 'selected="selected"';}?>>
		<?php echo $dep['Nombre']; ?>
    </option>
    <?php } ?>                               
    </select>   
    </td>
</tr>

<tr><td class="america_14_gris"><label>Provincia</label></td></tr>
<tr>
    <td>
    <select class="ciudad_ejecutiv" name="idProvincia" onChange="cambia_provincia()" >
    <option value="" selected="selected">Seleccione una Opcion</option>
    <?php foreach ($arrProvincia as $provincia) { ?>
    <option value="<?php echo $provincia['idProvincia']; ?>" <?php if(isset($idProvincia)&&$idProvincia==$provincia['idProvincia']) {echo 'selected="selected"';}elseif($provincia['idProvincia']==$rowusr['idProvincia']){echo 'selected="selected"';}?>><?php echo $provincia['Nombre']; ?></option>
    <?php } ?>                                                       
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


<tr><td class="america_14_gris"><label>Distrito</label></td></tr>
<tr>
    <td>
    <select class="ciudad_ejecutiv" name="idDistrito"  >
    <option value="" selected="selected">Seleccione una Opcion</option>
    <?php foreach ($arrDistrito as $distrito) { ?>
    <option value="<?php echo $distrito['idDistrito']; ?>" <?php if(isset($idDistrito)&&$idDistrito==$distrito['idDistrito']) {echo 'selected="selected"';}elseif($distrito['idDistrito']==$rowusr['idDistrito']){echo 'selected="selected"';}?>><?php echo $distrito['Nombre']; ?></option>
    <?php } ?>                           
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


   <tr>
    <td class="america_14_gris">Recibir publicidad    <select name="publicidad" id="publicidad"  class="ciudad_ejecutiv" >
        <option value="Si" <?php if($rowusr['publicidad']=='Si'){echo 'selected="selected"';}?> >Si</option>
        <option value="No" <?php if($rowusr['publicidad']=='No' or $rowusr['publicidad']==''){echo 'selected="selected"';}?> >No</option>
    </select>
	</td>
    <td align="left">

    </td>
  </tr>


  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">

    <input type="hidden" name="id_usr" value="<?php echo $_GET['id'];?>" >
     <input name="submit_edit" type="submit" class="bot_orange1" value="GRABAR" />

    </td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>  
</td>
  </tr>
    <tr>

    <td>&nbsp;</td>
  </tr>
</table>      <td>&nbsp;</td>
  </tr>
</table>  
   
</form>


</body>
</html>