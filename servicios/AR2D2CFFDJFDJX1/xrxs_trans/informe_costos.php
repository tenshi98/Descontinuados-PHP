<?php 
// definimos las variables
	if ( !empty($_POST['f_desde']) )    $f_desde	  = $_POST['f_desde'];
	if ( !empty($_POST['f_hasta']) )    $f_hasta      = $_POST['f_hasta'];

		//Filtro para empresa
        $a = '?emp='.$_GET['view'] ;
		//filtro de f_inicio
		if(isset($f_desde) && $f_desde != ''){ 
        	$a .= "&f_desde=".$f_desde ;
        }
		//filtro de f_termino
		if(isset($f_hasta) && $f_hasta != ''){ 
        	$a .= "&f_hasta=".$f_hasta ;
        }		
		
		header( 'Location: enap_ot_inf_03_print.php'.$a.'&periodos=1');
		die;
	
	?>