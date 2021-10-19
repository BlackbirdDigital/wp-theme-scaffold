<?php
/**
 * Template part for displaying excerpts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-scaffold
 */

$defaults = array(
	'heading_level' => 3,
);

$args = wp_parse_args( $args, $defaults );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'excerpt' ); ?>>
	<header class="entry-header">
		<?php
			the_title(
				sprintf(
					'<h$1%s class="entry-title"><a href="$2%s" rel="bookmark">',
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
					<div class="entry-meta">
						<?php
						theme_scaffold_posted_on();
						theme_scaffold_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php
			endif;
			?>
	</header><!-- .entry-header -->

	<?php theme_scaffold_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-excerpt -->

	<footer class="entry-footer">
		<?php theme_scaffold_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
