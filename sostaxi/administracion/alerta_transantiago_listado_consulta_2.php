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
//Cargamos la ubicacion 
$original = "alerta_transantiago_listado.php";
$location = $original;
/**********************************************************************************************************************************/
/*                                       Se traen los datos que nos interesan                                                     */
/**********************************************************************************************************************************/
//Le agrego condiciones a la consulta
$z =" AND clientes_listado.idTipoCliente=3";	
//Otros filtros
$z .=" AND clientes_listado.PPU!=''";
$z .= " AND alertas_listado.Longitud !='' AND alertas_listado.Longitud !=0" ;
$z .= " AND alertas_listado.Latitud !='' AND alertas_listado.Latitud !=0" ;
// Se trae un listado con todos los usuarios
$arrAlarmas = array();
$query = "SELECT 
alertas_listado.idAlerta,
clientes_listado.PPU,
transantiago_conductores.Nombre AS Cond_Nombre,
transantiago_conductores.Apellido_Paterno AS Cond_ApellidoPat,
alertas_listado.Fecha,
alertas_listado.Hora,
alertas_tipos.Nombre AS tipo_alerta
FROM `alertas_listado`
LEFT JOIN clientes_listado             ON clientes_listado.idCliente              = alertas_listado.idCliente
LEFT JOIN alertas_tipos                ON alertas_tipos.idTipoAlerta              = alertas_listado.idTipoAlerta
LEFT JOIN `transantiago_conductores`   ON transantiago_conductores.idConductor    = alertas_listado.idConductor
WHERE alertas_listado.vista='0' AND desplegar='1' ".$z."
ORDER BY alertas_listado.idAlerta DESC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAlarmas,$row );
}
?>

    <div class="col-lg-12 fcenter" >
    <object type="application/x-shockwave-flash" data="lib_dewplayer/dewplayer.swf" width="200" height="20" id="dewplayer" name="dewplayer">
    <param name="movie" value="lib_dewplayer/dewplayer.swf" />
    <param name="flashvars" value="mp3=lib_dewplayer/mp3/test1.mp3&autoreplay=1&autoplay=1" />
    <param name="wmode" value="transparent" />
    </object>
    </div>                    
                                
<div class="col-lg-12" >
	<div class="box">	
		<header>		
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Alertas</h5>	
		</header>
			
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
			<thead>
				<tr role="row">
					<th width="190">Fecha</th>
					<th>Nombre</th>
					<th>Tipo de alerta</th>
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
						<a href="<?php echo $location.'&view='.$alarmas['idAlerta']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>
						<a href="<?php echo $location.'&id='.$alarmas['idAlerta']; ?>" title="Silenciar Alerta" class="icon-borrar info-tooltip"></a>	
					</td>	
				</tr>
			<?php } ?>                    
			</tbody>
		</table> 
	</div>
</div>
