<?php
/**
 * Header Template
 * 
 * @package Digital Navas
*/
?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <?php wp_head() ?><!-- scripts, styles -->     
    </head>
    <body <?php body_class(''); ?>> <!--function to include classes -->

    <?php wp_body_open() ?> <!-- functions after body -->

    <!--using conditionals for functions-->
    <?php
    if( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    }
    ?>
        <div id="page" class="site">
            <header id="masthead" class="site-header" role="banner">

                <?php get_template_part('template-parts/header/nav'); ?><!--include templates files-->

            </header>
            <div class="site-content" id="content">

          