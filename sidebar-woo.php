<?php
// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * @Packge     : Aranoz
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Sidebar
if ( is_active_sidebar( 'aranoz-woo-sidebar' ) ) {

	echo '<div class="col-lg-3"><div class="left_sidebar_area">';
		dynamic_sidebar( 'aranoz-woo-sidebar' );
	echo '</div></div>';
}



