
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
foreach($row as $menu=>$productos) {
	echo '<li class="">';
	echo '<a href="javascript:;"><i class="fa fa-tasks"></i><span class="link-title"> '.$menu.'</span>';
	echo '<span class="fa fa-angle-right fright margin_width"></span>';
	echo '</a>';
	echo '<ul>';
			
  // recorremos los productos
  foreach($productos as $producto) {
    // imprimimos producto y precio
	echo '<li class=""><a href="'.$producto['Direccionweb'].'"><i class="fa fa-credit-card"></i> '.$producto['Nombre'].'</a> </li>';
  }
echo '</ul>';  
echo '</li>';    
}?>  
    
<?php if($arrUsuario['tipo']=='SuperAdmin'){?>
          
	<li class="">
		<a href="javascript:;">
			<i class="fa fa-tasks"></i><span class="link-title"> Core</span> 
			<span class="fa fa-angle-right fright margin_width"></span> 
		</a>  
		<ul>
			<li class=""><a href="core_datos.php">                   <i class="fa fa-credit-card"></i> Datos de la empresa</a></li>
			<li class=""><a href="core_permisos_cat.php?pagina=1">   <i class="fa fa-credit-card"></i> Permisos - categorias</a></li>
			<li class=""><a href="core_permisos.php?pagina=1">       <i class="fa fa-credit-card"></i> Permisos - Listado</a></li>
			<li class=""><a href="core_usr_admin.php?pagina=1">      <i class="fa fa-credit-card"></i> Listado de Administradores</a></li>
			<li class=""><a href="core_usr_permisos.php?pagina=1">   <i class="fa fa-credit-card"></i> Permisos del Administrador</a></li>
		</ul>
	</li>
<?php }?>                             
</ul>