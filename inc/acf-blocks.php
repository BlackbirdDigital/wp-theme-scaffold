<?php
/**
 * ACF Block registrations.
 *
 * @package theme-scaffold
 */

add_action( 'acf/init', 'my_acf_blocks_init' );
/**
 * Register Advanced Custom Field Blocks
 *
 * @return void
 */
function my_acf_blocks_init() {

	if ( function_exists( 'acf_register_block_type' ) ) {

	}
}
