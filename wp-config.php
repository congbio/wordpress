<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_shop' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'F_OB@%/& 3w^T}n#&][Hc3>Aj}Vj[2}/$4m2M!hGaTTgXY}Y2.j?5(f~:IY-<KY*' );
define( 'SECURE_AUTH_KEY',  '-UwKed~DaZb{$W`<m rI`y><xlCb7.#>0yIcjiOT_:;V4{kSj,)0$,p@nj|GfJ%+' );
define( 'LOGGED_IN_KEY',    'krg?3F`Js0Ir=e%_`kQ/<]KPv,#%-h4W*)u6Sk4bXy:)LU=%>-k6?;)J.[eR4a)K' );
define( 'NONCE_KEY',        'h{Ao Gq^!jVSd%9)B_g#|jX:3og%E^*ck%c_6XZ nhu/+VTvOK$t1Qc@5.|B|jUe' );
define( 'AUTH_SALT',        'NW &lS#8K+|[u]DpmIXxQfd2TB!H^|:VlB4r4)Z+VFN^ZU-8DL3%7*s/{_~4mko@' );
define( 'SECURE_AUTH_SALT', 'yoWd-1y}(7s@:|VF6w}ENtXIVs4.}2z7k)9){1xgAzZ|}[_pFBEnV43LqE,)/+px' );
define( 'LOGGED_IN_SALT',   '^z=~KGuoPXDC5K7@-ms^2,,19x8]/?$P;G~@:W_x$m#>0!:t<.BLv4I<#b3l2DBL' );
define( 'NONCE_SALT',       'B^5RZpD51lxIi~$^t^$?dT~)eJ&zH7jMt<h`m.U`?`V)P&px.phQo(ne}XJ#gL<x' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
