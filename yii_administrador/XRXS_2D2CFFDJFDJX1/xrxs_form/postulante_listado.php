<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['id_usuario']) )          $id_usuario           = $_POST['id_usuario'];
	if ( !empty($_POST['user_atv']) )            $user_atv             = $_POST['user_atv'];
	if ( !empty($_POST['PostCod']) )             $PostCod              = $_POST['PostCod'];
	if ( !empty($_POST['PostRut']) )             $PostRut              = $_POST['PostRut'];
	if ( !empty($_POST['PostDV']) )              $PostDV               = $_POST['PostDV'];
	if ( !empty($_POST['PostNombres']) )         $PostNombres          = $_POST['PostNombres'];
	if ( !empty($_POST['PostApellPapa']) )       $PostApellPapa        = $_POST['PostApellPapa'];
	if ( !empty($_POST['PostApellMama']) )       $PostApellMama 	   = $_POST['PostApellMama'];
	if ( !empty($_POST['PostFecNac']) )          $PostFecNac 	       = $_POST['PostFecNac'];
	if ( !empty($_POST['donderecibo']) )         $donderecibo 	       = $_POST['donderecibo'];
	if ( !empty($_POST['PostFonoFijo']) )        $PostFonoFijo 	       = $_POST['PostFonoFijo'];
	if ( !empty($_POST['PostFonoCel']) )         $PostFonoCel 	       = $_POST['PostFonoCel'];
	if ( !empty($_POST['idPais']) )              $idPais 	           = $_POST['idPais'];
	if ( !empty($_POST['idDepartamento']) )      $idDepartamento       = $_POST['idDepartamento'];
	if ( !empty($_POST['idProvincia']) )         $idProvincia 	       = $_POST['idProvincia'];
	if ( !empty($_POST['idDistrito']) )          $idDistrito 	       = $_POST['idDistrito'];
	if ( !empty($_POST['PostDireccion']) )       $PostDireccion 	   = $_POST['PostDireccion'];
	if ( !empty($_POST['PostEmail']) )           $PostEmail 	       = $_POST['PostEmail'];
	if ( !empty($_POST['clave']) )               $clave 	           = $_POST['clave'];
	if ( !empty($_POST['PostFoto1']) )           $PostFoto1 	       = $_POST['PostFoto1'];
	if ( !empty($_POST['PostFoto2']) )           $PostFoto2 	       = $_POST['PostFoto2'];
	if ( !empty($_POST['PostFoto3']) )           $PostFoto3 	       = $_POST['PostFoto3'];
	if ( !empty($_POST['estadovideo1']) )        $estadovideo1 	       = $_POST['estadovideo1'];
	if ( !empty($_POST['estadovideo2']) )        $estadovideo2 	       = $_POST['estadovideo2'];
	if ( !empty($_POST['estadovideo3']) )        $estadovideo3 	       = $_POST['estadovideo3'];
	if ( !empty($_POST['PostProfesion1']) )      $PostProfesion1 	   = $_POST['PostProfesion1'];
	if ( !empty($_POST['PostProfesion2']) )      $PostProfesion2 	   = $_POST['PostProfesion2'];
	if ( !empty($_POST['PostProfesion3']) )      $PostProfesion3 	   = $_POST['PostProfesion3'];
	if ( !empty($_POST['PostProduccion1']) )     $PostProduccion1 	   = $_POST['PostProduccion1'];
	if ( !empty($_POST['PostProduccion2']) )     $PostProduccion2 	   = $_POST['PostProduccion2'];
	if ( !empty($_POST['PostProduccion3']) )     $PostProduccion3 	   = $_POST['PostProduccion3'];
	if ( !empty($_POST['PostWeb']) )             $PostWeb 	           = $_POST['PostWeb'];
	if ( !empty($_POST['PostDispon']) )          $PostDispon 	       = $_POST['PostDispon'];
	if ( !empty($_POST['PostPrefUbicacion']) )   $PostPrefUbicacion    = $_POST['PostPrefUbicacion'];
	if ( !empty($_POST['PostActivo']) )          $PostActivo 	       = $_POST['PostActivo'];
	if ( !empty($_POST['PostFecIngreso']) )      $PostFecIngreso 	   = $_POST['PostFecIngreso'];
	if ( !empty($_POST['PostFecModifica']) )     $PostFecModifica 	   = $_POST['PostFecModifica'];
	if ( !empty($_POST['PostEducacion']) )       $PostEducacion 	   = $_POST['PostEducacion'];
	if ( !empty($_POST['PostTituloObt']) )       $PostTituloObt 	   = $_POST['PostTituloObt'];
	if ( !empty($_POST['PostFonoAlter']) )       $PostFonoAlter 	   = $_POST['PostFonoAlter'];
	if ( !empty($_POST['PostSexo']) )            $PostSexo 	           = $_POST['PostSexo'];
	if ( !empty($_POST['PostreciboNoticias']) )  $PostreciboNoticias   = $_POST['PostreciboNoticias'];
	if ( !empty($_POST['PostIngles']) )          $PostIngles 	       = $_POST['PostIngles'];
	if ( !empty($_POST['PostComent']) )          $PostComent 	       = $_POST['PostComent'];
	if ( !empty($_POST['PostObjetivo']) )        $PostObjetivo 	       = $_POST['PostObjetivo'];
	if ( !empty($_POST['PostBrochure']) )        $PostBrochure 	       = $_POST['PostBrochure'];
	if ( !empty($_POST['alias']) )               $alias 	           = $_POST['alias'];
	if ( !empty($_POST['url_img']) )             $url_img 	           = $_POST['url_img'];
	if ( !empty($_POST['rol']) )                 $rol 	               = $_POST['rol'];
	if ( !empty($_POST['vid_prof1']) )           $vid_prof1 	       = $_POST['vid_prof1'];
	if ( !empty($_POST['vid_prof2']) )           $vid_prof2 	       = $_POST['vid_prof2'];
	if ( !empty($_POST['vid_prof3']) )           $vid_prof3 	       = $_POST['vid_prof3'];
	if ( !empty($_POST['vid_aprob1']) )          $vid_aprob1 	       = $_POST['vid_aprob1'];
	if ( !empty($_POST['vid_aprob2']) )          $vid_aprob2 	       = $_POST['vid_aprob2'];
	if ( !empty($_POST['vid_aprob3']) )          $vid_aprob3 	       = $_POST['vid_aprob3'];

	
