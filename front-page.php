<?php
/**
 * Front page template
 * 
 * @package digitalnavas
*/ 

?>
<?php get_header(); ?>

<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <div class="home-page-wrap">           
                <?php
                    if( have_posts() ) :
                                //Start the loop
                                // wp loop to see content of the blog
                                while ( have_posts() ): the_post();
                                    
                                    get_template_part('template-parts/content', 'page');

                                endwhile;
                                
                                ?>                       
                            </div>
                        <?php

                        else : 
                            // if there is not content(blogs) give this template
                            get_template_part('template-part/content-none');
                    endif;                     
                ?>      
        </div>
    </main>
</div>

<?php get_footer(); ?>    