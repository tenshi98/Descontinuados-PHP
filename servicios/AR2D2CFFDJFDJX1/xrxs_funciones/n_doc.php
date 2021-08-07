<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*             Funciones          */
/**********************************/
//Agrega ceros a un numero designado
function n_doc($valor){	

	return str_pad($valor, 8, "0", STR_PAD_LEFT);

}?>