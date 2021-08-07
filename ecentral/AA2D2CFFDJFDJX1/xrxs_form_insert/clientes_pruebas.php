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
	
		
		//filtro de idCliente
		if(isset($idCliente) && $idCliente != ''){ 
        	$a = "'".$idCliente."'" ;
		}else{
			$a ="''";
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",'".$Fecha."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Vehiculo
		if(isset($Vehiculo) && $Vehiculo != ''){ 
        	$a .= ",'".$Vehiculo."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Nombre_examinador
		if(isset($Nombre_examinador) && $Nombre_examinador != ''){ 
        	$a .= ",'".$Nombre_examinador."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Nombre_escuela
		if(isset($Nombre_escuela) && $Nombre_escuela != ''){ 
        	$a .= ",'".$Nombre_escuela."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Comuna_escuela
		if(isset($Comuna_escuela) && $Comuna_escuela != ''){ 
        	$a .= ",'".$Comuna_escuela."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de checkbox01
		if(isset($checkbox01) && $checkbox01 != ''){ 
        	$a .= ",'".$checkbox01."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox02
		if(isset($checkbox02) && $checkbox02 != ''){ 
        	$a .= ",'".$checkbox02."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox03
		if(isset($checkbox03) && $checkbox03 != ''){ 
        	$a .= ",'".$checkbox03."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox04
		if(isset($checkbox04) && $checkbox04 != ''){ 
        	$a .= ",'".$checkbox04."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox05
		if(isset($checkbox05) && $checkbox05 != ''){ 
        	$a .= ",'".$checkbox05."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox06
		if(isset($checkbox06) && $checkbox06 != ''){ 
        	$a .= ",'".$checkbox06."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox07
		if(isset($checkbox07) && $checkbox07 != ''){ 
        	$a .= ",'".$checkbox07."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox08
		if(isset($checkbox08) && $checkbox08 != ''){ 
        	$a .= ",'".$checkbox08."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox09
		if(isset($checkbox09) && $checkbox09 != ''){ 
        	$a .= ",'".$checkbox09."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox10
		if(isset($checkbox10) && $checkbox10 != ''){ 
        	$a .= ",'".$checkbox10."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox11
		if(isset($checkbox11) && $checkbox11 != ''){ 
        	$a .= ",'".$checkbox11."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox12
		if(isset($checkbox12) && $checkbox12 != ''){ 
        	$a .= ",'".$checkbox12."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox13
		if(isset($checkbox13) && $checkbox13 != ''){ 
        	$a .= ",'".$checkbox13."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox14
		if(isset($checkbox14) && $checkbox14 != ''){ 
        	$a .= ",'".$checkbox14."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox15
		if(isset($checkbox15) && $checkbox15 != ''){ 
        	$a .= ",'".$checkbox15."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox16
		if(isset($checkbox16) && $checkbox16 != ''){ 
        	$a .= ",'".$checkbox16."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox17
		if(isset($checkbox17) && $checkbox17 != ''){ 
        	$a .= ",'".$checkbox17."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox18
		if(isset($checkbox18) && $checkbox18 != ''){ 
        	$a .= ",'".$checkbox18."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox19
		if(isset($checkbox19) && $checkbox19 != ''){ 
        	$a .= ",'".$checkbox19."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox20
		if(isset($checkbox20) && $checkbox20 != ''){ 
        	$a .= ",'".$checkbox20."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox21
		if(isset($checkbox21) && $checkbox21 != ''){ 
        	$a .= ",'".$checkbox21."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox22
		if(isset($checkbox22) && $checkbox22 != ''){ 
        	$a .= ",'".$checkbox22."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox23
		if(isset($checkbox23) && $checkbox23 != ''){ 
        	$a .= ",'".$checkbox23."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox24
		if(isset($checkbox24) && $checkbox24 != ''){ 
        	$a .= ",'".$checkbox24."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox25
		if(isset($checkbox25) && $checkbox25 != ''){ 
        	$a .= ",'".$checkbox25."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox26
		if(isset($checkbox26) && $checkbox26 != ''){ 
        	$a .= ",'".$checkbox26."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox27
		if(isset($checkbox27) && $checkbox27 != ''){ 
        	$a .= ",'".$checkbox27."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox28
		if(isset($checkbox28) && $checkbox28 != ''){ 
        	$a .= ",'".$checkbox28."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox29
		if(isset($checkbox29) && $checkbox29 != ''){ 
        	$a .= ",'".$checkbox29."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox30
		if(isset($checkbox30) && $checkbox30 != ''){ 
        	$a .= ",'".$checkbox30."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox31
		if(isset($checkbox31) && $checkbox31 != ''){ 
        	$a .= ",'".$checkbox31."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox32
		if(isset($checkbox32) && $checkbox32 != ''){ 
        	$a .= ",'".$checkbox32."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox33
		if(isset($checkbox33) && $checkbox33 != ''){ 
        	$a .= ",'".$checkbox33."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox34
		if(isset($checkbox34) && $checkbox34 != ''){ 
        	$a .= ",'".$checkbox34."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox35
		if(isset($checkbox35) && $checkbox35 != ''){ 
        	$a .= ",'".$checkbox35."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox36
		if(isset($checkbox36) && $checkbox36 != ''){ 
        	$a .= ",'".$checkbox36."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox37
		if(isset($checkbox37) && $checkbox37 != ''){ 
        	$a .= ",'".$checkbox37."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox38
		if(isset($checkbox38) && $checkbox38 != ''){ 
        	$a .= ",'".$checkbox38."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox39
		if(isset($checkbox39) && $checkbox39 != ''){ 
        	$a .= ",'".$checkbox39."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox40
		if(isset($checkbox40) && $checkbox40 != ''){ 
        	$a .= ",'".$checkbox40."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox41
		if(isset($checkbox41) && $checkbox41 != ''){ 
        	$a .= ",'".$checkbox41."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox42
		if(isset($checkbox42) && $checkbox42 != ''){ 
        	$a .= ",'".$checkbox42."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox43
		if(isset($checkbox43) && $checkbox43 != ''){ 
        	$a .= ",'".$checkbox43."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox44
		if(isset($checkbox44) && $checkbox44 != ''){ 
        	$a .= ",'".$checkbox44."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox45
		if(isset($checkbox45) && $checkbox45 != ''){ 
        	$a .= ",'".$checkbox45."'" ;
        }else{
			$a .= ",'0'" ;
		}
		//filtro de checkbox46
		if(isset($checkbox46) && $checkbox46 != ''){ 
        	$a .= ",'".$checkbox46."'" ;
        }else{
			$a .= ",'0'" ;
		}
		
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_pruebas` ( idCliente, Fecha, Vehiculo, Nombre_examinador, Nombre_escuela, Comuna_escuela, checkbox01, checkbox02, checkbox03, checkbox04, checkbox05, checkbox06, checkbox07, checkbox08, checkbox09, checkbox10, checkbox11, checkbox12, checkbox13, checkbox14, checkbox15, checkbox16, checkbox17, checkbox18, checkbox19, checkbox20, checkbox21, checkbox22, checkbox23, checkbox24, checkbox25, checkbox26, checkbox27, checkbox28, checkbox29, checkbox30, checkbox31, checkbox32, checkbox33, checkbox34, checkbox35, checkbox36, checkbox37, checkbox38, checkbox39, checkbox40, checkbox41, checkbox42, checkbox43, checkbox44, checkbox45, checkbox46) VALUES ({$a} )";
	
		
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>