/*******************************************************************************************************************/
/*                                      Verificacion de los datos obligatorios                                     */
/*******************************************************************************************************************/

	//limpio y separo los datos de la cadena de comprobacion
	$form_obligatorios = str_replace(' ', '', $form_obligatorios);
	$piezas = explode(",", $form_obligatorios);
	//recorro los elementos
	foreach ($piezas as $valor) {
		//veo si existe el dato solicitado y genero el error
		switch ($valor) {
		
	case 'id_usuario':          if(empty($id_usuario)){            $error['id_usuario']          = 'error/No ha ingresado el id del cliente';}break;
	case 'user_atv':            if(empty($user_atv)){              $error['user_atv']            = 'error/No ha ingresado el id del cliente';}break;
	case 'PostCod':             if(empty($PostCod)){               $error['PostCod']             = 'error/No ha ingresado el id del cliente';}break;
	case 'PostRut':             if(empty($PostRut)){               $error['PostRut']             = 'error/No ha ingresado el id del cliente';}break;
	case 'PostDV':              if(empty($PostDV)){                $error['PostDV']              = 'error/No ha ingresado el id del cliente';}break;
	case 'PostNombres':         if(empty($PostNombres)){           $error['PostNombres']         = 'error/No ha ingresado el id del cliente';}break;
	case 'PostApellPapa':       if(empty($PostApellPapa)){         $error['PostApellPapa']       = 'error/No ha ingresado el id del cliente';}break;
	case 'PostApellMama':       if(empty($PostApellMama)){  	   $error['PostApellMama']       = 'error/No ha ingresado el id del cliente';}break;
	case 'PostFecNac':          if(empty($PostFecNac)){  	       $error['PostFecNac']          = 'error/No ha ingresado el id del cliente';}break;
	case 'donderecibo':         if(empty($donderecibo)){  	       $error['donderecibo']         = 'error/No ha ingresado el id del cliente';}break;
	case 'PostFonoFijo':        if(empty($PostFonoFijo)){  	       $error['PostFonoFijo']        = 'error/No ha ingresado el id del cliente';}break;
	case 'PostFonoCel':         if(empty($PostFonoCel)){  	       $error['PostFonoCel']         = 'error/No ha ingresado el id del cliente';}break;
	case 'idPais':              if(empty($idPais)){  	           $error['idPais']              = 'error/No ha ingresado el id del cliente';}break;
	case 'idDepartamento':      if(empty($idDepartamento)){        $error['idDepartamento']      = 'error/No ha ingresado el id del cliente';}break;
	case 'idProvincia':         if(empty($idProvincia)){  	       $error['idProvincia']         = 'error/No ha ingresado el id del cliente';}break;
	case 'idDistrito':          if(empty($idDistrito)){  	       $error['idDistrito']          = 'error/No ha ingresado el id del cliente';}break;
	case 'PostDireccion':       if(empty($PostDireccion)){  	   $error['PostDireccion']       = 'error/No ha ingresado el id del cliente';}break;
	case 'PostEmail':           if(empty($PostEmail)){  	       $error['PostEmail']           = 'error/No ha ingresado el id del cliente';}break;
	case 'clave':               if(empty($clave)){  	           $error['clave']               = 'error/No ha ingresado el id del cliente';}break;
	case 'PostFoto1':           if(empty($PostFoto1)){  	       $error['PostFoto1']           = 'error/No ha ingresado el id del cliente';}break;
	case 'PostFoto2':           if(empty($PostFoto2)){  	       $error['PostFoto2']           = 'error/No ha ingresado el id del cliente';}break;
	case 'PostFoto3':           if(empty($PostFoto3)){  	       $error['PostFoto3']           = 'error/No ha ingresado el id del cliente';}break;
	case 'estadovideo1':        if(empty($estadovideo1)){  	       $error['estadovideo1']        = 'error/No ha ingresado el id del cliente';}break;
	case 'estadovideo2':        if(empty($estadovideo2)){ 	       $error['estadovideo2']        = 'error/No ha ingresado el id del cliente';}break;
	case 'estadovideo3':        if(empty($estadovideo3)){  	       $error['estadovideo3']        = 'error/No ha ingresado el id del cliente';}break;
	case 'PostProfesion1':      if(empty($PostProfesion1)){  	   $error['PostProfesion1']      = 'error/No ha ingresado el id del cliente';}break;
	case 'PostProfesion2':      if(empty($PostProfesion2)){  	   $error['PostProfesion2']      = 'error/No ha ingresado el id del cliente';}break;
	case 'PostProfesion3':      if(empty($PostProfesion3)){  	   $error['PostProfesion3']      = 'error/No ha ingresado el id del cliente';}break;
	case 'PostProduccion1':     if(empty($PostProduccion1)){  	   $error['PostProduccion1']     = 'error/No ha ingresado el id del cliente';}break;
	case 'PostProduccion2':     if(empty($PostProduccion2)){  	   $error['PostProduccion2']     = 'error/No ha ingresado el id del cliente';}break;
	case 'PostProduccion3':     if(empty($PostProduccion3)){  	   $error['PostProduccion3']     = 'error/No ha ingresado el id del cliente';}break;
	case 'PostWeb':             if(empty($PostWeb)){  	           $error['PostWeb']             = 'error/No ha ingresado el id del cliente';}break;
	case 'PostDispon':          if(empty($PostDispon)){  	       $error['PostDispon']          = 'error/No ha ingresado el id del cliente';}break;
	case 'PostPrefUbicacion':   if(empty($PostPrefUbicacion)){     $error['PostPrefUbicacion']   = 'error/No ha ingresado el id del cliente';}break;
	case 'PostActivo':          if(empty($PostActivo)){  	       $error['PostActivo']          = 'error/No ha ingresado el id del cliente';}break;
	case 'PostFecIngreso':      if(empty($PostFecIngreso)){  	   $error['PostFecIngreso']      = 'error/No ha ingresado el id del cliente';}break;
	case 'PostFecModifica':     if(empty($PostFecModifica)){  	   $error['PostFecModifica']     = 'error/No ha ingresado el id del cliente';}break;
	case 'PostEducacion':       if(empty($PostEducacion)){  	   $error['PostEducacion']       = 'error/No ha ingresado el id del cliente';}break;
	case 'PostTituloObt':       if(empty($PostTituloObt)){  	   $error['PostTituloObt']       = 'error/No ha ingresado el id del cliente';}break;
	case 'PostFonoAlter':       if(empty($PostFonoAlter)){  	   $error['PostFonoAlter']       = 'error/No ha ingresado el id del cliente';}break;
	case 'PostSexo':            if(empty($PostSexo)){  	           $error['PostSexo']            = 'error/No ha ingresado el id del cliente';}break;
	case 'PostreciboNoticias':  if(empty($PostreciboNoticias)){    $error['PostreciboNoticias']  = 'error/No ha ingresado el id del cliente';}break;
	case 'PostIngles':          if(empty($PostIngles)){  	       $error['PostIngles']          = 'error/No ha ingresado el id del cliente';}break;
	case 'PostComent':          if(empty($PostComent)){  	       $error['PostComent']          = 'error/No ha ingresado el id del cliente';}break;
	case 'PostObjetivo':        if(empty($PostObjetivo)){  	       $error['PostObjetivo']        = 'error/No ha ingresado el id del cliente';}break;
	case 'PostBrochure':        if(empty($PostBrochure)){  	       $error['PostBrochure']        = 'error/No ha ingresado el id del cliente';}break;
	case 'alias':               if(empty($alias)){  	           $error['alias']               = 'error/No ha ingresado el id del cliente';}break;
	case 'url_img':             if(empty($url_img)){  	           $error['url_img']             = 'error/No ha ingresado el id del cliente';}break;
	case 'rol':                 if(empty($rol)){  	               $error['rol']                 = 'error/No ha ingresado el id del cliente';}break;
	case 'vid_prof1':           if(empty($vid_prof1)){  	       $error['vid_prof1']           = 'error/No ha ingresado el id del cliente';}break;
	case 'vid_prof2':           if(empty($vid_prof2)){  	       $error['vid_prof2']           = 'error/No ha ingresado el id del cliente';}break;
	case 'vid_prof3':           if(empty($vid_prof3)){  	       $error['vid_prof3']           = 'error/No ha ingresado el id del cliente';}break;
	case 'vid_aprob1':          if(empty($vid_aprob1)){  	       $error['vid_aprob1']          = 'error/No ha ingresado el id del cliente';}break;
	case 'vid_aprob2':          if(empty($vid_aprob2)){  	       $error['vid_aprob2']          = 'error/No ha ingresado el id del cliente';}break;
	case 'vid_aprob3':          if(empty($vid_aprob3)){  	       $error['vid_aprob3']          = 'error/No ha ingresado el id del cliente';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($PostEmail)){if(validaremail($PostEmail)){ }else{   $error['PostEmail']   = 'error/El Email ingresado no es valido'; }}	
	
	if(isset($PostFonoFijo)){if (validarnumero($PostFonoFijo)) {         $error['PostFonoFijo']	   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($PostFonoCel)){if (validarnumero($PostFonoCel)) {         $error['PostFonoCel']	   = 'error/Ingrese un numero telefonico valido'; }}

	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
	
/*******************************************************************************************************************/		
		case 'insert':
			
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "id_usuario='".$id_usuario."'" ;
				if(isset($user_atv) && $user_atv != ''){                         $a .= ",user_atv='".$user_atv."'" ;}
				if(isset($PostCod) && $PostCod != ''){                           $a .= ",PostCod='".$PostCod."'" ;}
				if(isset($PostRut) && $PostRut != ''){                           $a .= ",PostRut='".$PostRut."'" ;}
				if(isset($PostDV) && $PostDV != ''){                             $a .= ",PostDV='".$PostDV."'" ;}
				if(isset($PostNombres) && $PostNombres != ''){                   $a .= ",PostNombres='".$PostNombres."'" ;}
				if(isset($PostApellPapa) && $PostApellPapa != ''){               $a .= ",PostApellPapa='".$PostApellPapa."'" ;}
				if(isset($PostApellMama) && $PostApellMama != ''){               $a .= ",PostApellMama='".$PostApellMama."'" ;}
				if(isset($PostFecNac) && $PostFecNac != ''){                     $a .= ",PostFecNac='".$PostFecNac."'" ;}
				if(isset($donderecibo) && $donderecibo != ''){                   $a .= ",donderecibo='".$donderecibo."'" ;}
				if(isset($PostFonoFijo) && $PostFonoFijo != ''){                 $a .= ",PostFonoFijo='".$PostFonoFijo."'" ;}
				if(isset($PostFonoCel) && $PostFonoCel != ''){                   $a .= ",PostFonoCel='".$PostFonoCel."'" ;}
				if(isset($idPais) && $idPais != ''){                             $a .= ",idPais='".$idPais."'" ;}
				if(isset($idDepartamento) && $idDepartamento != ''){             $a .= ",idDepartamento='".$idDepartamento."'" ;}
				if(isset($idProvincia) && $idProvincia != ''){                   $a .= ",idProvincia='".$idProvincia."'" ;}
				if(isset($idDistrito) && $idDistrito != ''){                     $a .= ",idDistrito='".$idDistrito."'" ;}
				if(isset($PostDireccion) && $PostDireccion != ''){               $a .= ",PostDireccion='".$PostDireccion."'" ;}
				if(isset($PostEmail) && $PostEmail != ''){                       $a .= ",PostEmail='".$PostEmail."'" ;}
				if(isset($clave) && $clave != ''){                               $a .= ",clave='".$clave."'" ;}
				if(isset($PostFoto1) && $PostFoto1 != ''){                       $a .= ",idTipo='".$PostFoto1."'" ;}
				if(isset($PostFoto2) && $PostFoto2 != ''){                       $a .= ",PostFoto2='".$PostFoto2."'" ;}
				if(isset($PostFoto3) && $PostFoto3 != ''){                       $a .= ",PostFoto3='".$PostFoto3."'" ;}
				if(isset($estadovideo1) && $estadovideo1 != ''){                 $a .= ",estadovideo1='".$estadovideo1."'" ;}
				if(isset($estadovideo2) && $estadovideo2 != ''){                 $a .= ",estadovideo2='".$estadovideo2."'" ;}
				if(isset($estadovideo3) && $estadovideo3 != ''){                 $a .= ",estadovideo3='".$estadovideo3."'" ;}
				if(isset($PostProfesion1) && $PostProfesion1 != ''){             $a .= ",PostProfesion1='".$PostProfesion1."'" ;}
				if(isset($PostProfesion2) && $PostProfesion2 != ''){             $a .= ",PostProfesion2='".$PostProfesion2."'" ;}
				if(isset($PostProfesion3) && $PostProfesion3 != ''){             $a .= ",PostProfesion3='".$PostProfesion3."'" ;}
				if(isset($PostProduccion1) && $PostProduccion1 != ''){           $a .= ",PostProduccion1='".$PostProduccion1."'" ;}
				if(isset($PostProduccion2) && $PostProduccion2 != ''){           $a .= ",PostProduccion2='".$PostProduccion2."'" ;}
				if(isset($PostProduccion3) && $PostProduccion3 != ''){           $a .= ",PostProduccion3='".$PostProduccion3."'" ;}
				if(isset($PostWeb) && $PostWeb != ''){                           $a .= ",PostWeb='".$PostWeb."'" ;}
				if(isset($PostDispon) && $PostDispon != ''){                     $a .= ",PostDispon='".$PostDispon."'" ;}
				if(isset($PostPrefUbicacion) && $PostPrefUbicacion != ''){       $a .= ",PostPrefUbicacion='".$PostPrefUbicacion."'" ;}
				if(isset($PostActivo) && $PostActivo != ''){                     $a .= ",PostActivo='".$PostActivo."'" ;}
				if(isset($PostFecIngreso) && $PostFecIngreso != ''){             $a .= ",PostFecIngreso='".$PostFecIngreso."'" ;}
				if(isset($PostFecModifica) && $PostFecModifica != ''){           $a .= ",PostFecModifica='".$PostFecModifica."'" ;}
				if(isset($PostEducacion) && $PostEducacion != ''){               $a .= ",PostEducacion='".$PostEducacion."'" ;}
				if(isset($PostTituloObt) && $PostTituloObt != ''){               $a .= ",PostTituloObt='".$PostTituloObt."'" ;}
				if(isset($PostFonoAlter) && $PostFonoAlter != ''){               $a .= ",PostFonoAlter='".$PostFonoAlter."'" ;}
				if(isset($PostSexo) && $PostSexo != ''){                         $a .= ",PostSexo='".$PostSexo."'" ;}
				if(isset($PostreciboNoticias) && $PostreciboNoticias != ''){     $a .= ",PostreciboNoticias='".$PostreciboNoticias."'" ;}
				if(isset($PostIngles) && $PostIngles != ''){                     $a .= ",PostIngles='".$PostIngles."'" ;}
				if(isset($PostComent) && $PostComent != ''){                     $a .= ",PostComent='".$PostComent."'" ;}
				if(isset($PostObjetivo) && $PostObjetivo != ''){                 $a .= ",PostObjetivo='".$PostObjetivo."'" ;}
				if(isset($PostBrochure) && $PostBrochure != ''){                 $a .= ",PostBrochure='".$PostBrochure."'" ;}
				if(isset($alias) && $alias != ''){                               $a .= ",alias='".$alias."'" ;}
				if(isset($url_img) && $url_img != ''){                           $a .= ",url_img='".$url_img."'" ;}
				if(isset($rol) && $rol != ''){                                   $a .= ",rol='".$rol."'" ;}
				if(isset($vid_prof1) && $vid_prof1 != ''){                       $a .= ",vid_prof1='".$vid_prof1."'" ;}
				if(isset($vid_prof2) && $vid_prof2 != ''){                       $a .= ",vid_prof2='".$vid_prof2."'" ;}
				if(isset($vid_prof3) && $vid_prof3 != ''){                       $a .= ",vid_prof3='".$vid_prof3."'" ;}
				if(isset($vid_aprob1) && $vid_aprob1 != ''){                     $a .= ",vid_aprob1='".$vid_aprob1."'" ;}
				if(isset($vid_aprob2) && $vid_aprob2 != ''){                     $a .= ",vid_aprob2='".$vid_aprob2."'" ;}
				if(isset($vid_aprob3) && $vid_aprob3 != ''){                     $a .= ",vid_aprob3='".$vid_aprob3."'" ;}
				
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `postulante` SET ".$a." WHERE id_usuario = '$id_usuario'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;				
/*******************************************************************************************************************/
		case 'del':
		
			//se borra al usuario
			$query  = "DELETE FROM `postulante` WHERE id_usuario = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;
	
		break;	
		
/*******************************************************************************************************************/
		case 'modvideo':
			
			// si no hay errores ejecuto el codigo
				$id_usuario = $_GET['modvideo'];
				$columna    = $_GET['columna'];
				$estado     = $_GET['estado'];
				$query  = "UPDATE postulante SET $columna = '$estado'	
				WHERE id_usuario    = '$id_usuario'";
				$result = mysql_query($query, $dbConn);
			
			header( 'Location: '.$location.'&view='.$id_usuario );
			die; 

		break;					
/*******************************************************************************************************************/
	
	}
?>