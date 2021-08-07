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
	//Verifica permisos sobre la transaccion
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
require_once('conexion3.php');
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
<title>Ficha Vecino</title>

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
<body >
<?php
$Comuna = 'LA FLORIDA';
$Rut = substr($_GET["r"], 0, -2); 
include('../lib/nusoap.php');
//Ubicacion del webservice
$client = new nusoap_client('http://appl.smc.cl/ws/wsConsultaBDExt/wsConsultaBDExt.asmx?WSDL','wsdl');
$err = $client->getError();
if ($err) {
	echo '<h2>Error del constructor</h2><pre>' . $err . '</pre>';
}
//Ingreso de los parametros de busqueda 
$param = array('Nombre_Comuna'=>$Comuna,'NombreFuncion'=>'consultaporrut','XMLConsulta'=>'<PARAMETROS><RUT>'.$Rut.'</RUT></PARAMETROS>');
$result = $client->call('pfConsultaBDExt',$param);
// Existe alguna falla en el servicio?  
if ($client->fault) { //Si
	echo '<h2>No se pudo completar la operación</h2><pre>';
	print_r($result);
	echo '</pre>';
} else {// No 
	// Hay algun error ? 
	$err = $client->getError();
	if ($err) { // Si 
		// Display the error
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
	}
}
//Verifico la cantidad de registros encontrados
$r = $result;
$count = count($r);
//La consulta se ejecuta solo si se encontraron datos
if ($count != 0) {

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
                      <td width="89%"><input name="textfield10" type="text" disabled="disabled" class="campo_txt" id="textfield9" value="<?php 
						if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][0]["RUT"]!=''){
							echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][0]["RUT"];
						}else{
							echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"]["RUT"];
						}
					  ?>" /></td>
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
                      <td width="716" ><input name="textfield9" type="text" disabled="disabled" class="campo_txt" id="textfield7" value="<?php 
						if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][0]["NOMBRE"]!=''){
							echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][0]["NOMBRE"];
						}else{
							echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"]["NOMBRE"];
						}
						 ?>" /></td>
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
                        <td width="468" ><input name="textfield11" type="text" disabled="disabled" class="campo_txt" id="textfield10" value="<?php 
						if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][0]["DIRECCION"]!=''){
							echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][0]["DIRECCION"];
						}else{
							echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"]["DIRECCION"];
						}
						?>" /></td>
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
                        <td width="89%" ><input name="textfield12" type="text" disabled="disabled" class="campo_txt" id="textfield11" value="<?php 
						if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][0]["FONO1"]!=''){
							echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][0]["FONO1"];
						}elseif($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"]["FONO1"]["!xml:space"]!='preserve'){
							echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"]["FONO1"];
						}
						?>" /></td>
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
                        <td width="89%" ><input name="textfield13" type="text" disabled="disabled" class="campo_txt" id="textfield12" value="<?php 
						if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][0]["FONO2"]!=''){
							echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][0]["FONO2"].'  '.$fono_celular;
						}else{
							echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"]["FONO2"].'  '.$fono_celular;
						}
						?>" /></td>
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

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>  
<!-- Social-->
<? if ($ver2==1) { ?>
<dt id="starter"><span class="social">Social </span><span style="text-align:right">
<?php $r = $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"]; $haysocial = count($r);?>			
<? //Verifica la existencia de datos
if ($haysocial == 0){ echo "&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?>
</span></dt>

<? //Si existen los datos se despliegan 
if ($haysocial != 0) { ?>
<dd>
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
					  		  

	<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
    	<thead>
        	<tr>
				<th>Nombre</th>
                <th>Rut</th>
                <th>Parentesco</th>
                <th>Fecha<br/>Nacimiento<br />(Edad)</th>
                <th>Ingresos<br />Promedio<br />Mensual</th>
                <th>Actividad</th>
             </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>



<div align="left"><span class='pestana'>&Uacute;ltimas Atenciones</span></div>
<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
    <thead>
        <tr>
            <th>Fecha<br />Atenci&oacute;n</th>
            <th>Folio <br />Atenci&oacute;n</th>
            <th>Puntos Ficha<br />Prot. Social</th>
            <th>Fecha<br/>FPS</th>
            <th>Motivo<br />Atenci&oacute;n</th>
            <th>Resultado Atenci&oacute;n</th>
            <th>Valor<br />Beneficio</th>
            <th>Atendido por</th>
        </tr>
    </thead>
    <tbody>
<?php if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"][0]["FECHAATENCION"]!=''){?>
        <?php for($i=0;$i<=$haypatcom-1;$i++){ ?>                
        <tr>
			<td width='54' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"][$i]["FECHAATENCION"] ?></td>
            <td align='center' width='58'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"][$i]["FOLIOATENCION"] ?></td>
            <td align='center' width='68'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"][$i]["PUNTOFPS"] ?></td>
            <td width='54' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"][$i]["FECHAFPS"] ?></td>
            <td align='left' width='170'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"][$i]["MOTIVOATENCION"] ?></td>
            <td align='left'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"][$i]["RESULTADOATENCION"] ?></td>
            <td align='right' width='40'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"][$i]["VALORBENEFICIO"] ?></td>
            <td><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"][$i]["ATENDIDOPOR"] ?></td>
        </tr>
        <?php } ?>
<?php }else{?>        
        <tr>
            <td width='54' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"]["FECHAATENCION"] ?></td>
            <td align='center' width='58'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"]["FOLIOATENCION"] ?></td>
            <td align='center' width='68'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"]["PUNTOFPS"] ?></td>
            <td width='54' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"]["FECHAFPS"] ?></td>
            <td align='left' width='170'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"]["MOTIVOATENCION"] ?></td>
            <td align='left'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"]["RESULTADOATENCION"] ?></td>
            <td align='right' width='40'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"]["VALORBENEFICIO"] ?></td>
            <td><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table7"]["ATENDIDOPOR"] ?></td>
        </tr>        
<?php }?> 
	
    </tbody>  
</table>  


</td>
</tr>
</table>		 
                      
</dd>
<? }} ?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<? if ($ver3==1) { ?>
<!-- Patentes Comerciales (OK)-->    
<dt><span class="patente">Patentes Comerciales</span>
<?php $r = $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"]; $haypatcom = count($r);?>
<? if ($haypatcom == 0) { echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?>
</dt>

<? if ($haypatcom != 0) { ?>
<dd>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
<tr><td>

			<!-- Anotaciones -->
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
            
<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
    <thead>
        <tr>
            <th>A&ntilde;o Capital</th>
            <th>Tipo de Capital</th>
            <th>Porc.%</th>
            <th>Monto Capital</th>
            <th>Fecha Presentaci&oacute;n</th>
        </tr>
    </thead>            			
    <tbody>
<?php if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][0]["ANIOCAP"]!=''){?>
        <?php for($i=0;$i<=$haypatcom-1;$i++){ ?>                
        <tr>
            <td align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][$i]["ANIOCAP"] ?></td>          
            <td align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][$i]["TIPOCAP"] ?></td>
            <td align='right'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][$i]["PORCENTAJE"] ?></td>
            <td align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][$i]["MONTOCAP"] ?></td>
            <td align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][$i]["FECHACAP"] ?></td>
        </tr>
        <?php } ?>
