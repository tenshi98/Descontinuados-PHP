<?php

$conexio;
function conectar_bd()
{
    global $conexio;
    //Definir datos de conexion con el servidor MySQL
    $elUsr = "consvecino";
    $elPw  = "petland2015nph";
    $elServer ="190.98.210.41";
    $laBd = "consultavecinos_laflorida";
     
    //Conectar
    $conexio = mysql_connect($elServer, $elUsr , $elPw, "TRUE") or die (mysql_error());
     
    //Seleccionar la BD a utilizar
    mysql_select_db($laBd, $conexio ) or die (mysql_error());
}  

?>