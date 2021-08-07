<?
require("conexion.php");
$sql ="SELECT * FROM ejecutivos WHERE id_ejecutiv=" . $_POST["id"];
$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $nombre=$fila['nom_ejecutiv'];
		  $direccion=$fila["dir_ejecutiv"];
		  $telefono=$fila["fono_ejecutiv"];
		  $sms1=$fila["sms1"];
		  $sms2=$fila["sms2"];
		  $sms3=$fila["sms3"];
		}

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
require_once('scripts/sms.php');// Include SMS class file.	



if ($sms1<>"0") {
$gsm = "569".$sms1; //sample
$drormob_sms=	new sms();									// Create SMS object.
$drormob_sms->username=	'naturalphone@naturalphone.cl';				// The HTTP API username of your account. 
$drormob_sms->password=	'2D27B064';				// The HTTP API password of your account.
$drormob_sms->msgtext=	"Emergencia en". substr($direccion,0,130);//$_POST['msg'];		// The SMS Message text.
$drormob_sms->originator=	'Sosclick';	// The desired Originator of your message. 
$drormob_sms->phone=	$gsm;				// The full International mobile number of the
echo $gsm."<br>";													// recipient excluding the leeding +.
echo $drormob_sms->send();								// Call method send() to send SMS Message.

// Note: replace sign "+" with " " for sender and message text or it will be replaced with empty space
	$sender = 'Sosclick';
	$messagetext = str_replace("+"," ","Emergencia en". substr($direccion,0,130));
	$result = mysql_query("INSERT INTO SMeses_historico (remitente,celular_destino,mensaje,fecha_hora) VALUES ('$sender','$gsm','$messagetext',NOW())",$base);
}

if ($sms2<>"0") {
$gsm = "569".$sms2; //sample
									// Include SMS class file.
$drormob_sms=	new sms();									// Create SMS object.
$drormob_sms->username=	'naturalphone@naturalphone.cl';				// The HTTP API username of your account. 
$drormob_sms->password=	'2D27B064';				// The HTTP API password of your account.
$drormob_sms->msgtext=	"Emergencia en". substr($direccion,0,130);//$_POST['msg'];		// The SMS Message text.
$drormob_sms->originator=	'Sosclick';	// The desired Originator of your message. 
$drormob_sms->phone=	$gsm;				// The full International mobile number of the
echo $gsm."<br>";																					// recipient excluding the leeding +.
echo $drormob_sms->send();								// Call method send() to send SMS Message.

// Note: replace sign "+" with " " for sender and message text or it will be replaced with empty space
	$sender = 'Sosclick';
	$messagetext = str_replace("+"," ","Emergencia en". substr($direccion,0,130));
	$result = mysql_query("INSERT INTO SMeses_historico (remitente,celular_destino,mensaje,fecha_hora) VALUES ('$sender','$gsm','$messagetext',NOW())",$base);
}

if ($sms3<>"0") {
$gsm = "569".$sms3; //sample
								// Include SMS class file.
$drormob_sms=	new sms();									// Create SMS object.
$drormob_sms->username=	'naturalphone@naturalphone.cl';				// The HTTP API username of your account. 
$drormob_sms->password=	'2D27B064';				// The HTTP API password of your account.
$drormob_sms->msgtext=	"Emergencia en". substr($direccion,0,130);//$_POST['msg'];		// The SMS Message text.
$drormob_sms->originator=	'Sosclick';	// The desired Originator of your message. 
$drormob_sms->phone=	$gsm;				// The full International mobile number of the
echo $gsm."<br>";																					// recipient excluding the leeding +.
echo $drormob_sms->send();								// Call method send() to send SMS Message.

// Note: replace sign "+" with " " for sender and message text or it will be replaced with empty space
	$sender = 'Sosclick';
	$messagetext = str_replace("+"," ","Emergencia en". substr($direccion,0,130));
	$result = mysql_query("INSERT INTO SMeses_historico (remitente,celular_destino,mensaje,fecha_hora) VALUES ('$sender','$gsm','$messagetext',NOW())",$base);
}

$gsm = "569".$telefono; //sample
$drormob_sms=	new sms();									// Create SMS object.
$drormob_sms->username=	'naturalphone@naturalphone.cl';				// The HTTP API username of your account. 
$drormob_sms->password=	'2D27B064';				// The HTTP API password of your account.
$drormob_sms->msgtext=	"Emergencia en". substr($direccion,0,130);//$_POST['msg'];		// The SMS Message text.
$drormob_sms->originator=	'Sosclick';	// The desired Originator of your message. 
$drormob_sms->phone=	$gsm;				// The full International mobile number of the
echo $gsm."<br>";													// recipient excluding the leeding +.
echo $drormob_sms->send();								// Call method send() to send SMS Message.

// Note: replace sign "+" with " " for sender and message text or it will be replaced with empty space
	$sender = 'Sosclick';
	$messagetext = str_replace("+"," ","Emergencia en". substr($direccion,0,130));
	$result = mysql_query("INSERT INTO SMeses_historico (remitente,celular_destino,mensaje,fecha_hora) VALUES ('$sender','$gsm','$messagetext',NOW())",$base);


?>


