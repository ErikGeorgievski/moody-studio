<?php

require_once("parts/advantages.php");
require_once("parts/custom_product_photo.php");
require_once("parts/custom_cta_sale.php");
require_once("parts/custom_top_rated_products.php");
require_once("parts/custom_newsletter.php");


add_shortcode('display_advantages', 'display_advantages_shortcode');
add_shortcode('custom_product_photo', 'mytheme_custom_product_photo');
add_shortcode('custom_cta_sale', 'mytheme_custom_cta_sale');
add_shortcode('top_rated_products', 'display_top_rated_products_shortcode');
add_shortcode('newsletter_subscription_form', 'newsletter_subscription_form_shortcode');


