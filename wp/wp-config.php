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
define( 'DB_NAME', 'thestr_wp44' );

/** MySQL database username */
define( 'DB_USER', 'thestr_wp44' );

/** MySQL database password */
define( 'DB_PASSWORD', '7AS)[p18v3' );

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
define( 'AUTH_KEY',         's53wxaa7v2i8uuuffza5hrgblelnbeuuavemlnrtww057ls2q0rnqto5j9sdoyd2' );
define( 'SECURE_AUTH_KEY',  'qse4gxfeubfpwcrmpe32qnfxb5zjgzgcgnd0rrghoehpnfm880alhkdxw9qfntgl' );
define( 'LOGGED_IN_KEY',    '3piwspcoqays9x1qqsyacglezco0r9uq3t1g0m4pyopn6sddoqw6ovvxppr6fuox' );
define( 'NONCE_KEY',        'gl0wme6issk8eyvw0ulwoef2lttcwzlzdnaxrfq9v91yumiub19awpmymzk9edda' );
define( 'AUTH_SALT',        'ywypff3v7zjrnhm0ntf3aufes3ugy0xjv5aknfloazgmcrjpnn31d6t9mm9lbdjt' );
define( 'SECURE_AUTH_SALT', 'ys6w9w8mbjybroawflwo7vljppqsjjkzagmfzbuujynkezwfx53qiacjyxjw7d65' );
define( 'LOGGED_IN_SALT',   'mptgcfge1wtan1jvmxyllcrecuy4ekwy7xg3il6abddqvz5ttsss0wi4kem6r8xw' );
define( 'NONCE_SALT',       'zddrwt3yujzjhew6us8ljxmvwhzpbt3y7u3ytesjavxkrxt9pgc2w6lzvhyamwe2' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpea_';

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
