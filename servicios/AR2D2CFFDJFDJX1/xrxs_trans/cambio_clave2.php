<?php 

// definimos las variables
	if ( !empty($_POST['idUsuario']) )	       $idUsuario	      = $_POST['idUsuario'];
	if ( !empty($_POST['password_nueva']) )	   $password_nueva    = $_POST['password_nueva'];
	if ( !empty($_POST['rePassword_nueva']) )  $rePassword_nueva  = $_POST['rePassword_nueva'];

	// completamos la variable error si es necesario
	if ( empty($password_nueva) )    $errors[2]   = '<span class="error">'.errores(69).'</span>';
	if ( empty($rePassword_nueva) )  $errors[3]   = '<span class="error">'.errores(69).'</span>'; 
	
	if ( $_POST['password_nueva'] != $_POST['rePassword_nueva'] ) {
		$errors[3] = '<span class="error">'.errores(70).'</span>'; 
	}

	
	
	// si no hay errores modificamos los datos del usuario
	if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])  ) {
		
		// inserto los datos de registro en la db
		$query  = "UPDATE usuarios_listado SET  password = '".md5($password_nueva)."'  WHERE idUsuario = '$idUsuario'";
		$result = mysql_query($query, $dbConn);	

		header( 'Location: '.$location );
		die;
	}
	
	
	?>