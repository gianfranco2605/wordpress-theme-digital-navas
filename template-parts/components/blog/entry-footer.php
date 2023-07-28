<?php
/**
 * Template for post entry footer
 * 
 * To be used inside WordPress Loop
 * 
 * @package digitalnavas
*/

// display taxonomy categories
$the_post_id = get_the_ID();
$article_term = wp_get_post_terms( $the_post_id, [ 'category', 'post_tag' ] );

if ( empty( $article_term ) || ! is_array( $article_term ) ) {
    return;
}

?>

<div class="entry-footer mt-4">
    <?php
        foreach ( $article_term as $key => $article_term ) {
            ?>
            <button class="btn border border-secondary mb-20 mr-2">
                <a class="entry-footer-link text-black-50" href="<?php echo esc_url( get_term_link( $article_term ) ); ?>"><?php echo esc_html( $article_term->name);?>
                </a>
            </button>
            <?php
        }
    ?>
</div>