<?php

require_once("parts/advantages.php");
require_once("parts/custom_product_photo.php");
require_once("parts/custom_cta_sale.php");
require_once("parts/custom_top_rated_products.php");
require_once("parts/custom_newsletter.php");
require_once("parts/may_like_products.php");
require_once("parts/display_products_by_title.php");


add_shortcode('display_advantages', 'display_advantages_shortcode');
add_shortcode('custom_product_photo', 'mytheme_custom_product_photo');
add_shortcode('custom_cta_sale', 'mytheme_custom_cta_sale');
add_shortcode('top_rated_products', 'display_top_rated_products_shortcode');
add_shortcode('newsletter_subscription_form', 'newsletter_subscription_form_shortcode');
add_shortcode( 'also_may_buy', 'display_also_may_buy_products' );
add_shortcode('display_products_by_title', 'display_products_by_title_shortcode');



