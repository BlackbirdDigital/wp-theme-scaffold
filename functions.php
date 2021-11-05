<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme-scaffold
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
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom blocks, styles, and patterns.
 */
require get_template_directory() . '/inc/blocks.php';
require get_template_directory() . '/inc/block-styles.php';
require get_template_directory() . '/inc/block-patterns.php';
