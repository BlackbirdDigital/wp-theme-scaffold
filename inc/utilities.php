<?php
/**
 * Useful functions.
 *
 * @package theme-scaffold
 */

namespace ThemeScaffold\Utilities;

/**
 * Print a variable inside a <pre> tag with `print_r()`.
 * Only outputs if WP_DEBUG = true.
 *
 * @param any $var Variable to output.
 */
function debug( $var ) {
	if ( defined( 'WP_DEBUG' ) && WP_DEBUG === true ) {
		echo '<pre>';
		print_r( $var ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions
		echo '</pre>';
	}
}

/**
 * Output a template from the components foluder using `get_template_part()`.
 *
 * @param string       $slug Slug name of the module file.
 * @param string|array $name The name of the specialised template or arguments array.
 * @param array        $args Optional. Additional arguments passed to the template.
 *                           Not used if $name is an arguments array.
 *                           Default empty array.
 * @return void|false Void on success, false if the template does not exist.
 */
function get_component( $slug, $name = null, $args = array() ) {
	if ( is_array( $name ) ) {
		$args = $name;
		$name = null;
	}
	return get_template_part( 'components/' . $slug, $name, $args );
}

/**
 * Return a subset of an array based on an array of keys.
 *
 * @param array    $array Array to subset.
 * @param string[] $keys  Array of keys to pull from $array.
 */
function array_subset( $array = array(), $keys = array() ) {
	return array_intersect_key( $array, array_flip( $keys ) );
}

/**
 * Output attributes for an HTML tag from an array of key => value pairs.
 *
 * @param array $array Array of key => vaue pairs.
 */
function attributes_from_array( $array ) {
	$atts = array_reduce(
		array_keys( $array ),
		function( $acc, $key ) use ( $array ) {
			$value = $array[ $key ];
			// Skip null values.
			if ( $value === null ) {
				return $acc;
			}
			// Transform boolean to string.
			if ( is_bool( $value ) ) {
				$value = $value ? 'true' : 'false';
			}
			$acc[] = esc_html( $key ) . '="' . esc_attr( $array[ $key ] ) . '"';
		},
		array()
	);

	echo join( ' ', $atts ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
