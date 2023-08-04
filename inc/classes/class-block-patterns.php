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
        add_action( 'init', [ $this, 'register_block_pattern_categories'] );

    }

    function register_block_patterns() {
        if ( function_exists( 'register_block_pattern' ) ) {
            
            /**
             * Cover Pattern
            */
            $cover_content = $this->get_pattern_content( 'template-parts/patterns/cover' );

            register_block_pattern(
                'digitalnavas/cover',
                [
                    'title' => __( 'Digital Navas Cover', 'digitalnavas' ),
                    'description' => __( 'Digital Navas cover blockwith image and text', 'digitalnavas' ),
                    'categories' => [ 'cover' ],
                    'content' => $cover_content, 
                ]
            );

            /**
             * Two Column Pattern
            */
            $two_columns_content = $this->get_pattern_content( 'template-parts/patterns/two-columns' );

            register_block_pattern(
                'digitalnavas/two-columns',
                [
                    'title' => __( 'Digital Navas Two Column', 'digitalnavas' ),
                    'description' => __( 'Digital Navas two columns, head and text', 'digitalnavas' ),
                    'categories' => [ 'column' ],
                    'content' => $two_columns_content, 
                ]
            );
        }
    }

    public function get_pattern_content( $template_path ) {

        // After calling ob_start(), any output generated by PHP will be captured and stored in an internal buffer instead of being sent directly to the browser
        ob_start();
        // En resumen, el propósito general de este código es incluir un archivo de plantilla llamado "cover", capturar su resultado en la variable $cover_content y luego descartar el resultado sin mostrarlo en la página. 
        get_template_part( $template_path );
        // It captures the output generated by the get_template_part()
        $pattern_content = ob_get_contents();
        // This function stops output buffering and discards the contents of the output buffer without sending it to the browser. 
        ob_end_clean();

        return $pattern_content;

    }
    
    // Pattern Categories
    public function register_block_pattern_categories() {
        $pattern_categories = [
            'cover' => __( 'Cover', 'digitalnavas' ),
            'column' => __( 'Columns', 'digitalnavas' ),
            
        ];

        if ( !empty( $pattern_categories ) && is_array( $pattern_categories ) ) {
            foreach ( $pattern_categories as $pattern_category => $pattern_category_label ) {
                register_block_pattern_category(
                    $pattern_category,
                    [ 'label' => $pattern_category_label ]
                );
            }
        }
    }

    
}