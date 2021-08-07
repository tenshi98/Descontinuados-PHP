<?php 
error_reporting(E_ALL); 
ini_set('display_errors', 1);
$ip = $_SERVER["SERVER_ADDR"];
//Probar con cada una
//var_dump($_SERVER);
?>
<form method="post">
	<select name="environment">
		<option value="pro">produccion</option>
		<option value="pre">pruebas</option>
	</select>
	<br>
	<input type="radio" name="webservice" value="WSGeneral">PagoEfectivoWSGeneral/WSCIP.asmx?WSDL<br>
	<input type="radio"  name="webservice" value="WSCrypto">PagoEfectivoWSCrypto/WSCrypto.asmx?WSDL<br>
	<input type="radio"  name="webservice" value="WSGeneralv2">PagoEfectivoWSGeneralv2/service.asmx?WSDL<br>
	<input type="radio"  name="webservice" value="pasarela">pasarela/pasarela/crypta.asmx?WSDL<br>
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
	
	if($_POST['webservice'] == 'WSGeneral'){
		$webService = "PagoEfectivoWSGeneral/WSCIP.asmx?WSDL";
	}
	if($_POST['webservice'] == 'WSCrypto'){
		$webService = "PagoEfectivoWSCrypto/WSCrypto.asmx?WSDL";
	}
	if($_POST['webservice'] == 'WSGeneralv2'){
		$webService = "PagoEfectivoWSGeneralv2/service.asmx?WSDL";
	}
	if($_POST['webservice'] == 'pasarela'){
		$webService = "pasarela/pasarela/crypta.asmx?WSDL";
	}
	
	$url = $baseurl . $webService;
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