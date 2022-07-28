<?php
/**
 * Partial: loop-archive, search variation.
 *
 * Output a feed of results from a search query with pagination.
 *
 * @package theme-scaffold
 */

?>

<section class="loop-archive--search">
	<header class="loop-archive__header header">
		<h1 class="loop-archive__title title">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'theme-scaffold' ), '<span>' . get_search_query() . '</span>' );
			?>
		</h1>
	</header>

	<div class="loop-archive__content content hfeed">
		<?php
		while ( have_posts() ) :
			the_post();

			// Include the search-specific template variation for the excerpt.
			get_template_part( 'template-parts/content/excerpt', 'search' );

		endwhile;
		?>
	</div>

	<footer class="loop-archive__footer footer">
		<?php get_template_part( 'template-parts/nav/pagination', 'search' ); ?>
	</footer>
</section>
