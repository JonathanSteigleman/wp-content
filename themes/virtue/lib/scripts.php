<?php
/**
 * Enqueue scripts and stylesheets
 *
 * @package Virtue Theme
 */

/**
 * Enqueue scripts and stylesheets
 */
function virtue_scripts() {
	global $virtue;
	wp_enqueue_style( 'virtue_theme', get_template_directory_uri() . '/assets/css/virtue.css', false, VIRTUE_VERSION );
	if ( isset( $virtue['skin_stylesheet'] ) || ! empty( $virtue['skin_stylesheet'] ) ) {
		$skin = $virtue['skin_stylesheet'];
	} else {
		$skin = 'default.css';
	}
	$skin_stylesheet_path = apply_filters( 'virtue_skin_style_path_output', get_template_directory_uri() . '/assets/css/skins/' );
	wp_enqueue_style( 'virtue_skin', $skin_stylesheet_path . $skin, false, VIRTUE_VERSION );
	if ( is_rtl() ) {
		wp_enqueue_style( 'kadence_rtl', get_template_directory_uri() . '/assets/css/rtl.css', false, VIRTUE_VERSION );
	}

	if ( is_child_theme() ) {
		$child_theme   = wp_get_theme();
		$child_version = $child_theme->get( 'Version' );
		wp_enqueue_style( 'virtue_child', get_stylesheet_uri(), false, $child_version );
	}

	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/min/bootstrap-min.js', array( 'jquery' ), VIRTUE_VERSION, true );
	wp_enqueue_script( 'virtue_plugins', get_template_directory_uri() . '/assets/js/min/plugins-min.js', array( 'jquery', 'hoverIntent', 'masonry' ), VIRTUE_VERSION, true );

	if ( isset( $virtue['kadence_lightbox'] ) && '1' != $virtue['kadence_lightbox'] ) {
		wp_register_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/min/magnific-popup-min.js', array( 'jquery' ), VIRTUE_VERSION, true );
		wp_enqueue_script( 'virtue-lightbox-init', get_template_directory_uri() . '/assets/js/min/virtue-lightbox-init-min.js', array( 'jquery', 'magnific-popup' ), VIRTUE_VERSION, true );
		// Localize the script with new data.
		$lightbox_translation_array = array(
			'loading' => __( 'Loading...', 'virtue' ),
			'of'      => '%curr% ' . __( 'of', 'virtue' ) . ' %total%',
			'error'   => __( 'The Image could not be loaded.', 'virtue' ),
		);
		wp_localize_script( 'virtue-lightbox-init', 'virtue_lightbox', $lightbox_translation_array );
	}

	if ( isset( $virtue['google_map_api'] ) && ! empty( $virtue['google_map_api'] ) ) {
		$gmap_api = $virtue['google_map_api'];
	} else {
		$gmap_api = '';
	}
	wp_register_script( 'virtue_google_map_api', 'https://maps.googleapis.com/maps/api/js?key=' . esc_attr( $gmap_api ), array( 'jquery' ), VIRTUE_VERSION, true );
	wp_register_script( 'virtue_gmap', get_template_directory_uri() . '/assets/js/min/virtue-gmap-min.js', array( 'jquery', 'virtue_google_map_api' ), VIRTUE_VERSION, true );
	wp_register_script( 'virtue_contact_validation', get_template_directory_uri() . '/assets/js/min/virtue-contact-validation-min.js', array( 'jquery' ), VIRTUE_VERSION, true );
	// Localize the script with new data.
	$contact_translation_array = array(
		'required' => __( 'This field is required.', 'virtue' ),
		'email'    => __( 'Please enter a valid email address.', 'virtue' ),
	);
	wp_localize_script( 'virtue_contact_validation', 'virtue_contact', $contact_translation_array );
	wp_enqueue_script( 'virtue_main', get_template_directory_uri() . '/assets/js/min/main-min.js', array( 'jquery', 'hoverIntent', 'masonry' ), VIRTUE_VERSION, true );

	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_script( 'kt-wc-add-to-cart-variation', get_template_directory_uri() . '/assets/js/min/kt-add-to-cart-variation-min.js', array( 'jquery' ), false, VIRTUE_VERSION, true );

		if ( isset( $virtue['product_quantity_input'] ) && 1 == $virtue['product_quantity_input'] ) {
			wp_enqueue_script( 'wcqi-js', get_template_directory_uri() . '/assets/js/min/wc-quantity-increment-min.js', array( 'jquery' ), false, VIRTUE_VERSION, true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'virtue_scripts', 100 );

/**
 * Add Respond.js for IE8 support of media queries
 */
function virtue_ie_support_scripts() {
	wp_enqueue_script( 'virtue-respond', get_template_directory_uri() . '/assets/js/vendor/respond.min.js' );
	wp_script_add_data( 'virtue-respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'virtue_ie_support_scripts' );
