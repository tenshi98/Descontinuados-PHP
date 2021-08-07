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
require_once('./conexion3.php');
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
<script type="text/javascript">
function validselect(){
	   var indic = document.menu_form.fecha_va.selectedIndex
	   var valor = document.menu_form.fecha_va.options[indic].value;
	   if (valor == 0) {
		  jAlert("Debe seleccionar una fecha", "Error");
		  menu_form.fecha_va.focus();	
		  return false;	  
	   } 
}

function ChangeComboFecha(formulaire){
if (formulaire.fecha_va.selectedIndex != 0) {
   document.getElementById("menu_form").submit();
 }
} 
</script> 

</head>



<body >
<?
	  $result = "SELECT * FROM anotaciones WHERE fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99' and vigente=0";
	  $res=mysql_query($result,$conexio); 
	  $numeroRegistros=mysql_num_rows($res);
if ($numeroRegistros > 0) {	   

?>
<div align="center">
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr>
          <td width="17%" height="50" align="center" valign="middle"><img src="images/logo_sm.png" width="158" height="48" /><br /></td>
          <td width="67%" align="center" valign="middle">Observaciones cerradas por D&iacute;a (<?=$_POST["fecha_va"]?> / <?=$numeroRegistros?>)</td>
          <td width="16%" align="center" valign="middle" class="fecha"><?php echo $fecha ?></td>
        </tr>
        <tr>
          <td colspan="3" >
		  <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
				  <td width="106" align="left" class="Arial2">&nbsp;<input type="submit" class="rojo_sombra" value="&laquo; Volver" onclick="location='principal.php'"/></td>
                  <td width="77" align="center">&nbsp;</td>
				  
                  <td width="258" align="right"><span class="Arial2">Buscar otra Fecha&nbsp; :&nbsp;</span></td>
                  <td width="23" align="center" class="Arial2"><img src="images/icons/calend.png" width="20" height="20" /></td>
				  <form method="post" id="menu_form" name="menu_form" action="observaciones.php?donde=1" onsubmit="return validselect();" >
                  <td width="269" align="center" valign="middle" class="tabla_cont_social">
<select name="fecha_va"  id="fecha_va"  style="font-size:12px"  onChange='ChangeComboFecha(this.form)'>
									<option value="0" SELECTED>Selecciona la Fecha</option>
						<?
						$SQL_lee4=" SELECT CONCAT(SUBSTR( fecha_creacion, 1, 4 ),SUBSTR( fecha_creacion, 6, 2 ),SUBSTR( fecha_creacion, 9, 2 )) AS fecha FROM anotaciones where vigente=0 GROUP BY CONCAT(SUBSTR( fecha_creacion, 1, 4 ),SUBSTR( fecha_creacion, 6, 2 ),SUBSTR( fecha_creacion, 9, 2 )) ORDER BY CONCAT(SUBSTR( fecha_creacion, 1, 4 ),SUBSTR( fecha_creacion, 6, 2 ),SUBSTR( fecha_creacion, 9, 2 )) DESC ";
						
						$res=mysql_query($SQL_lee4,$conexio); 
						
						while($fila=mysql_fetch_array($res)) {
							//$fecha =$fila["fecha"];
								$fecha = SUBSTR( $fila["fecha"], 6, 2 )."/".SUBSTR( $fila["fecha"], 4, 2 )."/".SUBSTR( $fila["fecha"], 0, 4 );
								$fecha_va=SUBSTR( $fila["fecha"], 0, 4 )."-".SUBSTR( $fila["fecha"], 4, 2 )."-".SUBSTR( $fila["fecha"], 6, 2 );
								?>
								
							<option value="<?=$fecha_va?>"><?=$fecha?></option>
							
						
						<? }?>
						</select>
				  
				  </td>
			
                  <td width="50" align="right"><input type="submit" class="rojo_sombra_search" value="Buscar" /></td></form>
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
	   <?
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99' and area='General'";
	  $res=mysql_query($result,$conexio); 
	  $numeroRegistros=mysql_num_rows($res); 
	  if ($numeroRegistros>0) { ?>	
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td class="do" >
			 <span class="social" style="font-size: 18px">Generales</span>


             <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			 <thead><tr>
			<th width=200>Funcionario</th><th width=100>Rut Ciudadano</th><th width=150>Fecha/Hora</th><th width=410>Observaci&oacute;n</th><th width=100>Ir al detalle</th>
			<th width=100>Ir al WF</th></tr></thead>
<?
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99'  and area='General' order by fecha_creacion asc ";

	  $res=mysql_query($result,$conexio); 
  	  while($row=mysql_fetch_array($res)) {
		  $id_anotacion=$row["id_anotacion"];
		$usuario=$row["usuario"];
		$observacion=$row["observacion"];
		$rut=$row["rut_asociado"];
		$fecha_hora=$row["fecha_creacion"];
	  $usu = "SELECT * FROM tbl_users  WHERE id_usuario='".$usuario."'";
	  $res_usu=mysql_query($usu,$conexio); 
  	  while($row_usu=mysql_fetch_array($res_usu)) {
		$nombre=$row_usu["tx_nombre"]." ".$row_usu["tx_apellidoPaterno"]." ".$row_usu["tx_apellidoMaterno"];
	  }
?>
<tr>
<td><?=$nombre?></td><td><?=$rut?></td><td><?=$fecha_hora?></td><td><?=$observacion?></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver Ficha"
onclick="window.open('mostrardatos.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver WF"
onclick="window.open('pop_wf.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td>
</tr>
<? }
?>
</table>

	</td>
     </tr>


</table>
	<? }
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99' and area='Social'";
	  $res=mysql_query($result,$conexio); 
	  $numeroRegistros=mysql_num_rows($res); 
	  if ($numeroRegistros>0) { ?>	
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td class="do" >
			  <span class="social" style="font-size: 18px">Social </span>


             <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			 <thead><tr>
			<th width=200>Funcionario</th><th width=100>Rut Ciudadano</th><th width=150>Fecha/Hora</th><th width=410>Observaci&oacute;n</th><th width=100>Ir al detalle</th>
			<th width=100>Ir al WF</th></tr></thead>
<?
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99'  and area='Social' order by fecha_creacion asc ";

	  $res=mysql_query($result,$conexio); 
  	  while($row=mysql_fetch_array($res)) {
		  $id_anotacion=$row["id_anotacion"];
		$usuario=$row["usuario"];
		$observacion=$row["observacion"];
		$rut=$row["rut_asociado"];
		$fecha_hora=$row["fecha_creacion"];
	  $usu = "SELECT * FROM tbl_users  WHERE id_usuario='".$usuario."'";
	  $res_usu=mysql_query($usu,$conexio); 
  	  while($row_usu=mysql_fetch_array($res_usu)) {
		$nombre=$row_usu["tx_nombre"]." ".$row_usu["tx_apellidoPaterno"]." ".$row_usu["tx_apellidoMaterno"];
	  }
?>
<tr>
<td><?=$nombre?></td><td><?=$rut?></td><td><?=$fecha_hora?></td><td><?=$observacion?></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver Ficha"
onclick="window.open('mostrardatos.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver WF"
onclick="window.open('pop_wf.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td>
</tr>
<? }?>
</table>

	</td>
     </tr>

</table>
	<? }
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99' and area='PatCom'";
	  $res=mysql_query($result,$conexio); 
	  $numeroRegistros=mysql_num_rows($res); 
	  if ($numeroRegistros>0) { ?>	
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td class="do" >
			  <span class="patente" style="font-size: 18px">Patentes Comerciales</span>

             <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			 <thead><tr>
			<th width=200>Funcionario</th><th width=100>Rut Ciudadano</th><th width=150>Fecha/Hora</th><th width=410>Observaci&oacute;n</th><th width=100>Ir al detalle</th>
			<th width=100>Ir al WF</th></tr></thead>
<?
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99'  and area='PatCom' order by fecha_creacion asc ";

	  $res=mysql_query($result,$conexio); 
  	  while($row=mysql_fetch_array($res)) {
		  $id_anotacion=$row["id_anotacion"];
		$usuario=$row["usuario"];
		$observacion=$row["observacion"];
		$rut=$row["rut_asociado"];
		$fecha_hora=$row["fecha_creacion"];
	  $usu = "SELECT * FROM tbl_users  WHERE id_usuario='".$usuario."'";
	  $res_usu=mysql_query($usu,$conexio); 
  	  while($row_usu=mysql_fetch_array($res_usu)) {
		$nombre=$row_usu["tx_nombre"]." ".$row_usu["tx_apellidoPaterno"]." ".$row_usu["tx_apellidoMaterno"];
	  }
?>
<tr>
<td><?=$nombre?></td><td><?=$rut?></td><td><?=$fecha_hora?></td><td><?=$observacion?></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver Ficha"
onclick="window.open('mostrardatos.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver WF"
onclick="window.open('pop_wf.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td>
</tr>
<? }?>
</table>

	</td>
     </tr>

</table>

	<? }
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99' and area='PerCirc'";
	  $res=mysql_query($result,$conexio); 
	  $numeroRegistros=mysql_num_rows($res); 
	  if ($numeroRegistros>0) { ?>	
 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td class="do">
			  <span class="circulacion" style="font-size: 18px">Permiso de Circulaci&oacute;n</span>

             <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			 <thead><tr>
			<th width=200>Funcionario</th><th width=100>Rut Ciudadano</th><th width=150>Fecha/Hora</th><th width=410>Observaci&oacute;n</th><th width=100>Ir al detalle</th>
			<th width=100>Ir al WF</th></tr></thead>
<?
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99'  and area='PerCirc' order by fecha_creacion asc ";

	  $res=mysql_query($result,$conexio); 
  	  while($row=mysql_fetch_array($res)) {
		  $id_anotacion=$row["id_anotacion"];
		$usuario=$row["usuario"];
		$observacion=$row["observacion"];
		$rut=$row["rut_asociado"];
		$fecha_hora=$row["fecha_creacion"];
	  $usu = "SELECT * FROM tbl_users  WHERE id_usuario='".$usuario."'";
	  $res_usu=mysql_query($usu,$conexio); 
  	  while($row_usu=mysql_fetch_array($res_usu)) {
		$nombre=$row_usu["tx_nombre"]." ".$row_usu["tx_apellidoPaterno"]." ".$row_usu["tx_apellidoMaterno"];
	  }
?>
<tr>
<td><?=$nombre?></td><td><?=$rut?></td><td><?=$fecha_hora?></td><td><?=$observacion?></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver Ficha"
onclick="window.open('mostrardatos.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver WF"
onclick="window.open('pop_wf.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td>
</tr>
<? }?>
</table>

	</td>
     </tr>

</table>
<? }
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99' and area='LicCond'";
	  $res=mysql_query($result,$conexio); 
	  $numeroRegistros=mysql_num_rows($res); 
	  if ($numeroRegistros>0) { ?>	
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td class="do">
			  <span class="licencia" style="font-size: 18px">Licencia de Conducir</span>

             <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			 <thead><tr>
			<th width=200>Funcionario</th><th width=100>Rut Ciudadano</th><th width=150>Fecha/Hora</th><th width=410>Observaci&oacute;n</th><th width=100>Ir al detalle</th>
			<th width=100>Ir al WF</th></tr></thead>
<?
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99'  and area='LicCond' order by fecha_creacion asc ";

	  $res=mysql_query($result,$conexio); 
  	  while($row=mysql_fetch_array($res)) {
		  $id_anotacion=$row["id_anotacion"];
		$usuario=$row["usuario"];
		$observacion=$row["observacion"];
		$rut=$row["rut_asociado"];
		$fecha_hora=$row["fecha_creacion"];
	  $usu = "SELECT * FROM tbl_users  WHERE id_usuario='".$usuario."'";
	  $res_usu=mysql_query($usu,$conexio); 
  	  while($row_usu=mysql_fetch_array($res_usu)) {
		$nombre=$row_usu["tx_nombre"]." ".$row_usu["tx_apellidoPaterno"]." ".$row_usu["tx_apellidoMaterno"];
	  }
?>
<tr>
<td><?=$nombre?></td><td><?=$rut?></td><td><?=$fecha_hora?></td><td><?=$observacion?></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver Ficha"
onclick="window.open('mostrardatos.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver WF"
onclick="window.open('pop_wf.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td>
</tr>
<? }?>
</table>

	</td>
     </tr>
	
</table>
	<? }
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99' and area='Aseo'";
	  $res=mysql_query($result,$conexio); 
	  $numeroRegistros=mysql_num_rows($res); 
	  if ($numeroRegistros>0) { ?>	
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td class="do">
			 <span class="aseo" style="font-size: 18px">Aseo</span>

             <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			 <thead><tr>
			<th width=200>Funcionario</th><th width=100>Rut Ciudadano</th><th width=150>Fecha/Hora</th><th width=410>Observaci&oacute;n</th><th width=100>Ir al detalle</th>
			<th width=100>Ir al WF</th></tr></thead>

<?
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99'  and area='Aseo' order by fecha_creacion asc ";

	  $res=mysql_query($result,$conexio); 
  	  while($row=mysql_fetch_array($res)) {
		  $id_anotacion=$row["id_anotacion"];
		$usuario=$row["usuario"];
		$observacion=$row["observacion"];
		$rut=$row["rut_asociado"];
		$fecha_hora=$row["fecha_creacion"];
	  $usu = "SELECT * FROM tbl_users  WHERE id_usuario='".$usuario."'";
	  $res_usu=mysql_query($usu,$conexio); 
  	  while($row_usu=mysql_fetch_array($res_usu)) {
		$nombre=$row_usu["tx_nombre"]." ".$row_usu["tx_apellidoPaterno"]." ".$row_usu["tx_apellidoMaterno"];
	  }
?>
<tr>
<td><?=$nombre?></td><td><?=$rut?></td><td><?=$fecha_hora?></td><td><?=$observacion?></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver Ficha"
onclick="window.open('mostrardatos.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver WF"
onclick="window.open('pop_wf.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td>
</tr>
<? }?>
</table>

	</td>
     </tr>
</table>

<? }
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99' and area='CertObras'";
	  $res=mysql_query($result,$conexio); 
	  $numeroRegistros=mysql_num_rows($res); 
	  if ($numeroRegistros>0) { ?>	
 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td class="do">
			  <span class="obras" style="font-size: 18px">Certificado de Obras</span>

                          <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			 <thead><tr>
			<th width=200>Funcionario</th><th width=100>Rut Ciudadano</th><th width=150>Fecha/Hora</th><th width=410>Observaci&oacute;n</th><th width=100>Ir al detalle</th>
			<th width=100>Ir al WF</th></tr></thead>
<?
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99'  and area='CertObras' order by fecha_creacion asc ";

	  $res=mysql_query($result,$conexio); 
  	  while($row=mysql_fetch_array($res)) {
		  $id_anotacion=$row["id_anotacion"];
		$usuario=$row["usuario"];
		$observacion=$row["observacion"];
		$rut=$row["rut_asociado"];
		$fecha_hora=$row["fecha_creacion"];
	  $usu = "SELECT * FROM tbl_users  WHERE id_usuario='".$usuario."'";
	  $res_usu=mysql_query($usu,$conexio); 
  	  while($row_usu=mysql_fetch_array($res_usu)) {
		$nombre=$row_usu["tx_nombre"]." ".$row_usu["tx_apellidoPaterno"]." ".$row_usu["tx_apellidoMaterno"];
	  }
?>
<tr>
<td><?=$nombre?></td><td><?=$rut?></td><td><?=$fecha_hora?></td><td><?=$observacion?></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver Ficha"
onclick="window.open('mostrardatos.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver WF"
onclick="window.open('pop_wf.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td>
</tr>
<? }?>
</table>
	</td>
     </tr>

</table>
<?}
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99' and area='Inspeccion'";
	  $res=mysql_query($result,$conexio); 
	  $numeroRegistros=mysql_num_rows($res); 
	  if ($numeroRegistros>0) { ?>	
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td class="do">
			  <span class="inspecciones" style="font-size: 18px">Inspecciones Municipales</span>

              <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			 <thead><tr>
			<th width=200>Funcionario</th><th width=100>Rut Ciudadano</th><th width=150>Fecha/Hora</th><th width=410>Observaci&oacute;n</th><th width=100>Ir al detalle</th>
			<th width=100>Ir al WF</th></tr></thead>
<?
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99'  and area='Inspeccion' order by fecha_creacion asc ";

	  $res=mysql_query($result,$conexio); 
  	  while($row=mysql_fetch_array($res)) {
		  $id_anotacion=$row["id_anotacion"];
		$usuario=$row["usuario"];
		$observacion=$row["observacion"];
		$rut=$row["rut_asociado"];
		$fecha_hora=$row["fecha_creacion"];
	  $usu = "SELECT * FROM tbl_users  WHERE id_usuario='".$usuario."'";
	  $res_usu=mysql_query($usu,$conexio); 
  	  while($row_usu=mysql_fetch_array($res_usu)) {
		$nombre=$row_usu["tx_nombre"]." ".$row_usu["tx_apellidoPaterno"]." ".$row_usu["tx_apellidoMaterno"];
	  }
?>
<tr>
<td><?=$nombre?></td><td><?=$rut?></td><td><?=$fecha_hora?></td><td><?=$observacion?></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver Ficha"
onclick="window.open('mostrardatos.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver WF"
onclick="window.open('pop_wf.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td>
</tr>
<? }?>
</table>

	</td>
     </tr>

</table>
	<?}
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99' and area='PermProv'";
	  $res=mysql_query($result,$conexio); 
	  $numeroRegistros=mysql_num_rows($res); 
	  if ($numeroRegistros>0) { ?>	
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td class="do">
			  <span class="provisorio" style="font-size: 18px">Permisos Provisorios</span>

            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			 <thead><tr>
			<th width=200>Funcionario</th><th width=100>Rut Ciudadano</th><th width=150>Fecha/Hora</th><th width=410>Observaci&oacute;n</th><th width=100>Ir al detalle</th>
			<th width=100>Ir al WF</th></tr></thead>
<?
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99'  and area='PermProv' order by fecha_creacion asc ";

	  $res=mysql_query($result,$conexio); 
  	  while($row=mysql_fetch_array($res)) {
		  $id_anotacion=$row["id_anotacion"];
		$usuario=$row["usuario"];
		$observacion=$row["observacion"];
		$rut=$row["rut_asociado"];
		$fecha_hora=$row["fecha_creacion"];
	  $usu = "SELECT * FROM tbl_users  WHERE id_usuario='".$usuario."'";
	  $res_usu=mysql_query($usu,$conexio); 
  	  while($row_usu=mysql_fetch_array($res_usu)) {
		$nombre=$row_usu["tx_nombre"]." ".$row_usu["tx_apellidoPaterno"]." ".$row_usu["tx_apellidoMaterno"];
	  }
?>
<tr>
<td><?=$nombre?></td><td><?=$rut?></td><td><?=$fecha_hora?></td><td><?=$observacion?></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver Ficha"
onclick="window.open('mostrardatos.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver WF"
onclick="window.open('pop_wf.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td>
</tr>
<? }?>
</table>

	</td>
     </tr>

</table>
<? }
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99' and area='Tesoreria'";
	  $res=mysql_query($result,$conexio); 
	  $numeroRegistros=mysql_num_rows($res); 
	  if ($numeroRegistros>0) { ?>	
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_int">
			 <tr><td class="do">
			  <span class="tesoreria" style="font-size: 18px">Otros Pagos/Tesorer&iacute;a</span>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			<thead><tr>
			<th width=200>Funcionario</th><th width=100>Rut Ciudadano</th><th width=150>Fecha/Hora</th><th width=410>Observaci&oacute;n</th><th width=100>Ir al detalle</th>
			<th width=100>Ir al WF</th></tr></thead>
<?
	  $result = "SELECT * FROM anotaciones WHERE vigente=0 and fecha_creacion>'".$_POST["fecha_va"]." 00:00:00' and fecha_creacion<'".$_POST["fecha_va"]." 99:99:99'  and area='Tesoreria' order by fecha_creacion asc ";

	  $res=mysql_query($result,$conexio); 
  	  while($row=mysql_fetch_array($res)) {
		  $id_anotacion=$row["id_anotacion"];
		$usuario=$row["usuario"];
		$observacion=$row["observacion"];
		$rut=$row["rut_asociado"];
		$fecha_hora=$row["fecha_creacion"];
	  $usu = "SELECT * FROM tbl_users  WHERE id_usuario='".$usuario."'";
	  $res_usu=mysql_query($usu,$conexio); 
  	  while($row_usu=mysql_fetch_array($res_usu)) {
		$nombre=$row_usu["tx_nombre"]." ".$row_usu["tx_apellidoPaterno"]." ".$row_usu["tx_apellidoMaterno"];
	  }
?>
<tr>
<td><?=$nombre?></td><td><?=$rut?></td><td><?=$fecha_hora?></td><td><?=$observacion?></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver Ficha"
onclick="window.open('mostrardatos.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td><td><input type="submit" class="rojo_sombra" value="&laquo; Ver WF"
onclick="window.open('pop_wf.php?r=<?=$rut?>&donde=1', 'popup', 'width=1000,height=700'); return false;" /></td>
</tr>
<? }?>
</table>

	</td>
     </tr>
	
</table>
<? } ?>  
</td>
</tr>
</table>


    </td></tr>
</table>


</div>
<? } else { ?> 
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
			 <img src="images/lupa_carpeta144.jpg" alt="No hay datos" border="0" /><br />
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
<? } ?>
</body>

</html>