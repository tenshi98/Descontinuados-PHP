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
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
//Cargamos la ubicacion 
$original = "alerta_control_flota.php";
$location = $original;
$location .='?dd=dd';
if(isset($_GET['pagina']) && $_GET['pagina'] != '') {    $location .= "&pagina=".$_GET['pagina'] ; 	}
if(isset($_GET['search']) && $_GET['search'] != '') {    $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['view']) && $_GET['view'] != '') {        $location .= "&view=".$_GET['view'] ; 	}
if(isset($_GET['n']) && $_GET['n'] != '') {              $location .= "&n=".$_GET['n'] ; 	}
/**********************************************************************************************************************************/
/*                                       Se traen los datos que nos interesan                                                     */
/**********************************************************************************************************************************/
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
clientes_listado.idCliente,
transantiago_recorridos.Nombre AS recorrido,
clientes_listado.PPU,
transantiago_conductores.Nombre AS Nombre_cond,
transantiago_conductores.Apellido_Paterno AS Apellido_cond,
detalle_general.Nombre AS estado,
clientes_disponibilidad.Nombre AS disponibilidad,
clientes_listado.Orden,
(SELECT COUNT(idAlerta) FROM alertas_listado WHERE idCliente = clientes_listado.idCliente AND alertas_listado.vista='0' AND alertas_listado.desplegar='1') AS contar,
(SELECT idAlerta FROM alertas_listado WHERE idCliente = clientes_listado.idCliente AND alertas_listado.vista='0' AND alertas_listado.desplegar='1' LIMIT 1) AS alerta
FROM `clientes_listado`
LEFT JOIN `transantiago_recorridos`     ON transantiago_recorridos.idRecorrido           = clientes_listado.idRecorrido
LEFT JOIN `detalle_general`             ON detalle_general.id_Detalle                    = clientes_listado.Estado
LEFT JOIN `transantiago_conductores`    ON transantiago_conductores.idConductor          = clientes_listado.idConductor
LEFT JOIN `clientes_disponibilidad`     ON clientes_disponibilidad.idDisponibilidad      = clientes_listado.idDisponibilidad
WHERE clientes_listado.idRecorrido = {$_GET['view']}
ORDER BY clientes_listado.Orden ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
} 
//Obtengo la ubicacion de la ultima grilla de la pagina
$query = "SELECT  Orden
FROM `clientes_listado`
WHERE idRecorrido = {$_GET['view']}
ORDER BY Orden DESC
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
?>

	<div class="col-lg-6">
		<div class="box">
			<header>
				<div class="icons"><i class="fa fa-table"></i></div><h5>Buses del Recorrido <?php echo $arrUsers[0]['recorrido'];?></h5>
			</header>
			
				 
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
			<thead>
				<tr role="row">
					<th>Orden</th>
					<th>Bus</th>
					<th>Conductor Actual</th>
					<th>Disponibilidad</th>
					<th width="120">Acciones</th>
				</tr>
			</thead>
					   
			<tbody role="alert" aria-live="polite" aria-relevant="all">
			<?php 
			$grill = 1;
			foreach ($arrUsers as $usuarios) { ?>
				<tr class="odd <?php if($usuarios['contar']!=0){echo ' table_red_color';}?>" >
					<td><?php echo $usuarios['Orden']; ?></td>
					<td><?php echo 'Patente '.$usuarios['PPU']; ?></td>
					<td><?php echo $usuarios['Nombre_cond'].' '.$usuarios['Apellido_cond']; ?></td>
					<td><?php echo $usuarios['disponibilidad']; ?></td>
					<td>

					<?php if($grill!=1){?> 			
							<a href="<?php echo $location.'&up_orden='.$usuarios['idCliente'].'&orden='.$usuarios['Orden'] ?>" title="Subir un nivel" class="icon-up info-tooltip"></a>
						<?php } else {?>
							<a href="#" title="Subir un nivel" class="icon-up info-tooltip"></a>
						<?php } ?> 
						<?php if($usuarios['Orden']!=$row_data['Orden']){?>     
							<a href="<?php echo $location.'&down_orden='.$usuarios['idCliente'].'&orden='.$usuarios['Orden'] ?>" title="Bajar un nivel" class="icon-down info-tooltip"></a>
						<?php } else {?>			
							<a href="#" title="Bajar un nivel" class="icon-down info-tooltip"></a>		
						<?php } ?>
						<?php if($usuarios['contar']!=0){?>
							<?php echo fancyBox(900, 640,'transantiago_control_flota_view_alert.php?view='.$usuarios['alerta'].'','actualiza3('.$usuarios['alerta'].')') ?>
						<?php } ?>
					</td>	
						
				</tr>
			<?php
			$grill++;
			} ?>                    
			</tbody>
		</table>
		</div>
	</div>

   
