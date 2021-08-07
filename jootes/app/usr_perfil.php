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
/*                                                         Actualizo mi posicion                                                  */
/**********************************************************************************************************************************/
//actualizo mi posicion en la tabla de ejecutivos para asi obtener datos mas exactos
if ($_GET['longitud']!='' or $_GET['longitud']!=0 or $_GET['longitud']!='0.0') {
	$sql = "UPDATE ejecutivos
	SET lon=".$_GET['longitud'].", lat=".$_GET['latitud']."
	WHERE login='".$login."'";
	$resultado2 = mysql_query($sql,$dbConn);
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
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
ejecutivos.direccion_img AS img_usr,
ejecutivos.nom_ejecutiv AS nick,
ejecutivos.login AS email,
ejecutivos.edad AS edad,
ejecutivos.soy AS genero,
ejecutivos.busco AS busqueda,
ejecutivos.radio AS radio,
ejecutivos.lat AS latitud,
ejecutivos.lon AS longitud,
ejecutivos.b_edad_a AS edad_desde,
ejecutivos.b_edad_b AS edad_hasta,
ejecutivos.fono_ejecutiv AS fono,
ejecutivos.ciudad_ejecutiv AS ciudad
FROM `ejecutivos`
WHERE ejecutivos.login = '".$login."'";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado); ?>
<div class="widht80 fcenter perfil">

<table class="table_msg">
  <tr>
    <td><h1>Detalles de mi perfil</h1></td>
  </tr>
  <tr>
    <td height="196">
    <div class="perfil_img_box2">
    	<?php if($rowusr['img_usr']!=""){?>
        <img src="<?php echo $rowusr['img_usr']; ?>"  />
        <?php }else{?>
         <img src="images/usr.png" />
        <?php }?>
    </div>
    </td>
  </tr>
  <tr>
    <td>
    <h1>Datos Basicos</h1>
    <p><strong>Nick Actual : </strong><?php echo $rowusr['nick']; ?></p>
    <p><strong>Email : </strong><?php echo $rowusr['email']; ?></p>
    <p><strong>Edad : </strong><?php echo $rowusr['edad']; ?></p>
    <p><strong>Ciudad : </strong><?php echo $rowusr['ciudad']; ?></p>
    <p><strong>Fono : </strong><?php echo $rowusr['fono']; ?></p>
    </td>
  </tr>
  <tr>
    <td>
    <h1>Preferencias</h1>
    <p><strong>Soy : </strong>
		<?php if ($rowusr['genero']=='H') {?>
        	Hombre
        <?php } elseif ($rowusr['genero']=='M'){?>
        	Mujer
        <?php } else {?>
        	No indica
        <?php }?>
	</p>
    <p><strong>Busco : </strong>
		<?php if($rowusr['busqueda']=='1'){?>
        	Hombres
        <?php } elseif($rowusr['busqueda']=='2')  { ?>
        	Mujeres
        <?php } elseif($rowusr['busqueda']=='3')  { ?>
        	Hombres y mujeres
        <?php } else { ?>
        	A Nadie
        <?php }?>
        desde <?php echo $rowusr['edad_desde']; ?> años hasta <?php echo $rowusr['edad_hasta']; ?> años
	</p>  
    </td>
  </tr>
  <tr>
    
    <?php if ($rowusr['latitud']!=0){?>
    <td height="239">
    <h1>Mi ubicacion actual</h1>
    <p><strong>Tu radio de busqueda es de  </strong><?php echo $rowusr['radio'] ?>  Kilometros</p>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAHhzikxCQyRAS8ryQoB75mRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxQiqBRnE1Iky5sZfKGxzYbUanZ0HA" type="text/javascript"></script>
    <script type="text/javascript">  
      
    function inicializar() {  
      
        if (GBrowserIsCompatible()) {  
            var map = new GMap2(document.getElementById("map"));  
            map.setCenter(new GLatLng(<?php echo $rowusr['latitud']; ?>, <?php echo $rowusr['longitud']; ?>), 15);  
        }  
        map.addOverlay(new GMarker(new GLatLng(<?php echo $rowusr['latitud']; ?>, <?php echo $rowusr['longitud']; ?>)));  
    }  
      
    </script> 
    <div id="map" style="width:100%; height:350px; margin-top:10px; ">  
    <script type="text/javascript">inicializar();</script>  
    </div>
    
	</td>	
	<?php } else {?>
    <td>
    <h1>Mi ubicacion actual</h1>
    <p><strong>Tu radio de busqueda es de  </strong><?php echo $rowusr['radio'] ?>  Kilometros</p>
    <div class="alert-error" >Activa tu GPS para mostrar tu ubicacion en el mapa</div>
	</td>
    <?php } ?>  
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <div class="widht80 fcenter">
		<a href="usr_perfil_edit.php<?php echo $w; ?>&perfil=<?php echo $login; ?>"><input name="submit" type="button" value="Modificar Datos" id="post_button" /></a>
	</div>
    </td>
  </tr>
</table>



</div>


</div>
</body>
</html>