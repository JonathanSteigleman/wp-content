<?php

//load stylesheet to be used throughout the site
function load_css()
{
        
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');

}
//makes the load_css function run
add_action('wp_enqueue_scripts', 'load_css');

//load javascript
function load_js()
{

    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap');

    //Our team's additional js file
    wp_register_script('main', get_template_directory_uri() . '/js/main.js' , 'jquery', false, true);
    wp_enqueue_script('main');

}
//makes the load_js function run
add_action('wp_enqueue_scripts', 'load_js');


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

//
// Add the Home Advanced Custom Fields to the page if it is there
// Include attributes of the following
//
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
        'mime_types' => 'png, jpeg',
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

    //add_filter('acf/settings/remove_wp_meta_box', '__return_false');


//Theme Options
add_theme_support('menus');

//Menus
register_nav_menus(

    array(

        'top-menu' => 'Main Menu Location',
        'footer-menu' => 'Footer Menu Location',

    )

);

//Custom logo
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