<?php 
// definimos las variables
	if ( !empty($_POST['f_inicio']) )        $f_inicio	     = $_POST['f_inicio'];
	if ( !empty($_POST['f_termino']) )	     $f_termino      = $_POST['f_termino'];
	if ( !empty($_POST['idArticulo']) )      $idArticulo     = $_POST['idArticulo'];
	if ( !empty($_POST['idEmpresa']) )	     $idEmpresa      = $_POST['idEmpresa'];

		//Filtro para empresa
        $a = '?emp='.$idEmpresa ;
		//filtro de f_inicio
		if(isset($f_inicio) && $f_inicio != ''){ 
        	$a .= "&f_inicio=".$f_inicio ;
        }
		//filtro de f_termino
		if(isset($f_termino) && $f_termino != ''){ 
        	$a .= "&f_termino=".$f_termino ;
        }
		//filtro de idArticulo
		if(isset($idArticulo) && $idArticulo != ''){ 
        	$a .= "&idArticulo=".$idArticulo ;
        }
		
		
		header( 'Location: '.$location.''.$a );
		die;
	
	?>