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
define( 'DB_NAME', 'eduhelp' );

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
define( 'AUTH_KEY',         'S@@J<?$R::YQ;oLIoI6MTEnGBARF^04&1F%*qmrhp} m*?;uqe^yO9&~Mjv_ZQ2T' );
define( 'SECURE_AUTH_KEY',  ':Lo2T HC[N)Yq6WpU{t}EQYDH$P=0t?1`f<,>9JRty2CrQxSZMai2;LM@Q8HbhL5' );
define( 'LOGGED_IN_KEY',    'tI!,[5%<Zsr?j/9U~x07Tl*.Lrej[Fyn#ep{,oUFV1XSL5kgfG@YI`kTbRp+u8`l' );
define( 'NONCE_KEY',        ';0B1x~/IEK|Q[E}NI{PHTS0i%>YMLE<E$>{x1gtNxuaH|Ft[=WFY#}d;`]$*= >/' );
define( 'AUTH_SALT',        'Ux3,,rGrHYI[v0/fG2szN(/)UHf~dTqTID3DUl>wZd{VBe/ip.yA>B7#W*)Y|e_b' );
define( 'SECURE_AUTH_SALT', 'jWO7O+=YrbTE}Un[#+K{X`;p|gk4=jigENw(MP]JgS!{S{C2,4guzuG3p{8 eypd' );
define( 'LOGGED_IN_SALT',   'h1qJ6^r2E*s(s$#(1+Y]ILt?&D[?>{vqBX-b7Mtm4|~TI7ORhxt@ju,^H51;BNL{' );
define( 'NONCE_SALT',       '7@Ze@8CFU_a[ie9naw`e/D9-0+B,L.VFG%n@gZe!usxpfJkXzAhvw/,*Rw{ J[5X' );

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
