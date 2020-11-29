
<?php get_header();?>
<header class="page-header">

<h2 class="page-title">
  <?php _e( 'Search results for: ', 'twentynineteen' ); ?>
  <span class="page-description"><?php echo get_search_query(); ?></span>
</h2>
</header>

<div class="page-wrap">
<div class="container">

    <?php if ( have_posts() ) { ?>
                <ul>
                <?php while ( have_posts() ) { the_post(); ?>

                   <li>
                     <h4><a href="<?php echo get_permalink(); ?>">
                       <?php the_title();  ?>
                     </a></h4>
                     <?php  the_post_thumbnail('medium') ?>
                     <?php echo substr(get_the_excerpt(), 0,200); ?>
                     <div class="h-readmore"> <a href="<?php the_permalink(); ?>">Read More</a></div>
                   </li>

                <?php } ?>

                </ul>

               <?php echo paginate_links(); ?>

            <?php } ?>

<?php/*
Documentation on the get_search_form function -Elise
To access this feature: Create a post or page and then where it says "Search Page" under the template section, select that.
https://developer.wordpress.org/reference/functions/get_search_form/
*/?>
</div>
</div>
<?php get_footer();?>


<!-- .page-header -->
