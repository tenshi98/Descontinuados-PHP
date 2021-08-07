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
$dbConn = conectar();

//Doy ubicaciones
$z="WHERE solicitud_taxi_listado.idDocumento={$_GET['factura']} AND solicitud_taxi_listado.EstadoPago=2";	
//Consulta 	
$query = "SELECT
taxista_calendario.Semana,
solicitud_taxi_listado.Fecha,
clientes_listado.idCliente,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
COUNT(solicitud_taxi_listado.idTaxista) AS cuenta_carreras,
taxista_pagos.Fecha AS fecha_doc
FROM `taxista_calendario`
LEFT JOIN solicitud_taxi_listado   ON solicitud_taxi_listado.Semana    = taxista_calendario.Semana
LEFT JOIN clientes_listado         ON clientes_listado.idCliente       = solicitud_taxi_listado.idTaxista
LEFT JOIN detalle_general          ON detalle_general.id_Detalle       = solicitud_taxi_listado.Estado
LEFT JOIN taxista_pagos            ON taxista_pagos.idDocumento        = solicitud_taxi_listado.idDocumento
".$z."
GROUP BY taxista_calendario.Semana , solicitud_taxi_listado.Fecha  ";
$resultado = mysql_query ($query, $dbConn);
while ($Facturacion[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Facturacion);
array_multisort($Facturacion, SORT_ASC);


//Verifico que la empresa tenga datos
if($_GET['fact_numrows']==0){
	// Ubico los datos de la empresa de soporte
	$query = "SELECT Nombre AS RazonSocial, email_principal, Direccion, Ciudad, Comuna, Fono                  
	FROM `core_datos`
	WHERE id_Datos=1 ";
	$resultado = mysql_query ($query, $dbConn);
	$rowdata = mysql_fetch_assoc ($resultado);	
}else{
	// Ubico los datos de la empresa
	$query = "SELECT RazonSocial, email_principal, Direccion, Ciudad, Comuna, Fono, imgLogo                    
	FROM `clientes_tipos`
	WHERE idTipoCliente={$_GET['fact_numrows']} ";
	$resultado = mysql_query ($query, $dbConn);
	$rowdata = mysql_fetch_assoc ($resultado);	
}
//Obtengo los datos con los precios, etc.
$query = "SELECT ValorPlanBase, NumeroCarreras, ValorCarrera, nombre_impuesto, porcentaje_impuesto
FROM `taxista_sistema`
WHERE idSistema = '1'";
$result = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc($result);
// Se trae un listado con todos los bloqueos del taxista
$arrBloqueos = array();
$query = "SELECT Monto, EstadoPago, FechaBloqueo
FROM `taxista_bloqueos`
WHERE idDocumento = {$_GET['factura']}
ORDER BY FechaBloqueo ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBloqueos,$row );
}

//Se verifica el logo de la empresa
if(isset($rowdata['imgLogo'])&&$rowdata['imgLogo']!=''){
	$img = $rowdata['imgLogo'];
}else{
	$img = 'logo_default.png';
}

// INCLUDE THE phpToPDF.php FILE
require("lib_phpToPDF/phpToPDF.php"); 

