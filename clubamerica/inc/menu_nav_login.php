<header>
    <div class="cont_logo_redes">
        <div class="logo_ca">
            <h1>
                <a href="home.php"><img title="Club America" src="img/logo_ca.png"/> </a>
            </h1>
        </div>
        <ul>
            <li class="fb_ca"><a href=""></a></li>
            <li class="tw_ca"><a href=""></a></li>
            <li class="gplus_ca"><a href=""></a></li>
        </ul>
    </div>                   
    <nav>
        <ul>
            <li <?php if ($nombre_programa=='index'){ echo ' class="active"';}?>>	                <a href="index.php">INICIO</a></li>
            <li <?php if ($nombre_programa=='casting_virtual_inicio'){ echo ' class="active"';}?>>	<a href="casting_virtual_inicio.php">VIDEO CASTING</a></li>
            <li <?php if ($nombre_programa=='chat_page_videochat'){ echo ' class="active"';}?>>     <a href="chat_page_videochat.php">VIDEO CHAT</a></li>
            <li <?php if ($nombre_programa=='nombrepagina'){ echo ' class="active"';}?>>            <a href="">PARTICIPA</a></li>
            <li <?php if ($nombre_programa=='nombrepagina'){ echo ' class="active"';}?>>            <a href="">M&Uacute;SICA</a></li>
            <li <?php if ($nombre_programa=='saludos'){ echo ' class="active"';}?>>                 <a href="saludos.php">SALUDOS VIRTUALES</a></li>
        </ul>
        <h4 class="log_on">
        <?php if(isset($_COOKIE['sess_demo'])){ ?>
            <p>Bienvenido <strong><?php echo $_COOKIE['sess_demo_name']; ?></strong></p>
            <p><a class="config" href="http://peruid.pe/perfil/9702824bf1059d44f8a879e070b5b57c">Configura tu perfil</a> 
            <a class="cerrar" href="registro_inicio_sesion.php?logout=true" class="cerrar">Cerrar Sesi&oacute;n</a>
            </p>
        <?php }else{ ?>
            <a class="cerrar" href="registro_inicio_sesion.php?contacto=<?php echo $nombre_programa?>" class="cerrar">Iniciar Sesi&oacute;n</a>
        <?php } ?>
        </h4>
    </nav>
</header>