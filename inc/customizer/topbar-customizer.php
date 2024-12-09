<?php
/**
 * Topbar Customizer Settings
 *
 * @package UrbanCartel
 */

if (!defined('ABSPATH')) exit;

function urbancartel_topbar_customizer($wp_customize) {
    // Add section
    $wp_customize->add_section('urbancartel_topbar_layout', array(
        'title'      => __('Topbar Layout', 'urbancartel'),
        'panel'      => 'layout_panel',
        'priority'   => 5,
    ));

    // Add your topbar controls here
    urbancartel_add_topbar_controls($wp_customize);

    // Add all other controls grouped by functionality
    urbancartel_add_topbar_layout_controls($wp_customize);
    urbancartel_add_topbar_widget_controls($wp_customize);
    urbancartel_add_topbar_style_controls($wp_customize);
    urbancartel_add_topbar_typography_controls($wp_customize);
    urbancartel_add_topbar_responsive_controls($wp_customize);
}

function urbancartel_add_topbar_controls($wp_customize) {
    // Topbar Enable/Disable
    $wp_customize->add_setting('topbar_enable', array(
        'default'           => true,
        'sanitize_callback' => 'urbancartel_sanitize_checkbox',
    ));

    $wp_customize->add_control('topbar_enable', array(
        'label'    => __('Enable Topbar', 'urbancartel'),
        'section'  => 'urbancartel_topbar_layout',
        'type'     => 'checkbox',
    ));
}

