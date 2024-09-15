<?php

//require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Types

add_action( 'after_setup_theme', 'portfolio_setup' );
function portfolio_setup() {
    load_theme_textdomain( 'portfolio', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
    add_theme_support( 'appearance-tools' );
    add_theme_support( 'woocommerce' );
    global $content_width;
    if ( !isset( $content_width ) ) { $content_width = 1920; }
    register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'portfolio' ) ) );
}

add_action( 'admin_notices', 'portfolio_notice' );
function portfolio_notice() {
    $user_id = get_current_user_id();
    $admin_url = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $param = ( count( $_GET ) ) ? '&' : '?';
    if ( !get_user_meta( $user_id, 'portfolio_notice_dismissed_11' ) && current_user_can( 'manage_options' ) )
    echo '<div class="notice notice-info"><p><a href="' . esc_url( $admin_url ), esc_html( $param ) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__( 'Ⓧ', 'portfolio' ) . '</big></a>' . wp_kses_post( __( '<big><strong>🏆 Thank you for using portfolio!</strong></big>', 'portfolio' ) ) . '<p>' . esc_html__( 'Powering over 10k websites! Buy me a sandwich! 🥪', 'portfolio' ) . '</p><a href="https://github.com/bhadaway/portfolio/issues/57" class="button-primary" target="_blank"><strong>' . esc_html__( 'How do you use portfolio?', 'portfolio' ) . '</strong></a> <a href="https://opencollective.com/portfolio" class="button-primary" style="background-color:green;border-color:green" target="_blank"><strong>' . esc_html__( 'Donate', 'portfolio' ) . '</strong></a> <a href="https://wordpress.org/support/theme/portfolio/reviews/#new-post" class="button-primary" style="background-color:purple;border-color:purple" target="_blank"><strong>' . esc_html__( 'Review', 'portfolio' ) . '</strong></a> <a href="https://github.com/bhadaway/portfolio/issues" class="button-primary" style="background-color:orange;border-color:orange" target="_blank"><strong>' . esc_html__( 'Support', 'portfolio' ) . '</strong></a></p></div>';
}

add_action( 'admin_init', 'portfolio_notice_dismissed' );
function portfolio_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['dismiss'] ) )
    add_user_meta( $user_id, 'portfolio_notice_dismissed_11', 'true', true );
}

// enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'portfolio_enqueue' );
function portfolio_enqueue() {
    wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); 

    wp_register_script('scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
    wp_enqueue_script('scripts');

    wp_register_script('typed-script', get_stylesheet_directory_uri() . '/assets/js/typed-umd.min.js',array('jquery'), null, true); 
    wp_enqueue_script('typed-script');
    
    wp_register_script('slick-script', get_stylesheet_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
    wp_enqueue_script('slick-script');
}

add_action( 'wp_footer', 'portfolio_footer' );
function portfolio_footer() {
?>
    <script>
    jQuery(document).ready(function($) {
        var deviceAgent = navigator.userAgent.toLowerCase();
        if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
            $("html").addClass("ios");
            $("html").addClass("mobile");
        }
        if (deviceAgent.match(/(Android)/)) {
            $("html").addClass("android");
            $("html").addClass("mobile");
        }
        if (navigator.userAgent.search("MSIE") >= 0) {
            $("html").addClass("ie");
        }
        else if (navigator.userAgent.search("Chrome") >= 0) {
            $("html").addClass("chrome");
        }
        else if (navigator.userAgent.search("Firefox") >= 0) {
            $("html").addClass("firefox");
        }
        else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
            $("html").addClass("safari");
        }
        else if (navigator.userAgent.search("Opera") >= 0) {
            $("html").addClass("opera");
        }
    });
    </script>
<?php
}

// ACF Options Pages
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Site Settings',
        'menu_title'    => 'Site Settings',
        'menu_slug'     => 'customizations',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-admin-site', // Add this line and replace the second inverted commas with class of the icon you like
        'redirect'      => false
    ));
}

// Add ability to add SVG to Wordpress Media Library
add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

//add SVG to allowed file uploads
add_action('upload_mimes', 'add_file_types_to_uploads');
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}

// Register Site Navigations
add_action( 'init', 'postali_child_register_nav_menus' );
function postali_child_register_nav_menus() {
    register_nav_menus(
        array(
            'header-nav' => __( 'Header Navigation', 'postali' ),
        )
    );
}
	