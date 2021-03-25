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
<div class="jumbotron bg-cover text-white" style="background: url(<?php echo $bg_image ?>"> <!--https://www.web-eau.net/blog/examples-header-bootstrap-->
    <div class="container py-5 text-center">
        <h1 style="color: <?php echo $title_color ?>" class="display-4 font-weight-bold"><?php single_post_title(); ?></h1> <!--https://stackoverflow.com/questions/27653694/how-to-get-page-title-in-wordpress-->
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
            if( have_rows('category_10') ): //have rows goes through parent category
                while ( have_rows('category_10') ) : the_row(); //have rows goes through parent category again
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
      if( have_rows('category_9') ): //have rows goes through parent category
          while ( have_rows('category_9') ) : the_row(); //have rows goes through parent category again
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

            <img class="contact_image" src="<?php echo $contact_image ?>"/>


            <ul> <!-- Unordered list to provide spacing -->
                <li> <p><?php echo $contact_name ?></p> </li>     <!-- display's contact name -->
                <li> <p><?php echo $contact_address ?></p> </li>     <!-- display's conatact address -->
                <li> <p><?php echo $contact_number ?></p></li>    <!-- should display phone number when fixed -->
            </ul> <!-- Unordered list to provide spacing -->


          </div><!-- end card body div -->
      </div><!-- End card div -->
    </div><!-- End col -->


    </div><!-- end row -->
</div><!-- end container -->













<?php
//ALL SUBFIELDS HAVE TO GO THROUGH HAVE_ROWS() . I JUST LEARNED THIS - ELISE
      if( have_rows('category_1') ): //have rows goes through parent category
          while ( have_rows('category_1') ) : the_row(); //have rows goes through parent category again

            $titleC1 = get_sub_field('title'); //var
            $category_descriptionC1 = get_sub_field('category_discription'); //var

            $c1URLTITLE1 = get_sub_field('location_1_title'); //var
            $c1URL1 = get_sub_field('location_1'); //var
            $c1URLTITLE2 = get_sub_field('location_2_title'); //var image
            $c1URL2 = get_sub_field('location_2'); //var
            $c1URLTITLE3 = get_sub_field('location_3_title'); //var image
            $c1URL3 = get_sub_field('location_3'); //var

          endwhile; //end while
      else : //else
          // no rows found
      endif; //end if
//Elise
?>




<?php
//ALL SUBFIELDS HAVE TO GO THROUGH HAVE_ROWS() . I JUST LEARNED THIS - ELISE
      if( have_rows('category_2') ): //have rows goes through parent category
          while ( have_rows('category_2') ) : the_row(); //have rows goes through parent category again



            $c2PhoneNumber = get_sub_field('phone_number'); //var
            $c2Address = get_sub_field('address'); //var
            $c2LocationName = get_sub_field('location_name'); //var image


          endwhile; //end while
      else : //else
          // no rows found
      endif; //end if
//Elise
?>




<div class="row mt-5 no-gutters">

<div class="col-lg-6 left-side">
        <!-- title of description -->
        <h3 class="mb-4"><?php echo $titleC1;?></h3>

        <!-- description of category -->
        <p class="mb-4"><?php echo $category_descriptionC1;?></p>

        <a href="<?php echo $c1URL1;?>"><?php echo $c1URLTITLE1; ?></a>
        <a href="<?php echo $c1URL2;?>"><?php echo $c1URLTITLE2; ?></a>
        <a href="<?php echo $c1URL3;?>"><?php echo $c1URLTITLE3; ?></a>

</div> <!-- End Col -->

<div class="col-lg-6 right-side">
      <h3 class="mb-4"><?php echo $c2LocationName;?></h3>
    <!-- call the description text of the right side -->
    <p class="mb-4"><?php echo $c2PhoneNumber;?></p>

    <?php
    if( $c2Address): ?>
        <div class="acf-map" data-zoom="16">
            <div class="marker" data-lat="<?php echo esc_attr($c2Address['lat']); ?>" data-lng="<?php echo esc_attr($c2Address['lng']); ?>"></div>
         </div>
    <?php endif; ?>

  </div><!-- end col -->
  </div>










  <?php
  //ALL SUBFIELDS HAVE TO GO THROUGH HAVE_ROWS() . I JUST LEARNED THIS - ELISE
        if( have_rows('category_3') ): //have rows goes through parent category
            while ( have_rows('category_3') ) : the_row(); //have rows goes through parent category again



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
      if( have_rows('category_4') ): //have rows goes through parent category
          while ( have_rows('category_4') ) : the_row(); //have rows goes through parent category again

            $titleC4 = get_sub_field('title'); //var
            $category_descriptionC4 = get_sub_field('category_description'); //var

            $c4URLTITLE1 = get_sub_field('location_1_title'); //var
            $c4URL1 = get_sub_field('location_1'); //var
            $c4URLTITLE2 = get_sub_field('location_2_title'); //var image
            $c4URL2 = get_sub_field('location_2'); //var
            $c4URLTITLE3 = get_sub_field('location_3_title'); //var image
            $c4URL3 = get_sub_field('location_3'); //var

          endwhile; //end while
      else : //else
          // no rows found
      endif; //end if
