<?php
add_action( 'init', 'remove_default_loop_rating' );

function remove_default_loop_rating() {
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
}

//AJAX for updating cart totals
add_action('wp_ajax_update_cart_count', 'update_cart_count_ajax');
add_action('wp_ajax_nopriv_update_cart_count', 'update_cart_count_ajax');

function update_cart_count_ajax() {
    echo WC()->cart->get_cart_contents_count();
    wp_die();
}


//remove default WooCommerce star rating
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
//custom hook for star rating
function my_theme_stars_rating() {
    global $product;
    $rating = $product->get_average_rating();
    $width = ($rating / 5) * 100;

    echo "<div class='my-custom-rating'><div class='fill' style='width:" . $width . "%'></div></div>";
}
add_action('woocommerce_single_product_summary', 'my_theme_stars_rating', 5);

//remove default WooCommerce rating
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_rating', 15 );
//adding custom rating in place of the default rating
add_action( 'woocommerce_shop_loop_item_title', 'replace_default_rating_with_custom', 10 );
function replace_default_rating_with_custom() {
    global $product;
    $custom_rating_html = my_theme_stars_rating();
    echo '<div class="custom-product-rating">' . $custom_rating_html . '</div>';
}



//Free shipping is applied automatically when the order amount exceeds the free shipping amount that is set up in WC settings
add_action('woocommerce_cart_calculate_fees', 'apply_free_shipping_based_on_order_amount');
function apply_free_shipping_based_on_order_amount() {
    $free_shipping_settings = get_option('woocommerce_free_shipping_1_settings');
    if (isset($free_shipping_settings['min_amount'])) {
        $minimum_amount_for_free_shipping = floatval($free_shipping_settings['min_amount']);

        if (WC()->cart->subtotal >= $minimum_amount_for_free_shipping) {
            foreach (WC()->shipping()->get_shipping_methods() as $shipping_method_id => $shipping_method) {
                if ($shipping_method_id !== 'free_shipping') {
                    unset(WC()->session->chosen_shipping_methods[$shipping_method_id]);
                    unset(WC()->session->chosen_shipping_methods);
                    WC()->cart->calculate_shipping();
                }
            }
        }
    }
}


// ------------     CART HOOKS         -------------------- //
add_action('woocommerce_cart_totals_before_order_total', 'add_custom_inputs_above_subtotal');

function add_custom_inputs_above_subtotal() {
    ?>
    <div class="custom-inputs">
        <div class="discount-code">
            <p>ADD A DISCOUNT CODE</p>
            <input type="text" name="discount_code">
            <button>ADD</button>
        </div>

        <div class="login-offers">
            <p>Log in to use your member offers.</p>
            <button class="log-in-btn">LOG IN</button>
        </div>
    </div>
    <?php
}

//trying to remove the coupon code form
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

//changing the proceed to checkout text on the button to Continue to checkout
add_filter( 'woocommerce_cart_totals_after_order_total', 'change_checkout_button_text' );
function change_checkout_button_text( $cart_totals ) {
    if ( is_cart() ) {
        echo '<script>jQuery(document).ready(function($) { $("a.checkout-button").text("Continue to Checkout"); });</script>';
    }
}

add_filter( 'gettext', 'change_subtotal_text', 20, 3 );
function change_subtotal_text( $translated_text, $text ) {
    if ( $text === 'Subtotal' ) {
        $translated_text = 'Order value';
    }
    return $translated_text;
}






//dsplay mini version of product photo after short description in cart
add_action('woocommerce_before_add_to_cart_form', 'display_mini_product_photo');

function display_mini_product_photo() {
    global $product;
     $thumbnail = $product->get_image(array(52, 72));
    echo '<div class="mini-product-photo">' . $thumbnail . '</div>';

    echo '<div class="available-in-stores"> <img src="' . get_template_directory_uri() . '/resources/images/pin.svg" ><span class"available-text"> Not available in stores</span></div>';
  
}

add_filter('woocommerce_product_single_add_to_cart_text', 'change_add_to_cart_button_text');

function change_add_to_cart_button_text($text) {
    return __('Add to Shopping Bag', 'woocommerce');
}




//RELATED PRODUCTS MODIFICATION
//add custom related products section
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

function custom_related_products_section() {
    echo '<div class="custom-related-products">';
    echo '<h2>Products you may like</h2>';
    echo '<div class="related-products-wrapper">';
    echo '<div class="related-products-container">';
    woocommerce_output_related_products(array(
        'posts_per_page' => -1,
        'columns' => 6,
    ));
    echo '</div>';
    echo '</div>';
    // echo '<button class="prev-arrow">&#10094;</button>';
    // echo '<button class="next-arrow">&#10095;</button>';
    echo '</div>';
}
add_action('woocommerce_after_single_product_summary', 'custom_related_products_section');




//remove default meta section
function remove_default_product_meta() {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
}
add_action( 'woocommerce_single_product_summary', 'remove_default_product_meta', 5 );

