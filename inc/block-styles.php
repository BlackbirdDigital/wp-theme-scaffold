<?php
/**
 * Block style registrations.
 *
 * @package themescaffold
 */

namespace ThemeScaffold\BlockStyles;

/**
 * Register block styles.
 */
function register() {
	/*
	// Lead Paragraph: paragraph with large, bold text.
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'lead',
			'label' => 'Lead Paragraph',
			'style' => 'themescaffold-style',
		)
	);
	*/

	// Link Button: button with only text, no background.
	register_block_style(
		'core/button',
		array(
			'name'  => 'link',
			'label' => 'Link',
			'style' => 'themescaffold-style',
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\\register' );
