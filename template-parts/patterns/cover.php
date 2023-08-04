<?php
/**
 * Cover Block-patterns Template
 * 
 * @package Digital Navas
*/

$cover_style = sprintf( 'background-image:url(%s;min-height:640px', esc_url( DIGITALNAVAS_BUILD_IMG_URI . '/patterns/cover.jpg' ) );
?>
<!-- wp:cover {"url"<?php echo esc_url( DIGITALNAVAS_BUILD_IMG_URI . '/patterns/cover.jpg' ) ?>"","id":111,"dimRatio":50,"overlayColor":"cyan-bluish-gray","minHeight":640,"isDark":false} -->
<div class="wp-block-cover alignfull is-light aquila-cover" style="background-image:url( <?php echo esc_url( DIGITALNAVAS_BUILD_IMG_URI . '/patterns/cover.jpg' ) ?> ); min-height:640px"><span aria-hidden="true" class="wp-block-cover__background has-cyan-bluish-gray-background-color has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","style":{"color":{"text":"#4d3c3c"}},"fontSize":"large"} -->
<p class="has-text-align-center has-text-color has-large-font-size" style="color:#4d3c3c">Never let your memories be greater than your dreams</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Click Me</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->

