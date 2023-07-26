<?php
/**
 * Template for post entry header
 * 
 * @package digitalnavas
*/

$the_post_id = get_the_ID();
$hide_title = get_post_meta( $the_post_id, '_hide_page_title', true );
$has_post_thumbnail = get_the_post_thumbnail( $the_post_id );
?>
<header class="entry-header">
    <?php 
        //Feature Image
        if( $has_post_thumbnail ){
            ?>
            <div class="entry-image mb-3">
                <a href="<?php echo esc_url( get_permalink() ); ?>">
                <?php
                the_post_custom_thumbnail(
                    $the_post_id, 'feature-thumbnail', ['sizes' => '(max-width: 350px) 350px, 233px', 'class' => 'attachment-featured-large size-feature-image']
                )
                ?>
                </a>
            </div>
            <?php
        }
    ?>
</header>