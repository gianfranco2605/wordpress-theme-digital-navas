<?php
/**
 * Template for entry content
 * 
 * To be used inside WordPress Loop
 * 
 * @package digitalnavas
*/

?>

<div class="entry-content">
    <?php 
    if( is_single() ) {
        the_content(
            sprintf(
                wp_kses(
                        __( 'Continue reading %s <span class="meta_nav">&rarr;</span>', 'digitalnavas' ), [
                            'span' => [
                                'class' => []
                            ]
                        ]
                    ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            )
                );
    } else {
        // function for just 200 text in blog page 
        digitalnavas_the_excerpt(200);
        // function to read more in blog text
        echo digitalnavas_excerpt_more();

    }
    ?>
</div>