<?php
//Conecto a la base de datos externa
function conectar2 ($servidor, $usuario, $pass, $base) {
	$db_con = mysql_connect ($servidor,$usuario,$pass);
	if (!$db_con) return false; 
	if (!mysql_select_db ($base, $db_con)) return false;
	if (!mysql_query("SET NAMES 'utf8'")) return false;
	return $db_con; 
}	
$dbConn = conectar2("190.98.210.37","root","petland","easy_pago");


	$arrList = array();
	$query = "SELECT idVentas, idCliente, idComprador, Monto, Fecha, Fono, idPin
	FROM `clientes_red_digital`
	ORDER BY idVentas ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrList,$row );
	}


echo '<table  cellspacing="1" border="1" cellpadding="1">
		<thead>
			<tr>
				<th>idVentas</th>
				<th>id Red Digital</th>
				<th>idComprador</th>
				<th>Monto</th>
				<th>Fecha</th>
				<th>Fono</th>
				<th>idPin</th>
			</tr>
		</thead>
		<tbody>';
		foreach ($arrList as $list) { 
			echo '<tr>		
					<td>'.$list['idVentas'].'</td>		
					<td>'.$list['idCliente'].'</td>		
					<td>'.$list['idComprador'].'</td>
					<td>'.$list['Monto'].'</td>	
					<td>'.$list['Fecha'].'</td>
					<td>'.$list['Fono'].'</td>
					<td>'.$list['idPin'].'</td>	
				</tr>';
		}                     
		echo '</tbody>
	</table>';



?> 




