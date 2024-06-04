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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'newspeed' );

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
define( 'AUTH_KEY',         'h.nH4yT{_Y~-UDYO5Bz5yZuMq21/SY+a-KvLc:Wq#TM(;QGQ>f?SsJLbQmA`[Kd[' );
define( 'SECURE_AUTH_KEY',  'WjSayv!1CV?|^IRKC<6-uHcn(I.YV<Wrw*IZ-z=e.( W,ieE9c.])kmghnP#]7Gb' );
define( 'LOGGED_IN_KEY',    'JLnQj`atQ@e3-qRl,`zgrx,?J9%^j+Ya?^>SfGTL5Z$Go@@YMMjyVA`E`!2a@g|-' );
define( 'NONCE_KEY',        'BBXpYB7.x!3+2!]9iN3SxN(?C?~Ra:H~@F`cK.M-hH6+dXXSf|u$`2yK)<.|Z;FK' );
define( 'AUTH_SALT',        'NBQ&[zdAujM>F6v6$=E,H<|nOX5/4@eEo5;BgJ$Jeh>|H*R&u1?y8r@;.X|x$}#%' );
define( 'SECURE_AUTH_SALT', ']OIqB?ev&QBNG8V48#riQV(]J,KSpd8yD{SOH%uo%EHVS!-dn*$}K.uy=@k~0:~V' );
define( 'LOGGED_IN_SALT',   '%4M$MRH DKt2*M8@x#WIkPtj:7;pkf~Jw-8cR@mo;_ZH`NgR-v#Xw/! o)ScyL%H' );
define( 'NONCE_SALT',       'BeR#Rj7z^-/h+g{Yu=B;}{fy@0Vs U#ctF(gl^6d%v1!wYco;jt]WdtuH6J{D+&2' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
