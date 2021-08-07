// Muaz Khan - www.MuazKhan.com
// MIT License - www.WebRTC-Experiment.com/licence
// Experiments - github.com/muaz-khan/WebRTC-Experiment
var config = {
    openSocket: function(config) {
        // https://github.com/muaz-khan/WebRTC-Experiment/blob/master/Signaling.md
        // This method "openSocket" can be defined in HTML page
        // to use any signaling gateway either XHR-Long-Polling or SIP/XMPP or WebSockets/Socket.io
        // or WebSync/SignalR or existing implementations like signalmaster/peerserver or sockjs etc.
        var channel = config.channel || location.href.replace(/\/|:|#|%|\.|\[|\]/g, '');
        //var socket = new Firebase('https://chat.firebaseIO.com/' + channel);
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
    onRoomFound: function(room) {
        var alreadyExist = document.getElementById(room.broadcaster);
        if (alreadyExist) return;
        if (typeof roomsList === 'undefined') roomsList = document.body;
        var tr = document.createElement('li');
        tr.setAttribute('id', room.broadcaster);
        tr.innerHTML = '<a href="#" class="join" id="' + room.roomToken + '" >' +
            '<span class="user-img"></span>' +
            '<span class="user-title">' + room.roomName + '</span>' +
            '<p class="user-desc">Seleccionar para entrar</p>' +
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
			hideCreationBox();
			showCreationBoxTittle2(room.roomName);
        };
    },
    onChannelOpened: function( /* channel */ ) {
        hideUnnecessaryStuff();
    },
    onChannelMessage: function(data) {
        if (!chatOutput) return;
        var tr = document.createElement('div');
        var ahora = new Date();
        hora = ahora.getHours() + ":" + ahora.getMinutes() + " hrs. ";
        
		//Verifico si es inicio de sesion, sino es asi ejecuta normal
		if(/userlister/.test(data.message)){
			$('#user_lister').append('<p class="user_lister">'+data.sender+'</p>');
			document.getElementById('user_lister').style.display = 'block';
			var text1 =data.message;
			var text2 =text1.replace("userlister"," ");
			$('#messages').append('<div class="message bubble-left color_new"><label class="message-user">' + data.sender + ' :</label><label class="message-timestamp">' + hora + '</label><p>' + text2 + '</p></div>');
		
		}else{	
		$('#messages').append('<div class="message bubble-left"><label class="message-user">' + data.sender + ' :</label><label class="message-timestamp">' + hora + '</label><p>' + data.message + '</p></div>');
		  var elem = document.getElementById('messages');
		  elem.scrollTop = elem.scrollHeight;
		}
	  
    }
};

function createButtonClickHandler() {
        hangoutUI.createRoom({
            userName: prompt('Ingresa tu nick', 'Anonimo'),
            roomName: (document.getElementById('conference-name') || {}).value || 'Anonimo'
        });
        hideUnnecessaryStuff();
		hideCreationBox();
		showCreationBoxTittle1();
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

function hideCreationBox() {
	if ( document.getElementById( "caja-creacion" )) { document.getElementById('caja-creacion').style.display = 'none';}
}
function showCreationBoxTittle1() {
	var tittle_box = document.getElementById('conference-name').value;
	$('#tittle_box').append('<h2 class="head_h2">'+tittle_box+'</h2>');
	document.getElementById('tittle_box').style.display = 'block';	
}
function showCreationBoxTittle2(tittle) {
	var tittle_box = tittle;
	$('#tittle_box').append('<h2 class="head_h2">'+tittle_box+'</h2>');
	document.getElementById('tittle_box').style.display = 'block';	
}

var chatMessage = document.getElementById('text');
if (chatMessage)
    chatMessage.onchange = function() {
        hangoutUI.send(this.value);
        var tr = document.createElement('div');
        var ahora = new Date();
        hora = ahora.getHours() + ":" + ahora.getMinutes() + " hrs. ";
        
		
		$('#messages').append('<div class="message bubble-right"><label class="message-user">Yo:</label><label class="message-timestamp">' + hora + '</label><p>' + chatMessage.value + '</p></div>');
		chatMessage.value = '';
		  var elem = document.getElementById('messages');
		  elem.scrollTop = elem.scrollHeight;

    };


(function() {
    var uniqueToken = document.getElementById('unique-token');
    if (uniqueToken)
        if (location.hash.length > 2) uniqueToken.parentNode.parentNode.parentNode.innerHTML = '<h2 style="text-align:center;"><a href="' + location.href + '" target="_blank">Share this link</a></h2>';
        else uniqueToken.innerHTML = uniqueToken.parentNode.parentNode.href = '#' + (Math.random() * new Date().getTime()).toString(36).toUpperCase().replace(/\./g, '-');
})();