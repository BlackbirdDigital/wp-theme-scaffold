<?php
/**
 * Component: menu-toggle.
 *
 * @package theme-scaffold
 */

use function ThemeScaffold\Utilities\array_subset;
use function ThemeScaffold\Utilities\attributes_from_array;

// Default $args.
$defaults = array(
	'id'            => null,
	'aria-controls' => '',
	'aria-expanded' => false,
	'aria-label'    => esc_attr__( 'Toggle Menu', 'theme-scaffold' ),
);

$args = wp_parse_args( $args, $defaults );

// Select $args to be set as attributes.
$attributes = array_subset( $args, array( 'id', 'aria-controls', 'aria-expanded', 'aria-label' ) );
?>

<button
	class="menu-toggle"
	<?php attributes_from_array( $attributes ); ?>
>
	<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="4" y="7.5" width="16" height="1.5"></rect><rect x="4" y="15" width="16" height="1.5"></rect></svg>
</button>
