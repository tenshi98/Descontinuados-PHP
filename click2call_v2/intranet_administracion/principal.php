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


?>
<!doctype html>
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
if($arrUsuario['tipo']=='Normal'){
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
<script type="text/javascript" src="http://www.codehelper.io/api/ips/?js"></script>

  <script>

    // Compatibility shim
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

    // PeerJS object
    var peer = new Peer({ key: 'yw95b9fnc2n5qaor', debug: 3, config: {'iceServers': [
      { url: 'stun:stun.l.google.com:19302' } // Pass in optional STUN and TURN server for maximum network compatibility
    ]}});

    peer.on('open', function(){
      //$('#my-id').text(peer.id);
	  $("#consulta").load("principal_updatedata.php?value="+peer.id+"&idUsuario=<?php echo $arrUsuario['idUsuario'];?>");
    });

    // Receiving a call
    peer.on('call', function(call){
      // Answer the call automatically (instead of prompting user) for demo purposes
      call.answer(window.localStream);
	  //Reproduzco sonido al recibir llamada
	  var audio = document.createElement("audio");
		if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg"))
		{
			audio.src = "mp3/fono.mp3";
			audio.play();
		}
		//Creo variable para verificar si conferencia esta activa
		sessionStorage.setItem('conferencia','1');
      step3(call);
    });
    peer.on('error', function(err){
      alert(err.message);
      // Return to step 2 if error occurs
      step2();
    });

    // Click handlers setup
    $(function(){
      $('#make-call').click(function(){
        // Initiate a call!
        var call = peer.call($('#callto-id').val(), window.localStream);

        step3(call);
      });

      $('#end-call').click(function(){
		$("#consulta").load("principal_updatedata_4.php?user=<?php echo $arrUsuario['idUsuario'];?>&activate=1");
		$("#consulta").load("principal_updatedata_5.php?idUsuario=<?php echo $arrUsuario['idUsuario'];?>&Estado=3&Direccion_IP="+codehelper_ip.IP+"");
        window.existingCall.close();
		sessionStorage.setItem('conferencia','0');
        step2();
      });

      // Retry if getUserMedia fails
      $('#step1-retry').click(function(){
        $('#step1-error').hide();
        step1();
      });

      // Get things started
      step1();
    });

    function step1 () {
      // Get audio/video stream
      navigator.getUserMedia({audio: true, video: true}, function(stream){
        // Set your video displays
        $('#my-video').prop('src', URL.createObjectURL(stream));

        window.localStream = stream;
        step2();
      }, function(){ $('#step1-error').show(); });
    }

    function step2 () {
      $('#step1, #step3, #chat_area').hide();
      $('#step2').show();
    }

    function step3 (call) {
      // Hang up on an existing call if present
      if (window.existingCall) {
        window.existingCall.close();
      }

      // Wait for stream on the call, then set peer video display
      call.on('stream', function(stream){
        $('#their-video').prop('src', URL.createObjectURL(stream));
      });

      // UI stuff
      window.existingCall = call;
      //$('#their-id').text(call.peer);
      call.on('close', step2);
      $('#step1, #step2').hide();
      $('#step3').show();
    }

  </script>
  <script>
  
  var conn;
  // Connect to PeerJS, have server assign an ID instead of providing one
 var peerchat = new Peer({key: 'yw95b9fnc2n5qaor', debug: true});
  peerchat.on('open', function(id){
    //$('#pid').text(id);
	 $("#consulta").load("principal_updatedata_2.php?value="+id+"&idUsuario=<?php echo $arrUsuario['idUsuario'];?>");
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
<script>
//en caso de que el metodo normal no sirva se ejecuta este otro
$(window).on('beforeunload ',function() {
    $("#consulta").load("principal_updatedata_3.php?activate=2&idUsuario=<?php echo $arrUsuario['idUsuario'] ?>&estado_chat=1");
	<?php //si el chat no esta activo no hace nada
	if($rowdata['videochat']==1){?>
		var check_video = sessionStorage.getItem('conferencia');
		//Solo si la conferencia esta activa actualiza estados
		if (check_video==1) {
			$("#consulta").load("principal_updatedata_5.php?idUsuario=<?php echo $arrUsuario['idUsuario'];?>&Estado=4&Direccion_IP="+codehelper_ip.IP+"");
			sessionStorage.setItem('conferencia','0'); 
		}
	<?php } ?>
	return 'Vas a abandonar la pagina, estas seguro?';
});	


</script>

          
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Video chat</h5>
		</header>          
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    
    	<tr class="odd">
        	<td class=" " height="500" width="20%">
            <div  id="video-container">
       
          
            <div id="step1">
              <p>Presione el boton permitir para poder acceder a la camara y el microfono</p>
              <div id="step1-error">
                <p>No se ha podido acceder a la camara o al microfono.</p>
                <a href="#" class="pure-button pure-button-error" id="step1-retry">Reintentar</a>
              </div>
            </div>
            <div class="video_chat">
			<?php if($rowdata['videochat']==1){?>
            <p class="fleft">Chat <strong>Activo</strong></p>
            <a href="<?php echo $location; ?>?activate=2&estado_chat=2&idUsuario=<?php echo $arrUsuario['idUsuario'] ?>" class="btn btn-danger fright margin_width" >Desactivar</a>
            <?php } else { ?>
            <p class="fleft">Chat <strong>Inactivo</strong></p>
            <a href="<?php echo $location; ?>?activate=1&estado_chat=1&idUsuario=<?php echo $arrUsuario['idUsuario'] ?>" class="btn btn-success fright margin_width" >Activar</a>
            <?php }?>
            <div class="clearfix"></div>
        	</div>
            <div id="step3">
               <a href="#" class="btn btn-danger margin_width" id="end-call">Finalizar Chat</a>
            </div>
                <video id="my-video" muted="true" autoplay></video>
              </div>
            </td>
			<td class=" " height="500" width="50%">
              <div  id="video-container">
                <video id="their-video" autoplay></video>
              </div>
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
 
<?php }elseif($arrUsuario['tipo']=='Administrador'){
//Variable con la ubicacion
$z="WHERE usuarios_listado.tipo='Normal'";
$z.=" AND usuarios_listado.mode='".neomode."' ";	
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT Nombre, videochat, Estado_chat
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
        <th width="200px">Comunicado</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $usuarios['Nombre']; ?></td>
			<td class=" "><?php if($usuarios['videochat']==1){echo 'Activa';}else{echo 'Inactiva';} ?></td>
            <td class=" "><?php if($usuarios['Estado_chat']==1&&$usuarios['videochat']==2){echo 'Inactiva';}elseif($usuarios['Estado_chat']==1){echo 'Hablando';}else{echo 'Libre';} ?></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
  
</div>
</div>            
   
   
<?php }?>         
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