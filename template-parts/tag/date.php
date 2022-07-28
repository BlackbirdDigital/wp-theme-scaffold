<?php
/**
 * Partial: tag-date.
 *
 * Output the post date.
 *
 * @package theme-scaffold
 */

$defaults = array(
	'element' => 'span',
	'format'  => '',
	'linked'  => false,
);

$args = wp_parse_args( $args, $defaults );

$time_string_template = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
$time_string          = sprintf(
	$time_string_template,
	esc_attr( get_the_date( DATE_W3C ) ),
	esc_html( get_the_date( $args['format'] ) ),
);

$date_format = $args['linked'] ? '<a class="tag-date__date" href="%2$s">%1$s</a>' : '<span class="tag-date__date">%1$s</span>';
$date        = sprintf(
	$date_format,
	$time_string,
	esc_url( get_permalink() )
);
?>

<<?php echo esc_html( $args['element'] ); ?> class="tag-date">
	<span class="tag-date__label"><?php echo esc_html_x( 'Posted on', 'post date', 'theme-scaffold' ); ?></span>
	<?php echo $date; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</<?php echo esc_html( $args['element'] ); ?>>
