<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
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
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Array
// (
//     [menu_order] => Default sorting
//     [popularity] => Sort by popularity
//     [rating] => Sort by average rating
//     [date] => Sort by latest
//     [price] => Sort by price: low to high
//     [price-desc] => Sort by price: high to low
// )

// echo '<pre>';
// print_r( $catalog_orderby_options );
// wp_die();

?>
<div class="single_product_menu d-flex">
    <h5><?php echo esc_html( 'short by :', 'aranoz' ); ?> </h5>
    <form class="woocommerce-ordering" method="get">
        <select name="orderby" class="orderby selection-2">
            <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="paged" value="1" />
        <?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
    </form>
</div>