<?php
////////////////////////////////////////////////////////////////////
// The main file for any PHP functions for the site
// This is used to enqueue style sheets and scripts from bootstrap
// It also calls data from ACF and Font Awesome
////////////////////////////////////////////////////////////////////


// load stylesheet to be used throughout the site
function load_css()
{

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');

}
// makes the load_css function run
add_action('wp_enqueue_scripts', 'load_css');

// load javascript
function load_js()
{

    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap');

    //Our team's additional js file
    wp_register_script('main', get_template_directory_uri() . '/js/main.js' , 'jquery', false, true);
    wp_enqueue_script('main');

}
// makes the load_js function run
add_action('wp_enqueue_scripts', 'load_js');

// loading Google Fonts onto the site
function wpb_add_google_fonts() {

  wp_enqueue_style( 'wpb-google-fonts', 'href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&family=Source+Sans+Pro:wght@100;200;300;400;600;700;900&display=swap"', false );

  ///////////////////////////////////////////////
  // FONT FAMILIES TO BE USED IN CSS
  // font-family: 'Montserrat', sans-serif;
  // font-family: 'Open Sans', sans-serif;
  // font-family: 'Source Sans Pro', sans-serif;
  ///////////////////////////////////////////////

}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


/**
 * Font Awesome Kit Setup
 *
 * This will add your Font Awesome Kit to the front-end, the admin back-end,
 * and the login screen area.
 */
if (! function_exists('fa_custom_setup_kit') ) {
    function fa_custom_setup_kit($kit_url = '') {
      foreach ( [ 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ] as $action ) {
        add_action(
          $action,
          function () use ( $kit_url ) {
            wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
          }
        );
      }
    }
  }
  fa_custom_setup_kit('https://kit.fontawesome.com/fb620e246a.js');




//Theme Options
//Menus
add_theme_support('menus');
// Registering the Main Menu, Footer Menu, and Other menu
register_nav_menus(

    array(

        'footer-menu' => 'Footer Menu Location',
        'other-links-menu' => 'Other Links',

    )

);

