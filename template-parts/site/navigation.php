<?php
/**
 * Site navigation
 *
 * @package theme-scaffold
 */

use function ThemeScaffold\Utilities\array_subset;
use function ThemeScaffold\Utilities\attributes_from_array;

$default = array(
	'id' => null,
);

$args = wp_parse_args( $args, $defaults );

$attributes = array_subset( $args, array( 'id' ) );
?>

<div <?php attributes_from_array( $attributes ); ?> class="site-navigation">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
		)
	);
	?>
</div><!-- .site-navigation -->
