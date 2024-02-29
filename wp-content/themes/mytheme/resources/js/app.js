import "./update-cart-total-items-basket";
import "./lazy-load-products";

jQuery(document).ready(function($) {
    $('.woocommerce').before($('.woocommerce-notices-wrapper'));
});



jQuery(document).ready(function($) {
    function handleShippingOptions() {
        if ($('input[name^="shipping_method"]:checked').val() === 'free_shipping:1') {
            $('input[name^="shipping_method"]').not(':checked').closest('ul').hide();
            $('.shipping').html('<th class="shipping" colspan="1">Shipping:</th><td class="shipping-amount" colspan="1">0kr</td>');
        } else {
            $('input[name^="shipping_method"]').closest('tr').show();
            $('.shipping-total').text('');
        }
    }
    handleShippingOptions();

    $('input[name^="shipping_method"]').on('change', function() {
        handleShippingOptions();
    });
});