<?php }else{?>        
        <tr>
            <td align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"]["ANIOCAP"] ?></td>          
            <td align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"]["TIPOCAP"] ?></td>
            <td align='right'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"]["PORCENTAJE"] ?></td>
            <td align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"]["MONTOCAP"] ?></td>
            <td align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"]["FECHACAP"] ?></td>
        </tr>        
<?php }?>        
    </tbody>
</table>

		
</td></tr>
<tr>
	<td>
		
<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
    <thead>
        <tr>
            <th width='57'>ROL<br>N&deg; Patente</th>
            <th width='80'>Tipo Patente</th>
            <th width='300'>Giro</th>
            <th width='84' align='center'>Clasificaci&oacute;n<br />Patente</th>
            <th>Direcci&oacute;n</th>
            <th width='58'>Fecha<br />Otorgamiento</th>
            <th width='58'>Fecha<br />T&eacute;rmino</th>
        </tr>
    </thead>	 
    <tbody>
<?php if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][0]["ROL"]!=''){?>
		<?php for($i=0;$i<=$haypatcom-1;$i++){ ?>
        <tr>
            <td align='center' width='57'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][$i]["ROL"] ?></td>
            <td width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][$i]["TIPOPATENTE"] ?></td>
            <td width='300'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][$i]["GIRO"] ?></td>
            <td width='84' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][$i]["TIPO"] ?></td>
            <td></td>
            <td width='58' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][$i]["FECHAINICIOACT"] ?></td>
            <td width='58' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"][$i]["FECHATERMINO"] ?></td>
        </tr>
        <?php } ?>
