<?php
/**
 * Theme Functions.
 *
 * @package Digital Navas
 */

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DIGITALNAVAS_DIR_PATH = /Users/gianfranconavas/Local Sites/wordpress-site/app/public/wp-content/themes/digitalnavas
if (!defined('DIGITALNAVAS_DIR_PATH')) {
    define('DIGITALNAVAS_DIR_PATH', untrailingslashit(get_template_directory()));
}

require_once DIGITALNAVAS_DIR_PATH . '/inc/helpers/autoloader.php';

function digitalnavas_get_theme_instance() {
    \DIGITALNAVAS_THEME\Inc\DIGITALNAVAS_THEME::get_instance();
}

digitalnavas_get_theme_instance();

// Register = create -- Enqueue = activate
function digital_navas_enqueue_scripts() {

    // Styles
    wp_register_style('style-css', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all'); // filemtime = timestamp (version #)
    wp_register_style('bootstrap-css', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

    // Scripts
    wp_register_script('main-js', get_template_directory_uri() . '/assets/main.js', [], '1.0.0', true); // true -> script in footer
    wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

    // Enqueue the styles and scripts
    wp_enqueue_style('style-css');
    wp_enqueue_style('bootstrap-css');
    wp_enqueue_script('main-js');
    wp_enqueue_script('bootstrap-js');
}

add_action('wp_enqueue_scripts', 'digital_navas_enqueue_scripts');
