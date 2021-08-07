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
	if ( !empty($_POST['Inicia']) )    $Inicia    = $_POST['Inicia'];
	if ( !empty($_POST['Termina']) )   $Termina   = $_POST['Termina'];
	if ( !empty($_POST['Tipo']) )      $Tipo      = $_POST['Tipo'];

		//inicializa la variable
		$a ="?pagina=".$_GET['pagina'];
		$a .="&view=".$_GET['view'];
		//filtro de Nombre
		if(isset($Inicia) && $Inicia != ''){     $a .= "&Inicia=".$Inicia ;     }else{      $a .= "";  }
		if(isset($Termina) && $Termina != ''){   $a .= "&Termina=".$Termina ;   }else{      $a .= "";  }
		if(isset($Tipo) && $Tipo != ''){         $a .= "&Tipo=".$Tipo ;         }else{      $a .= "";  }

		
	header( 'Location: admin_llamadas.php'.$a );
	die;	



?>