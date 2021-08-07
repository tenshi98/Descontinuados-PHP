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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "main.php";
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                               Se cargan los formularios                                                        */
/**********************************************************************************************************************************/

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Streaming</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <!-- scripts used for broadcasting -->
<script src="js/firebase.js"> </script> <!-- Signaling -->
<script src="js/RTCPeerConnection-v1.5.js"> </script> <!-- WebRTC simple wrapper -->
<script src="js/broadcast.js"> </script> <!-- Multi-user connectivity handler -->
<!-- This Library is used to detect WebRTC features -->
<script src="js/DetectRTC.js"></script>
</head>
<body>
   
		<div class="register-container container">
            <div class="row">
                <div class="register span12">

                <h2>Streaming</h2>
                <div class="span8">
                
               <?php if($arrCliente['Tipo']==2){?>
                <h3 id="trans0">Crear Streaming</h3>
                <div class="formularios" id="trans1">
                    <select id="broadcasting-option" >
                        <option>Audio + Video</option>
                        <option>Solo Audio</option>
                        <option>Mostrar Pantalla</option>
                    </select>

                    <input type="text" id="broadcast-name" placeholder="Ingrese el nombre para la sesion" >
 
                    <button id="setup-new-broadcast" class="botonblue">Crear nueva sesion</button>
                   
                </div>
            	<?php } ?>
             
              
               <div id="videos-container"></div>
               <div id="trans2">
               <?php if($arrCliente['Tipo']==1){?>
                <h3>Streaming en emision </h3>
                <table class="bordered" id="rooms-list">
                    <thead><tr><th colspan="2">Nombre streaming</th></tr></thead>
                    <tbody>	
                    
                       
                    
                    </tbody>
                </table>
                <?php } ?>
                </div>
         
                
