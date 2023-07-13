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
        
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
        */
    }

}