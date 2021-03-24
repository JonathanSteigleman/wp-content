<!--pull content from the database if there is content to pull-->
<?php if( have_posts() ): while( have_posts() ): the_post();?>

    <!-- style the archives with bootstrap -->
    <div class="card mb-3">
        <div class="card-body">    
            <!-- get the title of the page -->
            <h3><?php the_title();?></h3>

            <!-- portion of content from the post -->    
            <?php the_excerpt();?>

            <!-- Link to the post & display as a button -->
            <a href="<?php the_permalink();?>" class="btn btn-primary">Read More</a>
        </div>
    </div>

<?php endwhile; else: endif;?>