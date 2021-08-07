<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])   ) {

			
		//Filtro para idPrueba
        $a = "idPrueba='".$idPrueba."'" ;
		//filtro de idCliente
		if(isset($idCliente) && $idCliente != ''){ 
        	$a .= ",idCliente='".$idCliente."'" ;
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",Fecha='".$Fecha."'" ;
        }
		//filtro de Vehiculo
		if(isset($Vehiculo) && $Vehiculo != ''){ 
        	$a .= ",Vehiculo='".$Vehiculo."'" ;
        }
		//filtro de Nombre_examinador
		if(isset($Nombre_examinador) && $Nombre_examinador != ''){ 
        	$a .= ",Nombre_examinador='".$Nombre_examinador."'" ;
        }
		//filtro de Nombre_escuela
		if(isset($Nombre_escuela) && $Nombre_escuela != ''){ 
        	$a .= ",Nombre_escuela='".$Nombre_escuela."'" ;
        }
		//filtro de Comuna_escuela
		if(isset($Comuna_escuela) && $Comuna_escuela != ''){ 
        	$a .= ",Comuna_escuela='".$Comuna_escuela."'" ;
        }
		//filtro de checkbox01
		if(isset($checkbox01) && $checkbox01 != ''){ 
        	$a .= ",checkbox01='".$checkbox01."'" ; 
		}else{
			$a .= ",checkbox01='0'";
        }
		
		//filtro de checkbox02
		if(isset($checkbox02) && $checkbox02 != ''){ 
        	$a .= ",checkbox02='".$checkbox02."'" ;
        }else{
			$a .= ",checkbox02='0'";
        }
		//filtro de checkbox03
		if(isset($checkbox03) && $checkbox03 != ''){ 
        	$a .= ",checkbox03='".$checkbox03."'" ;
        }else{
			$a .= ",checkbox03='0'";
        }
		//filtro de checkbox04
		if(isset($checkbox04) && $checkbox04 != ''){ 
        	$a .= ",checkbox04='".$checkbox04."'" ;
        }else{
			$a .= ",checkbox04='0'";
        }
		//filtro de checkbox05
		if(isset($checkbox05) && $checkbox05 != ''){ 
        	$a .= ",checkbox05='".$checkbox05."'" ;
        }else{
			$a .= ",checkbox05='0'";
        }
		//filtro de checkbox06
		if(isset($checkbox06) && $checkbox06 != ''){ 
        	$a .= ",checkbox06='".$checkbox06."'" ;
        }else{
			$a .= ",checkbox06='0'";
        }
		//filtro de checkbox07
		if(isset($checkbox07) && $checkbox07 != ''){ 
        	$a .= ",checkbox07='".$checkbox07."'" ;
        }else{
			$a .= ",checkbox07='0'";
        }
		//filtro de checkbox08
		if(isset($checkbox08) && $checkbox08 != ''){ 
        	$a .= ",checkbox08='".$checkbox08."'" ;
        }else{
			$a .= ",checkbox08='0'";
        }
		//filtro de checkbox09
		if(isset($checkbox09) && $checkbox09 != ''){ 
        	$a .= ",checkbox09='".$checkbox09."'" ;
        }else{
			$a .= ",checkbox09='0'";
        }
		//filtro de checkbox10
		if(isset($checkbox10) && $checkbox10 != ''){ 
        	$a .= ",checkbox10='".$checkbox10."'" ;
        }else{
			$a .= ",checkbox10='0'";
        }
		//filtro de checkbox11
		if(isset($checkbox11) && $checkbox11 != ''){ 
        	$a .= ",checkbox11='".$checkbox11."'" ;
        }else{
			$a .= ",checkbox11='0'";
        }
		//filtro de checkbox12
		if(isset($checkbox12) && $checkbox12 != ''){ 
        	$a .= ",checkbox12='".$checkbox12."'" ;
        }else{
			$a .= ",checkbox12='0'";
        }
		//filtro de checkbox13
		if(isset($checkbox13) && $checkbox13 != ''){ 
        	$a .= ",checkbox13='".$checkbox13."'" ;
        }else{
			$a .= ",checkbox13='0'";
        }
		//filtro de checkbox14
		if(isset($checkbox14) && $checkbox14 != ''){ 
        	$a .= ",checkbox14='".$checkbox14."'" ;
        }else{
			$a .= ",checkbox14='0'";
        }
		//filtro de checkbox15
		if(isset($checkbox15) && $checkbox15 != ''){ 
        	$a .= ",checkbox15='".$checkbox15."'" ;
        }else{
			$a .= ",checkbox15='0'";
        }
		//filtro de checkbox16
		if(isset($checkbox16) && $checkbox16 != ''){ 
        	$a .= ",checkbox16='".$checkbox16."'" ;
        }else{
			$a .= ",checkbox16='0'";
        }
		//filtro de checkbox17
		if(isset($checkbox17) && $checkbox17 != ''){ 
        	$a .= ",checkbox17='".$checkbox17."'" ;
        }else{
			$a .= ",checkbox17='0'";
        }
		//filtro de checkbox18
		if(isset($checkbox18) && $checkbox18 != ''){ 
        	$a .= ",checkbox18='".$checkbox18."'" ;
        }else{
			$a .= ",checkbox18='0'";
        }
		//filtro de checkbox19
		if(isset($checkbox19) && $checkbox19 != ''){ 
        	$a .= ",checkbox19='".$checkbox19."'" ;
        }else{
			$a .= ",checkbox19='0'";
        }
		//filtro de checkbox20
		if(isset($checkbox20) && $checkbox20 != ''){ 
        	$a .= ",checkbox20='".$checkbox20."'" ;
        }else{
			$a .= ",checkbox20='0'";
        }
		//filtro de checkbox21
		if(isset($checkbox21) && $checkbox21 != ''){ 
        	$a .= ",checkbox21='".$checkbox21."'" ;
        }else{
			$a .= ",checkbox21='0'";
        }
		//filtro de checkbox22
		if(isset($checkbox22) && $checkbox22 != ''){ 
        	$a .= ",checkbox22='".$checkbox22."'" ;
        }else{
			$a .= ",checkbox22='0'";
        }
		//filtro de checkbox23
		if(isset($checkbox23) && $checkbox23 != ''){ 
        	$a .= ",checkbox23='".$checkbox23."'" ;
        }else{
			$a .= ",checkbox23='0'";
        }
		//filtro de checkbox24
		if(isset($checkbox24) && $checkbox24 != ''){ 
        	$a .= ",checkbox24='".$checkbox24."'" ;
        }else{
			$a .= ",checkbox24='0'";
        }
		//filtro de checkbox25
		if(isset($checkbox25) && $checkbox25 != ''){ 
        	$a .= ",checkbox25='".$checkbox25."'" ;
        }else{
			$a .= ",checkbox25='0'";
        }
		//filtro de checkbox26
		if(isset($checkbox26) && $checkbox26 != ''){ 
        	$a .= ",checkbox26='".$checkbox26."'" ;
        }else{
			$a .= ",checkbox26='0'";
        }
		//filtro de checkbox27
		if(isset($checkbox27) && $checkbox27 != ''){ 
        	$a .= ",checkbox27='".$checkbox27."'" ;
        }else{
			$a .= ",checkbox27='0'";
        }
		//filtro de checkbox28
		if(isset($checkbox28) && $checkbox28 != ''){ 
        	$a .= ",checkbox28='".$checkbox28."'" ;
        }else{
			$a .= ",checkbox28='0'";
        }
		//filtro de checkbox29
		if(isset($checkbox29) && $checkbox29 != ''){ 
        	$a .= ",checkbox29='".$checkbox29."'" ;
        }else{
			$a .= ",checkbox29='0'";
        }
		//filtro de checkbox30
		if(isset($checkbox30) && $checkbox30 != ''){ 
        	$a .= ",checkbox30='".$checkbox30."'" ;
        }else{
			$a .= ",checkbox30='0'";
        }
		//filtro de checkbox31
		if(isset($checkbox31) && $checkbox31 != ''){ 
        	$a .= ",checkbox31='".$checkbox31."'" ;
        }else{
			$a .= ",checkbox31='0'";
        }
		//filtro de checkbox32
		if(isset($checkbox32) && $checkbox32 != ''){ 
        	$a .= ",checkbox32='".$checkbox32."'" ;
        }else{
			$a .= ",checkbox32='0'";
        }
		//filtro de checkbox33
		if(isset($checkbox33) && $checkbox33 != ''){ 
        	$a .= ",checkbox33='".$checkbox33."'" ;
        }else{
			$a .= ",checkbox33='0'";
        }
		//filtro de checkbox34
		if(isset($checkbox34) && $checkbox34 != ''){ 
        	$a .= ",checkbox34='".$checkbox34."'" ;
        }else{
			$a .= ",checkbox34='0'";
        }
		//filtro de checkbox35
		if(isset($checkbox35) && $checkbox35 != ''){ 
        	$a .= ",checkbox35='".$checkbox35."'" ;
        }else{
			$a .= ",checkbox35='0'";
        }
		//filtro de checkbox36
		if(isset($checkbox36) && $checkbox36 != ''){ 
        	$a .= ",checkbox36='".$checkbox36."'" ;
        }else{
			$a .= ",checkbox36='0'";
        }
		//filtro de checkbox37
		if(isset($checkbox37) && $checkbox37 != ''){ 
        	$a .= ",checkbox37='".$checkbox37."'" ;
        }else{
			$a .= ",checkbox37='0'";
        }
		//filtro de checkbox38
		if(isset($checkbox38) && $checkbox38 != ''){ 
        	$a .= ",checkbox38='".$checkbox38."'" ;
        }else{
			$a .= ",checkbox38='0'";
        }
		//filtro de checkbox39
		if(isset($checkbox39) && $checkbox39 != ''){ 
        	$a .= ",checkbox39='".$checkbox39."'" ;
        }else{
			$a .= ",checkbox39='0'";
        }
		//filtro de checkbox40
		if(isset($checkbox40) && $checkbox40 != ''){ 
        	$a .= ",checkbox40='".$checkbox40."'" ;
        }else{
			$a .= ",checkbox40='0'";
        }
		//filtro de checkbox41
		if(isset($checkbox41) && $checkbox41 != ''){ 
        	$a .= ",checkbox41='".$checkbox41."'" ;
        }else{
			$a .= ",checkbox41='0'";
        }
		//filtro de checkbox42
		if(isset($checkbox42) && $checkbox42 != ''){ 
        	$a .= ",checkbox42='".$checkbox42."'" ;
        }else{
			$a .= ",checkbox42='0'";
        }
		//filtro de checkbox43
		if(isset($checkbox43) && $checkbox43 != ''){ 
        	$a .= ",checkbox43='".$checkbox43."'" ;
        }else{
			$a .= ",checkbox43='0'";
        }
		//filtro de checkbox44
		if(isset($checkbox44) && $checkbox44 != ''){ 
        	$a .= ",checkbox44='".$checkbox44."'" ;
        }else{
			$a .= ",checkbox44='0'";
        }
		//filtro de checkbox45
		if(isset($checkbox45) && $checkbox45 != ''){ 
        	$a .= ",checkbox45='".$checkbox45."'" ;
        }else{
			$a .= ",checkbox45='0'";
        }
		//filtro de checkbox46
		if(isset($checkbox46) && $checkbox46 != ''){ 
        	$a .= ",checkbox46='".$checkbox46."'" ;
        }else{
			$a .= ",checkbox46='0'";
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_pruebas` SET ".$a." WHERE idPrueba = '$idPrueba'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>