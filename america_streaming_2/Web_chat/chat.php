<!--
> Muaz Khan     - https://github.com/muaz-khan 
> MIT License   - https://www.webrtc-experiment.com/licence/
> Experiments   - https://github.com/muaz-khan/WebRTC-Experiment/tree/master/chat-hangout
-->
<!DOCTYPE html>
<html id="home" lang="en">
<head>
<title>Chat</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="author" type="text/html" href="#">
<meta name="author" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/chat.css" rel="stylesheet" type="text/css" />


</head>
<body>

<!--<div class="chat_area">
	<div id="chat_area">
    	<div id="caja-creacion">
			<input type="text" id="conference-name" placeholder="Nombre de la habitacion">
			<button id="start-conferencing" href="#">Crear habitacion</button>
		</div>
        <div id="rooms-list">
        
        </div>
		<div id="chat">
			<div id="messages"></div>
		</div>
		<div id="caja-mensaje">
			<input type="text" id="text" placeholder="Escribir mensaje...">
			<button id="send" >Enviar </button>
		</div> 
	</div>
</div>-->



<div class="message-container">
	<div class="message-north">
    	<div id="caja-creacion">
			<input type="text" id="conference-name" placeholder="Nombre de la habitacion">
			<button id="start-conferencing" href="#">Crear habitacion</button>
		</div>

		<ul class="message-user-list" id="rooms-list"></ul>

		<div class="message-thread" id="messages">
			
			
						
		</div>
	</div>
	<div class="message-south">
		<textarea cols="20" rows="3" id="text" disabled></textarea>
		<button id="send">Enviar</button>
	</div>
</div>
            
           
<script src="js/firebase.js"> </script>
<script src="js/RTCPeerConnection-v1.6.js"> </script>
<script src="js/hangout.js"> </script>
<script src="js/hangout-ui.js"> </script>

</body>
</html>