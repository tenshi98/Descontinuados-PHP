<?php 
$query = "SELECT 
detalle_general.Nombre AS Tipo, 
admin_permisos.Direccionweb, 
admin_permisos.Nombre
FROM usuarios_permisos 
INNER JOIN admin_permisos   ON admin_permisos.idAdmin_permisos   = usuarios_permisos.idAdmin_permisos
INNER JOIN detalle_general  ON detalle_general.id_Detalle        = admin_permisos.Tipo 
WHERE usuarios_permisos.idUsuario = ".$arrUsuario['idUsuario']."
ORDER BY Tipo, Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($row);

filtrar($row, 'Tipo');
?>
<div id="wrapper">
	<ul class="menu">
    	<li><a href="#">Principal</a>
        <ul>
        	<li><a href="principal.php">Pagina Principal</a></li>
            <li><a href="principal_datos.php">Cambio de Datos Personales</a></li>
            <li><a href="admin_perfiles_cambioclave.php">Cambio de Clave</a></li>
            <li><a href="usuario_accesos.php">Gestion Accesos</a></li>
        </ul></li>
        
        <?php foreach($row as $tipo=>$titulos) {?>
		<li><a href="#"><?php echo $tipo ?></a>
			<ul>
            <?php foreach($titulos as $contenido) {?>
				<li><a href="<?php echo $contenido['Direccionweb'] ?>"><?php echo $contenido['Nombre'] ?></a></li>
            <?php }?>    
			</ul>
		</li>
        <?php }?>	
	</ul>
</div>

<!--initiate accordion-->
<script type="text/javascript">
	$(function() {
	
	    var menu_ul = $('.menu > li > ul'),
	           menu_a  = $('.menu > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>