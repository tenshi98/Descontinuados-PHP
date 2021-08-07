<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
session_start();
    include("conectar_bd.php"); 
    conectar_bd();
    include("conectar_np.php"); 
//VALIDACION
 $tipousr=$_SESSION['tus'];
 $fecha = date("d/m/Y"); 	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$g_pagina?></title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type='text/javascript' src='js/infogrid.js'></script>
    <script src="./scripts/jquery171.js" type="text/javascript"></script>
    <script src="./scripts/jquery.alerts.js" type="text/javascript"></script>
    <link href="./scripts/jquery.alerts.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function validselect() {
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
 /* location.href = '?TIPO='+formulaire.fecha_va.options[formulaire.fecha_va.selectedIndex].value;
 document.getElementById(input_id).setAttribute('value', val);
 location.href ='observaciones.php?donde=1';*/
 document.getElementById("menu_form").submit();
 }
} 
function validselect2() {
	   var indic = document.menu_form2.fecha_va.selectedIndex
	   var valor = document.menu_form2.fecha_va.options[indic].value;
	   if (valor == 0) {
		  jAlert("Debe seleccionar una fecha", "Error");
		  menu_form2.fecha_va.focus();	
		  return false;	  
	   } 
}
function ChangeComboFecha2(formulaire){
if (formulaire.fecha_va.selectedIndex != 0) {
 /* location.href = '?TIPO='+formulaire.fecha_va.options[formulaire.fecha_va.selectedIndex].value;
 document.getElementById(input_id).setAttribute('value', val);
 location.href ='observaciones.php?donde=1';*/
 document.getElementById("menu_form2").submit();
 }
} 
</script>
		
</head>

<body >
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

  $usr = $_POST['Usr'];
  $pw = $_POST['Pass'];
  $uid = $_POST['idUsr'];
  while($row_usuario=mysql_fetch_array($result)) 
{ 
	$nombre_usu=$row_usuario["tx_nombre"]." ".$row_usuario["tx_apellidoPaterno"]." ".$row_usuario["tx_apellidoMaterno"];
	$tipousr= $row_usuario['id_TipoUsuario'];
}
  
	
  $fecha = date("d/m/Y");	
?>
<div align="center">
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="./images/logo_sm.png" width="200" height="65" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ciudadana<br />
            <span class="Arial2_red">Uso Exclusivo de la <?=$g_nombre_muni?></span></td>
          <td width="15%" align="center" valign="middle" class="fecha"><?php echo $fecha ?></td>
        </tr>
        <tr>
          <td colspan="3" align="right" valign="middle" class="borde_button"><input type="submit" class="rojo_sombra" value="&laquo; Salir" onclick="location='Logout.php'"/>&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle"><table id="table1" border="0" height="163" width="834">
            <tbody>
              <tr>
                <td width="343" align="center" ><img src="./images/configuracion.png" width="200" height="200" /></td>
                <td width="500" align="left" bgcolor="#FFFFFF">
				
                  <table border="0" cellspacing="6" cellpadding="0">
                    <tr>
                      <td height="25" colspan="3" class="Arial4" align="center">Men&uacute; Principal</td>
                      </tr>
                    <tr>
                      <td width="106">&nbsp;</td>
                      <td width="20">&nbsp;</td>
                      <td height="25">&nbsp;</td>
                    </tr>
                    <tr>
                      <td><span class="Arial2">Busca por Rut</span></td>
                      <td></td>
                      <td height="25">
					  <input type="button" class="rojo_sombra_search" value=" &nbsp;Buscar&nbsp; RUT &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" onclick="parent.location='piderut.php?donde=0'" />
					  </td>
                    </tr>

                    <tr>
                      <td><span class="Arial2">Busca por Direcci&oacute;n</span></td>
                      <td></td>
                      <td height="25">
					  <input type="button" class="rojo_sombra_search" value=" &nbsp;Buscar&nbsp; Direcci&oacute;n &nbsp;" onclick="parent.location='pidecalle.php?donde=1'" />
					  </td>
                    </tr>
<tr>
                      <td><span class="Arial2">Busca por Nombre</span></td>
                      <td></td>
                      <td height="25">
					  <input type="button" class="rojo_sombra_search" value=" &nbsp;Buscar&nbsp; Nombre &nbsp;&nbsp;&nbsp;" onclick="parent.location='pidenombre.php?donde=1'" />
					  </td>
                    </tr>
