<?php
/**
 * Partial: entry, page variation.
 *
 * @package theme-scaffold
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'entry', 'entry-page' ) ); ?>>
	<header class="entry__header">
		<?php the_title( '<h1 class="entry__title entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php theme_scaffold_post_thumbnail(); ?>

	<div class="entry-content">
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
</article><!-- .entry -->
