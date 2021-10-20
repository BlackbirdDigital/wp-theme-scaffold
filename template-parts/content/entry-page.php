<?php
/**
 * Partial: content-entry, page variation.
 *
 * @package theme-scaffold
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'content-entry', 'content-entry--page' ) ); ?>>
	<header class="content-entry__header">
		<?php the_title( '<h1 class="content-entry__title entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php theme_scaffold_post_thumbnail(); ?>

	<div class="content-entry__content entry-content">
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
</article><!-- .content-entry -->
