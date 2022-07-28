<?php
/**
 * Partial: loop-archive.
 *
 * @package theme-scaffold
 */

?>

<section class="loop-archive">
	<header class="loop-archive__header header">
		<?php
		the_archive_title( '<h1 class="loop-archive__title title">', '</h1>' );
		the_archive_description( '<div class="loop-archive__description">', '</div>' );
		?>
	</header>

	<div class="loop-archive__content content hfeed">
		<?php
		while ( have_posts() ) :
			the_post();

			// Include the Post-Type-specific template for the excerpt.
			get_template_part( 'template-parts/content/excerpt', get_post_type() );

		endwhile;
		?>
	</div>

	<footer class="loop-archive__footer footer">
		<?php get_template_part( 'template-parts/nav/pagination', get_post_type() ); ?>
	</footer>
</section>
