<?php
/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
add_theme_support('post-thumbnails');

/*
* Enable custom menu in WordPress dashboard
*/
function add_custom_menu()
{
  register_nav_menu('main-menu', __('Main Menu'));
}
add_action('init', 'add_custom_menu');

/*
* Load custom script in order to:
*  - Enable burger menu toggle 
*/
function custom_scripts_method()
{
wp_register_script('responsive', get_template_directory_uri() . '/responsive.js', array('jquery'), '1.0.0', true);
wp_enqueue_script('responsive');
}

add_action('wp_enqueue_scripts', 'custom_scripts_method');
?>