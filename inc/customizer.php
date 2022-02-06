<?php
/**
 * Theme Customizer
 *
 * @package theme-scaffold
 */

namespace ThemeScaffold\Customizer;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => __NAMESPACE__ . '\\partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => __NAMESPACE__ . '\\partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', __NAMESPACE__ . '\\register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function preview_js() {
	$customizerjs_asset = require get_template_directory() . '/dist/js/customizer.asset.php';
	wp_enqueue_script( 'theme-scaffold-customizer', get_template_directory_uri() . '/js/customizer.js', array_merge( array( 'customize-preview' ), $customizerjs_asset['dependencies'] ), $customizerjs_asset['version'], true );
}
add_action( 'customize_preview_init', __NAMESPACE__ . '\\preview_js' );
