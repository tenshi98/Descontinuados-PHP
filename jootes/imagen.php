<?php
require 'conexion.php';
$id = $_GET['id'];
if ($id > 0){
    $consulta = "SELECT imagen, tipo_imagen FROM imagenes WHERE imagen_id = $id";
    $resultado= @mysql_query($consulta,$base) or die(mysql_error());
    $datos = mysql_fetch_assoc($resultado);
    $imagen = $datos['imagen'];
    $tipo = $datos['tipo_imagen'];
    header("Content-type: $tipo");
    echo $imagen;
}
 
?>