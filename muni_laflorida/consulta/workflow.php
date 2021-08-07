<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
    include("conectar_bd.php"); 
    conectar_bd();
    include("conectar_np.php"); 

require_once('calendar/classes/tc_calendar.php');

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
	$correo_usu=$row_usuario["tx_correo"];
    $sql_adm = "SELECT * FROM wf_adm WHERE id_usuario = '".$_SESSION['uid']."'"; 
    $result_adm =mysql_query($sql_adm,$conexio);
	$numeroRegistros_adm=mysql_num_rows($result_adm);
	
	while($row_adm=mysql_fetch_array($result_adm)) 
		{ 
		$miarea=$row_adm["area"];
		$wf_areas_txt="SELECT * FROM wf_areas where id_area=".$row_adm["area"]; 
		$wf_areas=mysql_query($wf_areas_txt,$conexio);
		while($row_wf_areas=mysql_fetch_array($wf_areas)) 
			{ 
			$nombre_area=$row_wf_areas["nombre_area"];
			}
		}
}
//VALIDACION
 $tipousr=$_SESSION['tus'];
 $fecha = date("d/m/Y"); 
/* $rut = '001771377-9'; */
$rut= $_GET["r"];  
$rut1="0".$rut;
$rut2="00".$rut;
require_once('./conexion3.php');
// require_once('./conexion3_al41.php');

// <!-- Anotaciones -->

