<?php
/**
 * Partial: tag-date.
 *
 * Output the post date.
 *
 * @package themescaffold
 */

$defaults = array(
	'class'  => '',
	'format' => '',
	'label'  => esc_html_x( 'Posted on', 'post date label', 'themescaffold' ),
	'linked' => false,
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

<span class="tag-date <?php echo esc_attr( $args['class'] ); ?>">
	<span class="tag-date__label"><?php echo $args['label']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
	<?php echo $date; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</span>
