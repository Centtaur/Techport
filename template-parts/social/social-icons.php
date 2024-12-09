<?php
/**
 * Template part for displaying social icons
 *
 * @package UrbanCartel
 */

// Get social media URLs from customizer
$facebook_url = get_theme_mod('social_facebook', '');
$twitter_url = get_theme_mod('social_twitter', '');
$instagram_url = get_theme_mod('social_instagram', '');
$linkedin_url = get_theme_mod('social_linkedin', '');

// Only show icons if at least one social media URL is set
if ($facebook_url || $twitter_url || $instagram_url || $linkedin_url) : ?>
    <div class="social-icons">
        <ul class="list-inline mb-0">
            <?php if ($facebook_url) : ?>
                <li class="list-inline-item">
                    <a href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Facebook', 'urbancartel'); ?>">
                        <i class="bi bi-facebook"></i>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($twitter_url) : ?>
                <li class="list-inline-item">
                    <a href="<?php echo esc_url($twitter_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Twitter', 'urbancartel'); ?>">
                        <i class="bi bi-twitter"></i>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($instagram_url) : ?>
                <li class="list-inline-item">
                    <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Instagram', 'urbancartel'); ?>">
                        <i class="bi bi-instagram"></i>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($linkedin_url) : ?>
                <li class="list-inline-item">
                    <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('LinkedIn', 'urbancartel'); ?>">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>

<?php endif; ?>
