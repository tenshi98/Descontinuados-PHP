<?php include("../demo/MasterPage.php") ?>
  <div class="bootstrap pspagoefectivo">
      <div class="page-head">
          <ul class="breadcrumb page-breadcrumb">
              <li class="breadcrumb-current">
                  <i class="icon-AdminParentModules"></i>
              </li>
          </ul>
          <h2 class="page-title">
              Generar Cip: Respuesta Pago Efectivo
          </h2>

      </div>
  </div>
  <div class="bootstrap pspagoefectivo">
<?php error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    require_once('../lib_pagoefectivo/code/PagoEfectivo.php');
    require_once('../lib_pagoefectivo/code/be/be_solicitud.php');

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
    $paymentRequest->_usuario_nombre    = "prueba";
    $paymentRequest->_usuario_apellidos = "demo pagoefectivo";
    $paymentRequest->_usuario_email     = PE_EMAIL_CONTACTO;
    /************************************************************************************************************/

    /*****************************************GENERAR CIP DE PAGOEFECTIVO********************************************************/
	$pagoefectivo = new App_Service_PagoEfectivo();
    $paymentResponse = $pagoefectivo->GenerarCip($paymentRequest);
    /************************************************************************************************************/

    /*****************************************RECUPERAR DATOS DE LA ORDEN********************************************************/
    //$Token = $paymentResponse->Token;
    //$numCip = $paymentResponse->CIP->NumeroOrdenPago;
    //$numOrden = $paymentResponse->CodTrans;
    //$codBarras = $pagoefectivo->getCodigoBarra($numCip);
    /************************************************************************************************************/

    /*****************************************MOSTRAR EL CIP DE PAGOEFECTIVO SEGÚN MODALIDAD DE INTEGRACIÓN***********************/
 	if($paymentResponse->Estado > 0 ){//} && $paymentRequest->Token){
      if(PE_MOD_INTEGRACION == 1){
      	  $iframe = PE_WSGENPAGOIFRAME . '?Token=' . $paymentResponse->Token;
          echo '<center><iframe src="' . $iframe . '" width="900"  height="1209" frameborder="no"  style="border:1px solid #000000;"></iframe></center>';
      }
      else{
          $redirect = PE_WSGENPAGO . '?Token=' . $paymentResponse->Token;
          header('Location: '.$redirect);
      }
    }
    else if($paymentResponse->Estado == 0) echo $paymentResponse->Mensaje;
    else if($paymentResponse->Estado == -1) echo "Hubo problemas al realizar la transacción";
    /************************************************************************************************************/
?>
<?php include("../demo/FooterPage.php") ?>