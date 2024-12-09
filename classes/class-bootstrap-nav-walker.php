<?php
/**
 * WP Bootstrap Navwalker
 *
 * @package UrbanCartel
 */

if (!defined('ABSPATH')) {
    exit;
}

class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '<ul class="dropdown-menu">';
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $item_classes = empty($item->classes) ? array() : (array) $item->classes;
        
        $is_dropdown = in_array('menu-item-has-children', $item_classes);
        $item_classes[] = 'nav-item';
        if ($is_dropdown) {
            $item_classes[] = 'dropdown';
        }
        
        $output .= '<li class="' . implode(' ', array_filter($item_classes)) . '">';
        
        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        $atts['class']  = 'nav-link';
        
        if ($is_dropdown) {
            $atts['class'] .= ' dropdown-toggle';
            $atts['data-bs-toggle'] = 'dropdown';
        }
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        $title = apply_filters('the_title', $item->title, $item->ID);
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= $item_output;
    }
}
