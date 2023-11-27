<?php

// shop page hooks
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// content-product hooks--
// action remove
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

//single hook remove
remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing',50);


// compare_false
add_filter( 'woosc_button_position_archive', '__return_false' );
add_filter( 'woosc_button_position_single', '__return_false' );

// wishlist false
add_filter( 'woosw_button_position_archive', '__return_false' );
add_filter( 'woosw_button_position_single', '__return_false' );


// product-content single
if( !function_exists('biddut_content_single_details') ) {
    function biddut_content_single_details( ) {
        global $product;
        global $post;
        global $woocommerce;
        $rating = wc_get_rating_html($product->get_average_rating());
        $ratingcount = $product->get_review_count();
        $regularPrice = $product->get_regular_price();

        $attachment_ids = $product->get_gallery_image_ids();

        foreach( $attachment_ids as $attachment_id ) {
            $image_link = wp_get_attachment_url( $attachment_id );
        }

        $categories = get_the_terms( $post->ID, 'product_cat' );
        $stock = $product->is_in_stock();
        $stock_quantify = $product->get_stock_quantity();

    ?>

    <div class="tp-shop-details__right-warp">
        <h3 class="tp-shop-details__title-sm"><?php the_title(); ?></h3>
        <div class="tp-shop-details__price">
            <?php woocommerce_template_single_price(); ?>
        </div>

        <?php if(!empty($rating)) : ?>
            <div class="tp-shop-details__ratting d-flex">
                <?php echo wp_kses_post($rating); ?>
                <span class="review-text">( <?php echo esc_html($ratingcount); ?> <?php echo esc_html__('customer ', 'biddut'); echo esc_html($ratingcount) <= 1 ? 'review' : 'reviews'; ?> )</span>
            </div>
            <?php else : ?>
            <div class="tp-shop-details__ratting">
                <span><i class="fal fa-star"></i></span>
                <span><i class="fal fa-star"></i></span>
                <span><i class="fal fa-star"></i></span>
                <span><i class="fal fa-star"></i></span>
                <span><i class="fal fa-star"></i></span>
                <span>( <?php echo esc_html($ratingcount); ?> <?php echo esc_html__('customer ', 'biddut'); echo esc_html($ratingcount) <= 1 ? 'review' : 'reviews'; ?> )</span>
            </div>
        <?php endif; ?> 

        <?php if(!empty(woocommerce_template_single_excerpt())) :?>
        <div class="tp-shop-details__text">
            <p><?php woocommerce_template_single_excerpt(); ?></p>
        </div>
        <?php endif; ?>  

        <div class="tp-shop-details__quantity-wrap">

            <?php woocommerce_template_single_add_to_cart(); ?>

            
            <?php woocommerce_template_single_meta(); ?>
        </div>
    </div>


<?php
    }
}
add_action( 'woocommerce_single_product_summary', 'biddut_content_single_details', 4 );



/*************************************************
## Free shipping progress bar.
*************************************************/
function biddut_shipping_progress_bar() {
        
        $total           = WC()->cart->get_displayed_subtotal();
        $limit           = get_theme_mod( 'shipping_progress_bar_amount' );
        $percent         = 100;


        if ( $total < $limit ) {
            $percent = floor( ( $total / $limit ) * 100 );
            $message = str_replace( '[remainder]', wc_price( $limit - $total ), get_theme_mod( 'shipping_progress_bar_message_initial') );
        } else {
            $message = get_theme_mod( 'shipping_progress_bar_message_success' );
        }
        
    ?>

<div class="tp-free-progress-bar">
    <div class="free-shipping-notice">
        <?php echo wp_kses( $message, 'post' ); ?>
    </div>
    <div class="tp-progress-bar">
        <span class="progress progress-bar progress-bar-striped progress-bar-animated"
            data-width="<?php echo esc_attr( $percent ); ?>%"></span>
    </div>
</div>

<?php
}
    
if(get_theme_mod( 'shipping_progress_bar_location_card_page',0) == '1'){
    add_action( 'woocommerce_before_cart_table',  'biddut_shipping_progress_bar' );
}

if(get_theme_mod( 'shipping_progress_bar_location_mini_cart',0) == '1'){
    add_action( 'woocommerce_before_mini_cart_contents', 'biddut_shipping_progress_bar' );
}

