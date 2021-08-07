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
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "principal_datos.php";
//formulario para agregar comentarios a la ot
if ( !empty($_POST['submit']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/usuario_listado.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/usuario_listado_4.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/usuario_listado.php';//se crean los datos
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Cambio Datos Personales</title>
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
<div class="title"><p>Modificacion de datos personales</p></div>
<div class="content">         
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Obtengo todos los datos de solo un usuario 
$query = "SELECT Nombre, email, Fono,Fax,web,Rut,Direccion, Pais, Ciudad, Comuna
FROM `usuarios_listado`
WHERE usuarios_listado.idUsuario = {$arrUsuario['idUsuario']}";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) {?> 
<div>  
<div class="fleft"><h1>Modificar mis datos</h1></div>   
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Nombre Completo</label></td>
        <td colspan="3"><input type="text" name="nombre"    placeholder="Nombre real del usuario" value="<?php echo $rowusr['Nombre']; ?>"  required=""/></td>
	</tr>
    <tr>
    	<td><label>Rut</label></td>
        <?php if ($rowusr['Rut']==0) { ?>
        <td><input type="text" name="rut"       placeholder="Rut" /></td>
        <?php } else { ?>
        <td><input type="text" name="rut"       placeholder="Rut" value="<?php echo $rowusr['Rut']; ?>" /></td>
        <?php } ?>
        
        <td><label>Direccion</label></td>
        <td><input type="text" name="direccion" placeholder="Direccion" value="<?php echo $rowusr['Direccion']; ?>"/></td>
	</tr>
    <tr>
    	<td><label>Pais</label></td>
        <td><input type="text" name="pais"      placeholder="Pais"      value="<?php echo $rowusr['Pais']; ?>" /></td>
        <td><label>Ciudad</label></td>
        <td><input type="text" name="ciudad"    placeholder="Ciudad"    value="<?php echo $rowusr['Ciudad']; ?>"/></td>
	</tr>
    <tr>
    	<td><label>Comuna</label></td>
        <td><input type="text" name="comuna"    placeholder="Comuna"    value="<?php echo $rowusr['Comuna']; ?>" /></td>
        <td><label>Fono</label></td>
        <td><input type="text" name="fono"      placeholder="Telefono de contacto" value="<?php echo $rowusr['Fono']; ?>"/></td>
	</tr>
    <tr>
    	<td><label>Fax</label></td>
        <td><input type="text" name="fax"       placeholder="Fax de contacto" value="<?php echo $rowusr['Fax']; ?>" /></td>
        <td><label>Email</label></td>
        <td><input type="text" name="email"     placeholder="Correo electronico" value="<?php echo $rowusr['email']?>" /></td>
	</tr>
    <tr>
        <td><label>Web</label></td>
        <td><input type="text" name="web"       placeholder="web" value="<?php echo $rowusr['web']; ?>"/></td>
	</tr>
    <tr>
		<td colspan="3"></td>
        <input name="idUsuario" type="hidden" value="<?php echo $arrUsuario['idUsuario']; ?>" />
		<td><div class="fright"> <input name="submit" type="submit" value="Editar &raquo;" /> </div></td>
	</tr>
</form>
</table>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { ?>
<div>  
<div class="fleft"><h1>Detalle de mis datos</h1></div>
<div class="fright"><a href="principal_datos.php?id=mod" ><input name="" type="button" value="Editar Datos &raquo;" /></a></div>
<div class="clear"></div></div> 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th colspan="2">Datos Personales</th> 
  </tr> 
 </thead>
 <tbody> 
<tr> 
   <td colspan="2"><strong>Nombre del usuario : </strong><?php echo $rowusr['Nombre']; ?></td> 
 </tr>
 <tr> 
   <td><strong>Rut : </strong><?php echo $rowusr['Rut']; ?></td> 
   <td><strong>Dirección : </strong><?php echo $rowusr['Direccion']; ?></td>    
 </tr>
 <tr> 
   <td><strong>Pais : </strong><?php echo $rowusr['Pais']; ?></td> 
   <td><strong>Ciudad : </strong><?php echo $rowusr['Ciudad']; ?></td>    
 </tr>
 <tr> 
   <td><strong>Comuna : </strong><?php echo $rowusr['Comuna']; ?></td> 
   <td><strong>Fono : </strong><?php echo $rowusr['Fono']; ?></td>    
 </tr>
 <tr> 
   <td><strong>Fax : </strong><?php echo $rowusr['Fax']; ?></td> 
   <td><strong>Correo electronico : </strong><?php echo $rowusr['email']; ?></td>    
 </tr>
 <tr> 
   <td><strong>Direccion Web :</strong><?php echo $rowusr['web']; ?></td> 
   <td></td>    
 </tr>	 
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