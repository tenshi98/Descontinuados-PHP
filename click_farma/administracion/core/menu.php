
<ul id="menu" class="">

    <li class="nav-header">Menu</li>
    <li class="nav-divider"></li>
    <li class="">
        <a href="principal.php">
        	<i class="fa fa-dashboard"></i><span class="link-title"> Principal</span> 
        </a> 
    </li>
    <li class="">
        <a href="datos.php">
        	<i class="fa fa-dashboard"></i><span class="link-title"> Mis Datos</span> 
        </a> 
    </li>
    
<?php 
//llamamos a la función para filtrar los datos
//filtrar($row, 'Tipo');
//recorremos el array para imprimirlo con formato HTML
foreach($rowmenu as $menu=>$productos) {
	echo '<li class="">';
	echo '<a href="javascript:;"><i class="'.$productos[0]['IconoCategoria'].'"></i><span class="link-title"> '.$menu.'</span>';
	echo '<span class="fa fa-angle-right fright margin_width"></span>';
	echo '</a>';
	echo '<ul>';
			
  // recorremos los productos
  foreach($productos as $producto) {
    // imprimimos producto y precio
	echo '<li class=""><a href="'.$producto['Direccionweb'].'"><i class="'.$producto['IconoCategoria'].'"></i> '.$producto['Nombre'].'</a> </li>';
  }
echo '</ul>';  
echo '</li>';    
}?>  
    
<?php if($arrUsuario['tipo']=='SuperAdmin'){?>
          
	<li class="">
		<a href="javascript:;">
			<i class="fa fa-cogs"></i><span class="link-title"> Core</span> 
			<span class="fa fa-angle-right fright margin_width"></span> 
		</a>  
		<ul>
			<li><a href="core_sistemas.php?pagina=1">       <i class="fa fa-cogs"></i> Sistemas</a></li>
			<li><a href="core_sistemas_rubro.php?pagina=1"> <i class="fa fa-cogs"></i> Rubros</a></li>
			<li><a href="core_datos.php">                   <i class="fa fa-cogs"></i> Datos de Soporte</a></li>
			<li><a href="core_permisos_cat.php?pagina=1">   <i class="fa fa-cogs"></i> Permisos - Categorias</a></li>
			<li><a href="core_permisos.php?pagina=1">       <i class="fa fa-cogs"></i> Permisos - Listado</a></li>
			<li><a href="core_usr_admin.php?pagina=1">      <i class="fa fa-cogs"></i> Listado de Administradores</a></li>
		</ul>
	</li>
<?php }?>                             
</ul>
