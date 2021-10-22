const theme = require( '../../../theme.json' );

const { custom } = theme.settings;

// Main export object that will become a Sass map.
const theme = {};

// Add each object from custom to exports as a Sass map compatible object.
Object.keys( custom ).map( ( customKey ) => {
	theme[ customKey ] = sassMap( custom[ customKey ] );
} );

/**
 *
 * @param {object} object Single-layer object with key-value pairs.
 * @returns {object} Object with quoted keys for maximum Sass compatibility.
 */
function sassMap( object ) {
	return Object.entries( object ).reduce( ( acc, [ key, value ] ) => {
		// Key is quoted in case it is a recognized CSS color name.
		acc[ quote( key ) ] = value;
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
	theme,
};
