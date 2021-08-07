<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
require_once('nombre_pag.php');
require_once('conexion.php');
function gen_fun_create($ext){ 
    return "imagecreatefrom".$ext; 
}
$altura="250";
if ($_SESSION['usuario']<>"") {
	
	$sql ="Select * from ejecutivos where id_ejecutiv='" . $_SESSION['usuario'] . "'";

}else{

	$sql ="SELECT * FROM ejecutivos WHERE login='" . $_POST["login"] . "' AND pass='" . $_POST["password"] . "'";

}
//echo $sql;
$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {

?>
		<script language="javascript">
			alert("Los datos ingresados son erroneos o su sesion expiro");
			window.location = "http://<?=$nombreurl?>";
		</SCRIPT>
<?
}else{
		while($perfil=mysql_fetch_array($res))
		{
	
		
		  $nombre=$perfil['nom_ejecutiv'];
		  $login=$perfil['login'];
		  $pass=$perfil['pass'];
		  $correo_ejecutivo=$perfil['mail_ejecutiv'];
		  $_SESSION['usuario']=$perfil['id_ejecutiv'];
		  $correo=$perfil['nom_ejecutiv'];
		  $foto=$perfil["foto"];

				$sql2="select * from filtros where id_usuario=". $_SESSION['usuario'];
				$res2=mysql_query($sql2,$base); 
					while($perfil2=mysql_fetch_array($res2))
					{
						$soy=$perfil2["soy"];
						$micondicion=$perfil2["micondicion"];
						$busco=$perfil2["busco"];
						$tucondicion=$perfil2["tucondicion"];
					}
		}
}

if ($_POST["elimina"]=="SI") {
    $consulta = "delete FROM imagenes WHERE imagen_id =".$_POST["imagen_id"];
    $resultado= @mysql_query($consulta,$base) or die(mysql_error());
}


$reporte= "";
if ($_POST["anota"]=="SI") {

if ( ! isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
    echo "ha ocurrido un error";
} else {
    //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
    //y que el tamano del archivo no exceda los 16mb
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384; //16mb es el limite de medium blob
     
    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
     
        //este es el archivo temporal
        $imagen_temporal  = $_FILES['imagen']['tmp_name'];  
		$prefijo = substr(md5(uniqid(rand())),0,6);

$altura="250";
//tomo el archivo y lo convierto a jpg
$imagen=getimagesize($_FILES['imagen']['tmp_name']);//obtenemos el tipo 
$extencion=image_type_to_extension($imagen[2],false);//aqui obtenemos la extencion de la imagen
$imagecreate=gen_fun_create($extencion);//generamos el nombre de la funcion a la que hay que llamar
$nimagent=$imagecreate($_FILES['imagen']['tmp_name']);//creamos la imagen con la funcion creada 
$archivo = $_FILES["imagen"]['name'];
imagejpeg($nimagent,'tmp/'.$prefijo."_".$archivo.'.jpg');//escribimos la imagen nueva como jpg 


// miramos el tamaño de la imagen original... 
          $img = @imagecreatefromjpeg('tmp/'.$prefijo."_".$archivo.'.jpg') or die("No se encuentra la imagen $camino$nombre<br>\n"); 

          $datos = getimagesize('tmp/'.$prefijo."_".$archivo.'.jpg') or die("Problemas con $camino$nombre<br>\n"); 
 
          // intentamos escalar la imagen original a la medida que nos interesa 
          $ratio = ($datos[1] / $altura); 
          $anchura = round($datos[0] / $ratio); 
 
          // esta será la nueva imagen reescalada 
          $thumb = imagecreatetruecolor($anchura,$altura); 
 
          // con esta función la reescalamos 
          imagecopyresampled ($thumb, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]); 

 // HASTA AQUI*/
		$destino_archivo =  "tmp/".$prefijo."_".$archivo;
		$archivo_graba =  "tmp/".$prefijo."_".$archivo;
if (imagejpeg($thumb,'tmp/'.$prefijo."_".$archivo)) {
        //este es el tipo de archivo
        $tipo = $_FILES['imagen']['type'];
        //leer el archivo temporal en binario
        $fp     = fopen("tmp/".$prefijo."_".$archivo, 'r+b');
        $data = fread($fp, filesize('tmp/'.$prefijo."_".$archivo));
        fclose($fp);
        //escapar los caracteres
        $data = mysql_escape_string($data);

        $resultado = mysql_query("INSERT INTO imagenes (imagen, tipo_imagen,usuario) VALUES ('$data', '$tipo',".$_SESSION['usuario'].")",$base);
}
        if ($resultado){
            $reporte= "el archivo ha sido copiado exitosamente";
			$command = "rm ".$residencia_completa.$destino_archivo."*";
			$fp = shell_exec($command);

        } else {
            $reporte= "ocurrio un error al copiar el archivo.";
        }
    } else {
        $reporte= "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
    }
}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
    <script src="js/login.js"></script>
    
    <link rel="stylesheet" type="text/css" href="js/jquery.slider.css" />
  <!--[if IE 6]>
  <link rel="stylesheet" type="text/css" href="javascript/slider/themes/default/jquery.slider.ie6.css" />
  <![endif]-->

