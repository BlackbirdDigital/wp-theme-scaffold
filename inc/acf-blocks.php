<?php
/**
 * ACF Block registrations.
 *
 * @link https://www.advancedcustomfields.com/resources/acf_register_block_type/
 *
 * @package themescaffold
 */

namespace ThemeScaffold\ACFBlocks;

/**
 * Register Advanced Custom Field Blocks.
 *
 * @return void
 */
function register() {

	if ( function_exists( 'acf_register_block_type' ) ) {
		// Register an example block.
		acf_register_block_type(
			array(
				'name'            => 'example-block',
				'title'           => __( 'Example Block' ),
				'description'     => __( 'An example block.' ),
				'render_template' => 'template-parts/acf-blocks/example.php',
				'category'        => 'common',
				'icon'            => '<svg width="175" height="175" viewBox="0 0 175 175" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M166.25 0H8.75C3.918 0 0 3.918 0 8.75V166.25C0 168.57 0.92188 170.797 2.5625 172.438C4.20312 174.078 6.4297 175 8.75 175H166.25C168.57 175 170.797 174.078 172.438 172.438C174.078 170.797 175 168.57 175 166.25V8.75C175 6.4297 174.078 4.2031 172.438 2.5625C170.797 0.9219 168.57 0 166.25 0ZM157.5 157.5H17.5V17.5H157.5V157.5Z" fill="black"/></svg>',
				'supports'        => array(
					'jsx' => true,
				),
			)
		);
	}
}
add_action( 'acf/init', __NAMESPACE__ . '\\register' );
