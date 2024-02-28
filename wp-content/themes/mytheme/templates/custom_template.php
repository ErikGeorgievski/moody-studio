<?php
/*
Template Name: Custom Template
*/

get_header();

woocommerce_breadcrumb();
if (is_cart()) {
    ?>
    <h2 class="shopping-bag-text">Shopping Bag</h2>
    <?php
}
?>

<div class="page-content">
    <?php
    the_content();

    ?>
</div>

<?php

if (is_page('checkout')) {
    echo do_shortcode('[woocommerce_checkout]');
} elseif (is_page('cart')) {
    echo do_shortcode('[woocommerce_cart]');
}

get_footer(); ?>