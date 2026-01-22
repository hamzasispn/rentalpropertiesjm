<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'property_test' );

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
define( 'AUTH_KEY',         ':5q*eGA|L;:%s,)UP`|Wm#dg75zI|DQ7V^7tw3zD]%CBU8@cTX)B*IX.pc||rimJ' );
define( 'SECURE_AUTH_KEY',  'L#w2E~S?qpC*I3v/Z{FO|4HQ%VF%cMlvM&EarN68!9sAW}nx5C]N69KX&GK)8MxI' );
define( 'LOGGED_IN_KEY',    'gW6{6G:_oo%=ntN ]@4)]Q+QF%)cK~bh;+$<qg0?lW>WuJAZjKXDY,lt5uDL&^F[' );
define( 'NONCE_KEY',        '%|RP$*^pSF>E<b?4rcWBb5aP2KZ*/}$m_}os-i)^If.QCd6yY]gVZCqF.bDK g6]' );
define( 'AUTH_SALT',        '9UgUM%>r%zF6eibY>y-Q[8Vq%AHfVH`:+N,)SC|UKaCW{GTMR2>[Ln@F,8zq-e%{' );
define( 'SECURE_AUTH_SALT', '[(qjAnmAXG[CACbZM{E-XeL42o4mO*kNBI+RJy8-Ktr#Gs.r>ogMpNx-{6m,_F#N' );
define( 'LOGGED_IN_SALT',   '0A># qFeKwTPr,TZj!}pJo3u,Xn?`WNZaLuS_Nc`_3f+/IM+:gZ6_<|`|6V=`Lm{' );
define( 'NONCE_SALT',       '<s:sDv[5?knoJ[S~rvrxtTt$^VTCKL@e+$E~eM*rAd:v](f+q-]@s)8:a){@/t+7' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* Add any custom values between this line and the "stop editing" line. */

define('STRIPE_SECRET_KEY', 'sk_test_51S1WzxB1fVG7OgbPnuPGXSIpzPUVagTTD3jHtkRpNFMRy2cHtzT8jtny3ubpW8HR9PYwmAr9tFajILZPRao9nh1F00mGs5Tbkd');
define('STRIPE_WEBHOOK_SECRET', 'whsec_e63aa5ff5c275d5164d78819aff8a540be3f5011ff7392f745dd339635097a92');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51S1WzxB1fVG7OgbP1M3aDl9FmKiPor8xJT1vtqgAj33mY37UK75L0oMgSMaQswkQyjpyW9daLLpmWfK5HGjSN49e00VY6HZueY');
define('MAPBOX_PUBLIC_KEY', 'pk.eyJ1IjoianVhbm1hdGFsbGFuYSIsImEiOiJjbHVtdWhueTYwaHpoMmxtbW84OXNuMWV5In0.6dKLZ09xI3b3-GX-P8VslA');


define('DISABLE_WP_CRON', false);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';