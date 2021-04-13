/**
 * Configuration File
 *
 * Edit the variables as per your project requirements.
 *
 * @note All paths should include a trailing slash unless otherwise noted.
 */

// Since this is JS, we can be DRY
const slug = 'theme-scaffold';

// Project options object
export default {

	/**
	 * Local domain of the WordPress website.
	 *
	 * Usually something like 'themescaffold.local' or 'localhost'
	 */
	localDomain: 'themescaffold.local',

	/**
	 * BrowserSync settings.
	 *
	 * You can override any BrowserSync setting below.
	 * Both `proxy` and `host` will use localDomain above unless overriden here.
	 *
	 * @link http://www.browsersync.io/docs/options/
	 */
	browserSync: {
		open: 'external', // Set to false if you want to open the BrowserSync proxy site manually
	},

	/**
	 * Browsers to target for autoprefixing CSS and JS feature shims.
	 *
	 * @link https://github.com/ai/browserslist
	 */
	targetBrowsers: ['last 2 version', '> 1%'],

	/**
	 * Style path options.
	 */
	// Path to main .scss file.
	stylePath: 'assets/sass/',
	// Path to place the compiled CSS files.
	styleDestination: 'css/',

	/**
	 * Sass compiler options.
	 *
	 * https://sass-lang.com/documentation/js-api#options
	 */
	sass: {
		outputStyle: 'compact', // compact | compressed | nested | expanded
		errLogToConsole: true,
		precision: 10,
	},

	/**
	 * JavaScript path options.
	 */
	// Path to JS source files. All files in the root of thie folder will be treated as separate entry points.
	jsPath: 'assets/js/',
	// Path to place the compiled JS files.
	jsDestination: 'js/',
	// Path to JS vendor folder. Any files in the root of this folder are included.
	jsVendorPath: 'assets/js/vendor/',
	// Path to place the compiled JS vendors file.
	jsVendorDestination: 'js/vendor/',
	// Compiled JS vendors file name. Default set to vendors i.e. vendors.js.
	jsVendorFile: 'vendor',

	/**
	 * Image path options.
	 */
	// Source folder of images which should be optimized and watched.
	// - You can also specify types e.g. raw/**.{png,jpg,gif} in the glob.
	imgPath: 'assets/img/**/*',
	// Destination folder of optimized images.
	// - Must be different from the imagesSRC folder.
	imgDestination: 'img/',

	/**
	 * Imagemin options.
	 *
	 * Handles optimizing images.
	 *
	 * @link https://github.com/sindresorhus/gulp-imagemin#api
	 */
	imagemin: {
		gifsicle: {
			interlaced: true,
		},
		mozjpeg: {
			quality: 90, // 0-100.
			progressive: true,
		},
		optipng: {
			optimizationLevel: 3, // 0-7 low-high.
		},
		svgo: {
			plugins: [
				{removeViewBox: false},
				{cleanupIDs: false}
			],
		},
	},

	/**
	 * Zip archive config.
	 *
	 * For exporting a tidy package of your project, if you are into that.
	 */
	// Name will have ".zip" appended automatically.
	zipName: slug,
	// Must be a folder outside of the zip folder.
	zipDestination: './../', // Default: Parent folder.
	// Files to include in the zip archive.
	zipIncludeGlob: ['./**/*'], // Default: Include all files/folders in current directory.
	// Files and folders to ignore for the zip archive.
	zipIgnoreGlob: [
		'!./{node_modules,node_modules/**/*}',
		'!./.git',
		'!./.svn',
		'!./.eslintrc.js',
		'!./.eslintignore',
		'!./.editorconfig',
		'!./phpcs.xml.dist',
		'!./vscode',
		'!./package-lock.json'
	],

	/**
	 * Translation options.
	 */
	// Where to save the translation files.
	translationDestination: 'languages/',

	/**
	 * WP-Pot options.
	 *
	 * Handles generating the ".pot" file for translation strings.
	 */
	wpPot: {
		// Your text domain here. This will also be the name of the translation file.
		textDomain: slug,
		// Package name.
		package: slug,
		// URL where can users report bugs.
		bugReport: 'https://blackbird.digital',
		// Last translator email.
		lastTranslator: 'Blackbird <wp@blackbird.digital>',
		// Team email.
		team: 'Blackbird <info@blackbird.digital>',
	},
};
