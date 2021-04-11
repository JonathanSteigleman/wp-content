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
      if( have_rows('header_area') ): //have rows goes through parent category
          while ( have_rows('header_area') ) : the_row(); //have rows goes through parent category again
            $bg_image = get_sub_field('background_header_image'); //var
            $title_color = get_sub_field('header_title_color'); //var
          endwhile; //end while
      else : //else
          // no rows found
      endif; //end if

?>

<!--Elise's Header-->
<!--The user is able to input their own picture and text for the category header background and summary.-->
<!--The category heading is pulled from the page title using single_post_title();-->
<div class="jumbotron bg-cover text-white" style="background: url(<?php echo $bg_image ?>"> <!--https://www.web-eau.net/blog/examples-header-bootstrap-->
    <div class="container py-5 text-center">
        <h1 style="color: <?php echo $title_color ?>" class="display-4 font-weight-bold"><?php single_post_title(); ?></h1> <!--https://stackoverflow.com/questions/27653694/how-to-get-page-title-in-wordpress-->
        <!--Grab description from ACF and display on picture for category heading.-->
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
            if( have_rows('description_group') ): //have rows goes through parent category
                while ( have_rows('description_group') ) : the_row(); //have rows goes through parent category again
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
      if( have_rows('contact_group') ): //have rows goes through parent category
          while ( have_rows('contact_group') ) : the_row(); //have rows goes through parent category again
            $contact_info = get_sub_field('contact_info'); //puts contact info (the contact header) into a variable
            $contact_image = get_sub_field('image'); //var
            $contact_name = get_sub_field('name'); //var
            $contact_street_address = get_sub_field('street_address'); //var
            $contact_city_zip_state = get_sub_field('city_zip_state'); //var
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

            <img class="contact_image" src="<?php echo $contact_image['url'] ?>" title="<?php echo ($contact_image['title']); ?>" alt="<?php echo ($contact_image['alt']); ?>" />


            <ul class= "no-bullets"> <!-- Unordered list to provide spacing -->
                <li> <?php echo $contact_name ?> </li>                 <!-- display's contact name -->
                <li> <?php echo $contact_street_address ?> </li>       <!-- display contact address -->
                <li> <?php echo $contact_city_zip_state ?> </li>       <!-- display's conatact address -->
                <li> <?php echo $contact_number ?> </li>               <!-- should display phone number when fixed -->
            </ul> <!-- Unordered list to provide spacing -->

          </div><!-- end card body div -->
      </div><!-- End card div -->
    </div><!-- End col -->


    </div><!-- end row -->
</div><!-- end container -->

<?php
$fields = count(acf_get_fields('group_6045119685af7')); //Gets the id of the category page field group
$tracker = 1; //loop counter
for($i = 1; $i < ($fields - 5); $i++){ //loops through the category page fields and subtracts the non category fields to remove some looping.
    if(round($tracker % 2) == 1){
      firstRow($tracker); //gets the first row from functions.php
    }
    else{
      secondRow($tracker); //gets the second row from functions.php
    }
    $tracker++;
  }
?>

  <!-- end content section -->

  <?php
  // calls the footer
  get_footer();
  ?>
