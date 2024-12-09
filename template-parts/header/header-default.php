<?php require_once get_template_directory() . '/template-parts/header/header-base.php'; ?>
<header id="masthead" class="site-header header-default">
    <div class="<?php echo esc_attr($container_class); ?>">
        <?php if ($header_layout === 'centered-logo'): ?>
            <div class="row align-items-center">
                <div class="col-12 text-center mb-3">
                    <?php get_template_part('template-parts/header/site', 'branding'); ?>
                </div>
                <div class="col-12 text-center">
                    <nav class="navbar navbar-expand-lg">
                        <?php get_template_part('template-parts/header/site', 'navigation'); ?>
                    </nav>
                </div>
            </div>
        <?php else: ?>
            <div class="row align-items-center">
                <?php if ($header_layout === 'logo-menu'): ?>
                    <div class="col-auto <?php echo esc_attr($logo_class); ?>">
                        <?php get_template_part('template-parts/header/site', 'branding'); ?>
                    </div>
                    <div class="col <?php echo esc_attr($menu_class); ?>">
                        <nav class="navbar navbar-expand-lg">
                            <?php get_template_part('template-parts/header/site', 'navigation'); ?>
                        </nav>
                    </div>
                <?php else: ?>
                    <div class="col <?php echo esc_attr($menu_class); ?>">
                        <nav class="navbar navbar-expand-lg">
                            <?php get_template_part('template-parts/header/site', 'navigation'); ?>
                        </nav>
                    </div>
                    <div class="col-auto <?php echo esc_attr($logo_class); ?>">
                        <?php get_template_part('template-parts/header/site', 'branding'); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</header>
