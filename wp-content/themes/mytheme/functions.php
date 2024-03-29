<?php

if (!defined('ABSPATH')) {
    exit;
}

require_once("vite.php");
require_once("hooks.php");



require_once(get_template_directory() . "/init.php");

//i am adding this to support woocommerce on my theme
function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');




function custom_product_categories_shortcode()
{
    ob_start();

    $args = array(
        'taxonomy'     => 'product_cat',
        'orderby'      => 'ID',
        'order'        => 'ASC', 
        'show_count'   => 0,
        'pad_counts'   => 0,
        'hierarchical' => 1,
        'title_li'     => '',
        'hide_empty'   => 0
    );

    $categories = get_categories($args);

    if ($categories) {
        echo '<ul>';
        foreach ($categories as $category) {
            echo '<li><a href="' . get_term_link($category) . '">' . $category->name . '</a></li>';
        }
        echo '</ul>';
?>
        <div class="filter-1">
            <p class="gender1">Gender</p>
            <div class="man">
                <input type="checkbox" id="myCheckbox1" name="myCheckbox" value="checked"><span class="span1">Man</span>

            </div>
            <div class="woman">
                <input type="checkbox" id="myCheckbox2" name="myCheckbox" value="checked"><span class="span2">Woman</span>

            </div>

            <div class="color-filter">
                <p class="color">Color</p>
                <div class="color1"> <span class="FFF"></span><span class="a323334"></span><span class="C4C4C4"></span><span class="F2C94C"></span><span class="F2994A
                "></span><span class="EB5757"></span></div>
                <div class="color2"> <span class="BB6BD9"></span><span class="a56CCF2"></span><span class="C6FCF97"></span><span class="a219653"></span><span class="a2F80ED
                "></span><span class="DF1313"></span></div>
                <div class="color3"> <span class="a770505"></span><span class="a0A5D8B"></span><span class="AD5B12"></span><span class="a4F0E8B"></span><span class="a0A7090
                "></span><span class="a156008"></span></div>




            </div>

            <div class="price-filter">
                <p class="price">Price</p>
                <div class="price1-1"><input type="checkbox" id="myCheckbox4" name="myCheckbox" value="checked"><span class="span2">0 - 200</span></div>
                <div class="price1-2"><input type="checkbox" id="myCheckbox5" name="myCheckbox" value="checked"><span class="span2">200 - 500</span></div>
                <div class="price1-3"><input type="checkbox" id="myCheckbox6" name="myCheckbox" value="checked"><span class="span2">500 - 1000</span></div>
                <div class="price1-4"><input type="checkbox" id="myCheckbox7" name="myCheckbox" value="checked"><span class="span2">1 000 - 1 500</span></div>
                <div class="price1-5"><input type="checkbox" id="myCheckbox8" name="myCheckbox" value="checked"><span class="span2">1 500 - 3 000</span></div>
                <div class="price1-6"><input type="checkbox" id="myCheckbox9" name="myCheckbox" value="checked"><span class="span2">3 000 - 10 000</span></div>
            
            
            
            
            
            

            </div>





        </div>
<?php






    }

    return ob_get_clean();
}

add_shortcode('custom_product_categories', 'custom_product_categories_shortcode');



// Funktion för shortcode som genererar en div med andra element och klasser
function custom_div_shortcode( $atts, $content = null ) {
    
    $atts = shortcode_atts( array(
        'class' => '', 
    ), $atts, 'custom_div' );

    
    ?>
    <div class="custom-div <?php echo esc_attr( $atts['class'] ); ?>">
        
        <div class="inner-div">
            <p class="p-text1">Member Exclusive</p>
            <p class="p-text2">15% off everything + extra 100:- off for plus status</p>
            <p class="p-text3">Not a member? Join now to shop.</p>
        </div>
       
    </div>
    <?php
    
}
add_shortcode( 'custom_div', 'custom_div_shortcode' );

function show_category_names( $atts, $content = null) {
    
    $atts = shortcode_atts( array(
        'class' => '', 
    ), $atts, 'custom_div2' );

    
    ?>
    <div class="custom-div2 <?php echo esc_attr( $atts['class'] ); ?>">
        
        <div class="inner-div2">
            <h3 class="h3-text1">BEDROOM</h3>
            <p class="p-text2"> Its easy to transform your bedrom interior with our great selection of accessories. </p> 
            
        </div>
       
    </div>
    <div class="link">
        <div class="text10"> <span class="models">Models</span> <span class="prod">Products</span> </div>
    </div>
    <?php
}
add_shortcode( 'show_categories', 'show_category_names' );






