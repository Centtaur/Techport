<footer id="colophon" class="site-footer footer-default">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-6">
                <div class="site-info">
                    <?php
                    printf(
                        esc_html__('© %d %s. All rights reserved.', 'custom-bootstrap-theme'),
                        date('Y'),
                        get_bloginfo('name')
                    );
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu list-inline text-md-end',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'depth'          => 1,
                ));
                ?>
            </div>
        </div>
    </div>
</footer>
