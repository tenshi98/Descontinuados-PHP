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
		$vline->setUser($_SESSION['user']['id'], $_SESSION['user']['name']);
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
    <meta name="description" content="">
    <meta name="author" content="">
	<link type="image/png" href="./images/favicon.png" rel="shortcut icon"/>
    <!-- Le styles -->
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    
    <script src="scripts/jquery-1.10.1.min.js"></script>
    
    <!-- vLine --------------------------------------------->
    <!-- Load the vLine script ----------------------------->
    <script src="https://static.vline.com/vline.js"></script>
	<!-- /vLine script ------------------------------------->



    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand" href="#">Natural Phone S.A.</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Identificado como <?php echo $_SESSION['user']['name'] ?>
            </p>
            <ul class="nav">
              <!--<li><a href="./admin/index.php">Ir al panel de Administracion</a></li>-->
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
            
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Listado de Usuarios</li>
              <?php while($row = mysqli_fetch_array($users, MYSQLI_ASSOC)){  ?>
              <li class="callbutton disabled" data-userid="<?php echo $row['id'] ?>"><a href="#"><?php echo $row['name'] ?></a></li>
              <?php } ?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h1>Ejemplo de VideoChat</h1>
            <p>Testeo de videochat en html5.</p>
          </div>
          
        </div><!--/span-->
      </div><!--/row-->

      <hr>
    </div><!--/.fluid-container-->

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
	  window.vlineClient = client = vline.Client.create({"serviceId": serviceId, "ui": true});
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
