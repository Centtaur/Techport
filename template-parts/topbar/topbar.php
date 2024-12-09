<?php
/**
 * Template part for displaying top bar with custom content
 *
 * @package UrbanCartel
 */

// Check if topbar is enabled
if (!get_theme_mod('topbar_enable', true)) {
    return;
}

// Get all theme mods
$layout = get_theme_mod('topbar_layout', 'layout-1');
$width = get_theme_mod('topbar_width', 'container');
$bg_color = get_theme_mod('topbar_bg_color', '#f8f9fa');
$text_color = get_theme_mod('topbar_text_color', '#212529');
$font_family = get_theme_mod('topbar_font_family', 'inherit');
$font_size = get_theme_mod('topbar_font_size', '14');
$height = get_theme_mod('topbar_height', '40');
$sticky = get_theme_mod('topbar_sticky', false);
$border = get_theme_mod('topbar_border', false);
$border_color = get_theme_mod('topbar_border_color', '#e9ecef');
$mobile_display = get_theme_mod('topbar_mobile_display', 'show');

// Generate classes
$topbar_classes = array('topbar');
if ($sticky) {
    $topbar_classes[] = 'sticky-top';
}
if ($border) {
    $topbar_classes[] = 'has-border';
}
if ($mobile_display === 'hide') {
    $topbar_classes[] = 'd-none d-md-block';
} elseif ($mobile_display === 'compact') {
    $topbar_classes[] = 'compact-mobile';
}

// Generate styles
$topbar_style = sprintf(
    'background-color: %s; color: %s; font-family: %s; font-size: %spx; min-height: %spx; line-height: %spx;',
    esc_attr($bg_color),
    esc_attr($text_color),
    esc_attr($font_family),
    esc_attr($font_size),
    esc_attr($height),
    esc_attr($height - 2)
);

if ($border) {
    $topbar_style .= sprintf('border-bottom: 1px solid %s;', esc_attr($border_color));
}
?>

<div class="<?php echo esc_attr(implode(' ', $topbar_classes)); ?>" style="<?php echo $topbar_style; ?>">
    <div class="<?php echo esc_attr($width); ?>">
        <div class="row align-items-center h-100">
            <?php
            $positions = $layout === 'layout-1' ? ['left', 'center', 'right'] :
                        ($layout === 'layout-2' ? ['center', 'left', 'right'] : 
                        ['left', 'right', 'center']);

            foreach ($positions as $position) :
                $widget_type = get_theme_mod("topbar_widget_$position", 'none');
            ?>
                <div class="col-md-4 d-flex align-items-center justify-content-<?php echo $position; ?>">
                    <?php if (is_active_sidebar('topbar-' . $position)) : ?>
                        <?php dynamic_sidebar('topbar-' . $position); ?>
                    <?php else : ?>
                        <?php
                        switch ($widget_type) {
                            case 'text':
                                echo wp_kses_post(get_theme_mod("topbar_text_$position", ''));
                                break;
                            case 'menu':
                                wp_nav_menu(array(
                                    'theme_location' => 'topbar',
                                    'container'      => false,
                                    'menu_class'     => 'topbar-menu',
                                    'fallback_cb'    => false,
                                ));
                                break;
                            case 'social':
                                get_template_part('template-parts/social/social-icons');
                                break;
                            case 'contact':
                                get_template_part('template-parts/contact/contact-info');
                                break;
                        }
                        ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php if ($mobile_display === 'compact') : ?>

<?php endif; ?>
