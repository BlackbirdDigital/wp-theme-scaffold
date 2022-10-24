<?php
/**
 * Component: menu-toggle.
 *
 * @package themescaffold
 */

use function ThemeScaffold\Utilities\array_subset;
use function ThemeScaffold\Utilities\attributes_from_array;

// Default $args.
$defaults = array(
	'id'            => null,
	'aria-controls' => '',
	'aria-expanded' => false,
	'aria-label'    => esc_attr__( 'Toggle Menu', 'themescaffold' ),
);

$args = wp_parse_args( $args, $defaults );

// Select $args to be set as attributes.
$attributes = array_subset( $args, array( 'id', 'aria-controls', 'aria-expanded', 'aria-label' ) );
?>

<button
	class="menu-toggle"
	<?php attributes_from_array( $attributes ); ?>
>
	<span class="menu-toggle__icon"></span>
</button>