//Elise
?>

<div class="row no-gutters">

  <div class="col-lg-6 right-side">
        <h3 class="mb-4"><?php echo $c3LocationName;?></h3>
      <!-- call the description text of the right side -->
      <p class="mb-4"><?php echo $c3PhoneNumber;?></p>

      <?php
      if( $where): ?>
          <div class="acf-map" data-zoom="16">
              <div class="marker" data-lat="<?php echo esc_attr($where['lat']); ?>" data-lng="<?php echo esc_attr($where['lng']); ?>"></div>
           </div>
      <?php endif; ?>

    </div><!-- end col -->

<div class="col-lg-6 left-side">
        <!-- title of description -->
        <h2 class="mb-4"><b><?php echo $titleC4;?></b></h2>

        <!-- description of category -->
        <p class="mb-4"><?php echo $category_descriptionC4;?></p>

        <a href="<?php echo $c4URL1;?>"><?php echo $c4URLTITLE1; ?></a>
        <a href="<?php echo $c4URL2;?>"><?php echo $c4URLTITLE2; ?></a>
        <a href="<?php echo $c4URL3;?>"><?php echo $c4URLTITLE3; ?></a>

</div> <!-- End Col -->
</div>

























<style type="text/css">
.acf-map {
    width: 100%;
    height: 400px;
    border: #ccc solid 1px;
    margin: 20px 0;
}

// Fixes potential theme css conflict.
.acf-map img {
   max-width: inherit !important;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXIsJLL3X3SPSIH3pSoTtiBK4iTeMyu10"></script>
<script type="text/javascript">
(function( $ ) {

/**
 * initMap
 *
 * Renders a Google Map onto the selected jQuery element
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @return  object The map instance.
 */
function initMap( $el ) {

    // Find marker elements within map.
    var $markers = $el.find('.marker');

    // Create gerenic map.
    var mapArgs = {
        zoom        : $el.data('zoom') || 16,
        mapTypeId   : google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map( $el[0], mapArgs );

    // Add markers.
    map.markers = [];
    $markers.each(function(){
        initMarker( $(this), map );
    });

    // Center map based on markers.
    centerMap( map );

    // Return map instance.
    return map;
}

/**
 * initMarker
 *
 * Creates a marker for the given jQuery element and map.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @param   object The map instance.
 * @return  object The marker instance.
 */
function initMarker( $marker, map ) {

    // Get position from marker.
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = {
        lat: parseFloat( lat ),
        lng: parseFloat( lng )
    };

    // Create marker instance.
    var marker = new google.maps.Marker({
        position : latLng,
        map: map
    });

    // Append to reference for later use.
    map.markers.push( marker );

    // If marker contains HTML, add it to an infoWindow.
    if( $marker.html() ){

        // Create info window.
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });

        // Show info window when marker is clicked.
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open( map, marker );
        });
    }
}

/**
 * centerMap
 *
 * Centers the map showing all markers in view.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   object The map instance.
 * @return  void
 */
function centerMap( map ) {

    // Create map boundaries from all map markers.
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function( marker ){
        bounds.extend({
            lat: marker.position.lat(),
            lng: marker.position.lng()
        });
    });

    // Case: Single marker.
    if( map.markers.length == 1 ){
        map.setCenter( bounds.getCenter() );

    // Case: Multiple markers.
    } else{
        map.fitBounds( bounds );
    }
}

// Render maps on page load.
$(document).ready(function(){
    $('.acf-map').each(function(){
        var map = initMap( $(this) );
    });
});

})(jQuery);
</script>
<!-- end content section -->


<?php
// calls the footer
get_footer();
?>
