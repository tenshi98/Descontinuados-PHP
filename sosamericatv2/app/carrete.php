<?php session_start();
require("../nombre_pag.php");
//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];

/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
/**********************************************************************************************************************************/
/*                                        Se filtran las entradas para evitar ataques                                             */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                 Realizo la validacion del equipo con el cual se ingresa                                        */
/**********************************************************************************************************************************/
//capturo la identificacion del equipo
if(isset($_GET['imei']))  		$id_gcm = $_GET['imei'];
$sql_id = "select login from ejecutivos where imei='".$id_gcm."'";
$result_id = mysql_query($sql_id, $dbConn);
//se verifica que el equipo sea el mismo que con el que se ingreso la ultima vez
$revision = mysql_num_rows($result_id);
if($revision == 0){
	header( "Location: login.php?id=".$_GET['id']."&longitud=".$_GET['longitud']."&latitud=".$_GET['latitud'].'&imei='.$_GET['imei'] );
	die;
} else {
	while($registro_id=mysql_fetch_array($result_id)) { 
	$login=$registro_id["login"];
	}
}
/**********************************************************************************************************************************/
/*                                                         Actualizo mi posicion                                                  */
/**********************************************************************************************************************************/
//actualizo mi posicion en la tabla de ejecutivos para asi obtener datos mas exactos
if ($_GET['longitud']!='' or $_GET['longitud']!=0 or $_GET['longitud']!='0.0') {
	$sql = "UPDATE ejecutivos
	SET lon=".$_GET['longitud'].", lat=".$_GET['latitud']."
	WHERE login='".$login."'";
	$resultado2 = mysql_query($sql,$dbConn);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Perfil</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="http://<?=$nombreurl?>/app/style.css" rel="stylesheet" type="text/css" />	
<script src="http://<?=$nombreurl?>/app/js/jquery.min.js"></script>
</head>
<body topmargin=0 leftmargin=0>
<script type="text/javascript">
window.onload=function(){MainActivity.getFromWebView777("NOSE")};
</script>

<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 //SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT  sms1, sms2, sms3, sms4, sms5, nom_ejecutiv FROM ejecutivos WHERE ejecutivos.login = '".$login."' and dispositivo='android'";
$resultado = mysql_query ($query, $dbConn);
	while($rowusr=mysql_fetch_array($resultado)) {
		$sms1=$rowusr['sms1'];
		$sms2=$rowusr['sms2'];		
		$sms3=$rowusr['sms3'];
		$sms4=$rowusr['sms4'];
		$sms5=$rowusr['sms5'];	
		$nombre=$rowusr['nom_ejecutiv'];	
	}
		?>



<table class="fondo_celeste2" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" >
	<p class="america_bco">&nbsp;&nbsp;Solicitar ubicaci&oacute;n &nbsp;&nbsp;(Solo Android)</p>
      <table class="fondo_bco" width="90%" border="0" cellspacing="0" cellpadding="0" align=center>


<? if ($sms1<>'0') {
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv,imei FROM ejecutivos WHERE fono_ejecutiv='09" . $sms1 . "'  and dispositivo='android' LIMIT 1";
	$result1 = mysql_query($sql1,$dbConn);
	$data1=mysql_fetch_array($result1)?> 
	<tr>
          <td align="center" valign="middle"><br />			
			<table width="90%" border="0" cellspacing="0" cellpadding="0" align=center>
            <tr>
              <td colspan="2" class="america_2_neg"><?=$data1["nom_ejecutiv"]?></td>
            </tr>
            <tr>
              <td colspan="2"><span class="america_2_gris"><?php echo $sms1;?><br />
              </span></td>
            </tr>
            <tr>
              <td width="50%" align="left"><a href="http://<?=$nombreurl?>/app/ubicar.php?telefono=<?=$data1["imei"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>" target="_self"><input name="button2" type="submit" class="bot_orange_fijo" id="button2" value="SOLICITAR" /></a></td>
              <td width="50%" align="right"><a href="http://<?=$nombreurl?>/app/ubicacion_seguimiento.php?telefono=<?=$data1["imei"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>" target="_self"><input name="button3" type="submit" class="bot_orange_fijo" id="button3" value="&Uacute;LTIMA" /></a></td>
            </tr>
        </table>
				</td>
        </tr>
		<?
	}?>	
		
<? if ($sms2<>'0') {
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv,imei FROM ejecutivos WHERE fono_ejecutiv='09" . $sms2 . "'  and dispositivo='android' LIMIT 1";
	$result1 = mysql_query($sql1,$dbConn);
	$data1=mysql_fetch_array($result1)?> 
	<tr>
          <td align="center" valign="middle"><br />			
			<table width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2" class="america_2_neg"><?=$data1["nom_ejecutiv"]?></td>
            </tr>
            <tr>
              <td colspan="2"><span class="america_2_gris"><?php echo $sms2;?><br />
              </span></td>
            </tr>
            <tr>
              <td width="50%" align="left"><a href="http://<?=$nombreurl?>/app/ubicar.php?telefono=<?=$data1["imei"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>" target="_self"><input name="button2" type="submit" class="bot_orange_fijo" id="button2" value="SOLICITAR" /></a></td>
              <td width="50%" align="right"><a href="http://<?=$nombreurl?>/app/ubicacion_seguimiento.php?telefono=<?=$data1["imei"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>" target="_self"><input name="button3" type="submit" class="bot_orange_fijo" id="button3" value="&Uacute;LTIMA" /></a></td>
            </tr>
        </table>
				</td>
        </tr>
		<?
	}?>	
<? if ($sms3<>'0') {
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv,imei FROM ejecutivos WHERE fono_ejecutiv='09" . $sms3 . "'  and dispositivo='android' LIMIT 1";
	$result1 = mysql_query($sql1,$dbConn);
	$data1=mysql_fetch_array($result1)?> 
	<tr>
          <td align="center" valign="middle"><br />			
			<table width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2" class="america_2_neg"><?=$data1["nom_ejecutiv"]?></td>
            </tr>
            <tr>
              <td colspan="2"><span class="america_2_gris"><?php echo $sms3;?><br />
              </span></td>
            </tr>
            <tr>
              <td width="50%" align="left"><a href="http://<?=$nombreurl?>/app/ubicar.php?telefono=<?=$data1["imei"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>" target="_self"><input name="button2" type="submit" class="bot_orange_fijo" id="button2" value="SOLICITAR" /></a></td>
              <td width="50%" align="right"><a href="http://<?=$nombreurl?>/app/ubicacion_seguimiento.php?telefono=<?=$data1["imei"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>" target="_self"><input name="button3" type="submit" class="bot_orange_fijo" id="button3" value="&Uacute;LTIMA" /></a></td>
            </tr>
        </table>
				</td>
        </tr>
		<?
	}?>	
				
<? if ($sms4<>'0') {
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv,imei FROM ejecutivos WHERE fono_ejecutiv='09" . $sms14 . "'  and dispositivo='android' LIMIT 1";
	$result1 = mysql_query($sql1,$dbConn);
	$data1=mysql_fetch_array($result1)?> 
	<tr>
          <td align="center" valign="middle"><br />			
			<table width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2" class="america_2_neg"><?=$data1["nom_ejecutiv"]?></td>
            </tr>
            <tr>
              <td colspan="2"><span class="america_2_gris"><?php echo $sms4;?><br />
              </span></td>
            </tr>
            <tr>
              <td width="50%" align="left"><a href="http://<?=$nombreurl?>/app/ubicar.php?telefono=<?=$data1["imei"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>" target="_self"><input name="button2" type="submit" class="bot_orange_fijo" id="button2" value="SOLICITAR" /></a></td>
              <td width="50%" align="right"><a href="http://<?=$nombreurl?>/app/ubicacion_seguimiento.php?telefono=<?=$data1["imei"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>" target="_self"><input name="button3" type="submit" class="bot_orange_fijo" id="button3" value="&Uacute;LTIMA" /></a></td>
            </tr>
        </table>
				</td>
        </tr>
		<?
	}?>	

		<? if ($sms5<>'0') {
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv,imei FROM ejecutivos WHERE fono_ejecutiv='09" . $sms5 . "'  and dispositivo='android' LIMIT 1";
	$result1 = mysql_query($sql1,$dbConn);
	$data1=mysql_fetch_array($result1)?> 
	<tr>
          <td align="center" valign="middle"><br />			
			<table width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2" class="america_2_neg"><?=$data1["nom_ejecutiv"]?></td>
            </tr>
            <tr>
              <td colspan="2"><span class="america_2_gris"><?php echo $sms5;?><br />
              </span></td>
            </tr>
            <tr>
              <td width="50%" align="left"><a href="http://<?=$nombreurl?>/app/ubicar.php?telefono=<?=$data1["imei"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>" target="_self"><input name="button2" type="submit" class="bot_orange_fijo" id="button2" value="SOLICITAR" /></a></td>
              <td width="50%" align="right"><a href="http://<?=$nombreurl?>/app/ubicacion_seguimiento.php?telefono=<?=$data1["imei"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>" target="_self"><input name="button3" type="submit" class="bot_orange_fijo" id="button3" value="&Uacute;LTIMA" /></a></td>
            </tr>
        </table>
				</td>
        </tr>
		<?
	}?>	
		

   

        <tr>
          <td align="center" valign="middle">&nbsp;</td>
        </tr>
      </table>
      <br /></td>
  </tr>
</table>





</body>
</html>