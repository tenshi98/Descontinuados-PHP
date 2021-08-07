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
	SUM(clientes_votos.Cantidad) AS suma,
	clientes_listado.mesa
FROM
	`preguntas_listado`
LEFT JOIN `preguntas_respuestas` ON preguntas_respuestas.idPregunta = preguntas_listado.idPregunta
LEFT JOIN `clientes_votos` ON clientes_votos.idRespuesta = preguntas_respuestas.idRespuesta
LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_votos.idCliente
WHERE
	preguntas_listado.idPregunta = {$_GET['info2']}
	AND clientes_listado.idCiudad = {$_GET['info3']}
GROUP BY
	preguntas_listado.idPregunta,
	preguntas_respuestas.idRespuesta,
	clientes_listado.mesa
ORDER BY
 preguntas_respuestas.Respuesta ASC
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
//Matriz
$matriz[0]='A'; 
$matriz[1]='B';     $matriz[2]='C';     $matriz[3]='D';     $matriz[4]='E';     $matriz[5]='F';     $matriz[6]='G';     $matriz[7]='H';     $matriz[8]='I';     $matriz[9]='J';     $matriz[10]='K';
$matriz[11]='L';    $matriz[12]='M';    $matriz[13]='N';    $matriz[14]='O';    $matriz[15]='P';    $matriz[16]='Q';    $matriz[17]='R';    $matriz[18]='S';    $matriz[19]='T';    $matriz[20]='U';
$matriz[21]='V';    $matriz[22]='W';    $matriz[23]='X';    $matriz[24]='Y';    $matriz[25]='Z';    $matriz[26]='AA';   $matriz[27]='AB';   $matriz[28]='AC';   $matriz[29]='AD';   $matriz[30]='AE';
$matriz[31]='AF';   $matriz[32]='AG';   $matriz[33]='AH';   $matriz[34]='AI';   $matriz[35]='AJ';   $matriz[36]='AK';   $matriz[37]='AL';   $matriz[38]='AM';   $matriz[39]='AN';   $matriz[40]='AO';
$matriz[41]='AP';   $matriz[42]='AQ';   $matriz[43]='AR';   $matriz[44]='AS';   $matriz[45]='AT';   $matriz[46]='AU';   $matriz[47]='AV';   $matriz[48]='AW';   $matriz[49]='AX';   $matriz[50]='AY';
$matriz[51]='AZ';   $matriz[52]='BA';   $matriz[53]='BB';   $matriz[54]='BC';   $matriz[55]='BD';   $matriz[56]='BE';   $matriz[57]='BF';   $matriz[58]='BG';   $matriz[59]='BH';   $matriz[60]='BI';
$matriz[61]='BJ';   $matriz[62]='BK';   $matriz[63]='BL';   $matriz[64]='BM';   $matriz[65]='BN';   $matriz[66]='BO';   $matriz[67]='BP';   $matriz[68]='BQ';   $matriz[69]='BR';   $matriz[70]='BS';
$matriz[71]='BT';   $matriz[72]='BU';   $matriz[73]='BV';   $matriz[74]='BW';   $matriz[75]='BX';   $matriz[76]='BY';   $matriz[77]='BZ';   $matriz[78]='CA';   $matriz[79]='CB';   $matriz[80]='CC';
$matriz[81]='CD';   $matriz[82]='CE';   $matriz[83]='CF';   $matriz[84]='CG';   $matriz[85]='CH';   $matriz[86]='CI';   $matriz[87]='CJ';   $matriz[88]='CK';   $matriz[89]='CL';   $matriz[90]='CM';
$matriz[91]='CN';   $matriz[92]='CO';   $matriz[93]='CP';   $matriz[94]='CQ';   $matriz[95]='CR';   $matriz[96]='CS';   $matriz[97]='CT';   $matriz[98]='CU';   $matriz[99]='CV';   $matriz[100]='CW';
$matriz[101]='CX';  $matriz[102]='CY';  $matriz[103]='CZ';  $matriz[104]='DA';  $matriz[105]='DB';  $matriz[106]='DC';  $matriz[107]='DD';  $matriz[108]='DE';  $matriz[109]='DF';  $matriz[110]='DG';
$matriz[111]='DH';  $matriz[112]='DI';  $matriz[113]='DJ';  $matriz[114]='DK';  $matriz[115]='DL';  $matriz[116]='DM';  $matriz[117]='DN';  $matriz[118]='DO';  $matriz[119]='DP';  $matriz[120]='DQ';
$matriz[121]='DR';  $matriz[122]='DS';  $matriz[123]='DT';  $matriz[124]='DU';  $matriz[125]='DV';  $matriz[126]='DW';  $matriz[127]='DX';  $matriz[128]='DY';  $matriz[129]='DZ';  $matriz[130]='EA';
$matriz[131]='EB';  $matriz[132]='EC';  $matriz[133]='ED';  $matriz[134]='EE';  $matriz[135]='EF';  $matriz[136]='EG';  $matriz[137]='EH';  $matriz[138]='EI';  $matriz[139]='EJ';  $matriz[140]='EK';
$matriz[141]='EL';  $matriz[142]='EM';  $matriz[143]='EN';  $matriz[144]='EO';  $matriz[145]='EP';  $matriz[146]='EQ';  $matriz[147]='ER';  $matriz[148]='ES';  $matriz[149]='ET';  $matriz[150]='EU';
$matriz[151]='EV';  $matriz[152]='EW';  $matriz[153]='EX';  $matriz[154]='EY';  $matriz[155]='EZ';  $matriz[156]='FA';  $matriz[157]='FB';  $matriz[158]='FC';  $matriz[159]='FD';  $matriz[160]='FE';
$matriz[161]='FF';  $matriz[162]='FG';  $matriz[163]='FH';  $matriz[164]='FI';  $matriz[165]='FJ';  $matriz[166]='FK';  $matriz[167]='FL';  $matriz[168]='FM';  $matriz[169]='FN';  $matriz[170]='FO';
$matriz[171]='FP';  $matriz[172]='FQ';  $matriz[173]='FR';  $matriz[174]='FS';  $matriz[175]='FT';  $matriz[176]='FU';  $matriz[177]='FV';  $matriz[178]='FW';  $matriz[179]='FX';  $matriz[180]='FY';
$matriz[181]='FZ';  $matriz[182]='GA';  $matriz[183]='GB';  $matriz[184]='GC';  $matriz[185]='GD';  $matriz[186]='GE';  $matriz[187]='GF';  $matriz[188]='GG';  $matriz[189]='GH';  $matriz[190]='GI';
$matriz[191]='GJ';  $matriz[192]='GK';  $matriz[193]='GL';  $matriz[194]='GM';  $matriz[195]='GN';  $matriz[196]='GO';  $matriz[197]='GP';  $matriz[198]='GQ';  $matriz[199]='GR';  $matriz[200]='GS';


