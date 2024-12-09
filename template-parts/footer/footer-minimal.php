<footer id="colophon" class="site-footer footer-minimal py-3 bg-dark text-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0 small">
                    <?php
                    printf(
                        esc_html__('© %d %s', 'urbancartel'),
                        date('Y'),
                        get_bloginfo('name')
                    );
                    ?>
                </p>
            </div>
            <div class="col-md-6">
                <div class="social-icons text-center text-md-end">
                    <?php
                    // Get social media links from customizer
                    $social_links = array(
                        'facebook' => get_theme_mod('social_facebook'),
                        'twitter' => get_theme_mod('social_twitter'),
                        'instagram' => get_theme_mod('social_instagram'),
                        'linkedin' => get_theme_mod('social_linkedin')
                    );

                    foreach ($social_links as $platform => $url) {
                        if (!empty($url)) {
                            printf(
                                '<a href="%s" class="social-icon mx-2" target="_blank" rel="noopener noreferrer"><i class="bi bi-%s"></i></a>',
                                esc_url($url),
                                esc_attr($platform)
                            );
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>
