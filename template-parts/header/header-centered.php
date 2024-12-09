<?php require_once get_template_directory() . '/template-parts/header/header-base.php'; ?>
<header id="masthead" class="site-header header-centered">
    <div class="<?php echo esc_attr($container_class); ?>">
        <?php if ($header_layout === 'centered-logo'): ?>
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="header-centered-content text-center">
                        <?php get_template_part('template-parts/header/site', 'branding'); ?>
                    </div>
                </div>
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid justify-content-center">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCentered" aria-controls="navbarCentered" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'urbancartel'); ?>">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-center" id="navbarCentered">
                                <?php get_template_part('template-parts/header/site', 'navigation'); ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        <?php else: ?>
            <div class="row align-items-center">
                <?php if ($header_layout === 'logo-menu'): ?>
                    <div class="col-12 col-lg-auto text-center text-lg-start mb-3 mb-lg-0">
                        <?php get_template_part('template-parts/header/site', 'branding'); ?>
                    </div>
                    <div class="col-12 col-lg">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid justify-content-center justify-content-lg-end">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCentered" aria-controls="navbarCentered" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'urbancartel'); ?>">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-center justify-content-lg-end" id="navbarCentered">
                                    <?php get_template_part('template-parts/header/site', 'navigation'); ?>
                                </div>
                            </div>
                        </nav>
                    </div>
                <?php else: ?>
                    <div class="col-12 col-lg">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid justify-content-center justify-content-lg-start">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCentered" aria-controls="navbarCentered" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'urbancartel'); ?>">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-center justify-content-lg-start" id="navbarCentered">
                                    <?php get_template_part('template-parts/header/site', 'navigation'); ?>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-12 col-lg-auto text-center text-lg-start mb-3 mb-lg-0">
                        <?php get_template_part('template-parts/header/site', 'branding'); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</header>
