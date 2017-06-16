// Add this to the end of your wp-content/theme/{themename}/functions.php file.


/**
 * Filter Allow dynamic variables in the post/page using URL parameters
 *
 * @param 	$attributes     - Array of passed attributes, namely 'key' and 'default'
 * @var 	$key			- The key to look for in the URL/Query String array
 * @var 	$key			- The key to look for in the URL/Query String array
 *
 * @return string - returns $key, if that exists in the URL, or $default or if not $default passed, returns ""
 */
add_shortcode('dki', 'dynamic_content');

/**
* Use this shortcode to return dynamic content passed as a URL parameter
*
* Usage: [dki key='' default='']
* (Key = the url_param name, & default = the text to return if none found
*
* E.g. if we wrote this [dki key='city' default='London]
*	Scenario 1: 'city=Manchester' exists in the URL, function returns 'Manchester'
*	Scenario 2: 'city' does not appear in the UR, return 'London'
*
* 	NOTE: if you don't provide a 'default' then it returns nothing if no key is found
*/
function dynamic_content( $attributes ) {
	
	// Define all the variables
	$default = "";
	$return = "";
	$key = FALSE;
	
	// Get any passed attributes & sanitise them
	if ( ! empty( $attributes['key'] ) ) {
        $key = sanitize_text_field( $attributes['key'] );
	}
	if ( ! empty( $attributes['default'] ) ) {
        $default = sanitize_text_field( $attributes['default'] );
	}

	// Get all the query string parameters passed, if any
	parse_str( $_SERVER["QUERY_STRING"], $url_array);

	// Check for the 'key' passed as a URL param & return $default if none passed
	if ( $key != FALSE && array_key_exists( $key, $url_array ) ){
		$return = sanitize_text_field( $url_array[$key] );
	}
	else $return = $default;

	return esc_html( $return );
}
