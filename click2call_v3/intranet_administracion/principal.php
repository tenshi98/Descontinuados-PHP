<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                      Se filtran las entradas para evitar ataques                                               */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "principal.php";
$location = $original;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para editar el nivel del permiso
if ( !empty($_GET['activate']) ) {
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/usuario_video_chat.php';
}
/**********************************************************************************************************************************/
/*                                                            Modulo Vline                                                        */
/**********************************************************************************************************************************/
//Logeo y registro del usuario en las bases de datos
		include("vline/includes/JWT.php");
		include("vline/classes/Vline.php");
		$vline = new Vline();
		$vline->setUser($arrUsuario['idUsuario'], $arrUsuario['Nombre']);
		$vline->init();	
?>
<!DOCTYPE html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Principal</title>
    <!-- InstanceEndEditable -->
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">
    <!-- Metis Theme stylesheet -->
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/lib/fullcalendar/fullcalendar.css">
    <!-- Estilo definido por mi -->
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
	<link href="assets/css/theme_color_<?php echo $rowempresa['idTheme'] ?>.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
        <script src="assets/lib/respond/respond.min.js"></script>
        <![endif]-->
    <!--Modernizr 2.7.2-->
    <script src="assets/lib/modernizr/modernizr.min.js"></script>
	<!-- Icono de la pagina -->
	<link rel="icon" type="image/png" href="img/mifavicon.png" />
    <!-- InstanceBeginEditable name="head" -->
    <script src="vline/scripts/jquery-1.10.1.min.js"></script>
    <script src="vline/scripts/vline_back.js"></script>
    <!-- InstanceEndEditable -->
  </head>
  <body>
    <div id="wrap">
      <div id="top">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
              </button>
              <a href="index.html" class="navbar-brand">
                <img src="img/logo_sm.png" alt="">
              </a> 
            </header>
            <?php require_once 'core/infobox.php';?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <?php require_once 'core/menu_top.php';?>
            </div>
          </div>
        </nav>
        <header class="head">
          <div class="main-bar">
            <h3>
            <!-- InstanceBeginEditable name="titulo" -->
            <i class="fa fa-dashboard"></i> Principal
			<!-- InstanceEndEditable --> </h3>
          </div>
        </header>
      </div>
      <div id="left">
       <?php require_once 'core/userbox.php';?> 
       <?php require_once 'core/menu.php';?> 
      </div>
      <div id="content">
        <div class="outer">
            <div class="inner">
			<!-- InstanceBeginEditable name="Bodytext" -->
