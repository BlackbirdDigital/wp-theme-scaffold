<?php
/**
 * Useful functions.
 *
 * @package theme-scaffold
 */

/**
 * Print a variable inside a <pre> tag with `print_r()`.
 *
 * @param any $var Variable to output.
 */
function debug( $var ) {
	echo '<pre>';
	print_r( $var );
	echo '</pre>';
}

/**
 * Output a template from the modules folder using `get_template_part()`.
 *
 * @param string       $slug Slug name of the module file.
 * @param string|array $name The name of the specialised template or arguments array.
 * @param array        $args Optional. Additional arguments passed to the template.
 *                           Not used if $name is an arguments array.
 *                           Default empty array.
 * @return void|false Void on success, false if the template does not exist.
 */
function get_module( $slug, $name = null, $args = array() ) {
	if ( is_array( $name ) ) {
		$args = $name;
		$name = null;
	}
	return get_template_part( 'inc/modules/' . $slug, $name, $args );
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
	return get_template_part( 'inc/components/' . $slug, $name, $args );
}
