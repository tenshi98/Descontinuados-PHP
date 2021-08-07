<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
/**********************************************************************************************************************************/
/*                                       Se traen los datos que nos interesan                                                     */
/**********************************************************************************************************************************/
$fecha_actual=fecha_actual();
// Se trae un listado con todas las alertas
$arrAlarmas = array();
$query = "SELECT 
clientes_listado.PPU,
transantiago_conductores.Nombre AS Cond_Nombre,
transantiago_conductores.Apellido_Paterno AS Cond_ApellidoPat,
alertas_listado.idAlerta,
alertas_listado.Fecha,
alertas_listado.Hora,
alertas_tipos.Nombre AS tipo_alerta
FROM `alertas_listado`
LEFT JOIN clientes_listado             ON clientes_listado.idCliente              = alertas_listado.idCliente
LEFT JOIN alertas_tipos                ON alertas_tipos.idTipoAlerta              = alertas_listado.idTipoAlerta
LEFT JOIN `transantiago_conductores`   ON transantiago_conductores.idConductor    = alertas_listado.idConductor
WHERE alertas_listado.Fecha = '{$fecha_actual}' AND alertas_listado.vista=1
ORDER BY alertas_listado.idAlerta DESC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAlarmas,$row );
}

?>

<div class="col-lg-12">
	<div class="box">	
		<header>		
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Alarmas</h5>	
		</header>
			
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
			<thead>
				<tr role="row">
					<th width="190">Fecha</th>
					<th>Nombre</th>
					<th>Tipo de Alerta</th>

					
					<th width="120">Acciones</th>
				</tr>
			</thead>                     
			<tbody role="alert" aria-live="polite" aria-relevant="all">
			<?php foreach ($arrAlarmas as $alarmas) { ?>
				<tr class="odd">		
					<td><?php echo $alarmas['Fecha'].' - '.$alarmas['Hora']; ?></td>
					<td><?php echo '(Patente '.$alarmas['PPU'].') '.$alarmas['Cond_Nombre'].' '.$alarmas['Cond_ApellidoPat']; ?></td>
					<td><?php echo $alarmas['tipo_alerta']; ?></td>		
					<td>
						<?php echo fancyBox(900, 640,'transantiago_control_flota_view_alert.php?view='.$alarmas['idAlerta'].'','') ?>
					</td>	
				</tr>
			<?php } ?>                    
			</tbody>
		</table> 
	</div>      
</div>

   
