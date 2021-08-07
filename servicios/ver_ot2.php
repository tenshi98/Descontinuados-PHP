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
$location = "ver_ot.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Ver OT</title>
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
<div class="title"><p>Ver OT</p></div>
<div class="content"> 
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
// SE TRAEN LOS DATOS DE SOLO UNA LINEA	
$query = "SELECT 
empresas_ot_listado.idOt,
empresas_ot_listado.f_Inicio,
empresas_item_cat.Nombre_cat AS nombre_cat,
empresas_item_cat.Nombre_Sub AS nombre_Sub,
empresas_item_list.Nombre AS nombre_trabajo,
empresas_item_list.idItemlist AS id_trabajo,
empresas_item_list.unidad AS unidad,
empresas_ot_listado.n_Doc,
(SELECT COUNT(idSublist) FROM empresas_item_sublist WHERE idItemlist = id_trabajo ) AS count_tareas,
empresas_ot_listado.h_Inicio,
empresas_ot_listado.h_Termino,
empresas_niveles_nombres.Nombre AS nombre_ubicacion,
detalle_general.Nombre AS Estado
FROM `empresas_ot_listado`
LEFT JOIN `empresas_item_list`         ON empresas_item_list.idItemlist         = empresas_ot_listado.idItemlist
LEFT JOIN `empresas_item_cat`          ON empresas_item_cat.idItemcat           = empresas_item_list.idItemcat
LEFT JOIN `empresas_niveles_nombres`   ON empresas_niveles_nombres.idNombre     = empresas_ot_listado.idUbicacion
LEFT JOIN `detalle_general`            ON detalle_general.id_Detalle            = empresas_ot_listado.Estado
WHERE empresas_ot_listado.idOt = {$_GET['idot']}  ";
$resultado = mysql_query ($query, $dbConn);
$rowpunto = mysql_fetch_assoc ($resultado); 
//obtengo el listado de los empleados asignados a una ot
$arrResponsables = array();
$query = "SELECT 
empresas_ot_resp.idResp,
empresas_ot_resp.idTrabajador,
trabajadores_listado.Nombre AS nombre_resp,
trabajadores_listado.Cargo AS cargo_resp
FROM `empresas_ot_resp`
LEFT JOIN `trabajadores_listado`  ON trabajadores_listado.idTrabajador   = empresas_ot_resp.idTrabajador
WHERE empresas_ot_resp.idOt = {$_GET['idot']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrResponsables,$row );
}
//obtengo el listado de los comentarios asignados a una ot
$arrComentarios = array();
$query = "SELECT Texto
FROM `empresas_ot_comment`
WHERE idOt = {$_GET['idot']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrComentarios,$row );
}
?>
<div>  
<div class="fleft"><h1>Visualizar Orden de Trabajo</h1></div>
<div class="clear"></div></div>	 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th width="200">Datos</th>
   <th>Detalles</th>
  </tr> 
 </thead>
 <tbody> 
  

  <tr><td colspan="2" style="background-color: #EEE;">Datos Basicos</td></tr>
  <tr> 
   <td>N° OT</td>
   <td><?php echo n_doc($rowpunto['idOt']); ?></td>
  </tr>
  <tr> 
   <td>Estado</td>
   <td><?php echo $rowpunto['Estado']; ?></td>
  </tr>
   <tr> 
   <td>N° Doc</td>
   <td><?php echo n_doc($rowpunto['n_Doc']); ?></td>
  </tr>
  <tr> 
   <td>Fecha</td>
   <td><?php echo Fecha_estandar($rowpunto['f_Inicio']); ?></td>
  </tr>
  <tr> 
   <td>Trabajo</td>
   <td><?php echo $rowpunto['nombre_cat'].' - '.$rowpunto['nombre_Sub'].' - '.$rowpunto['nombre_trabajo']; ?></td>
  </tr>
  <tr> 
   <td>Ubicacion del Trabajo</td>
   <td><?php echo $rowpunto['nombre_ubicacion']; ?></td>
  </tr>
 
  
  <tr><td colspan="2" style="background-color: #EEE;">Encargados</td></tr>
  <?php foreach ($arrResponsables as $responsable) { ?>
  <tr>
   <td><?php echo $responsable['cargo_resp']; ?></td> 
   <td><?php echo $responsable['nombre_resp']; ?></td>
 </tr> 
 <?php } ?> 
 
 
  <tr><td colspan="2" style="background-color: #EEE;">Comentarios</td></tr>
  <?php foreach ($arrComentarios as $comentarios) { ?>
  <tr> 
   <td colspan="2"><?php echo $comentarios['Texto']; ?></td> 
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