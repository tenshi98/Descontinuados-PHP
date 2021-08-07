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
$location = "metro_ot_inf_04.php";
//formulario para agregar comentarios a la ot
if ( !empty($_POST['submit']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_trans/informes_hh.php';//creacion de variables
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Informes Horas Hombre</title>
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
<div class="title"><p>Informe Horas Hombre</p></div>
<div class="content">         
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['idoperador']) ) {
//RECUPERO EL FILTRO DESDE GET
$q = "WHERE empresas_ot_listado.idEmpresa = '{$_GET['emp']}' "; 
//filtro de f_Inicio
if(isset($_GET['f_inicio']) && $_GET['f_inicio'] != '' && isset($_GET['f_termino']) && $_GET['f_termino'] != ''){ 
 $q .= "AND empresas_ot_listado.f_inicio BETWEEN '{$_GET['f_inicio']}' AND '{$_GET['f_termino']}' " ; 
}
// Se trae un listado con el total de las horas de los operadores
$arrListado = array();
$query = "SELECT 
empresas_ot_listado.idOt,
empresas_ot_listado.f_Inicio,
empresas_ot_listado.f_Termino,
empresas_item_list.Nombre,
empresas_ot_listado.t_usado AS tiempo
FROM `empresas_ot_listado`
INNER JOIN `empresas_ot_resp`        ON empresas_ot_resp.idOt               = empresas_ot_listado.idOt
LEFT JOIN `empresas_item_list`       ON empresas_item_list.idItemlist       = empresas_ot_listado.idItemlist
".$q." AND empresas_ot_resp.idTrabajador={$_GET['idoperador']} 
GROUP BY idOt";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrListado,$row );
}
mysql_free_result($resultado);?> 

<div>  
<div class="fleft"><h1>Listado de Trabajos realizados por <?php echo $_GET['resp']; ?></h1></div>
<?php 
   //Filtro para empresa
   $a = '?emp='.$_GET['emp'] ;
   //filtro de f_inicio
   if(isset($_GET['f_inicio']) && $_GET['f_inicio'] != ''){ 
    $a .= '&f_inicio='.$_GET['f_inicio'] ;
   }
   //filtro de f_termino
   if(isset($_GET['f_termino']) && $_GET['f_termino'] != ''){ 
    $a .= '&f_termino='.$_GET['f_termino'] ;
   }
   //filtro de idTrabajador
   if(isset($_GET['idTrabajador']) && $_GET['idTrabajador'] != ''){ 
    $a .= '&idTrabajador='.$_GET['idTrabajador'] ;
   }		
?>   
<div class="fright"><a href="<?php echo $location.''.$a; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th width="80">OT</th>
   <th width="100">F Inicio</th>
   <th width="100">F Termino</th>
   <th>Trabajo</th>
   <th width="80">Tiempo</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php 
 foreach ($arrListado as $listado) { ?>
  <tr> 
   <td><a target="_blank" href="ver_ot2.php?idot=<?php echo $listado['idOt']; ?>"><?php echo n_doc($listado['idOt']); ?></a></td>
   <td><?php echo Fecha_estandar($listado['f_Inicio']); ?></td>
   <td><?php echo Fecha_estandar($listado['f_Termino']); ?></td>
   <td><?php echo $listado['Nombre']; ?></td>
   <td><?php echo Hora_prog($listado['tiempo']); ?></td>
 </tr> 
 <?php } ?>

 </tbody> 
 </table>
