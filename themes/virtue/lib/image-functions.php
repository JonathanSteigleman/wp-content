<?php
/**
 * Image Functions.
 *
 * @package Virtue Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Virtue lazy load filter.
 */
function virtue_lazy_load_filter() {
	$lazy = false;
	if ( function_exists( 'get_rocket_option' ) && get_rocket_option( 'lazyload' ) ) {
		$lazy = true;
	}
	return apply_filters( 'virtue_lazy_load', $lazy );
}
/**
 * Virtue set max srcset
 *
 * @param string $string the max value.
 */
function virtue_srcset_max( $string ) {
	return 2200;
}
add_filter( 'max_srcset_image_width', 'virtue_srcset_max' );
/**
 * Virtue placeholder image.
 */
function virtue_img_placeholder() {
	return get_template_directory_uri() . '/assets/img/placement.png';
}
/**
 * Virtue post widget default placeholder image.
 */
function virtue_post_widget_default_placeholder() {
	return apply_filters( 'kadence_post_default_widget_placeholder_image', get_template_directory_uri() . '/assets/img/post_standard-80x50.jpg' );
}
/**
 * Virtue post default placeholder image.
 */
function virtue_post_default_placeholder() {
	return apply_filters( 'kadence_post_default_placeholder_image', get_template_directory_uri() . '/assets/img/post_standard.jpg' );
}
/**
 * Virtue post default placeholder override image.
 */
function virtue_post_default_placeholder_override() {
	global $virtue;
	$custom_image = $virtue['post_summery_default_image']['url'];
	return $custom_image;
}
/**
 * Virtue post default placeholder override image.
 */
function virtue_post_default_placeholder_init() {
	global $virtue;
	if ( isset( $virtue['post_summery_default_image'] ) && ! empty( $virtue['post_summery_default_image']['url'] ) ) {
		add_filter( 'kadence_post_default_placeholder_image', 'virtue_post_default_placeholder_override' );
		add_filter( 'kadence_post_default_widget_placeholder_image', 'virtue_post_default_placeholder_override' );
	}
}
add_action( 'init', 'virtue_post_default_placeholder_init' );
/**
 * Virtue default placeholder image.
 */
function virtue_default_placeholder_image() {
	return apply_filters( 'virtue_default_placeholder_image', get_template_directory_uri() . '/assets/img/placeholder-min.jpg' );
}
/**
 * Virtue get options placeholder.
 */
function virtue_get_options_placeholder_image() {
	global $virtue;
	if ( isset( $virtue['post_summery_default_image'] ) && isset( $virtue['post_summery_default_image']['id'] ) && ! empty( $virtue['post_summery_default_image']['id'] ) ) {
		return $virtue['post_summery_default_image']['id'];
	} else {
		return '';
	}
}
/**
 * Virtue get image array.
 *
 * @param string $width the image width.
 * @param string $height the image height.
 * @param bool   $crop if image is cropped.
 * @param string $class image class.
 * @param string $alt the image alt.
 * @param string $id the image id.
 * @param bool   $placeholder wheather to show a placeholder.
 */
function virtue_get_image_array( $width = null, $height = null, $crop = true, $class = null, $alt = null, $id = null, $placeholder = false ) {
	if ( empty( $id ) ) {
		$id = get_post_thumbnail_id();
	}
	if ( empty( $id ) ) {
		if ( true == $placeholder ) {
			$id = virtue_get_options_placeholder_image();
		}
	}
	if ( ! empty( $id ) ) {
		$virtue_get_image = Virtue_Get_Image::getInstance();
		$image = $virtue_get_image->process( $id, $width, $height );
		if ( empty( $alt ) ) {
			$alt = get_post_meta( $id, '_wp_attachment_image_alt', true );
		}
		$return_array = array(
			'src'    => $image[0],
			'width'  => $image[1],
			'height' => $image[2],
			'srcset' => $image[3],
			'class'  => $class,
			'alt'    => $alt,
			'full'   => $image[4],
		);
	} elseif ( empty( $id ) && true == $placeholder ) {
		if ( empty( $height ) ) {
			$height = $width;
		}
		if ( empty( $width ) ) {
			$width = $height;
		}
		$return_array = array(
			'src'    => virtue_default_placeholder_image(),
			'width'  => $width,
			'height' => $height,
			'srcset' => '',
			'class'  => $class,
			'alt'    => $alt,
			'full'   => virtue_default_placeholder_image(),
		);
	} else {
		$return_array = array(
			'src'    => '',
			'width'  => '',
			'height' => '',
			'srcset' => '',
			'class'  => '',
			'alt'    => '',
			'full'   => '',
		);
	}
	return $return_array;
}

/**
 * Virtue get full image output.
 *
 * @param string $width the image width.
 * @param string $height the image height.
 * @param bool   $crop if image is cropped.
 * @param string $class image class.
 * @param string $alt the image alt.
 * @param string $id the image id.
 * @param bool   $placeholder whether to show a placeholder.
 * @param bool   $lazy whether to use lazy.
 * @param bool   $schema whether to show the schema output.
 * @param array  $extra image attributes.
 */
function virtue_get_full_image_output( $width = null, $height = null, $crop = true, $class = null, $alt = null, $id = null, $placeholder = false, $lazy = false, $schema = true, $extra = null ) {
	$img = virtue_get_image_array( $width, $height, $crop, $class, $alt, $id, $placeholder );
	if ( $lazy ) {
		if ( virtue_lazy_load_filter() ) {
			$image_src_output = 'src="data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=" data-lazy-src="' . esc_url( $img['src'] ) . '" ';
		} else {
			$image_src_output = 'src="' . esc_url( $img['src'] ) . '"';
		}
	} else {
		$image_src_output = 'src="' . esc_url( $img['src'] ) . '"';
	}
	$extras = '';
	if ( is_array( $extra ) ) {
		foreach ( $extra as $key => $value ) {
			$extras .= esc_attr( $key ) . '="' . esc_attr( $value ) . '" ';
		}
	} else {
		$extras = $extra;
	}
	if ( ! empty( $img['src'] ) && true == $schema ) {
		$output  = '<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
		$output .= '<img ' . wp_kses_post( $image_src_output ) . ' width="' . esc_attr( $img['width'] ) . '" height="' . esc_attr( $img['height'] ) . '" ' . wp_kses_post( $img['srcset'] ) . ' class="' . esc_attr( $img['class'] ) . '" itemprop="contentUrl" alt="' . esc_attr( $img['alt'] ) . '" ' . wp_kses_post( $extras ) . '>';
		$output .= '<meta itemprop="url" content="' . esc_url( $img['src'] ) . '">';
		$output .= '<meta itemprop="width" content="' . esc_attr( $img['width'] ) . 'px">';
		$output .= '<meta itemprop="height" content="' . esc_attr( $img['height'] ) . 'px">';
		$output .= '</div>';
		return $output;

	} elseif ( ! empty( $img['src'] ) ) {
		return '<img ' . wp_kses_post( $image_src_output ) . ' width="' . esc_attr( $img['width'] ) . '" height="' . esc_attr( $img['height'] ) . '" ' . wp_kses_post( $img['srcset'] ) . ' class="' . esc_attr( $img['class'] ) . '" alt="' . esc_attr( $img['alt'] ) . '" ' . wp_kses_post( $extras ) . '>';
	} else {
		return null;
	}
}
