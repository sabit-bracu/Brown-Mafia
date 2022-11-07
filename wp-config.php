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
define( 'DB_NAME', 'ahmedbin_wp23' );

/** Database username */
define( 'DB_USER', 'ahmedbin_wp23' );

/** Database password */
define( 'DB_PASSWORD', '73@rS-2p41' );

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
define( 'AUTH_KEY',         'yajxymgjfseqk70hremekh3fkaulbyypxdupejdfzmx3or0lkcclmwpa11bogwtz' );
define( 'SECURE_AUTH_KEY',  'yml1asauxs8bjhlqmteew4rrmqj3p9istomodg0pkjqedbyuv152ypuzwrg1o4tv' );
define( 'LOGGED_IN_KEY',    'nwrhrpasy2s0oichkdwqawolz2ut9mhjt0v3ntkthh6sdvjmrmjztovmx94vkbgg' );
define( 'NONCE_KEY',        'f8cgjup0n9gd2msvd22zvjom3fl3zmw616ivkvbddbfv5zqqv2mo2eq8rtc9dyw0' );
define( 'AUTH_SALT',        'guhmja8b4kc1nkjsrppzbfbzwjvphpnqzxbeabvkeijwwwngohvhvepzzlwx9wqk' );
define( 'SECURE_AUTH_SALT', '9bsv5wztuu5b8qw8jfbargx2kuc4n1qwhcbo7gjvgfx5rjquc6s5brbesrojiyhr' );
define( 'LOGGED_IN_SALT',   'tnb8omt95kddtovdgelxzhwhvymtuwxkvn9wv3ysdes8allxcjemskdqwggdvg1x' );
define( 'NONCE_SALT',       'nrlopuqrrto6muvvuhxounmlrbxxgytgb121r4f3ohjodoox6xw80rrferllham5' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp3s_';

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
