<?php
?>

<?php get_header();?>

<div class="page-wrap">

  
<div class="container">
      <h1><?php the_title();?></h1>


      <div class="row pt-4">
          <div class="col-md-7">
              <!-- Contact Form -->
                <div class="row-fluid contact-form">
                      <div class="col-sm-5 input-fields">
                        <input type="text" class="input" placeholder="Name">
                        <input type="text" class="input" placeholder="Email Address">
                        <input type="text" class="input" placeholder="Phone">
                        <input type="text" class="input" placeholder="Subject">
                      </div><!-- End input-fields -->
                      <div class="col-sm-7 msg">
                        <textarea placeholder="Message"></textarea>
                        <button type="submit" class="btn btn-primary btn-block mt-2 text-uppercase">send</button>
                      </div><!-- end msg -->
                </div><!-- end contact-form -->
                
          </div><!-- end col-md-7 -->


          <div class="col-md-5 pl-5">
              
              <?php get_template_part('includes/section', 'content');?> 
          
          </div><!-- end col -->
      </div><!-- end row -->

  </div><!-- end container -->

</div><!-- end page-wrap -->

<?php get_footer();?>