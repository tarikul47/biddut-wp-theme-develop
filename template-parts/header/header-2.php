<?php

/**
 * Template part for displaying header layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package biddut
 */

// info
$biddut_topbar_switch = get_theme_mod('header_topbar_switch', false);


// Phone Number
$header_top_phone = get_theme_mod('header_phone', __('+8801310-069824', 'biddut'));

// contact button
$biddut_button_text = get_theme_mod('biddut_button_text', __('Make Request', 'biddut'));
$biddut_button_link = get_theme_mod('biddut_button_link', __('#', 'biddut'));

// acc button
$biddut_acc_button_text = get_theme_mod('biddut_acc_button_text', __('Login', 'biddut'));
$biddut_acc_button_link = get_theme_mod('biddut_acc_button_link', __('#', 'biddut'));

$biddut_sticky_logo = get_theme_mod('header_sticky_logo', get_template_directory_uri() . '/assets/img/logo/logo-white.png');
// Header Address Text
$header_top_address_text = get_theme_mod('header_address', __('734 H, Bryan Burlington, NC 27215', 'biddut'));
$header_address_link = get_theme_mod('header_address_link', __('#', 'biddut'));

// Button Text
$header_top_button_switch = get_theme_mod('header_top_button_switch', false);
$header_top_button_text = get_theme_mod('header_button_text', __('Donate Now', 'biddut'));

// Button Text
$header_top_button_link = get_theme_mod('header_button_link', __('#', 'biddut'));
// header right
$biddut_header_right = get_theme_mod('header_right_switch', false);
$biddut_menu_col = $biddut_header_right ? 'col-xl-7 col-lg-8 d-none d-lg-block' : 'col-xl-10 col-lg-8 d-none d-lg-block';
$biddut_menu_end = $biddut_header_right ? '' : 'justify-content-end';
// header search btn 
$header_search_switch = get_theme_mod('header_search_switch', false);

// header auth btn 
$header_auth_switch = get_theme_mod('header_auth_switch', false);
$header_auth_link = get_theme_mod('header_auth_link', "#");
?>



