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
        digitalnavas_the_excerpt(200);
    }
    ?>
</div>