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
//construye el listado de errores
function errors_list($errores){
	$despliegue = '<script type="text/javascript" src="assets/js/jquery.min.js"></script>
					<script type="text/javascript">
					$(document).ready(function() {
						setTimeout(function() {
							$(".div_alert").fadeOut(1500);
						},3000);
					});
					</script>';
	if (!empty($errores)) {  
		foreach ($errores as $mensaje) { 
			list($tipo, $error) = explode("/", $mensaje);
			$despliegue .= '<div class="alert_'.$tipo.' div_alert" >'.$error.'</div>';
		} 
	}	
	return $despliegue;
}
/*******************************************************************************************************************/
//esta funcion valida el email
function validaremail($email){ 
  if (!ereg("^([a-zA-Z0-9._]+)@([a-zA-Z0-9.-]+).([a-zA-Z]{2,4})$",$email)){ 
      return FALSE; 
  } else { 
       return TRUE; 
  } 
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
//Validador de RUT con digito verificador 
function RutValidate($rut) {
    $rut=str_replace('.', '', $rut);
    if (preg_match('/^(\d{1,9})-((\d|k|K){1})$/',$rut,$d)) {
        $s=1;$r=$d[1];for($m=0;$r!=0;$r/=10)$s=($s+$r%10*(9-$m++%6))%11;
        return chr($s?$s+47:75)==strtoupper($d[2]);
    }
}
/*******************************************************************************************************************/
//esta funcion valida si el dato ingresado es un numero
function validarnumero($numero){ 
	if($numero=='0'){
		
	}else{
		if(is_numeric($numero)) {
		   //si es un numero no dice nada
		} else {
			return TRUE;
		}
	}
  
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
//reduce la cantidad de caracteres
function cortar($texto, $cuantos)
{
  if (strlen($texto) <= $cuantos) return $texto;
  return substr($texto, 0, $cuantos) . '...';
}
/*******************************************************************************************************************/
// Muestra la fecha completa en el navegador
function Fecha_completa_alt($IngresoFecha){	
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
$cadena = ("$dia de ");
$cadena .=  ("$mes de ");
$cadena .= ("$agno");
return $cadena;
}
/*******************************************************************************************************************/
//Fecha actual
function fecha_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('UTC');
	//Imprimimos la fecha actual dandole un formato
	$fecha_actual = date("Y-m-d");
	return $fecha_actual; 
}
/*******************************************************************************************************************/
//Hora actual
function hora_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('UTC');
	//Imprimimos la fecha actual dandole un formato
	$hora_actual = date("H:i:s");
	return $hora_actual; 
}
/*******************************************************************************************************************/
//semana actual
function semana_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('UTC');
	//Imprimimos la fecha actual dandole un formato
	$semana_actual = date("W");
	return $semana_actual; 
}
/*******************************************************************************************************************/
//mes actual
function mes_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('UTC');
	//Imprimimos la fecha actual dandole un formato
	$mes_actual = date("n");
	return $mes_actual; 
}
/*******************************************************************************************************************/
//año actual
function ano_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('UTC');
	//Imprimimos la fecha actual dandole un formato
	$ano_actual = date("Y");
	return $ano_actual; 
}
/*******************************************************************************************************************/
//paginador
function paginador_1($total_paginas, $original, $search, $num_pag){
	$paginador='';
	

//Verifico si hay mas de una pagina, sino coulto el paginador
if($total_paginas>1){
//Cargamos la ubicacion original
$location = $original;
$location .='?pagina=';

$paginador .='<div class="row">
        <div class="contaux">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination menucent">';
                	if(($num_pag - 1) > 0) { 
                    	$paginador .='<li class="prev"><a href="'.$location.($num_pag-1).$search.'">← Anterior</a></li>';
                    } else {
                    	$paginador .='<li class="prev disabled"><a href="">← Anterior</a></li>';
                    } 
                    
                    if ($total_paginas>10){
						if(0>$num_pag-5){
							for ($i = 1; $i <= 10; $i++) { 
								if ($i==$num_pag){ $xx='class="active"';}else{ $xx='';}
								$paginador .='<li '.$xx.'><a href="'.$location.$i.$search.'">'.$i.'</a></li>';
							 }
						}elseif($total_paginas<$num_pag+5){
							for ($i = $num_pag-5; $i <= $total_paginas; $i++) {
								if ($i==$num_pag){ $xx='class="active"';}else{ $xx='';}
								$paginador .='<li '.$xx.'><a href="'.$location.$i.$search.'">'.$i.'</a></li>';
							 }	
						}else{
							for ($i = $num_pag-4; $i <= $num_pag+5; $i++) { 
								if ($i==$num_pag){ $xx='class="active"';}else{ $xx='';}
								$paginador .='<li '.$xx.'><a href="'.$location.$i.$search.'">'.$i.'</a></li>';
							}	
						}		
					}else{
						for ($i = 1; $i <= $total_paginas; $i++) { 
							if ($i==$num_pag){ $xx='class="active"';}else{ $xx='';}
							$paginador .='<li '.$xx.'><a href="'.$location.$i.$search.'">'.$i.'</a></li>';
                        }
					}
                    if(($num_pag + 1)<=$total_paginas) { 
						$paginador .='<li class="next"><a href="'.$location.($num_pag+1).$search.'">Siguiente → </a></li>';
                    } else {
						$paginador .='<li class="next disabled"><a href="">Siguiente → </a></li>';
                    } 
				$paginador .='</ul>
            </div> 
        </div>
    </div>';
}	
	return $paginador; 
}

/*******************************************************************************************************************/
//Fecha actual
function mapa1($Latitud, $Longitud, $Titulo){	
$mapa = '<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
		<script type="text/javascript">
			  function initialize() {
				  var myLatlng = new google.maps.LatLng('.$Latitud.', '.$Longitud.');
				  var mapOptions = {
					zoom: 15,
					scrollwheel: false,
					center: myLatlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				  }
				  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
				
				  var marker_<?php echo $nn ?> = new google.maps.Marker({
					  position:  new google.maps.LatLng('.$Latitud.', '.$Longitud.'),
					  map: map,
					  title:"'.$Titulo.'",
					  icon: "src_img/map.png"
				  });
		  		
			  }  
		</script>';
$mapa .= '<div id="map_canvas" style="width:100%; height:500px">
               <script type="text/javascript">initialize();</script>
          </div>';	

	return $mapa;
}

/*******************************************************************************************************************/
//Fecha actual
function mapa2($Ubicacion){	
$mapa = '<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAjU0EJWnWPMv7oQ-jjS7dYxSPW5CJgpdgO_s4yyMovOaVh_KvvhSfpvagV18eOyDWu7VytS6Bi1CWxw"
      type="text/javascript"></script>
    <script type="text/javascript">

    var map = null;
    var geocoder = null;

    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(37.4419, -122.1419), 1);
        map.setUIToDefault();
        geocoder = new GClientGeocoder();
      }
    }

    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
              map.setCenter(point, 15);
              var marker = new GMarker(point, {draggable: true});
              map.addOverlay(marker);
             
            }
          }
        );
      }
    }
    </script>
<div id="map_canvas" style="width:100%; height:500px">
        <script type="text/javascript">initialize();showAddress("'.$Ubicacion.'");</script>
</div>';

	return $mapa;
}
/*******************************************************************************************************************/
//Agrega un separador de valores
function Valores_sd($valor){	

 return '$ '.number_format($valor,0,',','.');

}

?>