<footer id="colophon" class="site-footer footer-widgets bg-light py-5">
    <div class="container">
    <div class="row">
    <!-- Widget Area 1 -->
    <div class="col-md-3 mb-4 mb-md-0">
        <div class="footer-widget-area">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
            <?php else : ?>
                <h5 class="widget-title"><?php esc_html_e('About Us', 'urbancartel'); ?></h5>
                <p><?php bloginfo('description'); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Widget Area 2 -->
    <div class="col-md-3 mb-4 mb-md-0">
        <div class="footer-widget-area">
            <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
            <?php else : ?>
                <h5 class="widget-title"><?php esc_html_e('Quick Links', 'urbancartel'); ?></h5>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'list-unstyled',
                    'depth'          => 1,
                ));
                ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Widget Area 3 -->
    <div class="col-md-3 mb-4 mb-md-0">
        <div class="footer-widget-area">
            <?php if (is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
            <?php else : ?>
                <h5 class="widget-title"><?php esc_html_e('Contact Us', 'urbancartel'); ?></h5>
                <address class="mb-3">
                    <p class="mb-2">123 WordPress Street</p>
                    <p class="mb-2">City, State 12345</p>
                    <p class="mb-0"><a href="mailto:info@example.com">info@example.com</a></p>
                </address>
            <?php endif; ?>
        </div>
    </div>

    <!-- Widget Area 4 -->
    <div class="col-md-3 mb-4 mb-md-0">
        <div class="footer-widget-area">
            <?php if (is_active_sidebar('footer-4')) : ?>
                <?php dynamic_sidebar('footer-4'); ?>
            <?php else : ?>
                <h5 class="widget-title"><?php esc_html_e('Social Media', 'urbancartel'); ?></h5>
                <address class="mb-3">
                    <p class="mb-2">123 WordPress Street</p>
                    <p class="mb-2">City, State 12345</p>
                    <p class="mb-0"><a href="mailto:info@example.com">info@example.com</a></p>
                </address>
            <?php endif; ?>
        </div>
    </div>
</div>
    

        <!-- Copyright Bar -->
        <div class="row mt-4 pt-4 border-top">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0">
                    <?php
                    printf(
                        esc_html__('© %d %s. All rights reserved.', 'urbancartel'),
                        date('Y'),
                        get_bloginfo('name')
                    );
                    ?>
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <?php
                if (has_nav_menu('footer')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'list-inline mb-0',
                        'depth'          => 1,
                        'container'      => false,
                        'fallback_cb'    => false,
                    ));
                }
                ?>
            </div>
        </div>
    </div>
</footer>
