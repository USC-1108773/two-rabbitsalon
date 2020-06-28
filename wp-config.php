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
define( 'DB_NAME', 'ict342' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '39o@}f>k;wj^/B#Nc&Lj[*h5C2HrPxX?-#C%u8|_)YrKE=.l]jhn7U[IoO)>+39:' );
define( 'SECURE_AUTH_KEY',  'LS$O>kS|eZkzJE41qKU+1]L5xYkDcpHUe`5HV,k0s^bb61;3|HGKffC9~/!p)?D#' );
define( 'LOGGED_IN_KEY',    '6[OIOO{4CroQ1^rmUR?2[`A]5bIik{kE7IF7~lO>%m6o.?_c(G&2UjHAau12[V1j' );
define( 'NONCE_KEY',        'P)9h_r~)6czHH>h +dZil;(Z:a/(A7eFj5t`fGfjY<e[xp5H2fyPqkHw|=:zaF4S' );
define( 'AUTH_SALT',        'Ynd!`yMl2N!R17KV5P/df*)s=[sJTN0ujFLjFP^0%[t$-g7h@=3/r<gF3h!hx=K-' );
define( 'SECURE_AUTH_SALT', 's`{zuM*[8`{.i#^G@&Gvmu~lgf@>luIAKG0[&.h63o3_/3^#^@/LxD*slV,V(W13' );
define( 'LOGGED_IN_SALT',   'Mp-|%XpK(iHVA}LNU#-%6&<E!Qn9|2323o]0qK=0sqy6MDqrP&bL{|emhQ3nko+w' );
define( 'NONCE_SALT',       '6lcxCO*>@K-FTARv ?>gHi8Q%XJ|@FJJIKL/#y,D0$W}mn9?Lavf/2$$KQY!BIa7' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
