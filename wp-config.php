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
define( 'DB_NAME', 'Eilat_DB' );

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
define( 'AUTH_KEY',         '4aih4VHCw2YcH?b=GMM%^m|3Qe!t0;UU#yfam*fqqW**<{x0Wc#~YnL#rVE#=|Wg' );
define( 'SECURE_AUTH_KEY',  'S/p&h&eAu^8{6!gRLf,ph_HXI:yQNOubTTI9k&ZtV;,awDH|UQ.Rk608iNYe9-yC' );
define( 'LOGGED_IN_KEY',    '%aBA=>{NDMwG|DD::_q$mNrVlE|./qtrPk)Z%D6v^dFOsb[JMm8>FjD=q<!fa&bi' );
define( 'NONCE_KEY',        '3E^;^H!78.94QYUamk-,!C~Lfs=r4%_%43J?HX5 ? d#)%VgkfTgz3_57NyVgHhF' );
define( 'AUTH_SALT',        'x+M/i[,g*`kJGc5OKo`Emu!P[Rrye-7&#+@<9?-C8@K*x}=2_6W^L$c%S?k#jxrh' );
define( 'SECURE_AUTH_SALT', 'A8m$6fl%-b5Kt+6-K.8VTzhcp7jTfsXFfTYY(pjx;A$[Ak-N7p`W dwgDg[/LKo.' );
define( 'LOGGED_IN_SALT',   '`U>fjE}Z>gsjkCM=8[2hR)jIsr_{kPX#_i){@/+pBZz}<F(:<O%Ny]Ofn*IM(MDu' );
define( 'NONCE_SALT',       'Fn5(^<(y1_@(<e*m8N+h$}6LC2$b4}PP5CfF]~w3ak28U&l[io[EO7T;QL>8z* S' );

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
