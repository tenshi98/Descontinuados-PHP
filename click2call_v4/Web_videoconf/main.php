<?php
session_start();

include('classes/DbHandler.php');
	if($_SESSION['plainuserauth'] != 1)
		header("Location: index.php");
	else{

		$dbh = new DbHandler();
		$dbh->connect();	
		$users = $dbh->getUsers();
		$users2 = $dbh->getUsers();
		include("includes/JWT.php");
		include("classes/Vline.php");
		$vline = new Vline();
		$vline->setUser($_SESSION['user']['idUsuario'], $_SESSION['user']['Nombre']);
		$vline->init();
		
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Video Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
 	<link href="css/videochat.css" rel="stylesheet" type="text/css">
    <script src="scripts/jquery-1.10.1.min.js"></script>
    <script src="scripts/vline_back.js"></script>
  <script type="text/javascript" src="scripts/jquery.min.js"></script> 
  <script type="text/javascript" src="scripts/peer.js"></script>


    
    
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body id="bbdy">
<div id="consulta" ></div>  
<script>
  //Modulo chat
  var conn;
  var jidchat = '';
  // Connect to PeerJS, have server assign an ID instead of providing one
  var peerchat = new Peer({key: 'yw95b9fnc2n5qaor', debug: true});
  peerchat.on('open', function(id){
    //$('#consulta').text(id);
  });  
  // Await connections from others
  peerchat.on('connection', connect);
  function connect(c) {
    $('#chat_area').show();
	$('#their-video').show();
	$('#step2').hide();
	$('#step3').show();
	//Creo variable para verificar si conferencia esta activa
	sessionStorage.setItem('conferencia','1');	 
    conn = c;
    $('#messages').empty().append('<h2>Conexion establecida</h2>');
    conn.on('data', function(data){
      $('#messages').append('<div class="mensaje-autor"><img src="images/avatar_client.jpg" alt="" class="foto"><div class="flecha-izquierda"></div><div class="contenido">Ejecutivo : '+data+'</div></div>');
	  var elem = document.getElementById('messages');
  	  elem.scrollTop = elem.scrollHeight;
    });
    conn.on('close', function(err){
		 alert('Ejecutivo ha dejado el chat.');
		 $('#messages').empty().append('');
		 $('#chat_area').hide();
		 $('#their-video').hide();
		 $('#step2').show();
		 $('#step3').hide(); 
		 vlineClient.logout();
	});
  }
  $(document).ready(function() {
	  
	<?php  while($access = mysqli_fetch_array($users2, MYSQLI_ASSOC)){  ?>	
	 $('#make-call_<?php echo $access['idUsuario']; ?>').live('click', function(){ 
        var c = peerchat.connect($('#msgto-id_<?php echo $access['idUsuario']; ?>').val());
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
      $('#messages').append('<div class="mensaje-amigo"><div class="contenido">Yo : '+msg+'</div><div class="flecha-derecha"></div><img src="images/avatar_user.jpg" alt="" class="foto"></div>');
      $('#text').val('');
	  var elem = document.getElementById('messages');
  	  elem.scrollTop = elem.scrollHeight;
    });

  });
  
  //verifica si el boton de finalizar llamada esta activo
   $('#end-call').live('click', function(){ 
		 $('#messages').empty().append('');
		 $('#chat_area').hide();
		 $('#their-video').hide();
		 $('#step2').show();
		 $('#step3').hide();
		//vlineClient.logout();
    });
</script>  
<script>
//Se desactiva el estado del chat en caso de que el usuario se salga de la pagina
$(window).on('beforeunload ',function() {	
	var check_video = sessionStorage.getItem('conferencia');
	//Solo si la conferencia esta activa actualiza estados
		if (check_video==1) {
		//cambio el estado para no volver a aparecer en el listado de usuarios activos 
		$("#consulta").load("main_updatedata_1.php?activate=1&idUsuario=<?php echo $_SESSION['user']['idUsuario'] ?>");	
		//reseteo la variable de conferencia a 0 para poder reutilizarla
		sessionStorage.setItem('conferencia','0');
		//window.location="index.php";
		return 'Vas a abandonar la pagina, estas seguro?';
		
		};
});	
</script>  

 
<div class="logo"></div>
<table>
  <tr>
    <td width="20%" height="100%">
    <!-- Steps -->
      <div class="content ejecutivos">

        <div id="step2">
          <div id="frame_update">
          <h2>Listado de ejecutivos</h2>
          <ul>
          <?php while($row = mysqli_fetch_array($users, MYSQLI_ASSOC)){  ?>
              <li class="callbutton disabled" data-userid="<?php echo $row['idUsuario'] ?>">
              	<input type="hidden" id="msgto-id_<?php echo $row['idUsuario']; ?>" value="<?php echo $row['idchat']; ?>">
              	<a id="make-call_<?php echo $row['idUsuario']; ?>" href="#"><?php echo $row['Nombre'] ?></a>
              </li>
          <?php } ?>
          </ul>
          </div>
        </div>
        <div id="step3">
          	<a href="#" class="action-button shadow animate red action_btn_margin" id="end-call">Finalizar Chat</a>     
        </div>
      </div>
    
    
    </td>
    <td>
        <div class="content" >
        	<div id="their-video" ></div>
        </div>
    </td>
    <td  width="30%" >
    <div class="content chat_area contentnone">
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




    
	<!-- vLine ------------------------------------------->
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
	  //window.vlineClient = client = vline.Client.create({"serviceId": serviceId, "ui": true});
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
				 $('#step3').show();
				 $('#step2').hide();
				 $('#bbdy').load( function () {
            	$(this).contents().find(".vl-not-dialog-bg").css({'display':'none'});
        });	 
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
