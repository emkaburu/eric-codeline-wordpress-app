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
define('DB_NAME', 'codeline_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'qKYM3KS@oeO|tlt|Yg+kJ?:P]/(}qJXc/=AoX~qnSL8B_V@@dx?E1vn@{#p+#|3C');
define('SECURE_AUTH_KEY',  '`9JhB-IJ6 J 5gi/I92Vekm40_^%W[UhWL}_yF0TkyGf@?iJJd`:,zEywr?LDzC-');
define('LOGGED_IN_KEY',    'e[8O|{W!=nr8pDr?L34U<|IECMPtb0PKL.v&E`-#>T})49duA*!r;nyjBEhYh<mX');
define('NONCE_KEY',        '7$|M0MJS@ykMVf(C+/6R`]u#1l(4wY|Al)3{Xw@v.#,jw+/H9R,Cwqm%KSs[2P5>');
define('AUTH_SALT',        '#!x]fE,@_6%Mh6c -m>]J>]{`}_gMw9Yw]MemT@ROx[U|aRM]61~Yd!.uw,:LX?L');
define('SECURE_AUTH_SALT', '@BmcXF;y@%vWe/g/C2u];68)0Rq/!)-847yg+H$){1*WUEcmn~5BfQQkc3O[k/9V');
define('LOGGED_IN_SALT',   'LZBX#+:&ZY5PY!EnqlP39A3-A67M<3-5{Aooyv^b>yXIJNv=P_{MFonOGudmO3}H');
define('NONCE_SALT',       '/YLONtf;Q%`qMjmj ~uU&4j~E@/v751;|S53H%XKb(^FxD$X~o;6l8;vZ5TFV9#k');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'clwp_';

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
