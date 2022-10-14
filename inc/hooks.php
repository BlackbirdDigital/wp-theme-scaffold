<?php
/**
 * Functions which enhance the theme by hooking into WordPress.
 *
 * @package themescaffold
 */

namespace ThemeScaffold\Hooks;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array Modified classes for the body element.
 */
function body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\\body_classes' );

/**
 * Remove "Archive: " prefix from archive titles.
 *
 * @param string $title Current archive title.
 * @return string Modified archive title.
 */
function archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_tax() ) { // for custom post types
		$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', __NAMESPACE__ . '\\archive_title' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', __NAMESPACE__ . '\\pingback_header' );

/**
 * Render humans.txt at /humans.txt URL.
 */
function render_humans_txt() {
	if ( $_SERVER['REQUEST_URI'] === '/humans.txt' ) {
		header( 'Content-Type: text/plain; charset=utf-8' );
		include get_template_directory() . '/humans.txt';
		exit();
	}
}
add_action( 'parse_request', __NAMESPACE__ . '\\render_humans_txt' );

/**
 * Add humans.txt link to head.
 */
function link_humans_txt() {
	printf(
		'<link rel="author" type="text/plain" href="%s" />',
		esc_url( home_url( 'humans.txt' ) )
	);
}
add_action( 'wp_head', __NAMESPACE__ . '\\link_humans_txt', 1 );
