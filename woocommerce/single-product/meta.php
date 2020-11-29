<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>

<div class="product_meta p-b-45">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper s-text8 m-r-35"><?php esc_html_e( 'SKU:', 'aranoz' ); ?> <span class="sku"><?php echo esc_html( ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'aranoz' ) ); ?></span></span>

	<?php endif; ?>

	<?php echo wp_kses_post( wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in s-text8">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'aranoz' ) . ' ', '</span>' ) ); ?>

	<?php echo wp_kses_post( wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'aranoz' ) . ' ', '</span>' ) ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
