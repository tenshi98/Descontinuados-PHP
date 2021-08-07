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

//Relleno los datos inexistentes
		
		
		//filtro de id_origen_a
		if(isset($id_origen_a) && $id_origen_a != ''){ 
        	$comparacion_id_origen_a=$id_origen_a ;
        }else{
			$comparacion_id_origen_a='0' ;
		}
		//filtro de id_origen_b
		if(isset($id_origen_b) && $id_origen_b != ''){ 
        	$comparacion_id_origen_b=$id_origen_b ;
        }else{
			$comparacion_id_origen_b='0' ;
		}
		//filtro de Inicia
		if(isset($Inicia) && $Inicia != ''){ 
        	$comparacion_Inicia=$Inicia ;
        }else{
			$comparacion_Inicia='0' ;
		}
		//filtro de Expira
		if(isset($Expira) && $Expira != ''){ 
        	$comparacion_Expira=$Expira ;
        }else{
			$comparacion_Expira='0' ;
		}
		//filtro de id_antecedentes
		if(isset($id_antecedentes) && $id_antecedentes != ''){ 
        	$comparacion_id_antecedentes=$id_antecedentes ;
        }else{
			$comparacion_id_antecedentes='0' ;
		}
		//filtro de n_antecedente
		if(isset($n_antecedente) && $n_antecedente != ''){ 
        	$comparacion_n_antecedente=$n_antecedente ;
        }else{
			$comparacion_n_antecedente='0' ;
		}
		//filtro de obs_antecedente
		if(isset($obs_antecedente) && $obs_antecedente != ''){ 
        	$comparacion_obs_antecedente=$obs_antecedente ;
        }else{
			$comparacion_obs_antecedente='' ;
		}
		//filtro de id_materia
		if(isset($id_materia) && $id_materia != ''){ 
        	$comparacion_id_materia=$id_materia ;
        }else{
			$comparacion_id_materia='0' ;
		}
		//filtro de obs_materia
		if(isset($obs_materia) && $obs_materia != ''){ 
        	$comparacion_obs_materia=$obs_materia ;
        }else{
			$comparacion_obs_materia='' ;
		}
		//filtro de Acciones_01
		if(isset($Acciones_01) && $Acciones_01 != ''){ 
        	$comparacion_Acciones_01=$Acciones_01 ;
        }else{
			$comparacion_Acciones_01='0' ;
		}
		//filtro de Acciones_02
		if(isset($Acciones_02) && $Acciones_02 != ''){ 
        	$comparacion_Acciones_02=$Acciones_02 ;
        }else{
			$comparacion_Acciones_02='0' ;
		}
		//filtro de Acciones_03
		if(isset($Acciones_03) && $Acciones_03 != ''){ 
        	$comparacion_Acciones_03=$Acciones_03 ;
        }else{
			$comparacion_Acciones_03='0' ;
		}
		//filtro de Acciones_04
		if(isset($Acciones_04) && $Acciones_04 != ''){ 
        	$comparacion_Acciones_04=$Acciones_04 ;
        }else{
			$comparacion_Acciones_04='0' ;
		}
		//filtro de Acciones_05
		if(isset($Acciones_05) && $Acciones_05 != ''){ 
        	$comparacion_Acciones_05=$Acciones_05 ;
        }else{
			$comparacion_Acciones_05='0' ;
		}
		//filtro de Acciones_06
		if(isset($Acciones_06) && $Acciones_06 != ''){ 
        	$comparacion_Acciones_06=$Acciones_06 ;
        }else{
			$comparacion_Acciones_06='0' ;
		}
		//filtro de Acciones_07
		if(isset($Acciones_07) && $Acciones_07 != ''){ 
        	$comparacion_Acciones_07=$Acciones_07 ;
        }else{
			$comparacion_Acciones_07='0' ;
		}
		//filtro de Acciones_08
		if(isset($Acciones_08) && $Acciones_08 != ''){ 
        	$comparacion_Acciones_08=$Acciones_08 ;
        }else{
			$comparacion_Acciones_08='0' ;
		}
		//filtro de Acciones_09
		if(isset($Acciones_09) && $Acciones_09 != ''){ 
        	$comparacion_Acciones_09=$Acciones_09 ;
        }else{
			$comparacion_Acciones_09='0' ;
		}
		//filtro de Acciones_10
		if(isset($Acciones_10) && $Acciones_10 != ''){ 
        	$comparacion_Acciones_10=$Acciones_10 ;
        }else{
			$comparacion_Acciones_10='0' ;
		}
		//filtro de Acciones_11
		if(isset($Acciones_11) && $Acciones_11 != ''){ 
        	$comparacion_Acciones_11=$Acciones_11 ;
        }else{
			$comparacion_Acciones_11='0' ;
		}
		//filtro de Acciones_12
		if(isset($Acciones_12) && $Acciones_12 != ''){ 
        	$comparacion_Acciones_12=$Acciones_12 ;
        }else{
			$comparacion_Acciones_12='0' ;
		}
		//filtro de Acciones_13
		if(isset($Acciones_13) && $Acciones_13 != ''){ 
        	$comparacion_Acciones_13=$Acciones_13 ;
        }else{
			$comparacion_Acciones_13='0' ;
		}
		//filtro de Acciones_14
		if(isset($Acciones_14) && $Acciones_14 != ''){ 
        	$comparacion_Acciones_14=$Acciones_14 ;
        }else{
			$comparacion_Acciones_14='0' ;
		}
		//filtro de idDepto
		if(isset($idDepto) && $idDepto != ''){ 
        	$comparacion_idDepto=$idDepto ;
        }else{
			$comparacion_idDepto='0' ;
		}
		//filtro de idSolicitud
		if(isset($idSolicitud) && $idSolicitud != ''){ 
        	$comparacion_idSolicitud=$idSolicitud ;
        }else{
			$comparacion_idSolicitud='0' ;
		}


