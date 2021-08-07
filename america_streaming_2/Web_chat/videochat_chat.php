<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<link href="css/chat.css" rel="stylesheet" type="text/css" />
</head>

<body>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> 
<script type="text/javascript" src="http://cdn.peerjs.com/0.3/peer.js"></script>

 
 <div id="consulta" style="display:none"  ></div>
 <div id="consulta1" style="display:none" ></div>
 <div id="consulta2" style="display:none" ></div> 
 <div id="consulta3" style="display:none" ></div> 
 <div id="consulta4" style="display:none" ></div>

<script>
  //Modulo chat
  var conn; 
  // Connect to PeerJS, have server assign an ID instead of providing one
  var peerchat = new Peer({key: 'yw95b9fnc2n5qaor', debug: true});
  peerchat.on('open', function(id){
    $('#consulta1').text(id);
	<?php if($_GET['user']==2){ ?>
	//$('#consulta1').load("videochat_chat_updatedata_1.php?id="+id+"&r=<?php echo $_GET['r'];?>&room=<?php echo $_GET['room'];?>");
	<?php } ?>
	//actualizo la id de la sesion para obtener el nombre del usuario
	$('#consulta').load("videochat_chat_updatedata_4.php?id="+id+"&nombre_usuario=<?php echo $_GET['nombre_usuario'];?>&url=<?php echo $_GET['url'];?>&name=<?php echo $_GET['name'];?>");
	
  });  
  // Await connections from others
  peerchat.on('connection', connect);
  function connect(c) {
    //$('#chat_area').show(); 
	$('#ing_chat').hide();
    conn = c;
    $('#messages').empty().append('<h2>Conexion establecida</h2>');
    conn.on('data', function(data){
		//obtengo el nombre de quien esta mandando el mensaje
		$('#consulta3').load("videochat_chat_updatedata_3.php?idchat="+c.peer+"");
		$('#consulta4').load("videochat_chat_updatedata_5.php?idchat="+c.peer+"");
		setTimeout(function () {
		  $('#messages').append('<div class="mensaje-autor"><img src="'+document.getElementById('consulta4').innerHTML+'"  class="foto"><div class="flecha-izquierda"></div><div class="contenido"><strong>'+document.getElementById('consulta3').innerHTML+' :</strong> '+data+'</div></div>');
		  var elem = document.getElementById('messages');
		  elem.scrollTop = elem.scrollHeight;
	  }, 1000);
	  
    });
    conn.on('close', function(err){
		 //alert('Ejecutivo ha dejado el chat.');
		 $('#messages').empty().append('');
		 //$('#chat_area').hide();
		 
	});
  }
  $(document).ready(function() {
	  $("#make-call").hover(function(){
		$('#consulta2').load("videochat_chat_updatedata_2.php?r=<?php echo $_GET['r'];?>");
	   }); 

	 $('#make-call').live('click', function(){ 
        //var c = peerchat.connect($('#msgto-id').val());
		var c = peerchat.connect(document.getElementById('consulta2').innerHTML);
		c.on('open', function(){connect(c); 
		});
       c.on('error', function(err){ alert(err) }); 
      });
	  
 
    // Send a chat message
    //$('#send').click(function(){
	$('#send').live('click', function(){ 
      var msg = $('#text').val();
      conn.send(msg);
      $('#messages').append("<div class='mensaje-amigo'><div class='contenido'><strong>Yo :</strong>"+msg+"</div><div class='flecha-derecha'></div><img src=<?php echo $_GET['url'];?>  class='foto'></div>");
      $('#text').val('');
	  var elem = document.getElementById('messages');
  	  elem.scrollTop = elem.scrollHeight;
    });

  });
  
  //verifica si el boton de finalizar llamada esta activo
   $('#end-call').live('click', function(){ 
		 $('#messages').empty().append('');
		 //$('#chat_area').hide();
		 
		//vlineClient.logout();
    });
</script> 

 
 
 
 
<?php //if($_GET['user']==1){ ?>
<div id="ing_chat">
<a id="make-call" href="#">Ingresar al chat</a>
</div>
<?php //} ?>                 
<div class="chat_area">
	<div id="chat_area">
		<div id="chat">
			<div id="messages"></div>
		</div>
		<div id="caja-mensaje">
			<input type="text" id="text" placeholder="Escribir mensaje...">
			<button id="send" >Enviar </button>
		</div> 
	</div>
</div>






</body>
</html>