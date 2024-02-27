<?php
function display_advantages_shortcode() {
    ob_start(); ?>

    <div class="advantages">
        <div class="advantage">
            <span class="icon"><?php echo file_get_contents( get_template_directory_uri() . '/resources/images/shipping.svg' ); ?></span>
            <span class="text">FREE SHIPPING</span>
        </div>
        <div class="advantage">
            <span class="icon"><?php echo file_get_contents( get_template_directory_uri() . '/resources/images/money-back.svg' ); ?></span>
            <span class="text">100% MONEY BACK</span>
        </div>
        <div class="advantage">
            <span class="icon"><?php echo file_get_contents( get_template_directory_uri() . '/resources/images/support.svg' ); ?></span>
            <span class="text">SUPPORT 24/7</span>
        </div>
    </div>

    <?php
    return ob_get_clean();
}


