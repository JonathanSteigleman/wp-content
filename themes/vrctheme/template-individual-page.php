<?php 
/*
Template Name: Individual Page
*/
?>

<?php get_header(); ?>
<!-- Header for template -->

<div class="header">
  <h2>Health</h2>
</div>
  
<div class="row">
  <div class ="column">
    <div id = "leftcol" >
      <div class="card">
        <h2>Business Name Here</h2>
        <!-- <h5>Title description, Dec 7, 2017</h5> --> 
        <!-- Could be the address portion underneath business name-->
        <div class="business_logo" style="height:100px;">Image</div>
        <!-- Logo for the business? -->
        <p>Some text..</p>
        <!-- Descriptiopn of the business under logo? -->
      </div>

  <div class="column">
    <div id = "rightcol" >
      <div class="card">
        <h2>Business Person Here</h2>
        <!-- Name for the person who they contact -->
        <div class="person_image" style="height:50px;">Image</div>
        <!-- Image of the person to contact? -->
        <p>text detailing phone number and position at business and such...</p>
        <!-- further description of person -->
      </div>
    </div>
  </div>
</div>


<?php get_footer();?>
<!-- Include footer at bottom of page -->