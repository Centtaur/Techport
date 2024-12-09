<?php
/**
 * Header Customizer Settings
 *
 * @package UrbanCartel
 */

if (!defined('ABSPATH')) exit;

function urbancartel_header_customizer($wp_customize) {
    // Register section
    $wp_customize->add_section('urbancartel_header_layout', array(
        'title'      => __('Header Layout', 'urbancartel'),
        'panel'      => 'layout_panel',
        'priority'   => 10,
    ));

    // Add controls
    urbancartel_header_layout_controls($wp_customize);
    urbancartel_header_logo_controls($wp_customize);
    urbancartel_header_menu_controls($wp_customize);
    urbancartel_header_style_controls($wp_customize);
    urbancartel_header_typography_controls($wp_customize);
    urbancartel_header_responsive_controls($wp_customize);
}

function urbancartel_header_layout_controls($wp_customize) {
    // Header Layout Structure
    $wp_customize->add_setting('header_layout_structure', array(
        'default'           => 'logo-menu',
        'sanitize_callback' => 'urbancartel_sanitize_select',
        'transport'         => 'refresh',
        'capability'        => 'edit_theme_options'
    ));

    $wp_customize->add_control('header_layout_structure', array(
        'label'       => __('Header Structure', 'urbancartel'),
        'description' => __('Choose how to arrange logo and menu', 'urbancartel'),
        'section'     => 'urbancartel_header_layout',
        'type'        => 'select',
        'choices'     => array(
            'logo-menu'     => __('Logo - Menu', 'urbancartel'),
            'menu-logo'     => __('Menu - Logo', 'urbancartel'),
            'centered-logo' => __('Centered Logo with Menu', 'urbancartel'),
        ),
    ));

    // Container Width
    $wp_customize->add_setting('header_width', array(
        'default'           => 'container',
        'sanitize_callback' => 'urbancartel_sanitize_select',
        'transport'         => 'refresh'
    ));

    $wp_customize->add_control('header_width', array(
        'label'    => __('Container Width', 'urbancartel'),
        'section'  => 'urbancartel_header_layout',
        'type'     => 'select',
        'choices'  => array(
            'container'       => __('Default Container', 'urbancartel'),
            'container-fluid' => __('Full Width', 'urbancartel'),
            'container-sm'    => __('Small Container', 'urbancartel'),
            'container-lg'    => __('Large Container', 'urbancartel'),
        ),
    ));

    // Header Height
    $wp_customize->add_setting('header_height', array(
        'default'           => '80',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('header_height', array(
        'label'       => __('Header Height (px)', 'urbancartel'),
        'section'     => 'urbancartel_header_layout',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 50,
            'max'  => 200,
            'step' => 1,
        ),
    ));
}

function urbancartel_header_logo_controls($wp_customize) {
    // Logo Position
    $wp_customize->add_setting('header_logo_position', array(
        'default'           => 'left',
        'sanitize_callback' => 'urbancartel_sanitize_select',
    ));

    $wp_customize->add_control('header_logo_position', array(
        'label'           => __('Logo Position', 'urbancartel'),
        'section'         => 'urbancartel_header_layout',
        'type'           => 'select',
        'choices'        => array(
            'left'   => __('Left', 'urbancartel'),
            'center' => __('Center', 'urbancartel'),
            'right'  => __('Right', 'urbancartel'),
        ),
        'active_callback' => function() {
            return get_theme_mod('header_layout_structure') !== 'centered-logo';
        },
    ));

    // Logo Size
    $wp_customize->add_setting('header_logo_size', array(
        'default'           => 'medium',
        'sanitize_callback' => 'urbancartel_sanitize_select',
    ));

    $wp_customize->add_control('header_logo_size', array(
        'label'    => __('Logo Size', 'urbancartel'),
        'section'  => 'urbancartel_header_layout',
        'type'     => 'select',
        'choices'  => array(
            'small'  => __('Small', 'urbancartel'),
            'medium' => __('Medium', 'urbancartel'),
            'large'  => __('Large', 'urbancartel'),
        ),
    ));
}

function urbancartel_header_menu_controls($wp_customize) {
    // Menu Position
    $wp_customize->add_setting('header_menu_position', array(
        'default'           => 'right',
        'sanitize_callback' => 'urbancartel_sanitize_select',
    ));

    $wp_customize->add_control('header_menu_position', array(
        'label'           => __('Menu Position', 'urbancartel'),
        'section'         => 'urbancartel_header_layout',
        'type'           => 'select',
        'choices'        => array(
            'left'   => __('Left', 'urbancartel'),
            'center' => __('Center', 'urbancartel'),
            'right'  => __('Right', 'urbancartel'),
        ),
        'active_callback' => function() {
            return get_theme_mod('header_layout_structure') !== 'centered-logo';
        },
    ));

    // Menu Style
    $wp_customize->add_setting('header_menu_style', array(
        'default'           => 'default',
        'sanitize_callback' => 'urbancartel_sanitize_select',
    ));

    $wp_customize->add_control('header_menu_style', array(
        'label'    => __('Menu Style', 'urbancartel'),
        'section'  => 'urbancartel_header_layout',
        'type'     => 'select',
        'choices'  => array(
            'default'    => __('Default', 'urbancartel'),
            'uppercase'  => __('Uppercase', 'urbancartel'),
            'bold'       => __('Bold', 'urbancartel'),
            'underlined' => __('Underlined', 'urbancartel'),
        ),
    ));
}

function urbancartel_header_style_controls($wp_customize) {
    // Background Color
    $wp_customize->add_setting('header_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
        'label'    => __('Background Color', 'urbancartel'),
        'section'  => 'urbancartel_header_layout',
    )));

    // Text Color
    $wp_customize->add_setting('header_text_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_text_color', array(
        'label'    => __('Text Color', 'urbancartel'),
        'section'  => 'urbancartel_header_layout',
    )));

    // Border Settings
    $wp_customize->add_setting('header_border', array(
        'default'           => false,
        'sanitize_callback' => 'urbancartel_sanitize_checkbox',
    ));

    $wp_customize->add_control('header_border', array(
        'label'    => __('Show Bottom Border', 'urbancartel'),
        'section'  => 'urbancartel_header_layout',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting('header_border_color', array(
        'default'           => '#e9ecef',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_border_color', array(
        'label'           => __('Border Color', 'urbancartel'),
        'section'         => 'urbancartel_header_layout',
        'active_callback' => function() {
            return get_theme_mod('header_border', false);
        },
    )));
}

