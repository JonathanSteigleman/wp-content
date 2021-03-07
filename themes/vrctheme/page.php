<?php
//////////////////////////////////////////////////////////////////////////////
// The generic page template
// This simply calls the title of the page and any content added by the user
// Uses the main header
//////////////////////////////////////////////////////////////////////////////
get_header();
?>

<div class="page-wrap">
<div class="container">
    <!-- get the title of the page -->
    <h1><?php the_title();?></h1>
    <!-- get the content of the page -->
    <?php get_template_part('includes/section', 'content');?>

</div>
</div>

<?php
// calls the footer
get_footer();
?>
