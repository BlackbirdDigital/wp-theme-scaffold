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
 * @param string $slug Slug name of the module file.
 * @param string $name The name of the specialised template.
 * @param array  $args Optional. Additional arguments passed to the template.
 *                     Default empty array.
 * @return void|false Void on success, false if the template does not exist.
 */
function get_module( $slug, $name = null, $args = array() ) {
	return get_template_part( 'modules/' . $slug, $name, $args );
}

/**
 * Output a template from the components foluder using `get_template_part()`.
 *
 * @param string $name Name of the component file.
 * @param array  $args Optional. Additional arguments passed to the template.
 *                     Default empty array.
 * @return void|false Void on success, false if the template does not exist.
 */
function get_component( $name, $args = array() ) {
	return get_template_part( 'components/' . $name, null, $args );
}
