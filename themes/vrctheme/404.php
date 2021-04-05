<?php
/*
 * Template Name: 404 Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header"> <!-- Title Header, Top of page -->
				<h1 class="page-title"><?php _e( '404 Page Not Found'); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content"> <!-- This class is the Three lines of text under the Title, (one is header to be bolded) -->
					<h3><?php _e( 'It looks like nothing was found at this location. Maybe try a search?'); ?></h3>
                    <p><?php _e ( 'Could you please contact us below and notify us the broken page or link?' ); ?></p>
					<p><?php _e( "This is embarrassing, isn't it?" ); ?></p>

					<?php get_search_form(); ?> <!-- Allows for them to make a search onm the 404 Page -->
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>