/**
 * Theme.json importer.
 *
 * Imports the custom settings from theme.json. Expects all top-level
 * properties to be an object.
 * Generally, you should @use settings/theme instead of this file.
 */

const theme = require( '../../../theme.json' );

const { custom } = theme.settings;

// Main export object that will become a Sass map.
const customMap = {};

// Add each object from custom to exports as a Sass map compatible object.
Object.keys( custom ).map( ( customKey ) => {
	customMap[ customKey ] = sassMap( custom[ customKey ] );
} );

/**
 * Create a Sass-compatible map.
 * @param {object} object Single-layer object with key-value pairs.
 * @returns {object} Object with quoted keys for maximum Sass compatibility.
 */
function sassMap( object ) {
	return Object.entries( object ).reduce( ( acc, [ key, value ] ) => {
		// Key must be quoted to avoid weirdness with color names and other reserved keywords.
		// Comma-separated values are transformed into an array (sass list).
		acc[ quote( key ) ] =
			typeof value === 'string' && value.includes( ',' )
				? value.split( ',' ).map( ( s ) => s.trim() )
				: value;
		return acc;
	}, {} );
}

/**
 * Quoted string utility.
 * @param {string} value String value to be quoted
 * @returns {string} Quoted string
 */
function quote( value ) {
	return `'${ value }'`;
}

module.exports = {
	custom: customMap,
};
