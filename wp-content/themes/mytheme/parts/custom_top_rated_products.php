<?php
function display_top_rated_products_shortcode($atts) {
    ob_start();
    
    $atts = shortcode_atts(array(
        'limit' => 5, 
    ), $atts);

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $atts['limit'],
        'orderby'        => 'meta_value_num',
        'meta_key'       => '_wc_average_rating',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);

    $output = '<div class="top-rated-products">';
    if ($query->have_posts()) {
        $output .= '<div class="product-row">';
        $count = 0;
        while ($query->have_posts()) {
            $query->the_post();
            $count++;
            if ($count > 3) {
                $output .= '</div><div class="product-row">';
                $count = 1;
            }
            $output .= '<div class="product">';
            $output .= '<div class="product-details">';
            $output .= '<div class="product-info">';
            $output .= '<h2>' . get_the_title() . '</h2>';
            $output .= '<span class="product-price">' . wc_price(get_post_meta(get_the_ID(), '_price', true)) . '</span>';
            $output .= '<span class="product-rating">' . my_theme_stars_rating() . '</span>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="product-thumbnail">' . get_the_post_thumbnail() . '</div>';
            $output .= '</div>';
        }
        $output .= '</div>';
        wp_reset_postdata();

        $output .= '<div class="load-more-wrapper">';
        $output .= '<button id="load-more-button">Load More</button>';
        $output .= '</div>';
    }
    $output .= '</div>';
    $output = ob_get_clean();

    return $output;
}
