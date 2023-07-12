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
        <header>Header</header>