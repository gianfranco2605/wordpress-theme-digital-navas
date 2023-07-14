<?php
/**
 * Register Menus
 * 
 * @package Digital Navas
*/

namespace DIGITALNAVAS_THEME\Inc;

use DIGITALNAVAS_THEME\Inc\Traits\Singleton;

class Menus {

    use Singleton;

    protected function __construct() { 
        //load classes
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
        */
        add_action('init', [ $this, 'register_menus' ] );
        
    }

    public function register_menus() {
        register_nav_menus ([
            'digital-header-menu' => esc_html__('Header-Menu', 'digitalnavas'),
            'digital-footer-menu' => esc_html__('Footer-Menu', 'digitalnavas'),
        ]);
    }

    public function get_menu_id( $location ) {
        //Get all location
        $locations = get_nav_menu_locations();
        
        //Get object id by location 
        $menu_id = $locations[$location];

        return ! empty( $menu_id ) ? $menu_id : '';
    }
}