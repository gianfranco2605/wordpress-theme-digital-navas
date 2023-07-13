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
       wp_die('hello');
        
        //load classes
        $this->set_hooks();
    }

    protected function set_hooks() {
        //actions ans filters

    }
}