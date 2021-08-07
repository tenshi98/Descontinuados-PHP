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

	if ( !empty($_POST['region']) ) {
	$region			= $_POST['region'];
	}else{
	$region			= $_POST['h_region'];
	}
	if ( !empty($_POST['comuna']) ) {
		$comuna           = $_POST['comuna'];
	}else{
		$comuna           = $_POST['h_comuna'];
	}
	if ( !empty($_POST['linean']) )  {
		$linea            = $_POST['linean'];
	}else{
		$linea            = $_POST['h_linea'];
	}

		if ( !empty($_POST['alarma']) ) 		  $alarma 			= $_POST['alarma'];
	
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
		ciudad_ejecutiv = '$ciudad_ejecutiv',
		fono_alarma = '$alarma',
		comuna_linea = '$comuna',
		region = '$region',
		linea = '$linea'

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
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 //SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
ejecutivos.nom_ejecutiv AS nombre,
ejecutivos.radio AS radio,
ejecutivos.publicidad AS publicidad,
ejecutivos.fono_ejecutiv AS fono,
ejecutivos.ciudad_ejecutiv AS ciudad,
ejecutivos.dir_ejecutiv AS direccion,
ejecutivos.linea AS linea,
ejecutivos.comuna_linea AS comuna_linea,
ejecutivos.fono_alarma AS fono_alarma,
ejecutivos.rut AS rut,
ejecutivos.region AS region
FROM `ejecutivos`
WHERE ejecutivos.login = '".$login."'";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado); 
$sql01="select nombre_fantasia,responsable_servicio from lineas where id_linea=".$rowusr['linea'];
$resultado01 = mysql_query ($sql01, $dbConn);
$rowusr01 = mysql_fetch_assoc ($resultado01); 

				if ($rowusr01["nombre_fantasia"]<>'') {
					$nombre_linea = $rowusr01["nombre_fantasia"];
				}else{
					$nombre_linea = $rowusr01["responsable_servicio"];				
				}

$sql02="select descripcion from regiones where region=".$rowusr['region'];
$resultado02 = mysql_query ($sql02, $dbConn);
$rowusr02 = mysql_fetch_assoc ($resultado02); 

					$nombre_region = $rowusr02["descripcion"];
?>
<div class="widht80 fcenter perfil">
<?php  if (isset($errors[1])) {echo $errors[1];}?>


<h1>Cambio de datos Personales</h1>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<form method="post"  data-ajax="false"  > 
            <input type="hidden" name="h_region" value="<?=$rowusr['region']?>">
            <input type="hidden" name="h_comuna" value="<?=$rowusr['comuna_linea']?>">
            <input type="hidden" name="h_linea" value="<?=$rowusr['linea']?>">
            <input type="hidden" name="rut_compara" value="<?=$rowusr['rut']?>">

<table class="table_msg">

   <tr>
    <td >Mi nombre</td>
  </tr>
   <tr>
    <td >
    <input type="text" name="text-basic" id="text-basic" value="<?php echo $rowusr['nombre'];?>" >
    </td>
  </tr>
  <tr>
    <td >Fono</td>
  </tr>
   <tr>
    <td >
    <input type="text" name="text-basic2" id="text-basic" value="<?php echo $rowusr['fono'];?>" >
    </td>
  </tr>
      <tr>
    <td ><span color="#FF0000">Fono Alarma</span></td>
  </tr>
   <tr>
    <td >
    <input type="text" name="alarma" id="alarma" value="<?php echo $rowusr['fono_alarma'];?>" placeholder="Ej: 991234567/222454444">
    </td>
  </tr>
 <tr>
    <td >Mi Direccion</td>
  </tr>
   <tr>
    <td >
    <input type="text" name="dir_ejecutiv" id="dir_ejecutiv" value="<?php echo $rowusr['direccion'];?>" >
    </td>
  </tr>
  <tr>
    <td >Comuna</td>
  </tr>
   <tr>
    <td >
    <div class="disable_jquery_style">
    <select name="ciudad_ejecutiv" required="required" class="ciudad_ejecutiv">
		<option value='0'>Elija una ciudad</option>
		<?php //consulta
		$SQL_comuna=" SELECT comunas FROM comuna ORDER BY comunas ASC";
		$comuna=mysql_query($SQL_comuna,$dbConn); 
		while($fila_comuna=mysql_fetch_array($comuna)) {?>
		<option value="<?php echo $fila_comuna["comunas"]; ?>" <?php if($fila_comuna["comunas"]==$rowusr['ciudad']){echo 'selected="selected"';}?>><?php echo $fila_comuna["comunas"]; ?></option>
		<?php } ?>
	</select>
	</div>

    </td>
  </tr>
  </table>
  <h1>Datos Colectivo</h1>
<table class="table_msg">
<tr><td>

Seleccione (ORIGEN):<br></td></tr>
<tr>
<td>

<dl>
	<dd>Region </dd>
    <dd>
        <select id="region" name="region" class="ciudad_ejecutiv">
            <option value="<?=$rowusr['region']?>"><?echo $nombre_region?></option>
        </select>
    </dd>

	<dd><Comuna </dd>
    <dd>
        <select id="comuna" name="comuna" class="ciudad_ejecutiv">
            <option value="<?=$rowusr['comuna_linea']?>"><?=$rowusr['comuna_linea']?></option>
        </select>
    </dd>

	<!--dd>Linea </dd>
    <dd>
        <select id="linea" name="linea" class="ciudad_ejecutiv">
            <option value="<?=$rowusr['linea']?>"><?echo $nombre_linea?></option>
        </select>
    </dd-->
</dl>

</td>
</tr>
  <tr>
    <td ><span color="#FF0000">Numero de Linea</td>
  </tr>
   <tr>
    <td >
    <input type="text" name="linean" id="linean" value="<?php echo $rowusr['linea'];?>" >
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
    <td >
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