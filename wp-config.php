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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'moodystore' );

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
define( 'AUTH_KEY',         'EbL4J2%XN&).c9[XrU|Fu>6Ls#6`_LA=_vlKlRv>2sO_rf6$-HBFVy.IOdFsMhtw' );
define( 'SECURE_AUTH_KEY',  'BxuBZ/Fqe@7j.VSI_]4cp01[z*{~d@V~~YnxH>mXKG<M*-p~?WWE[L(D8~2|HbRV' );
define( 'LOGGED_IN_KEY',    '}ww6^~Sm^MAkl_qtrG>)6K<F+>O*./|U_}[?.Cbj9h=+?gjDfH# m45,MX[6>>$P' );
define( 'NONCE_KEY',        'Sc3ZYQJ;/3[3sr[y,]c_cud@VpHOIZBb?~|6DX5# t52?*P3jB+CXKF3L2BkUtu5' );
define( 'AUTH_SALT',        'V2#a^X,FQ-s%Q{k2@t>^*gI|<S7%gw$LaIerAEt*fD3)/WcH%xV:coJyjcX5pu L' );
define( 'SECURE_AUTH_SALT', 'w(=dT$x(-*yd%Drt|+XE&F|roKWH?py8/],f4[ZG46=SZv!D]@N+*O!yaB#:e*YL' );
define( 'LOGGED_IN_SALT',   'jg;L2a}W -xRW?J0+41E+6d0/*5N}>IHGH=yjpO[L]%FWMm]T!HH$x@r7P6#eS2I' );
define( 'NONCE_SALT',       'X&Iw>i.H@7;Zk!sCq4JgD+}Yfd:Y &0h?ooFAD~8%uC&$QO6{3b@vYa g^KlFH@x' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