<header>
    <div class="tp-header-transparent">
        <!-- header top area start -->
        <div class="tp-header-top-area tp-header-top-wrap tp-header-top-space p-relative black-bg">
            <div class="container custom-container-1">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-8 col-md-8 col-sm-6">
                        <div class="tp-header-top-left-box text-center text-md-start">
                            <ul>
                                <li>
                                    <i class="flaticon-pin"></i>
                                    <a href="#">76 San Fransisco Street. New York</a>
                                </li>
                                <li class="d-none d-md-inline-block">
                                    <i class="flaticon-mail-1"></i>
                                    <a href="mailto:needhelp@company.com">needhelp@company.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 d-none d-sm-block">
                        <div class="tp-header-top-right-box text-end">
                            <ul>
                                <li>
                                    <div class="tp-header-top-right-text d-none d-xl-block">
                                        <a href="#">Help</a>
                                        <a href="#">Support</a>
                                        <a href="#">Comments</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="tp-header-top-right-social">
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top area end -->

        <!-- header area start -->
        <div id="header-sticky" class="tp-header-area tp-header-style-2">
            <div class="container custom-container-1">
                <div class="row align-items-center">
                    <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-6">
                        <div class="tp-header-logo">
                            <a href="index.html">
                                <img src="assets/img/logo/white-logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-6 d-none d-xl-block">
                        <div class="tp-header-main-menu text-end text-xxl-start">
                            <nav class="tp-main-menu-content">
                                <ul>
                                    <li class="has-dropdown">
                                        <a href="index.html">Home</a>
                                        <div class="tp-submenu submenu has-homemenu">
                                            <div class="row gx-6 row-cols-1 row-cols-md-2 row-cols-xl-5">
                                                <div class="col homemenu">
                                                    <div class="homemenu-thumb mb-15">
                                                        <img src="assets/img/menu/home-1.jpg" alt="">
                                                        <div class="homemenu-btn">
                                                            <a class="tp-menu-btn" href="index.html">Multi page</a>
                                                            <a class="tp-menu-btn" href="index-one-page.html">One Page</a>
                                                        </div>
                                                    </div>
                                                    <div class="homemenu-content text-center">
                                                        <h4 class="homemenu-title">
                                                            <a href="index.html">Home 01</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="col homemenu">
                                                    <div class="homemenu-thumb mb-15">
                                                        <img src="assets/img/menu/home-2.jpg" alt="">
                                                        <div class="homemenu-btn">
                                                            <a class="tp-menu-btn" href="index-2.html">Multi page</a>
                                                            <a class="tp-menu-btn" href="index-2-one-page.html">One Page</a>
                                                        </div>
                                                    </div>
                                                    <div class="homemenu-content text-center">
                                                        <h4 class="homemenu-title">
                                                            <a href="index-2.html">Home 02</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="col homemenu">
                                                    <div class="homemenu-thumb mb-15">
                                                        <img src="assets/img/menu/home-3.jpg" alt="">
                                                        <div class="homemenu-btn">
                                                            <a class="tp-menu-btn" href="index-3.html">Multi page</a>
                                                            <a class="tp-menu-btn" href="index-3-one-page.html">One Page</a>
                                                        </div>
                                                    </div>
                                                    <div class="homemenu-content text-center">
                                                        <h4 class="homemenu-title">
                                                            <a href="index-3.html">Home 03</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="col homemenu">
                                                    <div class="homemenu-thumb mb-15">
                                                        <img src="assets/img/menu/home-4.jpg" alt="">
                                                        <div class="homemenu-btn">
                                                            <a class="tp-menu-btn" href="index-4.html">Multi page</a>
                                                            <a class="tp-menu-btn" href="index-4-one-page.html">One Page</a>
                                                        </div>
                                                    </div>
                                                    <div class="homemenu-content text-center">
                                                        <h4 class="homemenu-title">
                                                            <a href="index-4.html">Home 04</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="col homemenu">
                                                    <div class="homemenu-thumb mb-15">
                                                        <img src="assets/img/menu/home-5.jpg" alt="">
                                                        <div class="homemenu-btn">
                                                            <a class="tp-menu-btn" href="index-5.html">View page</a>
                                                        </div>
                                                    </div>
                                                    <div class="homemenu-content text-center">
                                                        <h4 class="homemenu-title">
                                                            <a href="index-5.html">Home Page Dark</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="#">Pages</a>
                                        <ul class="submenu tp-submenu">
                                            <li><a href="about-us.html">about us</a></li>
                                            <li><a href="team.html">team</a></li>
                                            <li><a href="team-details.html">team details</a></li>
                                            <li><a href="testimonial.html">testimonial</a></li>
                                            <li><a href="cart.html">cart</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="price.html">price</a></li>
                                            <li><a href="faq.html">faq</a></li>
                                            <li><a href="error.html">error</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="service.html">Service</a>
                                        <ul class="submenu tp-submenu">
                                            <li><a href="service.html">service</a></li>
                                            <li><a href="service-details.html">service details</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="project.html">Project</a>
                                        <ul class="submenu tp-submenu">
                                            <li><a href="project.html">project</a></li>
                                            <li><a href="project-details.html">project details</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="shop.html">Shop</a>
                                        <ul class="submenu tp-submenu">
                                            <li><a href="shop.html">shop</a></li>
                                            <li><a href="shop-details.html">shop details</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="blog.html">Blog</a>
                                        <ul class="submenu tp-submenu">
                                            <li><a href="blog.html">blog standard</a></li>
                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-4 col-lg-8 col-md-8 col-6">
                        <div class="tp-header-right-box">
                            <div class="tp-header-right-action d-flex align-items-center justify-content-end">
                                <div class="tp-header-right-icon-action d-none d-lg-block">
                                    <div class="tp-header-right-icon d-flex align-items-center">
                                        <button class="search-open-btn"><i class="flaticon-loupe"></i></button>
                                        <div class="tp-header-right-shop p-relative">
                                            <a href="cart.html">
                                                <i class="fa-light fa-bag-shopping"></i>
                                                <span>2</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tp-header-right-btn d-none d-md-block">
                                    <a class="tp-btn hover-2" href="contact.html"><span>MAKE APPOINMENT</span></a>
                                </div>
                                <div class="tp-header-right-tel-box d-none d-xxl-block">
                                    <div class="tp-header-right-tel-icon d-flex align-items-center">
                                        <i class="flaticon-phone-call"></i>
                                        <div class="tp-header-right-tel-content">
                                            <span>Talk to an expert </span>
                                            <a href="tel:+997868765"><span>Free</span> +99 (786) 8765</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tp-header-bar d-xl-none">
                                    <button class="tp-menu-bar"><i class="fa-sharp fa-regular fa-bars-staggered"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
    </div>
</header>
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix" data-background="assets/img/breadcurmb/breadcurmb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content z-index d-flex justify-content-between align-items-end">
                        <div class="breadcrumb__section-title-box">
                            <h4 class="breadcrumb__subtitle">BIDDUT ELCETRIC SERVICE</h4>
                            <h3 class="breadcrumb__title">About us</h3>
                        </div>
                        <div class="breadcrumb__list">
                            <span><a href="index.html">Home</a></span>
                            <span class="dvdr"><i>/</i></span>
                            <span>About us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <?php get_template_part('template-parts/header/header-side-info'); ?>