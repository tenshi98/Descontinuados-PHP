<?php
  $pre_uri = "../demo/";
  //if(strrpos($_SERVER["REQUEST_URI"],"/tools/")>0) $pre_uri = "../demo/";
?>
<html lang="es" class="js"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="NOFOLLOW, NOINDEX">
    <title>Pago efectivo</title>
    <link rel="stylesheet" href="../lib_pagoefectivo/css/estilos.css" type="text/css" />
    <link rel="stylesheet" href="../tools/css/style.css" type="text/css" />
    <script type="text/javascript" src="../lib_pagoefectivo/js/jquery.min.js"></script>
</head>
<body class="page-sidebar">

  <div id="main">

  <div id="content" class="bootstrap">
<!-- MENU -->

<div class="bootstrap">
	<nav id="nav-sidebar" role="navigation">
        <img src="../lib_pagoefectivo/images/logo_pagoefectivo_112x52.jpg" style="padding: 0 0 0 20%" alt="Pago Efectivo" title="Pago Efectivo">
        <ul class="menu">
        		<li class="maintab active" id="maintab1" data-submenu="1">
                          <a href="<?php echo $pre_uri; ?>GenerarCip.php" class="title">
                              <i class="icon-AdminCatalog"></i>
                              <span>Generar Cip</span>
                          </a>
            </li>
                      <li class="maintab active" id="maintab1" data-submenu="1">
                          <a href="<?php echo $pre_uri; ?>NotificarCip.php" class="title">
                              <i class="icon-AdminCatalog"></i>
                              <span>Notificación Cip</span>
                          </a>
                      </li>
            <li class="maintab  has_submenu" id="maintab9" data-submenu="9">
                          <a href="<?php echo $pre_uri; ?>ConsultarCip.php" class="title">
                              <i class="icon-AdminCatalog"></i>
                              <span>Consultar Cip</span>
                          </a>
                      </li>
                      <li class="maintab  has_submenu" id="maintab9" data-submenu="9">
                          <a href="<?php echo $pre_uri; ?>EliminarCip.php" class="title">
                              <i class="icon-AdminCatalog"></i>
                              <span>EliminarCip</span>
                          </a>
                      </li>
                      <li class="maintab  has_submenu" id="maintab9" data-submenu="9">
                          <a href="<?php echo $pre_uri; ?>ActualizarCip.php" class="title">
                              <i class="icon-AdminCatalog"></i>
                              <span>Actualizar Cip</span>
                          </a>
                      </li>
                      <li class="maintab  has_submenu" id="maintab9" data-submenu="9">
                          <a href="../tools/configurador.php" class="title">
                              <i class="icon-AdminCatalog"></i>
                              <span>Configurador</span>
                          </a>
                      </li>
        </ul>
	</nav>
</div>

<!-- CONTENIDO -->
