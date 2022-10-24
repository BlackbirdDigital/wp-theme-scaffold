<?php
/**
 * Partial: tag-thumbnail.
 *
 * Output the post thumbnail, with option to ignore if block is used.
 *
 * @package themescaffold
 */

$defaults = array(
	'hide_if_block_present' => false, // If true, hide on single post if core/post-featured-image block is used within the post.
	'linked'                => false,
	'size'                  => 'large',
	'thumbnail_attrs'       => array(),
);

$args = wp_parse_args( $args, $defaults );

if (
	has_post_thumbnail()
	&& ! (
		is_singular()
		&& $args['hide_if_block_present']
		&& has_block( 'core/post-featured-image' )
	)
) :

	$thumbnail_format = $args['linked'] ? '<a class="tag-thumbnail__link" href="%2$s">%1$s</a>' : '%1$s';
	$thumbnail        = sprintf(
		$thumbnail_format,
		get_the_post_thumbnail( null, $args['size'], $args['thumbnail_attrs'] ),
		esc_url( get_permalink() )
	);
	?>

<figure class="tag-thumbnail">
	<?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</figure>

	<?php
endif;
