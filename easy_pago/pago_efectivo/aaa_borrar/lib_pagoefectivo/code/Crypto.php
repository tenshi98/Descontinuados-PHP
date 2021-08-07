<?php
require_once('Service.php');
class App_Service_Crypto extends App_Service {
    const E_NO_SECURITY_PATH = 'Security Path not assign';
    protected $_options = array('securityPath' =>  'key',
    				'publicKey' => 'public.key',
				'privateKey' => 'private.key');
        
    protected $_fileCache = array();
    /*
     * Constructor de la aplicación
     * @param string $securityPath Carpeta donde se almacenan public.key y private.key
     */
    public function __construct($options = null)
    {
        if (isset($options))
            $this->_options = array_merge($this->_options, $options);
    }
    /*
     * Encriptar de la cadena por webservice
     * @param string @string Cadena a encriptar
     */
    public function encrypt($string)
    {
        $info = $this->_loadService('EncryptText', array('plainText' => $string, 'publicKey' => $this->getPublicKey()));
        
        return ($info!==false) ? $info->EncryptTextResult : false;
    }
    
    /*
     * Descriptar cadena por webservice
     * @param string $string Cadena a encriptar
     * @return 
     */ 
    public function decrypt($string)
    {
        $info = $this->_loadService('DecryptText', array('encryptText' => $string, 'privateKey' => $this->getPrivateKey()));   	        
        return ($info!==false) ? $info->DecryptTextResult : false;
    }

    /*
     * Firma de texto
     * @param string $string Palabra a firmar
     * @return Cadena firmada
     */
    public function signer($string)
    {
        $info = $this->_loadService('Signer', array('plainText' => $string, 'privateKey' => $this->getPrivateKey()));
       
        return ($info!==false) ? $info->SignerResult : false;
    }
    
    /*
     * Valida si un texto esta correctamente firmado
     */
    public function signerVal($text, $signerText)
    {
        $info = $this->_loadService('SignerVal', array('plainText' => $text,
						       'signerText' => $signerText,
						       'publicKey' => $this->getPublicKey()));
        return ($info!==false) ? $info : false;
    }

    /*
     * Extraer la llave privada 
     */
    public function getPrivateKey()
    {
        return $this->_readFile($this->_options['securityPath'] . '/' . $this->_options['privateKey']);
    }

    /*
     * Extraer la llave pública
     */
    public function getPublicKey()
    {
        return $this->_readFile($this->_options['securityPath'] . '/' . $this->_options['publicKey']);
    }
    
    /*
     * Extraer el contendio de archivo
     */
    public function _readFile($filename)
    {
        /*if (!$contents = $this->_fileCache[$filename]){
            $handle = fopen($filename, "r");
            $contents = fread($handle, filesize($filename));
            fclose($handle);
            $this->_fileCache[$filename] = $contents;
        }
        return $contents;*/
		if (!array_key_exists($filename,$this->_fileCache))
		{
			$handle = fopen($filename,'r');
			$contents = fread($handle, filesize($filename));
			fclose($handle);
			$this->_fileCache[$filename] = $contents;
		}else{
			$contents = $this->_fileCache[$filename];
		}
		return $contents;
    }
    
    /*
    *  Para el envio del parametro de la imagen del codigo de Barras para la modalidad 1     
     */
    public function codifica($string)
    {
        $info = $this->_loadService('BlackBox', array('Cad' => $string));        
        return ($info!==false) ? $info->BlackBoxResult : false;
    }
  }
?>