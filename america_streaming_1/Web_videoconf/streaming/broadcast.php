<!--
> Muaz Khan     - wwww.MuazKhan.com
> MIT License   - www.WebRTC-Experiment.com/licence
> Documentation - github.com/muaz-khan/WebRTC-Experiment/tree/master/video-broadcasting
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>WebRTC Broadcasting ® Muaz Khan</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="author" type="text/html" href="https://plus.google.com/+MuazKhan">
<meta name="author" content="Muaz Khan">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" href="css/style.css">
<style>
audio, video {
-moz-transition: all 1s ease;
-ms-transition: all 1s ease;
-o-transition: all 1s ease;
-webkit-transition: all 1s ease;
transition: all 1s ease;
vertical-align: top;
width: 100%;
}
input {
border: 1px solid #d9d9d9;
border-radius: 1px;
font-size: 2em;
margin: .2em;
width: 30%;
}
select {
border: 1px solid #d9d9d9;
border-radius: 1px;
height: 50px;
margin-left: 1em;
margin-right: -12px;
padding: 1.1em;
vertical-align: 6px;
width: 18%;
}
.setup {
border-bottom-left-radius: 0;
border-top-left-radius: 0;
font-size: 102%;
height: 47px;
margin-left: -9px;
margin-top: 8px;
position: absolute;
}
p { padding: 1em; }
li {
border-bottom: 1px solid rgb(189, 189, 189);
border-left: 1px solid rgb(189, 189, 189);
padding: .5em;
}
</style>
<script>
//document.createElement('article');
//document.createElement('footer');
</script>
<!-- scripts used for broadcasting -->
<script src="js/firebase.js"> </script> <!-- Signaling -->
<script src="js/RTCPeerConnection-v1.5.js"> </script> <!-- WebRTC simple wrapper -->
<script src="js/broadcast.js"> </script> <!-- Multi-user connectivity handler -->
<!-- This Library is used to detect WebRTC features -->
<script src="js/DetectRTC.js"></script>
</head>
<body>

<article>
<header style="text-align: center;"></header>
<div class="github-stargazers"></div>
<!-- copy this <section> and next <script> -->
<section class="experiment">
<section>
<select id="broadcasting-option">
<option>Audio + Video</option>
<option>Only Audio</option>
<option>Screen</option>
</select>
<input type="text" id="broadcast-name">
<button id="setup-new-broadcast" class="setup">Setup New Broadcast</button>
</section>
<!-- list of all available broadcasting rooms -->
<table style="width: 100%;" id="rooms-list"></table>
<!-- local/remote videos container -->
<div id="videos-container"></div>
</section>
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
tr.innerHTML = '<td><strong>' + room.roomName + '</strong> is broadcasting his media!</td>' +
'<td><button class="join">Join</button></td>';
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
captureUserMedia(function() {
var shared = 'video';
if (window.option == 'Only Audio') {
shared = 'audio';
}
if (window.option == 'Screen') {
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
if (option === 'Only Audio') {
constraints = {
audio: true,
video: false
};
if(!DetectRTC.hasMicrophone) {
alert('DetectRTC library is unable to find microphone; maybe you denied microphone access once and it is still denied or maybe microphone device is not attached to your system or another app is using same microphone.');
}
}
if (option === 'Screen') {
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
alert('DetectRTC library is unable to find screen capturing support. You MUST run chrome with command line flag "chrome --enable-usermedia-screen-capturing"');
}
}
if (option != 'Only Audio' && option != 'Screen' && !DetectRTC.hasWebcam) {
alert('DetectRTC library is unable to find webcam; maybe you denied webcam access once and it is still denied or maybe webcam device is not attached to your system or another app is using same webcam.');
}
var htmlElement = document.createElement(option === 'Only Audio' ? 'audio' : 'video');
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
if (option === 'Only Audio') alert('unable to get access to your microphone');
else if (option === 'Screen') {
if (location.protocol === 'http:') alert('Please test this WebRTC experiment on HTTPS.');
else alert('Screen capturing is either denied or not supported. Are you enabled flag: "Enable screen capture support in getUserMedia"?');
} else alert('unable to get access to your webcam');
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
}
</script>


</body>
</html>