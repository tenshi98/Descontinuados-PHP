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
$location = "admin_perfiles_empresas.php";
//formulario para crear permiso
if ( !empty($_POST['submit']) )  { 
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresa_listado.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresa_listado_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/empresa_listado.php';//se crean los datos
}
//formulario para editar permiso
if ( !empty($_POST['submit_edit']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresa_listado.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresa_listado_2.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/empresa_listado.php';//se crean los datos
}

/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
if ( !empty($_GET['del']) )     {require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/empresa_listado.php';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Empresas Listado</title>
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
<div class="title"><p>Empresas Listado</p></div>
	<div class="content">
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
if ( ! empty($_GET['id']) ) { 
// SE TRAEN LOS DATOS DE SOLO UNA EMPRESA	
$query = "SELECT email,web,Nombre,Rut,Direccion,Nombre_contrato,N_contrato,Fono,Contacto,Pais,Ciudad,Comuna,Fax,Rubro,Abreviatura,Fecha_ini_con,Fecha_term_con,duracion_contrato
FROM `empresas_listado`
WHERE idEmpresa = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);
?>
<div>  
<div class="fleft"><h1>Editar datos de la empresa</h1></div>
<div class="fright"><a href="<?php echo $location ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

 
 <table class="tableform">         
<form  method="post"> 
<tr>
	<td><label>Razon social</label></td>
	<td><input type="text" name="Nombre"  placeholder="Razon social de la empresa" required="" value="<?php echo $rowusr['Nombre']; ?>" /><?php echo $errors[1] ?></td>
    <td><label>Abreviatura</label></td>
    <td><input type="text" name="Abreviatura"  placeholder="Abreviatura de la empresa" required="" value="<?php echo $rowusr['Abreviatura']; ?>"/><?php echo $errors[2] ?></td>
</tr>
<tr>	
    <td><label>Pais</label></td>
    <td><input type="text" name="Pais"   placeholder="Pais" value="<?php echo $rowusr['Pais']; ?>" /></td>
    <td><label>Ciudad</label></td>
	<td><input type="text" name="Ciudad"   placeholder="Ciudad" value="<?php echo $rowusr['Ciudad']; ?>"/></td>
</tr>
<tr>	
    <td><label>Comuna</label></td>
    <td><input type="text" name="Comuna"   placeholder="Comuna" value="<?php echo $rowusr['Comuna']; ?>" /></td>
    <td><label>Direccion</label></td>
	<td><input type="text" name="Direccion"   placeholder="Direccion" value="<?php echo $rowusr['Direccion']; ?>"/></td>
</tr>
<tr>	
<td><label>Rut</label></td>
<?php //////////////////////// verifica si el rut esta en 0, si es asi no muestra nada ///////////////////////////////////////////////////// 
if ($rowusr['Rut']==0) { ?>
<td><input type="text" name="Rut"   placeholder="Rut" required=""/></td> 
<?php } else { ?>
<td><input type="text" name="Rut"   placeholder="Rut" value="<?php echo $rowusr['Rut']; ?>" required=""/><?php echo $errors[4] ?></td>
<?php } ?>
<td><label>Telefono</label></td>
<?php //////////////////////// verifica si el fono esta en 0, si es asi no muestra nada ///////////////////////////////////////////////////// 
if ($rowusr['Fono']==0) { ?>
<td><input type="text" name="Fono"   placeholder="Telefono de contacto"  /></td>
<?php } else { ?>
<td><input type="text" name="Fono"   placeholder="Telefono de contacto" value="<?php echo $rowusr['Fono']; ?>" /></td>
<?php } ?> 
</tr>
<tr>	
    <td><label>Fax</label></td>
    <td><input type="text" name="Fax"  placeholder="Fax de contacto" value="<?php echo $rowusr['Fax']; ?>"/></td>
    <td><label>Rubro</label></td>
	<td><input type="text" name="Rubro" placeholder="Rubro de la empresa"  value="<?php echo $rowusr['Rubro']; ?>" /></td>
</tr>
<tr>
	<td><label>Correo</label></td>
    <td colspan="3"><input type="text" name="email" placeholder="Correo electronico" value="<?php echo $rowusr['email']; ?>" required=""/><?php echo $errors[3] ?></td>
</tr>
<tr>
	<td><label>Sitio</label></td>
    <td colspan="3"><input type="text" name="web" placeholder="Sitio Web" value="<?php echo $rowusr['web']; ?>"/></td>
</tr>
<tr>	
    <td><label>Contacto</label></td>
    <td><input type="text" name="Contacto" placeholder="Persona de contacto" value="<?php echo $rowusr['Contacto']; ?>"/></td>
     <td><label>N° Contrato </label></td>
    <?php //////////////////////// verifica si el numero de contrato esta en 0, si es asi no muestra nada ///////////////////////////////////////////////////// 
	if ($rowusr['N_contrato']=="0") { ?>
    <td><input type="text" name="N_contrato" placeholder="Numero del contrato"/></td>
	<?php } else { ?>
    <td><input type="text" name="N_contrato" placeholder="Numero del contrato"  value="<?php echo $rowusr['N_contrato']; ?>"/></td>
	<?php } ?>   
</tr>
<tr>	   
    <td><label>Nombre Contrato</label></td>
	<td colspan="3"><input type="text" name="Nombre_contrato" placeholder="Nombre del contrato" value="<?php echo $rowusr['Nombre_contrato']; ?>" /></td>
</tr>
<tr>	   
    <td><label>Fecha inicio Contrato</label></td>
	<td><input type="date" name="Fecha_ini_con"  value="<?php echo $rowusr['Fecha_ini_con']; ?>" /></td>
    <td><label>Fecha termino Contrato</label></td>
	<td><input type="date" name="Fecha_term_con"  value="<?php echo $rowusr['Fecha_term_con']; ?>" /></td>
</tr>
<tr>	
    <td><label>Duracion del contrato</label></td>
    <?php //////////////////////// verifica si la duracion del contrato esta en 0, si es asi no muestra nada ///////////////////////////////////////////////////// 
	if ($rowusr['duracion_contrato']=="0") { ?>
    <td><input type="text" name="duracion_contrato" placeholder="Duracion del contrato(N° meses)" /></td>
	<?php } else { ?>
    <td><input type="text" name="duracion_contrato" placeholder="Duracion del contrato(N° meses)" value="<?php echo $rowusr['duracion_contrato']; ?>"/></td>
	<?php } ?>   
    <td></td>
    <td></td>  
</tr>
<tr>
	<td colspan="3"></td>
    <input type="hidden" name="idEmpresa" value="<?php echo $_GET['id']; ?>" />
	<td><div class="fright"> <input name="submit_edit" type="submit"  value="Editar &raquo;" /> </div></td>
</tr>
</form>
</table>



<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// SE TRAEN LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT  email,web,Nombre,Rut,Direccion,Nombre_contrato,N_contrato,Fono,Contacto,Pais,Ciudad,Comuna,Fax,Rubro,Fecha_ini_con,Fecha_term_con,duracion_contrato
FROM `empresas_listado`
WHERE idEmpresa = {$_GET['view']}";
	$resultado = mysql_query ($query, $dbConn);
	$rowusr = mysql_fetch_assoc ($resultado);
?>

<div>
<div class="fleft"><h1>Detalles de <?php echo $rowusr['Nombre']; ?></h1></div>
<div class="fright"><a href="<?php echo $location; ?>?id=<?php echo $_GET['view']; ?>" ><input name="" type="button" value="Editar Datos &raquo;" /></a></div>
<div class="clear"></div>
</div> 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
<thead><tr> 
   <th colspan="4">Datos Básicos</th>
</tr></thead>
<tbody> 
<tr><td colspan="2"><strong>Dirección : </strong><?php echo $rowusr['Direccion']; ?></td>
    <td colspan="2"><strong>Fono : </strong><?php echo $rowusr['Fono']; ?></td></tr>
<tr><td colspan="2"><strong>Pais : </strong><?php echo $rowusr['Pais']; ?></td>
    <td colspan="2"><strong>Fax : </strong><?php echo $rowusr['Fax']; ?></td></tr>
<tr><td colspan="2"><strong>Ciudad : </strong><?php echo $rowusr['Ciudad']; ?></td>
    <td colspan="2"><strong>Correo : </strong><?php echo $rowusr['email']; ?></td></tr>
<tr><td colspan="2"><strong>Comuna : </strong><?php echo $rowusr['Comuna']; ?></td>
    <td colspan="2"><strong>Web : </strong><?php echo $rowusr['web']; ?></td></tr>
<tr><td colspan="2"><strong>Rut : </strong><?php echo $rowusr['Rut']; ?></td>
    <td colspan="2"><strong>Rubro : </strong><?php echo $rowusr['Rubro']; ?></td></tr>
<tr><td colspan="2"><strong>Contacto : </strong><?php echo $rowusr['Contacto']; ?></td>
	<td colspan="2"><strong>N° Contrato : </strong><?php echo $rowusr['N_contrato']; ?></td></tr>
<tr><td colspan="4"><strong>Nombre Contrato : </strong><?php echo $rowusr['Nombre_contrato']; ?></td></tr>
<tr><td colspan="2"><strong>F. Inicio Contrato : </strong><?php echo Fecha_mes_año($rowusr['Fecha_ini_con']); ?></td>
	<td colspan="2"><strong>F. Termino Contrato : </strong><?php echo Fecha_mes_año($rowusr['Fecha_term_con']); ?></td></tr>
<tr><td colspan="2"><strong>Duracion Contrato : </strong><?php echo $rowusr['duracion_contrato'].' meses'; ?></td>
	<td colspan="2"></td></tr>
</tbody>  
</table>
</div>
</article>
<div class="bar-bottom">
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div>
</div>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { ?>
<div>  
<div class="fleft"><h1>Crear Nueva Empresa</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div> 
</div>

<table class="tableform">         
<form  method="post"> 
<tr>
	<td><label>Razon social</label></td>
    <td><input type="text" name="nombre"  placeholder="Razon social de la empresa" required=""/><?php echo $errors[1] ?></td>
    <td><label>Abreviatura</label></td>
    <td><input type="text" name="abreviatura"  placeholder="Abreviatura de la empresa" required=""/><?php echo $errors[2] ?></td>
</tr>
<tr>
	<td><label>Correo</label></td>
    <td colspan="3"><input type="text" name="email"  placeholder="Correo electronico" required=""/><?php echo $errors[3] ?></td>
</tr>
<tr>
	<td colspan="3"></td>
	<td><div class="fright"> <input name="submit" type="submit"  value="Registrar &raquo;" /> </div></td>
</tr>
</form>
</table>
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
// SE TRAE UN LISTADO DE TODAS LAS EMPRESAS
$arrUsers = array();
$query = "SELECT idEmpresa, Nombre, Abreviatura, email FROM `empresas_listado`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<div>  
<div class="fleft"><h1>Listado de Empresas</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new='true'" ><input name="" type="button" value="Crear Empresa &raquo;" /></a></div>
<div class="clear"></div> 
</div> 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre de la Empresa</th> 
   <th>Abreviatura</th>
   <th>Correo electronico</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrUsers as $usuarios) { ?>
  <tr> 
   <td><?php echo $usuarios['Nombre']; ?></td>
   <td><?php echo $usuarios['Abreviatura']; ?></td> 
   <td><?php echo $usuarios['email']; ?></td> 
   <td>
    <a href="<?php echo $location; ?>?view=<?php echo $usuarios['idEmpresa']; ?>"><input type="image" src="img/icn_categories.png" title="Ver"></a>
    <a href="<?php echo $location; ?>?id=<?php echo $usuarios['idEmpresa']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a> 
    <?php $ubicacion=$location.'?del='.$usuarios['idEmpresa'];?>
   <a onclick="msg('<?php echo $ubicacion ?>')" ><input type="image" src="img/icn_trash.png" title="Borrar"></a>
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