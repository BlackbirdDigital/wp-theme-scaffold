/**
 * Task: blocks
 *
 * TODO: merge blocks task into gulp-wp?
 */

// Node
const { basename, dirname, extname, join } = require( 'path' );

// External
const named = require( 'vinyl-named' );
const filter = require( 'gulp-filter' );
const webpack = require( 'webpack' );
const RemoveEmptyScriptsPlugin = require( 'webpack-remove-empty-scripts' );
const webpackStream = require( 'webpack-stream' );
const wpWebpackConfig = require( '@wordpress/scripts/config/webpack.config' );

// GulpWP
const { handleStreamError, logFiles } = require( 'gulp-wp/util' );

module.exports = {
	task: ( gulp, { src, dest, entries, includePaths } ) => {
		return function blocks( done ) {
			const filterEntries = filter( entries, {
				restore: true,
			} );
			const filterOthers = filter( [
				entries,
				'*.{php,json}',
				'!*.asset.php',
			] );

			const webpackConfig = {
				...wpWebpackConfig,
				optimization: {
					...( wpWebpackConfig?.optimization || {} ),
					splitChunks: {
						...( wpWebpackConfig?.optimization?.splitChunks || {} ),
						cacheGroups: {
							...( wpWebpackConfig?.optimization?.splitChunks
								?.cacheGroups || {} ),
							style: {
								type: 'css/mini-extract',
								test: /[\\/]style(\.module)?\.(sc|sa|c)ss$/,
								chunks: 'all',
								// Remove the default renaming of any file named "style".
								/*
								enforce: true,
								name( module, chunks, cacheGroupKey ) {
									return `${ cacheGroupKey }-${ chunks[ 0 ].name }`;
								},
								*/
							},
							default: false,
						},
					},
				},
				resolve: {
					...wpWebpackConfig.resolve,
					modules: [
						...( wpWebpackConfig.resolve?.modules || [] ),
						...includePaths,
					],
				},
				plugins: [
					new RemoveEmptyScriptsPlugin(),
					...( wpWebpackConfig?.plugins || [] ),
				],
				devtool: 'source-map',
			};
			// Remove config props that may interfere with webpackStream
			delete webpackConfig[ 'entry' ];

			return (
				gulp
					.src( src )
					.pipe( handleStreamError( 'blocks' ) )
					// Filter out all but entrypoints.
					.pipe( filterEntries )
					.pipe( logFiles( { task: 'blocks', title: 'entry:' } ) )
					// Convert into named entrypoints for WebPack.
					.pipe(
						named( ( file ) => {
							// Include parent folder in name so that destination is sorted in block folders.
							return join(
								basename( dirname( file.path ) ),
								basename( file.path, extname( file.path ) )
							);
						} )
					)
					// TODO: webpack errors are displayed twice.
					.pipe( webpackStream( webpackConfig, webpack ) )
					.pipe( gulp.dest( dest ) )
					// Handle moving other files (php, json)
					.pipe( filterEntries.restore )
					.pipe( filterOthers )
					.pipe( logFiles( { task: 'blocks', title: 'copy:' } ) )
					.pipe( gulp.dest( dest ) )
			);
		};
	},
	config: {
		src: 'src/blocks/**/*.*',
		srcBase: 'src/blocks', // for watch task to mirror deletions
		dest: 'dist/blocks',
		entries: 'src/blocks/*/*.{{j,t}{s,sx},{sa,sc,c}ss}',
		includePaths: [ 'node_modules' ],
	},
};
