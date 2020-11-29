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

</div>
</div>
<?php get_footer();?>