add_action('init', function(){
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
    add_action( 'woocommerce_before_shop_loop_item_title', 'custom_woocommerce_template_loop_product_thumbnail', 10);
});

if ( ! function_exists( 'custom_woocommerce_template_loop_product_thumbnail' ) ) {
    function custom_woocommerce_template_loop_product_thumbnail() {
        echo custom_woocommerce_get_product_thumbnail();
    } 
}

if ( ! function_exists( 'custom_woocommerce_get_product_thumbnail' ) ) {   
    function custom_woocommerce_get_product_thumbnail( $size = 'shop_catalog' ) {
        global $post, $woocommerce;
        $output = '';

        if ( has_post_thumbnail() ) {
            $src = get_the_post_thumbnail_url( $post->ID, $size );
            $output .= '<img class="lazy" src="your-placeholder-image.png" data-src="' . $src . '" data-srcset="' . $src . '" alt="Lazy loading image">';
        } else {
             $output .= wc_placeholder_img( $size );
        }

        return $output;
    }
}






// ---------------------------------------------------------------- //
// ajax jquery for add to cart

add_action( 'wp_footer', 'single_product_ajax_add_to_cart_js_script' );
function single_product_ajax_add_to_cart_js_script() {
    ?>
    <script>
    (function($) {
        $('form.cart').on('submit', function(e) {
            e.preventDefault();

            var form   = $(this),
                mainId = form.find('.single_add_to_cart_button').val(),
                fData  = form.serializeArray();

            form.block({ message: null, overlayCSS: { background: '#fff', opacity: 0.6 } });

            if ( mainId === '' ) {
                mainId = form.find('input[name="product_id"]').val();
            }

            if ( typeof wc_add_to_cart_params === 'undefined' )
                return false;

            $.ajax({
                type: 'POST',
                url: wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'custom_add_to_cart' ),
                data : {
                    'product_id': mainId,
                    'form_data' : fData
                },
                success: function (response) {
                    $(document.body).trigger("wc_fragment_refresh");
                    $('.woocommerce-error,.woocommerce-message').remove();
                    $('input[name="quantity"]').val(1);
                    $('.content-area').before(response);
                    form.unblock();
                },
                error: function (error) {
                    form.unblock();
                }
            });
        });
    })(jQuery);
    </script>
    <?php
}

add_action( 'wc_ajax_custom_add_to_cart', 'custom_add_to_cart_handler' );
add_action( 'wc_ajax_nopriv_custom_add_to_cart', 'custom_add_to_cart_handler' );
function custom_add_to_cart_handler() {
    if( isset($_POST['product_id']) && isset($_POST['form_data']) ) {
        $product_id = $_POST['product_id'];

        $variation = $cart_item_data = $custom_data = array();
        $variation_id = 0;

        foreach( $_POST['form_data'] as $values ) {
            if ( strpos( $values['name'], 'attributes_' ) !== false ) {
                $variation[$values['name']] = $values['value'];
            } elseif ( $values['name'] === 'quantity' ) {
                $quantity = $values['value'];
            } elseif ( $values['name'] === 'variation_id' ) {
                $variation_id = $values['value'];
            } elseif ( $values['name'] !== 'add_to_cart' ) {
                $custom_data[$values['name']] = esc_attr($values['value']);
            }
        }

        $product = wc_get_product( $variation_id ? $variation_id : $product_id );

        $cart_item_data = (array) apply_filters( 'woocommerce_add_cart_item_data', $cart_item_data, $product_id, $variation_id, $quantity, $custom_data );

        // Add to cart
        $cart_item_key = WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation, $cart_item_data );

        if ( $cart_item_key ) {
            wc_add_notice( sprintf(
                '<a href="%s" class="button wc-forward">%s</a> %d &times; "%s" %s' ,
                wc_get_cart_url(),
                __("View cart", "woocommerce"),
                $quantity,
                $product->get_name(),
                __("has been added to your cart", "woocommerce")
            ) );
        }

        wc_print_notices();
        wp_die();
    }
}