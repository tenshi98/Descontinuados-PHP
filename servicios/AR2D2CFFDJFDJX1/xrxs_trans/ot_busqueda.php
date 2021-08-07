<?php 
// definimos las variables
	if ( !empty($_POST['f_desde']) )     $f_desde	 = $_POST['f_desde'];
	if ( !empty($_POST['f_hasta']) )	 $f_hasta    = $_POST['f_hasta'];
	if ( !empty($_POST['periodos']) )	 $periodos   = $_POST['periodos'];

	// completamos la variable error si es necesario
	if ( empty($f_desde) )    $errors[1]   = '<span class="error">'.errores(71).'</span>'; 
	if ( empty($f_hasta) )    $errors[2]   = '<span class="error">'.errores(72).'</span>';
	if ( empty($periodos) )   $errors[3]   = '<span class="error">'.errores(81).'</span>';
	
	// si no hay errores modificamos los datos del usuario
	if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])  ) {
		
		header( 'Location: '.$location.'&f_desde='.$f_desde.'&f_hasta='.$f_hasta.'&periodos='.$periodos );
		die;
	}
	?>