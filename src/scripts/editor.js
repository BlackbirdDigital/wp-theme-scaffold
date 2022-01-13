/**
 * Editor
 *
 * Import all block registrations and other editor customizations.
 */

import { registerBlockStyle, unregisterBlockStyle } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';

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
