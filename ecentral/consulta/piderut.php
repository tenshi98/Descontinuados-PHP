<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

    $usr = $_POST['Usr'];
    $pw = $_POST['Pass'];
	$uid = $_POST['idUsr'];
	/* $tipousr= $_POST['TUsr']; */
	$tipousr=$_SESSION['tus'];
	
 $fecha = date("d/m/Y");	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
 $fecha = date("d/m/Y"); 
?>
<body >
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
          <td colspan="3" align="right" valign="middle" class="borde_button"><input type="submit" class="rojo_sombra" value="&laquo; Volver" onclick="location='principal.php'"/>&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle"><table id="table1" border="0" height="163" width="834">
            <tbody>
              <tr>
                <td width="343" align="center" ><img src="images/nuevo-carnet-2013.jpg" width="300" height="191" /></td>
                <td width="481" align="center">
				<form name="form1" method="post" action="checkrut.php" onsubmit="return validaRut()" >
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25" colspan="4" class="Arial4">Ingrese el n&uacute;mero de la C&eacute;dula de Identidad a consultar</td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="20">&nbsp;</td>
                      <td height="25" colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td><span class="Arial2">N&deg; C&eacute;dula</span></td>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2"><input name="rutpersona" type="text" class="campo_rut" id="rutpersona" size="50" maxlength="20" onkeypress="javascript:numerosk(event);" value="" onkeyup="javascript:validaRutEnter(event)" placeholder="Ej: 12345678-9" style="width:220px !important;"/></td>
                    </tr>
					<tr><td>&nbsp;</td><td>&nbsp;</td><td><span class="Arial2" id="ayudaRut"><br />Ej: 12345678-9 &nbsp; (sin puntos y con gui&oacute;n separador)<br /><br /></span></td>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><input type="submit" class="rojo_sombra" value="Ingresar" />&nbsp; &nbsp; &nbsp;
                        <input type="reset" class="rojo_sombra" value="Limpiar" /></td>
                      <td align="right">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="2" class="Arial2_red">&nbsp;</td>
                    </tr>
                  </table>
                </form></td>
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
