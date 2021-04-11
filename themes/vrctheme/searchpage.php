<?php
/*
Template Name: Search Page
*/
?>
<?php get_header();?>





<div class="page-wrap">
<div class="container">

    <h1><?php the_title();?></h1>


    <?php get_search_form(); ?>
    <?php get_template_part('includes/section', 'content');?>
<?php/*
Documentation on the get_search_form function -Elise
To access this feature: Create a post or page and then where it says "Search Page" under the template section, select that.
https://developer.wordpress.org/reference/functions/get_search_form/
*/?>
</div>
</div>
<br>
<br>
<br>
<br>
<?php get_footer();?>
