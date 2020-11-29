<?php
/**
 * @Packge     : Aranoz
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

get_header();

if ( is_product() ) {
	$aranoz_wc_wrapper_class 	= 'product_image_area section_padding';
	$aranoz_wc_row_class 		= 'row s_product_inner justify-content-between';
} else {
	$aranoz_wc_wrapper_class 	= 'aranoz-woo cat_product_area section_padding';
	$aranoz_wc_row_class 		= 'row';
}

?>

	<!-- Content page -->
	<section class="<?php echo esc_attr( $aranoz_wc_wrapper_class )?>">
		<div class="container">
			<div class="<?php echo esc_attr( $aranoz_wc_row_class )?>">
				<?php
				// sidebar
				$col = '12';
				if ( ! is_product() ) {
					get_sidebar( 'woo' );
					$col = '9';
				}

				?>
				<div class="col-lg-<?php echo esc_attr( $col ); ?>">
				<?php
				if ( have_posts() ) {
					// Woocommerce Content
					woocommerce_content();
				} else {
					get_template_part( 'templates/content', 'none' );
				}
				?>
				</div>

			</div>
		</div>
	</section>

<?php
get_footer();
?>
