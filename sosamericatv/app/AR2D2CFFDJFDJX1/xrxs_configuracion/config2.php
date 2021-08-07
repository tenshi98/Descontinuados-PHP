<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/* Configuracion Base de la datos */
/**********************************/
//conexion a la base de datos
$dbConn = mysql_connect("localhost","root","petland");
if (!$dbConn){
  die('Error en la coneccion: ' . mysql_error());
}
//realizo la conexion a la base de datos
mysql_select_db("sosamerica", $dbConn);

$conexion_padron=0;
 if (!($base_padron=mysql_connect("190.98.210.41","sosclick","petland"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos padron.";
	  $conexion_padron=1;
      exit();
   }
   if (!mysql_select_db("sosclick_general",$base_padron)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos padron.";
      exit();
   }

	
?>