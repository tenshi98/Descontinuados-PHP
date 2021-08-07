<?
require("conexion.php");
require("nombre_pag.php");
//$sql ="SELECT * FROM ejecutivos WHERE id_ejecutiv=" . $_POST["id"];

$sql ="SELECT * FROM ejecutivos WHERE login='" . $_GET["login"] . "' AND pass='" . $_GET["pass"] . "'";

$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {

?>
		<script language="javascript">
			alert("Los datos ingresados son erroneos, debera confirmar sus datos en el sitio,\n desintalar e instalar la aplicacion.");
			window.location = "http://<?=$nombreurl?>";
		</SCRIPT>
<?
}

$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $nombre=$fila['nom_ejecutiv'];
		  $id_usuario=$fila['id_ejecutiv'];
		  $direccion=$fila["dir_ejecutiv"];
		  $telefono=$fila["fono_ejecutiv"];
		  $cod_fono=$fila["cod_fono"];
		  $sms1=$fila["sms1"];
		  $sms2=$fila["sms2"];
		  $sms3=$fila["sms3"];
		}

$latitud=$_GET["latitud"];
$longitud=$_GET["longitud"];




$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "m" , $tiempo ); 
$seg= date ( "s" , $tiempo ); 
$horaproc=$hora.$min.$seg;

$Fecha=getdate(); 
$numeroRegistros=0;
$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes<10) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia<10) {
	$diadis="0".$Dia;
}else{
$diadis=$Dia;
}
$fecha=$Anio."-".$mesdis."-".$diadis;

	$sender = 'Vigilancia';
	$sql="INSERT INTO vigilancia (remitente,mensaje,fecha_hora,estado,origen,id_usuario,lat,lon) VALUES ('$sender','$direccion',NOW(),1,'','$id_usuario','$latitud','$longitud')";
	$result = mysql_query($sql,$base);

?>

