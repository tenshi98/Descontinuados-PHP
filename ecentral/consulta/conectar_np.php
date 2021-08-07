<?php
$sql_np = "SELECT * FROM nombre_pag";
$result_np =mysql_query($sql_np,$conexio);
while($fila_np=mysql_fetch_array($result_np) ) {
			$g_residencia=$fila_np["residencia"];
			$g_urlcorta=$fila_np["urlcorta"];
			$g_nombre_corto=$fila_np["nombre_corto"];
			$g_pagina=$fila_np["pagina"];
			$g_nombreurl=$fila_np["nombreurl"]; 
			$g_correopagina=$fila_np["correopagina"]; 
			$g_concopia=$fila_np["concopia"]; 
			$g_cerrarsession=$fila_np["cerrarsession"]; 
			$g_ingreso=$fila_np["ingreso"]; 
			$g_nombre_muni=$fila_np["nombre_muni"];
}
?>