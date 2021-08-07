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
/*                                          Se filtran las entradas para evitar ataques                                                  */
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
$sql_id = "select login, id_ejecutiv from ejecutivos where IMEI='".$IMEI."'  AND estado_usr = '1'";
$result_id = mysql_query($sql_id, $dbConn);
//se verifica que el equipo sea el mismo que con el que se ingreso la ultima vez
$revision = mysql_num_rows($result_id);
if($revision == 0){
	header( "Location: login.php".$w );
	die;
} else {
	while($registro_id=mysql_fetch_array($result_id)) { 
	$login       = $registro_id["login"];
	$id_ejecutiv = $registro_id["id_ejecutiv"];
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
<title>Documento sin título</title>
<link href="css/reset.css"  rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="height100 widht100">
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id222']) ) {  ?>


 

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  { 
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$arrChat = array();
$query = "SELECT
ejecutivos.nom_ejecutiv AS nombre_cliente,
ejecutivos.direccion_img AS imagen_perfil,
ejecutivos_chats.fecha AS fecha,
ejecutivos.fono_ejecutiv AS fono_cliente,
mandatory.fono_ejecutiv AS fono_mandante,
mandatory.id_ejecutiv AS id_mandante,
mandatory.login AS login_mandante,
ejecutivos.nom_ejecutiv AS nombre_cliente


FROM ejecutivos_chats
LEFT JOIN ejecutivos            ON ejecutivos.id_ejecutiv   =  ejecutivos_chats.cliente
LEFT JOIN ejecutivos mandatory  ON mandatory.id_ejecutiv    =  ejecutivos_chats.mandante


WHERE ejecutivos_chats.mandante='".$id_ejecutiv."'
GROUP BY ejecutivos.nom_ejecutiv, ejecutivos_chats.fecha 
ORDER BY ejecutivos_chats.fecha DESC
LIMIT 20 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrChat,$row );
} 

?>

<div class="msg_list" >
<div class="button_center" >
<p style="font-size:14px !important">Mis ultimas conversaciones</p>
</div>
<?php foreach ($arrChat as $row) { ?>
<?php 
//se carga la pagina que hace la llamada
$a ='roulette_call.php';
$a .= '?telefono='.$row['fono_mandante'] ;	
$a .= '&telefono_encontrado='.$row['fono_cliente'] ;
$a .= '&id_usuario='.$row['id_mandante'] ;
$a .= '&latitud='.$_GET['latitud'] ;
$a .= '&longitud='.$_GET['longitud'] ;
$a .= '&sender='.$row['login_mandante'] ;	
$a .= '&nombre_encontrado='.$row['nombre_cliente'] ;
?>

<div class="msg_content_priv" >
<table class="table_msg">
  <tr>
    <td width="25%" rowspan="2"><img src="<?php echo $row['imagen_perfil']; ?>" /></td>
    <td colspan="2"><p><?php echo $row['nombre_cliente']; ?></p></td>
  </tr>
  <tr>
    <td width="75%"><p><?php echo $row['fecha']; ?></p></td>
    <td><a class="msg_button" id="post_button" href="<?php echo $a; ?>">Llamar</a></td>
  </tr>
</table>
</div>

<?php } ?>
</div>


<?php } ?>
</div>
</body>
</html>