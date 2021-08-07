<?php
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/app_functions.php';
// obtengo puntero de conexion con la db
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                                        Aplicacion                                                              */
/**********************************************************************************************************************************/ 
// variable de error activa
$response = array("error" => TRUE);

//Compruebo si recibi los datos
if (isset($_POST['idCliente']) && isset($_POST['Fono']) ) {
	
    //Se crean las variables
    $idCliente      = $_POST['idCliente'];
    $Nombre         = $_POST['Nombre'];
    $Fono           = $_POST['Fono'];
    $TipoContacto   = $_POST['TipoContacto'];
    
    //Limpio el fono para la busqueda
    $Fono = str_replace("+569","",$Fono);
    $Fono = str_replace("569","",$Fono);
	$Fono = str_replace("+","",$Fono);
	$Fono = str_replace("*","",$Fono);
	$Fono = str_replace(" ","",$Fono);
    
	//busco los datos en la base de datos
	$query = "SELECT Fono
	FROM clientes_contactos 
	WHERE Fono = '{$Fono}' AND idCliente = '{$idCliente}'";
	$resultado = mysql_query ($query, $dbConn);
	$row_data = mysql_fetch_assoc ($resultado);
	
    //Si los datos existen envio mensaje de error
    if (isset($row_data)&&$row_data!='') {
        $response["error"] = TRUE;
        $response["error_msg"] = 'El numero '.$Fono.' ya existe, intentelo con otro contacto.';
        echo json_encode($response);
    
    //Si no existe se procede a registrar
    } else {
        
        //verifico que fono exista
        if (isset($Fono)&&$Fono!='') {
			
			//Verifico que el fono exista y guardo el GSM
			$query = "SELECT idCliente, GSM
			FROM clientes_listado 
			WHERE Fono1 LIKE '%{$Fono}%' OR Fono2 LIKE '%{$Fono}%' ";
			$resultado = mysql_query ($query, $dbConn);
			$row_cliente = mysql_fetch_assoc ($resultado);
			//Se crean los datos en relacion a los resultados
			if (isset($row_cliente)&&$row_cliente!='') {
				$Estado          = 'Registrado';       
				$GSM             = $row_cliente['GSM'];
				$idClienteMain   = $row_cliente['idCliente'];
			}else{
				$Estado          = 'No Registrado';       
				$GSM             = '';
				$idClienteMain   = '';
			}
		//si no existe guardo valores por defecto
		}else{
			$Estado          = 'No Registrado';       
			$GSM             = '';
			$idClienteMain   = '';
		}
 
        //creacion y modificacion de variables
		$fcreacion       = fechahora_actual();    //Se obtiene la fecha actual
		
    
        //filtros
		if(isset($idCliente) && $idCliente != ''){           $a  = "'".$idCliente."'" ;       }else{$a  = "''";}
		if(isset($Nombre) && $Nombre != ''){                 $a .= ",'".$Nombre."'" ;         }else{$a .= ",''";}
		if(isset($Fono) && $Fono != ''){                     $a .= ",'".$Fono."'" ;           }else{$a .= ",''";}
		if(isset($Estado) && $Estado != ''){                 $a .= ",'".$Estado."'" ;         }else{$a .= ",''";}
		if(isset($fcreacion) && $fcreacion != ''){           $a .= ",'".$fcreacion."'" ;      }else{$a .= ",''";}
		if(isset($GSM) && $GSM != ''){                       $a .= ",'".$GSM."'" ;            }else{$a .= ",''";}
		if(isset($idClienteMain) && $idClienteMain != ''){   $a .= ",'".$idClienteMain."'" ;  }else{$a .= ",''";}
		if(isset($TipoContacto) && $TipoContacto != ''){     $a .= ",'".$TipoContacto."'" ;  }else{$a .= ",''";}
	

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_contactos` (idCliente, Nombre, Fono, Estado, fcreacion, GSM, idClienteMain, TipoContacto )
		 VALUES ({$a})";
		$result = mysql_query($query, $dbConn);
		
		//busco los datos en la base de datos
		$query = "SELECT Fono
		FROM clientes_contactos 
		WHERE Fono = '{$Fono}' AND idCliente = '{$idCliente}'";
		$resultado = mysql_query ($query, $dbConn);
		$row_data = mysql_fetch_assoc ($resultado);

        //Si los datos existen los guardo dentro de un arreglo y los envio a traves de json
		if (isset($row_data)&&$row_data!='') {
            $response["error"] = FALSE;
            $response["contact_estado"] = $Estado;
            $response["GSM"] = $GSM;
            $response["idClienteMain"] = $idClienteMain;
			$response["error_msg"] = "Contacto creado correctamente";
			echo json_encode($response);        
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "un error ha ocurrido durante el registro, intentelo nuevamente mas tarde";
            echo json_encode($response);
            
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Datos requeridos (nombre, fono) inexistentes";
    echo json_encode($response);

}
    
?>
