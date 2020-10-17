<!-- the front page will use the secondar header -->
<?php get_header('secondary');?>

<div class="page-wrap">
<div class="container">

    <h1><?php the_title();?></h1>

    <?php get_template_part('includes/section', 'content');?>

</div>
</div>


<?php get_footer();?>