
<ul id="menu" class="">

    <li class="nav-header">Menu</li>
    <li class="nav-divider"></li>
    <?php 
    //variables para identificar la categoria activa
    $menu_class2='';
    $menu_class3='';
	if(isset($rowlevel['nombre_categoria'])&&$rowlevel['nombre_categoria']=='Principal'){ 
		$menu_class2='class="active"';
	}elseif(isset($rowlevel['nombre_categoria'])&&$rowlevel['nombre_categoria']=='Mis Datos'){
		$menu_class3='class="active"';
	} ?>
    <li class="">
        <a href="principal.php" <?php echo $menu_class2; ?>>
        	<i class="fa fa-dashboard"></i><span class="link-title"> Principal</span> 
        </a> 
    </li>
    <li class="">
        <a href="principal_datos_perfil.php" <?php echo $menu_class3; ?>>
        	<i class="fa fa-dashboard"></i><span class="link-title"> Mis Datos</span> 
        </a> 
    </li>
    
<?php 
//arreglo con la categoria
foreach($rowmenu as $menu=>$productos) {
	echo '<li class="">';
	if($menu==$rowlevel['nombre_categoria']){ $menu_class='class="active"';}else{$menu_class='';}
		echo '<a href="javascript:;" '.$menu_class.'>
				<i class="'.$productos[0]['IconoCategoria'].'"></i>
				<span class="link-title"> '.$menu.'</span>
				<span class="fa fa-angle-right fright margin_width"></span>
			 </a>
			 <ul>';
			
			// arreglo con las transacciones
			foreach($productos as $producto) {
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
			<li><a href="core_datos.php">                   <i class="fa fa-cogs"></i> Datos de Soporte</a></li>
			<li><a href="core_permisos_cat.php?pagina=1">   <i class="fa fa-cogs"></i> Permisos - Categorias</a></li>
			<li><a href="core_permisos.php?pagina=1">       <i class="fa fa-cogs"></i> Permisos - Listado</a></li>
			<li><a href="core_usr_admin.php?pagina=1">      <i class="fa fa-cogs"></i> Listado de Administradores</a></li>
		</ul>
	</li>
<?php }?>                             
</ul>
