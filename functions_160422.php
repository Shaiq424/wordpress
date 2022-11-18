<?php
error_reporting(0);
// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
    'menu-1' 		=> esc_html__( 'Primary menu', 'beltwayad' ),
    'footer_menu' 	=> esc_html__( 'Footer menu', 'beltwayad' ),

) );

/**
 * For logo or Header Image Starts
 * */
add_theme_support('post-thumbnails');
function themename_custom_header_setup() {
    $args = array(
        'default-image'      => get_template_directory_uri() .'/assets/images/logo.png', //get_template_directory_uri() . 'img/default-image.jpg',
        'default-text-color' => '000',
        'flex-width'         => true,
        'flex-height'        => true,
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'themename_custom_header_setup' );
add_theme_support('favicon');
/**
 * For logo or Header Image Ends
 * */

   
// For Front Page sections
require_once( get_template_directory() . '/sections/topbar.php' );
require_once( get_template_directory() . '/sections/banner.php' );
require_once( get_template_directory() . '/sections/benefits.php' );
require_once( get_template_directory() . '/sections/footer.php' );
require_once( get_template_directory() . '/sections/whyus.php' );
require_once( get_template_directory() . '/sections/capabilities.php' );
require_once( get_template_directory() . '/sections/advertising.php');



