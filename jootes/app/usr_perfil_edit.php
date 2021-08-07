<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'url.php';
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
if(isset($_GET['IMEI']))  		$IMEI = $_GET['IMEI'];
$sql_id = "select login from ejecutivos where IMEI='".$IMEI."'  AND estado_usr = '1' ";
$result_id = mysql_query($sql_id, $dbConn);
//se verifica que el equipo sea el mismo que con el que se ingreso la ultima vez
$revision = mysql_num_rows($result_id);
if($revision == 0){
	header( "Location: login.php".$w );
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
	if ( !empty($_POST['radio-choice-h-1']) ) 	  $soy 	            = $_POST['radio-choice-h-1'];
	if ( !empty($_POST['flip-1']) ) 	          $busco_a 	        = $_POST['flip-1'];
	if ( !empty($_POST['flip-2']) ) 	          $busco_b 	        = $_POST['flip-2'];
	if ( !empty($_POST['slider-1']) ) 	          $edad 	        = $_POST['slider-1'];
	if ( !empty($_POST['range-1a']) ) 	          $edad_desde       = $_POST['range-1a'];
	if ( !empty($_POST['range-1b']) ) 	          $edad_hasta       = $_POST['range-1b'];
	if ( !empty($_POST['slider-2']) ) 	          $radio 	        = $_POST['slider-2'];
	if ( !empty($_POST['text-basic']) ) 	      $nick 	        = $_POST['text-basic'];
	if ( !empty($_POST['text-basic2']) ) 	      $fono 	        = $_POST['text-basic2'];
	if ( !empty($_POST['id_usr']) ) 	          $id_usr 	        = $_POST['id_usr'];
	if ( !empty($_POST['publicidad']) ) 	      $publicidad 	    = $_POST['publicidad'];
	if ( !empty($_POST['ciudad_ejecutiv']) ) 	  $ciudad_ejecutiv 	= $_POST['ciudad_ejecutiv'];
	
	// completamos la variable error si es necesario
	if ( empty($nick) )    	$errors[1] 	  = '<div class="alert-error" >No ha ingresado un nick</div>';
	
	// si no hay errores registramos los datos
	if ( empty($error) ) {
		
		// inserto los datos de registro en la db
		$busqueda= $busco_a + $busco_b;
		$query  = "UPDATE ejecutivos SET 
		soy             = '$soy',
		busco           = '$busqueda',
		edad            = '$edad',
		b_edad_a        = '$edad_desde',
		b_edad_b        = '$edad_hasta',
		radio           = '$radio',
		nom_ejecutiv    = '$nick',
		fono_ejecutiv   = '$fono',
		publicidad      = '$publicidad',
		ciudad_ejecutiv = '$ciudad_ejecutiv'
		WHERE login     = '$login'";
		
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: usr_perfil.php'.$w );
		die;
		
	}
		
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Perfil</title>
<link href="css/reset.css"  rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="height100 widht100">
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 //SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
ejecutivos.nom_ejecutiv AS nick,
ejecutivos.radio AS radio,
ejecutivos.soy AS genero,
ejecutivos.busco AS busqueda,
ejecutivos.edad AS edad,
ejecutivos.b_edad_a AS edad_desde,
ejecutivos.b_edad_b AS edad_hasta,
ejecutivos.publicidad AS publicidad,
ejecutivos.fono_ejecutiv AS fono,
ejecutivos.ciudad_ejecutiv AS ciudad
FROM `ejecutivos`
WHERE ejecutivos.login = '".$login."'";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado); ?>


<div class="widht80 fcenter perfil">
<?php  if (isset($errors[1])) {echo $errors[1];}?>


<h1>Cambio de datos Personales</h1>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script> 
<form method="post"  data-ajax="false"  > 
<table class="table_msg">
  <tr>
    <td colspan="2">Soy</td>
  </tr>
  <tr>
    <td colspan="2">
    <fieldset data-role="controlgroup" data-type="horizontal">
        <input type="radio" name="radio-choice-h-1" id="radio-choice-h-2a" value="H" <?php if($rowusr['genero']=='H'){echo 'checked="checked"';}?> >
        <label for="radio-choice-h-2a">Hombre</label>
        <input type="radio" name="radio-choice-h-1" id="radio-choice-h-2b" value="M" <?php if($rowusr['genero']=='M'){echo 'checked="checked"';}?> >
        <label for="radio-choice-h-2b">Mujer</label>
    </fieldset>    
    </td>
  </tr>
  <tr>
    <td colspan="2">Busco</td>
  </tr>
  <?php if($rowusr['busqueda']=='1'){?>
  <tr>
    <td width="90%">Hombres</td>
    <td width="10%">
    <select name="flip-1" id="flip-1" data-role="slider">
        <option value="0"  >Off</option>
        <option value="1" selected="selected" >On</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Mujeres</td>
    <td>
    <select name="flip-2" id="flip-1" data-role="slider">
        <option value="0">Off</option>
        <option value="2">On</option>
    </select>
    </td>
  </tr>
  <?php } elseif($rowusr['busqueda']=='2')  { ?>
  <tr>
    <td>Hombres</td>
    <td>
    <select name="flip-1" id="flip-1" data-role="slider">
        <option value="0"  >Off</option>
        <option value="1"  >On</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Mujeres</td>
    <td>
    <select name="flip-2" id="flip-1" data-role="slider">
        <option value="0">Off</option>
        <option value="2" selected="selected" >On</option>
    </select>
    </td>
  </tr>
  <?php } elseif($rowusr['busqueda']=='3')  { ?>
  <tr>
    <td>Hombres</td>
    <td>
    <select name="flip-1" id="flip-1" data-role="slider">
        <option value="0"  >Off</option>
        <option value="1" selected="selected" >On</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Mujeres</td>
    <td>
    <select name="flip-2" id="flip-1" data-role="slider">
        <option value="0">Off</option>
        <option value="2" selected="selected" >On</option>
    </select>
    </td>
  </tr>
  <?php } else { ?>
  <tr>
    <td>Hombres</td>
    <td>
    <select name="flip-1" id="flip-1" data-role="slider">
        <option value="0"  >Off</option>
        <option value="1" >On</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Mujeres</td>
    <td>
    <select name="flip-2" id="flip-1" data-role="slider">
        <option value="0">Off</option>
        <option value="2">On</option>
    </select>
    </td>
  </tr>
  <?php } ?>
   
  <tr>
    <td colspan="2">Mi edad</td>
  </tr>
  <tr>
    <td colspan="2">
    <input type="range" name="slider-1" id="slider-2" data-highlight="true" min="18" max="75" value="<?php echo $rowusr['edad'];?>">
    </td>
  </tr>
  <tr>
    <td colspan="2">Rango de edad de busqueda</td>
  </tr>
  <tr>
    <td colspan="2">
     <div data-role="rangeslider">
        <input type="range" name="range-1a" id="range-1a" min="18" max="75" value="<?php echo $rowusr['edad_desde'];?>">
        <input type="range" name="range-1b" id="range-1b" min="18" max="75" value="<?php echo $rowusr['edad_hasta'];?>">
    </div>
    </td>
  </tr>
  <tr>
    <td colspan="2">Rango de busqueda (KM)</td>
  </tr>
  <tr>
    <td colspan="2">
    <input type="range" name="slider-2" id="slider-2" data-highlight="true" min="1" max="20" value="<?php echo $rowusr['radio'];?>">
    </td>
  </tr>
   <tr>
    <td colspan="2">Mi nick</td>
  </tr>
   <tr>
    <td colspan="2">
    <input type="text" name="text-basic" id="text-basic" value="<?php echo $rowusr['nick'];?>" >
    </td>
  </tr>
  <tr>
    <td colspan="2">Fono</td>
  </tr>
   <tr>
    <td colspan="2">
    <input type="text" name="text-basic2" id="text-basic" value="<?php echo $rowusr['fono'];?>" >
    </td>
  </tr>
  
  <tr>
    <td colspan="2">Comuna</td>
  </tr>
   <tr>
    <td colspan="2">
    <div class="disable_jquery_style">
    <select name="ciudad_ejecutiv" required="required" class="ciudad_ejecutiv">
		<option value='0'>Elija una ciudad</option>
		<?php //consulta
		$SQL_comuna=" SELECT comunas FROM comuna where reg='13' ORDER BY comunas ASC";
		$comuna=mysql_query($SQL_comuna,$dbConn); 
		while($fila_comuna=mysql_fetch_array($comuna)) {?>
		<option value="<?php echo $fila_comuna["comunas"]; ?>" <?php if($fila_comuna["comunas"]==$rowusr['ciudad']){echo 'selected="selected"';}?>><?php echo $fila_comuna["comunas"]; ?></option>
		<?php } ?>
	</select>
	</div>

    </td>
  </tr>
  
   <tr>
    <td>Recibir publicidad</td>
    <td>
    <select name="flip-3" id="flip-1" data-role="slider">
        <option value="Si" <?php if($rowusr['publicidad']=='Si'){echo 'selected="selected"';}?> >Si</option>
        <option value="No" <?php if($rowusr['publicidad']=='No'){echo 'selected="selected"';}?> >No</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
    <div class="disable_jquery_style">
    <input type="hidden" name="id_usr" value="<?php echo $_GET['id'];?>" >
     <input name="submit_edit" type="submit"  id="post_button" />
    </div>
    </td>
  </tr>
</table>  

   
</form>


</div> 

</div>
</body>
</html>