<? if ($tipousr != 2 ) {  ?>
<form method="post" id="menu_form" name="menu_form" action="observaciones.php?donde=1" onsubmit="return validselect();" >

                    <tr>
                      <td><span class="Arial2">Observaciones por Fecha (Abiertas)</span></td>
                      <td></td>
                      <td height="25">
									<select name="fecha_va" id="fecha_va" style="font-size:12px" onChange='ChangeComboFecha(this.form)'>
									<option value="0" SELECTED>Seleccionar</option>
						<?
						//$SQL_lee4=" SELECT SUBSTR( fecha_creacion, 1, 4 ) AS ano, SUBSTR( fecha_creacion, 6, 2 ) AS mes, SUBSTR( fecha_creacion, 9, 2 ) AS dia FROM anotaciones GROUP BY SUBSTR( fecha_creacion, 7, 4 ) , SUBSTR( fecha_creacion, 4, 2 ) , SUBSTR( fecha_creacion, 1, 2 ) ORDER BY SUBSTR( fecha_creacion, 7, 4 ) DESC , SUBSTR( fecha_creacion, 4, 2 ) DESC , SUBSTR( fecha_creacion, 1, 2 ) DESC ";

						$SQL_lee4=" SELECT CONCAT(SUBSTR( fecha_creacion, 1, 4 ),SUBSTR( fecha_creacion, 6, 2 ),SUBSTR( fecha_creacion, 9, 2 )) AS fecha FROM anotaciones where vigente=1 GROUP BY CONCAT(SUBSTR( fecha_creacion, 1, 4 ),SUBSTR( fecha_creacion, 6, 2 ),SUBSTR( fecha_creacion, 9, 2 )) ORDER BY CONCAT(SUBSTR( fecha_creacion, 1, 4 ),SUBSTR( fecha_creacion, 6, 2 ),SUBSTR( fecha_creacion, 9, 2 )) DESC ";
						
						$res=mysql_query($SQL_lee4,$conexio); 
						
						while($fila=mysql_fetch_array($res)) {
							//$fecha =$fila["fecha"];
								$fecha = SUBSTR( $fila["fecha"], 6, 2 )."/".SUBSTR( $fila["fecha"], 4, 2 )."/".SUBSTR( $fila["fecha"], 0, 4 );
								$fecha_va=SUBSTR( $fila["fecha"], 0, 4 )."-".SUBSTR( $fila["fecha"], 4, 2 )."-".SUBSTR( $fila["fecha"], 6, 2 );
								?>
								
							<option value="<?=$fecha_va?>"><?=$fecha?></option>
							
						
						<? }?>
						</select>&nbsp;&nbsp;<input name="busk" type="submit" class="rojo_sombra_search" id="busk" value="Buscar" /></td>
                    </tr>
</form>

<form method="post" id="menu_form2" name="menu_form2" action="obscerradas.php?donde=1" onsubmit="return validselect2();" >

                    <tr>
                      <td><span class="Arial2">Observaciones por Fecha (Cerradas)</span></td>
                      <td></td>
                      <td height="25">
									<select name="fecha_va" id="fecha_va" style="font-size:12px" onChange='ChangeComboFecha2(this.form)'>
									<option value="0" SELECTED>Seleccionar</option>
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
						</select>&nbsp;&nbsp;<input name="busk" type="submit" class="rojo_sombra_search" id="busk" value="Buscar" /></td>
                    </tr>
</form>
<? }?>

                    <tr>
                      <td><span class="Arial2">Modifica tu Clave</span></td>
                      <td></td>
                      <td><input type="button" class="rojo_sombra_clave" value=" Cambiar Clave &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;" onclick="parent.location='changepass.php'" /></td>
                    </tr>
					<? if ($tipousr=='1'){ ?>
                    <tr>
                      <td class="Arial2">Administraci&oacute;n</td>
                      <td></td>
                      <td class="Arial2_red">
					  <input type="button" class="rojo_sombra_configura" value="Administraci&oacute;n &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;" onclick="parent.location='MenuAdmin.php'" />
					  </td>
                    </tr>
					<? } ?>
                  </table>
                </td>
              </tr>
            </tbody>
          </table></td>
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
</body>
</html>
