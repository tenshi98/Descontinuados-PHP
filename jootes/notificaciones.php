<?php 
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once('conexion.php');
require_once('nombre_pag.php');
/**********************************************************************************************************************************/
/*                                 realizo la validacion del equipo con el cual se ingresa                                        */
/**********************************************************************************************************************************/
//capturo la identificacion del equipo
if(isset($_GET['id']))  		$id_gcm = $_GET['id'];
$sql_id = "select login from ejecutivos where gcmcode='".$id_gcm."'";
$result_id = mysql_query($sql_id,$base);
while($registro_id=mysql_fetch_array($result_id)) { 
	$usuario=$registro_id["login"];
}
//se verifica que el equipo sea el mismo que con el que se ingreso la ultima vez
$revision = mysql_num_rows($result_id);
if($revision == 0){
	header( "Location: app/login.php?id=".$_GET['id'] );
	die;
}
/**********************************************************************************************************************************/
/*                                 realizo la validacion del equipo con el cual se ingresa                                        */
/**********************************************************************************************************************************/
//se traen los datos para hacer el listado de los mensajes pendientes
$formulario=0;
//$sql2="SELECT * FROM mensajes WHERE estado=0 ORDER BY id DESC LIMIT 0, 50"; 
$sql2="SELECT * FROM mensajes r WHERE (grupo='".$usuario."' or grupo='roulette') and NOT EXISTS (SELECT * FROM bloqueos re      WHERE r.enviador = re.bloqueado AND	re.bloqueador = '".$usuario."') and estado=1 ORDER BY id DESC LIMIT 0, 50";		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
<head>
	<meta charset="UTF-8">	
	<title>Notificaciones</title> 
	<link rel="stylesheet" type="text/css" href="styles.css"/>
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
			document.getElementById('update').innerHTML="Active manualmente el GPS para obtener su ubicacion actual";
		} else if(longitud_param!=="") {
			var msg_param = gup('msg');
			var id_param = gup('id');
			var longitud_param = gup('longitud');
			var latitud_param = gup('latitud');
			var login_param =  '<?php echo $usuario ?>';
			//document.getElementById('update').innerHTML="msg="+msg_param+"<br/>id="+id_param+"<br/>longitud="+longitud_param+"<br/>latitud="+latitud_param;
			$("#update").load("notificaciones_up.php?msg="+msg_param+"&id="+id_param+"&longitud="+longitud_param+"&latitud="+latitud_param+"&login="+login_param);

		} else{
			//aqui se muestra cuando presiona el boton de actualizar mensajes,esta condicion evita que se cargue por segunda vez los datos
			document.getElementById('update').innerHTML="recien actualizado";
			
		}//cierre if(longitud_param==="")

	}// cierre function actualiza()

</script>

<div id="update" ></div>
 
<div id="content1" class="content">

<div id = "form" class="center">

    <div align=center>
    <form method="POST" action="notificaciones.php?id=<?php echo $id_gcm.'&msg='.$_GET['msg'].'&latitud='.$_GET['latitud'].'&longitud='.$_GET['longitud'].'&login='.$_GET['login'].'&passsword='.$_GET['password']; ?>"  >
    <input  type="image" src="http://<?php echo $nombreurl?>/images/actualiza_jootes.png" name="envia" >
    </form>  
    </div>
    

<?php
$contador=0;

$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) { 
////////////////////////////////////////////////////////
//$contador=$contador+1;
$contador++;

$descglosa=$registro["mensaje"];
$pos = strpos($descglosa, "Tienes una Invitacion al Chat de jOOtes");
if ($pos == false) {
	$invitacion=$registro["mensaje"];
}else{
	list($sala, $invitacion) = split("-", $registro["mensaje"], 2);
}

//$formulario=$formulario+1;
$formulario++;
if ($registro["enviador"]=='roulette' or $registro["enviador"]=='jootes' or $registro["enviador"]=='chatpush') {?>
			<div class="callout border-callout">
			<form name="formuroulete<?php echo $formulario?>" method="post" action="<?php echo $registro["link"]?>">
<?php }
if (trim($invitacion)=="Tienes una Invitacion al Chat de jOOtes") {
	$sql2201_1="SELECT id_ejecutiv FROM ejecutivos WHERE login='".$registro["grupo"]."'"; 
		$nom01_1=mysql_query($sql2201_1,$base);
		while($registro_nom01_1=mysql_fetch_array($nom01_1)) {
			$id_ejecutiv_1=$registro_nom01_1["id_ejecutiv"];
		}
	?>
			<div class="callout_priv border-callout_priv">
			 <form name="formuchat<?php echo $formulario; ?>" method="post" action="chat/index.php?room=<?php echo $sala; ?>&id=<?php echo $id_ejecutiv_1; ?>">
<?php }

if (trim($invitacion)=="Tienes una Invitacion al Chat de jOOtes") {
$sql2201="SELECT id_ejecutiv FROM ejecutivos WHERE login='".$registro["enviador"]."'"; 
		$nom01=mysql_query($sql2201,$base);
		while($registro_nom01=mysql_fetch_array($nom01)) {
			$id_ejecutiv=$registro_nom01["id_ejecutiv"];
		}
		$consulta = "SELECT * FROM imagenes WHERE usuario =".$id_ejecutiv." ORDER BY RAND() LIMIT 1";
		$res_imagen=mysql_query($consulta,$base); 
		$numeroRegistros2=mysql_num_rows($res_imagen); 
		if($numeroRegistros2>0) {
			while($datos=mysql_fetch_array($res_imagen))
			{
				$imagen_id = $datos['imagen_id'];
				$imagen = $datos['imagen'];
				$tipo = $datos['tipo_imagen'];
			}?>
		
		<div align=center><img src="http://www.jootes.cl/imagen.php?id=<?=$imagen_id?>" height="80" /></div>
		<?php }else{ ?>
		<div align=center><img src="http://www.jootes.cl/images/apk.png" height="50" width="125" /></div>
		<?php } ?>
<?php }else{ ?>
		<div align=center><img src="http://www.jootes.cl/images/logo_chico.png" height="50" width="125" /></div>
<?php } ?>
	<div align=center width=70%>
	<input name="chatat" type="submit"  id="button5"  value="<?php echo $invitacion; ?> " />
	<br>
			<div class="fecha"><?php echo $registro["fecha_hora"]; ?></div>
	</div>	
</div>
	</form>

<?php }?>
</div></div>
</body>
</html>