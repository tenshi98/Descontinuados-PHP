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
	if ( !empty($_POST['idTipoAlerta']) )            $idTipoAlerta             = $_POST['idTipoAlerta'];
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


/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'filtro':

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Genero el filtro
				$q = '?filter=true';
				if(isset($idTipoAlerta) && $idTipoAlerta != '') {         $q .= '&idTipoAlerta='.$idTipoAlerta ; }
				if(isset($idSubTipoAlerta) && $idSubTipoAlerta != '') {   $q .= '&idSubTipoAlerta='.$idSubTipoAlerta ; }
				if(isset($f_inicio) && $f_inicio != '') {                 $q .= '&f_inicio='.$f_inicio ; }
				if(isset($f_termino) && $f_termino != '') {               $q .= '&f_termino='.$f_termino ; }
				
				header( 'Location: '.$location.$q );
				die;
				
			}
	
		break;
	
/*******************************************************************************************************************/
	}
?>
