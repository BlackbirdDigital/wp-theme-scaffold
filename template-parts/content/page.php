<?php
/**
 * Partial: content-page.
 *
 * Despite it's name, this partial is not just for "page" post types, but any
 * post type that is not syndicated, meaning not timestamped with author
 * information and thus not compatible with an RSS-type feed. Note that hAtom
 * classes (entry-title, entry-content, etc.) are absent.
 *
 * @package theme-scaffold
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-page' ); ?>>
	<header class="content-page__header header">
		<?php the_title( '<h1 class="content-page__title title">', '</h1>' ); ?>
	</header>

	<?php theme_scaffold_post_thumbnail(); ?>

	<div class="content-page__content content">
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
</article>
