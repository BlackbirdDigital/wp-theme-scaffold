<?php
/**
 * Partial: entry.
 *
 * @package theme-scaffold
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry__header">
		<?php
		the_title( '<h1 class="entry__title entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry__meta">
				<?php
				theme_scaffold_posted_on();
				theme_scaffold_posted_by();
				?>
			</div>
		<?php endif; ?>
	</header>

	<?php theme_scaffold_post_thumbnail(); ?>

	<div class="entry__content entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'theme-scaffold' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="entry__footer">
		<?php theme_scaffold_entry_footer(); ?>
	</footer>
</article><!-- .entry -->
