<?php
/**
 * Block registrations.
 *
 * Handles automatic registration of all blocks in /dist/blocks.
 *
 * @package themescaffold
 */

namespace ThemeScaffold\Blocks;

/**
 * Automatically register custom blocks output to dist/blocks.
 */
function register_blocks() {
	// Filter plugins_url if theme is symlinked.
	add_filter( 'plugins_url', __NAMESPACE__ . '\\block_plugins_url', 10, 2 );

	foreach ( glob( get_template_directory() . '/dist/blocks/*', GLOB_ONLYDIR ) as $block_dir ) {
		// Check for required metadata file.
		$block_metadata = $block_dir . '/block.json';
		if ( ! file_exists( $block_metadata ) ) {
			continue;
		}

		$args = array();

		// Check for optional php template file.
		$block_callback = $block_dir . '/index.php';

		if ( file_exists( $block_callback ) ) {

			// This is available to the PHP template.
			$metadata = wp_json_file_decode( $block_metadata, array( 'associative' => true ) );

			// Only add `render_callback` if `render` is not defined or if there is no `acf.renderTemplate` registered.
			if ( ! isset( $metadata['render'] ) && ( ! isset( $metadata['acf'] ) || ! isset( $metadata['acf']['renderTemplate'] ) ) ) {
				$args['render_callback'] = function( $attributes, $content ) use ( $block_callback, $metadata ) {
					// Note that $attributes, $content, and $metadata will be available in the block template.
					ob_start();
					require $block_callback;
					return ob_get_clean();
				};
			}
		}

		register_block_type( $block_metadata, $args );
	}

	// Remove filter after registering.
	remove_filter( 'plugins_url', __NAMESPACE__ . '\\block_plugins_url', 10 );
}
add_action( 'init', __NAMESPACE__ . '\\register_blocks' );

/**
 * While block registration from themes is now supported, registration from
 * themes that are symlinked, like you might do when developing locally, is not.
 *
 * @link https://core.trac.wordpress.org/ticket/56859
 *
 * Used in register_blocks().
 */
function block_plugins_url( $url, $path ) {
	// Handle symlinked paths (generally only during local development).
	$dir = get_template_directory();
	if ( is_link( $dir ) ) {
		$dir = readlink( $dir );
	}
	// Split the $url by the current theme slug and get just the file path.
	$file = explode( $dir, $url )[1];
	// For some reason this is getting applied to the gutenberg plugin urls, so we check if the string explode above worked.
	if ( empty( $file ) ) {
		return $url;
	}
	return untrailingslashit( get_template_directory_uri() ) . $file;
}
