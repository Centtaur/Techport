<?php
/**
 * Base header template part
 *
 * @package UrbanCartel
 */

// Get customizer settings
$header_layout = get_theme_mod('header_layout_structure', 'logo-menu');
$logo_position = get_theme_mod('header_logo_position', 'left');
$menu_position = get_theme_mod('header_menu_position', 'right');
$container_class = get_theme_mod('header_width', 'container');

function get_position_class($position) {
    switch($position) {
        case 'left':
            return 'justify-content-start';
        case 'center':
            return 'justify-content-center';
        case 'right':
            return 'justify-content-end';
        default:
            return 'justify-content-start';
    }
}

// Get position classes
$logo_class = get_position_class($logo_position);
$menu_class = get_position_class($menu_position);
?>
