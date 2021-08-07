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
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
// obtengo puntero de conexion con la db
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                      Se filtran las entradas para evitar ataques                                               */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                               Consulta a la base de datos                                                      */
/**********************************************************************************************************************************/
// Se trae un listado con todos los usuarios disponibles y activos
$arrUsers = array();
$query = "SELECT idUsuario, Nombre, idvideochat, idchat
FROM `usuarios_listado`
WHERE videochat=1 AND idvideochat!='' AND Estado_chat=1";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}
// Se trae un listado con todos los usuarios
$arrUsers2 = array();
$query = "SELECT idUsuario, Nombre, idvideochat, idchat
FROM `usuarios_listado`";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers2,$row );
}
?>
<html>
<head>
<div id="consulta" ></div>
<div id="consulta2" ></div>
  <title>Videochat</title>
  <link href="css/reset.css" rel="stylesheet" type="text/css" />
  <link href="css/videochat.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/peer.js"></script>

<script type="text/javascript">
//Actualizacion del div
	$(document).ready(function(){
    setInterval(function(){
      $.get('main_frame_update.php', function(h){
        $('#frame_update').html(h);
      });
      }, 5000);
});
</script>
<script>
	//Modulo Videoconferencia
    // Compatibility shim
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

    // PeerJS object
    var peer = new Peer({ key: 'yw95b9fnc2n5qaor', debug: 3, config: {'iceServers': [
      { url: 'stun:stun.l.google.com:19302' } // Pass in optional STUN and TURN server for maximum network compatibility
    ]}});

    peer.on('open', function(){
      //$('#my-id').text(peer.id);
    });

    // Receiving a call
    peer.on('call', function(call){
      // Answer the call automatically (instead of prompting user) for demo purposes
      call.answer(window.localStream);
      step3(call);
    });
    peer.on('error', function(err){
      alert(err.message);
      // Return to step 2 if error occurs
      step2();
    });

    // Click handlers setup
    $(function(){

		
	<?php 
	//Genero tantos make call como usuarios esten activos en el sistema
	foreach ($arrUsers2 as $usuarios2) { ?>	
      //$('#make-call_<?php echo $usuarios2['idUsuario']; ?>').click(function(){
	  $('#make-call_<?php echo $usuarios2['idUsuario']; ?>').live('click', function(){ 
	  	//actualizo el estado del ejecutivo a ocupado  
		$("#consulta").load("main_updatedata_1.php?user=<?php echo $usuarios2['idUsuario']; ?>&activate=2");
		//Ingreso la nueva llamada en la base de datos
		$("#consulta").load("main_updatedata_2.php?idUsuario=<?php echo $usuarios2['idUsuario']; ?>&Estado=1&Direccion_IP=0");
        // Initiate a call!
        var call = peer.call($('#callto-id_<?php echo $usuarios2['idUsuario']; ?>').val(), window.localStream);
		//Creo variable para verificar si conferencia esta activa
		sessionStorage.setItem('conferencia','1');
		//Guardo la id del usuario con el cual me contacte
		sessionStorage.setItem('usuario','<?php echo $usuarios2['idUsuario']; ?>');


        step3(call);
      });
	<?php } ?>
      //$('#end-call').click(function(){
	  $('#end-call').live('click', function(){ 
		$("#consulta").load("main_updatedata_1.php?user="+sessionStorage.getItem('usuario')+"&activate=1");
		$("#consulta").load("main_updatedata_2.php?idUsuario="+sessionStorage.getItem('usuario')+"&Estado=2&Direccion_IP=0");
		sessionStorage.setItem('conferencia','0');
		sessionStorage.setItem('usuario','0');
		window.existingCall.close();
        step2();
      });

      // Retry if getUserMedia fails
      //$('#step1-retry').click(function(){
	  $('#step1-retry').live('click', function(){ 
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
  //Modulo chat
  var conn;
  var jidchat = '';
  // Connect to PeerJS, have server assign an ID instead of providing one
  var peerchat = new Peer({key: 'yw95b9fnc2n5qaor', debug: true});
  peerchat.on('open', function(id){
    //$('#pid').text(id);
  });  
  // Await connections from others
  peerchat.on('connection', connect);
  function connect(c) {
    $('#chat_area').show();
    conn = c;
    $('#messages').empty().append('<h2>Conexion establecida</h2>');
    conn.on('data', function(data){
      $('#messages').append('<div class="mensaje-autor"><img src="img/avatar_client.jpg" alt="" class="foto"><div class="flecha-izquierda"></div><div class="contenido">Ejecutivo : '+data+'</div></div>');
	  var elem = document.getElementById('messages');
  	  elem.scrollTop = elem.scrollHeight;
    });
    conn.on('close', function(err){ alert('Ejecutivo ha dejado el chat.');$('#messages').empty().append('');$('#chat_area').hide(); });
  }
  $(document).ready(function() {
	<?php
	//Genero tantos make call como usuarios esten activos en el sistema
	foreach ($arrUsers2 as $usuarios2) { ?>	
      //$('#make-call_<?php echo $usuarios2['idUsuario']; ?>').click(function(){
	  $('#make-call_<?php echo $usuarios2['idUsuario']; ?>').live('click', function(){ 
        var c = peerchat.connect($('#msgto-id_<?php echo $usuarios2['idUsuario']; ?>').val());
		c.on('open', function(){connect(c);
		});
       c.on('error', function(err){ alert(err) }); 
      });
	<?php } ?>

    // Send a chat message
    //$('#send').click(function(){
	$('#send').live('click', function(){ 
      var msg = $('#text').val();
      conn.send(msg);
      $('#messages').append('<div class="mensaje-amigo"><div class="contenido">Yo : '+msg+'</div><div class="flecha-derecha"></div><img src="img/avatar_user.jpg" alt="" class="foto"></div>');
      $('#text').val('');
	  var elem = document.getElementById('messages');
  	  elem.scrollTop = elem.scrollHeight;
    });

  });
</script>
<script>
//Muestra mensaje antes de cerrar la ventana
$(window).on('beforeunload ',function() { 
var check_video = sessionStorage.getItem('conferencia');
//Solo si la conferencia esta activa actualiza estados
if (check_video==1) {
	$("#consulta").load("main_updatedata_1.php?user="+sessionStorage.getItem('usuario')+"&activate=1");
	$("#consulta").load("main_updatedata_2.php?idUsuario="+sessionStorage.getItem('usuario')+"&Estado=2&Direccion_IP=0");
	sessionStorage.setItem('conferencia','0');
	sessionStorage.setItem('usuario','0'); 
}
	return 'Vas a abandonar la pagina, estas seguro?';
});
				
</script>

</head>

<body>

<div class="logo"></div>

<table>
  <tr>
    <td width="20%">
    <!-- Steps -->
      <div class="contenedor">
        <!-- Get local audio/video stream -->
        <div id="step1">
          <p>Presione el boton permitir para poder acceder a la camara y el microfono</p>
          <div id="step1-error">
            <p>No se ha podido acceder a la camara o al microfono.</p>
            <a href="#" class="pure-button pure-button-error" id="step1-retry">Reintentar</a>
          </div>
        </div>

        <!-- Make calls to others -->
        <div id="step2">
       	  <video id="my-video" muted="true" autoplay></video>
          
          <div id="frame_update">
          <h2>Listado de ejecutivos</h2>
          <ul>
          <?php foreach ($arrUsers as $usuarios) { ?>
            <input type="hidden" id="callto-id_<?php echo $usuarios['idUsuario']; ?>" value="<?php echo $usuarios['idvideochat']; ?>">
            <input type="hidden" id="msgto-id_<?php echo $usuarios['idUsuario']; ?>" value="<?php echo $usuarios['idchat']; ?>">
            <li><a href="#"  id="make-call_<?php echo $usuarios['idUsuario']; ?>"><?php echo $usuarios['Nombre']; ?></a></li> 
          <?php } ?>
          </ul>
          </div>
         
        </div>

        <!-- Call in progress -->
        <div id="step3">
          <a href="#" class="action-button shadow animate red" id="end-call">Finalizar Chat</a>     
        </div>
      </div>
    
    
    </td>
    <td>
        <video id="their-video" autoplay></video>
    </td>
    <td  width="30%" >
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
</table>
<div class="footer"></div>



  


</body>
</html>