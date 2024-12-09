<?php
/**
 * UrbanCartel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UrbanCartel
 */

if (!defined('ABSPATH')) exit;

// Theme Setup Function
function urbancartel_setup() {
    // Add theme support features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    add_theme_support('custom-header', array(
        'default-text-color' => '000000',
        'wp-head-callback'   => 'urbancartel_header_style',
    ));

    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'urbancartel'),
        'footer' => __('Footer Menu', 'urbancartel'),
    ));
}
add_action('after_setup_theme', 'urbancartel_setup');

/**
 * Load Customizer Settings
 */
require_once get_template_directory() . '/inc/customizer/customizer.php';
require_once get_template_directory() . '/classes/class-bootstrap-nav-walker.php';
require_once get_template_directory() . '/inc/nav-menus.php';

// Enqueue Scripts and Styles
function urbancartel_scripts() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
        array(),
        '5.3.0'
    );
    
    // Enqueue theme's stylesheet
    wp_enqueue_style(
        'urbancartel-style',
        get_stylesheet_uri(),
        array('bootstrap-css'),
        '1.0.0'
    );

    // Enqueue theme's main stylesheet
    wp_enqueue_style(
        'urbancartel-main-style',
        get_template_directory_uri() . '/css/main.css',
        array('bootstrap-css'),
        '1.0.0',
        true
    );

    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css',
        array(),
        '1.7.2'
    );
    
    // Enqueue Bootstrap JS and Popper.js
    wp_enqueue_script(
        'bootstrap-bundle',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
        array('jquery'),
        '5.3.0',
        true
    );
    
    // Enqueue custom theme JavaScript
    wp_enqueue_script(
        'urbancartel-main-script',
        get_template_directory_uri() . '/js/main.js',
        array('jquery', 'bootstrap-bundle'),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'urbancartel_scripts');

// Register Widget Areas
function urbancartel_widgets_init() {

    // Topbar Widgets
    $topbar_positions = array('left', 'center', 'right');
    foreach ($topbar_positions as $position) {
        register_sidebar(array(
            'name'          => sprintf(esc_html__('Topbar %s Widget Area', 'urbancartel'), ucfirst($position)),
            'id'            => 'topbar-' . $position,
            'description'   => sprintf(esc_html__('Add widgets for the topbar %s position.', 'urbancartel'), $position),
            'before_widget' => '<div id="%1$s" class="widget topbar-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<span class="widget-title">',
            'after_title'   => '</span>',
        ));
    }

    // Header Widgets
    $header_positions = array('left', 'center', 'right');
    foreach ($header_positions as $position) {
        register_sidebar(array(
            'name'          => sprintf(esc_html__('Header %s Widget Area', 'urbancartel'), ucfirst($position)),
            'id'            => 'header-' . $position,
            'description'   => sprintf(esc_html__('Add widgets for the header %s position.', 'urbancartel'), $position),
            'before_widget' => '<div id="%1$s" class="widget header-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h6 class="widget-title">',
            'after_title'   => '</h6>',
        ));
    }
    
    // Footer Widgets
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => sprintf(esc_html__('Footer Widget Area %d', 'urbancartel'), $i),
            'id'            => 'footer-' . $i,
            'description'   => sprintf(esc_html__('Add widgets here for footer column %d.', 'urbancartel'), $i),
            'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => '</h5>',
        ));
    }
}
add_action('widgets_init', 'urbancartel_widgets_init'); // Ends widgets areas registration

// Customize the widgets panel organization
function urbancartel_customize_widgets_sections($wp_customize) {

    // Topbar Widgets Section
    $wp_customize->add_section('topbar_widgets_section', array(
        'title'    => __('Topbar Widgets', 'urbancartel'),
        'priority' => 120,
        'panel'    => 'widgets',
    ));

    // Header Widgets Section
    $wp_customize->add_section('header_widgets_section', array(
        'title'    => __('Header Widgets', 'urbancartel'),
        'priority' => 110,
        'panel'    => 'widgets',
    ));
    
    // Footer Widgets Section
    $wp_customize->add_section('footer_widgets_section', array(
        'title'    => __('Footer Widgets', 'urbancartel'),
        'priority' => 130,
        'panel'    => 'widgets',
    ));

    // Move widget areas to their respective sections
    foreach ($wp_customize->sections() as $section) {
        if (strpos($section->id, 'idebar-widgets-topbar-') === 0) {
            $section->panel = 'widgets';
            $section->section = 'topbar_widgets_section';
        } elseif (strpos($section->id, 'sidebar-widgets-header-') === 0) {
            $section->panel = 'widgets';
            $section->section = 'header_widgets_section';
        } elseif (strpos($section->id, 'sidebar-widgets-footer-') === 0) {
            $section->panel = 'widgets';
            $section->section = 'footer_widgets_section';
        }
    }
}
add_action('customize_register', 'urbancartel_customize_widgets_sections'); // Ends Customize the widgets panel organization

