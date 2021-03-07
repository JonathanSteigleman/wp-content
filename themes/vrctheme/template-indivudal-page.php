<?php 
/*
Template Name: Individual Page
Jaxon Harvey
*/
get_header();
?>


<div class="page-wrap">
<div class="container">
<h1><?php the_title();?></h1>
    <?php get_template_part('includes/section', 'content');?>

    <!-- Row 1 of Categories -->
    <div class="row pb-4">
            <?php
                // Initialize catNum to 1
                // This will be used to incriment through categories in the while loop
                $catNum = 1;

                // while we are at a category number under 4
                while ( $catNum < 4):
                // set the value of $category equal to category_ plus the value of $catNum
                $category = "category_".$catNum;
                // set the current category to the ACF value with the name equal to $category
                $currentCat = get_field($category);

                //if there is content in this category
                if ($currentCat): ?>
                    <div class="col-lg-6 col-md-auto col-sm-auto">
                        <div class="card">
                            <!-- get the URL of the image added in this category -->
                            
                            <div class="card-body">
                                <!-- get title added in this category -->
                                <h4><?php echo $currentCat['title'];?></h4>
                                <?php echo $currentCat['category_description'];?>
                                <h4><?php echo $currentCat['contact_info'];?></h4>
                                <img class="contact_image" src="<?php echo esc_url($currentCat['image']);?>"/>

                                <ul> <!-- Unordered list to provide spacing -->
                                <li> <?php echo $currentCat['name'];?> </li>
                                <li> <?php echo $currentCat['address'];?> </li>
                                <li> <?php echo $currentCat['number'];?> </li>
                                </ul> <!-- Unordered list to provide spacing -->

                            </div><!-- end card body div -->
                        </div><!-- End card div -->
                        </div><!-- End col -->

                    <!-- end the if statement -->
                    <?php endif ?>

                    <!-- increase category number -->
                    <?php $catNum++;?>

                <!-- end the while loop -->
                <?php endwhile ?> 
                
    </div><!-- end row -->
</div><!-- end container -->


<?php get_footer();?>
<!-- Include footer at bottom of page -->