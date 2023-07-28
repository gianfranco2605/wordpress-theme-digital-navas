<?php
/**
 * Bootstrap the theme
 * 
 * @package Digital Navas
*/

namespace DIGITALNAVAS_THEME\Inc;

use DIGITALNAVAS_THEME\Inc\Traits\Singleton;

class DIGITALNAVAS_THEME {

    use Singleton;

    protected function __construct() { 
        //load classes

        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        Sidebars::get_instance();
        
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
        */
        add_action('after_setup_theme', [ $this, 'setup_theme']);
    }

    public function setup_theme() {
        //tittle function
        add_theme_support( 'title-tag' );
        //logo function
        add_theme_support( 'custom-logo', [
            'header-text' => [ 'site-title', 'site-description' ], 
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true,
        ]);

        // backgrounds
        add_theme_support( 'custom-background', [
            'default-color' => '#fff',
            'default-image' => '',
        ] );

        // feature image
        add_theme_support( 'post-thumbnails' );

        // allows not to refresh the page on changes
        add_theme_support( 'automatic-feed-links' );
        
        // allows wordpress to support this 
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        ]);
        
        // for TinyMCE editor x attack style sheet
        add_editor_style();
        
        // styles blocks
        add_theme_support( 'wp-block-styles' );

        // options "full width and wide" in guttenberg images or blocks? 
        add_theme_support( 'align-wide' );

        /**
         * Register image sizes
        */
        add_image_size( 'feature-thumbnail', 290, 193, true  );

        global $content_width;
        if( ! isset( $content_width ) ) {
            $content_width = 1240;
        }
    
    }

}