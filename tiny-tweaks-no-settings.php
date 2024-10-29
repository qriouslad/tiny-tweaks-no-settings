<?php
/*
 * Plugin Name:       Tiny Tweaks - No Settings
 * Plugin URI:        https://github.com/qriouslad/tiny-tweaks-no-settings
 * Description:       Tiny tweaks for WordPress
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Bowo
 * Author URI:        https://bowo.io/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/qriouslad/tiny-tweaks-no-settings
 * Text Domain:       tiny-tweaks-no-settings
 * Domain Path:       /languages
 * Requires Plugins:  
 */

// Prevent direct access to the PHP file, without going through WordPress where 
// the constant ABSPATH is defined (in wp-config.php)
if ( ! defined( 'ABSPATH' ) ) {
    die( 'Invalid request' );
}



// ========== Change left-side footer credits ==========

add_filter( 'admin_footer_text', 'ttns_return_new_admin_footer_text' );

function ttns_return_new_admin_footer_text( $text ) {
    $text = 'This site is a bowo.io craft.';
    return $text;
}



// ========== Remove right-side footer WP version number ==========

add_filter( 'update_footer', 'ttns_remove_footer_wp_version', 20 );

function ttns_remove_footer_wp_version( $content ) {
    // Output nothing here
    $content = '';
    echo $content;
}



// ========== Use site icon for login page logo ==========

add_action( 'login_head', 'ttns_use_site_icon_as_login_page_logo' );

function ttns_use_site_icon_as_login_page_logo() {
    if ( has_site_icon() ) { 
        ?>
        <style type="text/css">
                .login h1 a {
                        background-image: url('<?php site_icon_url( 180 ); ?>');
                }
        </style>
        <?php
    }
}