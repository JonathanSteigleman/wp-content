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
    
    The Secondary Header will be used for the Front Page of the website.

 -->

<header>
<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo get_home_url(); ?>"> 
    <?php 
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }
        else {
            get_bloginfo( 'name' );
        }
    ?>
    </a>
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
    </div>
</nav>
</header>