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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '(zl-5R1a61;ETzwc;f61*>J<C28;<8RWE^14: UX}pz,d{tS%cp,.W1]V5$6BiXa' );
define( 'SECURE_AUTH_KEY',  '( nRIPRM_Wn0^!Zc7]V](;Vol^Ml@BCj!gvS4s]5 KA Xx&&g%/[(`r+{N$kLpwf' );
define( 'LOGGED_IN_KEY',    'SYK}9:}khw7?<^`RM-uf#Y__p~:20xc>(Sd?kAN&g@vv^um9q~CvO:BXsb -e<4f' );
define( 'NONCE_KEY',        'F/ C^p5^93:0_~G8a-2XTc^F6+3MiXzZ2/6YCs.v{6j!^IcbY>7/qHA__$wt`-NF' );
define( 'AUTH_SALT',        'AA3<vXe$gW-o17R y5oYr6Rq2]~6j./GOBynUmJ F@ws[bee84SNB%XxbGOcS Q7' );
define( 'SECURE_AUTH_SALT', '@G5fspHdin;{GKPbNk?DDj`sxxl`LKiN-i;Kyc_dPI5A_m~^pe s7(t^9+!^l&Oq' );
define( 'LOGGED_IN_SALT',   '`=938.m[,313h+a~-9E&J*w,0{B;cgne}DIv)<<YfHp_(OI5jF`e4.>p;8*~MMc5' );
define( 'NONCE_SALT',       'jBeRDeL1;7]+zxpNeTewxWs({d^I?+g+}}i|!y64SZKu!.RJs2l6b}{MB>J#vS3Z' );

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
