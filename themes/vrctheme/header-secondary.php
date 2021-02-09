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
<div class="container">
        <div class="container">    
        <a class="icon" onclick="showMobileNav()"><i class="fa fa-bars"></i></a>
        <!--<a class="closeIcon" onclick=""></a><i class="fa fa-times" aria-hidden="true"></i>-->
        <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'top-menu',
                    'menu_class' => 'main-menu-responsive',
                    'menu_id' => 'responsiveMenu'
                )
            );
        ?> 
        

            <div class="site-logo small-screen-logo">
                <!--Have the logo link to the home page of the website-->
                <a class="home" href="<?php echo get_home_url(); ?>"> 
                <?php 
                    if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    }
                ?>
                </a>
            </div>

            <?php get_search_form(); ?>
        </div>
        </div>
        
        <div class="container">
        <?php
                wp_nav_menu(        
                    array(        
                        'theme_location' => 'top-menu',        
                        'menu_class' => 'main-menu'        
                    )
                );
            ?>       
        </div>
</header>