//Realizo una consulta antes de guardar para realizar las comparaciones
//Se traen los datos de la OIRS
$query = "SELECT   id_origen_a, id_origen_b, Inicia, Expira, id_antecedentes, n_antecedente, obs_antecedente, id_materia, obs_materia, Acciones_01, Acciones_02, Acciones_03, Acciones_04, Acciones_05, Acciones_06, Acciones_07, Acciones_08, Acciones_09, Acciones_10, Acciones_11, Acciones_12, Acciones_13, Acciones_14,idDepto,idSolicitud
FROM `oirs_listado`
WHERE id_Oirs = '{$id_Oirs}'";
$resultado = mysql_query ($query, $dbConn);
$rowpOirs = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);


//Se crean las variables a utilizar
	date_default_timezone_set("Chile/Continental");
	$Hora           = date("H:i:s",time());
	$Fecha          = date("Y-m-d");
	$idUsuario      = $arrUsuario['idUsuario'];	

	
//Comparacion del origen de la solicitud
if($rowpOirs['id_origen_a']!=$comparacion_id_origen_a){
	//Se hace consulta para obtener el nombre
	$query = "SELECT descripcion
	FROM `mnt_oirs_origen`
	WHERE id_origen_a = {$comparacion_id_origen_a}";
	$resultado = mysql_query ($query, $dbConn);
	$rowdata = mysql_fetch_assoc ($resultado);
	//Se arma el texto a ingresar
	$Detalle01        = 'Modificacion del origen a '.$rowdata['descripcion'];	
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle01')";
	$result = mysql_query($query, $dbConn);	
}

	
//Comparacion del destino de la solicitud
if($rowpOirs['id_origen_b']!=$comparacion_id_origen_b){
	//Se hace consulta para obtener el nombre
	$query = "SELECT descripcion
	FROM `mnt_oirs_destino`
	WHERE id_origen_b = {$comparacion_id_origen_b}";
	$resultado = mysql_query ($query, $dbConn);
	$rowdata = mysql_fetch_assoc ($resultado);
	//Se arma el texto a ingresar
	$Detalle02        = 'Modificacion del destino a '.$rowdata['descripcion'];
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle02')";
	$result = mysql_query($query, $dbConn);	
}

	
//Modificacion de la fecha de inicio
if($rowpOirs['Inicia']!=$comparacion_Inicia){
	//Comentario a agregar en la base de datos	
	$Detalle03        = 'Modificacion de la fecha de inicio a '.$comparacion_Inicia;	
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle03')";
	$result = mysql_query($query, $dbConn);	
}

	
//Modificacion dela fecha de termino
if($rowpOirs['Expira']!=$comparacion_Expira){
	//Comentario a agregar en la base de datos	
	$Detalle04        = 'Modificacion de la fecha de termino a '.$comparacion_Expira;		
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle04')";
	$result = mysql_query($query, $dbConn);	
}

	
//Modificacion de los antecedentes
if($rowpOirs['id_antecedentes']!=$comparacion_id_antecedentes){
	//Se hace consulta para obtener el nombre
	$query = "SELECT descripcion
	FROM `mnt_oirs_antecedentes`
	WHERE id_antecedentes = {$comparacion_id_antecedentes}";
	$resultado = mysql_query ($query, $dbConn);
	$rowdata = mysql_fetch_assoc ($resultado);
	//Se arma el texto a ingresar
	$Detalle05        = 'Modificacion del antecedente a '.$rowdata['descripcion'];
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle05')";
	$result = mysql_query($query, $dbConn);	
}

	
//Modificacion del numero de documento de los antecedentes
if($rowpOirs['n_antecedente']!=$comparacion_n_antecedente){
	//Comentario a agregar en la base de datos	
	$Detalle06        = 'Modificacion del numero de documento del antecedente a '.$comparacion_n_antecedente;		
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle06')";
	$result = mysql_query($query, $dbConn);	
}

	
//Modificacion de la observacion de los antecedentes a
if($rowpOirs['obs_antecedente']!=$comparacion_obs_antecedente){
	//Comentario a agregar en la base de datos	
	$Detalle07        = 'Modificacion de las observaciones de los antecedentes a '.$comparacion_obs_antecedente;	
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle07')";
	$result = mysql_query($query, $dbConn);	
}

	
//Modificacion de la materia
if($rowpOirs['id_materia']!=$comparacion_id_materia){
	//Se hace consulta para obtener el nombre
	$query = "SELECT descripcion
	FROM `mnt_oirs_materia`
	WHERE id_materia = {$comparacion_id_materia}";
	$resultado = mysql_query ($query, $dbConn);
	$rowdata = mysql_fetch_assoc ($resultado);
	//Se arma el texto a ingresar
	$Detalle08        = 'Modificacion de la materia a '.$rowdata['descripcion'];
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle08')";
	$result = mysql_query($query, $dbConn);	
}

	
//Modificacion de las observaciones de la materia
if($rowpOirs['obs_materia']!=$comparacion_obs_materia){
	//Comentario a agregar en la base de datos	
	$Detalle09        = 'Modificacion de las observaciones de la materia a '.$comparacion_obs_materia;		
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle09')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_01']!=$comparacion_Acciones_01){
	if($comparacion_Acciones_01=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle10        = 'Modificacion de Tomar contacto con a '.$x;	
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle10')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_02']!=$comparacion_Acciones_02){
	if($comparacion_Acciones_02=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle11        = 'Modificacion de Estudio y proposicion a '.$x;		
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle11')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_03']!=$comparacion_Acciones_03){
	if($comparacion_Acciones_03=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle12        = 'Modificacion de Resolver segun corresponda a '.$x;		
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle12')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_04']!=$comparacion_Acciones_04){
	if($comparacion_Acciones_04=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle13        = 'Modificacion de Preparar resp. con firma alcalde tiene x dias a '.$x;		
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle13')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_05']!=$comparacion_Acciones_05){
	if($comparacion_Acciones_05=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle14        = 'Modificacion de Discutir materia con alcalde a '.$x;	
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle14')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_06']!=$comparacion_Acciones_06){
	if($comparacion_Acciones_06=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle15        = 'Modificacion de Para su conocimiento y fines a '.$x;	
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle15')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_07']!=$comparacion_Acciones_07){
	if($comparacion_Acciones_07=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle16        = 'Modificacion de Para su informacion a '.$x;	
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle16')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_08']!=$comparacion_Acciones_08){
	if($comparacion_Acciones_08=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle17        = 'Modificacion de Para dar solucion a '.$x;	
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle17')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_09']!=$comparacion_Acciones_09){
	if($comparacion_Acciones_09=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle18        = 'Modificacion de Informe verbal a '.$x;	
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle18')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_10']!=$comparacion_Acciones_10){
	if($comparacion_Acciones_10=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle19        = 'Modificacion de Informe escrito a '.$x;	
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle19')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_11']!=$comparacion_Acciones_11){
	if($comparacion_Acciones_11=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle20        = 'Modificacion de Para su visacion a '.$x;		
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle20')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_12']!=$comparacion_Acciones_12){
	if($comparacion_Acciones_12=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle21        = 'Modificacion de Preparar decreto a '.$x;		
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle21')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_13']!=$comparacion_Acciones_13){
	if($comparacion_Acciones_13=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle22        = 'Modificacion de Responder por orden del alcalde a '.$x;	
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle22')";
	$result = mysql_query($query, $dbConn);	
}

	
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['Acciones_14']!=$comparacion_Acciones_14){
	if($comparacion_Acciones_14=='1'){
		$x='Activo';	
	}else{
		$x='Inactivo';
	}	
	//Comentario a agregar en la base de datos
	$Detalle23        = 'Modificacion de Coordina a '.$x;	
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle23')";
	$result = mysql_query($query, $dbConn);	
}


