<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                                  Funciones                                                      */
/*******************************************************************************************************************/
//Agrega un separador de valores
function Cantidades_cd($valor){	

 return number_format($valor,3,',','.');

}
/*******************************************************************************************************************/
//Agrega un separador de valores
function Cantidades_sd($valor){	

 return number_format($valor,0,',','.');

}
/*******************************************************************************************************************/
//reduce la cantidad de caracteres
function cortar($texto, $cuantos)
{
  if (strlen($texto) <= $cuantos) return $texto;
  return substr($texto, 0, $cuantos) . '...';
}
/*******************************************************************************************************************/
// Muestra la fecha completa en el navegador
function Fecha_completa($IngresoFecha){	
$mes_c = new DateTime($IngresoFecha);
$dia = $mes_c->format('d');
$me = $mes_c->format('m');
$agno = $mes_c->format('Y');
$mes='';
if($me=='01') $mes='enero';
if($me=='02') $mes='febrero';
if($me=='03') $mes='marzo';
if($me=='04') $mes='abril';
if($me=='05') $mes='mayo';
if($me=='06') $mes='junio';
if($me=='07') $mes='julio';
if($me=='08') $mes='agosto';
if($me=='09') $mes='septiembre';
if($me=='10') $mes='octubre';
if($me=='11') $mes='noviembre';
if($me=='12') $mes='diciembre';
$cadena = ("$mes ") ;
$cadena .=  ("$dia del ");
$cadena .= ("$agno");
return $cadena;
}
/*******************************************************************************************************************/
//Muestra el dia en el navegador
function Fecha_dia($Ingresodia){	
$dia1 = new DateTime($Ingresodia);
$dia = $dia1->format('d');
$cadena =  ("$dia");
return $cadena;
}
/*******************************************************************************************************************/
// Muestra la fecha completa en el navegador
function Fecha_estandar($IngresoFecha){	
$mes_c = new DateTime($IngresoFecha);
$dia = $mes_c->format('d');
$me = $mes_c->format('m');
$agno = $mes_c->format('Y');
$mes='';
if($me=='01') $mes='01';
if($me=='02') $mes='02';
if($me=='03') $mes='03';
if($me=='04') $mes='04';
if($me=='05') $mes='05';
if($me=='06') $mes='06';
if($me=='07') $mes='07';
if($me=='08') $mes='08';
if($me=='09') $mes='09';
if($me=='10') $mes='10';
if($me=='11') $mes='11';
if($me=='12') $mes='12';
$cadena =  ("$dia-");
$cadena .= ("$mes-") ;
$cadena .= ("$agno");
return $cadena;
}
/*******************************************************************************************************************/
//Muestra el mes completo en el navegador
function Fecha_mes($Ingresomes){	
$mes_mes = new DateTime($Ingresomes);
$me = $mes_mes->format('m');
$mes='';
if($me=='01') $mes='Enero';
if($me=='02') $mes='Febrero';
if($me=='03') $mes='Marzo';
if($me=='04') $mes='Abril';
if($me=='05') $mes='Mayo';
if($me=='06') $mes='Junio';
if($me=='07') $mes='Julio';
if($me=='08') $mes='Agosto';
if($me=='09') $mes='Septiembre';
if($me=='10') $mes='Octubre';
if($me=='11') $mes='Noviembre';
if($me=='12') $mes='Diciembre';
$cadena = ("$mes");
return $cadena;
}
/*******************************************************************************************************************/
//Muestra solo las primeras 3 letras del mes en el navegador
function Fecha_mes_c($Ingresomes_c){	
$mes_mes_c = new DateTime($Ingresomes_c);
$me = $mes_mes_c->format('m');
$mes='';
if($me=='01') $mes='Ene';
if($me=='02') $mes='Feb';
if($me=='03') $mes='Mar';
if($me=='04') $mes='Abr';
if($me=='05') $mes='May';
if($me=='06') $mes='Jun';
if($me=='07') $mes='Jul';
if($me=='08') $mes='Ago';
if($me=='09') $mes='Sep';
if($me=='10') $mes='Oct';
if($me=='11') $mes='Nov';
if($me=='12') $mes='Dic';
$cadena = ("$mes");
return $cadena;
}
/*******************************************************************************************************************/
// Muestra el mes segido del año designado
function Fecha_mes_año($IngresoFecha){	
$mes_c = new DateTime($IngresoFecha);
$me = $mes_c->format('m');
$agno = $mes_c->format('Y');
$mes='';
if($me=='01') $mes='enero';
if($me=='02') $mes='febrero';
if($me=='03') $mes='marzo';
if($me=='04') $mes='abril';
if($me=='05') $mes='mayo';
if($me=='06') $mes='junio';
if($me=='07') $mes='julio';
if($me=='08') $mes='agosto';
if($me=='09') $mes='septiembre';
if($me=='10') $mes='octubre';
if($me=='11') $mes='noviembre';
if($me=='12') $mes='diciembre';
$cadena = ("$mes del ") ;
$cadena .= ("$agno");
return $cadena;
}
/*******************************************************************************************************************/
//Muestra el valor numerico correspondiente al mes seleccionado
function Fecha_mes_n($Ingresomes_c){	
$mes_mes_c = new DateTime($Ingresomes_c);
$me = $mes_mes_c->format('m');
$mes='';
if($me=='01') $mes='01';
if($me=='02') $mes='02';
if($me=='03') $mes='03';
if($me=='04') $mes='04';
if($me=='05') $mes='05';
if($me=='06') $mes='06';
if($me=='07') $mes='07';
if($me=='08') $mes='08';
if($me=='09') $mes='09';
if($me=='10') $mes='10';
if($me=='11') $mes='11';
if($me=='12') $mes='12';
$cadena = ("$mes");
return $cadena;
}
/*******************************************************************************************************************/
// Muestra solo el año en el navegador
function Fecha_año($IngresoFecha){	
$mes_c = new DateTime($IngresoFecha);
$agno = $mes_c->format('Y');
return $agno;
}
/*******************************************************************************************************************/
//Agrega ceros a un numero designado
function n_doc($valor){	

	return str_pad($valor, 8, "0", STR_PAD_LEFT);

}
/*******************************************************************************************************************/
//Agrega un separador de valoresjunto con dos decimales
function Valores_cd($valor){	

 return '$ '.number_format($valor,2,',','.');

}
/*******************************************************************************************************************/
//Agrega un separador de valores
function Valores_sd($valor){	

 return '$ '.number_format($valor,0,',','.');

}
/*******************************************************************************************************************/
//Devuelve la hora programada
function Hora_prog($valor){	

 return date("H:i", strtotime($valor));

}
/*******************************************************************************************************************/
//Se encarga de generar un array multinivel
function filtrar(&$array, $clave_orden ) {
  $array_filtrado = array(); 
  foreach($array as $index=>$array_value) {
    $value = $array_value[$clave_orden];
    unset($array_value[$clave_orden]);
	$array_filtrado[$value][] = $array_value;
  }
  $array = $array_filtrado; 
}
/*******************************************************************************************************************/
//Se encarga de generar un array multinivel
function filtrar2(&$array, $clave_orden1, $clave_orden2 ) {
  $array_filtrado = array(); 
  foreach($array as $index=>$array_value) {
    $value1 = $array_value[$clave_orden1];
	$value2 = $array_value[$clave_orden2];
    unset($array_value[$clave_orden1]);
	unset($array_value[$clave_orden2]);
	$array_filtrado[$value1][$value2][] = $array_value;
  }
  $array = $array_filtrado; 
}
/*******************************************************************************************************************/
//Muestra solo las primeras 3 letras del mes en el navegador
function Numero_a_mes($Ingresomes_c){	
$me = $Ingresomes_c;
if($me=='01') $mes='Ene';
if($me=='02') $mes='Feb';
if($me=='03') $mes='Mar';
if($me=='04') $mes='Abr';
if($me=='05') $mes='May';
if($me=='06') $mes='Jun';
if($me=='07') $mes='Jul';
if($me=='08') $mes='Ago';
if($me=='09') $mes='Sep';
if($me=='10') $mes='Oct';
if($me=='11') $mes='Nov';
if($me=='12') $mes='Dic';
$cadena = ("$mes");
return $cadena;
} 
/*******************************************************************************************************************/
//Funcion para devolver horas
function minutos2horas($mins) {
if ($mins < 0)
	$min = abs($mins);
else
	$min = $mins;
 
$h = floor($min / 60);
$m = ($min - ($h * 60)) / 100;
$horas = $h + $m;
 
if ($mins < 0)
	$horas *= -1;

$sep = explode('.', $horas);
$h = $sep[0];
if (empty($sep[1]))
	$sep[1] = 00;
	$m = $sep[1];
 
if (strlen($m) < 2)
	$m = $m . 0;
return $h.':'.$m;
    }
/*******************************************************************************************************************/
//Funcion para dividir horas
function divHoras($hora,$registros) {
	$h1=substr($hora,0,-3);
    $m1=substr($hora,3,2);
    $minutos=(($h1*60)*60)+($m1*60);
    $dif=$minutos/$registros;
    $difm=floor($dif/60);
	return $difm;
	 
}
/*******************************************************************************************************************/
//Transforma valores a porcentaje
function porcentaje($valor){	
 $porcentaje = $valor *100;
 return number_format($porcentaje,0,',','.').' %';

}
?>