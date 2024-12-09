<?php
/**
 * Site branding template
 *
 * @package UrbanCartel
 */
?>
<div class="site-branding">
    <?php
    // Custom logo
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        // Fallback to site title and description
        if (is_front_page() && is_home()) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
        <?php else : ?>
            <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
        <?php endif;

        $urbancartel_description = get_bloginfo('description', 'display');
        if ($urbancartel_description || is_customize_preview()) : ?>
            <p class="site-description"><?php echo $urbancartel_description; ?></p>
        <?php endif;
    } ?>
</div>
