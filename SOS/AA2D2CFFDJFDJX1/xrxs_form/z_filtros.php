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
	if ( !empty($_POST['idCliente']) )       $idCliente        = $_POST['idCliente'];
	if ( !empty($_POST['rango_a']) )         $rango_a          = $_POST['rango_a'];
	if ( !empty($_POST['rango_b']) )         $rango_b          = $_POST['rango_b'];
	if ( !empty($_POST['Sexo']) )            $Sexo             = $_POST['Sexo'];
	if ( !empty($_POST['idCiudad']) )        $idCiudad         = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )        $idComuna         = $_POST['idComuna'];
	if ( !empty($_POST['idTipoAlerta']) )    $idTipoAlerta     = $_POST['idTipoAlerta'];
	if ( !empty($_POST['idConductor']) )     $idConductor      = $_POST['idConductor'];
	if ( !empty($_POST['idPropietario']) )   $idPropietario    = $_POST['idPropietario'];
	if ( !empty($_POST['idRecorrido']) )     $idRecorrido      = $_POST['idRecorrido'];
	if ( !empty($_POST['PPU']) )             $PPU              = $_POST['PPU'];
	if ( !empty($_POST['idMarca']) )         $idMarca          = $_POST['idMarca'];
	if ( !empty($_POST['idModelo']) )        $idModelo         = $_POST['idModelo'];
	if ( !empty($_POST['idTransmision']) )   $idTransmision    = $_POST['idTransmision'];
	if ( !empty($_POST['idColorV_1']) )      $idColorV_1       = $_POST['idColorV_1'];
	if ( !empty($_POST['idColorV_2']) )      $idColorV_2       = $_POST['idColorV_2'];
	if ( !empty($_POST['fechaInicio']) )     $fechaInicio      = $_POST['fechaInicio'];
	if ( !empty($_POST['fechaTermino']) )    $fechaTermino     = $_POST['fechaTermino'];
	if ( !empty($_POST['N_Motor']) )         $N_Motor          = $_POST['N_Motor'];
	if ( !empty($_POST['N_Chasis']) )        $N_Chasis         = $_POST['N_Chasis'];
	if ( !empty($_POST['idRuta']) )          $idRuta           = $_POST['idRuta'];
	if ( !empty($_POST['search']) )          $search           = $_POST['search'];
	if ( !empty($_POST['Ano']) )             $Ano              = $_POST['Ano'];
	if ( !empty($_POST['Estado']) )          $Estado           = $_POST['Estado'];
	if ( !empty($_POST['estadopago']) )      $estadopago       = $_POST['estadopago'];
	if ( !empty($_POST['Semana_inicio']) )   $Semana_inicio    = $_POST['Semana_inicio'];
	if ( !empty($_POST['Semana_termino']) )  $Semana_termino   = $_POST['Semana_termino'];
	if ( !empty($_POST['Semana']) )          $Semana           = $_POST['Semana'];
	if ( !empty($_POST['EstadoCarrera']) )   $EstadoCarrera    = $_POST['EstadoCarrera'];
	if ( !empty($_POST['idTipoPago']) )      $idTipoPago       = $_POST['idTipoPago'];
	if ( !empty($_POST['NDoc']) )            $NDoc             = $_POST['NDoc'];
	if ( !empty($_POST['fTransferencia']) )  $fTransferencia   = $_POST['fTransferencia'];
	if ( !empty($_POST['fFabricacion']) )    $fFabricacion     = $_POST['fFabricacion'];

