<!-- the front page will use the secondar header -->
<?php
    get_header('secondary');
    acf_add_local_field_group('Home');
?>

<div class="jumbotron-fluid" style="background:  linear-gradient(rgba(112, 112, 112, 0.45), rgba(245, 245, 245, 0.5)), url(<?php the_field('hero_image');?>); background-size:cover;">
    <div class="row align-items-end">
        <div class="col-md-4" id="announcements">
        <h2><?php the_field('hero_heading');?></h2>
        <p class="mt-2"><?php the_field('hero_content');?></p>
        <a href="<?php the_field('hero_button');?>"><button type="button" class="btn btn-primary mt-2">Read More</button></a>
        </div>
    </div>
</div>


<div class="page-wrap">
<div class="container">

    <div class="pt-5 pb-5"><h2 class="home-section-headings"><?php the_field('section_1_header');?></h2></div>

    <!-- Row 1 of Categories -->
    <div class="row pb-4">
            <?php
                $catNum = 1;
                //$category = "category_" + $catnum;

                while ( $catNum < 4):
                $category = "category_".$catNum;
                $currentCat = get_field($category);

                if ($currentCat): ?>
                    <div class="col-lg-4 col-md-auto col-sm-auto">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo esc_url($currentCat['image']);?>"/>
                            <div class="card-body">
                                <h4><?php echo $currentCat['title'];?></h4> 
                                <p class="card-text"><?php echo $currentCat['summary'];?></p>
                                <a href="<?php echo esc_url($currentCat['button']);?>"><button class="btn btn-primary">Read More</button></a>
                            </div><!-- end card body div -->
                        </div><!-- End card div -->
                        </div><!-- End col -->

                    <?php endif ?>

                    <?php $catNum++;?>
                <?php endwhile ?> 
    </div><!-- end row -->

    <!-- Row 1 of Categories -->
    <div class="row">
            <?php
                $catNum = 4;
                //$category = "category_" + $catnum;

                while ( $catNum < 7):
                $category = "category_".$catNum;
                $currentCat = get_field($category);

                if ($currentCat): ?>
                    <div class="col-lg-4 col-md-auto col-sm-auto">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo esc_url($currentCat['image']);?>"/>
                            <div class="card-body">
                                <h4><?php echo $currentCat['title'];?></h4> 
                                <p class="card-text"><?php echo $currentCat['summary'];?></p>
                                <a href="<?php echo esc_url($currentCat['button']);?>"><button class="btn btn-primary">Read More</button></a>
                            </div><!-- end card body div -->
                        </div><!-- End card div -->
                        </div><!-- End col -->

                    <?php endif ?>

                    <?php $catNum++;?>
                <?php endwhile ?> 
    </div><!-- end row -->


    <h1><?php the_title();?></h1>

    <?php get_template_part('includes/section', 'content');?>

</div>
</div>


<?php get_footer();?>