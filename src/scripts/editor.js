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
// Native blocks with the "theme-scaffold" namespace.
registerBlockCollection( 'theme-scaffold', {
	title: __( 'Theme Scaffold', 'theme-scaffold' ),
	icon: info, // Replace with custom SVG icon markup.
} );
// ACF blocks with the "acf" namespace.
registerBlockCollection( 'acf', {
	title: __( 'Theme Scaffold ACF', 'theme-scaffold' ),
	icon: info, // Replace with custom SVG icon markup.
} );

/**
 * Client-side block style registrations
 */
( () => {
	// Button "link"
	/*
	registerBlockStyle( 'core/button', {
		name: 'link',
		label: 'Link',
		style: 'theme-style',
	} );
	*/
} )();

/**
 * Client-side block style unregistrations must happen on domReady
 */
domReady( () => {
	//unregisterBlockStyle( 'core/button', 'outline' );
} );
