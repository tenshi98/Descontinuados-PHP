<?php // se trae el listado con las tareas
$query = "SELECT idSublist, idItemlist, Nombre 
FROM `empresas_item_sublist`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row_ot[] = mysql_fetch_assoc ($resultado));
mysql_free_result($resultado);
array_pop($row_ot);
array_multisort($row_ot, SORT_ASC);

function filtrar_tareas(&$array, $clave_orden ) {
  $array_filtrado = array(); 
  foreach($array as $index=>$array_value) {
    $value = $array_value[$clave_orden];
    unset($array_value[$clave_orden]);
	$array_filtrado[$value][] = $array_value;
  }
  $array = $array_filtrado; 
}
?>
<script>
<?php
//se imprime la id de la tarea
filtrar_tareas($row_ot, 'idItemlist'); 
foreach($row_ot as $tipo=>$productos){ 
echo'var idInt_'.$tipo.'=new Array("Seleccione una Tarea"';
foreach ($productos as $usuario) { 
echo',"'.$usuario['idSublist'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($row_ot as $tipo=>$productos){ 
echo'var nombreInt_'.$tipo.'=new Array("Seleccione una Tarea"';
foreach ($productos as $empresas) { 
echo',"'.$empresas['Nombre'].'"';
 }
 echo')
';
}
?>
function cambia_tarea(){

	var cliente
	cliente = document.f1.idItemlist[document.f1.idItemlist.selectedIndex].value
	if (cliente != '') {
		mis_int=eval("nombreInt_" + cliente)
		mis_idint=eval("idInt_" + cliente)
		num_int = mis_int.length
		document.f1.idSublist.length = num_int
		for(i=0;i<num_int;i++){
		   document.f1.idSublist.options[i].value=mis_idint[i]
		   document.f1.idSublist.options[i].text=mis_int[i]
		}	
	}else{
		document.f1.idSublist.length = 1
		document.f1.idSublist.options[0].value = ""
	    document.f1.idSublist.options[0].text = "Seleccione una Tarea"
	}
	document.f1.idSublist.options[0].selected = true
}

</script>