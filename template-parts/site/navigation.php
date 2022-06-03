<?php
/**
 * Partial: site-navigation.
 *
 * @package theme-scaffold
 */

use function ThemeScaffold\Utilities\array_subset;
use function ThemeScaffold\Utilities\attributes_from_array;

$default = array(
	'id' => 'navigation',
);

$args = wp_parse_args( $args, $defaults );

$attributes = array_subset( $args, array( 'id' ) );
?>

<div <?php attributes_from_array( $attributes ); ?> class="site-navigation">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'menu_class'     => 'menu--primary',
			'menu_id'        => 'primary-menu',
			'container'      => false,
			'fallback_cb'    => '__return_false',
		)
	);
	wp_nav_menu(
		array(
			'theme_location' => 'secondary',
			'menu_class'     => 'menu--secondary',
			'menu_id'        => 'secondary-menu',
			'container'      => false,
			'fallback_cb'    => '__return_false',
		)
	);
	?>
</div><!-- .site-navigation -->
