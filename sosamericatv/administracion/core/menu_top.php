<?php
//Se traen los permisos 
$query = "SELECT 
core_permisos_cat.Nombre AS Tipo, 
core_permisos.Direccionweb, 
core_permisos.Nombre
FROM usuarios_permisos 
INNER JOIN core_permisos      ON core_permisos.idAdmpm            = usuarios_permisos.idAdmpm
INNER JOIN core_permisos_cat  ON core_permisos_cat.id_pmcat       = core_permisos.id_pmcat 
WHERE usuarios_permisos.idUsuario = ".$arrUsuario['idUsuario']." and core_permisos.mode=1
ORDER BY Tipo, Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($row);?>


<ul class="nav navbar-nav">
	<li><a href="principal.php">Principal</a></li>
	<li><a href="datos.php">Mis Datos</a></li>

<?php 
//llamamos a la función para filtrar los datos
filtrar($row, 'Tipo');
//recorremos el array para imprimirlo con formato HTML
foreach($row as $menu=>$productos) {
	echo '<li class="dropdown">';
	echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$menu.'<b class="caret"></b></a>';
	echo '<ul class="dropdown-menu">';
			
  // recorremos los productos
  foreach($productos as $producto) {
    // imprimimos producto y precio
	echo '<li><a href="'.$producto['Direccionweb'].'">'.$producto['Nombre'].'</a></li>';
  }
echo '</ul>';  
echo '</li>';    
}?> 

<?php if($arrUsuario['tipo']=='SuperAdmin'){?>
	<li class='dropdown '>
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Core<b class="caret"></b></a> 
		<ul class="dropdown-menu">
			<li><a href="core_datos.php">Datos de la empresa</a></li>
			<li><a href="core_permisos_cat.php?pagina=1">Permisos - categorias</a></li>
			<li><a href="core_permisos.php?pagina=1">Permisos - Listado</a></li>
			<li><a href="core_usr_admin.php?pagina=1">Listado de Administradores</a></li>
			<li><a href="core_usr_permisos.php?pagina=1">Permisos del Administrador</a></li> 
		</ul>
	</li>
<?php }?>                              
</ul>
              