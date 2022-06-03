<?php
/**
 * Block pattern registrations.
 *
 * @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/
 *
 * @package theme-scaffold
 */

namespace ThemeScaffold\BlockPatterns;

/**
 * Register block patterns.
 */
function register() {
	/*
	register_block_pattern(
		'theme-scaffold/example-pattern',
		array(
			'title'       => __( 'Example Pattern', 'theme-scaffold') ,
			'description' => __( 'An example block pattern.', 'theme-scaffold' ),
			'content'     => '<!-- wp:paragraph --><p>Hello world.</p><!-- /wp:paragraph -->',
		)
	);
	*/
}
add_action( 'init', __NAMESPACE__ . '\\register' );
