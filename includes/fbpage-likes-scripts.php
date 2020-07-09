<?php
function yts_add_scripts(){
    wp_enqueue_style('yts-main-style',plugins_url().'/fbpage-likes-plugin/css/style.css');
    wp_enqueue_script('yts-main-script',plugins_url().'/fbpage-likes-plugin/js/main.js');
    wp_register_script('google','https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0');
    wp_enqueue_script('google');
}
add_action('wp_enqueue_scripts','yts_add_scripts');