if(get_theme_mod( 'shipping_progress_bar_location_checkout',0) == '1'){
    add_action( 'woocommerce_checkout_before_customer_details', 'biddut_shipping_progress_bar' );
}


/*************************************************
## sale percentage
*************************************************/

function biddut_sale_percentage(){
   global $product;
   $output = '';

   if ( $product->is_on_sale() && $product->is_type( 'variable' ) ) {
      $percentage = ceil(100 - ($product->get_variation_sale_price() / $product->get_variation_regular_price( 'min' )) * 100);
      $output .= '<span class="product__details-offer">-'.$percentage.'%</span>';
   } elseif( $product->is_on_sale() && $product->get_regular_price()  && !$product->is_type( 'grouped' )) {
      $percentage = ceil(100 - ($product->get_sale_price() / $product->get_regular_price()) * 100);
      $output .= '<span class="product__details-offer">-'.$percentage.'%</span>';
   }
   return $output;
}


// woocommerce mini cart content
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    ob_start();
    ?>
<div class="mini_shopping_cart_box">
    <?php woocommerce_mini_cart(); ?>
</div>
<?php $fragments['.mini_shopping_cart_box'] = ob_get_clean();
    return $fragments;
});

// woocommerce mini cart count icon
if ( ! function_exists( 'biddut_header_add_to_cart_fragment' ) ) {
    function biddut_header_add_to_cart_fragment( $fragments ) {
        ob_start();
        ?>
<span class="cart__count tp-cart-item">
    <?php echo esc_html( WC()->cart->cart_contents_count ); ?>
</span>
<?php
        $fragments['.tp-cart-item'] = ob_get_clean();

        return $fragments;
    }
}
add_filter( 'woocommerce_add_to_cart_fragments', 'biddut_header_add_to_cart_fragment' );


// product-content archive
if( !function_exists('biddut_content_product_grid') ) {
    function biddut_content_product_grid( ) {
    global $product;
    global $post;
    global $woocommerce;
    $rating = wc_get_rating_html($product->get_average_rating());
    $ratingcount = $product->get_review_count();
    $terms = get_the_terms(get_the_ID(), 'product_cat');
    $attachment_ids = $product->get_gallery_image_ids();

    foreach( $attachment_ids as $key => $attachment_id ) {
        $image_link =  wp_get_attachment_url( $attachment_id );
        $arr[] = $image_link;
    }
    
?>

<div class="col mb-30">
    <div class="tp-product__item text-center product-item-action">

        <?php if(!empty(has_post_thumbnail())) : ?>
        <div class="tp-product__thumb">
            <?php the_post_thumbnail(); ?>
            <?php if( $product->is_on_sale()) : ?>
            <div class="tp-product__thumb-text">
                <?php woocommerce_show_product_loop_sale_flash($post->ID); ?>
            </div>
            <?php endif; ?>
            <div class="tp-product__icon">

                <?php woocommerce_template_loop_add_to_cart();?>
                <!-- <a href="shop-details.html"><i class="fal fa-shopping-basket"></i></a> -->

                <a href="shop-details.html"><i class="fal fa-heart"></i></a>
            </div>
        </div>
        <?php endif; ?>

        <div class="tp-product__content d-flex align-items-end justify-content-between">
            <div class="tp-product__content-text">

                <?php if(!empty($rating)) : ?>
                <div class="tp-product__star mb-10">
                    <?php echo wp_kses_post($rating); ?>
                </div>
                <?php else : ?>
                <div class="tp-product__star mb-10">
                    <i class="fal fa-star"></i>
                    <i class="fal fa-star"></i>
                    <i class="fal fa-star"></i>
                    <i class="fal fa-star"></i>
                    <i class="fal fa-star"></i>
                </div>
                <?php endif; ?>

                <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                <?php echo woocommerce_template_loop_price();?>
            </div>
        </div>
    </div>
</div>

<div class="col d-none">
    <div class="product__item p-relative transition-3 mb-50 product-item-action">
        <?php if(!empty(has_post_thumbnail())) : ?>
        <div class="product__thumb w-img p-relative fix">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>

            <?php if( $product->is_on_sale()) : ?>
            <div class="product__badge d-flex flex-column flex-wrap">
                <?php woocommerce_show_product_loop_sale_flash($post->ID); ?>
            </div>
            <?php endif; ?>

            <div class="product__action d-flex flex-column flex-wrap">

                <?php if( function_exists( 'woosw_init' )) : ?>
                <div class="product-action-btn product-add-wishlist-btn p-relative">
                    <?php echo do_shortcode('[woosw]'); ?>
                    <span class="product-action-tooltip"><?php echo esc_html__('Add To Wishlist','biddut'); ?></span>
                </div>
                <?php endif; ?>

                <?php if( class_exists( 'WPCleverWoosq' )) : ?>
                <div class="product-action-btn p-relative">
                    <?php echo do_shortcode('[woosq]'); ?> 
                    <span class="product-action-tooltip"><?php echo esc_html__('Quick view','biddut'); ?></span>
                </div>
                <?php endif; ?>

                <?php if( function_exists( 'woosc_init' )) : ?>
                <div class="product-action-btn p-relative">
                    <?php echo do_shortcode('[woosc]');?>                                       
                    <span class="product-action-tooltip"> <?php echo esc_html__('Add To Compare','biddut'); ?></span>
                </div>
                <?php endif; ?>

            </div>

            <div class="product__add transition-3">
                <?php woocommerce_template_loop_add_to_cart();?>   
            </div>
            
        </div>
        <?php endif; ?>

        <div class="product__content">

            <?php if(!empty($rating)) : ?>
            <div class="product__rating d-flex mb-10 mt-5">
                <?php echo wp_kses_post($rating); ?>
            </div>
            <?php else : ?>
            <div class="product__rating d-flex">
                <span>
                    <i class="fal fa-star"></i>
                </span>
                <span>
                    <i class="fal fa-star"></i>
                </span>
                <span>
                    <i class="fal fa-star"></i>
                </span>
                <span>
                    <i class="fal fa-star"></i>
                </span>
                <span>
                    <i class="fal fa-star"></i>
                </span>
            </div>
            <?php endif; ?>
            <h3 class="product__title">
                <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
            </h3>
            <div class="product__price">
                <span class="product__ammount">
            <?php echo woocommerce_template_loop_price();?></span>
            </div>
        </div>
    </div>
</div>

<?php
    }
}
add_action( 'woocommerce_before_shop_loop_item', 'biddut_content_product_grid', 10 );


