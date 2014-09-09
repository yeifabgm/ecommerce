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
define('DB_NAME', 'woocommerce');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY', 's~aO~K7RAE<|E:>-WW<.KL@`xX9iQL6bk!2%?ofQG+}_@1!bOs3wP9GamGWRC$5&'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'fP_3b4hu/vS8f*K+c:yZ <t[!P$?v%f?eup_Q%Aj-LrW_|D+0Uv6%c Dn=:04bQ['); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'p@+~|}ZTW{):u8B4H~!ms`O%$W0j]A2*MZI!&LXK^HWYt@>|~#Wj)I*P||ElJXDJ'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'p]r38MSIi&^yY$d{QG-:_}4u#?1_;fo?7E3(r3,p<x] R{p7Z+JP3Nm*(z:UohK2'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', '*(&2xp2%FGzUB=g9LahGp:X&SMYJXvdR7U4S7.ziC Ty1%>M(u!2iH=dF*CgFCn['); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', '7]<`XDVD@G9oTO%^S3UGKsB:GgKb??Xfe4QW&-Ch3lk#-hwzDBDX3{*(A}njm=qi'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'jiqBJ+0=A*t/n?pa!!sFF.2pGTLytOy<rkUsE@=T5-`<ls*aAl`[lO76P[m>nq@$'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', 'Tv ,Cq4-GKrL |KU2;+6,MFhVA+7.lSfLvobKU]XC-hBgT:dL8riVC&-/[B{tW{-'); // Cambia esto por tu frase aleatoria.

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


