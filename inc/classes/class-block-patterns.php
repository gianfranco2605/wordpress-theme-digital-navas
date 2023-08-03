<?php
/**
 * Block-patterns
 * 
 * @package Digital Navas
*/

namespace DIGITALNAVAS_THEME\Inc;

use DIGITALNAVAS_THEME\Inc\Traits\Singleton;

class Block_Patterns {
    use Singleton;

    protected function __construct() { 
        //load classes
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
        */
        add_action( 'init', [ $this, 'register_block_patterns'] );

    }

    function register_block_patterns() {
        if ( function_exists( 'register_block_pattern' ) ) {
            register_block_pattern(
                'digitalnavas/cover',
                [
                    'title' => __( 'Two buttons', 'digitalnavas' ),
                    'description' => __( 'Digital Navas cover blockwith image and text', 'digitalnavas' ),
                    'content' => '<div class="wp-block-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-147" alt="" src="https://wordpress-site.local/wp-content/uploads/2023/08/coins-g81eef3f7a_640.jpg" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%">
                    <div class="wp-block-cover__inner-container">
                    <h2 class="wp-block-heading has-text-align-center has-large-font-size">Never let your memories be greater than your dreams</h2>
                    <p class="has-text-align-center has-cyan-bluish-gray-color has-text-color">Never let your memories be greater than your dreams</p>
                    
                    <div class="wp-block-buttons">
                    <div class="wp-block-button"><a class="wp-block-button__link has-black-color has-cyan-bluish-gray-background-color has-text-color has-background wp-element-button" style="border-radius:19px">Blocks</a></div>
                    </div>
                    </div>
                    </div>'                ]
            );
        }
    }

    
}