<?php
///////////////////////////////////////////////////
//if($arrUsuario['tipo']=='Normal'){
// Se traen todos los datos del usuario
$query = "SELECT videochat
FROM `usuarios_listado`
WHERE idUsuario = {$arrUsuario['idUsuario']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
?>
<div id="consulta" ></div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> 
<script type="text/javascript" src="http://cdn.peerjs.com/0.3/peer.js"></script>
<script>
  //MODULO DE CHAT
  var conn;
  // Connect to PeerJS, have server assign an ID instead of providing one
 var peerchat = new Peer({key: 'yw95b9fnc2n5qaor', debug: true});
  peerchat.on('open', function(id){
    //guarda la id del chat en la base de datos
	 $("#consulta").load("principal_updatedata_1.php?value="+id+"&idUsuario=<?php echo $arrUsuario['idUsuario'];?>");
  });
    
  // Await connections from others
  peerchat.on('connection', connect);
  function connect(c) {
    $('#chat_area').show();
    conn = c;
    $('#messages').empty().append('<h2>Conexion establecida</h2>');
    conn.on('data', function(data){
      $('#messages').append('<div class="mensaje-autor"><img src="img/avatar_client.jpg" alt="" class="foto"><div class="flecha-izquierda"></div><div class="contenido">Cliente : '+data+'</div></div>');
	  var elem = document.getElementById('messages');
  	  elem.scrollTop = elem.scrollHeight;
    });
    conn.on('close', function(err){ alert('Visitante ha dejado el chat.') });
  }
  $(document).ready(function() {
    // Conect to a peer
    $('#connect').click(function(){
      var c = peer.connect($('#rid').val());
      c.on('open', function(){
        connect(c);
      });
      c.on('error', function(err){ alert(err) });  
    });
    // Send a chat message
    $('#send').click(function(){
      var msg = $('#text').val();
      conn.send(msg);
      $('#messages').append('<div class="mensaje-amigo"><div class="contenido">Yo : '+msg+'</div><div class="flecha-derecha"></div><img src="img/avatar_user.jpg" alt="" class="foto"></div>');
      $('#text').val('');
	  var elem = document.getElementById('messages');
  	  elem.scrollTop = elem.scrollHeight;
    });
    // Show browser version
    //$('#browsers').text(navigator.userAgent);
  });
</script>
<?php if($rowdata['videochat']==1){?>
<script>
//Se desactiva el estado del chat en caso de que el usuario se salga de la pagina
$(window).on('beforeunload ',function() {	
   	//cambio el estado para no volver a aparecer en el listado de usuarios activos 
	$("#consulta").load("principal_updatedata_2.php?activate=2&idUsuario=<?php echo $arrUsuario['idUsuario'] ?>");	
	//cierro la sesion de vline
	vlineClient.logout();
	return 'Vas a abandonar la pagina, estas seguro?';
});	
</script>
<?php } ?>
          
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Video chat</h5>
		</header>          
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">                 
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="odd">
        	<td class=" " height="500" width="20%">
            <?php if($rowdata['videochat']==1){?>
            <p class="fleft">Chat <strong>Activo</strong></p>
            <a href="<?php echo $location; ?>?activate=2&idUsuario=<?php echo $arrUsuario['idUsuario'] ?>" class="btn btn-danger fright margin_width" >Desactivar</a>
            <?php } else { ?>
            <p class="fleft">Chat <strong>Inactivo</strong></p>
            <a href="<?php echo $location; ?>?activate=1&idUsuario=<?php echo $arrUsuario['idUsuario'] ?>" class="btn btn-success fright margin_width" >Activar</a>
            <?php }?>
            </td>
			<td class=" " height="500" width="50%">
              <div  id="video-container">
                <div id="their-video"></div>
              </div>
              <!-- vLine ------------------------------------------->
				<script>
                var vlineClient = (function(){
                  if('<?php echo $vline->getServiceID() ?>' == 'YOUR_SERVICE_ID' || '<?php echo $vline->getServiceID() ?>' == 'YOUR_SERVICE_ID'){
                    alert('Please make sure you have created a vLine service and that you have properly set the $serviceID and $apiSecret variables in classes/Vline.php file.');	  
                  }
                  var client, vlinesession,
                    authToken = '<?php echo $vline->getJWT() ?>',
                    serviceId = '<?php echo $vline->getServiceID() ?>',
                    profile = {"displayName": '<?php echo $vline->getUserDisplayName() ?>', "id": '<?php echo $vline->getUserID() ?>'};
                
                  // Create vLine client  
                  //window.vlineClient = client = vline.Client.create({"serviceId": serviceId, "ui": true});
                  window.vlineClient = client = vline.Client.create({"serviceId": serviceId, "ui": true, "uiVideoPanel": "their-video" }); 
                  
                  
                  // Add login event handler
                  client.on('login', onLogin);
                  // Do login
                  
                  client.login(serviceId, profile, authToken);
                  
                  function onLogin(event) {
                    vlinesession = event.target;
                    // Find and init call buttons and init them
                    $(".callbutton").each(function(index, element) {
                       initCallButton($(this)); 
                    });
                  }
                
                  // add event handlers for call button
                  function initCallButton(button) {
                    var userId = button.attr('data-userid');
                  
                    // fetch person object associated with username
                    vlinesession.getPerson(userId).done(function(person) {
                      // update button state with presence
                      function onPresenceChange() {
                        if(person.getPresenceState() == 'online'){
                            button.removeClass().addClass('active');
                        }else{
                            button.removeClass().addClass('disabled');
                        }
                        button.attr('data-presence', person.getPresenceState());
                      }
                    
                      // set current presence
                      onPresenceChange();
                    
                      // handle presence changes
                      person.on('change:presenceState', onPresenceChange);
                    
                      // start a call when button is clicked
                      button.click(function() {
                              if (person.getId() == vlinesession.getLocalPersonId()) {
                            alert('No puedes llamarte a ti mismo');
                            return;
                              }
                          if(button.hasClass('active'))
                            person.startMedia();
                      });
                    });
                    
                  }
                  
                  return client;
                })();
                
                $(window).unload(function() {
                  vlineClient.logout();
                });
                </script>
                <!-- /vLine -------------------------------------------->
            </td>
            <td class=" ">
            <div class="chat_area">
              <div id="chat_area" style="display: none;">
                <div id="chat">
                    <div id="messages"></div>
                </div>
                <div id="caja-mensaje">
                    <input type="text" id="text" placeholder="Escribir mensaje...">
                    <button id="send" >&#8594; </button>
                </div> 
              </div>
             </div>
            </td>
		</tr>
                     
	</tbody>
</table>
</div>
</div>              
 
<?php //}elseif($arrUsuario['tipo']=='Administrador'){
//Variable con la ubicacion
$z="WHERE usuarios_listado.tipo='Normal'";
$z.=" AND usuarios_listado.mode='".neomode."' ";	
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT Nombre, videochat
FROM `usuarios_listado`
".$z."
ORDER BY usuarios_listado.usuario ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>          
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de ejecutivos</h5>
		</header>
         
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre</th>
        <th width="200px">Estado Videochat</th>

    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $usuarios['Nombre']; ?></td>
			<td class=" "><?php if($usuarios['videochat']==1){echo 'Activa';}else{echo 'Inactiva';} ?></td>
            
		</tr>
    <?php } ?>                    
	</tbody>
</table>
  
</div>
</div>            
   
   
<?php // }?>         
			<!-- InstanceEndEditable -->   
            </div>
        </div>
      </div> 
    </div>
    <?php require_once 'core/footer.php';?>
    <!--jQuery 2.1.0 -->
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <!--Bootstrap -->
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- Screenfull -->
    <script src="assets/lib/screenfull/screenfull.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script src="assets/lib/jquery.tablesorter/jquery.tablesorter.min.js"></script>
    <script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/lib/flot/jquery.flot.js"></script>
    <script src="assets/lib/flot/jquery.flot.selection.js"></script>
    <script src="assets/lib/flot/jquery.flot.resize.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>