<!--
    Template Applied to the static Front-Page of the WordPress Site
    The front page will use the secondar header to allow for an alternate design from the main pages
    The front page uses the Advanced Custom Fields (ACF) plugin to enhance the design while adding ease of use for the end user

    Main Contributer: Kali Crockett
-->

<?php
    //Calling the Secondary Header
    get_header('secondary');

    //Calling the Home ACF group
    acf_add_local_field_group('Home');

    //creating variables pulled from data in the Home ACF group
    $left_side = get_field('left_side');
    $right_side = get_field('right_side');
?>

<!-- The Hero area at the top of the Page -->
<div class="jumbotron-fluid" style="background:  linear-gradient(rgba(112, 112, 112, 0.45), rgba(245, 245, 245, 0.5)), url(<?php the_field('hero_image');?>); background-size:cover;">
    <div class="row align-items-start">
        <div class="container-fluid">
            <div class="col-lg-5 col-md-10 col-sm-12" id="announcements">
                <!-- Place the Heading from the Home ACF group -->
                <h3><?php the_field('hero_heading');?></h3>

                <!-- Place the content/summary from the Home ACF group -->
                <p class="mt-2"><?php the_field('hero_content');?></p>

                <!-- Create a link for the button from the Home ACF group -->
                <a href="<?php the_field('hero_button');?>"><button type="button" class="btn btn-primary mt-2">Read More</button></a>
            </div>
        </div>
    </div>
</div>


<div class="page-wrap">
<div class="container">
    <!-- Place Section 1 Header from the Home ACF group -->
    <div class="pt-5 pb-5"><h2 class="home-section-headings"><?php the_field('section_1_header');?></h2></div>

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
                $image = $currentCat['image'];

                //if there is content in this category
                if ($currentCat): ?>
                    <div class="col-lg-4 col-md-auto col-sm-auto">
                        <div class="card">
                            <!-- get the URL of the image added in this category -->
                            <img class="card-img-top" src="<?php echo esc_url($image['url']);?>" title="<?php echo ($image['title']); ?>" alt="<?php echo ($image['alt']); ?>"/>
                            <div class="card-body">
                                <!-- get title added in this category -->
                                <h4><?php echo $currentCat['title'];?></h4>
                                <!-- get the summary added in this category --> 
                                <p class="card-text"><?php echo $currentCat['summary'];?></p>
                                <!-- get the button link added in this category -->
                                <a href="<?php echo esc_url($currentCat['button']);?>"><button class="btn btn-primary">Read More</button></a>
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

    <!-- Row 1 of Categories -->
    <div class="row pb-5">
            <?php
                // Initialize catNum to 4
                // This will be used to incriment through categories in the while loop
                $catNum = 4;

                // while we are at a category number under 7
                while ( $catNum < 7):

                // set the value of $category equal to category_ plus the value of $catNum
                $category = "category_".$catNum;
                // set the current category to the ACF value with the name equal to $category
                $currentCat = get_field($category);
                $image = $currentCat['image'];

                //if there is content in this category
                if ($currentCat): ?>
                    <div class="col-lg-4 col-md-auto col-sm-auto">
                        <div class="card">
                            <!-- get the URL of the image added in this category -->
                            <img class="card-img-top" src="<?php echo($image['url']);?>" title="<?php echo ($image['title']); ?>" alt="<?php echo ($image['alt']); ?>"/>
                            <div class="card-body">
                                <!-- get title added in this category -->
                                <h4><?php echo $currentCat['title'];?></h4>
                                <!-- get the summary added in this category -->  
                                <p class="card-text"><?php echo $currentCat['summary'];?></p>
                                <!-- get the button link added in this category -->
                                <a href="<?php echo esc_url($currentCat['button']);?>"><button class="btn btn-primary">Read More</button></a>
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

        <!-- two sided section using the two variables that were called at the beginning of the document -->
        <div class="row mt-5 no-gutters">
            <div class="col-lg-6 left-side">
                <!-- call the title of the left side -->
                <h3 class="mb-4"><?php echo $left_side['title'];?></h3>
                <!-- call the description text of the left side -->
                <p class="mb-4"><?php echo $left_side['description'];?></p>
                <!-- call the button URL and text of the left side -->
                <a href="<?php echo esc_url($left_side['button_link']);?>"><button class="btn btn-default"><?php echo $left_side['button_text'];?></button></a>
                
                <!-- Messing with credit card images -->
                <div class="row  justify-content-center mt-4">
                    <div class="col-xl-9 col-lg-12 col-md-7">
                        <div class="row">
                        <?php
                        $cardNum = 1;

                        $card_type = $left_side['card_types'];
                        
                        while($cardNum < 7):
                            $currentCard = ("card_".$cardNum);
                            if(!empty($card_type[$currentCard])):?>
                            
                            <img class="col-md-2 align-center pr-0 credit_card" src="<?php echo esc_url($card_type[$currentCard]['url'])?>" alt="<?php echo $card_type[$currentCard]['alt'] ?>"/>
                            <?php 
                            
                            endif;
                                $cardNum++;
                        endwhile;?>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
            
            <div class="col-lg-6 right-side">
                <!-- call the title of the right side -->
                <h3 class="mb-4"><?php echo $right_side['title'];?></h3>
                <!-- call the description text of the right side -->
                <p class="mb-4"><?php echo $right_side['description'];?></p>
                <!-- call the button URL and text for the right side -->
                <a href="<?php echo esc_url($right_side['button_link']);?>"><button class="btn btn-default"><?php echo $right_side['button_text'];?></button></a>

                <!-- Messing with credit card images -->
                <div class="row  justify-content-center mt-4">
                    <div class="col-xl-9 col-lg-12 col-md-7">
                        <div class="row">
                        <?php
                        $cardNum = 1;

                        $card_type = $right_side['card_types'];
                        
                        while($cardNum < 7):
                            $currentCard = ("card_".$cardNum);
                            if(!empty($card_type[$currentCard])):?>
                            
                            <img class="col-md-2 align-center pr-0 credit_card" src="<?php echo esc_url($card_type[$currentCard]['url'])?>" alt="<?php echo $card_type[$currentCard]['alt'] ?>"/>
                            <?php endif;
                                $cardNum++;
                        endwhile;?>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->
        </div><!-- end row -->
</div>

<!-- Get the footer -->
<?php get_footer();?>