<?php
/**
 * Block registrations.
 *
 * Handles automatic registration of all blocks in /dist/blocks.
 *
 * @package themescaffold
 */

namespace ThemeScaffold\Blocks;

use function ThemeScaffold\Utilities\get_asset_handle;

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
 * Enable loading separate stylesheets for blocks.
 */
add_filter( 'should_load_separate_core_block_assets', '__return_true' );

/**
 * Enqueue block-specific style overrides based on folder structure.
 *
 * NOTE: will not pick up on new styles added in a child theme, but will allow
 * overrides of existing block styles in parent theme.
 */
function block_style_overrides() {
	// Block styles are still added directly to the main editor stylesheet to enable any styles using the `editor` context.
	if ( is_admin() ) {
		return;
	}

	foreach ( glob( get_template_directory() . '/dist/css/blocks/*', GLOB_ONLYDIR ) as $namespace_dir ) {
		$namespace = basename( $namespace_dir );

		foreach ( glob( $namespace_dir . '/*.css' ) as $block_file ) {
			$blockname            = basename( $block_file, '.css' );
			$asset                = require get_theme_file_path( 'dist/css/blocks/' . $namespace . '/' . $blockname . '.asset.php' );
			$namespaced_blockname = $namespace . '/' . $blockname;

			// Enqueue the block's style.
			wp_enqueue_block_style(
				$namespaced_blockname,
				array(
					'handle' => get_asset_handle( 'block-' . $namespace . '-' . $blockname ),
					'src'    => get_theme_file_uri( 'dist/css/blocks/' . $namespace . '/' . $blockname . '.css' ),
					'path'   => get_theme_file_path( 'dist/css/blocks/' . $namespace . '/' . $blockname . '.css' ),
					'deps'   => array_merge(
						$asset['dependencies'],
						array( get_asset_handle( 'style' ) ) // Enqueue after main theme stylesheet.
					),
					'ver'    => $asset['version'],
				),
			);
		}
	}
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\block_style_overrides', 10 );

/**
 * While block registration from themes is now supported, registration from
 * themes that are symlinked, like you might do when developing locally, is not.
 *
 * @link https://core.trac.wordpress.org/ticket/56859
 *
 * Used in register_blocks().
 *
 * @param string $url  The default plugins URL.
 * @param string $path The filesystem directory path to the file.
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
