const theme = require( '../../../theme.json' );

const { custom } = theme.settings;

// Main export object that will become a Sass map.
const customMap = {};

// Add each object from custom to exports as a Sass map compatible object.
Object.keys( custom ).map( ( customKey ) => {
	customMap[ customKey ] = sassMap( custom[ customKey ] );
} );

/**
 *
 * @param {object} object Single-layer object with key-value pairs.
 * @returns {object} Object with quoted keys for maximum Sass compatibility.
 */
function sassMap( object ) {
	return Object.entries( object ).reduce( ( acc, [ key, value ] ) => {
		// Both key and value are quoted. Keys in case they are a recognized CSS color name, and values for things like comma-separated lists.
		acc[ quote( key ) ] = quote( value );
		return acc;
	}, {} );
}

/**
 * Quoted string utility
 * @param {string} value String value to be quoted
 * @returns {string} Quoted string
 */
function quote( value ) {
	return `'${ value }'`;
}

module.exports = {
	custom: customMap,
};
