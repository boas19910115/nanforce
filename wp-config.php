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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nanforce_db' );

/** MySQL database username */
define( 'DB_USER', 'nanwu' );

/** MySQL database password */
define( 'DB_PASSWORD', '1qaz@WSX3edc' );

/** MySQL hostname */
define( 'DB_HOST', '34.70.155.40' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '29AB6kEfAn:=1&>i1$[atP}{w8JCr!IwjwEkT,~XygdR>apcw`RkaE/=A^Y7zk!=' );
define( 'SECURE_AUTH_KEY',  'qRzNr8C.>#w|wtfI(`QA_ZC&7DU-AnEer4x~%g#l<b/EqIkOSPz^U4_IRp.v%=CD' );
define( 'LOGGED_IN_KEY',    'ZklaK[gi7t=5C4Y7ya)J[QaWqHziu7Y3;(fHR>[0K#(]6cF{<x>6 Ue[d4x}l`*n' );
define( 'NONCE_KEY',        'u.7q$QUd)jS]&tU%glmY`8PybY<,KK=.k-?8y<(P>O79<IU2q;>;I_6oh(+_kl/z' );
define( 'AUTH_SALT',        'ycdVe#>k;9U3{iQv@^3hG?b,g{U#y`uC.Fu=?_^L@2GGih?S`dxn[^>8<v#D/&=P' );
define( 'SECURE_AUTH_SALT', 'MEKJ:CoGU|(7g#NV:ChAs(K/:^32}v.sNiCl-xDPq]7;>MiGvJlww<bI3K+v11$J' );
define( 'LOGGED_IN_SALT',   'd%JQ_-oMLN_^:KRW+*!@@KXh0fMZ&csH2;.5Nc0!!z1G(*Z#hhfEbNR]Y[BV72;]' );
define( 'NONCE_SALT',       '=A$&Yww{8b]TBqF+yH!6`@UxB?CR7pHNlc,5*sb9*xLxE0=*DHD-wbi(uRsrou3a' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

define( 'WP_CACHE', true ); // Added by Hummingbird
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
