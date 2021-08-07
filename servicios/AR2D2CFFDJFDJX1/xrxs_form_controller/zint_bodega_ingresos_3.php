<?php //Buscamos la unidad de medida
	$query = "SELECT zint_uml.Divisor AS divisor
    FROM `zint_articulo`
	INNER JOIN `zint_uml` ON zint_uml.idUml = zint_articulo.idUml
    WHERE idArticulo = {$idArticulo} ";
    $resultado = mysql_query ($query, $dbConn);
    $row_div = mysql_fetch_assoc ($resultado);?>