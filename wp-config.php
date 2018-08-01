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
define('DB_NAME', 'ls264118_wps');

/** MySQL database username */
define('DB_USER', 'ls264118_wps');

/** MySQL database password */
define('DB_PASSWORD', 'k598kdvh');

/** MySQL hostname */
define('DB_HOST', 'ls264118.mysql.tools');

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
define('AUTH_KEY',         '`+[W(gGEh$0iM#uHQ!H}S6cyEAxb$(fVFiqjoh*|yC:{<CT1B9O%>&zl`(Hl[dmJ');
define('SECURE_AUTH_KEY',  'j=k@m%BP*xA!hFpegG<8G`)8|(%<:r[`I^UMT5-zJNYOW`K}!o HL=HXhm_]%OU#');
define('LOGGED_IN_KEY',    'a}}+?D*$Q Kg=$O:B].L(Rq|0efe^{ce)onrf0%GQ3hxgt#GaJaC_a+o%Hdfpr]A');
define('NONCE_KEY',        'Lvm1X[8F[HU>ojj|V^I9^J)orqDFOT_%1y0U&e%/qj<flB-=1b!*5|08n4F=Z57l');
define('AUTH_SALT',        'R__zOl/2?qXWC5sPRD=62NmbaXSh>cC%IgO.EXXQF6x!VZQ-6NbS]h9qQ=[>LB$c');
define('SECURE_AUTH_SALT', 'sz,P<_4hA 8;Wnk lKo0Q I0A/1Jk,Z37;iYrRhR~Q%zoss{zFJ}W]:/]tiY~S89');
define('LOGGED_IN_SALT',   '/W/b=}1e_s5(:$xmih+r^#e{$X)K/l7PD+oYGW-ozA)%Xy1`!u01Me_w!do[Y9c ');
define('NONCE_SALT',       'TKFp}l?5I@/:Zvi*jS<K%BJr%F&*yCRcd4vK45RI2yIbrB/KC7?-HNC>,]gRr2+{');

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