<?php }else{?>
        <tr>
            <td align='center' width='57'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"]["ROL"] ?></td>
            <td width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"]["TIPOPATENTE"] ?></td>
            <td width='300'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"]["GIRO"] ?></td>
            <td width='84' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"]["TIPO"] ?></td>
            <td></td>
            <td width='58' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"]["FECHAINICIOACT"] ?></td>
            <td width='58' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table1"]["FECHATERMINO"] ?></td>
        </tr>
<?php } ?>         
    </tbody>
</table>
    

       </td>
      </tr>
    </table>
    </dd>
<? }} ?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>  
 <? if ($ver4==1) { ?>
 <!-- Permisos de circulacion (OK) -->    
<dt><span class="circulacion">Permiso de Circulaci&oacute;n</span>
<?php $r = $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"]; $haypermcirc = count($r);?>
<? if ($haypermcirc == 0) { echo "&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?>
    
    </dt>
	
	<? if ($haypermcirc != 0) { ?>
<dd>    
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
           
<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
    <thead>
        <tr>
            <th width='30' align='center'>A&ntilde;o<br />Permiso</th>
            <th width='74'>N&deg; Patente</th>
            <th >Veh&iacute;culo</th>
            <th width='140'>Tasaci&oacute;n<br />(o Factura)</th>
            <th width='85'>Valor Permiso</th>
            <th width='85'>Valor a Pagar</th>
            <th width='76' align='center'>Fecha Pago</th>
            <th width='192' align='left'>Observaciones</th>
            <th width='76' align='center'>Fecha Vencimiento</th>
        </tr>
    </thead>
    <tbody>
<?php if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"][0]["PATENTE"]!=''){?>        
		<?php for($i=0;$i<=$haypermcirc-1;$i++){ ?>			  			
        <tr>
            <td align='center' width='30'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"][$i]["ANIOCAP"] ?></td>
            <td width='74' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"][$i]["PATENTE"] ?></td>
            <td align='center' ><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"][$i]["VEHICULO"] ?></td>
            <td align='right' width='140'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"][$i]["TASACION"] ?></td>
            <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"][$i]["VALORPERMISO"] ?></td>
            <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"][$i]["VALORPAGADO"] ?></td>
            <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"][$i]["FECHAPAGO"] ?></td>
            <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"][$i]["OBSERVACIONES"] ?></td>
            <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"][$i]["FECHAVENC"] ?></td>
        </tr>
        <?php } ?>
<?php }else{  ?>        
        <tr>
            <td align='center' width='30'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"]["ANIOCAP"] ?></td>
            <td width='74' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"]["PATENTE"] ?></td>
            <td align='center' ><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"]["VEHICULO"] ?></td>
            <td align='right' width='140'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"]["TASACION"] ?></td>
            <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"]["VALORPERMISO"] ?></td>
            <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"]["VALORPAGADO"] ?></td>
            <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"]["FECHAPAGO"] ?></td>
            <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"]["OBSERVACIONES"] ?></td>
            <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table2"]["FECHAVENC"] ?></td>
        </tr>        
<?php } ?>        
    </tbody>
</table>
			 
</td>
</tr>
</table>
</dd>
<? }} ?>            
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>  
<? if ($ver5==1) { ?>
<!-- Licencia de Conducir (OK)-->    
<dt><span class="licencia">Licencia de Conducir</span>
<?php $r = $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"]; $haylicconducir = count($r);?>
<? if ($haylicconducir == 0) { echo "&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?>

</dt>
    		  
	<? if ($haylicconducir != 0) { ?>
    <dd>
    
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
           			
<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
    <thead>
        <tr>
            <th width="200">Direcci&oacute;n</th>
            <th width="160">Profesi&oacute;n</th>
            <th width="28">Edad</th>
            <th width="80">Fecha Otorgamiento</th>
            <th width="80">Fecha Control</th>
            <th width="40">Clase</th>
            <th>Restricci&oacute;n / Anulaci&oacute;n</th>
        </tr>
    </thead>
    <tbody>	
<?php if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"][0]["DIRECCION"]!=''){?>
<?php for($i=0;$i<=$haylicconducir-1;$i++){ ?>  
	<tr>
         <td align='center' width='200'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"][$i]["DIRECCION"] ?></td>
         <td width='160'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"][$i]["PROFESION"] ?></td>
         <td align='center' width='28'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"][$i]["EDAD"] ?></td>
         <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"][$i]["FECHAOTOR"] ?></td>
         <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"][$i]["FECHACONTROL"] ?></td>
         <td align='center' width='40'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"][$i]["CLASES"] ?></td>
         <td align='left'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"][$i]["RESTRICCION"] ?></td>
    </tr>        
<?php } ?>	
<?php }else{?>
    <tr>
         <td align='center' width='200'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"]["DIRECCION"] ?></td>
         <td width='160'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"]["PROFESION"] ?></td>
         <td align='center' width='28'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"]["EDAD"] ?></td>
         <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"]["FECHAOTOR"] ?></td>
         <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"]["FECHACONTROL"] ?></td>
         <td align='center' width='40'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"]["CLASES"] ?></td>
         <td align='left'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table3"]["RESTRICCION"] ?></td>
    </tr>				
<?php }?>


    </tbody>
</table>
			

</td>
</tr>
</table>
 </dd>			 
<? }} ?>		
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>      
<? if ($ver6==1) { ?>
 <!-- Aseo (OK)-->    

<dt><span class="aseo">Aseo</span>
<?php $r = $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"]; $hayaseo = count($r);?>
<? if ($hayaseo == 0) { echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?>

</dt>
    		  
<? if ($hayaseo != 0) { ?>
<dd>
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

<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
<thead>
    <tr>
        <th width="20">ROL</th>
        <th width="160">Direcci&oacute;n</th>
        <th width="28">Avaluo</th>
        <th width="36">%<br/>Exento</th>
        <th width="84">Descripci&oacute;n</th>
        <th width="40">Fecha Exencion<br/> / N&deg;</th>
        <th>Fecha<br />T&eacute;rmino<br />Exenci&oacute;n</th>
        <th>Fecha<br />Vence<br />Cuota</th>
        <th>A&ntilde;o<br />Cuota</th>
        <th>Valor Cuota</th>
        <th>Fecha<br/>Pago</th>
        <th>Valor Total</th>
    </tr>
</thead>
<?php if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"][0]["ROL"]!=''){?>
<?php for($i=0;$i<=$hayaseo-1;$i++){ ?>        
<tr>
    <td align='center' width='20'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"][$i]["ROL"] ?></td>
    <td align='center' width='160'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"][$i]["DIRECCION"] ?></td>
    <td align='right' width='20'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"][$i]["AVALUO"] ?></td>
    <td  align='center' width='38'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"][$i]["EXENTO"] ?></td>
    <td align='center' width='80'></td>
    <td align='center' width='50'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"][$i]["FECHAEXENTO"] ?></td>
    <td align='center' width='50'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"][$i]["FECHATEREXENTO"] ?></td>
    <td align='center' width='50'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"][$i]["FECHAVENC"] ?></td>
    <td align='left'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"][$i]["ANIOCUOTA"] ?></td>
    <td align='right' width='50'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"][$i]["VALORCUOTA"] ?></td>
    <td align='center' width='50'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"][$i]["FECHAPAGO"] ?></td>
    <td align='right'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"][$i]["VALORTOTAL"] ?></td>
</tr>
<?php } ?>   
<?php } else {?> 
<tr>
    <td align='center' width='20'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"]["ROL"] ?></td>
    <td align='center' width='160'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"]["DIRECCION"] ?></td>
    <td align='right' width='20'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"]["AVALUO"] ?></td>
    <td  align='center' width='38'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"]["EXENTO"] ?></td>
    <td align='center' width='80'></td>
    <td align='center' width='50'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"]["FECHAEXENTO"] ?></td>
    <td align='center' width='50'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"]["FECHATEREXENTO"] ?></td>
    <td align='center' width='50'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"]["FECHAVENC"] ?></td>
    <td align='left'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"]["ANIOCUOTA"] ?></td>
    <td align='right' width='50'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"]["VALORCUOTA"] ?></td>
    <td align='center' width='50'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"]["FECHAPAGO"] ?></td>
    <td align='right'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table4"]["VALORTOTAL"] ?></td>
</tr>
<?php } ?>                          
				
</table>			  			 
</td></tr></table>
</dd>			
 <? }} ?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>   

