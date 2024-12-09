<div class="mobile-menu-wrapper">
    <nav id="mobile-navigation" class="mobile-nav">
        <div class="mobile-menu-header d-flex justify-content-between align-items-center p-3">
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                <?php endif; ?>
            </div>
            <button class="mobile-menu-close btn">
                <span class="bi bi-x-lg"></span>
            </button>
        </div>
        
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class'     => 'mobile-menu list-unstyled',
            'container'      => false,
            'depth'          => 3,
            'walker'         => new Bootstrap_Mobile_Nav_Walker()
        ));
        ?>
        
        <div class="mobile-menu-footer p-3">
            <?php get_search_form(); ?>
            
            <div class="mobile-social-links mt-3">
                <?php
                $social_links = array(
                    'facebook' => get_theme_mod('social_facebook'),
                    'twitter' => get_theme_mod('social_twitter'),
                    'instagram' => get_theme_mod('social_instagram')
                );
                
                foreach ($social_links as $platform => $url) {
                    if (!empty($url)) {
                        printf(
                            '<a href="%s" class="social-icon me-3" target="_blank" rel="noopener noreferrer"><i class="bi bi-%s"></i></a>',
                            esc_url($url),
                            esc_attr($platform)
                        );
                    }
                }
                ?>
            </div>
        </div>
    </nav>
</div>
