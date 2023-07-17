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
        <!-- wordpress loop -->
        <?php
        if( have_posts() ) {
            ?>
            <div class="container">
                <!-- show heading -->
                <?php 
                    if ( is_home() && ! is_front_page() ) {
                        ?>
                        <header class="mb-5">
                            <h1 class="page-title"><!--the tutorial use this class "screen-reader-text", but if i used it, i can't see the title in my front-end-->
                                <?php single_post_title(); ?>
                            </h1>
                        </header>
                        <?php
                    }
                ?>
                <!-- end show heading -->
                <div class="row">
                <?php 
                $index = 0;
                $no_of_columns = 2;
                    //case index = 0;
                    //Start loop.
                    while ( have_posts() ) : the_post();
                        if( 0 === $index % $no_of_columns ) {
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                            <?php
                        }

                        ?>
                        <h3><?php the_title(); ?></h3>
                        <div><?php the_excerpt(); ?></div>
                        <?php

                        $index++;
                        //index value = 1

                        if( 0 !== $index && 0 === $index % $no_of_columns ) {
                            ?>
                            </div>
                            <?php
                        }

                    endwhile
                ?>
                </div>
            </div>           
            <?php
           }        
         ?>
         <!-- end wordpress loop -->
    </main>
</div>

<?php get_footer(); ?>    
    
