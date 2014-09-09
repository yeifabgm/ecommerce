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
define('DB_NAME', 'ecommerce');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'tally');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'Codetag183');

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
define('AUTH_KEY', 'PPa!ygxMy|h|9!&kS[LMW:Jz/zB.z<po:>gh#4G7[7Je}M cT+>YD>~BZzO3PO|W'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'wt:n:kc. [],]wH&jgxh[>RNS[|>p>wo(!kF#g5=o2<+%BTa,bYyBFKN>lAE!9]!'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'Pe;`{[~kUQ1 MY>-e|~i4]s19bhq+ZfD9R|+uo)fx[3Tk[Iv7LTa?Dv}}VOVtnPk'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'rA]/]omFrc|k! ]L::X(,J)oKO6!Wio3,o6+0?pht_6~(LnaobE|TnKKHUGzFM#5'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'e6U._=}A<>rYm50~?g];$QW~jc}oL_fZ=BJ4<-*i^)@j1hg%YS6LT wcy_wSeKv2'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', '!Kw!YTOdd L8f+5[XtNfdAAS5~o_1)Y#k4&/^L(svAl0`/_X<!Rjd&#rK%hc&`Cl'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'Jb#VZC$z=3QHlHAuY_QA.[gOQ<7q)*[2sPx1$nRy$cd#2z-S#+OdZUWp!5a(FW5q'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '[8B6TrHl+b=f:0NxN-]<E6XQl+y%hO^I)cQ*DpJ93D5f5;Z/y0MJ~yd8 8F$++6a'); // Cambia esto por tu frase aleatoria.

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

