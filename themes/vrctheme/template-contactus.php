<?php
/*
Template Name: Contact Us
*/
?>

<?php get_header();?>

<div class="page-wrap">

<div class="container">

    <h1><?php the_title();?></h1>

    <div class="row">
        
        <div class="col-lg-8">
        
            <!-- Contact Form -->
            <form action="contact.php" method="post">

              <div class="elem-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="visitor_name" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} required> <label for="email">Your E-mail</label> <input type="email" id="email" name="visitor_email" placeholder="john.doe@email.com" required>
                
                
              </div>

              <!-- <div class="elem-group">
                <label for="email">Your E-mail</label>
                <input type="email" id="email" name="visitor_email" placeholder="john.doe@email.com" required>
              </div> -->

              <!-- Remove Drop down field, commented out in case necessary -->

              <!-- <div class="elem-group">
                <label for="category-selection">Choose Concerned Category</label>
                <select id="category-selection" name="concerned_category" required>
                    <option value="">Select a Category</option>
                    <option value="physical_health">Physical Health</option>
                    <option value="mental_health">Mental Health</option>
                    <option value="spiritual_health">Spiritual Health</option>
                    <option value="economic_health">Economic Health</option>
                    <option value="education">Education</option>
                    <option value="social_services">Social Services</option>
                    <option value="technical_support">Technical Support</option>
                </select>
              </div> -->

              <div class="elem-group">
                <label for="title">Reason For Contacting Us</label>
                <input type="text" id="title" name="email_title" required placeholder="Need help getting grocery's" pattern=[A-Za-z0-9\s]{8,60}>
              </div>

              <div class="elem-group">
                <label for="message">Write your message</label>
                <textarea id="message" name="visitor_message" placeholder="Message" required></textarea>
              </div>

              <button type="submit">Send Message</button>
  
            </form>
        
        </div>


        
        <div class="col-lg-4">
            
            <?php get_template_part('includes/section', 'content');?>    
        
        </div>
    
    </div>


</div>

</div>

<?php get_footer();?>