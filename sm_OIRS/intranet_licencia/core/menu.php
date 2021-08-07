<div id='cssmenu'>
<ul>
   <li><a href='principal.php'><span>Home</span></a></li>
   <?php if ($arrUsuario['tipo']=='Administrador'){ ?>
   <li><a href='admin_usuarios.php'><span>Administracion usuarios</span></a></li>
   <?php } ?>
   <li><a href='admin_vecinos.php'><span>Administracion Vecinos</span></a></li>
   <li><a href='index.php?salir=true'><span>Salir</span></a></li>
</ul>
</div>