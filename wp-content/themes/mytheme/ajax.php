<?php 

function init_ajax(){
    add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');
}

add_action('init', 'init_ajax');

function mytheme_enqueue_scripts() {
    wp_enqueue_script('mytheme_jquery', get_template_directory_uri() . '/resources/js/jquery.js', array(), false, array());
    wp_enqueue_script('mytheme_ajax', get_template_directory_uri() . '/resources/js/app.js', array('mytheme_jquery'), false, array());


    wp_localize_script('mytheme_ajax', 'ajax_variables', array(
        'ajaxUrl' => admin_url("admin-ajax.php"),
        'nonce' => wp_create_nonce("mytheme_ajax_nonce")
    ));
}



add_action('wp_ajax_custom_product_search', 'custom_product_search');
add_action('wp_ajax_nopriv_custom_product_search', 'custom_product_search');

function custom_product_search() {
    $query = sanitize_text_field($_POST['query']);
    $args = array(
        'post_type' => 'product',
        's' => $query,
    );
    $query_result = new WP_Query($args);
    if ($query_result->have_posts()) {
        while ($query_result->have_posts()) {
            $query_result->the_post();
            global $product;
            $product_id = get_the_ID();
            $product = wc_get_product($product_id);
            $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
            $product_price = $product->get_price_html();
    
            echo '<div class="search-result">';
            echo '<a href="' . get_permalink() . '">';
            echo '<img src="' . $product_image[0] . '" alt="' . get_the_title() . '">';
            echo '<span class="product-title">' . get_the_title() . '</span>';
            echo '<span class="product-price">' . $product_price . '</span>';
            echo '</a>';
            echo '</div>';
        }
    }
    
     else {
        echo 'No products found :( ';
    }
    wp_reset_postdata();
    die();
}
