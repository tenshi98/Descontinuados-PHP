<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
$dbConn   = conectar();
/**********************************************************************************************************************************/
/*                                   Identifico quien envio la alerta y obtengo sus datos                                         */
/**********************************************************************************************************************************/
// Se trae un listado con todos los rutas
$arrRutas = array();
$query = "SELECT
	transantiago_rutas_multi.idRutaAlt,
	transantiago_rutas_multi.idTipo,
	transantiago_rutas_multi.idDias,
	transantiago_rutas_multi.Fecha,
	transantiago_rutas_multi.HoraInicio,
	transantiago_rutas_multi.HoraTermino,
	transantiago_rutas_multi_listado.idListado,
	transantiago_rutas_multi_listado.Latitud,
	transantiago_rutas_multi_listado.Longitud,
	mnt_imagenes_listado.file
FROM
	`transantiago_rutas_multi`
LEFT JOIN `transantiago_rutas_multi_listado`   ON transantiago_rutas_multi_listado.idRutaAlt   = transantiago_rutas_multi.idRutaAlt
LEFT JOIN `mnt_imagenes_listado`               ON mnt_imagenes_listado.idListimg               = transantiago_rutas_multi.idListimg
WHERE
	transantiago_rutas_multi.idEstado = 1 AND transantiago_rutas_multi.idRecorrido = {$_GET['idRecorrido']}
HAVING
	transantiago_rutas_multi.idTipo = 1 OR transantiago_rutas_multi.idTipo = 2 OR transantiago_rutas_multi.idTipo = 6
ORDER BY
	transantiago_rutas_multi.idRutaAlt ASC,
	transantiago_rutas_multi_listado.idListado ASC
";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRutas,$row );
}


echo '
<script>
	';	
	//se filtra el arreglo
	filtrar($arrRutas, 'idRutaAlt');
/* ********************************************************************************************* */	
/*                               Bloque de las variables                                         */
/* ********************************************************************************************* */		
	$contar=0;
	echo 'var maya = [
			';
	foreach($arrRutas as $id=>$productos) {
					
		$tipo = $productos[0]['idTipo'];
		$h_termino = strtotime($productos[0]['HoraTermino']);
		$h_inicio = strtotime($productos[0]['HoraInicio']);
		$h_actual = strtotime(hora_actual());
						
		$f_prog = strtotime($productos[0]['Fecha']);
		$f_actual = strtotime(fecha_actual());
		$d_prog = $productos[0]['idDias'];
		$d_actual = dia_actual();	


			
		//Si la ruta es alternativa
		if($tipo==1 AND $f_prog==$f_actual AND $h_actual>$h_inicio  AND $h_actual<$h_termino){
			echo '[
			';
			foreach($productos as $pos) {
				echo "[".$pos['Latitud'].", ".$pos['Longitud'].",'red'],
				";
			}
			echo '],
			';
			$contar++;
		//Si la ruta es programada
		}elseif($tipo==2 AND $d_prog==$d_actual AND $h_actual>$h_inicio  AND $h_actual<$h_termino){
			echo '[
			';
			foreach($productos as $pos) {
				echo "[".$pos['Latitud'].", ".$pos['Longitud'].",'blue'],
				";
			}
			echo '],
			';
			$contar++;
		}
		
	//$contar++;
	}
	
	echo '];
	';
	echo 'var cuenta='.$contar.';
	';
	
/* ********************************************************************************************* */	
/*                               Bloque de las variables                                         */
/* ********************************************************************************************* */	
	$contar2=0;
	echo 'var alertas = [
			';
	foreach($arrRutas as $id=>$productos) {
					
		$tipo = $productos[0]['idTipo'];
		$h_termino = strtotime($productos[0]['HoraTermino']);
		$h_inicio = strtotime($productos[0]['HoraInicio']);
		$h_actual = strtotime(hora_actual());
						
		$f_prog = strtotime($productos[0]['Fecha']);
		$f_actual = strtotime(fecha_actual());
		$d_prog = $productos[0]['idDias'];
		$d_actual = dia_actual();			
			
		//Si la ruta es alternativa
		if($tipo==6 AND $f_prog==$f_actual AND $h_actual>$h_inicio  AND $h_actual<$h_termino){
			echo '[
			';
			foreach($productos as $pos) {
				echo "[".$pos['Latitud'].", ".$pos['Longitud'].", '".$pos['file']."'],
				";
			}
			echo '],
			';
			$contar2++;
		}
	}
	
	echo '];
	';
	echo 'var cuenta2='.$contar2.';
	';






			

echo '</script>';

?>
