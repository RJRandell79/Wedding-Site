<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

if ( $_SERVER[ 'SERVER_NAME' ] === "wedding.dev") {
	define('DB_NAME', 'wedding');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');
	define('WP_HOME','http://wedding.dev/');
    define('WP_SITEURL','http://wedding.dev/');
	define('WP_DEBUG', true);

} else {

	define('DB_NAME', 'robandla_wpdb');
	define('DB_USER', 'robandla_admin');
	define('DB_PASSWORD', '8wupIOK%=MD#_VH');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');
	define('WP_HOME','http://www.robandlauraswedding.co.uk/');
    define('WP_SITEURL','http://www.robandlauraswedding.co.uk/');
	define('WP_DEBUG', false);

}

/* ]iP%vC?e07X! */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'eok@=l~`mdcCFhd3Z{~D|Tw].EH#Wk`J?E]O8$l]b^z[[dc29YbmCxD4fj1s|af-');
define('SECURE_AUTH_KEY',  '?QXJeHu/d$ c.lMAq,p:X(E4[hr*~Xd*WD`&wBJ1G.AF8l&hIt/`c_eT e6NI7v#');
define('LOGGED_IN_KEY',    '<pe`8!a0Cg>P|L_4vN9ZSmCc p.UhG#IPBc %~}SK;:-.{2LhNPL*m G6,r+|c!2');
define('NONCE_KEY',        'XFH{N^:8d$vC}1.U)JE%7N&/>y*Y+O89lhwzP6ih`^ONa#B:%slNaS3aa07T%JYq');
define('AUTH_SALT',        'CjC)qmsk,Uv0&iD|iYb|SnpV}B!tN7x9_WSye}8T=foD$~;742GqT?zJeTA#t^4q');
define('SECURE_AUTH_SALT', '5zPQH-j8FqL)5rcGcQa#2gP480*=z;wvsagUQ6(*|UN4ZSf2tG_)W;T.1@;v5H:^');
define('LOGGED_IN_SALT',   'LC/HO/S#an01#sS}.GUkbpQ&^i{$.Fp}Fg+BG^kk/nX)3@JgG{w$_>,KLOECsX~%');
define('NONCE_SALT',       'F3Sh2E#J-a- TBQhkeO4W2cCrA3p3==ppk1<Q98eM)^UAj/L?d`#2#OWN,(Q=n.$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wdg_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
//define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
