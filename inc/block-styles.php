<?php
// Color Palette
function add_custom_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => 'White',
				'slug'  => 'white',
				'color' => '#FFFFFF',
			],
			[
				'name'  => 'Black',
				'slug'  => 'black',
				'color' => '#000000',
			]
		]
	);
}
add_action( 'after_setup_theme', 'add_custom_gutenberg_color_palette' );
