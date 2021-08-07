<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridCalendarioad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['idCalendario']) )   $idCalendario    = $_POST['idCalendario'];
	if ( !empty($_POST['idSistema']) )      $idSistema       = $_POST['idSistema'];
	if ( !empty($_POST['Ano']) )            $Ano             = $_POST['Ano'];
	if ( !empty($_POST['Mes']) )            $Mes             = $_POST['Mes'];
	if ( !empty($_POST['Dia']) )            $Dia             = $_POST['Dia'];
	if ( !empty($_POST['N_Semana']) )       $N_Semana 	     = $_POST['N_Semana'];
	if ( !empty($_POST['Fecha']) )          $Fecha 	         = $_POST['Fecha'];
	if ( !empty($_POST['Titulo']) )         $Titulo 	     = $_POST['Titulo'];
	if ( !empty($_POST['Cuerpo']) )         $Cuerpo 	     = $_POST['Cuerpo'];
	if ( !empty($_POST['idUsuario']) )      $idUsuario 	     = $_POST['idUsuario'];

/*******************************************************************************************************************/
/*                                      Verificacion de los datos obligatorios                                     */
/*******************************************************************************************************************/

	//limpio y separo los datos de la cadena de comprobacion
	$form_obligatorios = str_replace(' ', '', $form_obligatorios);
	$piezas = explode(",", $form_obligatorios);
	//recorro los elementos
	foreach ($piezas as $valor) {
		//veo si existe el dato solicitado y genero el error
		switch ($valor) {
			case 'idCalendario':  if(empty($idCalendario)){   $error['idCalendario']   = 'error/No ha ingresado el id';}break;
			case 'idSistema':     if(empty($idSistema)){      $error['idSistema']      = 'error/No ha seleccionado el sistema';}break;
			case 'Ano':           if(empty($Ano)){            $error['Ano']            = 'error/No ha ingresado el año';}break;
			case 'Mes':           if(empty($Mes)){            $error['Mes']            = 'error/No ha ingresado el mes';}break;
			case 'Dia':           if(empty($Dia)){            $error['Dia']            = 'error/No ha ingresado el Dia';}break;
			case 'N_Semana':      if(empty($N_Semana)){       $error['N_Semana']       = 'error/No ha ingresado el Numero de Semana';}break;
			case 'Fecha':         if(empty($Fecha)){          $error['Fecha']          = 'error/No ha ingresado la Fecha';}break;	
			case 'Titulo':        if(empty($Titulo)){         $error['Titulo']         = 'error/No ha ingresado el titulo';}break;
			case 'Cuerpo':        if(empty($Cuerpo)){         $error['Cuerpo']         = 'error/No ha ingresado el cuerpo del evento';}break;
			case 'idUsuario':     if(empty($idUsuario)){      $error['idUsuario']      = 'error/No ha ingresado el usuario';}break;
			
			
		}
	}
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':

		
			if(isset($Fecha) && $Fecha != ''){ 
				$Ano       = ano_transformado($Fecha);
				$Mes       = mes_transformado($Fecha);
				$Dia       = dia_transformado($Fecha);
				$N_Semana  = semana_transformado($Fecha);
				
			}else{
				$error['Fecha']       = 'error/No ha ingresado la fecha';
			}
		
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idSistema) && $idSistema != ''){     $a  = "'".$idSistema."'" ;   }else{$a  = "''";}
				if(isset($Ano) && $Ano != ''){                 $a .= ",'".$Ano."'" ;        }else{$a .= ",''";}
				if(isset($Mes) && $Mes != ''){                 $a .= ",'".$Mes."'" ;        }else{$a .= ",''";}
				if(isset($Dia) && $Dia != ''){                 $a .= ",'".$Dia."'" ;        }else{$a .= ",''";}
				if(isset($N_Semana) && $N_Semana != ''){       $a .= ",'".$N_Semana."'" ;   }else{$a .= ",''";}
				if(isset($Fecha) && $Fecha != ''){             $a .= ",'".$Fecha."'" ;      }else{$a .= ",''";}
				if(isset($Titulo) && $Titulo != ''){           $a .= ",'".$Titulo."'" ;     }else{$a .= ",''";}
				if(isset($Cuerpo) && $Cuerpo != ''){           $a .= ",'".$Cuerpo."'" ;     }else{$a .= ",''";}
				if(isset($idUsuario) && $idUsuario != ''){     $a .= ",'".$idUsuario."'" ;  }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `calendario_listado` (idSistema, Ano, Mes, Dia, N_Semana, Fecha, Titulo, Cuerpo, idUsuario) 
				VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;	
/*******************************************************************************************************************/		
		case 'update':	
		
			if(isset($Fecha) && $Fecha != ''){ 
				$Ano       = ano_transformado($Fecha);
				$Mes       = mes_transformado($Fecha);
				$Dia       = dia_transformado($Fecha);
				$N_Semana  = semana_transformado($Fecha);
				
			}else{
				$error['Fecha']       = 'error/No ha ingresado la fecha';
			}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idCalendario='".$idCalendario."'" ;
				if(isset($idSistema) && $idSistema != ''){   $a .= ",idSistema='".$idSistema."'" ;}
				if(isset($Ano) && $Ano != ''){               $a .= ",Ano='".$Ano."'" ;}
				if(isset($Mes) && $Mes != ''){               $a .= ",Mes='".$Mes."'" ;}
				if(isset($Dia) && $Dia != ''){               $a .= ",Dia='".$Dia."'" ;}
				if(isset($N_Semana) && $N_Semana != ''){     $a .= ",N_Semana='".$N_Semana."'" ;}
				if(isset($Fecha) && $Fecha != ''){           $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Titulo) && $Titulo != ''){         $a .= ",Titulo='".$Titulo."'" ;}
				if(isset($Cuerpo) && $Cuerpo != ''){         $a .= ",Cuerpo='".$Cuerpo."'" ;}
				if(isset($idUsuario) && $idUsuario != ''){   $a .= ",idUsuario='".$idUsuario."'" ;}
				
				// inserto los datos de registro en la db
				$query  = "UPDATE `calendario_listado` SET ".$a." WHERE idCalendario = '$idCalendario'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	

						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `calendario_listado` WHERE idCalendario = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;											
/*******************************************************************************************************************/
	}
?>
