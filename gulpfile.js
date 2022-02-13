/**
 * Gulp-WP customizations
 *
 * https://github.com/BlackbirdDigital/gulp-wp
 */

/**
 * Bootstrap GulpWP so that we can use the `gulp` command directly.
 *
 * NOTE: This means the gulp-wp command will not pull in these customizations.
 */
const gulp = require( 'gulp' );

const config = {};

const gulpWP = require( 'gulp-wp' )( gulp, config );
