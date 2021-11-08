<?php
/**
 * Partial: loop-search.
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

	<div class="loop-archive__content content block-container hfeed">
		<?php
		while ( have_posts() ) :
			the_post();

			// Include the search-specific template variation for the excerpt.
			get_template_part( 'template-parts/content/excerpt', 'search' );

		endwhile;

		the_posts_navigation();
		?>
	</div>
</section>
