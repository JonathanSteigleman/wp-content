<?php 
/*
Template Name: Individual Page
Jaxon Harvey
*/
get_header();
acf_add_local_field_group('Category_Description');
?>


<div class="page-wrap">
<div class="container">
<h1><?php the_title();?></h1>
    <!-- ?php get_template_part('includes/section', 'content');? -->

    <!-- Row 1 of Categories -->
    <div class="row pb-4">
            <?php
                // Initialize catNum to 1
                // This will be used to incriment through categories in the while loop

                // $category_1 = "category_1";
                // $category_2 = "category_2";
                
                // set the current category to the ACF value with the name equal to $category
                $category_1 = get_field("category_1");
                $category_2 = get_field("category_2");

                //if there is content in this category
                if ($category_1): ?>
                    <div class="col-lg-6 col-md-auto col-sm-auto">
                        <!-- get title added in this category -->
                        <h4><?php echo $category_1['title'];?></h4>
                        <?php echo $category_1['category_description'];?>
                    </div> <!-- End Col -->
                <?php endif ?> <!-- End If -->


                <?php
                if ($category_2): ?>
                    <div class="col-lg-6 col-md-auto col-sm-auto">
                        <div class="card">

                            <div class="card-body">
                                <h4><?php echo $category_2['contact_info'];?></h4>
                                <img class="contact_image" src="<?php echo esc_url($category_2['image']);?>"/>
                                <!-- get the URL of the image added in this category -->

                                <ul> <!-- Unordered list to provide spacing -->
                                <li> <?php echo $category_2['name'];?> </li>
                                <li> <?php echo $category_2['address'];?> </li>
                                <li> <?php echo $category_2['number'];?> </li>
                                </ul> <!-- Unordered list to provide spacing -->

                            </div><!-- end card body div -->
                        </div><!-- End card div -->
                    </div><!-- End col -->
                    <!-- end the if statement -->
                <?php endif ?>
                
    </div><!-- end row -->
</div><!-- end container -->


<?php get_footer();?>
<!-- Include footer at bottom of page -->