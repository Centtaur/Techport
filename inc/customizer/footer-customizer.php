<?php
/**
 * Footer Customizer Settings
 *
 * @package UrbanCartel
 */

 if (!defined('ABSPATH')) exit;

 function urbancartel_footer_customizer($wp_customize) {
     // Add section
     $wp_customize->add_section('urbancartel_footer_layout', array(
         'title'      => __('Footer Layout', 'urbancartel'),
         'panel'      => 'layout_panel',
         'priority'   => 20,
     ));

     // Add your footer controls here
     urbancartel_add_footer_controls($wp_customize);

    }

    function urbancartel_add_footer_controls($wp_customize) {
        // Footer Enable/Disable
        $wp_customize->add_setting('footer_enable', array(
            'default'           => true,
            'sanitize_callback' => 'urbancartel_sanitize_checkbox',
        ));

        $wp_customize->add_control('footer_enable', array(
            'label'    => __('Enable Footer', 'urbancartel'),
            'section'  => 'urbancartel_footer_layout',
            'type'     => 'checkbox',
        ));
    
    // Footer Layout Setting
    $wp_customize->add_setting('footer_layout', array(
        'default'           => 'default',
        'sanitize_callback' => 'urbancartel_sanitize_select',
    ));

    $wp_customize->add_control('footer_layout', array(
        'label'    => __('Footer Layout', 'urbancartel'),
        'section'  => 'urbancartel_footer_layout',
        'type'     => 'select',
        'choices'  => array(
            'default' => __('Default Footer', 'urbancartel'),
            'widgets' => __('Widget Footer', 'urbancartel'),
            'minimal' => __('Minimal Footer', 'urbancartel'),
        ),
    ));
}
