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

    }

    public function register_styles() {
        // Styles
        wp_register_style('style-css', get_stylesheet_uri(), [], filemtime( DIGITALNAVAS_DIR_PATH . '/style.css'), 'all'); // filemtime = timestamp (version #)
        wp_register_style('bootstrap-css', DIGITALNAVAS_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

        // Enqueue the styles
        wp_enqueue_style('style-css');
        wp_enqueue_style('bootstrap-css');
        
    }

    public function register_scripts() {
        // Scripts
        wp_register_script('main-js', DIGITALNAVAS_DIR_URI . '/assets/main.js', [], '1.0.0', true); // true -> script in footer
        wp_register_script('bootstrap-js', DIGITALNAVAS_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

        // Enqueue the scripts
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');

    }
}