<?php
/**
 * Useful functions.
 *
 * Note than to use, you must use this file's namespace:
 *
 * use function ThemeScaffold\Utilities\debug;
 * debug( $foo );
 *
 * @package themescaffold
 */

namespace ThemeScaffold\Utilities;

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
			if ( null === $value ) {
				return $acc;
			}
			// Transform boolean to string.
			if ( is_bool( $value ) ) {
				$value = $value ? 'true' : 'false';
			}
			$acc[] = esc_html( $key ) . '="' . esc_attr( $value ) . '"';
			return $acc;
		},
		array()
	);

	echo join( ' ', $atts ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

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
 * Get a script or style asset handle for registration/enqueuing.
 *
 * @param string $name Asset file name without extension.
 */
function get_asset_handle( string $name ) {
	return 'themescaffold-' . $name;
}

/**
 * Output a template from the components folder using `get_template_part()`.
 *
 * @param string $name Name of the component file.
 * @param array  $args Optional. Additional arguments passed to the template.
 *                     Not used if $name is an arguments array.
 *                     Default empty array.
 * @return void|false Void on success, false if the template does not exist.
 */
function get_component( $name, $args = array() ) {
	return get_template_part( 'components/' . $name, null, $args );
}

/**
 * Enqueue a script asset.
 *
 * @param string  $name File name without extension.
 * @param boolean $enqueue Optional. Whether to enqueue the asset.
 *                         Default false.
 * @param array   $dependencies Optional. Additional dependencies to include,
 *                              aside from any found in the asset file.
 * @param boolean $footer Optional. Whether to enqueue in the footer.
 *                        Default true.
 */
function register_script( string $name, bool $enqueue = false, array $dependencies = array(), bool $footer = true ) {
	$asset  = require get_template_directory() . '/dist/js/' . $name . '.asset.php';
	$handle = get_asset_handle( $name );

	wp_register_script( $handle, get_template_directory_uri() . '/dist/js/' . $name . '.js', array_merge( $asset['dependencies'], $dependencies ), $asset['version'], $footer );

	if ( $enqueue ) {
		wp_enqueue_script( $handle );
	}
}

/**
 * Enqueue a style asset.
 *
 * @param string  $name File name without extension.
 * @param boolean $enqueue Optional. Whether to enqueue the asset.
 *                         Default false.
 * @param array   $dependencies Optional. Additional dependencies to include,
 *                              aside from any found in the asset file.
 */
function register_style( string $name, bool $enqueue = false, array $dependencies = array() ) {
	$asset  = require get_template_directory() . '/dist/css/' . $name . '.asset.php';
	$handle = get_asset_handle( $name );

	wp_register_style( $handle, get_template_directory_uri() . '/dist/css/' . $name . '.css', array_merge( $asset['dependencies'], $dependencies ), $asset['version'] );

	if ( $enqueue ) {
		wp_enqueue_style( $handle );
	}
}
