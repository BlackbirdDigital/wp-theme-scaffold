<?php
/**
 * Block style registrations.
 *
 * @package theme-scaffold
 */

/**
 * Register block styles.
 */
function theme_scaffold_block_styles() {
	// Lead Paragraph: paragraph with large, bold text.
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'lead',
			'label' => 'Lead Paragraph',
			'style' => 'theme-style',
		)
	);
}
add_action( 'init', 'theme_scaffold_block_styles' );
