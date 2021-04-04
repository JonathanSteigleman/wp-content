<?php
/*
Template Name: Category Page Template
*/
?>
<?php
//////////////////////////////////////////////////////////////////////////////
// The generic page template
// This simply calls the title of the page and any content added by the user
// Uses the main header
//////////////////////////////////////////////////////////////////////////////
get_header();

acf_add_local_field_group('Page Template Category Heading');
?>



<?php
//ALL SUBFIELDS HAVE TO GO THROUGH HAVE_ROWS() . I JUST LEARNED THIS - ELISE
if (have_rows('header_area')) : //have rows goes through parent category
  while (have_rows('header_area')) : the_row(); //have rows goes through parent category again
    $bg_image = get_sub_field('background_header_image'); //var
    $category_description = get_sub_field('category_description'); //var
    $title_color = get_sub_field('header_title_color'); //var
    $desc_color = get_sub_field('header_description_color'); //var
  endwhile; //end while
else : //else
// no rows found
endif; //end if

?>

<!--Elise's Header-->
<!--The user is able to input their own picture and text for the category header background and summary.-->
<!--The category heading is pulled from the page title using single_post_title();-->
<div class="jumbotron bg-cover text-white" style="background: url(<?php echo $bg_image ?>">
  <!--https://www.web-eau.net/blog/examples-header-bootstrap-->
  <div class="container py-5 text-center">
    <h1 style="color: <?php echo $title_color ?>" class="display-4 font-weight-bold"><?php single_post_title(); ?></h1>
    <!--https://stackoverflow.com/questions/27653694/how-to-get-page-title-in-wordpress-->
    <!--Grab description from ACF and display on picture for category heading.-->
    <p class="font-italic mb-0" style="color:<?php echo $desc_color ?>"><?php echo $category_description ?></p>
  </div>
</div>




<!--Contact & Category Overview sections --->
<!--- Jaxon's Code, edited by Elise -->

