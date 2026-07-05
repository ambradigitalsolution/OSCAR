<?php
/**
 * Oscar Network Theme functions and definitions
 */

if ( ! function_exists( 'oscar_network_setup' ) ) {
    function oscar_network_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );
    }
}
add_action( 'after_setup_theme', 'oscar_network_setup' );

/**
 * Enqueue scripts and styles.
 */
function oscar_network_scripts() {
    // Font Awesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap', array(), null );

    // Main stylesheet
    wp_enqueue_style( 'oscar-network-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );

    // Main JS
    wp_enqueue_script( 'oscar-network-main', get_template_directory_uri() . '/js/main.js', array(), wp_get_theme()->get('Version'), true );
}
add_action( 'wp_enqueue_scripts', 'oscar_network_scripts' );

/**
 * Auto-create "Tentang Kami" page if it doesn't exist.
 */
function oscar_auto_create_pages() {
    $page_slug = 'tentang-kami';
    $page_title = 'Tentang Kami';
    
    $page = get_page_by_path( $page_slug );
    if ( ! $page ) {
        $page_id = wp_insert_post( array(
            'post_title'     => $page_title,
            'post_name'      => $page_slug,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'post_content'   => ''
        ) );
    }
}
add_action( 'init', 'oscar_auto_create_pages' );
