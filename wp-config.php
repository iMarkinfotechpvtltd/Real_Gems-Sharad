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
define('DB_NAME', 'db628432260');

/** MySQL database username */
define('DB_USER', 'dbo628432260');

/** MySQL database password */
define('DB_PASSWORD', 'im@rk123#@');

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
define('AUTH_KEY',         'lXS]L%%;+>)JtuQ_&;#cw?jKd$)Z?||.Didl~Yy_v?=Y^LLUbhbaFhD-}yYC6Uz&');
define('SECURE_AUTH_KEY',  'cSOWKkb+u4MqG/jq(?Su7 <EU8H4fbvyUmLEhyi8x]N;3rn;/`gJKcDAzndH6pdX');
define('LOGGED_IN_KEY',    '*#T`}%~c7sS* 2*>y!~L!*:M%UhPe<v:/A-=}WQSrIk!2k%E P|aH1u`N&S-cZK2');
define('NONCE_KEY',        'j@Y-Vej_sA.vpARpDawu9|9-/,u_bezv4a{<qPl;oJ6yu@L@[ ?48x?XS)##ujo ');
define('AUTH_SALT',        'f+vHKVL/k|C>8[jm,#$&vUpmoiibeK>SD;yw;*#TKU%FZ.;=C/O%Llj%hBP!ET0|');
define('SECURE_AUTH_SALT', '68}z7y4*J ;}$G-G4qyF,**tcgU8ZN^HL+?^Er;lGN#i7wD NW`SVo&Ocl5?(*VF');
define('LOGGED_IN_SALT',   ']hvOgRKl+pP0#MzwqM=2~@>N3VSpM3^VVKX?37Xh$H]{w:Q}!2;.fR4/iM&(]2yK');
define('NONCE_SALT',       ' |z5$CoxpeOp5T%IH`rn4GU9h|0qa8>K$!f!9yx~L0P&;:k^L08v]_/HLr_2b`s ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'im_';

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
