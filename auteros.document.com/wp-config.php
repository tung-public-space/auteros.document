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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'auterosDb' );

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
define( 'AUTH_KEY',         'UId*sb{0z(y.Z. S{&r{?PFWQdkgi)lFiQp}zWU-1x5r0xU#=(VC6dvhtkbAu oE' );
define( 'SECURE_AUTH_KEY',  'npkZ=o [YK] 8(mNOY|vwqOYvaSd(8@U2)61.V POw#J2$3_&P1.Ge;uJC2i[+Rh' );
define( 'LOGGED_IN_KEY',    'M&&u/;WAw#@V;Q[<b~y;3burJY1 mP9e|iyfJ9(LgGy?Tpa@^>ocC<4-445MG i|' );
define( 'NONCE_KEY',        '5K IwiI,Qle*zLisHUPdEJ5+j9ALLsQw_J2~LG+{A]=OC{g?,k=gVsRg?^h%EVWm' );
define( 'AUTH_SALT',        '|/4go3/s()5+&91#W>8)k;7^.Ua6FV#LB~+F7|+UKt{1;l`3T$xzC<L+abH9u/]5' );
define( 'SECURE_AUTH_SALT', '$C!*4tk432Wy!bB3(a`:_,C2l$QBo-z0icM`ws<|3W(,.d$w(GTGSI<=>?yzj_x&' );
define( 'LOGGED_IN_SALT',   'rKUi+p2XZn?DB9fy-@f)Z$7F.bK_t3l2It<kqj%?(KpwohJwl%%6)uG`)-9/GKf>' );
define( 'NONCE_SALT',       '#4G>hjG5adE>%o1FM)$I<kEwUt-J]9@u2|s|BbHOk38WZ0dRVMH5$zTq73D`uFO>' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
