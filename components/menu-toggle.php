<?php
/**
 * Component: menu-toggle
 *
 * @package theme-scaffold
 */

use function ThemeScaffold\Utilities\array_subset;
use function ThemeScaffold\Utilities\attributes_from_array;

$defaults = array(
	'id'            => null,
	'aria-controls' => '',
	'aria-expanded' => false,
);

$args = wp_parse_args( $args, $defaults );

$attributes = array_subset( $args, array( 'id', 'aria-controls', 'aria-expanded' ) );
?>

<button class="menu-toggle" <?php attributes_from_array( $attributes ); ?>><?php esc_html_e( 'Toggle Menu', 'theme-scaffold' ); ?></button>
