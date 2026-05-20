<?php
/**
 * GetOptimizedAI Theme Functions
 */

// ── THEME SETUP ──
function getoptimizedai_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption' ] );

    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'getoptimizedai' ),
    ] );
}
add_action( 'after_setup_theme', 'getoptimizedai_setup' );

// ── ENQUEUE FONTS & STYLES ──
function getoptimizedai_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'getoptimizedai-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'getoptimizedai-style',
        get_stylesheet_uri(),
        [ 'getoptimizedai-fonts' ],
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'getoptimizedai_scripts' );

// ── WIDGET AREAS ──
function getoptimizedai_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Blog Sidebar', 'getoptimizedai' ),
        'id'            => 'blog-sidebar',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="sidebar-widget-title">',
        'after_title'   => '</h4>',
    ] );
}
add_action( 'widgets_init', 'getoptimizedai_widgets_init' );

// ── READ TIME HELPER ──
function getoptimizedai_read_time() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $words   = str_word_count( strip_tags( $content ) );
    return max( 1, ceil( $words / 200 ) );
}

// ── EXCERPT ──
add_filter( 'excerpt_length', fn() => 28 );
add_filter( 'excerpt_more',   fn() => '…' );

// ── AUDIT FORM HANDLER ──
function getoptimizedai_handle_audit_form() {
    if ( ! isset( $_POST['audit_nonce'] ) || ! wp_verify_nonce( $_POST['audit_nonce'], 'audit_form_submit' ) ) {
        wp_die( 'Security check failed.' );
    }

    $name    = sanitize_text_field( $_POST['audit_name'] ?? '' );
    $email   = sanitize_email( $_POST['audit_email'] ?? '' );
    $message = sanitize_textarea_field( $_POST['audit_message'] ?? '' );

    if ( empty( $name ) || empty( $email ) ) {
        wp_redirect( add_query_arg( 'audit', 'error', wp_get_referer() ) );
        exit;
    }

    $to      = 'brad@getoptimizedai.com';
    $subject = "New AI Audit Request from {$name}";
    $body    = "Name: {$name}\nEmail: {$email}\n\nMessage:\n{$message}";
    $headers = [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>" ];

    wp_mail( $to, $subject, $body, $headers );

    wp_redirect( add_query_arg( 'audit', 'success', wp_get_referer() ) );
    exit;
}
add_action( 'admin_post_nopriv_audit_form_submit', 'getoptimizedai_handle_audit_form' );
add_action( 'admin_post_audit_form_submit', 'getoptimizedai_handle_audit_form' );