// smart quickview
add_filter( 'woosq_button_html', 'biddut_woosq_button_html', 10, 2 );
function biddut_woosq_button_html( $output , $prodid ) {
    return $output = '<a href="#" class="icon-btn woosq-btn woosq-btn-' . esc_attr( $prodid ) . ' ' . get_option( 'woosq_button_class' ) . '" data-id="' . esc_attr( $prodid ) . '" data-effect="mfp-3d-unfold"><svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
   <path d="M9.49943 5.34978C8.23592 5.34978 7.20896 6.37595 7.20896 7.63732C7.20896 8.89774 8.23592 9.92296 9.49943 9.92296C10.7629 9.92296 11.7908 8.89774 11.7908 7.63732C11.7908 6.37595 10.7629 5.34978 9.49943 5.34978M9.49941 11.3456C7.45025 11.3456 5.78394 9.68213 5.78394 7.63738C5.78394 5.59169 7.45025 3.92725 9.49941 3.92725C11.5486 3.92725 13.2158 5.59169 13.2158 7.63738C13.2158 9.68213 11.5486 11.3456 9.49941 11.3456" fill="currentColor"/>
   
   <path d="M1.49145 7.63683C3.25846 11.5338 6.23484 13.8507 9.50001 13.8517C12.7652 13.8507 15.7416 11.5338 17.5086 7.63683C15.7416 3.7408 12.7652 1.42386 9.50001 1.42291C6.23579 1.42386 3.25846 3.7408 1.49145 7.63683V7.63683ZM9.50173 15.2742H9.49793H9.49698C5.56775 15.2714 2.03943 12.5219 0.0577129 7.91746C-0.0192376 7.73822 -0.0192376 7.53526 0.0577129 7.35601C2.03943 2.75248 5.5687 0.00306822 9.49698 0.000223018C9.49888 -0.000725381 9.49888 -0.000725381 9.49983 0.000223018C9.50173 -0.000725381 9.50173 -0.000725381 9.50268 0.000223018C13.4319 0.00306822 16.9602 2.75248 18.942 7.35601C19.0199 7.53526 19.0199 7.73822 18.942 7.91746C16.9612 12.5219 13.4319 15.2714 9.50268 15.2742H9.50173Z" fill="currentColor"/>

   </svg></a>';
}


