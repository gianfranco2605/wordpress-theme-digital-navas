<?php
/**
 * Sidebars
 * 
 * @package Digital Navas
*/

namespace DIGITALNAVAS_THEME\Inc;

use DIGITALNAVAS_THEME\Inc\Traits\Singleton;

class Sidebars {
    use Singleton;

    protected function __construct() { 
        //load classes
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
        */
        add_action( 'widgets_init', [ $this, 'register_sidebars' ] );
        add_action( 'widgets_init', [ $this, 'register_clock_widget' ] );
        
    }

    public function register_sidebars() {
        register_sidebar( array(
            'name'          => __( 'Sidebar', 'digitalnavas' ),
            'id'            => 'sidebar-1',
            'description'   =>  __( 'Main sidebar', 'digitalnavas' ),
            'before_widget' => '<div id="%1$s" class="widget-sidebar %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer', 'digitalnavas' ),
            'id'            => 'sidebar-2',
            'description'   =>  __( 'Footer sidebar', 'digitalnavas' ),
            'before_widget' => '<div id="%1$s" class="widget-footer cell column %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }

    public function register_clock_widget() {
        register_widget( 'DIGITALNAVAS_THEME\Inc\Clock_Widget' );
    }

}    