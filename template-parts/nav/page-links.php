<?php
/**
 * Partial: nav-page-links.
 *
 * Output page number links for the current post if it includes page breaks.
 *
 * @package themescaffold
 */

$defaults = array(
	'label'              => _x( 'Pages:', 'post page links label', 'themescaffold' ),
	'wp_link_pages_args' => array(
		'before' => '',
		'after'  => '',
	),
);

$args = wp_parse_args( $args, $defaults );

// Ensure nested array args are merged.
$wp_link_pages_args = wp_parse_args( $args['wp_link_pages_args'], $defaults['wp_link_pages_args'] );

$page_links = wp_link_pages( $wp_link_pages_args );

if ( ! empty( $page_links ) ) :
	?>

<div class="nav-page-links">
	<nav class="nav-page-links__nav">
		<?php // Using h2 to provide a heading to the nav section. ?>
		<h2 class="nav-page-links__label"><?php echo esc_html( $args['label'] ); ?></h2>
		<div class="nav-page-links__links">
			<?php echo $page_links; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</nav>
</div>

	<?php
endif;
