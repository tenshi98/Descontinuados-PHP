<?php 
// definimos las variables
	if ( !empty($_POST['f_desde']) )     $f_desde	 = $_POST['f_desde'];
	if ( !empty($_POST['f_hasta']) )	 $f_hasta    = $_POST['f_hasta'];

	// completamos la variable error si es necesario
	if ( empty($f_desde) )    $errors[1]   = '<span class="error">'.errores(71).'</span>'; 
	if ( empty($f_hasta) )    $errors[2]   = '<span class="error">'.errores(72).'</span>';
	
	// si no hay errores modificamos los datos del usuario
	if ( empty($errors[1]) && empty($errors[2])  ) {
		
		header( 'Location: '.$location.'&f_desde='.$f_desde.'&f_hasta='.$f_hasta );
		die;
	}
	?>