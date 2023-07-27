<?php


function get_the_post_custom_thumbnail($post_id, $size = 'feature-thumbnail', $additional_attributes = []) {
    $custom_thumbnail = '';

    if ( null === $post_id ) {
        $post_id = get_the_ID();
    }

    if ( has_post_thumbnail( $post_id ) ) {
        $default_attributes = [
            'loading' => 'lazy',
        ];

        $attributes = array_merge( $additional_attributes, $default_attributes );

        // echo '<pre>';
        // print_r( $attributes );
        // wp_die();

        $custom_thumbnail = wp_get_attachment_image( get_post_thumbnail_id( $post_id ), $size, false, $additional_attributes );
    }

    return $custom_thumbnail;
}

function the_post_custom_thumbnail($post_id, $size = 'feature-thumbnail', $additional_attributes = []) {

    echo get_the_post_custom_thumbnail($post_id, $size, $additional_attributes);

}

// function to display date on blogs posts
function digitalnavas_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    //POST IS MODIFIED
    if ( get_the_time( 'U' ) !==  get_the_modified_time( 'U' ) ) {
        '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    } 
    $time_string = sprintf( $time_string, esc_attr( get_the_date( DATE_W3C ) ), esc_attr( get_the_date( ) ), esc_attr( get_the_modified_date( DATE_W3C ) ), esc_attr( get_the_modified_date( ) )
    );

    $posted_on = sprintf( esc_html_x( 'Posted on %s', 'post date', 'digitalnavas' ), '<a href=" ' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );

    echo '<span class="posted-one text-secondary">' . $posted_on . '</span>';
} 

// function to display author of the single blog
function digitalnavas_posted_by() {
    $byline = sprintf(
        esc_html_x( ' by %s', 'post author', 'aquila' ), '<span class="author vcard"><a href=" '. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) .' " > '. esc_html( get_the_author() ) .' </a></span>'
    );

    echo '<span class="byline text-secondary">' . $byline . '</span>';
}

function digitalnavas_the_excerpt( $trim_character_count = 0 ) {
    if ( !has_excerpt() || 0 === $trim_character_count ) {
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags( get_the_excerpt() );
    $excerpt = substr( $excerpt, 0, $trim_character_count );
    $excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ));

    echo $excerpt . '[...]';
}