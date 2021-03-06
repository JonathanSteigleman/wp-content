<?php
/**
 * Template for displaying search forms in Custom Theme
 * I am hoping that this helps with styling the search form
 * Kali found the source for this
 * Resource: https://5balloons.info/customise-search-widget-wordpress/
 * @package WordPress
 * @subpackage Custom Theme
 * @since 1.0
 * @version 1.0
 */

?>

<form role="search" method="get" class="form-inline search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group md-form">
		<input type="text"  class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'unica-wp' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<span class = "input-group-btn">
			<button type="submit" value="search" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
		</span>
	</div>
</form>