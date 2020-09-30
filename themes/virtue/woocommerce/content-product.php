<?php
/**
 * The template for displaying product content within loops
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 	WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php virtue_product_class( '', $product ); ?>>
	<?php
	/**
	 * Woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked virtue_add_product_loop_open - 1
	 * @hooked woocommerce_template_loop_product_link_open - 10 (UNHOOKED BY THEME)
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Woocommerce_before_shop_loop_item_title hook
	 *
	 * @hooked kad_woocommerce_image_link_open - 2
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10 (UNHOOKED BY THEME)
	 * @hooked kt_woocommerce_template_loop_product_thumbnail - 10
	 * @hooked kad_woocommerce_image_link_close - 50
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked virtue_woocommerce_archive_content_wrap_start - 5
	 * @hooked virtue_woocommerce_archive_title_wrap_start - 6
	 * @hooked virtue_woocommerce_archive_title_link_start - 7
	 *
	 * @hooked woocommerce_template_loop_product_title - 10 (UNHOOKED BY THEME)
	 * @hooked virtue_woocommerce_template_loop_product_title - 10
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 * @hooked virtue_woocommerce_archive_title_link_end - 15
	 * @hooked virtue_woocommerce_archive_excerpt - 20
	 * @hooked virtue_woocommerce_archive_title_wrap_end - 50
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5 (UNHOOKED BY THEME)
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 * @hooked virtue_after_shop_loop_wrap_end - 50
	 * @hooked virtue_add_product_loop_close - 100
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</div>
