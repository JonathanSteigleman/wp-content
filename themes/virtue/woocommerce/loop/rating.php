<?php
/**
 * Loop Rating
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $virtue;

if ( function_exists( 'wc_review_ratings_enabled' ) ) {
	if ( ! wc_review_ratings_enabled() ) {
		return;
	}
} else if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' ) {
	return;
}

if ( isset( $virtue['shop_rating'] ) && '1' == $virtue['shop_rating'] ) { 
	$rating_html = wc_get_rating_html( $product->get_average_rating() );
	if ( $rating_html ) {
		?>
		<a href="<?php the_permalink(); ?>"><?php echo $rating_html; ?></a>
		<?php
	} else {
		echo '<span class="notrated">' . esc_html__( 'not rated', 'virtue' ) . '</span>';
	}
}
