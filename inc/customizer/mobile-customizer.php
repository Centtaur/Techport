<?php
/**
 * Mobile Customizer Settings
 *
 * @package UrbanCartel
 */

 if (!defined('ABSPATH')) exit;

 function urbancartel_mobile_customizer($wp_customize) {
     // Add section
     $wp_customize->add_section('urbancartel_mobile_layout', array(
        'title'      => __('Mobile Layout', 'urbancartel'),
        'panel'      => 'layout_panel',
        'priority'   => 30,
    ));

     // Add your mobile controls here
     urbancartel_add_mobile_controls($wp_customize); 

 }

 function urbancartel_add_mobile_controls($wp_customize) {
    // Mobile Menu Breakpoint
    $wp_customize->add_setting('mobile_menu_breakpoint', array(
        'default'           => '768',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('mobile_menu_breakpoint', array(
        'label'       => __('Mobile Menu Breakpoint (px)', 'urbancartel'),
        'section'     => 'urbancartel_mobile_layout',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 320,
            'max'  => 1200,
            'step' => 1,
        ),
    ));

 }
