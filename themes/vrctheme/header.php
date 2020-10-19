<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="My Sites Description">
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