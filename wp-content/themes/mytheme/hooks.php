<?php
add_action( 'init', 'remove_default_loop_rating' );

function remove_default_loop_rating() {
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
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