$my_html ="<html lang=\"en\">
<head>
	<meta charset=\"UTF-8\">
	<title>Factura</title>
	<style>
		#meta, #items { border-collapse: collapse; }
		#meta td, #meta th, #items td, #items th { border: 1px solid black; padding: 5px; }
		#header { height: 35px; width: 750px; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; padding: 8px 0px; }
		#address { width: 250px; height: 150px; float: left; }
		#customer { overflow: hidden; }
		#logo {text-align: right;float: right;position: relative;margin-top: 25px;border: 1px solid #fff;overflow: hidden;height: 150px;width: 350px;}
		#logo img{width: 100%;}
		.fact_tittle{background: #dfdfdf;}
		.fact_total{background: #cfcfcf;}
		#customer-title { font-size: 20px; font-weight: bold; float: left; }
		#meta { margin-top: 1px; width: 300px; float: right; }
		#meta td { text-align: right;  }
		#meta td.meta-head { text-align: left; background: #eee; }
		#meta td textarea { width: 100%; height: 20px; text-align: right; }
		#items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
		#items th { background: #eee; }
		#items textarea { width: 80px; height: 50px; }
		#items tr.item-row td { border: 0; vertical-align: top; }
		#items td.description { width: 300px; }
		#items td.item-name { width: 175px; }
		#items td.description textarea, #items td.item-name textarea { width: 100%; }
		#items td.total-line { border-right: 0; text-align: right; }
		#items td.total-value { border-left: 0; padding: 10px; }
		#items td.total-value textarea { height: 20px; background: none; }
		#items td.balance { background: #eee; }
		#items td.blank { border: 0; }
		#items td.blank p{ text-align: center;}
		#terms { text-align: center; margin: 20px 0 0 0; }
		#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
		#terms textarea { width: 100%; text-align: center;}
	</style>
</head>";
  
$my_html .="<body>"; 
  
  
  
  
$my_html .= "<div class='col-lg-9 fcenter'>";

$my_html .= "<div id='page-wrap'>
    <div id='header'>FACTURACION</div>
    <div id='identity'>
        <div id='address'>    
			".$rowdata['RazonSocial']."<br/>
			".$rowdata['email_principal']."<br/>
			".$rowdata['Direccion']." ".$rowdata['Ciudad']." ".$rowdata['Comuna']."<br/>
			Fono ".$rowdata['Fono']."
		</div>
        <div id='logo'>     
            <img id='image' src='img/".$img."' alt='logo'>
        </div>
    </div>
";	

$my_html .= "<div style='clear:both'></div>";	
    
$my_html .= "<div id='customer'>
        <div id='customer-title'>Trabajador : ".$Facturacion[0]['Nombre']." ".$Facturacion[0]['Apellido_Paterno']."</div>
        <table id='meta'>
            <tbody>
                <tr>
                    <td class='meta-head'>Documento N</td>
                    <td>".n_doc($_GET['factura'])."</td>
                </tr>
                <tr>
                    <td class='meta-head'>Fecha</td>
                    <td>".Fecha_estandar($Facturacion[0]['fecha_doc'])."</td>
                </tr>
            </tbody>
        </table>
    </div>
";	


	
$my_html .= "<table id='items'><tbody>";	
           
$my_html .= "<tr>
                <th>Semana</th>
                <th width='220'>Fecha Facturada</th>
                <th width='120'>Minimo carreras</th>
                <th width='120'>Carreras hechas</th>
                <th width='120'>Valor por carrera</th>
                <th width='120'>Total carrera</th>
            </tr>		  
";	            
            
          
$semana = 0;
$total = 0;
//se imprime la id de la tarea
filtrar($Facturacion, 'Semana'); 
foreach($Facturacion as $tipo=>$componentes){ 
$my_html .= "<tr class='item-row fact_tittle'><td colspan='6'>Semana ".$tipo."</td></tr>";
	foreach ($componentes as $idcomp) { 
	$carreras = $idcomp['cuenta_carreras']*$row_data['ValorCarrera'];
	$semana = $semana+$carreras;
					
	$my_html .= "<tr class='item-row'>
		<td class='item-name'></td>
		<td>".$idcomp['Fecha']."</td>
		<td>".$row_data['NumeroCarreras']."</td>
		<td>".$idcomp['cuenta_carreras']."</td>
		<td>".Valores_sd($row_data['ValorCarrera'])."</td>
		<td>".Valores_sd($carreras)."</td>
		</tr>";
	}
		//Se calcula el total semanal
if($semana<$row_data['ValorPlanBase']){
	$my_html .= "<tr class='item-row fact_total'><td colspan='3'></td><td colspan='2'>Plan Base (meta no alcanzada)</td><td >".Valores_sd($row_data['ValorPlanBase'])."</td></tr>";
	$total = $total+$row_data['ValorPlanBase'];
}else{
	$my_html .= "<tr class='item-row fact_total'><td colspan='4'></td><td>Total Semanal</td><td >".Valores_sd($semana)."</td></tr>";
	$total = $total+$semana;
}			
$semana=0;	
}   
//Calculo impuesto
$impuesto = ($total*$row_data['porcentaje_impuesto'])/100;          
$dato = $row_data['nombre_impuesto'];



$my_html .= "<tr class='item-row fact_tittle'><td colspan='6'>Atrasos</td></tr> ";        
foreach ($arrBloqueos as $bloqueos) {
$my_html .= "<tr class='item-row'>
	<td class='item-name'></td>
	<td></td>
	<td colspan='3'>Bloqueado el ".Fecha_estandar($bloqueos['FechaBloqueo'])."</td>
	<td>".Valores_sd($bloqueos['Monto'])."</td>		
	</tr>";  
    
$total = $total+$bloqueos['Monto'];	       
 } 
    
    
            
$my_html .= "<tr id='hiderow'>
                <td colspan='6'></td>
            </tr>
            <tr>
                <td colspan='3' class='blank'> </td>
                <td colspan='2' class='total-line'>Subtotal</td>
                <td class='total-value'><div id='subtotal'>".Valores_sd($total)."</div></td>
            </tr>
            <tr>
                <td colspan='3' class='blank'> </td>
                <td colspan='2' class='total-line'>".$dato." (".$row_data['porcentaje_impuesto']."%)</td>
                <td class='total-value'><div id='total'>".Valores_sd($impuesto)."</div></td>
            </tr>
            <tr>
                <td colspan='3' class='blank'><p>Firma Trabajador</p></td>
                <td colspan='2' class='total-line balance'>Total</td>
                <td class='total-value balance'><div class='due'>".Valores_sd($total+$impuesto)."</div></td>
            </tr>
        </tbody>
    </table>
    <div id='terms'></div>

</div>
</div>"; 
           
$my_html .= "</body>
</html>";

// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'download',
  "save_directory" => 'fact',
  "file_name" => 'Facturacion_'.n_doc($_GET['factura']).'.pdf');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);



?>