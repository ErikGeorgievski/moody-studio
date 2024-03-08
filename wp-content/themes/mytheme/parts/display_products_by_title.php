<?php
function display_products_by_title_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count' => 3,
        'titles' => ''
    ), $atts);

    $titles_array = explode(',', $atts['titles']);

    $titles_array = array_map('trim', $titles_array);

    $product_ids = array();

    foreach ($titles_array as $title) {
        $product = get_page_by_title($title, OBJECT, 'product');
        if ($product) {
            $product_ids[] = $product->ID;
        }
    }

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $atts['count'],
        'post_status' => 'publish',
        'post__in' => $product_ids
    );

    $products_query = new WP_Query($args);

    ob_start();

    if ($products_query->have_posts()) {
        echo '<div class="three-products-columns">';
        while ($products_query->have_posts()) {
            $products_query->the_post();
            $product_permalink = get_permalink();
            ?>
            <div class="product"> 
                <a href="<?php echo $product_permalink; ?>">
                    <div class="product-image">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </div>
                    <h2><?php the_title(); ?></h2>
                    <div class="product-rating">
                        <?php echo my_theme_stars_rating(); ?>
                    </div>
                    <div class="product-price">
                        <?php echo wc_price(get_post_meta(get_the_ID(), '_price', true)); ?>
                    </div>
                </a> <!-- Closing anchor tag -->
            </div>
            <?php
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<p>No products found.</p>';
    }

    return ob_get_clean();
}
add_shortcode('display_products_by_title', 'display_products_by_title_shortcode');
