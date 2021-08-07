<div id="menu" class="menu opacity">
    <ul>
    <?php if ( empty($arrCliente['Rut']) ) { ?>
		  <li><a href="index.php">Crear Solicitud</a></li>
          <li><a href="consultar.php">Consultar Solicitud</a></li>
          <li><a href="ingresar.php">Ingresar</a></li>
          <li><a href="registrarse.php">Registrarse</a></li>
	<?php } else {?>
    	  <li><a href="principal.php">Principal</a></li>
          <li><a href="modificar.php">Modificar mis datos</a></li>
          <li><a href="password.php">Cambiar contraseña</a></li>
          <li><a href="ingresar.php?salir=true">Salir</a></li>    
    <?php }?>      
    </ul>
    <br style="clear: left" />
</div>