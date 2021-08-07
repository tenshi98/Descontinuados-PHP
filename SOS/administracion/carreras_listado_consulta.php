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
$original = "carreras_listado.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                       Se traen los datos que nos interesan                                                     */
/**********************************************************************************************************************************/
//tomo el numero de la pagina si es que este existe
if(isset($_GET["pagina"])){
	$num_pag = $_GET["pagina"];	
} else {
	$num_pag = 1;	
}
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//resto de variables
if (!$num_pag){
	$comienzo = 0 ;
	$num_pag = 1 ;
} else {
	$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//Le agrego condiciones a la consulta
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="WHERE clientes_listado.idTipoCliente>=0";	
}else{
	$z="WHERE clientes_listado.idTipoCliente={$arrUsuario['idTipoCliente']}";	
}
//Otros filtros
$z .=" AND clientes_listado.Nombre=''";
//Bloque de filtros
$x = '';
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search'] != ''){
	$z .=" AND clientes_listado.PPU LIKE '%{$_GET['search']}%'";
	$x .= "&search=".$_GET['search'] ; 	
}
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  { 
	$z .= " AND clientes_listado.N_Motor LIKE '%{$_GET['N_Motor']}%' " ;
	$x .= "&N_Motor=".$_GET['N_Motor'] ; 
}
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  { 
	$z .= " AND clientes_listado.N_Chasis LIKE '%{$_GET['N_Chasis']}%' " ;
	$x .= "&N_Chasis=".$_GET['N_Chasis'] ; 
}
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$z .= " AND clientes_listado.fFabricacion BETWEEN '{$_GET['fechaInicio']}' AND '{$_GET['fechaTermino']}'" ;
	$x .= "&fechaInicio={$_GET['fechaInicio']}&fechaTermino={$_GET['fechaTermino']}" ;           
}
if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')  { 
	$z .= " AND clientes_listado.idConductor = '".$_GET['idConductor']."'" ;
	$x .= "&idConductor=".$_GET['idConductor'] ; 
}
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  { 
	$z .= " AND clientes_listado.idPropietario = '".$_GET['idPropietario']."'" ;
	$x .= "&idPropietario=".$_GET['idPropietario'] ; 
}
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  { 
	$z .= " AND clientes_listado.idRecorrido = '".$_GET['idRecorrido']."'" ;
	$x .= "&idRecorrido=".$_GET['idRecorrido'] ; 
}
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  { 
	$z .= " AND clientes_listado.idMarca = '".$_GET['idMarca']."'" ;
	$x .= "&idMarca=".$_GET['idMarca'] ; 
}
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  { 
	$z .= " AND clientes_listado.idModelo = '".$_GET['idModelo']."'" ;
	$x .= "&idModelo=".$_GET['idModelo'] ; 
}
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  { 
	$z .= " AND clientes_listado.idTransmision = '".$_GET['idTransmision']."'" ;
	$x .= "&idTransmision=".$_GET['idTransmision'] ; 
}
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  { 
	$z .= " AND clientes_listado.idColorV_1 = '".$_GET['idColorV_1']."'" ;
	$x .= "&idColorV_1=".$_GET['idColorV_1'] ; 
}
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  { 
	$z .= " AND clientes_listado.idColorV_2 = '".$_GET['idColorV_2']."'" ;
	$x .= "&idColorV_2=".$_GET['idColorV_2'] ; 
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idCliente FROM `clientes_listado` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
taxista_recorridos.Nombre AS recorrido,
clientes_listado.PPU,
vehiculos_marcas.Nombre AS Nombre_marca,
vehiculos_modelos.Nombre AS Nombre_modelo,
taxista_propietarios.Nombre AS Nombre_prop,
taxista_propietarios.Apellido_Paterno AS Apellido_prop,
taxista_conductores.Nombre AS Nombre_cond,
taxista_conductores.Apellido_Paterno AS Apellido_cond,
clientes_listado.idCliente,
detalle_general.Nombre AS estado,
clientes_tipos.RazonSocial AS sistema,
estadoCarrera.Nombre AS estado_carrera
FROM `clientes_listado`
LEFT JOIN `taxista_recorridos`                ON taxista_recorridos.idRecorrido       = clientes_listado.idRecorrido
LEFT JOIN `vehiculos_marcas`                  ON vehiculos_marcas.idMarca             = clientes_listado.idMarca
LEFT JOIN `vehiculos_modelos`                 ON vehiculos_modelos.idModelo           = clientes_listado.idModelo
LEFT JOIN `detalle_general`                   ON detalle_general.id_Detalle           = clientes_listado.Estado
LEFT JOIN `clientes_tipos`                    ON clientes_tipos.idTipoCliente         = clientes_listado.idTipoCliente
LEFT JOIN `taxista_propietarios`              ON taxista_propietarios.idPropietario   = clientes_listado.idPropietario
LEFT JOIN `taxista_conductores`               ON taxista_conductores.idConductor      = clientes_listado.idConductor
LEFT JOIN `detalle_general`   estadoCarrera   ON estadoCarrera.id_Detalle             = clientes_listado.EstadoCarrera
".$z."
ORDER BY clientes_listado.Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}
//Filtros
$location .='?pagina='.$_GET['pagina'];
$location .= $x;?>
<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Taxistas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Vehiculo</th>
        <th>Recorrido</th>
        <th>Propietario</th>
        <th>Conductor</th>
        <th>Estado</th>
        <th>Sistema</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td><?php echo $usuarios['PPU'].' '.$usuarios['Nombre_marca'].' '.$usuarios['Nombre_modelo']; ?></td>
            <td><?php echo $usuarios['recorrido']; ?></td>
            <td><?php echo $usuarios['Nombre_prop'].' '.$usuarios['Apellido_prop']; ?></td>
            <td><?php echo $usuarios['Nombre_cond'].' '.$usuarios['Apellido_cond']; ?></td>
			<td><?php echo $usuarios['sistema']; ?></td>
            <td><?php echo $usuarios['estado']; ?></td>
			<td>
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$usuarios['idCliente']; ?>" title="Ver Datos" class="icon-map info-tooltip"></a><?php }?> 
			</td>
		</tr>
    <?php } ?>                     
	</tbody>
</table>
<?php 
if (isset($_GET['search'])) {  $search ='&search='.$_GET['search']; } else { $search='';}
echo paginador_1($total_paginas, $original, $search, $num_pag ) ?>  
</div>
    
