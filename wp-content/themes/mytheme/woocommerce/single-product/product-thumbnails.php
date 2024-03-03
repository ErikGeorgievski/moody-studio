<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.5.1
 */

defined('ABSPATH') || exit;

global $product;

$attachment_ids = $product->get_gallery_image_ids();

if ($attachment_ids && $product->get_image_id()) {
    foreach ($attachment_ids as $attachment_id) {
        $image_url = wp_get_attachment_image_url($attachment_id, 'full'); // Get the full-size image URL
        echo '<a href="' . esc_url($image_url) . '" class="woocommerce-product-gallery__image" data-caption="" data-src="' . esc_url($image_url) . '" data-large_image="' . esc_url($image_url) . '" data-large_image_width="800" data-large_image_height="800">' . wp_get_attachment_image($attachment_id, 'full') . '</a>';
    }
}
