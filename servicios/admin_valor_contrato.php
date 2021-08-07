<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/listado_errores.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se define la variables vacias para evitar errores                                            */
/**********************************************************************************************************************************/
$errors[1]='';
$errors[2]='';
$errors[3]='';
$errors[4]='';
/**********************************************************************************************************************************/
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "admin_valor_contrato.php";
//formulario para crear trabajador
if ( !empty($_POST['submit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['new'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/valor_contrato.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/valor_contrato_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/valor_contrato.php';//se crean los datos
}
//formulario para editar trabajador
if ( !empty($_POST['submit_edit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/valor_contrato.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/valor_contrato_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/valor_contrato.php';//se crean los datos
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Valorizacion Contrato</title>
<!-- InstanceEndEditable -->
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo2.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
function msg(direccion){
if (confirm("¿Realmente deseas eliminar el registro?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
</script>
<!-- InstanceEndEditable -->
</head>
<body>
<table class="table" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" height="39px;">
<?php require_once 'AR2D2CFFDJFDJX1/xrxs_core/menu_nav.php'; ?>     
    </td>
  </tr>
  <tr>
    <td width="220px;" bgcolor="#eee">
<?php require_once 'AR2D2CFFDJFDJX1/xrxs_core/menu_lateral.php'; ?>  
    </td>
    <td height="100%">
    	<div class="body">
		<!-- InstanceBeginEditable name="content" -->
 <div class="modulo widht_modulo_full">
<div class="title"><p>Valorizacion Contrato</p></div>
<div class="content">          
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['new']) ) {?>
<div>  
<div class="fleft"><h1>Valorización del Contrato - Nueva valorizacion</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['new']; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Fecha desde</label></td>
        <td><input type="text" name="Valorizacion"  placeholder="Valorizacion Mensual del Contrato"  required=""/><?php echo $errors[1] ?></td>
        <td><label>Fecha hasta</label></td>
        <td><input type="text" name="Gastos_gen"  placeholder="Gasto General Mensual del Contrato"  required=""/><?php echo $errors[2] ?></td>
    </tr>
    <tr>
		<td colspan="4"><div class="fright"> <input name="submit" type="submit" value="Crear &raquo;" /> </div></td>
	</tr>
</form>
</table>

<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 } elseif ( ! empty($_GET['id']) ) {
// Se trae el valor mensual del contrato
$query = "SELECT Valorizacion, Gastos_gen
FROM `valor_contrato`
WHERE idValor = {$_GET['id']} ";
$resultado = mysql_query ($query, $dbConn);
$rowvalor = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);?>
<div>  
<div class="fleft"><h1>Valorización del Contrato - Editar valorizacion</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Fecha desde</label></td>
        <td><input type="text" name="Valorizacion"  placeholder="Valorizacion Mensual del Contrato"  value="<?php echo $rowvalor['Valorizacion']; ?>" required=""/><?php echo $errors[1] ?></td>
        <td><label>Fecha hasta</label></td>
        <td><input type="text" name="Gastos_gen"  placeholder="Gasto General Mensual del Contrato"  value="<?php echo $rowvalor['Gastos_gen']; ?>" required=""/><?php echo $errors[2] ?></td>
    </tr>
    <tr>
    <input name="idValor" type="hidden"  value="<?php echo $_GET['id']; ?>" />
    <input name="idEmpresa" type="hidden"  value="<?php echo $_GET['view']; ?>" />
		<td colspan="4"><div class="fright"> <input name="submit_edit" type="submit"  value="Editar &raquo;" /> </div></td>
	</tr>
</form>
</table>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// Se trae el valor mensual del contrato
$query = "SELECT idValor,Valorizacion, Gastos_gen
FROM `valor_contrato`
WHERE idEmpresa = {$_GET['view']} ";
$resultado = mysql_query ($query, $dbConn);
$rowvalor = mysql_fetch_assoc ($resultado);
$cuenta_registros = mysql_num_rows($resultado);
mysql_free_result($resultado);?>
<div>  
<div class="fleft"><h1>Valorización del Contrato - Valores</h1></div>
<?php if ($cuenta_registros==0) {?>
<div class="fright"><a href="<?php echo $location; ?>?new=<?php echo $_GET['view']; ?>" ><input name="" type="button" value="Crear Nuevo &raquo;" /></a></div>
<?php } ?>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div> 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr>
   <th>Datos</th>
   <th width="150">Valores</th> 
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php if ($cuenta_registros!=0) {?>
  <tr>
   <td>Valor Mensual del contrato</td>
   <td><?php echo Valores_sd($rowvalor['Valorizacion']); ?></td> 
   <td>
    <a href="admin_valor_contrato.php?view=<?php echo $_GET['view']; ?>&id=<?php echo $rowvalor['idValor']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a>
 </td> 
 </tr>
 <tr>
   <td>Valor Anual del contrato</td>
   <td><?php echo Valores_sd($rowvalor['Valorizacion']*12) ; ?></td> 
   <td></td> 
 </tr>
 <tr>
   <td>Valor Mensual de los gastos generales</td>
   <td><?php echo Valores_sd($rowvalor['Gastos_gen']); ?></td> 
   <td></td> 
 </tr>
 <tr>
   <td>Valor Anual de los gastos generales</td>
   <td><?php echo Valores_sd($rowvalor['Gastos_gen']*12) ; ?></td> 
   <td></td> 
 </tr>
<?php } ?> 
 </tbody> 
 </table>
</div>
</article> 


<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 	
 // SE TRAE UN LISTADO DE TODAS LAS EMPRESAS
$arrUsers = array();
$query = "SELECT 
empresas_listado.idEmpresa, 
empresas_listado.Nombre
FROM `empresas_listado`
INNER JOIN `usuarios_empresas`     ON usuarios_empresas.idEmpresa      = empresas_listado.idEmpresa
WHERE usuarios_empresas.idUsuario = ".$arrUsuario['idUsuario']."
ORDER BY empresas_listado.Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<div>  
<div class="fleft"><h1>Listado de Empresas</h1></div>
<div class="clear"></div></div> 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre de la Empresa</th> 
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrUsers as $usuarios) { ?>
  <tr> 
   <td><?php echo $usuarios['Nombre']; ?></td>
   <td>
	<a href="<?php echo $location; ?>?view=<?php echo $usuarios['idEmpresa']; ?>"><input type="image" src="img/icn_categories.png" title="Ver"></a>	   
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article> 

<?php } ?>			
</div>
</div>	
		<!-- InstanceEndEditable --> 
    	</div>
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>