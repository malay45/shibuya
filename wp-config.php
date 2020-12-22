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
define( 'DB_NAME', 'shibayu' );

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
define( 'AUTH_KEY',         'X]WtfZ}!vn$r4DQy,vY.5_Di[KlEGmH+IrDbZ.3Cd{oqrZ,4z[~^Y+%b2DwB25 $' );
define( 'SECURE_AUTH_KEY',  'Pt>1XG7P+g9k>3CHk]S^F$/o3IT 5_bMUa}_cU)>OX&vCE=9@lMKhROOQsvG_0 `' );
define( 'LOGGED_IN_KEY',    'iKF-[.B78BJ0[&?FGsnCIHd:kN/.P]fRm^/zBl}nSUt_osR&ah,<o2)LBCH4?$iJ' );
define( 'NONCE_KEY',        'KEG-0?1M?0_UxrJjD}%5(l615[{[#79+#Y3MOaDsX?]aFFiA+.=M0o:X|oFIjOf#' );
define( 'AUTH_SALT',        '+|R[#4LlPGdjrOQ2Ub[0mm3?j)ZO&6Z3]7#D:59,5^YezmeG}=%fTd$8b+1WoT!5' );
define( 'SECURE_AUTH_SALT', 'KN!NHy)vm0Vrt#<uWp)ZLfk+k>a[<hSK:Ta?*B,S!.hC/UFfsVIh6? Uh,3#p/]y' );
define( 'LOGGED_IN_SALT',   '#G[/(^)NMl<4^A26~%83AU0F#@VlV#fU9~5M4+_(lW,F8MY_$|itL;Iu}&4A%-Em' );
define( 'NONCE_SALT',       '1k~^bPa^>Ay8SvtS9sSCCzgQhTc1k0CV(]Z%ag%0v8?Th:9WAqI$O*,3y&kB2~VK' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sby_';

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
