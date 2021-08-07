<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'conataco');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'petland');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'r?0hy6B$I+P1QPv;V_EIsPlVZ8m?d6P6g|H%9b=E1kL74q YLXTAn9Rd8BZB|n=+'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'kUj*zh?-4E?|*NF%,zmXD/QZ`s[$|ft<dM4BQyyPK|nb8#!?^-jbG[x=Z}(z|wE,'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'z&9e^rbc?Hj_H|8A,gX{SmFp-s-hCX1Xt;*az^V7uxzCd]qELj6t0) VpY5Tc{%#'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'D+mSS=+69@@}G2y59!mxYt1m<qM4| wc(-Y%Dt*|EK>fba.,Ra.$^6(xB@$bg?*G'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', '(m|M$#|V8J|D]/kzb, rn/kQgTYY]-%4$(>;a+?,jS]%Zq-j&J=`r:S`^Iv|QC|1'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'XaepeOyFBL9JcU8WF7.?gIe93/ZN]_Cd+t[g$BriwLW^&^G@(s0WE7_.}@GBzKw<'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', '&VA@D#IG4mR-U_dQ2ZF%z6_R=1fGFG@:855d7po;knK 6H~_+@kn,#/oR#pZ(x55'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '(|Ug`T/%DgcNzJ76FzX?w{E?[-.X5T@qBqZw_Q)yp$B)M-2)E-RKH$^8}AJ-s|dH'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

