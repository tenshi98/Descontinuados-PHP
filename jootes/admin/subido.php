<?php
require_once('../nombre_pag.php');
require_once('../conexion.php');

$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "i" , $tiempo ); 
$seg= date ( "i" , $tiempo ); 
$hora=$hora.$min.$seg;

$Fecha=getdate(); 

$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes<9) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia<9) {
	$diadis="0".$Dia;
}else{
$diadis=$Dia;
}
$fecha=$Anio.$mesdis.$diadis;

$status = "";
$estado_subida=0;

if ("subir" == "subir") {
    // obtenemos los datos del archivo
	$tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];
	$archivo = $_FILES["archivo"]['name'];
	$prefijo = substr(md5(uniqid(rand())),0,6);


if ($tipo == ".flv" or $tipo == ".FLV" or $tipo="application/octet-stream"){

	if ($archivo != "") 
	{
		$destino_archivo =  "../videos/".$prefijo."_".$archivo;
		$para_grabar =  $prefijo."_".$archivo;
   			if (copy($_FILES['archivo']['tmp_name'],$destino_archivo)) {
       			$status = "archivo subido: <b>".$archivo."</b>";
				$archivo = str_replace(".flv", "", $para_grabar);
  				$foto_frame1="/var/www/".$residencia."/fotos_video/".$archivo.".jpg";
				$video_cambiar="http://".$nombreurl."/videos/". $archivo.".flv";
				$command = "ffmpeg -y -ss 3 -i ".$video_cambiar." -f mjpeg -vframes 1 -s 240x240 -an ".$foto_frame1;
				$fp = shell_exec($command);
				$sql="insert into dh_videos_correos (origen,destino,nombre_video,nombre,mensaje,asunto,fecha_video,hora_video,leido,estado,id_usuario,atachado,privado,tipo_video) values ('" . $correopagina . "','" . $correopagina . "','". $archivo ."','". $pagina ."','','".$_POST["asunto"]."','". $fecha ."','". $hora ."','0','1','1','','1','".$_POST["tipo_video"]."')";
				$res=mysql_query($sql,$base);
     		} else {
       			$status = "Error al subir el archivo";
				$estado_subida=1;
     		}
	} else 
	{
        $status = "Error al subir archivo";
		$estado_subida=1;
	}

}else 
	{
        $status = "Archivo no corresponde al formato requerido";
		$estado_subida=1;
	}

} 

	?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>..:: <?=$pagina?> ::..</title>
<link rel="icon" href="./favicon.ico" type="image/x-icon">
<link href="../estilo.css" rel="stylesheet" type="text/css" />
<link href="../estilo_bot.css" rel="stylesheet" type="text/css" />

</head>

<body>


<table align="center" width="990" border="0" cellspacing="0" cellpadding="0" background="http://<?=$nombreurl?>/images/body_body.png">
  <tr>
    <td align="center" valign="top" >
	
<?  require_once('../inc/cabecera_admin.incl'); ?>  
</td>
                </tr>

  <tr>
    <td align="center" valign="top"  height=10>
<?  require_once('../inc/bot_admin.incl'); ?>  

</td>
</tr>
<tr>
<td align="center" valign="top" height=600>
<!-- CONTENIDO -->	

<br><br><br><br>
<span class="arial_tit_calip_gde"> <?php echo $status; ?>  </span><br><br><br>


</div>




<!-- CONTENIDO -->
</td>
</tr>

</table>
<!--Pie -->			
			
			
		<?  require_once('../inc/pie.incl'); ?>  	
			
			
			
<!-- Pie -->
</body>
</html>
