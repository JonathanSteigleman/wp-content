<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- pulls the site title and description -->
    <meta name="<?php get_bloginfo($show = 'name')?>" content="<?php get_bloginfo($show = 'description')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- WP Hook to make the header usable with widgets and/or plugins -->
    <?php wp_head();?>

</head>
<body>
    
<!--
    
    The Header will be used for all pages except the front-page.
    The nav should stay consistent between pages

 -->


<header>
<?php 
//get the link of the custom logo for the website
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>

<nav class="navbar navbar-expand-xl navbar-light bg-light" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo get_home_url(); ?>"> 
    <?php 
        if ( $image ) {
            //if the custom logo exists, display it
            ?>
            <img class="custom-logo" src="<?php echo $image[0]; ?>">
            <?php
        }
        else {
            //otherwise, show the name of the site
            ?><h1 class="navbar-brand"><?php echo get_bloginfo('name');?></h1><?php
        }
    ?>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'navbarSupportedContent',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>

        <?php get_search_form()?>
        </div>
</nav>
</header>