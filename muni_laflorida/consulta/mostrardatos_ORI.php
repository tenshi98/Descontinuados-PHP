<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
    include("conectar_bd.php"); 
    conectar_bd();
    include("conectar_np.php"); 
?>
<?php
//VALIDACION
    $sql = "SELECT * FROM tbl_users WHERE id_usuario = '".$_SESSION['uid']."'"; 
    $result =mysql_query($sql,$conexio);
$numeroRegistros=mysql_num_rows($result); 
if ($numeroRegistros==0)  {
	?>
        <form name="formulario" method="post" action="index.php">
            <input type="hidden" name="msg_error" value="1">
        </form>
		<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>
<? }
while($row_usuario=mysql_fetch_array($result)) 
{ 
	$nombre_usu=$row_usuario["tx_nombre"]." ".$row_usuario["tx_apellidoPaterno"]." ".$row_usuario["tx_apellidoMaterno"];
	$ver2  =$row_usuario['ver2'];
	$ver3  =$row_usuario['ver3'];
	$ver4  =$row_usuario['ver4'];
	$ver5  =$row_usuario['ver5'];
	$ver6  =$row_usuario['ver6'];
	$ver7  =$row_usuario['ver7'];
	$ver8  =$row_usuario['ver8'];
	$ver9  =$row_usuario['ver9'];
	$ver10  =$row_usuario['ver10'];
}
//VALIDACION
 $tipousr=$_SESSION['tus'];
//echo $tipousr."<br>".$nombre_usu;

 $fecha = date("d/m/Y"); 
/* $rut = '001771377-9'; */
$rut= $_GET["r"];  
$rut1="0".$rut;
$rut2="00".$rut;
require_once('./conexion3.php');
// require_once('./conexion3_al41.php');

// <!-- Anotaciones -->

if ($_POST["anota"]=="SI") {
 if (strlen(trim($_POST["anotacion"]))> 0 ) {
$sql="insert into anotaciones (usuario,fecha_creacion,observacion,rut_asociado,area,vigente,informado) values (".$_SESSION['uid'].",Now(),'".$_POST["anotacion"]."','".$_POST["rut_asociado"]."','".$_POST["area"]."','1','1')";



$res2=mysql_query($sql,$conexio);
// Distribucion del WorkFlow //

$rs00 = "SELECT MAX(id_anotacion) AS id FROM anotaciones";
$wf_rs00=mysql_query($rs00,$conexio);
while($row_rs00=mysql_fetch_array($wf_rs00)) {
$ultima_anotacion = $row_rs00["id"];
}

require("PHPMailer_v5.1/class.phpmailer.php"); 
$mail = new PHPMailer(); 
$mail->Host = "localhost";
$mail->SMTPAuth = true;

$wf_areas_txt="SELECT * FROM wf_areas where nombre_area='".$_POST["area"]."'"; 
$wf_areas=mysql_query($wf_areas_txt,$conexio);
while($row_wf_areas=mysql_fetch_array($wf_areas)) 
{ 
	$id_area=$row_wf_areas["id_area"];
	$desc_area=$row_wf_areas["desc_area"];
}
$seguidor_wf=0;
$wf_adm_txt="SELECT * FROM wf_adm where area='".$id_area."'"; 
$wf_adm=mysql_query($wf_adm_txt,$conexio);
while($row_wf_adm=mysql_fetch_array($wf_adm)) 
{ 
	$nombre=$row_wf_adm["nombre"];
	$correo=$row_wf_adm["correo"];
	$seguidor_wf=1;
$sql_wf="insert into wf_workflow (id_anotacion,fecha_hora,enviado_a,observacion,rut_ciudadano) values (".$ultima_anotacion.",Now(),'".$nombre."','Activacion de Work Flow','".$_POST["rut_asociado"]."')";

if ($_SESSION['sql_wf']!=$sql_wf) {
	$_SESSION['sql_wf']=$sql_wf;
	$res2_wf=mysql_query($sql_wf,$conexio);
	

	$mail->From=$correopagina;
	$mail->FromName="WorkFlow ".$nombre_corto;
	$mail->Sender=$correopagina;
	$mail->AddReplyTo($correopagina, "NO Responder a este mail");
	$mail->Subject = $nombre.", Revisar Anotacion para seguimiento WF" ;
	$mail->IsHTML(true);
	$mail->AddAddress($correo);
	$videomail  = "http://".$residencia."/index.php";
	$body = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"";
	$body .= "\"http://www.w3.org/TR/html4/loose.dtd\">";
	$body .= "<html>";
	$body .= "<head>";
	$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">";
	$body .= "<title>Recomendacion</title>";
	$body .= "</head>";
	$body .= "<body bgcolor=#ffffff>";
	$body .=  "<table width='575' border='0' cellspacing='0' cellpadding='0' id='table7' height='50'><tr><td height=98 class='arial_12_blue' align=center  >";
	$body .=  "<p><font color='#000000' face='Arial'>". $nombre_usu. ", ha Realizado una Observacion para el Rut: ".$_POST["rut_asociado"].", en el area de ".$desc_area."</font></p><font color='#000000' face='Arial'>Se debera realizar un seguimiento.<br /></font></td></tr>";
	$body .=  "<tr><td align='center' valign='middle'><a href=". $videomail . ">Ingresar al Sistema</a></td></tr></table>";
	$body .= "</body></html>";
			$mail->MsgHTML($body);
			if(!$mail->Send())
			{
				$mail->ClearAddresses();
			}
			else
			{
  			 $mail->ClearAddresses();
			}
}


$wf_adm_txt="SELECT * FROM wf_adm where area=0"; 
$wf_adm=mysql_query($wf_adm_txt,$conexio);
while($row_wf_adm=mysql_fetch_array($wf_adm)) 
{ 
	$nombre=$row_wf_adm["nombre"];
	$correo=$row_wf_adm["correo"];
	$mail->From=$correopagina;
	$mail->FromName="WorkFlow ".$nombre_corto;
	$mail->Sender=$correopagina;
	$mail->AddReplyTo($correopagina, "NO Responder a este mail");
	$mail->Subject = $nombre.", Revisar Anotacion para seguimiento WF" ;
	$mail->IsHTML(true);
	$mail->AddAddress($correo);
	$videomail  = "http://".$residencia."/index.php";
	$body = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"";
	$body .= "\"http://www.w3.org/TR/html4/loose.dtd\">";
	$body .= "<html>";
	$body .= "<head>";
	$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">";
	$body .= "<title>Recomendacion</title>";
	$body .= "</head>";
	$body .= "<body bgcolor=#ffffff>";
	$body .=  "<table width='575' border='0' cellspacing='0' cellpadding='0' id='table7' height='50'><tr><td height=98 class='arial_12_blue' align=center  >";
	$body .=  "<p><font color='#000000' face='Arial'>". $nombre_usu. ", ha Realizado una Observacion para el Rut: ".$_POST["rut_asociado"].", en el area de ".$desc_area."</font></p><font color='#000000' face='Arial'>Se debera realizar un seguimiento.<br /></font></td></tr>";
	if ($seguidor_wf==0) {
	$body .=  "<tr><td align='center' valign='middle'>ATENCION!!!, EL AREA ".$desc_area.", NO TIENE SUPERVISOR DE WORKFLOW, SE DEBERA ASIGNAR UNA PERSONA.</td></tr>";
	}
	$body .=  "<tr><td align='center' valign='middle'><a href=". $videomail . ">Ingresar al Sistema</a> (esto es solo infomativo, se despacho correo al encargado)</td></tr></table>";
	$body .= "</body></html>";
			$mail->MsgHTML($body);
			if(!$mail->Send())
			{
				$mail->ClearAddresses();
			}
			else
			{
  			 $mail->ClearAddresses();
			}
}
}
// Distribucion del WorkFlow //
 }
}

// <!-- Anotaciones -->
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>San Miguel == Consulta Vecinos</title>

<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/tabla.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="scripts/FuncJScript.js"></script>

		                  <!-- Anotaciones -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
    <script src="js/login.js"></script>
		                  <!-- Anotaciones -->

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type='text/javascript' src='js/infogrid.js'></script>
    <script src="./scripts/jquery171.js" type="text/javascript"></script>
    <script src="./scripts/jquery.alerts.js" type="text/javascript"></script>
    <link href="./scripts/jquery.alerts.css" rel="stylesheet" type="text/css" />   
<script type="text/javascript">
function validaRut() {
	var x=document.forms["form1"]["rutpersona"].value
	if (x==null || x=="") {
		//alert("El Rut NO puede estar en blanco");
		jAlert("El Rut NO puede estar en blanco", "Error");
		form1.rutpersona.focus();	
		return false;
	} 
    if (x.length < 3) {
		// alert("Rut ingresado NO es v\xE1lido");
		 jAlert("Rut ingresado NO es v\xE1lido", "Error");
		form1.rutpersona.focus();	
	    return false;
	}

	var suma=0;
	var arrRut = x.split("-");
	var rutSolo = arrRut[0];
	var verif = arrRut[1];
	var continuar = true;
	for(i=2;continuar;i++){
	  suma += (rutSolo%10)*i;
	  rutSolo = parseInt((rutSolo /10));
	  i=(i==7)?1:i;
	  continuar = (rutSolo == 0)?false:true;
	}
	resto = suma%11;
	dv = 11-resto;
	if(dv==10){
	if(verif.toUpperCase() == 'K')
	   return true;
	}
	else if (dv == 11 && verif == 0)
	  return true;
	else if (dv == verif)
	  return true;
	else
	  //alert("El valor ingresado NO es un Rut v\xE1lido");
	  jAlert("El valor ingresado NO es un Rut v\xE1lido", "Error");
	  form1.rutpersona.focus();	
	  return false;
	}
</script>	       

</head>

<?php
$busca = mssql_query("SELECT TOP 1 * FROM MAESTRO_CONTRIBUYENTE WITH (NOLOCK) WHERE RUT='".$rut."' OR RUT='".$rut1."' OR RUT='".$rut2."'", $lnk_patcom);
if (mssql_num_rows($busca)>0){
    $haypatcom=1;
	// echo " Hay Patentes Comerciales -";
}
$busca = mssql_query("SELECT TOP 1 RUT, NOMBRES FROM Contribuyentes WITH (NOLOCK) WHERE Rut='".$rut."' OR Rut='".$rut1."' OR Rut='".$rut2."'", $lnk_provisorio);	
if (mssql_num_rows($busca)>0){
    $hayprovisorio=1;
	// echo " Hay permisos Provisorios -";
}

$busca = mssql_query("SELECT TOP 1 RutInfractor, NombreInfractor FROM Parte_M WITH (NOLOCK) WHERE RutInfractor='".$rut."' OR RutInfractor='".$rut1."' OR RutInfractor='".$rut2."'", $lnk_inspec);	
if (mssql_num_rows($busca)>0){
    $hayinspec=1;
	// echo " Hay Inspecciones -";
}

$busca = mssql_query("SELECT TOP 1 integrante_fichafamiliar,integrante_rut FROM social_integrantesfam WITH (NOLOCK) WHERE integrante_rut='".$rut."' OR integrante_rut='".$rut1."' OR integrante_rut='".$rut2."'", $lnk_social);	
if (mssql_num_rows($busca)>0){
    $haysocial=1;
	// echo " Hay datos en Social -";
}
$busca = mssql_query("SELECT TOP 1 Cont_Rol,Cont_Propietario,Cont_Rut FROM AsContribuyente WITH (NOLOCK) WHERE Cont_Rut='".$rut."' OR Cont_Rut='".$rut1."' OR Cont_Rut='".$rut2."'", $lnk_aseo);	
if (mssql_num_rows($busca)>0){
    $hayaseo=1;
	// echo " Hay datos en Aseo -";
}
/*$busca = mssql_query("SELECT TOP 1 ROL,RUT_PROPIETARIO,NOMBRE_PROPIETARIO FROM PROPIETARIOS WITH (NOLOCK) WHERE RUT_PROPIETARIO='".$rut."' OR RUT_PROPIETARIO='".$rut1."' OR RUT_PROPIETARIO='".$rut2."'", $lnk_obras);*/	
$busca = mssql_query("SELECT TOP 1 Ano_Proceso, Numero_Ingreso, Item_Pago, Departamento, Fecha, Rut, Nombre, Domicilio, Telefono, Correo_Electronico FROM Encabezado_Orden_Ingreso WITH (NOLOCK) WHERE ((Departamento=5)OR(Departamento=17)OR(Departamento=18)OR(Departamento=26)) AND (Rut='".$rut."' OR Rut='".$rut1."' OR Rut='".$rut2."') ORDER BY Ano_Proceso DESC", $lnk_comun);
if (mssql_num_rows($busca)>0){
    $hayobras=1;
	// echo " Hay Cert.de Obras - <br />";
}

$busca = mssql_query("SELECT TOP 1 Ano_Proceso, Numero_Ingreso, Item_Pago, Departamento, Fecha, Rut, Nombre, Domicilio, Telefono, Correo_Electronico FROM Encabezado_Orden_Ingreso WITH (NOLOCK) WHERE ((Departamento<>5)AND(Departamento<>17)AND(Departamento<>18)AND(Departamento<>26)) AND Rut='".$rut."' OR Rut='".$rut1."' OR Rut='".$rut2."' ORDER BY Ano_Proceso DESC", $lnk_comun);
if (mssql_num_rows($busca)>0){
    $hayteso=1;
	//echo " Hay Otros Pagos -";
}

$busca = mssql_query("SELECT TOP 1 Rut, Nombres, Apellidos FROM PERSONAS WITH (NOLOCK) WHERE Rut='".$rut."' OR Rut='".$rut1."' OR Rut='".$rut2."'", $lnk_licconducir);	
if (mssql_num_rows($busca)>0){
    $haylicconducir=1;
	// echo " Hay licencias de conducir -";
}

$busca = mssql_query("SELECT TOP 1 Rut, Nombre FROM Propietarios WITH (NOLOCK) WHERE Rut='".$rut."' OR Rut='".$rut1."' OR Rut='".$rut2."'", $lnk_permcirc);	
if (mssql_num_rows($busca)>0){
    $haypermcirc=1;
	// echo " Hay permisos de circulacion -";
}

