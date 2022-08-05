<?php
/**
 * Partial: content-excerpt.
 *
 * Used to display a post excerpt in feeds and archives.
 *
 * @package theme-scaffold
 */

$defaults = array(
	'heading_level' => 3,
);

$args = wp_parse_args( $args, $defaults );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-excerpt' ); ?>>
	<header class="content-excerpt__header">
		<?php get_template_part( 'template-parts/tag/thumbnail', get_post_type(), array( 'size'=> 'medium', 'linked' => true ) ); ?>

		<?php
		the_title(
			sprintf(
				'<h%1$s class="content-excerpt__title entry-title"><a href="%2$s" rel="bookmark">',
				$args['heading_level'],
				esc_url( get_permalink() )
			),
			sprintf(
				'</a></h%1$s>',
				$args['heading_level']
			)
		);

		if ( 'post' === get_post_type() ) :
			?>
				<div class="content-excerpt__meta">
					<?php get_template_part( 'template-parts/tag/date', get_post_type() ); ?>
					<?php get_template_part( 'template-parts/tag/author', get_post_type() ); ?>
				</div>
			<?php
		endif;
		?>
	</header>

	<div class="content-excerpt__content entry-summary">
		<?php the_excerpt(); ?>
	</div>

	<div class="content-excerpt__footer">
		<?php // get_template_part( 'template-parts/tag/comment-link', get_post_type() ); ?>
	</div>
</article>
