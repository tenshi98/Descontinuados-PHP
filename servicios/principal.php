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
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Principal</title>
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
<?php 
//Traigo el listado con los permisos entregados con accesos
$arrAccesos = array();
$query = "SELECT 
detalle_general.Nombre AS Tipo,
admin_permisos.Direccionweb, 
admin_permisos.Nombre AS nombre_permiso
FROM usuarios_accesos 
INNER JOIN admin_permisos   ON admin_permisos.idAdmin_permisos   = usuarios_accesos.idAdmin_permisos
INNER JOIN detalle_general  ON detalle_general.id_Detalle        = admin_permisos.Tipo 
WHERE usuarios_accesos.idUsuario = ".$arrUsuario['idUsuario']."
ORDER BY Tipo, nombre_permiso";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push($arrAccesos,$row );
}
mysql_free_result($resultado);
//obtengo el listado de las ot pendientes
$arrTrabajos = array();
$query = "SELECT 
empresas_ot_listado.idOt,
empresas_listado.idEmpresa,
empresas_ot_listado.f_Inicio,
empresas_item_list.Nombre AS nombre_tarea,
detalle_general.Nombre AS estado,
empresas_listado.Abreviatura AS nombre_empresa
FROM `empresas_ot_listado`
LEFT JOIN `empresas_item_list`         ON empresas_item_list.idItemlist         = empresas_ot_listado.idItemlist
LEFT JOIN `detalle_general`            ON detalle_general.id_Detalle            = empresas_ot_listado.Estado
INNER JOIN `usuarios_empresas`         ON usuarios_empresas.idEmpresa           = empresas_ot_listado.idEmpresa
LEFT JOIN `empresas_listado`           ON empresas_listado.idEmpresa            = empresas_ot_listado.idEmpresa
WHERE empresas_ot_listado.Estado='8' AND  usuarios_empresas.idUsuario = ".$arrUsuario['idUsuario']."
ORDER BY empresas_ot_listado.f_Inicio";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTrabajos,$row );
}

?>        
        
<div class="modulo widht_modulo_full">
<div class="title"><p>Accesos Directos</p></div>
	<div class="content">
<?php foreach ($arrAccesos as $accesos) { ?>    
<div class="content_link">
  <a class="" href="<?php echo $accesos['Direccionweb']; ?>"><span>
  <img src="img/analysis256.png" alt="icon"><br />
  <p><?php echo $accesos['Tipo'].'<br />'.$accesos['nombre_permiso']; ?></p></span> </a>
</div>
<?php } ?>
<div class="clear"></div>        
	</div>
</div>





<div class="modulo widht_modulo_full">
<div class="title"><p>Ordenes de Trabajo Pendientes</p></div>
<div class="content">
    <article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th width="90">N° OT</th>
   <th width="100">Fecha</th>
   <th width="60">Estado</th>
   <th width="120">Empresa</th> 
   <th>Trabajo</th>
   
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrTrabajos as $trabajos) { ?>
  <tr> 
   <td><?php echo n_doc($trabajos['idOt']); ?></td>
   <td><?php echo Fecha_estandar($trabajos['f_Inicio']); ?></td>
   <td><?php echo $trabajos['estado']; ?></td>
   <td><?php echo $trabajos['nombre_empresa']; ?></td>
   <td><?php echo $trabajos['nombre_tarea']; ?></td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>       

</div>
</div>
          
	
		
		
		<!-- InstanceEndEditable --> 
    	</div>
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>