/**
 * Gulp-WP customizations
 *
 * https://github.com/BlackbirdDigital/gulp-wp
 *
 * To use this file, you must change the npm scripts in package.json for start
 * and build to `gulp` instead of `gulp-wp`.
 *
 * "scripts": {
 *   "start": "gulp",
 *   "build": "gulp build"
 * },
 */

/**
 * Bootstrap GulpWP so that we can use the `gulp` command directly.
 *
 * NOTE: This means the gulp-wp command will not pull in these customizations.
 */
const gulp = require( 'gulp' );

const config = require( './gulp-wp.config' );

const gulpWP = require( 'gulp-wp' )( gulp, config );
