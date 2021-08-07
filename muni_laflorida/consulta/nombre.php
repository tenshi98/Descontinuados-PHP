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

//VALIDACION

 $fecha = date("d/m/Y"); 
/* $rut = '001771377-9'; */
$rut= $_GET["r"];  
$rut1="0".$rut;
$rut2="00".$rut;
require_once('conexion3.php');
// require_once('./conexion3_al41.php');

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$g_pagina?></title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/tabla.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/FuncJScript.js"></script>

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type='text/javascript' src='js/infogrid.js'></script>
    <script src="./scripts/jquery171.js" type="text/javascript"></script>
    <script src="./scripts/jquery.alerts.js" type="text/javascript"></script>
    <link href="./scripts/jquery.alerts.css" rel="stylesheet" type="text/css" />   

</head>



<body >
<div align="center">
<div align="center">
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr>
          <td width="17%" height="50" align="center" valign="middle"><img src="images/logo_sm.png" width="158" height="48" /><br /></td>
          <td width="67%" align="center" valign="middle">Consulta Vecinos</td>
          <td width="16%" align="center" valign="middle" class="fecha"><?php echo $fecha ?></td>
        </tr>
        <tr>
          <td colspan="3" >
		  <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <!-- td width="106" align="left" class="Arial2">&nbsp;<input type="submit" class="rojo_sombra_print" value="Imprimir" /></td>
                  <td width="77" align="center">&nbsp;</td -->
				  <td width="106" align="left" class="Arial2">&nbsp;<input type="submit" class="rojo_sombra" value="&laquo; Volver" onclick="location='pidenombre.php'"/></td>
                  <td width="77" align="center">&nbsp;</td>
				  
                  <td width="258" align="right"><!--span class="Arial2">Buscar otra Direcci&oacute;n&nbsp; :&nbsp;</span--></td>
                  <td width="23" align="center" class="Arial2"><!--img src="images/icons/id.png" width="20" height="20" /--></td>
				  <!--form name="form1" method="post" action="calles.php" -->
                  <td width="269" align="center" valign="middle" ><!--input name="calle" type="text" class="campo_txt" id="calle" size="80" maxlength="100" onkeypress="return isAlpha2(event);"value=""  placeholder="Ej: Tannembaum" style="width:320px !important;"/--></td>
				  <td width="50" align="center" valign="middle" ><!--input name="numero" type="text" class="campo_txt" id="calle" size="50" maxlength="20" onkeypress="return isAlpha(event);" value=""  placeholder="Ej: 12345" style="width:100px !important;"/--></td>
                  <td width="50" align="right"><!--input type="submit" class="rojo_sombra_search" value="Buscar" /--></td></form>
				  <td width="77" align="center">&nbsp;</td>
				  <td width="106" align="right" class="Arial2">&nbsp;<input type="submit" class="rojo_sombra" value="Terminar &Theta;" onclick="location='Logout.php'"/></td> 
                </tr>
              </table>
                <p class="borde_bottom">&nbsp;</p></td>
            </tr>
          </table>
</td></tr></table>
<table width="960" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
     <tr>
       <td>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td>
			 

             <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' ><thead><tr>
			<th>Nombre</th><th>Rut</th><th>Direcci&oacute;n</th><th>&Uacute;ltimo Pago</th><th width="80">Ir al detalle</th></tr></thead>




<?php


 
$Comuna = 'LA FLORIDA';
include('../lib/nusoap.php');
//Ubicacion del webservice
$client = new nusoap_client('http://appl.smc.cl/ws/wsConsultaBDExt/wsConsultaBDExt.asmx?WSDL','wsdl');
$err = $client->getError();
if ($err) {
	echo '<h2>Error del constructor</h2><pre>' . $err . '</pre>';
}
//Ingreso de los parametros de busqueda 
$param = array('Nombre_Comuna'=>$Comuna,'NombreFuncion'=>'busquedapornombre','XMLConsulta'=>'<PARAMETROS><NOMBRE>'.$_POST["nombre1"].'</NOMBRE><APELLIDOPAT>'.$_POST["apellido1"].'</APELLIDOPAT><APELLIDOMAT>'.$_POST["apellido2"].'</APELLIDOMAT></PARAMETROS>');
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

$r = $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"];
$count = count($r);
echo 'aqui'.$count;

?>

<?php for($i=0;$i<=$count-1;$i++){ ?>
<tr>
<td><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][$i]["NOMBRE"] ?></td>
<td><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][$i]["RUT"] ?></td>
<td><?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][$i]["DIRECCION"] ?></td>
<td></td>
<td><input type="submit" class="rojo_sombra" value="&laquo; Ver Detalle" onclick="window.open('mostrardatos.php?r=<?php echo $result["pfConsultaBDExtResult"]["diffgram"]["NewDataSet"]["Table"][$i]["RUT"] ?>&donde=1', 'San Miguel==Consulta Vecinos', 'width=1000,height=700,scrollbars=1'); return false;" /></td>
</tr>
<?php } ?>




</table>
	</td>
     </tr>
</table>

   


    
</td>
</tr>
</table>








    </td></tr>
</table>


</div>
</body>

</html>