//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['idDepto']!=$comparacion_idDepto){
	//Se hace consulta para obtener el nombre
	$query = "SELECT Nombre, n_dias
	FROM `mnt_oirs_departamentos`
	WHERE idDepto = {$comparacion_idDepto}";
	$resultado = mysql_query ($query, $dbConn);
	$rowdata = mysql_fetch_assoc ($resultado);
	//Se arma el texto a ingresar
	$Detalle24        = 'Modificacion del departamento a '.$rowdata['Nombre'].', el departamento tiene '.$rowdata['n_dias'].' dias para responder a la solicitud';
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle24')";
	$result = mysql_query($query, $dbConn);	
	//Agrego detalles al numero de dias
	$query  = "INSERT INTO `oirs_dias` (id_OirsDias, idUsuario, Fecha, Hora, n_dias) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '".$rowdata['n_dias']."')";
	$result = mysql_query($query, $dbConn);	
}
//Se hacen las comparaciones, verificando diferencias
if($rowpOirs['idSolicitud']!=$comparacion_idSolicitud){	
	//Se arma el texto a ingresar
	$Detalle25        = 'Asignacion de la solicitud N° '.$rowpOirs['idSolicitud'];
	//Se guardan los datos
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$id_Oirs', '$idUsuario', '$Fecha', '$Hora', '$Detalle25')";
	$result = mysql_query($query, $dbConn);	
	//Se actualiza la solicitud agregandole el numero de la OIRS
	//Se consulta por la totalidad de solicitudes con OIRS
	$query = "SELECT idSolicitud FROM solicitud_listado WHERE idSolicitud= '$comparacion_idSolicitud'"; 
	$resultado = mysql_query ($query, $dbConn);		
	$n_ex2 = mysql_num_rows($resultado);
	if($n_ex2>0){
		$query  = "UPDATE `solicitud_listado` SET id_Oirs = '$id_Oirs' WHERE idSolicitud = '$comparacion_idSolicitud'";
		$result = mysql_query($query, $dbConn);	
	}

	
}

