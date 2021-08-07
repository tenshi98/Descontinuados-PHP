<?php
require_once('Solicitud.php');
require_once('Crypto.php');
class App_Service_PagoEfectivo extends App_Service {
    public static $_instance;

    protected $_options = array('apiKey' => PE_MERCHAND_ID,
                'url2' => PE_WSGENCIP,
				'crypto' => array('securityPath' => PE_SECURITY_PATH,
						  'publicKey' => PE_PUBLICKEY,
						  'privateKey' => PE_PRIVATEKEY,
						  'url' => PE_WSCRYPTA),
				 'gen' => array('url' => PE_WSGENPAGO),
				 'mailAdmin' =>	PE_EMAIL_CONTACTO,
				 'medioPago' => PE_MEDIO_PAGO,
         //                        'imgbarra' =>PE_WSCIPIMG
	                        );
    protected $_crypto;
    protected $_lastPayRequest;

    /*
     * Constructor de la aplicación
     * @param string $securityPath Carpeta donde se almacenan public.key y private.key
     */
    public function __construct($options = null)
    {
        if (isset($options))
            $this->_options = array_merge($this->_options, $options);
        $this->_crypto =  App_Service_Crypto::getInstance($this->_options['crypto']);
    }

    /*
     * Enviar Pago
     * @param entity $be_solicitud Class de envio de solicitud de pago para generar el XML
     * @return SimpleXMLElement Resultado de Servicio Ejm:
     * SimpleXMLElement Object
     * (
     *     [iDResSolPago] => 33
     *     [CodTrans] => 3300020
     *     [Token] => 2a3848a4-183a-490c-813a-40d90e82ef96
     *     [Fecha] => 21/02/2012 11:26:27 a.m.
     * )
     */
    public function GenerarCip($be_solicitud)
    {
		$xml = new App_Service_PagoEfectivo_Solicitud();
        $xml->convertToXml($be_solicitud);
        return $this->solicitarPago($xml);
    }

    /*
     * Solicitar Pago
     * @param string $xml XML de envio de solicitud de pago
     * @return SimpleXMLElement Resultado de Servicio Ejm:
     * SimpleXMLElement Object
     * (
     *     [iDResSolPago] => 33
     *     [CodTrans] => 3300020
     *     [Token] => 2a3848a4-183a-490c-813a-40d90e82ef96
     *     [Fecha] => 21/02/2012 11:26:27 a.m.
     * )
     */
    public function solicitarPago( $xml )
    {
		$info = $this->_loadService('GenerarCIPMod1',
			array('request' =>
			array('CodServ' => $this->_options['apiKey'],
				'Firma' => $this->_crypto->signer($xml),
				'Xml' => $this->_crypto->encrypt($xml))));
		if($info != false) {$info = $info->GenerarCIPMod1Result;
           if ($info->Estado != 1) throw new Exception('Pago Efectivo : ' . $info->Mensaje);
           $a = simplexml_load_string($this->_crypto->decrypt($info->Xml));
           $a->Mensaje = $info->Mensaje;
           $a->Estado = $info->Estado;
           return $a;
        }
    }
	
	/*
     * Consultar Pago
     * @param string $xml XML de envio de solicitud de pago
     * @return SimpleXMLElement Resultado de Servicio Ejm:
     */
    public function consultarCip($CIP)
    {        
		$info = $this->_loadService('ConsultarCIPMod1',
                        array( 'request' =>
                        array('CodServ' =>$this->_options['apiKey'],
							  'Firma' => $this->_crypto->signer($CIP),
                              'CIPS' => 	$this->_crypto->encrypt((string)$CIP)
							)));
		
		
        if($info != false){
			$info = $info->ConsultarCIPMod1Result;
			//Desencriptar el xml de la consulta
			$xml = simplexml_load_string($this->desencriptarData($info->XML));
			$info->Estado = $info->Estado;
			$info->CIPs = $xml;
		}
		
        return $info;
    }