<!-- Certificado de Obras 
<? if ($ver7==1) { ?>
<? // Certificado de Obras ?>    
<dt><span class="obras">Certificado de Obras</span>
<? if ($hayobras == 0) { echo "&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?>
</dt>
    		  
<? if ($hayobras != 0) { ?>
<dd>
			  
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
<tr><td>
 
 			<? // Anotaciones ?>
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
		    <? // Anotaciones ?>
            			  
			 
<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
    <thead>
        <tr>
            <th width="20">Orden de Ingreso</th>
            <th width="80">Fecha</th>
            <th width="240">Glosa</th>
            <th width="38">Rol Propiedad</th>
            <th width="80">Valor Total</th>
        </tr>
    </thead>
    
    <tr>
    	<td colspan='12' style='padding:1px;background-color:#dad7c7;'><img src='./images/espacio.gif' border='0' width='1' height='1' /></td>
    </tr>
    
    <tr>
    	<td colspan='12' style='padding:1px;background-color:#dad7c7;'><img src='./images/espacio.gif' border='0' width='1' height='1' /></td>
    </tr>
    
    <tr>
        <td align='center' ></td>
        <td align='center'></td>
        <td  align='left'></td>
        <td align='center' ></td>
        <td align='right' ></td>
    </tr>
				
</table> 
		
			 
</td></tr></table>
</dd>
--> 			
<? }} ?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>   
<? if ($ver8==1) { ?>
<!-- Inspecciones Municipales (OK)-->    
<dt><span class="inspecciones">Inspecciones Municipales</span>
<?php $r = $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"]; $hayinspec = count($r);?>
<? if ($hayinspec == 0) { echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?>
</dt>
			   
<? if ($hayinspec != 0) { ?>
<dd>			   
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
            
            
<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
    <thead>
        <tr>
            <th width='40' align='center'>N&deg;<br />Parte</th>
            <th width='60'>Fecha<br />Parte</th>
            <th width='140'>Infracci&oacute;n</th>
            <th width='200'>Lugar Infracci&oacute;n</th>
            <th width='47'>Hora<br />Infracci&oacute;n</th>
            <th width='120'>Lugar Citaci&oacute;n</th>
            <th width='60'>Fecha y Hora<br />Citaci&oacute;n</th>
            <th align='left'>Origen<br />Infracci&oacute;n 
            </th>
        </tr>
    </thead>
<?php if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"][0]["NROPARTE"]!=''){?>
<?php for($i=0;$i<=$hayinspec-1;$i++){ ?>        
    <tr>
        <td align='center' width='30'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"][$i]["NROPARTE"] ?></td>
        <td width='60' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"][$i]["FECHAPARTE"] ?></td>
        <td align='center' width='140'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"][$i]["INFRACCION"] ?></td>
        <td align='center' width='200'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"][$i]["LUGARINFRACCION"] ?></td>
        <td align='center' width='47'></td>
        <td align='left' width='120'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"][$i]["LUGARCITACION"] ?></td>
        <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"][$i]["FECHAHORAVISITA"] ?></td>
        <td ><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"][$i]["TIPOVISITA"] ?></td>
    </tr>
<?php } ?>	
<?php }else{?>
    <tr>
        <td align='center' width='30'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"]["NROPARTE"] ?></td>
        <td width='60' align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"]["FECHAPARTE"] ?></td>
        <td align='center' width='140'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"]["INFRACCION"] ?></td>
        <td align='center' width='200'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"]["LUGARINFRACCION"] ?></td>
        <td align='center' width='47'></td>
        <td align='left' width='120'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"]["LUGARCITACION"] ?></td>
        <td align='center' width='80'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"]["FECHAHORAVISITA"] ?></td>
        <td ><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table6"]["TIPOVISITA"] ?></td>
    </tr>				
<?php }?>  
</table>
		
</td></tr></table>
</dd>
<? } }?>
    		  
			   
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>      

<!-- Anotaciones 
<? if ($ver9==1) { ?>
<? // Permisos Provisorios ?> 
<dt><span class="provisorio">Permisos Provisorios</span>
<? if ($hayprovisorio == 0) { echo "&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?>
</dt>
				
<? if ($hayprovisorio != 0) { ?>
<dd>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
<tr><td>
							  
             <? // Anotaciones ?>
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
		    <? // Anotaciones ?>
            
		
<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
    <thead>
        <tr>
            <th width='30' align='center'>N&deg;<br />Patente</th>
            <th width='100'>Actividad</th>
            <th width='60'>Inicio</th>
            <th width='60'>T&eacute;rmino</th>
            <th width='76'>Valor Patente</th>
            <th width='76'>Valor a Pagar</th>
            <th width='60'>Fecha Pago</th>
            <th align='left'>Observaciones</th>
        </tr>
    </thead>
                 
    <tr>
        <td align='center' width='30'></td>
        <td width='100' align='center'></td>
        <td align='center' width='60'></td>
        <td align='center' width='60'></td>
        <td align='right' width='76'></td>
        <td align='right' width='76'> </td>
        <td align='center' width='80'></td>
        <td ></td>
    </tr>

</table>
			

</td></tr></table>
</dd>				 
 <? }} ?>
 -->            
		 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>   
<? if ($ver10==1) { ?>
<!-- tesoreria (OK)-->    
<dt><span class="tesoreria">Otros Pagos</span>
<?php $r = $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table5"]; $hayteso = count($r);?>
<? if ($hayteso == 0) { echo "&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?>
</dt>
				

<? if ($hayteso != 0) { ?>
<dd>
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
            
            
	
<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
    <thead>
        <tr>
            <th width="20">Orden de Ingreso</th>
            <th width="80">Fecha</th>
            <th width="240">Glosa</th>
            <th width="38">Rol Propiedad</th>
            <th width="80">Valor Total</th>
        </tr>
    </thead>
    
<?php if($result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table5"][0]["ORDENINGRESO"]!=''){?>
<?php for($i=0;$i<=$hayteso-1;$i++){ ?>        
    <tr>
        <td align='center' ><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table5"][$i]["ORDENINGRESO"] ?></td>
        <td align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table5"][$i]["FECHA"] ?></td>
        <td  align='left'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table5"][$i]["GLOSA"] ?></td>
        <td align='center' ><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table5"][$i]["ROL"] ?></td>
        <td align='right' ><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table5"][$i]["VALORTOTAL"] ?></td>
    </tr>     
<?php } ?>	
<?php } else {?>
    <tr>
        <td align='center' ><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table5"]["ORDENINGRESO"] ?></td>
        <td align='center'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table5"]["FECHA"] ?></td>
        <td  align='left'><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table5"]["GLOSA"] ?></td>
        <td align='center' ><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table5"]["ROL"] ?></td>
        <td align='right' ><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table5"]["VALORTOTAL"] ?></td>
    </tr>
<?php } ?>		  
</table> 			 
</td></tr></table> 
</dd>
<? } }?>
			 		
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?> 		
<dt><span class="tesoreria">Observaciones (WorkFlow)</span>
<?php 
$pasoC="SELECT id_anotacion, observacion, fecha_creacion, area
FROM anotaciones 
WHERE vigente=1 and rut_asociado='".$rut."' OR rut_asociado='".$rut1."' OR rut_asociado='".$rut2."' 
ORDER BY id_anotacion DESC";
$resultC = mysql_query($pasoC,$conexio);
$numeroRegistrosC=mysql_num_rows($resultC);
$haywf = $numeroRegistrosC;
?>
<? if ($haywf == 0) { echo "&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (<img src='images/warning_16.png' alt='No Hay Datos' border='0'/> No se encuentran datos en este sistema)&nbsp; &nbsp;"; }?>
</dt>
<? if ($haywf != 0) { ?>				
<dd>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
<tr><td>
		 	
<?php
	
	if ($numeroRegistrosC>0){

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
					<thead>
                        <tr>
                            <th width='40' align='center'>Enviado a</th>
                            <th width='260'>Observacion</th>
                            <th width='60'>Fecha</th>
                            <th>Area Obs.</th>
                        </tr>
                    </thead>
				<?php while($row_wf=mysql_fetch_array($res_09)) 
				{ 
					$enviado_a_d=$row_wf["enviado_a"];
					$observacion_d=$row_wf["observacion"];
					$fecha_hora_d=$row_wf["fecha_hora"];
					$rut_ciudadano_d=$row_wf["rut_ciudadano"];?>
				<tr>
                    <td align='center' width='30'><?=$enviado_a_d?></td>
                    <td width='60' align='center'><?=$observacion_d?></td>
                    <td align='center' width='140'><?=$fecha_hora_d?></td>
                    <td align='center' width='200'><?=$nombrearea?></td>
                </tr>
				<? } ?>
				</table> 
			  <?php }else{ ?>	
				<div align="left"><span class='pestana'><?=$observacion?> / <?=$fecha_hora?></span></div>
				<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
                    <thead>
                        <tr>
                            <th width='40' align='center'>Enviado a</th>
                            <th width='260'>Observacion</th>
                            <th width='60'>Fecha</th>
                            <th>Area Obs.</th>
                        </tr>
                    </thead>
                    <tr>
                        <td align='center' width='30'>SIN ASIGNAR EN WF</td>
                        <td width='60' align='center'><?=$observacion_d?></td>
                        <td align='center' width='140'><?=$fecha_hora_d?></td>
                        <td align='center' width='200'><?=$nombrearea?></td>
                    </tr>
				</table> 	
			<? }} ?>

			 </td>
      </tr>
    </table>
    <?php } ?> 						
					

</td></tr></table> 			 
</dd>	 
	<?php } ?>
		 
  		</dl>		
	   </div>
	</div>     
    
    </td></tr>
</table>

</div>
<?php
//Si no se encuentran datos muestra un mensaje
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

</body>
</html>