/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'filter':

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Genero el filtro
				$q = '?filter=true';
				if(isset($idCliente) && $idCliente != '') {            $q .= '&idCliente='.$idCliente ; }
				if(isset($rango_a) && $rango_a != '') {                $q .= '&rango_a='.$rango_a ; }
				if(isset($rango_b) && $rango_b != '') {                $q .= '&rango_b='.$rango_b ; }
				if(isset($Sexo) && $Sexo != '') {                      $q .= '&Sexo='.$Sexo ; }
				if(isset($idCiudad) && $idCiudad != '') {              $q .= '&idCiudad='.$idCiudad ; }
				if(isset($idComuna) && $idComuna != '') {              $q .= '&idComuna='.$idComuna ; }
				if(isset($idTipoAlerta) && $idTipoAlerta != '') {      $q .= '&idTipoAlerta='.$idTipoAlerta ; }
				if(isset($idConductor) && $idConductor != '') {        $q .= '&idConductor='.$idConductor ; }
				if(isset($idPropietario) && $idPropietario != '')  {   $q .= '&idPropietario='.$idPropietario ; }
				if(isset($idRecorrido) && $idRecorrido != '')  {       $q .= '&idRecorrido='.$idRecorrido ; }
				if(isset($PPU) && $PPU != '')  {                       $q .= '&PPU='.$PPU ; }
				if(isset($idMarca) && $idMarca != '')  {               $q .= '&idMarca='.$idMarca ; }
				if(isset($idModelo) && $idModelo != '')  {             $q .= '&idModelo='.$idModelo ; }
				if(isset($idTransmision) && $idTransmision != '')  {   $q .= '&idTransmision='.$idTransmision ; }
				if(isset($idColorV_1) && $idColorV_1 != '')  {         $q .= '&idColorV_1='.$idColorV_1 ; }
				if(isset($idColorV_2) && $idColorV_2 != '')  {         $q .= '&idColorV_2='.$idColorV_2 ; }
				if(isset($fechaInicio) && $fechaInicio != '')  {       $q .= '&fechaInicio='.$fechaInicio ; }
				if(isset($fechaTermino) && $fechaTermino != '')  {     $q .= '&fechaTermino='.$fechaTermino ; }
				if(isset($N_Motor) && $N_Motor != '')  {               $q .= '&N_Motor='.$N_Motor ; }
				if(isset($N_Chasis) && $N_Chasis != '')  {             $q .= '&N_Chasis='.$N_Chasis ; }
				if(isset($idRuta) && $idRuta != '')  {                 $q .= '&idRuta='.$idRuta ; }
				
					
				header( 'Location: '.$location.$q );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'filtro_bloqueados':
	
			//Listado de errores
			if (empty($Ano)) {      $error['Ano']     = 'error/No ha seleccionado el año de facturacion'; }
	
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Genero el filtro
				$q = '&pagina=1';

				if(isset($idConductor) && $idConductor != '') {        $q .= '&idConductor='.$idConductor ; }
				if(isset($idPropietario) && $idPropietario != '')  {   $q .= '&idPropietario='.$idPropietario ; }
				if(isset($idRecorrido) && $idRecorrido != '')  {       $q .= '&idRecorrido='.$idRecorrido ; }
				if(isset($PPU) && $PPU != '')  {                       $q .= '&PPU='.$PPU ; }
				if(isset($idMarca) && $idMarca != '')  {               $q .= '&idMarca='.$idMarca ; }
				if(isset($idModelo) && $idModelo != '')  {             $q .= '&idModelo='.$idModelo ; }
				if(isset($idTransmision) && $idTransmision != '')  {   $q .= '&idTransmision='.$idTransmision ; }
				if(isset($idColorV_1) && $idColorV_1 != '')  {         $q .= '&idColorV_1='.$idColorV_1 ; }
				if(isset($idColorV_2) && $idColorV_2 != '')  {         $q .= '&idColorV_2='.$idColorV_2 ; }
				if(isset($fechaInicio) && $fechaInicio != '')  {       $q .= '&fechaInicio='.$fechaInicio ; }
				if(isset($fechaTermino) && $fechaTermino != '')  {     $q .= '&fechaTermino='.$fechaTermino ; }
				if(isset($N_Motor) && $N_Motor != '')  {               $q .= '&N_Motor='.$N_Motor ; }
				if(isset($N_Chasis) && $N_Chasis != '')  {             $q .= '&N_Chasis='.$N_Chasis ; }
				if(isset($idRuta) && $idRuta != '')  {                 $q .= '&idRuta='.$idRuta ; }
				if(isset($Ano) && $Ano != '')  {                       $q .= '&Ano='.$Ano ; }
				if(isset($Estado) && $Estado != '')  {                 $q .= '&Estado='.$Estado ; }
				if(isset($Semana_inicio) && $Semana_inicio != '')  {   $q .= '&Semana_inicio='.$Semana_inicio ; }
				if(isset($Semana_termino) && $Semana_termino != '')  { $q .= '&Semana_termino='.$Semana_termino ; }
				if(isset($estadopago) && $estadopago != '')  {         $q .= '&estadopago='.$estadopago ; }
					
				header( 'Location: '.$location.$q );
				die;
				
			}
	
		break;						
