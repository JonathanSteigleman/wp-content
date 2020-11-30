
<?php get_header();?>
<header class="page-header">


</header>

<div class="page-wrap">
<div class="container">

  <h1 class="page-title">
    <?php _e( 'Search results for: ', 'vrctheme' ); ?>
    <span class="page-description"><?php echo get_search_query(); ?></span>
  </h1>

    <?php if ( have_posts() ) { ?>
                <ul>
                <?php while ( have_posts() ) { the_post(); ?>

                   <li>
                     <h3><a href="<?php echo get_permalink(); ?>">
                       <?php the_title();  ?>
                     </a></h3>
                     <?php  the_post_thumbnail('medium') ?>
                     <?php echo substr(get_the_excerpt(), 0,200); ?>
                     <div class="h-readmore"> <a href="<?php the_permalink(); ?>">Read More</a></div>
                   </li>

                <?php } ?>

                </ul>

               <?php echo paginate_links(); ?>

            <?php } ?>

<?php/*
Used the headers and footers, put the title in h2 to make it kinda fit and
put the results in h4.
Used page wrap, container, etc. from searchpage.php, which I believe got socket_recvfrom
page.php
Referenced: https://stackoverflow.com/questions/14802498/how-to-display-wordpress-search-results
*/?>
</div>
</div>
<?php get_footer();?>


<!-- .page-header -->
