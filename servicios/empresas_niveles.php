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
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "empresas_niveles.php";
//formulario para crear permiso
if ( !empty($_POST['submit']) )  { 
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/empresa_niveles.php';//se crean los datos
}
//formulario para editar permiso
if ( !empty($_POST['submit_edit']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresa_niveles.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresa_niveles_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/empresa_niveles.php';//se crean los datos
}
if ( !empty($_POST['submit_level']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/formulario_comun.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/formulario_comun_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/formulario_comun.php';//se crean los datos
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Niveles</title>
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
<div class="title"><p>Niveles dentro de la empresa</p></div>
	<div class="content">        
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['mod']) ) { 
// SE TRAEN LOS DATOS DE SOLO UNA EMPRESA	
$query = "SELECT Nombre 
FROM `empresas_niveles`
WHERE idNiveles = {$_GET['mod']}";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);?>
<div>  
<div class="fleft"><h1>Edicion del nombre del nivel</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?id=<?php echo $_GET['id']; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div> 

<table class="tableform">         
<form  method="post"> 
<tr>
	<td><label>Nombre</label></td>
	<td><input type="text" name="nombre"  placeholder="Nombre del Nivel" required="" value="<?php echo $rowusr['Nombre']; ?>" /><?php echo $errors[1] ?></td>
</tr>
<tr>
	<td><input type="hidden" name="idNivel"  value="<?php echo $_GET['mod']; ?>" /></td>
	<td><div class="fright"> <input name="submit_edit" type="submit"  value="Editar &raquo;" /> </div></td>
</tr>
</form>
</table>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['id']) ) { 
// SE TRAEN LOS DATOS DE SOLO UNA EMPRESA	
$arrNiveles = array();
$query = "SELECT idNiveles, Nombre  
FROM `empresas_niveles`
WHERE idEmpresa = {$_GET['id']}
ORDER BY idNiveles";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrNiveles,$row );
}
?>
<div>  
<div class="fleft"><h1>Modificacion de Niveles</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div> 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre del Nivel</th> 
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrNiveles as $niveles) { ?>
  <tr> 
   <td><?php echo $niveles['Nombre']; ?></td>
   <td>	   
    <a href="<?php echo $location; ?>?id=<?php echo $_GET['id']; ?>&mod=<?php echo $niveles['idNiveles']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a> 
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article> 

<div>  
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>  
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 	?>
<div>  
<div class="fleft"><h1>Ingreso de Nombre de los Niveles</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?number=<?php echo $_GET['number'] ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div> 

<table class="tableform">
<form action="" method="post">

<?php for ($i = 1; $i <= $_GET['number']; $i++) { ?>
	<tr>
		<td><label>Nombre del Nivel <?php echo $i ?></label></td>
		<td><input name="datos[]"  type="text" required="" /><?php echo $errors[1] ?></td>
	</tr>
<?php }?>
  
    <tr>
		<td></td>
		<td><div class="fright"> <input name="submit" type="submit" value="Aceptar &raquo;" /></div></td>
	</tr>
</form>
</table>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['number']) ) { ?>
<div>  
<div class="fleft"><h1>Ingreso de cantidad de Niveles</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div> 

<table class="tableform">
<form action="" method="post">
	<tr>
		<td><label>N° de niveles</label></td>
		<td><input name="comun1"  type="text" required="" placeholder="Ingresar la cantidad de niveles que desea para la empresa"/><?php echo $errors[1] ?></td>
        <input name="comun2"  type="hidden" value="<?php echo $_GET['number']; ?>" />  
	</tr>
    <tr>
		<td></td>
		<td><div class="fright"> <input name="submit_level" type="submit" value="Aceptar &raquo;" /></div></td>      
	</tr>
</form>
</table> 



<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  {	
 // SE TRAE UN LISTADO DE TODAS LAS EMPRESAS
$arrUsers = array();
$query = "SELECT 
empresas_listado.idEmpresa, 
empresas_listado.Nombre,
COUNT(empresas_niveles.idEmpresa) AS n_permisos
FROM `empresas_listado`
LEFT JOIN `empresas_niveles` ON empresas_niveles.idEmpresa = empresas_listado.idEmpresa
GROUP BY empresas_listado.Nombre
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
   <th width="80">N° Niveles</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrUsers as $usuarios) { ?>
  <tr> 
   <td><?php echo $usuarios['Nombre']; ?></td>
   <td><?php echo $usuarios['n_permisos']; ?></td> 
   <td>
   <?php if($usuarios['n_permisos']>0){ ?>
	<input class="disabled" type="image" src="img/icn_new_article.png" title="Crear nuevo">
   <?php }else{?>
	<a href="<?php echo $location; ?>?number=<?php echo $usuarios['idEmpresa']; ?>"><input type="image" src="img/icn_new_article.png" title="Crear nuevo"></a>	   
   <?php }?>
    <a href="<?php echo $location; ?>?id=<?php echo $usuarios['idEmpresa']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a> 
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