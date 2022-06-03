<?php
/**
 * Partial: site-navigation.
 *
 * @package theme-scaffold
 */

use function ThemeScaffold\Utilities\array_subset;
use function ThemeScaffold\Utilities\attributes_from_array;

$default = array(
	'id' => 'navigation-footer',
);

$args = wp_parse_args( $args, $defaults );

$attributes = array_subset( $args, array( 'id' ) );
?>

<div <?php attributes_from_array( $attributes ); ?> class="site-navigation--footer">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'menu_class'     => 'menu--footer-primary',
			'menu_id'        => 'primary-menu',
			'container'      => false,
			'fallback_cb'    => '__return_false',
		)
	);
	?>
</div><!-- .site-navigation--footer -->
