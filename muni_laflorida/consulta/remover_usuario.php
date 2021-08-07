<?php
    /*  Descripcion:   Este archivo permite cambiar al usuario de estado.
    Archivo:    remover_usuario.php     */

    //conectar BD
    include("conectar_bd.php"); 
    conectar_bd();

if(isset($_POST['userid'])){
	$id=$_POST['userid'];
	// $consd="DELETE FROM tbl_users WHERE id_usuario='$id'";
	$consd="UPDATE tbl_users SET usuariovalido='0' WHERE id_usuario='" .$id. "' LIMIT 1";
    $result=mysql_query($consd,$conexio);
	if( $result) { echo 'true'; 
	} else{ echo 'false'; }
} else { echo  'false'; }

?>