/*
		// Se traen todos los datos del cliente
		$query = "SELECT email, Nombres, ApellidoPat, ApellidoMat
		FROM `clientes_listado`
		WHERE idCliente = {$_GET['id']}";
		$resultado = mysql_query ($query, $dbConn);
		$rowdata1 = mysql_fetch_assoc ($resultado);
		
		//Se traen los datos del departamento original
		$query = "SELECT 
		mnt_oirs_departamentos.Nombre, 
		usuarios_listado.email AS email_usuario
		FROM `mnt_oirs_departamentos`
		LEFT JOIN `usuarios_listado` ON usuarios_listado.idUsuario = mnt_oirs_departamentos.idUsuario
		WHERE idDepto = {$rowpOirs['idDepto']}";
		$resultado = mysql_query ($query, $dbConn);
		$rowdata2 = mysql_fetch_assoc ($resultado);
		
		//Se traen los datos del departamento nuevo en caso de algun cambio
		if($rowpOirs['idDepto']!=$comparacion_idDepto){
			$query = "SELECT 
			mnt_oirs_departamentos.Nombre, 
			usuarios_listado.email AS email_usuario
			FROM `mnt_oirs_departamentos`
			LEFT JOIN `usuarios_listado` ON usuarios_listado.idUsuario = mnt_oirs_departamentos.idUsuario
			WHERE idDepto = {$comparacion_idDepto}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata3 = mysql_fetch_assoc ($resultado);
		}


		//envio de correo 
		$mail             = new PHPMailer();
		$mail->IsHTML(true);
		$mail->SMTPAuth   = true;
		$mail->Host       = "localhost";
		//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		//====== DE QUIEN ES ========
		$mail->From=$rowempresa['email_principal'];
		$mail->FromName=$rowempresa['Nombre'];
		$mail->Sender=$rowempresa['email_principal'];
		$mail->AddReplyTo("".$rowempresa['email_principal']."", "Responde a este mail");
		//====== PARA QUIEN =========
		$mail->Subject = "Informacion OIRS" ;
		$mail->AddAddress($rowdata1['email']);//usuario
		$mail->AddAddress($rowdata2['email_usuario']);//departamento original
		
		if(isset($rowdata3['email_usuario'])){
			$mail->AddAddress($rowdata3['email_usuario']);//departamento derivado en caso de existir
		}	    
		//====== MENSAJE =========
		$strBody  = "<h2>Informe OIRS</h2>";
		$strBody .= "<p>Solicitante : ".$rowdata1['Nombres'].' '.$rowdata1['ApellidoPat'].' '.$rowdata1['ApellidoMat']."   <br/>";
		$strBody .= "<p>Departamento encargado :  ".$rowdata2['Nombre']."  </p>";
		$strBody .= "<h2>Actualizaciones:</h2>";
		if(isset($Detalle01)){ $strBody .= "<p>".$Detalle01."</p>"; }
		if(isset($Detalle02)){ $strBody .= "<p>".$Detalle02."</p>"; }
		if(isset($Detalle03)){ $strBody .= "<p>".$Detalle03."</p>"; }
		if(isset($Detalle04)){ $strBody .= "<p>".$Detalle04."</p>"; }
		if(isset($Detalle05)){ $strBody .= "<p>".$Detalle05."</p>"; }
		if(isset($Detalle06)){ $strBody .= "<p>".$Detalle06."</p>"; }
		if(isset($Detalle07)){ $strBody .= "<p>".$Detalle07."</p>"; }
		if(isset($Detalle08)){ $strBody .= "<p>".$Detalle08."</p>"; }
		if(isset($Detalle09)){ $strBody .= "<p>".$Detalle09."</p>"; }
		if(isset($Detalle10)){ $strBody .= "<p>".$Detalle10."</p>"; }
		if(isset($Detalle11)){ $strBody .= "<p>".$Detalle11."</p>"; }
		if(isset($Detalle12)){ $strBody .= "<p>".$Detalle12."</p>"; }
		if(isset($Detalle13)){ $strBody .= "<p>".$Detalle13."</p>"; }
		if(isset($Detalle14)){ $strBody .= "<p>".$Detalle14."</p>"; }
		if(isset($Detalle15)){ $strBody .= "<p>".$Detalle15."</p>"; }
		if(isset($Detalle16)){ $strBody .= "<p>".$Detalle16."</p>"; }
		if(isset($Detalle17)){ $strBody .= "<p>".$Detalle17."</p>"; }
		if(isset($Detalle18)){ $strBody .= "<p>".$Detalle18."</p>"; }
		if(isset($Detalle19)){ $strBody .= "<p>".$Detalle19."</p>"; }
		if(isset($Detalle20)){ $strBody .= "<p>".$Detalle20."</p>"; }
		if(isset($Detalle21)){ $strBody .= "<p>".$Detalle21."</p>"; }
		if(isset($Detalle22)){ $strBody .= "<p>".$Detalle22."</p>"; }
		if(isset($Detalle23)){ $strBody .= "<p>".$Detalle23."</p>"; }
		if(isset($Detalle24)){ $strBody .= "<p>".$Detalle24."</p>"; }
		if(isset($Detalle25)){ $strBody .= "<p>".$Detalle25."</p>"; }
	
		$mail->MsgHTML($strBody);
		if(!$mail->Send()){
			$mail->ClearAddresses();
		}else{
			$mail->ClearAddresses();
		}*/

}?>