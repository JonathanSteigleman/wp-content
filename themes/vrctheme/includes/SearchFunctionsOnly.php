
/**
 * Adds emphasis to the parts passed in $content that are equal to $search_query.
 *
 * @param $content The content to alter.
 * @param $search_query The search query to match against.
 *
 * @return string The emphasized text.
 * Added by Elise to emphasize title headings in searches
 * Source: https://yoast.com/internal-search/ 
 */
function emphasize( $content, $search_query ) {
    $keys = array_map( 'preg_quote', explode(" ", $search_query ) );
    return preg_replace( '/(' . implode('|', $keys ) .')/iu', '<strong class="search-excerpt">\0</strong>', $content );
}

/**
 * Creates a custom read more link.
 *
 * @return string The read more link.
 * Added by Elise, this is the first part of highlighting keywords in the excerpt of searches.
 * Source: https://yoast.com/internal-search/
 */
function modify_read_more_link() {
    return ' <a class="more-link" href="' . get_permalink() . '">Continue reading</a>';
}

/**
 * Allows for excerpt generation outside the loop.
 *
 * @param string $text  The text to be trimmed
 * @return string       The trimmed text
 * Added by Elise, this is part of highlighting keywords in the excerpt of searches.
 * Source: https://yoast.com/internal-search/
 */
function custom_trim_excerpt( $text = '' ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);

    $excerpt_length = apply_filters('excerpt_length', 55);

    $trimmed = wp_trim_words( $text, $excerpt_length, '' );

    if ( is_search() ) {
        $trimmed = emphasize( $trimmed, get_search_query() );
    }

    return $trimmed . modify_read_more_link();
}
add_filter('wp_trim_excerpt', 'custom_trim_excerpt');