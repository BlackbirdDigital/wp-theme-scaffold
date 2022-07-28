<?php
/**
 * Partial: site-navigation, footer variation.
 *
 * @package theme-scaffold
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
			'fallback_cb'    => '__return_false',
		)
	);
	?>
</div><!-- .site-navigation--footer -->