<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                                  Se ejecuta la consulta                                                        */
/**********************************************************************************************************************************/
// Se traen los datos de la pregunta efectuada
$arrPregunta = array();
$query = "
 SELECT
	preguntas_listado.Pregunta,
	preguntas_respuestas.Respuesta,

(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 1 LIMIT 1 ) AS Region_1,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 2 LIMIT 1 ) AS Region_2,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 3 LIMIT 1 ) AS Region_3,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 4 LIMIT 1 ) AS Region_4,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 5 LIMIT 1 ) AS Region_5,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 6 LIMIT 1 ) AS Region_6,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 7 LIMIT 1 ) AS Region_7,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 8 LIMIT 1 ) AS Region_8,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 9 LIMIT 1 ) AS Region_9,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 10 LIMIT 1 ) AS Region_10,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 11 LIMIT 1 ) AS Region_11,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 12 LIMIT 1 ) AS Region_12,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 13 LIMIT 1 ) AS Region_13,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 14 LIMIT 1 ) AS Region_14,
(SELECT SUM(clientes_votos.Cantidad) 
	FROM clientes_votos 
	LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
	WHERE idRespuesta = preguntas_respuestas.idRespuesta AND clientes_listado.idCiudad= 15 LIMIT 1 ) AS Region_15

FROM
	`preguntas_listado`
LEFT JOIN `preguntas_respuestas` ON preguntas_respuestas.idPregunta = preguntas_listado.idPregunta

WHERE
	preguntas_listado.idPregunta = {$_GET['info2']}
";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPregunta,$row );
}
/**********************************************************************************************************************************/
/*                                                  Se ejecuta la consulta                                                        */
/**********************************************************************************************************************************/

/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("NPH")
							 ->setLastModifiedBy("NPH")
							 ->setTitle("NPH")
							 ->setSubject("NPH")
							 ->setDescription("NPH")
							 ->setKeywords("NPH")
							 ->setCategory("NPH");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Candidatos')
            ->setCellValue('B1', '1° Region')
            ->setCellValue('C1', '2° Region')
            ->setCellValue('D1', '3° Region')
			->setCellValue('E1', '4° Region')
			->setCellValue('F1', '5° Region')
			->setCellValue('G1', '6° Region')
			->setCellValue('H1', '7° Region')
			->setCellValue('I1', '8° Region')
			->setCellValue('J1', '9° Region')
			->setCellValue('K1', '10° Region')
			->setCellValue('L1', '11° Region')
			->setCellValue('M1', '12° Region')
			->setCellValue('N1', '13° Region')
			->setCellValue('O1', '14° Region')
			->setCellValue('P1', '15° Region');

$i=2;			
foreach ($arrPregunta as $pregunta) { 
	$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $pregunta['Respuesta']);
	$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $pregunta['Region_1']);
	$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $pregunta['Region_2']);
	$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $pregunta['Region_3']);
	$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $pregunta['Region_4']);
	$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $pregunta['Region_5']);
	$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $pregunta['Region_6']);
	$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $pregunta['Region_7']);
	$objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $pregunta['Region_8']);
	$objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $pregunta['Region_9']);
	$objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $pregunta['Region_10']);
	$objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $pregunta['Region_11']);
	$objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $pregunta['Region_12']);
	$objPHPExcel->getActiveSheet()->setCellValue('N' . $i, $pregunta['Region_13']);
	$objPHPExcel->getActiveSheet()->setCellValue('O' . $i, $pregunta['Region_14']);
	$objPHPExcel->getActiveSheet()->setCellValue('P' . $i, $pregunta['Region_15']);
	$i++;
}





// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle(cortar($arrPregunta[0]['Pregunta'], 20));


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$arrPregunta[0]['Pregunta'].'.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