	/*
     * Consultar CIP por orden
     * @param string $xml XML de envio de solicitud de pago
     * @return SimpleXMLElement Resultado de Servicio Ejm:
     */
    public function consultarCipXOrden($Orden)
    {
        $info = $this->_loadService('ConsultarSolicitudPagov2',
                        array( 'request' =>
                        array('cServ' => 'ac7ef195-d3f6-46a5-931b-84f7b2937683',
                            'Xml' => '<?xml version="1.0" encoding="utf-8" ?><ConsultarPago><CodServicio>'.$this->_options['apiKey'].'</CodServicio><CodTransaccion>'.trim($Orden).'</CodTransaccion></ConsultarPago>')));
        if($info != false) $info = $info->ConsultarSolicitudPagov2Result;
        return $info;
    }
	/*
     * Actualizar CIP 
     * @param string $xml XML de envio de solicitud de pago
     * @return SimpleXMLElement Resultado de Servicio Ejm:
     */
    public function actualizarCip($CIP, $fecha)
    {
		date_default_timezone_set('America/Lima');
		$date = substr($fecha, 0, 10);
		$time = substr($fecha, 10);
		$afecha = explode("/", $date);
		$fecha = $afecha[2].'/'.$afecha[1].'/'.$afecha[0].$time;
		$date = strtotime($fecha);
		//$fecha = date('d/m/Y H:i:s a', $date);
		$fecha = date('c', $date);
		//var_dump($fecha);
        $info = $this->_loadService('ActualizarCIPMod1',
                        array( 'request' =>
                        array('CodServ' =>$this->_options['apiKey'],
							  'Firma' => $this->_crypto->signer($CIP),
                              'CIP' => 	$this->_crypto->encrypt((string)$CIP),
							  'FechaExpira' => $fecha
							)));

        if($info != false) $info = $info->ActualizarCIPMod1Result;
        return $info;
    }

    /*
     * Eliminar Pago
     * @param string $xml XML de envio de solicitud de pago
     * @return SimpleXMLElement Resultado de Servicio Ejm:
     */
    public function eliminarCip($CIP)
    {        
		$info = $this->_loadService('EliminarCIPMod1',
                        array( 'request' =>
                        array('CodServ' =>$this->_options['apiKey'],
							  'Firma' => $this->_crypto->signer($CIP),
                              'CIP' => 	$this->_crypto->encrypt((string)$CIP)
							)));
		
		
        if($info != false) $info = $info->EliminarCIPMod1Result;
        return $info;
    }

    
	
    /*
     *
     */
    public function consultarSolicitudPago($xml)
    {

        if (gettype($xml) == 'integer'){
            $xml = '<?xml version="1.0" encoding="utf-8" ?><ConsultarPago> <idResSolPago>'.$xml.'</idResSolPago></ConsultarPago>';
        }

        $info = $this->_loadService('ConsultarSolicitudPago',
                        array( 'request' =>
                        array('cServ' => $this->_options['apiKey'],
                            'CClave' => $this->_crypto->signer($xml),
                            'Xml' => $this->_crypto->encrypt($xml))));
        if($info != false) {$info = $info->ConsultarSolicitudPagoResult;

          if ($info->Estado != 1) throw new Exception('Pago Efectivo : ' . $info->Mensaje);
          return simplexml_load_string($this->_crypto->decrypt($info->Xml));
        }
    }

    public function desencriptarData($string)
    {
        return $this->_crypto->decrypt($string);
    }

    //Adicional para generar un log - pruebas locales de notificacion
    //Para generar una nueva linea en el archivo de LOG
        public function addRowFileLog($file, $data){
            $fp = fopen($file, 'a+') or die ("Error opening file in write mode!");

            fwrite($fp, str_pad($data, 55));
            fwrite($fp, "\n\r");
            fclose($fp);
        }

    //Para la modalidad 1
     //Obtener la imagen de codigo de barras
        public function getCodigoBarra($cip){
           $img = $this->_options['imgbarra'] . '?codigo=' . $this->_crypto->codifica('cip=' . $cip );
           return $img;
       }

}
?>