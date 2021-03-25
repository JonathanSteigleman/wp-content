<!--pull content from the database if there is content to pull-->
<?php if( have_posts() ): while( have_posts() ): the_post();?>
    
    <?php the_content();?>

    <p class="pt-4">Updated: <?php echo get_the_date(); ?></p>
    <p>Author: 
        <?php
            //get the first and last name of the author
            $first = get_the_author_meta('first_name');
            $last = get_the_author_meta('last_name');
        
            //display the first and last name of the author
            echo $first . ' ' . $last
        ?>
    </p>

    <?php
        //display the tags associated with the post
        $tags = get_the_tags();
        foreach($tags as $tag):?>
            <a href="<?php echo get_tag_link($tag->term_id)?>">
                <?php echo $tag->name;?>
            </a>
    <?php endforeach?>

<?php endwhile; else: endif;?>