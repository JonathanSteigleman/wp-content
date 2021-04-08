<?php
//////////////////////////////////////////////////////////////////////////////
// The archive page template
// 
// Uses the main header
//////////////////////////////////////////////////////////////////////////////
get_header();
?>

<div class="page-wrap pb-5">
<div class="container">

    <h2><?php get_the_archive_title();?></h2>
    <!-- get the content of the page -->
    <?php get_template_part('includes/section', 'archive');?>

    <?php

//    previous_posts_link();
  //  next_posts_link();

    ?>

    <div class="row justify-content-center">
        <div class="col-md-auto">
            <?php
            //This is to allow moving the the paginated posts.
            //Due to high volume of posts, we will allow this to show numbers as well as "next" and "previous"
            
            global $wp_query;

            $big = 999999999; //number that will most likely never be reached

            echo paginate_links( array (
                'base' => str_replace ($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages
            ));
            ?>
        </div>
    </div>

</div>
</div>

<?php
// calls the footer
get_footer();
?>