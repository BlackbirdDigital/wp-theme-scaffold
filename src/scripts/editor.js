/**
 * Editor
 *
 * Import all block registrations and other editor customizations.
 */

import {
	registerBlockCollection,
	registerBlockStyle,
	unregisterBlockStyle,
} from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';
import { __ } from '@wordpress/i18n';
// @see https://wordpress.github.io/gutenberg/?path=/story/icons-icon--library
import { info } from '@wordpress/icons';

/**
 * Theme block collections.
 */
// Native blocks with the "themescaffold" namespace.
registerBlockCollection( 'themescaffold', {
	title: __( 'WP Theme Scaffold', 'themescaffold' ),
	icon: info, // Replace with custom SVG icon markup.
} );
// ACF blocks with the "acf" namespace.
registerBlockCollection( 'acf', {
	title: __( 'WP Theme Scaffold ACF', 'themescaffold' ),
	icon: info, // Replace with custom SVG icon markup.
} );

/**
 * Client-side block style registrations
 */
( () => {
	// Button "plain"
	/*
	registerBlockStyle( 'core/button', {
		name: 'plain',
		label: 'Plain',
		style: 'theme-style',
	} );
	*/
} )();

/**
 * Client-side block style unregistrations must happen on domReady
 */
domReady( () => {
	//unregisterBlockStyle( 'core/button', 'fill' );
} );
