<?php
session_start();

include('classes/DbHandler.php');
	if($_SESSION['plainuserauth'] != 1)
		header("Location: index.php");
	else{

		$dbh = new DbHandler();
		$dbh->connect();	
		$users = $dbh->getUsers();
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
    <title>vLine PHP Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
 	<link href="css/videochat.css" rel="stylesheet" type="text/css">
    <script src="scripts/jquery-1.10.1.min.js"></script>
    <script src="scripts/vline.js"></script>


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="logo"></div>

<table>
  <tr>
    <td width="20%" height="100%">
    <!-- Steps -->
      <div class="contenedor">

        <div id="step2">
       	  
          
          <div id="frame_update">
          <h2>Listado de ejecutivos</h2>
          <ul>
          <?php while($row = mysqli_fetch_array($users, MYSQLI_ASSOC)){  ?>
              <li class="callbutton disabled" data-userid="<?php echo $row['idUsuario'] ?>"><a href="#"><?php echo $row['Nombre'] ?></a></li>
          <?php } ?>
          </ul>
          </div>
         
        </div>
      </div>
    
    
    </td>
    <td>
        <div id="their-video" ></div>
    </td>
    <td  width="30%" >
    <div class="chat_area">
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
