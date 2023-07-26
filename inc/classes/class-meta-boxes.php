<?php
/**
 * Register Meta Boxes
 * 
 * @package Digital Navas
*/

namespace DIGITALNAVAS_THEME\Inc;

use DIGITALNAVAS_THEME\Inc\Traits\Singleton;

class Meta_Boxes {
    use Singleton;

    protected function __construct() { 
        //load classes
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
        */
        add_action('add_meta_boxes', [ $this, 'add_custom_meta_box' ] );
        add_action('save_post', [ $this, 'save_post_meta_data' ]);
        
    }

    public function add_custom_meta_box() {
        $screens = [ 'post' ];
        foreach ( $screens as $screen ) {
            add_meta_box(
                'hide_page_title', //Unique id
                __( 'Hide page title', 'digitalnavas' ), //Box Title
                [ $this, 'custom_meta_box_html' ], //Content callbacks, 
                $screen,
                'side' 
            );
        }

    } 
    
    public function custom_meta_box_html( $post ) {
        $value = get_post_meta( $post->ID, '_hide_page_title', true );
        ?>
        <label for="digitalnavas-field"><?php esc_html_e( 'Hide the page title', 'digitalnavas' ) ?></label>
        <select name="digitalnavas_hide_page_title" id="digitalnavas-field" class="postbox">
            <option value=""><?php esc_html_e( 'Select', 'digitalnavas' ) ?></option>
            <option value="yes" <?php selected( $value, 'yes' ); ?>><?php esc_html_e( 'Yes', 'digitalnavas' ) ?></option>
            <option value="no" <?php selected( $value, 'no' ); ?>><?php esc_html_e( 'No', 'digitalnavas' ) ?></option>
        </select>
        <?php
    }

    public function save_post_meta_data( $post_id ) {
        if ( array_key_exists( 'digitalnavas_hide_page_title', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['digitalnavas_hide_page_title']
            );
        }

    }
}