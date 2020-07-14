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
define( 'DB_NAME', 'company_website' );

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
define( 'AUTH_KEY',         'ink}x0@@n&F>vJPr:)?F>DQ/l27VK2pD?DPDf=yeg!0fC0$h.1%!2@JOh28XiVPf' );
define( 'SECURE_AUTH_KEY',  'AGV=(d)w`p~A`qK3+)N?K~)v&s7@i^Y?TT.E]31/$HYr*i$zZsnX[HJza-{XJ2yj' );
define( 'LOGGED_IN_KEY',    '4T1?myuF}E,I]v)g ^~.d_nKPe(|%tm7[jSD_7ZM4lOQJ3r_100LLVOxB+/|FWm[' );
define( 'NONCE_KEY',        'Y;;Syrv:@*T*k{76YB`H1g#3a3o4.MZ39U=wq=NBstqP)nkPGuNB&up0=uCG{s;<' );
define( 'AUTH_SALT',        '[AeT>?F4Og5Rg62C!b|pXvhg$LE|~V:<Q?p=vqrG/*l&?]yg>%.N~-?#OR!2UdYz' );
define( 'SECURE_AUTH_SALT', 'p7Yu<A&Up9I[8T*`BxkKjF?/:CN].!P8?lIT=6C4W>%eVW@6D{VXf{!mOeH:E@id' );
define( 'LOGGED_IN_SALT',   '-QfE0tc]k.u/9B]3E]x_xv?{87L@!x3|M3v>[)P7Oh~Ud46|r@N+aUj|N$rz?V{.' );
define( 'NONCE_SALT',       'KaXg6?yDgT3lu~FHOf]|F9jO-d?j0uCDH9/fBDwFV[~Kr^et#1SCa0Mt50S.kxg}' );

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
