<?php
/**
 * Content Templates
 * 
 * @package digitalnavas
*/ 

?>

<!-- prefix THE = echo something, prefix GET return something -->
<!-- THE_TITLE = ECHO THE TITLE; -->
<!-- GET_THE_TITLE = RETURN THE TITLE -->
<article id="post-<?php the_ID(); ?>" <?php post_class("mb-5"); ?>>

    <?php
        get_template_part('template-parts/components/blog/entry-header');
        get_template_part('template-parts/components/blog/entry-meta');
        get_template_part('template-parts/components/blog/entry-content');
        get_template_part('template-parts/components/blog/entry-footer');
    ?>

</article>