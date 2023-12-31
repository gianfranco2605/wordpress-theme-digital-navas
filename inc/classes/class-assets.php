<?php
/**
 * Enqueue theme assets
 * 
 * @package Digital Navas
*/

namespace DIGITALNAVAS_THEME\Inc;

use DIGITALNAVAS_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct() { 
        //load classes
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
        */
        add_action('wp_enqueue_scripts', [ $this, 'register_styles' ] );
        add_action('wp_enqueue_scripts', [ $this, 'register_scripts' ] );
        add_action('enqueue_block_assets', [ $this, 'enqueue_editor_assets' ] );

    }

    public function register_styles() {
        // Styles
        wp_register_style('bootstrap-css', DIGITALNAVAS_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');
        wp_register_style('main-css', get_template_directory_uri() . '/assets/build/css/main.css', ['bootstrap-css'], filemtime( get_template_directory() . '/assets/build/css/main.css' ), 'all');
        wp_enqueue_style('font-css', get_template_directory_uri() . '/assets/src/library/fonts/fonts.css', [], false, 'all');

        // Enqueue the styles
        wp_enqueue_style('bootstrap-css');
        wp_enqueue_style('main-css');
     
    }

    public function register_scripts() {
        // Scripts
        wp_register_script('main-js', get_template_directory_uri() . '/assets/build/js/main.js', ['jquery'], filemtime(get_template_directory() . '/assets/build/js/main.js'), true); // true -> script in footer
        wp_register_script('bootstrap-js', DIGITALNAVAS_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

        // Enqueue the scripts  
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');

    }
}