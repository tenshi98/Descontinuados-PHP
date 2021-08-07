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
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                 realizo la validacion del equipo con el cual se ingresa                                        */
/**********************************************************************************************************************************/
//capturo la identificacion del equipo
if(isset($_GET['IMEI']))  		$IMEI = $_GET['IMEI'];
$sql_id = "select login, direccion_img,id_ejecutiv from ejecutivos where IMEI='".$IMEI."'  AND estado_usr = '1' ";
$result_id = mysql_query($sql_id,$dbConn);
while($registro_id=mysql_fetch_array($result_id)) { 
	$usuario     = $registro_id["login"];
	$img_usuario = $registro_id["direccion_img"];
	$id_usuario  = $registro_id["id_ejecutiv"];
}
//se verifica que el equipo sea el mismo que con el que se ingreso la ultima vez
$revision = mysql_num_rows($result_id);
if($revision == 0){
	header( "Location: login.php".$w );
	die;
}
/**********************************************************************************************************************************/
/*                                                         Actualizo mi posicion                                                  */
/**********************************************************************************************************************************/
//actualizo mi posicion en la tabla de ejecutivos para asi obtener datos mas exactos
if ($_GET['longitud']!='' or $_GET['longitud']!=0 or $_GET['longitud']!='0.0') {
	$sql = "UPDATE ejecutivos
	SET lon=".$_GET['longitud'].", lat=".$_GET['latitud']."
	WHERE login='".$usuario."'";
	$resultado2 = mysql_query($sql,$dbConn);
}
/**********************************************************************************************************************************/
/*                                                  Cargo los datos necesarios                                                    */
/**********************************************************************************************************************************/
//cargo las invitaciones dentro de un array
$arrInvitaciones = array();
$query = "SELECT 
mensajes.id, 
mensajes.mensaje, 
mensajes.grupo, 
mensajes.fecha_hora, 
mensajes.estado, 
mensajes.link, 
mensajes.enviador, 
mensajes.puntos_visita,
ejecutivos.direccion_img AS imagen_joote
FROM mensajes 
LEFT JOIN ejecutivos ON ejecutivos.login = mensajes.enviador
WHERE mensajes.grupo='".$usuario."' or mensajes.grupo='roulette' AND mensajes.estado='1'
ORDER BY mensajes.id DESC 
LIMIT 0, 50 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrInvitaciones,$row );
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
<head>
	<meta charset="UTF-8">	
	<title>Mensajes</title> 
	<link href="css/estilo.css" rel="stylesheet" type="text/css" />
	<META http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=4,Transition=7)"/>
</head>
 
<body onLoad="actualiza()">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

	//funcion para obtener valores get
	function gup( name ){
	var regexS = "[\\?&]"+name+"=([^&#]*)";
	var regex = new RegExp ( regexS );
	var tmpURL = window.location.href;
	var results = regex.exec( tmpURL );
	if( results == null )
		return"";
	else
		return results[1];
	}
	function actualiza(){
		//se toma el parametro get de la longitud
		var longitud_param = gup('longitud');
		//si longitud va vacia ejecuto
		if(longitud_param==="0.0"){
			document.getElementById('update').innerHTML="<div class='alert-error' >Espere a que el GPS detecte su posicion</div>";
		} else{
			//aqui se muestra cuando presiona el boton de actualizar mensajes,esta condicion evita que se cargue por segunda vez los datos
			//document.getElementById('update').innerHTML="Active manualmente el GPS para obtener su ubicacion actual";
		}//cierre if(longitud_param==="")
	}// cierre function actualiza()

</script>

<div id="update"></div>

<div class="button_center" >
<a href="mensajes.php<?php echo $w; ?>">
	<input name="submit" type="button" value="Actualizar" id="post_button" />
</a>
</div>
	
<div class="msg_list" >
<?php foreach ($arrInvitaciones as $invitaciones) {
//se revisa desde donde viene la invitacion y se separan los caracteres	
$descglosa=$invitaciones["mensaje"];
$pos = strpos($descglosa, "Tienes una Invitacion al Chat de jOOtes");
if ($pos == false) {
	$invitacion=$invitaciones["mensaje"];
} else {
	list($sala, $invitacion) = split("-", $invitaciones["mensaje"], 2);
} 
//verifico quien envio el mensaje para establecer un estilo al box contenedor
if ($invitaciones["enviador"]=='roulette' or $invitaciones["enviador"]=='Jootes' or $invitaciones["enviador"]=='chatpush') {?>
<div class="msg_content" >
<table class="table_msg">
  <tr>
    <td width="25%" rowspan="2"><img src="http://www.jootes.cl/images/logo_chico.png" /></td>
    <td colspan="2"><p><?php echo $invitacion; ?></p></td>
  </tr>
  <tr>
    <td width="75%"><p><?php echo $invitaciones["fecha_hora"]; ?></p></td>
    <td><a class="msg_button" id="post_button" href="<?php echo $invitaciones["link"]?>">Ver</a></td>
  </tr>
</table>
</div>
<?php } else { ?>
<div class="msg_content_priv" >
<table class="table_msg">
  <tr>
    <td width="25%" rowspan="2"><img src="
	<?php
	if ($invitaciones["imagen_joote"]=='') {
		echo 'http://www.jootes.cl/app/images/usr.png';
	} else {
		echo $invitaciones["imagen_joote"];	 
	} 
	?>
    
    
    " /></td>
    <td colspan="2"><p><?php echo $invitacion; ?></p></td>
  </tr>
  <tr>
    <td width="75%"><p><?php echo $invitaciones["fecha_hora"]; ?></p></td>
    <td><a class="msg_button" id="post_button" href="chat.php?room=<?php echo $sala.'&id='.$id_usuario; ?>">Ver</a></td>
  </tr>
</table>


</div>
<?php } //fin del if ?>
<?php } //fin del foreach ?>
</div>

</body>
</html>