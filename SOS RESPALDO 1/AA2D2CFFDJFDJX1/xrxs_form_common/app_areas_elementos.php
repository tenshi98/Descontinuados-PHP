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
	if ( !empty($_POST['idElementos']) )     $idElementos        = $_POST['idElementos'];
	if ( !empty($_POST['Nombre']) )          $Nombre             = $_POST['Nombre'];
	if ( !empty($_POST['Tipo_elemento']) )   $Tipo_elemento      = $_POST['Tipo_elemento'];
	if ( !empty($_POST['Orden']) )           $Orden              = $_POST['Orden'];
	if ( !empty($_POST['idArea']) )          $idArea             = $_POST['idArea'];
	if ( !empty($_POST['idPagelist']) )      $idPagelist         = $_POST['idPagelist'];
	if ( !empty($_POST['body_col']) )        $body_col           = $_POST['body_col'];
	if ( !empty($_POST['body_fil']) )        $body_fil           = $_POST['body_fil'];
	if ( !empty($_POST['grid_color']) )      $grid_color         = $_POST['grid_color'];
	if ( !empty($_POST['grid_border']) )     $grid_border        = $_POST['grid_border'];
	if ( !empty($_POST['grid_shadow']) )     $grid_shadow        = $_POST['grid_shadow'];
	if ( !empty($_POST['grid_img']) )        $grid_img           = $_POST['grid_img'];
	if ( !empty($_POST['url_img']) )         $url_img            = $_POST['url_img'];
	if ( !empty($_POST['idTipoBoton']) )     $idTipoBoton        = $_POST['idTipoBoton'];
	if ( !empty($_POST['Archivo']) )         $Archivo            = $_POST['Archivo'];
	if ( !empty($_POST['idTipoAlerta']) )    $idTipoAlerta       = $_POST['idTipoAlerta'];
	if ( !empty($_POST['cercanos']) )        $cercanos           = $_POST['cercanos'];
	if ( !empty($_POST['contactar']) )       $contactar          = $_POST['contactar'];
	if ( !empty($_POST['desplegar']) )       $desplegar          = $_POST['desplegar'];
	if ( !empty($_POST['login']) )           $login              = $_POST['login'];
	if ( !empty($_POST['idNotGrupo']) )      $idNotGrupo         = $_POST['idNotGrupo'];
	if ( !empty($_POST['idNotCat']) )        $idNotCat           = $_POST['idNotCat'];
	if ( !empty($_POST['idNotListado']) )    $idNotListado       = $_POST['idNotListado'];	
	if ( !empty($_POST['idPagGrupo']) )      $idPagGrupo         = $_POST['idPagGrupo'];
	if ( !empty($_POST['idPagCat']) )        $idPagCat           = $_POST['idPagCat'];
	if ( !empty($_POST['idPagListado']) )    $idPagListado       = $_POST['idPagListado'];
	if ( !empty($_POST['level_view']) )      $level_view         = $_POST['level_view'];
	if ( !empty($_POST['pantalla']) )        $pantalla           = $_POST['pantalla'];
	
	
?>