// Add customizer settings for header layout
function get_header_template() {
    // Get the selected header layout from customizer
    $header_layout = get_theme_mod('header_layout', 'default');
    
    // Define the base paths
    $base_path = 'template-parts/header';
    $template_path = '';
    
    // Set up the specific template path based on the layout
    switch ($header_layout) {
        case 'centered':
            $template_path = "{$base_path}/header-centered";
            break;
        case 'transparent':
            $template_path = "{$base_path}/header-transparent";
            break;
        default:
            $template_path = "{$base_path}/header-default";
            break;
    }
    
    // Check if both base template and specific template exist
    $base_template = get_template_directory() . "/{$base_path}/header-base.php";
    $specific_template = get_template_directory() . "/{$template_path}.php";
    
    // First ensure the base template exists
    if (!file_exists($base_template)) {
        error_log('Base header template is missing: ' . $base_template);
        return;
    }
    
    // Then check for the specific template
    if (file_exists($specific_template)) {
        get_template_part($template_path);
    } else {
        // Fallback to default if specific template doesn't exist
        error_log('Specific header template not found, falling back to default: ' . $specific_template);
        get_template_part("{$base_path}/header-default");
    }
} // Ends customizer settings for header layout

// Add Social Media Customizer Settings
function urbancartel_social_customize_register($wp_customize) {
    // Add Social Media Section
    $wp_customize->add_section('social_settings', array(
        'title'    => __('Social Media Links', 'urbancartel'),
        'priority' => 120,
    ));

    // Social Media Settings
    $social_platforms = array(
        'facebook'  => __('Facebook URL', 'urbancartel'),
        'twitter'   => __('Twitter URL', 'urbancartel'),
        'instagram' => __('Instagram URL', 'urbancartel'),
        'linkedin'  => __('LinkedIn URL', 'urbancartel'),
    );

    foreach ($social_platforms as $platform => $label) {
        $wp_customize->add_setting('social_' . $platform, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('social_' . $platform, array(
            'label'    => $label,
            'section'  => 'social_settings',
            'type'     => 'url',
        ));
    }
}
add_action('customize_register', 'urbancartel_social_customize_register');

// Function to wrap tables in responsive wrapper
function wrap_tables_with_responsive_class($content) {
    // Don't wrap tables in admin area
    if (is_admin()) {
        return $content;
    }
    
    // Find all tables and wrap them
    return preg_replace('/<table(.*)>/', '<div class="table-responsive-wrapper"><table$1>', $content);
}
add_filter('the_content', 'wrap_tables_with_responsive_class');

// Function to make embeds responsive
function make_embeds_responsive($html, $url, $attr) {
    return '<div class="responsive-embed">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'make_embeds_responsive', 10, 3);

// Add responsive image sizes
function add_responsive_image_sizes() {
    // Featured image sizes
    add_image_size('featured-small', 300, 200, true);
    add_image_size('featured-medium', 600, 400, true);
    add_image_size('featured-large', 1200, 800, true);
    
    // Add srcset support
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
}
add_action('after_setup_theme', 'add_responsive_image_sizes');

// Add custom body class for touch devices
function add_touch_device_class($classes) {
    if (wp_is_mobile()) {
        $classes[] = 'touch-device';
    }
    return $classes;
}
add_filter('body_class', 'add_touch_device_class');

// Breakpoint-Specific Layouts
function get_device_specific_template_part($slug, $name = null) {
    if (wp_is_mobile()) {
        get_template_part($slug . '-mobile', $name);
    } else {
        get_template_part($slug, $name);
    }
}