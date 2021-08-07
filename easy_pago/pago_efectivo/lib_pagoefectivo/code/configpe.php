<?php
//Configuracion de entorno
define('PE_SERVER', 'http://pre.2b.pagoefectivo.pe/');

//Rutas de Webservices
define('PE_WSCRYPTA', PE_SERVER.'PagoEfectivoWSCrypto/WSCrypto.asmx?wsdl');
define('PE_WSGENCIP', PE_SERVER.'PagoEfectivoWSGeneralv2/service.asmx?wsdl');
//Presentacion de Genereacion de CIP
define('PE_WSGENPAGO', PE_SERVER.'GenPago.aspx');
define('PE_WSGENPAGOIFRAME', PE_SERVER.'GenPagoIF.aspx');

//Mail de la persona a la que le llegara el mail en la prueba de generacion de cip
define('PE_EMAIL_PORTAL', 'pepruebas@gmail.com');
//Este mail es de prueba, al final en vez de esta constante - se reemplazará con el mail del cliente
define('PE_EMAIL_CONTACTO','pepruebas@gmail.com');
//Tiempo en el que expira el código cip para pagarlo en el banco. Se mide en horas
define('PE_TIEMPO_EXPIRACION', '120');

//Este dato es unico por servicio - nosotros se lo proporcionaremos
define('PE_MERCHAND_ID', 'AZU');
//Nombre del portal para el concepto de Pago que acompaña al numero de pedido en el banco
define('PE_COMERCIO_CONCEPTO_PAGO', 'AZU');
//El dominio de pruebas o produccion al que solicitaron permisos por IP
define('PE_DOMINIO_COMERCIO','http://'.$_SERVER['SERVER_NAME'].'/');

define('PE_PATH',dirname(__FILE__) . DIRECTORY_SEPARATOR);

//Colocar la url de información
define('PE_URL_POPUP',PE_SERVER . 'CNT/QueEsPagoEfectivo.aspx?COD='.PE_MERCHAND_ID.'&mon=1');

//ubicacion y nombre de los archivos a usar
define('PE_SECURITY_PRIMARY_PATH',PE_PATH  ."../../tools/pagoefectivo/");
define('PE_SECURITY_PATH', '/var/www/html/easy_pago/pago_efectivo/lib_pagoefectivo/code/../../tools/pagoefectivo/AZU/keys/');

//Estos archivos se los enviara PagoEfectivo
//nombre del archivo clave publica de PagoEfectivo
define('PE_PUBLICKEY', 'SPE_PublicKey.1pz.1pz');
//nombre del archivo clave privada del comercio - cambiar con el prefijo de la llave - por el valor de MERCHAN_ID indicado
define('PE_PRIVATEKEY', '5a327db16e9759ab8501419169f25180.1pz');
define('PE_MONEDA','1'); // 1.- Soles   2.- Dolares
define('PE_MEDIO_PAGO','1,2');
define('PE_MOD_INTEGRACION', '1');
?>
