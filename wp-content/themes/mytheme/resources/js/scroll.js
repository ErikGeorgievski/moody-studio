jQuery(document).ready(function($) {
    var container = $('.related-products-container');
    var wrapper = $('.related-products-wrapper');
    var productWidth = container.find('.product').outerWidth(true);
    var numVisibleProducts = 4;
    var totalProducts = container.find('.product').length;
    var visibleWidth = productWidth * numVisibleProducts;

    $('.prev-arrow').on('click', function() {
        var scrollAmount = container.scrollLeft() - visibleWidth;
        if (scrollAmount < 0) {
            scrollAmount = 0;
        }
        container.animate({ scrollLeft: scrollAmount }, 'slow');
    });

    $('.next-arrow').on('click', function() {
        var scrollAmount = container.scrollLeft() + visibleWidth;
        if (scrollAmount > container.width() - wrapper.width()) {
            scrollAmount = container.width() - wrapper.width();
        }
        container.animate({ scrollLeft: scrollAmount }, 'slow');
    });
});
