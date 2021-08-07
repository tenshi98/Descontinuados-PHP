<?php
/*******************************************************************************************************************/
/*                                                                                                                 */
/*                                  xxxxxxxx       xxx        xxx     xxxxxxxx                                     */
/*                                  xx      xx      xx        xx      xx      xx                                   */
/*                                  xx       xx     xx        xx      xx       xx                                  */
/*                                  xx       xx     xx        xx      xx       xx                                  */
/*                                  xx      xx      xx        xx      xx      xx                                   */
/*                                  xxxxxxx         xxxxxxxxxxxx      xxxxxxx                                      */
/*                                  xx              xx        xx      xx                                           */
/*                                  xx              xx        xx      xx                                           */
/*                                  xx              xx        xx      xx                                           */
/*                                  xx              xx        xx      xx                                           */
/*                                 xxxx            xxx        xxx    xxxx                                          */
/*                                                                                                                 */
/*******************************************************************************************************************/
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                                  Funciones                                                      */
/*******************************************************************************************************************/
//Generar un password aleatorio
function genera_password($longitud,$tipo="alfanumerico"){
 
if ($tipo=="alfanumerico"){
$exp_reg="[^A-Z0-9]";
} elseif ($tipo=="numerico"){
$exp_reg="[^0-9]";
}
 
return substr(eregi_replace($exp_reg, "", md5(time())) .
eregi_replace($exp_reg, "", md5(time())) .
eregi_replace($exp_reg, "", md5(time())),
0, $longitud);
}
/*******************************************************************************************************************/
//Generar un password aleatorio
function ValidaPatente($patente){
	//elimino los posibles guones
	$value = str_replace("-","",$patente);
 	//caracteres admitidos
 	$regex = '/^[a-z]{2}[\.\- ]?[0-9]{2}[\.\- ]?[0-9]{2}|[b-d,f-h,j-l,p,r-t,v-z]{2}[\-\. ]?[b-d,f-h,j-l,p,r-t,v-z]{2}[\.\- ]?[0-9]{2}$/i';
	//valida formato
	if (preg_match($regex, $patente)){
	  return "";
	}else{
	  return "Patente incorrecta o con formato incorrecto";
	}
}
/*******************************************************************************************************************/
//Se verifica el largo o el corto de las palabras
function palabra_largo($variable,$largo){
	if (strlen($variable) > $largo) { 
   			$var	    = 'La patente debe tener no mas de '.$largo.' caracteres';
			return $var;
	}
}
/*******************************************************************************************************************/
//Se verifica el largo o el corto de las palabras
function palabra_corto($variable,$largo){
	if (strlen($variable) < $largo) { 
   			$var	    = 'La patente debe tener no menos de '.$largo.' caracteres';
			return $var;
	}
}
/*******************************************************************************************************************/
// Muestra la fecha completa en el navegador
function Fecha_estandar($IngresoFecha){	
if($IngresoFecha==''){
	return 0;
}else{
	$date = date_create($IngresoFecha);
	return date_format($date, 'd-m-Y');
	}
}
/*******************************************************************************************************************/
// Transforma el texto a letras mayusculas
function Texto_en_Mayuscula($texto){	
	$str = strtoupper($texto);
	return $str;
}
/*******************************************************************************************************************/
//Agrega un separador de valores
function Valores_sd($valor){	

 return '$ '.number_format($valor,0,',','.');

}



?>