<script type="text/javascript" src="http://<?=$nombreurl?>/js/jquery.min.js"></script>
<script type="text/javascript" src="http://<?=$nombreurl?>/js/jquery.slider.min.js"></script>

</head>

<body onload="MM_preloadImages('http://<?=$nombreurl?>/images/face_bot_up.png','images/twit_bot_up.png')">
	<?   
    // BOTON FLOTANTE --->
       // require_once('inc/boton_flotante.incl');         
     // BOTON FLOTANTE --->

?>
<div id="nonFooter" width="100%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#000000">
	
	<?   
     // Cabecera --->
        require_once('inc/cabecera_int.incl');         
     // Cabecera --->
?>

    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" ><table width="970" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_bca esquina_red">
      <tr>
        <td align="center" valign="middle">
        
        <!-- Contenido -->
        
 <table width="990" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_top">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="35%" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
              <td height="350" align="right" valign="middle"><img src="images/qr.jpg"  /></td>
            </tr>
        </table></td>
        <td width="65%" align="right" valign="top"><table width="693" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top"><table id="table28" border="0" cellpadding="0" cellspacing="0" width="600">
              <tbody>
                <tr>
                  <td height="200" colspan="3" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="arial_tit_gris" id="table29">
                    <tbody>
                      <tr>
                        <td height="100" align="left" valign="middle"><span class="cuerpo_gris">Sube tus Fotograf&iacute;as.</span></td>
                        </tr>
                      </tbody>
                  </table>

                    <table id="table30" border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tbody>
                        <tr>
<?
$consulta = "SELECT * FROM imagenes WHERE usuario =".$_SESSION['usuario'];
$res_imagen=mysql_query($consulta,$base); 
$numeroRegistros2=mysql_num_rows($res_imagen); 
if($numeroRegistros2>0) {
	while($datos=mysql_fetch_array($res_imagen))
		{
    $imagen_id = $datos['imagen_id'];
	$imagen = $datos['imagen'];
    $tipo = $datos['tipo_imagen'];
 ?>
                          <td valign=bottom align=left>
					  		<form id="elimina<?=$imagen_id?>"  action="sube_foto.php" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="elimina" id="elimina" value="SI">
								<input type="hidden" name="imagen_id" id="imagen_id" value=<?=$imagen_id?>>
								<?php
								header("Content-type: $tipo");
								echo '<img src="imagen.php?id=' . $imagen_id . '" width="100" />';
								?>
			
								<input name="button5" type="submit" class="google_bot_txt_bco esquina_red_3px padding_10" id="button5" value="X" />
								</form>
							
		<?}}?>				
							
							
							</td>
                          </tr>
                        </tbody>
                    </table>

                    <table id="table30" border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tbody>
					  <tr>
                          <td height=75>
						  </td>
                          </tr>
                        <tr>
                          <td >
						  <?if($numeroRegistros2>4) {?>
								<span class="cuerpo_gris">Para subir Fotograf&iacute;as deber&aacute; eliminar alguna (m&aacute;x 5).</span>
						  <?}else{?>
								<span class="cuerpo_gris"><center><?=$reporte?></center></span><br>
						  		<form id="carga" action="sube_foto.php" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="anota" id="anota" value="SI">
								<span class="cuerpo_gris">Imagen:</span>
								<input type="file" name="imagen" id="imagen" class="google_bot_txt_bco esquina_red_3px padding_10" />
								<input name="button5" type="submit" class="google_bot_txt_bco esquina_red_3px padding_10" id="button5" value="Subir" />
								</form>
							
							<?}?>
							
							
							</td>
                          </tr>
                        </tbody>
                    </table>
					
					</td>
                </tr>
                </tbody>
            </table></td>
          </tr>
        </table></td>
      </tr>
  </table></td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle">&nbsp;</td>
  </tr>

</table>




        
        <!--Contenido -->
        
        
        </td>
      </tr>
  </table>
  </td>
  </tr>
</table>

<!--Tabla de margen frente al footer -->

<table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="80"></td>
  </tr>
</table>

<!--Fin de la Tabla de margen frente al footer -->

</div> 
<!-- Footer, debe estar dentro del Div-->

<?  require_once('./inc/footer.incl');  ?> 

</body>
</html>
