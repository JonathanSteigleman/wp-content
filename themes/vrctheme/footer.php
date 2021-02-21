

<!-- WP Hook to make the footer usable with widgets and/or plugins -->
<?php wp_footer();?>

<footer class="page-footer no-gutters pb-5">
  <!--<div style="background-color: #F5F5F5;">-->
  <div class="row d-flex align-items-center">
  <div class="container text-center text-md-left mt-5">

    <div class="row mt-3 dark-grey-text">

      <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
          <?php if ( is_active_sidebar( 'footer_area_1' ) ) : ?>
              <div id="footer_area_1" class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'footer_area_1' ); ?>
              </div><!-- #primary-sidebar -->

              <?php else: ?>

              <h6>Pages</h6>
              
              <?php
              wp_nav_menu( array(        
                  'theme_location' => 'footer-menu',        
                  'menu_class' => 'footer'        
                ) );
              ?>
          <?php endif; ?>
      </div>


      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <?php if ( is_active_sidebar( 'footer_area_2' ) ) : ?>
              <div id="footer_area_2" class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'footer_area_2' ); ?>
              </div><!-- #primary-sidebar -->
            
          <?php else: ?>
          <!-- Links -->
          <h4>Pages</h4>
          
          <?php
          wp_nav_menu( array(        
              'theme_location' => 'other-links-menu',        
              'menu_class' => 'other-links'       
            ) );
          ?>

          <?php endif; ?>
        


      </div>

      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <?php if ( is_active_sidebar( 'footer_area_3' ) ) : ?>
              <div id="footer_area_3" class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'footer_area_3' ); ?>
              </div><!-- #primary-sidebar -->
          <?php endif; ?>

      </div>

      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <?php if ( is_active_sidebar( 'footer_area_4' ) ) : ?>
              <div id="footer_area_4" class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'footer_area_4' ); ?>
              </div><!-- #primary-sidebar -->
          <?php endif; ?>
      </div>
    </div>
  <!--</div>-->
</div>
</div>
</footer>

</body>
</html>