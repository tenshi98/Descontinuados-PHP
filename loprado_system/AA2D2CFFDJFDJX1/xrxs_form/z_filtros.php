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
	if ( !empty($_POST['idBodega']) )            $idBodega             = $_POST['idBodega'];
	if ( !empty($_POST['idProducto']) )          $idProducto           = $_POST['idProducto'];
	if ( !empty($_POST['f_inicio']) )            $f_inicio             = $_POST['f_inicio'];
	if ( !empty($_POST['f_termino']) )           $f_termino            = $_POST['f_termino'];
	if ( !empty($_POST['Creacion_ano']) )        $Creacion_ano         = $_POST['Creacion_ano'];
	if ( !empty($_POST['Creacion_mes']) )        $Creacion_mes         = $_POST['Creacion_mes'];
	if ( !empty($_POST['idProveedor']) )         $idProveedor          = $_POST['idProveedor'];
	if ( !empty($_POST['idCliente']) )           $idCliente            = $_POST['idCliente'];
	if ( !empty($_POST['idBodegaOrigen']) )      $idBodegaOrigen       = $_POST['idBodegaOrigen'];
	if ( !empty($_POST['idSistemaDestino']) )    $idSistemaDestino     = $_POST['idSistemaDestino'];
	if ( !empty($_POST['idBodegaDestino']) )     $idBodegaDestino      = $_POST['idBodegaDestino'];
	if ( !empty($_POST['idTrabajador']) )        $idTrabajador         = $_POST['idTrabajador'];
	if ( !empty($_POST['idTipo']) )              $idTipo               = $_POST['idTipo'];

/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'filtro_por_fechas':

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Genero el filtro
				$q = '';
				if(isset($idBodega) && $idBodega != '') {                    $q .= '&idBodega='.$idBodega ; }
				if(isset($idProducto) && $idProducto != '') {                $q .= '&idProducto='.$idProducto ; }
				if(isset($f_inicio) && $f_inicio != '') {                    $q .= '&f_inicio='.$f_inicio ; }
				if(isset($f_termino) && $f_termino != '') {                  $q .= '&f_termino='.$f_termino ; }
				if(isset($Creacion_ano) && $Creacion_ano != '') {            $q .= '&Creacion_ano='.$Creacion_ano ; }
				if(isset($Creacion_mes) && $Creacion_mes != '') {            $q .= '&Creacion_mes='.$Creacion_mes ; }
				if(isset($idProveedor) && $idProveedor != '') {              $q .= '&idProveedor='.$idProveedor ; }
				if(isset($idCliente) && $idCliente != '') {                  $q .= '&idCliente='.$idCliente ; }
				if(isset($idBodegaOrigen) && $idBodegaOrigen != '') {        $q .= '&idBodegaOrigen='.$idBodegaOrigen ; }
				if(isset($idSistemaDestino) && $idSistemaDestino != '') {    $q .= '&idSistemaDestino='.$idSistemaDestino ; }
				if(isset($idBodegaDestino) && $idBodegaDestino != '') {      $q .= '&idBodegaDestino='.$idBodegaDestino ; }
				if(isset($idTrabajador) && $idTrabajador != '') {            $q .= '&idTrabajador='.$idTrabajador ; }
				if(isset($idTipo) && $idTipo != '') {                        $q .= '&idTipo='.$idTipo ; }
				
				header( 'Location: '.$location.$q );
				die;
				
			}
	
		break;
	
/*******************************************************************************************************************/
	}
?>
