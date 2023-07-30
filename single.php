<?php
/**
 * Single Post Template
 * 
 * @package DigitalNavas
*/
?>

<?php get_header(); ?>

<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <?php
                    if( have_posts() ) :
                        ?>
                            <div class="post-wrap">
                                <?php
                                if ( is_home() && ! is_front_page() ) { //is_home() -> blog page
                                    ?>
                                    <header class="mb-5">
                                        <h1 class="page-title"><!--"screen-reader-text" the tutorial use this class, but if i used it i can't see the title MAYBE CSS CONFLICTS OR WP VERSION-->
                                            <?php single_post_title(); ?>
                                        </h1>
                                    </header>

                                    <?php
                                }
                                //Start the loop
                                // wp loop to see content of the blog
                                while ( have_posts() ): the_post();
                                    
                                    get_template_part('template-parts/content');

                                endwhile;
                                
                                ?>                       
                            </div>
                        <?php

                        else : 
                            // if there is not content(blogs) give this template
                            get_template_part('template-part/content-none');
                    endif;                     
                    ?>
                    <?php 
                        // function not working
                        digitalnavas_pagination()
                    ?> 
                    <div class="prev-link"><?php previous_post_link(); ?></div>
                    <div class="next-link"><?php next_post_link(); ?></div>
                    </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <?php get_sidebar(); ?>
                </div>
          </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>    
    
