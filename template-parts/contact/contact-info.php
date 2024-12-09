<?php
/**
 * Template part for displaying contact information
 *
 * @package UrbanCartel
 */

$phone = get_theme_mod('contact_phone', '');
$email = get_theme_mod('contact_email', '');
$address = get_theme_mod('contact_address', '');
$hours = get_theme_mod('contact_hours', '');

// Get current template part context
$context = get_query_var('contact_context', 'default');

// Only show if at least one contact method is set
if ($phone || $email || $address || $hours) : ?>
    <div class="contact-info">
        <ul class="list-inline mb-0">
            <?php if ($phone) : ?>
                <li class="list-inline-item">
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="contact-link">
                        <i class="bi bi-telephone-fill"></i>
                        <?php if ($context !== 'topbar') : ?>
                            <span class="contact-label"><?php esc_html_e('Call us:', 'urbancartel'); ?></span>
                        <?php endif; ?>
                        <span class="contact-text"><?php echo esc_html($phone); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($email) : ?>
                <li class="list-inline-item">
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="contact-link">
                        <i class="bi bi-envelope-fill"></i>
                        <?php if ($context !== 'topbar') : ?>
                            <span class="contact-label"><?php esc_html_e('Email:', 'urbancartel'); ?></span>
                        <?php endif; ?>
                        <span class="contact-text"><?php echo esc_html($email); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($address && $context !== 'topbar') : ?>
                <li class="list-inline-item">
                    <div class="contact-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span class="contact-label"><?php esc_html_e('Address:', 'urbancartel'); ?></span>
                        <span class="contact-text"><?php echo esc_html($address); ?></span>
                    </div>
                </li>
            <?php endif; ?>

            <?php if ($hours && $context !== 'topbar') : ?>
                <li class="list-inline-item">
                    <div class="contact-item">
                        <i class="bi bi-clock-fill"></i>
                        <span class="contact-label"><?php esc_html_e('Hours:', 'urbancartel'); ?></span>
                        <span class="contact-text"><?php echo esc_html($hours); ?></span>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </div>

<?php endif; ?>
