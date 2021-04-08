<!--pull content from the database if there is content to pull-->
<?php if( have_posts() ): while( have_posts() ): the_post();?>

    <?php the_content();?>

    <p class="post_details pt-4">Updated: <?php echo get_the_date(); ?></p>
    <p class="post_details">Author: 
        <?php
            //get the first and last name of the author
            $first = get_the_author_meta('first_name');
            $last = get_the_author_meta('last_name');
        
            //display the first and last name of the author
            echo $first . ' ' . $last
        ?>
    </p>

    <?php
        // create tags variable
        $tags = get_the_tags();

        if ($tags):?>
            <!-- If there are tags present, display a "Tags" header -->             
            <h5 class="pt-4">Tags</h5>

            <!-- display the tags as a link --> 
            <?php foreach($tags as $tag):?>
                <a class="btn btn-light mr-2" href="<?php echo get_tag_link($tag->term_id)?>">
                    <?php echo $tag->name;?>
                </a>
            <?php endforeach; endif;?>

<?php endwhile; else: endif;?>