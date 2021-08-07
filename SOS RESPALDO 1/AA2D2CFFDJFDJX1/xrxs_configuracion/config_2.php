<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/* Configuracion Base de la datos */
/**********************************/

//Se define los datos de conexion para la base de datos numero 1
define( 'DB_SERVER_1', 'localhost' );
define( 'DB_NAME_1', 'app_main');
define( 'DB_USER_1', 'root');
define( 'DB_PASS_1', 'petland');

//Se define los datos de conexion para la base de datos numero 2
define( 'DB_SERVER_2', '190.98.210.41' );
define( 'DB_NAME_2', 'padron');
define( 'DB_USER_2', 'sosclick');
define( 'DB_PASS_2', 'petland');
?>