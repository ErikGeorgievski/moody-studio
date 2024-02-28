jQuery(document).ready(function($) {
    //a function to update cart count in the basket in the header
    function updateCartCount() {
        $.ajax({
            url: ajax_variables.ajaxUrl,
            type: 'POST',
            data: {
                'action': 'update_cart_count'
            },
            success: function(response) {
                $('.cart-items-count').text(response);
            }
        });
    }
    updateCartCount();

    //setting interval to update the count every 1s
    setInterval(updateCartCount, 1000);
});
