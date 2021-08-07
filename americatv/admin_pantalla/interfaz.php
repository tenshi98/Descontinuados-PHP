<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once 'AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once 'AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once 'AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once('../nombre_pag.php');
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "interfaz.php";
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Formulario creacion
if ( !empty($_POST['submit_create']) )  { 
	//Agregamos direcciones
	$location.='?create=true';
	//Llamamos a las partes del formulario
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_common/interfaz.php';
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_controller/interfaz_1.php';
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_insert/interfaz.php';
}
//Formulario edicion
if ( !empty($_POST['submit_edit']) )  { 
	//Agregamos direcciones
	$location.='?mod=true';
	//Llamamos a las partes del formulario
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_common/interfaz.php';
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_controller/interfaz_1.php';
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_update/interfaz.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	$location.='?deleted=true';
	//Llamamos al formulario de borrado
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_del/interfaz.php';
}
//se borra un dato
if ( !empty($_GET['act']) )     {
	$location.='?activado=true';
	//Llamamos al formulario de borrado
	require_once 'AA2D2CFFDJFDJX1/xrxs_trans/interfaz.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?php echo $pagina?> ::.</title>
<link rel="icon" href="http://<?php echo $nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?php echo $nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="mapestilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="miestilo.css">
<link href="font-awesome.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>


</head>

<body onload="MM_preloadImages('../images/logo_footer_up2.png')">
<div id="nonFooter" >

 <table bgcolor="#999999" width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td align="center" valign="middle"><table width="990" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="58%" align="right" valign="middle" class="google_fjalla_bco"><table border="0" cellpadding="0" cellspacing="0" class="logo_flot">
          <tr>
            <td><img src="../images/logo.png" height="200" /></td>
          </tr>
        </table>
          Administrar interfaces</td>
        <td width="42%" height="50" align="center" valign="middle">
		<input name="button" type="submit" class="bot_sombra_izq" id="button" value="" />
          <input name="button2" type="submit" class="bot_sombra_cent" id="button2" value="Volver"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/admin';"/>
          <input name="button4" type="submit" class="bot_sombra_der" id="button4" value="" /></td>
      </tr>
    </table></td>
    </tr>
</table>
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_top">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="50" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center">
                    
                    
                    
                    <table width="90%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" valign="middle"><table width="600" border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td align="center" valign="middle" class="google_fjalla_gde">Listado de interfaces<br />
                                <span class="arial_light_med">&nbsp;</span></td>
                            </tr>
                            <tr>
                              <td align="right"><a href="<?php echo $location ?>?new=true" class="bot_sombra btn" >Crear nueva</a></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr> 
                          </tbody>
                        </table></td>
                      </tr>
                      <tr>
                        <td>
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php  if (isset($errors[3])) {echo $errors[3];}?>
<?php  if (isset($errors[4])) {echo $errors[4];}?>
<?php  if (isset($errors[5])) {echo $errors[5];}?>
<?php  if (isset($_GET['create'])) {?>
<div id="txf_01" class="alert alert_sucess">  
	Interfaz Creada correctamente
	<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_01" class="alert alert_sucess">  
	Interfaz Modificada correctamente
	<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_01" class="alert alert_sucess">  
	Interfaz borrada correctamente
	<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
//se traen los datos de la pregunta
$query = "SELECT Nombre, img_fondo, img_icono
FROM interfaz
WHERE idInterfaz = '{$_GET['id']}' ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado); ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="">
<form method="post">
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Nombre de la interfaz</span></td>
	<td><input name="Nombre" type="text" class="arial_light_cuadro" placeholder="Nombre" value="<?php if (isset($Nombre)) { echo $Nombre;}else{ echo $row_data['Nombre'];}?>"/></td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Estilo de fondo</span></td>
	<td><input name="img_fondo" type="text" class="arial_light_cuadro" placeholder="Fondo" value="<?php if (isset($img_fondo)) { echo $img_fondo;}else{ echo $row_data['img_fondo'];}?>"/></td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Imagen del icono</span></td>
	<td><input name="img_icono" type="text" class="arial_light_cuadro" placeholder="Icono" value="<?php if (isset($img_icono)) { echo $img_icono;}else{ echo $row_data['img_icono'];}?>"/></td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"></td>
	<td>
    <input name="idInterfaz" type="hidden" value="<?php echo $_GET['id'] ?>" />
    <input name="submit_edit" type="submit" class="bot_sombra"  value="Editar Interfaz" />
    <a href="<?php echo $location ?>" class="bot_sombra btn" >Volver</a>
    </td>
</tr>
</form>
</table>   
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['new']) ) { ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="">
<form method="post">

<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Nombre de la interfaz</span></td>
	<td><input name="Nombre" type="text" class="arial_light_cuadro"  placeholder="Nombre" value="<?php if (isset($Nombre)) { echo $Nombre;} ?>" />     </td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Estilo de fondo</span></td>
	<td><input name="img_fondo" type="text" class="arial_light_cuadro" placeholder="Fondo" value="<?php if (isset($img_fondo)) { echo $img_fondo;} ?>" />     </td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Imagen del icono</span></td>
	<td><input name="img_icono" type="text" class="arial_light_cuadro" placeholder="Icono" value="<?php if (isset($img_icono)) { echo $img_icono;} ?>" />     </td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"></td>
	<td>
    <input name="submit_create" type="submit" class="bot_sombra"  value="Crear Interfaz" />
    <a href="<?php echo $location ?>" class="bot_sombra btn" >Volver</a>
    </td>
</tr>
</form>
</table>                      
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
$arrInterfaz = array();
$query = "SELECT
interfaz.idInterfaz,
interfaz.Nombre,
interfaz.img_fondo,
interfaz.img_icono,
interfaz.active
FROM
interfaz
ORDER BY interfaz.Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrInterfaz,$row );
}
?>                        
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="">
<thead>
	<tr>
    	<th>Nombre</th>
        <th>Img Fondo</th>
        <th>Icono</th>
        <th>Estado</th>
        <th>Modificar</th>
    </tr>
