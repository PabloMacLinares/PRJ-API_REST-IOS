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
define('DB_NAME', 'actividades');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'runepml');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY', '294EYz{DY<Ayv5Jx $V/:I<#*`O2z3QAUAn&4#s4ndz1=hibB=)b-aaI$clwl-q^');
define('SECURE_AUTH_KEY', 'w:S=znH$`jDBh)+2~jf.ufA}AU+fvHwM^M8<$CrJ;zPSkc]+CCZqba_0Ot4m{;~y');
define('LOGGED_IN_KEY', '(<G q N,%^0pk=Ps`lMo*!vdg;nI#+[CpnFt>:Z}E++)B/%`CoH$COHSs0.kHo:/');
define('NONCE_KEY', '%{@HgTG 6b&q~W#zE>iuPeAyQI_LCRiA4#Xt)</Fwg!XM8186QZsS.`BHP%TGqkR');
define('AUTH_SALT', ')WZ6gQUU8mbV;z??b[03JS]zZ.KYU)liOhm5mTxe<0?]y>P?q<t1E|?2n)s:NaU_');
define('SECURE_AUTH_SALT', '[g$^F:wo_:X(6J,xe=O_!{(I;TD|Gk_{KrZRQ+{7eENEbz[,7dgTZFQkw}dE2y-)');
define('LOGGED_IN_SALT', 'eC@AQdF]exHC*.iaNrvW6GQzeb+i~{z[,J5fOa{/i%nUumcqJ9oLsG(PJ*9>J.@U');
define('NONCE_SALT', 'el+64ts&fzQP?%c2*jt#dPYN0n9jTo_)6I8M;n/?^@^TLBW6$_&#%?U`MrF=<xTS');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


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

