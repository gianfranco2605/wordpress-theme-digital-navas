<?php
/**
 * Main Template File
 * 
 * @package DigitalNavas
*/
?>

<?php get_header(); ?>

<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <?php
            if( have_posts() ) :
                ?>
                    <div class="container">
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
                        ?>
                        <div class="row">
                        <?php
                        // index to create columns
                        $index = 0;
                        $no_of_columns = 2;

                        //Start the loop
                        // wp loop to see content of the blog
                            while ( have_posts() ): the_post();
                                
                                if ( 0 === $index % $no_of_columns ) {
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                    <?php
                                }
                                
                                get_template_part('template-parts/content');

                                $index++;

                                if( 0 !== $index && 0 === $index % $no_of_columns) {
                                    ?>
                                    </div>
                                    <?php
                                }


                            endwhile;
                        ?>
                        </div>
                        
                    </div>
                <?php

                else : 

                    get_template_part('template-part/content-none');
            endif;
         ?>

    </main>
</div>

<?php get_footer(); ?>    
    
