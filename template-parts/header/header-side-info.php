<?php

/**
 * Template part for displaying header side information
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package biddut
 */
// Logo Section 
$header_side_logo = get_theme_mod('header_side_logo', get_template_directory_uri() . '/assets/img/logo/white-logo.png');

//Offcanvas About Us
$offcanvas_about_us = get_theme_mod('header_top_offcanvas_textarea', __('Web designing in a powerful way of just not an only professions. We have tendency to believe the idea that smart looking .', 'biddut'));

// Contact US Section 
$header_side_contacts_text = get_theme_mod('header_side_contacts_label', __('CONTACT US', 'biddut'));
$header_side_contacts_address = get_theme_mod('header_side_contacts_address', __(' ', 'biddut'));
$header_side_contacts_address_url = get_theme_mod('header_side_contacts_address_url', __('https://www.google.com/maps/@36.0758266,-79.4558848,17z', 'biddut'));
$header_side_email_address = get_theme_mod('header_side_email_address', __('biddut@support.com', 'biddut'));
$header_mailchimp_shortcode = get_theme_mod('header_mailchimp_shortcode');



// Phone Number
$header_side_phone = get_theme_mod('header_side_phone', __('+8801310-069824', 'biddut'));

// Header Address Text
$header_top_address_text = get_theme_mod('header_address', __('734 H, Bryan Burlington, NC 27215', 'biddut'));

// Header Address Link
$header_top_address_link = get_theme_mod('header_address_link', __('https://www.google.com/maps/@36.0758266,-79.4558848,17z', 'biddut'));

// footer area links  switch
$header_side_info_switch = get_theme_mod('header_side_info_switch', false);




?>
<!-- tp-offcanvus-area-start -->
<div class="tpoffcanvas-area">
    <div class="tpoffcanvas">
        <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
        </div>
        <?php if ($header_side_logo) : ?>
            <div class="tpoffcanvas__logo">
                <a href="<?php echo esc_url(home_url('/')) ?>">
                    <img src="<?php echo esc_url($header_side_logo) ?>" alt="<?php echo esc_attr__('Side logo', 'biddut') ?>">
                </a>
            </div>
        <? endif; ?>
        <?php if ($header_side_info_switch) : ?>
            <div class="tpoffcanvas__title">
                <p><?php echo esc_html($offcanvas_about_us); ?></p>
            </div>
        <? endif; ?>

        <div class="tp-main-menu-mobile d-xl-none"></div>
        <?php if ($header_side_info_switch) : ?>
            <div class="tpoffcanvas__contact-info">
                <div class="tpoffcanvas__contact-title">
                    <h5><?php echo esc_html($header_side_contacts_text); ?></h5>
                </div>
                <ul>
                    <li>
                        <i class="fa-light fa-location-dot"></i>
                        <a href="https://www.google.com/maps/@23.8223586,90.3661283,15z" target="_blank"><?php echo esc_html($header_side_contacts_address); ?></a>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:solaredge@gmail.com"><?php echo esc_html($header_side_email_address); ?></a>
                    </li>
                    <li>
                        <i class="fal fa-phone-alt"></i>
                        <a href="tel:+<?php echo esc_html($header_side_phone); ?>">+<?php echo esc_html($header_side_phone); ?></a>
                    </li>
                </ul>
            </div>
            <?php if ($header_mailchimp_shortcode) : ?>
                <div class="tpoffcanvas__input">
                    <div class="tpoffcanvas__input-title">
                        <h4><?php echo esc_html('Get UPdate'); ?></h4>
                    </div>
                    <?php echo do_shortcode($header_mailchimp_shortcode); ?>
                </div>
            <?php else : ?>
                <p>
                    <?php echo esc_html('Please set your MailChimp shortcode!', 'biddut') ?>
                </p>
            <?php endif; ?>

            <div class="tpoffcanvas__social">
                <div class="social-icon">
                    <?php biddut_header_social_profiles(); ?>
                </div>
            </div>
        <? endif; ?>
    </div>
</div>
<div class="body-overlay"></div>
<!-- tp-offcanvus-area-end -->