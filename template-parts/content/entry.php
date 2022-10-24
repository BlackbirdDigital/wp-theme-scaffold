<?php
/**
 * Partial: content-entry.
 *
 * This partial is meant for any post type that can be syndicated, meaning
 * timestamped with author information. Note the hAtom classes entry-title and
 * entry-content are present, and others are added by the "tag" template-parts.
 *
 * @package themescaffold
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-entry' ); ?>>
	<header class="content-entry__header header">
		<?php
		the_title( '<h1 class="content-entry__title title entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="content-entry__meta meta">
				<?php get_template_part( 'template-parts/tag/date', get_post_type() ); ?>
				<?php get_template_part( 'template-parts/tag/author', get_post_type() ); ?>
			</div>
			<?php
		endif;

		get_template_part( 'template-parts/tag/thumbnail', get_post_type() );
		?>
	</header>

	<div class="content-entry__content content entry-content">
		<?php the_content(); ?>
	</div>

	<footer class="content-entry__footer footer">
		<?php get_template_part( 'template-parts/nav/page-links', get_post_type() ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="content-entry__meta meta">
				<?php get_template_part( 'template-parts/tag/term-list', get_post_type(), array( 'taxonomy' => 'category' ) ); ?>
				<?php get_template_part( 'template-parts/tag/term-list', get_post_type() ); ?>
			</div>
		<?php endif; ?>

		<?php get_template_part( 'template-parts/nav/navigation', get_post_type() ); ?>
	</footer>
</article>
