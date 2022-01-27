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

// TODO: merge blocks task into gulp-wp?
const { config: watchConfig } = require( 'gulp-wp/tasks/watch' );
const config = {
	tasks: {
		styles: {
			watch: [ 'src/styles/**/*.*', 'theme.json' ],
		},
		build: {
			build: [ 'styles', 'scripts', 'blocks' ],
		},
		clean: {
			cleanDest: [ 'scripts', 'styles', 'blocks' ],
		},
		watch: {
			tasks: [
				...watchConfig.tasks,
				{
					task: 'blocks',
					mirrorDeletion: [
						'.css',
						'.css.map',
						'.php',
						'.js',
						'.json',
					],
				},
			],
		},
	},
};

const gulpWP = require( 'gulp-wp' )( gulp, config );
