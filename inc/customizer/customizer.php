<?php
/**
 * Theme Customizer
 *
 * @package UrbanCartel
 */

 if (!defined('ABSPATH')) exit;

 
 function urbancartel_customize_register($wp_customize) {
     // Create the main layout panel first
     $wp_customize->add_panel('layout_panel', array(
         'title'       => __('Layout Settings', 'urbancartel'),
         'description' => __('Customize your theme layout settings', 'urbancartel'),
         'priority'    => 30,
     ));
 
     // Then register the sections and controls
     if (function_exists('urbancartel_header_customizer')) {
         urbancartel_header_customizer($wp_customize);
     }
     
     if (function_exists('urbancartel_topbar_customizer')) {
         urbancartel_topbar_customizer($wp_customize);
     }
     
     if (function_exists('urbancartel_footer_customizer')) {
         urbancartel_footer_customizer($wp_customize);
     }
     
     if (function_exists('urbancartel_mobile_customizer')) {
         urbancartel_mobile_customizer($wp_customize);
     }
 }
 add_action('customize_register', 'urbancartel_customize_register', 10);

 // Load components after the customizer function is defined
 require_once get_template_directory() . '/inc/customizer/header-customizer.php';
 require_once get_template_directory() . '/inc/customizer/topbar-customizer.php';
 require_once get_template_directory() . '/inc/customizer/footer-customizer.php';
 require_once get_template_directory() . '/inc/customizer/mobile-customizer.php';
