
<?php get_header();?>

<div class="page-wrap">
<div class="container">

  <h2 class="page-title"><b> <!-- Title is bold, please don't change. - Elise-->
    <?php _e( 'Search results for: ', 'vrctheme' ); ?>
    <span class="page-description"><?php echo get_search_query(); ?></span>
  </b></h2>
<hr></hr>
    <?php if ( have_posts() ) { ?>
                <ul>
                <?php while ( have_posts() ) { the_post(); ?> <!-- Loop until there are no more posts to display -->
                  <div class="card">

                      <div class="card-body">


                     <h4><b>
                       <?php the_title();  ?> <!-- Title of article, please don't change. -->
                     </b></h4>
                     <?php  the_post_thumbnail('medium') ?>
                     <?php echo substr(get_the_excerpt(), 0,200); ?>
                     <br> <br>
                   <a href="<?php the_permalink(); ?>"<button type="button" class="btn btn-primary">Read More</button></a>
                     <br></br>

</div>
</div>
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
