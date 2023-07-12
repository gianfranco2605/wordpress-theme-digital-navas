<?php
/**
 * Theme Functions.
 * 
 * @package Digital Navas
*/

//register = create -- enqueue = activate
function digital_navas_enqueue_scripts() {
    
    //styles
    wp_register_style('style-css', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ), 'all');// filemtime = timestamp(version #)
    wp_register_style('bootstrap-css', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );

    //scripts-js
    wp_register_script('main-js', get_template_directory_uri() . '/assets/main.js', [], '1.0.0', true);//true-> script in footer
    wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);
    
    // calling the register
    wp_enqueue_style('style-css');
    wp_enqueue_style('bootstrap-css');
    wp_enqueue_script('main-js');
    wp_enqueue_script('bootstrap-js');

}

add_action('wp_enqueue_scripts', 'digital_navas_enqueue_scripts');