<!--pull content from the database if there is content to pull-->
<?php if( have_posts() ): while( have_posts() ): the_post();?>

    <?php the_content();?>

<?php endwhile; else: endif;?>