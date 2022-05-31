<?php
/**
 * ACF Block registrations.
 *
 * @link https://www.advancedcustomfields.com/resources/acf_register_block_type/
 *
 * @package theme-scaffold
 */

add_action( 'acf/init', 'register_acf_blocks_init' );
/**
 * Register Advanced Custom Field Blocks
 *
 * @return void
 */
function register_acf_blocks_init() {

	if ( function_exists( 'acf_register_block_type' ) ) {

	}
}
