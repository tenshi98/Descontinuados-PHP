// Muaz Khan - www.MuazKhan.com
// MIT License - www.WebRTC-Experiment.com/licence
// Experiments - github.com/muaz-khan/WebRTC-Experiment
var config = {
openSocket: function(config) {
// https://github.com/muaz-khan/WebRTC-Experiment/blob/master/Signaling.md
// This method "openSocket" can be defined in HTML page
// to use any signaling gateway either XHR-Long-Polling or SIP/XMPP or WebSockets/Socket.io
// or WebSync/SignalR or existing implementations like signalmaster/peerserver or sockjs etc.
var channel = config.channel || location.href.replace( /\/|:|#|%|\.|\[|\]/g , '');
var socket = new Firebase('https://chat.firebaseIO.com/' + channel);
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
onRoomFound: function(room) {
var alreadyExist = document.getElementById(room.broadcaster);
if (alreadyExist) return;
if (typeof roomsList === 'undefined') roomsList = document.body;
var tr = document.createElement('li');
tr.setAttribute('id', room.broadcaster);
tr.innerHTML = '<a href="#" class="join" id="' + room.roomToken + '" >'+
					'<span class="user-img"></span>'+
					'<span class="user-title">' + room.roomName + '</span>'+
					'<p class="user-desc">Seleccionar para entrar</p>'+
				'</a>';
roomsList.insertBefore(tr, roomsList.firstChild);
tr.onclick = function() {
tr = this;
hangoutUI.joinRoom({
roomToken: tr.querySelector('.join').id,
joinUser: tr.id,
userName: prompt('Ingresa tu nick', 'Anonimo')
});
hideUnnecessaryStuff();
};
},
onChannelOpened: function(/* channel */) {
hideUnnecessaryStuff();
},
onChannelMessage: function(data) {
if (!chatOutput) return;
var tr = document.createElement('div');
var ahora=new Date();
hora=ahora.getHours()+":"+ahora.getMinutes()+" hrs. ";
tr.innerHTML =
'<div class="message bubble-left"><label class="message-user">'+data.sender+' :</label><label class="message-timestamp">'+hora+'</label><p>'+data.message+'</p></div>';
chatOutput.insertBefore(tr, chatOutput.lastChild);
var elem = document.getElementById('messages');
elem.scrollTop = elem.scrollHeight;
}
};
function createButtonClickHandler() {
hangoutUI.createRoom({
userName: prompt('Ingresa tu nick', 'Anonimo'),
roomName: (document.getElementById('conference-name') || { }).value || 'Anonimo'
});
hideUnnecessaryStuff();
}
/* on page load: get public rooms */
var hangoutUI = hangout(config);
/* UI specific */
var startConferencing = document.getElementById('start-conferencing');
if (startConferencing) startConferencing.onclick = createButtonClickHandler;
var roomsList = document.getElementById('rooms-list');
var chatOutput = document.getElementById('messages');
function hideUnnecessaryStuff() {
var visibleElements = document.getElementsByClassName('visible'),
length = visibleElements.length;
for (var i = 0; i < length; i++) {
visibleElements[i].style.display = 'none';
}
var chatTable = document.getElementById('chat-table');
if (chatTable) chatTable.style.display = 'block';
if (chatOutput) chatOutput.style.display = 'block';
if (chatMessage) chatMessage.disabled = false;
if (roomsList) roomsList.style.display = 'none';
}
var chatMessage = document.getElementById('text');
if (chatMessage)
chatMessage.onchange = function() {
hangoutUI.send(this.value);
var tr = document.createElement('div');
var ahora=new Date();
hora=ahora.getHours()+":"+ahora.getMinutes()+" hrs. "; 
tr.innerHTML =
'<div class="message bubble-right"><label class="message-user">Yo:</label><label class="message-timestamp">'+hora+'</label><p>'+chatMessage.value+'</p></div>';
chatOutput.insertBefore(tr, chatOutput.lastChild);
chatMessage.value = '';
var elem = document.getElementById('messages');
elem.scrollTop = elem.scrollHeight;

};


(function() {
var uniqueToken = document.getElementById('unique-token');
if (uniqueToken)
if (location.hash.length > 2) uniqueToken.parentNode.parentNode.parentNode.innerHTML = '<h2 style="text-align:center;"><a href="' + location.href + '" target="_blank">Share this link</a></h2>';
else uniqueToken.innerHTML = uniqueToken.parentNode.parentNode.href = '#' + (Math.random() * new Date().getTime()).toString(36).toUpperCase().replace( /\./g , '-');
})();