/*******************************************************************************************************************/		
		case 'filtro_factura':
	
			//Listado de errores
			if (empty($Semana)) {   $error['Semana']  = 'error/No ha seleccionado la semana de facturacion'; }
			if (empty($Ano)) {      $error['Ano']     = 'error/No ha seleccionado el año de facturacion'; }
	
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Genero el filtro
				$q = '&pagina=1';

				if(isset($idConductor) && $idConductor != '') {        $q .= '&idConductor='.$idConductor ; }
				if(isset($idPropietario) && $idPropietario != '')  {   $q .= '&idPropietario='.$idPropietario ; }
				if(isset($idRecorrido) && $idRecorrido != '')  {       $q .= '&idRecorrido='.$idRecorrido ; }
				if(isset($PPU) && $PPU != '')  {                       $q .= '&PPU='.$PPU ; }
				if(isset($idMarca) && $idMarca != '')  {               $q .= '&idMarca='.$idMarca ; }
				if(isset($idModelo) && $idModelo != '')  {             $q .= '&idModelo='.$idModelo ; }
				if(isset($idTransmision) && $idTransmision != '')  {   $q .= '&idTransmision='.$idTransmision ; }
				if(isset($idColorV_1) && $idColorV_1 != '')  {         $q .= '&idColorV_1='.$idColorV_1 ; }
				if(isset($idColorV_2) && $idColorV_2 != '')  {         $q .= '&idColorV_2='.$idColorV_2 ; }
				if(isset($fechaInicio) && $fechaInicio != '')  {       $q .= '&fechaInicio='.$fechaInicio ; }
				if(isset($fechaTermino) && $fechaTermino != '')  {     $q .= '&fechaTermino='.$fechaTermino ; }
				if(isset($N_Motor) && $N_Motor != '')  {               $q .= '&N_Motor='.$N_Motor ; }
				if(isset($N_Chasis) && $N_Chasis != '')  {             $q .= '&N_Chasis='.$N_Chasis ; }
				if(isset($idRuta) && $idRuta != '')  {                 $q .= '&idRuta='.$idRuta ; }
				if(isset($Ano) && $Ano != '')  {                       $q .= '&Ano='.$Ano ; }
				if(isset($Estado) && $Estado != '')  {                 $q .= '&Estado='.$Estado ; }
				if(isset($Semana_inicio) && $Semana_inicio != '')  {   $q .= '&Semana_inicio='.$Semana_inicio ; }
				if(isset($Semana_termino) && $Semana_termino != '')  { $q .= '&Semana_termino='.$Semana_termino ; }
				if(isset($estadopago) && $estadopago != '')  {         $q .= '&estadopago='.$estadopago ; }
				if(isset($Semana) && $Semana != '')  {                 $q .= '&Semana='.$Semana ; }
				if(isset($EstadoCarrera) && $EstadoCarrera != '')  {   $q .= '&EstadoCarrera='.$EstadoCarrera ; }
				
		
					
				header( 'Location: '.$location.$q );
				die;
				
			}
	
		break;	
/*******************************************************************************************************************/		
		case 'filtro_historicos':
	
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Genero el filtro
				$q = '&pagina=1';
				if(isset($idConductor) && $idConductor != '')     { $q .= '&idConductor='.$idConductor ; }
				if(isset($idPropietario) && $idPropietario != '') { $q .= '&idPropietario='.$idPropietario ; }
				if(isset($idRecorrido) && $idRecorrido != '')     { $q .= '&idRecorrido='.$idRecorrido ; }
				if(isset($PPU) && $PPU != '')                     { $q .= '&PPU='.$PPU ; }
				if(isset($idMarca) && $idMarca != '')             { $q .= '&idMarca='.$idMarca ; }
				if(isset($idModelo) && $idModelo != '')           { $q .= '&idModelo='.$idModelo ; }
				if(isset($idTransmision) && $idTransmision != '') { $q .= '&idTransmision='.$idTransmision ; }
				if(isset($idColorV_1) && $idColorV_1 != '')       { $q .= '&idColorV_1='.$idColorV_1 ; }
				if(isset($idColorV_2) && $idColorV_2 != '')       { $q .= '&idColorV_2='.$idColorV_2 ; }
				if(isset($fechaInicio) && $fechaInicio != '')     { $q .= '&fechaInicio='.$fechaInicio ; }
				if(isset($fechaTermino) && $fechaTermino != '')   { $q .= '&fechaTermino='.$fechaTermino ; }
				if(isset($N_Motor) && $N_Motor != '')             { $q .= '&N_Motor='.$N_Motor ; }
				if(isset($N_Chasis) && $N_Chasis != '')           { $q .= '&N_Chasis='.$N_Chasis ; }
				if(isset($Estado) && $Estado != '')               { $q .= '&Estado='.$Estado ; }
				if(isset($rango_a) && $rango_a != '')             { $q .= '&rango_a='.$rango_a ; }
				if(isset($rango_b) && $rango_b != '')             { $q .= '&rango_b='.$rango_b ; }
				if(isset($estadopago) && $estadopago != '')       { $q .= '&estadopago='.$estadopago ; }
	
				header( 'Location: '.$location.$q );
				die;
				
			}
	
		break;	
