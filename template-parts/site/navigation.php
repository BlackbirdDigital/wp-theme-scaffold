<?php
/**
 * Partial: site-navigation.
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

<div <?php attributes_from_array( $attributes ); ?> class="site-navigation">
	<div class="site-navigation__inner-container">
		<div class="site-navigation__menus">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'menu--primary site-navigation__menu--primary',
					'container'      => false,
					'fallback_cb'    => '__return_false',
				)
			);
			?>

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'secondary',
					'menu_id'        => 'secondary-menu',
					'menu_class'     => 'menu--secondary site-navigation__menu--secondary',
					'container'      => false,
					'fallback_cb'    => '__return_false',
				)
			);
			?>
		</div>
	</div>
</div><!-- .site-navigation -->
