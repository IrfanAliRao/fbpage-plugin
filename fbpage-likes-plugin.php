<?php
/*
Plugin Name: Facebook Like Page
Plugin URI: https://wordpress.org/plugins/health-check/
Description: Checks the health of your WordPress install
Version: 0.1.0
Author: Amir Shehzad
Author URI: http://health-check-team.example.com
*/
defined('ABSPATH') or die('Hey !! you have no access silly person');

require_once(plugin_dir_path(__FILE__).'/includes/fbpage-likes-scripts.php');
require_once(plugin_dir_path(__FILE__).'/includes/fbpage-likes-class.php');
function fbpage_likes_page_func(){
    register_widget( 'Fbpage_like_page_Widget' );
}
add_action( 'widgets_init', 'fbpage_likes_page_func' );