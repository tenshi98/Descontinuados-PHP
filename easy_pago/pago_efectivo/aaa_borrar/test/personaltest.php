<?php 
error_reporting(E_ALL); 
ini_set('display_errors', 1);
$ip = $_SERVER["SERVER_ADDR"];
//Probar con cada una

?>
<form method="post">
	<select name="environment">
		<option value="pro">produccion</option>
		<option value="pre">pruebas</option>
	</select>
	<input type="text" name="texto">
	<input type="submit" value="enviar">
</form>
<?php
if(count($_POST)==2){
	if($_POST['environment'] == 'pro'){
		$baseurl = "https://pagoefectivo.pe/";
		$environment = "produccion";
	}else{
		$baseurl = "http://pre.2b.pagoefectivo.pe/";
		$environment = "pruebas";
	}
	$url = $baseurl . $_POST['texto'];
	/*
	 
	http://pre.pagoefectivo.pe/PagoEfectivoWSGeneral/WSCIP.asmx?WSDL
	http://pre.pagoefectivo.pe/PagoEfectivoWSCrypto/WSCrypto.asmx?WSDL
	http://pre.pagoefectivo.pe/PagoEfectivoWSGeneralv2/service.asmx?WSDL
	http://pre.pagoefectivo.pe/pasarela/pasarela/crypta.asmx?WSDL

	*/

	$browser_id = $_SERVER['HTTP_USER_AGENT'];

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_USERAGENT, $browser_id);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_TIMEOUT, 18);
	curl_setopt($curl, CURLOPT_REFERER, $ip);
	curl_setopt ( $curl , CURLOPT_SSL_VERIFYPEER, 0 );
	$retValue = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	echo "ip server : ".$ip;
	echo "<br>";
	echo "Ambiente : ".$environment;
	echo "<br>";
	echo "Url de consulta de permisos : ".$url;
	echo "<br><br><br>";
	echo "Resultado : ";
	echo "<br><br>";
	var_dump($retValue);
}
?>
<br>
<br>
<br>
<a href="index.php">indice</a>