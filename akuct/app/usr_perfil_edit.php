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
	if ( !empty($_POST['text-basic2']) ) 	      $fono 	        = $_POST['text-basic2'];
	if ( !empty($_POST['id_usr']) ) 	          $id_usr 	        = $_POST['id_usr'];
	if ( !empty($_POST['publicidad']) ) 	      $publicidad 	    = $_POST['publicidad'];
	if ( !empty($_POST['dir_ejecutiv']) ) 		  $dir_ejecutiv 	= $_POST['dir_ejecutiv'];
	if ( !empty($_POST['ciudad_ejecutiv']) ) 	  $ciudad_ejecutiv 	= $_POST['ciudad_ejecutiv'];
	if ( !empty($_POST['alarma']) ) 			  $alarma 			= $_POST['alarma'];
	
	// completamos la variable error si es necesario
	if ( empty($nombre) )    	$errors[1] 	  = '<div class="alert-error" >No ha ingresado un nombre</div>';
	
	// si no hay errores registramos los datos
	if ( empty($error) ) {
		
		// inserto los datos de registro en la db
		$busqueda= $busco_a + $busco_b;
		$query  = "UPDATE ejecutivos SET 
		radio           = '$radio',
		nom_ejecutiv    = '$nombre',
		fono_ejecutiv   = '$fono',
		publicidad      = '$publicidad',
		dir_ejecutiv    = '$dir_ejecutiv',
		fono_alarma = '$alarma',
		ciudad_ejecutiv = '$ciudad_ejecutiv'
		WHERE login     = '$login'";
		
		$result = mysql_query($query, $dbConn);
		
if ( !empty($_POST['rut_compara']) ) {
$sql ="update padron_electoral_CL set domicilio_2='{$dir_ejecutiv}', comuna_2='{$ciudad_ejecutiv}', fono_celular='{$fono}'  WHERE rut_compara='" . $_POST["rut_compara"] . "'";
$res=mysql_query($sql,$base_padron); 
}

		header( 'Location: usr_perfil.php?id='.$_GET['id'].'&imei='.$_GET['imei'].'&latitud='.$_GET['latitud'].'&longitud='.$_GET['longitud'] );
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
ejecutivos.nom_ejecutiv AS nombre,
ejecutivos.radio AS radio,
ejecutivos.publicidad AS publicidad,
ejecutivos.fono_ejecutiv AS fono,
ejecutivos.ciudad_ejecutiv AS ciudad,
ejecutivos.fono_alarma AS fono_alarma,
ejecutivos.rut AS rut,
ejecutivos.dir_ejecutiv AS direccion
FROM `ejecutivos`
WHERE ejecutivos.login = '".$login."'";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado); ?>


<div class="widht80 fcenter perfil">
<?php  if (isset($errors[1])) {echo $errors[1];}?>


<h1>Cambio de datos Personales</h1>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<form method="post"  data-ajax="false"  > 
            <input type="hidden" name="rut_compara" value="<?=$rowusr['rut']?>">
<table class="table_msg">
 
  <!--tr>
    <td colspan="2">Rango de alertas Cercanas es de (KM)</td>
  </tr>
  <tr>
    <td colspan="2">
    <input type="range" name="slider-2" id="slider-2" data-highlight="true" min="1" max="20" value="<?php echo $rowusr['radio'];?>">
    </td>
  </tr-->
   <tr>
    <td colspan="2">Mi nombre</td>
  </tr>
   <tr>
    <td colspan="2">
    <input type="text" name="text-basic" id="text-basic" value="<?php echo $rowusr['nombre'];?>" >
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
    <td colspan="2"><span color="#FF0000">Fono Alarma</span></td>
  </tr>
   <tr>
    <td colspan="2">
    <input type="text" name="alarma" id="alarma" value="<?php echo $rowusr['fono_alarma'];?>" placeholder="Ej: 991234567/222454444">
    </td>
  </tr>
 <tr>
    <td colspan="2">Mi Direccion</td>
  </tr>
   <tr>
    <td colspan="2">
    <input type="text" name="dir_ejecutiv" id="dir_ejecutiv" value="<?php echo $rowusr['direccion'];?>" >
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