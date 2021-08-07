<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
  
          <a class="navbar-brand" href="#">Administracion</a>
        </div>
        <div id="navbar" class="navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if($location == "principal.php".$w){echo 'class="active"';}?>><a href="principal.php<?php echo $w ?>">Principal</a></li>
            <li <?php if($location == "usr_datos.php".$w){echo 'class="active"';}?>><a href="usr_datos.php<?php echo $w ?>">Mis Datos</a></li>
			<li <?php if($location == "usr_datos.php".$w){echo 'class="active"';}?>><a href="#">Notificaciones</a>
				<ul>
					<li><a href="notificaciones_listado.php<?php echo $w ?>">Notificaciones Recibidas</a></li>
					<li><a href="alertas_generadas.php<?php echo $w ?>">Alertas generadas</a></li>  
					<li><a href="alertas_robos.php<?php echo $w ?>">Alertas de Robo generados</a></li>
                    <li><a href="solicitud_taxi.php<?php echo $w ?>">Solicitudes de taxi</a></li>
				</ul>
			</li>
  
  
            
          </ul>
 
        </div><!--/.nav-collapse -->
	</div>
</nav>