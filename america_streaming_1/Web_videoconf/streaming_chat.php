<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
body, html{
	width:100%;
	height:100%;
	margin:0;
	padding:0;
	
}
.chat_area {
	height: 100%;
	width: 100%;

}
.chat_area #chat_area {
	height: 100%;
	width: 100%;
}
#chat{
	margin: 0;
	width: 100%;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #fafafa;
	height: 85%;
}
#chat h2{
	font-size: 16px;
	font-weight: bold;
	text-transform: uppercase;
	color: #333;
	text-decoration: none;
	text-align: center;
	margin-bottom: 10px;
}
		
		
#caja-mensaje{
	margin: 0 auto;

	width: 100%;
}
#caja-mensaje input{
	width: 95%;
    height: 30px;
    background: none repeat scroll 0% 0% #FCFCFC;
    border: 1px solid #DDD;
    border-radius: 2px;
    box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.1) inset;
    font-family: "PT Sans",Helvetica,Arial,sans-serif;
    color: #888;
    font-size: 16px;
}
#caja-mensaje button{
background: none repeat scroll 0% 0% #08C !important;
cursor: pointer !important;
width: 95% !important;
margin-top: 5px !important;
border-radius: 3px !important;
border: 0px none !important;
box-shadow: 0px 15px 30px 0px rgba(255, 255, 255, 0.1) inset !important;
font-family: "PT Sans",Helvetica,Arial,sans-serif !important;
font-size: 16px !important;
font-weight: 400 !important;
color: #FFF !important;
text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1) !important;
transition: all 0.2s ease 0s !important;
padding-top: 11px;
padding-right: 0px;
padding-bottom: 10px;
float: left;
}
#chat #messages{
	height: 380px;
	overflow: hidden;
	overflow-y: scroll;
	width: 95%;
    background: none repeat scroll 0% 0% #FCFCFC;
    border: 1px solid #DDD;
    border-radius: 2px;
    box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.1) inset;
    font-family: "PT Sans",Helvetica,Arial,sans-serif;
    color: #888;
    font-size: 16px;
	height: 100%;
}

#chat #messages .mensaje-autor{
	margin-bottom: 20px;

}
#chat #messages .mensaje-autor img, #chat #mensajes .mensaje-amigo img{
	display: inline-block;
	vertical-align: top;
}
#chat #messages .mensaje-autor .contenido{
	background-color: #eaeaea;
	border-radius: 5px;
	box-shadow: 2px 2px 3px rgba(0,0,0,0.3);
	display: inline-block;
	font-size: 13px;
	padding: 15px;
	vertical-align: top;
	width: 80%;
}
#chat #messages .mensaje-autor .fecha{
	color: #777;
	font-style: italic;
	font-size: 13px;
	text-align: right;
	margin-right: 35px;
	margin-top: 10px;
}
#chat #messages .mensaje-autor .flecha-izquierda{
	display: inline-block;
	margin-right: -6px;
	margin-top: 10px;
	width: 0;
	height: 0;
	border-top: 0px solid transparent;
	border-bottom: 15px solid transparent;
	border-right: 15px solid #eaeaea;
}
#chat #messages .mensaje-amigo{
	margin-bottom: 20px;
}
#chat #messages .mensaje-amigo .contenido{
	background-color: #3990BF;
	border-radius: 5px;
	color: white;
	display: inline-block;
	font-size: 13px;
	padding: 15px;
	vertical-align: top;
	width: 80%;
}
#chat #messages .mensaje-amigo .flecha-derecha{
	display: inline-block;
	margin-left: -6px;
	margin-top: 10px;
	width: 0; 
	height: 0; 
	border-top: 0px solid transparent;
	border-bottom: 15px solid transparent;
	border-left: 15px solid #3990BF;
}
#chat #messages .mensaje-amigo img, #chat #mensajes .mensaje-autor img{
	border-radius: 5px;
}
#chat #messages .mensaje-amigo .fecha{
	color: #777;
	font-style: italic;
	font-size: 13px;
	text-align: left;
	
	margin-top: 10px;
}
#make-call{
	background: none repeat scroll 0% 0% #08C !important;
	cursor: pointer !important;
	width: 95% !important;
	margin-top: 5px !important;
	border-radius: 3px !important;
	border: 0px none !important;
	box-shadow: 0px 15px 30px 0px rgba(255, 255, 255, 0.1) inset !important;
	font-family: "PT Sans", Helvetica, Arial, sans-serif !important;
	font-size: 16px !important;
	font-weight: 400 !important;
	color: #FFF !important;
	text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1) !important;
	transition: all 0.2s ease 0s !important;
	padding-top: 11px;
	padding-right: 0px;
	padding-bottom: 10px;
	margin-bottom: 25px;
	display: block;
	text-decoration: none;
	text-align: center;
}
</style>
</head>

<body>
<div id="consulta" ></div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> 
<script type="text/javascript" src="http://cdn.peerjs.com/0.3/peer.js"></script>

 
 <div id="consulta" style="display:none" ></div>
 <div id="consulta2" style="display:none" ></div> 
 <div id="consulta3" style="display:none" ></div> 

<script>
  //Modulo chat
  var conn; 
  // Connect to PeerJS, have server assign an ID instead of providing one
  var peerchat = new Peer({key: 'yw95b9fnc2n5qaor', debug: true});
  peerchat.on('open', function(id){
    //$('#consulta').text(id);
	<?php if($_GET['user']==2){ ?>
	$('#consulta').load("streaming_chat_updatedata_1.php?id="+id+"&r=<?php echo $_GET['r'];?>&room=<?php echo $_GET['room'];?>");
	<?php } ?>
	//actualizo la id de la sesion para obtener el nombre del usuario
	$('#consulta').load("streaming_chat_updatedata_4.php?id="+id+"&idCliente=<?php echo $_GET['idCliente'];?>");
	
  });  
  // Await connections from others
  peerchat.on('connection', connect);
  function connect(c) {
    //$('#chat_area').show(); 
	$('#ing_chat').hide();
    conn = c;
    $('#messages').empty().append('<h2>Conexion establecida</h2>');
    conn.on('data', function(data){
		$('#consulta3').load("streaming_chat_updatedata_3.php?idchat="+c.peer+"");
		setTimeout(function () {
		  $('#messages').append('<div class="mensaje-autor"><div class="contenido"><strong>'+document.getElementById('consulta3').innerHTML+' :</strong> '+data+'</div></div>');
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
		$('#consulta2').load("streaming_chat_updatedata_2.php?r=<?php echo $_GET['r'];?>");
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
      $('#messages').append('<div class="mensaje-amigo"><div class="contenido"><strong>Yo :</strong> '+msg+'</div></div>');
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

 
 
 
 
<?php if($_GET['user']==1){ ?>
<div id="ing_chat">
<a id="make-call" href="#">Ingresar al chat</a>
</div>
<?php } ?>                 
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