if ($_POST["anota"]=="SI") {

$paso="fecha_revisar".$_POST["idanotacion"];
$fecha_guarda = str_replace("-", "", $_POST[$paso]);
if (strlen(trim($_POST["observacion"]))> 0 ) {


if ($_POST["glosa"]==3) {


$sql_wf="insert into wf_workflow (id_anotacion,fecha_hora,enviado_a,observacion,rut_ciudadano,glosa,fecha_cierre,usuario_responsable) values (".$_POST["idanotacion"].",Now(),'".$_POST["enviado_a"]."','".$_POST["observacion"]."','".$_POST["rut_asociado"]."',".$_POST["glosa"].",Now(),".$_SESSION['uid'].")";

$sql="update anotaciones set vigente=0 where  id_anotacion=".$_POST["idanotacion"];

	if ($_SESSION['sql_wf']!=$sql_wf) {
		$_SESSION['sql_wf']=$sql_wf;
		$res2_wf=mysql_query($sql_wf,$conexio);
		$res2=mysql_query($sql,$conexio);
		}

}else{
$sql_wf="insert into wf_workflow (id_anotacion,fecha_hora,enviado_a,observacion,rut_ciudadano,glosa,fecha_resuelve,usuario_responsable) values (".$_POST["idanotacion"].",Now(),'".$_POST["enviado_a"]."','".$_POST["observacion"]."','".$_POST["rut_asociado"]."',".$_POST["glosa"].",'".$fecha_guarda."',".$_SESSION['uid'].")";
$corte=0;
if ($_SESSION['sql_wf']!=$sql_wf) {
	$_SESSION['sql_wf']=$sql_wf;
	$res2_wf=mysql_query($sql_wf,$conexio);
	$corte=1;
	}
}
if ($corte==1) {
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

	$nombre=$nombre_usu;
	$correo=$correo_usu;

	$mail->From=$correopagina;
	$mail->FromName="WorkFlow ".$nombre_corto;
	$mail->Sender=$correopagina;
	$mail->AddReplyTo($correopagina, "NO Responder a este mail");
	$mail->Subject = $nombre.", Nueva actualizacion de FT" ;
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
	$body .=  "<p><font color='#000000' face='Arial'>". $nombre_usu. ", has Realizado una nueva Observacion para el Rut:<br> ".$_POST["rut_asociado"]."<br>(".$_POST["observacion"].")</font></p><font color='#000000' face='Arial'>Se debera realizar un seguimiento el dia ".substr($fecha_guarda,6,2)."/".substr($fecha_guarda,4,2)."/".substr($fecha_guarda,0,4)."<br /></font></td></tr>";
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

	$nombre=$nombre_usu;
	$correo=$_POST["enviado_a"];
	$mail->From=$correopagina;
	$mail->FromName="WorkFlow ".$nombre_corto;
	$mail->Sender=$correopagina;
	$mail->AddReplyTo($correopagina, "NO Responder a este mail");
	$mail->Subject = $nombre.", te ha enviado una solicitud" ;
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
	$body .=  "<p><font color='#000000' face='Arial'>". $nombre_usu. ", ha Realizado una Observacion para el Rut:<br> ".$_POST["rut_asociado"]."<br>(".$_POST["observacion"].")</font></p><font color='#000000' face='Arial'>Se debera entregar un resultado de la gestion para el dia:".substr($fecha_guarda,6,2)."/".substr($fecha_guarda,4,2)."/".substr($fecha_guarda,0,4).".<br /></font></td></tr>";
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

// Distribucion del WorkFlow //
}
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
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>

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
	  $result_0 = "SELECT * FROM anotaciones WHERE rut_asociado='".$rut."'";
	  $res_0=mysql_query($result_0,$conexio); 
	  $numeroRegistros_0=mysql_num_rows($res_0); 
	  if ($numeroRegistros_0>0) { 
    $hayanotaciones=1;
	  }
	  $result_0 = "SELECT * FROM wf_workflow WHERE rut_ciudadano='".$rut."'";
	  $res_0=mysql_query($result_0,$conexio); 
	  $numeroRegistros_0=mysql_num_rows($res_0); 
	  if ($numeroRegistros_0>0) { 
    $haywf=1;
	  }

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

$votacion="SELECT * FROM MESARENDICION where rut_compara='".$rut_votacion."'"; 
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
          <td width="67%" align="center" valign="middle">Asignaciones de Trabajo (Observaciones)</td>
          <td width="16%" align="center" valign="middle" class="fecha"><i><?php echo $fecha ?></i><br>
		  </td>
        </tr>
        <tr>
          <td colspan="3" >
		  <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>

				  <td width="106" align="left" class="Arial2">
<form method="post" id="menu_form" name="menu_form" action="observaciones.php?donde=1" onsubmit="return validselect();" >
								<input type=hidden name=fecha_va value=<?=$_GET["fecha_va"]?>>
				  			  &nbsp;<input type="submit" class="rojo_sombra" value="&laquo; Volver"  />
</form>
				  </td>
                  <td width="77" align="center">&nbsp;</td>
				  
                  <td width="258" align="right"><span class="Arial2">Buscar otro RUT&nbsp; :&nbsp;</span></td>
                  <td width="23" align="center" class="Arial2"><img src="images/icons/id.png" width="20" height="20" /></td>
				  <form name="form1" method="post" action="workflow.php" onsubmit="return validaRut()" >
                  <td width="269" align="center" valign="middle" class="tabla_cont_social"><input name="rutpersona" type="text" class="campo_txt" id="rutpersona" size="50" maxlength="20" onkeypress="javascript:numerosk(event);" value="" onkeyup="javascript:validaRutEnter(event)" placeholder="Ej: 12345678-9" style="width:220px !important;"/></td>
                  <td width="50" align="right"><input type="submit" class="rojo_sombra_search" value="Buscar" /></td ></form>
				  <td width="77" align="center">&nbsp;</td>
				  <td width="106" align="right" class="Arial2">&nbsp;
				  <input type="submit" class="rojo_sombra" value="Terminar &Theta;" onclick="location='Logout.php'"/>

				  </td> 
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
                <? if ($tipousr != 2 ) {  ?>
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

 	<?
	if ($miarea==0 or $nombre_area=="General") {	
	
	$result = "SELECT * FROM anotaciones WHERE vigente=1 and rut_asociado='".$rut."'  and area='General' order by id_anotacion desc";
	  $res=mysql_query($result,$conexio); 
	  $numeroRegistros=mysql_num_rows($res);?>
 <? if ($numeroRegistros > 0) {?>
		    <dt id="starter"><span class="social">Observaciones Generales </span></dt>
    		 <dd>
             <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 </td><td>
	 <?
while($row_1=mysql_fetch_array($res)) {
			$id_anotacion=$row_1["id_anotacion"]; 
			$observacion=$row_1["observacion"];
			$fecha_hora=$row_1["fecha_creacion"];
	  $result_0 = "SELECT * FROM wf_workflow WHERE id_anotacion='".$id_anotacion."' order BY id_wf DESC";
	  $res_0=mysql_query($result_0,$conexio); 
	  $numeroRegistros_0=mysql_num_rows($res_0); 
	  	  $enviado_a_d="";
	  $observacion_d="";
	  $fecha_hora_d="";
	  if ($numeroRegistros_0>0) { ?>	
				<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
	<? 
				while($row_wf=mysql_fetch_array($res_0)) 
				{ 
					$enviado_a_d=$row_wf["enviado_a"];
					$observacion_d=$row_wf["observacion"];
					$fecha_hora_d=$row_wf["fecha_hora"];
					$SQL_glosa1=" SELECT * FROM wf_glosas where id_glosa=".$row_wf["glosa"];
						$glosa1=mysql_query($SQL_glosa1,$conexio); 
						while($filaglosa1=mysql_fetch_array($glosa1)) {
							$glosa_d=$filaglosa1["descrip_glosa"];
							}?>
				<tr><td align='left' width='30'><?=$enviado_a_d?></td><td width='60' align='left'><?=$observacion_d?></td><td align='center' width='140'><?=$fecha_hora_d?></td><td align='left' width='200'><?=$glosa_d?></td></tr>
			<?}?>
				</table>
<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='98%' border='1' cellspacing='0' cellpadding='0'  class="workflow" align=right>
				<thead><tr><th width='100' align='center'>Enviado a (e-mail)</th><th width='200'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='200' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=30 /></td>
				<td align='center' width='60'>
				<select name="glosa" id="glosa" style="font-size:10px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf" /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->				 

	<?}else{ ?>
  					<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
				<tr><td align='center' width='30'>SIN ASIGNAR EN WF</td><td width='60' align='center'><?=$observacion?></td><td align='center' width='140'><?=$fecha_hora?></td><td align='center' width='200'><?=$glosa_d?></td></tr>
				</table> 
<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
<?}
} ?>
</td></tr>

</table>  	
		</dd>
<?} 
	}
?>

 	<?
	if ($miarea==0 or $nombre_area=="Social") {	
	
	$result1 = "SELECT * FROM anotaciones WHERE vigente=1 and rut_asociado='".$rut."'  and area='Social' order by id_anotacion desc";
	  $res1=mysql_query($result1,$conexio); 
	  $numeroRegistros1=mysql_num_rows($res1);?>
<? if ($numeroRegistros1 > 0) {?>
		    <dt><span class="social">Observaciones en &aacute;rea Social </span></dt>
				
    		 <dd>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			<tr><td>
	 <?
	 while($row_11=mysql_fetch_array($res1)) {
			$id_anotacion=$row_11["id_anotacion"]; 
			$observacion=$row_11["observacion"];
			$fecha_hora=$row_11["fecha_creacion"];
	  $result_01 = "SELECT * FROM wf_workflow WHERE id_anotacion='".$id_anotacion."' order BY id_wf DESC";
	  $res_01=mysql_query($result_01,$conexio); 
	  $numeroRegistros_01=mysql_num_rows($res_01); 
	  	  $enviado_a_d="";
	  $observacion_d="";
	  $fecha_hora_d="";
	  if ($numeroRegistros_01>0) { ?>	
				<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
	<? 
				while($row_wf1=mysql_fetch_array($res_01)) 
				{ 
					$enviado_a_d=$row_wf["enviado_a"];
					$observacion_d=$row_wf["observacion"];
					$fecha_hora_d=$row_wf["fecha_hora"];
					$SQL_glosa1=" SELECT * FROM wf_glosas where id_glosa=".$row_wf["glosa"];
						$glosa1=mysql_query($SQL_glosa1,$conexio); 
						while($filaglosa1=mysql_fetch_array($glosa1)) {
							$glosa_d=$filaglosa1["descrip_glosa"];
							}?>
				<tr><td align='left' width='30'><?=$enviado_a_d?></td><td width='60' align='left'><?=$observacion_d?></td><td align='center' width='140'><?=$fecha_hora_d?></td><td align='left' width='200'><?=$glosa_d?></td></tr>

<!-- WORK FLOW-->

			<?}?>
</table>
<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
	<?}else{ ?>
  					<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
				<tr><td align='center' width='30'>SIN ASIGNAR EN WF</td><td width='60' align='center'><?=$observacion?></td><td align='center' width='140'><?=$fecha_hora?></td><td align='center' width='200'><?=$glosa_d?></td></tr>
				</table> 
				<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
<?}
} ?>
</td></tr>
</table> 
</table>  	
		</dd>
<?} 
	}

	if ($miarea==0 or $nombre_area=="PatCom") {
		
	  $result2 = "SELECT * FROM anotaciones WHERE vigente=1 and rut_asociado='".$rut."'  and area='PatCom' order by id_anotacion desc";
	  $res2=mysql_query($result2,$conexio); 
	  $numeroRegistros2=mysql_num_rows($res2);?>
<? if ($numeroRegistros2 > 0) {?>
		    <dt><span class="patente">Observaciones en &aacute;rea Patentes Comerciales </span></dt>
    		 <dd>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			<tr><td>
	 <?
	 while($row_12=mysql_fetch_array($res2)) {
			$id_anotacion=$row_12["id_anotacion"]; 
			$observacion=$row_12["observacion"];
			$fecha_hora=$row_12["fecha_creacion"];
	  $result_02 = "SELECT * FROM wf_workflow WHERE id_anotacion='".$id_anotacion."' order BY id_wf DESC";
	  $res_02=mysql_query($result_02,$conexio); 
	  $numeroRegistros_02=mysql_num_rows($res_02); 
	  $enviado_a_d="";
	  $observacion_d="";
	  $fecha_hora_d="";
	  if ($numeroRegistros_02>0) { ?>	
				<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
	<? 
				while($row_wf=mysql_fetch_array($res_02)) 
				{ 
					$enviado_a_d=$row_wf["enviado_a"];
					$observacion_d=$row_wf["observacion"];
					$fecha_hora_d=$row_wf["fecha_hora"];
					$SQL_glosa1=" SELECT * FROM wf_glosas where id_glosa=".$row_wf["glosa"];
						$glosa1=mysql_query($SQL_glosa1,$conexio); 
						while($filaglosa1=mysql_fetch_array($glosa1)) {
							$glosa_d=$filaglosa1["descrip_glosa"];
							}?>
				<tr><td align='left' width='30'><?=$enviado_a_d?></td><td width='60' align='left'><?=$observacion_d?></td><td align='center' width='140'><?=$fecha_hora_d?></td><td align='left' width='200'><?=$glosa_d?></td></tr>
				<?}?>
		</table>
		<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
	<?}else{ ?>
  					<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
				<tr><td align='center' width='30'>SIN ASIGNAR EN WF</td><td width='60' align='center'><?=$observacion?></td><td align='center' width='140'><?=$fecha_hora?></td><td align='center' width='200'><?=$glosa_d?></td></tr>
				</table> 
				<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
<?}
} ?>
</td></tr>
</table> 
		</dd>
<?} 
	}

	if ($miarea==0 or $nombre_area=="PerCirc") {
		
	  $result3 = "SELECT * FROM anotaciones WHERE vigente=1 and rut_asociado='".$rut."'  and area='PerCirc' order by id_anotacion desc";
	  $res3=mysql_query($result3,$conexio); 
	  $numeroRegistros3=mysql_num_rows($res3);?>
<? if ($numeroRegistros3 > 0) {?>
			<dt><span class="circulacion">Observaciones en &aacute;rea Permiso de Circulaci&oacute;n</span></dt>
    		 <dd>
             <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td>
	 <?$res3=mysql_query($result3,$conexio); 
	 while($row_1=mysql_fetch_array($res3)) {
			$id_anotacion=$row_1["id_anotacion"]; 
			$observacion=$row_1["observacion"];
			$fecha_hora=$row_1["fecha_creacion"];
	  $result_03 = "SELECT * FROM wf_workflow WHERE id_anotacion='".$id_anotacion."' order BY id_wf DESC";
	  $res_03=mysql_query($result_03,$conexio); 
	  $numeroRegistros_03=mysql_num_rows($res_03); 
	  	  $enviado_a_d="";
	  $observacion_d="";
	  $fecha_hora_d="";
	  if ($numeroRegistros_03>0) { ?>	
				<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
	<? 
				while($row_wf=mysql_fetch_array($res_03)) 
				{ 
					$enviado_a_d=$row_wf["enviado_a"];
					$observacion_d=$row_wf["observacion"];
					$fecha_hora_d=$row_wf["fecha_hora"];
					$SQL_glosa1=" SELECT * FROM wf_glosas where id_glosa=".$row_wf["glosa"];
						$glosa1=mysql_query($SQL_glosa1,$conexio); 
						while($filaglosa1=mysql_fetch_array($glosa1)) {
							$glosa_d=$filaglosa1["descrip_glosa"];
							}?>
				<tr><td align='left' width='30'><?=$enviado_a_d?></td><td width='60' align='left'><?=$observacion_d?></td><td align='center' width='140'><?=$fecha_hora_d?></td><td align='left' width='200'><?=$glosa_d?></td></tr>
<?}?>
</table>
<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
	<?}else{ ?>
  					<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
				<tr><td align='center' width='30'>SIN ASIGNAR EN WF</td><td width='60' align='center'><?=$observacion?></td><td align='center' width='140'><?=$fecha_hora?></td><td align='center' width='200'><?=$glosa_d?></td></tr>
				</table> 
				<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
<?}
} ?>
</td></tr></table>		
	</dd>	
<?} 
	}

	if ($miarea==0 or $nombre_area=="LicCond") {
		
	  $result4 = "SELECT * FROM anotaciones WHERE vigente=1 and rut_asociado='".$rut."'  and area='LicCond' order by id_anotacion desc";
	  $res4=mysql_query($result4,$conexio); 
	  $numeroRegistros4=mysql_num_rows($res4);?>
<? if ($numeroRegistros4 > 0) {?>
		    <dt><span class="licencia">Observaciones en &aacute;rea Licencia de Conducir</span></dt>
    		 <dd>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			<tr><td>
	 <?
	while($row_1=mysql_fetch_array($res4)) {
			$id_anotacion=$row_1["id_anotacion"]; 
			$observacion=$row_1["observacion"];
			$fecha_hora=$row_1["fecha_creacion"];
	  $result_04 = "SELECT * FROM wf_workflow WHERE id_anotacion='".$id_anotacion."' order BY id_wf DESC";
	  $res_04=mysql_query($result_04,$conexio); 
	  $numeroRegistros_04=mysql_num_rows($res_04); 
	  	  $enviado_a_d="";
	  $observacion_d="";
	  $fecha_hora_d="";
	  if ($numeroRegistros_04>0) { ?>	
				<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
	<? 
				while($row_wf=mysql_fetch_array($res_04)) 
				{ 
					$enviado_a_d=$row_wf["enviado_a"];
					$observacion_d=$row_wf["observacion"];
					$fecha_hora_d=$row_wf["fecha_hora"];
					$SQL_glosa1=" SELECT * FROM wf_glosas where id_glosa=".$row_wf["glosa"];
						$glosa1=mysql_query($SQL_glosa1,$conexio); 
						while($filaglosa1=mysql_fetch_array($glosa1)) {
							$glosa_d=$filaglosa1["descrip_glosa"];
							}?>
				<tr><td align='left' width='30'><?=$enviado_a_d?></td><td width='60' align='left'><?=$observacion_d?></td><td align='center' width='140'><?=$fecha_hora_d?></td><td align='left' width='200'><?=$glosa_d?></td></tr>
<?}?>
</table>
<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
	<?}else{ ?>
  					<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
				<tr><td align='center' width='30'>SIN ASIGNAR EN WF</td><td width='60' align='center'><?=$observacion?></td><td align='center' width='140'><?=$fecha_hora?></td><td align='center' width='200'><?=$glosa_d?></td></tr>
				</table> 
				<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
<?}
} ?>
</td></tr></table>  	
		</dd>
<?} 
	}

	if ($miarea==0 or $nombre_area=="Aseo") {
		
	  $result5 = "SELECT * FROM anotaciones WHERE vigente=1 and rut_asociado='".$rut."'  and area='Aseo' order by id_anotacion desc";
	  $res5=mysql_query($result5,$conexio); 
	  $numeroRegistros5=mysql_num_rows($res5);?>
<? if ($numeroRegistros5 > 0) {?>
		    <dt><span class="aseo">Observaciones en &aacute;rea Aseo</span></dt>
    		 <dd>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			<tr><td>
	 <?
	 while($row_1=mysql_fetch_array($res5)) {
			$id_anotacion=$row_1["id_anotacion"]; 
			$observacion=$row_1["observacion"];
			$fecha_hora=$row_1["fecha_creacion"];
	  $result_05 = "SELECT * FROM wf_workflow WHERE id_anotacion='".$id_anotacion."' order BY id_wf DESC";
	  $res_05=mysql_query($result_05,$conexio); 
	  $numeroRegistros_05=mysql_num_rows($res_05); 
	  	  $enviado_a_d="";
	  $observacion_d="";
	  $fecha_hora_d="";
	  if ($numeroRegistros_05>0) { ?>	
				<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
	<? 
				while($row_wf=mysql_fetch_array($res_05)) 
				{ 
					$enviado_a_d=$row_wf["enviado_a"];
					$observacion_d=$row_wf["observacion"];
					$fecha_hora_d=$row_wf["fecha_hora"];
					$SQL_glosa1=" SELECT * FROM wf_glosas where id_glosa=".$row_wf["glosa"];
						$glosa1=mysql_query($SQL_glosa1,$conexio); 
						while($filaglosa1=mysql_fetch_array($glosa1)) {
							$glosa_d=$filaglosa1["descrip_glosa"];
							}?>
				<tr><td align='left' width='30'><?=$enviado_a_d?></td><td width='60' align='left'><?=$observacion_d?></td><td align='center' width='140'><?=$fecha_hora_d?></td><td align='left' width='200'><?=$glosa_d?></td></tr>
<?}?>
</table>
<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
	<?}else{ ?>
  					<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
				<tr><td align='center' width='30'>SIN ASIGNAR EN WF</td><td width='60' align='center'><?=$observacion?></td><td align='center' width='140'><?=$fecha_hora?></td><td align='center' width='200'><?=$glosa_d?></td></tr>
				</table> 
				<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
<?}
} ?>
</td></tr></table>  	
		</dd>
<?} 
	}

	if ($miarea==0 or $nombre_area=="CertObras") {
		
	  $result6 = "SELECT * FROM anotaciones WHERE vigente=1 and rut_asociado='".$rut."'  and area='CertObras' order by id_anotacion desc";
	  $res6=mysql_query($result6,$conexio); 
	  $numeroRegistros6=mysql_num_rows($res6);?>
<? if ($numeroRegistros6 > 0) {?>
		    <dt><span class="obras">Observaciones en &aacute;rea Certificado de Obras</span></dt>
    		 <dd>
             <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td>
	 <?
	 while($row_1=mysql_fetch_array($res6)) {
			$id_anotacion=$row_1["id_anotacion"]; 
			$observacion=$row_1["observacion"];
			$fecha_hora=$row_1["fecha_creacion"];
	  $result_06 = "SELECT * FROM wf_workflow WHERE id_anotacion='".$id_anotacion."' order BY id_wf DESC";
	  $res_06=mysql_query($result_06,$conexio); 
	  $numeroRegistros_06=mysql_num_rows($res_06); 
	  	  $enviado_a_d="";
	  $observacion_d="";
	  $fecha_hora_d="";
	  if ($numeroRegistros_06>0) { ?>	
				<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
	<? 
				while($row_wf=mysql_fetch_array($res_06)) 
				{ 
					$enviado_a_d=$row_wf["enviado_a"];
					$observacion_d=$row_wf["observacion"];
					$fecha_hora_d=$row_wf["fecha_hora"];
					$SQL_glosa1=" SELECT * FROM wf_glosas where id_glosa=".$row_wf["glosa"];
						$glosa1=mysql_query($SQL_glosa1,$conexio); 
						while($filaglosa1=mysql_fetch_array($glosa1)) {
							$glosa_d=$filaglosa1["descrip_glosa"];
							}?>
				<tr><td align='left' width='30'><?=$enviado_a_d?></td><td width='60' align='left'><?=$observacion_d?></td><td align='center' width='140'><?=$fecha_hora_d?></td><td align='left' width='200'><?=$glosa_d?></td></tr>
<?}?>
</table>
<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
	<?}else{ ?>
  					<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
				<tr><td align='center' width='30'>SIN ASIGNAR EN WF</td><td width='60' align='center'><?=$observacion?></td><td align='center' width='140'><?=$fecha_hora?></td><td align='center' width='200'><?=$glosa_d?></td></tr>
				</table> 
				<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
<?}
} ?>
</td></tr></table>  	
		</dd>
<?} 
	}

	if ($miarea==0 or $nombre_area=="Inspeccion") {
		
	  $result7 = "SELECT * FROM anotaciones WHERE vigente=1 and rut_asociado='".$rut."'  and area='Inspeccion' order by id_anotacion desc";
	  $res7=mysql_query($result7,$conexio); 
	  $numeroRegistros7=mysql_num_rows($res7);?>
<? if ($numeroRegistros7 > 0) {?>
		    <dt><span class="inspecciones">Observaciones en &aacute;rea Inspecciones Municipales</span></dt>
    		 <dd>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td>
	 <?
	 while($row_1=mysql_fetch_array($res7)) {
			$id_anotacion=$row_1["id_anotacion"]; 
			$observacion=$row_1["observacion"];
			$fecha_hora=$row_1["fecha_creacion"];
	  $result_07 = "SELECT * FROM wf_workflow WHERE id_anotacion='".$id_anotacion."' order BY id_wf DESC";
	  $res_07=mysql_query($result_07,$conexio); 
	  $numeroRegistros_07=mysql_num_rows($res_07); 
	  	  $enviado_a_d="";
	  $observacion_d="";
	  $fecha_hora_d="";
	  if ($numeroRegistros_07>0) { ?>	
				<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
	<? 
				while($row_wf=mysql_fetch_array($res_07)) 
				{ 
					$enviado_a_d=$row_wf["enviado_a"];
					$observacion_d=$row_wf["observacion"];
					$fecha_hora_d=$row_wf["fecha_hora"];
					$SQL_glosa1=" SELECT * FROM wf_glosas where id_glosa=".$row_wf["glosa"];
						$glosa1=mysql_query($SQL_glosa1,$conexio); 
						while($filaglosa1=mysql_fetch_array($glosa1)) {
							$glosa_d=$filaglosa1["descrip_glosa"];
							}?>
				<tr><td align='left' width='30'><?=$enviado_a_d?></td><td width='60' align='left'><?=$observacion_d?></td><td align='center' width='140'><?=$fecha_hora_d?></td><td align='left' width='200'><?=$glosa_d?></td></tr>
<?}?>
</table>
<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
	<?}else{ ?>
  					<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
				<tr><td align='center' width='30'>SIN ASIGNAR EN WF</td><td width='60' align='center'><?=$observacion?></td><td align='center' width='140'><?=$fecha_hora?></td><td align='center' width='200'><?=$glosa_d?></td></tr>
				</table> 
				<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
<?}
} ?>
</td></tr></table>  	
		</dd>
<?} 
	}

	if ($miarea==0 or $nombre_area=="PermProv") {
		
	  $result8 = "SELECT * FROM anotaciones WHERE vigente=1 and rut_asociado='".$rut."'  and area='PermProv' order by id_anotacion desc";
	  $res8=mysql_query($result8,$conexio); 
	  $numeroRegistros8=mysql_num_rows($res8);?>
<? if ($numeroRegistros8 > 0) {?>
		    <dt><span class="provisorio">Observaciones en &aacute;rea Permisos Provisorios</span></dt>
    		 <dd>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			<tr><td>
	 <?
	while($row_1=mysql_fetch_array($res8)) {
			$id_anotacion=$row_1["id_anotacion"]; 
			$observacion=$row_1["observacion"];
			$fecha_hora=$row_1["fecha_creacion"];
	  $result_08 = "SELECT * FROM wf_workflow WHERE id_anotacion='".$id_anotacion."' order BY id_wf DESC";
	  $res_08=mysql_query($result_08,$conexio); 
	  $numeroRegistros_08=mysql_num_rows($res_08); 
	  	  $enviado_a_d="";
	  $observacion_d="";
	  $fecha_hora_d="";
	  if ($numeroRegistros_08>0) { ?>	
				<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
	<? 
				while($row_wf=mysql_fetch_array($res_08)) 
				{ 
					$enviado_a_d=$row_wf["enviado_a"];
					$observacion_d=$row_wf["observacion"];
					$fecha_hora_d=$row_wf["fecha_hora"];
					$SQL_glosa1=" SELECT * FROM wf_glosas where id_glosa=".$row_wf["glosa"];
						$glosa1=mysql_query($SQL_glosa1,$conexio); 
						while($filaglosa1=mysql_fetch_array($glosa1)) {
							$glosa_d=$filaglosa1["descrip_glosa"];
							}?>
				<tr><td align='left' width='30'><?=$enviado_a_d?></td><td width='60' align='left'><?=$observacion_d?></td><td align='center' width='140'><?=$fecha_hora_d?></td><td align='left' width='200'><?=$glosa_d?></td></tr>
<?}?>
</table>
<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
	<?}else{ ?>
  					<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
				<tr><td align='center' width='30'>SIN ASIGNAR EN WF</td><td width='60' align='center'><?=$observacion?></td><td align='center' width='140'><?=$fecha_hora?></td><td align='center' width='200'><?=$glosa_d?></td></tr>
				</table> 
				<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
<?}
} ?>
</td></tr></table>  	
		</dd>
<?} 
	}

	if ($miarea==0 or $nombre_area=="Tesoreria") {
		
	  $result9 = "SELECT * FROM anotaciones WHERE vigente=1 and rut_asociado='".$rut."'  and area='Tesoreria' order by id_anotacion desc";
	  $res9=mysql_query($result9,$conexio); 
	  $numeroRegistros9=mysql_num_rows($res9);?>
<? if ($numeroRegistros9 > 0) {?>
		    <dt><span class="tesoreria">Observaciones en &aacute;rea Otros Pagos</span></dt>
    		 <dd>
           <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			<tr><td>
	 <?
	 while($row_1=mysql_fetch_array($res9)) {
			$id_anotacion=$row_1["id_anotacion"]; 
			$observacion=$row_1["observacion"];
			$fecha_hora=$row_1["fecha_creacion"];
	  $result_09 = "SELECT * FROM wf_workflow WHERE id_anotacion='".$id_anotacion."' order BY id_wf DESC";
	  $res_09=mysql_query($result_09,$conexio); 
	  $numeroRegistros_09=mysql_num_rows($res_09); 
	  	  $enviado_a_d="";
	  $observacion_d="";
	  $fecha_hora_d="";
	  if ($numeroRegistros_09>0) { ?>	
				<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
	<? 
				while($row_wf=mysql_fetch_array($res_09)) 
				{ 
					$enviado_a_d=$row_wf["enviado_a"];
					$observacion_d=$row_wf["observacion"];
					$fecha_hora_d=$row_wf["fecha_hora"];
					$SQL_glosa1=" SELECT * FROM wf_glosas where id_glosa=".$row_wf["glosa"];
						$glosa1=mysql_query($SQL_glosa1,$conexio); 
						while($filaglosa1=mysql_fetch_array($glosa1)) {
							$glosa_d=$filaglosa1["descrip_glosa"];
							}?>
				<tr><td align='left' width='30'><?=$enviado_a_d?></td><td width='60' align='left'><?=$observacion_d?></td><td align='center' width='140'><?=$fecha_hora_d?></td><td align='left' width='200'><?=$glosa_d?></td></tr>
<?}?>
</table>
<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
	<?}else{ ?>
  					<div align="left"><span class='pestana_wf'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
				<thead><tr><th width='40' align='center'>Enviado a</th><th width='260'>Observaci&oacute;n</th><th width='60'>Fecha</th><th>Glosa</th></tr></thead>
				<tr><td align='center' width='30'>SIN ASIGNAR EN WF</td><td width='60' align='center'><?=$observacion?></td><td align='center' width='140'><?=$fecha_hora?></td><td align='center' width='200'><?=$glosa_d?></td></tr>
				</table> 
				<!-- ESCRIBE EN WORKFLOW-->				 
				<table width='100%' border='1' cellspacing='0' cellpadding='0'  class="workflow">
				<thead><tr><th width='40' align='center'>Enviado a (e-mail)</th><th width='260'>Observaci&oacute;n</th><th width='60'>Glosa</th><th width='90'>fec. revisi&oacute;n</th><th  width='30'>Grabar</th></tr></thead>
					<form id="formulario<?=$id_anotacion?>" action="workflow.php?r=<?=$_GET["r"]?>&donde=<?=$_GET["donde"]?>&fecha_va=<?=$_GET["fecha_va"]?>"  method="post" target="_self">
					<input type="hidden" name="anota" id="anota" value="SI">
					<input type="hidden" name="usuario" value=<?=$_SESSION['uid']?>>
					<input type="hidden" name="rut_asociado" value="<?=$_GET["r"]?>">
					<input type="hidden" name="idanotacion" value="<?=$id_anotacion?>">

				<tr>
				<td align='center' width='100'><input type="text" name="enviado_a" id="enviado_a" onkeypress="return isAlpha2(event);" value="" maxlength="150" /></td>
				<td width='300' align='center'><input type="text" name="observacion" id="observacion" onkeypress="return isAlpha2(event);" value="" maxlength="300" size=45 /></td>
				<td align='center' width='140'>
				<select name="glosa" id="glosa" style="font-size:12px" >
						<option value="0" SELECTED>Seleccionar</option>
						<?
						$SQL_glosa=" SELECT * FROM wf_glosas ORDER BY descrip_glosa ASC";
						$glosa=mysql_query($SQL_glosa,$conexio); 
						while($filaglosa=mysql_fetch_array($glosa)) {?>
							<option value="<?=$filaglosa["id_glosa"]?>"><?=$filaglosa["descrip_glosa"]?></option>
						<? }?>
						</select>
				</td>
				<td width='90' align='center'>
<?php
	  $myCalendar = new tc_calendar("fecha_revisar".$id_anotacion, true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2014, 2020);
	  $myCalendar->dateAllow('2014-01-01', '2020-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('center', 'middle');
	  $myCalendar->writeScript();
	  ?>
	  <input type="hidden" name="nombrecampo" value="fecha_revisar<?=$id_anotacion?>">
</td>
</td>
				<td width='30' align='center'>
				<input type="submit" value="Grabar" class="rojo_sombra_wf"  /></td>
				</tr>
				</table>
                  </form>
<!-- ESCRIBE EN WORKFLOW-->	
<?}
} ?>
</td></tr></table>  	
		</dd>
<?} 
	}?>
		
		
  		</dl>		
	   </div>
	</div>     
    
    </td></tr>
</table>
<!-- 	</td></tr>
</table>

</div>-->
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