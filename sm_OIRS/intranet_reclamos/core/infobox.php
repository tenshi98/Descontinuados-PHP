<?php 
//Se consulta por la totalidad de OIRS pendientes
$query = "SELECT 
oirs_listado.Estado 
FROM oirs_listado 
INNER JOIN mnt_oirs_departamentos ON mnt_oirs_departamentos.idDepto = oirs_listado.idDepto
WHERE oirs_listado.Estado='5' AND mnt_oirs_departamentos.idUsuario='".$arrUsuario['idUsuario']."'"; 
$resultado = mysql_query ($query, $dbConn);		
$n_estado = mysql_num_rows($resultado);
// Variable para almacenar cantidad de cosas pendientes
$cosas_pendientes = 0;
?>
<div class="container_box">
      <ul>
        <li class="active"><a href="#">Actividades</a></li>
        <!--<li><a href="#">Otros<span class="badge">4</span></a></li>-->
        <!--<li><a href="#">Mensajes<span class="badge green">8</span></a></li>-->
        
        <li><a href="ingresos_datos.php?pagina=1&estado=true">OIRS Pendientes<span class="badge yellow"><?php echo $n_estado; ?></span></a></li>
        <?php $cosas_pendientes = $cosas_pendientes+$n_estado;?>
        
        
        <?php //////////////////////////////////////////////////////////////
		
		//Se verifica si el usuario tiene permisos para ver las solicitudes
		$query = "SELECT usuarios_permisos.level 
		FROM usuarios_permisos
		INNER JOIN  core_permisos ON core_permisos.idAdmpm = usuarios_permisos.idAdmpm
		WHERE core_permisos.Direccionbase ='ingresos_solicitudes.php' AND core_permisos.mode='".neomode."' AND usuarios_permisos.idUsuario='".$arrUsuario['idUsuario']."' "; 
		$resultado = mysql_query ($query, $dbConn);		
		$n_permisos = mysql_num_rows($resultado);
		
		//Solo si tiene los permisos muestra los enlaces
		if($n_permisos > 0) {
			$query = "SELECT Estado FROM solicitud_listado WHERE Estado='7'"; 
			$resultado = mysql_query ($query, $dbConn);		
			$n_sol = mysql_num_rows($resultado);
			//Se consulta por la totalidad de solicitudes sin leer
			$query = "SELECT Estado FROM solicitud_listado WHERE Estado='8'"; 
			$resultado = mysql_query ($query, $dbConn);		
			$n_ex1 = mysql_num_rows($resultado);
			//Se consulta por la totalidad de solicitudes con OIRS
			$query = "SELECT idSolicitud FROM oirs_listado WHERE idSolicitud<>'0'"; 
			$resultado = mysql_query ($query, $dbConn);		
			$n_ex2 = mysql_num_rows($resultado);	
			//Solicitudes reales sin leer con generacion de OIRS
			$n_sol2=($n_sol+$n_ex1)-$n_ex2;	
			//Sumo las cosas pendientes
			$cosas_pendientes = $cosas_pendientes+$n_sol+$n_sol2;
			 ?>
        <li><a href="ingresos_solicitudes.php?pagina=1&estado=true">Solicitudes sin leer<span class="badge red"><?php echo $n_sol; ?></span></a></li>
        <li><a href="ingresos_solicitudes.php?pagina=1&filter=true">Solicitudes sin OIRS<span class="badge red"><?php echo $n_sol2; ?></span></a></li>	
        <?php }?>
        
        <li><a href="#"                      title="Pantalla Completa"  class="info-tooltip_bottom" id="toggleFullScreen"><i class="glyphicon glyphicon-fullscreen"></i></a></li>
        <li><a href="#"                      title="Ocultar Menu"       class="info-tooltip_bottom toggle-left"><i class="fa fa-bars"></i></a></li>
        <li><a href="index.php?salir=true"   title="Cerrar sesion"      class="info-tooltip_bottom"><i class="fa fa-power-off"></i></a></li>
      </ul>
  </div>