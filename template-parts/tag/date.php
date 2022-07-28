<?php
/**
 * Partial: tag-date.
 *
 * Output the post date.
 *
 * @package davidwilkinson
 */

$defaults = array(
	'element' => 'span',
	'format'  => '',
);

$args = wp_parse_args( $args, $defaults );

$time_string_template = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
$time_string          = sprintf(
	$time_string_template,
	esc_attr( get_the_date( DATE_W3C ) ),
	esc_html( get_the_date( $args['format'] ) ),
);
?>

<<?php echo esc_html( $args['element'] ); ?> class="tag-date">
	<span class="tag-date__label"><?php echo esc_html_x( 'Posted on', 'post date', 'davidwilkinson' ); ?></span>
	<span class="tag-date__date"><?php echo $time_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
</<?php echo esc_html( $args['element'] ); ?>>
