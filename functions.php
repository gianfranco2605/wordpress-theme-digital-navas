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

if ( !defined( 'DIGITALNAVAS_BUILD_URI' ) ) {
    define('DIGITALNAVAS_BUILD_URI', untrailingslashit(get_template_directory_uri()) . 'assets/build');
}

if ( !defined( 'DIGITALNAVAS_BUILD_JS_URI' ) ) {
    define('DIGITALNAVAS_BUILD_JS_URI', untrailingslashit(get_template_directory_uri()) . 'assets/build/js');
}

if (!defined('DIGITALNAVAS_BUILD_JS_PATH')) {
    define('DIGITALNAVAS_BUILD_JS_PATH', untrailingslashit(get_template_directory()) . 'assets/build/js');
}

if ( !defined( 'DIGITALNAVAS_BUILD_IMG_URI' ) ) {
    define('DIGITALNAVAS_BUILD_IMG_URI', untrailingslashit(get_template_directory_uri()) . 'assets/build/src/img');
}

if ( !defined( 'DIGITALNAVAS_BUILD_CSS_URI' ) ) {
    define('DIGITALNAVAS_BUILD_CSS_URI', untrailingslashit(get_template_directory_uri()) . 'assets/build/css');
}

if (!defined('DIGITALNAVAS_BUILD_CSS_PATH')) {
    define('DIGITALNAVAS_BUILD_CSS_PATH', untrailingslashit(get_template_directory()) . 'assets/build/css');
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
