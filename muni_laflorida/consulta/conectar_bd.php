<?php

$conexio;
function conectar_bd()
{
    global $conexio;
    //Definir datos de conexion con el servidor MySQL
    $elUsr = "root";
    $elPw  = "petland";
    $elServer ="190.98.210.42";
    $laBd = "consultavecinos_laflorida";
     
    //Conectar
    $conexio = mysql_connect($elServer, $elUsr , $elPw, "TRUE") or die (mysql_error());
     
    //Seleccionar la BD a utilizar
    mysql_select_db($laBd, $conexio ) or die (mysql_error());
}  

?>