<?php
/**
 * Partial: site-navigation.
 *
 * @package theme-scaffold
 */

use function ThemeScaffold\Utilities\array_subset;
use function ThemeScaffold\Utilities\attributes_from_array;
use function ThemeScaffold\Utilities\get_component;

$default = array(
	'id' => null,
);

$args = wp_parse_args( $args, $defaults );

$attributes = array_subset( $args, array( 'id' ) );
?>

<div <?php attributes_from_array( $attributes ); ?> class="site-navigation">
	<?php
	get_component(
		'menu-toggle',
		array(
			'id'            => 'main-navigation-toggle',
			'aria-controls' => 'main-navigation',
			'aria-expanded' => false,
		)
	);
	?>
	<div class="site-navigation__container">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				// 'fallback_cb'    => false,
			)
		);
		?>
	</div>
</div><!-- .site-navigation -->
