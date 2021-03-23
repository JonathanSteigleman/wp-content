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

<!--Elise's Header-->
<!--The user is able to input their own picture and text for the category header background and summary.-->
<!--The category heading is pulled from the page title using single_post_title();-->
<div class="jumbotron bg-cover text-white" style="background: url(<?php the_field('background_header_image');?>"> <!--https://www.web-eau.net/blog/examples-header-bootstrap-->
    <div class="container py-5 text-center">
        <h1 style="color:black;" class="display-4 font-weight-bold"><?php single_post_title(); ?></h1> <!--https://stackoverflow.com/questions/27653694/how-to-get-page-title-in-wordpress-->
        <!--Grab description from ACF and display on picture for category heading.-->
        <p class="font-italic mb-0" style="color:black"><?php the_field('category_description');?></p>
    </div>
</div>

























<div class="page-wrap">
<div class="container">

    <!-- Row 1 of Categories -->
    <div class="row pb-4">


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
    <!-- get title added in this category -->
    <!-- displays header via contact_info (that is the field name) -->













</div> <!-- End Col -->

















<?php
//ALL SUBFIELDS HAVE TO GO THROUGH HAVE_ROWS() . I JUST LEARNED THIS - ELISE
      if( have_rows('category_9') ): //have rows goes through parent category
          while ( have_rows('category_9') ) : the_row(); //have rows goes through parent category again
            $contact_info = get_sub_field('contact_info'); //puts contact info (the contact header) into a variable
            $contact_image = get_sub_field('image'); //var
            $contact_name = get_sub_field('name'); //var
            $contact_address = get_sub_field('address'); //var
            $contact_image = get_sub_field('image');
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
                              <li> <p>Need to fix number field</p></li>    <!-- should display phone number when fixed -->
                              </ul> <!-- Unordered list to provide spacing -->


                            </div><!-- end card body div -->
                        </div><!-- End card div -->
                    </div><!-- End col -->


    </div><!-- end row -->
</div><!-- end container -->
























<div class="page-wrap">
<div class="container">
	<div class="row pb-4">
            <?php
                // Initialize catNum to 1
                // This will be used to incriment through categories in the while loop
                $catNum = 1;

                // while we are at a category number under 4
                while ( $catNum < 5):
                // set the value of $category equal to category_ plus the value of $catNum
                $category = "category_".$catNum;
                // set the current category to the ACF value with the name equal to $category
                $currentCat = get_field($category);
                $subCat = $currentCat['loc_details'];
                $map = $subCat['address'];

                //if there is content in this category
                if ($currentCat): ?>

                    <div class="col-lg-6 col-md-auto col-sm-auto" >

                        <div class="container" style="background-color:<?php the_field('color_1'); ?>">

                            <h4><?php echo $currentCat['title'];?></h4>


                            <p class="card-text"><?php echo $currentCat['category_discription'];?></p>


                            <a href="<?php echo $currentCat['location_1'];?>"><?php echo $currentCat['location_1'];?></a>
                        </div>

                        <div class="container" style="background-color:<?php the_field('color_2'); ?>">
                          <!-- I changed the heading and color for the below location title -->
                            <h5 style="color:#1E3B7C;"><?php echo $subCat['location_name'];?></h5>
                            <?php
                            if( $map): ?>


                                <div class="acf-map" data-zoom="16">
                                    <div class="marker" data-lat="<?php echo esc_attr($map['lat']); ?>" data-lng="<?php echo esc_attr($map['lng']); ?>"></div>
                                 </div>
                            <?php endif; ?>
                            <?php echo $subCat['phone_number'];?>
                        </div><br>
                        <!--I added a br tag above to separate category sections -Elise -->

                    </div>
                <?php endif ?>
            <?php $catNum++;?>
                <?php endwhile ?>
    </div>
</div>
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
























<?php
// calls the footer
get_footer();
?>
