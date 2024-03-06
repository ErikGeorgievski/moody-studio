<?php
function display_top_rated_products_shortcode($atts) {
  ob_start();

  // Temporarily disable WooCommerce styles
  add_filter('woocommerce_enqueue_styles', '__return_false');

  $atts = shortcode_atts(array(
    'limit' => 6,
  ), $atts);

  $args = array(
    'post_type' => 'product',
    'posts_per_page' => $atts['limit'],
    'orderby' => 'meta_value_num',
    'meta_key' => '_wc_average_rating',
    'order' => 'DESC',
  );

  $custom_template = get_template_directory() . '/custom-product-display.php';
  var_dump($custom_template);

  if (file_exists($custom_template)) {
    // Include the custom template without passing the $query variable
    include($custom_template);
  } else {
    // Display error message if template file is not found
    echo '<p>Custom template not found.</p>';
    // Additionally, display the path we're looking for
    echo '<p>Looking for template at: ' . $custom_template . '</p>';
  }

  // Remove WooCommerce styles filter
  remove_filter('woocommerce_enqueue_styles', '__return_false');

  $output = ob_get_clean();

  return $output;
}
