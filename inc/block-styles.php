<?php
/**
 * Block style registrations.
 *
 * @package theme-scaffold
 */

namespace ThemeScaffold\BlockStyles;

/**
 * Register block styles.
 */
function register() {
	// Lead Paragraph: paragraph with large, bold text.
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'lead',
			'label' => 'Lead Paragraph',
			'style' => 'theme-scaffold-style',
		)
	);

	// Plain Button: button with only text, no background.
	register_block_style(
		'core/button',
		array(
			'name'  => 'plain',
			'label' => 'Plain',
			'style' => 'theme-scaffold-style',
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\\register' );