/*******************************************************************************************************************/		
		case 'filtro_fac_historicos':
	
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Genero el filtro
				$q = '&pagina=1';
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
				if(isset($idCiudad) && $idCiudad != '')              { $q .= '&idCiudad='.$idCiudad ; }
				if(isset($idComuna) && $idComuna != '')              { $q .= '&idComuna='.$idComuna ; }
				if(isset($idTipoPago) && $idTipoPago != '')          { $q .= '&idTipoPago='.$idTipoPago ; }
				if(isset($NDoc) && $NDoc != '')                      { $q .= '&NDoc='.$NDoc ; }
	
				header( 'Location: '.$location.$q );
				die;
				
			}
	
		break;	
/*******************************************************************************************************************/		
		case 'filtrar_robos_geolocalizacion':
	
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Genero el filtro
				$q = '&filter=true';
				if(isset($idCliente) && $idCliente != '')            { $q .= '&idCliente='.$idCliente ; }
				if(isset($rango_a) && $rango_a != '')                { $q .= '&rango_a='.$rango_a ; }
				if(isset($rango_b) && $rango_b != '')                { $q .= '&rango_b='.$rango_b ; }
				if(isset($Sexo) && $Sexo != '')                      { $q .= '&Sexo='.$Sexo ; }
				if(isset($idCiudad) && $idCiudad != '')              { $q .= '&idCiudad='.$idCiudad ; }
				if(isset($idComuna) && $idComuna != '')              { $q .= '&idComuna='.$idComuna ; }
				if(isset($idMarca) && $idMarca != '')                { $q .= '&idMarca='.$idMarca ; }
				if(isset($idModelo) && $idModelo != '')              { $q .= '&idModelo='.$idModelo ; }
				if(isset($idTransmision) && $idTransmision != '')    { $q .= '&idTransmision='.$idTransmision ; }
				if(isset($idColorV_1) && $idColorV_1 != '')          { $q .= '&idColorV_1='.$idColorV_1 ; }
				if(isset($idColorV_2) && $idColorV_2 != '')          { $q .= '&idColorV_2='.$idColorV_2 ; }
				if(isset($fTransferencia) && $fTransferencia != '')  { $q .= '&fTransferencia='.$fTransferencia ; }
				if(isset($fFabricacion) && $fFabricacion != '')      { $q .= '&fFabricacion='.$fFabricacion ; }
				if(isset($N_Motor) && $N_Motor != '')                { $q .= '&N_Motor='.$N_Motor ; }
				if(isset($N_Chasis) && $N_Chasis != '')              { $q .= '&N_Chasis='.$N_Chasis ; }

				header( 'Location: '.$location.$q );
				die;
				
			}
	
		break;	
/*******************************************************************************************************************/		
		case 'filtrar_robos_historico':
	
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Genero el filtro
				$q = '&filter=true';
				if(isset($idCliente) && $idCliente != '')            { $q .= '&idCliente='.$idCliente ; }
				if(isset($rango_a) && $rango_a != '')                { $q .= '&rango_a='.$rango_a ; }
				if(isset($rango_b) && $rango_b != '')                { $q .= '&rango_b='.$rango_b ; }
				if(isset($Sexo) && $Sexo != '')                      { $q .= '&Sexo='.$Sexo ; }
				if(isset($idCiudad) && $idCiudad != '')              { $q .= '&idCiudad='.$idCiudad ; }
				if(isset($idComuna) && $idComuna != '')              { $q .= '&idComuna='.$idComuna ; }
				if(isset($idMarca) && $idMarca != '')                { $q .= '&idMarca='.$idMarca ; }
				if(isset($idModelo) && $idModelo != '')              { $q .= '&idModelo='.$idModelo ; }
				if(isset($idTransmision) && $idTransmision != '')    { $q .= '&idTransmision='.$idTransmision ; }
				if(isset($idColorV_1) && $idColorV_1 != '')          { $q .= '&idColorV_1='.$idColorV_1 ; }
				if(isset($idColorV_2) && $idColorV_2 != '')          { $q .= '&idColorV_2='.$idColorV_2 ; }
				if(isset($fTransferencia) && $fTransferencia != '')  { $q .= '&fTransferencia='.$fTransferencia ; }
				if(isset($fFabricacion) && $fFabricacion != '')      { $q .= '&fFabricacion='.$fFabricacion ; }
				if(isset($N_Motor) && $N_Motor != '')                { $q .= '&N_Motor='.$N_Motor ; }
				if(isset($N_Chasis) && $N_Chasis != '')              { $q .= '&N_Chasis='.$N_Chasis ; }


				header( 'Location: '.$location.$q );
				die;
				
			}
	
		break;	
/*******************************************************************************************************************/		
		case 'taxistas_activation':
	
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Genero el filtro
				$q = '&filter=true';
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

				header( 'Location: '.$location.$q );
				die;
				
			}
	
		break;		
/*******************************************************************************************************************/
	}
?>