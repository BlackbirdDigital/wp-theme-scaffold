<?php
/**
 * Partial: content-entry.
 *
 * This partial is meant for any post type that can by syndicated, meaning
 * timestamped with author information. Note the hAtom classes entry-title and
 * entry-content are present, and others are added by the theme_scaffold
 * template tags.
 *
 * @package theme-scaffold
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-entry' ); ?>>
	<header class="content-entry__header header">
		<?php
		the_title( '<h1 class="content-entry__title title entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="content-entry__meta meta">
				<?php
				theme_scaffold_posted_on();
				theme_scaffold_posted_by();
				?>
			</div>
		<?php endif; ?>
	</header>

	<?php theme_scaffold_post_thumbnail(); ?>

	<div class="content-entry__content content entry-content">
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

	<footer class="content-entry__footer footer">
		<?php theme_scaffold_entry_footer(); ?>
	</footer>
</article>