// product add to cart button
function woocommerce_template_loop_add_to_cart( $args = array() ) {
    global $product;

    $stock = $product->is_in_stock();

    $stock_class = $stock ? 'stock-available' : 'stock-out';

    $price = $product->get_regular_price();

    $price_class = $price ? NULL : 'price-empty';

        if ( $product ) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'cart-button icon-btn button product-action product-action-1 '.$stock_class.' '.$price_class,
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = wp_parse_args( $args, $defaults );

            if ( isset( $args['attributes']['aria-label'] ) ) {
                $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
            }
        }


         // check product type 
         if( $product->is_type( 'simple' ) ){
            $btntext = esc_html__("Add to Cart",'biddut');
         } elseif( $product->is_type( 'variable' ) ){
            $btntext = esc_html__("Select Options",'biddut');
         } elseif( $product->is_type( 'external' ) ){
            $btntext = esc_html__("Buy Now",'biddut');
         } elseif( $product->is_type( 'grouped' ) ){
            $btntext = esc_html__("View Products",'biddut');
         }
         else{
            $btntext = "Add to Cart";
         } 

        echo sprintf( '<a href="%s" data-quantity="%s" class="%s product-action-btn tp-product-add-cart-btn" %s>%s</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'cart-button icon-btn button product-action product-action-1 '.$stock_class ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            '<i class="fal fa-shopping-basket"></i>'
        );
}


add_action( 'wp_footer' , 'custom_quantity_fields_script' );

// custom_quantity_fields_script
function custom_quantity_fields_script(){
    ?>
<script type='text/javascript'>
jQuery(function($) {
    if (!String.prototype.getDecimals) {
        String.prototype.getDecimals = function() {
            var num = this,
                match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
            if (!match) {
                return 0;
            }
            return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
        }
    }
    // Quantity "plus" and "minus" buttons
    $(document.body).on('click', '.plus, .minus', function() {
        var $qty = $(this).closest('.quantity').find('.qty'),
            currentVal = parseFloat($qty.val()),
            max = parseFloat($qty.attr('max')),
            min = parseFloat($qty.attr('min')),
            step = $qty.attr('step');

        // Format values
        if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
        if (max === '' || max === 'NaN') max = '';
        if (min === '' || min === 'NaN') min = 0;
        if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

        // Change the value
        if ($(this).is('.plus')) {
            if (max && (currentVal >= max)) {
                $qty.val(max);
            } else {
                $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
            }
        } else {
            if (min && (currentVal <= min)) {
                $qty.val(min);
            } else if (currentVal > 0) {
                $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
            }
        }

        // Trigger change event
        $qty.trigger('change');
    });
});
</script>
<?php
}


// woocommerce_breadcrumb modilfy
if ( ! function_exists( 'woocommerce_breadcrumb' ) ) {

    /**
     * Output the WooCommerce Breadcrumb.
     *
     * @param array $args Arguments.
     */
    function woocommerce_breadcrumb( $args = array() ) {
        $args = wp_parse_args(
            $args,
            apply_filters(
                'woocommerce_breadcrumb_defaults',
                array(
                    'delimiter'   => '&nbsp;&#47;&nbsp;',
                    'wrap_before' => '<nav class="woocommerce-breadcrumb">',
                    'wrap_after'  => '</nav>',
                    'before'      => '',
                    'after'       => '',
                    'home'        => _x( 'Home', 'breadcrumb', 'biddut' ),
                )
            )
        );

        $breadcrumbs = new WC_Breadcrumb();

        if ( ! empty( $args['home'] ) ) {
            $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
        }

        $args['breadcrumb'] = $breadcrumbs->generate();

        /**
         * WooCommerce Breadcrumb hook
         *
         * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
         */
        do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

        wc_get_template( 'global/breadcrumb.php', $args );
    }
}

/*************************************************
## biddut Woo Search Form
*************************************************/ 

add_filter( 'get_product_search_form' , 'biddut_custom_product_searchform' );

function biddut_custom_product_searchform( $form ) {

	$form = '<div class="search-form p-relative">
                <form action="' . esc_url( home_url( '/shop'  ) ) . '" role="search" method="get" id="searchform">
                <input type="search" value="' . get_search_query() . '" name="s" placeholder="'.esc_attr__('Search Product','biddut').'" autocomplete="off">
                <button type="submit"><i class="fa-regular fa-arrow-right-long"></i></button> 
                </form>
            </div>';

	return $form;
}