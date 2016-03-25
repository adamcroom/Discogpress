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
define('DB_NAME', 'wp_discogpress');

/** MySQL database username */
define('DB_USER', 'reclaim');

/** MySQL database password */
define('DB_PASSWORD', 'reclaim4life');

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
define('AUTH_KEY',         '8.%k`slb~*5|]|9K^,)xZGvX825hoN*|8#f_U-9%N_>+,LmH-W:LZK<PAPtKI]ji');
define('SECURE_AUTH_KEY',  ':g5Y65-j{NA`@OJO[-jWf^-fw@|H)E0*<:.D8o+1IbnPqy62`6a8yFZk/`UFZk%N');
define('LOGGED_IN_KEY',    'Cz07^b}obR-n&&&G%(6wr7?:{;y|Ob!XH4^87R,e{`:nT=2=>Sdy+UVo2)p_1Ad`');
define('NONCE_KEY',        'B(o 34o_ GzzM$1y_I]L)+!2Y%O7E59g~]XB>v0p|+g(A&/pV+Rk+A~.g+~Ss3j ');
define('AUTH_SALT',        'B_k~A4Ps->%_l+^kJ~cs9|*WDbA`x`O)vr|5D-k?>7bd7v7T-Ow5!Uk82Y? UE~v');
define('SECURE_AUTH_SALT', '%7-&]`-  _NLqw#_SV6QP*z^Q:gz8Y/U~E@8:}`,:twU~0|oUO(h+}2%Ai,H q8s');
define('LOGGED_IN_SALT',   '%=cR/v(I>aNtcph{GYhLS?tDD]dE2HPbGaD_shF`5{|^1|DTm5yik#w|3+E-qXD$');
define('NONCE_SALT',       '#k[q[]b:IE/Q-]>^)pJAd`F6h}3S&/wzS8K-M-&,EO}f1xwR`C+SE:[ci1$-;Ta9');

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
