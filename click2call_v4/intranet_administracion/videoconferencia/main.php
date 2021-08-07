<?php
session_start();
// Class's "Checker" "checkInstallation" method checks if the vLine PHP example has been properly installed and configured
include('./classes/Checker.php');
include('./classes/DbHandler.php');
$chk = new Checker();
if(!$chk->checkInstallation("./"))
	header("Location: ./install/index.php");
else{
	// All authenticated users have $_SESSION['plainuserauth'] == 1
	// If the user is already authenticated by the system then he/she stays. If not he/she is been directed to index.php page
	// in order to fill in the authentication form
	if($_SESSION['plainuserauth'] != 1)
		header("Location: ./index.php");
	else{
	// the application is installed and configured properly, the user is authenticated
	// we instantiate an object of the class DbHandler
		$dbh = new DbHandler();
	// we connect to the database
		$dbh->connect();	
	// and get all the registered users
		$users = $dbh->getUsers();
	// vLine
	// Before anything else, first we have to include the JWT.php file 
		include("./includes/JWT.php");
	// And now we create the authToken for vLine authentication by setting the user and calling the init method of the
	// Vline class
		include("./classes/Vline.php");
		$vline = new Vline();
		$vline->setUser($_SESSION['user']['idUsuario'], $_SESSION['user']['Nombre']);
		$vline->init();
	// Almost ready. All we have to do is to include the vline.js script in the head section.
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Videoconferencia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="image/png" href="./images/favicon.png" rel="shortcut icon"/>
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
 	<link href="css/videochat.css" rel="stylesheet" type="text/css">
    <script src="scripts/jquery-1.10.1.min.js"></script>
    <?php /*?><script src="https://static.vline.com/vline.js"></script><?php */?>
    <script src="scripts/vline.js"></script>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> 
	<script type="text/javascript" src="http://cdn.peerjs.com/0.3/peer.js"></script>
  </head>
  <body>
  
  
<div id="consulta" ></div>  
  <script>
  //MODULO DE CHAT
  var conn;
  // Connect to PeerJS, have server assign an ID instead of providing one
 var peerchat = new Peer({key: 'yw95b9fnc2n5qaor', debug: true});
  peerchat.on('open', function(id){
    //guarda la id del chat en la base de datos
	 $("#consulta").load("main_updatedata_1.php?value="+id+"&idUsuario=<?php echo $_SESSION['user']['idUsuario'];?>");
  });
    
  // Await connections from others
  peerchat.on('connection', connect);
  function connect(c) {
    $('#chat_area').show();
	$('#their-video').show();
    conn = c;
	//Reproduzco sonido al recibir llamada
	  var audio = document.createElement("audio");
		if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg"))
		{
			audio.src = "mp3/fono.mp3";
			audio.play();
		}
		
    $('#messages').empty().append('<h2>Conexion establecida</h2>');
    conn.on('data', function(data){
      $('#messages').append('<div class="mensaje-autor"><img src="images/avatar_client.jpg" alt="" class="foto"><div class="flecha-izquierda"></div><div class="contenido">Cliente : '+data+'</div></div>');
	  var elem = document.getElementById('messages');
  	  elem.scrollTop = elem.scrollHeight;
    });
    conn.on('close', function(err){ 
		alert('Visitante ha dejado el chat.');
		$('#chat_area').hide();
		$('#their-video').hide();
		$("#consulta").load("main_updatedata_2.php?activate=1&idUsuario=<?php echo $_SESSION['user']['idUsuario'] ?>");
		//vlineClient.logout();
	});
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
      $('#messages').append('<div class="mensaje-amigo"><div class="contenido">Yo : '+msg+'</div><div class="flecha-derecha"></div><img src="images/avatar_user.jpg" alt="" class="foto"></div>');
      $('#text').val('');
	  var elem = document.getElementById('messages');
  	  elem.scrollTop = elem.scrollHeight;
    });
    // Show browser version
    //$('#browsers').text(navigator.userAgent);
  });
</script>
<script>
//Se desactiva el estado del chat en caso de que el usuario se salga de la pagina
$(window).on('beforeunload ',function() {	
   	//cambio el estado para no volver a aparecer en el listado de usuarios activos 
	$("#consulta").load("main_updatedata_2.php?activate=2&idUsuario=<?php echo $_SESSION['user']['idUsuario'] ?>");	
	//cierro la sesion de vline
	vlineClient.logout();
	return 'Vas a abandonar la pagina, estas seguro?';
});	
//verifica si el boton de finalizar llamada esta activo
   $('#end-call').live('click', function(){ 
		 $('#messages').empty().append('');
		 $('#chat_area').hide();
		 $('#their-video').hide();
		 $("#consulta").load("main_updatedata_2.php?activate=1&idUsuario=<?php echo $_SESSION['user']['idUsuario'] ?>");
    });
</script>

<div class="logo">
<p class="identidad">Identificado como <?php echo $_SESSION['user']['Nombre'] ?></p>
</div>

<table>
  <tr>
    <td height="100%">
        <div class="content" >
        	<div id="their-video" ></div>
        </div>
    </td>
    <td  width="30%" >
    <div class="content chat_area contentnone">
      <div id="chat_area" style="display: none;">
      <a href="#" class="action-button shadow animate red action_btn_margin" id="end-call">Finalizar Chat</a>
      <div class="clear"></div>
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
    
  </body>
</html>
