<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;

$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );

?>

<?php if ( $heading ) : ?>
    <h2><?php //echo esc_html( $heading ); ?></h2>
<?php endif; ?>

<?php
the_content();
$product_attributes = wc_get_product($post->ID)->get_attributes();

if (isset($product_attributes['composition'])) {
    $composition_attribute = $product_attributes['composition'];
    $composition_label = wc_attribute_label('Composition');
    $composition_values = $composition_attribute->get_options();

    echo '<p class="composition"><span class="attribute-name">' . esc_html($composition_label) . ' - </span>';
    echo esc_html(implode(', ', $composition_values)) . '</p>';
}

$sku = get_post_meta( $post->ID, '_sku', true );
if ( ! empty( $sku ) ) {
    echo '<p class="sku-p"><span class="sku-text">Art. No. - </span> ' . esc_html( $sku ) . '</p>';
}


?>
