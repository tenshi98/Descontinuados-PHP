<?php
class App_Service_PagoEfectivo_Solicitud
{
    protected $_xml;
    protected $_detail;
    protected $_params = array();
    /*
     * @constructor
     */
    public function __construct()
    {
	$this->_xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8" ?><SolPago></SolPago>');
    }

    /*
     * @destructor
     */
    public function __destruct()
    {
    	$this->_xml = null;
    }

    /*
     * Añade los tags iniciales del XML
     * @param array $contenido Contenido a añadir formato: array('tag' => 'valor')
     * @return PagoEfectivo_Solicitud el objeto contenedor
     */
    public function convertToXml($be_solicitud)
    {
        $contenido = array(
                    'IdMoneda' => $be_solicitud->_moneda,
                    'Total' =>$be_solicitud->_monto,
                    'MetodosPago' => $be_solicitud->_medio_pago,
                    'CodServicio' => $be_solicitud->_cod_servicio,
                    'Codtransaccion' => $be_solicitud->_numero_orden,
                    'EmailComercio' => $be_solicitud->_email_comercio,
                    'FechaAExpirar' => $be_solicitud->_fecha_expirar,
                    'UsuarioId' => $be_solicitud->_usuario_id,
                    'DataAdicional' => $be_solicitud->_data_adicional,
                    'UsuarioNombre' => $be_solicitud->_usuario_nombre,
                    'UsuarioApellidos' => $be_solicitud->_usuario_apellidos,
                    'UsuarioLocalidad' => $be_solicitud->_usuario_localidad,
                    'UsuarioProvincia' => $be_solicitud->_usuario_provincia,
                    'UsuarioPais' => $be_solicitud->_usuario_pais,
                    'UsuarioAlias' => $be_solicitud->_usuario_alias,
                    'UsuarioTipoDoc' => $be_solicitud->_usuario_tipodocumento,
                    'UsuarioNumeroDoc' => $be_solicitud->_usuario_numerodocumento,
                    'UsuarioEmail' => $be_solicitud->_usuario_email,
                    'ConceptoPago' => $be_solicitud->_concepto_pago,
                    );
    	if (is_array($contenido)) {
    	    foreach($contenido as $index => $value)
    		$this->_xml->addChild($index, $value);
    	}

        $detalle = array(array(
                    'Cod_Origen' => 'CT',
                    'TipoOrigen' => 'TO',
                    'ConceptoPago' => $be_solicitud->_concepto_pago,
                    'Importe' => $be_solicitud->_monto
                    ));
        if (is_array($detalle)){
            if (!isset($this->detail))
            $this->detail = $this->_xml->addChild('Detalles');
            foreach ($detalle as $row){
            $detail = $this->detail->addChild('Detalle');
                foreach ($row as $i => $d)
                    $detail->addChild($i, $d);
            }
        }
    	return $this;
    }


    /*
     * Añade los tags iniciales del XML
     * @param array $contenido Contenido a añadir formato: array('tag' => 'valor')
     * @return PagoEfectivo_Solicitud el objeto contenedor
     */
    public function addContenido($contenido)
    {
	if (is_array($contenido)) {
	    foreach($contenido as $index => $value)
		$this->_xml->addChild($index, $value);
	}
	return $this;
    }

    /*
     * Añade los tags iniciales del XML
     * @param array $contenido Contenido a añadir formato: array(array('tag' => 'valor', 'tag => 'valor', ...) ,  array('tag'=>'valor', 'tag' =>'valor))
     * @return PagoEfectivo_Solicitud el objeto contenedor
     */
    public function addDetalle($detalle)
    {
        if (is_array($detalle)){
            if (!isset($this->detail))
            $this->detail = $this->_xml->addChild('Detalles');
            foreach ($detalle as $row){
            $detail = $this->detail->addChild('Detalle');
                foreach ($row as $i => $d)
                    $detail->addChild($i, $d);
            }
        }
        return $this;
    }

    /*
     * Añade el parametro URL
     * @return PagoEfectivo_Solicitud el objeto contenedor
     */
    public function addParametroUrl($parametro)
    {
        return $this->addParam('URL', $parametro);
    }

    /*
     * Añade el parametro Email
     * @return PagoEfectivo_Solicitud el objeto contenedor
     */
    public function addParametroEmail($parametro)
    {
	return $this->addParam('Email', $parametro);
    }

    /*
     * Añade el parametro General
     * @return PagoEfectivo_Solicitud el objeto contenedor
     */
    public function addParam($paramName, $content)
    {
	if (is_array($content)){

	    if (!isset($this->_params[$paramName]))
		$this->_params[$paramName] = $this->_xml->addChild('Params' . $paramName);
	    foreach ($content as $i => $p){
		$param = $this->_params[$paramName]->addChild('Param' . $paramName);
		$param->addChild('Nombre',$i);
		$param->addChild('Valor',$p);

	    }
	}
	return $this;
    }
    public function toXml()
    {
	return $this->_xml->asXML();
    }
    function __toString(){
	return $this->toXml();
    }
}
?>