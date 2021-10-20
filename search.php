<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package theme-scaffold
 */

get_header();
?>

<main id="content" class="site-content">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'theme-scaffold' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header -->

		<?php
		while ( have_posts() ) :
			the_post();

			// Include the search-specific template variation for the excerpt.
			get_template_part( 'template-parts/content/excerpt', 'search' );

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content/none' );

	endif;
	?>

</main><!-- .site-content -->

<?php
get_sidebar();
get_footer();
