<?php
/**
 * Navigation Menus Configuration
 *
 * Handles the registration and configuration of navigation menus
 * for the Urban Cartel theme, with Bootstrap 5 compatibility.
 *
 * @package UrbanCartel
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register navigation menu locations
 */
function urbancartel_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'urbancartel'),
        'topbar'  => __('Top Bar Menu', 'urbancartel'),
        'footer'  => __('Footer Menu', 'urbancartel'),
        'mobile'  => __('Mobile Menu', 'urbancartel')
    ));
}
add_action('init', 'urbancartel_register_menus');

/**
 * Add Bootstrap-compatible classes to menu items
 * 
 * @param array $classes The CSS classes that are applied to the menu item's <li> element
 * @param WP_Post $item The current menu item
 * @param stdClass $args An object of wp_nav_menu() arguments
 * @return array Modified array of CSS classes
 */
function urbancartel_nav_menu_classes($classes, $item, $args) {
    // Ensure we have an array and args is an object
    if (!is_array($classes) || !is_object($args)) {
        return $classes;
    }

    // Only modify specified menus and ensure theme_location exists
    if (!isset($args->theme_location) || !in_array($args->theme_location, ['primary', 'topbar', 'mobile'])) {
        return $classes;
    }

    // Add nav-item class to all menu items
    if (!in_array('nav-item', $classes)) {
        $classes[] = 'nav-item';
    }

    // Add dropdown class if item has children
    if (in_array('menu-item-has-children', $classes) && !in_array('dropdown', $classes)) {
        $classes[] = 'dropdown';
    }

    return array_unique($classes);
}
add_filter('nav_menu_css_class', 'urbancartel_nav_menu_classes', 10, 3);

/**
 * Apply Bootstrap-compatible attributes to menu links
 * 
 * @param array $atts Link attributes array
 * @param WP_Post $item Menu item object
 * @param stdClass $args Menu arguments
 * @param int $depth Current menu item depth
 * @return array Modified link attributes
 */
function urbancartel_nav_menu_link_attributes($atts, $item, $args) {
    // Ensure we have valid input parameters
    if (!is_array($atts) || !is_object($args)) {
        return $atts;
    }

    // Only modify specified menus and ensure theme_location exists
    if (!isset($args->theme_location) || !in_array($args->theme_location, ['primary', 'topbar', 'mobile'])) {
        return $atts;
    }

    // Initialize class attribute if not set
    $atts['class'] = isset($atts['class']) ? $atts['class'] : '';
    $classes = array_filter(explode(' ', $atts['class']));
    $classes[] = 'nav-link';

    // Add dropdown attributes for parent items
    if (is_object($item) && !empty($item->classes) && in_array('menu-item-has-children', $item->classes)) {
        $classes[] = 'dropdown-toggle';
        $atts['data-bs-toggle'] = 'dropdown';
        $atts['aria-expanded'] = 'false';
        $atts['role'] = 'button';
    }

    // Add active state for current items
    if (is_object($item) && !empty($item->classes) && in_array('current-menu-item', $item->classes)) {
        $classes[] = 'active';
        $atts['aria-current'] = 'page';
    }

    // Set final class string with unique classes
    $atts['class'] = implode(' ', array_unique($classes));

    return $atts;
}
add_filter('nav_menu_link_attributes', 'urbancartel_nav_menu_link_attributes', 10, 3);

/**
 * Apply Bootstrap-compatible classes to submenus
 * 
 * @param array $classes Submenu classes
 * @param stdClass $args Menu arguments
 * @param int $depth Current menu depth
 * @return array Modified submenu classes
 */
function urbancartel_nav_submenu_classes($classes, $args, $depth) {
    $bootstrap_menus = array('primary', 'topbar', 'mobile');
    
    if (isset($args->theme_location) && in_array($args->theme_location, $bootstrap_menus)) {
        $classes[] = 'dropdown-menu';
    }
    
    return array_unique($classes);
}
add_filter('nav_menu_submenu_css_class', 'urbancartel_nav_submenu_classes', 10, 3);