function urbancartel_header_typography_controls($wp_customize) {
    // Menu Font Family
    $wp_customize->add_setting('header_font_family', array(
        'default'           => 'inherit',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header_font_family', array(
        'label'    => __('Menu Font Family', 'urbancartel'),
        'section'  => 'urbancartel_header_layout',
        'type'     => 'select',
        'choices'  => array(
            'inherit' => __('Theme Default', 'urbancartel'),
            'Arial, sans-serif' => __('Arial', 'urbancartel'),
            'Helvetica, sans-serif' => __('Helvetica', 'urbancartel'),
            'Georgia, serif' => __('Georgia', 'urbancartel'),
            'system-ui' => __('System UI', 'urbancartel'),
        ),
    ));

    // Menu Font Size
    $wp_customize->add_setting('header_font_size', array(
        'default'           => '16',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('header_font_size', array(
        'label'       => __('Menu Font Size (px)', 'urbancartel'),
        'section'     => 'urbancartel_header_layout',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 12,
            'max'  => 24,
            'step' => 1,
        ),
    ));
}

function urbancartel_header_responsive_controls($wp_customize) {
    // Sticky Header
    $wp_customize->add_setting('header_sticky', array(
        'default'           => false,
        'sanitize_callback' => 'urbancartel_sanitize_checkbox',
    ));

    $wp_customize->add_control('header_sticky', array(
        'label'    => __('Enable Sticky Header', 'urbancartel'),
        'section'  => 'urbancartel_header_layout',
        'type'     => 'checkbox',
    ));

    // Mobile Menu Style
    $wp_customize->add_setting('header_mobile_menu_style', array(
        'default'           => 'offcanvas',
        'sanitize_callback' => 'urbancartel_sanitize_select',
    ));

    $wp_customize->add_control('header_mobile_menu_style', array(
        'label'    => __('Mobile Menu Style', 'urbancartel'),
        'section'  => 'urbancartel_header_layout',
        'type'     => 'select',
        'choices'  => array(
            'offcanvas' => __('Off-Canvas', 'urbancartel'),
            'dropdown'  => __('Dropdown', 'urbancartel'),
            'fullscreen' => __('Fullscreen', 'urbancartel'),
        ),
    ));
}
