<?
require("../conexion2.php");
require("../nombre_pag.php");

//Verifico el envio de datos
if ( !empty($_POST['rutpersona']) )  {
//elimino el guion del rut
$Rut_limpio = str_replace("-","",$_POST['rutpersona']);
//elimino los puntos del rut
$Rut_limpio = str_replace(".","",$Rut_limpio);
//Busco a la persona en el listado de militantes
	/*$sql ="SELECT idMilitante FROM militantes WHERE RutMilitante='".$Rut_limpio."'";
	$res=mysql_query($sql,$base); 
	$cuenta_rut=mysql_num_rows($res); */
	//Busco a la persona en el padron
		$sql ="SELECT REGION,NOMBRE,DOMICILIO,Comuna,fono_celular,domicilio_2,comuna_2,region_2,tipo_domicilio2,correo,rut_compara FROM padron_electoral_CL WHERE rut_compara='" . $Rut_limpio . "'";
		$res=mysql_query($sql,$base_padron); 
		$numeroRegistros=mysql_num_rows($res); 
		if ($numeroRegistros==1)  { ?>
			<form name="formulario" method="post" action="crea_usuario.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?>
			&imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&dispositivo=<?=$_GET["dispositivo"]?>">

			<? $rowusr = mysql_fetch_assoc ($res); ?>
			<input type="hidden" name="rut" value="<?=$_POST['rutpersona']?>">
			<input type="hidden" name="rut_compara" value="<?=$uno.$dos?>">
			<input type="hidden" name="nom_ejecutiv" value="<?=$rowusr['NOMBRE']?>">
			<input type="hidden" name="fono_ejecutiv" value="<?=$rowusr['fono_celular']?>">
			<? if ($rowusr['region_2']!="") {?>
				<input type="hidden" name="region" value="<?=$rowusr['region_2']?>">
			<? }else{ ?>
				<input type="hidden" name="region" value="<?=$rowusr['REGION']?>">
			<? } ?>
			<? if ($rowusr['comuna_2']!="") {?>
				<input type="hidden" name="comuna" value="<?=$rowusr['comuna_2']?>">
			<? }else{ ?>
				<input type="hidden" name="comuna" value="<?=$rowusr['Comuna']?>">
			<? } ?>
			<? if ($rowusr['domicilio_2']!="") {?>
				<input type="hidden" name="dir_ejecutiv" value="<?=$rowusr['domicilio_2']?>">
			<? }else{ ?>
				<input type="hidden" name="dir_ejecutiv" value="<?=$rowusr['DOMICILIO']?>">
			<? } ?>
				<input type="hidden" name="login" value="<?=$rowusr['correo']?>">
			</form>
			<script type="text/javascript">
			//Redireccionar con el formulario creado
			document.formulario.submit();
			</script>

		<? } else{ ?>
			<form name="formulario2" method="post" action="crea_usuario2.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?>
			&imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">

				<input type="hidden" name="rut" value="<?=$_POST['rutpersona']?>">
				<input type="hidden" name="rut_compara" value="">
				<input type="hidden" name="nom_ejecutiv" value="">
				<input type="hidden" name="fono_ejecutiv" value="">
				<input type="hidden" name="comuna" value="">
				<input type="hidden" name="dir_ejecutiv" value="">
				<input type="hidden" name="region" value="">
			</form>
			<script type="text/javascript">
			//Redireccionar con el formulario creado
			document.formulario2.submit();
			</script>
			<?
		}
	
}
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Juntos Somos Mas</title>
<script type="text/javascript" src="../scripts/FuncJScript.js"></script>

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script src="../scripts/jquery.alerts.js" type="text/javascript"></script>
    <link href="../scripts/jquery.alerts.css" rel="stylesheet" type="text/css" />   
<link href="css/reset.css"  rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
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
	  alert("El valor ingresado NO es un Rut v\xE1lido");
	  //jAlert("El valor ingresado NO es un Rut v\xE1lido", "Error");
	  form1.rutpersona.focus();	
	  return false;
	}
</script>
</head>

<body>
<div class="height100 widht100">
    <div class="widht80 fcenter perfil">
        <h1>Crear usuario</h1>
	<br>	<br>

	<table width="100%" border="0" height="80%" cellspacing="0" cellpadding="0"  valign="middle"  class="table_msg">
  <tr>
    <td width="64%" height="49%"  align="center" >
	<form name="form1" method="post" onSubmit="return validaRut()" >
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25"  class="Arial4">Ingrese el n&uacute;mero de su C&eacute;dula de Identidad</td>
                      </tr>
                    <tr><td width="20">&nbsp;</td></tr>
                    <tr><td><label>N&deg; C&eacute;dula (Ej: 12345678-9)</label></td> </tr>
					<tr>
                      <td height="25">
					  <input name="rutpersona" type="text"  id="rutpersona" size="50" maxlength="20"  placeholder="Ej: 12345678-9" style="width:220px !important;"/>
					  </td>
                    </tr>
                      <tr><td width="20">&nbsp;</td></tr>
                      <tr><td width="20">&nbsp;</td></tr>
                       <tr><td><input name="submit" type="submit" value="Continuar" id="post_button" /></td></tr>
                  </table>
                </form>
</td>
    </tr>
</table>

</div></div>





</body>
</html>

