<?php 
//conexion a la base de datos
require_once('conexion.php');
require_once('nombre_pag.php');
//carga de datos relacionados con la hora y la fecha
$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "i" , $tiempo ); 
$seg= date ( "i" , $tiempo ); 
$hora_muestra=$hora.":".$min.":".$seg;
$Fecha=getdate(); 
$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes < 10) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia < 10) {
	$diadis="0".$Dia;
}else{
	$diadis=$Dia;
}

$fecha=$diadis."/".$mesdis."/".$Anio."  ".$hora_muestra;
//Funcion para guardar los datos del celular y la ubicacion de este
if ($_GET['longitud']<>"0.0") {

	//obtengo la id del mensaje
	$sql0 = "select id from mensajes where mensaje='".$_GET['msg']."' order by id desc  LIMIT 0, 1";
	$result0 = mysql_query($sql0,$base);
	while($registro=mysql_fetch_array($result0)) { 
	$id_mensaje=$registro["id"];
	}//cierre de while
	//verifico si ya ha entrado antes
	$sql1 ="SELECT * FROM visitas WHERE id_mensaje=".$id_mensaje." AND gcmcode='" . $_GET['id'] . "'";
	$res1=mysql_query($sql1,$base); 
	$numeroRegistros=mysql_num_rows($res1); 
	if ($numeroRegistros==0)  {
	//guardo los datos de conexion	
		$sql = "insert into visitas (id_mensaje,gcmcode,fecha_hora,lon,lat) values (".$id_mensaje.",'".$_GET['id']."','".$fecha."','".$_GET['longitud']."','".$_GET['latitud']."')";
		$result = mysql_query($sql,$base);
	
	}//cierre de if ($numeroRegistros==0)

	//actualizo mi posicion en la tabla de ejecutivos
	$sql = "UPDATE ejecutivos
	SET lon=".$_GET['longitud'].", lat=".$_GET['latitud']."
	WHERE login='".$_GET['login']."'";
	$resultado2 = mysql_query($sql,$base);
	
 }//cierre de if ($_GET['longitud']<>"0.0")
 
 	

?>