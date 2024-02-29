<?php

function display_also_may_buy_products() {
    ob_start();

    echo '<h2>Also You May Buy</h2>';
    echo do_shortcode('[products limit="3" columns="3" orderby="rand"]');
    
    return ob_get_clean();
}

