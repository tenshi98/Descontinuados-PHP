<!-- MENU DESPLEGABLE-->
<?php
$home = "gracias_cel_01.php";
$activar = "activar.php";
$eliminar = "eliminar.php";
$desactivarforos = "desactivarforos.php";
$buscar = "menuseguir.php";
$crear = "creargrupo.php";
$siguesa = "siguesa.php";
$foros = "migrupo.php";
$notificacion_grupo = "comunicaciones_grupo.php";
$encactivas="porvencer.php";
$enccerradas="cerradas.php";
$activarforos="activarforos.php";
$opinion="opinion.php";
?>
<link rel="stylesheet" href="menu/style.css" type="text/css" />
<style type="text/css">._css3m{display:none}</style>


<ul id="css3menu1">
<input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>	


<li>
<a href="<?php echo $home.'?imei='.$_GET['imei'] ?>" style="height:16px;line-height:16px;"><img src="menu/home.png" width="16px" alt=""/></a>
</li>


<li >
<a href="<?php echo $notificacion_grupo.'?imei='.$_GET['imei'] ?>" style="height:16px;line-height:16px;"><img src="menu/notificacion.png" width="16px" alt=""/></a>
</li>

<li>
	<a href="#" style="height:16px;line-height:16px;"><img src="menu/consulta.png" width="16px" alt=""/></a>
		<ul>
		<li><a href="<?php echo $encactivas.'?imei='.$_GET['imei'] ?>">Consultas S/responder</a></li>
		<li><a href="<?php echo $enccerradas.'?imei='.$_GET['imei'] ?>">Consultas Respondidas</a></li>
		<li><a href="<?php echo $opinion.'?imei='.$_GET['imei'] ?>">Envianos tu Opinion</a></li>
		</ul>
</li>

<li>
<a href="<?php echo $foros.'?imei='.$_GET['imei'] ?>" style="height:16px;line-height:16px;"><span><img src="menu/temas.png" width="16px" alt=""/></span></a>
</li>

<li>
	<a href="#" style="height:16px;line-height:16px;"><img src="menu/herramientas.png" width="16px" alt=""/></a>
		<ul>
		<li><a href="<?php echo $activarforos.'?imei='.$_GET['imei'] ?>">Activar Comentarios</a></li>
		<li><a href="<?php echo $activar.'?imei='.$_GET['imei'] ?>">Activar Seguidores</a></li>
		<li><a href="<?php echo $eliminar.'?imei='.$_GET['imei'] ?>">Eliminar Seguidores</a></li>
		<li><a href="<?php echo $desactivarforos.'?imei='.$_GET['imei'] ?>">Desactivar Foros</a></li>
		<li><a href="<?php echo $crear.'?imei='.$_GET['imei'] ?>">Crear Grupo</a></li>
		<li><a href="<?php echo $buscar.'?imei='.$_GET['imei'] ?>">Seguir a ...</a></li>
		<li><a href="<?php echo $siguesa.'?imei='.$_GET['imei'] ?>">Tu sigues a ...</a></li>
		</ul>
</li>

</ul>
<!-- MENU DESPLEGABLE-->