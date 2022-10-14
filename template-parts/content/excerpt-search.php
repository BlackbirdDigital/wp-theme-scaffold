<?php
/**
 * Partial: content-excerpt, search variation.
 *
 * Used to display a standardized post excerpt in search results.
 *
 * @package themescaffold
 */

$defaults = array(
	'heading_level' => 3,
);

$args = wp_parse_args( $args, $defaults );

$pto = get_post_type_object( get_post_type() );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-excerpt--search' ); ?>>
	<div class="content-excerpt__type">
		<?php echo esc_html( $pto->labels->singular_name ); ?>
	</div>

	<?php
	the_title(
		sprintf(
			'<h$1%s class="content-excerpt__title entry-title"><a href="$2%s" rel="bookmark">',
			$args['heading_level'],
			esc_url( get_permalink() )
		),
		sprintf(
			'</a></h$1%s>',
			$args['heading_level']
		)
	);
	?>

	<div class="content-excerpt__content entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>
