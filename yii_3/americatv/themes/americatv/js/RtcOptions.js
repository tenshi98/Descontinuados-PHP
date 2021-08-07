		// Muaz Khan     - www.MuazKhan.com
        // MIT License   - www.WebRTC-Experiment.com/licence
        // Documentation - www.RTCMultiConnection.org

        var connection = new RTCMultiConnection();

        connection.session = {
            audio: true,
            video: true
        };

        var roomsList = document.getElementById('rooms-list'),
            sessions = {};
        connection.onNewSession = function(session) {
            if (sessions[session.sessionid]) return;
            sessions[session.sessionid] = session;

            var tr = document.createElement('tr');
            tr.innerHTML = '<td width="70%"><strong>' + session.extra['session-name'] + '</strong> Esta Transmitiendo</td>' +
                '<td><button class="join">Ingresar</button></td>';
            roomsList.insertBefore(tr, roomsList.firstChild);

            tr.querySelector('.join').setAttribute('data-sessionid', session.sessionid);
            tr.querySelector('.join').onclick = function() {

			
                this.disabled = true;

                session = sessions[this.getAttribute('data-sessionid')];
                if (!session) alert('No room to join.');

                connection.join(session);
            };
        };

        var videosContainer = document.getElementById('videos-container') || document.body;
        connection.onstream = function(e) {
            //var buttons = ['mute-audio', 'mute-video', 'record-audio', 'record-video', 'full-screen', 'volume-slider', 'stop'];
			var buttons = ['mute-audio', 'mute-video', 'full-screen', 'volume-slider', 'stop'];

            if (connection.session.audio && !connection.session.video) {
                buttons = ['mute-audio', 'full-screen', 'stop'];
            }

            var mediaElement = getMediaElement(e.mediaElement, {
                width: (videosContainer.clientWidth / 2) - 50,
                title: e.userid,
                buttons: buttons,
                onMuted: function(type) {
                    connection.streams[e.streamid].mute({
                        audio: type == 'audio',
                        video: type == 'video'
                    });
                },
                onUnMuted: function(type) {
                    connection.streams[e.streamid].unmute({
                        audio: type == 'audio',
                        video: type == 'video'
                    });
                },
                onRecordingStarted: function(type) {
                    // www.RTCMultiConnection.org/docs/startRecording/
                    connection.streams[e.streamid].startRecording({
                        audio: type == 'audio',
                        video: type == 'video'
                    });
                },
                onRecordingStopped: function(type) {
                    // www.RTCMultiConnection.org/docs/stopRecording/
                    connection.streams[e.streamid].stopRecording(function(blob) {
                        if (blob.audio) connection.saveToDisk(blob.audio);
                        else if (blob.video) connection.saveToDisk(blob.video);
                        else connection.saveToDisk(blob);
                    }, type);
                },
                onStopped: function() {
                    connection.peers[e.userid].drop();
                }
            });
			

            videosContainer.insertBefore(mediaElement, videosContainer.firstChild);

            if (e.type == 'local') {
                mediaElement.media.muted = false;
                //mediaElement.media.volume = 0;
            }
			
			
        };

        connection.onstreamended = function(e) {
            if (e.mediaElement.parentNode && e.mediaElement.parentNode.parentNode && e.mediaElement.parentNode.parentNode.parentNode) {
                e.mediaElement.parentNode.parentNode.parentNode.removeChild(e.mediaElement.parentNode.parentNode);
            }
        };

        var setupNewSession = document.getElementById('setup-new-session');

        setupNewSession.onclick = function() {
            setupNewSession.disabled = true;
			
			document.getElementById('trans1').style.display = 'none';
			document.getElementById('trans2').style.display = 'none';
			document.getElementById('trans3').style.display = 'none';
			document.getElementById('trans4').style.display = 'block';
			document.getElementById('trans5').style.display = 'block';
			document.getElementById('trans6').style.display = 'block';

            var direction = document.getElementById('direction').value;
            var _session = document.getElementById('session').value;
            var splittedSession = _session.split('+');

            var session = {};
            for (var i = 0; i < splittedSession.length; i++) {
                session[splittedSession[i]] = true;
            }

            var maxParticipantsAllowed = 256;

            if (direction == 'one-to-one') maxParticipantsAllowed = 1;
            if (direction == 'one-to-many') session.broadcast = true;
            if (direction == 'one-way') session.oneway = true;

            var sessionName = document.getElementById('session-name').value;
            connection.extra = {
                'session-name': sessionName || 'Anonymous'
            };

            connection.session = session;
            connection.maxParticipantsAllowed = maxParticipantsAllowed;


            connection.sessionid = sessionName || 'Anonymous';
            connection.open();
        };

        connection.onmessage = function(e) {
		
			
			
			appendDIV(e.data);
			
			if(type==2){
				connection.send(e.data);
			}
			
			var objDiv = document.getElementById('chat-output');
			objDiv.scrollTop = objDiv.scrollHeight;

            console.debug(e.userid, 'posted', e.data);
            console.log('latency:', e.latency, 'ms');
			
			
        };

        connection.onclose = function(e) {
            //appendDIV('Se ha cerrado la conexion entre tu y ' + e.userid);
        };

        connection.onleave = function(e) {
            //appendDIV(e.userid + ' Ha dejado la sesion.');
        };

        connection.onopen = function() {
            if (document.getElementById('chat-input')) document.getElementById('chat-input').disabled = false;
            if (document.getElementById('file')) document.getElementById('file').disabled = false;
            if (document.getElementById('open-new-session')) document.getElementById('open-new-session').disabled = true;
			
			document.getElementById('trans1').style.display = 'none';
			document.getElementById('trans2').style.display = 'none';
			document.getElementById('trans3').style.display = 'none';
			document.getElementById('trans4').style.display = 'block';
			document.getElementById('trans5').style.display = 'block';
			document.getElementById('trans6').style.display = 'block';

        };

        var progressHelper = {};

        connection.autoSaveToDisk = false;

        connection.onFileProgress = function(chunk) {
            var helper = progressHelper[chunk.uuid];
            helper.progress.value = chunk.currentPosition || chunk.maxChunks || helper.progress.max;
            updateLabel(helper.progress, helper.label);
        };
        connection.onFileStart = function(file) {
            var div = document.createElement('div');
            div.title = file.name;
            div.innerHTML = '<label>0%</label> <progress></progress>';
            appendDIV(div, fileProgress);
            progressHelper[file.uuid] = {
                div: div,
                progress: div.querySelector('progress'),
                label: div.querySelector('label')
            };
            progressHelper[file.uuid].progress.max = file.maxChunks;
        };

        connection.onFileEnd = function(file) {
            progressHelper[file.uuid].div.innerHTML = '<a href="' + file.url + '" target="_blank" download="' + file.name + '">' + file.name + '</a>';
        };

        function updateLabel(progress, label) {
            if (progress.position == -1) return;
            var position = +progress.position.toFixed(2).split('.')[1] || 100;
            label.innerHTML = position + '%';
        }

        function appendDIV(div, parent) {
            if (typeof div === 'string') {
                var content = div;
                div = document.createElement('div');
                div.innerHTML = content;
				div.className = 'mensaje';
            }

            if (!parent) chatOutput.appendChild(div, chatOutput.firstChild);
            else fileProgress.insertBefore(div, fileProgress.firstChild);

            div.focus();
			
        }

        var chatOutput = document.getElementById('chat-output'),
            fileProgress = document.getElementById('file-progress');

        var chatInput = document.getElementById('chat-input');
        chatInput.onkeypress = function(e) {
            if (e.keyCode !== 13 || !this.value) return;
            /*appendDIV('<span>Yo : </span><br/>'+this.value);
			
			var objDiv = document.getElementById('chat-output');
			objDiv.scrollTop = objDiv.scrollHeight;*/
	
            connection.send('<span>'+chat_username+' dijo</span><br/>'+this.value);

            this.value = '';
        };

        connection.connect();