<div class="page-wrap">
  <div class="container">

    <!-- Row 1 of Categories -->
    <div class="row pb-4">

      <!-- https://www.advancedcustomfields.com/resources/get_sub_field/ -->
      <?php
      //ALL SUBFIELDS HAVE TO GO THROUGH HAVE_ROWS() . I JUST LEARNED THIS - ELISE
      if (have_rows('category_10')) : //have rows goes through parent category
        while (have_rows('category_10')) : the_row(); //have rows goes through parent category again
          $category_description_title = get_sub_field('title'); //var
          $category_description = get_sub_field('category_description'); //var
        //^^^^^^^^^^^^^^^^^^^^^^
        endwhile; //end while
      else : //else
      // no rows found
      endif; //end if

      ?>




      <div class="col-lg-6 col-md-auto col-sm-auto">
        <!-- title of description -->
        <h4><?php echo $category_description_title ?></h4>

        <!-- description of category -->
        <p><?php echo $category_description ?></p>

      </div> <!-- End Col -->




      <!--Beginning of column two -->
      <?php
      //ALL SUBFIELDS HAVE TO GO THROUGH HAVE_ROWS() . I JUST LEARNED THIS - ELISE
      if (have_rows('category_9')) : //have rows goes through parent category
        while (have_rows('category_9')) : the_row(); //have rows goes through parent category again
          $contact_info = get_sub_field('contact_info'); //puts contact info (the contact header) into a variable
          $contact_image = get_sub_field('image'); //var
          $contact_name = get_sub_field('name'); //var
          $contact_address = get_sub_field('address'); //var
          $contact_image = get_sub_field('image'); //var image
          $contact_number = get_sub_field('number'); //var
        //number field will go here, the field is the wrong type, currently
        //this needs to be fixed at some point
        //^^^^^^^^^^^^^^^^^^^^^^
        //^^^^^^^^^^^^^^^^^^^^^^
        endwhile; //end while
      else : //else
      // no rows found
      endif; //end if
      //Elise
      ?>




      <div class="col-lg-6 col-md-auto col-sm-auto">
        <div class="card">

          <div class="card-body">

            <h4><?php echo $contact_info ?></h4>

            <img class="contact_image" src="<?php echo $contact_image['url'] ?>" title="<?php echo ($contact_image['title']); ?>"="<?php echo ($contact_image['alt']); ?>" />


            <ul>
              <!-- Unordered list to provide spacing -->
              <li>
                <p><?php echo $contact_name ?></p>
              </li> <!-- display's contact name -->
              <li>
                <p><?php echo $contact_address ?></p>
              </li> <!-- display's conatact address -->
              <li>
                <p><?php echo $contact_number ?></p>
              </li> <!-- should display phone number when fixed -->
            </ul> <!-- Unordered list to provide spacing -->


          </div><!-- end card body div -->
        </div><!-- End card div -->
      </div><!-- End col -->


    </div><!-- end row -->
  </div><!-- end container -->


  <?php
  //ALL SUBFIELDS HAVE TO GO THROUGH HAVE_ROWS() . I JUST LEARNED THIS - ELISE
  if (have_rows('category_2')) : //have rows goes through parent category
    while (have_rows('category_2')) : the_row(); //have rows goes through parent category again



      $c2PhoneNumber = get_sub_field('phone_number'); //var
      $c2Address = get_sub_field('address'); //var
      $c2LocationName = get_sub_field('location_name'); //var image


    endwhile; //end while
  else : //else
  // no rows found
  endif; //end if
  //Elise
  ?>


  <?php
  //ALL SUBFIELDS HAVE TO GO THROUGH HAVE_ROWS() . I JUST LEARNED THIS - ELISE
  if (have_rows('category_1')) : //have rows goes through parent category
    while (have_rows('category_1')) : the_row(); //have rows goes through parent category again

      $count = count(get_field('category_1')); //Counts the number of fields in the group.
      $i = 1; //var to count loops
      $titleC1 = get_sub_field('title'); //var
      $category_descriptionC1 = get_sub_field('category_discription'); //var ?>

      <div class="row mt-5 no-gutters">

        <div class="col-lg-6 left-side">
          <!-- title of description -->
          <h3 class="mb-4"><?php echo $titleC1; ?></h3>

          <!-- description of category -->
          <p class="mb-4"><?php echo $category_descriptionC1; ?></p>

          <?php while ($i <= ($count/2)-1) : //Loop and logic to remove unnecessary looping 

            $c1URLTITLE = get_sub_field('location_'.$i.'_title');
            $c1URL = get_sub_field('location_'.$i.''); ?>

             <h4><a href="<?php echo $c1URL; ?>"><?php echo $c1URLTITLE; ?></a></h4>

            <?php $i++; ?><!-- increment loop counter -->
          <?php endwhile ?>
        </div> <!-- End Col -->

        <div class="col-lg-6 right-side">
          <h3 class="mb-4"><?php echo $c2LocationName; ?></h3>
          <!-- call the description text of the right side -->
          <p class="mb-4"><?php echo $c2PhoneNumber; ?></p>
          <p class="mb-4"><?php echo $c2Address; ?></p>

        </div><!-- end col -->
      </div>

    <?php endwhile ?>
  <?php endif ?>



  <?php
  //ALL SUBFIELDS HAVE TO GO THROUGH HAVE_ROWS() . I JUST LEARNED THIS - ELISE
  if (have_rows('category_3')) : //have rows goes through parent category
    while (have_rows('category_3')) : the_row(); //have rows goes through parent category again

      $c3PhoneNumber = get_sub_field('phone_number'); //var
      $where = get_sub_field('address'); //var
      $c3LocationName = get_sub_field('location_name'); //var image

    endwhile; //end while
  else : //else
  // no rows found
  endif; //end if
  //Elise
  ?>

  <?php
  //ALL SUBFIELDS HAVE TO GO THROUGH HAVE_ROWS() . I JUST LEARNED THIS - ELISE


  if (have_rows('category_4')) : //have rows goes through parent category
    while (have_rows('category_4')) : the_row();  //have rows goes through parent category again
    
      $count = count(get_field('category_4')); //Counts the number of fields in the group.
      $i = 1; //var to count loops
      $titleC4 = get_sub_field('title'); //var
      $category_descriptionC4 = get_sub_field('category_description'); //var
  ?>

      <div class="row no-gutters">

        <div class="col-lg-6 right-side">
          <h3 class="mb-4"><?php echo $c3LocationName; ?></h3>
          
          <!-- call the description text of the right side -->
          <p class="mb-4"><?php echo $c3PhoneNumber; ?></p>
          <p class="mb-4"><?php echo $where; ?></p>

        </div><!-- end col -->

        <div class="col-lg-6 left-side">
          <!-- title of description -->
          <h2 class="mb-4"><b><?php echo $titleC4; ?></b></h2>

          <!-- description of category -->
          <p class="mb-4"><?php echo $category_descriptionC4; ?></p>

          <?php while ($i <= ($count/2)-1) : //Loop and logic to remove unnecessary looping 

            $c4URLTITLE = get_sub_field('location_'.$i.'_title');
            $c4URL = get_sub_field('location_'.$i.''); ?>

            <h4><a href="<?php echo $c4URL; ?>"><?php echo $c4URLTITLE; ?></a></h4>

            <?php $i++; ?> <!-- increment loop counter -->
          <?php endwhile ?>
        </div> <!-- End Col -->
      </div>
    <?php endwhile ?>
  <?php endif ?>
  <!-- end content section -->

  <?php
  // calls the footer
  get_footer();
  ?>