<?php
/**
 * Theme Functions.
 *
 * @package Digital Navas
 */

//  ini_set('display_errors', 1);
//  ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);

// DIGITALNAVAS_DIR_PATH = /Users/gianfranconavas/Local Sites/wordpress-site/app/public/wp-content/themes/digitalnavas
if (!defined('DIGITALNAVAS_DIR_PATH')) {
    define('DIGITALNAVAS_DIR_PATH', untrailingslashit(get_template_directory()));
}

if ( !defined( 'DIGITALNAVAS_DIR_URI' ) ) {
    define('DIGITALNAVAS_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once DIGITALNAVAS_DIR_PATH . '/inc/helpers/autoloader.php';
require_once DIGITALNAVAS_DIR_PATH . '/inc/helpers/template-tags.php';

function digitalnavas_get_theme_instance() {
    \DIGITALNAVAS_THEME\Inc\DIGITALNAVAS_THEME::get_instance();
}

digitalnavas_get_theme_instance();

// Register = create -- Enqueue = activate
function digital_navas_enqueue_scripts() {

}

add_action('wp_enqueue_scripts', 'digital_navas_enqueue_scripts');
