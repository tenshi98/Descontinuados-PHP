<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
?>
<script type="text/javascript">
	//Ejecuto la consulta dentro del activity
	MainActivity.upload_imagen(<?php echo $_GET['upload_imagen'] ?>, "<?php echo $_GET['ruta_inicial'] ?>", "<?php echo $imei ?>", "<?php echo $gsm ?>", "<?php echo $roaming ?>", "<?php echo $lat  ?>", "<?php echo $lon ?>", "<?php echo $dispositivo ?>" );
</script> 
