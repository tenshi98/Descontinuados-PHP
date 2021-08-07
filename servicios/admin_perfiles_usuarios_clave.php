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
$errors[5]='';
$errors[6]='';
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
$location = "admin_perfiles_usuarios_clave.php";
//formulario para editar usuario
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_trans/cambio_clave2.php';//creacion de variables
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Usuarios Cambio de Clave</title>
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
<div class="title"><p>Usuarios Cambio de Clave</p></div>
<div class="content">        
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) { ?>
<div>   
<div class="fleft"><h1>Modificación de Clave</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div> 
</div> 

<table class="tableform">
<form action="" method="post">
	<tr>
		<td><label>Clave nueva</label></td>
        <td><input type="password" name="password_nueva"    placeholder="Clave nueva"  required=""/><?php echo $errors[2] ?></td>
        <td><label>Repetir Clave nueva</label></td>
        <td><input  type="password" name="rePassword_nueva" placeholder="Repetir Clave nueva"  required=""/> <?php echo $errors[3] ?></td> 
	</tr>
    
    <tr>
		<input name="idUsuario" type="hidden" value="<?php echo $_GET['id']; ?>" />
		<td colspan="4"><div class="fright"> <input name="submit_edit" type="submit" value="Cambiar Clave &raquo;" /> </div></td>
	</tr>
</form>
</table>
 
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
// SE TRAE UN LISTADO DE TODOS LOS USUARIOS
$arrUsers = array();
$query = "SELECT 
usuarios_listado.idUsuario,
usuarios_listado.usuario,
usuarios_listado.tipo, 
usuarios_listado.Nombre,
detalle_general.Nombre AS estado
FROM `usuarios_listado`
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle   = usuarios_listado.Estado
ORDER BY usuarios_listado.tipo ASC, usuarios_listado.Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>        
		
<div>   
<div class="fleft"><h1>Listado de usuarios</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new='true'" ><input name="" type="button" value="Crear Usuario &raquo;" /></a></div>
<div class="clear"></div> </div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>ID Usuario</th>
   <th>Nombre del usuario</th> 
   <th width="120">Tipo de usuario</th> 
   <th width="120">Estado</th>
   <th width="80">Acciones</th>
  </tr> 
 </thead>
 <tbody> 
  <?php foreach ($arrUsers as $usuarios) { ?>
  <tr> 
   <td><?php echo $usuarios['usuario']; ?></td> 
   <td><?php echo $usuarios['Nombre']; ?></td> 
   <td><?php echo $usuarios['tipo']; ?></td>
   <td><?php echo $usuarios['estado']; ?></td> 
   <td>
    <a href="<?php echo $location; ?>?id=<?php echo $usuarios['idUsuario']; ?>">
    <input type="image" src="img/icn_edit.png" title="Editar"></a>    
 </td> 
 </tr> 
 <?php } ?>	
 </tbody> 
 </table>
</div>
</article>
<div class="clear"></div>
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