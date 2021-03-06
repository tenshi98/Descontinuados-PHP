<?php
session_start();
// Class's "Checker" "checkInstallation" method checks if the vLine PHP example has been successfully installed and configured
//include('./classes/Checker.php');
//$chk = new Checker();
//if(!$chk->checkInstallation("./"))
//	header("Location: ./install/index.php");
//else{
	// All authenticated users have $_SESSION['plainuserauth'] == 1
	// If the user is already authenticated by the system then he/she is been redirected straight to the main.php page where the main 
	// application runs. Otherwise the user stays and has to provide username & password in order to get authenticated
	if(isset($_SESSION['plainuserauth'])&&$_SESSION['plainuserauth'] == 1)
		header("Location: ./main.php");
//}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in to the vLine PHP Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link type="image/png" href="./images/favicon.png" rel="shortcut icon"/>
    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
	  .form-signin h2 img{
		margin: 0 25%;
	  }

    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="./css/style.css" rel="stylesheet"> 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="bootstrap/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post" action="./actions/login.php">
      	<h2><img src="images/naturalphonelogochico.png"></h2>
        <h2 class="form-signin-heading">Iniciar Sesion</h2>
        <input type="text" class="input-block-level" placeholder="Nombre de usuario" name="usuario">
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <button class="btn btn-large btn-primary" type="submit">Ingresar</button>
        <?php 
		if(array_key_exists('failed', $_GET)){
		if($_GET['failed'] == 1){ ?>
        	<div class="authfailure">Nombre de usuario o Password mal ingresados</div>
        <?php }} ?>
      </form>

    </div> <!-- /container -->


  </body>
</html>
