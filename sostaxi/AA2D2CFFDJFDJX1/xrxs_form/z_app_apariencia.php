<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if(isset($_GET['return1']))  {  $return1  = $_GET['return1'];  }
	if(isset($_GET['return2']))  {  $return2  = $_GET['return2'];  }
	if(isset($_GET['app_conf'])) {  $app_conf = $_GET['app_conf'];  }
	if(isset($_GET['table'])) {     $table    = $_GET['table'];  }
	if(isset($_GET['val'])) {       $val      = $_GET['val'];  }	

	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'table':

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				$return = '?ss=true';
				if(isset($return1)&&$return1!=''){     $return .= '&'.$return1.'=true';  }
				if(isset($return2)&&$return2!=''){     $return .= '&'.$return2.'=true';  }
				if(isset($app_conf)&&$app_conf!='') {  $return .= '&app_conf='.$app_conf;  }
				
				//por ultimo actualizo el estado de los ajustes generales
				$query  = "UPDATE `clientes_tipos` SET {$table} = '{$val}' WHERE idTipoCliente = {$app_conf} ";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.$return );
				die;
				
			}
	
		break;
						
						
/*******************************************************************************************************************/
	}
?>