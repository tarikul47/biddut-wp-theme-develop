<?php

/**
 * Template part for displaying header layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package biddut
 */

// info
$header_topbar_switch = get_theme_mod('header_topbar_switch', false);

// Header Address Text
$header_top_address_text = get_theme_mod('header_address', __('734 H, Bryan Burlington, NC 27215', 'biddut'));

// Header Address Link
$header_top_address_link = get_theme_mod('header_address_link', __('#', 'biddut'));

// Email id 
$header_top_email = get_theme_mod('header_email', __('biddut@support.com', 'biddut'));

// header right
$biddut_header_right = get_theme_mod('header_right_switch', false);
$biddut_menu_col = $biddut_header_right ? 'col-xl-8 d-none d-xl-block' : 'col-xl-10 d-none d-xl-block';
$biddut_menu_end = $biddut_header_right ? 'text-xxl-start' : 'text-xxl-end menu-border-none';


// Phone Number
$header_top_phone = get_theme_mod('header_phone', __('8801310-069824', 'biddut'));
$phone_number_url = preg_replace("/[^0-9]/", "", $header_top_phone);

// Header charity Text
$header_top_charity_text = get_theme_mod('header_top_charity_text', __('Connect with our charity', 'biddut'));

// Button Text
$header_top_button_switch = get_theme_mod('header_top_button_switch', false);
$header_top_button_text = get_theme_mod('header_button_text', __('Make APPOINTMENT', 'biddut'));

// Button Text
$header_top_button_link = get_theme_mod('header_button_link', __('#', 'biddut'));

$header_top_menus = get_theme_mod('header_top_menu');


// header search btn 
$header_search_switch = get_theme_mod('header_search_switch', false);

?>
<header>
    <div class="tp-header-transparent">
        <?php if ($header_topbar_switch) : ?>
            <!-- header top area start -->
            <div class="tp-header-top-area tp-header-top-wrap tp-header-top-space p-relative black-bg">
                <div class="container custom-container-1">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-8 col-md-8 col-sm-6">
                            <div class="tp-header-top-left-box text-center text-md-start">
                                <ul>
                                    <?php if ($header_top_address_text) : ?>
                                        <li>
                                            <i class="flaticon-pin"></i>
                                            <a href="<?php echo esc_url($header_top_address_link); ?>"><?php echo esc_html($header_top_address_text); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($header_top_email) : ?>
                                        <li class="d-none d-md-inline-block">
                                            <i class="flaticon-mail-1"></i>
                                            <a href="mailto:<?php echo esc_html($header_top_email); ?>"><?php echo esc_html($header_top_email); ?></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 d-none d-sm-block">
                            <div class="tp-header-top-right-box text-end">
                                <ul>
                                    <li>
                                        <div class="tp-header-top-right-text d-none d-xl-block">
                                            <?php echo biddut_kses($header_top_menus); ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tp-header-top-right-social">
                                            <?php biddut_header_social_profiles() ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top area end -->
        <?php endif; ?>
        <!-- header area start -->
        <div id="header-sticky" class="tp-header-area tp-header-style-2">
            <div class="container custom-container-1">
                <div class="row align-items-center">
                    <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-6">
                        <div class="tp-header-logo">
                            <?php biddut_header_logo(); ?>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-6 d-none d-xl-block">
                        <div class="tp-header-main-menu text-end text-xxl-start">
                            <nav class="tp-main-menu-content">
                                <?php biddut_header_menu(); ?>
                            </nav>
                        </div>
                    </div>
                    <?php if (!empty($biddut_header_right)) : ?>
                        <div class="col-xxl-5 col-xl-4 col-lg-8 col-md-8 col-6">
                            <div class="tp-header-right-box">
                                <div class="tp-header-right-action d-flex align-items-center justify-content-end">
                                    <div class="tp-header-right-icon-action d-none d-lg-block">
                                        <div class="tp-header-right-icon d-flex align-items-center">
                                            <?php if (!empty($header_search_switch)) : ?>
                                                <button class="search-open-btn"><i class="flaticon-loupe"></i></button>
                                            <?php endif; ?>
                                            <div class="tp-header-right-shop p-relative">
                                                <a href="cart.html">
                                                    <i class="fa-light fa-bag-shopping"></i>
                                                    <span>2</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tp-header-right-btn d-none d-md-block">
                                        <a class="tp-btn hover-2" href="<?php echo esc_url($header_top_button_link); ?>"><span><?php echo esc_html($header_top_button_text); ?></span></a>
                                    </div>
                                    <?php if (!empty($header_top_phone)) : ?>
                                        <div class="tp-header-right-tel-box d-none d-xxl-block">
                                            <div class="tp-header-right-tel-icon d-flex align-items-center">
                                                <i class="flaticon-phone-call"></i>
                                                <div class="tp-header-right-tel-content">
                                                    <span><?php echo esc_html__('Talk to an expert', 'biddut'); ?></span>
                                                    <a href="tel:<?php echo esc_html($phone_number_url); ?>"><span><?php echo esc_html__('Free', 'biddut'); ?></span> +<?php echo esc_html($header_top_phone); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="tp-header-bar d-xl-none">
                                        <button class="tp-menu-bar"><i class="fa-sharp fa-regular fa-bars-staggered"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
        <!-- header area end -->
    </div>
</header>
<main>
    <?php get_template_part('template-parts/header/header-side-info'); ?>