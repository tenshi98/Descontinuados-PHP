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
//Traspaso de valores input a variables
	if ( !empty($_POST['idCliente']) )       $idCliente         = $_POST['idCliente'];
	if ( !empty($_POST['Sexo']) )            $Sexo              = $_POST['Sexo'];
	if ( !empty($_POST['idCiudad']) )        $idCiudad          = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )        $idComuna          = $_POST['idComuna'];
	if ( !empty($_POST['Semana_inicio']) )   $Semana_inicio     = $_POST['Semana_inicio'];
	if ( !empty($_POST['Semana_termino']) )  $Semana_termino    = $_POST['Semana_termino'];
	if ( !empty($_POST['Ano']) )             $Ano               = $_POST['Ano'];
	if ( !empty($_POST['Estado']) )          $Estado            = $_POST['Estado'];
	if ( !empty($_POST['idTipoPago']) )      $idTipoPago        = $_POST['idTipoPago'];
	if ( !empty($_POST['NDoc']) )            $NDoc              = $_POST['NDoc'];
	if ( !empty($_POST['estadopago']) )      $estadopago        = $_POST['estadopago'];
	

	//Valida el ingreso del Ano
	if ( empty($Ano) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado el sexo del cliente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	// si no hay errores ejecuto el codigo	
	if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4])     ) { 
	
		//Genero el filtro
		$q = '?filter=true';
		if(isset($idCliente) && $idCliente != '')           { $q .= '&idCliente='.$idCliente ; }
		if(isset($Sexo) && $Sexo != '')                     { $q .= '&Sexo='.$Sexo ; }
		if(isset($idCiudad) && $idCiudad != '')             { $q .= '&idCiudad='.$idCiudad ; }
		if(isset($idComuna) && $idComuna != '')             { $q .= '&idComuna='.$idComuna ; }
		if(isset($Semana_inicio) && $Semana_inicio != '')   { $q .= '&Semana_inicio='.$Semana_inicio ; }
		if(isset($Semana_termino) && $Semana_termino != '') { $q .= '&Semana_termino='.$Semana_termino ; }
		if(isset($Ano) && $Ano != '')                       { $q .= '&Ano='.$Ano ; }
		if(isset($Estado) && $Estado != '')                 { $q .= '&Estado='.$Estado ; }
		if(isset($idTipoPago) && $idTipoPago != '')         { $q .= '&idTipoPago='.$idTipoPago ; }
		if(isset($NDoc) && $NDoc != '')                     { $q .= '&NDoc='.$NDoc ; }
		if(isset($estadopago) && $estadopago != '')         { $q .= '&estadopago='.$estadopago ; }
		$q .= '&pagina=1';
		
		header( 'Location: '.$location.$q );
		die;

	}

?>