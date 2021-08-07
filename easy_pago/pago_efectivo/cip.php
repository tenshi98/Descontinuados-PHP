<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PagoEfectivo - Comprar Recarga</title>
<link href="css/estilo.css"     rel="stylesheet" type="text/css" />
<link href="images/favicon.ico" rel="icon"       type="image/x-icon">

</head>

<body onload="MM_preloadImages('images/inicio_up.png')">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top">
		<table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="220" height="150" align="center"><img src="images/logo.png" height="100" /></td>
        <td width="770" valign="top">
			<?php require_once 'core/menu.php';?>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" bgcolor="#b91026"><table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center">
			<table width="90%" border="0" cellpadding="0" cellspacing="0" class="tab_bca esquina_red">
          <tr>
            <td align="center"><!-- Do not change the code! -->
              <table align="center" width="500" border="0" cellspacing="0" cellpadding="0">
				

  <div class="bootstrap pspagoefectivo">
<?php error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    require_once('lib_pagoefectivo/code/PagoEfectivo.php');
    require_once('lib_pagoefectivo/code/be/be_solicitud.php');

    /*****************************************DATOS DE PRUEBA*******************************************************************/
    date_default_timezone_set('America/Lima');
    $paymentRequest = new BEGenRequest();
    $paymentRequest->_moneda            = PE_MONEDA;// 1 soles - 2 dolares;
    $paymentRequest->_monto             = number_format($_POST['t-total'], 2, '.', '');
    $paymentRequest->_medio_pago        = PE_MEDIO_PAGO;
    $paymentRequest->_cod_servicio      = PE_MERCHAND_ID;
    $paymentRequest->_numero_orden      = 'p'.rand(1,100).date('dmYHis');
    $paymentRequest->_concepto_pago     = PE_COMERCIO_CONCEPTO_PAGO . ": Orden " .$paymentRequest->_numero_orden; // Debe ser menos de 20 dígitos.
    $paymentRequest->_email_comercio    = PE_EMAIL_PORTAL;
    $paymentRequest->_fecha_expirar     = date('d/m/Y H:i:s', time() + ((int)PE_TIEMPO_EXPIRACION * 60 * 60));//Este valor debe ser dinamico
    $paymentRequest->_usuario_nombre    = $_POST['user_name'];
    //$paymentRequest->_usuario_apellidos = "demo pagoefectivo";
    $paymentRequest->_usuario_email     = $_POST['user_email'];
    /************************************************************************************************************/

    /*****************************************GENERAR CIP DE PAGOEFECTIVO********************************************************/
	$pagoefectivo = new App_Service_PagoEfectivo();
    $paymentResponse = $pagoefectivo->GenerarCip($paymentRequest);
    /************************************************************************************************************/

    /*****************************************RECUPERAR DATOS DE LA ORDEN********************************************************/
    //$Token = $paymentResponse->Token;
    $numCip = $paymentResponse->CIP->NumeroOrdenPago;
    //$numOrden = $paymentResponse->CodTrans;
    //$codBarras = $pagoefectivo->getCodigoBarra($numCip);
    /************************************************************************************************************/

    /*****************************************MOSTRAR EL CIP DE PAGOEFECTIVO SEGÚN MODALIDAD DE INTEGRACIÓN***********************/
 	if($paymentResponse->Estado > 0 ){//} && $paymentRequest->Token){
      if(PE_MOD_INTEGRACION == 1){
      	  $iframe = PE_WSGENPAGOIFRAME . '?Token=' . $paymentResponse->Token;
          echo '<center><iframe src="' . $iframe . '" width="1000"  height="1209" frameborder="no"  style="border:1px solid #000000;"></iframe></center>';
      }
      else{
          $redirect = PE_WSGENPAGO . '?Token=' . $paymentResponse->Token;
          header('Location: '.$redirect);
      }
    }
    else if($paymentResponse->Estado == 0) echo $paymentResponse->Mensaje;
    else if($paymentResponse->Estado == -1) echo "Hubo problemas al realizar la transacción";
    /************************************************************************************************************/
    //Conecto a la base de datos externa
	function conectar2 ($servidor, $usuario, $pass, $base) {
		$db_con = mysql_connect ($servidor,$usuario,$pass);
		if (!$db_con) return false; 
		if (!mysql_select_db ($base, $db_con)) return false;
		if (!mysql_query("SET NAMES 'utf8'")) return false;
		return $db_con; 
	}
	$dbConn2 = conectar2("localhost","root","petland","easy_pago");
	//inserto los datos
	$Fecha = date('Y-m-j');
	if(isset($_POST['user_id']) && $_POST['user_id'] != ''){        $a  = "'".$_POST['user_id']."'" ;      }else{$a  = "''";}
	if(isset($_POST['t-total']) && $_POST['t-total'] != ''){        $a .= ",'".$_POST['t-total']."'" ;     }else{$a .= ",''";}
	if(isset($Fecha) && $Fecha != ''){                              $a .= ",'".$Fecha."'" ;                }else{$a .= ",''";}
	if(isset($_POST['user_phone']) && $_POST['user_phone'] != ''){  $a .= ",'".$_POST['user_phone']."'" ;  }else{$a .= ",''";}
	if(isset($numCip) && $numCip != ''){                            $a .= ",'".$numCip."'" ;               }else{$a .= ",''";}
	$a .= ",'1'" ;
	
	$query  = "INSERT INTO `clientes_pago_efectivo` (idCliente, Monto, Fecha, Fono, Cip, Estado)VALUES ({$a})";
	$result = mysql_query($query, $dbConn2);


?>
</div>


				
              </table>
          </tr>
        </table>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
  <?php require_once 'core/footer.php';?>
</table>
<blockquote>&nbsp;</blockquote>
</body>
</html>



  
