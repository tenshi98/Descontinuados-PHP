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
$sql_id = "select login from ejecutivos where IMEI='".$IMEI."' AND estado_usr = '1' ";
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
/**********************************************************************************************************************************/
/*                                              Consulto por mis datos personales                                                 */
/**********************************************************************************************************************************/
//Verifico mis propios datos
$query ="SELECT
ejecutivos.id_ejecutiv AS idEjecutivo,
ejecutivos.busco AS busqueda,
ejecutivos.b_edad_a AS edad_desde,
ejecutivos.b_edad_b AS edad_hasta,
ejecutivos.fono_ejecutiv AS fono,
ejecutivos.login,
ejecutivos.radio
FROM ejecutivos 
WHERE login='".$login."'";
$resultado = mysql_query ($query, $dbConn);
$numeroRegistros=mysql_num_rows($resultado); 
$rowusr = mysql_fetch_assoc ($resultado);
//Verifico si la cantidad de registros es distinto de 0
if ($numeroRegistros==0) {?>
		<script language="javascript">
			alert("Los datos ingresados son erroneos, debera confirmar sus datos en el sitio, desintalar e instalar la aplicacion.");
			window.location = "http://<?php echo $nombreurl; ?>";
		</SCRIPT>
<?php
}
//calculo de la posicion
$lon             = $_GET['longitud'];//obtengo la longitud de la direccion
$lat             = $_GET['latitud'];//obtengo la latitud de la direccion
$var_kil         = 0.00450004500045;
$longitud_up     = $lon-($var_kil*$rowusr['radio']);
$longitud_down   = $lon+($var_kil*$rowusr['radio']);
$latitud_up      = $lat-($var_kil*$rowusr['radio']);
$latitud_down    = $lat+($var_kil*$rowusr['radio']);
//Realizo la consulta para llamar a x persona
//Verifico que el resultado no sea yo mismo
$z="WHERE ejecutivos.id_ejecutiv<>'".$rowusr['idEjecutivo']."'";
//Verifico las preferencias de sexo
if($rowusr['busqueda']=='1'){
$z .= "AND ejecutivos.soy = 'H' " ;	
} elseif($rowusr['busqueda']=='2')  {
$z .= "AND ejecutivos.soy = 'M' " ;		
} elseif($rowusr['busqueda']=='3')  { 
$z .= "" ;				 
}	
//Verifico el rango de edad
$z .= "AND ejecutivos.edad BETWEEN '".$rowusr['edad_desde']."' AND '".$rowusr['edad_hasta']."'" ;
//Verifico la longitud y la latitud
$z .= "AND ejecutivos.lon BETWEEN '".$longitud_up."' AND '".$longitud_down."'" ;
$z .= "AND ejecutivos.lat BETWEEN'".$latitud_up."' AND '".$latitud_down."'" ;
//Realizo la consulta	
$aleatorio="SELECT 
ejecutivos.id_ejecutiv, 
ejecutivos.nom_ejecutiv,
ejecutivos.ciudad_ejecutiv,
ejecutivos.soy,
ejecutivos.direccion_img AS img_perfil,
ejecutivos.fono_ejecutiv,
ejecutivos.fono_ejecutiv AS fono,
ejecutivos.login
FROM ejecutivos 
".$z."	
ORDER BY RAND() 
LIMIT 1";		  
$resultado2 = mysql_query ($aleatorio, $dbConn);
$rowcontacto = mysql_fetch_assoc ($resultado2);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Roulette</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="roulette_box">
<?php //////////////////////////////////////////////////
// Se verifica que no se han encontrado usuarios cerca, se desplega mensaje
if(!isset($rowcontacto['id_ejecutiv'])){ ?>
 
Lo sentimos, no hay nadie dentro de tu rango de <?php echo $rowusr['radio'];?> kilometros, 
puedes ampliar el rango en las preferencias de tu perfil.

<?php 
//Si se han encontrado datos se carga el cuadro de dialogo correspondiente
} else { ?>
<div class="llamada_txt">
<p>Te estamos comunicando con <?php echo $rowcontacto['nom_ejecutiv']; ?>, es de <?php echo $rowcontacto['ciudad_ejecutiv']; ?>,y es <?php 
	if($rowcontacto['soy']=='M'){
	echo 'Mujer';		
	} elseif($rowcontacto['soy']=='H')  {
	echo 'Hombre';					 
	}?>.</p>
</div>
<div class="perfil_img_box">
<?php if(!empty($rowcontacto['img_perfil'])&&$rowcontacto['img_perfil']!=''){ ?>
        <img src="<?php echo $rowcontacto['img_perfil']; ?>" width="200" />
        <?php } else { ?>
        <img src="images/usr.png" width="200" />
        <?php } ?>
</div>
<div>
<?php 
//se carga la pagina que hace la llamada
$a ='roulette_call.php';
$a .= '?telefono='.$rowusr['fono'] ;	
$a .= '&telefono_encontrado='.$rowcontacto['fono'] ;
$a .= '&id_usuario='.$rowusr['idEjecutivo'] ;	
$a .= '&latitud='.$_GET['latitud'] ;
$a .= '&longitud='.$_GET['longitud'] ;
$a .= '&sender='.$rowusr['login'] ;	
$a .= '&nombre_encontrado='.$rowcontacto['nom_ejecutiv'] ;
?>
<a href="<?php echo $a; ?>"><input type="button"  value="Llamada" id="post_button"/></a>
<br/>
<?php $room= substr(md5(uniqid(rand())),0,10);?>
<form id="chat" name="chat" method="POST" action="../notificaciones/envia_mensajes.php">
<input type="hidden" name=tag value="sendmessage">
<input type="hidden" name="message" id="message" value="<?php echo $room; ?>-Tienes una Invitacion al Chat de jOOtes" />
<input type="hidden" name="username" id="username" value='<?php echo $rowcontacto['login']; ?>'  >
<input type="hidden" name="enviador" id="enviador" value='<?php echo $login; ?>'  >
<input type="hidden" name="collapsekey" id="collapsekey" value='<?php echo $rowusr['idEjecutivo']; ?>'/>
<input type="hidden" name="link" id="link" value="chat.php?room=<?php echo $room; ?>" />
<input type="hidden" name="id_usuario" id="id_usuario" value='<?php echo $rowusr['idEjecutivo']; ?>' />
<input type="hidden" name="room" id="room" value='<?php echo $room; ?>' />
<input type="hidden" name="tipo" id="tipo" value='chat' />
<input type="hidden" name="puntos" id="puntos" value='0' />

<input type="submit"  value="Chat" id="post_button"/>

</form>
</div>


<?php }  ?>
</div>
</body>
</html>