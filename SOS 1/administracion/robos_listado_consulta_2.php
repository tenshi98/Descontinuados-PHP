<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
//Cargamos la ubicacion 
$original = "robos_listado.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                       Se traen los datos que nos interesan                                                     */
/**********************************************************************************************************************************/
// Se trae un listado con todos los usuarios
$arrAlarmas = array();
$query = "SELECT 
robos_listado.idRobo,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
clientes_listado.Apellido_Materno,
robos_listado.Fecha,
robos_listado.Hora,
clientes_vehiculos.PPU,
vehiculos_marcas.Nombre AS nombre_marca,
vehiculos_modelos.Nombre AS nombre_modelo
FROM `robos_listado`
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = robos_listado.idCliente
LEFT JOIN clientes_vehiculos  ON clientes_vehiculos.idVehiculo  = robos_listado.idVehiculo
LEFT JOIN vehiculos_marcas    ON vehiculos_marcas.idMarca       = clientes_vehiculos.idMarca
LEFT JOIN vehiculos_modelos   ON vehiculos_modelos.idModelo     = clientes_vehiculos.idModelo
WHERE robos_listado.vista='0' AND desplegar='1'
ORDER BY robos_listado.idRobo DESC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAlarmas,$row );
}
?>

        <div class="col-lg-12 fcenter" >
        <object type="application/x-shockwave-flash" data="flv/dewplayer/dewplayer.swf" width="200" height="20" id="dewplayer" name="dewplayer">
        <param name="movie" value="flv/dewplayer/dewplayer.swf" />
        <param name="flashvars" value="mp3=flv/dewplayer/mp3/test1.mp3&autoreplay=1&autoplay=1" />
        <param name="wmode" value="transparent" />
        </object>
        </div>                                                   
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
            <th>Vehiculo</th>
            <th width="120">Acciones</th>
        </tr>
        </thead>                     
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        <?php foreach ($arrAlarmas as $alarmas) { ?>
            <tr class="odd">
                <td class=" "><?php echo $alarmas['Fecha'].' - '.$alarmas['Hora']; ?></td>
                <td class=" "><?php echo $alarmas['Nombre'].' '.$alarmas['Apellido_Paterno'].' '.$alarmas['Apellido_Materno']; ?></td>
                <td class=" "><?php echo $alarmas['nombre_marca'].' '.$alarmas['nombre_modelo'].' patente '.$alarmas['PPU']; ?></td>
                <td class=" ">
                <?php $location.='?pagina='.$_GET["pagina"]?>
    <?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$alarmas['idRobo']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
    <?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$alarmas['idRobo']; ?>" title="Borrar Alarma" class="icon-borrar info-tooltip"></a><?php } ?>
                </td>
            </tr>
        <?php } ?>                    
        </tbody>
    </table>
      
    </div>
    </div>
