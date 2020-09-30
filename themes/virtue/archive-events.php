<?php
/**
 * Events Archive for Event Organizer
 *
 * @package Virtue Theme
 */

get_header();
?>
<div class="wrap contentclass" role="document">

<?php
do_action( 'kt_afterheader' );

global $virtue;

if ( isset( $virtue[ 'blog_archive_full' ] ) && 'full' === $virtue[ 'blog_archive_full' ] ) {
	$postclass = 'postlist fullwidth';
} else {
	$postclass = 'postlist';
}
	/**
	* @hooked virtue_page_title - 20
	*/
	do_action( 'virtue_page_title_container' );
	?>

<div id="content" class="container">
	<div class="row">
		<div class="main <?php echo esc_attr( virtue_main_class() ); ?> <?php echo esc_attr( $postclass );?>" role="main">

		<?php if ( ! have_posts() ) : ?>
			<div class="alert">
				<?php esc_html_e( 'Sorry, no results were found.', 'virtue' ); ?>
			</div>
			<?php get_search_form();
		endif;
		?>
		<div class="kt_archivecontent event-archive-content"> 
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
		</div> 
		<?php
		/**
		* @hooked virtue_pagination - 10
		*/
		do_action( 'virtue_pagination' );
		?>

		</div><!-- /.main -->
		<?php
			/**
			 * Sidebar Action
			 *
			 * @hooked virtue_sidebar_markup - 10
			 */
			do_action( 'virtue_sidebar' );
			?>
			</div><!-- /.row-->
			<?php do_action( 'kt_after_content' ); ?>
		</div><!-- /.content -->
	</div><!-- /.wrap -->
<?php
get_footer();