<script>
// Muaz Khan - https://github.com/muaz-khan
// MIT License - https://www.webrtc-experiment.com/licence/
// Documentation - https://github.com/muaz-khan/WebRTC-Experiment/tree/master/webrtc-broadcasting
var config = {
openSocket: function(config) {
// https://github.com/muaz-khan/WebRTC-Experiment/blob/master/Signaling.md
// This method "openSocket" can be defined in HTML page
// to use any signaling gateway either XHR-Long-Polling or SIP/XMPP or WebSockets/Socket.io
// or WebSync/SignalR or existing implementations like signalmaster/peerserver or sockjs etc.
var channel = config.channel || location.href.replace( /\/|:|#|%|\.|\[|\]/g , '');
var socket = new Firebase('https://americastreaming.firebaseio.com/' + channel);
socket.channel = channel;
socket.on("child_added", function(data) {
config.onmessage && config.onmessage(data.val());
});
socket.send = function(data) {
this.push(data);
};
config.onopen && setTimeout(config.onopen, 1);
socket.onDisconnect().remove();
return socket;
},
onRemoteStream: function(htmlElement) {
htmlElement.setAttribute('controls', true);
videosContainer.insertBefore(htmlElement, videosContainer.firstChild);
htmlElement.play();
},
onRoomFound: function(room) {
var alreadyExist = document.querySelector('button[data-broadcaster="' + room.broadcaster + '"]');
if (alreadyExist) return;
if (typeof roomsList === 'undefined') roomsList = document.body;
var tr = document.createElement('tr');
tr.innerHTML = '<td><strong>' + room.roomName + '</strong> Esta Online</td>' +
'<td><button class="join" id="make_call">Ingresar</button></td>';
roomsList.insertBefore(tr, roomsList.firstChild);
var joinRoomButton = tr.querySelector('.join');
joinRoomButton.setAttribute('data-broadcaster', room.broadcaster);
joinRoomButton.setAttribute('data-roomToken', room.broadcaster);
joinRoomButton.onclick = function() {
this.disabled = true;
var broadcaster = this.getAttribute('data-broadcaster');
var roomToken = this.getAttribute('data-roomToken');
broadcastUI.joinRoom({
roomToken: roomToken,
joinUser: broadcaster
});
hideUnnecessaryStuff();
};
},
onNewParticipant: function(numberOfViewers) {
document.title = 'Viewers: ' + numberOfViewers;
}
};
function setupNewBroadcastButtonClickHandler() {
document.getElementById('broadcast-name').disabled = true;
document.getElementById('setup-new-broadcast').disabled = true;

document.getElementById('trans0').style.display = 'none';
document.getElementById('trans1').style.display = 'none';
document.getElementById('trans2').style.display = 'none';
document.getElementById('chat_vis').style.display = 'initial';

captureUserMedia(function() {
var shared = 'video';
if (window.option == 'Solo Audio') {
shared = 'audio';
}
if (window.option == 'Mostrar Pantalla') {
shared = 'screen';
}
broadcastUI.createRoom({
roomName: (document.getElementById('broadcast-name') || { }).value || 'Anonymous',
isAudio: shared === 'audio'
});
});
hideUnnecessaryStuff();
}
function captureUserMedia(callback) {
var constraints = null;
window.option = broadcastingOption ? broadcastingOption.value : '';
if (option === 'Solo Audio') {
constraints = {
audio: true,
video: false
};
if(!DetectRTC.hasMicrophone) {
alert('Se ha detectado que no hay un microfono conectado.');
}
}
if (option === 'Mostrar Pantalla') {
var video_constraints = {
mandatory: {
chromeMediaSource: 'screen'
},
optional: []
};
constraints = {
audio: false,
video: video_constraints
};
if(!DetectRTC.isScreenCapturingSupported) {
alert('Funcion de captura de pantalla no esta activa, modifica el acceso directo de chrome con lo siguiente "chrome --enable-usermedia-screen-capturing"');
}
}
if (option != 'Solo Audio' && option != 'Mostrar Pantalla' && !DetectRTC.hasWebcam) {
alert('No se ha podido detectar la camara webcam conectada.');
}
var htmlElement = document.createElement(option === 'Solo Audio' ? 'audio' : 'video');
htmlElement.setAttribute('autoplay', true);
htmlElement.setAttribute('controls', true);
videosContainer.insertBefore(htmlElement, videosContainer.firstChild);
var mediaConfig = {
video: htmlElement,
onsuccess: function(stream) {
config.attachStream = stream;
callback && callback();
htmlElement.setAttribute('muted', true);
},
onerror: function() {
if (option === 'Solo Audio') alert('imposible acceder al microfono');
else if (option === 'Mostrar Pantalla') {
if (location.protocol === 'http:') alert('Favor de ingresar con un protocolo seguro como: HTTPS.');
else alert('Screen capturing is either denied or not supported. Are you enabled flag: "Enable screen capture support in getUserMedia"?');
} else alert('Imposible acceder a la camara');
}
};
if (constraints) mediaConfig.constraints = constraints;
getUserMedia(mediaConfig);
}
var broadcastUI = broadcast(config);
/* UI specific */
var videosContainer = document.getElementById('videos-container') || document.body;
var setupNewBroadcast = document.getElementById('setup-new-broadcast');
var roomsList = document.getElementById('rooms-list');
var broadcastingOption = document.getElementById('broadcasting-option');
if (setupNewBroadcast) setupNewBroadcast.onclick = setupNewBroadcastButtonClickHandler;
function hideUnnecessaryStuff() {
var visibleElements = document.getElementsByClassName('visible'),
length = visibleElements.length;
for (var i = 0; i < length; i++) {
visibleElements[i].style.display = 'none';
}
$('#chat_vis').show(); 
$('#trans2').hide();

}
</script>
                
                
                
                </div>
                
                
                
                
                <div class="span3_ex">
                    <div id="chat_vis" style="display:none">
                    <iframe style="width:100%; height:100%;" frameborder="0" noresize scrolling="No" src="streaming_chat.php?r=<?php echo $_GET['r'];?>&room=<?php echo $_GET['room'];?>&user=<?php echo $arrCliente['Tipo']; ?>&idCliente=<?php echo $arrCliente['idCliente']; ?>"></iframe>
					</div>
                </div>
				</div>
            </div>
        </div>  
        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>