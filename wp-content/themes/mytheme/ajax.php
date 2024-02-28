<?php 

function init_ajax(){
    add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');
}

add_action('init', 'init_ajax');

function mytheme_enqueue_scripts() {
    wp_enqueue_script('mytheme_jquery', get_template_directory_uri() . '/resources/js/jquery.js', array(), false, array());
    wp_enqueue_script('mytheme_ajax', get_template_directory_uri() . '/resources/js/app.js', array('mytheme_jquery'), false, array());


    wp_localize_script('mytheme_ajax', 'ajax_variables', array(
        'ajaxUrl' => admin_url("admin-ajax.php"),
        'nonce' => wp_create_nonce("mytheme_ajax_nonce")
    ));
}