function urbancartel_add_topbar_layout_controls($wp_customize) {
    // Layout Style
    $wp_customize->add_setting('topbar_layout', array(
        'default'           => 'layout-1',
        'sanitize_callback' => 'urbancartel_sanitize_select',
    ));

    $wp_customize->add_control('topbar_layout', array(
        'label'    => __('Layout Style', 'urbancartel'),
        'section'  => 'urbancartel_topbar_layout',
        'type'     => 'select',
        'choices'  => array(
            'layout-1' => __('Left - Center - Right', 'urbancartel'),
            'layout-2' => __('Center - Left - Right', 'urbancartel'),
            'layout-3' => __('Left - Right - Center', 'urbancartel'),
        ),
    ));

    // Container Width
    $wp_customize->add_setting('topbar_width', array(
        'default'           => 'container',
        'sanitize_callback' => 'urbancartel_sanitize_select',
    ));

    $wp_customize->add_control('topbar_width', array(
        'label'    => __('Container Width', 'urbancartel'),
        'section'  => 'urbancartel_topbar_layout',
        'type'     => 'select',
        'choices'  => array(
            'container'       => __('Default Container', 'urbancartel'),
            'container-fluid' => __('Full Width', 'urbancartel'),
            'container-sm'    => __('Small Container', 'urbancartel'),
            'container-lg'    => __('Large Container', 'urbancartel'),
        ),
    ));

    // Height Control
    $wp_customize->add_setting('topbar_height', array(
        'default'           => '40',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('topbar_height', array(
        'label'       => __('Height (px)', 'urbancartel'),
        'section'     => 'urbancartel_topbar_layout',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 20,
            'max'  => 100,
            'step' => 1,
        ),
    ));
}

function urbancartel_add_topbar_widget_controls($wp_customize) {
    $positions = array('left', 'center', 'right');
    $available_widgets = array(
        'none' => __('None', 'urbancartel'),
        'text' => __('Custom Text', 'urbancartel'),
        'menu' => __('Menu', 'urbancartel'),
        'social' => __('Social Icons', 'urbancartel'),
        'contact' => __('Contact Info', 'urbancartel'),
    );

    foreach ($positions as $position) {
        // Widget Type Selection
        $wp_customize->add_setting("topbar_widget_$position", array(
            'default'           => 'none',
            'sanitize_callback' => 'urbancartel_sanitize_select',
        ));

        $wp_customize->add_control("topbar_widget_$position", array(
            'label'    => sprintf(__('%s Widget', 'urbancartel'), ucfirst($position)),
            'section'  => 'urbancartel_topbar_layout',
            'type'     => 'select',
            'choices'  => $available_widgets,
        ));

        // Custom Text Field
        $wp_customize->add_setting("topbar_text_$position", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("topbar_text_$position", array(
            'label'    => sprintf(__('%s Custom Text', 'urbancartel'), ucfirst($position)),
            'section'  => 'urbancartel_topbar_layout',
            'type'     => 'text',
            'active_callback' => function() use ($position) {
                return get_theme_mod("topbar_widget_$position") === 'text';
            },
        ));
    }
}

function urbancartel_add_topbar_style_controls($wp_customize) {
    // Colors
    $wp_customize->add_setting('topbar_bg_color', array(
        'default'           => '#f8f9fa',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'topbar_bg_color', array(
        'label'    => __('Background Color', 'urbancartel'),
        'section'  => 'urbancartel_topbar_layout',
    )));

    $wp_customize->add_setting('topbar_text_color', array(
        'default'           => '#212529',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'topbar_text_color', array(
        'label'    => __('Text Color', 'urbancartel'),
        'section'  => 'urbancartel_topbar_layout',
    )));

    // Border Controls
    $wp_customize->add_setting('topbar_border', array(
        'default'           => false,
        'sanitize_callback' => 'urbancartel_sanitize_checkbox',
    ));

    $wp_customize->add_control('topbar_border', array(
        'label'    => __('Show Bottom Border', 'urbancartel'),
        'section'  => 'urbancartel_topbar_layout',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting('topbar_border_color', array(
        'default'           => '#e9ecef',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'topbar_border_color', array(
        'label'    => __('Border Color', 'urbancartel'),
        'section'  => 'urbancartel_topbar_layout',
        'active_callback' => function() {
            return get_theme_mod('topbar_border', false);
        },
    )));
}

function urbancartel_add_topbar_typography_controls($wp_customize) {
    // Font Family
    $wp_customize->add_setting('topbar_font_family', array(
        'default'           => 'inherit',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('topbar_font_family', array(
        'label'    => __('Font Family', 'urbancartel'),
        'section'  => 'urbancartel_topbar_layout',
        'type'     => 'select',
        'choices'  => array(
            'inherit' => __('Theme Default', 'urbancartel'),
            'Arial, sans-serif' => __('Arial', 'urbancartel'),
            'Helvetica, sans-serif' => __('Helvetica', 'urbancartel'),
            'Georgia, serif' => __('Georgia', 'urbancartel'),
            'system-ui' => __('System UI', 'urbancartel'),
        ),
    ));

    // Font Size
    $wp_customize->add_setting('topbar_font_size', array(
        'default'           => '14',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('topbar_font_size', array(
        'label'    => __('Font Size (px)', 'urbancartel'),
        'section'  => 'urbancartel_topbar_layout',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 10,
            'max' => 24,
            'step' => 1,
        ),
    ));
}

function urbancartel_add_topbar_responsive_controls($wp_customize) {
    // Sticky Behavior
    $wp_customize->add_setting('topbar_sticky', array(
        'default'           => false,
        'sanitize_callback' => 'urbancartel_sanitize_checkbox',
    ));

    $wp_customize->add_control('topbar_sticky', array(
        'label'    => __('Sticky Topbar', 'urbancartel'),
        'section'  => 'urbancartel_topbar_layout',
        'type'     => 'checkbox',
    ));

    // Mobile Display
    $wp_customize->add_setting('topbar_mobile_display', array(
        'default'           => 'show',
        'sanitize_callback' => 'urbancartel_sanitize_select',
    ));

    $wp_customize->add_control('topbar_mobile_display', array(
        'label'    => __('Mobile Display', 'urbancartel'),
        'section'  => 'urbancartel_topbar_layout',
        'type'     => 'select',
        'choices'  => array(
            'show'    => __('Show', 'urbancartel'),
            'hide'    => __('Hide', 'urbancartel'),
            'compact' => __('Compact Mode', 'urbancartel'),
        ),
    ));
}
