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
tr.innerHTML = '<tr><td width="70%"><strong>' + room.roomName + '</strong> Esta Transmitiendo</td><td><button class="join" id="make_call" value="' + room.roomName + '">Ingresar</button></td></tr>';
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
document.title = 'Viendo: ' + numberOfViewers;
}
};
function setupNewBroadcastButtonClickHandler() {
	document.getElementById('broadcast-name').disabled = true;
	document.getElementById('setup-new-broadcast').disabled = true;
	if ( document.getElementById( "trans1" )) { document.getElementById('trans1').style.display = 'none';}
	if ( document.getElementById( "trans2" )) { document.getElementById('trans2').style.display = 'none';}
	if ( document.getElementById( "trans3" )) { document.getElementById('trans3').style.display = 'none';}
	if ( document.getElementById( "chat_vis" )) { 
		document.getElementById('chat_vis').style.display = 'block';
		document.getElementById('chat_vis').style.height = "600px";
	}




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
};

//Guardo registro de la sala creada por el administrador
if ( document.getElementById( "broadcast-name" )) {
var userroomname = document.getElementById('broadcast-name').value;
$('#consulta1').load("../inc/videochat_chat_updatedata_1.php?userid="+user_chat_id+"&videochatid="+userroomname+"&var_room="+user_chat_room+"");
}
if ( document.getElementById( "trans2" )) {document.getElementById('trans2').style.display = 'none';}
if ( document.getElementById( "trans3" )) {document.getElementById('trans3').style.display = 'none';}
if ( document.getElementById( "chat_vis" )) {
	document.getElementById('chat_vis').style.display = 'block';
	document.getElementById('chat_vis').style.height = "600px";
}

//Guardo registro de la sala creada por el administrador
if ( document.getElementById('make_call')) {
		var user_room_name = document.getElementById('make_call').value;
		$('#consulta1').load("../inc/videochat_chat_updatedata_1.php?userid="+user_chat_id+"&videochatid="+user_room_name+"");
}



}