if (($haypermcirc == 1) || ($haylicconducir == 1) || ($hayobras == 1) || ($hayaseo == 1) || ($haypatcom == 1) || ($haysocial == 1) || ($hayprovisorio == 1) || ($hayinspec==1) || ($hayteso==1)) {
	$Rut="";
	$nombrecompleto="";
	$direccion="";
	$fono1="";
	$fono2="";
	$email1="";
	$dirpostal="";
if ($haysocial == 1){
 $result = mssql_query("SELECT TOP 1 integrante_fichafamiliar,integrante_rut,integrante_codparentes,integrante_apepater,integrante_apemater, integrante_prinombre, integrante_segnombre, integrante_fechanac FROM social_integrantesfam WITH (NOLOCK) WHERE integrante_rut='".$rut."' OR integrante_rut='".$rut1."' OR integrante_rut='".$rut2."'",$lnk_social);
 if (mssql_num_rows($result)>0){
 while($row = mssql_fetch_array($result)) {
    $rutfichafam=$row["integrante_rut"];
	$integrante_nombre=trim($row["integrante_prinombre"])." ".trim($row["integrante_segnombre"])." ". trim($row["integrante_apepater"])." ".trim($row["integrante_apemater"]);
	$fichafam=$row["integrante_fichafamiliar"];
	$paso1="SELECT TOP 1 integrante_fichafamiliar,integrante_rut FROM social_integrantesfam WITH (NOLOCK) WHERE integrante_fichafamiliar='". $fichafam ."' ORDER BY integrante_codparentes ASC";
	$sql03 = mssql_query($paso1,$lnk_social);
	while($row03 = mssql_fetch_array($sql03)) {
             $rutintefam=$row03["integrante_rut"]; 

			 $result = mssql_query("SELECT TOP 1 * FROM social_atenpub WITH (NOLOCK) WHERE atpub_rut='".$rutintefam."' ORDER BY atpub_fechaat DESC", $lnk_social) or die("MS-Query Error en la consulta a la BD");
			while($row = mssql_fetch_array($result)) {
				$Rut=$rutfichafam;
				$descalle='';
				$uvecinal="";
				$nombrecompleto=$integrante_nombre;
				$codcalle= trim($row["atpub_codcall"]);
				if ($codcalle <> "") {
				$paso09="SELECT dc_Calle,dg_Calle FROM t_Calles WITH (NOLOCK) WHERE dc_Calle=".$codcalle;
				$sql09 = mssql_query($paso09,$lnk_BDCAS);
				if (mssql_num_rows($sql09)>0){
					while($row09 = mssql_fetch_array($sql09)) {
						$descalle=trim($row09["dg_Calle"]);
					} 
				} else {
				   $descalle=$codcalle ." * C&oacute;d No Encontrado *";
				}
				$codpob= trim($row["atpub_codpob"]);
				/* Codigo de poblacion */
				$uvecinal=trim($row["atpub_codunivec"]);
				if ($uvecinal != "") {
					$uvecinal=", U.Vecinal ".$uvecinal;
				} else {
					$uvecinal="";	
				} 
			} 
				$direccion=$descalle." ".trim($row["atpub_direccion"])." ".trim($row["atpub_ncasa"])."".$uvecinal." ".trim($row["atpub_cerro"])." ".trim($row["atpub_sector"]);
				$fono1=$row["Telefono"];
				$fono2=$row["Telefono_celular"];
				$email1=$row["mail"];
				$dirpostal="";
			}
	} 
  }
}
}
	
if (($haysocial != 1)&& ($haypermcirc == 1)){
    $result = mssql_query("SELECT TOP 1 Rut, Nombre, Direccion, Comuna, Ciudad, Telefono, Codigo_Postal, Codigo_Empresa, Mail, Telefono_Movil FROM Propietarios WITH (NOLOCK) WHERE Rut='".$rut."' OR Rut='".$rut1."' OR Rut='".$rut2."'", $lnk_permcirc) or die("MS-Query Error en la consulta a la BD");
	while($row = mssql_fetch_array($result)) {
		$Rut=$row["Rut"];
		$nombrecompleto=trim($row["Nombre"]);
		$direccion=trim($row["Direccion"]). ", ".trim($row["Comuna"]);
		$fono1=$row["Telefono"];
		$fono2=$row["Telefono_Movil"];
		$email1=trim($row["Mail"]);
		$dirpostal=trim($row["Codigo_Postal"]);
	}
}

if (($haysocial != 1)&&($hayprovisorio == 1)){
    $result = mssql_query("SELECT TOP 1 RUT, NOMBRES, DIRECCION, NUMERO, TELEFONO, COMUNA, Correo, ComunaE, Celular, DireccionP  FROM Contribuyentes WITH (NOLOCK) WHERE RUT='".$rut."' OR RUT='".$rut1."' OR RUT='".$rut2."'", $lnk_provisorio) or die("MS-Query Error en la consulta a la BD");
	while($row = mssql_fetch_array($result)) {
		$Rut=$row["RUT"];
		$nombrecompleto=trim($row["NOMBRES"]);
		$direccion=trim($row["DIRECCION"]). " ".trim($row["NUMERO"]).", ". trim($row["COMUNA"]);
		$fono1=$row["TELEFONO"];
		$fono2=$row["Celular"];
		$email1=trim($row["Correo"]);
		$dirpostal=trim($row["DireccionP"]);
	}
}

if (($haysocial != 1)&&($hayinspec == 1)){
	  $result = mssql_query("SELECT TOP 1 * FROM Parte_M WITH (NOLOCK) WHERE RutInfractor='".$rut."' OR RutInfractor='".$rut1."' OR RutInfractor='".$rut2."' ORDER BY AnoParte DESC", $lnk_inspec) or die("MS-Query Error en la consulta a la BD");
	while($row = mssql_fetch_array($result)) {
		$Rut=trim($row["RutInfractor"]);
		$nombrecompleto=trim($row["NombreInfractor"]);
		$direccion=trim($row["DireccionInfractor"]). ", ".trim($row["ComunaInfractor"]);
		$fono1=trim($row["TelefonoInfractor"]);
		$fono2="";
		$email1="";
		$dirpostal="";
	}
}

if (($haysocial != 1)&&($haylicconducir == 1)){
    $result = mssql_query("SELECT TOP 1 Rut,Nombres,Apellidos,Direccion,Comuna,Profesion,Sexo, Estado_Civil,Fecha_Nacimiento,Nacionalidad,Fono, Escolaridad,Observaciones,Donante,Mail,FonoMovil FROM Personas WITH (NOLOCK) WHERE Rut='".$rut."' OR Rut='".$rut1."' OR Rut='".$rut2."'", $lnk_licconducir) or die("MS-Query Error en la consulta a la BD");
	while($row = mssql_fetch_array($result)) {
		$Rut=$row["Rut"];
		$nombrecompleto=trim($row["Nombres"])." ".trim($row["Apellidos"]);
		$direccion=trim($row["Direccion"]). ", ".trim($row["Comuna"]);
		$fono1=$row["Fono"];
		$fono2=$row["FonoMovil"];
		$email1=trim($row["Mail"]);
		$dirpostal="";
	}
}

if (($haysocial != 1)&&($hayaseo == 1)){
      $result = mssql_query("SELECT TOP 1 Cont_Rol, Cont_Propietario, Cont_Direccion, Cont_Manzana, Cont_Predio, Cont_Avaluo, Cont_Rut, Cont_UVecinal, Cont_Exencion, Cont_Recargo, Cont_PuntCAS, Cont_Afecta, Cont_PorCAS, Cont_Exento, Cont_Sector, Cont_Descrip, Cont_Convenio, Cont_Telefono, Cont_Poblacion, Cont_FechaDecExen, Cont_NumeDecExen, Cont_Telefono2,  Cont_CobroDiferenciado, Cont_ClasificacionPredio, Cont_TipoRebaja, Cont_UsuarioRebaja, Cont_FechaRebaja, Email, DireccionPostal, CodigoComunaPostal, CodigoPostal, Construido, Propietario, ModificaRol_SII, FechaTerminoExencion FROM AsContribuyente WITH (NOLOCK) WHERE Cont_Rut='".$rut."' OR Cont_Rut='".$rut1."' OR Cont_Rut='".$rut2."' ORDER BY Cont_Rol DESC", $lnk_aseo) or die("MS-Query Error en la consulta a la BD");
	while($row = mssql_fetch_array($result)) {
		$Rut=$row["Cont_Rut"];
		$nombrecompleto=trim($row["Cont_Propietario"]);
		$direccion=trim($row["Cont_Direccion"]);
		$fono1=$row["Cont_Telefono"];
		$fono2=$row["Cont_Telefono2"];
		$email1=trim($row["Email"]);
		$dirpostal=trim($row["DireccionPostal"]);
	}
}
if (($haysocial != 1)&&(($hayobras == 1)||($hayteso == 1))){
    /* $result = mssql_query("SELECT TOP 1 ROL, RUT_PROPIETARIO, NOMBRE_PROPIETARIO, DIRECCION, FONO, NUMERO, COD_POSTAL, COD_COMUNA, FAX, email FROM PROPIETARIOS WITH (NOLOCK) WHERE RUT_PROPIETARIO='".$rut."' OR RUT_PROPIETARIO='".$rut1."' OR RUT_PROPIETARIO='".$rut2."' ORDER BY ROL DESC", $lnk_obras) or die("MS-Query Error en la consulta a la BD"); */
		$result = mssql_query("SELECT TOP 1 Ano_Proceso, Numero_Ingreso, Item_Pago, Departamento, Fecha, Rut, Nombre, Domicilio, Comuna, Telefono, Correo_Electronico FROM Encabezado_Orden_Ingreso WITH (NOLOCK) WHERE Rut='".$rut."' OR Rut='".$rut1."' OR Rut='".$rut2."' ORDER BY Fecha DESC, Ano_Proceso DESC", $lnk_comun) or die("MS-Query Error en la consulta a la BD");
	while($row = mssql_fetch_array($result)) {
		$Rut=$row["Rut"];
		$nombrecompleto=trim($row["Nombre"]);
		$direccion=trim($row["Domicilio"]) ." ".trim($row["Comuna"]);
		$fono1=$row["Telefono"];
		$fono2="";
		$email1=trim($row["Correo_Electronico"]);
		$dirpostal="";
	}
}
if (($haysocial != 1)&&($haypatcom == 1)){
	  $result = mssql_query("SELECT TOP 1 * FROM MAESTRO_CONTRIBUYENTE WITH (NOLOCK) WHERE RUT='".$rut."' OR RUT='".$rut1."' OR RUT='".$rut2."' ORDER BY ANO_Capital DESC", $lnk_patcom) or die("MS-Query Error en la consulta a la BD");
	while($row = mssql_fetch_array($result)) {
		$Rut=$row["RUT"];
		$nombrecompleto=$row["NOMBRE"];
		$direccion=$row["DIRECCION"]. ", ".$row["COMUNA"];
		$fono1=$row["FONO1"];
		$fono2=$row["FONO2"];
		$email1=$row["CorreoElectronico"];
		$dirpostal=$row["DireccionPostal"];
	}
}

function right($str00, $length) {
     return substr($str00, -$length);
}

$rut_votacion = (int) str_replace("-","",$_GET["r"]);
$placa='';
$tipo_veh='';
$marca_veh='';
$mesa='';
$comuna='';
$fono_celular='';

if (right($_GET["r"], 1)=='k') {
	$rut_votacion=$rut_votacion."k";
}

$votacion="SELECT * FROM padron_electoral_CL where rut_compara='".$rut_votacion."'"; 
$gralvotacion=mysql_query($votacion,$padron);
while($registrovotacion=mysql_fetch_array($gralvotacion)) 
{ 
	$mesa=$registrovotacion["MESA"];
	$comuna=$registrovotacion["Comuna"];
	$fono_celular=$registrovotacion["fono_celular"];
}


$autos="SELECT * FROM parque_automotriz where rut_comparador='".$rut_votacion."' LIMIT 1"; 
$gralautos=mysql_query($autos,$padron);
while($registroautos=mysql_fetch_array($gralautos)) 
{ 
	$placa=$registroautos["PPU"];
	$tipo_veh=$registroautos["TIPO"];
		$marca_veh=$registroautos["MARCA"];
}

?>

<body >
<div align="center">
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr>
          <td width="17%" height="50" align="center" valign="middle"><img src="images/logo_sm.png" width="158" height="48" /><br /></td>
          <td width="67%" align="center" valign="middle">Consulta Vecinos</td>
          <td width="16%" align="center" valign="middle" class="fecha"><i><?php echo $fecha ?></i><br>
		  
		  
		  
		  
		                  <!-- Anotaciones -->
			<div align=left>			 
            <div id="loginContainer">
                <a href="#" id="loginButton"><span class="google_bot_txt_bco">NOTAS</span></a>
                <div style="clear:both"></div>
                <div id="loginBox">                
                    <form id="loginForm" action="mostrardatos.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="area" value="General">
                        <fieldset class="cuerpo_gris" id="body">
                            <fieldset>
                                <label for="email">Obs. General</label>
                                <input type="text" name="anotacion" id="anotacion" onkeypress="return isAlpha2(event);" value="" maxlength="349" />
                            </fieldset>
                            <input type="submit" id="login" value="Grabar" />
                        </fieldset>
                  </form>&nbsp;
                </div>
            </div>
			</div>
		                  <!-- Anotaciones -->
		  
		  
		  
		  
		  </td>
		  		                
        </tr>
        <tr>
          <td colspan="3" >
		  <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <!-- td width="106" align="left" class="Arial2">&nbsp;<input type="submit" class="rojo_sombra_print" value="Imprimir" /></td>
                  <td width="77" align="center">&nbsp;</td -->
				  <td width="106" align="left" class="Arial2">
				  <? if ($_GET["donde"]!=1) {?>
				  			  &nbsp;<input type="submit" class="rojo_sombra" value="&laquo; Volver" onclick="location='piderut.php'"/>
				  <? }else{?>
				  			  &nbsp;<input type="submit" class="rojo_sombra" value="&laquo; Cerrar" onclick="javascript:window.close();"/>
				  <? }?>
				  </td>
                  <td width="77" align="center">&nbsp;</td>
				  
                  <td width="258" align="right"><span class="Arial2">Buscar otro RUT&nbsp; :&nbsp;</span></td>
                  <td width="23" align="center" class="Arial2"><img src="images/icons/id.png" width="20" height="20" /></td>
				  <form name="form1" method="post" action="checkrut.php" onsubmit="return validaRut()" >
                  <td width="269" align="center" valign="middle" class="tabla_cont_social"><input name="rutpersona" type="text" class="campo_txt" id="rutpersona" size="50" maxlength="20" onkeypress="javascript:numerosk(event);" value="" onkeyup="javascript:validaRutEnter(event)" placeholder="Ej: 12345678-9" style="width:220px !important;"/></td>
                  <td width="50" align="right"><input type="submit" class="rojo_sombra_search" value="Buscar" /></td ></form>
				  <td width="77" align="center">&nbsp;</td>
				  <td width="106" align="right" class="Arial2"> <? if ($_GET["donde"]!=1) {?>&nbsp;<input type="submit" class="rojo_sombra" value="Terminar &Theta;" onclick="location='Logout.php'"/><? }?></td> 
                </tr>
              </table>
                <p class="borde_bottom">&nbsp;</p></td>
            </tr>
          </table>
		  <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr><td width="25%">
		     <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <td height="10" class="tabla_tit">Rut</td>
                </tr>
                <tr>
                  <td ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr class="tabla_margin">
                      <td width="25" align="left" valign="middle"><img src="images/icons/id.png" width="20" height="20" /></td>
                      <td width="89%"><input name="textfield10" type="text" disabled="disabled" class="campo_txt" id="textfield9" value="<?php echo $Rut ?>" /></td>
                    </tr>
                  </table></td>
                  </tr>
              </table></td><td width="75%">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <td height="10" class="tabla_tit">Nombre</td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr class="tabla_margin">
                      <td width="25" align="left" valign="middle"><img src="images/icons/user.png" width="20" height="20" /></td>
                      <td width="716" ><input name="textfield9" type="text" disabled="disabled" class="campo_txt" id="textfield7" value="<?php echo $nombrecompleto?>" /></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td></tr>
		</table>
	</td></tr>
	<tr>
     <td colspan="3" >  
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="50%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Direcci&oacute;n</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/house.png" width="20" height="20" /></td>
                        <td width="468" ><input name="textfield11" type="text" disabled="disabled" class="campo_txt" id="textfield10" value="<?php echo $direccion ?>" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Tel&eacute;fono 1</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/fono1.png" width="20" height="20" /></td>
                        <td width="89%" ><input name="textfield12" type="text" disabled="disabled" class="campo_txt" id="textfield11" value="<?php echo $fono1 ?>" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Tel&eacute;fono 2</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/phone.png" width="20" height="20" /></td>
                        <td width="89%" ><input name="textfield13" type="text" disabled="disabled" class="campo_txt" id="textfield12" value="<?php echo $fono2."  ".$fono_celular ?> " /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
	  </td></tr>
	  <tr>
     <td colspan="3" >  
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="50%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Tipo Vehiculo</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/vehi20x20.png" width="20" height="20" /></td>
                        <td width="468" class="campo_txt"><input name="textfield12" type="text" disabled="disabled" class="campo_txt" id="textfield11" value="<?php echo $tipo_veh ?>" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Marca</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/marca20x20.png" width="20" height="20" /></td>
                        <td width="89%" ><input name="textfield12" type="text" disabled="disabled" class="campo_txt" id="textfield11" value="<?php echo $marca_veh ?>" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Patente</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/ppu20x20.png" width="20" height="20" border="0" /></td>
                        <td width="89%" ><input name="textfield13" type="text" disabled="disabled" class="campo_txt" id="textfield12" value="<?php echo $placa ?> " /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
	  </td></tr>
	<tr><td colspan="3" > 		
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="50%">
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Correo Electr&oacute;nico (E-mail)</td>
                  </tr>
                  <tr>
                    <td>
					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/mail.png" width="20" height="20" /></td>
                        <td width="468" ><input name="textfield7" type="text" disabled="disabled" class="campo_txt" id="textfield13" value="<?php echo $email1 ?>" /></td>
                      </tr>
                    </table>
					</td>
                  </tr>
                </table>
				</td>
                <td>
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Direcci&oacute;n Postal</td>
                  </tr>
                  <tr>
                    <td>
					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/buzon20x20.png" width="20" height="20" /></td>
                        <td width="468" ><input name="textfield14" type="text" disabled="disabled" class="campo_txt" id="textfield14" value="<?php echo $dirpostal ?>" /></td>
                      </tr>
                    </table>
					</td>
                  </tr>
                </table>
				</td>


<!-- MESA DE VOTACION -->
                <? if ($tipousr == 3 ) {  ?>
				                <td>
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Comuna Votaci&oacute;n</td>
                  </tr>
                  <tr>
                    <td>
					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/escudo20x20.png" width="20" height="20" /></td>
                        <td width="468" ><input name="textfield14" type="text" disabled="disabled" class="campo_txt" id="textfield14" value="<?php echo $comuna ?>" /></td>
                      </tr>
                    </table>
					</td>
                  </tr>
                </table>
				</td>
				                <td>
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Mesa Votaci&oacute;n</td>
                  </tr>
                  <tr>
                    <td>
					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/mesa.png" width="20" height="20" /></td>
                        <td width="468" ><input name="textfield14" type="text" disabled="disabled" class="campo_txt" id="textfield14" value="<?php echo $mesa ?>" /></td>
                      </tr>
                    </table>
					</td>
                  </tr>
                </table>
				
				</td>
				<? } ?> 
              </tr>
            </table>
			</td>
        </tr>
		<tr><td>
</table>




<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
     <tr>
       <td>



 

     <div id="page-wrap">
		
		<div class="info-col">
		  <dl>

 <!-- SOCIAL -->    
<?if ($ver2==1) { ?>
		    <dt id="starter"><span class="social">Social </span><span style="text-align:right"><? if ($haysocial == 0){ echo "&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?></span></dt>
    		 <dd>
             <? if ($haysocial != 0) { ?>
             <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td><div style="float:left"><span class='pestana'>Grupo Familiar</span></div>
			    <!-- Anotaciones -->
			 
		<div id="loginContainerSocial" >
                <a href="#" id="loginButtonSocial"><span class="google_bot_txt_bco">NOTAS</span></a>
                <div style="clear:both"></div>
                <div id="loginBoxSocial">                
                    <form id="loginFormSocial" action="mostrardatos.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="area" value="Social">
                        <fieldset class="cuerpo_gris" id="body">
                            <fieldset>
                                <label for="email">Obs. Social</label>
                                <input type="text" name="anotacion" id="anotacion" onkeypress="return isAlpha2(event);" value="" maxlength="349" />
                            </fieldset>
                            <input type="submit" id="login" value="Grabar" />
                        </fieldset>
                      </form>
                </div>
            </div>
   
		                  <!-- Anotaciones -->	
					  		  
			 <?
			 $result = mssql_query("SELECT TOP 1 integrante_fichafamiliar,integrante_rut FROM social_integrantesfam WITH (NOLOCK) WHERE integrante_rut='".$rut."' OR integrante_rut='" .$rut1."' OR integrante_rut='".$rut2."'",$lnk_social );
			if (mssql_num_rows($result)>0){
?>
			<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' ><thead><tr>
			<th>Nombre</th><th>Rut</th><th>Parentesco</th><th>Fecha<br/>Nacimiento<br />(Edad)</th><!-- th>Inactivo</th--><th>Ingresos<br />Promedio<br />Mensual</th><th>Actividad</th></tr></thead>
<?
while($row = mssql_fetch_array($result)) {
	$Rut=$row["integrante_rut"];
	$fichafam=$row["integrante_fichafamiliar"];
	$descparent='';
	$descactiv='';
	$paso1="SELECT integrante_fichafamiliar,integrante_rut,integrante_estado,integrante_apepater,integrante_apemater, integrante_prinombre, integrante_segnombre, integrante_fechanac,integrante_edad,integrante_codparentes,integrante_sexo, integrante_estadocivil, integrante_ingresos, integrante_actividad, integrante_prevision,integrante_escolaridad, integrante_Estado_Salud,integrante_AdultoM,integrante_Discapacitado,Integrante_MTrabajados,integrante_FDefun  FROM social_integrantesfam  WITH (NOLOCK) WHERE integrante_fichafamiliar='". $fichafam ."'";
	$sql03 = mssql_query($paso1,$lnk_social);
	while($row03 = mssql_fetch_array($sql03)) {
			$integrante_nombre=trim($row03["integrante_prinombre"])." ".trim($row03["integrante_segnombre"])." ". trim($row03["integrante_apepater"])." ".trim($row03["integrante_apemater"]);
			$fechanacio="";
			$fechanacim="";
			$fechaedad="";
			$edad ="";
			if (trim($row03["integrante_fechanac"]) <> "" ){
				$dato=trim($row03["integrante_fechanac"]);
				if (substr($dato,0,3)=="Ene") {
					$dato = str_replace("Ene", "Jan", $dato);
				}
				if (substr($dato,0,3)=="Abr") {
					$dato = str_replace("Abr", "Apr", $dato);
				}
				if (substr($dato,0,3)=="Ago") {
					$dato = str_replace("Ago", "Aug", $dato);
				}
				if (substr($dato,0,3)=="Dic") {
					$dato = str_replace("Dic", "Dec", $dato);
				}				
				$fechanacim = strtotime($dato);
				$fechanacio = date( 'd/m/Y', $fechanacim);
				$fechaedad = time() - $fechanacim ;
				$edad = floor($fechaedad / 31556926);
			}
			
			$ingresos = intval($row03["integrante_ingresos"] / 12 );
			$ingresos = number_format($ingresos);
			$codparent= trim($row03["integrante_codparentes"]);
			if ($codparent <> "") {
				$paso04="SELECT parent_cod,parent_desc FROM social_parentesco WITH (NOLOCK) WHERE parent_cod=".$codparent;
				$sql04 = mssql_query($paso04,$lnk_social);
				if (mssql_num_rows($sql04)>0){
				while($row04 = mssql_fetch_array($sql04)) {
					$descparent=$row04["parent_desc"];
				} 
				} else {
				   $descparent=$codparent ." * C&oacute;d No Encontrado *";
				} 
			} 
			$codactiv= trim($row03["integrante_actividad"]);
			if ($codactiv <> "") {
				$paso05="SELECT activ_codigo,activ_descripcion FROM social_actividadsocial WITH (NOLOCK) WHERE activ_codigo=".$codactiv;
				$sql05 = mssql_query($paso05,$lnk_social);
				if (mssql_num_rows($sql05)>0){
				while($row05 = mssql_fetch_array($sql05)) {
					$descactiv=$row05["activ_descripcion"];
				} 
				} else {
				   $descactiv=$codactiv ." * C&oacute;d No Encontrado *";
				} 
			} 
			/* echo "<tr><td>".$integrante_nombre."</td><td>".$row03["integrante_rut"]."</td><td>".$descparent."</td><td>".$fechanacio." (".$edad." a&ntilde;os)</td><td>".$row03["integrante_estado"]."</td><td> $".$ingresos."</td><td>".$descactiv."</td></tr>"; */
			echo "<tr><td>".$integrante_nombre."</td><td>".$row03["integrante_rut"]."</td><td>".$descparent."</td><td>".$fechanacio." (".$edad." a&ntilde;os)</td><td> $".$ingresos."</td><td>".$descactiv."</td></tr>";
		} 
    
} ?>
			</table><br />
<?
$numbeneficio_ante="";
// $result2 = mssql_query("SELECT TOP 10 * FROM social_atenpub WITH (NOLOCK) WHERE atpub_rut='".$Rut."' ORDER BY atpub_fechaat DESC",$lnk_social);
$result2 = mssql_query("SELECT top 25 Folio_Atencion,Codigo_Asistente,Fecha_Atencion,Observacion FROM Det_Atenciones_Social WITH (NOLOCK) WHERE Rut LIKE '%".$Rut."%' ORDER BY Fecha_Atencion DESC",$lnk_social);
if (mssql_num_rows($result2)>0){
?>
<div align="left"><span class='pestana'>&Uacute;ltimas Atenciones</span></div>
<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' ><thead><tr>
<!-- th>Fecha<br />Atenci&oacute;n</th><th>Folio <br />Atenci&oacute;n</th><th>Ptje CAS</th><th>Folio CAS</th><th width="414">Observaci&oacute;n</th><th>Resultado Atenci&oacute;n</th><th>Atendido por</th></tr></thead -->
<th>Fecha<br />Atenci&oacute;n</th><th>Folio <br />Atenci&oacute;n</th><th>Puntos Ficha<br />Prot. Social</th><th>Fecha<br/>FPS</th><th>Motivo<br />Atenci&oacute;n</th><th>Resultado Atenci&oacute;n</th><th>Valor<br />Beneficio</th><th>Atendido por</th></tr></thead>
<?

  while($row2 = mssql_fetch_array($result2)) {
        $obsaten="";
  		$obsatenvalid="";
        $fecatencion=trim($row2["Fecha_Atencion"]);
		$fecatenc="";
		if ($fecatencion != "") {
		
		$dato=$row2["Fecha_Atencion"];
		if (substr($dato,0,3)=="Ene") {
			$dato = str_replace("Ene", "Jan", $dato);
		}
		if (substr($dato,0,3)=="Abr") {
			$dato = str_replace("Abr", "Apr", $dato);
		}
		if (substr($dato,0,3)=="Ago") {
			$dato = str_replace("Ago", "Aug", $dato);
		}
		if (substr($dato,0,3)=="Dic") {
			$dato = str_replace("Dic", "Dec", $dato);
		}				
		$fechap = strtotime($dato);
		$fecatenc= date('d/m/Y', $fechap);
		}
	  $folioatenc=$row2["Folio_Atencion"];
	  $obsaten=trim($row2["Observacion"]);
	  $asistsocial=$row2["Codigo_Asistente"];
	  
	  if (($obsaten != '') && (!($obsaten == NULL))){
	  	 $obsatenvalid=$obsaten;
	  }
	  $ptjecas="";
	  $fecfps="";
	  $sqlFPS=mssql_query("SELECT TOP 5 fichafam_rut, fichafam_ptjecas,fichafam_fechaenc,fichafam_foliocas FROM Social_fichaFamiliar WITH (NOLOCK) WHERE fichafam_rut LIKE '%".$Rut."%' ORDER BY fichafam_fechaenc DESC",$lnk_social);
	  if (mssql_num_rows($sqlFPS)>0){
	    while($rowFPS = mssql_fetch_array($sqlFPS)) {
		     $ptjecas=$rowFPS["fichafam_ptjecas"];
			 $dato=$rowFPS["fichafam_fechaenc"];
				if (substr($dato,0,3)=="Ene") {
					$dato = str_replace("Ene", "Jan", $dato);
				}
				if (substr($dato,0,3)=="Abr") {
					$dato = str_replace("Abr", "Apr", $dato);
				}
				if (substr($dato,0,3)=="Ago") {
					$dato = str_replace("Ago", "Aug", $dato);
				}
				if (substr($dato,0,3)=="Dic") {
					$dato = str_replace("Dic", "Dec", $dato);
				}				
				$fechap = strtotime($dato);
				$fecfps= date('d/m/Y', $fechap);
		
		}
	  }		  
	  /*  $ptjecas=$row2["atpub_ptjecas"];
	  $foliocas=$row2["atpub_foliocas"]; */
	  $tipoatencion="";

	  $resultaten="";
	  $codasistent="";
	  if ($fecatencion <> "") {
	  $sql2 = mssql_query("SELECT TOP 5 * FROM social_atenpub WITH (NOLOCK) WHERE atpub_rut='".$Rut."' and atpub_fechaat='".$fecatencion."'ORDER BY atpub_fechaat DESC",$lnk_social);;
	  }
	  if (mssql_num_rows($sql2)>0){
	    while($row4 = mssql_fetch_array($sql2)) {	
		    $tipoatencion=$row4["atpub_codtpat"];
			$asistsocial=$row4["atpub_atendidopor"];
	    }
	  }

		$descmotiv = " ";
		$motivo=$tipoatencion;
		if ($motivo <> "") {
		$paso2="SELECT * FROM social_tpatenc WITH (NOLOCK) WHERE tpaten_cod =". $motivo;
		$sql4 = mssql_query($paso2,$lnk_social);
		if (mssql_num_rows($sql4)>0){
		while($row4 = mssql_fetch_array($sql4)) {
			$descmotiv=$row4["tpaten_desc"];
			if (trim($descmotiv)=='SAP'){
				$descmotiv='SUBSIDIO AGUA POTABLE';
			}
			if (trim($descmotiv)=='PBS'){
				$descmotiv='PENSI&Oacute;N B&Aacute;SICA SOLIDARIA';
			}
			if (trim($descmotiv)=='SUF'){
				$descmotiv='SUBSIDIO &Uacute;NICO FAMILIAR';
			}
		}
		} else {
		   $descmotiv=$motivo ." * Cod No encontrado *";
		}
		} 
	  
	 $sql7 = mssql_query("SELECT Folio_atencion,Fecha_atencion,Codigo_Resultado,Codigo_Pertenece,Codigo_Asistente,Rut FROM Det_Resultado_Atencion WITH (NOLOCK) WHERE Rut LIKE '%".$Rut."%' AND Fecha_atencion='".$fecatencion."' ORDER BY Fecha_atencion DESC", $lnk_social);
	  if (mssql_num_rows($sql7)>0){
	    while($row5 = mssql_fetch_array($sql7)) {
		        $resultaten = " ";
		        $codresult=$row5["Codigo_Resultado"];
				$codasistent=$row5["Codigo_Asistente"];
				if ($codresult != "") {
				$paso2="SELECT * FROM Social_Resultado_Atencion WITH (NOLOCK) WHERE Codigo_Resultado =". $codresult;
				$sql6 = mssql_query($paso2,$lnk_social);
				if (mssql_num_rows($sql6)>0){
				while($row6 = mssql_fetch_array($sql6)) {
					$resultaten=trim($row6["Descripcion_Resultado"]). ", ". $obsatenvalid;
				}
				} else {
				   $resultaten=$codresult ." * Cod No encontrado *";
				}
				} 
	    }
	  }
	  
	  $valorbenef="";
	  $sqlsocben=mssql_query("SELECT socben_rut,socben_folio, socben_fichafamiliar,socben_numbenef,socben_fechabenef, socben_valorarti, socben_totalbenef,SocBen_Asistente FROM social_benSocial WITH (NOLOCK) WHERE socben_rut LIKE '%".$Rut."%' AND socben_fechaatencion='".$fecatencion."' ORDER BY socben_fechaatencion DESC", $lnk_social);
	  if (mssql_num_rows($sqlsocben)>0){
	    while($rowsocben = mssql_fetch_array($sqlsocben)) {
		     $montobenef=trim($rowsocben["socben_totalbenef"]);
			 $numbeneficio=trim($rowsocben["socben_numbenef"]);
			 if ($numbeneficio <> $numbeneficio_ante) {
				 if ($montobenef != "") {
						$valorbenef = "$".number_format($montobenef , 0 ,',' , '.' );
				 }
				 $numbeneficio_ante=$numbeneficio;
			 }
		}
	  }		  
	  
	  $tipo = " ";
		if ($asistsocial <> "") {
			$paso="SELECT asist_cod,asist_nombre FROM Social_asistente WITH (NOLOCK) WHERE asist_cod=". $asistsocial;
			$sql3 = mssql_query($paso, $lnk_social);
			if (mssql_num_rows($sql3)>0){
			while($row3 = mssql_fetch_array($sql3)) {
				$tipo=$row3["asist_nombre"];
			} 
			} else {
			   $tipo=$asistsocial ." * Cod No encontrado *";
			} 
		} 
   // echo "<tr><td>".$fecatenc."</td><td>".$folioatenc."</td><td>".$ptjecas."</td><td>".$foliocas."</td><td width='414'>".$obsaten."</td><td>".$resultaten."</td><td>".$tipo."</td></tr>";
   echo "<tr><td width='54' align='center'>".$fecatenc."</td><td align='center' width='58'>".$folioatenc."</td><td align='center' width='68'>".$ptjecas."</td><td width='54' align='center'>".$fecfps."</td><td align='left' width='170'>".$descmotiv."</td><td align='left'>".$resultaten."</td><td align='right' width='40'>".$valorbenef."</td><td>".$tipo."</td></tr>";
   } 
  
?>  
</table>  
<? }
} ?>

			</td></tr></table>		 
            
            <? } ?>
			</dd>


 <!-- SOCIAL -->
 <?}?>    
 <?if ($ver3==1) { ?>
  <!-- Patentes Comerciales -->    
 

    		<dt><span class="patente">Patentes Comerciales</span><? if ($haypatcom == 0) { echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?></dt>
    		<dd>
			 <? if ($haypatcom != 0) { ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			  <tr><td><!-- Anotaciones -->
			 
             <div id="loginContainerPatCom">
                <a href="#" id="loginButtonPatCom"><span class="google_bot_txt_bco">NOTAS</span></a>
                <div style="clear:both"></div>
                <div id="loginBoxPatCom">                
                    <form id="loginFormPatCom" action="mostrardatos.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="area" value="PatCom">
                        <fieldset class="cuerpo_gris" id="body">
                            <fieldset>
                                <label for="email">Obs. Patentes Comerciales</label>
                                <input type="text" name="anotacion" id="anotacion" onkeypress="return isAlpha2(event);" value="" maxlength="349" />
                            </fieldset>
                            <input type="submit" id="login" value="Grabar" />
                        </fieldset>
                      </form>
                </div>
            </div>

		                  <!-- Anotaciones -->
			 <?
			 $result = mssql_query("SELECT TOP 10 * FROM MAESTRO_CONTRIBUYENTE WITH (NOLOCK) WHERE RUT='".$rut."' OR RUT='".$rut1."' OR RUT='".$rut2."' ORDER BY ANO_Capital DESC", $lnk_patcom);
			 if (mssql_num_rows($result)>0){
			 ?>
              <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			  <thead><tr><th>A&ntilde;o Capital</th><th>Tipo de Capital</th><th>Porc.%</th><th>Monto Capital</th><th>Fecha Presentaci&oacute;n</th></tr></thead>
			 <? 
				while($row = mssql_fetch_array($result)) {
				$Rut=trim($row["RUT"]);
				$dato=trim($row["FECHA_DECLARACION"]);
				if (substr($dato,0,3)=="Ene") {
					$dato = str_replace("Ene", "Jan", $dato);
				}
				if (substr($dato,0,3)=="Abr") {
					$dato = str_replace("Abr", "Apr", $dato);
				}
				if (substr($dato,0,3)=="Ago") {
					$dato = str_replace("Ago", "Aug", $dato);
				}
				if (substr($dato,0,3)=="Dic") {
					$dato = str_replace("Dic", "Dec", $dato);
				}				
				$fecha01 = strtotime($dato);
				/* $mysqldate = date( 'Y-m-d H:i:s', $fecha01 ); */
				$fechapres = date( 'd/m/Y', $fecha01 );
				$tipcapital=$row["TIPO_CAPITAL"];
				$tipo = " ";
						if ($tipcapital <> "") {
						$paso="SELECT CODIGO,DESCRIPCION FROM Tipos_de_Capitales WITH (NOLOCK) WHERE CODIGO='". $tipcapital."'";
						$sql3 = mssql_query($paso, $lnk_patcom);
						if (mssql_num_rows($sql3)>0){
						while($row3 = mssql_fetch_array($sql3)) {
							$tipo=$row3["DESCRIPCION"];
						} 
						} else {
						   $tipo=$tipcapital ." * Cod No encontrado *";
						} 
						} 
				echo "<tr><td align='center'>".$row["ANO_Capital"]."</td><td>".$tipo."</td><td align='center'>".$row["MONTO_PORCENTAJE_CAPITAL"]."% </td><td align='right'> $".number_format($row["MONTO_CAPITAL"] , 0 ,',' , '.' )."</td><td align='center'>".$fechapres."</td></tr>";
				} ?>
			 </table><br />
			<? } ?>
            </td></tr>
      <tr>
        <td>
		<? 
			$sql2 = mssql_query("SELECT ROL, TIPO_PATENTE, CODIGO_PATENTE, CODIGO_CALLE, NUMERACION_CALLE, ROL_SII_PROPIEDAD, ESTADO_PATENTE, GLOSA_DE_TERMINO, FECHA_DECLARACION, FECHA_OTORGA_PATENTE, FECHA_TERMINO,FECHA_CADUCACION FROM MAESTRO_PATENTES WITH (NOLOCK) WHERE RUT='".$rut."' OR RUT='".$rut1."' OR RUT='".$rut2."' ORDER BY FECHA_OTORGA_PATENTE DESC", $lnk_patcom);
			if (mssql_num_rows($sql2)>0){
			     ?>
			<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			  <thead><tr><th width='57'>ROL<br>N&deg; Patente</th><th width='80'>Tipo Patente</th><th width='300'>Giro</th><th width='84' align='center'>Clasificaci&oacute;n<br />Patente</th><th>Direcci&oacute;n</th><th width='58'>Fecha<br />Otorgamiento</th><th width='58'>Fecha<br />T&eacute;rmino</th></tr></thead>	 
	<?			 
	while($row2 = mssql_fetch_array($sql2)) {
	    $motivo ="";
        $descmotiv = "";
		/* $motivo=$row2["CODIGO_PATENTE"]; */
        $motivo=trim($row2["TIPO_PATENTE"]);
		if ($motivo <> "") {
		/* $paso2="SELECT CODIGO, DESCRIPCION FROM Tipos_de_Patentes WITH (NOLOCK) WHERE CODIGO =". $motivo; */
		$paso2="SELECT CODIGO, DESCRIPCION FROM ESTADO_PATENTE WITH (NOLOCK) WHERE CODIGO ='". $motivo."' AND TIPIPO=1";
		$sql4 = mssql_query($paso2, $lnk_patcom);
		if (mssql_num_rows($sql4)>0){
		while($row4 = mssql_fetch_array($sql4)) {
			$descmotiv=$row4["DESCRIPCION"];
		}
		} else {
		   $descmotiv=$motivo ." * C&oacute;d No encontrado *";
		}
        } 
		
		$descclasif = " ";
	    $cclasif ="";
		$clasif =$row2["CODIGO_PATENTE"]; 
		if ($clasif <> "") {
		$paso2="SELECT CODIGO, DESCRIPCION FROM Tipos_de_Patentes WITH (NOLOCK) WHERE CODIGO =". $clasif; 
		$sql4 = mssql_query($paso2, $lnk_patcom);
		if (mssql_num_rows($sql4)>0){
		while($row4 = mssql_fetch_array($sql4)) {
			$descclasif=$row4["DESCRIPCION"];
		}
		} else {
		    $descclasif=$motivo ." * C&oacute;d No encontrado *";
		}
        } 		
		$cclasif=$row2["ROL"];
		$paso2="SELECT ROL,TIPO_PATENTE,SII,GIRO FROM MAESTRO_GIROS WITH (NOLOCK) WHERE ROL=".$cclasif;
		$sql4 = mssql_query($paso2, $lnk_patcom);
		if (mssql_num_rows($sql4)>0){
		while($row4 = mssql_fetch_array($sql4)) {
			$tpclasif=$row4["TIPO_PATENTE"];
			$girosii=$row4["GIRO"];
		}
		} else {
		   $dclasif=$cclasif." * C&oacute;d. No encontrado *";
		}
		$fechaotor="";
        $dato=trim($row2["FECHA_OTORGA_PATENTE"]);
		if (trim($dato) <> "") {	
			if (substr($dato,0,3)=="Ene") {
				$dato = str_replace("Ene", "Jan", $dato);
			}
			if (substr($dato,0,3)=="Abr") {
				$dato = str_replace("Abr", "Apr", $dato);
			}
			if (substr($dato,0,3)=="Ago") {
				$dato = str_replace("Ago", "Aug", $dato);
			}
			if (substr($dato,0,3)=="Dic") {
				$dato = str_replace("Dic", "Dec", $dato);
			}				
			$fecha01 = strtotime($dato);
			$fechaotor = date( 'd/m/Y', $fecha01 );
		}	
		$fechavenc="";
		$dato=trim($row2["FECHA_TERMINO"]);
		if (trim($dato) <> "") {	
			if (substr($dato,0,3)=="Ene") {
				$dato = str_replace("Ene", "Jan", $dato);
			}
			if (substr($dato,0,3)=="Abr") {
				$dato = str_replace("Abr", "Apr", $dato);
			}
			if (substr($dato,0,3)=="Ago") {
				$dato = str_replace("Ago", "Aug", $dato);
			}
			if (substr($dato,0,3)=="Dic") {
				$dato = str_replace("Dic", "Dec", $dato);
			}				
			$fecha01 = strtotime($dato);
			$fechavenc = date( 'd/m/Y', $fecha01 );
		}	
		$numcalle=$row2["CODIGO_CALLE"];
		$paso2="SELECT COD_CALLE, DESCRIPCION FROM TT_CALLES WITH (NOLOCK) WHERE COD_CALLE =". $numcalle;
		$sql4 = mssql_query($paso2, $lnk_patcom);
		while($row4 = mssql_fetch_array($sql4)) {
			$desccalle=$row4["DESCRIPCION"];
		}
		
	    /* $deriva=$row2["ESTADO_PATENTE"];
		if ($deriva ='V') {
		    $descderiva='Vigente';
		} else {
		    if ($deriva ='P') {
		    $descderiva='Provisoria';
			} else {
		    	$descderiva=$row4["GLOSA_DE_TERMINO"];
			}
		}*/
		
    echo "<tr><td align='center' width='57'>".$row2["ROL"] ."</td><td width='80'>".$descmotiv."</td><td width='300'>".$girosii."</td><td width='84' align='center'>". $descclasif ."</td><td>".$desccalle." ".$row2["NUMERACION_CALLE"] ."</td><td width='58' align='center'>". $fechaotor."</td><td width='58' align='center'>". $fechavenc."</td></tr>";
		}
	 ?>
         </table>
    <? } ?>

       </td>
      </tr>
    </table>
			  <? } ?>
              </dd>

 <!-- Patentes Comerciales -->    
 <?}?>    
 <?if ($ver4==1) { ?>
 <!-- Permisos de circulacion -->    


    		  <dt><span class="circulacion">Permiso de Circulaci&oacute;n</span><? if ($haypermcirc == 0) { echo "&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?></dt>
    		  <dd>
              <? if ($haypermcirc != 0) { ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
      			<tr><td>
							  
<!-- Anotaciones -->
			 
             <div id="loginContainerPerCirc">
                <a href="#" id="loginButtonPerCirc"><span class="google_bot_txt_bco">NOTAS</span></a>
                <div style="clear:both"></div>
                <div id="loginBoxPerCirc">                
                    <form id="loginFormPerCirc" action="mostrardatos.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="area" value="PerCirc">
                        <fieldset class="cuerpo_gris" id="body">
                            <fieldset>
                                <label for="email">Obs.Permiso Circulaci&oacute;n</label>
                                <input type="text" name="anotacion" id="anotacion" onkeypress="return isAlpha2(event);" value="" maxlength="349" />
                            </fieldset>
                            <input type="submit" id="login" value="Grabar" />
                        </fieldset>
                      </form>
                </div>
            </div>

<!-- Anotaciones -->
			 <?
			 $result = mssql_query("SELECT TOP 16 Placa, Digito, Rut, Año_del_Permiso, Fecha_Emision, Tipo_Vehiculo, Periodo, Clasificacion, Tasacion, Neto_Factura, Fecha_Factura, Valor_UTM, Comuna_Anterior, Año_Anterior, Forma_de_Pago, Numero_Boletin, Numero_Caja, Valor_Permiso, Porcentaje_IPC, Porcentaje_Multa, Valor_IPC, Valor_Multa, Total_a_Pagar, Estado_del_Pago, Fondos_a_Terceros, Valor_Contado, Valor_Cuota, Fecha_Vencimiento, Observaciones, Fecha_Pago FROM Permisos_de_Circulacion WITH (NOLOCK) WHERE Rut='".$rut."' OR Rut='".$rut1."' OR Rut='".$rut2."' ORDER BY Año_del_Permiso DESC, Placa ASC", $lnk_permcirc);
			 if (mssql_num_rows($result)>0){
			 ?>
              <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' ><thead><tr><th width='30' align='center'>A&ntilde;o<br />Permiso</th><th width='74'>N&deg; Patente</th><th >Veh&iacute;culo</th><th width='140'>Tasaci&oacute;n<br />(o Factura)</th><th width='85'>Valor Permiso</th><th width='85'>Valor a Pagar</th><th width='76' align='center'>Fecha Pago</th><th width='192' align='left'>Observaciones</th><th width='76' align='center'>Fecha Vencimiento</th></tr></thead><tr>
			  			 <? 
						 $anho=0;
						 $anhoantes=0;
				while($row = mssql_fetch_array($result)) {
					$ppu=trim($row["Placa"]);
					/* $estudios=trim($row["Escolaridad"]);*/
					$Rut=trim($row["Rut"]);
					$anho=trim($row["Año_del_Permiso"]);
					if ($anhoantes != $anho) {
					   if ($anhoantes != 0 ) {
					   echo"<tr><td colspan='9' style='padding:1px;background-color:#dad7c7;'><img src='./images/espacio.gif' border='0' width='1' height='1' /></td></tr>";
					   }						 
					   $anhoantes=$anho;
					}
					$valorpermiso=trim($row["Valor_Permiso"]);
					$valorapagar=trim($row["Total_a_Pagar"]);
					$obs=trim($row["Observaciones"]);
					$tasac="";
					if ((trim($row["Tasacion"]) <> "" ) || ($row["Tasacion"] <> 0 )) {
						$tasac=$row["Tasacion"];
					} else {
					    $tasac=$row["Neto_Factura"];
					} 
					$fechapago ="";
					$dato=trim($row["Fecha_Pago"]);
					if (strlen($dato) > 0) {
					if (substr($dato,0,3)=="Ene") {
						$dato = str_replace("Ene", "Jan", $dato);
					}
					if (substr($dato,0,3)=="Abr") {
						$dato = str_replace("Abr", "Apr", $dato);
					}
					if (substr($dato,0,3)=="Ago") {
						$dato = str_replace("Ago", "Aug", $dato);
					}
					if (substr($dato,0,3)=="Dic") {
						$dato = str_replace("Dic", "Dec", $dato);
					}				
					$fechap = strtotime($dato);
					$fechapago = date( 'd/m/Y', $fechap);
					}
					$fechavenc="";
					$dato=trim($row["Fecha_Vencimiento"]);
					if (strlen($dato) > 0 ){
					if (substr($dato,0,3)=="Ene") {
						$dato = str_replace("Ene", "Jan", $dato);
					}
					if (substr($dato,0,3)=="Abr") {
						$dato = str_replace("Abr", "Apr", $dato);
					}
					if (substr($dato,0,3)=="Ago") {
						$dato = str_replace("Ago", "Aug", $dato);
					}
					if (substr($dato,0,3)=="Dic") {
						$dato = str_replace("Dic", "Dec", $dato);
					}				
					$fechap = strtotime($dato);
					$fechavenc = date( 'd/m/Y', $fechap);
					}
					$tvehi=$row["Tipo_Vehiculo"];
					$paso="SELECT Codigo, Descripcion FROM Tipos_de_Vehiculos WITH (NOLOCK) WHERE Codigo='". $tvehi."'";
						$sql3 = mssql_query($paso, $lnk_permcirc);
						if (mssql_num_rows($sql3)>0){
						    $dvehi="";
						while($row3 = mssql_fetch_array($sql3)) {
							$dvehi=trim($row3["Descripcion"]);
						} 
						} else {
						   $dvehi=$tvehi ." * No encontrado *";
						} 
						
				echo "<tr><td align='center' width='30'>".$anho."</td><td width='74' align='center'>".$ppu."</td><td align='center' >".$dvehi."</td><td align='right' width='140'> $".number_format($tasac , 0 ,',' , '.' )."</td><td align='center' width='80'> $".number_format($valorpermiso , 0 ,',' , '.' )."</td><td align='center' width='80'> $".number_format($valorapagar , 0 ,',' , '.' )."</td><td align='center' width='80'>".$fechapago."</td><td width='192'>".$obs."</td><td align='center' width='80'>".$fechavenc."</td></tr>";
				} ?>

 			 </table>
			  <? } ?>

			        </td>
      </tr>
    </table>
			 <? } ?>
              </dd>

 <!-- Permisos de circulacion -->    
 <?}?>    
 <?if ($ver5==1) { ?>

 <!-- Licencia de Conducir -->    


    		  <dt><span class="licencia">Licencia de Conducir</span><? if ($haylicconducir == 0) { echo "&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?></dt>
    		  <dd>
			  <? if ($haylicconducir != 0) { ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			  <tr><td>
			  			  <!-- Anotaciones -->
			 
             <div id="loginContainerLicCond">
                <a href="#" id="loginButtonLicCond"><span class="google_bot_txt_bco">NOTAS</span></a>
                <div style="clear:both"></div>
                <div id="loginBoxLicCond">                
                    <form id="loginFormLicCond" action="mostrardatos.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="area" value="LicCond">
                        <fieldset class="cuerpo_gris" id="body">
                            <fieldset>
                                <label for="email">Obs. Licencia Conducir</label>
                                <input type="text" name="anotacion" id="anotacion" onkeypress="return isAlpha2(event);" value="" maxlength="349" />
                            </fieldset>
                            <input type="submit" id="login" value="Grabar" />
                        </fieldset>
                      </form>
                </div>
            </div>

		                  <!-- Anotaciones -->
			 <?
			 $result = mssql_query("SELECT TOP 10 * FROM Personas WITH (NOLOCK) WHERE Rut='".$rut."' OR Rut='".$rut1."' OR Rut='".$rut2."'", $lnk_licconducir);
			 if (mssql_num_rows($result)>0){
			 ?>
              <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			  <thead><tr><th width="200">Direcci&oacute;n</th><th width="160">Profesi&oacute;n</th><th width="28">Edad</th><th width="80">Fecha Otorgamiento</th><th width="80">Fecha Control</th><th width="40">Clase</th><th>Restricci&oacute;n / Anulaci&oacute;n</th></tr></thead>
			 <? 
				while($row = mssql_fetch_array($result)) {
					$direlic=trim($row["Direccion"]).", ".trim($row["Comuna"]);
					$Rut=trim($row["Rut"]);
					/* $estudios=trim($row["Escolaridad"]);*/
					$profeslic=trim($row["Profesion"]);
					$dato=$row["Fecha_Nacimiento"];
					if (substr($dato,0,3)=="Ene") {
						$dato = str_replace("Ene", "Jan", $dato);
					}
					if (substr($dato,0,3)=="Abr") {
						$dato = str_replace("Abr", "Apr", $dato);
					}
					if (substr($dato,0,3)=="Ago") {
						$dato = str_replace("Ago", "Aug", $dato);
					}
					if (substr($dato,0,3)=="Dic") {
						$dato = str_replace("Dic", "Dec", $dato);
					}				
					$fechanacim = strtotime($dato);
					$fechanacio = date( 'd/m/Y', $fechanacim);
					$fechaedad = time() - $fechanacim ;
					$edad = floor($fechaedad / 31556926);
					
					$paso="SELECT * FROM Licencias WITH (NOLOCK) WHERE Numero_Licencia='". $rut."' OR Numero_Licencia='".$rut1."' OR Numero_Licencia='".$rut2."' ORDER BY Fecha_Control ASC";
						$sql3 = mssql_query($paso, $lnk_licconducir);
						if (mssql_num_rows($sql3)>0){
							$fecotor="";
							$fecctrl="";
							$restric="";
							$anula="";
						while($row3 = mssql_fetch_array($sql3)) {
							$datotor=$row3["Fecha_Otorgamiento"];
							if (substr($datotor,0,3)=="Ene") {
								$datotor = str_replace("Ene", "Jan", $datotor);
							}
							if (substr($datotor,0,3)=="Abr") {
								$datotor = str_replace("Abr", "Apr", $datotor);
							}
							if (substr($datotor,0,3)=="Ago") {
								$datotor = str_replace("Ago", "Aug", $datotor);
							}
							if (substr($datotor,0,3)=="Dic") {
								$datotor = str_replace("Dic", "Dec", $datotor);
							}				
							$fechanacim = strtotime($datotor);
							$fecotor = date( 'd/m/Y', $fechanacim);
							
							$datotor=$row3["Fecha_Control"];
							if (substr($datotor,0,3)=="Ene") {
								$datotor = str_replace("Ene", "Jan", $datotor);
							}
							if (substr($datotor,0,3)=="Abr") {
								$datotor = str_replace("Abr", "Apr", $datotor);
							}
							if (substr($datotor,0,3)=="Ago") {
								$datotor = str_replace("Ago", "Aug", $datotor);
							}
							if (substr($datotor,0,3)=="Dic") {
								$datotor = str_replace("Dic", "Dec", $datotor);
							}				
							$fechanacim = strtotime($datotor);
							$fecctrl = date( 'd/m/Y', $fechanacim);
							
							$restric=trim($row3["Obs_Restriccion"]);
							$anula=trim($row3["Motivo_Anulacion"]);
							if (strlen($anula)<> 0) { 
							   $restric=$restric." / ".$anula;
							}
							$clase="";
							if ($row3["Clase_A1"] == 1 ) {
							   $clase = $clase . " A1";
							}
							if ($row3["Clase_A2"] == 1 ) {
							   $clase = $clase . " A2";
							}
							if ($row3["Clase_B"] == 1 ) {
							   $clase = $clase . " B";
							}
							if ($row3["Clase_C"] == 1 ) {
							   $clase = $clase . " C";
							}
							if ($row3["Clase_D"] == 1 ) {
							   $clase = $clase . " D";
							}
							if ($row3["Clase_E"] == 1 ) {
							   $clase = $clase . " E";
							}   
						} 
						} else {
						   $restric=$rut ." * No encontrado *";
						} 
						
				echo "<tr><td align='center' width='200'>".$direlic."</td><td width='160'>".$profeslic."</td><td align='center' width='28'>".$edad."</td><td align='center' width='80'>".$fecotor."</td><td align='center' width='80'>".$fecctrl."</td><td align='center' width='40'>".$clase."</td><td align='left'>".$restric."</td></tr>";
				} ?>
			 </table>
			  <? } ?>

			        </td>
      </tr>
    </table>
			 <? } ?>
			  </dd>

 <!-- Licencia de Conducir -->    
 <?}?>    
 <?if ($ver6==1) { ?>
 <!-- Aseo -->    

    		  <dt><span class="aseo">Aseo</span><? if ($hayaseo == 0) { echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?></dt>
    		  <dd>
			  <? if ($hayaseo != 0) { ?>
			  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			  <tr><td>
			   <!-- Anotaciones -->
			 
             <div id="loginContainerAseo">
                <a href="#" id="loginButtonAseo"><span class="google_bot_txt_bco">NOTAS</span></a>
                <div style="clear:both"></div>
                <div id="loginBoxAseo">                
                    <form id="loginFormAseo" action="mostrardatos.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="area" value="Aseo">
                        <fieldset class="cuerpo_gris" id="body">
                            <fieldset>
                                <label for="email">Obs. Aseo</label>
                                <input type="text" name="anotacion" id="anotacion" onkeypress="return isAlpha2(event);" value="" maxlength="349" />
                            </fieldset>
                            <input type="submit" id="login" value="Grabar" />
                        </fieldset>
                      </form>
                </div>
            </div>

		    <!-- Anotaciones -->
			 <?
			 $deuda_total=0;
			 $result = mssql_query("SELECT Cont_Rol, Cont_Propietario, Cont_Direccion, Cont_Avaluo, Cont_Rut, Cont_Exencion, Cont_Recargo, Cont_PuntCAS, Cont_Afecta, Cont_PorCAS, Cont_Exento, Cont_Sector, Cont_Descrip, Cont_Convenio,  Cont_FechaDecExen, Cont_NumeDecExen, FechaTerminoExencion FROM AsContribuyente WITH (NOLOCK) WHERE Cont_Rut='".$rut."' OR Cont_Rut='".$rut1."' OR Cont_Rut='".$rut2."'", $lnk_aseo);
			 if (mssql_num_rows($result)>0){
			 ?>
              <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			  <thead><tr><th width="20">ROL</th><th width="160">Direcci&oacute;n</th><th width="28">Avaluo</th><th width="36">%<br/>Exento</th><th width="84">Descripci&oacute;n</th><th width="40">Fecha Exencion<br/> / N&deg;</th><th>Fecha<br />T&eacute;rmino<br />Exenci&oacute;n</th><th>Fecha<br />Vence<br />Cuota</th><th>A&ntilde;o<br />Cuota</th><th>Valor Cuota</th><th>Fecha<br/>Pago</th><th>Valor Total</th></tr></thead>
			 <? 
				while($row = mssql_fetch_array($result)) {
					$fecexen="";
					$fecterm="";
					$fecvenc="";
					$fecpagoas="";
					$numcuota="";
					$pagoanual="";
					$totcuota=0;
					$valorcuota=0;
					$numexen="";
					$descrip="";
					$anualcuota="";
					$porcexento="";
					$porceexento="";
					$avaluo=0;
					$direc="";
					$fechaexento="";
				    $numrol=trim($row["Cont_Rol"]);
					$direc=trim($row["Cont_Direccion"]);
					$avaluo=$row["Cont_Avaluo"];
					$fechaExOtor=trim($row["Cont_FechaDecExen"]);
					$paso="SELECT TOP 1 Pag_Ano,Pag_FechaVen FROM AsPagos WITH (NOLOCK) WHERE Pag_Rol='". $numrol."' ORDER BY Pag_Ano DESC, Pag_FechaVen DESC";
					$sql3 = mssql_query($paso, $lnk_aseo);
					if (mssql_num_rows($sql3)>0){
					while($row3 = mssql_fetch_array($sql3)) {
						$fecvence=$row3["Pag_FechaVen"];
						$anovence=$row3["Pag_Ano"];
					}
					}
					if (strtotime($fechaExOtor) > strtotime($fecvence)) {
					//  echo "hay valor exento posterior ".$fechaExOtor." - ".$fecvence." <br />";
					        $porcexento=trim($row["Cont_Exencion"]);
							$descrip=trim($row["Cont_Descrip"]);
							$numexen=$row["Cont_NumeDecExen"];
							$dato=$row["Cont_FechaDecExen"];
							if (strlen($dato) != 0 ){
							if (substr($dato,0,3)=="Ene") {
								$dato = str_replace("Ene", "Jan", $dato);
							}
							if (substr($dato,0,3)=="Abr") {
								$dato = str_replace("Abr", "Apr", $dato);
							}
							if (substr($dato,0,3)=="Ago") {
								$dato = str_replace("Ago", "Aug", $dato);
							}
							if (substr($dato,0,3)=="Dic") {
								$dato = str_replace("Dic", "Dec", $dato);
							}				
							$fechanacim = strtotime($dato);
							$fecexen = date( 'd/m/Y', $fechanacim);
							}
							if ($fecexen<>""){
							$fechaexento=$fecexen."<br /> / ".$numexen;
							}
							$dato=$row["FechaTerminoExencion"];
							if (strlen($dato) != 0 ){
							if (substr($dato,0,3)=="Ene") {
								$dato = str_replace("Ene", "Jan", $dato);
							}
							if (substr($dato,0,3)=="Abr") {
								$dato = str_replace("Abr", "Apr", $dato);
							}
							if (substr($dato,0,3)=="Ago") {
								$dato = str_replace("Ago", "Aug", $dato);
							}
							if (substr($dato,0,3)=="Dic") {
								$dato = str_replace("Dic", "Dec", $dato);
							}				
							$fechanacim = strtotime($dato);
							$fecterm = date( 'd/m/Y', $fechanacim);
							}
							$porceexento=$porcexento."%";
							echo "<tr><td align='center' width='20'>".$numrol."</td><td align='center' width='160'>".$direc."</td><td align='right' width='20'>$".number_format($avaluo , 0 ,',' , '.' )."</td><td  align='center' width='36'>".$porceexento."</td><td align='center' width='84'>".$descrip."</td><td align='center' width='50'>".$fechaexento."</td><td align='center' width='50'>".$fecterm."</td><td align='center' width='50'>".$fecvenc."</td><td align='left'>".$anualcuota."</td><td align='right' width='50'>$".number_format($valorcuota , 0 ,',' , '.' )."</td><td align='center' width='50'>".$fecpagoas."</td><td align='right'>$".number_format($totcuota , 0 ,',' , '.' )."</td></tr>";
					}
					// buscar primero el rol en pagos ya que tiene el año mas actual en la base PAGOS
					$paso="SELECT TOP 18 * FROM AsPagos WITH (NOLOCK) WHERE Pag_Rol='". $numrol."' ORDER BY Pag_Ano DESC, Pag_FechaVen DESC";
					$sql3 = mssql_query($paso, $lnk_aseo);
					$n=0;
					if (mssql_num_rows($sql3)>0){
 						
						while($row3 = mssql_fetch_array($sql3)) {
						    $n=$n+1;
						    $fecvenc="";
							$fecpagoas="";
							$numcuota="";
							$pagoanual="";
							$anualcuota="";
							$totcuota=0;
							$valorcuota=0;
							$datotor=$row3["Pag_FechaVen"];
							if (strlen($datotor) != 0 ){
							if (substr($datotor,0,3)=="Ene") {
								$datotor = str_replace("Ene", "Jan", $datotor);
							}
							if (substr($datotor,0,3)=="Abr") {
								$datotor = str_replace("Abr", "Apr", $datotor);
							}
							if (substr($datotor,0,3)=="Ago") {
								$datotor = str_replace("Ago", "Aug", $datotor);
							}
							if (substr($datotor,0,3)=="Dic") {
								$datotor = str_replace("Dic", "Dec", $datotor);
							}				
							$fechanacim = strtotime($datotor);
							$fecvenc = date( 'd/m/Y', $fechanacim);
							}
							$datotor=$row3["Pag_FechaPago"];
							if (strlen($datotor) != 0 ){
							if (substr($datotor,0,3)=="Ene") {
								$datotor = str_replace("Ene", "Jan", $datotor);
							}
							if (substr($datotor,0,3)=="Abr") {
								$datotor = str_replace("Abr", "Apr", $datotor);
							}
							if (substr($datotor,0,3)=="Ago") {
								$datotor = str_replace("Ago", "Aug", $datotor);
							}
							if (substr($datotor,0,3)=="Dic") {
								$datotor = str_replace("Dic", "Dec", $datotor);
							}				
							$fechanacim = strtotime($datotor);
							$fecpagoas = date( 'd/m/Y', $fechanacim);
							}
							$pagoanual=trim($row3["Pag_Ano"]);
							$numcuota=trim($row3["Pag_Cuota"]);
							if ($pagoanual <> ""){
							  $anualcuota=$pagoanual."-".$numcuota;
							}
							$numcuota=trim($row3["Pag_Cuota"]);
							$valorcuota=$row3["Pag_Valor"];
							$totcuota=$row3["Pag_Total"];
							if ($totcuota==0) {
								$deuda_total=$deuda_total+$valorcuota;
							}
							echo "<tr><td align='center' width='20'>".$numrol."</td><td align='center' width='160'>".$direc."</td><td align='right' width='20'>$".number_format($avaluo , 0 ,',' , '.' )."</td><td  align='center' width='38'>".$porceexento."</td><td align='center' width='80'>".$descrip."</td><td align='center' width='50'>".$fechaexento."</td><td align='center' width='50'>".$fecterm."</td><td align='center' width='50'>".$fecvenc."</td><td align='left'>".$anualcuota."</td><td align='right' width='50'>$".number_format($valorcuota , 0 ,',' , '.' )."</td><td align='center' width='50'>".$fecpagoas."</td><td align='right'>$".number_format($totcuota , 0 ,',' , '.' )."</td></tr>";
						}


						// SUMAS ASEO

						echo "<tr><td align='center' width='20'></td><td align='center' width='160'></td><td align='right' width='20'></td><td  align='center' width='38'></td><td align='center' width='80'></td><td align='center' width='50'></td><td align='center' width='50'></td><td align='center' width='50'></td><td align='left'></td><td align='right' width='50'></td><td align='center' width='50'>Deuda</td><td align='right'>$".number_format($deuda_total , 0 ,',' , '.' )."</td></tr>";


                            echo"<tr><td colspan='12' style='padding:1px;background-color:#dad7c7;'><img src='./images/espacio.gif' border='0' width='1' height='1' /></td></tr>";
						$deuda_total=0;
						} else {
						   // no hay registros en pagos para ese rol, entonces llenar con datos de Contribuyente (esta exento)
                           	$porcexento=trim($row["Cont_Exencion"]);
							if ($porcexento==""){
							   $porcexento=0;
							}
							if ($porcexento!=0) {
							$descrip=trim($row["Cont_Descrip"]);
							$numexen=$row["Cont_NumeDecExen"];
							$dato=$row["Cont_FechaDecExen"];
							if (strlen($dato) != 0 ){
							if (substr($dato,0,3)=="Ene") {
								$dato = str_replace("Ene", "Jan", $dato);
							}
							if (substr($dato,0,3)=="Abr") {
								$dato = str_replace("Abr", "Apr", $dato);
							}
							if (substr($dato,0,3)=="Ago") {
								$dato = str_replace("Ago", "Aug", $dato);
							}
							if (substr($dato,0,3)=="Dic") {
								$dato = str_replace("Dic", "Dec", $dato);
							}				
							$fechanacim = strtotime($dato);
							$fecexen = date( 'd/m/Y', $fechanacim);
							}
							if ($fecexen<>""){
							$fechaexento=$fecexen."-".$numexen;
							}
							$dato=$row["FechaTerminoExencion"];
							if (strlen($dato) != 0 ){
							if (substr($dato,0,3)=="Ene") {
								$dato = str_replace("Ene", "Jan", $dato);
							}
							if (substr($dato,0,3)=="Abr") {
								$dato = str_replace("Abr", "Apr", $dato);
							}
							if (substr($dato,0,3)=="Ago") {
								$dato = str_replace("Ago", "Aug", $dato);
							}
							if (substr($dato,0,3)=="Dic") {
								$dato = str_replace("Dic", "Dec", $dato);
							}				
							$fechanacim = strtotime($dato);
							$fecterm = date( 'd/m/Y', $fechanacim);
							}
							$porceexento=$porcexento."%";
							if ($totcuota==0) {
								$deuda_total=$deuda_total+$valorcuota;
							}
							echo "<tr><td align='center' width='20'>".$numrol."</td><td align='center' width='160'>".$direc."</td><td align='right' width='20'>$".number_format($avaluo , 0 ,',' , '.' )."</td><td  align='center' width='38'>".$porceexento."</td><td align='center' width='80'>".$descrip."</td><td align='center' width='50'>".$fechaexento."</td><td align='center' width='50'>".$fecterm."</td><td align='center' width='50'>".$fecvenc."</td><td align='left'>".$anualcuota."</td><td align='right' width='50'>$".number_format($valorcuota , 0 ,',' , '.' )."</td><td align='center' width='50'>".$fecpagoas."</td><td align='right'>$".number_format($totcuota , 0 ,',' , '.' )."</td></tr>";
                        }

//SUMAS ASEO

echo "<tr><td align='center' width='20'></td><td align='center' width='160'></td><td align='right' width='20'></td><td  align='center' width='38'></td><td align='center' width='80'></td><td align='center' width='50'></td><td align='center' width='50'></td><td align='center' width='50'></td><td align='left'></td><td align='right' width='50'></td><td align='center' width='50'>Deuda</td><td align='right'>$".number_format($deuda_total , 0 ,',' , '.' )."</td></tr>";
$deuda_total=0;

                 echo"<tr><td colspan='12' style='padding:1px;background-color:#dad7c7;'><img src='./images/espacio.gif' border='0' width='1' height='1' /></td></tr>";	
				} 

				} ?>
				
			 </table>
			  <? } ?>
			  

			        </td>
      </tr>
    </table>
			
	          <? } ?>
	          </dd>


 <!-- Aseo -->    

 <?}?>    
 <?if ($ver7==1) { ?>

 <!-- Certificado de Obras -->    

    		  <dt><span class="obras">Certificado de Obras</span><? if ($hayobras == 0) { echo "&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?></dt>
    		  <dd>
			  <? if ($hayobras != 0) { ?>
			  <!-- $busca = mssql_query("SELECT TOP 1 ROL,RUT_PROPIETARIO,NOMBRE_PROPIETARIO FROM PROPIETARIOS WITH (NOLOCK) WHERE RUT_PROPIETARIO='".$rut."'", $lnk_obras);-->	
			  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			  <tr><td>
 <!-- Anotaciones -->
			 
             <div id="loginContainerCertObras">
                <a href="#" id="loginButtonCertObras"><span class="google_bot_txt_bco">NOTAS</span></a>
                <div style="clear:both"></div>
                <div id="loginBoxCertObras">                
                    <form id="loginFormCertObras" action="mostrardatos.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="area" value="CertObras">
                        <fieldset class="cuerpo_gris" id="body">
                            <fieldset>
                                <label for="email">Obs. Cert. Obras</label>
                                <input type="text" name="anotacion" id="anotacion" onkeypress="return isAlpha2(event);" value="" maxlength="349" />
                            </fieldset>
                            <input type="submit" id="login" value="Grabar" />
                        </fieldset>
                      </form>
                </div>
            </div>

		    <!-- Anotaciones -->			  
			 <? 
			 $qryteso="SELECT TOP 25 Ano_Proceso, Codigo_Area, Orden_Ingreso, Item_Pago, Fecha_Emision, Fecha_Vencimiento, Rut, Nombre, Placa_Vehiculo, Rol_Patente, Rol_Propiedad, EmitidoPor, Glosa, Fecha_OrdenIngreso, Ano_OrdenIngreso, Numero_OrdenIngreso, FormaDePago, NroConvenio, Tipo_Tarjeta, Codigo_Tarjeta, Rut_Tarjeta, Monto_Tarjeta, Pagado_ConOrdenIngreso, Pagado_ConIDOrdenIngreso, Numero_Licencia, idUnidadHabitacional, Folio_Unico, Total_OrdenIngreso FROM EncabezadoIngresosDiarios WITH (NOLOCK) WHERE ((Item_Pago=5)OR(Item_Pago=17)OR(Item_Pago=18)OR(Item_Pago=26)) AND ((Rut='".$rut."') OR (Rut='".$rut1."') OR (Rut='".$rut2."')) ORDER BY Ano_Proceso DESC";
			 
			$result = mssql_query($qryteso, $lnk_teso);
			
			if (mssql_num_rows($result)>0){ 
			 ?>
              <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			  <thead><tr><th width="20">Orden de Ingreso</th><th width="80">Fecha</th><th width="240">Glosa</th><th width="38">Rol Propiedad</th><th width="80">Valor Total</th></tr></thead>
			 <? $auxctcontrol=1;
			    $anhoantes="";
				while($row = mssql_fetch_array($result)) {
					$ordingreso="";
					$fechaemi="";
					$cerglosa="";
					$rolprop="";
					$valorpagado="";
					$anhoproc="";

				    $ordingreso=trim($row["Orden_Ingreso"]);
					$cerglosa=trim($row["Glosa"]);
					$rolprop=trim($row["Rol_Propiedad"]);
					$valorpagado=trim($row["Total_OrdenIngreso"]);
					if (strlen($valorpagado) > 0 ) {
					  $valorpagado="$ ".number_format($valorpagado , 0 ,',' , '.' );
					}
					$anhoproc=trim($row["Ano_Proceso"]);

					$dato=$row["Fecha_Emision"];
					if (strlen($dato) != 0 ){
						if (substr($dato,0,3)=="Ene") {
							$dato = str_replace("Ene", "Jan", $dato);
						}
						if (substr($dato,0,3)=="Abr") {
							$dato = str_replace("Abr", "Apr", $dato);
						}
						if (substr($dato,0,3)=="Ago") {
							$dato = str_replace("Ago", "Aug", $dato);
						}
						if (substr($dato,0,3)=="Dic") {
							$dato = str_replace("Dic", "Dec", $dato);
						}				
						$fechanacim = strtotime($dato);
						$fechaemi = date( 'd/m/Y', $fechanacim);
					}
					if (($auxctcontrol!=1) && ($anhoantes!=$anhoproc)) {
						echo"<tr><td colspan='12' style='padding:1px;background-color:#dad7c7;'><img src='./images/espacio.gif' border='0' width='1' height='1' /></td></tr>";	
					}
					if ( strlen($cerglosa) == 0 ){
					    $qryteso2="SELECT TOP 25 Ano_Proceso,Codigo_Area,NumeroCaja,Orden_Ingreso,IDOrden_Ingreso,Item_Pago,Correlativo_Ingreso,Monto,upsize_ts,Devengar FROM DetalleIngresosDiarios WITH (NOLOCK) WHERE Item_Pago=5 AND Orden_Ingreso='".$ordingreso."' AND Ano_Proceso='".$anhoproc."' ORDER BY Ano_Proceso DESC";
						$result9 = mssql_query($qryteso2, $lnk_teso);
						if (mssql_num_rows($result9)>0){
						    while($row = mssql_fetch_array($result9)) { 
							     $correlingreso=trim($row["Correlativo_Ingreso"]);
								 $qrycomun3="SELECT Ano_Proceso,Item_Pago,Descripcion,CuentaContable,Actualizada FROM Ing_Cuentas WITH (NOLOCK) WHERE Item_Pago='5' and Ano_Proceso='".$anhoproc."' AND Correlativo_Ingreso='".$correlingreso."' ORDER BY Ano_Proceso DESC";
								 $resultA = mssql_query($qrycomun3, $lnk_comun);
								 if (mssql_num_rows($resultA)>0){
						             while($row = mssql_fetch_array($resultA)) { 
									     $cerglosa=trim($row["Descripcion"]);
									 }
								 }	 
							}
			 			}
					}
					echo "<tr><td align='center' >".$ordingreso."</td><td align='center'>".$fechaemi."</td><td  align='left'>".$cerglosa."</td><td align='center' >".$rolprop."</td><td align='right' >".$valorpagado." </td></tr>";
					$anhoantes = $anhoproc;
					$auxctcontrol = $auxctcontrol + 1 ;
				  } 
                 

				 ?>
				
			 </table> 
			 <? } ?>
			 
			 </td>
      </tr>
    </table>
			
			  <? } ?>
	          </dd>


 <!-- Certificado de Obras -->    
 <?}?>    
 <?if ($ver8==1) { ?>
<!-- Inspecciones Municipales -->    

			   <dt><span class="inspecciones">Inspecciones Municipales</span><? if ($hayinspec == 0) { echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?></dt>
			   <dd>
			   <? if ($hayinspec != 0) { ?>
			   
			    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
      			<tr><td>
							  <!-- Anotaciones -->
			 
             <div id="loginContainerInspeccion">
                <a href="#" id="loginButtonInspeccion"><span class="google_bot_txt_bco">NOTAS</span></a>
                <div style="clear:both"></div>
                <div id="loginBoxInspeccion">                
                    <form id="loginFormInspeccion" action="mostrardatos.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="area" value="Inspeccion">
                        <fieldset class="cuerpo_gris" id="body">
                            <fieldset>
                                <label for="email">Obs. Inspecciones</label>
                                <input type="text" name="anotacion" id="anotacion" onkeypress="return isAlpha2(event);" value="" maxlength="349" />
                            </fieldset>
                            <input type="submit" id="login" value="Grabar" />
                        </fieldset>
                      </form>
                </div>
            </div>

		      <!-- Anotaciones -->
			 <?
			 $result = mssql_query("SELECT NumeroParte, AnoParte, FechaParte, FechaRecepcion, NumeroBoleta, RutInspector, TipoParte, RutInfractor, NombreInfractor, DireccionInfractor, TelefonoInfractor, ComunaInfractor, TipoOcupante, OrigenInfraccion, TipoInfraccion, LugarInfraccion, HoraInfraccion, Observacion, HoraCitacion, FechaCitacion, LugarCitacion, Estado, FechaEnvioJPL, TomadoJuzgado, FolioOficioJPL, UnidadVecinal, CodigoTerritorio, TipoDocumentoDepositado, Edad, Profesion, Oficio FROM Parte_M WITH (NOLOCK) WHERE RutInfractor='".$rut."' OR RutInfractor='".$rut1."' OR RutInfractor='".$rut2."' ORDER BY FechaParte DESC", $lnk_inspec);
			 if (mssql_num_rows($result)>0){
			 ?>
              <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' ><thead><tr><th width='40' align='center'>N&deg;<br />Parte</th><th width='60'>Fecha<br />Parte</th><th width='140'>Infracci&oacute;n</th><th width='200'>Lugar Infracci&oacute;n</th><th width='47'>Hora<br />Infracci&oacute;n</th><th width='120'>Lugar Citaci&oacute;n</th><th width='60'>Fecha y Hora<br />Citaci&oacute;n</th><th align='left'>Origen<br />Infracci&oacute;n</th></tr></thead><tr>
			  			 <? 
				$auxctcontrol=1;
			    $anhoantes="";
				while($row = mssql_fetch_array($result)) {
				    $fechaparte='';
					$fechacitad='';
					$infrac='';
					$lugarcitad='';
					$tipoparte='';
					$originfrac='';
				    $Rut=trim($row["RutInfractor"]);
					$nroparte=$row["NumeroParte"];
					$anhoparte=$row["AnoParte"];
					$fecparte=$row["FechaParte"];
					$codinfrac=trim($row["TipoInfraccion"]);
					$lugarinfrac=trim($row["LugarInfraccion"]);
					$horarinfrac=trim($row["HoraInfraccion"]);
					$codlugarcitad=trim($row["LugarCitacion"]);
					$feccitad=trim($row["FechaCitacion"]);
					$horacitad=trim($row["HoraCitacion"]);
					$codtipoparte=trim($row["TipoParte"]);
					$codoriginfrac=trim($row["OrigenInfraccion"]);
					$obs=trim($row["Observacion"]);
                    if (trim($fecparte)!= '') {
					$dato=$fecparte;
					if (substr($dato,0,3)=="Ene") {
						$dato = str_replace("Ene", "Jan", $dato);
					}
					if (substr($dato,0,3)=="Abr") {
						$dato = str_replace("Abr", "Apr", $dato);
					}
					if (substr($dato,0,3)=="Ago") {
						$dato = str_replace("Ago", "Aug", $dato);
					}
					if (substr($dato,0,3)=="Dic") {
						$dato = str_replace("Dic", "Dec", $dato);
					}				
					$fechap = strtotime($dato);
					$fechaparte = date( 'd/m/Y', $fechap);
					} // fin if fecha parte vacio
					if (trim($feccitad)!= '') {
					$dato=$feccitad;
					if (substr($dato,0,3)=="Ene") {
						$dato = str_replace("Ene", "Jan", $dato);
					}
					if (substr($dato,0,3)=="Abr") {
						$dato = str_replace("Abr", "Apr", $dato);
					}
					if (substr($dato,0,3)=="Ago") {
						$dato = str_replace("Ago", "Aug", $dato);
					}
					if (substr($dato,0,3)=="Dic") {
						$dato = str_replace("Dic", "Dec", $dato);
					}				
					$fechap = strtotime($dato);
					$fechacitad = date( 'd/m/Y', $fechap);
					} // fin if fecha citacion vacio

					$paso="SELECT Codigo_Infraccion, Descripcion FROM Tipos_Infracciones WITH (NOLOCK) WHERE Codigo_Infraccion='". $codinfrac."'";
						$sql3 = mssql_query($paso, $lnk_inspec);
						if (mssql_num_rows($sql3)>0){ 
						while($row3 = mssql_fetch_array($sql3)) {
							$infrac=trim($row3["Descripcion"]);
						} 
						} else {
						   $infrac=$codinfrac ." * No encontrado *";
						} 
                    $paso3="SELECT Codigo, Descripcion FROM LugarCitacion WITH (NOLOCK) WHERE Codigo='".$codlugarcitad."'";
						$sql33 = mssql_query($paso3, $lnk_inspec);
						if (mssql_num_rows($sql33)>0){
						while($row33 = mssql_fetch_array($sql33)) {
							$lugarcitad=trim($row33["Descripcion"]);
						} 
						} else {
						    $lugarcitad=$codlugarcitad ." * No encontrado *";
						}
					
					 $paso6="SELECT Codigo, Descripcion FROM TipoParte WITH (NOLOCK) WHERE Codigo='".$codtipoparte."'";
						$sql6 = mssql_query($paso6, $lnk_inspec);
						if (mssql_num_rows($sql6)>0){
						while($row6 = mssql_fetch_array($sql6)) {
							$tipoparte=trim($row6["Descripcion"]);
						} 
						} else {
						    $tipoparte==$codtipoparte ." * No encontrado *";
						}
										
					 $paso9="SELECT Codigo, Descripcion FROM OrigenInfraccion WITH (NOLOCK) WHERE Codigo='".$codoriginfrac."'";
						$sql9 = mssql_query($paso9, $lnk_inspec);
						if (mssql_num_rows($sql9)>0){
						while($row9 = mssql_fetch_array($sql9)) {
							$originfrac=trim($row9["Descripcion"]);
						} 
						} else {
						    $originfrac=$codtipoparte ." * No encontrado *";
						}	
				if (($auxctcontrol!=1) && ($anhoantes!=$anhoproc)) {
						echo"<tr><td colspan='12' style='padding:1px;background-color:#dad7c7;'><img src='./images/espacio.gif' border='0' width='1' height='1' /></td></tr>";	
				}	 	
				echo "<tr><td align='center' width='30'>".$nroparte."</td><td width='60' align='center'>".$fechaparte."</td><td align='center' width='140'>".$infrac."</td><td align='center' width='200'>".$lugarinfrac."</td><td align='center' width='47'>".$horarinfrac."</td><td align='left' width='120'>".$lugarcitad."</td><td align='center' width='80'>".$fechacitad."<br />".$horacitad."</td><td >".$originfrac."</td></tr>";
				$anhoantes = $anhoproc;
				$auxctcontrol = $auxctcontrol + 1 ;
				} ?>

 			 </table>
			  <? } ?>

			        </td>
      </tr>
    </table>
			 <? } ?>
    		  
			   </dd>

<!-- Inspecciones Municipales -->    
 <?}?>    
 <?if ($ver9==1) { ?>

<!-- Permisos Provisorios -->    

			   <dt><span class="provisorio">Permisos Provisorios</span><? if ($hayprovisorio == 0) { echo "&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?></dt>
				<dd>
				<? if ($hayprovisorio != 0) { ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
      			<tr><td>
							   <!-- Anotaciones -->
			 
             <div id="loginContainerPermProv">
                <a href="#" id="loginButtonPermProv"><span class="google_bot_txt_bco">NOTAS</span></a>
                <div style="clear:both"></div>
                <div id="loginBoxPermProv">                
                    <form id="loginFormPermProv" action="mostrardatos.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="area" value="PermProv">
                        <fieldset class="cuerpo_gris" id="body">
                            <fieldset>
                                <label for="email">Obs. Perm. Provisorios</label>
                                <input type="text" name="anotacion" id="anotacion" onkeypress="return isAlpha2(event);" value="" maxlength="349" />
                            </fieldset>
                            <input type="submit" id="login" value="Grabar" />
                        </fieldset>
                      </form>
                </div>
            </div>

		    <!-- Anotaciones -->
			 <?
			 $result = mssql_query("SELECT PATENTE, ACTIVIDAD, RUT, EMISION, INICIO, TERMINO, NUMERO_BOLETIN, OBSERVACION, VALOR_PATENTE, CANTIDAD, VALOR_COBROS, VALOR_TOTAL, MONTO_UTM, ObservacionVigencia, Estado, MOTIVO_SUSP  FROM PATENTE WITH (NOLOCK) WHERE RUT='".$rut."' OR RUT='".$rut1."' OR RUT='".$rut2."' ORDER BY EMISION DESC", $lnk_provisorio);
			 if (mssql_num_rows($result)>0){
			 ?>
              <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' ><thead><tr><th width='30' align='center'>N&deg;<br />Patente</th><th width='100'>Actividad</th><th width='60'>Inicio</th><th width='60'>T&eacute;rmino</th><th width='76'>Valor Patente</th><th width='76'>Valor a Pagar</th><th width='60'>Fecha Pago</th><th align='left'>Observaciones</th></tr></thead><tr>
			  			 <? 
				while($row = mssql_fetch_array($result)) {
				    $Rut=$row["RUT"];
					$ptente=$row["PATENTE"];
					$codactiv=$row["ACTIVIDAD"];
					$fecini=$row["INICIO"];
					$fecterm=$row["TERMINO"];
					$obs=trim($row["OBSERVACION"]);
					$valorptente=$row["VALOR_PATENTE"];
					$valorapagar=$row["VALOR_TOTAL"];
					$statusperm=trim($row["Estado"]);
					$mtvosusp=trim($row["MOTIVO_SUSP"]);
					$observ=$obs;
					if (trim($mtvosusp) <> "" ) {
						$observ=$observ ." / ".$mtvosusp ;
					} 
					$dato=$fecini;
					if (substr($dato,0,3)=="Ene") {
						$dato = str_replace("Ene", "Jan", $dato);
					}
					if (substr($dato,0,3)=="Abr") {
						$dato = str_replace("Abr", "Apr", $dato);
					}
					if (substr($dato,0,3)=="Ago") {
						$dato = str_replace("Ago", "Aug", $dato);
					}
					if (substr($dato,0,3)=="Dic") {
						$dato = str_replace("Dic", "Dec", $dato);
					}				
					$fechap = strtotime($dato);
					$fecinicio = date( 'd/m/Y', $fechap);

					$dato=$fecterm;
					if (substr($dato,0,3)=="Ene") {
						$dato = str_replace("Ene", "Jan", $dato);
					}
					if (substr($dato,0,3)=="Abr") {
						$dato = str_replace("Abr", "Apr", $dato);
					}
					if (substr($dato,0,3)=="Ago") {
						$dato = str_replace("Ago", "Aug", $dato);
					}
					if (substr($dato,0,3)=="Dic") {
						$dato = str_replace("Dic", "Dec", $dato);
					}				
					$fechap = strtotime($dato);
					$fectermino = date( 'd/m/Y', $fechap);
					
					$paso="SELECT ACTIVIDAD, DESCRIPCION FROM ACTIVIDAD_ECONOMICA WITH (NOLOCK) WHERE ACTIVIDAD='". $codactiv."'";
						$sql3 = mssql_query($paso, $lnk_provisorio);
						if (mssql_num_rows($sql3)>0){
						    $dactiv="";
						while($row3 = mssql_fetch_array($sql3)) {
							$dactiv=trim($row3["DESCRIPCION"]);
						} 
						} else {
						   $dactiv=$codactiv ." * No encontrado *";
						} 

					$paso2="SELECT PATENTE, MES, ANO, RUT, FECHA_PAGO FROM PAGOS WITH (NOLOCK) WHERE PATENTE ='". $ptente."' AND ((RUT='".$rut."') OR (RUT='".$rut1."') OR (RUT='".$rut2."')) ";
					$sql4 = mssql_query($paso2, $lnk_provisorio);
					while($row4 = mssql_fetch_array($sql4)) {
						$dato=$row4["FECHA_PAGO"];
						if (substr($dato,0,3)=="Ene") {
							$dato = str_replace("Ene", "Jan", $dato);
						}
						if (substr($dato,0,3)=="Abr") {
							$dato = str_replace("Abr", "Apr", $dato);
						}
						if (substr($dato,0,3)=="Ago") {
							$dato = str_replace("Ago", "Aug", $dato);
						}
						if (substr($dato,0,3)=="Dic") {
							$dato = str_replace("Dic", "Dec", $dato);
						}				
						$fechap = strtotime($dato);
						$fecpago = date( 'd/m/Y', $fechap);
					} 
					 	
				echo "<tr><td align='center' width='30'>".$ptente."</td><td width='100' align='center'>".$dactiv."</td><td align='center' width='60'>".$fecinicio."</td><td align='center' width='60'>".$fectermino."</td><td align='right' width='76'> $".number_format($valorptente , 0 ,',' , '.' )."</td><td align='right' width='76'> $".number_format($valorapagar , 0 ,',' , '.' )."</td><td align='center' width='80'>".$fecpago."</td><td >".$observ."</td></tr>";
				} ?>

 			 </table>
			  <? } ?>

			        </td>
      </tr>
    </table>
			 <? } ?>
		</dd>	 

<!-- Permisos Provisorios -->    
 <?}?>    
 <?if ($ver10==1) { ?>

<!-- tesoreria -->    




			   <dt><span class="tesoreria">Otros Pagos</span><? if ($hayteso == 0) { echo "&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?></dt>
				<dd>
				<? if ($hayteso != 0) { ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
      			<tr><td>
				<!-- Anotaciones -->
			 
             <div id="loginContainerTesoreria">
                <a href="#" id="loginButtonTesoreria"><span class="google_bot_txt_bco">NOTAS</span></a>
                <div style="clear:both"></div>
                <div id="loginBoxTesoreria">                
                    <form id="loginFormTesoreria" action="mostrardatos.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="area" value="Tesoreria">
                        <fieldset class="cuerpo_gris" id="body">
                            <fieldset>
                                <label for="email">Obs. Tesorer&iacute;a</label>
                                <input type="text" name="anotacion" id="anotacion" onkeypress="return isAlpha2(event);" value="" maxlength="349" />
                            </fieldset>
                            <input type="submit" id="login" value="Grabar" />
                        </fieldset>
                      </form>
                </div>
            </div>

		    <!-- Anotaciones -->
			 <?
	
	$resultB = mssql_query("SELECT TOP 25 Ano_Proceso, Codigo_Area, Orden_Ingreso, Item_Pago, Fecha_Emision, Fecha_Vencimiento, Rut, Nombre, Placa_Vehiculo, Rol_Patente, Rol_Propiedad, EmitidoPor, Glosa, Fecha_OrdenIngreso, Ano_OrdenIngreso, Numero_OrdenIngreso, FormaDePago, NroConvenio, Tipo_Tarjeta, Codigo_Tarjeta, Rut_Tarjeta, Monto_Tarjeta, Pagado_ConOrdenIngreso, Pagado_ConIDOrdenIngreso, Numero_Licencia, idUnidadHabitacional, Folio_Unico, Total_OrdenIngreso FROM EncabezadoIngresosDiarios WITH (NOLOCK) WHERE ((Item_Pago<>5)AND(Item_Pago<>17)AND(Item_Pago<>18)AND(Item_Pago<>26)) AND ((Rut='".$rut."') OR (Rut='".$rut1."') OR (Rut='".$rut2."')) ORDER BY Ano_Proceso DESC",$lnk_teso);
	if (mssql_num_rows($resultB)>0){
	?>
				  <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				  <thead><tr><th width="20">Orden de Ingreso</th><th width="80">Fecha</th><th width="240">Glosa</th><th width="38">Rol Propiedad</th><th width="80">Valor Total</th></tr></thead>
				 <? $auxctcontrol=1;
					$anhoantes="";
					while($row = mssql_fetch_array($resultB)) {
						$ordingreso="";
						$fechaemi="";
						$cerglosa="";
						$rolprop="";
						$valorpagado="";
						$anhoproc="";
	
						$ordingreso=trim($row["Orden_Ingreso"]);
						$itempago=trim($row["Item_Pago"]);	
						$cerglosa=trim($row["Glosa"]);
						$rolprop=trim($row["Rol_Propiedad"]);
						$valorpagado=trim($row["Total_OrdenIngreso"]);
						if (strlen($valorpagado) > 0 ) {
						  $valorpagado="$ ".number_format($valorpagado , 0 ,',' , '.' );
						}
						$anhoproc=trim($row["Ano_Proceso"]);
	
						$dato=$row["Fecha_Emision"];
						if (strlen($dato) != 0 ){
							if (substr($dato,0,3)=="Ene") {
								$dato = str_replace("Ene", "Jan", $dato);
							}
							if (substr($dato,0,3)=="Abr") {
								$dato = str_replace("Abr", "Apr", $dato);
							}
							if (substr($dato,0,3)=="Ago") {
								$dato = str_replace("Ago", "Aug", $dato);
							}
							if (substr($dato,0,3)=="Dic") {
								$dato = str_replace("Dic", "Dec", $dato);
							}				
							$fechanacim = strtotime($dato);
							$fechaemi = date( 'd/m/Y', $fechanacim);
						}
						if (($auxctcontrol!=1) && ($anhoantes!=$anhoproc)) {
							echo"<tr><td colspan='12' style='padding:1px;background-color:#dad7c7;'><img src='./images/espacio.gif' border='0' width='1' height='1' /></td></tr>";	
						}
						if ( strlen($cerglosa) == 0 ){
							$qryteso2="SELECT TOP 25 Ano_Proceso,Codigo_Area,NumeroCaja,Orden_Ingreso,IDOrden_Ingreso,Item_Pago,Correlativo_Ingreso,Monto,upsize_ts,Devengar FROM DetalleIngresosDiarios WITH (NOLOCK) WHERE Item_Pago='".$itempago."' AND Orden_Ingreso='".$ordingreso."' AND Ano_Proceso='".$anhoproc."' ORDER BY Ano_Proceso DESC";
							$result9 = mssql_query($qryteso2, $lnk_teso);
							if (mssql_num_rows($result9)>0){
								while($row = mssql_fetch_array($result9)) { 
									 $correlingreso=trim($row["Correlativo_Ingreso"]);
									 $qrycomun3="SELECT Ano_Proceso,Item_Pago,Descripcion,CuentaContable,Actualizada FROM Ing_Cuentas WITH (NOLOCK) WHERE Item_Pago='".$itempago."' and Ano_Proceso='".$anhoproc."' AND Correlativo_Ingreso='".$correlingreso."' ORDER BY Ano_Proceso DESC";
									 $resultA = mssql_query($qrycomun3, $lnk_comun);
									 if (mssql_num_rows($resultA)>0){
										 while($row = mssql_fetch_array($resultA)) { 
											 $cerglosa=trim($row["Descripcion"]);
										 }
									 }	 
								}
							}
						}
						echo "<tr><td align='center' >".$ordingreso."</td><td align='center'>".$fechaemi."</td><td  align='left'>".$cerglosa."</td><td align='center' >".$rolprop."</td><td align='right' >".$valorpagado." </td></tr>";
						$anhoantes = $anhoproc;
						$auxctcontrol = $auxctcontrol + 1 ;
					  } 
	  ?>  
	</table> 
			  <? } ?>

			 </td>
      </tr>
    </table> 

			 <? } ?>
		</dd>	 		
		

 <dt><span class="tesoreria">Observaciones (WorkFlow)</span><? if ($haywf == 0) { echo "&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?></dt>
				<dd>

              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
      			<tr><td>
		 <?
	$pasoC="SELECT * FROM anotaciones WHERE vigente=1 and rut_asociado='".$rut."' OR rut_asociado='".$rut1."' OR rut_asociado='".$rut2."' order by id_anotacion desc";
	$resultC = mysql_query($pasoC,$conexio);
	$numeroRegistrosC=mysql_num_rows($resultC);
	if ($numeroRegistrosC>0){
	?>
				 <?
	 while($row_1=mysql_fetch_array($resultC)) {
			$id_anotacion=$row_1["id_anotacion"]; 
			$observacion=$row_1["observacion"];
			$fecha_hora=$row_1["fecha_creacion"];
			$area=$row_1["area"];
	$pasobarea="SELECT * FROM wf_areas WHERE nombre_area='".$area."'";
	$barea = mysql_query($pasobarea,$conexio);
  
	 while($row_barea=mysql_fetch_array($barea)) {
		$nombrearea=$row_barea["desc_area"];
	 }
	  $result_09 = "SELECT * FROM wf_workflow WHERE id_anotacion='".$id_anotacion."' order BY id_wf DESC";
	  $res_09=mysql_query($result_09,$conexio); 
	  $numeroRegistros_09=mysql_num_rows($res_09); 
	  if ($numeroRegistros_09>0) { ?>	
				<div align="left"><span class='pestana'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observacion</th><th width='60'>Fecha</th><th>Area Obs.</th></tr></thead>
	<? 
				while($row_wf=mysql_fetch_array($res_09)) 
				{ 
					$enviado_a_d=$row_wf["enviado_a"];
					$observacion_d=$row_wf["observacion"];
					$fecha_hora_d=$row_wf["fecha_hora"];
					$rut_ciudadano_d=$row_wf["rut_ciudadano"];
					?>
				<tr><td align='center' width='30'><?=$enviado_a_d?></td><td width='60' align='center'><?=$observacion_d?></td><td align='center' width='140'><?=$fecha_hora_d?></td><td align='center' width='200'><?=$nombrearea?></td></tr>
				<?}?>
				</table> 
			  <? }else{ ?>
					
					
				<div align="left"><span class='pestana'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observacion</th><th width='60'>Fecha</th><th>Area Obs.</th></tr></thead>
				<tr><td align='center' width='30'>SIN ASIGNAR EN WF</td><td width='60' align='center'><?=$observacion_d?></td><td align='center' width='140'><?=$fecha_hora_d?></td><td align='center' width='200'><?=$nombrearea?></td></tr>
				</table> 	
					<?}}?>

			 </td>
      </tr>
    </table> 

			 <? } 
			 ?>
		</dd>	 
	
		 <? } 
			 ?>	
  		</dl>		
	   </div>
	</div>     
    
    </td></tr>
</table>
<!-- 	</td></tr>
</table>
-->
</div>
</body>

<?
} else { ?>
 <div align="center"> 
  <table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm.png" width="200" height="65" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Vecinos<br />
            <span class="Arial2_red">Uso Exclusivo de la <?=$g_nombre_muni?></span></td>
          <td width="15%" align="center" valign="middle" class="fecha"><?php echo $fecha ?></td>
        </tr>
        <tr>
          <td colspan="3" align="right" valign="middle" class="borde_button"><input type="submit" class="rojo_sombra" value="&laquo; Volver" onclick="javascript:history.back(1)"/>&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle">
		     <span>No hay datos para la b&uacute;squeda realizada</span><br />
			 <img src="images/lupa_carpeta144.jpg" alt="No hay datos"  border="0" /><br />
		  </td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle" bgcolor="#666666" class="Arial3"><p>&nbsp;</p>
          <p><img src="images/logo_sm_bco.png" width="100" height="33" /></p>
          <p>2013 Todos los Derechos reservados. <?=$g_nombre_muni?></p>
          <p>&nbsp;</p></td>
        </tr>
      </table></td>
  </tr>
</table>
</div>
<? }?>
</html>