<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themescaffold
 */

/**
 * Utilities.
 */
require get_template_directory() . '/inc/utilities.php';

/**
 * Theme setup.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/hooks.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom blocks and styles.
 */
require get_template_directory() . '/inc/acf-blocks.php';
require get_template_directory() . '/inc/blocks.php';
require get_template_directory() . '/inc/block-styles.php';
