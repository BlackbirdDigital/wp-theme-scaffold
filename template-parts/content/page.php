<?php
/**
 * Partial: content-page.
 *
 * Despite it's name, this partial is not just for "page" post types, but any
 * post type that is not syndicated, meaning not timestamped with author
 * information and thus not compatible with an RSS-type feed. Note that hAtom
 * classes (entry-title, entry-content, etc.) are absent.
 *
 * @package themescaffold
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-page' ); ?>>
	<header class="content-page__header header">
		<?php
		the_title( '<h1 class="content-page__title title">', '</h1>' );

		get_template_part( 'template-parts/tag/thumbnail', get_post_type() );
		?>
	</header>

	<div class="content-page__content content">
		<?php the_content(); ?>
	</div>

	<footer class="content-page__footer footer">
		<?php get_template_part( 'template-parts/nav/page-links', get_post_type() ); ?>
	</footer>
</article>
