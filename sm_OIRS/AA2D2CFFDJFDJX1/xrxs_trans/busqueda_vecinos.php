<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
//Traspaso de valores input a variables
	if ( !empty($_POST['Nombres']) )        $Nombres        = $_POST['Nombres'];
	if ( !empty($_POST['ApellidoPat']) )    $ApellidoPat    = $_POST['ApellidoPat'];
	if ( !empty($_POST['ApellidoMat']) )    $ApellidoMat    = $_POST['ApellidoMat'];
	if ( !empty($_POST['Rut']) )            $Rut            = $_POST['Rut'];
	if ( !empty($_POST['Sexo']) )           $Sexo           = $_POST['Sexo'];

		//inicializa la variable
		$a ="?pagina=1";
		//filtro de Nombre
		if(isset($Nombres) && $Nombres != ''){            $a .= "&Nombres=".$Nombres ;            }else{      $a .= "";  }
		if(isset($ApellidoPat) && $ApellidoPat != ''){    $a .= "&ApellidoPat=".$ApellidoPat ;    }else{      $a .= "";  }
		if(isset($ApellidoMat) && $ApellidoMat != ''){    $a .= "&ApellidoMat=".$ApellidoMat ;    }else{      $a .= "";  }
		if(isset($Rut) && $Rut != ''){                    $a .= "&Rut=".$Rut ;                    }else{      $a .= "";  }
		if(isset($Sexo) && $Sexo != ''){                  $a .= "&Sexo=".$Sexo ;                  }else{      $a .= "";  }
		
	header( 'Location: view_vecinos.php'.$a );
	die;	



?>