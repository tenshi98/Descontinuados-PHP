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
	if ( !empty($_POST['id_Oirs']) )           $id_Oirs               = $_POST['id_Oirs'];
	if ( !empty($_POST['Estado']) )            $Estado                = $_POST['Estado'];
	if ( !empty($_POST['Fecha']) )             $Fecha                 = $_POST['Fecha'];
	if ( !empty($_POST['Origen']) )            $Origen                = $_POST['Origen'];
	if ( !empty($_POST['Destino']) )           $Destino               = $_POST['Destino'];
	if ( !empty($_POST['id_origen_a']) )       $id_origen_a           = $_POST['id_origen_a'];
	if ( !empty($_POST['id_origen_b']) )       $id_origen_b 	      = $_POST['id_origen_b'];
	if ( !empty($_POST['Inicia']) )            $Inicia 	              = $_POST['Inicia'];
	if ( !empty($_POST['Expira']) )            $Expira 	              = $_POST['Expira'];
	if ( !empty($_POST['id_antecedentes']) )   $id_antecedentes 	  = $_POST['id_antecedentes'];
	if ( !empty($_POST['n_antecedente']) )     $n_antecedente 	      = $_POST['n_antecedente'];
	if ( !empty($_POST['obs_antecedente']) )   $obs_antecedente 	  = $_POST['obs_antecedente'];
	if ( !empty($_POST['id_materia']) )        $id_materia 	          = $_POST['id_materia'];
	if ( !empty($_POST['obs_materia']) )       $obs_materia 	      = $_POST['obs_materia'];
	if ( !empty($_POST['Acciones_01']) )       $Acciones_01 	      = $_POST['Acciones_01'];
	if ( !empty($_POST['Acciones_02']) )       $Acciones_02 	      = $_POST['Acciones_02'];
	if ( !empty($_POST['Acciones_03']) )       $Acciones_03 	      = $_POST['Acciones_03'];
	if ( !empty($_POST['Acciones_04']) )       $Acciones_04 	      = $_POST['Acciones_04'];
	if ( !empty($_POST['Acciones_05']) )       $Acciones_05 	      = $_POST['Acciones_05'];
	if ( !empty($_POST['Acciones_06']) )       $Acciones_06 	      = $_POST['Acciones_06'];
	if ( !empty($_POST['Acciones_07']) )       $Acciones_07 	      = $_POST['Acciones_07'];
	if ( !empty($_POST['Acciones_08']) )       $Acciones_08 	      = $_POST['Acciones_08'];
	if ( !empty($_POST['Acciones_09']) )       $Acciones_09 	      = $_POST['Acciones_09'];
	if ( !empty($_POST['Acciones_10']) )       $Acciones_10 	      = $_POST['Acciones_10'];
	if ( !empty($_POST['Acciones_11']) )       $Acciones_11 	      = $_POST['Acciones_11'];
	if ( !empty($_POST['Acciones_12']) )       $Acciones_12 	      = $_POST['Acciones_12'];
	if ( !empty($_POST['Acciones_13']) )       $Acciones_13 	      = $_POST['Acciones_13'];
	if ( !empty($_POST['Acciones_14']) )       $Acciones_14 	      = $_POST['Acciones_14'];
	if ( !empty($_POST['idUsuario']) )         $idUsuario 	          = $_POST['idUsuario'];
	if ( !empty($_POST['idCliente']) )         $idCliente 	          = $_POST['idCliente'];
	if ( !empty($_POST['idDepto']) )           $idDepto 	          = $_POST['idDepto'];
	if ( !empty($_POST['idSolicitud']) )       $idSolicitud 	      = $_POST['idSolicitud'];
?>