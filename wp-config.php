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
define('DB_NAME', 'suchasny');

/** MySQL database username */
define('DB_USER', 'suchasny');

/** MySQL database password */
define('DB_PASSWORD', 'H9v1X7t1');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'w!e!K(2Rlg^%Q%RD4QCWv4MonPTmNrw1Wr%kh&rMWia^Ibd5ybH2xXMSP5Rt97Jy');
define('SECURE_AUTH_KEY',  'oTW3TaGEC5QDYCZ7@HJRKdMbH23!0ubOyfWDEnLcOUgB!S@F)d5#v!diaV9INqLt');
define('LOGGED_IN_KEY',    'A7jYeunvGbMaZmijhvjm%biGR*Ls1vBwWfhOxFa0@#F7A*oGMWfp6)S*six&4F9!');
define('NONCE_KEY',        'rGTcIerlXxoUgxQccL)8!8^G!*vEJKlKWep1%eI57uSIxFJ54(hGHu^QVaRQ)Ypd');
define('AUTH_SALT',        'pGjCKGGSOIwdAyNDrUxb7xo66X0#JrdQ3pU&Kwqr8GZ5KFHV5)a7ULN9x4^SwTfL');
define('SECURE_AUTH_SALT', 'ogXjO1uOBzOvgHY^2qM!o!^RFM3lJ!gQKOKaehSS^B0le)Y*gg#Jk*s!SGBZCu&(');
define('LOGGED_IN_SALT',   'GxO8PmKHTBZM0Kwr6oC*2ADWxrz61J!T3jCFy&3mbTYAO8HILVP74nv0(xoD6XTm');
define('NONCE_SALT',       'ehuH6wM5ps9c4HYyRv48lFqdoaeevKlWRSjn#HgD)WQuT1n8bH)U^hayg1g2u*np');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
?>