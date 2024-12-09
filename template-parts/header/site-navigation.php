<?php
/**
 * Site navigation template
 *
 * @package UrbanCartel
 */

if (has_nav_menu('primary')) {
    wp_nav_menu(array(
        'theme_location'  => 'primary',
        'container'       => false,
        'menu_class'      => 'navbar-nav',
        'fallback_cb'     => false,
        'depth'           => 2,
        'walker'          => new WP_Bootstrap_Navwalker()
    ));
} else {
    ?>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo esc_url(admin_url('nav-menus.php')); ?>">
                <?php esc_html_e('Add a Primary Menu', 'urbancartel'); ?>
            </a>
        </li>
    </ul>
    <?php
}
?>
