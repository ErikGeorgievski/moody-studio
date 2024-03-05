import "./update-cart-total-items-basket";
import "./lazy-load-products";
import"./scroll";

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



//hiding the labels 
//changing the default text on dropdown menu on product page
jQuery(document).ready(function($) {
    $('.variations label').hide();
    $('.variations select').each(function() {
        var attributeLabel = $('label[for="' + $(this).attr('id') + '"]').text().replace(':', ''); 
        var newText = 'Select ' + attributeLabel;
        $(this).prepend('<option value="">' + newText + '</option>');
    });
});


jQuery(document).ready(function($) {
    $('#search-icon').click(function() {
        $('#search-bar').toggle();
    });

    $('#search-input').on('input', function() {
        var query = $(this).val();
        if (query.length > 2) {
            $.ajax({
                url: ajax_variables.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'custom_product_search',
                    query: query
                },
                success: function(response) {
                    $('#search-results').html(response);
                }
            });
        } else {
            $('#search-results').html('');
        }
    });
});

