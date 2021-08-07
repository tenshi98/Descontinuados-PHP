<?php if($dispositivo=='android'){
	$query ="SELECT COUNT(idMensaje) AS n_mensajes
	FROM `clientes_mensaje`
	WHERE idRecibidor='{$arrCliente['idCliente']}' AND Leida=7";
	$resultado = mysql_query ($query, $dbConn);
	$row = mysql_fetch_assoc ($resultado);
?>
<a class="item20 icn configuracion" onclick="MainActivity.MenuOpciones()"></a>
<a class="item60 icn_big"           onclick="MainActivity.MenuPrincipal()"><img src="img/btn.png" /></a>
<a class="item20 icn interrogacion" onclick="MainActivity.MenuMensaje()"><?php echo $row['n_mensajes'] ?></a>
<?php }?>


