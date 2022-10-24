<?php
/**
 * Block pattern registrations.
 *
 * @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/
 *
 * @package themescaffold
 */

namespace ThemeScaffold\BlockPatterns;

/**
 * Register block patterns.
 */
function register() {
	/*
	register_block_pattern(
		'themescaffold/example-pattern',
		array(
			'title'       => __( 'Example Pattern', 'themescaffold') ,
			'description' => __( 'An example block pattern.', 'themescaffold' ),
			'content'     => '<!-- wp:paragraph --><p>Hello world.</p><!-- /wp:paragraph -->',
		)
	);
	*/
}
add_action( 'init', __NAMESPACE__ . '\\register' );
