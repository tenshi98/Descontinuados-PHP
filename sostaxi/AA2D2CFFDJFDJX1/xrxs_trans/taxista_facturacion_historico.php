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
	
	
	if ( !empty($_POST['idConductor']) )     $idConductor     = $_POST['idConductor'];
	if ( !empty($_POST['idPropietario']) )   $idPropietario   = $_POST['idPropietario'];
	if ( !empty($_POST['idRecorrido']) )     $idRecorrido     = $_POST['idRecorrido'];
	if ( !empty($_POST['PPU']) )             $PPU             = $_POST['PPU'];
	if ( !empty($_POST['idMarca']) )         $idMarca         = $_POST['idMarca'];
	if ( !empty($_POST['idModelo']) )        $idModelo        = $_POST['idModelo'];
	if ( !empty($_POST['idTransmision']) )   $idTransmision   = $_POST['idTransmision'];
	if ( !empty($_POST['idColorV_1']) )      $idColorV_1      = $_POST['idColorV_1'];
	if ( !empty($_POST['idColorV_2']) )      $idColorV_2      = $_POST['idColorV_2'];
	if ( !empty($_POST['fechaInicio']) )     $fechaInicio     = $_POST['fechaInicio'];
	if ( !empty($_POST['fechaTermino']) )    $fechaTermino    = $_POST['fechaTermino'];
	if ( !empty($_POST['N_Motor']) )         $N_Motor         = $_POST['N_Motor'];
	if ( !empty($_POST['N_Chasis']) )        $N_Chasis        = $_POST['N_Chasis'];
	if ( !empty($_POST['Semana_inicio']) )   $Semana_inicio   = $_POST['Semana_inicio'];
	if ( !empty($_POST['Semana_termino']) )  $Semana_termino  = $_POST['Semana_termino'];
	if ( !empty($_POST['Ano']) )             $Ano             = $_POST['Ano'];
	if ( !empty($_POST['Estado']) )          $Estado          = $_POST['Estado'];
	if ( !empty($_POST['estadopago']) )      $estadopago      = $_POST['estadopago'];
	

	//Valida el ingreso del Ano
	if ( empty($Ano) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado el año de facturacion
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	// si no hay errores ejecuto el codigo	
	if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4])     ) { 
	
		//Genero el filtro
		$q = '?filter=true';
		
		if(isset($idConductor) && $idConductor != '')        { $q .= '&idConductor='.$idConductor ; }
		if(isset($idPropietario) && $idPropietario != '')    { $q .= '&idPropietario='.$idPropietario ; }
		if(isset($idRecorrido) && $idRecorrido != '')        { $q .= '&idRecorrido='.$idRecorrido ; }
		if(isset($PPU) && $PPU != '')                        { $q .= '&PPU='.$PPU ; }
		if(isset($idMarca) && $idMarca != '')                { $q .= '&idMarca='.$idMarca ; }
		if(isset($idModelo) && $idModelo != '')              { $q .= '&idModelo='.$idModelo ; }
		if(isset($idTransmision) && $idTransmision != '')    { $q .= '&idTransmision='.$idTransmision ; }
		if(isset($idColorV_1) && $idColorV_1 != '')          { $q .= '&idColorV_1='.$idColorV_1 ; }
		if(isset($idColorV_2) && $idColorV_2 != '')          { $q .= '&idColorV_2='.$idColorV_2 ; }
		if(isset($fechaInicio) && $fechaInicio != '')        { $q .= '&fechaInicio='.$fechaInicio ; }
		if(isset($fechaTermino) && $fechaTermino != '')      { $q .= '&fechaTermino='.$fechaTermino ; }
		if(isset($N_Motor) && $N_Motor != '')                { $q .= '&N_Motor='.$N_Motor ; }
		if(isset($N_Chasis) && $N_Chasis != '')              { $q .= '&N_Chasis='.$N_Chasis ; }
		if(isset($Semana_inicio) && $Semana_inicio != '')    { $q .= '&Semana_inicio='.$Semana_inicio ; }
		if(isset($Semana_termino) && $Semana_termino != '')  { $q .= '&Semana_termino='.$Semana_termino ; }
		if(isset($Ano) && $Ano != '')                        { $q .= '&Ano='.$Ano ; }
		if(isset($Estado) && $Estado != '')                  { $q .= '&Estado='.$Estado ; }
		if(isset($estadopago) && $estadopago != '')          { $q .= '&estadopago='.$estadopago ; }
		$q .= '&pagina=1';
		
		header( 'Location: '.$location.$q );
		die;

	}

?>