<?php
/**
 * Partial: content-excerpt.
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

			if ( 'post' === get_post_type() ) :
				?>
					<div class="content-excerpt__meta">
						<?php
						theme_scaffold_posted_on();
						theme_scaffold_posted_by();
						?>
					</div>
				<?php
			endif;
			?>
	</header>

	<?php theme_scaffold_post_thumbnail(); ?>

	<div class="content-excerpt__content entry-content">
		<?php the_excerpt(); ?>
	</div>
</article><!-- .content-excerpt -->
