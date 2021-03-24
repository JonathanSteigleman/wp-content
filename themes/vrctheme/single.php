<?php 
//////////////////////////////////////////////////////////////////////////////
// The generic post template
// This simply calls the title of the page and any content added by the user
// Uses the main header
//////////////////////////////////////////////////////////////////////////////


get_header();
?>
<div class="page-wrap">
<div class="container pb-5">
    <!-- get the title of the page -->
    <h2><?php the_title();?></h2>

    <!-- get the content of the post -->
    <div class=""><?php get_template_part('includes/section', 'blogcontent');?></div>

</div>
</div>

<?php
// calls the footer
get_footer();
?>