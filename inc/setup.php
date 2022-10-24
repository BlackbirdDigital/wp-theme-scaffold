<?php
/**
 * Theme setup.
 *
 * @package themescaffold
 */

namespace ThemeScaffold\Setup;

use function ThemeScaffold\Utilities\register_script;
use function ThemeScaffold\Utilities\register_style;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function setup() {
	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on themescaffold, use a find and replace
	 * to change 'themescaffold' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'themescaffold', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support( 'post-thumbnails' );

	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Add support for responsive video embeds.
	add_theme_support( 'responsive-embeds' );

	// You may wish to remove core block patterns if you're providing your own in inc/block-patterns.php.
	// remove_theme_support( 'core-block-patterns' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'dist/css/editor.css' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );

/**
 * Register menus.
 *
 * @link https://developer.wordpress.org/themes/functionality/navigation-menus/
 */
function menus() {
	register_nav_menus(
		array(
			'primary'          => esc_html__( 'Primary', 'themescaffold' ),
			'secondary'        => esc_html__( 'Secondary', 'themescaffold' ),
			'primary-footer'   => esc_html__( 'Footer Primary', 'themescaffold' ),
			'secondary-footer' => esc_html__( 'Footer Secondary', 'themescaffold' ),
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\\menus' );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function widget_areas() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'themescaffold' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Footer blocks.', 'themescaffold' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', __NAMESPACE__ . '\\widget_areas' );

/**
 * Register scripts and styles.
 *
 * This is for any script/style that needs to be enqueued in multiple places or
 * be available as a dependency.
 */
function register_assets() {
	/**
	 * Google Fonts.
	 *
	 * Note that this uses the latest `css2` version of the URL. The example
	 * contains a variable font with weight range, see
	 * https://developers.google.com/fonts/docs/css2#axis_ranges.
	 */
	wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap', array(), null );
}
add_action( 'init', __NAMESPACE__ . '\\register_assets' );

/**
 * Enqueue scripts and styles.
 */
function enqueue_assets() {
	wp_enqueue_style( 'google-fonts' );

	register_style( 'style', true );

	register_script( 'theme', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_assets' );

/**
 * Enqueue block editor assets.
 *
 * Note: individual blocks from /src/blocks are enqueued automatically by /inc/blocks.php.
 */
function editor_assets() {
	wp_enqueue_style( 'google-fonts' );

	register_script( 'editor', true );
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\editor_assets' );

/**
 * Google Fonts preconnect tags for better font loading performace.
 *
 * Remove or edit if not using Google Fonts.
 */
function google_fonts_tags() {
	?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\\google_fonts_tags' );
