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
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])  ) {

			
		//Filtro para id_Oirs
        $a = "id_Oirs='".$id_Oirs."'" ;
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",Estado='".$Estado."'" ;
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",Fecha='".$Fecha."'" ;
        }
		//filtro de Origen
		if(isset($Origen) && $Origen != ''){ 
        	$a .= ",Origen='".$Origen."'" ;
        }
		//filtro de Destino
		if(isset($Destino) && $Destino != ''){ 
        	$a .= ",Destino='".$Destino."'" ;
        }
		//filtro de id_origen_a
		if(isset($id_origen_a) && $id_origen_a != ''){ 
        	$a .= ",id_origen_a='".$id_origen_a."'" ;
        }
		//filtro de id_origen_b
		if(isset($id_origen_b) && $id_origen_b != ''){ 
        	$a .= ",id_origen_b='".$id_origen_b."'" ;
        }
		//filtro de Inicia
		if(isset($Inicia) && $Inicia != ''){ 
        	$a .= ",Inicia='".$Inicia."'" ;
        }
		//filtro de Expira
		if(isset($Expira) && $Expira != ''){ 
        	$a .= ",Expira='".$Expira."'" ;
        }
		//filtro de id_antecedentes
		if(isset($id_antecedentes) && $id_antecedentes != ''){ 
        	$a .= ",id_antecedentes='".$id_antecedentes."'" ;
        }
		//filtro de n_antecedente
		if(isset($n_antecedente) && $n_antecedente != ''){ 
        	$a .= ",n_antecedente='".$n_antecedente."'" ;
        }
		//filtro de obs_antecedente
		if(isset($obs_antecedente) && $obs_antecedente != ''){ 
        	$a .= ",obs_antecedente='".$obs_antecedente."'" ;
        }
		//filtro de id_materia
		if(isset($id_materia) && $id_materia != ''){ 
        	$a .= ",id_materia='".$id_materia."'" ;
        }
		//filtro de obs_materia
		if(isset($obs_materia) && $obs_materia != ''){ 
        	$a .= ",obs_materia='".$obs_materia."'" ;
        }
		//filtro de Acciones_01
		if(isset($Acciones_01) && $Acciones_01 != ''){ 
        	$a .= ",`Acciones_01`='".$Acciones_01."'" ;
        }else{
			$a .= ",`Acciones_01`='0'";
        }
		//filtro de Acciones_02
		if(isset($Acciones_02) && $Acciones_02 != ''){ 
        	$a .= ",`Acciones_02`='".$Acciones_02."'" ;
		}else{
			$a .= ",`Acciones_02`='0'";
        }
		//filtro de Acciones_03
		if(isset($Acciones_03) && $Acciones_03 != ''){ 
        	$a .= ",`Acciones_03`='".$Acciones_03."'" ;
        }else{
			$a .= ",`Acciones_03`='0'";
        }
		//filtro de Acciones_04
		if(isset($Acciones_04) && $Acciones_04 != ''){ 
        	$a .= ",`Acciones_04`='".$Acciones_04."'" ;
        }else{
			$a .= ",`Acciones_04`='0'";
        }
		//filtro de Acciones_05
		if(isset($Acciones_05) && $Acciones_05 != ''){ 
        	$a .= ",`Acciones_05`='".$Acciones_05."'" ;
        }else{
			$a .= ",`Acciones_05`='0'";
        }
		//filtro de Acciones_06
		if(isset($Acciones_06) && $Acciones_06 != ''){ 
        	$a .= ",`Acciones_06`='".$Acciones_06."'" ;
        }else{
			$a .= ",`Acciones_06`='0'";
        }
		//filtro de Acciones_07
		if(isset($Acciones_07) && $Acciones_07 != ''){ 
        	$a .= ",`Acciones_07`='".$Acciones_07."'" ;
        }else{
			$a .= ",`Acciones_07`='0'";
        }
		//filtro de Acciones_08
		if(isset($Acciones_08) && $Acciones_08 != ''){ 
        	$a .= ",`Acciones_08`='".$Acciones_08."'" ;
        }else{
			$a .= ",`Acciones_08`='0'";
        }
		//filtro de Acciones_09
		if(isset($Acciones_09) && $Acciones_09 != ''){ 
        	$a .= ",`Acciones_09`='".$Acciones_09."'" ;
        }else{
			$a .= ",`Acciones_09`='0'";
        }
		//filtro de Acciones_10
		if(isset($Acciones_10) && $Acciones_10 != ''){ 
        	$a .= ",`Acciones_10`='".$Acciones_10."'" ;
        }else{
			$a .= ",`Acciones_10`='0'";
        }
		//filtro de Acciones_11
		if(isset($Acciones_11) && $Acciones_11 != ''){ 
        	$a .= ",`Acciones_11`='".$Acciones_11."'" ;
        }else{
			$a .= ",`Acciones_11`='0'";
        }
		//filtro de Acciones_12
		if(isset($Acciones_12) && $Acciones_12 != ''){ 
        	$a .= ",`Acciones_12`='".$Acciones_12."'" ;
        }else{
			$a .= ",`Acciones_12`='0'";
        }
		//filtro de Acciones_13
		if(isset($Acciones_13) && $Acciones_13 != ''){ 
        	$a .= ",`Acciones_13`='".$Acciones_13."'" ;
        }else{
			$a .= ",`Acciones_13`='0'";
        }
		//filtro de Acciones_14
		if(isset($Acciones_14) && $Acciones_14 != ''){ 
        	$a .= ",`Acciones_14`='".$Acciones_14."'" ;
        }else{
			$a .= ",`Acciones_14`='0'";
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= ",idUsuario='".$idUsuario."'" ;
        }
		//filtro de idCliente
		if(isset($idCliente) && $idCliente != ''){ 
        	$a .= ",idCliente='".$idCliente."'" ;
        }
		//filtro de idDepto
		if(isset($idDepto) && $idDepto != ''){ 
        	$a .= ",idDepto='".$idDepto."'" ;
        }
		//filtro de idSolicitud
		if(isset($idSolicitud) && $idSolicitud != ''){ 
        	$a .= ",idSolicitud='".$idSolicitud."'" ;
        }


		// inserto los datos de registro en la db
		$query  = "UPDATE `oirs_listado` SET ".$a." WHERE id_Oirs = '$id_Oirs'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>