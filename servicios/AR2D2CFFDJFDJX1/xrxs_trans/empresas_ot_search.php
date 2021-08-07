<?php 
// definimos las variables
	if ( !empty($_POST['f_Inicio']) )        $f_Inicio	     = $_POST['f_Inicio'];
	if ( !empty($_POST['f_Termino']) )	     $f_Termino      = $_POST['f_Termino'];
	if ( !empty($_POST['idItemlist']) )	     $idItemlist     = $_POST['idItemlist'];
	if ( !empty($_POST['Estado']) )	         $Estado         = $_POST['Estado'];
	if ( !empty($_POST['idUsuario']) )	     $idUsuario      = $_POST['idUsuario'];
	if ( !empty($_POST['idTrabajador']) )	 $idTrabajador   = $_POST['idTrabajador'];

		//Filtro para idProg
        $a = '?emp='.$_GET['view'] ;
		//filtro de f_Inicio
		if(isset($f_Inicio) && $f_Inicio != ''){ 
        	$a .= "&f_Inicio=".$f_Inicio ;
        }
		//filtro de f_Termino
		if(isset($f_Termino) && $f_Termino != ''){ 
        	$a .= "&f_Termino=".$f_Termino ;
        }
		//filtro de idItemlist
		if(isset($idItemlist) && $idItemlist != ''){ 
        	$a .= "&idItemlist=".$idItemlist ;
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= "&Estado=".$Estado ;
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= "&idUsuario=".$idUsuario ;
        }
		//filtro de idTrabajador
		if(isset($idTrabajador) && $idTrabajador != ''){ 
        	$a .= "&idTrabajador=".$idTrabajador ;
        }
		
		header( 'Location: '.$location.''.$a );
		die;
	
	?>