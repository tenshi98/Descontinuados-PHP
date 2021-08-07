<?php
//Se verifica si es un superusuario
if($arrUsuario['tipo']=='SuperAdmin'){
	//se traen todos los permisos existentes
	$query = "SELECT 
	core_permisos_cat.Nombre AS Tipo, 
	core_permisos.Direccionweb, 
	core_permisos.Nombre,
	IconoCat.Codigo AS IconoCategoria
	
	FROM core_permisos 
	INNER JOIN core_permisos_cat          ON core_permisos_cat.id_pmcat     = core_permisos.id_pmcat 
	LEFT JOIN `font_awesome`   IconoCat   ON IconoCat.idFont                = core_permisos_cat.idFont
	ORDER BY Tipo, Nombre ASC";
}else{
	//se traen todos los permisos asignados al usuario
	$query = "SELECT 
	core_permisos_cat.Nombre AS Tipo, 
	core_permisos.Direccionweb, 
	core_permisos.Nombre,
	IconoCat.Codigo AS IconoCategoria
	
	FROM usuarios_permisos 
	INNER JOIN core_permisos              ON core_permisos.idAdmpm            = usuarios_permisos.idAdmpm
	INNER JOIN core_permisos_cat          ON core_permisos_cat.id_pmcat       = core_permisos.id_pmcat 
	LEFT JOIN `font_awesome`   IconoCat   ON IconoCat.idFont                  = core_permisos_cat.idFont
	WHERE usuarios_permisos.idUsuario = ".$arrUsuario['idUsuario']."
	ORDER BY Tipo, Nombre ASC";
}
//Se traen los permisos 
$resultado = mysql_query ($query, $dbConn);
while ( $rowmenu[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($rowmenu);?>


<ul class="nav navbar-nav">
	<li><a href="principal.php">Principal</a></li>
	<li><a href="datos.php">Mis Datos</a></li>

<?php 
//llamamos a la función para filtrar los datos
filtrar($rowmenu, 'Tipo');
//recorremos el array para imprimirlo con formato HTML
foreach($rowmenu as $menu=>$productos) {
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
			<li><a href="core_sistemas.php?pagina=1">Sistemas</a></li>
			<li><a href="core_sistemas_rubro.php?pagina=1">Rubros</a></li>
			<li><a href="core_datos.php">Datos de Soporte</a></li>
			<li><a href="core_permisos_cat.php?pagina=1">Permisos - Categorias</a></li>
			<li><a href="core_permisos.php?pagina=1">Permisos - Listado</a></li>
			<li><a href="core_usr_admin.php?pagina=1">Listado de Administradores</a></li>
		</ul>
	</li>
<?php }?>                              
</ul>
              
