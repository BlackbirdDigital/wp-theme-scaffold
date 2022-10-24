<?php
/**
 * Partial: site-navigation, footer variation.
 *
 * @package themescaffold
 */

use function ThemeScaffold\Utilities\array_subset;
use function ThemeScaffold\Utilities\attributes_from_array;

$defaults = array(
	'id' => null,
);

$args = wp_parse_args( $args, $defaults );

$attributes = array_subset( $args, array( 'id' ) );
?>

<div <?php attributes_from_array( $attributes ); ?> class="site-navigation--footer">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary-footer',
			'menu_id'        => 'primary-footer-menu',
			'menu_class'     => 'menu--primary-footer site-navigation__menu--primary-footer',
			'container'      => false,
			'fallback_cb'    => '__return_false',
			'depth'          => 1,
		)
	);
	?>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'secondary-footer',
			'menu_id'        => 'secondary-footer-menu',
			'menu_class'     => 'menu--secondary-footer site-navigation__menu--secondary-footer',
			'container'      => false,
			'fallback_cb'    => '__return_false',
			'depth'          => 1,
		)
	);
	?>
</div><!-- .site-navigation--footer -->