</div>
</article>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['emp']) ) {	 
//RECUPERO EL FILTRO DESDE GET
$q = "WHERE empresas_ot_listado.idEmpresa = '{$_GET['emp']}' "; 
//filtro de f_Inicio
if(isset($_GET['f_inicio']) && $_GET['f_inicio'] != '' && isset($_GET['f_termino']) && $_GET['f_termino'] != ''){ 
 $q .= "AND empresas_ot_listado.f_inicio BETWEEN '{$_GET['f_inicio']}' AND '{$_GET['f_termino']}' " ; 
}
//filtro de idTrabajador
if(isset($_GET['idTrabajador']) && $_GET['idTrabajador'] != '' ){ 
 $q .= "AND empresas_ot_resp.idTrabajador = '{$_GET['idTrabajador']}' " ; 
} 
// Se trae un listado con el total de las horas de los operadores
$arrTrabajadores = array();
$query = "SELECT 
trabajadores_listado.Nombre AS nombre_trabajador,
trabajadores_listado.idTrabajador AS idTrabajador,
COUNT(empresas_ot_listado.idOt) AS cuenta,
SEC_TO_TIME( SUM( TIME_TO_SEC( empresas_ot_listado.t_usado ) ) ) AS suma_tiempo
FROM `empresas_ot_listado`
INNER JOIN `empresas_ot_resp`        ON empresas_ot_resp.idOt                 = empresas_ot_listado.idOt
LEFT JOIN `trabajadores_listado`     ON trabajadores_listado.idTrabajador     = empresas_ot_resp.idTrabajador
".$q." 
GROUP BY nombre_trabajador ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTrabajadores,$row );
}
mysql_free_result($resultado); ?>		

<div>  
<div class="fleft"><h1>Listado de Coincidencias</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['emp']; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre Trabajador</th>
   <th width="80">Cant. OT</th>
   <th width="80">H H</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrTrabajadores as $trabajador) { ?>
  <tr> 
   <td><?php echo $trabajador['nombre_trabajador']; ?></td>
   <td><?php echo $trabajador['cuenta']; ?></td>
   <td><?php echo Hora_prog($trabajador['suma_tiempo']); ?></td>
   <td>
   <?php 
   //Filtro para empresa
        $a = '?emp='.$_GET['emp'] ;
		//filtro de f_inicio
		if(isset($_GET['f_inicio']) && $_GET['f_inicio'] != ''){ 
        	$a .= '&f_inicio='.$_GET['f_inicio'] ;
        }
		//filtro de f_termino
		if(isset($_GET['f_termino']) && $_GET['f_termino'] != ''){ 
        	$a .= '&f_termino='.$_GET['f_termino'] ;
        }
		//filtro de idTrabajador
		if(isset($_GET['idTrabajador']) && $_GET['idTrabajador'] != ''){ 
        	$a .= '&idTrabajador='.$_GET['idTrabajador'] ;
        }
		//Se asigna la variable del trabajador
		$a .= '&idoperador='.$trabajador['idTrabajador'] ;
		//Se asigna la variable del trabajador
		$a .= '&resp='.$trabajador['nombre_trabajador'] ;		
		?>
	<a href="<?php echo $location.''.$a; ?>"><input type="image" src="img/icn_categories.png" title="Ver"></a>	   
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>		
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) {
// Se trae un listado con los trabajadores de la empresa
$arrTrabajadores = array();
$query = "SELECT idTrabajador, Nombre
FROM `trabajadores_listado` 
WHERE idEmpresa = {$_GET['view']} AND Estado='6'
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTrabajadores,$row );
}
mysql_free_result($resultado); ?>
<div>  
<div class="fleft"><h1>Filtro de seleccion</h1></div>
<div class="clear"></div></div> 

<table class="tableform">
<form  method="post">
	<tr>
    	<td width="100"><label>Fecha Inicio</label></td>
        <td width="70"><input type="date" name="f_inicio"/></td>
        <td width="120"><label>Fecha Termino</label></td>
        <td width="70"><input type="date" name="f_termino"/></td>
        <td><label>Operador</label></td>
        <td><select name="idTrabajador" >
		<option value="" selected>Seleccione un operador</option>
		<?php foreach ( $arrTrabajadores as $trabajadores ) { ?>
		<option value="<?php echo $trabajadores['idTrabajador']; ?>"><?php echo $trabajadores['Nombre']; ?></option><?php } ?></select></td>
	</tr>
    <tr>
		<td colspan="5"></td>
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['view'] ?>" />
		<td><div class="fright"> <input name="submit" type="submit" value="Buscar &raquo;" /> </div></td>
	</tr>
</form>
</table>
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