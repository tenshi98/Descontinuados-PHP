<?php
require_once('configpe.php');
abstract class App_Service
{
    protected $_options = array();
    protected static $_instance;
    /*
     * Ejecutar el servicio
     */
    public function _loadService($service, $data)
    {
        $this->_options['url2'] = PE_WSGENCIP;
        $this->_options['url3'] = PE_WSCRYPTA;

        switch($service){
            case 'GenerarCIPMod1':  $url = $this->_options['url2'];break;
			case 'ConsultarSolicitudPagov2':  $url = $this->_options['url2'];break;
			case 'ActualizarCIPMod1':  $url = $this->_options['url2'];break;
			case 'ConsultarCIPMod1':  $url = $this->_options['url2'];break;
			case 'EliminarCIPMod1':  $url = $this->_options['url2'];break;
            case 'BlackBox': $url = $this->_options['url3'];
                break;
            default :  $url = $this->_options['url']; break;
        }

        try{
            $soap = new SoapClient($url);
//var_dump($data); echo '<br><br>';
            $info = $soap->$service($data);
            return $info;
        } catch (Exception $e){
            echo $e->getMessage();
            return false;
        }
    }
    /*
     * Extraer una instancia de la aplicación
     * @param string $securityPath Carpeta donde se almacenan public.key y private.key
     * @return PagoEfectivo retorna la instancia de la clase
     */
    final public static function getInstance($options = null)
    {
        $class = self::getClass();
        if (!isset(self::$_instance[$class])) {
            self::$_instance[$class] = new $class($options);
        }
        return self::$_instance[$class];
    }

    /*
     * Captura el nombre de la clase
     */
    final public static function getClass()
    {
        if(function_exists('get_called_class')){
                        return get_called_class();
        }
               return App_Service_Crypto;
    }

    /*final public static function getClass(){
        return get_called_class();
    }*/
    public function getOptions()
    {
        return $this->_options;
    } 
}
?>