// Custom logo
// Setting it up so the user can have a custom logo added to their site
add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
    $defaults = array(
    'height'      => 50,
    'width'       => 100,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
   'unlink-homepage-logo' => true,
    );
    add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {
  // Registering the Home Sidebar 1
	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="rounded">',
		'after_title'   => '</h4>',
  ) );

  // Registering the First Footer Area
  register_sidebar( array(
    'name'          => 'Footer Area 1', 'footer',
    'id'            => 'footer_area_1',
    'description'   => 'Foorter Widget Area 1 of 4',
    'before_widget' => '<section class="footer-area footer-area-one">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

  // Registering the Second Footer Area
  register_sidebar( array(
    'name'          => 'Footer Area 2', 'footer',
    'id'            => 'footer_area_2',
    'description'   => 'Foorter Widget Area 2 of 4',
    'before_widget' => '<section class="footer-area footer-area-one">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

  // Registering the Third Footer Area
  register_sidebar( array(
    'name'          => 'Footer Area 3', 'footer',
    'id'            => 'footer_area_3',
    'description'   => 'Foorter Widget Area 3 of 4',
    'before_widget' => '<section class="footer-area footer-area-one">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

  // Registering the Fourth Footer Area
  register_sidebar( array(
    'name'          => 'Footer Area 4', 'footer',
    'id'            => 'footer_area_4',
    'description'   => 'Foorter Widget Area 4 of 4',
    'before_widget' => '<section class="footer-area footer-area-one">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

}
add_action( 'widgets_init', 'arphabet_widgets_init' );




/* Theme setup */
add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() {
            register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
        }
    endif;
add_theme_support( 'title-tag' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );




///////////////////////////////////////////////////////////////
// Add the Home Advanced Custom Fields to the page if it exists
///////////////////////////////////////////////////////////////






if( function_exists('acf_add_local_field_group') ):
  acf_add_local_field_group(array(
    'key' => 'group_5f9c469810592',
    'title' => 'Home',
    'fields' => array(
      array(
        'key' => 'field_5f9c469d82a5b',
        'label' => 'Hero Heading',
        'name' => 'hero_heading',
        'type' => 'text',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => 'Announcements',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => 50,
      ),
      array(
        'key' => 'field_5f9c46d182a5c',
        'label' => 'Hero Content',
        'name' => 'hero_content',
        'type' => 'textarea',
        'instructions' => 'Summary or Description of the content to be found in the hero',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => 'This is the content of the homepage hero.',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 4,
        'new_lines' => '',
      ),
      array(
        'key' => 'field_5f9c471282a5d',
        'label' => 'Hero Image',
        'name' => 'hero_image',
        'type' => 'image',
        'instructions' => 'Select a hero image',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'url',
        'preview_size' => 'medium',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => 20,
        'mime_types' => 'png, jpeg, jpg, gif, tiff, mp4',
      ),
      array(
        'key' => 'field_5f9c473f82a5e',
        'label' => 'Hero Button',
        'name' => 'hero_button',
        'type' => 'url',
        'instructions' => 'Place the URL to the page you would like this button to lead to',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
      ),
      array(
        'key' => 'field_5fa5751ee2e3f',
        'label' => 'Section 1 Header',
        'name' => 'section_1_header',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_5fa57540e2e40',
        'label' => 'Category 1',
        'name' => 'category_1',
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '33',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_5fa57576e2e41',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
          ),
          array(
            'key' => 'field_5fa57597e2e42',
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5fa575a1e2e43',
            'label' => 'Summary',
            'name' => 'summary',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => 200,
            'rows' => 3,
            'new_lines' => '',
          ),
          array(
            'key' => 'field_5fa575b9e2e44',
            'label' => 'Button',
            'name' => 'button',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
        ),
      ),
      array(
        'key' => 'field_5fa581afe888c',
        'label' => 'Category 2',
        'name' => 'category_2',
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '33',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_5fa581afe888d',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
          ),
          array(
            'key' => 'field_5fa581afe888e',
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5fa581afe888f',
            'label' => 'Summary',
            'name' => 'summary',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => 200,
            'rows' => 3,
            'new_lines' => '',
          ),
          array(
            'key' => 'field_5fa581afe8890',
            'label' => 'Button',
            'name' => 'button',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
        ),
      ),
      array(
        'key' => 'field_5fa581b0e8891',
        'label' => 'Category 3',
        'name' => 'category_3',
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '33',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_5fa581b0e8892',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
          ),
          array(
            'key' => 'field_5fa581b0e8893',
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5fa581b0e8894',
            'label' => 'Summary',
            'name' => 'summary',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => 200,
            'rows' => 3,
            'new_lines' => '',
          ),
          array(
            'key' => 'field_5fa581b0e8895',
            'label' => 'Button',
            'name' => 'button',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
        ),
      ),
      array(
        'key' => 'field_5fa581b1e8896',
        'label' => 'Category 4',
        'name' => 'category_4',
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '33',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_5fa581b1e8897',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
          ),
          array(
            'key' => 'field_5fa581b1e8898',
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5fa581b1e8899',
            'label' => 'Summary',
            'name' => 'summary',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => 200,
            'rows' => 3,
            'new_lines' => '',
          ),
          array(
            'key' => 'field_5fa581b1e889a',
            'label' => 'Button',
            'name' => 'button',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
        ),
      ),
      array(
        'key' => 'field_5fa581b2e889b',
        'label' => 'Category 5',
        'name' => 'category_5',
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '33',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_5fa581b2e889c',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
          ),
          array(
            'key' => 'field_5fa581b2e889d',
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5fa581b2e889e',
            'label' => 'Summary',
            'name' => 'summary',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => 200,
            'rows' => 3,
            'new_lines' => '',
          ),
          array(
            'key' => 'field_5fa581b2e889f',
            'label' => 'Button',
            'name' => 'button',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
        ),
      ),
      array(
        'key' => 'field_5fa581b3e88a0',
        'label' => 'Category 6',
        'name' => 'category_6',
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '33',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_5fa581b3e88a1',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
          ),
          array(
            'key' => 'field_5fa581b3e88a2',
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5fa581b3e88a3',
            'label' => 'Summary',
            'name' => 'summary',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => 200,
            'rows' => 3,
            'new_lines' => '',
          ),
          array(
            'key' => 'field_5fa581b3e88a4',
            'label' => 'Button',
            'name' => 'button',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
        ),
      ),
      array(
        'key' => 'field_5fa5a6c6f3165',
        'label' => 'Left Side',
        'name' => 'left_side',
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '50',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_5fa5a6d6f3166',
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => 'Donate',
            'placeholder' => 'Title of Section',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5fa5a706f3167',
            'label' => 'Description',
            'name' => 'description',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => 6,
            'new_lines' => '',
          ),
          array(
            'key' => 'field_5fa5a724f3168',
            'label' => 'Button Text',
            'name' => 'button_text',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5fa5a74bf3169',
            'label' => 'Button Link',
            'name' => 'button_link',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5fa5a75ff316a',
            'label' => 'Card Types',
            'name' => 'card_types',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'layout' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_5fa5a771f316b',
                'label' => 'Card 1',
                'name' => 'card_1',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '16',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
              array(
                'key' => 'field_5fa5a7baf316c',
                'label' => 'Card 2',
                'name' => 'card_2',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '16',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
              array(
                'key' => 'field_5fa5a7c0f316d',
                'label' => 'Card 3',
                'name' => 'card_3',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '16',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
              array(
                'key' => 'field_5fa5a7c2f316e',
                'label' => 'Card 4',
                'name' => 'card_4',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '16',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
              array(
                'key' => 'field_5fa5a7c3f316f',
                'label' => 'Card 5',
                'name' => 'card_5',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '16',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
              array(
                'key' => 'field_5fa5a7c4f3170',
                'label' => 'Card 6',
                'name' => 'card_6',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '16',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
            ),
          ),
        ),
      ),
      array(
        'key' => 'field_5fa5a7e2d12f1',
        'label' => 'Right Side',
        'name' => 'right_side',
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '50',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_5fa5a7e2d12f2',
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => 'Donate',
            'placeholder' => 'Title of Section',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5fa5a7e2d12f3',
            'label' => 'Description',
            'name' => 'description',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => 6,
            'new_lines' => '',
          ),
          array(
            'key' => 'field_5fa5a7e2d12f4',
            'label' => 'Button Text',
            'name' => 'button_text',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5fa5a7e2d12f5',
            'label' => 'Button Link',
            'name' => 'button_link',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5fa5a7e2d12f6',
            'label' => 'Card Types',
            'name' => 'card_types',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'layout' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_5fa5a7e2d12f7',
                'label' => 'Card 1',
                'name' => 'card_1',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '16',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
              array(
                'key' => 'field_5fa5a7e2d12f8',
                'label' => 'Card 2',
                'name' => 'card_2',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '16',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
              array(
                'key' => 'field_5fa5a7e2d12f9',
                'label' => 'Card 3',
                'name' => 'card_3',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '16',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
              array(
                'key' => 'field_5fa5a7e2d12fa',
                'label' => 'Card 4',
                'name' => 'card_4',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '16',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
              array(
                'key' => 'field_5fa5a7e2d12fb',
                'label' => 'Card 5',
                'name' => 'card_5',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '16',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
              array(
                'key' => 'field_5fa5a7e2d12fc',
                'label' => 'Card 6',
                'name' => 'card_6',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '16',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
            ),
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_type',
          'operator' => '==',
          'value' => 'front_page',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));

  endif;
  if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
  	'key' => 'group_6045119685af7',
  	'title' => 'Page Template Category Heading',
  	'fields' => array(
  		array(
  			'key' => 'field_6059420bd59e0',
  			'label' => 'Header Area',
  			'name' => 'header_area',
  			'type' => 'group',
  			'instructions' => 'This will be the banner/header at the top of your page. It will show the title of what the page is about.',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'block',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_6045203e39af7',
  					'label' => 'Background Header Image',
  					'name' => 'background_header_image',
  					'type' => 'image',
  					'instructions' => 'Upload the background header image here! It will go right behind the title!',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'return_format' => 'url',
  					'preview_size' => 'medium',
  					'library' => 'all',
  					'min_width' => '',
  					'min_height' => '',
  					'min_size' => '',
  					'max_width' => '',
  					'max_height' => '',
  					'max_size' => '',
  					'mime_types' => '',
  				),
  				array(
  					'key' => 'field_6059422dd59e1',
  					'label' => 'Header Title Color',
  					'name' => 'header_title_color',
  					'type' => 'color_picker',
  					'instructions' => 'Default value is white. Here are some suggested colors:
  |	 PCCC Blue: #1E3B7C		|
  |	PCCC Green: #0F9647	 |',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  				),
  			),
  		),
  		array(
  			'key' => 'field_603d1d46fe5b7',
  			'label' => 'Description',
  			'name' => 'description_group',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 1,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '50',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'row',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_603d214ae25a9',
  					'label' => 'Category Overview',
  					'name' => 'title',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_603d256299230',
  					'label' => 'Category Description',
  					'name' => 'category_description',
  					'type' => 'textarea',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'maxlength' => '',
  					'rows' => '',
  					'new_lines' => '',
  				),
  			),
  		),
  		array(
  			'key' => 'field_603d228c5903d',
  			'label' => 'Contact',
  			'name' => 'contact_group',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 1,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '50',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'row',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_603d23cdc0941',
  					'label' => 'Contact Header',
  					'name' => 'contact_info',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_603d2aee4375a',
  					'label' => 'Contact Image',
  					'name' => 'image',
  					'type' => 'image',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'return_format' => 'array',
  					'preview_size' => 'thumbnail',
  					'library' => 'all',
  					'min_width' => '',
  					'min_height' => '',
  					'min_size' => '',
  					'max_width' => '',
  					'max_height' => '',
  					'max_size' => '',
  					'mime_types' => '',
  				),
  				array(
  					'key' => 'field_603d229d5903e',
  					'label' => 'Name',
  					'name' => 'name',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_606cd4bc75c22',
  					'label' => 'Street Address',
  					'name' => 'street_address',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_603d22bb5903f',
  					'label' => 'City Zip State',
  					'name' => 'city_zip_state',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_603d22c659040',
  					'label' => 'Number',
  					'name' => 'number',
  					'type' => 'number',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'min' => '',
  					'max' => '',
  					'step' => '',
  				),
  			),
  		),
  		array(
  			'key' => 'field_603ac1c96a35a',
  			'label' => 'Section 1',
  			'name' => 'category_1_name',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '50',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'block',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_603ad7234ec18',
  					'label' => 'Title',
  					'name' => 'title',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_60402d640f87f',
  					'label' => 'Category Discription',
  					'name' => 'category_discription',
  					'type' => 'textarea',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'maxlength' => '',
  					'rows' => '',
  					'new_lines' => '',
  				),
  				array(
  					'key' => 'field_6059460f1b312',
  					'label' => 'Location 1 Title',
  					'name' => 'location_1_title',
  					'type' => 'text',
  					'instructions' => 'This will be the title of the link to the organization that you are linking to.',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_603ad7634ec1a',
  					'label' => 'Location 1 URL',
  					'name' => 'location_1',
  					'type' => 'url',
  					'instructions' => 'Please copy and paste the LINK to a business or organization here.',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  				),
  			),
  		),
  		array(
  			'key' => 'field_603ad9f9c336c',
  			'label' => 'Section 1 - Locations',
  			'name' => 'category_1_locations',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '50',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'block',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_603c2effa91c8',
  					'label' => 'Location Name',
  					'name' => 'location_name',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_603c2f0fa91c9',
  					'label' => 'Address',
  					'name' => 'address',
  					'type' => 'wysiwyg',
  					'instructions' => 'This field should only be used for map markers. For more information, please look at the VRC youtube tutorials at: https://www.youtube.com/channel/UCD9XMF8iCg5vfNWZx_-ofkA/videos',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'tabs' => 'all',
  					'toolbar' => 'full',
  					'media_upload' => 1,
  					'delay' => 0,
  				),
  			),
  		),
  		array(
  			'key' => 'field_60402b4f6fef9',
  			'label' => 'Section 2 - Locations',
  			'name' => 'category_2_locations',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '50',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'block',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_60402b4f6fefc',
  					'label' => 'Location Name',
  					'name' => 'location_name',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_60402b4f6fefd',
  					'label' => 'Address',
  					'name' => 'address',
  					'type' => 'wysiwyg',
  					'instructions' => 'This field should only be used for map markers. For more information, please look at the VRC youtube tutorials at: https://www.youtube.com/channel/UCD9XMF8iCg5vfNWZx_-ofkA/videos',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'tabs' => 'all',
  					'toolbar' => 'full',
  					'media_upload' => 1,
  					'delay' => 0,
  				),
  			),
  		),
  		array(
  			'key' => 'field_60402b576feff',
  			'label' => 'Section 2',
  			'name' => 'category_2_name',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '50',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'block',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_60402b576ff00',
  					'label' => 'Title',
  					'name' => 'title',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_60402d8b0f880',
  					'label' => 'Category Discription',
  					'name' => 'category_discription',
  					'type' => 'textarea',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'maxlength' => '',
  					'rows' => '',
  					'new_lines' => '',
  				),
  				array(
  					'key' => 'field_6059469d0eb1d',
  					'label' => 'Location 1 Title',
  					'name' => 'location_1_title',
  					'type' => 'text',
  					'instructions' => 'This will be the title of the link to the organization that you are linking to.',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_60402b576ff02',
  					'label' => 'Location 1 URL',
  					'name' => 'location_1',
  					'type' => 'url',
  					'instructions' => 'Please copy and paste the LINK to a business or organization here.',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  				),
  			),
  		),
  		array(
  			'key' => 'field_606b960253d92',
  			'label' => 'Section 3',
  			'name' => 'category_3_name',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '50',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'block',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_606b960253d93',
  					'label' => 'Title',
  					'name' => 'title',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_606b960253d94',
  					'label' => 'Category Discription',
  					'name' => 'category_discription',
  					'type' => 'textarea',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'maxlength' => '',
  					'rows' => '',
  					'new_lines' => '',
  				),
  				array(
  					'key' => 'field_606b960253d95',
  					'label' => 'Location 1 Title',
  					'name' => 'location_1_title',
  					'type' => 'text',
  					'instructions' => 'This will be the title of the link to the organization that you are linking to.',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_606b960253d96',
  					'label' => 'Location 1 URL',
  					'name' => 'location_1',
  					'type' => 'url',
  					'instructions' => 'Please copy and paste the LINK to a business or organization here.',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  				),
  			),
  		),
  		array(
  			'key' => 'field_606b961f53d9b',
  			'label' => 'Section 3 - Locations',
  			'name' => 'category_3_locations',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '50',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'block',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_606b961f53d9d',
  					'label' => 'Location Name',
  					'name' => 'location_name',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_606b961f53d9e',
  					'label' => 'Address',
  					'name' => 'address',
  					'type' => 'wysiwyg',
  					'instructions' => 'This field should only be used for map markers. For more information, please look at the VRC youtube tutorials at: https://www.youtube.com/channel/UCD9XMF8iCg5vfNWZx_-ofkA/videos',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'tabs' => 'all',
  					'toolbar' => 'full',
  					'media_upload' => 1,
  					'delay' => 0,
  				),
  			),
  		),
  		array(
  			'key' => 'field_606b964053da8',
  			'label' => 'Section 4 - Locations',
  			'name' => 'category_4_locations',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '50',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'block',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_606b964053daa',
  					'label' => 'Location Name',
  					'name' => 'location_name',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_606b964053dab',
  					'label' => 'Address',
  					'name' => 'address',
  					'type' => 'wysiwyg',
  					'instructions' => 'This field should only be used for map markers. For more information, please look at the VRC youtube tutorials at: https://www.youtube.com/channel/UCD9XMF8iCg5vfNWZx_-ofkA/videos',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'tabs' => 'all',
  					'toolbar' => 'full',
  					'media_upload' => 1,
  					'delay' => 0,
  				),
  			),
  		),
  		array(
  			'key' => 'field_606b962f53d9f',
  			'label' => 'Section 4',
  			'name' => 'category_4_name',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '50',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'block',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_606b962f53da0',
  					'label' => 'Title',
  					'name' => 'title',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_606b962f53da1',
  					'label' => 'Category Discription',
  					'name' => 'category_discription',
  					'type' => 'textarea',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'maxlength' => '',
  					'rows' => '',
  					'new_lines' => '',
  				),
  				array(
  					'key' => 'field_606b962f53da2',
  					'label' => 'Location 1 Title',
  					'name' => 'location_1_title',
  					'type' => 'text',
  					'instructions' => 'This will be the title of the link to the organization that you are linking to.',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_606b962f53da3',
  					'label' => 'Location 1 URL',
  					'name' => 'location_1',
  					'type' => 'url',
  					'instructions' => 'Please copy and paste the LINK to a business or organization here.',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  				),
  			),
  		),
  	),
  	'location' => array(
  		array(
  			array(
  				'param' => 'page_template',
  				'operator' => '==',
  				'value' => 'categorypagetemplate.php',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'normal',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => '',
  	'active' => true,
  	'description' => '',
  ));

  endif;
?>

<?php
  function firstRow($num) {
    if (have_rows('category_'.$num.'_locations')) : //have rows goes through parent category
      while (have_rows('category_'.$num.'_locations')) : the_row(); //have rows goes through parent category again

        $c2PhoneNumber = get_sub_field('phone_number'); //var
        $c2Address = get_sub_field('address'); //var
        $c2LocationName = get_sub_field('location_name'); //var image

      endwhile; //end while
    else : //else
    // no rows found
    endif; //end if

    if (have_rows('category_'.$num.'_name')) : //have rows goes through parent category
      while (have_rows('category_'.$num.'_name')) : the_row(); //have rows goes through parent category again

        $count = count(get_field('category_'.$num.'_name')); //Counts the number of fields in the group.
        $i = 1; //var to count loops
        $titleC1 = get_sub_field('title'); //var
        $category_descriptionC1 = get_sub_field('category_discription');
?>
      <div class="row no-gutters">

        <div class="col-lg-6 left-side">
          <!-- title of description -->
          <h2 class="mb-4"><?php echo $titleC1; ?></h2>

          <!-- description of category -->
          <p align="justify"><?php echo $category_descriptionC1; ?></p>

          <?php while ($i <= ($count/2)-1) : //Loop and logic to remove unnecessary looping

            $c1URLTITLE = get_sub_field('location_'.$i.'_title');
            $c1URL = get_sub_field('location_'.$i.'');
          ?>
            <p><a href="<?php echo $c1URL; ?>"><?php echo $c1URLTITLE; ?></a></p>
            <?php $i++; ?><!-- increment loop counter -->
          <?php endwhile ?>
        </div> <!-- End Col -->

        <div class="col-lg-6 right-side">
          <h4 style="color:#1E3B7C;"><?php echo $c2LocationName; ?></h4>
          <!-- call the description text of the right side -->
          <p><?php echo $c2Address; ?></p>

        </div><!-- end col -->
      </div>
    <?php endwhile ?>
  <?php endif?>
<?php
  }
?>



<?php
  function secondRow($num){

    if (have_rows('category_'.$num.'_locations')) : //have rows goes through parent category
      while (have_rows('category_'.$num.'_locations')) : the_row(); //have rows goes through parent category again

        $c3PhoneNumber = get_sub_field('phone_number'); //var
        $where = get_sub_field('address'); //var
        $c3LocationName = get_sub_field('location_name'); //var image

      endwhile; //end while
    else : //else
    // no rows found
    endif; //end if
    //Elise

    if (have_rows('category_'.$num.'_name')) : //have rows goes through parent category
      while (have_rows('category_'.$num.'_name')) : the_row();  //have rows goes through parent category again

        $count = count(get_field('category_'.$num.'_name')); //Counts the number of fields in the group.
        $i = 1; //var to count loops
        $titleC4 = get_sub_field('title'); //var
        $category_descriptionC4 = get_sub_field('category_discription'); //var
?>
        <div class="row no-gutters">

        <div class="col-lg-6 right-side">
          <h3 style="color:#1E3B7C;"><?php echo $c3LocationName; ?></h3>

          <!-- call the description text of the right side -->
          <p><?php echo $where; ?></p>

        </div><!-- end col -->

        <div class="col-lg-6 left-side">
          <!-- title of description -->
          <h2 class="mb-4"><?php echo $titleC4; ?></h2>

          <!-- description of category -->
          <p align="justify"><?php echo $category_descriptionC4; ?></p>

          <?php while ($i <= ($count/2)-1) : //Loop and logic to remove unnecessary looping

            $c4URLTITLE = get_sub_field('location_'.$i.'_title');
            $c4URL = get_sub_field('location_'.$i.''); ?>

            <p><a href="<?php echo $c4URL; ?>"><?php echo $c4URLTITLE; ?></a></p>

            <?php $i++; ?> <!-- increment loop counter -->
          <?php endwhile ?>
        </div> <!-- End Col -->
      </div>
    <?php endwhile ?>
  <?php endif ?>
<?php
  }
?>