</thead>
<?php foreach ($arrInterfaz as $interfaces) { ?>
	<tr>
		<td height="40" align="left" valign="middle">
        <span class="arial_tit_gris"><?php echo $interfaces['Nombre']; ?></span>
        </td>
        <td height="40" align="left" valign="middle">
        <span class="arial_tit_gris"><?php echo $interfaces['img_fondo']; ?></span>
        </td>
        <td height="40" align="left" valign="middle">
        <span class="arial_tit_gris"><?php echo $interfaces['img_icono']; ?></span>
        </td>
        <td height="40" align="left" valign="middle">
        <span class="arial_tit_gris"><?php if($interfaces['active']=='1'){ echo 'activa';}; ?></span>
        </td>
  
         <td width="22%">
            <a class="btn_list btn-app" href="<?php echo $location ?>?id=<?php echo $interfaces['idInterfaz'] ?>"><i class="fap fap-edit"></i> Edit</a>
            <a class="btn_list btn-app" href="<?php echo $location ?>?del=<?php echo $interfaces['idInterfaz'] ?>"><i class="fap fap-trash-o"></i> Elim</a> 
            <a class="btn_list btn-app" href="<?php echo $location ?>?act=<?php echo $interfaces['idInterfaz'] ?>"><i class="fa fa-power-off"></i> Activ</a>    
         </td>
	</tr>
<?php } ?>
    
</table>
<?php } ?>

                         
                          
                          
                          
                          </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top">
		  <table id="table3" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td>&nbsp;</td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>

	


<!-- PIE  -->
<!--Tabla de margen frente al footer -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr><td height="70">&nbsp;</td></tr>
</table>
<!--Fin de la Tabla de margen frente al footer -->

</div> 

<!-- Footer, debe estar dentro del Div-->
<div id="Footer">
<?  require_once('../inc/pie2.incl');  ?> 
</div>

<!-- Fin del Footer-->

</body>
</html>
