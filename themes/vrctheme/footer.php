

    <!-- WP Hook to make the footer usable with widgets and/or plugins -->
    <?php wp_footer();?>

<footer class="page-footer no-gutters">
  <!--<div style="background-color: #F5F5F5;">-->
  <div class="row d-flex align-items-center">
  <div class="container text-center text-md-left mt-5">

    <div class="row mt-3 dark-grey-text">

      <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

        <h6 class="text-uppercase font-weight-bold">Polk Coounty Connections Center</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>


        <?php if ( is_active_sidebar( 'footer_area_one' ) ) : ?>
            <div id="footer_area_one" class="primary-sidebar widget-area" role="complementary">
              <?php dynamic_sidebar( 'footer_area_one' ); ?>
            </div><!-- #primary-sidebar -->
        <?php endif; ?>

      </div>
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Pages</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        
        <?php
        wp_nav_menu( array(        
            'theme_location' => 'footer-menu',        
            'menu_class' => 'footer'        
          ) );
        ?>  


      </div>

      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <h6 class="text-uppercase font-weight-bold">Other links</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <?php
        wp_nav_menu( array(        
            'theme_location' => 'other-links-menu',        
            'menu_class' => 'other-links'        
          ) );
        ?>  

      </div>

      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <h6 class="text-uppercase font-weight-bold">Contact Us</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> Anchorage Alaska, AK 99504, US</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> homeboy@example.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> +01 867-5309</p>
        <p>
          <i class="fas fa-print mr-3"></i> + 01 867-5309</p>

      </div>
    </div>
  <!--</div>-->
</div>
</div>
</footer>

</body>
</html>