$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Candidatos');

filtrar($arrPregunta, 'Respuesta'); 
$vuelta = 1;
$i=1;	
foreach($arrPregunta as $tipo=>$componentes){ 
	if($vuelta==1){
		foreach ($componentes as $idcomp) { 
			$objPHPExcel->getActiveSheet()->setCellValue($matriz[$i].'1', 'Mesa '.$idcomp['mesa']);
			$i++;
		}
	$vuelta++;
	}
}
$objPHPExcel->getActiveSheet()->setCellValue($matriz[$i].'1', 'Total');

$j=0;
$k=2;		
foreach($arrPregunta as $tipo=>$componentes){ 
	$objPHPExcel->getActiveSheet()->setCellValue($matriz[$j].$k, $tipo);
	$j++;
	$total = 0;
	foreach ($componentes as $idcomp) { 
		$objPHPExcel->getActiveSheet()->setCellValue($matriz[$j].$k, $idcomp['suma']);
		$j++;
		$total = $total + $idcomp['suma'];
	}
	$objPHPExcel->getActiveSheet()->setCellValue($matriz[$j].$k, $total);
	$k++;
	$j=0;
}
		

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle(cortar($componentes[0]['Pregunta'], 20));


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$componentes[0]['Pregunta'].'.xls"');
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
