<?php 
/**
 * Header Navigation Template
 * 
 * @package Digital Navas
*/

$menu_class = \DIGITALNAVAS_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('digital-footer-menu');

$header_menus = wp_get_nav_menu_items( $header_menu_id );

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <!-- logo -->
  <?php
    if ( function_exists( 'the_custom_logo' ) ) {
      the_custom_logo();
    }
  ?>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <?php
      if ( !empty( $header_menus ) && is_array( $header_menus ) ){
        ?>
        <ul class="navbar-nav mr-auto">

           <?php 
              foreach( $header_menus as $menu_item ) {
                if ( !$menu_item->menu_item_parent ){
                  ?>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Action</a>
                    </div>
                  </li>
                 <?php 
                }
              }
            ?>
        </ul>
    <?php
      }
    ?>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
